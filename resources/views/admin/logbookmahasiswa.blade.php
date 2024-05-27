@section('title', 'Admin | Dashboard')
@extends('admin.layouts.main')
@section('content')
    <nav class="flex" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li>
                <div class="flex items-center">
                    <a href="/admin/kelompok" class="ms-1 text-sm font-medium text-gray-700 hover:text-primary">
                        <i class="fa-solid fa-users-line mr-1"></i>
                        Kelompok
                    </a>
                </div>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <a href="{{ route('detailkelompok', [$datakelompok]) }}"
                        class="ms-1 text-sm font-medium text-gray-700 hover:text-primary">
                        Detail
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
                    <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Logbook</span>
                </div>
            </li>
        </ol>
    </nav>
    <div class="relative flex flex-col gap-4 w-full my-5">
        <h2 class="font-semibold text-xl uppercase">Logbook KKN &nbsp;</h2>
        <span class="font-normal">
            Nim :</i>&nbsp;
            {{ $mahasiswa->username }}
        </span>
        <span class="font-normal">
            Nama :</i>&nbsp;
            {{ $mahasiswa->nama }}
        </span>
        <span class="font-normal">
            Prodi :</i>&nbsp;
            {{ $mahasiswa->prodi }}
        </span>
        <span class="font-normal">
            kelompok :</i>&nbsp;
            {{ $namakelompok }}
        </span>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-slate-700">
            <thead class="text-xs text-secondary uppercase bg-slate-700">
                <tr>
                    <th scope="col" class="px-4 py-3">
                        NO
                    </th>
                    <th scope="col" class="px-4 py-3">
                        Judul
                    </th>
                    <th scope="col" class="px-2 py-3">
                        DESKRIPSI
                    </th>
                    <th scope="col" class="px-2 py-3">
                        TANGGAL
                    </th>
                </tr>
            </thead>
            <tbody>
                @if (count($data) == 0)
                    <tr>
                        <td rowspan="2"  colspan="4">
                            <div class="py-5 inset-0 flex justify-center items-center">
                                <span class="italic">Belum Ada Logbook</span>
                            </div>
                        </td>
                    </tr>
                @else
                    @foreach ($data as $idx => $item)
                        <tr class="bg-white border-b border-slate-200 hover:bg-slate-50 ">
                            <td scope="row" class="font-semibold px-4 py-4">
                                {{ $idx + 1 }}
                            </td>
                            <td scope="row" class="px-4 py-4 max-w-36">
                                {{ $item->judul }}
                            </td>
                            <td scope="row" class="px-7 py-4 max-w-xs">
                                {{ $item->deskripsi }}
                            </td>
                            <td scope="row" class="px-2 py-4 max-w-10">
                                {{ $item->tanggal }}
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
@endsection
