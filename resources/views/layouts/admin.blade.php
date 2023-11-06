<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fontawesome 6 cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- Flowbite --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.css" rel="stylesheet" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Usando Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    {{-- PAGE HEADING --}}
    <header class="w-full py-10 bg-gray-700 z-50 sticky top-0">
        <div class="mx-[50px] flex items-center justify-between">
            {{-- Left Side --}}
            <a class="text-3xl text-white" href="/">My Beauty Shop</a>

            {{-- Right Side --}}
            <ul class="flex">
                @guest
                    <li>
                        <a href="{{ route('login') }}"
                            class="block px-4 py-2 text-2xl hover:text-white dark:hover:bg-gray-600 dark:hover:text-white">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li>
                            <a href="{{ route('register') }}"
                                class="block px-4 py-2 text-2xl hover:text-white dark:hover:bg-gray-600 dark:hover:text-white">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <button id="dropdownInformationButton" data-dropdown-toggle="dropdownInformation"
                        class="text-white text-2xl bg-slate-700 hover:bg-slate-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        type="button">Menu <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>

                    <!-- Dropdown menu -->
                    <div id="dropdownInformation"
                        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                        <div class="px-4 py-3 text-gray-900 dark:text-white">
                            <div>
                                <span class="font-bold">{{ Auth::user()->name }}</span>
                            </div>
                        </div>

                        <div class="py-2">
                            <a href="{{ route('logout') }}"
                                class="block px-4 py-2 text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                @csrf
                            </form>
                        </div>
                    </div>

                @endguest
            </ul>
        </div>
    </header>
    {{-- / PAGE HEADING --}}

    {{-- MAIN  --}}
    <main class="h-screen bg-blue-300 flex">

        <!-- Sidenav -->
        <aside id="default-sidebar" class="w-1/6 transition-transform -translate-x-full sm:translate-x-0"
            aria-label="Sidebar">
            <div class="h-full px-9 py-4 overflow-y-auto bg-gray-800 dark:bg-gray-800">
                <ul class="space-y-2 font-medium">
                    <li>
                        <a href="{{ route('admin.dashboard') }}"
                            class="flex items-center p-2 text-gray-50 rounded-lg dark:text-white hover:bg-gray-500 dark:hover:bg-gray-700 group">
                            <svg class="w-5 h-5 text-gray-50 transition duration-75 dark:text-gray-400 group-hover:text-gray-50 dark:group-hover:text-gray-900"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 22 21">
                                <path
                                    d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                                <path
                                    d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                            </svg>
                            <span class="ml-3">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <button type="button"
                            class="flex items-center w-full p-2 text-base text-gray-50 transition duration-75 rounded-lg group hover:bg-gray-500 dark:text-white dark:hover:bg-gray-700"
                            aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                            <svg class="flex-shrink-0 w-5 h-5 text-gray-50 transition duration-75 dark:text-gray-400 group-hover:text-gray-50 dark:group-hover:text-white"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 18 20">
                                <path
                                    d="M17 5.923A1 1 0 0 0 16 5h-3V4a4 4 0 1 0-8 0v1H2a1 1 0 0 0-1 .923L.086 17.846A2 2 0 0 0 2.08 20h13.84a2 2 0 0 0 1.994-2.153L17 5.923ZM7 9a1 1 0 0 1-2 0V7h2v2Zm0-5a2 2 0 1 1 4 0v1H7V4Zm6 5a1 1 0 1 1-2 0V7h2v2Z" />
                            </svg>
                            <span class="flex-1 ml-3 text-left whitespace-nowrap">My Products</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                        </button>
                        <ul id="dropdown-example" class="hidden py-2 space-y-2">
                            <li>
                                <a href="{{ route('admin.perfumes.index') }}"
                                    class="flex items-center w-full p-2 text-gray-50 transition duration-75 rounded-lg pl-11 group hover:bg-gray-500 dark:text-white dark:hover:bg-gray-700">Perfumes</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="flex items-center w-full p-2 text-gray-50 transition duration-75 rounded-lg pl-11 group hover:bg-gray-500 dark:text-white dark:hover:bg-gray-700">Others</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center p-2 text-gray-50 rounded-lg dark:text-white hover:bg-gray-500 dark:hover:bg-gray-700 group">
                            <svg class="flex-shrink-0 w-5 h-5 text-gray-50 transition duration-75 group-hover:text-gray-50 dark:text-gray-400 dark:group-hover:text-white"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 18 21">
                                <path
                                    d="M15 12a1 1 0 0 0 .962-.726l2-7A1 1 0 0 0 17 3H3.77L3.175.745A1 1 0 0 0 2.208 0H1a1 1 0 0 0 0 2h.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 9 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3H6.78l-.5-2H15Z" />
                            </svg>
                            <span class="flex-1 ml-3 whitespace-nowrap">Orders</span>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center p-2 text-gray-50 rounded-lg dark:text-white hover:bg-gray-500 dark:hover:bg-gray-700 group">
                            <svg class="flex-shrink-0 w-5 h-5 text-gray-50 transition duration-75 dark:text-gray-400 group-hover:text-gray-50 dark:group-hover:text-white"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path
                                    d="m17.418 3.623-.018-.008a6.713 6.713 0 0 0-2.4-.569V2h1a1 1 0 1 0 0-2h-2a1 1 0 0 0-1 1v2H9.89A6.977 6.977 0 0 1 12 8v5h-2V8A5 5 0 1 0 0 8v6a1 1 0 0 0 1 1h8v4a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-4h6a1 1 0 0 0 1-1V8a5 5 0 0 0-2.582-4.377ZM6 12H4a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="flex-1 ml-3 whitespace-nowrap">Inbox</span>
                            <span
                                class="inline-flex items-center justify-center w-3 h-3 p-3 ml-3 text-sm font-medium text-blue-800 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300">3</span>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>

        <!-- / Sidenav -->

        {{-- Main Content --}}
        <div class="w-5/6 p-10">
            @yield('content')
        </div>
    </main>
    <script type="text/javascript" src="../node_modules/tw-elements/dist/js/tw-elements.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>

</body>

</html>
