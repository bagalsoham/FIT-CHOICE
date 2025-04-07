<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home Page</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body class="bg-[#202c34] text-white flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">

    <header class="w-full text-sm mb-6">
        <nav class="bg-gray-800 fixed top-0 left-0 right-0 z-50">
            <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
                <div class="relative flex h-16 items-center justify-between">

                    <!-- Logo & Title -->
                    <div class="flex items-center">
                        <img class="h-8 w-auto" src="{{ asset('images/logo.png') }}" alt="Your Company">
                        <span class="text-white text-xl font-bold ml-4">FIT CHOICE</span>
                    </div>

                    <!-- Navbar Items -->
                    <div class="flex flex-1 items-center justify-center">
                        <div class="hidden sm:block">
                            <div class="flex space-x-16">
                                <a href="#" class="rounded-md bg-gray-900 px-6 py-2 text-sm font-medium text-white" aria-current="page">Home</a>
                                <a href="#" class="rounded-md px-6 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Find Gym</a>
                                <a href="#" class="rounded-md px-6 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">About Us</a>
                            </div>
                        </div>
                    </div>

                    <!-- Login / Register -->
                    <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                        <div class="flex items-center space-x-2 ml-3">
                            <a href="{{ route('login') }}" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Log in</a>
                            <a href="{{ route('register') }}" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-medium text-white hover:bg-indigo-500">Register</a>
                        </div>
                    </div>

                    <!-- User Dropdown -->


                </div>
            </div>
        </nav>
    </header>

    <main class="mt-20 text-center">
        <h1 class="text-4xl font-bold">Welcome to Fit Choice</h1>
        <p class="mt-4 text-lg text-gray-300">Your ultimate fitness membership solution.</p>
    </main>

    <!-- Java