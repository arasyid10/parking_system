<?php

namespace TestGenerator\Formatters;

interface TestCaseFormatter {
    public function format(array $testCases): string;
}