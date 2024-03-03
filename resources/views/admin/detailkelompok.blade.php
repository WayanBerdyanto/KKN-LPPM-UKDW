@extends('admin.layouts.main')
@section('content')
    <div class="border-b-2 border-gray-400">
        <h1 class="text-2xl mb-1 px-4">
            [002 Kelompok 01]
        </h1>
    </div>
    <div class="">
        <ul
            class="flex flex-wrap text-sm font-medium text-center justify-center md:justify-start text-dark border-b border-gray-200 dark:border-gray-700 mt-2">
            <li class="me-2">
                <a href="/admin/kelompok/detail"
                    class="inline-block px-4 py-2 rounded-t-lg duration-500 {{ $active == 'rencana' ? 'bg-yellow-500 text-white' : 'hover:text-white hover:bg-yellow-500'}}">Rencana
                    & Laporan Kegiatan</a>
            </li>
            <li class="me-2">
                <a href="/admin/kelompok/detail/logbook"
                    class="inline-block px-4 py-2 rounded-t-lg duration-500 {{ $active == 'logbook' ? 'bg-yellow-500 text-white' : 'hover:text-white hover:bg-yellow-500'}}">Logbook</a>
            </li>
        </ul>
    </div>
    <div class="px-4 mt-4">
        @include('admin.rencana')
        @yield('contentDetail')
    </div>
@endsection
