<?php

require_once __DIR__ . "/../vendor/autoload.php";

use Core\Router;

$router = new Router();

$router->add("/", "HomeController@index");

$uri = $_SERVER['REQUEST_URI'];
$router->dispatch($uri);
