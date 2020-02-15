<?php

namespace App\Controllers;

use App\Models\ClientModel;

class ClientesController
{
  public function __construct() {
    // Verifica autenticação
    auth();
  }

  /**
   * Página inicial de clientes
   * @return bool|string
   */
  public function index() {
    try {
      $clientModel = new ClientModel();

      $salvo = '';
      if(isset($_SESSION['salvo'])) {
        $salvo = '<div class="alert alert-success alert-dismissible fade show notification" role="alert">' .
          'Cliente salvo com sucesso!' .
          '<button type="button" class="close" data-dismiss="alert" aria-label="fechar">' .
          '<span aria-hidden="true">&times;</span>' .
          '</button>' .
          '</div>';

        unset($_SESSION['salvo']);
      }

      $excluido = '';
      if(isset($_SESSION['excluido'])) {
        $excluido = '<div class="alert alert-success alert-dismissible fade show notification" role="alert">' .
          'Cliente excluído com sucesso!' .
          '<button type="button" class="close" data-dismiss="alert" aria-label="fechar">' .
          '<span aria-hidden="true">&times;</span>' .
          '</button>' .
          '</div>';

        unset($_SESSION['excluido']);
      }

      return view('clientes.index', [
        'dataset' => $clientModel->all(),
        'salvo' => $salvo,
        'excluido' => $excluido,
      ], 'page-clientes');
    } catch (\Exception $e) {
      return $e->getMessage();
    }
  }

  /**
   * Formulário de cadastro
   * @return bool|string
   */
  public function create() {
    try {
      return view('clientes.create', [], 'page-clientes page-clientes-create');
    } catch (\Exception $e) {
      return $e->getMessage();
    }
  }

  /**
   * Salvar novo cliente
   */
  public function store() {
    $response = [
      'error' => false,
      'message' => '',
      'errors' => [],
      'return_url' => BASE_URL . 'clientes',
    ];

    try {
      $request = ClientModel::processRequest();

      if(!count($request->errors)) {
        $clientModel = new ClientModel();
        $request->data['data_nascimento'] = str_to_mysql_date($request->data['data_nascimento']);

        $clientModel->create($request->data);
        $_SESSION['salvo'] = true;
      } else {
        $response['error'] = true;
        $response['errors'] = $request->errors;
      }
    } catch (\Exception $e) {
      $response['error'] = true;
      $response['message'] = $e->getMessage();
    }

    json($response);
  }

  /**
   * Formulário de edição
   * @param $cliente_id
   * @return bool|string
   */
  public function edit($cliente_id) {
    $cliente_id = (int) $cliente_id;

    try {
      $clienteModel = new ClientModel();
      $cliente = $clienteModel->find($cliente_id);

      if(!$cliente) {
        redirect('clientes');
      }

      return view('clientes.edit', [
        'cliente' => $cliente,
      ], 'page-clientes page-clientes-edit');
    } catch (\Exception $e) {
      return $e->getMessage();
    }
  }

  /**
   * Atualizar dados do cliente
   * @param $cliente_id
   */
  public function update($cliente_id) {
    $cliente_id = (int) $cliente_id;

    $response = [
      'error' => false,
      'message' => '',
      'errors' => [],
      'return_url' => BASE_URL . 'clientes',
    ];

    try {
      $post_client_id = (int) filter_input(INPUT_POST, 'id');

      if($cliente_id === $post_client_id) {
        $request = ClientModel::processRequest();

        if(!count($request->errors)) {
          $clientModel = new ClientModel();
          $request->data['data_nascimento'] = str_to_mysql_date($request->data['data_nascimento']);

          $clientModel->update($request->data, $cliente_id);
          $_SESSION['salvo'] = true;
        } else {
          $response['error'] = true;
          $response['errors'] = $request->errors;
        }
      } else {
        $response['error'] = true;
        $response['message'] = 'Cliente inválido';
      }
    } catch (\Exception $e) {
      $response['error'] = true;
      $response['message'] = $e->getMessage();
    }

    json($response);
  }

  /**
   * Excluir cliente
   * @param $cliente_id
   * @return string
   */
  public function delete($cliente_id) {
    $cliente_id = (int) $cliente_id;

    try {
      $clienteModel = new ClientModel();
      $cliente = $clienteModel->find($cliente_id);

      if(!$cliente) {
        redirect('clientes');
      }

      $clienteModel->delete($cliente_id);
      $_SESSION['excluido'] = true;

      redirect('clientes');
    } catch (\Exception $e) {
      return $e->getMessage();
    }
  }
}
