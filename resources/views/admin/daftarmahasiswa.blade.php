@section('title', 'Admin | Daftar Mahasiswa')
@extends('admin.layouts.main')
@section('content')
    <div class="container w-full ">
        <h1 class="text-2xl text-center my-5 font-semibold uppercase ">Daftar Mahasiswa</h1>
        <div
            class="flex justify-center items-center rounded-sm  bg-secondary ml-14 pt-6 shadow-default dark:border-strokedark dark:bg-boxdark">
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
                                class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray even:dark:bg-gray-800 border-b border-dark">
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
                                        <a href="/admin/daftarmahasiswa/detail/{{ $item->username }}"
                                            class="bg-primary px-3 py-1 rounded-lg hover:opacity-90">
                                            <i class="fa-solid fa-info text-lg text-secondary"></i>
                                        </a>
                                        <a href="/admin/daftarmahasiswa/update/{{ $item->username }}"
                                            class="bg-primary px-3 py-1 rounded-lg hover:opacity-90">
                                            <i class="fa-solid fa-pen-to-square text-lg text-secondary"></i>
                                        </a>
                                        <a href="/admin/daftarmahasiswa/delete/{{ $item->username }}"
                                            class="bg-red-600 px-3 py-1 rounded-lg hover:opacity-90">
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
        <div class="flex justify-end mt-4 pagination">
            {{ $result->withQueryString()->links() }}
        </div>

    </div>
@endsection
