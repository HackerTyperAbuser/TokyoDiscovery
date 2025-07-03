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
    public static function showDashboard()
    {
        Views::render("home/dashboard");
        return;
    }

    public static function showEditProfileForm()
    {
        Views::render("user/editProfile");
        return;
    }

    public static function updateProfile()
    {
        return;
    }

    public static function updateVisible()
    {
        http_response_code(200);

        // Output the JSON
        echo json_encode([
            'success' => true,
            'visibility' => 'Private',
            'message' => 'Visibility updated successfully.'
        ]);
        exit;
    }

    public static function showProfile() 
    {
        if (!isset($_SESSION['id'])) {
            Views::render("auth/login", [
                "message" => "You must log in first",
                "color" => "red",
            ]);
            exit;
        }

        $profileId = $_GET['id'] ?? null;
        if (!$profileId) {
            http_response_code(400);
            echo "Missing id";
            exit;
        }

        $current = false;
        if($_SESSION['id'] == $profileId) {
            $current = true;
        }

        $userModel = new User();
        $user = $userModel->getById($profileId);

        if (!$user) 
        {
            http_response_code(404);
            echo "User does not exist";
            exit;
        }

        Views::render("user/profile", [
            "username" => $user['username'],
            "description" => $user['description'],
            "totalFriends" => $user['friends'],
            "totalPosts" => $user['posts'],
            "current" => $current
        ]);
    }
}

?>