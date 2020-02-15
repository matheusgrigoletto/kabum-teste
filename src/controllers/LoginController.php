<?php

namespace App\Controllers;

use App\Models\UserModel;

class LoginController
{

  /**
   * Página de login
   * @return bool|string
   */
  public function index() {
    auth(true);

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

      return view('login.index', [
        'errors' => $errors,
        'values' => $values,
      ], 'page-login');
    } catch (\Exception $e) {
      return $e->getMessage();
    }
  }

  /**
   * Verificar formulário de login
   */
  public function check() {
    $email = strip_tags(trim(filter_input(INPUT_POST, 'email')));
    $password = strip_tags(trim(filter_input(INPUT_POST, 'password')));
    $erros = [];
    $uri = 'login';

    // Validar e-mail
    if($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $erros['email'] = 'E-mail inválido';
    }

    // Validar senha preenchida
    if($password === '') {
      $erros['password'] = 'Campo obrigatório';
    }

    if(!count($erros)) {
      $userModel = new UserModel();
      $uid = $userModel->checkAuth($email, $password);

      if(!$uid) {
        $erros['email'] = 'E-mail não encontrado';
      } else {
        $_SESSION['uid'] = $uid;
        $uri = 'clientes';
      }
    }

    $_SESSION['validation-errors'] = $erros;
    $_SESSION['validation-values'] = [
      'email' => $email,
    ];

    redirect($uri);
  }

  public function out() {
    session_unset();
    session_destroy();
    redirect('login');
  }
}
