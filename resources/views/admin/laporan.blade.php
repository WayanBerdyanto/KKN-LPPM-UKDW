@section('title', 'Laporan Kegiatan | Admin')
@extends('admin.layouts.main')
@section('content')
    <div class="container flex flex-wrap justify-between items-center w-full p-2.5">
        <div class="w-full mt-5 relative overflow-x-auto">
            <div class="flex justify-between items-center py-2">
                <h1 class="font-semibold text-lg lg:text-2xl uppercase">Rencana Kegiatan KKN</h1>
            </div>
            <hr class="mt-4 border-opacity-50 border-primary">
        </div>

        <div class="w-full relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-left mt-5 rtl:text-right text-slate-700">
                <thead class="text-sm text-secondary uppercase bg-slate-700">
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
                        <th scope="col" class="px-2 py-3">
                            FILE
                        </th>
                        <th scope="col" class="px-2 py-3">
                            KOMENTAR DOSEN
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($resultLaporan as $idx => $item)
                        <tr class="bg-white border-b border-slate-200 hover:bg-slate-50 ">
                            <td scope="row" class="font-semibold px-4 py-4 text-sm">
                                {{ $idx + 1 }}
                            </td>
                            <td scope="row" class="px-4 py-4 max-w-20">
                                {{ $item->judul }}
                            </td>
                            <td scope="row" class="px-7 py-4 max-w-45 truncate">
                                {{ $item->deskripsi }}
                            </td>
                            <td scope="row" class="px-2 py-4 max-w-10">
                                {{ $item->tanggal }}
                            </td>
                            <td scope="row" class="px-2 py-4 max-w-20">
                                <a href="{{ route('admindownloadlaporan', [$item->file]) }}"
                                    class="text-primary underline">Download</a>
                            </td>
                            <td scope="row" class="px-2 py-4 max-w-36 truncate">
                                @if ($item->komentar_dosen != null)
                                    {{ $item->komentar_dosen }}
                                @else
                                    Belum ada Komentar
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
