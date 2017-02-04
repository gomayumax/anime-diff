<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Services\WatchedAnimeService;
use App\Services\UserService;
use Auth;


class DiffController extends Controller
{

    private $watched_anime_service; 
    private $user_service; 

    public function __construct(WatchedAnimeService $watched_anime_service,
                                UserService $user_service)
    {

      $this->watched_anime_service = $watched_anime_service;
      $this->user_service = $user_service;
    }

    public function show($diff_user = '')
    {
      $auth_user = Auth::User();
      // TODO:userが存在するかチェックみたいなのをココに入れたさ
      $target_user = $this->user_service->get($diff_user); 

      // 見ているアニメの取得
      $watched_anime_main_user = $this->watched_anime_service->get($auth_user);
      $watched_anime_target_user = $this->watched_anime_service->get($target_user);

      list($diff_list_main, $diff_list_target) = $this->watched_anime_service->diff($watched_anime_main_user, $watched_anime_target_user);

      return view('diff.show', compact('target_user', 'diff_list_main', 'diff_list_target', 'watched_anime_main_user', 'watched_anime_target_user'));
    }

}
