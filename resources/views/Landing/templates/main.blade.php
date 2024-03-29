<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- My Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    @vite('resources/css/app.css')
    <title>
        KKN LPPM | UKDW
    </title>

    <link rel="icon" type="image/png" href="{{ asset('img/logo-ukdw.png') }}">
</head>

<body class="flex flex-col">
    <div class="bg-overlay"></div>
    <div id="spinner" class="spinner-container">
        <div class="animate-spin inline-block w-16 h-16 border-[3px] border-current border-t-transparent text-blue-600 rounded-full"
            role="status" aria-label="loading">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    @include('landing.templates.header')
    @yield('content')
    @include('landing.templates.footer')

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

    <script src="{{ asset('js/script.js') }}" defer></script>
    <script src="{{ asset('js/spinner.js') }}" defer></script>
</body>

</html>
