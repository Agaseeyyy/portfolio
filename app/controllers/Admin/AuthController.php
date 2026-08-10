<?php

namespace app\controllers\Admin;

use app\core\Controller;
use app\core\Config;

/**
 * Auth Controller
 * 
 * Handles admin authentication with fixed credentials
 */
class AuthController extends Controller
{
    /**
     * Display login page
     */
    public function login(): void
    {
        // If already logged in, redirect to dashboard
        if (is_authenticated()) {
            $this->redirect('admin');
        }

        $this->view('admin/login', [
            'pageTitle' => 'Admin Login'
        ]);
    }

    /**
     * Authenticate admin user
     */
    public function authenticate(): void
    {
        if ($this->requestMethod() !== 'POST') {
            $this->redirect('admin/login');
        }

        if (!verify_csrf()) {
            set_flash('error', 'Invalid or expired security token. Please try again.');
            $this->redirect('admin/login');
        }

        $username = trim($_POST['username'] ?? '');
        $password = $_POST['password'] ?? '';

        // Get credentials from environment
        $validUsername = Config::get('ADMIN_USER', 'admin');
        $validPassword = Config::get('ADMIN_PASS', 'admin123');

        // Validate credentials
        if ($username === $validUsername && $password === $validPassword) {
            // Regenerate the session ID on privilege change to prevent fixation
            session_regenerate_id(true);

            $_SESSION['admin_logged_in'] = true;
            $_SESSION['admin_user'] = $username;

            set_flash('success', 'Welcome back, ' . htmlspecialchars($username) . '!');
            $this->redirect('admin');
        }

        // Invalid credentials
        set_flash('error', 'Invalid username or password');
        $this->redirect('admin/login');
    }

    /**
     * Logout admin user
     */
    public function logout(): void
    {
        if ($this->requestMethod() !== 'POST') {
            $this->redirect('admin');
        }

        if (!verify_csrf()) {
            set_flash('error', 'Invalid or expired security token. Please try again.');
            $this->redirect('admin');
        }

        // Clear admin session
        $_SESSION = [];
        session_destroy();

        set_flash('success', 'You have been logged out successfully');
        $this->redirect('admin/login');
    }

    protected function requestMethod(): string
    {
        return strtoupper($_SERVER['REQUEST_METHOD'] ?? 'GET');
    }
}
