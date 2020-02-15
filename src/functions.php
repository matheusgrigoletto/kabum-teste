<?php

/**
 * Verifica o login
 * @param bool $is_login
 */
function auth($is_login = false) {
  if(!isset($_SESSION['uid'])) {
    if(!$is_login) {
      redirect('login');
    }
  } else {
    if($is_login) {
      redirect('clientes');
    }
  }
}

/**
 * Bootstrap de rotas e carregamento de controller/view
 * @param $controller
 * @param $action
 * @param $args
 */
function bootstrap($controller, $action, $args) {
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
    echo 'Página não enocntrada.';
  }
}

/**
 * Carregar view
 * @param string $filename
 * @param array $vars
 * @param string $htmlClass
 * @return bool|string
 */
function view(string $filename, array $vars = [], string $htmlClass = '') {
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

/**
 * Converte data dd/mm/AAAA para formato mysql
 * @param $str
 * @return array|string|null
 */
function str_to_mysql_date($str) {
  $str = trim($str);
  $dt = null;

  if($str != '') {
    $dt = explode('/', $str);
    $dt = implode('-', array_reverse($dt));
  } else {
    $dt = null;
  }

  return $dt;
}

/**
 * Converte data mysql para dd/mm/AAAA
 * @param $str
 * @return array|string|null
 */
function mysql_date_to_str($str) {
  $str = trim($str);
  $dt = null;

  if($str != '') {
    $dt = explode('-', $str);
    $dt = implode('/', array_reverse($dt));
  } else {
    $dt = null;
  }

  return $dt;
}

/**
 * Dump & Die
 * @param $obj
 */
function dd($obj) {
  var_dump($obj);
  die;
}

/**
 * Retorna a response em JSON
 * @param array $response
 */
function json($response = []) {
  header('Expires: Tue, 01 Jan 2000 00:00:00 GMT');
  header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
  header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
  header('Cache-Control: post-check=0, pre-check=0', false);
  header('Pragma: no-cache');
  header('Content-Type: application/json; charset=UTF-8');

  echo json_encode($response);
}

/**
 * Redirecionar
 * @param string $uri
 */
function redirect($uri = '') {
  header('Location: ' . BASE_URL . $uri);
}

/**
 * Ler conteúdo do arquivo .env e retornar em array
 * @param $envPath
 * @return array
 */
function envToArray($envPath) {
  $variables = [];
  $content = file_get_contents($envPath);
  $lines = explode("\n", $content);
  if($lines) {
    foreach($lines as $line) {
      if($line !== "") {
        $equalsLocation = strpos($line, '=');
        $key = substr($line, 0, $equalsLocation);
        $value = substr($line, ($equalsLocation + 1), strlen($line));
        $variables[$key] = trim($value);
      }
    }
  }
  return $variables;
}
