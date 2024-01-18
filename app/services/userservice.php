<?php

namespace services;

use PDO;
use repositories\userrepository;

require_once __DIR__ . '/../repositories/userRepository.php';
require_once __DIR__ . '/../models/user.php';

class userservice
{
    private $userRepository;

    public function __construct(PDO $dbConnection)
    {
        $this->userRepository = new userrepository($dbConnection);
    }

    public function verifyUser($username, $password)
    {
        $user = $this->userRepository->verifyUserCredentials($username, $password);
        if ($user) {
            return $user;
        }
        return null;
    }

    public function addUser(user $user)
    {
        $this->userRepository->addUser(
            $user->getUsername(),
            $user->getPassword(),
            $user->getEmail()
        );
    }
    public function getAllUsers()
    {
        return $this->userRepository->getAllUsers();
    }
    public function getUserInfo($username)
    {
        return $this->userRepository->getUserDetails($username);
    }
}