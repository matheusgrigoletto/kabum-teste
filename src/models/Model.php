<?php

namespace App\Models;

use App\Models\Connection;

class Model extends Connection
{
  protected $table = '';

  protected $primary_key = 'id';

  public function find($find)
  {
    if (!is_int($find) && !is_array($find)) {
      throw new \Exception("Parâmetro inválido");
    }

    if (!$this->table) {
      throw new \Exception("Tabela não definida");
    }

    if (is_int($find)) {
      $find = [$this->primary_key => $find];
    }

    $vars = [];
    $query = "SELECT * FROM `{$this->table}` WHERE (";
    $temp = [];
    foreach ($find as $key => $value) {
      $temp[] .= "`{$key}` = :{$key}";
      $vars[":{$key}"] = $value;
    }
    $query .= implode(' AND ', $temp) . ") LIMIT 1";

    $stmt = $this->connection->prepare($query);
    foreach ($vars as $key => $value) {
      $stmt->bindValue($key, $value);
    }

    $stmt->execute();

    return $this->processResults($stmt)[0] ?? null;
  }

  public function all()
  {
    if (!$this->table) {
      throw new \Exception("Tabela não definida");
    }

    $stmt = $this->connection->prepare("SELECT * FROM `{$this->table}` ORDER BY `updated_at` DESC");
    $stmt->execute();

    return $this->processResults($stmt) ?? [];
  }

  protected function processResults($statement)
  {
    $results = [];

    if ($statement) {
      while ($row = $statement->fetch(\PDO::FETCH_OBJ)) {
        $results[] = $row;
      }
    }

    return $results;
  }

  public function create()
  {
    return null;
  }

  public function update()
  {
    return null;
  }

  public function delete()
  {
    return null;
  }
}
