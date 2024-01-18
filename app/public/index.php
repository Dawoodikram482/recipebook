<?php

use routers\router;

require_once __DIR__ . '/../routers/router.php';

$router = new router();
$uri = trim($_SERVER['REQUEST_URI'], '/');

$router->route($uri);

