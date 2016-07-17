<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

#Route::get('/', function () {
#    return view('welcome');
#});

Route::pattern('provider', 'github');

Route::get('/', function()
  {
    if (!Auth::check()) {
      // ログイン済でなければリダイレクト
      return 'こんにちは ゲストさん. ' . link_to('github/authorize', 'Github でログイン.');
    }
    return 'ようこそ ' . Auth::user()->username . 'さん!';
});
Route::get('/logout', function()
  {
    if (!Auth::check()) {
      // ログイン済でなければリダイレクト
      return 'こんにちは ゲストさん. ' . link_to('github/authorize', 'Github でログイン.');
    }
    Auth::logout();
      return redirect('/');
});


//Route::get('auth/github', 'Auth\AuthController@redirectToProvider');
//Route::get('auth/github/callback', 'Auth\AuthController@handleProviderCallback');

Route::get('{provider}/authorize', function($provider)
    {
      // ソーシャルログイン処理
      return \Socialite::with($provider)->redirect();
    });

Route::get('{provider}/login', function($provider)
    {
      // ユーザー情報取得
      $userData = Socialite::with($provider)->user();
      // ユーザー作成
      $user = App\User::firstOrCreate([
        'username' => $userData->nickname,
        'email'    => $userData->email,
        'avatar'   => $userData->avatar
        ]);
      Auth::login($user);

      return redirect('/');
});
