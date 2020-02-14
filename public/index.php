<?php
session_name('kabum-teste-tecnico');
session_start();

require dirname(__DIR__) . '/vendor/autoload.php';

use function App\Functions\get;
use function App\Functions\auth;
use function App\Functions\bootstrap as app;

$route = explode('/', get('route'));

$controller = $route[0] ? $route[0] : 'clientes';
$action = $route[1] ?? 'index';
$args = array_slice($route, 2) ?? [];

//auth();
app($controller, $action, $args);
