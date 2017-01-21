@extends('layouts.app')

@section('title', 'Anime')

@section('content')
<div class="container">
<h2>視聴済みアニメ</h2>
          
{!! link_to_route('anime.index', $title = '視聴済みアニメを追加')  !!}

@include('common.table')
</div>
@endsection
