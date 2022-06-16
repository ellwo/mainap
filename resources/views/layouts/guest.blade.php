<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />

    <!-- Styles -->
    <style>
        [x-cloak] {
            display: none;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    @livewireStyles
    <!-- Scripts -->
<<<<<<< HEAD
</head>

<body  class="antialiased" >
=======
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body class="antialiased" >
>>>>>>> e898d1e3573b758bd51eb91352a82c68d3ab8ff1




<<<<<<< HEAD
    <div   x-data="setup()" @resize.window="handleWindowResize" x-init="$refs.loading.classList.add('hidden');
    setColors('mycolor'); isSidebarOpen=false" :class="{ 'dark': isDark}">






=======
    <div x-data="setup()" @resize.window="handleWindowResize" x-init="$refs.loading.classList.add('hidden');
    setColors('mycolor'); isSidebarOpen=false" :class="{ 'dark': isDark}">


>>>>>>> e898d1e3573b758bd51eb91352a82c68d3ab8ff1
    <div   class="min-h-screen text-gray-900 bg-gray-100 dark:bg-dark dark:text-light">
            <!-- Loading screen -->

            <div x-ref="loading"
                class="fixed inset-0 z-50 flex items-center justify-center text-2xl font-semibold text-white bg-primary-darker">
                Loading.....
            </div>


                        <!-- Sidebar -->


            <div  class="flex flex-col flex-1 min-h-full "
            style="transition-property: margin; transition-duration: 150ms;"
            >
            <x-navbar/>

<<<<<<< HEAD
                <main  class="flex-1 px-4 sm:px-6">

                    {{$slot}}


=======
                <main class="flex-1 px-4 sm:px-6">

                    {{$slot}}

>>>>>>> e898d1e3573b758bd51eb91352a82c68d3ab8ff1
                </main>



            </div>
        </div>
    </div>

<<<<<<< HEAD

    <script src="{{ asset('js/app.js') }}" defer></script>
    @livewireScripts
=======
    @livewireScripts
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.bundle.min.js"></script>
>>>>>>> e898d1e3573b758bd51eb91352a82c68d3ab8ff1

    @isset($script)
        {{$script}}
    @endisset

</body>

</html>
