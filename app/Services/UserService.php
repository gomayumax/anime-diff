<?php

namespace App\Services;

use App\User;
use DB;
use Exception;
use Log;

class UserService
{
  private $user;

  public function __construct(User $user)
  {
    $this->user = $user;
  }

  /**
   *      * TOPページ用の記事データ取得
   *           */
  public function getAll()
  {
    return $this->user->all();
  }

  public function save($name)
  {
    $this->user->name = $name;
    return $this->user->save();
  }

  public function update($name, $id)
  {
    $user = $this->user->find($id);
    $user->name = $name;
    return $user->save();
  }


  public function get($id)
  {
    return $this->user->find($id);
  }

  public function destory($id)
  {
    $user = $this->user->find($id);
    return $user->delete();
  }

}
