@extends('layouts.app')

@section('title', 'Diff')
@section('content')
<div class="container">
あなたが見ていて、{{ $target_user->name }}が見てないアニメ
<ul>
@foreach($diff_list_main as $anime)
<li>{{$anime->name}}</li>
@endforeach
</ul>

{{ $target_user->name }}が見ていて、あなたが見てないアニメ
<ul>
@foreach($diff_list_target as $anime)
<li>{{$anime->name}}</li>
@endforeach
</ul>
</div>
@endsection
