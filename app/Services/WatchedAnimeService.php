<?php

namespace App\Services;

use App\Anime;
use App\User;
use App\WatchedAnime;
use DB;
use Exception;
use Log;

class WatchedAnimeService
{
  private $anime;

  public function __construct(Anime $anime, WatchedAnime $watched_anime, User $user)
  {
    $this->anime = $anime;
    $this->watched_anime = $watched_anime;
  }

  /**
   * 視聴済みアニメの全県取得
   */
  public function getAll($user)
  {
    return collect($user->watchedAnimes->all())->pluck('anime');
  }

  public function add($user, $anime_id)
  {
    $this->watched_anime->user_id = $user->id;
    $this->watched_anime->anime_id = $anime_id;
    return $this->watched_anime->save();
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
