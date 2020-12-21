<?php
namespace App\Model;

use PDO;
use PDOException;
use App\Core\Model;

class ProfileModel extends Model {

    public function getProfile($userId) {
        $this->checkConnection();
        try {
            $stmt = $this->pdo->prepare(
                'SELECT `username`, `first_name`, `last_name`, `gender`, `date_of_birth` FROM `users` WHERE `id` = :id'
            );
            $stmt->bindParam(':id', $userId);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            die(json_encode([
                'success' => false,
                'message' => 'Failed to get user profile by ID. Error: '. $e->getMessage() .'.'
            ]));
        }
    }

    public function editProfile($userId, $firstName, $lastName, $gender, $dateOfBirth) {
        $this->checkConnection();
        try {
            $stmt = $this->pdo->prepare(
                'UPDATE `users` SET `first_name` = :fname, `last_name` = :lname, `gender` = :gender, `date_of_birth` = :birthday WHERE `id` = :id'
            );
            $stmt->bindParam(':fname', $firstName);
            $stmt->bindParam(':lname', $lastName);
            $stmt->bindParam(':gender', $gender);
            $stmt->bindParam(':birthday', $dateOfBirth);
            $stmt->bindParam(':id', $userId);
            return $stmt->execute();
        } catch (PDOException $e) {
            die(json_encode([
                'success' => false,
                'message' => 'Failed to edit user profile. Error: '. $e->getMessage() .'.'
            ]));
        }
    }

    public function deleteProfile($userId) {
        $this->checkConnection();
        try {
            $stmt = $this->pdo->prepare('DELETE FROM `users` WHERE `id` = :id');
            $stmt->bindParam(':id', $userId);
            return $stmt->execute();
        } catch (PDOException $e) {
            die(json_encode([
                'success' => false,
                'message' => 'Failed to delete user. Error: '. $e->getMessage() .'.'
            ]));
        }
    }

}