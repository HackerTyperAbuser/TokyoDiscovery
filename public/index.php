<?php
// TODO:

// - Session handling: Cookies + CSRF token
// - Logout + Forget Password functionality
// - (optional) 2FA + email verification
// - Password Policy Verification
// - Username Input Validation


// Define base paths
define('BASE_PATH', dirname(__DIR__));


// Include the router and controller logic
require BASE_PATH . '/core/Router.php';
require BASE_PATH . '/app/Controllers/AuthController.php';

$router = new Router();
$router->get('/login', [AuthController::class, 'showLoginForm']);
$router->get('/signup', [AuthController::class, 'showSignupForm']);
$router->post('/login', [AuthController::class, 'login']);
$router->post('/signup', [AuthController::class, 'signup']);

$router->dispatch($_SERVER['REQUEST_URI']);
?>