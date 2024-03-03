@section('title', 'Admin')
@extends('admin.layouts.main')
@section('content')
    <h1 class="font-normal text-xl">Selamat Pagi Wayan....</h1>
    <div class="flex flex-wrap">
        <div class="w-full relative flex items-center mt-6 lg:w-1/2">
            <div class="flex items-center justify-between px-4 w-1/2 py-3 border-2 rounded-lg border-slate-600 mr-2 cursor-pointer text-slate-600 hover:bg-primary hover:text-secondary hover:border-secondary duration-500">
                <div class="w-full font-semibold">
                    <h3>230</h3>
                    <span>Mahasiswa</span>
                </div>
                <i class="fa-solid fa-chart-line rounded-full border-2 border-slate-600 text-slate-600 p-2 ml-5"></i>
            </div>
            <div class="flex items-center justify-between px-4 w-1/2 py-3 border-2 rounded-lg border-slate-600 mr-2 cursor-pointer text-slate-600 hover:bg-primary hover:text-secondary hover:border-secondary duration-500">
                <div class="w-full font-semibold">
                    <h3>230</h3>
                    <span>Mahasiswa</span>
                </div>
                <i class="fa-solid fa-chart-line rounded-full border-2 border-slate-600 text-slate-600 p-2 ml-5"></i>
            </div>
        </div>
        <div class="w-full relative flex items-center mt-6 lg:w-1/2">
            <div class="flex items-center justify-between px-4 w-1/2 py-3 border-2 rounded-lg border-slate-600 mr-2 cursor-pointer text-slate-600 hover:bg-primary hover:text-secondary hover:border-secondary duration-500">
                <div class="w-full font-semibold">
                    <h3>230</h3>
                    <span>Mahasiswa</span>
                </div>
                <i class="fa-solid fa-chart-line rounded-full border-2 border-slate-600 text-slate-600 p-2 ml-5"></i>
            </div>
            <div class="flex items-center justify-between px-4 w-1/2 py-3 border-2 rounded-lg border-slate-600 mr-2 cursor-pointer text-slate-600 hover:bg-primary hover:text-secondary hover:border-secondary duration-500">
                <div class="w-full font-semibold">
                    <h3>230</h3>
                    <span>Mahasiswa</span>
                </div>
                <i class="fa-solid fa-chart-line rounded-full border-2 border-slate-600 text-slate-600 p-2 ml-5"></i>
            </div>
        </div>
    </div>

    <div class="w-full mt-5 relative overflow-x-auto">
        <div class="flex justify-between md:items-center py-2">
            <h1 class="font-semibold text-lg lg:text-2xl uppercase">Daftar KKN</h1>
            <div class="block lg:flex lg:items-center text-right py-2">
                <form action="">
                    <div class="border rounded-lg focus-within:ring focus-within:ring-blue-400 duration-700">
                        <input type="text" class="outline-none px-2" placeholder="Cari">
                        <button type="submit" class="bg-primary text-secondary py-1.5 px-3 rounded-r-lg hover:bg-blue-500">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <hr class="mt-2 border">
        <table class="w-full text-sm text-left rtl:text-right mt-3 border">
            <thead class="text-xs text-secondary uppercase bg-slate-700">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        NO
                    </th>
                    <th scope="col" class="px-6 py-3">
                        SEMESTER
                    </th>
                    <th scope="col" class="px-6 py-3">
                        TAHUN
                    </th>
                    <th scope="col" class="px-6 py-3">
                        STATUS
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class="odd:bg-secondary even:bg-gray-200 text-dark">
                    <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
                        1
                    </th>
                    <td class="px-6 py-4">
                        Genap
                    </td>
                    <td class="px-6 py-4">
                        2023/2024
                    </td>
                    <td class="px-6 py-4 text-primary font-semibold">
                        Aktif
                    </td>
                    <td class="px-6 py-4">
                        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Detail</a>
                    </td>
                </tr>
                <tr class="odd:bg-secondary even:bg-gray-200 text-dark">
                    <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
                        2
                    </th>
                    <td class="px-6 py-4">
                        Ganjil
                    </td>
                    <td class="px-6 py-4">
                        2023/2024
                    </td>
                    <td class="px-6 py-4 text-red-500 font-semibold">
                        Tidak Aktif
                    </td>
                    <td class="px-6 py-4">
                        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Detail</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
