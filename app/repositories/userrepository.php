<?php

namespace repositories;

use PDO;
use PDOException;
use user;

require_once __DIR__ . '/../config/dbconfig.php';
require_once __DIR__ . '/../models/user.php';

class userrepository
{
    private $database;

    public function __construct(PDO $dbConnection)
    {
        $this->database = $dbConnection;
    }

    public function verifyUserCredentials($username, $password)
    {
        try {
            $sql = "SELECT * FROM Users WHERE Username = :username";
            $stmt = $this->database->prepare($sql);
            $stmt->bindParam(':username', $username);
            $stmt->execute();

            $userArray = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($userArray && password_verify($password, $userArray['Password'])) {
                $user = new user();
                $user->setId($userArray['UserID']);
                $user->setUsername($userArray['Username']);
                $user->setEmail($userArray['Email']);
                $user->setPassword($userArray['Password']);
                return $user;
            }
            return null;
        } catch (PDOException $e) {
            error_log($e->getMessage());
            echo "Error verifying user: " . $e->getMessage();
        }
    }

    public function addUser($username, $password, $email)
    {
        try {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO Users (Username, Password, Email) VALUES (:username, :password, :email)";
            $stmt = $this->database->prepare($sql);

            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $hashedPassword);
            $stmt->bindParam(':email', $email);

            $stmt->execute();
        } catch (PDOException $e) {
            error_log($e->getMessage());
            echo "Error adding user: " . $e->getMessage();
        }

    }

    public function getAllUsers()
    {
        try {
            $sql = "SELECT * FROM Users";
            $stmt = $this->database->prepare($sql);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, \model\user::class);
            $users = $stmt->fetchAll();
            return $users;
        } catch (PDOException $e) {
            error_log($e->getMessage());
            echo "Error getting all users: " . $e->getMessage();
        }
    }

    public function getUserByUsername($username)
    {
        try {
            $sql = "SELECT * FROM Users WHERE Username = :username";
            $stmt = $this->database->prepare($sql);
            $stmt->bindParam(':username', $username);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, \model\user::class);
            $user = $stmt->fetch();
            return $user;
        } catch (PDOException $e) {
            error_log($e->getMessage());
            echo "Error getting user: " . $e->getMessage();
        }
    }
}