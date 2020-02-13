<?php

namespace App\Controllers;

use App\Models\UserModel;
use function App\Functions\view;

class ClientesController
{
  public function index()
  {
    try {
      return view('clientes.index', [], 'page-clientes');
    } catch (\Exception $e) {
      return $e->getMessage();
    }
  }

  public function create()
  {
    try {
      return view('clientes.create', [], 'page-clientes');
    } catch (\Exception $e) {
      return $e->getMessage();
    }
  }
}
