@section('title', 'Admin | Insert Mahasiswa')
@extends('admin.layouts.main')
@section('content')
    <div class="w-full px-5">
        <nav>
            <ol class="flex items-center gap-2">
                <li>
                    <a class="font-medium" href="/admin/daftarmahasiswa">Daftar Mahasiswa /</a>
                </li>
                <li class="font-medium text-primary">Form Mahasiswa</li>
            </ol>
        </nav>
        <div class="rounded-sm border mt-4 border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
            <div class="border-b border-stroke px-6.5 py-4 dark:border-strokedark">
                <h3 class="font-medium text-black dark:text-white">
                    Form Mahasiswa
                </h3>
            </div>
            <form method="POST" action="/admin/daftarmahasiswa/postinsert">
                @csrf
                <div class="p-6.5">
                    <div class="mb-4.5">
                        <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                            Nim
                        </label>
                        <input type="text" maxlength="8" placeholder="Masukan Nim" name="username"
                            class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                    </div>

                    <div class="mb-4.5">
                        <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                            Nama
                        </label>
                        <input name="nama" type="text" maxlength="8" placeholder="Masukan Nama"
                            class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                    </div>

                    <div class="mb-4.5">
                        <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                            Email
                        </label>
                        <input name="email" type="email" placeholder="Masukan Email"
                            class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                    </div>

                    <div class="mb-4.5">
                        <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                            Prodi
                        </label>
                        <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-transparent dark:bg-form-input">
                            <select name="prodi"
                                class="relative z-20 w-full appearance-none rounded border border-stroke bg-transparent px-5 py-3 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                                :class="isOptionSelected && 'text-black dark:text-white'" @change="isOptionSelected = true">
                                <option value="" class="text-body">
                                    Pilih Prodi
                                </option>
                                @foreach ($prodi as $item)
                                    <option value="{{ $item }}" class="text-body">{{ $item }}</option>
                                @endforeach
                            </select>
                            <span class="absolute right-4 top-1/2 z-30 -translate-y-1/2">
                                <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g opacity="0.8">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M5.29289 8.29289C5.68342 7.90237 6.31658 7.90237 6.70711 8.29289L12 13.5858L17.2929 8.29289C17.6834 7.90237 18.3166 7.90237 18.7071 8.29289C19.0976 8.68342 19.0976 9.31658 18.7071 9.70711L12.7071 15.7071C12.3166 16.0976 11.6834 16.0976 11.2929 15.7071L5.29289 9.70711C4.90237 9.31658 4.90237 8.68342 5.29289 8.29289Z"
                                            fill=""></path>
                                    </g>
                                </svg>
                            </span>
                        </div>
                    </div>
                    <div class="mb-4.5">
                        <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                            Gender
                        </label>
                        <div class="flex">
                            <div class="mr-5 font-normal">
                                <input type="radio" name="gender" id="lakilaki" value="laki-laki" checked>
                                <label for="lakilaki">Laki-Laki</label>
                            </div>
                            <div class="font-normal">
                                <input type="radio" name="gender" id="perempuan" value="Perempuan">
                                <label for="perempuan">Perempuan</label>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4.5">
                        <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                            Angkatan
                        </label>
                        <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-transparent dark:bg-form-input">
                            <select name="angkatan"
                                class="relative z-20 w-full appearance-none rounded border border-stroke bg-transparent px-5 py-3 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                                :class="isOptionSelected && 'text-black dark:text-white'" @change="isOptionSelected = true">
                                <option value="" class="text-body">
                                    Pilih Angkatan
                                </option>
                                @foreach ($angkatan as $item)
                                    <option value="{{ $item }}" class="text-body">{{ $item }}</option>
                                @endforeach
                            </select>
                            <span class="absolute right-4 top-1/2 z-30 -translate-y-1/2">
                                <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g opacity="0.8">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M5.29289 8.29289C5.68342 7.90237 6.31658 7.90237 6.70711 8.29289L12 13.5858L17.2929 8.29289C17.6834 7.90237 18.3166 7.90237 18.7071 8.29289C19.0976 8.68342 19.0976 9.31658 18.7071 9.70711L12.7071 15.7071C12.3166 16.0976 11.6834 16.0976 11.2929 15.7071L5.29289 9.70711C4.90237 9.31658 4.90237 8.68342 5.29289 8.29289Z"
                                            fill=""></path>
                                    </g>
                                </svg>
                            </span>
                        </div>
                    </div>

                    <button
                        class="flex w-full justify-center rounded bg-primary p-3 font-medium text-gray hover:bg-opacity-90">
                        Tambah
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
