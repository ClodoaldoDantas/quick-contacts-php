<?php

namespace Core;

class Validation
{
  public static function required(string $value)
  {
    return !empty(trim($value));
  }

  public static function email(string $value)
  {
    return filter_var(trim($value), FILTER_VALIDATE_EMAIL);
  }

  public static function min(string $value, int $length)
  {
    $str = trim($value);

    if (self::required($str)) {
      return strlen($str) >= $length;
    }

    return false;
  }

  public static function match(string $value, string $match)
  {
    return trim($value) === trim($match);
  }
}
