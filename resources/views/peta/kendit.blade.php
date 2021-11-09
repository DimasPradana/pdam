<x-app-layout>

@push('headPeta')

    <!-- leaflet -->
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
              integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
              crossorigin=""/>
        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
                integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
                crossorigin=""></script>

        <!-- panel layers -->
        <link rel="stylesheet" href="{{ URL::asset('public/css/leaflet-panel-layers.css') }}"/>
        <script src="{{ URL::asset('public/js/leaflet-panel-layers.js') }}"></script>

        <!-- marker cluster -->
        <link rel="stylesheet" href="{{ URL::asset('public/css/MarkerCluster.css') }}"/>
        <link rel="stylesheet" href="{{ URL::asset('public/css/MarkerCluster.Default.css') }}"/>
        <script src="{{ URL::asset('public/js/leaflet.markercluster-src.js') }}"></script>

        <!-- polyline measure -->
        <link rel="stylesheet" href="{{ URL::asset('public/css/Leaflet.PolylineMeasure.css') }}"/>
        <script src="{{ URL::asset('public/js/Leaflet.PolylineMeasure.js') }}"></script>

        <!-- leaflet ajax -->
        <script src="{{ URL::asset('public/js/leaflet.ajax.min.js') }}"></script>

        <!-- spinner -->
        <script src="{{ URL::asset('public/js/spin.min.js') }}"></script>
        <script src="{{ URL::asset('public/js/leaflet.spin.min.js') }}"></script>

        <!-- feature group -->
        <script src="{{ URL::asset('public/js/leaflet.featuregroup.subgroup-src.js') }}"></script>

        <!-- street view -->
        <script src="{{ URL::asset('public/js/StreetViewButtons.js') }}"></script>

        <!-- context menu -->
        <link rel="stylesheet" href="{{ URL::asset('public/css/leaflet.contextmenu.min.css') }}"/>
        <script src="{{ URL::asset('public/js/leaflet.contextmenu.min.js') }}"></script>

        <!-- search -->
        <link rel="stylesheet" href="{{ URL::asset('public/css/leaflet-search.css') }}"/>
        <link rel="stylesheet" href="{{ URL::asset('public/css/leaflet-search.mobile.css') }}"/>
        <script src="{{ URL::asset('public/js/leaflet-search.js') }}"></script>
        <script src="{{ URL::asset('public/js/leaflet-search-geocoder.js') }}"></script>

    @endpush

    <div class="bg-white dark:bg-red-600 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="bg-white dark:bg-green-800" id="mapid" style="height: calc(100vh - 73px)"></div>
    </div>

    @push('peta')
        {{--    petanya--}}
        <script>
            window.pipa1 = {!! json_encode($pipa1) !!};
            window.pipa1Setengah = {!! json_encode($pipa1Setengah) !!};
            window.pipa2 = {!! json_encode($pipa2) !!};
            window.pipa3 = {!! json_encode($pipa3) !!};
            window.pipa4 = {!! json_encode($pipa4) !!};
            window.pipa6 = {!! json_encode($pipa6) !!};
            window.pipa8 = {!! json_encode($pipa8) !!};
            window.pipa12 = {!! json_encode($pipa12) !!};
            window.pelanggan = {!! json_encode($pelanggan) !!};
        </script>
        <script src="{{ URL::asset('public/js/peta/petaKendit.js') }}"></script>
    @endpush


</x-app-layout>
