@section('title', 'Dashboard Dosen')
@extends('dosen.layouts.main')
@section('content')
    <div class="w-full flex justify-end">
        {{-- Start Logbook --}}
        <div class="mr-1" x-data="{ dropdownOpen: false }" @click.outside="dropdownOpen = false">
            <button @click="dropdownOpen = !dropdownOpen"
                class="relative bg-blue-700 hover:bg-blue-800 duration-300 py-2 px-4 text-blue-100 mx-5 rounded">
                <i class="fa-solid fa-book"></i>
                <span
                    class="absolute bg-blue-500 text-blue-100 px-2 py-1 text-xs font-bold rounded-full -top-3 -right-3">{{ count($log) }}+</span>
            </button>
            <div :class="dropdownOpen ? 'flex' : 'hidden'"
                class="absolute right-48 flex-col text-gray-700 bg-white shadow-md w-96 rounded-xl bg-clip-border z-40">
                <nav class="flex min-w-[240px] flex-col gap-1 p-2 font-sans text-base font-normal text-blue-gray-700">
                    <div class="flex justify-between items-center px-3">
                        <span class="text-center font-semibold text-2xl">Logbook</span>
                        <span @click="dropdownOpen = false" class="close cursor-pointer text-4xl text-right">&times;</span>
                    </div>
                    @foreach ($log as $item)
                        <div role="button" onclick="window.location='{{ route('dosenlihatlogbook',['id'=>$item->id_mahasiswa]) }}'"
                            class="flex items-center w-full p-3 leading-tight transition-all rounded-lg outline-none text-start hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900 hover:bg-gray-100 duration-200">
                            <div class="grid mr-4 place-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="items-center relative inline-block h-12 w-12 !rounded-full  object-cover object-center text-blue-400"
                                    viewBox="0 0 512 512" fill="currentColor">
                                    <path
                                        d="M256 288A144 144 0 1 0 256 0a144 144 0 1 0 0 288zm-94.7 32C72.2 320 0 392.2 0 481.3c0 17 13.8 30.7 30.7 30.7H481.3c17 0 30.7-13.8 30.7-30.7C512 392.2 439.8 320 350.7 320H161.3z" />
                                </svg>
                            </div>
                            <div>
                                <h6
                                    class="block font-sans text-base antialiased font-semibold leading-relaxed tracking-normal text-blue-gray-900">
                                    {{ $item->nama }}
                                </h6>
                                <p class="block font-sans text-sm antialiased font-normal leading-normal text-gray-700">
                                    {{ $item->judul }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </nav>
            </div>
        </div>
        {{-- END Logbook --}}

        {{-- START KEGIATAN KELOMPOK --}}
        <div class="mr-5" x-data="{ dropdownOpen: false }" @click.outside="dropdownOpen = false">
            <button @click="dropdownOpen = !dropdownOpen"
                class="relative bg-blue-700 hover:bg-blue-800 duration-300 py-2 px-4 text-blue-100 rounded">
                <i class="fa-solid fa-people-group"></i>
                <span
                    class="absolute bg-blue-500 text-blue-100 px-2 py-1 text-xs font-bold rounded-full -top-3 -right-3">{{ count($lap) }}+</span>
            </button>
            <div :class="dropdownOpen ? 'flex' : 'hidden'"
                class="absolute right-28 flex-col text-gray-700 bg-white shadow-md w-96 rounded-xl bg-clip-border z-40">
                <nav class="flex min-w-[240px] flex-col gap-1 p-2 font-sans text-base font-normal text-blue-gray-700">
                    <div class="flex justify-between items-center px-3">
                        <span class="text-center font-semibold text-2xl">Laporan Kelompok</span>
                        <span @click="dropdownOpen = false" class="cursor-pointer text-4xl text-right">&times;</span>
                    </div>
                    @foreach ($lap as $item)
                    <div role="button"
                        class="flex items-center w-full p-3 leading-tight transition-all rounded-lg outline-none text-start hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900 hover:bg-gray-100 duration-200">
                        <div class="grid mr-4 place-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="items-center relative inline-block h-12 w-12 !rounded-full  object-cover object-center text-blue-400"
                                viewBox="0 0 512 512" fill="currentColor">
                                <path
                                    d="M256 288A144 144 0 1 0 256 0a144 144 0 1 0 0 288zm-94.7 32C72.2 320 0 392.2 0 481.3c0 17 13.8 30.7 30.7 30.7H481.3c17 0 30.7-13.8 30.7-30.7C512 392.2 439.8 320 350.7 320H161.3z" />
                            </svg>
                        </div>

                            <div class="overflow-hidden">
                                <h6
                                    class="block font-sans text-base antialiased font-semibold leading-relaxed tracking-normal text-blue-gray-900">
                                    {{ $item->nama_kelompok }}
                                </h6>
                                <p
                                    class="block font-sans text-sm antialiased font-normal leading-normal text-gray-700 truncate">
                                    {{ $item->judul }}
                                </p>
                            </div>

                    </div>
                     @endforeach
                </nav>
            </div>
        </div>
        {{-- END KEGIATAN KELOMPOK --}}

        {{-- START RENCANA KELOMPOK --}}
        <div class="mr-5" x-data="{ dropdownOpen: false }" @click.outside="dropdownOpen = false">
            <button @click="dropdownOpen = !dropdownOpen"
                class="relative bg-blue-700 hover:bg-blue-800 duration-300 py-2 px-4 text-blue-100 rounded">
                <i class="fa-solid fa-users-line"></i>
                <span
                    class="absolute bg-blue-500 text-blue-100 px-2 py-1 text-xs font-bold rounded-full -top-3 -right-3">{{ count($ren) }}+</span>
            </button>
            <div :class="dropdownOpen ? 'flex' : 'hidden'"
                class="absolute right-10 flex-col text-gray-700 bg-white shadow-md w-96 rounded-xl bg-clip-border z-40">
                <nav class="flex min-w-[240px] flex-col gap-1 p-2 font-sans text-base font-normal text-blue-gray-700">
                    <div class="flex justify-between items-center px-3">
                        <span class="text-center font-semibold text-2xl">Rencana Kelompok</span>
                        <span @click="dropdownOpen = false" class="cursor-pointer text-4xl text-right">&times;</span>
                    </div>
                    @foreach ($ren as $item)
                        <div role="button" onclick="window.location='{{ route('rencanadosen',['id'=>$item->kode_kelompok]) }}'"
                            class="flex items-center w-full p-3 leading-tight transition-all rounded-lg outline-none text-start hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900 hover:bg-gray-100 duration-200">
                            <div class="grid mr-4 place-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="items-center relative inline-block h-12 w-12 !rounded-full  object-cover object-center text-blue-400"
                                    viewBox="0 0 512 512" fill="currentColor">
                                    <path
                                        d="M256 288A144 144 0 1 0 256 0a144 144 0 1 0 0 288zm-94.7 32C72.2 320 0 392.2 0 481.3c0 17 13.8 30.7 30.7 30.7H481.3c17 0 30.7-13.8 30.7-30.7C512 392.2 439.8 320 350.7 320H161.3z" />
                                </svg>
                            </div>

                            <div class="overflow-hidden">
                                <h6
                                    class="block font-sans text-base antialiased font-semibold leading-relaxed tracking-normal text-blue-gray-900">
                                    {{ $item->nama_kelompok }}
                                </h6>
                                <p
                                    class="block font-sans text-sm antialiased font-normal leading-normal text-gray-700 truncate">
                                    {{ $item->judul }}
                                </p>
                            </div>

                        </div>
                    @endforeach
                </nav>
            </div>
        </div>
        {{-- END RENCANA KELOMPOK --}}

    </div>
    <div class="flex justify-end">
        <div class="w-full mx-auto mt-8 mb-10">
            <div class="grid grid-cols-1 gap-10 sm:grid-cols-3 lg:grid-cols-3 mt-4">
                <div class="bg-white overflow-hidden shadow sm:rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <dl>
                            <dt class="text-sm leading-5 font-medium text-gray-500 truncate">Loogbok Masuk</dt>
                            <dd class="mt-1 text-3xl leading-9 font-semibold text-indigo-600">{{ count($log) }}</dd>
                        </dl>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow sm:rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <dl>
                            <dt class="text-sm leading-5 font-medium text-gray-500 truncate">Laporan Kegiatan Kelompok</dt>
                            <dd class="mt-1 text-3xl leading-9 font-semibold text-indigo-600">{{ count($lap) }}</dd>
                        </dl>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow sm:rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <dl>
                            <dt class="text-sm leading-5 font-medium text-gray-500 truncate">Laporan Rencana Kelompok</dt>
                            <dd class="mt-1 text-3xl leading-9 font-semibold text-indigo-600">{{ count($ren) }}</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
