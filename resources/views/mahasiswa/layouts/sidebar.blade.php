<aside id="nav-menu"
    class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full md:translate-x-0"
    aria-label="Sidebar">
    <div class="h-full px-2 py-4 overflow-y-auto bg-dark border-r-2 border-gray-800">
        <ul class="space-y-2 font-medium">
            <li>
                <a href="/anggota" class="flex items-center px-4 text-secondary rounded-lg">
                    <img class="w-auto h-auto transition duration-75 group-hover:text-gray-900"
                        src="https://lppm.ukdw.ac.id/wp-content/uploads/2023/02/logo-banner-1-300x58.png" alt="">
                </a>
            </li>
            <li class="pt-12">
                <a href="/mahasiswa"
                    class="flex items-center p-2 text-secondary rounded-lg  group {{ $key == 'dashboard' ? 'bg-primary' : 'hover:bg-gray-600' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-columns-gap" viewBox="0 0 16 16">
                        <path
                            d="M6 1v3H1V1zM1 0a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1zm14 12v3h-5v-3zm-5-1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1zM6 8v7H1V8zM1 7a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1zm14-6v7h-5V1zm-5-1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1z" />
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Dashboard</span>
                </a>
            </li>
            <li class="pt-5" x-data="{ dropdownOpen: false }">
                <a @click="dropdownOpen = !dropdownOpen"
                    class="flex items-center p-2 text-secondary rounded-lg  group hover:bg-gray-600 cursor-pointer" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-activity" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M6 2a.5.5 0 0 1 .47.33L10 12.036l1.53-4.208A.5.5 0 0 1 12 7.5h3.5a.5.5 0 0 1 0 1h-3.15l-1.88 5.17a.5.5 0 0 1-.94 0L6 3.964 4.47 8.171A.5.5 0 0 1 4 8.5H.5a.5.5 0 0 1 0-1h3.15l1.88-5.17A.5.5 0 0 1 6 2" />
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Kegiatan</span>
                </a>
                <!-- Dropdown Menu Start -->
                <div class="translate transform overflow-hidden" :class="{ 'block': dropdownOpen, 'hidden': !dropdownOpen }">
                    <ul class="mb-5.5 mt-4 flex flex-col gap-2.5 pl-6">
                        <li>
                            <a class="group relative flex items-center gap-2.5 rounded-md px-4 text-secondary font-medium text-bodydark2 duration-300 ease-in-out hover:bg-gray-600 p-2"
                                href="#" @click="dropdownOpen = false">Rencana Kegiatan</a>
                        </li>
                        <li>
                            <a class="group relative flex items-center gap-2.5 rounded-md px-4 text-secondary  font-medium text-bodydark2 duration-300 ease-in-out hover:bg-gray-600 p-2"
                                href="#" @click="dropdownOpen = false">Laporan Kegiatan</a>
                        </li>
                    </ul>
                </div>
                <!-- Dropdown Menu End -->
            </li>

            <li class="pt-5">
                <a href="/mahasiswa/logbook"
                    class="flex items-center p-2 text-secondary rounded-lg  group {{ $key == 'logbook' ? 'bg-primary' : 'hover:bg-gray-600' }}">
                    <i class="fa-solid fa-book"></i>
                    <span class="flex-1 ms-3 whitespace-nowrap">Logbook</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
