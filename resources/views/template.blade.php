<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Failand Village Website">
    <title>Failand - @yield('title')</title>
    <link rel="icon" type="image/x-icon" href="/img/signpost.svg">
    @vite('resources/js/app.js')
</head>
<body>
<div id="app">
    <header class="md:w-3/5 mx-auto flex justify-between text-2xl decoration-4 underline-offset-4 p-4">
        <div><a href="/" class="flex space-x-2 text-4xl text-lime-700 hover:text-lime-600"><img src="/img/signpost.svg" alt="logo" class="w-8"><div>Failand</div></a></div>
        <nav class="md:w-3/5 flex flex-col md:flex-row justify-between decoration-lime-500 ">
            @yield('nav')
        </nav>
    </header>
    
    <h1 class="text-3xl md:text-4xl text-lime-700 text-center py-2 md:py-4">@yield('title')</h1>
    
    <nav class="md:w-3/5 mx-auto pl-4 md:pl-2 text-lime-700 text-lg">@yield('path')</nav>

    <div class="flex flex-col md:flex-row p-3">
 
        <main class="md:w-3/5 md:min-h-screen mb-4">
            @yield('content')
        </main>

        <aside class="md:w-1/5 md:order-first">
            <div class="bg-stone-300 p-4 rounded-lg mb-2 md:mx-4">
                <form action="/search">
                    <input type="text" name="q" placeholder="Search...">
                </form>
            </div>
        </aside>

        <aside class="md:w-1/5">
            <div class="bg-stone-300 p-4 rounded-lg mb-2 md:mx-4"><council-meetings></council-meetings></div>
            <div class="bg-stone-300 p-4 rounded-lg mb-2 md:mx-4"><bin-days></bin-days>Green bin day has yet to be set for February</div>
        </aside>

    </div>

    <footer class="bg-lime-700 text-white h-48">
        <div class="md:w-3/5 mx-auto p-4">
            <nav class="flex flex-col space-y-2">
                @foreach (App\Models\Page::where('section_id', 1)->orderBy('rank')->get() as $page)
                <a href="/{{ $page->slug }}" class="text-lg hover:underline">{{ $page->title }}</a>
                @endforeach
                <a href="https://www.bbc.co.uk/weather/8063560" class="text-lg hover:underline" target="weather">BBC Weather for Failand&#8663;</a>
            </nav>
        </div>
    </footer>
</div>
@stack('foot')
</body>
</html>
