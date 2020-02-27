@extends('admin/layout', [
  'title' => 'Authors'
])

@section('headline')
  Create a new author
@endsection


@section('content')
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(Session::has('success_message'))
    <div class="alert alert-success">
        {{ Session::get('success_message') }}
    </div>
@endif


  @if ($author->id !== null)
    <form action="{{ action('AuthorController@update', ['id' => $author->id]) }}" method="post">
      @method('put')
  @else 
    <form action="{{ action('AuthorController@store') }}" method="post">
  @endif

    @csrf 

   
    <div class="form-group">
      <label for="">Name</label>

      @if ($errors->has('name'))
    This field contains errors.
    <ul>
      @foreach ($errors->get('name') as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
    @endif

      <input type="text" name="name" value="{{  old('name', $author->name) }}">

    {{-- 
    <input type="text" placeholder="Author's Last Name"> --}}
    </div>


    <div class="form-group">
      <input type="submit" value="Save">
    </div>

  </form>

@if ($author->id)
<form action="{{ action ('AuthorController@delete', ['id' => $author->id]) }}" method="post">
    @method('delete') 
    @csrf

    <input type="submit" value="Delete">
</form>

@endif
@endsection

