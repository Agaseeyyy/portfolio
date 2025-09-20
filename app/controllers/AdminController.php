<?php

use app\core\Controller;

/**
 * 
 */
class AdminController extends Controller
{
	
	public function index() 
	{
		return $this->view('/admin/dashboard');
	}
}