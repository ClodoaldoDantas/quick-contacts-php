<?php

namespace Core;

use PDO;

class Database
{
  public $connection;

  public function __construct($config)
  {
    $dsn = "mysql:host={$config['DB_HOST']};port={$config['DB_PORT']};dbname={$config['DB_NAME']};charset=utf8";

    $options = [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
    ];

    try {
      $this->connection = new PDO($dsn, $config['DB_USER'], $config['DB_PASS'], $options);
    } catch (\PDOException $e) {
      throw new \Exception("Connection failed: " . $e->getMessage());
    }
  }

  public function query($sql, $params = [])
  {
    try {
      $sth = $this->connection->prepare($sql);

      foreach ($params as $param => $value) {
        $sth->bindValue(":$param", $value);
      }

      $sth->execute();

      return $sth;
    } catch (\PDOException $e) {
      throw new \Exception("Query failed: " . $e->getMessage());
    }
  }
}
