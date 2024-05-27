@section('title', 'Admin | Daftar Mahasiswa')
@extends('admin.layouts.main')
@section('content')
    <nav class="flex" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li>
                <div class="flex items-center">
                    <a href="/admin/kelompok/detail/{{ $id }}"
                        class="ms-1 text-sm font-medium text-gray-700 hover:text-primary">
                        <i class="fa-solid fa-users-line mr-1"></i>
                        detail
                    </a>
                </div>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                    <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Insert Kelompok</span>
                </div>
            </li>
        </ol>
    </nav>
    <div class="w-full px-5">
        <h1 class="text-2xl text-center my-5 font-semibold uppercase ">KELOMPOK KKN</h1>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 rounded-lg border border-slate-200 mb-5 py-5 px-5">
            @foreach ($resultDetail as $item)
                <div class="flex items-center w-70">
                    <input type="text" name="data"
                        class="w-full text-secondary text-center outline-none p-2 rounded-lg cursor-pointer" hidden>
                    <span
                        class="bg-primary text-secondary text-center outline-none p-2 rounded-lg cursor-pointer hover:bg-opacity-90">
                        {{ $item->nama }}
                    </span>
                    <a href="/admin/kelompok/deletemahasiswa/{{ $item->id_dtl }}">
                        <i class="fa-solid fa-xmark text-xl mx-2 text-red-600"></i>
                    </a>
                </div>
            @endforeach
        </div>

        <div class="flex justify-between items-center">
            <div class="w-1/4 block lg:flex lg:justify-between lg:items-center">
                <div
                    class="block w-full p-4 ps-4 text-sm text-graydark border border-slate-400 duration-500 rounded-lg focus-within:outline-none focus-within:ring  focus-within:ring-primary dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-secondary dark:focus:ring-primary dark:focus:border-primary">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" id="myInput" class="ml-3 outline-none" placeholder="Search.." />
                </div>
            </div>
            <div x-data="{ isLoading: false }">
                <a href="{{ route('detailkelompok', ['id' => $id]) }}" @click="isLoading = true"
                    class="py-3 px-5 text-secondary bg-primary rounded-lg">
                    <template x-if="isLoading">
                        <svg class="inline-block animate-spin" xmlns="http://www.w3.org/2000/svg" width="16"
                            height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z" />
                            <path
                                d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466" />
                        </svg>&nbsp;
                    </template>
                    <template x-if="!isLoading">
                        <svg class="inline-block" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                            fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                            <path
                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                        </svg>&nbsp;
                    </template>
                    Selesai
                </a>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                $("#myInput").on("keyup", function() {
                    var value = $(this).val().toLowerCase();
                    $("#myTable tr").filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                });
            });
        </script>
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
                    <tbody id="myTable">
                        @foreach ($result as $item)
                            <form action="/admin/kelompok/{{ $id }}/postdatakelompok" method="POST">
                                @csrf
                                <tr
                                    class="odd:bg-sectext-secondary odd:dark:bg-gray-900 even:bg-gray even:dark:bg-gray-800 border-b border-dark">
                                    <td class="border-b border-[#eee] px-4 py-5 dark:border-strokedark">
                                        <p class="text-dark dark:text-secondary">
                                            {{ $loop->iteration }}
                                        </p>
                                    </td>
                                    <td class="border-b border-[#eee] px-4 py-5 dark:border-strokedark">
                                        <p class="text-dark dark:text-secondary">
                                            <input type="text" name="id_mahasiswa" value="{{ $item->id }}" hidden>
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
                                            <button type="submit" class="bg-primary px-3 py-1 rounded-lg hover:opacity-90">
                                                <i class="fa-solid fa-user-plus text-lg text-secondary"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </form>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
