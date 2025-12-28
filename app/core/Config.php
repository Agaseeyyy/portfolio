<?php
/**
 * Environment Configuration Loader
 * 
 * Loads .env file and provides access to environment variables.
 * Call Config::load() once at application bootstrap.
 */

namespace app\core;

class Config
{
    private static bool $loaded = false;
    private static array $config = [];

    /**
     * Load environment variables from .env file
     */
    public static function load(): void
    {
        if (self::$loaded) {
            return;
        }

        $envFile = dirname(__DIR__, 2) . '/.env';
        
        if (!file_exists($envFile)) {
            // Fall back to .env.example if .env doesn't exist
            $envFile = dirname(__DIR__, 2) . '/.env.example';
        }

        if (file_exists($envFile)) {
            $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            
            foreach ($lines as $line) {
                // Skip comments
                if (str_starts_with(trim($line), '#')) {
                    continue;
                }

                // Parse KEY=value
                if (str_contains($line, '=')) {
                    [$key, $value] = explode('=', $line, 2);
                    $key = trim($key);
                    $value = trim($value);
                    
                    // Remove quotes if present
                    if (preg_match('/^"(.*)"$/', $value, $matches)) {
                        $value = $matches[1];
                    } elseif (preg_match("/^'(.*)'$/", $value, $matches)) {
                        $value = $matches[1];
                    }

                    self::$config[$key] = $value;
                    
                    // Also set as environment variable
                    if (!getenv($key)) {
                        putenv("$key=$value");
                    }
                }
            }
        }

        self::$loaded = true;
    }

    /**
     * Get a configuration value
     * 
     * @param string $key Configuration key
     * @param mixed $default Default value if key not found
     * @return mixed
     */
    public static function get(string $key, mixed $default = null): mixed
    {
        self::load();
        return self::$config[$key] ?? getenv($key) ?: $default;
    }

    /**
     * Check if running in debug mode
     */
    public static function isDebug(): bool
    {
        return self::get('APP_DEBUG', 'false') === 'true';
    }

    /**
     * Get app environment (local, production, etc.)
     */
    public static function env(): string
    {
        return self::get('APP_ENV', 'local');
    }
}
