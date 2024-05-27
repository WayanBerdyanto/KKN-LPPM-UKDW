@section('title', 'Admin | Dashboard')
@extends('admin.layouts.main')
@section('content')
    <h2 class="flex items-center text-2xl font-medium text-gray-700 sm:text-2xl text-boxdark">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
            class="bi bi-grid-1x2 mr-2 font-semibold" viewBox="0 0 16 16">
            <path
                d="M6 1H1v14h5zm9 0h-5v5h5zm0 9v5h-5v-5zM0 1a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1zm9 0a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1h-5a1 1 0 0 1-1-1zm1 8a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1v-5a1 1 0 0 0-1-1z" />
        </svg>
        Dashboard
    </h2>
    <div class="max-w-7xl mx-auto mt-5 mb-10">
        <div class="grid grid-cols-2 gap-5 sm:grid-cols-3 lg:grid-cols-5 mt-4">
            @foreach ($result as $item)
                <div class="bg-white overflow-hidden shadow sm:rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <dl>
                            <dt class="text-sm leading-5 font-medium text-gray-500 truncate">
                                {{ $item->nama_kkn }}
                            </dt>
                            <dd class="mt-1 text-3xl leading-9 font-semibold text-indigo-600">
                                {{ $item->jumlah }}
                            </dd>
                        </dl>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="container items-center mt-7 m-auto">
        <div class="flex flex-wrap items-center bg-white divide-y rounded-sm shadow-lg xl:divide-x xl:divide-y-0">
            <div class="w-full p-2 xl:w-1/4 sm:w-1/2">
                <div class="flex flex-col">
                    <div class="flex flex-row items-center justify-between px-4 py-4">
                        <div class="flex mr-4">
                            <span class="items-center px-4 py-4 m-auto bg-green-200 rounded-full hover:bg-green-300">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="items-center w-8 h-8 m-auto text-green-500 hover:text-green-600"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path
                                        d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z" />
                                </svg>
                            </span>
                        </div>
                        <div class="flex-1 pl-1">
                            <div class="text-xl font-medium text-gray-600">
                                @foreach ($mahasiswa as $item)
                                    {{ $item->jumlah }}
                                @endforeach
                            </div>
                            <div class="text-sm text-gray-400 sm:text-base">
                                Mahasiswa Aktif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full p-2 xl:w-1/4 sm:w-1/2">
                <div class="flex flex-col">
                    <div class="flex flex-row items-center justify-between px-4 py-4">
                        <div class="flex mr-4">
                            <span class="items-center px-4 py-4 m-auto bg-red-200 rounded-full hover:bg-red-300">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 600 600"
                                    class="items-center w-8 h-8 m-auto text-red-500 hover:text-red-600" fill="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M160 64c0-35.3 28.7-64 64-64h352c35.3 0 64 28.7 64 64v288c0 35.3-28.7 64-64 64H336.8c-11.8-25.5-29.9-47.5-52.4-64H384V320c0-17.7 14.3-32 32-32h64c17.7 0 32 14.3 32 32v32h64V64L224 64v49.1C205.2 102.2 183.3 96 160 96V64zm0 64a96 96 0 1 1 0 192 96 96 0 1 1 0-192zM133.3 352h53.3C260.3 352 320 411.7 320 485.3c0 14.7-11.9 26.7-26.7 26.7H26.7C11.9 512 0 500.1 0 485.3C0 411.7 59.7 352 133.3 352z" />
                                </svg>
                            </span>
                        </div>
                        <div class="flex-1 pl-1">
                            <div class="text-xl font-medium text-gray-600">
                                @foreach ($dosen as $item)
                                    {{ $item->jumlah }}
                                @endforeach
                            </div>
                            <div class="text-sm text-gray-400 sm:text-base">
                                Dosen Pembimbing
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="w-full p-2 xl:w-1/4 sm:w-1/2">
                <div class="flex flex-col">
                    <div class="flex flex-row items-center justify-between px-4 py-4">
                        <div class="flex mr-4">
                            <span class="items-center px-4 py-4 m-auto bg-yellow-200 rounded-full hover:bg-yellow-300">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="items-center w-8 h-8 m-auto text-yellow-500 hover:text-yellow-600"
                                    viewBox="0 0 640 512" fill="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3zM609.3 512H471.4c5.4-9.4 8.6-20.3 8.6-32v-8c0-60.7-27.1-115.2-69.8-151.8c2.4-.1 4.7-.2 7.1-.2h61.4C567.8 320 640 392.2 640 481.3c0 17-13.8 30.7-30.7 30.7zM432 256c-31 0-59-12.6-79.3-32.9C372.4 196.5 384 163.6 384 128c0-26.8-6.6-52.1-18.3-74.3C384.3 40.1 407.2 32 432 32c61.9 0 112 50.1 112 112s-50.1 112-112 112z" />
                                </svg>
                            </span>
                        </div>
                        <div class="flex-1 pl-1">
                            <div class="text-xl font-medium text-gray-600">
                                @foreach ($kelompok as $item)
                                    {{ $item->jumlah_kelompok }}
                                @endforeach
                            </div>
                            <div class="text-sm text-gray-400 sm:text-base">
                                Jumlah Kelompok
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full p-2 xl:w-1/4 sm:w-1/2">
                <div class="flex flex-col">
                    <div class="flex flex-row items-center justify-between px-4 py-4">
                        <div class="flex mr-4">
                            <span class="items-center px-4 py-4 m-auto bg-green-200 rounded-full hover:bg-green-300">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="items-center w-8 h-8 m-auto text-green-500 hover:text-green-600"
                                    viewBox="0 0 384 512" fill="currentColor">
                                    <path
                                        d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z" />
                                </svg>
                            </span>
                        </div>
                        <div class="flex-1 pl-1">
                            <div class="text-xl font-medium text-gray-600">20</div>
                            <div class="text-sm text-gray-400 sm:text-base">
                                Sebaran Lokasi
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
