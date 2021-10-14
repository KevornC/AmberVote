<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">


    <!-- new link added -->
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">

    <!-- new link added -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{-- Font awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body class="h-screen font-sans antialiased leading-none bg-blue-600">
    @include('sweetalert::alert')

    @if (\Request::is('dashboard/*') || Request::is('dashboard'))
        @include('layouts.dashboard')
    @else
    <div id="app">
        <header class="py-8 bg-blue-600">
            <div class="container flex items-center justify-between mx-auto">
                <nav id="header" class="fixed top-0 z-30 w-full text-white">
                    <div class="container flex flex-wrap items-center justify-between w-full py-2 mx-auto mt-0">
                      <div class="flex items-center pl-4">
                        <a class="text-2xl font-bold text-white no-underline toggleColour hover:no-underline lg:text-4xl" href="/">
                          <!--Icon from: http://www.potlabicons.com/ -->
                          {{-- <svg class="inline h-8 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512.005 512.005">
                            <rect fill="#2a2a31" x="16.539" y="425.626" width="479.767" height="50.502" transform="matrix(1,0,0,1,0,0)" />
                            <path
                              class="plane-take-off"
                              d=" M 510.7 189.151 C 505.271 168.95 484.565 156.956 464.365 162.385 L 330.156 198.367 L 155.924 35.878 L 107.19 49.008 L 211.729 230.183 L 86.232 263.767 L 36.614 224.754 L 0 234.603 L 45.957 314.27 L 65.274 347.727 L 105.802 336.869 L 240.011 300.886 L 349.726 271.469 L 483.935 235.486 C 504.134 230.057 516.129 209.352 510.7 189.151 Z "
                            />
                          </svg> --}}
                          <img src="/ambervotelogo.png" width="200px;">
                          {{-- AmberVote --}}
                        </a>
                      </div>
                      <div class="block pr-4 lg:hidden">
                        <button id="nav-toggle" class="flex items-center p-1 text-pink-800 transition duration-300 ease-in-out transform hover:text-gray-900 focus:outline-none focus:shadow-outline hover:scale-105">
                          <svg class="w-6 h-6 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <title>Menu</title>
                            <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                          </svg>
                        </button>
                      </div>
                      <div class="z-20 flex-grow hidden w-full p-4 mt-2 text-black bg-white lg:flex lg:items-center lg:w-auto lg:mt-0 lg:bg-transparent lg:p-0" id="nav-content">
                        <ul class="items-center justify-end flex-1 list-reset lg:flex">
                          {{-- <li class="mr-3">
                            <a class="inline-block px-4 py-2 font-bold text-black no-underline" href="#">Active</a>
                          </li>
                          <li class="mr-3">
                            <a class="inline-block px-4 py-2 text-black no-underline hover:text-gray-800 hover:text-underline" href="#">link</a>
                          </li>
                          <li class="mr-3">
                            <a class="inline-block px-4 py-2 text-black no-underline hover:text-gray-800 hover:text-underline" href="#">link</a>
                          </li> --}}
                        </ul>
                        @guest
                        <a href="{{ route('login') }}"><button
                          id="navAction"
                          class="px-8 py-4 mx-auto mt-4 font-bold text-gray-800 transition duration-300 ease-in-out transform bg-white rounded-full shadow outline-none opacity-75 lg:mx-0 hover:underline lg:mt-0 focus:outline-none focus:shadow-outline hover:scale-105"
                        >
                          Login
                        </button>
                      </a>
                      {{-- </div> --}}
                      @if(Route::has('register'))
                        <a href="{{ route('register') }}"><button
                          id="navAction"
                          class="px-8 py-4 mx-auto mt-4 font-bold text-gray-800 transition duration-300 ease-in-out transform bg-white rounded-full shadow opacity-75 lg:mx-0 hover:underline lg:mt-0 focus:outline-none focus:shadow-outline hover:scale-105"
                        >
                          Register
                        </button></a>
                      @endif
                      @else
                        <span>{{ Auth::user()->name }}</span>
              
                        <a href="{{ route('logout') }}"
                           class="no-underline hover:underline"
                           onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"><button id="navAction"
                          class="px-8 py-4 mx-auto mt-4 font-bold text-gray-800 transition duration-300 ease-in-out transform bg-white rounded-full shadow opacity-75 lg:mx-0 hover:underline lg:mt-0 focus:outline-none focus:shadow-outline hover:scale-105"
                       >{{ __('Logout') }}</button></a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            {{ csrf_field() }}
                        </form>

                    @endguest
                      </div>
                    </div>
                    <hr class="py-0 my-0 border-b border-gray-100 opacity-25" />
                  </nav>
            </div>
        </header>

        @yield('content')
    </div>
    @endif
</body>
</html>
