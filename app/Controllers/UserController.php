<?php 
require_once BASE_PATH . '/app/Models/User.php';
require_once BASE_PATH . '/core/Views.php';

// TODO:
// - Description, birthdate, username, profile image are viewable fields (for all users)
// - Update profile to update publicly displayed information: birthdate, username, profile image, description will be asked here
// - FE to Friendlist
// - Current profile (toggle button to be public or private)
// - Post section and cateogry section
// - Update profile page when pressed "Edit Profile"

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

        $profileId = $_GET['id'] ?? null;
        if (!$profileId) {
            http_response_code(400);
        }

        $userModel = new User();
        $user = $userModel->getById($profileId);

        if (!$user) 
        {
            http_response_code(404);
        }

        Views::render("user/profile", [
            "username" => $user['username'],
            "description" => $user['description'],
            "totalFriends" => $user['friends'],
            "totalPosts" => $user['posts']
        ]);
    }
}

?>