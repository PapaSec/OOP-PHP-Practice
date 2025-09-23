<?php
require_once __DIR__ . '/controllers/AuthController.php';

$auth = new AuthController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && $_POST['action'] === 'register') {
        $auth->handleRegister($_POST['username'], $_POST['password']);
    } else {
        $auth->handleLogin($_POST['username'], $_POST['password']);
    }
} else {
    if (isset($_GET['page']) && $_GET['page'] === 'signup') {
        $auth->showSignup();
    } else {
        $auth->showLogin();
    }
}
