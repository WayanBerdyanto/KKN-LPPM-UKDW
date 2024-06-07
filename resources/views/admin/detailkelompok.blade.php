@section('title', 'Admin | Detail kelompok')
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
            <li aria-current="page">
                <div class="flex items-center">
                    <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Detail</span>
                </div>
            </li>
        </ol>
    </nav>

    <div class="relative flex flex-wrap justify-between items-center w-full p-2.5">
        <div class="w-full mb-5 lg:w-2/6">
            <img src="{{ asset('img/logo-ukdw.png') }}" alt=""
                class="object-contain w-full md:w-40 h-40 rounded-full md:border md:border-primary lg:m-auto">
        </div>
        <div class="w-full  lg:w-4/6 py-2">
            <div class="flex justify-between border-b-2 border-gray-300 py-2">
                <div>
                    <h1 class="text-dark text-md font-bold">
                        {{ $resultmaster[0]->nama_kelompok }}
                    </h1>
                    <h2 class="text-dark mt-1 text-sm font-normal block">
                        <i class="fa-solid fa-location-dot mr-1"></i>
                        {{ $resultmaster[0]->desa }},
                        {{ $resultmaster[0]->kecamatan }},
                        {{ $resultmaster[0]->kabupaten }},
                        {{ $resultmaster[0]->provinsi }}
                    </h2>
                </div>
                <div>
                    <a href="/admin/kelompok/formedit/{{ $resultmaster[0]->kode_kelompok }}"
                        class="bg-primary text-secondary px-3 py-1.5 rounded-md hover:bg-opacity-90">
                        <i class="fa-solid fa-pencil mr-1"></i>
                        Edit
                    </a>
                </div>
            </div>
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right">
                    <tr class="border-b">
                        <td scope="row" class="pr-6 py-4 font-medium whitespace-nowrap">
                            <span>Pembimbing</span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="font-semibold">
                                {{ $resultmaster[0]->nama_dosen1 }},
                                {{ $resultmaster[0]->nama_dosen2 }}
                            </span>
                        </td>
                    </tr>
                    <tr class="border-b">
                        <td scope="row" class="pr-6 py-4 font-medium whitespace-nowrap">
                            <span class="font-normal">Ketua Kelompok</span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="font-semibold">
                                @forelse ($ketua as $item)
                                    {{ $item->nama }}
                                @empty
                                    Ketua kelompok belum ditetapkan
                                @endforelse
                            </span>
                        </td>
                    </tr>
                    <tr class="border-b">
                        <td scope="row" class="pr-6 py-4 font-medium whitespace-nowrap">
                            <span class="font-normal">Kapasitas</span>
                        </td>
                        <td class="px-6 py-4">
                            @if (!empty($resultmaster[0]->kapasitas))
                                <span class="text-dark px-3 font-semibold">
                                    {{ $resultmaster[0]->kapasitas }}
                                </span>
                            @else
                                Kapasitas Belom di Atur
                            @endif
                        </td>
                    </tr>
                    <tr class="border-b">
                        <td scope="row" class="pr-6 py-4 font-medium whitespace-nowrap">
                            <span class="font-normal">Status</span>
                        </td>
                        <td class="px-6 py-4">
                            @if ($resultmaster[0]->status == 'Aktif')
                                <span class="text-secondary px-3 rounded-full py-1 bg-primary font-semibold">
                                    {{ $resultmaster[0]->status }}
                                </span>
                            @else
                                <span class="text-secondary px-3 rounded-full py-1 bg-red-600 font-semibold">
                                    {{ $resultmaster[0]->status }}
                                </span>
                            @endif
                        </td>
                    </tr>

                    <tr class="border-b">
                        <td scope="row" class="pr-6 py-4 font-medium whitespace-nowrap">
                            <span class="font-normal">Rencana Kegiatan</span>
                        </td>
                        <td class="px-6 py-4">
                            @if ($rencanaKegiatan != null)
                                <a href="{{ route('rencanaMhsAdmin', [$rencanaKegiatan->kode_kelompok]) }}"
                                    class="bg-primary text-secondary px-3 py-1.5 rounded-md hover:bg-opacity-90">
                                    <i class="fa-solid fa-book"></i>
                                    Lihat Rencana
                                </a>&nbsp;
                            @else
                                Belum ada rencana
                            @endif
                        </td>
                    </tr>
                    <tr class="border-b">
                        <td scope="row" class="pr-6 py-4 font-medium whitespace-nowrap">
                            <span class="font-normal">Laporan Kegiatan</span>
                        </td>
                        <td class="px-6 py-4">
                            @if ($laporan != null)
                                <a href="{{ route('laporanMhsAdmin', [$laporan->kode_kelompok]) }}"
                                    class="bg-primary text-secondary px-3 py-1.5 rounded-md hover:bg-opacity-90">
                                    <i class="fa-solid fa-book"></i>
                                    Lihat Laporan
                                </a>&nbsp;
                            @else
                                Belum ada laporan
                            @endif
                        </td>
                    </tr>

                </table>
            </div>
        </div>
        <div class="w-full mt-5 relative overflow-x-auto">
            <div class="flex justify-between items-center py-2">
                <h1 class="font-semibold text-lg lg:text-2xl uppercase">Daftar Peserta</h1>
                <div class="flex items-center text-right py-2">
                    <a href="/admin/kelompok/{{ $resultmaster[0]->kode_kelompok }}/insertdatakelompok"
                        class="bg-primary text-secondary px-3 py-1.5 rounded-md hover:bg-opacity-90">
                        <i class="fa-solid fa-plus mr-1"></i>
                        Add
                    </a>
                </div>
            </div>
            <hr class="mt-2 border">
            <table class="w-full text-sm text-left rtl:text-right mt-3 border">
                <thead class="text-xs text-secondary uppercase bg-slate-700">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            NIM
                        </th>
                        <th scope="col" class="px-6 py-3">
                            NAMA
                        </th>
                        <th scope="col" class="px-6 py-3">
                            PRODI
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Logbook
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($resultDetail as $item)
                        <tr
                            class="odd:bg-secondary even:bg-gray-200 text-dark odd:hover:bg-gray-100 even:hover:bg-gray-300">
                            <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
                                {{ $item->username }}
                            </th>
                            <td class="px-6 py-4">
                                <span class="font-semibold">{{ $item->nama }}</span>&nbsp; <span
                                    class="font-normal">({{ $item->status }})</span>
                            </td>
                            <td class="px-6 py-4">
                                {{ $item->prodi }}
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ route('lihatlogbook',[$item->id]) }}"
                                    class="bg-primary text-secondary px-3 py-1.5 rounded-md hover:bg-opacity-90">
                                    <i class="fa-solid fa-book"></i>
                                    Lihat Logbook
                                </a>&nbsp;
                            </td>
                            <td class="px-4 py-2 grid lg:gap-3 gap-y-2  lg:grid-cols-3 text-center">
                                @if ($item->status == 'ketua')
                                    <a href="#"
                                        onclick="confirmAnggota('/admin/kelompok/pilihanggota/{{ $item->id_mahasiswa }}')"
                                        class="bg-primary text-secondary py-1.5 rounded-md hover:bg-opacity-90">
                                        <i class="fa-solid fa-user-group"></i>
                                    </a>
                                @else
                                    <a href="#"
                                        onclick="confirmKetua('/admin/kelompok/pilihketua/{{ $item->id_mahasiswa }}')"
                                        class="bg-yellow-500 text-secondary py-1.5 rounded-md hover:bg-opacity-90">
                                        <i class="fa-solid fa-crown"></i>
                                    </a>
                                @endif
                                <a href="#" class="bg-primary text-secondary py-1.5 rounded-md hover:bg-opacity-90">
                                    <i class="fa-solid fa-info"></i>
                                </a>
                                <a href="#"
                                    onclick="confirmDelete('/admin/kelompok/deletemahasiswa/{{ $item->id_dtl }}')"
                                    class="bg-red-600 text-secondary py-1.5 rounded-md hover:bg-opacity-90"
                                    data-confirm-delete="true">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <script>
                function confirmAnggota(url) {
                    Swal.fire({
                        title: 'Anda Yakin?',
                        text: "Ubah Sebagai Anggota",
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#2C7865',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Yakin'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Redirect to the delete URL
                            window.location.href = url;
                        }
                    });
                }
            </script>
            <script>
                function confirmKetua(url) {
                    Swal.fire({
                        title: 'Anda Yakin?',
                        text: "Pilih Sebagai Ketua",
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#2C7865',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Yakin'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Redirect to the delete URL
                            window.location.href = url;
                        }
                    });
                }
            </script>
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
    </div>
@endsection
