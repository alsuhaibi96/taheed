<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Login</title>
    @vite('resources/css/app.css')

</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">

    <form method="POST" action="{{ route('customer.login') }}" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 w-2/6">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Email</label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="email" name="email" required autofocus>
            @error('email')
            <p class="text-red-500">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Password</label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" name="password" required>
            @error('password')
            <p class="text-red-500">{{$message}}</p>
            @enderror
        </div>
        <div class="flex items-center justify-between">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                Sign In
            </button>
        </div>
    </form>
</body>
</html>
