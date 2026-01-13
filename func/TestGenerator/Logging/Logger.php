<?php

namespace TestGenerator\Logging;

class Logger {
    private string $logDir;
    private string $logFile;
    private array $logLevels = [
        'ERROR' => 0,
        'WARNING' => 1,
        'INFO' => 2,
        'DEBUG' => 3
    ];
    private string $currentLogLevel;

    public function __construct(string $logDir = 'logs', string $logLevel = 'DEBUG') {
        $this->logDir = $logDir;
        $this->currentLogLevel = $logLevel;
        
        if (!is_dir($this->logDir)) {
            mkdir($this->logDir, 0777, true);
        }
        
        $this->logFile = $this->logDir . '/testgen_' . date('Y-m-d') . '.log';
    }

    public function setLogLevel(string $level): void {
        if (!array_key_exists($level, $this->logLevels)) {
            throw new \InvalidArgumentException("Invalid log level: $level");
        }
        $this->currentLogLevel = $level;
    }

    private function shouldLog(string $level): bool {
        return $this->logLevels[$level] <= $this->logLevels[$this->currentLogLevel];
    }

    public function log(string $message, string $level = 'INFO'): void {
        if (!$this->shouldLog($level)) {
            return;
        }

        $timestamp = date('Y-m-d H:i:s');
        $logMessage = "[$timestamp][$level] $message" . PHP_EOL;
        
        file_put_contents($this->logFile, $logMessage, FILE_APPEND);
    }

    public function error(string $message): void {
        $this->log($message, 'ERROR');
    }

    public function warning(string $message): void {
        $this->log($message, 'WARNING');
    }

    public function info(string $message): void {
        $this->log($message, 'INFO');
    }

    public function debug(string $message): void {
        $this->log($message, 'DEBUG');
    }

    public function getLogFile(): string {
        return $this->logFile;
    }

    public function clearLog(): void {
        if (file_exists($this->logFile)) {
            unlink($this->logFile);
        }
    }

    public function getLogContents(): string {
        if (!file_exists($this->logFile)) {
            return '';
        }
        return file_get_contents($this->logFile);
    }
}