<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'cepu cepu fufufafa' }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap"
        rel="stylesheet">
    @vite('resources/css/app.css')
    @livewireStyles
</head>

<body class="bg-primary-200">
    @if (!request()->routeIs('login', 'register', 'register.*', 'auth.*'))
        <livewire:components.sidebar />
    @endif
    <main class="ml-80 flex">
        <div class="border-x border-white w-full">
            {{ $slot }}
        </div>
        <div>
            @if (!request()->routeIs('login', 'register', 'register.*', 'auth.*'))
                <livewire:components.stats-sidebar />
            @endif
        </div>
    </main>

    @livewireScripts
</body>

</html>
