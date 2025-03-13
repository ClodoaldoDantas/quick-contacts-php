<?php

namespace App\controllers;

use Core\Database;
use Core\Session;
use Core\Validation;

class AuthController
{
  protected $db;

  public function __construct()
  {
    $config = require_once __DIR__ . "/../../config.php";
    $this->db = new Database($config);
  }

  public function login()
  {
    loadView("auth/login");
  }

  public function register()
  {
    loadView("auth/register");
  }

  public function store()
  {
    $name =  htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $password = htmlspecialchars($_POST["password"]);
    $passwordConfirmation = htmlspecialchars($_POST["password_confirmation"]);

    $errors = [];

    if (!Validation::required($name)) {
      $errors["name"] = "Nome é obrigatório";
    }

    if (!Validation::email($email)) {
      $errors["email"] = "E-mail é inválido";
    }

    if (!Validation::min($password, 6)) {
      $errors["password"] = "Senha deve ter no mínimo 6 caracteres";
    }

    if (!Validation::match($password, $passwordConfirmation)) {
      $errors["password_confirmation"] = "Senha e confirmação de senha não conferem";
    }

    if (!empty($errors)) {
      loadView("auth/register", ["errors" => $errors]);
      return;
    }

    $user = $this->db->query("SELECT * FROM users WHERE email = :email", [
      "email" => $email
    ])->fetch();

    if ($user) {
      $errors["email"] = "Credenciais inválidas";
      loadView("auth/register", ["errors" => $errors]);
      return;
    }

    $this->db->query("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)", [
      "name" => $name,
      "email" => $email,
      "password" => password_hash($password, PASSWORD_DEFAULT)
    ]);

    $userId = $this->db->connection->lastInsertId();

    Session::set("user", [
      "id" => $userId,
      "name" => $name,
      "email" => $email
    ]);

    redirect("/contacts");
  }

  public function authenticate()
  {
    $email = htmlspecialchars($_POST["email"]);
    $password = htmlspecialchars($_POST["password"]);

    $errors = [];

    if (!Validation::email($email)) {
      $errors["email"] = "E-mail é inválido";
    }

    if (!Validation::required($password)) {
      $errors["password"] = "Senha é obrigatória";
    }

    if (!empty($errors)) {
      loadView("auth/login", ["errors" => $errors]);
      return;
    }

    $user = $this->db->query("SELECT * FROM users WHERE email = :email", [
      "email" => $email
    ])->fetch();

    if (!$user) {
      $errors["email"] = "Credenciais inválidas";
      loadView("auth/login", ["errors" => $errors]);
      return;
    }

    if (!password_verify($password, $user->password)) {
      $errors["password"] = "Credenciais inválidas";
      loadView("auth/login", ["errors" => $errors]);
      return;
    }

    Session::set("user", [
      "id" => $user->id,
      "name" => $user->name,
      "email" => $user->email
    ]);

    redirect("/contacts");
  }
}
