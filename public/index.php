<?php

require_once __DIR__ . "/../vendor/autoload.php";

use Core\Router;

require_once "../utils.php";

$router = new Router();

$router->add("/", "ContactController@index");
$router->add("/contacts/new", "ContactController@create");

$uri = $_SERVER['REQUEST_URI'];
$router->dispatch($uri);
