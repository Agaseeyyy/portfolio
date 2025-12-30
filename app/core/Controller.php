<?php

namespace app\core;

use app\core\View;

/**
 * Core Controller
 * 
 * Base controller class that all controllers extend.
 * Provides view rendering with data passing support.
 */
abstract class Controller
{

	/**
	 * Render a view with optional data
	 * 
	 * @param string $viewName View file path (without extension)
	 * @param array $data Data to pass to the view
	 */
	protected function view(string $viewName, array $data = []): void
	{
		View::render($viewName, $data);
	}

	/**
	 * Redirect to a URL (automatically prepends base URL for paths)
	 * 
	 * @param string $path Path to redirect to
	 */
	protected function redirect(string $path): void
	{
		header("Location: " . base_url($path));
		exit;
	}
}
