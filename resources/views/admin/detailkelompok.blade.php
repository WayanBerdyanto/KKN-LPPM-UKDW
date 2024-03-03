@extends('admin.layouts.main')
@section('content')
    <div class="relative flex flex-wrap justify-between items-center w-full p-2.5">
        <div class="w-full mb-5 lg:w-2/6">
            <img src="{{ asset('img/logo-ukdw.png') }}" alt=""
                class="object-contain w-full md:w-40 h-40 rounded-full md:border md:border-primary lg:m-auto">
        </div>
        <div class="w-full  lg:w-4/6 py-2">
            <div class="flex justify-between border-b-2 border-gray-300 py-2">
                <div>
                    <h1 class="text-dark text-md font-bold">Kelompok 01</h1>
                    <h2 class="text-dark mt-1 text-sm font-normal block">Beji, Ngawen, Gunung Kidul, DIY</h2>
                </div>
                <div>
                    <a href="" class="bg-primary text-secondary px-3 py-1.5 rounded-md hover:bg-blue-500">
                        <i class="fa-solid fa-pen mr-1"></i>
                        Edit
                    </a>
                </div>
            </div>
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right">
                    <tr class="border-b">
                        <td scope="row" class="pr-6 py-4 font-medium whitespace-nowrap">
                            <span>Pembimbing</span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="font-semibold">Aloysius Airlangga Bajuadji, S.Kom., M.Eng.</span>
                        </td>
                    </tr>
                    <tr class="border-b">
                        <td scope="row" class="pr-6 py-4 font-medium whitespace-nowrap">
                            <span class="font-normal">Ketua Kelompok</span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="font-semibold">Wayan Berdyanto / 72210481</span>

                        </td>
                    </tr>
                    <tr class="border-b">
                        <td scope="row" class="pr-6 py-4 font-medium whitespace-nowrap">
                            <span class="font-normal">Peserta</span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="font-semibold">10</span>

                        </td>
                    </tr>
                    <tr class="border-b">
                        <td scope="row" class="pr-6 py-4 font-medium whitespace-nowrap">
                            <span class="font-normal">Status</span>
                        </td>
                        <td class="px-6 py-4">
                            <span
                                class="font-semibold bg-primary text-secondary px-3 cursor-pointer rounded-md py-0.5">Aktif</span>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="w-full mt-5 relative overflow-x-auto">
            <div class="flex justify-between md:items-center py-2">
                <h1 class="font-semibold text-lg lg:text-2xl uppercase">Daftar Peserta</h1>
                <div class="block lg:flex lg:items-center text-right py-2">
                    <form action="">
                        <div class="border rounded-lg focus-within:ring focus-within:ring-blue-400 duration-700">
                            <input type="text" class="outline-none px-1">
                            <button type="submit" class="bg-primary text-secondary py-1.5 px-3 rounded-r-lg hover:bg-blue-500">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                        </div>
                    </form>
                    <a href="" class="ml-0 lg:ml-5 mt-2 lg:mt-0 block bg-primary text-secondary py-1.5 px-2 font-normal rounded-lg text-center hover:bg-blue-500">Laporan dan Masukan</a>
                </div>
            </div>
            <hr class="mt-2 border">
            <table class="w-full text-sm text-left rtl:text-right mt-3 border">
                <thead class="text-xs text-secondary uppercase bg-slate-700">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            NIM
                        </th>
                        <th scope="col" class="px-6 py-3">
                            NAMA
                        </th>
                        <th scope="col" class="px-6 py-3">
                            PRODI
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Logbook
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="odd:bg-secondary even:bg-gray-200 text-dark">
                        <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
                            72210487
                        </th>
                        <td class="px-6 py-4">
                            Kalistus Alvino
                        </td>
                        <td class="px-6 py-4">
                            Sistem Informasi
                        </td>
                        <td class="px-6 py-4">
                            2 Terisi
                        </td>
                        <td class="px-6 py-4">
                            <a href="#"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Detail</a>
                        </td>
                    </tr>
                    <tr class="odd:bg-secondary even:bg-gray-200 text-dark">
                        <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
                            72210487
                        </th>
                        <td class="px-6 py-4">
                            Kalistus Alvino
                        </td>
                        <td class="px-6 py-4">
                            Sistem Informasi
                        </td>
                        <td class="px-6 py-4">
                            2 Terisi
                        </td>
                        <td class="px-6 py-4">
                            <a href="#"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Detail</a>
                        </td>
                    </tr>
                    <tr class="odd:bg-secondary even:bg-gray-200 text-dark">
                        <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
                            72210487
                        </th>
                        <td class="px-6 py-4">
                            Kalistus Alvino
                        </td>
                        <td class="px-6 py-4">
                            Sistem Informasi
                        </td>
                        <td class="px-6 py-4">
                            2 Terisi
                        </td>
                        <td class="px-6 py-4">
                            <a href="#"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Detail</a>
                        </td>
                    </tr>
                    <tr class="odd:bg-secondary even:bg-gray-200 text-dark">
                        <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
                            72210487
                        </th>
                        <td class="px-6 py-4">
                            Kalistus Alvino
                        </td>
                        <td class="px-6 py-4">
                            Sistem Informasi
                        </td>
                        <td class="px-6 py-4">
                            2 Terisi
                        </td>
                        <td class="px-6 py-4">
                            <a href="#"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Detail</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
