<?php

namespace App\Controllers;

use App\Models\UserModel;
use function App\Functions\view;

class LoginController
{
  public function index()
  {
    try {
      return view('login.index', [], 'page-login');
    } catch (\Exception $e) {
      return $e->getMessage();
    }
  }

  public function check()
  {
    // login and then
    header('Location: ' . BASE_URL . 'index.php?controller=clientes');
  }
}
