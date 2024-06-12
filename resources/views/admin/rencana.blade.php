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
                        <th scope="col" class="px-2 py-3">
                            KOMENTAR ADMIN
                        </th>
                        <th scope="col" class="px-2 py-3">
                            ACTION
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($resultRencana as $idx => $item)
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
                                <a href="{{ route('admindownloadrencana', [$item->file]) }}"
                                    class="text-primary underline">Download</a>
                            </td>
                            <td scope="row" class="px-2 py-4 max-w-36 truncate">
                                @if ($item->komentar_dosen != null)
                                    {{ $item->komentar_dosen }}
                                @else
                                    Belum ada Komentar
                                @endif
                            </td>
                            <td scope="row" class="px-2 py-4 max-w-36 truncate">
                                @if ($item->komentar_admin != null)
                                    {{ $item->komentar_admin }}
                                @else
                                    Belum ada Komentar
                                @endif
                            </td>
                            <td scope="row" class="px-2 py-4 max-w-36 truncate">
                                @if ($item->komentar_admin != null)
                                    <button @click="modalUpdateKomentarRencana = true" data-toggle="modal"
                                        data-target="#modalUpdateKomentarRencana"
                                        class="bg-green-500 hover:bg-opacity-90 px-3 py-1 rounded-lg text-white content-center updateKomentarRencana"
                                        data-id="{{ $item->id_rencana }}">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button>
                                    <a href="#" onclick="confirmDelete('/admin/deletekomentarrencana/{{ $item->id_rencana }}')"
                                        class="bg-red-500 hover:bg-opacity-90 px-3 py-1 rounded-lg text-white content-center ml-2"
                                        data-confirm-delete="true">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                @else
                                    <button @click="modalKomentarAdmin = true" data-toggle="modal"
                                        data-target="#modalKomentarAdmin"
                                        class="bg-primary hover:bg-opacity-90 px-3 py-1 rounded-lg text-white content-center insertKomentarRencana"
                                        data-id="{{ $item->id_rencana }}">
                                        <i class="fa-solid fa-plus"></i>
                                    </button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

      {{-- Modal Insert Komentar --}}
      <div x-show="modalKomentarAdmin" x-transition
      class="fixed left-0 top-0 flex h-full min-h-screen w-full items-center justify-center bg-dark/90 px-4 py-5 z-40">
      <div id="modalKomentarAdmin" @click.outside="modalKomentarAdmin = false"
          class="w-full max-w-[570px] rounded-[20px] bg-white px-8 py-12  dark:bg-dark-2 md:px-[70px] md:py-[60px]">
          <h3 class="pb-[18px] text-xl font-semibold text-dark text-center sm:text-2xl">
              Komentar Rencana Kegiatan
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
                      <button @click="modalKomentarAdmin = false" type="reset"
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
    <div x-show="modalUpdateKomentarRencana" x-transition
        class="fixed left-0 top-0 flex h-full min-h-screen w-full items-center justify-center bg-dark/90 px-4 py-5 z-40">
        <div id="modalUpdateKomentarRencana" @click.outside="modalUpdateKomentarRencana = false"
            class="w-full max-w-[570px] rounded-[20px] bg-white px-8 py-12  dark:bg-dark-2 md:px-[70px] md:py-[60px]">
            <h3 class="pb-[18px] text-xl font-semibold text-dark text-center sm:text-2xl">
                Komentar Rencana Kegiatan
            </h3>
            <span class="mx-auto mb-6 flex h-1 w-[120px] rounded text-center bg-primary"></span>
            <form action="" method="POST">
                @csrf
                <div class="mb-4.5">
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Isi Komentar
                    </label>
                    <textarea name="komentar" cols="30" rows="8" id="komentar_admin"
                        class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"></textarea>
                </div>
                <div class="-mx-3 flex flex-wrap">
                    <div class="w-1/2 px-3">
                        <button @click="modalUpdateKomentarRencana = false" type="reset"
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

   {{--  JQuery Insert Komentar --}}
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <script>
       $(document).ready(function() {
           var id_rencana;

           $('.insertKomentarRencana').click(function() {
               id_rencana = $(this).data('id');
               console.log(id_rencana);
               $('form').attr('action', '/admin/rencana/postkomentarrencana/' + id_rencana);
               $.ajax({
                   url: "/admin/detailrencana/" + id_rencana,
                   method: "GET",
                   dataType: "json"
               });
           });
       });
   </script>

   {{--  END JQuery Insert Komentar --}}

    {{--  JQuery Update Komentar --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            var id_rencana;

            $('.updateKomentarRencana').click(function() {
                id_rencana = $(this).data('id');
                console.log(id_rencana);
                 $('form').attr('action', '/admin/rencana/postkomentarrencana/' + id_rencana);
                $.ajax({
                   url: "/admin/detailrencana/" + id_rencana,
                    method: "GET",
                    dataType: "json",
                    success: function(response) {
                        console.log(response)
                        var komentar = response.detail[0].komentar_admin;
                        $('#komentar_admin').text(komentar);
                    },
                    error: function(xhr, status, error) {
                        console.error("Error:", error);
                    }
                });
            });
        });
    </script>

    {{--  END JQuery Update Komentar --}}

    {{--JQuery Delete Komentar Rencana --}}
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
    {{--  END JQuery Delete Komentar Rencana --}}
@endsection
