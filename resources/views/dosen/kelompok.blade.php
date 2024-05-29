@section('title', 'Dosen | Kelompok')
@extends('dosen.layouts.main')
@section('content')
    <h2 class="ml-3 font-semibold text-2xl">DAFTAR KELOMPOK BIMBINGAN 2024</h2>
    <div class="my-5 py-2 border-b-2 flex justify-between items-center px-3">

    </div>

    @foreach ($result as $item)
        <div id="resultContainer"
            class="w-full bg-white py-3 pl-5 flex justify-between items-center hover:bg-gray-100 duration-500 mt-4 shadow-lg rounded-3xl mb-5 hover:bg-slate-50 cursor-pointer">
            <a href="/dosen/kelompok/detail/{{ $item->kode_kelompok }}" class="w-full py-1 px-3">
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
        </div>
    @endforeach




@endsection
