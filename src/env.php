<?php
$env = envToArray(dirname(__DIR__) . '/.env');

foreach ($env as $key => $value) {
  if (!is_array($value)) {
    define(mb_strtoupper($key), $value);
  } else {
    foreach ($value as $value_key => $value_value) {
      define(mb_strtoupper($key) . '_' . mb_strtoupper($value_key), $value_value);
    }
  }
}

if (defined('ENVIRONMENT') && ENVIRONMENT === 'dev') {
  error_reporting(E_ALL);
  ini_set('display_errors', 'On');
}
