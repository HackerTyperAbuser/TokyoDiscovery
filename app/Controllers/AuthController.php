<?php 
require BASE_PATH . '/app/Models/User.php';
require BASE_PATH . '/core/Views.php';

class AuthController
{
    // Return Signup form view
    public static function showSignupForm()
    {
        Views::render("auth/signup");
    }

    // Return Login form view
    public static function showLoginForm()
    {
        Views::render("auth/login");
    }

    public static function signup() 
    {
        $email = trim($_POST['email'] ?? '');
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $confirmPassword = $_POST['confirm_password'] ?? '';

        if (empty($email) || empty($username) || empty($password) || empty($confirmPassword)) 
        {
            Views::render("auth/signup", [
                "message" => "Please fill in all fields",
                "color" => "red",
                ]);
        }
        else
        {
            $userModel = new User();
            $success = $userModel->createUser($username, $email, $hashedPassword);

            if ($success) 
            {
                header("Location: /login");
                Views::render("auth/login", [
                    "message" => "Account created successfully. Please log in",
                    "color" => "dark-green",
                ]);
            }
            else 
            {
                Views::render("auth/signup", [
                    "message" => "Failed to create account",
                    "color" => "red",
                ]);
            }
        }
    }

    public static function login() 
    {
        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';

        if (empty($email) || empty($password)) 
        {
            Views::render("auth/login", [
                "message" => "Please fill in all fields",
                "color" => "red",
                ]);
        }
        else
        {
            $userModel = new User();
            $success = $userModel->loginUser($email, $password);

            if ($success)
            {
                header("Location: /dashboard");
            }
            else 
            {
                Views::render("auth/login", [
                    "message" => "Invalid Credentials",
                    "color" => "red",
                ]);
            }

        }
    }

}

?>