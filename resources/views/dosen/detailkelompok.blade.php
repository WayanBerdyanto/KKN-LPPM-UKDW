@section('title', 'Dosen | Detail kelompok')
@extends('dosen.layouts.main')
@section('content')
    <nav class="flex" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li>
                <div class="flex items-center">
                    <a href="/dosen/kelompok" class="ms-1 text-sm font-medium text-gray-700 hover:text-primary">
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
                </table>
            </div>
        </div>
        <div class="w-full mt-5 relative overflow-x-auto">
            <div class="flex justify-between items-center py-2">
                <h1 class="font-semibold text-lg lg:text-2xl uppercase">Daftar Peserta</h1>
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
                            Nilai
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Acton Nilai
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
                                <a href="{{ route('dosenlihatlogbook', [$item->id]) }}"
                                    class="bg-primary text-secondary px-3 py-1.5 rounded-md hover:bg-opacity-90">
                                    <i class="fa-solid fa-book"></i>
                                    Lihat Logbook
                                </a>&nbsp;
                            </td>
                            <td class="px-6 py-4">
                                @if ($item->nilai != null)
                                    {{ $item->nilai }}
                                @else
                                    Belum ada nilai
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <button @click="modalInsertNilai = true" data-toggle="modal" data-target="#modalInsertNilai"
                                    class="bg-primary hover:bg-opacity-90 px-3 py-1 rounded-lg text-white content-center insertNilai"
                                    data-id="{{ $item->id_mahasiswa }}">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                                <a href="#" onclick="confirmDelete('/dosen/deletenilai/{{ $item->id_mahasiswa }}')"
                                    class="bg-red-500 hover:bg-opacity-90 px-3 py-1 rounded-lg text-white content-center"
                                    data-confirm-delete="true">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- Modal Insert Komentar --}}
    <div x-show="modalInsertNilai" x-transition
        class="fixed left-0 top-0 flex h-full min-h-screen w-full items-center justify-center bg-dark/90 px-4 py-5 z-40">
        <div id="modalInsertNilai" @click.outside="modalInsertNilai = false"
            class="w-full max-w-[570px] rounded-[20px] bg-white px-8 py-12  dark:bg-dark-2 md:px-[70px] md:py-[60px]">
            <h3 class="pb-[18px] text-xl font-semibold text-dark text-center sm:text-2xl">
                Insert / Update Nilai
            </h3>
            <span class="mx-auto mb-6 flex h-1 w-[120px] rounded text-center bg-primary"></span>
            <form action="" method="POST">
                @csrf
                <div class="mb-4.5">
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Isi Nilai
                    </label>
                    <input name="nilai" type="number" placeholder="Masukan Nilai" max="100" min="0"
                        class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                </div>
                <div class="-mx-3 flex flex-wrap">
                    <div class="w-1/2 px-3">
                        <button @click="modalInsertNilai = false" type="reset"
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
    {{-- End Of Modal Insert Komentar --}}

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            var id_mahasiswa;

            $('.insertNilai').click(function() {
                id_mahasiswa = $(this).data('id');
                console.log(id_mahasiswa);
                $('form').attr('action', '/dosen/postnilai/' + id_mahasiswa);
                $.ajax({
                    url: "/dosen/detailMahasiswa/" + id_mahasiswa,
                    method: "GET",
                    dataType: "json"
                });
            });
        });
    </script>


    <script>
        function confirmDelete(url) {
            Swal.fire({
                title: 'Anda Yakin?',
                text: "Anda tidak akan dapat mengembalikan data yang sudah dihapus!",
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
@endsection
