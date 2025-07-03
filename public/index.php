<?php
// TODO:
// - Views is being repeated at lot, DRY 

session_set_cookie_params([
    'httponly' => true,           
    'samesite' => 'Lax'           
]);

session_start();

// Define base paths
define('BASE_PATH', dirname(__DIR__));


// Include the router and controller logic
require_once BASE_PATH . '/app/Helper/Helper.php';
require BASE_PATH . '/core/Router.php';
require BASE_PATH . '/app/Controllers/AuthController.php';
require BASE_PATH . '/app/Controllers/UserController.php';

if (!isset($_SESSION['csrfToken']))
{
    $token = Helper::tokenGenerator(32);
    $_SESSION['csrfToken'] = $token;
}

$router = new Router();

if ($_SERVER['REQUEST_URI'] === '/') {
    header('Location: /login');
    exit;
}

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
// TODO
// -------------------------------------------------------------------------------
$router->get('/profile/edit', [UserController::class, 'showEditProfileForm']);
$router->post('/profile/edit', [UserController::class, 'updateProfile']);
$router->get('/profile/delete', [UserController::class, 'deleteProfile']);
$router->post('/profile/visibility', [UserController::class, 'updateVisible']);
// -------------------------------------------------------------------------------

// Dashboard Routes
$router->get('/dashboard', [UserController::class, 'showDashboard']);

$router->dispatch($_SERVER['REQUEST_URI']);
?>