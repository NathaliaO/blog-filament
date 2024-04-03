<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ !empty($title) ? $title . ' - ' . config('app.name') : config('app.name') }}</title>
    <link rel="icon" href="https://rockbuzz.com.br/images/site/favicon.png" type="image/ico" sizes="16x16">
    @vite('resources/css/app.css')
</head>
<body class="antialiased bg-gray-100">
    {{ $slot }}
</body>
</html>
