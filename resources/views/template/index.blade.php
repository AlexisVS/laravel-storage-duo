<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<body class="min-vh-100 m-0 p-0">
  <header>
    <nav><a class="display-4" href="/">Home</a></nav>
  </header>
  @yield("content")
  <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>