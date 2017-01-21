<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WatchedAnime extends Model
{
  public function user() {
    return $this->belongsTo('App\User');
  }

  public function anime() {
    return $this->belongsTo('App\Anime');
  }
}
