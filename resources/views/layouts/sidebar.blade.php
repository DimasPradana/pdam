<div class="flex-col w-full md:flex md:flex-row md:min-h-screen">
    <div @click.away="open = false"
         class="flex flex-col flex-shrink-0 w-full text-gray-700 bg-white md:w-64 dark:text-gray-200 dark:bg-gray-800"
         x-data="{ open: false }">

        {{-- header kiri--}}
        <div class="flex flex-row items-center justify-between flex-shrink-0 px-8 py-4">
            <a href="#"
               class="text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg dark:text-white focus:outline-none focus:shadow-outline">Geographics Information System</a>
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
      <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg dark:bg-transparent dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline focus:ring-2 focus:ring-green-500 active:bg-green-500"
          href="{{ url('/') }}">Home</a>

            {{-- unit 1--}}
            @hasanyrole('Super Admin|unitArjasa|kepala')
            <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg dark:bg-transparent dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline focus:ring-2 focus:ring-red-500"
               href="{{ url('arjasa') }}">Arjasa</a>
            @endhasanyrole

            {{-- unit 2--}}
            @hasanyrole('Super Admin|unitAsembagus|kepala')
            <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg dark:bg-transparent dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline focus:ring-2 focus:ring-blue-500"
               href="{{ url('asembagus') }}">Asembagus</a>
            @endhasanyrole

            {{-- unit 3--}}
            @hasanyrole('Super Admin|unitBanyuputih|kepala')
            <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg dark:bg-transparent dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline focus:ring-2 focus:ring-yellow-500"
               href="{{ url('banyuputih') }}">Banyuputih</a>
            @endhasanyrole

            {{-- unit 4--}}
            @hasanyrole('Super Admin|unitBesuki|kepala')
            <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg dark:bg-transparent dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline focus:ring-2 focus:ring-indigo-500"
               href="{{ url('besuki') }}">Besuki</a>
            @endhasanyrole

            {{-- unit 5--}}
            @hasanyrole('Super Admin|unitJatibanteng|kepala')
            <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg dark:bg-transparent dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline focus:ring-2 focus:ring-pink-500"
               href="{{ url('jatibanteng') }}">Jatibanteng</a>
            @endhasanyrole

            {{-- unit 5--}}
            @hasanyrole('Super Admin|unitKapongan|kepala')
            <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg dark:bg-transparent dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline focus:ring-2 focus:ring-pink-500"
               href="{{ url('kapongan') }}">Kapongan</a>
            @endhasanyrole

            {{-- unit 6--}}
            @hasanyrole('Super Admin|unitKendit|kepala')
            <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg dark:bg-transparent dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline focus:ring-2 focus:ring-purple-500"
               href="{{ url('kendit') }}">Kendit</a>
            @endhasanyrole

            {{-- unit 7--}}
            @hasanyrole('Super Admin|unitMangaran|kepala')
            <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg dark:bg-transparent dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline focus:ring-2 focus:ring-yellow-300"
               href="{{ url('mangaran') }}">Mangaran</a>
            @endhasanyrole

            {{-- unit 8--}}
            @hasanyrole('Super Admin|unitPanarukan|kepala')
            <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg dark:bg-transparent dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline focus:ring-2 focus:ring-blue-300"
               href="{{ url('panarukan') }}">Panarukan</a>
            @endhasanyrole

            {{-- unit 9--}}
            @hasanyrole('Super Admin|unitSitubondo|kepala')
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
