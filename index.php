<?php
// Load classes before session_start
require_once __DIR__ . '/classes/User.php';
require_once __DIR__ . '/classes/AdminUser.php';
require_once __DIR__ . '/controllers/AuthController.php';

session_start();

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
    } elseif (isset($_GET['page']) && $_GET['page'] === 'dashboard') {
        if (isset($_SESSION['user'])) {
            $user = $_SESSION['user'];   // Now class exists before unserialize
            include __DIR__ . '/views/dashboard.php';
        } else {
            header("Location: index.php");
            exit;
        }
    } elseif (isset($_GET['page']) && $_GET['page'] === 'logout') {
        session_destroy();
        header("Location: index.php");
        exit;
    } else {
        $auth->showLogin();
    }
}
