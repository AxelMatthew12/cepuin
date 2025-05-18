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

<body class="h-screen overflow-hidden">
    <div class="flex h-full">
        @if (!request()->routeIs('login', 'login.*', 'register', 'register.*', 'auth.*'))
            <livewire:components.sidebar />
        @endif

        <main class="flex-1 overflow-y-auto bg-primary-200">
            {{ $slot }}
        </main>
    </div>
    @livewireScripts
</body>

</html>
