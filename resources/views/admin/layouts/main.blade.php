<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @yield('title')
    </title>
    @vite('resources/css/main.css')
    <link rel="stylesheet" href="{{ asset('fontawesome-free-6.5.1-web/css/all.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
</head>

<body x-data="{ modalOpen: false, 'darkMode': true, 'loaded': true, 'sidebarToggle': false }">
    <div x-show="loaded" x-init="window.addEventListener('DOMContentLoaded', () => { setTimeout(() => loaded = false, 500) })"
        class="fixed left-0 top-0 z-999999 flex h-screen w-screen items-center justify-center bg-white dark:bg-dark">
        <div class="h-16 w-16 animate-spin rounded-full border-4 border-solid border-primary border-t-transparent">
        </div>
    </div>

    <button type="button" @click.stop="sidebarToggle = !sidebarToggle"
        class="inline-flex items-center p-2 mt-5 ms-3 text-sm text-dark dark:text-secondary rounded-lg lg:hidden absolute z-10">
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

    <script src="{{ asset('js/dropdown.js') }}"></script>
    <script src="{{ asset('js/alpine.min.js') }}"></script>

    {{-- @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9']) --}}

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @include('sweetalert::alert')

    {{-- Larapex Chart --}}
    {{-- <script src="{{ $chart->cdn() }}"></script>

    {{ $chart->script() }} --}}
    <div x-show="modalOpen" x-transition
        class="fixed left-0 top-0 flex h-full min-h-screen w-full items-center justify-center bg-dark/90 px-4 py-5 z-40">
        <div @click.outside="modalOpen = false"
            class="w-full max-w-[570px] rounded-[20px] bg-white px-8 py-12 text-center dark:bg-dark-2 md:px-[70px] md:py-[60px]">
            <h3 class="pb-[18px] text-xl font-semibold text-dark sm:text-2xl">
                Yakin Logout ?
            </h3>
            <span class="mx-auto mb-6 inline-block h-1 w-[90px] rounded bg-primary"></span>
            <div class="-mx-3 flex flex-wrap">
                <div class="w-1/2 px-3">
                    <button @click="modalOpen = false"
                        class="block w-full rounded-md border border-stroke p-3 text-center text-base font-medium text-dark transition hover:border-red-600 hover:bg-red-600 hover:text-white">
                        Cancel
                    </button>
                </div>
                <div class="w-1/2 px-3">
                    <a href="/admin/logout"
                        class="block w-full rounded-md border border-primary bg-primary hover:opacity-90 p-3 text-center text-base font-medium text-white transition hover:bg-blue-dark">
                        OK
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
