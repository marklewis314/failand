<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Failand Village Website">
    <title>@yield('title')</title>
    <link rel="icon" type="image/x-icon" href="/img/signpost.svg">
    @vite('resources/js/app.js')
</head>
<body>
<div id="app">
    <header class="w-3/5 mx-auto flex justify-between text-2xl decoration-4 underline-offset-4 py-2">
        <div><a href="/" class="flex space-x-2 text-4xl text-lime-700 hover:text-lime-600"><img src="/img/signpost.svg" alt="logo" class="w-8"><div>Failand</div></a></div>
        <nav class="w-3/5 flex justify-between decoration-lime-500 ">
            @yield('nav')
        </nav>
    </header>

    <div class="flex">
        <aside class="w-1/5">
            <div class="bg-stone-300 m-4 p-4 rounded-lg">Left aside</div>
            <div class="bg-stone-300 m-4 p-4 rounded-lg">Left aside 2</div>
        </aside>

        <main class="w-3/5 mx-auto min-h-screen">
            <h1 class="text-4xl text-lime-700 text-center py-4">@yield('title')</h1>
            @yield('content')
        </main>

        <aside class="w-1/5">
            <div class="bg-stone-300 m-4 p-4 rounded-lg">Right aside</div>
        </aside>

    </div>

    <footer class="bg-lime-700 text-white h-48">
        <div class="w-3/5 mx-auto py-4">
            Footer
        </div>
    </footer>
</div>
</body>
</html>
