@extends('layouts.app')

@section('title', 'Anime')

@section('content')
<div class="container">
{!! link_to_route('anime.create', $title = 'register')  !!}

@include('anime.table')
</div>
@endsection
