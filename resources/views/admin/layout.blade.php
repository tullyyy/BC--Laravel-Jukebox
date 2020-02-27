<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset ('css/app.css') }}">
  <title>{{ $title }}</title>
</head>
<body>

<nav>
        <a href="{{ action('AuthorController@create') }}">New author</a>
        <a href="{{ action('AuthorController@index') }}">Authors Index</a>
    </nav>

<h1>@yield('headline')</h1>
@yield('content')
</body>
</html>