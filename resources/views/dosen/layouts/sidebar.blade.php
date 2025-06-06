<aside :class="sidebarToggle ? 'translate-x-0' : '-translate-x-full'"
    class="fixed top-0 left-0 z-50 w-64 h-screen transition-transform  lg:translate-x-0 overflow-y-hidden"
    @click.outside="sidebarToggle = false">
    <div class="h-full px-2 py-4 overflow-y-auto bg-boxdark border-r-2 border-gray-800">
        <ul class="space-y-2 font-medium">
            <li>
                <a href="/dosen" class="flex items-center px-4 text-secondary rounded-lg">
                    <img class="w-auto h-auto transition duration-75 group-hover:text-gray-900"
                        src="https://lppm.ukdw.ac.id/wp-content/uploads/2023/02/logo-banner-1-300x58.png" alt="">
                </a>
            </li>
            <li class="pt-12">
                <a href="/dosen" class="flex items-center p-2 text-secondary rounded-lg hover:text-primary  group {{ $key == 'home' ? 'bg-primary hover:text-secondary' : '' }}">
                    <i class="fa-solid fa-house"></i>
                    <span class="flex-1 ms-3 whitespace-nowrap">Dashboard</span>
                </a>
            </li>
            <li class="pt-5">
                <a href="/dosen/kelompok" class="flex items-center p-2 text-secondary rounded-lg hover:text-primary  group {{ $key == 'kelompok' ? 'bg-primary hover:text-secondary' : '' }}">
                     <i class="fa-solid fa-users-line"></i>
                    <span class="flex-1 ms-3 whitespace-nowrap">Kelompok</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
