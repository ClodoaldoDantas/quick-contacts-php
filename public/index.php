<?php

require_once __DIR__ . "/../vendor/autoload.php";

use Core\Router;
use Core\Session;

Session::start();

require_once "../utils.php";

$router = new Router();

$router->get("/", "HomeController@index");

# Guest routes
$router->get("/sign-in", "AuthController@login", "guest");
$router->get("/sign-up", "AuthController@register", "guest");
$router->post("/sign-up", "AuthController@store", "guest");

# Auth routes
$router->get("/contacts", "ContactController@index", "auth");
$router->get("/contacts/new", "ContactController@create", "auth");
$router->post("/contacts", "ContactController@store", "auth");

// Get the current URI without query string
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$router->dispatch($uri);
