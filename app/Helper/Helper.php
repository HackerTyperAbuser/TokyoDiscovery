<?php

class Helper
{
    public static function passwordPolicyValidator(string $password): bool
    {
        $policy = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^\w\s])([^\s]{8,})$/";

        if (preg_match($policy, $password))
        {
            return true;
        }
        return false;
    }

    public static function tokenGenerator($length): string
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }

        return $randomString;
    }
}


?>