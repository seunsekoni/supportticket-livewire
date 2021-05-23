<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">

    <title>Livewire Tutorial</title>
    @livewireStyles
    @livewireScripts
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body class="flex flex-wrap justify-center">
    <div class="flex w-full justify-between px-4 bg-purple-900 text-white">
        <a class="mx-3 py-4" href="/">Home</a>
        @guest
            <div class="py-4">
                <a class="mx-3 " href="{{ route('login') }}">Login</a>
                <a class="mx-3" href="{{ route('register') }}">Register</a>
            </div>
        @endguest
        @auth
            <livewire:logout />
        @endauth
    </div>

    <div class="my-10 w-full flex justify-center">
        {{ $slot }}
    </div>

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/turbolinks/5.0.0/turbolinks.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js" data-turbolinks-eval="false"></script>
</body>
</html>