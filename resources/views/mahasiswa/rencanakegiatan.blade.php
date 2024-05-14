@section('title', 'RencanaKegiatan | Mahasiswa')
@extends('mahasiswa.layouts.main')
@section('content')
    <div class="container relative flex flex-wrap justify-between items-center w-full p-2.5">
        <div class="w-full mt-5 relative overflow-x-auto">
            <div class="flex justify-between items-center py-2">
                <h1 class="font-semibold text-lg lg:text-2xl uppercase">Rencana Kegiatan KKN</h1>
                <div class="flex items-center text-right py-2">
                    <button @click="modalkegiatan = true" data-toggle="modal" data-target="#modalkegiatan"
                        class="ml-0 lg:ml-5 mt-2 lg:mt-0 block bg-primary text-secondary px-3 py-2 font-normal rounded-lg text-center hover:bg-opacity-90">
                        <i class="fa-solid fa-address-book mr-2"></i>Tambah Rencana</button>
                </div>
            </div>
            <hr class="mt-4 border-opacity-50 border-primary">
            {{-- Start File Info Template --}}
            <div class="border border-opacity-50 border-primary p-2.5 mt-4">
                <i class="fa-solid fa-download mx-3"></i>
                <span>Template Rencana Kegiatan </span>
                <a href="/mahasiswa/templaterencana" class="text-primary underline">Klik Donwload</a>
            </div>
            {{-- End File Info Template --}}
        </div>
    </div>

    <div x-show="modalkegiatan" x-transition
        class="fixed left-0 top-0 flex h-full min-h-screen w-full items-center justify-center bg-dark/90 px-4 py-5 z-40">
        <div id="modalkegiatan" @click.outside="modalkegiatan = false"
            class="w-full max-w-[570px] h-full min-h-full overflow-y-auto rounded-[20px] bg-white dark:bg-boxdark px-8 py-5  dark:bg-dark-2 md:px-[70px] md:py-[60px] border border-secondary">
            <h3 class="pb-[18px] text-xl font-semibold text-dark dark:text-secondary text-center sm:text-2xl">
                Rencana Kegiatan
            </h3>
            <span class="mx-auto mb-6 flex h-1 w-[120px] rounded text-center bg-primary"></span>

            <form action="/mahasiswa/rencanakegiatan/postrencanakegiatan" method="POST">
                @csrf
                <input type="text" name="kode_kelompok" value="{{ $resultKode }}" hidden>
                <input type="text" name="idMhs" value="{{ Auth::guard('mahasiswa')->user()->id }}" hidden>
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
                    <textarea name="deskripsi" cols="30" rows="10"
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
                    <input type="file"
                        class="w-full cursor-pointer rounded-lg border-[1.5px] border-stroke bg-transparent font-normal outline-none transition file:mr-5 file:border-collapse file:cursor-pointer file:border-0 file:border-r file:border-solid file:border-stroke file:bg-whiter file:px-5 file:py-3 file:hover:bg-primary file:hover:bg-opacity-10 focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:file:border-form-strokedark dark:file:bg-white/30 dark:file:text-white dark:focus:border-primary"
                        name="file" />
                </div>

                <div class="-mx-3 flex flex-wrap">
                    <div class="w-1/2 px-3">
                        <button @click="modalkegiatan = false" type="reset"
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
@endsection
