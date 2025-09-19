<?php
namespace app\core;

use app\core\View;

/**
 * Core Controller
 */
abstract class Controller
{
 
	function view($viewName)
	{
		return View::render($viewName);
	}


}