<?php

require_once __DIR__ . "/../vendor/autoload.php";

use Core\Router;
use Core\Session;

Session::start();

require_once "../utils.php";

$router = new Router();

$router->get("/", "HomeController@index");
$router->get("/contacts", "ContactController@index");
$router->get("/contacts/new", "ContactController@create");
$router->post("/contacts", "ContactController@store");

// Get the current URI without query string
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$router->dispatch($uri);
