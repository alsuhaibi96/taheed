<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Sidebar</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.0/dist/tailwind.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <div class="flex">
        <!-- Sidebar -->
        <div id="sidebar" class="bg-black w-64 min-h-screen hidden md:block">
            <div class="p-2 flex-col items-center py-4">
                <div class="flex justify-between">
                    <img src="{{ Vite::asset('resources/images/burger-menu.png') }}" alt="Menu">
                    <img src="{{ Vite::asset('resources/images/dashboard-logo.png') }}" alt="Menu">
                </div>
                <nav class="mt-10">
                    <a href="#" id="home-link" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 font-bold text-black bg-white rounded-sm">الرئيسية</a>
                    <a href="#" id="clients-link" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 text-white bg-black">العملاء</a>
                    <a href="#" id="bikes-link" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 text-white bg-black">الدراجات النارية</a>
                    <a href="#" id="settings-link" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 text-white bg-black">إعدادات</a>
                </nav>
            </div>
        </div>

        <!-- Mobile Header -->
        <div class="w-full md:hidden bg-black text-white p-4 flex justify-between items-center">
            <div class="w-16 h-16 bg-white rounded-full"></div>
            <button id="menu-toggle" class="focus:outline-none">
                <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                    <title>menu</title>
                    <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
                </svg>
            </button>
        </div>

        <!-- Mobile Sidebar -->
        <div id="mobile-sidebar" class="bg-black w-64 min-h-screen fixed top-0 left-0 transform -translate-x-full transition-transform duration-200 ease-in-out">
            <div class="flex flex-col items-center py-4">
                <div class="w-16 h-16 bg-white rounded-full mb-4"></div>
                <nav class="mt-10">
                    <a href="#" id="mobile-home-link" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 text-white font-bold">الرئيسية</a>
                    <a href="#" id="mobile-clients-link" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 text-white">العملاء</a>
                    <a href="#" id="mobile-bikes-link" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 text-white">الدراجات النارية</a>
                    <a href="#" id="mobile-settings-link" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 text-white">إعدادات</a>
                </nav>
            </div>
        </div>

        <!-- Content -->
        <div id="content" class="w-full md:pl-64 p-8">
            @include('components.home')
        </div>
    </div>

    <script src="{{ asset('js/sidebar.js') }}"></script>
</body>
</html>
