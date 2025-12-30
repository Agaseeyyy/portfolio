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
            header('Location: ' . base_url('admin'));
            exit;
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
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        // Get credentials from environment
        $validUsername = Config::get('ADMIN_USER', 'admin');
        $validPassword = Config::get('ADMIN_PASS', 'admin123');

        // Validate credentials
        if ($username === $validUsername && $password === $validPassword) {
            // Set session
            $_SESSION['admin_logged_in'] = true;
            $_SESSION['admin_user'] = $username;

            set_flash('success', 'Welcome back, ' . htmlspecialchars($username) . '!');
            header('Location: ' . base_url('admin'));
            exit;
        }

        // Invalid credentials
        set_flash('error', 'Invalid username or password');
        header('Location: ' . base_url('admin/login'));
        exit;
    }

    /**
     * Logout admin user
     */
    public function logout(): void
    {
        // Clear admin session
        unset($_SESSION['admin_logged_in']);
        unset($_SESSION['admin_user']);

        set_flash('success', 'You have been logged out successfully');
        header('Location: ' . base_url('admin/login'));
        exit;
    }
}
