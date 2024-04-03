<header class="h-16 w-full flex items-center justify-end relative px-5 space-x-10 bg-secondary shadow-md">
    <button id="dropdown" type="button" class="flex flex-shrink-0 items-center space-x-4 text-dark">
        <div class="flex flex-col items-end ">
            <div class="text-md font-medium ">
                {{ Auth::guard('dosen')->user()->username}}
            </div>
            <div class="text-sm font-regular">
                {{ Auth::guard('dosen')->user()->status}}
            </div>
        </div>
        <div class="h-10 w-10 rounded-full cursor-pointer bg-gray-200 border-2 border-blue-400"></div>
    </button>
</header>
<div id="dropdown-menu"
    class="absolute hidden top-[4rem] right-6 z-10 bg-secondary dark:bg-boxdark divide-y divide-gray-100  shadow w-44 rounded-xl px-1">
    <ul class="flex flex-col gap-5 border-b border-stroke px-6 py-7.5 dark:border-strokedark" aria-labelledby="dropdown">
        <li>
            <a href="#"
                class="flex items-center gap-3.5 text-sm font-medium duration-300 ease-in-out hover:text-primary lg:text-base">Dashboard</a>
        </li>
        <li>
            <a href="#"
                class="flex items-center gap-3.5 text-sm font-medium duration-300 ease-in-out hover:text-primary lg:text-base">Settings</a>
        </li>
        <li>
            <a href="#"
                class="flex items-center gap-3.5 text-sm font-medium duration-300 ease-in-out hover:text-primary lg:text-base">Earnings</a>
        </li>
        <li>
            <a href="#"
                class="flex items-center gap-3.5 text-sm font-medium duration-300 ease-in-out hover:text-primary lg:text-base">Sign out</a>
        </li>
    </ul>
</div>
