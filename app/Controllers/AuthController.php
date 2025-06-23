<?php 
require_once BASE_PATH . '/app/Models/User.php';
require_once BASE_PATH . '/core/Views.php';

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

    public static function showForgetPassword()
    {
        Views::render("auth/forgetPassword");
    }

    public static function validateEmail()
    {
        $email = trim($_POST['email'] ?? '');
        $userModel = new User();
        $user = $userModel->getByEmail($email);

        if ($user)
        {
            $_SESSION['reset_email'] = $email;
            header("Location: /reset-password");
        } 
        else 
        {
            Views::render("auth/forgetPassword", [
                "comment" => "Something went wrong",
                "color" => "red",
            ]);
        }
    }

    public static function showResetPassword()
    {
        if (!isset($_SESSION['reset_email'])) {
            header("Location: /login");
        }
        
        Views::render("auth/resetPassword");
    }

    public static function resetPassword()
    {
        $confirmPassword = $_POST['confirm_password'] ?? '';
        $password = $_POST['password'] ?? '';

        if (empty($password) || empty($confirmPassword))
        {
            Views::render("auth/resetPassword", [
                "success" => false,
                "message" => "Please fill in all fields",
                "color" => "red",
            ]);
            return;
        }

        if (!($password === $confirmPassword))
        {
            Views::render("auth/resetPassword", [
                "sucess" => false,
                "message" => "Passwords do not match",
                "color" => "red",
            ]);
            return;
        }

        $userModel = new User();
        $user = $userModel->updatePassword($_SESSION['reset_email'], $password);

        if ($user)
        {
            Views::render("auth/resetPassword", [
                "success" => true,
                "message" => "Password has been updated!",
                "color" => "green",
            ]);
        }
    }

    public static function signup() 
    {
        $email = trim($_POST['email'] ?? '');
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';
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
            $success = $userModel->createUser($username, $email, $password);

            if ($success) 
            {
                header("Location: /login");
                Views::render("auth/login", [
                    "message" => "Account created successfully. Please log in",
                    "color" => "green",
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
            $user = $userModel->loginUser($email, $password);

            if ($user)
            {
                session_regenerate_id(true);
                $_SESSION['user_email'] = $user['email'];
                header("Location: /profile");
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

    public static function logout() 
    {
        session_unset();
        session_destroy();
        header("Location: /login");
        exit;
    }

}

?>