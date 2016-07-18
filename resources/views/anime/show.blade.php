@extends('common.layout')

@section('content')
「{{ $anime->name  }}」を本当に消しますか
{{Form::open(['route'=>['anime.destroy', $anime->id],'method'=>'DELETE'])}}
    {{link_to_route('anime.edit','Edit', $anime->id)}}
    {{Form::submit('Delete')}}
    {{link_to_route('anime.index', 'Back to list')}}
{{Form::close()}}
@endsection
