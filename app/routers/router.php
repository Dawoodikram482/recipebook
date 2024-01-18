<?php

namespace routers;

use controllers\recipecontroller;
use controllers\usercontroller;

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/../controllers/usercontroller.php';
require_once __DIR__ . '/../controllers/recipecontroller.php';

class router
{
    public function route($uri)
    {
        $uri = $this->stripParameters($uri);

        switch ($uri) {
            case '':
            case 'login':
                $controller = new usercontroller();
                $controller->showLoginPage();
                break;
            case 'signup':
                $controller = new usercontroller();
                $controller->showSignUpPage();
                break;
            case 'homepage':
                $controller = new usercontroller();
                $controller->showHomePage();
                break;
            case 'searchpage':
                $controller = new recipecontroller();
                $controller->showSearchPage();
                break;
            case 'createrecipe':
                $controller = new recipecontroller();
                $controller->showCreateRecipePage();
                break;
            case 'editrecipe':
                $controller = new recipecontroller();
                $controller->showEditRecipePage();
                break;
            case 'loginAction':
                $controller = new usercontroller();
                $controller->login();
                break;
        }
    }

    private function stripParameters($uri)
    {
        if (str_contains($uri, '?')) {
            $uri = substr($uri, 0, strpos($uri, '?'));
        }
        return $uri;
    }
//    public function addRoute($uri, $controllerMethod)
//    {
//        $this->routes[$uri] = $controllerMethod;
//    }
//    public function handleRequest()
//    {
//        $requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
//
//        if (array_key_exists($requestUri, $this->routes) &&
//            $_SERVER['REQUEST_METHOD'] == (strpos($requestUri, 'Action') ? 'POST' : 'GET')) {
//            $controllerMethod = $this->routes[$requestUri];
//            $controller = new $controllerMethod[0]();
//            $action = $controllerMethod[1];
//            $controller->$action();
//        } else {
//            http_response_code(404);
//            echo "404 Not Found";
//        }
//    }

}
