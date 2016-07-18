@extends('common.layout')

@section('content')
@if (empty($anime))
{{ Form::open(['action' => 'AnimeController@store']) }}
@else
{{ Form::open(['action' => ['AnimeController@update', $anime->id], 'method' => 'PUT']) }}
@endif

{{ Form::label($name='name: ', null, ['class' => 'control-label']) }}
@if (empty($anime))
{{ Form::text($name='name', 'edit anime name') }}
@else
{{ Form::text($name='name', $anime->name) }}
@endif

{{ Form::submit('send') }}
{{ Form::close() }}
@endsection
