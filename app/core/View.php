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
		$viewPath = (__DIR__ . '/../../resources/views/');
		$viewFile = $viewPath . $viewFile . '.php';

		if (!file_exists($viewFile)) {
			require $viewPath . '/errors/404.php';
			throw new \Exception ("View file not found! Please check the path carefully: " . $viewFile);	
		}

		require $viewFile;
	}
	
}