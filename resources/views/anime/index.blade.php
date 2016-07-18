@extends('common.layout')

@section('title', 'Anime')

@section('content')
anime {!! link_to_route('anime.create', $title = 'register')  !!}

@include('anime.table')
@endsection
