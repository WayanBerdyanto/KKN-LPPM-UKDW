@section('title', 'Profile | Mahasiswa')
@extends('mahasiswa.layouts.main')
@section('content')
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        <div class="mx-auto max-w-242.5">
            <!-- Breadcrumb Start -->
            <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                <nav>
                    <ol class="flex items-center gap-2">
                        <li>
                            <a class="font-medium" href="/mahasiswa">Home /</a>
                        </li>
                        <li class="text-primary">Profile</li>
                    </ol>
                </nav>
            </div>
            <!-- Breadcrumb End -->

            <!-- ====== Profile Section Start -->
            <div
                class="overflow-hidden rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                <div class="relative z-20 h-35 md:h-65">
                    <img src="{{ asset('img/layanan/example1.jpg') }}" alt="profile cover"
                        class="h-40 w-full rounded-tl-sm rounded-tr-sm object-cover object-center" />
                    <div class="absolute bottom-1 right-1 z-10 xsm:bottom-4 xsm:right-4">
                        <label for="cover"
                            class="flex cursor-pointer items-center justify-center gap-2 rounded bg-primary px-2 py-1 text-sm font-medium text-white hover:bg-opacity-80 xsm:px-4">
                            <input type="file" name="cover" id="cover" class="sr-only" />
                            <span>
                                <svg class="fill-current" width="30" height="30" viewBox="0 0 14 14" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M4.76464 1.42638C4.87283 1.2641 5.05496 1.16663 5.25 1.16663H8.75C8.94504 1.16663 9.12717 1.2641 9.23536 1.42638L10.2289 2.91663H12.25C12.7141 2.91663 13.1592 3.101 13.4874 3.42919C13.8156 3.75738 14 4.2025 14 4.66663V11.0833C14 11.5474 13.8156 11.9925 13.4874 12.3207C13.1592 12.6489 12.7141 12.8333 12.25 12.8333H1.75C1.28587 12.8333 0.840752 12.6489 0.512563 12.3207C0.184375 11.9925 0 11.5474 0 11.0833V4.66663C0 4.2025 0.184374 3.75738 0.512563 3.42919C0.840752 3.101 1.28587 2.91663 1.75 2.91663H3.77114L4.76464 1.42638ZM5.56219 2.33329L4.5687 3.82353C4.46051 3.98582 4.27837 4.08329 4.08333 4.08329H1.75C1.59529 4.08329 1.44692 4.14475 1.33752 4.25415C1.22812 4.36354 1.16667 4.51192 1.16667 4.66663V11.0833C1.16667 11.238 1.22812 11.3864 1.33752 11.4958C1.44692 11.6052 1.59529 11.6666 1.75 11.6666H12.25C12.4047 11.6666 12.5531 11.6052 12.6625 11.4958C12.7719 11.3864 12.8333 11.238 12.8333 11.0833V4.66663C12.8333 4.51192 12.7719 4.36354 12.6625 4.25415C12.5531 4.14475 12.4047 4.08329 12.25 4.08329H9.91667C9.72163 4.08329 9.53949 3.98582 9.4313 3.82353L8.43781 2.33329H5.56219Z"
                                        fill="white" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M6.99992 5.83329C6.03342 5.83329 5.24992 6.61679 5.24992 7.58329C5.24992 8.54979 6.03342 9.33329 6.99992 9.33329C7.96642 9.33329 8.74992 8.54979 8.74992 7.58329C8.74992 6.61679 7.96642 5.83329 6.99992 5.83329ZM4.08325 7.58329C4.08325 5.97246 5.38909 4.66663 6.99992 4.66663C8.61075 4.66663 9.91659 5.97246 9.91659 7.58329C9.91659 9.19412 8.61075 10.5 6.99992 10.5C5.38909 10.5 4.08325 9.19412 4.08325 7.58329Z"
                                        fill="white" />
                                </svg>
                            </span>
                            <span>Edit</span>
                        </label>
                    </div>
                </div>
                <div class="px-4 pb-6 text-center lg:pb-8 xl:pb-11.5">
                    <div
                        class="relative z-30 mx-auto -mt-22 h-30 w-full max-w-30 rounded-full bg-white/20 p-1 backdrop-blur sm:h-44 sm:max-w-44 sm:p-3">
                        <div class="relative drop-shadow-2">
                            <img src="{{ asset('img/layanan/example3.jpg') }}" alt="profile"
                                class="rounded-full h-40 w-56" />
                            <label for="profile"
                                class="absolute bottom-0 right-0 flex h-8.5 w-8.5 cursor-pointer items-center justify-center rounded-full bg-primary text-white hover:bg-opacity-90 sm:bottom-2 sm:right-2">
                                <svg class="fill-current" width="30" height="30" viewBox="0 0 14 14" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M4.76464 1.42638C4.87283 1.2641 5.05496 1.16663 5.25 1.16663H8.75C8.94504 1.16663 9.12717 1.2641 9.23536 1.42638L10.2289 2.91663H12.25C12.7141 2.91663 13.1592 3.101 13.4874 3.42919C13.8156 3.75738 14 4.2025 14 4.66663V11.0833C14 11.5474 13.8156 11.9925 13.4874 12.3207C13.1592 12.6489 12.7141 12.8333 12.25 12.8333H1.75C1.28587 12.8333 0.840752 12.6489 0.512563 12.3207C0.184375 11.9925 0 11.5474 0 11.0833V4.66663C0 4.2025 0.184374 3.75738 0.512563 3.42919C0.840752 3.101 1.28587 2.91663 1.75 2.91663H3.77114L4.76464 1.42638ZM5.56219 2.33329L4.5687 3.82353C4.46051 3.98582 4.27837 4.08329 4.08333 4.08329H1.75C1.59529 4.08329 1.44692 4.14475 1.33752 4.25415C1.22812 4.36354 1.16667 4.51192 1.16667 4.66663V11.0833C1.16667 11.238 1.22812 11.3864 1.33752 11.4958C1.44692 11.6052 1.59529 11.6666 1.75 11.6666H12.25C12.4047 11.6666 12.5531 11.6052 12.6625 11.4958C12.7719 11.3864 12.8333 11.238 12.8333 11.0833V4.66663C12.8333 4.51192 12.7719 4.36354 12.6625 4.25415C12.5531 4.14475 12.4047 4.08329 12.25 4.08329H9.91667C9.72163 4.08329 9.53949 3.98582 9.4313 3.82353L8.43781 2.33329H5.56219Z"
                                        fill="" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M7.00004 5.83329C6.03354 5.83329 5.25004 6.61679 5.25004 7.58329C5.25004 8.54979 6.03354 9.33329 7.00004 9.33329C7.96654 9.33329 8.75004 8.54979 8.75004 7.58329C8.75004 6.61679 7.96654 5.83329 7.00004 5.83329ZM4.08337 7.58329C4.08337 5.97246 5.38921 4.66663 7.00004 4.66663C8.61087 4.66663 9.91671 5.97246 9.91671 7.58329C9.91671 9.19412 8.61087 10.5 7.00004 10.5C5.38921 10.5 4.08337 9.19412 4.08337 7.58329Z"
                                        fill="" />
                                </svg>
                                <input type="file" name="profile" id="profile" class="sr-only" />
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mx-auto max-w-screen-2xl mt-10">
                <div class="mx-auto max-w-270">
                    <!-- ====== Settings Section Start -->
                    <div class="grid grid-cols-2 gap-5">
                        <div class="col-span-5 xl:col-span-3">
                            <div
                                class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                                <div class="border-b border-stroke px-7 py-4 dark:border-strokedark">
                                    <h3 class="font-medium text-dark text-xl">
                                        Data Diri
                                    </h3>
                                </div>
                                <div class="p-7">
                                    <form action="#">
                                        <div class="mb-5.5 flex flex-col gap-5.5 sm:flex-row">
                                            <div class="w-full sm:w-1/2">
                                                <label class="mb-3 block text-sm font-medium text-dark "
                                                    for="fullName">Full Name</label>
                                                <div class="relative">
                                                    <span class="absolute left-4.5 top-4 ml-4">
                                                        <i class="fa-regular fa-user"></i>
                                                    </span>
                                                    <input
                                                        class="w-full rounded border border-stroke bg-gray py-3 pl-11.5 pr-4.5 font-medium text-dark focus:border-primary focus-visible:outline-none dark:border-strokedark dark:bg-meta-4  dark:focus:border-primary pl-10 mb-3"
                                                        type="text" name="fullName" id="fullName"
                                                        placeholder="Devid Jhon" value="Devid Jhon" />
                                                </div>
                                            </div>

                                            <div class="w-full sm:w-1/2">
                                                <label class="mb-3 block text-sm font-medium text-dark "
                                                    for="phoneNumber">Phone Number</label>
                                                <input
                                                    class="w-full rounded border border-stroke bg-gray px-4.5 py-3 font-medium text-dark focus:border-primary focus-visible:outline-none dark:border-strokedark dark:bg-meta-4  dark:focus:border-primary pl-4"
                                                    type="text" name="phoneNumber" id="phoneNumber"
                                                    placeholder="+990 3343 7865" value="+990 3343 7865" />
                                            </div>
                                        </div>

                                        <div class="mb-5.5">
                                            <label class="mb-3 block text-sm font-medium text-dark "
                                                for="emailAddress">Email Address</label>
                                            <div class="relative">
                                                <span class="absolute left-4.5 top-4">
                                                    <i class="fa-regular fa-envelope ml-4"></i>
                                                </span>
                                                <input
                                                    class="w-full rounded border border-stroke bg-gray py-3 pl-11.5 pr-4.5 font-medium text-dark focus:border-primary focus-visible:outline-none dark:border-strokedark dark:bg-meta-4  dark:focus:border-primary pl-10 mb-3"
                                                    type="email" name="emailAddress" id="emailAddress"
                                                    placeholder="devidjond45@gmail.com" value="devidjond45@gmail.com" />
                                            </div>
                                        </div>

                                        <div class="mb-5.5">
                                            <label class="mb-3 block text-sm font-medium text-dark "
                                                for="Username">Username</label>
                                            <input
                                                class="w-full rounded border border-stroke bg-gray px-4.5 py-3 font-medium text-dark focus:border-primary focus-visible:outline-none dark:border-strokedark dark:bg-meta-4  dark:focus:border-primary pl-4"
                                                type="text" name="Username" id="Username" placeholder="devidjhon24"
                                                value="devidjhon24" />
                                        </div>

                                        <div class="flex justify-end gap-10 mt-5">
                                            <button
                                                class="flex justify-center rounded border border-stroke px-6 py-2 font-medium text-dark hover:shadow-1 dark:border-strokedark "
                                                type="reset">
                                                Cancel
                                            </button>
                                            <button
                                                class="flex justify-center rounded bg-primary px-6 py-2 font-medium text-gray hover:bg-opacity-90 text-secondary"
                                                type="submit">
                                                Save
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ====== Settings Section End -->
                </div>
            </div>
            <!-- ====== Profile Section End -->
        </div>
    </div>
@endsection
