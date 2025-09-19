<?php  
namespace app\core;

/**
 * 
 */
class View
{
	
	public static function render(string $viewFile): void
	{
		$viewPath = (__DIR__ . '/../../resources/views/' . $viewFile .'.php');

		if (!file_exists($viewFile)) {
			("View file not found! Please check the path carefully: " . $viewPath);
		}

		require $viewPath;
	}
	
}