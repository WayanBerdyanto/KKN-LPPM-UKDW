@extends('admin.layouts.main')
@section('content')
    <a href="/admin/kelompok/detail">
        <div
            class="w-full bg-gray-800 shadow-lg shadow-gray-800/50 h-40 px-2 rounded-lg flex justify-between items-center drop-shadow-2x border border-yellow-500">
            <div class="">
                <h1 class="text-yellow-300 px-2 text-xl font-semibold">[002] Kelompok 01</h1>
                <h2 class="text-white px-2 mt-4 text-md font-medium">Aloysius Airlangga Bajuadji, S.Kom., M.Eng.</h2>
                <span class="text-white px-2 pt-2 text-md font-normal block">Beji, Ngawen, Gunung Kidul, DIY</span>
            </div>
            <i class="fa-solid fa-forward text-white px-4 text-3xl"></i>
        </div>
    </a>
    <a href="/admin/kelompok/detail" class="block mt-6">
        <div
            class="w-full bg-gray-800 shadow-lg shadow-gray-800/50 h-40 px-2 rounded-lg flex justify-between items-center drop-shadow-2x border border-yellow-500">
            <div class="">
                <h1 class="text-yellow-300 px-2 text-xl font-semibold">[002] Kelompok 02</h1>
                <h2 class="text-white px-2 mt-4 text-md font-medium">Aloysius Airlangga Bajuadji, S.Kom., M.Eng.</h2>
                <span class="text-white px-2 pt-2 text-md font-normal block">Beji, Ngawen, Gunung Kidul, DIY</span>
            </div>
            <i class="fa-solid fa-forward text-white px-4 text-3xl"></i>
        </div>
    </a>
@endsection
