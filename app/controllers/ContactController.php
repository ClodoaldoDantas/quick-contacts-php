<?php

namespace App\controllers;

use Core\Authorization;
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
    $sql = "SELECT * FROM contacts WHERE user_id = :user_id ORDER BY created_at DESC";

    $contacts = $this->db->query($sql, [
      "user_id" => Session::get("user")["id"]
    ])->fetchAll();

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

    $sql = "INSERT INTO contacts (name, email, phone, user_id) VALUES (:name, :email, :phone, :user_id)";

    $this->db->query($sql, [
      "name" => $name,
      "email" => $email,
      "phone" => $phone,
      "user_id" => Session::get("user")["id"],
    ]);

    Session::setFlashMessage("success_message", "Contato criado com sucesso!");

    redirect("/contacts");
  }

  public function destroy()
  {
    $id = htmlspecialchars($_POST["id"]);

    $contact = $this->db->query("SELECT * FROM contacts WHERE id = :id", [
      "id" => $id
    ])->fetch();

    if (!$contact) {
      Session::setFlashMessage("error_message", "Contato não encontrado");
      redirect("/contacts");
    }

    if (!Authorization::isOwner($contact->user_id)) {
      Session::setFlashMessage("error_message", "Você não tem permissão para deletar este contato");
      redirect("/contacts");
    }

    $this->db->query("DELETE FROM contacts WHERE id = :id", [
      "id" => $id
    ]);

    Session::setFlashMessage("success_message", "Contato deletado com sucesso!");
    redirect("/contacts");
  }
}
