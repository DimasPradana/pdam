<x-app-layout>
{{--                TODO snub ditaruh di app.blade headernya --}}
{{--    <div class="py-12">--}}
{{--        <div class="ml-4 mr-4 px-2">--}}
{{--            <div class="bg-white dark:bg-red-600 overflow-hidden shadow-sm sm:rounded-lg">--}}
{{--                <div class="p-6 bg-white dark:bg-green-800">--}}
{{--                    ini dari dashboard--}}
{{--                    --}}{{--                    TODO coba ambil dari database--}}
{{--                    --}}{{--                    @foreach($hasilUsers as $hasilUser)--}}
{{--                    --}}{{--                        <br />{{$hasilUser->name}}--}}
{{--                    --}}{{--                    @endforeach--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

@push('headPeta')
    {{--        <script>console.log('dari dashboard')</script>--}}

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

        <!-- drawing -->
        <link rel="stylesheet" href="{{ URL::asset('public/draw/leaflet.draw.css') }}"/>
        <script src="{{ URL::asset('public/draw/Leaflet.draw.js') }}"></script>
        <script src="{{ URL::asset('public/draw/Leaflet.Draw.Event.js') }}"></script>
        <script src="{{ URL::asset('public/draw/Toolbar.js') }}"></script>
        <script src="{{ URL::asset('public/draw/Tooltip.js') }}"></script>
        <script src="{{ URL::asset('public/draw/ext/GeometryUtil.js') }}"></script>
        <script src="{{ URL::asset('public/draw/ext/LatLngUtil.js') }}"></script>
        <script src="{{ URL::asset('public/draw/ext/LineUtil.Intersect.js') }}"></script>
        <script src="{{ URL::asset('public/draw/ext/Polygon.Intersect.js') }}"></script>
        <script src="{{ URL::asset('public/draw/ext/Polyline.Intersect.js') }}"></script>
        <script src="{{ URL::asset('public/draw/ext/TouchEvents.js') }}"></script>
        <script src="{{ URL::asset('public/draw/draw/DrawToolbar.js') }}"></script>
        <script src="{{ URL::asset('public/draw/draw/handler/Draw.Feature.js') }}"></script>
        <script src="{{ URL::asset('public/draw/draw/handler/Draw.SimpleShape.js') }}"></script>
        <script src="{{ URL::asset('public/draw/draw/handler/Draw.Polyline.js') }}"></script>
        <script src="{{ URL::asset('public/draw/draw/handler/Draw.Marker.js') }}"></script>
        <script src="{{ URL::asset('public/draw/draw/handler/Draw.Circle.js') }}"></script>
        <script src="{{ URL::asset('public/draw/draw/handler/Draw.CircleMarker.js') }}"></script>
        <script src="{{ URL::asset('public/draw/draw/handler/Draw.Polygon.js') }}"></script>
        <script src="{{ URL::asset('public/draw/draw/handler/Draw.Rectangle.js') }}"></script>
        <script src="{{ URL::asset('public/draw/edit/EditToolbar.js') }}"></script>
        <script src="{{ URL::asset('public/draw/edit/handler/EditToolbar.Edit.js') }}"></script>
        <script src="{{ URL::asset('public/draw/edit/handler/EditToolbar.Delete.js') }}"></script>
        <script src="{{ URL::asset('public/draw/Control.Draw.js') }}"></script>
        <script src="{{ URL::asset('public/draw/edit/handler/Edit.Poly.js') }}"></script>
        <script src="{{ URL::asset('public/draw/edit/handler/Edit.SimpleShape.js') }}"></script>
        <script src="{{ URL::asset('public/draw/edit/handler/Edit.Rectangle.js') }}"></script>
        <script src="{{ URL::asset('public/draw/edit/handler/Edit.Marker.js') }}"></script>
        <script src="{{ URL::asset('public/draw/edit/handler/Edit.CircleMarker.js') }}"></script>
        <script src="{{ URL::asset('public/draw/edit/handler/Edit.Circle.js') }}"></script>


    <!-- <script src="{{ URL::asset('public/js/leaflet-omnivore.min.js') }}"></script> -->
    <!-- <script src="{{ URL::asset('public/js/leaflet.markercluster.layersupport.js') }}"></script> -->


        {{-- <script src="{{ URL::asset('public/js/test.js') }}"></script>--}}

    @endpush

    <div class="bg-white dark:bg-red-600 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="bg-white dark:bg-green-800" id="mapid" style="height: calc(100vh - 73px)"></div>
        {{--        <div class="flex h-screen bg-white dark:bg-green-800"></div>--}}
    </div>

    @push('peta')
        {{--    petanya--}}
        {{--        <script src="{{ URL::asset('public/js/peta.js') }}"></script> --}}
        {{-- @hasanyrole('Super Admin|roleUnit1') --}}
        {{-- <script src="{{ URL::asset('public/js/peta/petaSitubondo.js') }}"></script> --}}
        {{-- {{-- <script>console.log('superadmin atau situbondo 1')</script> --}}
        {{-- @else  --}}
        {{-- <script>console.log('tidak ada role')</script> --}}
        {{-- @endhasanyrole --}}

        @can('arjasa.create','arjasa.read','arjasa.update','arjasa.delete')
            <script src="{{ URL::asset('public/js/peta/petaArjasa.js') }}"></script>
        @endcan
    @endpush


</x-app-layout>

