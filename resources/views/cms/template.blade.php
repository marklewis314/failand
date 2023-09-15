<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Failand CMS">
  <title>Failand CMS - @yield('title')</title>
  <link rel="icon" type="image/x-icon" href="/images/signpost.svg">
  @vite('resources/js/app.js')
</head>
<body class="bg-lime-700">
<div id="app" class="w-3/5 mx-auto border min-h-screen bg-white">
    <h1 class="text-4xl text-lime-700 text-center mb-4">@yield('title')</h1>
    <div class="p-4">
        @yield('content')
    </div>
</div>
</body>
</html>
