<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Login</title>

    @vite('resources/css/login.css')
    <link rel="stylesheet" href="{{ asset('fontawesome-free-6.5.1-web/css/all.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
</head>

<body>
    <div class="relative flex flex-wrap h-full mx-auto">
        <div class="w-full flex justify-center mt-24 md:32">
            <img src="{{ asset('img/logo-ukdw.png') }}" alt="" class="h-28 object-cover">
        </div>
        <div class="w-full flex justify-center p-4">
            <div class="p-4 text-center">
                <form action="">
                    <h2 class="font-normal text-2xl">Selamat Datang!</h2>
                    <span class="font-normal text-md">Login KKN</span>
                    <div
                        class="mt-5 border shadow-xl shadow-blue-200/30  rounded-lg px-3 py-2 text-dark duration-1000 focus-within:ring focus-within:ring-blue-400">
                        <i class="fa-solid fa-user text-slate-600"></i>
                        <input type="text" name="nim" placeholder="Nim" class="ml-2 bg-transparent outline-none">
                    </div>
                    <div
                        class="mt-5 border shadow-xl shadow-blue-200/30  rounded-lg px-3 py-2 text-dark duration-1000 focus-within:ring focus-within:ring-blue-400">
                        <i class="fa-solid fa-lock text-slate-600"></i>
                        <input type="password" name="password" placeholder="Password"
                            class="ml-2 bg-transparent outline-none">
                    </div>
                    <div class="mt-5 text-secondary font-medium">
                        <button class="bg-primary w-full rounded-lg py-1 hover:bg-blue-500">Login</button>
                    </div>
                    <div class="mt-3">
                        <a href="/" class="text-primary font-normal hover:text-blue-500">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="custom-shape-divider-bottom-1709427909">
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z" class="shape-fill"></path>
        </svg>
    </div>

    <div class="custom-shape-divider-top-1709427909">
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z" class="shape-fill"></path>
        </svg>
    </div>
    {{-- <div class="absolute flex items-center justify-between py-4 bg-dark border-b-2 lg:top-0 w-full z-10">
        <span>hhhhi</span>~
    </div> --}}
    {{-- <div class="absolute shapedividers_com-2408 h-full w-full bg-black"></div>
    <div class="relative lg:h-screen lg:rounded-lg mt-10">
        <div class="flex flex-wrap lg:shadow-2xl lg:px-0">
            <div class="w-full lg:w-1/2 flex flex-col justify-center px-4 lg:px-2 lg:bg-secondary">
                <form
                    class="lg:mx-auto md:max-w-full md:px-14 lg:w-3/4 px-2 lg:border lg:border-blue-500 lg:rounded-lg lg:shadow-2xl">
                    <h1 class="text-center font-semibold text-2xl lg:text-3xl my-4 text-black">
                        Login</h1>
                    <div class="mb-5">
                        <label for="nim"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-dark lg:text-lg">NIM</label>
                        <input type="text" id="nim"
                            class="lg:py-[6px] lg:text-lg bg-gray-50 border-2 border-gray-900 text-gray-900 text-sm rounded-lg block w-full p-2.5 focus:ring focus:ring-blue-500 focus:border-none focus:outline-none duration-1000"
                            placeholder="NIM" required />
                    </div>
                    <div class="mb-5">
                        <label for="password"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-dark lg:text-lg">
                            Password</label>
                        <div
                            class="bg-gray-50 border-2 border-gray-900  w-full rounded-lg flex items-center duration-1000 focus-within:ring focus-within:ring-blue-500 focus-within:border-none">
                            <input type="password" id="password"
                                class="lg:text-lg lg:py-[6px] text-gray-900 text-sm rounded-lg block w-full p-2.5 outline-none bg-gray-50"
                                placeholder="**********" required />
                            <i id="iconsPassword" class="fa-regular fa-eye mx-2"></i>
                        </div>
                    </div>
                    <button type="submit"
                        class="lg:py-1 md:w-full lg:text-lg text-secondary bg-blue-500 hover:bg-blue-400 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full  px-5 py-2.5 text-center mt-2">Login</button>
                    <a href="/" class="lg:text-md  block text-center my-4 text-blue-500">Back to Home</a>
                </form>
            </div>
            <div class="w-full lg:w-1/2">
                <div class="my-4 md:h-3/5 lg:my-0 lg:h-screen hidden lg:block">
                    <div class="absolute shapedividers_com-2408 h-full w-full"></div>
                </div>
            </div>
        </div>
    </div> --}}
    <script src="{{ asset('js/password.js') }}"></script>
</body>

</html>
