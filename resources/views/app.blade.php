<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title inertia>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @routes
    @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
    @inertiaHead
</head>

<body class="font-sans antialiased text-white">
    <header class="bg-transparent w-full h-16 absolute px-4 border-b z-10 border-gray-700 flex items-center justify-between">
        <h1 class="inline-block font-bold text-3xl">M306</h1>
    </header>
    <main class="!h-[calc(100vh-3rem)] bg-[#111827] p-4 pt-20 backdrop-blur-md overflow-hidden">
        <div class="z-50 h-full">
            @inertia
        </div>
        <div id="bg-1"></div>
        <div id="bg-2"></div>
    </main>
    <footer class="bg-[#0d1117] w-full h-12 flex items-center justify-between px-4 border-t border-gray-700">
        <span>&copy; bbzbl-it.dev 2024</span>
        <span id="links">
            <a href="mailto:support@bbzbl-it.dev">
                <i class="fa-regular fa-envelope"></i>
            </a>
            <a href="https://github.com/bbzblit">
                <i class="fa-brands fa-github cursor-pointer px-4"></i>
            </a>
            <a href="https://github.com/bbzblit/m306">
                <i class="fa-solid fa-code"></i>
            </a>
        </span>
    </footer>
</body>
 
</html>
<script>
window.old = JSON.parse("{{json_encode(Session::getOldInput())}}".replace(/&quot;/g, '"'));
window.error = JSON.parse("{{json_encode($errors->all())}}".replace(/&quot;/g, '"'));
</script>
<style>
    /*
    #bg-1 {
        background-image: url("img/bg-1.png");
        height: 610px;
        width: 977px;
        background-color: transparent;
        rotate: -60deg;
        scale: 2;
        position: absolute;
        top: 10%;
        right: -10%;
        z-index: -10;
    }

    #bg-2 {
        background-image: url("img/bg-2.png");
        height: 610px;
        width: 977px;
        background-color: transparent;
        scale: 2;
        position: absolute;
        top: 20%;
        rotate: 60deg;
        z-index: 200;
        background-size: 100% 150%;
        z-index: -10;
    }
    */
</style>