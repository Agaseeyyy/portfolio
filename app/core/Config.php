<?php

/**
 * Environment Configuration Loader
 * 
 * Uses vlucas/phpdotenv for robust .env file handling.
 * Call Config::load() once at application bootstrap.
 */

namespace app\core;

use Dotenv\Dotenv;

class Config
{
    private static bool $loaded = false;

    /**
     * Load environment variables from .env file
     */
    public static function load(): void
    {
        if (self::$loaded) {
            return;
        }

        $basePath = dirname(__DIR__, 2);

        // Load .env file if it exists
        if (file_exists($basePath . '/.env')) {
            $dotenv = Dotenv::createImmutable($basePath);
            $dotenv->load();
        } elseif (file_exists($basePath . '/.env.example')) {
            // Fall back to .env.example for development
            $dotenv = Dotenv::createImmutable($basePath, '.env.example');
            $dotenv->load();
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
        $value = $_ENV[$key] ?? getenv($key) ?: null;
        return $value !== null ? $value : $default;
    }

    /**
     * Check if running in debug mode
     */
    public static function isDebug(): bool
    {
        return strtolower(self::get('APP_DEBUG', 'false')) === 'true';
    }

    /**
     * Get app environment (local, production, etc.)
     */
    public static function env(): string
    {
        return self::get('APP_ENV', 'local');
    }

    /**
     * Check if running in production
     */
    public static function isProduction(): bool
    {
        return self::env() === 'production';
    }
}
