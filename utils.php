<?php

function loadPartial($name)
{
  $path = __DIR__ . "/app/views/partials/{$name}.php";

  if (file_exists($path)) {
    require_once $path;
  } else {
    echo "Partial {$name} not found";
  }
}

function loadView($view, $data = [])
{
  $path = __DIR__ . "/app/views/{$view}.php";

  if (file_exists($path)) {
    extract($data);
    require_once $path;
  } else {
    echo "View {$view} not found";
  }
}
