<!doctype html>
<html lang="ar" dir="rtl">

<head>
    @include('includes.head')
</head>

<body>
    <div>
        <header class="row">
            @include('includes.header')
        </header>
        <div id="main"
            class="row min-h-[100vh] max-w-[100vw] w-screen bg-white dark:bg-gray-950 dark:text-white text-gray-800">
            @yield('content')
        </div>
        <footer class="row overflow-x-hidden">
            @include('includes.footer')
        </footer>
        @vite('resources/js/app.js')
    </div>
</body>
</html>
