<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/main.css')
    <link rel="stylesheet" href="{{ asset('fontawesome-free-6.5.1-web/css/all.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
</head>

<body>
    <button id="hamburger" type="button"
        class="inline-flex items-center p-2 mt-5 ms-3 text-sm text-dark rounded-lg md:hidden absolute z-10">
        <span class="sr-only">Open sidebar</span>
        <i class="fa-solid fa-bars text-3xl -mt-3 font-bold"></i>
    </button>

    @include('admin.layouts.header')

    @include('admin.layouts.sidebar')

    <div class="md:ml-64">
        <div class="p-4 ">
            @yield('content')
        </div>
    </div>

    <script src="{{ asset('js/sidebar.js') }}"></script>
    <script src="{{ asset('js/dropdown.js') }}"></script>
    <script type="module" src="{{ asset('js/tabs.js') }}"></script>
</body>

</html>