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
<div id="app" class="w-3/5 mx-auto min-h-screen bg-white p-4">
    <nav class="flex flex-row mb-4 text-4xl justify-between">
        <a href="/cms" @if(Request::path() == 'cms') class="text-lime-700 underline" @endif>CMS</a>
        <div class="flex flex-row grow justify-center space-x-8">
            <a href="/cms/pages" @if(Request::path() == 'cms/pages') class="text-lime-700 underline" @endif>Pages</a>
            <a href="/cms/images" @if(Request::path() == 'cms/images') class="text-lime-700 underline" @endif>Images</a>
        </div>
    </nav>
    <h1 class="text-lime-700 text-4xl mb-8">@yield('title')</h1>
    <div>
        @yield('content')
    </div>
</div>
</body>
</html>
