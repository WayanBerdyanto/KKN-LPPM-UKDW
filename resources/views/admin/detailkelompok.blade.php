@extends('admin.layouts.main')
@section('content')
    <div class="border-b-2 border-gray-400">
        <h1 class="text-2xl mb-1 px-4">
            [002 Kelompok 01]
        </h1>
    </div>
    <div class="">
        <ul
            class="flex flex-wrap text-sm font-medium text-center justify-center md:justify-start text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400 mt-2">
            <li class="me-2">
                <a href="/admin/kelompok/detail/rencana"
                    class="inline-block p-4 rounded-t-lg hover:text-gray-600 hover:bg-gray-50 dark:hover:bg-gray-800 dark:hover:text-gray-300">Rencana
                    & Laporan Kegiatan</a>
            </li>
            <li class="me-2">
                <a href="/admin/kelompok/detail/logbook"
                    class="inline-block p-4 rounded-t-lg hover:text-gray-600 hover:bg-gray-50 dark:hover:bg-gray-800 dark:hover:text-gray-300">Logbook</a>
            </li>
        </ul>
    </div>
    <div class="px-4">
        @yield('isiDetail')
    </div>
@endsection
