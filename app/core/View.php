<?php  
namespace app\core;

use Exception;

/**
 * 
 */
class View
{
	
	public static function render(string $viewFile): void
	{
		$viewPath = (__DIR__ . '/../../resources/views/' . $viewFile .'.php');

		if (!file_exists($viewPath)) {
			throw new \Exception ("View file not found! Please check the path carefully: " . $viewPath);
		}

		require $viewPath;
	}
	
}