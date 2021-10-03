<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="ml-4 px-2">
            <div class="bg-white dark:bg-gray-600 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800">
                    You're logged in as {{Auth::user()->name}} !
                </div>
            </div>
        </div>
    </div>

    @can('create markers')
        <div class="py-6">
            <div class="ml-4 px-2">
                <div class="bg-white dark:bg-gray-600 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white dark:bg-red-900">
                        create markers
                    </div>
                </div>
            </div>
        </div>
    @endcan

    @can('create polygons')
        <div class="py-6">
            <div class="ml-4 px-2">
                <div class="bg-white dark:bg-gray-600 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white dark:bg-yellow-900">
                        create polygons
                    </div>
                </div>
            </div>
        </div>
    @endcan

    @can('create attributes')
        <div class="py-6">
            <div class="ml-4 px-2">
                <div class="bg-white dark:bg-gray-600 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white dark:bg-green-800">
                        create attributes
                    </div>
                </div>
            </div>
        </div>
    @endcan

    @can('create markers', 'read markers', 'update markers', 'delete markers')
        <div class="py-6">
            <div class="ml-4 px-2">
                <div class="bg-white dark:bg-gray-600 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white dark:bg-blue-700">
                        all about markers
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="py-6">
            <div class="ml-4 px-2">
                <div class="bg-white dark:bg-gray-600 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white dark:bg-blue-600">
                        kosong
                    </div>
                </div>
            </div>
        </div>
    @endcan

    @can('read polygons', 'read markers', 'read attributes')
        <div class="py-12">
            <div class="ml-4 px-2">
                <div class="bg-white dark:bg-gray-600 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white dark:bg-indigo-600">
                        kepala kantor
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="py-12">
            <div class="ml-4 px-2">
                <div class="bg-white dark:bg-gray-600 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white dark:bg-indigo-600">
                        bukan kepala kantor
                    </div>
                </div>
            </div>
        </div>
    @endcan

    {{--    @hasanyrole('kepala|Super Admin')--}}
    {{--        @verbatim--}}
    {{--            <script>--}}
    {{--                console.log("halo pak direktur atau admin");--}}
    {{--            </script>--}}
    {{--        @endverbatim--}}
    {{--    @endhasanyrole--}}

    @can('read markers','read polygons')
        @verbatim
            <script>
                console.log("bisa read marker atau read polygons");
            </script>
        @endverbatim
    @endcan


</x-app-layout>
