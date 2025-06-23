<?php

require_once BASE_PATH . '/core/Database.php';

class User
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::connection();
    }

    // Example: create user
    public function createUser(string $username, string $email, string $password): bool
    {
        try 
        {
            $stmt = $this->db->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
            return $stmt->execute([$username, $email, $password]);
        }
        catch (\PDOException $e)
        {
            return false;
        }
    }

    public function loginUser(string $email, string $password): bool
    {
        try 
        {
            $stmt = $this->db->prepare("SELECT * FROM users WHERE email = ? LIMIT 1");
            $stmt->execute([$email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$user) {
                return false;
            };

            if (!password_verify($password, $user['password'])) {
                return false; // Password mismatch
            }

            return true;
        }
        catch (\PDOException $e)
        {
            return false;
        }
    }
}


?>