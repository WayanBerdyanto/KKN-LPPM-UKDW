@section('title', 'Dosen | Logbook Mahasiswa')
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
            <li>
                <div class="flex items-center">
                    <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <a href="{{ route('dosendetailkelompok', [$datakelompok]) }}"
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

    @if (count($data) == 0)
        <div class="mt-6 w-full p-4 bg-whiten dark:bg-boxdark rounded-lg drop-shadow-lg">
            <p class="text-base text-dar mt-2 text-gray-500 truncate">
            <div class="md:flex justify-between">
                <div class="flex space-x-3">
                    <img src="{{ asset('img/logo-ukdw.png') }}"
                        class="object-contain md:w-12 h-12 rounded-full md:border md:border-primary ">
                    <h5 class="text-1xl font-semibold text-dark dark:text-whiten my-2.5">
                        Belum ada logbook
                    </h5>
                </div>
            </div>
            </p>
        </div>
    @else
        @foreach ($data as $idx => $item)
            <div class="mt-6 w-full p-4 bg-whiten dark:bg-boxdark rounded-lg drop-shadow-lg">
                <div class="md:flex justify-between">
                    <div class="flex space-x-3">
                        <h5 class="text-1xl font-semibold text-dark dark:text-whiten my-2.5">
                            {{ $idx + 1 }}
                        </h5>
                        <h5 class="text-1xl font-semibold text-dark dark:text-whiten my-2.5">
                            {{ $item->judul }}
                        </h5>
                    </div>
                </div>
                <hr class="mt-2 border border-secondary">
                <h5 class="mt-2 mb-2 text-1xl font-semibold text-dark dark:text-whiten">
                    {{ date('l, j F Y', strtotime($item->tanggal)) }}
                </h5>
                <p class="text-base text-dark truncate ">
                    {{ $item->deskripsi }}
                </p>
                <hr class="mt-2 border border-secondary">
                <h5 class="text-1xl font-semibold text-primary my-2.5">Komentar</h5>
                <p class="text-base text-dark mt-2 text-gray-500 truncate">
                    @if (empty($item->komentar_dosen))
                        <div class="md:flex justify-between">
                            <div class="flex space-x-3 py-1">
                                <span class="italic">belum ada komentar</span>
                            </div>
                            <div class="flex ml-auto">
                                <button @click="modalInsertKomentar = true" data-toggle="modal"
                                    data-target="#modalInsertKomentar"
                                    class="bg-primary hover:bg-opacity-90 px-3 py-1 rounded-lg text-white content-center insertKomentarLogbook"
                                    data-id="{{ $item->id }}">
                                    <i class="fa-solid fa-plus"></i>
                                </button>
                            </div>
                        </div>
                    @else
                        <div class="md:flex justify-between">
                            <div class="flex space-x-3 py-1">
                                <span class="italic">{{ $item->komentar_dosen }}</span>
                            </div>
                            <div class="flex ml-auto">
                                <button @click="modalUpdateKomentar = true" data-toggle="modal"
                                    data-target="#modalUpdateKomentar"
                                    class="bg-green-500 hover:bg-opacity-90 px-3 py-1 rounded-lg text-white content-center updateKomentarLogbook"
                                    data-id="{{ $item->id }}">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                                <a href="#" onclick="confirmDelete('/dosen/deletekomentar/{{ $item->id }}')"
                                    class="bg-red-500 hover:bg-opacity-90 px-3 py-1 rounded-lg text-white content-center ml-2" data-confirm-delete="true">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                            </div>
                        </div>
                    @endif
                </p>
            </div>
        @endforeach
    @endif
    {{-- Modal Insert Komentar --}}
    <div x-show="modalInsertKomentar" x-transition
        class="fixed left-0 top-0 flex h-full min-h-screen w-full items-center justify-center bg-dark/90 px-4 py-5 z-40">
        <div id="modalInsertKomentar" @click.outside="modalInsertKomentar = false"
            class="w-full max-w-[570px] rounded-[20px] bg-white px-8 py-12  dark:bg-dark-2 md:px-[70px] md:py-[60px]">
            <h3 class="pb-[18px] text-xl font-semibold text-dark text-center sm:text-2xl">
                Komentar Logbook
            </h3>
            <span class="mx-auto mb-6 flex h-1 w-[120px] rounded text-center bg-primary"></span>
            <form action="" method="POST">
                @csrf
                <div class="mb-4.5">
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Isi Komentar
                    </label>
                    <textarea name="komentar" cols="30" rows="8"
                        class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"></textarea>
                </div>
                <div class="-mx-3 flex flex-wrap">
                    <div class="w-1/2 px-3">
                        <button @click="modalInsertKomentar = false" type="reset"
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

    {{-- Modal Update Komentar --}}
    <div x-show="modalUpdateKomentar" x-transition
        class="fixed left-0 top-0 flex h-full min-h-screen w-full items-center justify-center bg-dark/90 px-4 py-5 z-40">
        <div id="modalUpdateKomentar" @click.outside="modalUpdateKomentar = false"
            class="w-full max-w-[570px] rounded-[20px] bg-white px-8 py-12  dark:bg-dark-2 md:px-[70px] md:py-[60px]">
            <h3 class="pb-[18px] text-xl font-semibold text-dark text-center sm:text-2xl">
                Update Komentar Logbook
            </h3>
            <span class="mx-auto mb-6 flex h-1 w-[120px] rounded text-center bg-primary"></span>
            <form action="" method="POST">
                @csrf
                <div class="mb-4.5">
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Isi Komentar
                    </label>
                    <textarea name="komentar" cols="30" rows="8" id="upd-komentar"
                        class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"></textarea>
                </div>
                <div class="-mx-3 flex flex-wrap">
                    <div class="w-1/2 px-3">
                        <button @click="modalUpdateKomentar = false" type="reset"
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
    {{-- End Of Modal Update Komentar --}}


     {{--  JQuery Insert Logbook --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            var id_logbook;

            $('.insertKomentarLogbook').click(function() {
                id_logbook = $(this).data('id');
                console.log(id_logbook);
                $('form').attr('action', '/dosen/logbook/postKomentar/' + id_logbook);
                $.ajax({
                    url: "/dosen/detaillogbook/" + id_logbook,
                    method: "GET",
                    dataType: "json"
                });
            });
        });
    </script>

    {{--  END JQuery Insert Logbook --}}

    {{--  JQuery Update Logbook --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            var id_logbook;

            $('.updateKomentarLogbook').click(function() {
                id_logbook = $(this).data('id');
                console.log(id_logbook);
                $('form').attr('action', '/dosen/updatekomentar/postupdate/' + id_logbook);
                $.ajax({
                    url: "/dosen/detaillogbook/" + id_logbook,
                    method: "GET",
                    dataType: "json",
                    success: function(response) {
                        console.log(response)
                        var komentar = response.detail[0].komentar_dosen;
                        $('#upd-komentar').text(komentar);
                    },
                    error: function(xhr, status, error) {
                        console.error("Error:", error);
                    }
                });
            });
        });
    </script>

    {{--  END JQuery Update Logbook --}}

    {{--JQuery Delete Logbook --}}
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
    {{--  END JQuery Delete Logbook --}}
@endsection
