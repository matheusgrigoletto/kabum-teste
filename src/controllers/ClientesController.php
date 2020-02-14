<?php

namespace App\Controllers;

use App\Models\ClientModel;
use function App\Functions\auth;
use function App\Functions\view;
use function App\Functions\str_to_mysql_date;
use function App\Functions\dd;

class ClientesController
{
  public function __construct()
  {
    auth();
  }

  public function index()
  {
    try {
      $clientModel = new ClientModel();

      return view('clientes.index', [
        'dataset' => $clientModel->all(),
      ], 'page-clientes');
    } catch (\Exception $e) {
      return $e->getMessage();
    }
  }

  public function create()
  {
    try {
      $errors = [];
      $values = [];

      if(isset($_SESSION['validation-errors'])) {
        $errors = $_SESSION['validation-errors'];
        unset($_SESSION['validation-errors']);
      }

      if(isset($_SESSION['validation-values'])) {
        $values = $_SESSION['validation-values'];
        unset($_SESSION['validation-values']);
      }

      return view('clientes.create', [
        'errors' => $errors,
        'values' => $values,
      ], 'page-clientes page-clientes-create');
    } catch (\Exception $e) {
      return $e->getMessage();
    }
  }

  public function store()
  {
    try {
      $_SESSION['validation-errors'] = null;
      $_SESSION['validation-values'] = null;

      $campos = [
        'nome',
        'data_nascimento',
        'telefone',
        'cpf',
        'rg',
      ];

      $data = [];
      $erros = [];
      $url = BASE_URL . 'clientes';

      foreach($campos as $campo) {
        $data[$campo] = strip_tags(trim(filter_input(INPUT_POST, $campo)));

        if(empty($data[$campo])) {
          $erros[$campo] = 'Campo obrigatório';
        }
      }

      $endereco_array = [];
      if(isset($_POST['endereco']) && count($_POST['endereco'])) {
        foreach($_POST['endereco'] as $index => $endereco) {
          $endereco_array[] = [
            'endereco' => strip_tags(trim($_POST['endereco'][$index])),
            'numero' => strip_tags(trim($_POST['numero'][$index])),
            'bairro' => strip_tags(trim($_POST['bairro'][$index])),
            'complemento' => strip_tags(trim($_POST['complemento'][$index])),
            'cep' => strip_tags(trim($_POST['cep'][$index])),
            'cidade' => strip_tags(trim($_POST['cidade'][$index])),
            'estado' => strip_tags(trim($_POST['estado'][$index])),
          ];
        }
      }

      $data['endereco'] = json_encode($endereco_array);

      if(!count($erros)) {
        $clientModel = new ClientModel();
        $data['data_nascimento'] = str_to_mysql_date($data['data_nascimento']);
        $clientModel->create($data);
      } else {
        $_SESSION['validation-errors'] = $erros;
        $_SESSION['validation-values'] = $data;
        $url = BASE_URL . 'clientes/create';
      }

      header('Location: ' . $url);
    } catch (\Exception $e) {
      return $e->getMessage();
    }
  }

  public function edit($args = [])
  {
    $cliente_id = (int) $args[0];
    try {

      $clienteModel = new ClientModel();
      $cliente = $clienteModel->find($cliente_id);

      if(!$cliente) {
        header('Location: ' . BASE_URL . 'clientes');
      }

      $errors = [];
      $values = [];

      if(isset($_SESSION['validation-errors'])) {
        $errors = $_SESSION['validation-errors'];
        unset($_SESSION['validation-errors']);
      }

      if(isset($_SESSION['validation-values'])) {
        $values = $_SESSION['validation-values'];
        unset($_SESSION['validation-values']);
      }

      $enderecos = [];
      if($cliente->endereco) {
        $enderecos = json_decode($cliente->endereco);
      }

      return view('clientes.edit', [
        'errors' => $errors,
        'values' => $values,
        'cliente' => $cliente,
        'enderecos' => $enderecos,
      ], 'page-clientes page-clientes-edit');
    } catch (\Exception $e) {
      return $e->getMessage();
    }
  }

  public function delete($args = []) {
    $cliente_id = (int) $args[0];

    try {

      $clienteModel = new ClientModel();
      $cliente = $clienteModel->find($cliente_id);

      if(!$cliente) {
        header('Location: ' . BASE_URL . 'clientes');
      }

      $clienteModel->delete($cliente_id);

      header('Location: ' . BASE_URL . 'clientes');
    } catch (\Exception $e) {
      return $e->getMessage();
    }
  }
}
