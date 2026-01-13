<?php

namespace TestGenerator\Formatters;

class PHPUnitFormatter implements TestCaseFormatter {
    public function format(array $testCases): string {
        $output = "<?php\n\n";
        $output .= "use PHPUnit\Framework\TestCase;\n\n";
        $output .= "class GeneratedTest extends TestCase\n{\n";

        foreach ($testCases as $testCase) {
            $output .= $this->formatTestMethod($testCase);
        }

        $output .= "}\n";
        return $output;
    }

    private function formatTestMethod(array $testCase): string {
        $method = "\n    /**\n";
        $method .= "     * @test\n";
        $method .= "     * {$testCase['description']}\n";
        $method .= "     */\n";
        $method .= "    public function {$testCase['name']}()\n    {\n";
        $method .= "        \$result = {$testCase['function']}({$testCase['input']});\n";
        $method .= "        \$this->assertEquals({$testCase['expected']}, \$result);\n";
        $method .= "    }\n";

        return $method;
    }
}