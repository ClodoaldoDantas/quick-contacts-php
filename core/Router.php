<?php

namespace Core;

class Router
{
  private $routes = [];

  private function registerRoute(string $method, string $route, string $action)
  {
    $this->routes[$method][$route] = $action;
  }

  public function get(string $route, string $action)
  {
    $this->registerRoute('GET', $route, $action);
  }

  public function post(string $route, string $action)
  {
    $this->registerRoute('POST', $route, $action);
  }

  public function dispatch(string $uri)
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
