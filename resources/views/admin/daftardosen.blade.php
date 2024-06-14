@section('title', 'Admin | Daftar Dosen')
@extends('admin.layouts.main')
@section('content')
    <div class="w-full px-5">
        <h1 class="text-2xl text-center my-5 font-semibold uppercase ">Daftar Mahasiswa</h1>
        <div class="w-full block lg:flex lg:justify-between lg:items-center">
            <form class="w-full lg:w-1/3" method="GET" action="{{ route('SearchDaftarDosen') }}">
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
            <a href="{{ route('FormInsertDosen') }}"
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
                            <th class="min-w-[30px] px-4 py-4 font-medium text-dark dark:text-secondary">
                                NO
                            </th>
                            <th class="min-w-[100px] px-4 py-4 font-medium text-dark dark:text-secondary">
                                NiP
                            </th>
                            <th class="min-w-[120px] px-4 py-4 font-medium text-dark dark:text-secondary">
                                Nama
                            </th>
                            <th class="min-w-[60px] px-4 py-4 font-medium text-dark dark:text-secondary">
                                Gender
                            </th>
                            <th class="min-w-[180px] px-4 py-4 font-medium text-dark dark:text-secondary">
                                Alamat
                            </th>
                            <th class="min-w-[150px] px-4 py-4 font-medium text-dark dark:text-secondary">
                                Email
                            </th>
                            <th class="min-w-[50px] px-4 py-4 font-medium text-dark dark:text-secondary">
                                No-Telp
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
                                        {{ $idx + 1 }}
                                    </p>
                                </td>
                                <td class="border-b border-[#eee] px-4 py-5 dark:border-strokedark">
                                    <p class="text-dark dark:text-secondary">
                                        {{ $item->nip }}
                                    </p>
                                </td>
                                <td class="border-b border-[#eee] px-4 py-5 dark:border-strokedark">
                                    <p class="text-dark dark:text-secondary">
                                        {{ $item->nama }}
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
                                        {{ $item->email }}
                                    </p>
                                </td>
                                <td class="border-b border-[#eee] px-4 py-5 dark:border-strokedark">
                                    <p class="text-dark dark:text-secondary"">
                                        {{ $item->no_telp }}
                                    </p>
                                </td>
                                <td class="border-b border-[#eee] px-4 py-5 dark:border-strokedark">
                                    <div class="flex items-center space-x-4">
                                        <a href="{{ route('FormUpdateDosen', [$item->id]) }}"
                                            class="bg-primary px-3 py-1 rounded-lg hover:opacity-90">
                                            <i class="fa-solid fa-pen-to-square text-lg text-secondary"></i>
                                        </a>
                                        <button onclick="confirmDelete('/admin/daftardosen/deletedosen/{{ $item->id}}')"
                                            class="bg-red-600 px-3 py-1 rounded-lg hover:opacity-90"
                                            data-confirm-delete="true">
                                            <i class="fa-solid fa-trash text-lg text-secondary"></i>
                                        </button>
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
@endsection
