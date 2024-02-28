<header class="h-16 w-full flex items-center justify-end relative px-5 space-x-10 bg-gray-800">
    <button id="dropdown" type="button" class="flex flex-shrink-0 items-center space-x-4 text-white">
        <div class="flex flex-col items-end ">
            <div class="text-md font-medium ">Unknow Unknow</div>
            <div class="text-sm font-regular">Admin</div>
        </div>
        <div class="h-10 w-10 rounded-full cursor-pointer bg-gray-200 border-2 border-blue-400"></div>
    </button>
</header>
<div id="dropdown-menu"
    class="absolute hidden top-[3.9rem] right-0 z-10 bg-white divide-y divide-gray-100  shadow w-44 dark:bg-gray-700">
    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdown">
        <li>
            <a href="#"
                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
        </li>
        <li>
            <a href="#"
                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
        </li>
        <li>
            <a href="#"
                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
        </li>
        <li>
            <a href="#"
                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sign out</a>
        </li>
    </ul>
</div>
