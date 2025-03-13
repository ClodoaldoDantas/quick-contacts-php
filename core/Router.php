<?php

namespace Core;

use App\controllers\ErrorController;

class Router
{
  private $routes = [];

  private function registerRoute(string $method, string $route, string $action, string $access)
  {
    $this->routes[$method][$route] = [
      'action' => $action,
      'access' => $access
    ];
  }

  public function get(string $route, string $action, string $access = "")
  {
    $this->registerRoute('GET', $route, $action, $access);
  }

  public function post(string $route, string $action, string $access = "")
  {
    $this->registerRoute('POST', $route, $action, $access);
  }

  public function dispatch(string $uri)
  {
    $method = $_SERVER['REQUEST_METHOD'];

    if (!isset($this->routes[$method][$uri])) {
      ErrorController::notFound();
      return;
    }

    $route = $this->routes[$method][$uri];

    (new Authorization())->handle($route["access"]);

    [$controller, $method] = explode("@", $route['action']);
    $controllerClass = "App\\controllers\\{$controller}";

    if (!class_exists($controllerClass)) {
      throw new \Exception("Controller class {$controllerClass} not found");
    }

    $controllerInstance = new $controllerClass();

    if (!method_exists($controllerInstance, $method)) {
      throw new \Exception("Method {$method} not found in controller {$controllerClass}");
    }

    $controllerInstance->$method();
  }
}
