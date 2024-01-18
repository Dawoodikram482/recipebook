<?php

namespace controllers;

use config\dbconfig;
use Exception;
use PDOException;
use services\recipeservice;
use services\userservice;
use user;


require_once __DIR__ . '/../config/dbconfig.php';
require_once __DIR__ . '/../models/user.php';
require_once __DIR__ . '/../services/userservice.php';
require_once __DIR__ . '/../services/recipeservice.php';

class usercontroller
{
    private $userservice;
    private $recipeservice;
    private $dbConnection;

    public function __construct()
    {
        $dbConfig = new dbconfig();
        $this->dbConnection = $dbConfig->connect();
        $this->userservice = new userservice($this->dbConnection);
        $this->recipeservice = new recipeservice($this->dbConnection);
    }

    public function showLoginPage()
    {
        $pageTitle = "Login";
        require __DIR__ . '/../views/login.php';
    }

    public function showSignUpPage()
    {
        $pageTitle = "Sign Up";
        require __DIR__ . '/../views/signup.php';
    }

    public function showHomePage()
    {
        $pageTitle = "Home";
        require '../views/homepage.php';
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = htmlspecialchars($_POST['username']);
            $password = htmlspecialchars($_POST['password']);
            $user = $this->userservice->verifyUser($username, $password);
            if ($user) {
                $_SESSION['username'] = $username;
                $_SESSION['userID'] = $user->getId();
                header('Location: /homepage');
                exit;
            } else {
                $loginError = "Invalid username or password";
                $pageTitle = "Login";
                require '../views/login.php';
            }
        }
    }

    public function signup()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = htmlspecialchars($_POST['username']);
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);

            $user = new user();
            $user->setUsername($username);
            $user->setEmail($email);
            $user->setPassword($password);
            try {
                $this->userservice->addUser($user);
                $_SESSION['username'] = $username->getUsername();
                header("Location: /");
                exit;
            } catch (Exception $e) {
                $_SESSION['error'] = "Username or email already exists" . $e->getMessage();
                header("Location: /signup");
                exit;
            }

        }
    }
}