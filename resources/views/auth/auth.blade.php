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
                <form action="/postLogin" method="POST">
                    @csrf
                    <h2 class="font-normal text-2xl">Selamat Datang!</h2>
                    <span class="font-normal text-md">Login KKN</span>
                    <div
                        class="mt-5 border shadow-xl shadow-blue-200/30  rounded-lg px-3 py-2 text-dark duration-1000 focus-within:ring focus-within:ring-blue-400">
                        <i class="fa-solid fa-user text-slate-600"></i>
                        <input type="text" name="username" placeholder="ID" class="ml-2 bg-transparent outline-none">
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
            <path
                d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z"
                class="shape-fill"></path>
        </svg>
    </div>

    <div class="custom-shape-divider-top-1709427909">
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path
                d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z"
                class="shape-fill"></path>
        </svg>
    </div>

    <script src="{{ asset('js/password.js') }}"></script>

    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])


</body>

</html>
