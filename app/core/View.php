<?php

namespace app\core;

use Exception;

/**
 * View Handler
 * 
 * Renders view files with layout support and section rendering.
 * Similar to CodeIgniter 4's view system.
 */
class View
{
    private static array $sections = [];
    private static string $currentSection = '';
    private static ?string $layout = null;
    private static array $data = [];
    private static string $viewPath = '';

    /**
     * Render a view file with optional data
     * 
     * @param string $viewFile Path to view file (without extension)
     * @param array $data Data to pass to view (extracted as variables)
     */
    public static function render(string $viewFile, array $data = []): void
    {
        self::$viewPath = __DIR__ . '/../../resources/views/';
        self::$data = $data;
        self::$sections = [];
        self::$layout = null;

        $fullPath = self::$viewPath . $viewFile . '.php';

        if (!file_exists($fullPath)) {
            require self::$viewPath . '/errors/404.php';
            throw new \Exception("View file not found! Please check the path carefully: " . $fullPath);
        }

        // Extract data array to individual variables for use in view
        if (!empty($data)) {
            extract($data);
        }

        // Capture the view content
        ob_start();
        require $fullPath;
        $content = ob_get_clean();

        // If a layout was specified, render it with sections
        if (self::$layout !== null) {
            $layoutPath = self::$viewPath . self::$layout . '.php';
            if (file_exists($layoutPath)) {
                // Re-extract data for layout
                if (!empty($data)) {
                    extract($data);
                }
                require $layoutPath;
            } else {
                echo $content;
            }
        } else {
            echo $content;
        }
    }

    /**
     * Set the layout to use
     * 
     * @param string $layout Layout file path (without extension)
     */
    public static function extend(string $layout): void
    {
        self::$layout = $layout;
    }

    /**
     * Start a section
     * 
     * @param string $name Section name
     */
    public static function section(string $name): void
    {
        self::$currentSection = $name;
        ob_start();
    }

    /**
     * End the current section
     */
    public static function endSection(): void
    {
        if (self::$currentSection !== '') {
            self::$sections[self::$currentSection] = ob_get_clean();
            self::$currentSection = '';
        }
    }

    /**
     * Render a section's content
     * 
     * @param string $name Section name
     * @return string Section content
     */
    public static function renderSection(string $name): string
    {
        return self::$sections[$name] ?? '';
    }

    /**
     * Include a partial view
     * 
     * @param string $view Partial view path
     * @return string Rendered content
     */
    public static function include(string $view): string
    {
        $fullPath = self::$viewPath . $view . '.php';

        if (!file_exists($fullPath)) {
            return '';
        }

        // Extract data for the partial
        if (!empty(self::$data)) {
            extract(self::$data);
        }

        ob_start();
        require $fullPath;
        return ob_get_clean();
    }

    /**
     * Get current data
     * 
     * @return array
     */
    public static function getData(): array
    {
        return self::$data;
    }
}
