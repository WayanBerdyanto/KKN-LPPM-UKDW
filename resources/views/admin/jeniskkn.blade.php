@section('title', 'Admin | Jenis KKN')
@extends('admin.layouts.main')
@section('content')
    <div class="w-full block lg:flex lg:justify-between lg:items-center mt-8">
        <div class="w-full md:w-1/2 text-center md:text-left mb-2 md:mb-0">
            <h1 class="text-2xl font-semibold text-gray-700 sm:text-2xl">
                Daftar Jenis KKN
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
            <button @click="modalInsertJenis = true"
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
                        KODE JENIS
                    </th>
                    <th scope="col" class="px-6 py-3">
                        NAMA KKN
                    </th>
                    <th scope="col" class="px-6 py-3">
                        SEMESTER
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
                            {{ $item->kode_jenis }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $item->nama_kkn }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $item->tahun_ajaran }} ({{ $item->semester }})
                        </td>
                        <td class="px-6 py-4">
                            @if ($item->status == 'Aktif')
                                <span class="text-green-600 font-semibold">
                                    {{ $item->status }}
                                </span>
                            @else
                                <span class="text-red-600 font-semibold">
                                    {{ $item->status }}
                                </span>
                            @endif
                        </td>

                        <td class="px-6 py-4">
                            <div class="flex items-center space-x-4">
                                <button @click="modalDetailJenis = true" data-toggle="modal" data-target="#modalDetail"
                                    data-id="{{ $item->kode_jenis }}"
                                    class="bg-primary px-3 py-1 rounded-lg hover:opacity-90 tampilModalDetail">
                                    <i class="fa-solid fa-info text-lg text-secondary"></i>
                                </button>
                                <button @click="modalUpdateJenis = true" data-toggle="modal" data-target="#formEditModal"
                                    data-id="{{ $item->kode_jenis }}"
                                    class="bg-primary px-3 py-1 rounded-lg hover:opacity-90 tampilModalUbah">
                                    <i class="fa-solid fa-pen-to-square text-lg text-secondary"></i>
                                </button>
                                <a href="#" onclick="confirmDelete('/admin/deletejeniskkn/{{ $item->kode_jenis }}')"
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
    {{-- Insert Jenis KKN --}}
    <div x-show="modalInsertJenis" x-transition
        class="fixed left-0 top-0 flex h-full min-h-screen w-full items-center justify-center bg-dark/90 px-4 py-5 z-40">
        <div class="w-full max-w-[570px] rounded-[20px] bg-white px-8 py-12  dark:bg-dark-2 md:px-[70px] md:py-[60px]">
            <h3 class="pb-[18px] text-xl font-semibold text-dark text-center sm:text-2xl">
                Form Jenis KKN
            </h3>
            <span class="mx-auto mb-6 flex h-1 w-[120px] rounded text-center bg-primary"></span>

            <form action="/admin/postjenis" method="POST">
                @csrf
                <div class="mb-4.5">
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Kode jenis
                    </label>
                    <input name="kode_jenis" type="text" maxlength="5" placeholder="Masukan Kode"
                        class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                </div>
                <div class="mb-4.5">
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Nama KKN
                    </label>
                    <input name="nama_kkn" type="text" placeholder="Masukan Nama"
                        class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                </div>
                <div class="mb-4.5">
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Semester Aktif
                    </label>
                    <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-transparent dark:bg-form-input">
                        <select id="kode_semester" name="kode_semester"
                            class="relative z-20 w-full appearance-none rounded border border-stroke bg-transparent px-5 py-3 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                            :class="isOptionSelected && 'text-black dark:text-white'" @change="isOptionSelected = true">
                            @foreach ($kode_semester as $item)
                                <option value="{{ $item->kode_semester }}" class="text-body">
                                    {{ $item->tahun_ajaran }} ({{ $item->semester }})
                                </option>
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
                        Lokasi KKN
                    </label>
                    <input name="lokasi_kkn" type="text" placeholder="Masukan Lokasi"
                        class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                </div>
                <div class="-mx-3 flex flex-wrap">
                    <div class="w-1/2 px-3">
                        <button @click="modalInsertJenis = false" type="reset"
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
    {{-- END Insert Jenis KKN --}}
    {{-- Update Jenis KKN --}}
    <div x-show="modalUpdateJenis" x-transition
        class="fixed left-0 top-0 flex h-full min-h-screen w-full items-center justify-center bg-dark/90 px-4 py-5 z-40">
        <div class="w-full max-w-[570px] rounded-[20px] bg-white px-8 py-12  dark:bg-dark-2 md:px-[70px] md:py-[60px]">
            <h3 class="pb-[18px] text-xl font-semibold text-dark text-center sm:text-2xl">
                Form Update Jenis KKN
            </h3>
            <span class="mx-auto mb-6 flex h-1 w-[120px] rounded text-center bg-primary"></span>

            <form action="/admin/postUpdatejenis/{id}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4.5">
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Kode jenis
                    </label>
                    <input name="kode_jenis" id="kode_jenis" type="text" maxlength="5" placeholder="Masukan Kode"
                        class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                </div>
                <div class="mb-4.5">
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Nama KKN
                    </label>
                    <input id="nama_kkn" name="nama_kkn" type="text" placeholder="Masukan Nama"
                        class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                </div>
                <div class="mb-4.5">
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Semester Aktif
                    </label>
                    <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-transparent dark:bg-form-input">
                        <select id="kode_semester" name="kode_semester"
                            class="relative z-20 w-full appearance-none rounded border border-stroke bg-transparent px-5 py-3 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                            :class="isOptionSelected && 'text-black dark:text-white'" @change="isOptionSelected = true">
                            @foreach ($kode_semester as $item)
                                <option value="{{ $item->kode_semester }}" class="text-body">
                                    {{ $item->tahun_ajaran }} ({{ $item->semester }})
                                </option>
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
                        Lokasi KKN
                    </label>
                    <input id="lokasi_kkn" name="lokasi_kkn" type="text" placeholder="Masukan Lokasi"
                        class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                </div>
                <div class="-mx-3 flex flex-wrap">
                    <div class="w-1/2 px-3">
                        <button @click="modalUpdateJenis = false" type="reset"
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
    {{-- END Update jenis KKN --}}
    {{-- Detail Jenis KKN --}}
    <div x-show="modalDetailJenis" x-transition
        class="fixed left-0 top-0 flex h-full min-h-screen w-full items-center justify-center bg-dark/90 px-4 py-5 z-40">
        <div id="modalDetailJenis" @click.outside="modalDetailJenis = false"
            class="w-full h-300 overflow-y-auto max-w-[570px] rounded-[20px] bg-white px-8 py-12  dark:bg-dark-2 md:px-[70px] md:py-[60px]">
            <h3 class="pb-[18px] text-xl font-semibold text-dark text-center sm:text-2xl">
                Detail Jenis KKN
            </h3>
            <span class="mx-auto mb-6 flex h-1 w-[120px] rounded text-center bg-primary"></span>
            <div class="mb-4.5">
                <label class="mb-3 block text-sm font-bold text-black dark:text-white">
                    Nama KKN
                </label>
                <span id="namaKKN-span" class="mb-3 block text-sm font-medium text-black dark:text-white"></span>
            </div>
            <div class="mb-4.5">
                <label class="mb-3 block text-sm font-bold text-black dark:text-white">
                    Semester
                </label>
                <span id="semester-span" class="mb-3 block text-sm font-medium text-black dark:text-white"></span>
            </div>
            <div class="mb-4.5">
                <label class="mb-3 block text-sm font-bold text-black dark:text-white">
                    Tahun Ajaran
                </label>
                <span id="tahunajaran-span" class="mb-3 block text-sm font-medium text-black dark:text-white"></span>
            </div>
            <div class="mb-4.5">
                <label class="mb-3 block text-sm font-bold text-black dark:text-white">
                    Lokasi
                </label>
                <span id="lokasiKKN-span" class="mb-3 block text-sm font-medium text-black dark:text-white">
                </span>
            </div>
            <div class="mb-4.5">
                <label class="mb-3 block text-sm font-bold text-black dark:text-white">
                    Status
                </label>
                <span id="status-span" class="mb-3 block text-sm font-medium text-black dark:text-white"></span>
            </div>
            <div class="-mx-3 flex flex-wrap">
                <div class="w-full px-3">
                    <button @click="modalDetailJenis = false"
                        class="block w-full rounded-md border border-stroke p-3 text-center text-base font-medium text-dark transition hover:border-red-600 hover:bg-red-600 hover:text-white">
                        Close
                    </button>
                </div>
            </div>

            {{--  JQuery Detail KKN --}}
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                $(document).ready(function() {
                    var kodeKKN;

                    $('.tampilModalDetail').click(function() {
                        kodeKKN = $(this).data('id');
                        console.log(kodeKKN);
                        $.ajax({
                            url: "/admin/detailKKN/" + kodeKKN,
                            method: "GET",
                            dataType: "json",
                            success: function(response) {
                                console.log("Response JSON :", response)
                                var nama_kkn = response.detail.nama_kkn;
                                var semester = response.detail.semester;
                                var tahun_ajaran = response.detail.tahun_ajaran;
                                var lokasi_kkn = response.detail.lokasi;
                                var status = response.detail.status;
                                $('#namaKKN-span').text(nama_kkn);
                                $('#semester-span').text(semester);
                                $('#tahunajaran-span').text(tahun_ajaran);
                                $('#lokasiKKN-span').text(lokasi_kkn);
                                $('#status-span').text(status);
                            },
                            error: function(xhr, status, error) {
                                console.error("Error:", error);
                            }
                        });
                    });
                });
            </script>

            {{-- END Detail jenis KKN --}}

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




            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                $(document).ready(function() {
                    var kode_jenis;

                    $('.tampilModalUbah').click(function() {
                        kode_jenis = $(this).data('id');
                        console.log(kode_jenis);
                        $('form').attr('action', '/admin/postUpdatejenis/' + kode_jenis);
                        $.ajax({
                            url: "/admin/updatejeniskkn/" + kode_jenis,
                            method: "GET",
                            dataType: "json",
                            success: function(response) {
                                var kode_jenis = response.updateJenis.kode_jenis;
                                var nama_kkn = response.updateJenis.nama_kkn;
                                var kode_semester = response.updateJenis.kode_semester;
                                var lokasi_kkn = response.updateJenis.lokasi;
                                $('#kode_jenis').val(kode_jenis);
                                $('#nama_kkn').val(nama_kkn);
                                $('#kode_semester').val(kode_semester);
                                $('#lokasi_kkn').val(lokasi_kkn);
                                // Now you can use these variables as needed
                                console.log("Kode Semester: " + kode_jenis);
                                console.log("Tahun Ajaran: " + nama_kkn);
                                console.log("Status: " + lokasi_kkn);
                            },
                            error: function(xhr, status, error) {
                                console.error("Error:", error);
                            }
                        });
                    });
                });
            </script>

        @endsection
