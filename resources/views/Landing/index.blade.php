<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- My Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    @vite('resources/css/app.css')
</head>

<body>
    <header class="bg-dark absolute top-0 left-0 w-full flex items-center z-10 border-b-[1px] border-b-yellow-500">
        <div class="container">
            <div class="flex items-center justify-between relative py-3">
                <div class="px-4">
                    <img src="https://lppm.ukdw.ac.id/wp-content/uploads/2023/02/logo-banner-1-300x58.png"
                        alt="">
                </div>
                <div class="flex items-center px-2">
                    <button id="hamburger" name="hamburger" type="button" class="block absolute right-4 lg:hidden">
                        <span class="hamburger-line transition duration-300 ease-in-out origin-top-left"></span>
                        <span class="hamburger-line transition duration-300 ease-in-out"></span>
                        <span class="hamburger-line transition duration-300 ease-in-out origin-bottom-left"></span>
                    </button>
                    <nav id="nav-menu"
                        class="hidden absolute py-3 bg-white rounded-lg shadow-lg max-w[250px] w-1/2 right-4 top-full lg:block lg:static lg:bg-transparent lg:w-full lg:shadow-none lg:rounded-none">
                        <ul class="block lg:flex">
                            <li class="group">
                                <a href="#home"
                                    class="lg:text-white text-dark text-base font-medium py-2 mx-6 group-hover:text-yellow-500 flex hover:hamburger-nav transition duration-200 hamburger-nav">Home</a>
                            </li>
                            <li class="group">
                                <a href="#about"
                                    class="lg:text-white text-dark text-base font-medium py-2 mx-6 group-hover:text-yellow-500 flex transition duration-200">Tentang</a>
                            </li>
                            <li class="group">
                                <a href="#layanan"
                                    class="lg:text-white text-dark text-base font-medium py-2 mx-6 group-hover:text-yellow-500 flex transition duration-200">Layanan</a>
                            </li>
                            <li class="group">
                                <a href="#berita"
                                    class="lg:text-white text-dark text-base font-medium py-2 mx-6 group-hover:text-yellow-500 flex transition duration-200">Berita</a>
                            </li>
                            <li class="group">
                                <a href="#tautan"
                                    class="lg:text-white text-dark text-base font-medium py-2 mx-6 group-hover:text-yellow-500 flex transition duration-200">Tautan</a>
                            </li>
                            <li class="group">
                                <a href="/login"
                                    class="text-white text-base font-medium mt-1 py-1 px-6 mx-6 lg:rounded-full rounded-lg bg-yellow-500 group-hover:bg-yellow-400 flex transition duration-200 max-w-min">Login</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <section class="relative px-6 pt-16 lg:px-8 mt-36">
        <div class="flex flex-wrap">
            <div class="w-full px-4 mb-10 lg:w-1/2">
                <div class="mx-auto max-w-2xl">
                    <div class="text-left">
                        <h1 class="text-3xl font-bold min-w-min tracking-tight text-white sm:text-4xl">Lembaga Penelitian Dan
                            Pengabdian
                            Pada Masyarakat</h1>
                        <p class="mt-6 text-lg leading-8 text-gray-300">
                            Mengembangkan motivasi dan kemampuan sumber daya manusia dalam melakukan penelitian dan
                            pengabdian
                            masyarakat secara profesional, inovatif dan bermutu berdasarkan kasih, kebenaran dan
                            keadilan.
                        </p>
                        <div class="mt-10 flex items-start justify-start gap-x-6">
                            <a href="#"
                                class="rounded-md bg-yellow-500 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-yellow-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Tentang
                                Kami</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full px-4 mb-10 lg:w-1/2">
                <div class="mx-auto max-w-2xl">
                    <img src="{{ asset('img/hero.jpg') }}" alt="Slide 2" class="rounded-lg">
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>
