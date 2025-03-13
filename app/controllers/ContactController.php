<?php

namespace App\controllers;

use Core\Database;
use Core\Session;
use Core\Validation;

class ContactController
{
  protected $db;

  public function __construct()
  {
    $config = require_once __DIR__ . "/../../config.php";
    $this->db = new Database($config);
  }

  public function index()
  {
    $contacts = $this->db->query("SELECT * FROM contacts ORDER BY created_at DESC")->fetchAll();
    loadView("contacts/list", ["contacts" => $contacts]);
  }

  public function create()
  {
    loadView("contacts/create");
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
      loadView("contacts/create", ["errors" => $errors]);
      return;
    }

    $sql = "INSERT INTO contacts (name, email, phone) VALUES (:name, :email, :phone)";

    $this->db->query($sql, [
      "name" => $name,
      "email" => $email,
      "phone" => $phone
    ]);

    Session::setFlashMessage("success_message", "Contato criado com sucesso!");

    header("Location: /");
    exit;
  }
}
