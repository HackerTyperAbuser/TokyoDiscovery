<?php 
require_once BASE_PATH . '/app/Models/User.php';
require_once BASE_PATH . '/core/Views.php';

class UserController
{
    public static function showProfile() 
    {
        if (!isset($_SESSION['user_email'])) {
            Views::render("auth/login", [
                "message" => "You must log in first",
                "color" => "red",
            ]);
            exit;
        }

        $userModel = new User();
        $user = $userModel->getByEmail($_SESSION['user_email']);

        if (!$user) 
        {
            session_destroy();
            header('Location: /login');
            exit;
        }

        Views::render("user/profile", [
            "username" => $user['username'],
            "email" => $user['email'],
            "joinedDate" => $user['createdAt'],
        ]);
    }
}


?>