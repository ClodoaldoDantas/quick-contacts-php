<?php

namespace App\controllers;

class AuthController
{
  public static function login()
  {
    loadView("auth/login");
  }

  public static function register()
  {
    loadView("auth/register");
  }
}
