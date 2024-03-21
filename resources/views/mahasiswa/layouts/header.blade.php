<header class="h-16 w-full flex items-center justify-end relative px-5 space-x-10 bg-secondary shadow-md">
    <button id="dropdown" type="button" class="flex flex-shrink-0 items-center space-x-4 text-dark">
        <div class="flex flex-col items-end ">
            <div class="text-md font-medium ">
                {{ Auth::guard('mahasiswa')->user()->username}}
            </div>
            <div class="text-sm font-regular">
                {{ Auth::guard('mahasiswa')->user()->status}}
            </div>
        </div>
        <div class="h-10 w-10 rounded-full cursor-pointer bg-gray-200 border-2 border-blue-400"></div>
    </button>
</header>
<div id="dropdown-menu"
    class="absolute hidden top-[3.9rem] right-0 z-10 bg-secondary divide-y divide-gray-100  shadow w-44 dark:bg-gray-700">
    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdown">
        <li>
            <a href="#"
                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-secondary">Dashboard</a>
        </li>
        <li>
            <a href="#"
                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-secondary">Settings</a>
        </li>
        <li>
            <a href="#"
                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-secondary">Earnings</a>
        </li>
        <li>
            <a href="#"
                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-secondary">Sign out</a>
        </li>
    </ul>
</div>
