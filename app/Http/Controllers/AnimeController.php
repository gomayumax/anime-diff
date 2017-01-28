<?php

namespace App\Http\Controllers;

use App\Services\AnimeService;

use \Illuminate\Http\Request;
use App\Http\Requests\AnimeRequest;
use App\Http\Requests;

class AnimeController extends Controller
{
  protected $anime_service;

  public function __construct(AnimeService $anime_service)
  {
    $this->anime_service = $anime_service;
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('anime.index');
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('anime.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if( $this->anime_service->save($request->name) ) {
          return redirect()->route('anime.index')->with('messages', ['アニメを追加しました']);
      }
        return redirect()->action('AnimeController@create')->with('errors', ['保存に失敗しました']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      return view('anime.show', ['anime' => $this->anime_service->getAnime($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      return view('anime.create', ['anime' => $this->anime_service->getAnime($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      if( $this->anime_service->update($request->name, $id)) {
          return redirect()->route('anime.index')->with('messages', ['変更しました']);
      }
      return redirect()->action('AnimeController@edit', $id)->with('errors', ['保存に失敗しました']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      if($this->anime_service->destory($id)){
          return redirect()->route('anime.index')->with('messages', ['削除しました']);
      }
      return redirect()->action('AnimeController@edit', $id)->with('errors', ['削除に失敗しました']);
    }
}
