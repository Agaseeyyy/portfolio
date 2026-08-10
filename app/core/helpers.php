<?php

/**
 * Helper Functions
 * 
 * Global functions available throughout the application.
 */

use app\core\Config;

if (!function_exists('base_url')) {
    /**
     * Get base URL for the application
     * 
     * @param string $path Optional path to append
     * @return string
     */
    function base_url(string $path = ''): string
    {
        $appPath = Config::get('APP_PATH', '');

        // If no app path configured or on production, use root
        if (empty($appPath) || Config::isProduction()) {
            return '/' . ltrim($path, '/');
        }

        return rtrim($appPath, '/') . '/' . ltrim($path, '/');
    }
}

if (!function_exists('absolute_url')) {
    /**
     * Get absolute URL (scheme + host + path) for SEO-critical output
     * such as canonical URLs, Open Graph tags, and sitemap entries.
     *
     * The host is derived from the current request so the output always
     * matches the domain the site is served from.
     *
     * @param string $path Optional path to append
     * @return string
     */
    function absolute_url(string $path = ''): string
    {
        $scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
        $host = $_SERVER['HTTP_HOST'] ?? '';

        // Fall back to APP_URL when not running under a web request (CLI, queues)
        if (empty($host)) {
            $appUrl = (string) Config::get('APP_URL', '');
            if ($appUrl !== '') {
                return rtrim($appUrl, '/') . '/' . ltrim($path, '/');
            }
            return base_url($path);
        }

        return $scheme . '://' . $host . base_url($path);
    }
}

if (!function_exists('set_flash')) {
    /**
     * Set a flash message in session
     * 
     * @param string $type Message type (success, error, warning, info)
     * @param string $message The message content
     */
    function set_flash(string $type, string $message): void
    {
        $_SESSION['flash'][$type] = $message;
    }
}

if (!function_exists('get_flash')) {
    /**
     * Get and clear a flash message
     * 
     * @param string $type Message type
     * @return string|null The message or null if not exists
     */
    function get_flash(string $type): ?string
    {
        $message = $_SESSION['flash'][$type] ?? null;
        unset($_SESSION['flash'][$type]);
        return $message;
    }
}

if (!function_exists('has_flash')) {
    /**
     * Check if a flash message exists
     * 
     * @param string $type Message type
     * @return bool
     */
    function has_flash(string $type): bool
    {
        return !empty($_SESSION['flash'][$type]);
    }
}

if (!function_exists('is_authenticated')) {
    /**
     * Check if admin user is authenticated
     * 
     * @return bool
     */
    function is_authenticated(): bool
    {
        return !empty($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true;
    }
}

if (!function_exists('require_auth')) {
    /**
     * Require authentication, redirect to login if not authenticated
     * 
     * @return void
     */
    function require_auth(): void
    {
        if (!is_authenticated()) {
            header('Location: ' . base_url('admin/login'));
            exit;
        }
    }
}
