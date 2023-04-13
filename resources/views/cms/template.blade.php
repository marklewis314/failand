<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Failand CMS">
  <title>@yield('title')</title>
  <link rel="icon" type="image/x-icon" href="/images/signpost.svg">
  @vite('resources/js/app.js')
</head>
<body class="bg-violet-700">
<div id="app" class="container mx-auto border min-h-screen bg-white">
    <h1 class="text-4xl text-green-700 text-center">@yield('title')</h1>
    @yield('content')
</div>
</body>
</html>
