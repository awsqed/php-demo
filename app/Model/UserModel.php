<?php
namespace App\Model;

use PDO;
use PDOException;
use App\Core\Model;

class UserModel extends Model {

    protected function findByUsername($username) {
        $this->checkConnection();
        try {
            $stmt = $this->pdo->prepare('SELECT `id` FROM `users` WHERE `username` = :username');
            $stmt->bindParam(':username', $username);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['id'];
        } catch (PDOException $e) {
            die(json_encode([
                'success' => false,
                'message' => 'Failed to find user by name. Error: '. $e->getMessage() .'.'
            ]));
        }
    }

}
