<?php

namespace Core;

class Router
{
  private $routes = [];

  public function add($route, $action)
  {
    $this->routes[$route] = $action;
  }

  public function dispatch($uri)
  {
    if (isset($this->routes[$uri])) {
      [$controller, $method] = explode("@", $this->routes[$uri]);
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
