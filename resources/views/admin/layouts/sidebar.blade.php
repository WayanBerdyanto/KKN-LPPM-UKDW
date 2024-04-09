<aside :class="sidebarToggle ? 'translate-x-0' : '-translate-x-full'"
    class="fixed top-0 left-0 z-50 w-64 h-screen transition-transform  lg:translate-x-0 overflow-y-hidden"
    @click.outside="sidebarToggle = false">
    <div class="h-full px-2 py-4 overflow-y-auto bg-boxdark border-r-2 border-gray-800">
        <ul class="space-y-2 font-medium">
            <li>
                <a href="/admin" class="flex items-center px-4 text-white rounded-lg">
                    <img class="w-auto h-auto transition duration-75 group-hover:text-gray-900"
                        src="https://lppm.ukdw.ac.id/wp-content/uploads/2023/02/logo-banner-1-300x58.png" alt="">
                </a>
            </li>
            <li class="pt-12">
                <a href="/admin"
                    class="flex items-center p-2 text-secondary rounded-lg  group {{ $key == 'home' ? 'bg-primary' : 'hover:bg-gray-600' }}">
                    <i class="fa-solid fa-house"></i>
                    <span class="flex-1 ms-3 whitespace-nowrap">Dashboard</span>
                </a>
            </li>
            <li class="pt-5">
                <a href="/admin/jeniskkn"
                    class="flex items-center p-2 text-secondary rounded-lg  group {{ $key == 'jeniskkn' ? 'bg-primary' : 'hover:bg-gray-600' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-list-columns" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M0 .5A.5.5 0 0 1 .5 0h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 0 .5m13 0a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5m-13 2A.5.5 0 0 1 .5 2h8a.5.5 0 0 1 0 1h-8a.5.5 0 0 1-.5-.5m13 0a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5m-13 2A.5.5 0 0 1 .5 4h10a.5.5 0 0 1 0 1H.5a.5.5 0 0 1-.5-.5m13 0a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5m-13 2A.5.5 0 0 1 .5 6h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m13 0a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5m-13 2A.5.5 0 0 1 .5 8h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m13 0a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5m-13 2a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m13 0a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5m-13 2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m13 0a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5m-13 2a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H.5a.5.5 0 0 1-.5-.5m13 0a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5" />
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Jenis KKN</span>
                </a>
            </li>
            <li class="pt-5">
                <a href="/admin/daftarmahasiswa"
                    class="flex items-center p-2 text-secondary rounded-lg  group {{ $key == 'daftarmahasiswa' ? 'bg-primary' : 'hover:bg-gray-600' }}">
                    <i class="fa-solid fa-users"></i>
                    <span class="flex-1 ms-3 whitespace-nowrap">Mahasiswa</span>
                </a>
            </li>
            <li class="pt-5">
                <a href="/admin/kelompok"
                    class="flex items-center p-2 text-secondary rounded-lg group {{ $key == 'kelompok' ? 'bg-primary' : 'hover:bg-gray-600' }}">
                    <i class="fa-solid fa-users-line"></i>
                    <span class="flex-1 ms-3 whitespace-nowrap">Kelompok</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
