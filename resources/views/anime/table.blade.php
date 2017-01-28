<table class="table">
  <thead>
    <tr>
      <th>id</th>
      <th>Anime Name</th>
      <th>add</th>
    </tr>
  </thead>
  <tbody>
@foreach ($animes as $anime)
<tr>
      <td>{{ $anime->id }}</td>
      <td>{{ $anime->name }}</td>
      <td>
{{ Form::open(['action' => 'WatchedAnimeController@store']) }}
{{ Form::hidden($name='anime_id', $anime->id) }}
{{ Form::submit('add') }}
{{ Form::close() }}
      </td>
</tr>
@endforeach
  </tbody>
  </thead>
</table>

