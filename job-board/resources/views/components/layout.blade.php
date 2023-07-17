<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="container mx-auto max-w-2xl bg-gradient-to-r from-cyan-200 to-blue-200 mt-10">
    <header class="flex items-center justify-between py-4">
        <div class="flex items-center">
            <!-- Logo -->
            <a href="{{ route('jobs.index') }}" class="text-xl font-semibold ">Job Board</a>
        </div>

        @auth

            <div class="flex items-center space-x-4">
                <span class="text-gray-700">{{ auth()->user()->name }}</span>
                <div>
                    <a href="{{ route('my-job-applications.index') }}"
                        class="px-4 py-1 bg-indigo-600 text-white rounded hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Applications</a>
                </div>

                <div>
                    <a href="{{ route('my-jobs.index') }}"
                        class="px-4 py-1 bg-indigo-600 text-white rounded hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">My
                        Jobs</a>
                </div>

                <form action="{{ route('auth.destroy') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="px-4 py-1 bg-red-600 text-white rounded hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Logout</button>
                </form>

            </div>
        @else
            <div>
                <a href="{{ route('login') }}"
                    class="px-4 py-1 bg-indigo-600 text-white rounded hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Login</a>
            </div>
        @endauth
    </header>

    @if (session()->has('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    @if (session()->has('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Error!</strong>
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
    @endif
    {{ $slot }}
</body>

</html>
