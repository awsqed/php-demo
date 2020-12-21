<?php
namespace App\Model;

use PDOException;

class RegisterModel extends UserModel {

    public function register($username, $password) {
        if ($this->findByUsername($username)) {
            die(json_encode([
                'success' => false,
                'message' => 'An account with this username is already existed.'
            ]));
        }

        $this->checkConnection();
        try {
            $stmt = $this->pdo->prepare('INSERT INTO `users` (username, password) VALUES (:username, :password)');
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $password);
            $stmt->execute();

            return $this->findByUsername($username);
        } catch (PDOException $e) {
            die(json_encode([
                'success' => false,
                'message' => 'Failed to create new user. Error: '. $e->getMessage() .'.'
            ]));
        }
    }

}