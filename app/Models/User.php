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
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            return $stmt->execute([$username, $email, $hashedPassword]);
        }
        catch (\PDOException $e)
        {
            return false;
        }
    }

    public function loginUser(string $email, string $password): ?array
    {
        try 
        {
            $stmt = $this->db->prepare("SELECT * FROM users WHERE email = ? LIMIT 1");
            $stmt->execute([$email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$user) {
                return null;
            };

            if (!password_verify($password, $user['password'])) {
                return null; // Password mismatch
            }

            return $user;
        }
        catch (\PDOException $e)
        {
            return null;
        }
    }

    public function updateDescription(string $id, string $description): bool
    {
        try{
            $stmt = $this->db->prepare("UPDATE users SET description = ? WHERE id = ? LIMIT 1");
            $success = $stmt->execute([$description, $id]);
        }
        catch (\PDOException $e)
        {
            return false;
        }
        if ($success)
        {
            return true;
        }

        return false;

    }

        public function updateUsername(string $id, string $username): bool
    {
        try{
            $stmt = $this->db->prepare("UPDATE users SET username = ? WHERE id = ? LIMIT 1");
            $success = $stmt->execute([$username, $id]);
        }
        catch (\PDOException $e)
        {
            return false;
        }
        if ($success)
        {
            return true;
        }

        return false;

    }


    public function updatePassword(string $email, string $password): bool
    {
        try{
            $stmt = $this->db->prepare("UPDATE users SET password = ? WHERE email = ? LIMIT 1");
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $success = $stmt->execute([$hashedPassword, $email]);
        }
        catch (\PDOException $e)
        {
            return false;
        }

        if ($success)
        {
            return true;
        }

        return false;
    }

    public function getById(string $id): ?array
    {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE id = ? LIMIT 1");
        $stmt->execute([$id]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        return $user ?: null;
    }
}   


?>