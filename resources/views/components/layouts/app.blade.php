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
    <div class="container mx-auto py-4">
        <div class="flex items-center space-x-2">
            <img class="w-12 h-12" src="https://rockbuzz.com.br/images/site/favicon.png">

            <div class="flex-1">
                <h1 class="text-2xl font-bold text-gray-600">Bem vindo ao blog da {{ config('app.name') }}</h1>
                <p class="text-gray-500">Aproveite os melhores conteúdos para sua empresa decolar no mundo digital.</p>
            </div>

            <div class="text-gray-500 font-bold">
                @if(!auth()->check())
                    <a class="flex items-center" href="{{ \Filament\Facades\Filament::getLoginUrl() }}">
                        <x-heroicon-c-arrow-right-end-on-rectangle class="w-5 h-5 mr-1"/>
                        Login
                    </a>
                @else
                    <a href="{{ route('logout')}}">Logout</a>
                @endif
            </div>
        </div>
        {{ $slot }}
    </div>
    @livewireScripts
</body>
</html>
