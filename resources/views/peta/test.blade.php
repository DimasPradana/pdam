<x-app-layout>
@push('headPeta')

    <!-- leaflet -->
        <!-- <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" -->
        <link rel="stylesheet" href="{{ URL::asset('public/css/leaflet.css') }}"
              integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
              crossorigin=""/>
        <!-- <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" -->
        <script src="{{ URL::asset('public/js/leaflet.js') }}"
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


        {{-- <script src="{{ URL::asset('public/js/test.js') }}"></script>--}}

    @endpush

    <div class="bg-white dark:bg-red-600 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="bg-white dark:bg-green-800" id="mapid" style="height: calc(100vh - 73px)"></div>
    </div>

    @push('peta')
        {{--petanya--}}

        <script>
            /* TODO  on Tue 09 Nov 2021 15:45:23 : yang belum sumur boor */
            /* TODO  on Tue 09 Nov 2021 15:45:23 : fitur search */

            var jsonPipa1 = @json($pipa1);
            var jsonPipa1Setengah = @json($pipa1Setengah);
            var jsonPipa2 = @json($pipa2);
            var jsonPipa3 = @json($pipa3);
            var jsonPipa4 = @json($pipa4);
            var jsonPipa6 = @json($pipa6);
            var jsonPipa8 = @json($pipa8);
            var jsonPipa12 = @json($pipa12);
            var jsonPelanggan = @json($pelanggan);
            /* var kumpulanpelanggan = L.markerClusterGroup(); */
            /* console.debug(jsonPelanggan); */

            // progres bar di console
            
            var progress;

            function updateProgressBar(processed, total, elapsed, layersArray) {
              if (elapsed > 1000) {
                // if it takes more than a second to load, display the progress bar:
                progress = Math.round(processed/total*100) + '%';
                console.debug("me-load data pelanggan: ", progress)
              }

              if (processed === total) {
                // all pelanggan processed - hide the progress bar:
                console.debug("data pelanggan berhasil di load: ", processed)
              }
            }


            var ikon = L.Icon.extend({
                options: {
                    iconSize: [50, 50],
                },
            });

            var waterMeter = new ikon({
                iconUrl: "public/images/waterMeter.png",
            });


            // overlayMaps
            var pipa1 = L.geoJSON(jsonPipa1, {
                style: function (feature) {
                    return {color: "#5f92b8"};
                    return layer.feature.properties.color // contoh
                }
            }).bindPopup(function (layer) {
                /* return layer.feature.properties.description; */
                return layer.feature.properties.ukuran_pipa; // ukuran_pipa ini ambil dari kolom database
            });

            var pipa1Setengah = L.geoJSON(jsonPipa1Setengah, {
                style: function (feature) {
                    return {color: "#00b4b7"};
                    return layer.feature.properties.color // contoh
                }
            }).bindPopup(function (layer) {
                /* return layer.feature.properties.description; */
                return layer.feature.properties.ukuran_pipa; // ukuran_pipa ini ambil dari kolom database
            });

            var pipa2 = L.geoJSON(jsonPipa2, {
                style: function (feature) {
                    return {color: "#ffdd43"};
                    // return layer.feature.properties.color // contoh
                }
            }).bindPopup(function (layer) {
                /* return layer.feature.properties.description; */
                return layer.feature.properties.ukuran_pipa; // ukuran_pipa ini ambil dari kolom database
            });

            var pipa3 = L.geoJSON(jsonPipa3, {
                style: function (feature) {
                    return {color: "#04ff00"};
                    return layer.feature.properties.color // contoh
                }
            }).bindPopup(function (layer) {
                /* return layer.feature.properties.description; */
                return layer.feature.properties.ukuran_pipa; // ukuran_pipa ini ambil dari kolom database
            });

            var pipa4 = L.geoJSON(jsonPipa4, {
                style: function (feature) {
                    return {color: "#0400f8"};
                    return layer.feature.properties.color // contoh
                }
            }).bindPopup(function (layer) {
                /* return layer.feature.properties.description; */
                return layer.feature.properties.ukuran_pipa; // ukuran_pipa ini ambil dari kolom database
            });

            var pipa6 = L.geoJSON(jsonPipa6, {
                style: function (feature) {
                    return {color: "#e59c00"};
                    return layer.feature.properties.color // contoh
                }
            }).bindPopup(function (layer) {
                /* return layer.feature.properties.description; */
                return layer.feature.properties.ukuran_pipa; // ukuran_pipa ini ambil dari kolom database
            });

            var pipa8 = L.geoJSON(jsonPipa8, {
                style: function (feature) {
                    return {color: "#ff0000"};
                    return layer.feature.properties.color // contoh
                }
            }).bindPopup(function (layer) {
                /* return layer.feature.properties.description; */
                return layer.feature.properties.ukuran_pipa; // ukuran_pipa ini ambil dari kolom database
            });

            var pipa12 = L.geoJSON(jsonPipa12, {
                style: function (feature) {
                    return {color: "#ff7979"};
                    return layer.feature.properties.color // contoh
                }
            }).bindPopup(function (layer) {
                /* return layer.feature.properties.description; */
                return layer.feature.properties.ukuran_pipa; // ukuran_pipa ini ambil dari kolom database
            });

            /* TODO  on Tue 09 Nov 2021 10:42:38 : coba langsung tampilkan ke map */
            /* const pelanggan = L.markerClusterGroup(); // snub */
            /*  */
            /* for (var i = 0; i < jsonPelanggan.features.length; i++) { */
            /*   const atribut = jsonPelanggan.features[i].properties; */
            /*   const geom = jsonPelanggan.features[i].geometry.coordinates; */
            /*   const nama = atribut.namapelang, sambungan = atribut.no_sambung, langgan = atribut.no_langgan, alamat = atribut.alamat; */
            /*   const marker = L.marker(new L.LatLng(geom[1], geom[0]), {textNama : nama}); */
            /*   marker.bindPopup(nama); */
            /*   pelanggan.addLayer(marker); */
            /*   // console.debug(marker);  */
            /* }; // snub */

            function popUpPelanggan(fNama, fSambungan, fLanggan, fAlamat, fUnit) {

              let popupContent = "";

              popupContent =
                '<table>\
                  <tr>\
                    <th scope="row" style="text-align:center" colspan="2"><div style="Arial; font-size:14px; color: blue"> INFORMASI PELANGGAN </th>\
                  </tr>\
                  <tr>\
                    <th scope="row">&nbsp; </th>\
                  </tr>\
                  <tr>\
                     <th scope="row"></th>\
                  </tr>\
                  <tr>\
                    <th scope="row">UNIT</th>\
                    <td>' +
                      fUnit +
                    '</td>\
                  </tr>\
                  <tr>\
                    <th scope="row">NAMA</th>\
                    <td>' +
                      fNama +
                    '</td>\
                  </tr>\
                  <tr>\
                    <th scope="row">NO SAMBUNGAN</th>\
                    <td>' +
                      fSambungan +
                    '</td>\
                  </tr>\
                  <tr>\
                    <th scope="row">NO LANGGANAN</th>\
                    <td>' +
                      fLanggan +
                    '</td>\
                  </tr>\
                  <tr>\
                    <th scope="row">ALAMAT</th>\
                    <td>' +
                      fAlamat +
                    '</td>\
                  </tr>\
                </table>';

              return popupContent;
            }


            /* TODO  on Tue 09 Nov 2021 11:12:10 : coba pake panel layer / subgroup */
            const pelanggan = L.markerClusterGroup({chunkedLoading: true, chunkProgress: updateProgressBar}), groupPelanggan = L.featureGroup.subGroup(pelanggan);
            for (let i = 0; i < jsonPelanggan.features.length ; i++) { 
              const atribut = jsonPelanggan.features[i].properties;
              const geom = jsonPelanggan.features[i].geometry.coordinates;
              const nama = atribut.namapelang, sambungan = atribut.no_sambung, langgan = atribut.no_langgan, alamat = atribut.alamat, unit = atribut.unit;
              /* const marker = L.marker(new L.LatLng(geom[1], geom[0]), {textNama : nama, icon: waterMeter }); */
              const marker = L.marker(new L.LatLng(geom[1], geom[0]), { icon: waterMeter });
              /* marker.bindPopup(nama); */
              marker.bindPopup(popUpPelanggan(nama, sambungan, langgan, alamat, unit));
              marker.addTo(groupPelanggan);
            }

            // basemap
            var hybrid = new L.tileLayer(
                    "http://mt0.google.com/vt/lyrs=y&hl=en&x={x}&y={y}&z={z}"
                ),
                streets = new L.tileLayer(
                    "http://mt0.google.com/vt/lyrs=r&hl=en&x={x}&y={y}&z={z}"
                );

            var m = L.map("mapid", {
                center: [-7.700935688163334, 114.02025856339858],
                zoom: 11,
                layers: [streets],
            });

            var baseMaps = {
                "<span class= 'ml-2 mr-3'>Hybrid</span>": hybrid,
                "<span class= 'ml-2 mr-3'>Streets</span>": streets,
            };

            var overlayMaps = {
                "<span class= 'ml-2 mr-3'>Pipa 1</span>": pipa1,
                "<span class= 'ml-2 mr-3'>Pipa 1.5</span>": pipa1Setengah,
                "<span class= 'ml-2 mr-3'>Pipa 2</span>": pipa2,
                "<span class= 'ml-2 mr-3'>Pipa 3</span>": pipa3,
                "<span class= 'ml-2 mr-3'>Pipa 4</span>": pipa4,
                "<span class= 'ml-2 mr-3'>Pipa 6</span>": pipa6,
                "<span class= 'ml-2 mr-3'>Pipa 8</span>": pipa8,
                "<span class= 'ml-2 mr-3'>Pipa 12</span>": pipa12,
                /* TODO  on Tue 09 Nov 2021 10:43:14 : belum bisa pangil pelanggan marker (coba langsung ke map bisa, tinggal pakai tombol) */
                /* "<span class= 'ml-2 mr-3'>Pelanggan</span>": pelanggan, */
            };

            pelanggan.addTo(m);
            /* m.addLayer(pelanggan); // snub */
            var layerAsli = L.control.layers(baseMaps, overlayMaps).addTo(m);
            // layerAsli.addOverlay(drawnItems, "<span class= 'ml-1'>drawnItems</span>"); // bisa
            layerAsli.addOverlay(groupPelanggan, "<span class= 'ml-2 mr-3'>Pelanggan</span>");
            /* groupPelanggan.addTo(m); // untuk control di layer nya aktif atau tidak */

        </script>
    @endpush
</x-app-layout>
