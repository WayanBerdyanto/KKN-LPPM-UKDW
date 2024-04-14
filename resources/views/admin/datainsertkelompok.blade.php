@section('title', 'Admin | Daftar Mahasiswa')
@extends('admin.layouts.main')
@section('content')
    <nav class="flex" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li>
                <div class="flex items-center">
                    <a href="/admin/kelompok/detail/{{ $id }}" class="ms-1 text-sm font-medium text-gray-700 hover:text-primary">
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
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4 rounded-lg border border-slate-200 mb-5 py-5 px-5">
            @foreach ($resultDetail as $item)
                <div class="flex items-center w-70">
                    <input type="text" name="data"
                        class="w-full text-secondary text-center outline-none p-2 rounded-lg cursor-pointer" hidden>
                    <span
                        class="bg-primary text-secondary text-center outline-none p-2 rounded-lg cursor-pointer hover:bg-opacity-90">
                        {{ $item->nama }}
                    </span>
                    <a href="">
                        <i class="fa-solid fa-xmark text-xl mx-2 text-red-600"></i>
                    </a>
                </div>
            @endforeach
        </div>

        <div class="w-1/4 block lg:flex lg:justify-between lg:items-center">
            <div
                class="block w-full p-4 ps-4 text-sm text-graydark border border-slate-400 duration-500 rounded-lg focus-within:outline-none focus-within:ring  focus-within:ring-primary dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-secondary dark:focus:ring-primary dark:focus:border-primary">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" id="myInput" class="ml-3 outline-none" placeholder="Search.." />
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
