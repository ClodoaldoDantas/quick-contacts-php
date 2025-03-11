<?php

namespace Core;

class Session
{
  public static function start()
  {
    if (session_start() === PHP_SESSION_NONE) {
      session_start();
    }
  }

  public static function setFlashMessage($key, $message)
  {
    $_SESSION["flash_{$key}"] = $message;
  }

  public static function getFlashMessage($key, $default = null)
  {
    if (isset($_SESSION["flash_{$key}"])) {
      $message = $_SESSION["flash_{$key}"];
      unset($_SESSION["flash_{$key}"]);
      return $message;
    }

    return $default;
  }
}
