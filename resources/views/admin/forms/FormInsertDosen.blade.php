@section('title', 'Admin | Daftar Dosen')
@extends('admin.layouts.main')
@section('content')
    <div class="w-full px-5">
        <nav>
            <ol class="flex items-center gap-2">
                <li>
                    <a class="font-medium" href="/admin/daftardosen">Daftar Dosen /</a>
                </li>
                <li class="font-medium text-primary">Form Dosen</li>
            </ol>
        </nav>
        <div class="rounded-sm border mt-4 border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
            <div class="border-b border-stroke px-6.5 py-4 dark:border-strokedark">
                <h3 class="font-medium text-black dark:text-white">
                    Form Dosen
                </h3>
            </div>
            <form method="POST" action="{{ route('InsertDosen') }}">
                @csrf
                <div class="p-6.5">
                    <div class="mb-4.5">
                        <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                            Nip
                        </label>
                        <input type="text" maxlength="8" placeholder="Masukan Nip" name="nip"
                            value="{{ old('nip') }}"
                            class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                    </div>

                    <div class="mb-4.5">
                        <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                            Username
                        </label>
                        <input type="text" placeholder="Masukan Username" name="username" value="{{ old('username') }}"
                            class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                    </div>

                    <div class="mb-4.5">
                        <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                            Nama
                        </label>
                        <input name="nama" type="text" value="{{ old('nama') }} placeholder="Masukan Nama"
                            class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
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
                            Alamat
                        </label>
                        <div class="mr-5 font-normal">
                            <textarea name="alamat" cols="70" rows="4"
                                class="block w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"></textarea>
                        </div>

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
                            No Telp
                        </label>
                        <input name="no_telp" type="number" placeholder="Masukan No Telp"
                            class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
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
