@section('title', 'Admin | Kelompok')
@extends('admin.layouts.main')
@section('content')
    <h2 class="ml-3 font-semibold text-2xl">DAFTAR KELOMPOK KKN UKDW 2024</h2>

    <div class="my-5 py-2 border-b-2 flex justify-between items-center px-3">
        <form action="">
            <div class= rounded-lg focus-within:ring focus-within:ring-blue-400 duration-700">
                <input type="text" class="outline-none px-4 placeholder:italic text-left" placeholder="Cari">
                <button type="submit" class="bg-primary text-secondary py-1.5 px-3 rounded-r-lg hover:bg-blue-500">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </div>
        </form>
        <a href= ""
            class="ml-1 flex bg-primary items-center py-2 px-3 shadow-lg text-secondary rounded-3xl text-md font-normal hover:bg-blue-500">
            <i class="fa-solid fa-user-plus"></i>
            Add
        </a>
    </div>
    <a href="/admin/kelompok/detail"
        class="w-full bg-white py-3 px-2 flex justify-between items-center hover:bg-gray-100 duration-500 mt-4 shadow-lg rounded-3xl mb-5">
        <div class="py-1 px-3">
            <h1 class="text-dark text-md font-bold">Kelompok 01</h1>
            <h2 class="text-dark mt-2 text-sm font-medium">Aloysius Airlangga Bajuadji, S.Kom., M.Eng.</h2>
            <span class="text-dark mt-1 text-sm font-normal block">Beji, Ngawen, Gunung Kidul, DIY</span>
            <div class="flex text-dark text-sm font-normal mt-1 items-center">
                <div class="mr-3">
                    <span>10-10</span>
                    <span>Peserta</span>
                </div>
                <span class="text-secondary px-2 rounded-full py-1 bg-red-600 font-semibold">Penuh</span>
            </div>
        </div>
        <i class="fa-solid fa-forward px-4 text-xl"></i>
    </a>
    <a href="/admin/kelompok/detail"
        class="w-full bg-white py-3 px-2 flex justify-between items-center hover:bg-gray-100 duration-500 mt-4 shadow-lg rounded-3xl mb-5">
        <div class="py-1 px-3">
            <h1 class="text-dark text-md font-bold">Kelompok 02</h1>
            <h2 class="text-dark mt-2 text-sm font-medium">Aloysius Airlangga Bajuadji, S.Kom., M.Eng.</h2>
            <span class="text-dark mt-1 text-sm font-normal block">Beji, Ngawen, Gunung Kidul, DIY</span>
            <div class="flex text-dark text-sm font-normal mt-1 items-center">
                <div class="mr-3">
                    <span>3-10</span>
                    <span>Peserta</span>
                </div>
                <span class="text-secondary px-2 rounded-full py-1 bg-primary font-semibold">Belum Penuh</span>
            </div>
        </div>
        <i class="fa-solid fa-forward px-4 text-xl"></i>
    </a>
    <a href="/admin/kelompok/detail"
        class="w-full bg-white py-3 px-2 flex justify-between items-center hover:bg-gray-100 duration-500 mt-4 shadow-lg rounded-3xl mb-5">
        <div class="py-1 px-3">
            <h1 class="text-dark text-md font-bold">Kelompok 03</h1>
            <h2 class="text-dark mt-2 text-sm font-medium">Aloysius Airlangga Bajuadji, S.Kom., M.Eng.</h2>
            <span class="text-dark mt-1 text-sm font-normal block">Beji, Ngawen, Gunung Kidul, DIY</span>
            <div class="flex text-dark text-sm font-normal mt-1 items-center">
                <div class="mr-3">
                    <span>10-10</span>
                    <span>Peserta</span>
                </div>
                <span class="text-secondary px-2 rounded-full py-1 bg-red-600 font-semibold">Penuh</span>
            </div>
        </div>
        <i class="fa-solid fa-forward px-4 text-xl"></i>
    </a>
    <a href="/admin/kelompok/detail"
        class="w-full bg-white py-3 px-2 flex justify-between items-center hover:bg-gray-100 duration-500 mt-4 shadow-lg rounded-3xl mb-5">
        <div class="py-1 px-3">
            <h1 class="text-dark text-md font-bold">Kelompok 04</h1>
            <h2 class="text-dark mt-2 text-sm font-medium">Aloysius Airlangga Bajuadji, S.Kom., M.Eng.</h2>
            <span class="text-dark mt-1 text-sm font-normal block">Beji, Ngawen, Gunung Kidul, DIY</span>
            <div class="flex text-dark text-sm font-normal mt-1 items-center">
                <div class="mr-3">
                    <span>3-10</span>
                    <span>Peserta</span>
                </div>
                <span class="text-secondary px-2 rounded-full py-1 bg-primary font-semibold">Belum Penuh</span>
            </div>
        </div>
        <i class="fa-solid fa-forward px-4 text-xl"></i>
    </a>



@endsection
