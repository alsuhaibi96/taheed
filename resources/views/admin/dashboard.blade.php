<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Sidebar</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <div class="flex flex-wrap">
        <!-- Sidebar -->
        <div id="sidebar" class="bg-black w-64 min-h-screen hidden md:block">
            <div class="flex flex-col items-center py-4">
                <div class="flex justify-between">
                   <img src="{{Vite::asset('resources/images/burger-menu.png')}}" alt="Menu">
                   <img src="{{Vite::asset('resources/images/dashboard-logo.png')}}" alt="Menu">
                </div>
                <nav class="mt-10">
                    <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 text-white font-bold">الرئيسية</a>
                    <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 text-white">العملاء</a>
                    <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 text-white">الدراجات النارية</a>
                    <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 text-white">إعدادات</a>
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
                    <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 text-white font-bold">الرئيسية</a>
                    <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 text-white">العملاء</a>
                    <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 text-white">الدراجات النارية</a>
                    <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 text-white">إعدادات</a>
                </nav>
            </div>
        </div>

        <!-- Content -->
        <div class="w-full md:pl-64 p-8">
            <!-- Content goes here -->
        </div>
    </div>

    <script>
        document.getElementById('menu-toggle').addEventListener('click', function() {
            var mobileSidebar = document.getElementById('mobile-sidebar');
            if (mobileSidebar.classList.contains('-translate-x-full')) {
                mobileSidebar.classList.remove('-translate-x-full');
            } else {
                mobileSidebar.classList.add('-translate-x-full');
            }
        });
    </script>
</body>
</html>
