<?php
namespace App\Repositories;

use App\Repositories\Interfaces\UserInterface;
use App\User;

class UserRepository implements UserInterface {

  public function findUserByName($name)
  {
    $result = User::where('name', $name)->first();

    return $result;
  }
}