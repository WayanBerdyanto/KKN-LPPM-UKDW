@section('title', 'Home | Mahasiswa')
@extends('mahasiswa.layouts.main')
@section('content')
    <div class="container mx-auto mt-4">
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
        </div>

        <h4 class="my-3 ml-5 text-xl font-bold text-dark dark:text-secondary">
            Daftar Kelompok
        </h4>
        <div
            class="rounded-sm border border-stroke bg-white px-5 pb-2.5 pt-6 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:pb-1">
            <div class="max-w-full overflow-x-auto">
                <table class="w-full table-auto">
                    <thead>
                        <tr class="bg-gray-2 text-left dark:bg-meta-4">
                            <th class="min-w-[220px] px-4 py-4 font-medium text-black dark:text-white xl:pl-11">
                                NO
                            </th>
                            <th class="min-w-[220px] px-4 py-4 font-medium text-black dark:text-white xl:pl-11">
                                NIM
                            </th>
                            <th class="min-w-[150px] px-4 py-4 font-medium text-black dark:text-white">
                                Nama
                            </th>
                            <th class="min-w-[150px] px-4 py-4 font-medium text-black dark:text-white">
                                Prodi
                            </th>
                            <th class="px-4 py-4 font-medium text-black dark:text-white">
                                Angkatan
                            </th>
                            <th class="px-4 py-4 font-medium text-black dark:text-white">
                                Status
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($result as $idx => $data)
                            <tr>
                                <td class="border-b border-[#eee] px-4 py-5 pl-9 dark:border-strokedark xl:pl-11">
                                    <h5 class="font-medium text-dark dark:text-secondary">
                                        {{ $idx + 1 }}
                                    </h5>
                                </td>
                                <td class="border-b border-[#eee] px-4 py-5 pl-9 dark:border-strokedark xl:pl-11">
                                    <h5 class="font-medium text-dark dark:text-secondary">
                                        {{ $data->username }}
                                    </h5>
                                </td>
                                <td class="border-b border-[#eee] px-4 py-5 dark:border-strokedark">
                                    <p class="text-dark dark:text-secondary">
                                        {{ $data->nama }}
                                    </p>
                                </td>
                                <td class="border-b border-[#eee] px-4 py-5 dark:border-strokedark">
                                    <p class="text-dark dark:text-secondary">
                                        {{ $data->prodi }}
                                    </p>
                                </td>
                                <td class="border-b border-[#eee] px-4 py-5 dark:border-strokedark">
                                    <p class="text-dark dark:text-secondary">
                                        {{ $data->angkatan }}
                                    </p>
                                </td>
                                <td class="border-b border-[#eee] px-4 py-5 dark:border-strokedark">
                                    <p class="text-dark dark:text-secondary">
                                        {{ $data->status }}
                                    </p>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
