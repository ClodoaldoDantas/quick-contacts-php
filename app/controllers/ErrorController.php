<?php

namespace App\controllers;

class ErrorController
{
  public static function notFound()
  {
    http_response_code(404);
    loadView("not-found");
  }
}
