<?php

namespace app\core;

/**
 * Router
 *
 * Routes HTTP requests to controller handlers with {param} pattern support.
 * Every registered route is bound to an HTTP method (GET, POST, PUT, DELETE)
 * so state-changing actions can never be triggered by the wrong request type.
 */
class Router
{
    protected array $routes = [
        'GET' => [],
        'POST' => [],
        'PUT' => [],
        'DELETE' => [],
    ];

    public function get(string $path, callable|array|string $method): void
    {
        $this->routes['GET'][$path] = $method;
    }

    public function post(string $path, callable|array|string $method): void
    {
        $this->routes['POST'][$path] = $method;
    }

    public function put(string $path, callable|array|string $method): void
    {
        $this->routes['PUT'][$path] = $method;
    }

    public function delete(string $path, callable|array|string $method): void
    {
        $this->routes['DELETE'][$path] = $method;
    }

    public function dispatch(): void
    {
        $requestMethod = strtoupper($_SERVER['REQUEST_METHOD'] ?? 'GET');
        $url = $_GET['url'] ?? '/';
        $path = '/' . trim($url, '/');

        if ($this->matchRoute($requestMethod, $path)) {
            return;
        }

        // The path exists but not for this HTTP method: 405 Method Not Allowed
        $allowedMethods = $this->allowedMethods($path);
        if (!empty($allowedMethods)) {
            http_response_code(405);
            header('Allow: ' . implode(', ', $allowedMethods));
            View::render('errors/405');
            return;
        }

        http_response_code(404);
        View::render('errors/404');
    }

    /**
     * Build the regex for a route, supporting {name} and {name:pattern} segments
     */
    protected function routePattern(string $route): string
    {
        return '#^' . preg_replace_callback(
            '/\{([^}:]+)(?::([^}]+))?\}/',
            fn(array $m) => '(' . ($m[2] ?? '[^/]+') . ')',
            $route
        ) . '$#';
    }

    protected function matchRoute(string $method, string $path): bool
    {
        $routes = $this->routes[$method] ?? [];

        if (isset($routes[$path])) {
            $this->callHandler($routes[$path], []);
            return true;
        }

        foreach ($routes as $route => $handler) {
            if (strpos($route, '{') === false) {
                continue;
            }
            $pattern = $this->routePattern($route);
            if (preg_match($pattern, $path, $matches)) {
                array_shift($matches);
                $this->callHandler($handler, $matches);
                return true;
            }
        }

        return false;
    }

    protected function allowedMethods(string $path): array
    {
        $allowed = [];
        foreach ($this->routes as $method => $routes) {
            if (isset($routes[$path])) {
                $allowed[] = $method;
                continue;
            }
            foreach ($routes as $route => $handler) {
                if (strpos($route, '{') === false) {
                    continue;
                }
                if (preg_match($this->routePattern($route), $path)) {
                    $allowed[] = $method;
                    break;
                }
            }
        }
        return $allowed;
    }

    protected function callHandler(callable|array|string $handler, array $params): void
    {
        if (is_callable($handler)) {
            call_user_func_array($handler, $params);
            return;
        }

        if (is_array($handler)) {
            [$controller, $method] = $handler;
            call_user_func_array([new $controller(), $method], $params);
            return;
        }

        if (is_string($handler)) {
            echo $handler;
        }
    }
}
