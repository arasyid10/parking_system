<?php

namespace TestGenerator\Validators;

use InvalidArgumentException;

class InputValidator {
    public function validateSourceCode(string $sourceCode): void {
        if (empty(trim($sourceCode))) {
            throw new InvalidArgumentException("Source code cannot be empty");
        }

        if (!preg_match('/function\s+\w+\s*\(/', $sourceCode)) {
            throw new InvalidArgumentException("No function definition found in source code");
        }
    }

    public function validateFunctionName(?string $functionName): void {
        if ($functionName !== null && !preg_match('/^[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*$/', $functionName)) {
            throw new InvalidArgumentException("Invalid function name format");
        }
    }

    public function validateApiKey(string $apiKey): void {
        if (empty(trim($apiKey))) {
            throw new InvalidArgumentException("API key cannot be empty");
        }
    }
}