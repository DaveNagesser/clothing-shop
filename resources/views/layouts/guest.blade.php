<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <style>
        .fashion-serif {
            font-family: Georgia, 'Times New Roman', serif;
        }

    </style>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-[#f5f2ed] text-[#242321] antialiased">
<x-nav></x-nav>
<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-[#756e5f] shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>

<footer class="border-t border-black/10 px-5 py-7 text-center text-xs text-[#77736d] sm:px-8">
    © {{ date('Y') }} DEFIANCE. Alle rechten voorbehouden.
</footer>
</body>
</html>
