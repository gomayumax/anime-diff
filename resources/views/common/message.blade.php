@if (session('messages'))
<div class="alert alert-success">
@foreach (session('messages') as $message)
<p>{{ $message }} </p>
@endforeach
</div>
@endif

@if (session('errors'))
<div class="alert alert-danger" role="alert">
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <span class="sr-only">Error:</span>
@foreach (session('errors') as $error)
<p>{{ $error }} </p>
@endforeach
</div>
@endif

