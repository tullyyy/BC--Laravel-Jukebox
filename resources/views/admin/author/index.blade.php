@extends('admin.layout', [
  'title' => 'Authors'
])
@section('content')
<table>
        <thead>
            <th>ID</th>
            <th>Name</th>
            <th></th>
        </thead>
        <tbody>
            @foreach ($authors as $author)

                <tr>
                    <td>{{ $author->id }}</td>
                    <td>{{ $author->name }}</td>
                    <td>
                        <a href="{{ action('AuthorController@edit', ['id' => $author->id]) }}">EDIT</a>

                        <form action="{{ action('AuthorController@delete', ['id' => $author->id]) }}" method="post">
                            @method('delete')
                            @csrf

                            <input type="submit" value="delete">
                        </form>
                    </td>
                </tr>

            @endforeach
        </tbody>

    </table>

@endsection