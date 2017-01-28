<?php

namespace App\Services;

use App\Anime;
use DB;
use Exception;
use Log;

class AnimeService
{
  private $anime;

  public function __construct(Anime $anime)
  {
    $this->anime = $anime;
  }

  /**
   *      * TOPページ用の記事データ取得
   *           */
  public function getAll()
  {
    return $this->anime->all();
  }

  public function save($name)
  {
    $this->anime->name = $name;
    return $this->anime->save();
  }

  public function update($name, $id)
  {
    $anime = $this->anime->find($id);
    $anime->name = $name;
    return $anime->save();
  }


  public function getAnime($id)
  {
    return $this->anime->find($id);
  }

  public function destory($id)
  {
    $anime = $this->anime->find($id);
    return $anime->delete();
  }

}
