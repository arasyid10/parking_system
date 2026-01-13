<?php

namespace TestGenerator\Cache;

class TestCaseCache {
    private string $cacheDir;
    private int $cacheDuration; // dalam detik

    public function __construct(string $cacheDir = 'cache', int $cacheDuration = 3600) {
        $this->cacheDir = $cacheDir;
        $this->cacheDuration = $cacheDuration;
        
        if (!is_dir($this->cacheDir)) {
            mkdir($this->cacheDir, 0777, true);
        }
    }

    public function set(string $key, array $testCases): void {
        $cacheFile = $this->getCacheFilePath($key);
        $data = [
            'timestamp' => time(),
            'testCases' => $testCases
        ];
        
        file_put_contents($cacheFile, json_encode($data));
    }

    public function get(string $key): ?array {
        $cacheFile = $this->getCacheFilePath($key);
        
        if (!file_exists($cacheFile)) {
            return null;
        }

        $data = json_decode(file_get_contents($cacheFile), true);
        
        if (time() - $data['timestamp'] > $this->cacheDuration) {
            unlink($cacheFile);
            return null;
        }

        return $data['testCases'];
    }

    private function getCacheFilePath(string $key): string {
        return $this->cacheDir . '/testcases_' . md5($key) . '.json';
    }

    public function clear(): void {
        $files = glob($this->cacheDir . '/*');
        foreach ($files as $file) {
            if (is_file($file)) {
                unlink($file);
            }
        }
    }
}