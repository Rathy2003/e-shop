<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ESHOP | Modern Fashion</title>
    <link rel="icon" href="{{asset('images/logo_white.svg')}}" type="image/svg" />

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide-vue-next"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />

    {{--  FontAwesome CDN  --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('css/global.css')}}">
    <style>
        /* Custom styles to complement Tailwind */
        body {
            font-family: 'Inter', sans-serif;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            background-color: #ffffff; /* White background */
        }
        /* Simple transition for page changes */
        .fade-enter-active, .fade-leave-active {
            transition: opacity 0.3s ease;
        }
        .fade-enter-from, .fade-leave-to {
            opacity: 0;
        }
        /* Style for the active navigation link */
        .nav-link-active {
            color: #000000; /* Black */
            font-weight: 700; /* Bolder */
            border-bottom: 2px solid #000000; /* Black underline */
        }
        .thumbnail-active {
            outline: 2px solid #000000;
            outline-offset: 2px;
        }

        #profile-wrapper{
            & #menu-wrapper{
                display: none;
            }
        }

        #profile-wrapper:has(input[type=checkbox]:checked){
            & #menu-wrapper{
                display: block;
            }
        }


        /* Fade for overlay */
        .fade-enter-active, .fade-leave-active {
            transition: opacity 0.3s ease;
        }
        .fade-enter-from, .fade-leave-to {
            opacity: 0;
        }

        .slide-enter-active, .slide-leave-active {
            transition: transform 0.3s ease;
        }
        .slide-enter-from, .slide-leave-to {
            transform: translateX(-100%);
        }

    </style>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    @yield("style")
