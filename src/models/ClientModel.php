<?php

namespace App\Models;

use App\Models\Model;

class ClientModel extends Model
{
  protected $table = 'clients';

  const COLUMNS = [
    'nome',
    'data_nascimento',
    'telefone',
    'cpf',
    'rg',
  ];

  const ADDRESS_COLUMNS = [
    'endereco',
    'numero',
    'bairro',
    'complemento',
    'cep',
    'cidade',
    'estado',
  ];

  public function find($find) {
    $cliente = parent::find($find);

    if($cliente) {
      $cliente->data_nascimento = mysql_date_to_str($cliente->data_nascimento);

      $stmt = $this->connection->prepare('SELECT `endereco` FROM `clients_address` WHERE `client_id` = :id');
      $stmt->bindValue(':id', $cliente->id);
      $stmt->execute();
      $cliente->endereco = json_decode($this->processResults($stmt)[0]->endereco ?? '');

      if(!$cliente->endereco) {
        $endereco = new \stdClass();
        foreach (self::ADDRESS_COLUMNS as $column) {
          $endereco->{$column} = '';
        }
        $cliente->endereco = [$endereco];
      }
    }

    return $cliente;
  }

  public function create(array $data = []) {
    if (!$this->table) {
      throw new \Exception("Tabela não definida");
    }

    $vars = [];
    $temp = [];
    $columns = [];

    $data['created_at'] = date('Y-m-d H:i:s');
    $data['updated_at'] = date('Y-m-d H:i:s');

    $endereco = $data['endereco'];
    unset($data['endereco']);

    $query = "INSERT INTO `{$this->table}`(";
    foreach ($data as $key => $value) {
      $temp[] .= ":{$key}";
      $vars[":{$key}"] = $value;
      $columns[] = "`{$key}`";
    }
    $query .= implode(', ', $columns) . ") VALUES (";
    $query .= implode(', ', $temp) . ")";

    $this->connection->beginTransaction();
    try {
      $stmt = $this->connection->prepare($query);
      foreach ($vars as $key => $value) {
        $stmt->bindValue($key, $value);
      }
      $stmt->execute();

      $id = $this->connection->lastInsertId();

      $stmt = $this->connection->prepare("INSERT INTO `clients_address`(`client_id`, `endereco`,`created_at`,`updated_at`) VALUES " .
        "(:id, :endereco, :created_at, :updated_at)");
      $stmt->bindValue(':id', $id);
      $stmt->bindValue(':endereco', $endereco);
      $stmt->bindValue(':created_at', $data['created_at']);
      $stmt->bindValue(':updated_at', $data['updated_at']);
      $stmt->execute();

      $this->connection->commit();

      return true;
    } catch(\Exception $e) {
      $this->connection->rollback();
      return null;
    }
  }

  static public function processRequest() {
    $data = [];
    $errors = [];
    foreach(self::COLUMNS as $campo) {
      $data[$campo] = strip_tags(trim(filter_input(INPUT_POST, $campo)));

      if(empty($data[$campo])) {
        $errors['#' . $campo] = 'Campo obrigatório';
      }
    }

    $endereco_array = [];
    if(isset($_POST['endereco']) && count($_POST['endereco'])) {
      foreach($_POST['endereco'] as $index => $endereco) {
        $item = [];
        foreach(self::ADDRESS_COLUMNS as $campo) {
          $item[$campo] = strip_tags(trim($_POST[$campo][$index]));

          if($campo !== 'complemento') {
            if(empty($item[$campo])) {
              $errors["[name={$campo}\\[\\]]:eq({$index})"] = 'Campo obrigatório';
            }
          }
        }
        $endereco_array[] = $item;
      }
    }

    $data['endereco'] = json_encode($endereco_array);

    $request = new \stdClass();
    $request->data = $data;
    $request->errors = $errors;

    return $request;
  }

  public function update(array $data, int $id) {
    if (!$this->table) {
      throw new \Exception("Tabela não definida");
    }

    $vars = [];
    $temp = [];

    $data['updated_at'] = date('Y-m-d H:i:s');

    $endereco = $data['endereco'];
    unset($data['endereco']);

    $query = "UPDATE `{$this->table}` SET ";
    foreach ($data as $key => $value) {
      $temp[] .= "`{$key}` = :{$key}";
      $vars[":{$key}"] = $value;
    }
    $query .= implode(', ', $temp) . " WHERE `{$this->primary_key}` = :id";

    $this->connection->beginTransaction();
    try {
      $stmt = $this->connection->prepare($query);
      foreach ($vars as $key => $value) {
        $stmt->bindValue($key, $value);
      }
      $stmt->bindValue(':id', $id);
      $stmt->execute();

      $stmt = $this->connection->prepare("UPDATE `clients_address` SET `endereco` = :endereco, `updated_at` = :updated_at WHERE `client_id` = :id");
      $stmt->bindValue(':id', $id);
      $stmt->bindValue(':endereco', $endereco);
      $stmt->bindValue(':updated_at', $data['updated_at']);
      $stmt->execute();

      $this->connection->commit();

      return true;
    } catch(\Exception $e) {
      $this->connection->rollback();
      return null;
    }
  }
}
