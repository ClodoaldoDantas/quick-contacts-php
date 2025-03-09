<?php

namespace App\controllers;

use Core\Validation;

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

  public function store()
  {
    $name =  htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $phone = htmlspecialchars($_POST["phone"]);

    $errors = [];

    if (!Validation::required($name)) {
      $errors["name"] = "Nome é obrigatório";
    }

    if (!Validation::email($email)) {
      $errors["email"] = "Email é inválido";
    }

    if (!Validation::required($phone)) {
      $errors["phone"] = "Telefone é obrigatório";
    }

    if (!empty($errors)) {
      loadView("create-contact", ["errors" => $errors]);
      return;
    }

    echo "Contato criado com sucesso";
  }
}
