<div class="flex-col w-full md:flex md:flex-row md:min-h-screen">
    <div @click.away="open = false"
         class="flex flex-col flex-shrink-0 w-full text-gray-700 bg-white md:w-64 dark:text-gray-200 dark:bg-gray-800"
         x-data="{ open: false }">

        {{-- header kiri--}}
        <div class="flex flex-row items-center justify-between flex-shrink-0 px-8 py-4">
            <a href="#"
               class="text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg dark:text-white focus:outline-none focus:shadow-outline">PDAM
                GIS</a>
            <button class="rounded-lg md:hidden focus:outline-none focus:shadow-outline" @click="open = !open">
                <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                    <path x-show="!open" fill-rule="evenodd"
                          d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"
                          clip-rule="evenodd"></path>
                    <path x-show="open" fill-rule="evenodd"
                          d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                          clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>

        {{-- menu nav--}}
        <nav :class="{'block': open, 'hidden': !open}" class="flex-grow px-4 pb-4 md:block md:pb-0 md:overflow-y-auto">
            {{--            <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-gray-200 rounded-lg dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"--}}
            {{--               href="{{ url('/') }}">Home</a>--}}
            <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg dark:bg-transparent dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline focus:ring-2 focus:ring-green-500"
               href="{{ url('/') }}">Home</a>
            {{--            <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg dark:bg-transparent dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline focus:ring-2 focus:ring-green-500"--}}
            {{--               href="marker">Marker</a>--}}
            {{--            <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg dark:bg-transparent dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline focus:ring-2 focus:ring-green-500"--}}
            {{--               href="polygon">Polygon</a>--}}
            {{--            <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg dark:bg-transparent dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline focus:ring-2 focus:ring-green-500"--}}
            {{--               href="attribute">Attribute</a>--}}
            {{--            <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg dark:bg-transparent dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"--}}
            {{--               href="#">Contact</a>--}}
            {{--            <div @click.away="open = false" class="relative" x-data="{ open: false }">--}}
            {{--                <button @click="open = !open"--}}
            {{--                        class="flex flex-row items-center w-full px-4 py-2 mt-2 text-sm font-semibold text-left bg-transparent rounded-lg dark:bg-transparent dark:focus:text-white dark:hover:text-white dark:focus:bg-gray-600 dark:hover:bg-gray-600 md:block hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline focus:ring-2 focus:ring-red-400">--}}
            {{--                    <span>Unit 1</span>--}}
            {{--                    <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}"--}}
            {{--                         class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1">--}}
            {{--                        <path fill-rule="evenodd"--}}
            {{--                              d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"--}}
            {{--                              clip-rule="evenodd"></path>--}}
            {{--                    </svg>--}}
            {{--                </button>--}}
            {{--                <div x-show="open" x-transition:enter="transition ease-out duration-100"--}}
            {{--                     x-transition:enter-start="transform opacity-0 scale-95"--}}
            {{--                     x-transition:enter-end="transform opacity-100 scale-100"--}}
            {{--                     x-transition:leave="transition ease-in duration-75"--}}
            {{--                     x-transition:leave-start="transform opacity-100 scale-100"--}}
            {{--                     x-transition:leave-end="transform opacity-0 scale-95"--}}
            {{--                     class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg">--}}
            {{--                    <div class="px-2 py-2 bg-white rounded-md shadow dark:bg-gray-700">--}}
            {{--                        <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark:bg-transparent dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"--}}
            {{--                           href="#">View Map</a>--}}
            {{--                        <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark:bg-transparent dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"--}}
            {{--                           href="#">Edit Map</a>--}}
            {{--                        --}}{{--                        <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark:bg-transparent dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"--}}
            {{--                        --}}{{--                           href="#">Link #3</a>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            </div>--}}

            {{-- unit 1--}}
            @hasanyrole('Super Admin|roleUnit1|kepala|hl')
            <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg dark:bg-transparent dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline focus:ring-2 focus:ring-red-500"
               href="{{ url('arjasa') }}">Arjasa</a>
            @endhasanyrole

            {{-- unit 2--}}
            @hasanyrole('Super Admin|roleUnit2|kepala|hl')
            <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg dark:bg-transparent dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline focus:ring-2 focus:ring-blue-500"
               href="{{ url('asembagus') }}">Asembagus</a>
            @endhasanyrole

            {{-- unit 3--}}
            @hasanyrole('Super Admin|roleUnit3|kepala')
            <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg dark:bg-transparent dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline focus:ring-2 focus:ring-yellow-500"
               href="{{ url('banyuputih') }}">Banyuputih</a>
            @endhasanyrole

            {{-- unit 4--}}
            @hasanyrole('Super Admin|roleUnit4|kepala')
            <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg dark:bg-transparent dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline focus:ring-2 focus:ring-indigo-500"
               href="{{ url('besuki') }}">Besuki</a>
            @endhasanyrole

            {{-- unit 5--}}
            @hasanyrole('Super Admin|roleUnit5|kepala')
            <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg dark:bg-transparent dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline focus:ring-2 focus:ring-pink-500"
               href="{{ url('jatibanteng') }}">Jatibanteng</a>
            @endhasanyrole
            
            {{-- unit 5--}}
            @hasanyrole('Super Admin|roleUnit5|kepala')
            <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg dark:bg-transparent dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline focus:ring-2 focus:ring-pink-500"
               href="{{ url('kapongan') }}">Kapongan</a>
            @endhasanyrole

            {{-- unit 6--}}
            @hasanyrole('Super Admin|roleUnit6|kepala')
            <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg dark:bg-transparent dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline focus:ring-2 focus:ring-purple-500"
               href="{{ url('kendit') }}">Kendit</a>
            @endhasanyrole

            {{-- unit 7--}}
            @hasanyrole('Super Admin|roleUnit7|kepala')
            <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg dark:bg-transparent dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline focus:ring-2 focus:ring-yellow-300"
               href="{{ url('mangaran') }}">Mangaran</a>
            @endhasanyrole

            {{-- unit 8--}}
            @hasanyrole('Super Admin|roleUnit8|kepala')
            <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg dark:bg-transparent dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline focus:ring-2 focus:ring-blue-300"
               href="{{ url('panarukan') }}">Panarukan</a>
            @endhasanyrole

            {{-- unit 9--}}
            @hasanyrole('Super Admin|roleUnit9|kepala')
            <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg dark:bg-transparent dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline focus:ring-2 focus:ring-indigo-300"
               href="{{ url('situbondo') }}">Situbondo</a>
            @endhasanyrole

            <form method="POST" action="{{ route('logout') }}"> @csrf <a
                    class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg dark:bg-transparent dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                    href="{{ route('logout') }}"
                    onclick="event.preventDefault(); this.closest('form').submit();">Logout</a>
            </form>
        </nav>
    </div>

    <div class="w-full">
        {{-- Page Heading --}}
        <header class="bg-white shadow dark:bg-gray-800 invisible md:visible">
            {{--            <div class="px-4 py-6 ml-4 sm:px-6 lg:px-8">--}}
            <div class="md:px-4 md:py-6 md:ml-4">
                {{--                TODO snub ditaruh sini headernya --}}
                {{--                {{ $header }}--}}
                {{--                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight uppercase">--}}
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 uppercase md:leading-tight">
                    {{Auth::user()->name}}
                </h2>
            </div>
        </header>

        {{-- Page Content --}}
        <main>
            {{ $slot }}
            @stack('peta')
        </main>
    </div>
</div>
