<table class="table">
  <thead>
    <tr>
      <th>id</th>
      <th>Anime Name</th>
      <th>edit</th>
      <th>delete</th>
    </tr>
  </thead>
  <tbody>
@foreach ($animes as $anime)
      <td>{{ $anime->id }}</td>
      <td>{{ $anime->name }}</td>
      <td>
        <a href="{{ route('anime.edit', ['id' => $anime->id])}}">
          <span class="glyphicon glyphicon-pencil"></span>
        </a>
      </td>
      <td>
        <a href="{{ route('anime.show', ['id' => $anime->id])}}">
          <span class="glyphicon glyphicon-trash"></span>
        </a>
      </td>

@endforeach
  </tbody>
  </thead>
</table>

