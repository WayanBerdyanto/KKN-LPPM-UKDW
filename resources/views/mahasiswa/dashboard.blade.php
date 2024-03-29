@section('title', 'Dashboard Dosen')
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
                            {{ Auth::guard('mahasiswa')->user()->nama }}
                        </h1>
                        <h2 class="text-dark mt-1 text-sm font-normal block">
                            <i class="fa-solid fa-location-dot mr-1"></i>
                            Beji, Ngawen, Gunung Kidul, DIY
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
                                <span class="font-semibold">Aloysius Airlangga Bajuadji, S.Kom., M.Eng.</span>
                            </td>
                        </tr>
                        <tr class="border-b">
                            <td scope="row" class="pr-6 py-4 font-medium whitespace-nowrap">
                                <span class="font-normal">Kelompok</span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="font-semibold">
                                    2 Inclusive
                                </span>

                            </td>
                        </tr>
                        <tr class="border-b">
                            <td scope="row" class="pr-6 py-4 font-medium whitespace-nowrap">
                                <span class="font-normal">Ketua Kelompok</span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="font-semibold">Wayan Berdyanto / 72210481</span>

                            </td>
                        </tr>
                        <tr class="border-b">
                            <td scope="row" class="pr-6 py-4 font-medium whitespace-nowrap">
                                <span class="font-normal">Status</span>
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="font-semibold bg-primary text-secondary px-3 cursor-pointer rounded-md py-0.5">Aktif</span>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div
            class="rounded-sm border border-stroke bg-white px-5 pb-2.5 pt-6 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:pb-1 mt-10">
            <h4 class="mb-6 text-xl font-bold text-dark">
                Daftar Kelompok
            </h4>
            <div class="flex flex-col">
                <div class="grid grid-cols-3 rounded-sm bg-gray-2 dark:bg-meta-4 sm:grid-cols-5">
                    <div class="p-2.5 xl:p-5">
                        <h5 class="text-sm font-medium uppercase xsm:text-base">Nama</h5>
                    </div>
                    <div class="p-2.5 text-center xl:p-5">
                        <h5 class="text-sm font-medium uppercase xsm:text-base">Nim</h5>
                    </div>
                    <div class="p-2.5 text-center xl:p-5">
                        <h5 class="text-sm font-medium uppercase xsm:text-base">Prodi</h5>
                    </div>
                    <div class="hidden p-2.5 text-center sm:block xl:p-5">
                        <h5 class="text-sm font-medium uppercase xsm:text-base">Angkatan</h5>
                    </div>
                    <div class="hidden p-2.5 text-center sm:block xl:p-5">
                        <h5 class="text-sm font-medium uppercase xsm:text-base">Status</h5>
                    </div>
                </div>

                <div class="grid grid-cols-3 border-b border-stroke dark:border-strokedark sm:grid-cols-5">
                    <div class="flex items-center gap-3 p-2.5 xl:p-5">
                        <div class="flex-shrink-0">
                            <img src="./images/brand/brand-01.svg" alt="Brand" />
                        </div>
                        <p class="hidden font-medium text-dark sm:block">
                            Google
                        </p>
                    </div>

                    <div class="flex items-center justify-center p-2.5 xl:p-5">
                        <p class="font-medium text-dark">3.5K</p>
                    </div>

                    <div class="flex items-center justify-center p-2.5 xl:p-5">
                        <p class="font-medium text-meta-3">$5,768</p>
                    </div>

                    <div class="hidden items-center justify-center p-2.5 sm:flex xl:p-5">
                        <p class="font-medium text-dark">590</p>
                    </div>

                    <div class="hidden items-center justify-center p-2.5 sm:flex xl:p-5">
                        <p class="font-medium text-meta-5">4.8%</p>
                    </div>
                </div>

                <div class="grid grid-cols-3 border-b border-stroke dark:border-strokedark sm:grid-cols-5">
                    <div class="flex items-center gap-3 p-2.5 xl:p-5">
                        <div class="flex-shrink-0">
                            <img src="./images/brand/brand-02.svg" alt="Brand" />
                        </div>
                        <p class="hidden font-medium text-dark sm:block">
                            Twitter
                        </p>
                    </div>

                    <div class="flex items-center justify-center p-2.5 xl:p-5">
                        <p class="font-medium text-dark">2.2K</p>
                    </div>

                    <div class="flex items-center justify-center p-2.5 xl:p-5">
                        <p class="font-medium text-meta-3">$4,635</p>
                    </div>

                    <div class="hidden items-center justify-center p-2.5 sm:flex xl:p-5">
                        <p class="font-medium text-dark">467</p>
                    </div>

                    <div class="hidden items-center justify-center p-2.5 sm:flex xl:p-5">
                        <p class="font-medium text-meta-5">4.3%</p>
                    </div>
                </div>

                <div class="grid grid-cols-3 border-b border-stroke dark:border-strokedark sm:grid-cols-5">
                    <div class="flex items-center gap-3 p-2.5 xl:p-5">
                        <div class="flex-shrink-0">
                            <img src="./images/brand/brand-03.svg" alt="Brand" />
                        </div>
                        <p class="hidden font-medium text-dark sm:block">
                            Github
                        </p>
                    </div>

                    <div class="flex items-center justify-center p-2.5 xl:p-5">
                        <p class="font-medium text-dark">2.1K</p>
                    </div>

                    <div class="flex items-center justify-center p-2.5 xl:p-5">
                        <p class="font-medium text-meta-3">$4,290</p>
                    </div>

                    <div class="hidden items-center justify-center p-2.5 sm:flex xl:p-5">
                        <p class="font-medium text-dark">420</p>
                    </div>

                    <div class="hidden items-center justify-center p-2.5 sm:flex xl:p-5">
                        <p class="font-medium text-meta-5">3.7%</p>
                    </div>
                </div>

                <div class="grid grid-cols-3 border-b border-stroke dark:border-strokedark sm:grid-cols-5">
                    <div class="flex items-center gap-3 p-2.5 xl:p-5">
                        <div class="flex-shrink-0">
                            <img src="./images/brand/brand-04.svg" alt="Brand" />
                        </div>
                        <p class="hidden font-medium text-dark sm:block">
                            Vimeo
                        </p>
                    </div>

                    <div class="flex items-center justify-center p-2.5 xl:p-5">
                        <p class="font-medium text-dark">1.5K</p>
                    </div>

                    <div class="flex items-center justify-center p-2.5 xl:p-5">
                        <p class="font-medium text-meta-3">$3,580</p>
                    </div>

                    <div class="hidden items-center justify-center p-2.5 sm:flex xl:p-5">
                        <p class="font-medium text-dark">389</p>
                    </div>

                    <div class="hidden items-center justify-center p-2.5 sm:flex xl:p-5">
                        <p class="font-medium text-meta-5">2.5%</p>
                    </div>
                </div>

                <div class="grid grid-cols-3 sm:grid-cols-5">
                    <div class="flex items-center gap-3 p-2.5 xl:p-5">
                        <div class="flex-shrink-0">
                            <img src="./images/brand/brand-05.svg" alt="Brand" />
                        </div>
                        <p class="hidden font-medium text-dark sm:block">
                            Facebook
                        </p>
                    </div>

                    <div class="flex items-center justify-center p-2.5 xl:p-5">
                        <p class="font-medium text-dark">1.2K</p>
                    </div>

                    <div class="flex items-center justify-center p-2.5 xl:p-5">
                        <p class="font-medium text-meta-3">$2,740</p>
                    </div>

                    <div class="hidden items-center justify-center p-2.5 sm:flex xl:p-5">
                        <p class="font-medium text-dark">230</p>
                    </div>

                    <div class="hidden items-center justify-center p-2.5 sm:flex xl:p-5">
                        <p class="font-medium text-meta-5">1.9%</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
