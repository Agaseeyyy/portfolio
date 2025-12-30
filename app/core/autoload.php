<?php

/**
 * Legacy Autoloader - DEPRECATED
 * 
 * This file is kept for backward compatibility.
 * The application now uses Composer autoloading.
 * 
 * @deprecated Use app/bootstrap.php instead
 */

// Redirect to the new bootstrap
require_once dirname(__DIR__) . '/bootstrap.php';
