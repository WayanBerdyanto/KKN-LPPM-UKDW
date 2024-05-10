@section('title', 'Admin | Kelompok')
@extends('admin.layouts.main')
@section('content')
    <h2 class="ml-3 font-semibold text-2xl">DAFTAR KELOMPOK KKN UKDW 2024</h2>
    <div class="my-5 py-2 border-b-2 flex justify-between items-center px-3">
        <form class="w-full lg:w-1/3" method="GET" action="/admin/kelompok/search">
            <label for="default-search"
                class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-secondary">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="search" id="default-search" name="name"
                    class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray duration-500 rounded-lg focus:outline-none focus:ring  focus:ring-primary dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-secondary dark:focus:ring-primary dark:focus:border-primary"
                    placeholder="Search.." />
                <button type="submit"
                    class="text-secondary absolute end-2.5 bottom-2.5 bg-primary hover:bg-opacity-90 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-primary dark:focus:ring-opacity-90">Search</button>
            </div>
        </form>
        <a href= "/admin/kelompok/forminsert"
            class="ml-1 flex bg-primary items-center py-2 px-3 shadow-lg text-secondary rounded-3xl text-md font-normal hover:bg-blue-500">
            <i class="fa-solid fa-user-plus"></i>
            Add
        </a>
    </div>
    @foreach ($result as $item)
        <div
            class="w-full bg-white py-3 pl-5 flex justify-between items-center hover:bg-gray-100 duration-500 mt-4 shadow-lg rounded-3xl mb-5 hover:bg-slate-50 cursor-pointer">
            <a href="/admin/kelompok/detail/{{ $item->kode_kelompok }}" class="w-full py-1 px-3">
                <h1 class="text-dark text-md font-bold">
                    {{ $item->nama_kelompok }} ({{ $item->nama_kkn }} )
                </h1>
                <h2 class="text-dark mt-2 text-sm font-medium">
                    Dosen : {{ $item->nama_dosen1 }},
                    {{ $item->nama_dosen2 }}
                </h2>
                <span class="text-dark mt-1 text-sm font-normal block">
                    {{ $item->desa }},
                    {{ $item->kecamatan }},
                    {{ $item->kabupaten }},
                    {{ $item->provinsi }},
                </span>
                <div class="flex text-dark text-sm font-normal mt-1 items-center">
                    <div class="mr-3">
                        @if ($item->semester == 'Genap')
                            <span class="text-primary font-semibold">
                                {{ $item->semester }}
                            </span>
                        @else
                            <span class="text-green-600 font-semibold">
                                {{ $item->semester }}
                            </span>
                        @endif

                        <span>
                            {{ $item->tahun_ajaran }}
                        </span>
                    </div>
                    @if ($item->status == 'Aktif')
                        <span class="text-secondary px-3 rounded-full py-1 bg-primary font-semibold">
                            {{ $item->status }}
                        </span>
                    @else
                        <span class="text-secondary px-3 rounded-full py-1 bg-red-600 font-semibold">
                            {{ $item->status }}
                        </span>
                    @endif
                </div>
                <span class="text-sm font-semibold">
                    {{ $item->id_mahasiswa_terdaftar }}- {{ $item->kapasitas }} Peserta
                </span>
            </a>
            <div class="px-3 grid lg:gap-6 grid-cols-0 gap-y-2  lg:grid-cols-2 text-2xl">
                <a href="/admin/kelompok/formedit/{{ $item->kode_kelompok }}" class="text-primary hover:opacity-90">
                    <i class="fa-solid fa-pen-to-square"></i>
                </a>
            </div>
        </div>
    @endforeach




@endsection
