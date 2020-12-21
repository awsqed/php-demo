<?php
namespace App\Ultility;

class Utils {

    public static function generateHashedPassword($password, $salt = '') {
        if (empty($salt)) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#%^&*()';
            $charactersLength = strlen($characters);
            $salt = '';
            for ($i = 0; $i < 16; $i++) {
                $salt .= $characters[rand(0, $charactersLength - 1)];
            }
        }

        $hashedPw = $salt .'$'. hash('sha256', hash('sha256', $password) . $salt);
        return $hashedPw;
    }

    public static function validateInput($input) {
        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input);
        return $input;
    }

}
