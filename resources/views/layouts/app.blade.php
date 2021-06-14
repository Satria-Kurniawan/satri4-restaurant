{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@stack('pagetitle')</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
        <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js" data-turbolinks-eval="false" data-turbo-eval="false"></script>
    </body>
</html> --}}

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@stack('pagetitle')</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        {{-- bootsrap --}}
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <!-- MDB -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.5.0/mdb.min.css" rel="stylesheet"/>

        <style>
            @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');
            .font-family-karla { font-family: karla; }
            /* .bg-sidebar { background: rgb(196, 76, 243); } */
            .cta-btn { color: #3d68ff; }
            .upgrade-btn { background: #1947ee; }
            .upgrade-btn:hover { background: #0038fd; }
            .active-nav-link { background: rgb(0, 174, 255); }
            .nav-item:hover { background: #029aff; }
            .account-link:hover { background: #3d68ff; }
        </style>

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="bg-gray-100 font-family-karla flex">

        @if (Route::has('login'))
            @auth
                @if (Auth::user()->role == 'user')
                    <div class="w-full overflow-x-hidden border-t flex flex-col">
                        <!-- Desktop Header -->
                        <header class="w-full items-center py-2 px-6 hidden sm:flex bg-gradient-to-r from-purple-900 via-purple-400 to-pink-400">
                            <div class="w-1/2"></div>
                            <div x-data="{ isOpen: false }" class="relative w-1/2 flex justify-end">
                                @livewire('navigation-menu')
                            </div>
                        </header>
                        <div class="w-full overflow-x-hidden border-t flex flex-col">
                            <main class="w-full flex-grow p-6">
                                {{ $slot }}
                            </main>
                            {{-- <footer class="footer py-3 bg-gradient-to-r from-purple-900 via-purple-400 to-pink-400 text-light">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="sosial col-12 text-right">
                                            <a href="https://www.instagram.com/saatryaaa__/"><i class="fab fa-instagram mr-3"></i></a>
                                            <a href="https://www.facebook.com/satria.kurniawan.3726"><i class="fab fa-facebook mr-3"></i></a>
                                            <a href="#"><i class="fab fa-twitter mr-3"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </footer> --}}
                            <footer class="bg-white">
                                <div class="container mx-auto px-8">
                                  <div class="w-full flex flex-col md:flex-row py-6">
                                    <div class="flex-1 mb-6 text-black">
                                      <a class="text-pink-600 no-underline hover:no-underline font-bold text-2xl lg:text-4xl" href="#">
                                        {{-- <!--Icon from: http://www.potlabicons.com/ -->
                                        <svg class="h-8 fill-current inline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512.005 512.005">
                                          <rect fill="#2a2a31" x="16.539" y="425.626" width="479.767" height="50.502" transform="matrix(1,0,0,1,0,0)" />
                                          <path
                                            class="plane-take-off"
                                            d=" M 510.7 189.151 C 505.271 168.95 484.565 156.956 464.365 162.385 L 330.156 198.367 L 155.924 35.878 L 107.19 49.008 L 211.729 230.183 L 86.232 263.767 L 36.614 224.754 L 0 234.603 L 45.957 314.27 L 65.274 347.727 L 105.802 336.869 L 240.011 300.886 L 349.726 271.469 L 483.935 235.486 C 504.134 230.057 516.129 209.352 510.7 189.151 Z "
                                          />
                                        </svg>
                                        LANDING --}}
                                        <div class="fas fa-utensils mr-3"></div>
                                        YAA RESTAURANT
                                      </a>
                                    </div>
                                    <div class="flex-1">
                                      <p class="uppercase text-gray-500 md:mb-6">Customer Support</p>
                                      <ul class="list-reset mb-6">
                                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                                          <a href="#" class="no-underline hover:underline text-gray-800 hover:text-pink-500">FAQ</a>
                                        </li>
                                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                                          <a href="#" class="no-underline hover:underline text-gray-800 hover:text-pink-500">Help</a>
                                        </li>
                                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                                          <a href="#" class="no-underline hover:underline text-gray-800 hover:text-pink-500">Support</a>
                                        </li>
                                      </ul>
                                    </div>
                                    <div class="flex-1">
                                      <p class="uppercase text-gray-500 md:mb-6">Legal</p>
                                      <ul class="list-reset mb-6">
                                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                                          <a href="#" class="no-underline hover:underline text-gray-800 hover:text-pink-500">Terms</a>
                                        </li>
                                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                                          <a href="#" class="no-underline hover:underline text-gray-800 hover:text-pink-500">Privacy</a>
                                        </li>
                                      </ul>
                                    </div>
                                    <div class="flex-1">
                                      <p class="uppercase text-gray-500 md:mb-6">Social</p>
                                      <ul class="list-reset mb-6">
                                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                                          <div class="sosial col-12 text-blue-700">
                                              <a href="https://www.instagram.com/saatryaaa__/"><i class="fab fa-instagram mr-3 hover:text-pink-500 fa-3x"></i></a>
                                              <a href="https://www.facebook.com/satria.kurniawan.3726"><i class="fab fa-facebook mr-3 hover:text-pink-500 fa-3x"></i></a>
                                              <a href="#"><i class="fab fa-twitter mr-3 hover:text-pink-500 fa-3x"></i></a>
                                          </div>
                                        </li>
                                        {{-- <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                                          <a href="#" class="no-underline hover:underline text-gray-800 hover:text-pink-500">Linkedin</a>
                                        </li>
                                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                                          <a href="#" class="no-underline hover:underline text-gray-800 hover:text-pink-500">Twitter</a>
                                        </li> --}}
                                      </ul>
                                    </div>
                                    <div class="flex-1">
                                      <p class="uppercase text-gray-500 md:mb-6">Company</p>
                                      <ul class="list-reset mb-6">
                                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                                          <a href="#" class="no-underline hover:underline text-gray-800 hover:text-pink-500">Official Blog</a>
                                        </li>
                                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                                          <a href="#" class="no-underline hover:underline text-gray-800 hover:text-pink-500">About Us</a>
                                        </li>
                                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                                          <a href="#" class="no-underline hover:underline text-gray-800 hover:text-pink-500">Contact</a>
                                        </li>
                                      </ul>
                                    </div>
                                  </div>
                                </div>
                              </footer>
                        </div>
                    </div>
                @else
                <aside class="relative bg-gradient-to-r from-purple-900 via-purple-400 to-pink-400 h-screen w-64 hidden sm:block shadow-xl">
                    {{-- <div class="p-6">
                        <a href="index.html" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">S4tria</a>
                        <button class="w-full bg-white cta-btn font-semibold py-2 mt-5 rounded-br-lg rounded-bl-lg rounded-tr-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
                            <i class="fas fa-plus mr-3"></i> New Report
                        </button>
                    </div> --}}
                    <div class="w-44">
                        <img src="img/YaaRestaurant.png" alt="Logo Yaa Restaurant">
                    </div>
                    <nav class="text-white text-base font-semibold pt-3">
                        @if (Route::has('login'))
                        @auth
                            @if (Auth::user()->role == 'user')
                                <a href="{{ route('home') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                                    <i class="fas fa-home mr-3"></i>
                                    {{ __('Home') }}
                                </a>
                                <a href="{{ route('dashboard') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                                    <i class="fas fa-tachometer-alt mr-3"></i>
                                    {{ __('Dashboard') }}
                                </a>
                                <a href="{{ route('cart') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                                    <i class="fas fa-tachometer-alt mr-3"></i>
                                    {{ __('Order') }}
                                </a>
                            @else
                                <a href="{{ route('home') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                                    <i class="fas fa-home mr-3"></i>
                                    {{ __('Home') }}
                                </a>
                                <a href="{{ route('dashboard') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                                    <i class="fas fa-tachometer-alt mr-3"></i>
                                    {{ __('Dashboard') }}
                                </a>
                                <a href="{{ route('cart') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                                    <i class="fas fa-utensils mr-3"></i>
                                    {{ __('Order') }}
                                </a>
                                <a href="{{ route('categories') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                                    <i class="fas fa-table mr-3"></i>
                                    {{ __('Categories') }}
                                </a>
                                <a href="{{ route('products') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                                    <i class="fas fa-table mr-3"></i>
                                    {{ __('Products') }}
                                </a>
                                <a href="{{ route('productstransactions') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                                    <i class="fas fa-table mr-3"></i>
                                    {{ __('ProdTransacts') }}
                                </a>
                                <a href="{{ route('transactions') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                                    <i class="fas fa-table mr-3"></i>
                                    {{ __('Transactions') }}
                                </a>
                            @endif
                            @endauth
                        @endif
                    </nav>
                </aside>

                <div class="w-full flex flex-col h-screen overflow-y-hidden">
                    <!-- Desktop Header -->
                    <header class="w-full items-center bg-white py-2 px-6 hidden sm:flex">
                        <div class="w-1/2"></div>
                        <div x-data="{ isOpen: false }" class="relative w-1/2 flex justify-end">
                            @livewire('navigation-menu')
                        </div>
                    </header>

                    <!-- Mobile Header & Nav -->
                    <header x-data="{ isOpen: false }" class="w-full bg-sidebar py-5 px-6 sm:hidden bg-gradient-to-r from-purple-900 via-purple-400 to-pink-400">
                        <div class="flex items-center justify-between">
                            <a href="index.html" class="text-black text-3xl font-semibold uppercase hover:text-gray-300">Satri4</a>
                            <button @click="isOpen = !isOpen" class="text-white text-3xl focus:outline-none">
                                <i x-show="!isOpen" class="fas fa-bars"></i>
                                <i x-show="isOpen" class="fas fa-times"></i>
                            </button>
                        </div>

                        <!-- Dropdown Nav -->
                        <nav :class="isOpen ? 'flex': 'hidden'" class="flex flex-col pt-4">
                            @if (Route::has('login'))
                            @auth
                                @if (Auth::user()->role == 'user')
                                    <a href="{{ route('home') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                                        <i class="fas fa-home mr-3"></i>
                                        {{ __('Home') }}
                                    </a>
                                    <a href="{{ route('dashboard') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                                        <i class="fas fa-tachometer-alt mr-3"></i>
                                        {{ __('Dashboard') }}
                                    </a>
                                    <a href="{{ route('cart') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                                        <i class="fas fa-utensils mr-3"></i>
                                        {{ __('Order') }}
                                    </a>
                                @else
                                    <a href="{{ route('home') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                                        <i class="fas fa-home mr-3"></i>
                                        {{ __('Home') }}
                                    </a>
                                    <a href="{{ route('dashboard') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                                        <i class="fas fa-tachometer-alt mr-3"></i>
                                        {{ __('Dashboard') }}
                                    </a>
                                    <a href="{{ route('cart') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                                        <i class="fas fa-utensils mr-3"></i>
                                        {{ __('Order') }}
                                    </a>
                                    <a href="{{ route('categories') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                                        <i class="fas fa-table mr-3"></i>
                                        {{ __('Categories') }}
                                    </a>
                                    <a href="{{ route('products') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                                        <i class="fas fa-table mr-3"></i>
                                        {{ __('Products') }}
                                    </a>
                                    <a href="{{ route('productstransactions') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                                        <i class="fas fa-table mr-3"></i>
                                        {{ __('ProdTransacts') }}
                                    </a>
                                    <a href="{{ route('transactions') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                                        <i class="fas fa-table mr-3"></i>
                                        {{ __('Transactions') }}
                                    </a>
                                @endif
                                @endauth
                            @endif
                        </nav>
                        <!-- <button class="w-full bg-white cta-btn font-semibold py-2 mt-5 rounded-br-lg rounded-bl-lg rounded-tr-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
                            <i class="fas fa-plus mr-3"></i> New Report
                        </button> -->
                    </header>

                    <div class="w-full overflow-x-hidden border-t flex flex-col">
                        <main class="w-full flex-grow p-6">
                            {{ $slot }}
                        </main>

                        {{-- <footer class="footer py-3 bg-white text-blue-700">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="sosial col-12 text-right">
                                        <a href="https://www.instagram.com/saatryaaa__/"><i class="fab fa-instagram mr-3 hover:text-pink-500"></i></a>
                                        <a href="https://www.facebook.com/satria.kurniawan.3726"><i class="fab fa-facebook mr-3 hover:text-pink-500"></i></a>
                                        <a href="#"><i class="fab fa-twitter mr-3 hover:text-pink-500"></i></a>
                                    </div>
                                </div>
                            </div>
                        </footer> --}}
                        <footer class="bg-white">
                            <div class="container mx-auto px-8">
                              <div class="w-full flex flex-col md:flex-row py-6">
                                <div class="flex-1 mb-6 text-black mr-9">
                                  <a class="text-pink-600 no-underline hover:no-underline font-bold text-2xl lg:text-4xl" href="#">
                                    {{-- <!--Icon from: http://www.potlabicons.com/ -->
                                    <svg class="h-8 fill-current inline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512.005 512.005">
                                      <rect fill="#2a2a31" x="16.539" y="425.626" width="479.767" height="50.502" transform="matrix(1,0,0,1,0,0)" />
                                      <path
                                        class="plane-take-off"
                                        d=" M 510.7 189.151 C 505.271 168.95 484.565 156.956 464.365 162.385 L 330.156 198.367 L 155.924 35.878 L 107.19 49.008 L 211.729 230.183 L 86.232 263.767 L 36.614 224.754 L 0 234.603 L 45.957 314.27 L 65.274 347.727 L 105.802 336.869 L 240.011 300.886 L 349.726 271.469 L 483.935 235.486 C 504.134 230.057 516.129 209.352 510.7 189.151 Z "
                                      />
                                    </svg>
                                    LANDING --}}
                                    <div class="fas fa-utensils mr-3"></div>
                                    YAA RESTAURANT
                                  </a>
                                </div>
                                <div class="flex-1">
                                  <p class="uppercase text-gray-500 md:mb-6">Customer Support</p>
                                  <ul class="list-reset mb-6">
                                    <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                                      <a href="#" class="no-underline hover:underline text-gray-800 hover:text-pink-500">FAQ</a>
                                    </li>
                                    <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                                      <a href="#" class="no-underline hover:underline text-gray-800 hover:text-pink-500">Help</a>
                                    </li>
                                    <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                                      <a href="#" class="no-underline hover:underline text-gray-800 hover:text-pink-500">Support</a>
                                    </li>
                                  </ul>
                                </div>
                                <div class="flex-1">
                                  <p class="uppercase text-gray-500 md:mb-6">Legal</p>
                                  <ul class="list-reset mb-6">
                                    <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                                      <a href="#" class="no-underline hover:underline text-gray-800 hover:text-pink-500">Terms</a>
                                    </li>
                                    <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                                      <a href="#" class="no-underline hover:underline text-gray-800 hover:text-pink-500">Privacy</a>
                                    </li>
                                  </ul>
                                </div>
                                <div class="flex-1">
                                  <p class="uppercase text-gray-500 md:mb-6">Social</p>
                                  <ul class="list-reset mb-6">
                                    <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                                      <div class="sosial col-12 text-blue-700">
                                          <a href="https://www.instagram.com/saatryaaa__/"><i class="fab fa-instagram mr-3 hover:text-pink-500 fa-3x"></i></a>
                                          <a href="https://www.facebook.com/satria.kurniawan.3726"><i class="fab fa-facebook mr-3 hover:text-pink-500 fa-3x"></i></a>
                                          <a href="#"><i class="fab fa-twitter mr-3 hover:text-pink-500 fa-3x"></i></a>
                                      </div>
                                    </li>
                                    {{-- <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                                      <a href="#" class="no-underline hover:underline text-gray-800 hover:text-pink-500">Linkedin</a>
                                    </li>
                                    <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                                      <a href="#" class="no-underline hover:underline text-gray-800 hover:text-pink-500">Twitter</a>
                                    </li> --}}
                                  </ul>
                                </div>
                                <div class="flex-1">
                                  <p class="uppercase text-gray-500 md:mb-6">Company</p>
                                  <ul class="list-reset mb-6">
                                    <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                                      <a href="#" class="no-underline hover:underline text-gray-800 hover:text-pink-500">Official Blog</a>
                                    </li>
                                    <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                                      <a href="#" class="no-underline hover:underline text-gray-800 hover:text-pink-500">About Us</a>
                                    </li>
                                    <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                                      <a href="#" class="no-underline hover:underline text-gray-800 hover:text-pink-500">Contact</a>
                                    </li>
                                  </ul>
                                </div>
                              </div>
                            </div>
                          </footer>
                    </div>

                </div>
                @endif
            @endauth
        @endif



        <!-- AlpineJS -->
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
        <!-- Font Awesome -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
        <!-- ChartJS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>

        <script>
            var chartOne = document.getElementById('chartOne');
            var myChart = new Chart(chartOne, {
                type: 'bar',
                data: {
                    labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                    datasets: [{
                        label: '# of Votes',
                        data: [12, 19, 3, 5, 2, 3],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
            var chartTwo = document.getElementById('chartTwo');
            var myLineChart = new Chart(chartTwo, {
                type: 'line',
                data: {
                    labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                    datasets: [{
                        label: '# of Votes',
                        data: [12, 19, 3, 5, 2, 3],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        </script>

        @stack('modals')

        @livewireScripts

        <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js" data-turbolinks-eval="false" data-turbo-eval="false"></script>

        @stack('script-custom')

    </body>
</html>
