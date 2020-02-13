<?php

namespace App\Functions;

if (!function_exists('App\Functions\get')) {
  function get(string $varname)
  {
    return filter_input(INPUT_GET, $varname) ?? null;
  }
}

if (!function_exists('App\Functions\bootstrap')) {
  function bootstrap($controller, $action, $args)
  {
    $__className = '\\App\\Controllers\\' . ucfirst($controller) . 'Controller';
    $__notFound = true;

    if (class_exists($__className)) {
      $class = new $__className;
      if (method_exists($class, $action)) {
        $__notFound = false;
        echo $class->{$action}($args);
      }
    }

    if ($__notFound) {
      echo '404';
    }
  }
}

if (!function_exists('App\Functions\view')) {
  function view(string $filename, array $vars = [], string $htmlClass = '')
  {
    $filename = str_replace('.', '/', $filename) . '.php';

    $file = dirname(__DIR__) . '/src/views/' . $filename;

    if (file_exists($file)) {
      foreach ($vars as $varname => $value) {
        $$varname = $value;
      }

      require_once dirname(__DIR__) . '/src/views/partials/header.php';
      require_once $file;
      require_once dirname(__DIR__) . '/src/views/partials/footer.php';
    } else {
      return "Arquivo <code>{$filename}</code> não encontrado.";
    }
  }
}
