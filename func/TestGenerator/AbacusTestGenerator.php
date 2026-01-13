<?php

namespace TestGenerator;

use TestGenerator\Cache\TestCaseCache;
use TestGenerator\Validators\InputValidator;
use TestGenerator\Logging\Logger;
use TestGenerator\Formatters\TestCaseFormatter;
use Exception;
use GuzzleHttp\Client;

class AbacusTestGenerator {
    private string $apiKey;
    private string $apiEndpoint;
    private TestCaseCache $cache;
    private InputValidator $validator;
    private Logger $logger;
    private array $formatters;
    private Client $httpClient;

    public function __construct(
        string $apiKey,
        string $apiEndpoint = 'https://api.abacus.ai/v0/inference',
        ?TestCaseCache $cache = null,
        ?InputValidator $validator = null,
        ?Logger $logger = null
    ) {
        $this->apiKey = $apiKey;
        $this->apiEndpoint = $apiEndpoint;
        $this->cache = $cache ?? new TestCaseCache();
        $this->validator = $validator ?? new InputValidator();
        $this->logger = $logger ?? new Logger();
        $this->formatters = [];
        $this->httpClient = new Client();
    }

    public function registerFormatter(string $format, TestCaseFormatter $formatter): void {
        $this->formatters[$format] = $formatter;
    }

    public function generateTestCases(string $sourceCode, ?string $functionName = null): array {
        try {
            $this->validator->validateSourceCode($sourceCode);
            $this->validator->validateFunctionName($functionName);

            $cacheKey = md5($sourceCode . $functionName);
            
            // Check cache first
            if ($cachedResult = $this->cache->get($cacheKey)) {
                $this->logger->info("Retrieved test cases from cache for: $functionName");
                return $cachedResult;
            }

            $prompt = $this->buildPrompt($sourceCode, $functionName);
            $testCases = $this->callAbacusAPI($prompt);
            
            // Cache the results
            $this->cache->set($cacheKey, $testCases);
            
            $this->logger->info("Generated new test cases for: $functionName");
            
            return $testCases;
        } catch (Exception $e) {
            $this->logger->error("Error generating test cases: " . $e->getMessage());
            throw $e;
        }
    }

    /**
     * Build prompt for the LLM
     */
    private function buildPrompt(string $sourceCode, ?string $functionName): string {
        $prompt = "Generate comprehensive functional test cases for the following PHP code:\n\n";
        $prompt .= $sourceCode . "\n\n";
        
        if ($functionName) {
            $prompt .= "Focus on testing the function: " . $functionName . "\n";
        }
        
        $prompt .= "Please provide test cases in the following format:
1. Test case name (should be a valid PHP method name)
2. Input values (with type information)
3. Expected output (with type information)
4. Test scenario description
5. Edge cases to consider
6. Any potential exceptions or error conditions

For each test case, include:
- Normal case scenarios
- Edge cases
- Boundary conditions
- Invalid input handling
- Exception scenarios

Format the response as JSON with the following structure:
{
    \"testCases\": [
        {
            \"name\": \"testMethodName\",
            \"input\": \"parameter values\",
            \"expected\": \"expected output\",
            \"description\": \"test case description\",
            \"type\": \"normal|edge|boundary|invalid|exception\",
            \"function\": \"function name being tested\"
        }
    ]
}";

        return $prompt;
    }

    /**
     * Call Abacus API to generate test cases
     */
    private function callAbacusAPI(string $prompt): array {
        try {
            $this->logger->debug("Calling Abacus API with prompt length: " . strlen($prompt));

            $response = $this->httpClient->post($this->apiEndpoint, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->apiKey,
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'model' => 'claude-3-sonnet',
                    'messages' => [
                        [
                            'role' => 'user',
                            'content' => $prompt
                        ]
                    ],
                    'temperature' => 0.7,
                    'max_tokens' => 2000
                ]
            ]);

            $result = json_decode($response->getBody()->getContents(), true);
            
            if (!isset($result['choices'][0]['message']['content'])) {
                throw new Exception("Invalid API response format");
            }

            return $this->parseApiResponse($result['choices'][0]['message']['content']);

        } catch (Exception $e) {
            $this->logger->error("API call failed: " . $e->getMessage());
            throw new Exception("Failed to generate test cases: " . $e->getMessage());
        }
    }

    /**
     * Parse API response into structured test cases
     */
    private function parseApiResponse(string $content): array {
        try {
            $data = json_decode($content, true);
            
            if (json_last_error() !== JSON_ERROR_NONE) {
                throw new Exception("Invalid JSON response: " . json_last_error_msg());
            }

            if (!isset($data['testCases']) || !is_array($data['testCases'])) {
                throw new Exception("Invalid response format: missing testCases array");
            }

            return $this->validateTestCases($data['testCases']);

        } catch (Exception $e) {
            $this->logger->error("Failed to parse API response: " . $e->getMessage());
            throw new Exception("Failed to parse test cases: " . $e->getMessage());
        }
    }

    /**
     * Validate and sanitize test cases
     */
    private function validateTestCases(array $testCases): array {
        $validatedTestCases = [];

        foreach ($testCases as $testCase) {
            if (!isset($testCase['name'], $testCase['input'], $testCase['expected'], $testCase['description'])) {
                $this->logger->warning("Skipping invalid test case: missing required fields");
                continue;
            }

            // Sanitize test method name
            $testCase['name'] = $this->sanitizeMethodName($testCase['name']);

            $validatedTestCases[] = $testCase;
        }

        if (empty($validatedTestCases)) {
            throw new Exception("No valid test cases generated");
        }

        return $validatedTestCases;
    }

    /**
     * Sanitize method name to be valid PHP method name
     */
    private function sanitizeMethodName(string $name): string {
        // Remove non-alphanumeric characters
        $name = preg_replace('/[^a-zA-Z0-9]/', '', $name);
        
        // Ensure it starts with 'test'
        if (!str_starts_with($name, 'test')) {
            $name = 'test' . $name;
        }
        
        return $name;
    }

    /**
     * Export test cases in specified format
     */
    public function exportTestCases(array $testCases, string $format = 'phpunit'): string {
        if (!isset($this->formatters[$format])) {
            throw new Exception("Unsupported format: $format");
        }

        try {
            return $this->formatters[$format]->format($testCases);
        } catch (Exception $e) {
            $this->logger->error("Failed to format test cases: " . $e->getMessage());
            throw new Exception("Failed to export test cases: " . $e->getMessage());
        }
    }
}