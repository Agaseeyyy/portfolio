<?php

namespace app\core;

/**
 * Router
 */
class Router
{
	protected array $routes = [];

	public function get(string $path, callable|array|string $method): void
	{
		$this->routes[$path] = $method;
	}

	public function post(string $path, callable|array|string $method): void
	{
		$this->routes[$path] = $method;
	}

	public function put(string $path, callable|array|string $method): void
	{
		$this->routes[$path] = $method;
	}

	public function delete(string $path, callable|array|string $method): void
	{
		$this->routes[$path] = $method;
	}

	public function dispatch(): void
	{
		$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

		// Get the path from the .htaccess 'url' param, default to '/'
		$url = $_GET['url'] ?? '/';

		// Normalize: Ensure it starts with / and remove trailing slashes
		$path = '/' . trim($url, '/');

		// Try exact match first
		if (isset($this->routes[$path])) {
			$this->callHandler($this->routes[$path], []);
			return;
		}

		// Try pattern matching for routes with {param}
		foreach ($this->routes as $route => $handler) {
			if (strpos($route, '{') !== false) {
				$pattern = '#^' . preg_replace('/\{[^}]+\}/', '([^/]+)', $route) . '$#';
				if (preg_match($pattern, $path, $matches)) {
					array_shift($matches);
					$this->callHandler($handler, $matches);
					return;
				}
			}
		}

		// 404
		http_response_code(404);
		View::render($path);
	}

	protected function callHandler(callable|array|string $handler, array $params): void
	{
		if (is_callable($handler)) {
			call_user_func_array($handler, $params);
			return;
		}

		if (is_array($handler)) {
			[$controller, $method] = $handler;
			call_user_func_array([new $controller, $method], $params);
			return;
		}

		if (is_string($handler)) {
			echo $handler;
		}
	}
}
