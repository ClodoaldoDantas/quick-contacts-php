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

  public static function set(string $key, mixed $value)
  {
    $_SESSION[$key] = $value;
  }

  public static function get(string $key, mixed $default = null)
  {
    return isset($_SESSION[$key]) ? $_SESSION[$key] : $default;
  }

  public static function has(string $key)
  {
    return isset($_SESSION[$key]);
  }

  public static function clear(string $key)
  {
    if (isset($_SESSION[$key])) {
      unset($_SESSION[$key]);
    }
  }

  public static function clearAll()
  {
    session_unset();
    session_destroy();
  }

  public static function setFlashMessage(string $key, string $message)
  {
    self::set("flash_{$key}", $message);
  }

  public static function getFlashMessage($key, $default = null)
  {
    $message = self::get("flash_{$key}", $default);
    self::clear("flash_{$key}");

    return $message;
  }
}
