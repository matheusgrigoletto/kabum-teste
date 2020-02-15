<?php

namespace App\Models;

class Connection
{
  protected $host = null;
  protected $user = null;
  protected $pass = null;
  protected $database = null;
  protected $connection = null;

  public function __construct() {
    $this->host = DB_HOST;
    $this->user = DB_USER;
    $this->pass = DB_PASS;
    $this->database = DB_DATABASE;
    $this->connection = null;

    try {
      $this->connection = new \PDO(
        'mysql:host=' . $this->host . ';dbname=' . $this->database,
        $this->user,
        $this->pass,
        [
          \PDO::ATTR_PERSISTENT => true,
          \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
        ]
      );
      $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    } catch (\Exception $e) {
      die('Falha na conexão com o banco de dados: ' . $e->getMessage());
    }
  }
}
