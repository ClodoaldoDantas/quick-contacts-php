<?php

namespace Core;

class Validation
{
  public static function required(string $value)
  {
    return !empty($value);
  }

  public static function email(string $value)
  {
    return filter_var($value, FILTER_VALIDATE_EMAIL);
  }
}
