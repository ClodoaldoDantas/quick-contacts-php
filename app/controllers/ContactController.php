<?php

namespace App\controllers;

class ContactController
{
  public function index()
  {
    loadView("contacts");
  }

  public function create()
  {
    loadView("create-contact");
  }
}
