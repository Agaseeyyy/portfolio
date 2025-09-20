<?php
namespace app\core;

/**
 * 
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

		// Nnrmalize: remove base folder (if project not in domain root)
		$scriptName = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME']));
		$base = $scriptName !== '/' ? $scriptName : '';
		$path = substr($path, strlen($base));
		if ($path === "" || $path === false) {
		  $path = "/";
		}

		$handler = $this->routes[$path];

		// returns routes with anonymous functions
		if (is_callable($handler)) {
      call_user_func($handler);
      return;
    }

    // returning controller method from controllers [Controller::class, 'method']
    if (is_array($handler)) {
      [$controller, $method] = $handler;
      call_user_func([new $controller, $method]);
      return;
    }

		// returning a string value
		if (is_string($handler)) {
			echo $handler;
			return;
		}

		// render 404 page view if path doesn't exist
		View::render($path);
	}

}
