@section('title', 'Logbook Mahasiswa')
@extends('mahasiswa.layouts.main')
@section('content')
    <div class="relative flex flex-wrap justify-between items-center w-full p-2.5">
        <div class="w-full mb-5 lg:w-2/6">
            <img src="{{ asset('img/logo-ukdw.png') }}" alt=""
                class="object-contain w-full md:w-40 h-40 rounded-full md:border md:border-primary lg:m-auto">
        </div>
        <div class="w-full  lg:w-4/6 py-2">
            <div class="flex justify-between border-b-2 border-gray-300 py-2">
                <div>
                    <h1 class="text-dark text-md font-bold">Kalistus Alvino</h1>
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
        <div class="w-full mt-5 relative overflow-x-auto">
            <div class="flex justify-between items-center py-2">
                <h1 class="font-semibold text-lg lg:text-2xl uppercase">Logbook KKN</h1>
                <div class="flex items-center text-right py-2">
                    <a href="/mahasiswa/logbook/tambah"
                        class="ml-0 lg:ml-5 mt-2 lg:mt-0 block bg-primary text-secondary py-1.5 px-2 font-normal rounded-lg text-center hover:bg-blue-500">
                        <i class="fa-solid fa-address-book mr-2"></i>Tambah Logbook</a>
                </div>
            </div>
            <hr class="mt-2 border">
            <div class="mt-2 w-full p-4 bg-white border border-gray-200 rounded-lg drop-shadow-lg">
                <div class="md:flex justify-between">
                    <div class="flex space-x-3">
                        <img src="{{ asset('img/logo-ukdw.png') }}"
                            class="object-contain md:w-12 h-12 rounded-full md:border md:border-primary ">
                        <h5 class="text-1xl font-semibold text-dark my-2.5">Pembelajaran Whatsapp Bussiness</h5>
                    </div>
                    <div>
                        <h5 class="text-1xl font-semibold text-red-600 my-2.5">Perlu Direvisi</h5>
                    </div>
                </div>
                <hr class="mt-2 border">
                <h5 class="mt-2 mb-2 text-1xl font-semibold text-dark">Senin, 25 Desember 2023</h5>
                <p class="text-base text-dar">On this day, I was still in the process of creating my first app submission. I
                    had already successfully connected the login page and registration page to the API. What I needed to do
                    for my first submission was to display the stories on the stories page.</p>
                <hr class="mt-2 border">
                <h5 class="text-1xl font-semibold text-red-600 my-2.5">Komentar</h5>
                <p class="text-base text-dar mt-2 text-gray-500">Logbook yang ditulis masih kurang jelas apa kegiatan yang
                    dilakukan oleh mahasiswa di lokasi KKN</p>
                <div class="fkex items-center text-right mt-2">
                    <a href="" class="text-blue-500">
                        Revisi
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>

            </div>
            <div class="mt-2 p-4 bg-white border border-gray-200 rounded-lg drop-shadow-lg">
                <div class="md:flex justify-between">
                    <div class="flex space-x-3 items-center">
                        <img src="{{ asset('img/logo-ukdw.png') }}"
                            class="object-contain md:w-12 h-12 rounded-full md:border md:border-primary">
                        <h5 class="text-1xl font-semibold text-dark my-2.5">Mengajar Anak Sekolah</h5>
                    </div>
                    <div>
                        <h5 class="text-1xl font-semibold text-green-600 my-2.5">Diterima</h5>
                    </div>
                </div>
                <hr class="mt-2 border">
                <h5 class="mt-2 mb-2 text-1xl font-semibold text-dark">Minggu, 24 Desember 2023</h5>
                <p class="text-base text-dar">On this day, I was still in the process of creating my first app submission. I
                    had already successfully connected the login page and registration page to the API. What I needed to do
                    for my first submission was to display the stories on the stories page.</p>
            </div>
            <div class="mt-2 p-4 bg-white border border-gray-200 rounded-lg drop-shadow-lg">
                <div class="md:flex justify-between">
                    <div class="flex space-x-3 items-center">
                        <img src="{{ asset('img/logo-ukdw.png') }}"
                            class="object-contain md:w-12 h-12 rounded-full md:border md:border-primary">
                        <h5 class="text-1xl font-semibold text-dark my-2.5">Mengajar Anak Sekolah</h5>
                    </div>
                    <div>
                        <h5 class="text-1xl font-semibold text-blue-600 my-2.5">Menunggu</h5>
                    </div>
                </div>
                <hr class="mt-2 border">
                <h5 class="mt-2 mb-2 text-1xl font-semibold text-dark">Sabtu, 23 Desember 2023</h5>
                <p class="text-base text-dar">On this day, I was still in the process of creating my first app submission. I
                    had already successfully connected the login page and registration page to the API. What I needed to do
                    for my first submission was to display the stories on the stories page.</p>
            </div>
        </div>
    </div>
@endsection
