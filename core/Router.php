<?php

namespace Core;

class Router
{
  private $routes = [];

  public function add($method, $route, $action)
  {
    $this->routes[$method][$route] = $action;
  }

  public function dispatch($uri)
  {
    $method = $_SERVER['REQUEST_METHOD'];

    if (isset($this->routes[$method][$uri])) {
      [$controller, $method] = explode("@", $this->routes[$method][$uri]);
      $controllerClass = "App\\controllers\\{$controller}";

      if (!class_exists($controllerClass)) {
        throw new \Exception("Controller class {$controllerClass} not found");
      }

      $controllerInstance = new $controllerClass();

      if (!method_exists($controllerInstance, $method)) {
        throw new \Exception("Method {$method} not found in controller {$controllerClass}");
      }

      $controllerInstance->$method();
    } else {
      echo "404 Not Found";
    }
  }
}
