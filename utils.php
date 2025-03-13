<?php

/**
 * Loads a partial view
 * 
 * @param string $name
 * @return void
 */
function loadPartial(string $name, array $data = [])
{
  $path = __DIR__ . "/app/views/partials/{$name}.php";

  if (file_exists($path)) {
    extract($data);
    require_once $path;
  } else {
    echo "Partial {$name} not found";
  }
}

/**
 * Loads a view
 * 
 * @param string $name
 * @param array $data
 * @return void
 */
function loadView(string $name, array $data = [])
{
  $path = __DIR__ . "/app/views/{$name}.view.php";

  if (file_exists($path)) {
    extract($data);
    require_once $path;
  } else {
    echo "View {$view} not found";
  }
}

/**
 * Redirects to a given URL
 * @param string $url
 * @return void
 */
function redirect(string $url)
{
  header("Location: {$url}");
  exit;
}

/**
 * Removes phone mask
 * 
 * @param string $phone
 * @return string
 */
function removePhoneMask(string $phone)
{
  return preg_replace("/\D/", "", $phone);
}

/**
 * Gets initials from a name
 * 
 * @param string $name
 * @return string
 */
function getInitials(string $name)
{
  $parts = explode(' ', $name);
  $initials = '';

  foreach ($parts as $part) {
    $initials .= $part[0];
  }

  return substr($initials, 0, 2);
}
