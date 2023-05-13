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

    <style>
        .flex {
            animation: signup 0.8s;
        }

        @keyframes signup {
            from {
                transform: scale(0.5);
                opacity: 0;
            }

            to {
                transform: scale(1);
                opacity: 1;
            }
        }
    </style>
</head>

<body class="flex justify-center">
    <div class="items-center rounded drop-shadow-2xl mx-5 my-5 dark:bg-gray-900 w-2/4">
        <div class="mx-5 my-20 px-10 py-10 bg-white dark:bg-gray-800 font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>
    </div>
</body>

</html>
