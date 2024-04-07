@section('title', 'Admin | Daftar Mahasiswa')
@extends('admin.layouts.main')
@section('content')
    <div class="w-full px-5">
        <h1 class="text-2xl text-center my-5 font-semibold uppercase ">Daftar Mahasiswa</h1>
        <div class="w-full block lg:flex lg:justify-between lg:items-center">
            <form class="w-full lg:w-1/3" method="GET" action="/admin/daftarmahasiswa/search">
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
                    <input type="search" id="default-search" name="search"
                        class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray duration-500 rounded-lg focus:outline-none focus:ring  focus:ring-primary dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-secondary dark:focus:ring-primary dark:focus:border-primary"
                        placeholder="Search.." />
                    <button type="submit"
                        class="text-secondary absolute end-2.5 bottom-2.5 bg-primary hover:bg-opacity-90 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-primary dark:focus:ring-opacity-90">Search</button>
                </div>
            </form>
            <a href="/admin/daftarmahasiswa/insert"
                class="inline-flex items-center justify-end gap-2.5 mt-3 lg:mt-0 bg-primary px-4 py-2 text-center rounded-lg font-medium text-secondary hover:bg-opacity-90 lg:px-5">
                <i class="fa-regular fa-square-plus"></i>
                Tambah
            </a>
        </div>
        <div
            class="w-full flex justify-center items-center rounded-sm bg-secondary pt-6 shadow-default dark:border-strokedark dark:bg-boxdark">
            <div class="w-full overflow-x-auto">
                <table class="w-full table-auto">
                    <thead>
                        <tr class="text-left bg-gray dark:bg-meta-4">
                            <th class="min-w-[50px] px-4 py-4 font-medium text-dark dark:text-secondary">
                                NO
                            </th>
                            <th class="min-w-[100px] px-4 py-4 font-medium text-dark dark:text-secondary">
                                Nim
                            </th>
                            <th class="min-w-[120px] px-4 py-4 font-medium text-dark dark:text-secondary">
                                Nama
                            </th>
                            <th class="min-w-[120px] px-4 py-4 font-medium text-dark dark:text-secondary">
                                Prodi
                            </th>
                            <th class="min-w-[80px] px-4 py-4 font-medium text-dark dark:text-secondary">
                                Gender
                            </th>
                            <th class="min-w-[180px] px-4 py-4 font-medium text-dark dark:text-secondary">
                                Alamat
                            </th>
                            <th class="min-w-[50px] px-4 py-4 font-medium text-dark dark:text-secondary">
                                Angkatan
                            </th>
                            <th class="min-w-[180px] px-4 py-4 font-medium text-dark dark:text-secondary">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($result as $idx => $item)
                            <tr
                                class="odd:bg-sectext-secondary odd:dark:bg-gray-900 even:bg-gray even:dark:bg-gray-800 border-b border-dark">
                                <td class="border-b border-[#eee] px-4 py-5 dark:border-strokedark">
                                    <p class="text-dark dark:text-secondary">
                                        {{ $result->firstItem() + $idx }}
                                    </p>
                                </td>
                                <td class="border-b border-[#eee] px-4 py-5 dark:border-strokedark">
                                    <p class="text-dark dark:text-secondary">
                                        {{ $item->username }}
                                    </p>
                                </td>
                                <td class="border-b border-[#eee] px-4 py-5 dark:border-strokedark">
                                    <p class="text-dark dark:text-secondary">
                                        {{ $item->nama }}
                                    </p>
                                </td>
                                <td class="border-b border-[#eee] px-4 py-5 dark:border-strokedark">
                                    <p class="text-dark dark:text-secondary"">
                                        {{ $item->prodi }}
                                    </p>
                                </td>
                                <td class="border-b border-[#eee] px-4 py-5 dark:border-strokedark">
                                    <p class="text-dark dark:text-secondary capitalize ">
                                        {{ $item->gender }}
                                    </p>
                                </td>
                                <td class="border-b border-[#eee] px-4 py-5 dark:border-strokedark">
                                    <p class="text-dark dark:text-secondary"">
                                        {{ $item->alamat }}
                                    </p>
                                </td>
                                <td class="border-b border-[#eee] px-4 py-5 dark:border-strokedark">
                                    <p class="text-dark dark:text-secondary"">
                                        {{ $item->angkatan }}
                                    </p>
                                </td>
                                <td class="border-b border-[#eee] px-4 py-5 dark:border-strokedark">
                                    <div class="flex items-center space-x-4">
                                        <button @click="modalDetail = true" data-toggle="modal" data-target="#modalDetail"
                                            data-id="{{ $item->username }}"
                                            class="bg-primary px-3 py-1 rounded-lg hover:bg-opacity-90 tampilModalDetail">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="fa-solid fa-info text-lg text-secondary "
                                                viewBox="0 0 512 512">
                                                <path
                                                    d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z" />
                                            </svg>
                                        </button>
                                        <a href="/admin/daftarmahasiswa/update/{{ $item->id }}"
                                            class="bg-primary px-3 py-1 rounded-lg hover:opacity-90">
                                            <i class="fa-solid fa-pen-to-square text-lg text-secondary"></i>
                                        </a>
                                        <a href="#"
                                            onclick="confirmDelete('/admin/daftarmahasiswa/delete/{{ $item->id }}')"
                                            class="bg-red-600 px-3 py-1 rounded-lg hover:opacity-90"
                                            data-confirm-delete="true">
                                            <i class="fa-solid fa-trash text-lg text-secondary"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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


    </div>
    <div class="flex justify-end mt-4 pagination">
        {{ $result->links() }}
    </div>
    <div x-show="modalDetail" x-transition
        class="fixed left-0 top-0 flex h-full min-h-screen w-full items-center justify-center bg-dark/90 px-4 py-5 z-40">
        <div id="modalDetail"
            class="w-full max-w-[570px] rounded-[20px] bg-white px-8 py-12  dark:bg-dark-2 md:px-[70px] md:py-[60px]">
            <h3 class="pb-[18px] text-xl font-semibold text-dark text-center sm:text-2xl">
                Detail Mahasiswa
            </h3>
            <span class="mx-auto mb-6 flex h-1 w-[120px] rounded text-center bg-primary"></span>
            <div class="mb-4.5">
                <label class="mb-3 block text-sm font-bold text-black dark:text-white">
                    NIM
                </label>
                <span id="nim-span"class="mb-3 block text-sm font-medium text-black dark:text-white">

                </span>
            </div>
            <div class="mb-4.5">
                <label class="mb-3 block text-sm font-bold text-black dark:text-white">
                    Nama
                </label>
                <span id="nama-span" class="mb-3 block text-sm font-medium text-black dark:text-white"></span>
            </div>
            <div class="mb-4.5">
                <label class="mb-3 block text-sm font-bold text-black dark:text-white">
                    Prodi
                </label>
                <span id="prodi-span" class="mb-3 block text-sm font-medium text-black dark:text-white">

                </span>
            </div>
            <div class="mb-4.5">
                <label class="mb-3 block text-sm font-bold text-black dark:text-white">
                    Angkatan
                </label>
                <span id="angkatan-span" class="mb-3 block text-sm font-medium text-black dark:text-white">

                </span>
            </div>
            <div class="mb-4.5">
                <label class="mb-3 block text-sm font-bold text-black dark:text-white">
                    Gender
                </label>
                <span id="gender-span" class="mb-3 block text-sm font-medium text-black dark:text-white">

                </span>
            </div>
            <div class="mb-4.5">
                <label class="mb-3 block text-sm font-bold text-black dark:text-white">
                    Status
                </label>
                <span id="status-span" class="mb-3 block text-sm font-medium text-black dark:text-white">

                </span>
            </div>
            <div class="mb-4.5">
                <label class="mb-3 block text-sm font-bold text-black dark:text-white">
                    Alamat
                </label>
                <span id="alamat-span" class="mb-3 block text-sm font-medium text-black dark:text-white">

                </span>
            </div>
            <div class="mb-4.5">
                <label class="mb-3 block text-sm font-bold text-black dark:text-white">
                    Email
                </label>
                <span id="email-span" class="mb-3 block text-sm font-medium text-black dark:text-white">

                </span>
            </div>
            <div class="mb-4.5">
                <label class="mb-3 block text-sm font-bold text-black dark:text-white">
                    No. Telepon
                </label>
                <span id="no_telp-span" class="mb-3 block text-sm font-medium text-black dark:text-white">

                </span>
            </div>

            <div class="-mx-3 flex flex-wrap">
                <div class="w-1/2 px-3">
                    <button @click="modalDetail = false"
                        class="block w-full rounded-md border border-stroke p-3 text-center text-base font-medium text-dark transition hover:border-red-600 hover:bg-red-600 hover:text-white">
                        Close
                    </button>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function() {
                var username;

                $('.tampilModalDetail').click(function() {
                    username = $(this).data('id');
                    console.log(username);
                    $.ajax({
                        url: "/admin/detailMahasiswa/" + username,
                        method: "GET",
                        dataType: "json",
                        success: function(response) {
                            console.log("Response JSON :",response)
                            var nim = response.detail.username;
                            var nama = response.detail.nama;
                            var prodi = response.detail.prodi;
                            var angkatan = response.detail.angkatan;
                            var gender = response.detail.gender;
                            var status = response.detail.status;
                            var alamat = response.detail.alamat;
                            var email = response.detail.email;
                            var no_telp = response.detail.no_telp;
                            $('#nim-span').text(nim);
                            $('#nama-span').text(nama);
                            $('#prodi-span').text(prodi);
                            $('#angkatan-span').text(angkatan);
                            $('#gender-span').text(gender);
                            $('#status-span').text(status);
                            $('#alamat-span').text(alamat);
                            $('#email-span').text(email);
                            $('#no_telp-span').text(no_telp);
                        },
                        error: function(xhr, status, error) {
                            console.error("Error:", error);
                        }
                    });
                });
            });
        </script>
        {{-- END Jquery Update Form --}}


    @endsection
