<?php

namespace App\controllers;

use Core\Database;
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
    loadView("contacts", ["contacts" => $contacts]);
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

    $sql = "INSERT INTO contacts (name, email, phone) VALUES (:name, :email, :phone)";

    $this->db->query($sql, [
      "name" => $name,
      "email" => $email,
      "phone" => $phone
    ]);

    header("Location: /");
    exit;
  }
}
