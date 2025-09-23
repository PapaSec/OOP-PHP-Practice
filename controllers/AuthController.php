<?php
// controllers/AuthController.php
require_once __DIR__ . '/../classes/UserManager.php';

class AuthController {
    private UserManager $manager;

    public function __construct() {
        $this->manager = new UserManager();
    }

    public function showLogin(): void {
        include __DIR__ . '/../views/login_form.php';
    }

    public function showSignup(): void {
        include __DIR__ . '/../views/signup.php';
    }

    public function handleRegister(string $username, string $password): void {
        if ($this->manager->register($username, $password)) {
            echo "<p style='color:green'>Registration successful! You can now login.</p>";
            $this->showLogin();
        } else {
            echo "<p style='color:red'>Username already exists!</p>";
            $this->showSignup();
        }
    }

    public function handleLogin(string $username, string $password): void {
        $user = $this->manager->login($username, $password);
        if ($user) {
            include __DIR__ . '/../views/dashboard.php';
        } else {
            $error = "Invalid login!";
            include __DIR__ . '/../views/login_form.php';
        }
    }
}
