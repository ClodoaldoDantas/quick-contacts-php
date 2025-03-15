<?php

namespace Core;

class Authorization
{
  public static function handle(string $access)
  {
    $isAuthenticated = Session::has("user");

    if ($access === "auth" && !$isAuthenticated) {
      redirect("/sign-in");
    }

    if ($access === "guest" && $isAuthenticated) {
      redirect("/contacts");
    }
  }

  public static function isOwner($resourceId)
  {
    $user = Session::get("user");

    if ($user !== null && isset($user["id"])) {
      $userId = (int) $user["id"];
      return $userId === $resourceId;
    }

    return false;
  }
}
