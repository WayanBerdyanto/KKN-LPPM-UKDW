@section('title', 'Home | Mahasiswa')
@extends('mahasiswa.layouts.main')
@section('content')
    <div class="container mx-auto mt-4">
        <div class="relative flex flex-wrap justify-between items-center w-full p-2.5">
            <div class="w-full mb-5 lg:w-2/6">
                <img src="{{ asset('img/logo-ukdw.png') }}" alt=""
                    class="object-contain w-full md:w-40 h-40 rounded-full md:border md:border-primary lg:m-auto">
            </div>
            <div class="w-full  lg:w-4/6 py-2">
                <div class="flex justify-between border-b-2 border-gray-300 py-2">
                    <div>
                        <h1 class="text-dark text-md font-bold">
                            {{ Auth::guard('mahasiswa')->user()->nama }}
                        </h1>
                        <h2 class="text-dark mt-1 text-sm font-normal block">
                            <i class="fa-solid fa-location-dot mr-1"></i>
                            Beji, Ngawen, Gunung Kidul, DIY
                        </h2>
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
                                <span class="font-normal">Kelompok</span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="font-semibold">
                                    2 Inclusive
                                </span>

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
        </div>

        <h4 class="my-3 ml-5 text-xl font-bold text-dark">
            Daftar Kelompok
        </h4>
        <div
            class="rounded-sm bg-white px-5 pb-2.5 pt-6 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:pb-1">
            <div class="max-w-full overflow-x-auto">
                <table class="w-full table-auto">
                    <thead>
                        <tr class="bg-gray-100 text-left">
                            <th class="min-w-[220px] px-4 py-4 font-medium text-dark xl:pl-11">
                                NIM
                            </th>
                            <th class="min-w-[150px] px-4 py-4 font-medium text-dark">
                                Nama
                            </th>
                            <th class="min-w-[120px] px-4 py-4 font-medium text-dark">
                                Prodi
                            </th>
                            <th class="px-4 py-4 font-medium text-dark">
                                Angkatan
                            </th>
                            <th class="px-4 py-4 font-medium text-dark">
                                Status
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($result as $data)
                            <tr>
                                <td class="border-b border-[#eee] px-4 py-5 pl-9 dark:border-strokedark xl:pl-11">
                                    <h5 class="font-medium text-dark">
                                        {{ $data['NIM'] }}
                                    </h5>
                                </td>
                                <td class="border-b border-[#eee] px-4 py-5 dark:border-strokedark">
                                    <p class="text-dark">
                                        {{ $data['Nama'] }}
                                    </p>
                                </td>
                                <td class="border-b border-[#eee] px-4 py-5 dark:border-strokedark">
                                    <p class="text-dark">
                                        {{ $data['Prodi'] }}
                                    </p>
                                </td>
                                <td class="border-b border-[#eee] px-4 py-5 dark:border-strokedark">
                                    <p class="text-dark">
                                        {{ $data['Angkatan'] }}
                                    </p>
                                </td>
                                <td class="border-b border-[#eee] px-4 py-5 dark:border-strokedark">
                                    <p class="text-dark">
                                        {{ $data['Status'] }}
                                    </p>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
