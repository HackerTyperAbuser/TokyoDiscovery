<?php
// TODO:
// 23/6/2025

// - Session handling: Cookies
// - Security: Add CSRF token
// - Logout + Forget Password functionality
// - (optional) 2FA + email verification
// - Password Policy Verification
// - Username Input Validation
// - Views is being repeated at lot, DRY

session_set_cookie_params([
    'httponly' => true,           
    'samesite' => 'Lax'           
]);

session_start();

// Define base paths
define('BASE_PATH', dirname(__DIR__));


// Include the router and controller logic
require BASE_PATH . '/core/Router.php';
require BASE_PATH . '/app/Controllers/AuthController.php';
require BASE_PATH . '/app/Controllers/UserController.php';

$router = new Router();

// Authentication Routes
$router->get('/login', [AuthController::class, 'showLoginForm']);
$router->get('/signup', [AuthController::class, 'showSignupForm']);
$router->post('/login', [AuthController::class, 'login']);
$router->post('/signup', [AuthController::class, 'signup']);

$router->get('/logout', [AuthController::class, 'logout']);

$router->get('/forget-password', [AuthController::class, 'showForgetPassword']);
$router->post('/forget-password', [AuthController::class, 'validateEmail']);
$router->get('/reset-password', [AuthController::class, 'showResetPassword']);
$router->post('/reset-password', [AuthController::class, 'resetPassword']);

// User Routes
$router->get('/profile', [UserController::class, 'showProfile']);

$router->dispatch($_SERVER['REQUEST_URI']);
?>