<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use Illuminate\Users\Repository as UserRepository;
use App\Services\AnimeService;

class IndexComposer
{

  protected $anime_service;

  public function __construct(AnimeService $anime_service)
  {
    // 依存はサービスコンテナにより自動的に解決される…
    $this->anime_service = $anime_service;
  }

  public function compose(View $view)
  {
    $view->with('animes', $this->anime_service->getAll());
  }
}
