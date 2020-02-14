<?php

namespace App\Controllers;

use App\Models\ClientModel;
use function App\Functions\view;

class ClientesController
{
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
      return view('clientes.create', [], 'page-clientes page-clientes-create');
    } catch (\Exception $e) {
      return $e->getMessage();
    }
  }

  public function store()
  {
    try {
      var_dump($_POST);
    } catch (\Exception $e) {
      return $e->getMessage();
    }
  }
}
