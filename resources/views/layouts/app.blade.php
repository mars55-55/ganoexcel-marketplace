<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body style="font-family: 'Figtree', sans-serif; background-color: #1e1e1e; color: white; margin: 0;">
    <div style="min-height: 100vh; background-color: #1e1e1e;">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
            <header style="background-color:rgb(116, 88, 18); box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
                <div style="max-width: 1200px; margin: 0 auto; padding: 24px 16px; text-align: center;">
                    <h1 style="font-size: 1.5rem; font-weight: bold; color: #1e1e1e;">{{ $header }}</h1>
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main style="background-color: #1e1e1e; color: white;">
            {{ $slot }}
        </main>
    </div>
</body>
</html>
