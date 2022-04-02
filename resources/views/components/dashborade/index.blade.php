
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>K-WD Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;700;900&display=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    {{-- <link rel="stylesheet" href="build/css/tailwind.css" /> --}}

    {{-- <script src="https://cdn.jsdelivr.net/gh/alpine-collective/alpine-magic-helpers@0.5.x/dist/component.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js" defer></script> --}}
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body>

    <div x-data="setup()" x-init="$refs.loading.classList.add('hidden');
    setColors(color);" :class="{ 'dark': isDark}">
        <div class="flex h-screen antialiased text-gray-900 bg-gray-100 dark:bg-dark dark:text-light">
            <!-- Loading screen -->
            <div x-ref="loading"
                class="fixed inset-0 z-50 flex items-center justify-center text-2xl font-semibold text-white bg-primary-darker">
                Loading.....
            </div>

                        <!-- Sidebar -->
                        <x-dashborade.sidebar/>



            <div class="flex-1 h-full overflow-x-hidden overflow-y-auto">

                <!-- her Is The Nav Bar -->

                <x-dashborade.navbar/>


                <main>

                    {{$slot}}

                </main>



            </div>
        </div>
        <!-- here is The Bob Up Views Or Panle -->

@isset($bobups)
{{$bobups}}

@endisset


    </div>






    <!-- her is The Scripts -->




</body>
</html>
