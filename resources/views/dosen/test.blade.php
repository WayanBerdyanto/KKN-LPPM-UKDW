<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard Dosen</title>

    @vite('resources/css/login.css')
    <link rel="stylesheet" href="{{ asset('fontawesome-free-6.5.1-web/css/all.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
</head>

<body class="min-h-screen flex items-center bg-gradient-to-br from-purple-200 to-indigo-400">
    <div class="max-w-3xl mx-auto px-8 sm:px-0">
      <div class="sm:w-7/12 sm:mx-auto">
        <div
          role="tablist"
          aria-label="tabs"
          class="relative w-max mx-auto h-12 grid grid-cols-3 items-center px-[3px] rounded-full bg-gray-900/20 overflow-hidden shadow-2xl shadow-900/20 transition"
        >
          <div class="absolute indicator h-11 my-auto top-0 bottom-0 left-0 rounded-full bg-white shadow-md"></div>
          <button
            role="tab"
            aria-selected="true"
            aria-controls="panel-1"
            id="tab-1"
            tabindex="0"
            class="relative block h-10 px-6 tab rounded-full"
          >
            <span class="text-gray-800">First Tab</span>
          </button>
          <button
            role="tab"
            aria-selected="false"
            aria-controls="panel-2"
            id="tab-2"
            tabindex="-1"
            class="relative block h-10 px-6 tab rounded-full"
          >
            <span class="text-gray-800">Second Tab</span>
          </button>
          <button
            role="tab"
            aria-selected="false"
            aria-controls="panel-3"
            id="tab-3"
            tabindex="-1"
            class="relative block h-10 px-6 tab rounded-full"
          >
            <span class="text-gray-800">Third Tab</span>
          </button>
        </div>

        <div class="mt-6 relative rounded-3xl bg-purple-50">
          <div
            role="tabpanel"
            id="panel-1"
            class="tab-panel p-6 transition duration-300"
          >
            <h2 class="text-xl font-semibold text-gray-800">First tab panel</h2>
            <p class="mt-4 text-gray-600">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quas dolores voluptate temporibus, atque ab eos, delectus at ad hic voluptatem veritatis iure, nulla voluptates quod nobis doloremque eaque! Perferendis, soluta.</p>
          </div>
          <div
            role="tabpanel"
            id="panel-2"
            class="absolute top-0 invisible opacity-0 tab-panel p-6 transition duration-300"
          >
            <h2 class="text-xl font-semibold text-gray-800">Second tab panel</h2>
            <p class="mt-4 text-gray-600">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quas dolores voluptate temporibus, atque ab eos, delectus at ad hic voluptatem veritatis iure, nulla voluptates quod nobis doloremque eaque! Perferendis, soluta.</p>
          </div>
          <div
            role="tabpanel"
            id="panel-3"
            class="absolute top-0 invisible opacity-0 tab-panel p-6 transition duration-300"
          >
            <h2 class="text-xl font-semibold text-gray-800">Third tab panel</h2>
            <p class="mt-4 text-gray-600">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quas dolores voluptate temporibus, atque ab eos, delectus at ad hic voluptatem veritatis iure, nulla voluptates quod nobis doloremque eaque! Perferendis, soluta.</p>
          </div>
        </div>
      </div>
    </div>

    <script type="module" src="{{asset('js/test.js')}}"></script>
  </body>

</html>
