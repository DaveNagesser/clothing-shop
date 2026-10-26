<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Jouw Merk') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .fashion-serif {
            font-family: Georgia, 'Times New Roman', serif;
        }

    </style>
</head>
<body class="min-h-screen bg-[#f5f2ed] text-[#242321] antialiased">
<x-nav></x-nav>

<main>
    {{ $slot }}
</main>

<footer class="border-t border-black/10 px-5 py-7 text-center text-xs text-[#77736d] sm:px-8">
    © {{ date('Y') }} JOUW MERK. Alle rechten voorbehouden.
</footer>
</body>
</html>
