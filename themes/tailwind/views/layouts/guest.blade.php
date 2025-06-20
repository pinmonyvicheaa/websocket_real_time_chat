<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Chat') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        @vite(['themes/tailwind/css/app.css', 'themes/tailwind/js/app.js'], 'tailwind')
    </head>
    <body>
        <div id="app" class="font-sans antialiased text-gray-900">
            {{ $slot }}
        </div>
    </body>
</html>
