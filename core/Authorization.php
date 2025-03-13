<?php

namespace Core;

class Authorization
{
  public function handle(string $access)
  {
    $isAuthenticated = Session::has("user");

    if ($access === "auth" && !$isAuthenticated) {
      redirect("/sign-in");
    }

    if ($access === "guest" && $isAuthenticated) {
      redirect("/contacts");
    }
  }
}
