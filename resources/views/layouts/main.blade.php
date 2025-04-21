<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=UnifrakturMaguntia&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


        <style>
            .fraktur-text {
                font-family: "UnifrakturMaguntia", cursive;
                font-weight: 400;
                font-style: normal;
                }
        </style>

        <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
        <script src="https://code.jquery.com/ui/1.14.1/jquery-ui.js"></script>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/coloris.js'])

        <!-- Styles -->
        @livewireStyles
        @stack('head')
    </head>
    <body>
        <nav x-data="{ mobileMenuIsOpen: false }" x-on:click.away="mobileMenuIsOpen = false" class="flex items-center justify-between border-b border-outline px-6 py-4 dark:border-outline-dark bg-white" aria-label="penguin ui menu">
            <!-- Brand Logo -->
            <a href="#" class="text-2xl font-bold text-on-surface-strong dark:text-on-surface-dark-strong">
                <span class="fraktur-text text-3xl">Ginja's Bar</span>
                <!-- <img src="./your-logo.svg" alt="brand logo" class="w-10" /> -->
            </a>
            <!-- Desktop Menu -->
            <ul class="hidden items-center gap-4 md:flex bg-white m-auto">
                <li><a href="#" class="font-bold text-primary underline-offset-2 hover:text-primary focus:outline-hidden focus:underline dark:text-primary-dark dark:hover:text-primary-dark" aria-current="page">Products</a></li>
                <li><a href="#" class="font-medium text-on-surface underline-offset-2 hover:text-primary focus:outline-hidden focus:underline dark:text-on-surface-dark dark:hover:text-primary-dark">Pricing</a></li>
                <li><a href="#" class="font-medium text-on-surface underline-offset-2 hover:text-primary focus:outline-hidden focus:underline dark:text-on-surface-dark dark:hover:text-primary-dark">Blog</a></li>
                <li><a href="#" class="font-medium text-on-surface underline-offset-2 hover:text-primary focus:outline-hidden focus:underline dark:text-on-surface-dark dark:hover:text-primary-dark">Login</a></li>
            </ul>
            <a href="#_" class="relative inline-flex items-center justify-center p-4 px-5 py-3 overflow-hidden font-medium text-indigo-600 transition duration-300 ease-out rounded-full shadow-xl group hover:ring-1 hover:ring-purple-500">
                <span class="absolute inset-0 w-full h-full bg-gradient-to-br from-blue-600 via-purple-600 to-pink-700"></span>
                <span class="absolute bottom-0 right-0 block w-64 h-64 mb-32 mr-4 transition duration-500 origin-bottom-left transform rotate-45 translate-x-24 bg-pink-500 rounded-full opacity-30 group-hover:rotate-90 ease"></span>
                <span class="relative text-white">{{__("Make Reservation")}}</span>
            </a>
            <!-- Mobile Menu Button -->
            <button x-on:click="mobileMenuIsOpen = !mobileMenuIsOpen" x-bind:aria-expanded="mobileMenuIsOpen" x-bind:class="mobileMenuIsOpen ? 'fixed top-6 right-6 z-20' : null" type="button" class="flex text-on-surface dark:text-on-surface-dark md:hidden" aria-label="mobile menu" aria-controls="mobileMenu">
                <svg x-cloak x-show="!mobileMenuIsOpen" xmlns="http://www.w3.org/2000/svg" fill="none" aria-hidden="true" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
                <svg x-cloak x-show="mobileMenuIsOpen" xmlns="http://www.w3.org/2000/svg" fill="none" aria-hidden="true" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </button>
            <!-- Mobile Menu -->
            <ul x-cloak x-show="mobileMenuIsOpen" x-transition:enter="transition motion-reduce:transition-none ease-out duration-300" x-transition:enter-start="-translate-y-full" x-transition:enter-end="translate-y-0" x-transition:leave="transition motion-reduce:transition-none ease-out duration-300" x-transition:leave-start="translate-y-0" x-transition:leave-end="-translate-y-full" id="mobileMenu" class="fixed max-h-svh overflow-y-auto inset-x-0 top-0 z-10 flex flex-col divide-y divide-outline rounded-b-radius border-b border-outline bg-surface-alt px-6 pb-6 pt-20 dark:divide-outline-dark dark:border-outline-dark dark:bg-surface-dark-alt md:hidden   bg-white">
                <li class="py-4"><a href="#" class="w-full text-lg font-bold text-primary focus:underline dark:text-primary-dark" aria-current="page">Products</a></li>
                <li class="py-4"><a href="#" class="w-full text-lg font-medium text-on-surface focus:underline dark:text-on-surface-dark">Pricing</a></li>
                <li class="py-4"><a href="#" class="w-full text-lg font-medium text-on-surface focus:underline dark:text-on-surface-dark">Blog</a></li>
                <li class="py-4"><a href="#" class="w-full text-lg font-medium text-on-surface focus:underline dark:text-on-surface-dark">Login</a></li>
            </ul>
        </nav>
        
        <div class="font-sans text-gray-900 dark:text-gray-100 antialiased p-0 m-0">
            {{ $slot }}
        </div>

        @livewireScripts
        @stack('scripts')
    </body>
</html>
