<?php

namespace App\controllers;

class HomeController
{
  public static function index()
  {
    loadView("home");
  }
}
