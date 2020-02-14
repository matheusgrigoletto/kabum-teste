<?php

namespace App\Models;

class UserModel extends Model
{
  protected $table = 'users';

  public function checkAuth(string $email = '', string $password = '') {
    try {
      $user = $this->find([
        'email' => $email,
        'password' => sha1($password),
      ]);

      $uid = false;

      if($user) {
        $uid = md5(sha1($user->email . time()));
      }

      return $uid;

    } catch(\Exception $e) {
      return false;
    }
  }
}
