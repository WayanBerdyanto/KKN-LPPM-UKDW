@section('title', 'Logbook | Mahasiswa')
@extends('mahasiswa.layouts.main')
@section('content')
    <div class="container relative flex flex-wrap justify-between items-center w-full p-2.5">
        <div class="w-full mt-5 relative overflow-x-auto">
            <div class="flex justify-between items-center py-2">
                <h1 class="font-semibold text-lg lg:text-2xl uppercase">Logbook KKN</h1>
                <div class="flex items-center text-right py-2">
                    <a href="/mahasiswa/logbook/tambah"
                        class="ml-0 lg:ml-5 mt-2 lg:mt-0 block bg-primary text-secondary px-3 py-2 font-normal rounded-lg text-center hover:bg-opacity-90">
                        <i class="fa-solid fa-address-book mr-2"></i>Tambah Logbook</a>
                </div>
            </div>
            <hr class="mt-4 border-opacity-50 border-primary">
            {{-- Card Logbook --}}
            <div class="mt-6 w-full p-4 bg-whiten dark:bg-boxdark rounded-lg drop-shadow-lg">
                <div class="md:flex justify-between">
                    <div class="flex space-x-3">
                        <img src="{{ asset('img/logo-ukdw.png') }}"
                            class="object-contain md:w-12 h-12 rounded-full md:border md:border-primary ">
                        <h5 class="text-1xl font-semibold text-dark dark:text-whiten my-2.5">Pembelajaran Whatsapp Bussiness
                        </h5>
                    </div>
                    <div class="flex p-2 text-secondary">
                        <a href="" class="bg-primary hover:bg-opacity-90 mr-4 px-3 py-2 rounded-lg">
                            <i class="fa-regular fa-pen-to-square"></i>
                            Edit
                        </a>
                        <a href="" class="bg-red-500 hover:bg-opacity-90 px-3 py-2 rounded-lg">
                            <i class="fa-solid fa-trash"></i>
                            Hapus
                        </a>
                    </div>
                </div>
                <hr class="mt-2 border border-secondary">
                <h5 class="mt-2 mb-2 text-1xl font-semibold text-dark dark:text-whiten">Senin, 25 Desember 2023</h5>
                <p class="text-base text-dar">On this day, I was still in the process of creating my first app submission. I
                    had already successfully connected the login page and registration page to the API. What I needed to do
                    for my first submission was to display the stories on the stories page.</p>
                <hr class="mt-2 border border-secondary">
                <h5 class="text-1xl font-semibold text-primary my-2.5">Komentar</h5>
                <p class="text-base text-dar mt-2 text-gray-500">Logbook yang ditulis masih kurang jelas apa kegiatan yang
                    dilakukan oleh mahasiswa di lokasi KKN</p>
            </div>
            {{-- END Logbook --}}
            {{-- Card Logbook --}}
            <div class="mt-6 w-full p-4 bg-whiten dark:bg-boxdark rounded-lg drop-shadow-lg">
                <div class="md:flex justify-between">
                    <div class="flex space-x-3">
                        <img src="{{ asset('img/logo-ukdw.png') }}"
                            class="object-contain md:w-12 h-12 rounded-full md:border md:border-primary ">
                        <h5 class="text-1xl font-semibold text-dark dark:text-whiten my-2.5">Pembelajaran Whatsapp Bussiness
                        </h5>
                    </div>
                    <div class="flex p-2 text-secondary">
                        <a href="" class="bg-primary hover:bg-opacity-90 mr-4 px-3 py-2 rounded-lg">
                            <i class="fa-regular fa-pen-to-square"></i>
                            Edit
                        </a>
                        <a href="" class="bg-red-500 hover:bg-opacity-90 px-3 py-2 rounded-lg">
                            <i class="fa-solid fa-trash"></i>
                            Hapus
                        </a>
                    </div>
                </div>
                <hr class="mt-2 border border-secondary">
                <h5 class="mt-2 mb-2 text-1xl font-semibold text-dark dark:text-whiten">Senin, 25 Desember 2023</h5>
                <p class="text-base text-dar">On this day, I was still in the process of creating my first app submission. I
                    had already successfully connected the login page and registration page to the API. What I needed to do
                    for my first submission was to display the stories on the stories page.</p>
                <hr class="mt-2 border border-secondary">
                <h5 class="text-1xl font-semibold text-primary my-2.5">Komentar</h5>
                <p class="text-base text-dar mt-2 text-gray-500">Belum Ada Komentar</p>
            </div>
            {{-- END Logbook --}}
            {{-- Card Logbook --}}
            <div class="mt-6 w-full p-4 bg-whiten dark:bg-boxdark rounded-lg drop-shadow-lg">
                <div class="md:flex justify-between">
                    <div class="flex space-x-3">
                        <img src="{{ asset('img/logo-ukdw.png') }}"
                            class="object-contain md:w-12 h-12 rounded-full md:border md:border-primary ">
                        <h5 class="text-1xl font-semibold text-dark dark:text-whiten my-2.5">Pembelajaran Whatsapp Bussiness
                        </h5>
                    </div>
                    <div class="flex p-2 text-secondary">
                        <a href="" class="bg-primary hover:bg-opacity-90 mr-4 px-3 py-2 rounded-lg">
                            <i class="fa-regular fa-pen-to-square"></i>
                            Edit
                        </a>
                        <a href="" class="bg-red-500 hover:bg-opacity-90 px-3 py-2 rounded-lg">
                            <i class="fa-solid fa-trash"></i>
                            Hapus
                        </a>
                    </div>
                </div>
                <hr class="mt-2 border border-secondary">
                <h5 class="mt-2 mb-2 text-1xl font-semibold text-dark dark:text-whiten">Senin, 25 Desember 2023</h5>
                <p class="text-base text-dar">On this day, I was still in the process of creating my first app submission. I
                    had already successfully connected the login page and registration page to the API. What I needed to do
                    for my first submission was to display the stories on the stories page.</p>
                <hr class="mt-2 border border-secondary">
                <h5 class="text-1xl font-semibold text-primary my-2.5">Komentar</h5>
                <p class="text-base text-dar mt-2 text-gray-500">Logbook yang ditulis masih kurang jelas apa kegiatan yang
                    dilakukan oleh mahasiswa di lokasi KKN</p>
            </div>
            {{-- END Logbook --}}
        </div>
    </div>
@endsection
