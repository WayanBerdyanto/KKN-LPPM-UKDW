@section('title', 'Admin | Dashboard')
@extends('admin.layouts.main')
@section('content')
    {{-- <h1 class="font-normal text-xl">Selamat Datang <strong>{{ Auth::guard('admin')->user()->username }}</strong> ....</h1> --}}
    <h2 class="flex items-center text-2xl font-medium text-gray-700 sm:text-2xl text-boxdark">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
            class="bi bi-grid-1x2 mr-2 font-semibold" viewBox="0 0 16 16">
            <path
                d="M6 1H1v14h5zm9 0h-5v5h5zm0 9v5h-5v-5zM0 1a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1zm9 0a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1h-5a1 1 0 0 1-1-1zm1 8a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1v-5a1 1 0 0 0-1-1z" />
        </svg>
        Dashboard
    </h2>
    <div class="max-w-7xl mx-auto mt-5 mb-10">
        <div class="grid grid-cols-2 gap-5 sm:grid-cols-3 lg:grid-cols-5 mt-4">
            <div class="bg-white overflow-hidden shadow sm:rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                    <dl>
                        <dt class="text-sm leading-5 font-medium text-gray-500 truncate">KKN Reguler</dt>
                        <dd class="mt-1 text-3xl leading-9 font-semibold text-indigo-600">30</dd>
                    </dl>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow sm:rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                    <dl>
                        <dt class="text-sm leading-5 font-medium text-gray-500 truncate">KKNNT ISL HK POLY-U</dt>
                        <dd class="mt-1 text-3xl leading-9 font-semibold text-indigo-600">5</dd>
                    </dl>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow sm:rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                    <dl>
                        <dt class="text-sm leading-5 font-medium text-gray-500 truncate">KKNNT INCLUSIVE AND WASTE
                            MANAGEMENT</dt>
                        <dd class="mt-1 text-3xl leading-9 font-semibold text-indigo-600">19</dd>
                    </dl>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow sm:rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                    <dl>
                        <dt class="text-sm leading-5 font-medium text-gray-500 truncate">KKNNT NUSANTARA</dt>
                        <dd class="mt-1 text-3xl leading-9 font-semibold text-indigo-600">20</dd>
                    </dl>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow sm:rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                    <dl>
                        <dt class="text-sm leading-5 font-medium text-gray-500 truncate">KKNNT INKLUSIF #3 SLB N 1
                            YOGYAKARTA</dt>
                        <dd class="mt-1 text-3xl leading-9 font-semibold text-indigo-600">12</dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>

    <div class="container items-center mt-7 m-auto">
        <div class="flex flex-wrap items-center bg-white divide-y rounded-sm shadow-lg xl:divide-x xl:divide-y-0">
            <div class="w-full p-2 xl:w-1/4 sm:w-1/2">
                <div class="flex flex-col">
                    <div class="flex flex-row items-center justify-between px-4 py-4">
                        <div class="flex mr-4">
                            <span class="items-center px-4 py-4 m-auto bg-green-200 rounded-full hover:bg-green-300">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="items-center w-8 h-8 m-auto text-green-500 hover:text-green-600"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path
                                        d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z" />
                                </svg>
                            </span>
                        </div>
                        <div class="flex-1 pl-1">
                            <div class="text-xl font-medium text-gray-600">900</div>
                            <div class="text-sm text-gray-400 sm:text-base">
                                Mahasiswa Aktif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full p-2 xl:w-1/4 sm:w-1/2">
                <div class="flex flex-col">
                    <div class="flex flex-row items-center justify-between px-4 py-4">
                        <div class="flex mr-4">
                            <span class="items-center px-4 py-4 m-auto bg-red-200 rounded-full hover:bg-red-300">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 600 600"
                                    class="items-center w-8 h-8 m-auto text-red-500 hover:text-red-600" fill="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M160 64c0-35.3 28.7-64 64-64h352c35.3 0 64 28.7 64 64v288c0 35.3-28.7 64-64 64H336.8c-11.8-25.5-29.9-47.5-52.4-64H384V320c0-17.7 14.3-32 32-32h64c17.7 0 32 14.3 32 32v32h64V64L224 64v49.1C205.2 102.2 183.3 96 160 96V64zm0 64a96 96 0 1 1 0 192 96 96 0 1 1 0-192zM133.3 352h53.3C260.3 352 320 411.7 320 485.3c0 14.7-11.9 26.7-26.7 26.7H26.7C11.9 512 0 500.1 0 485.3C0 411.7 59.7 352 133.3 352z" />
                                </svg>
                            </span>
                        </div>
                        <div class="flex-1 pl-1">
                            <div class="text-xl font-medium text-gray-600">15</div>
                            <div class="text-sm text-gray-400 sm:text-base">
                                Dosen Pembimbing
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="w-full p-2 xl:w-1/4 sm:w-1/2">
                <div class="flex flex-col">
                    <div class="flex flex-row items-center justify-between px-4 py-4">
                        <div class="flex mr-4">
                            <span class="items-center px-4 py-4 m-auto bg-yellow-200 rounded-full hover:bg-yellow-300">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="items-center w-8 h-8 m-auto text-yellow-500 hover:text-yellow-600"
                                    viewBox="0 0 640 512" fill="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3zM609.3 512H471.4c5.4-9.4 8.6-20.3 8.6-32v-8c0-60.7-27.1-115.2-69.8-151.8c2.4-.1 4.7-.2 7.1-.2h61.4C567.8 320 640 392.2 640 481.3c0 17-13.8 30.7-30.7 30.7zM432 256c-31 0-59-12.6-79.3-32.9C372.4 196.5 384 163.6 384 128c0-26.8-6.6-52.1-18.3-74.3C384.3 40.1 407.2 32 432 32c61.9 0 112 50.1 112 112s-50.1 112-112 112z" />
                                </svg>
                            </span>
                        </div>
                        <div class="flex-1 pl-1">
                            <div class="text-xl font-medium text-gray-600">60</div>
                            <div class="text-sm text-gray-400 sm:text-base">
                                Jumlah Kelompok
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full p-2 xl:w-1/4 sm:w-1/2">
                <div class="flex flex-col">
                    <div class="flex flex-row items-center justify-between px-4 py-4">
                        <div class="flex mr-4">
                            <span class="items-center px-4 py-4 m-auto bg-green-200 rounded-full hover:bg-green-300">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="items-center w-8 h-8 m-auto text-green-500 hover:text-green-600"
                                    viewBox="0 0 384 512" fill="currentColor">
                                    <path
                                        d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z" />
                                </svg>
                            </span>
                        </div>
                        <div class="flex-1 pl-1">
                            <div class="text-xl font-medium text-gray-600">20</div>
                            <div class="text-sm text-gray-400 sm:text-base">
                                Sebaran Lokasi
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="w-full block lg:flex lg:justify-between lg:items-center mt-8">
        <div class="w-full md:w-1/2 text-center md:text-left mb-2 md:mb-0">
            <h1 class="text-2xl font-semibold text-gray-700 sm:text-2xl">
                Daftar KKN
            </h1>
        </div>
        <div class="flex items-center w-full lg:w-1/3">
            <form class="w-full" method="GET" action="/admin/searchsemester">
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
                    <input type="search" id="default-search" name="value"
                        class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray duration-500 rounded-lg focus:outline-none focus:ring  focus:ring-primary dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-secondary dark:focus:ring-primary dark:focus:border-primary"
                        placeholder="Search.." />
                    <button type="submit"
                        class="text-secondary absolute end-2.5 bottom-2.5 bg-primary hover:bg-opacity-90 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-primary dark:focus:ring-opacity-90">Search</button>
                </div>
            </form>
            <button @click="modalSemester = true"
                class="ml-4 inline-flex items-center justify-end gap-2.5 lg:mt-0 bg-primary px-4 py-3 text-center rounded-xl font-medium text-secondary hover:bg-opacity-90 lg:px-5">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-plus-circle-fill text-secondary text-xl" viewBox="0 0 16 16">
                    <path
                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z" />
                </svg>
            </button>
        </div>
    </div>

    <div class="w-full mt-5 relative overflow-x-auto">
        <hr class="mt-2 border">
        <table class="w-full text-sm text-left rtl:text-right mt-3 border">
            <thead class="text-xs text-secondary uppercase bg-slate-700">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        NO
                    </th>
                    <th scope="col" class="px-6 py-3">
                        KODE SEMESTER
                    </th>
                    <th scope="col" class="px-6 py-3">
                        SEMESTER
                    </th>
                    <th scope="col" class="px-6 py-3">
                        TAHUN
                    </th>
                    <th scope="col" class="px-6 py-3">
                        STATUS
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($result as $idx => $item)
                    <tr class="odd:bg-secondary even:bg-gray-200 text-dark">
                        <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
                            {{ $result->firstItem() + $idx }}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
                            {{ $item->kode_semester }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $item->semester }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $item->tahun_ajaran }}
                        </td>
                        <td class="px-6 py-4 ">
                            @if ($item->status == 'Aktif')
                                <span class="text-green-500 font-semibold">{{ $item->status }}</span>
                            @else
                                <span class="text-red-500 font-semibold">{{ $item->status }}</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center space-x-4">
                                <button @click="modalUpdate = true" data-toggle="modal" data-target="#formModal"
                                    data-id="{{ $item->kode_semester }}"
                                    class="bg-primary px-3 py-1 rounded-lg hover:opacity-90 tampilModalUbah">
                                    <i class="fa-solid fa-pen-to-square text-lg text-secondary"></i>
                                </button>
                                <a href="#"
                                    onclick="confirmDelete('/admin/deletesemester/{{ $item->kode_semester }}')"
                                    class="bg-red-600 px-3 py-1 rounded-lg hover:opacity-90" data-confirm-delete="true">
                                    <i class="fa-solid fa-trash text-lg text-secondary"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div x-show="modalUpdate" x-transition
        class="fixed left-0 top-0 flex h-full min-h-screen w-full items-center justify-center bg-dark/90 px-4 py-5 z-40">
        <div id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel"
            class="w-full max-w-[570px] rounded-[20px] bg-white px-8 py-12  dark:bg-dark-2 md:px-[70px] md:py-[60px]">
            <h3 id="formModalLabel" class="pb-[18px] text-xl font-semibold text-dark text-center sm:text-2xl">
                Update Semester Aktif
            </h3>
            <span class="mx-auto mb-6 flex h-1 w-[120px] rounded text-center bg-primary"></span>

            <form action="/admin/postupdate/{kode_semester}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4.5">
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Kode Semester
                    </label>
                    <input id="kode_semester" name="kode_semester" type="text" maxlength="5" readonly
                        placeholder="Masukan Kode"
                        class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                </div>
                <div class="mb-4.5">
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Semester
                    </label>
                    <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-transparent dark:bg-form-input">
                        <select id="semester" name="semester"
                            class="relative z-20 w-full appearance-none rounded border border-stroke bg-transparent px-5 py-3 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                            :class="isOptionSelected && 'text-black dark:text-white'" @change="isOptionSelected = true">
                            <option value="Ganjil" class="text-body">Ganjil</option>
                            <option value="Genap" class="text-body">Genap</option>
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
                        Tahun Ajaran
                    </label>
                    <input id="tahun_ajaran" name="tahun_ajaran" type="text" placeholder="Masukan Tahun"
                        class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                </div>
                <div class="mb-4.5">
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Status
                    </label>
                    <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-transparent dark:bg-form-input">
                        <select id="status" name="status"
                            class="relative z-20 w-full appearance-none rounded border border-stroke bg-transparent px-5 py-3 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                            :class="isOptionSelected && 'text-black dark:text-white'" @change="isOptionSelected = true">
                            <option value="Aktif" class="text-body">Aktif</option>
                            <option value="Tidak Aktif" class="text-body">Tidak Aktif</option>
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
                <div class="-mx-3 flex flex-wrap">
                    <div class="w-1/2 px-3">
                        <button @click="modalUpdate = false" type="reset"
                            class="block w-full rounded-md border border-stroke p-3 text-center text-base font-medium text-dark transition hover:border-red-600 hover:bg-red-600 hover:text-white">
                            Cancel
                        </button>
                    </div>
                    <div class="w-1/2 px-3">
                        <button href="/admin/logout"
                            class="block w-full rounded-md border border-primary bg-primary hover:opacity-90 p-3 text-center text-base font-medium text-white transition hover:bg-blue-dark">
                            Simpan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{-- Jquery Update Form --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            var kodeSemester;

            $('.tampilModalUbah').click(function() {
                kodeSemester = $(this).data('id');
                console.log(kodeSemester);
                $('form').attr('action', '/admin/postupdate/' + kodeSemester);
                $.ajax({
                    url: "/admin/updatesemester/" + kodeSemester,
                    method: "GET",
                    dataType: "json",
                    success: function(response) {
                        var kodeSemester = response.update.kode_semester;
                        var semester = response.update.semester;
                        var tahunAjaran = response.update.tahun_ajaran;
                        var status = response.update.status;
                        $('#kode_semester').val(kodeSemester);
                        $('#semester').val(semester);
                        $('#tahun_ajaran').val(tahunAjaran);
                        $('#status').val(status);
                        // Now you can use these variables as needed
                        console.log("Kode Semester: " + kodeSemester);
                        console.log("Semester: " + semester);
                        console.log("Tahun Ajaran: " + tahunAjaran);
                        console.log("Status: " + status);
                    },
                    error: function(xhr, status, error) {
                        console.error("Error:", error);
                    }
                });
            });
        });
    </script>
    {{-- END Jquery Update Form --}}

    {{-- Insert Semester Aktif --}}
    <div x-show="modalSemester" x-transition
        class="fixed left-0 top-0 flex h-full min-h-screen w-full items-center justify-center bg-dark/90 px-4 py-5 z-40">
        <div class="w-full max-w-[570px] rounded-[20px] bg-white px-8 py-12  dark:bg-dark-2 md:px-[70px] md:py-[60px]">
            <h3 class="pb-[18px] text-xl font-semibold text-dark text-center sm:text-2xl">
                Form Semester Aktif
            </h3>
            <span class="mx-auto mb-6 flex h-1 w-[120px] rounded text-center bg-primary"></span>

            <form action="/admin/postsemester" method="POST">
                @csrf
                <div class="mb-4.5">
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Kode Semester
                    </label>
                    <input name="kode_semester" type="text" maxlength="5" placeholder="Masukan Kode"
                        class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                </div>
                <div class="mb-4.5">
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Semester
                    </label>
                    <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-transparent dark:bg-form-input">
                        <select name="semester"
                            class="relative z-20 w-full appearance-none rounded border border-stroke bg-transparent px-5 py-3 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                            :class="isOptionSelected && 'text-black dark:text-white'" @change="isOptionSelected = true">
                            <option value="Ganjil" class="text-body">Ganjil</option>
                            <option value="Genap" class="text-body">Genap</option>
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
                        Tahun Ajaran
                    </label>
                    <input name="tahun_ajaran" type="text" placeholder="Masukan Tahun"
                        class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                </div>
                <div class="mb-4.5">
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Status
                    </label>
                    <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-transparent dark:bg-form-input">
                        <select name="status"
                            class="relative z-20 w-full appearance-none rounded border border-stroke bg-transparent px-5 py-3 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                            :class="isOptionSelected && 'text-black dark:text-white'" @change="isOptionSelected = true">
                            <option value="Aktif" class="text-body">Aktif</option>
                            <option value="Tidak Aktif" class="text-body">Tidak Aktif</option>
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
                <div class="-mx-3 flex flex-wrap">
                    <div class="w-1/2 px-3">
                        <button @click="modalSemester = false" type="reset"
                            class="block w-full rounded-md border border-stroke p-3 text-center text-base font-medium text-dark transition hover:border-red-600 hover:bg-red-600 hover:text-white">
                            Cancel
                        </button>
                    </div>
                    <div class="w-1/2 px-3">
                        <button href="/admin/logout"
                            class="block w-full rounded-md border border-primary bg-primary hover:opacity-90 p-3 text-center text-base font-medium text-white transition hover:bg-blue-dark">
                            Simpan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        function confirmDelete(url) {
            Swal.fire({
                title: 'Anda Yakin?',
                text: "Anda tidak akan dapat mengembalikan ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect to the delete URL
                    window.location.href = url;
                }
            });
        }
    </script>
    {{-- END Semester Aktif --}}

@endsection
