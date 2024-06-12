@section('title', 'Laporan Kegiatan | Mahasiswa')
@extends('mahasiswa.layouts.main')
@section('content')
    <div class="container flex flex-wrap justify-between items-center w-full p-2.5">
        <div class="w-full mt-5 relative overflow-x-auto">
            <div class="flex justify-between items-center py-2">
                <h1 class="font-semibold text-lg lg:text-2xl uppercase">Laporan Kegiatan KKN</h1>
                @if (Auth::guard('mahasiswa')->user()->status == 'ketua')
                <div class="flex items-center text-right py-2">
                    <button @click="modalLaporan = true" data-toggle="modal" data-target="#modalLaporan"
                        class="ml-0 text-sm lg:text:lg lg:ml-5 mt-2 lg:mt-0 block bg-primary text-secondary px-3 py-2 font-normal rounded-lg text-center hover:bg-opacity-90">
                        <i class="fa-solid fa-address-book mr-2"></i>Tambah</button>
                </div>
                @endif
            </div>
            <hr class="mt-4 border-opacity-50 border-primary">
            {{-- Start File Info Template --}}
            @if (Auth::guard('mahasiswa')->user()->status == 'ketua')
            <div class="border border-opacity-50 border-primary p-2.5 mt-4">
                <i class="fa-solid fa-download mx-3"></i>
                <span>Template Laporan Kegiatan </span>
                <a href="/mahasiswa/templaterencana" class="text-primary underline">Klik Donwload</a>
            </div>
            @endif
            {{-- End File Info Template --}}
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
                        <th scope="col" class="px-2 py-3">
                            KOMENTAR ADMIN
                        </th>
                        @if (Auth::guard('mahasiswa')->user()->status == 'ketua')
                        <th scope="col" class="px-2 py-3">
                            ACTION
                        </th>
                        @endif
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
                                <a href="{{ route('downloadfilerencana', [$item->file]) }}"
                                    class="text-primary underline">Download</a>
                            </td>
                            <td scope="row" class="px-2 py-4 max-w-36 truncate">
                                {{ $item->komentar_dosen }}
                            </td>
                            <td scope="row" class="px-2 py-4 max-w-36 truncate">
                                {{ $item->komentar_admin }}
                            </td>
                            @if (Auth::guard('mahasiswa')->user()->status == 'ketua')
                            <td scope="row" class="px-2 py-4 flex justify-center items-center">
                                <button @click="modalUpdateLaporan = true" data-toggle="modal"
                                    data-target="#modalUpdateLaporan" data-id="{{ $item->id_laporan }}"
                                    class="ml-0 lg:ml-5 mt-2 lg:mt-0 block bg-primary text-secondary px-1 py-2 font-normal rounded-lg text-center hover:bg-opacity-90 w-16 updateLaporan">
                                    <i class="fa -regular fa-pen-to-square"></i>&nbsp;
                                </button>
                                <button onclick="confirmDeleteRencana('/mahasiswa/deletelaporan/{{ $item->id_laporan }}')"
                                    class="ml-0 lg:ml-5 mt-2 lg:mt-0 block bg-red-500 text-secondary px-1 py-2 font-normal rounded-lg text-center hover:bg-opacity-90 w-16"
                                    data-confirm-delete="true">
                                    <i class="fa-solid fa-trash"></i>&nbsp;
                                </button>
                            </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function confirmDeleteRencana(url) {
            console.log(url);
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

    <div x-show="modalLaporan" x-transition
        class="fixed left-0 top-0 flex h-full min-h-screen w-full items-center justify-center bg-dark/90 px-4 py-5 z-40">
        <div id="modalLaporan" @click.outside="modalLaporan = false"
            class="w-full max-w-[570px] h-full min-h-full overflow-y-auto rounded-[20px] bg-white dark:bg-boxdark px-8 py-5  dark:bg-dark-2 md:px-[70px] md:py-[60px] border border-secondary">
            <h3 class="pb-[18px] text-xl font-semibold text-dark dark:text-secondary text-center sm:text-2xl">
                Rencana Kegiatan
            </h3>
            <span class="mx-auto mb-6 flex h-1 w-[120px] rounded text-center bg-primary"></span>

            <form action="/mahasiswa/laporankegiatan/postlaporankegiatan" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="text" name="kode_kelompok" value="{{ $resultKode }}" hidden>
                <input type="text" name="id_mahasiswa" value="{{ Auth::guard('mahasiswa')->user()->id }}" hidden>
                <div class="mb-4.5">
                    <label class="mb-3 block text-sm font-medium text-dark dark:text-secondary">
                        Judul
                    </label>
                    <input name="judul" type="text" placeholder="Masukan Judul"
                        class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-dark dark:text-secondary outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary" />
                </div>
                <div class="mb-4.5">
                    <label class="mb-3 block text-sm font-medium text-dark dark:text-secondary">
                        Deskripsi
                    </label>
                    <textarea name="deskripsi" cols="10" rows="5"
                        class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-dark dark:text-secondary outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"></textarea>
                </div>
                <div class="mb-4.5">
                    <label class="mb-3 block text-sm font-medium text-dark dark:text-secondary">
                        Tanggal
                    </label>
                    <input name="tanggal" type="date" placeholder="Masukan Tanggal"
                        class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-dark dark:text-secondary outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary" />
                </div>

                <div class="mb-4.5">
                    <label class="mb-3 block text-sm font-medium text-dark dark:text-secondary">
                        File
                    </label>
                    <input type="file" name="file"
                        class="w-full cursor-pointer rounded-lg border-[1.5px] border-stroke bg-transparent font-normal outline-none transition file:mr-5 file:border-collapse file:cursor-pointer file:border-0 file:border-r file:border-solid file:border-stroke file:bg-whiter file:px-5 file:py-3 file:hover:bg-primary file:hover:bg-opacity-10 focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:file:border-form-strokedark dark:file:bg-white/30 dark:file:text-white dark:focus:border-primary" />
                </div>

                <div class="-mx-3 flex flex-wrap">
                    <div class="w-1/2 px-3">
                        <button @click="modalLaporan = false" type="reset"
                            class="block w-full rounded-md border border-stroke p-3 text-center text-base font-medium text-dark dark:text-secondary transition hover:border-red-600 hover:bg-red-600 hover:text-white">
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
    <div x-show="modalUpdateLaporan" x-transition
        class="fixed left-0 top-0 flex h-full min-h-screen w-full items-center justify-center bg-dark/90 px-4 py-5 z-40">
        <div id="modalUpdateLaporan" @click.outside="modalUpdateLaporan = false"
            class="w-full max-w-[570px] h-full min-h-full overflow-y-auto rounded-[20px] bg-white dark:bg-boxdark px-8 py-5  dark:bg-dark-2 md:px-[70px] md:py-[60px] border border-secondary">
            <h3 class="pb-[18px] text-xl font-semibold text-dark dark:text-secondary text-center sm:text-2xl">
                Update Rencana Kegiatan
            </h3>
            <span class="mx-auto mb-6 flex h-1 w-[120px] rounded text-center bg-primary"></span>

            <form action="/mahasiswa/rencanakegiatan/postrencanakegiatan" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="text" name="kode_kelompok" id="kode_kelompok" value="{{ $resultKode }}" hidden>
                <input type="text" name="id_mahasiswa" id="id_mahasiswa"
                    value="{{ Auth::guard('mahasiswa')->user()->id }}" hidden>
                <div class="mb-4.5">
                    <label class="mb-3 block text-sm font-medium text-dark dark:text-secondary">
                        Judul
                    </label>
                    <input name="judul" type="text" placeholder="Masukan Judul" id="judul"
                        class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-dark dark:text-secondary outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary" />
                </div>
                <div class="mb-4.5">
                    <label class="mb-3 block text-sm font-medium text-dark dark:text-secondary">
                        Deskripsi
                    </label>
                    <textarea name="deskripsi" cols="10" rows="5" id="deskripsi"
                        class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-dark dark:text-secondary outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"></textarea>
                </div>
                <div class="mb-4.5">
                    <label class="mb-3 block text-sm font-medium text-dark dark:text-secondary">
                        Tanggal
                    </label>
                    <input name="tanggal" type="date" placeholder="Masukan Tanggal" id="tanggal"
                        class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-dark dark:text-secondary outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary" />
                </div>

                <div class="mb-4.5">
                    <label class="mb-3 block text-sm font-medium text-dark dark:text-secondary">
                        File
                    </label>
                    <input type="file" name="file" id="file" accept="{{ asset('public/' . $file) }}"
                        class="w-full cursor-pointer rounded-lg border-[1.5px] border-stroke bg-transparent font-normal outline-none transition file:mr-5 file:border-collapse file:cursor-pointer file:border-0 file:border-r file:border-solid file:border-stroke file:bg-whiter file:px-5 file:py-3 file:hover:bg-primary file:hover:bg-opacity-10 focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:file:border-form-strokedark dark:file:bg-white/30 dark:file:text-white dark:focus:border-primary" />
                    <span class="mt-2 block italic">
                        {{ $file }}
                    </span>
                </div>

                <div class="-mx-3 flex flex-wrap">
                    <div class="w-1/2 px-3">
                        <button @click="modalUpdateLaporan = false" type="reset"
                            class="block w-full rounded-md border border-stroke p-3 text-center text-base font-medium text-dark dark:text-secondary transition hover:border-red-600 hover:bg-red-600 hover:text-white">
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            var id_laporan;
            $('.updateLaporan').click(function() {
                id_laporan = $(this).data('id');
                console.log(id_laporan);
                $('form').attr('action', '/mahasiswa/postupdatelaporan/' + id_laporan);
                $.ajax({
                    url: "/mahasiswa/laporankegiatan/detail/" + id_laporan,
                    method: "GET",
                    dataType: "json",
                    success: function(response) {
                        console.log(response)
                        var kode_kelompok = response.data.kode_kelompok;
                        var id_mahasiswa = response.data.id_mahasiswa;
                        var judul = response.data.judul;
                        var deskripsi = response.data.deskripsi;
                        var tanggal = response.data.tanggal;
                        $('#kode_kelompok').val(kode_kelompok);
                        $('#id_mahasiswa').val(id_mahasiswa);
                        $('#judul').val(judul);
                        $('#deskripsi').val(deskripsi);
                        $('#tanggal').val(tanggal);
                    },
                    error: function(xhr, status, error) {
                        console.error("Error:", error);
                    }
                });
            });
        });
    </script>
@endsection
