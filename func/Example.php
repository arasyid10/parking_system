<?php

require __DIR__ . '/../vendor/autoload.php';

use TestGenerator\AbacusTestGenerator;
use TestGenerator\Cache\TestCaseCache;
use TestGenerator\Validators\InputValidator;
use TestGenerator\Logging\Logger;
use TestGenerator\Formatters\PHPUnitFormatter;

$config = require __DIR__ . '/../func/Config/config.php';

// Initialize components
$cache = new TestCaseCache($config['cache']['directory'], $config['cache']['duration']);
$validator = new InputValidator();
$logger = new Logger($config['logging']['directory']);

// Initialize test generator
$generator = new AbacusTestGenerator(
    $config['abacus']['api_key'],
    $config['abacus']['api_endpoint'],
    $cache,
    $validator,
    $logger
);

// Register formatters
$generator->registerFormatter('phpunit', new PHPUnitFormatter());

// Source code to test
$sourceCode = '
function calculateDiscount($price, $discountPercentage) {
    if ($price <= 0 || $discountPercentage < 0 || $discountPercentage > 100) {
        return false;
    }
    
    $discount = ($price * $discountPercentage) / 100;
    return $price - $discount;
}
';

try {
    // Generate test cases
    $testCases = $generator->generateTestCases($sourceCode, 'calculateDiscount');
    
    // Export as PHPUnit tests
    $phpunitTests = $generator->exportTestCases($testCases, 'phpunit');
    
    // Save to file
    file_put_contents('tests/GeneratedTest.php', $phpunitTests);
    
    echo "Test cases generated successfully!\n";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}