@section('title', 'Logbook | Mahasiswa')
@extends('mahasiswa.layouts.main')
@section('content')
    <div class="container relative flex flex-wrap justify-between items-center w-full p-2.5">
        <div class="w-full mt-5 relative overflow-x-auto">
            <div class="flex justify-between items-center py-2">
                <h1 class="font-semibold text-lg lg:text-2xl uppercase">Logbook KKN</h1>
                <div class="flex items-center text-right py-2">
                    <button @click="modalLogbook = true" data-toggle="modal" data-target="#modalLogbook"
                        class="ml-0 lg:ml-5 mt-2 lg:mt-0 block bg-primary text-secondary px-3 py-2 font-normal rounded-lg text-center hover:bg-opacity-90">
                        <i class="fa-solid fa-address-book mr-2"></i>Tambah Logbook</button>
                </div>
            </div>
            <hr class="mt-4 border-opacity-50 border-primary">
            {{-- Card Logbook --}}
            @foreach ($result as $data)
                <div class="mt-6 w-full p-4 bg-whiten dark:bg-boxdark rounded-lg drop-shadow-lg">
                    <div class="md:flex justify-between">
                        <div class="flex space-x-3">
                            <img src="{{ asset('img/logo-ukdw.png') }}"
                                class="object-contain md:w-12 h-12 rounded-full md:border md:border-primary ">
                            <h5 class="text-1xl font-semibold text-dark dark:text-whiten my-2.5">
                                {{ $data->judul }}
                            </h5>
                        </div>
                        <div class="flex p-2 text-secondary">
                            <a href="" class="bg-primary hover:bg-opacity-90 mr-4 px-3 py-2 rounded-lg">
                                <i class="fa-regular fa-pen-to-square"></i>
                                Detail
                            </a>
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
                    <h5 class="mt-2 mb-2 text-1xl font-semibold text-dark dark:text-whiten">
                        {{ date('l, j F Y', strtotime($data->tanggal)) }}
                    </h5>
                    <p class="text-base text-dark truncate ">
                        {{ $data->deskripsi }}
                    </p>
                    <hr class="mt-2 border border-secondary">
                    <h5 class="text-1xl font-semibold text-primary my-2.5">Komentar</h5>
                    <p class="text-base text-dar mt-2 text-gray-500">
                        @if (empty($data->komentar_dosen))
                            <span class="italic">belum ada komentar</span>
                        @else
                            {{ $data->komentar_dosen }}
                        @endif
                    </p>
                </div>
            @endforeach
            {{-- END Logbook --}}
        </div>
    </div>

    <div x-show="modalLogbook" x-transition
        class="fixed left-0 top-0 flex h-full min-h-screen w-full items-center justify-center bg-dark/90 px-4 py-5 z-40">
        <div id="modalLogbook" @click.outside="modalLogbook = false"
            class="w-full max-w-[570px] rounded-[20px] bg-white px-8 py-12  dark:bg-dark-2 md:px-[70px] md:py-[60px]">
            <h3 class="pb-[18px] text-xl font-semibold text-dark text-center sm:text-2xl">
                Logbook
            </h3>
            <span class="mx-auto mb-6 flex h-1 w-[120px] rounded text-center bg-primary"></span>

            <form action="/mahasiswa/logbook/postLogbook" method="POST">
                @csrf
                <input type="text" name="idMhs" value="{{ Auth::guard('mahasiswa')->user()->id }}" hidden>
                <div class="mb-4.5">
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Judul
                    </label>
                    <input name="judul" type="text" placeholder="Masukan Judul"
                        class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                </div>
                <div class="mb-4.5">
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Tanggal
                    </label>
                    <input name="tanggal" type="date" placeholder="Masukan Tanggal"
                        class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                </div>
                <div class="mb-4.5">
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Deskripsi
                    </label>
                    <textarea name="deskripsi" cols="30" rows="10"
                        class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"></textarea>
                </div>
                <div class="-mx-3 flex flex-wrap">
                    <div class="w-1/2 px-3">
                        <button @click="modalLogbook = false" type="reset"
                            class="block w-full rounded-md border border-stroke p-3 text-center text-base font-medium text-dark transition hover:border-red-600 hover:bg-red-600 hover:text-white">
                            Cancel
                        </button>
                    </div>
                    <div class="w-1/2 px-3">
                        <button
                            class="block w-full rounded-md border border-primary bg-primary hover:opacity-90 p-3 text-center text-base font-medium text-white transition hover:bg-blue-dark">
                            Simpan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
