<?php
session_name('kabum-teste-tecnico');
session_start();

require dirname(__DIR__) . '/vendor/autoload.php';

$route = explode('/', filter_input(INPUT_GET, 'route') ?? null);

$controller = $route[0] ? $route[0] : 'clientes';
$action = $route[1] ?? 'index';
$args = array_slice($route, 2)[0] ?? [];

bootstrap($controller, $action, $args);
