<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Login</title>

    @vite('resources/css/login.css')
    <link rel="stylesheet" href="{{ asset('fontawesome-free-6.5.1-web/css/all.css') }}">
</head>

<body>
    <div class="px-1 relative lg:h-screen lg:px-4 lg:py-4 lg:rounded-lg">
        <div class="flex flex-wrap lg:shadow-2xl px-2">
            <div class="w-full lg:w-1/2">
                <div class="my-4 md:h-3/5 lg:my-0 lg:h-screen">
                    <img src="{{ asset('img/content-login.png') }}" class="w-[100%] lg:h-[98%] lg:object-cover">
                </div>
            </div>
            <div class="w-full lg:w-1/2 flex flex-col justify-center">
                <form class="lg:mx-auto md:max-w-full md:px-14 lg:w-3/4 px-2">
                    <h1 class="text-center font-semibold text-gray-900 text-2xl lg:text-4xl">Sign In</h1>
                    <div class="mb-5">
                        <label for="email"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-dark lg:text-lg">NIM</label>
                        <input type="email" id="email"
                            class="lg:py-2 lg:text-lg bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 focus:ring focus:ring-blue-500 focus:outline-none duration-500"
                            placeholder="NIM" required />
                    </div>
                    <div class="mb-5">
                        <label for="password"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-dark lg:text-lg">
                            Password</label>
                        <div class="bg-gray-50 border border-gray-300  w-full rounded-lg flex items-center duration-500 focus-within:ring focus-within:ring-blue-500">
                            <input type="password" id="password"
                                class="lg:text-lg lg:py-2 text-gray-900 text-sm rounded-lg block w-full p-2.5 outline-none border-none bg-gray-50"
                                placeholder="**********" required />
                            <i id="iconsPassword" class="fa-regular fa-eye mx-2"></i>
                        </div>
                    </div>
                    <button type="submit"
                        class="lg:py-2 md:w-full lg:text-lg text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                </form>
                <a href="/" class="lg:text-xl text-center mt-4 text-blue-500">Back to Home</a>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/password.js') }}"></script>
</body>

</html>
