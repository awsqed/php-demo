<?php
namespace App\Model;

use PDO;
use PDOException;

class LoginModel extends UserModel {

    public function login($username, $password) {
        $userId = $this->findByUsername($username);
        if (!$userId) {
            die(json_encode([
                'success' => false,
                'message' => 'Account does not exist. <a href="/register">Click here to create a new account.</a>'
            ]));
        }

        $this->checkConnection();
        try {
            $stmt = $this->pdo->prepare('SELECT `password` FROM `users` WHERE `username` = :username');
            $stmt->bindParam(':username', $username);
            $stmt->execute();

            $hashedPw = $stmt->fetch(PDO::FETCH_ASSOC)['password'];
            if (!password_verify($password, $hashedPw)) {
                die(json_encode([
                    'success' => false,
                    'message' => 'Wrong username or password.'
                ]));
            }
        } catch (PDOException $e) {
            die(json_encode([
                'success' => false,
                'message' => 'Failed to check password. Error: '. $e->getMessage() .'.'
            ]));
        }

        return $userId;
    }

}