</head>
<body class="bg-white">
    <!-- Header Section -->
    <header class="bg-white/80 backdrop-blur-lg sticky top-0 z-40 border-b border-gray-200" id="nav-app">

        {{-- Start Backgound Overlay --}}
        <transition name="fade">
            <div v-show="isMenuOpen" @click="isMenuOpen = !isMenuOpen"
                 class="fixed inset-0 bg-black/50 z-40 h-[100dvh]"
                 x-transition.opacity
                 style="display: none;">
            </div>
        </transition>

        {{-- End Background Overlay --}}

        <!-- Slide-In Menu -->
        <transition name="slide">
            <div
                v-if="isMenuOpen"
                class="fixed top-0 left-0 h-[100dvh] w-64 bg-white shadow-lg z-50 p-6 space-y-4"
            >
                <button @click="isMenuOpen = !isMenuOpen" class="text-right w-full text-xl text-gray-600">
                    ✕
                </button>
                <div class="flex flex-col gap-3">
                    <a href="{{ route('client.index') }}" class="min-w-fit transition-colors text-2xl {{Request::is('/') ? 'nav-link-active' : ''}}">Home</a>
                    <a href="{{ route('client.shop') }}" class="min-w-fit text-gray-600 text-2xl hover:text-black transition-colors {{Request::is('shop') ? 'nav-link-active' : ''}}">Shop</a>
                    <a href="{{ route('client.order') }}" class="min-w-fit text-gray-600 text-2xl hover:text-black transition-colors {{Request::is('order') ? 'nav-link-active' : ''}}">Orders</a>
                    <a href="{{ route('client.about') }}" class="min-w-fit text-gray-600 text-2xl hover:text-black transition-colors {{Request::is('about') ? 'nav-link-active' : ''}}">About Us</a>
                    <a href="{{ route('client.contact') }}" class="min-w-fit text-gray-600 text-2xl hover:text-black transition-colors {{Request::is('contact') ? 'nav-link-active' : ''}}">Contact</a>
                </div>

            </div>
        </transition>


        <nav class="container mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Desktop Header -->
            <div class="hidden lg:flex items-center justify-between h-16">
                <a href="/"  class="flex-shrink-0 flex items-center space-x-2">
                    <svg class="h-8 w-8 text-black" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z"/><path d="M3 6h18"/><path d="M16 10a4 4 0 0 1-8 0"/></svg>
                    <span class="text-2xl font-bold text-black">ESHOP</span>
                </a>
                <div class="flex items-center space-x-8 mx-auto">
                    <a href="{{ route('client.index') }}" class="min-w-fit transition-colors py-3 {{Request::is('/') ? 'nav-link-active' : ''}}">Home</a>
                    <a href="{{ route('client.shop') }}" class="min-w-fit text-gray-600 hover:text-black transition-colors py-3 {{Request::is('shop') ? 'nav-link-active' : ''}}">Shop</a>
                    <a href="{{ route('client.order') }}" class="min-w-fit text-gray-600 hover:text-black transition-colors py-3 {{Request::is('order') ? 'nav-link-active' : ''}}">Orders</a>
                    <a href="{{ route('client.about') }}" class="min-w-fit text-gray-600 hover:text-black transition-colors py-3 {{Request::is('about') ? 'nav-link-active' : ''}}">About Us</a>
                    <a href="{{ route('client.contact') }}" class="min-w-fit text-gray-600 hover:text-black transition-colors py-3 {{Request::is('contact') ? 'nav-link-active' : ''}}">Contact</a>
                </div>
                <div class="flex items-center space-x-4">
                        {{-- Start Search Bar --}}
                        <form method="GET" action="{{route('client.shop')}}" id="search-frm">
                            <div class="relative">
                                <input type="text" name="q" placeholder="Search products..." class="bg-gray-100 border border-gray-200 rounded-full pl-10 pr-4 py-2 w-56 focus:outline-none focus:ring-2 focus:ring-black/50"/>
                                <svg style="transform: translateY(-5%);" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="absolute left-3 top-1/2 -translate-y-1/2 h-5 w-5 text-gray-400"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                            </div>
                        </form>
                        {{-- End Search Bar --}}

                    <!-- User Profile -->
                    @if(Auth::check())
                        {{-- Start Display Total Cart --}}
                        <a href="{{route('client.cart_items')}}" class="relative text-gray-500 hover:text-black transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/></svg>
                            <span class="absolute -top-2 -right-2 bg-black text-white text-xs font-bold rounded-full h-5 w-5 flex items-center justify-center">[[total_cart]]</span>
                        </a>
                        {{-- End Display Total Cart --}}

                        {{-- Start Profile --}}
                        <div class="relative" id="profile-wrapper">
                            <div>
                                <input class="hidden" type="checkbox" id="chk-menu">
                                <label
                                    for="chk-menu"
                                    class="block flex items-center text-gray-600 select-none justify-center font-bold text-xl w-[50px] h-[50px] bg-[#F2F4F7] cursor-pointer rounded-full uppercase"

                                >
                                    {{substr(Auth::user()->name,1,1)}}
                                </label>
                            </div>
                            <div id="menu-wrapper" class="w-[300px] bg-white shadow rounded absolute top-[110%] right-0 py-3 select-none">
                                <h3 class="text-center text-xl font-bold">My Profile</h3>
                                <ul class="mt-3">
                                    <li>
                                        <a class="block border-b py-2 px-3 text-lg flex gap-2 items-center cursor-pointer hover:bg-[#F2F4F7]">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                            </svg>
                                            <span>Dashboard</span>
                                        </a>
                                    </li>
                                    <li>
                                        <form action="{{route('client.account.process_logout')}}" method="post">
                                            @csrf
                                            <button type="submit" class="block w-full border-b py-2 px-3 text-lg flex gap-2 items-center cursor-pointer hover:bg-[#F2F4F7]">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15M12 9l3 3m0 0-3 3m3-3H2.25" />
                                                </svg>
                                                <span>Sign Out</span>
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        {{-- End Profile --}}
                    @else
                        <a href="{{route('client.account.login')}}" class="min-w-fit bg-black text-white font-semibold px-4 py-2 rounded-lg text-sm">Sign In</a>
                        <a href="{{route('client.account.register')}}" class="min-w-fit bg-gray-200 text-black font-semibold px-4 py-2 rounded-lg text-sm">Sign Up</a>
                    @endif
                </div>
            </div>
            <!-- Mobile Header -->
            <div class="lg:hidden flex items-center h-16" :class="isSearchOpen ? 'justify-center' : 'justify-between'">
                <template v-if="!isSearchOpen">
                    <div class="flex gap-3 items-center">
                        {{-- Start Menu Toggle Button --}}
                        <button @click="isMenuOpen = !isMenuOpen; isSearchOpen = false" class="text-gray-500 hover:text-black">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="18" x2="21" y2="18"/></svg>
                        </button>
                        {{-- End Menu Toggle Button --}}

                        {{-- Start Logo --}}
                        <a href="{{route('client.index')}}"  class="flex-shrink-0 flex items-center space-x-2">
                            <svg class="h-8 w-8 text-black" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z"/><path d="M3 6h18"/><path d="M16 10a4 4 0 0 1-8 0"/></svg>
                            <span class="text-2xl font-bold text-black">KHMART</span>
                        </a>
                        {{--End Logo --}}
                    </div>
                    <div class="flex items-center space-x-4">
                        <button @click="isSearchOpen = true; isMenuOpen = false" class="text-gray-500 hover:text-black">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                        </button>
                        @if(Auth::check())
                            {{-- Start Display Total Cart Mobile --}}
                            <a href="{{route('client.cart_items')}}" class="relative text-gray-500 hover:text-black transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/></svg>
                                <span class="absolute -top-2 -right-2 bg-black text-white text-xs font-bold rounded-full h-5 w-5 flex items-center justify-center">[[ total_cart ]]</span>
                            </a>
                            {{-- End Display Total Cart Mobile --}}

                            {{-- Start Profile --}}
                            <div class="relative" id="profile-wrapper">
                                <div>
                                    <input class="hidden" type="checkbox" id="chk-menu">
                                    <label
                                        for="chk-menu"
                                        class="block flex items-center text-gray-600 select-none justify-center font-bold text-xl w-[50px] h-[50px] bg-[#F2F4F7] cursor-pointer rounded-full uppercase"

                                    >
                                        {{substr(Auth::user()->name,1,1)}}
                                    </label>
                                </div>
                                <div id="menu-wrapper" class="w-[300px] bg-white shadow rounded absolute top-[110%] right-0 py-3 select-none">
                                    <h3 class="text-center text-xl font-bold">My Profile</h3>
                                    <ul class="mt-3">
                                        <li>
                                            <a class="block border-b py-2 px-3 text-lg flex gap-2 items-center cursor-pointer hover:bg-[#F2F4F7]">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                </svg>
                                                <span>Dashboard</span>
                                            </a>
                                        </li>
                                        <li>
                                            <form action="{{route('client.account.process_logout')}}" method="post">
                                                @csrf
                                                <button type="submit" class="block w-full border-b py-2 px-3 text-lg flex gap-2 items-center cursor-pointer hover:bg-[#F2F4F7]">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15M12 9l3 3m0 0-3 3m3-3H2.25" />
                                                    </svg>
                                                    <span>Sign Out</span>
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            {{-- End Profile --}}

                        @endif
                    </div>
                </template>
                <template v-else>
                    <div class="w-full flex items-center relative">
                        <input type="text" v-model="searchQuery" @input="goToShopOnSearch" placeholder="Search products..." class="w-full bg-gray-100 border-transparent focus:border-gray-300 focus:ring-0 rounded-full pl-4 pr-12 py-2">
                        <button @click="isSearchOpen = false" class="absolute right-2 text-gray-500 hover:text-black p-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                        </button>
                    </div>
                </template>
            </div>
        </nav>
        <!-- Mobile Navigation Menu -->
        <div v-show="isMenuOpen" class="lg:hidden bg-white border-t border-gray-200">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <a href="#"  class="block px-3 py-2 rounded-md text-base font-medium">Home</a>
                <a href="#" class="block px-3 py-2 rounded-md text-base font-medium">Shop</a>
                <a href="#"  class="block px-3 py-2 rounded-md text-base font-medium">Orders</a>
                <a href="#"  class="block px-3 py-2 rounded-md text-base font-medium">About Us</a>
                <a href="#"  class="block px-3 py-2 rounded-md text-base font-medium">Contact</a>
                <div class="border-t my-2"></div>
                <a href="#" @click.prevent="navigateTo('login'); isMenuOpen = false" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:bg-gray-100">Login</a>
                <a v-else href="#" @click.prevent="logout(); isMenuOpen = false" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:bg-gray-100">Logout</a>
            </div>
        </div>

    </header>
    <main>
        @yield('content')
    </main>
    <footer class="bg-black text-white">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div>
                    <h4 class="font-bold text-lg mb-4">KHMART</h4>
                    <p class="text-gray-400">Your destination for modern, timeless fashion.</p>
                </div>
                <div>
                    <h4 class="font-bold text-lg mb-4">Shop</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#"  class="hover:text-white">Shoes</a></li>
                        <li><a href="#" class="hover:text-white">Clothes</a></li>
                        <li><a href="#" class="hover:text-white">Bags</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold text-lg mb-4">About</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="{{ route('client.about') }}" class="hover:text-white">About Us</a></li>
                        <li><a href="{{ route('client.contact') }}" class="hover:text-white">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold text-lg mb-4">Follow Us</h4>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.85s-.011 3.585-.069 4.85c-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07s-3.585-.012-4.85-.07c-3.252-.148-4.771-1.691-4.919-4.919-.058-1.265-.069-1.645-.069-4.85s.011-3.585.069-4.85c.149-3.225 1.664-4.771 4.919 4.919 1.266-.057 1.644-.069 4.85-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948s.014 3.667.072 4.947c.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072s3.667-.014 4.947-.072c4.358-.2 6.78-2.618 6.98-6.98.059-1.281.073-1.689.073-4.948s-.014-3.667-.072-4.947c-.2-4.358-2.618-6.78-6.98-6.98-1.281-.059-1.689-.073-4.948-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.162 6.162 6.162 6.162-2.759 6.162-6.162-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4s1.791-4 4-4 4 1.79 4 4-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44 1.441-.645 1.441-1.44-.645-1.44-1.441-1.44z"/></svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616v.064c0 2.296 1.634 4.208 3.803 4.649-.625.17-1.284.238-1.95.238-1.049 0-1.942-.093-2.78-.238.643 2.022 2.658 3.397 4.93 3.439-2.229 1.759-5.022 2.801-8.05 2.801-.52 0-1.033-.028-1.536-.09c2.889 1.851 6.331 2.926 10.03 2.926 12.043 0 18.622-10.043 18.086-18.734.966-.692 1.803-1.562 2.457-2.548z"/></svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400 text-sm">
                <p>&copy; 2025 KHMART. All Rights Reserved.</p>
            </div>
        </div>
    </footer>
</body>
<!-- Vue.js CDN -->
<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
<!-- Axios CDN -->
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>
    window.NavApp = Vue.createApp({
        delimiters: ['[[', ']]'],
        created() {
            let userId = @json(Auth::check() ? Auth::user()->id : null);
            if(userId != null) {
                this.user_id = userId
                this.fetchTotalCart()
            }
        },
        data() {
            return {
                total_cart:0,
                user_id:null,
                isMenuOpen:false,
                isSearchOpen:false
            }
        },
        methods: {
            fetchTotalCart() {
                axios.post("{{route('client.cart.get-total-cart')}}",{
                    user_id:this.user_id
                }).then((response) => {
                    if(response.status === 200){
                        this.total_cart = response.data.total
                    }
                })
            }
        }
    }).mount('#nav-app')
</script>
@yield('script')
</html>
