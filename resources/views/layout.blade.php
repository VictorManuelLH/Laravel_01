<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/app.css">
    <title>@yield('title', 'Pagina')</title>
    <link rel="stylesheet" href="../sass/app.scss">
    <script src="../js/app.js" defer ></script>
    <link rel="stylesheet" href="{{ asset('../sass/app.scss') }}"> <script src="{{ asset('../js/app.js') }}"></script>
    {{-- @vite(['../sass/app.scss', '../js/app.js']) --}}
    {{-- Desarrollo --}}
    {{-- @vite(['../../../resources/sass/app.scss', '../../../resources/js/app.js']) --}}
</head>
<body>
    <div id="id" class="d-flex flex-column h-screen justify-content-between">
        <header>
            @include('partials.nav')
            @include('partials.session-status')
        </header>
        <main class="py-34">
            @yield('content')
        </main>
        <footer class="bg-white text-black-50 text-center py-3 shadow">
            {{ config('app.name') }} | Copyright @ {{ date('Y') }}
        </footer>
    </div>
</body>
</html>
