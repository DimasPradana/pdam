<!DOCTYPE html>
<html lang="en">

<head>
    {{--    <title>PDAM</title>--}}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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

    <style>
        html {
            height: 100%
        }

        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        #mapid {
            height: 100%
        }
    </style>
</head>

<body>
{{--
 TODO snub on Sun 22 Aug 2021 02:31:54
  ᚛ klik di sumurboor ✓
  ᚛ klik di pipapelayanan ✓
  ᚛ klik di pipadist ✓
  ᚛ icon gate valve di legenda ✓
  ᚛ icon pelanggan di legenda ✓
  ᚛ coba layer streetview ✓
  ᚛ coba drawing ✓
  ᚛ coba gpx
  ᚛ coba omnivore
  ᚛ coba hightlight
--}}
<div id="mapid"></div>
<script>
    {
        // disable right click
        document.addEventListener('contextmenu', function (e) {
            e.preventDefault();
        });
        // disable F12
        document.onkeydown = function (e) {
            // if (event.keyCode == 123) {
            //     return false;
            // }
            if (e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
                return false;
            }
            if (e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
                return false;
            }
            if (e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
                return false;
            }
            if (e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
                return false;
            }
            if (e.ctrlKey && e.keyCode == 'S'.charCodeAt(0)) {
                return false;
            }
        };

        // var map = L.map('map').setView([-7.700935688163334, 114.02025856339858], 11);

        function showCoordinates(e) {
            // alert(e.latlng);
            let lat = e.latlng.lat;
            let long = e.latlng.lng;
            // alert('lat: '+lat+', long: '+long)
            // window.open('http://maps.google.com/maps?q=&layer=c&cbll='+lat+','+long+'&cbp=11,0,0,0,0', '_blank');
            window.open(
                'http://maps.google.com/maps?q=&layer=c&cbll=' + lat + ',' + long + '&cbp=11,0,0,0,0'
            );
            // http://maps.google.com/maps?q=&layer=c&cbll=31.335198,-89.287204&cbp=11,0,0,0,0
        }

        function m_style_pipadist_110(f) {
            return {
                fillColor: 'white',
                fillOpacity: 0.2,
                color: '#DC2626',
                dashArray: '',
                weight: 3,
                opacity: 0.7
            };
        }

        function m_style_pipadist_160(f) {
            return {
                fillColor: 'white',
                fillOpacity: 0.2,
                color: '#3B82F6',
                dashArray: '',
                weight: 5,
                opacity: 0.7
            };
        }

        function m_style_pipapelayanan(f) {
            return {
                // fillColor: 'white',
                fillOpacity: 0.2,
                // color: 'green',
                // color: '#D97706',
                color: '#4caf50',
                dashArray: '',
                weight: 2,
                opacity: 0.7
            };
        }

        function m_style_sumurboor(f) {
            return {
                fillColor: 'red',
                fillOpacity: 0.2,
                color: '#F472B6',
                dashArray: '',
                weight: 2,
                opacity: 0.7
            };
        }

        // Export to GeoJSON File
        function geojsonExport() {
            let nodata = '{"type":"FeatureCollection","features":[]}';
            let jsonData = JSON.stringify(drawnItems.toGeoJSON());
            let dataUri = 'data:application/json;charset=utf-8,' + encodeURIComponent(jsonData);
            let datenow = new Date();
            let datenowstr = datenow.toLocaleDateString('id-ID');
            let exportFileDefaultName = 'export_draw_' + datenowstr + '.geojson';
            let linkElement = document.createElement('a');
            linkElement.setAttribute('href', dataUri);
            linkElement.setAttribute('download', exportFileDefaultName);
            if (jsonData == nodata) {
                alert('No features are drawn');
            } else {
                linkElement.click();
            }
        }

        function centerMap(e) {
            m.panTo(e.latlng);
        }

        function zoomIn(e) {
            m.zoomIn();
        }

        function zoomOut(e) {
            m.zoomOut();
        }

        // function highlightFeature(e) {
        //     var layer = e.target;

        //     layer.setStyle({
        //         weight: 5,
        //         color: '#fff',
        //         dashArray: '',
        //         fillOpacity: 0.7
        //     });

        //     if (!L.Browser.ie && !L.Browser.opera && !L.Browser.edge) {
        //         layer.bringToFront();
        //     }
        //     // console.log('halo');
        // }

        var m = L.map('mapid', {
            contextmenu: true,
            contextmenuWidth: 140,
            contextmenuItems: [{
                text: 'Street View',
                callback: showCoordinates
            },
                {
                    text: 'Export',
                    callback: geojsonExport
                }
                // {
                // 	text: 'Center Map',
                // 	callback: centerMap
                // },
                // {
                // 	text: 'Zoom in',
                // 	callback: zoomIn
                // },
                // {
                // 	text: 'Zoom out',
                // 	callback: zoomOut
                // }
            ]
        }).setView([-7.700935688163334, 114.02025856339858], 11);

        var baseMap = L.tileLayer('http://{s}.google.com/vt/lyrs=y&x={x}&y={y}&z={z}', {
            maxZoom: 35,
            subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
            attribution: 'Google Hybrid'
        });
        m.addLayer(baseMap);

        var kumpulanMarkers = L.markerClusterGroup();

        var options = {
            position: 'topleft', // Position to show the control. Values: 'topright', 'topleft', 'bottomright', 'bottomleft'
            unit: 'metres', // Show imperial or metric distances. Values: 'metres', 'landmiles', 'nauticalmiles'
            clearMeasurementsOnStop: true, // Clear all the measurements when the control is unselected
            showBearings: true, // Whether bearings are displayed within the tooltips
            bearingTextIn: 'In', // language dependend label for inbound bearings
            bearingTextOut: 'Out', // language dependend label for outbound bearings
            tooltipTextFinish: 'Click to <b>finish line</b><br>',
            tooltipTextDelete: 'Press SHIFT-key and click to <b>delete point</b>',
            tooltipTextMove: 'Click and drag to <b>move point</b><br>',
            tooltipTextResume: '<br>Press CTRL-key and click to <b>resume line</b>',
            tooltipTextAdd: 'Press CTRL-key and click to <b>add point</b>',
            // language dependend labels for point's tooltips
            measureControlTitleOn: 'Turn on PolylineMeasure', // Title for the control going to be switched on
            measureControlTitleOff: 'Turn off PolylineMeasure', // Title for the control going to be switched off
            measureControlLabel: '&#8614;', // Label of the Measure control (maybe a unicode symbol)
            measureControlClasses: [], // Classes to apply to the Measure control
            showClearControl: true, // Show a control to clear all the measurements
            clearControlTitle: 'Clear Measurements', // Title text to show on the clear measurements control button
            clearControlLabel: '&times', // Label of the Clear control (maybe a unicode symbol)
            clearControlClasses: [], // Classes to apply to clear control button
            showUnitControl: false, // Show a control to change the units of measurements
            distanceShowSameUnit: false, // Keep same unit in tooltips in case of distance less then 1 km/mi/nm
            unitControlTitle: {
                // Title texts to show on the Unit Control button
                text: 'Change Units',
                metres: 'metres',
                landmiles: 'land miles',
                nauticalmiles: 'nautical miles'
            },
            unitControlLabel: {
                // Unit symbols to show in the Unit Control button and measurement labels
                metres: 'm',
                kilometres: 'km',
                feet: 'ft',
                landmiles: 'mi',
                nauticalmiles: 'nm'
            },
            tempLine: {
                // Styling settings for the temporary dashed line
                color: '#00f', // Dashed line color
                weight: 2 // Dashed line weight
            },
            fixedLine: {
                // Styling for the solid line
                color: '#006', // Solid line color
                weight: 2 // Solid line weight
            },
            startCircle: {
                // Style settings for circle marker indicating the starting point of the polyline
                color: '#000', // Color of the border of the circle
                weight: 1, // Weight of the circle
                fillColor: '#0f0', // Fill color of the circle
                fillOpacity: 1, // Fill opacity of the circle
                radius: 3 // Radius of the circle
            },
            intermedCircle: {
                // Style settings for all circle markers between startCircle and endCircle
                color: '#000', // Color of the border of the circle
                weight: 1, // Weight of the circle
                fillColor: '#ff0', // Fill color of the circle
                fillOpacity: 1, // Fill opacity of the circle
                radius: 3 // Radius of the circle
            },
            currentCircle: {
                // Style settings for circle marker indicating the latest point of the polyline during drawing a line
                color: '#000', // Color of the border of the circle
                weight: 1, // Weight of the circle
                fillColor: '#f0f', // Fill color of the circle
                fillOpacity: 1, // Fill opacity of the circle
                radius: 3 // Radius of the circle
            },
            endCircle: {
                // Style settings for circle marker indicating the last point of the polyline
                color: '#000', // Color of the border of the circle
                weight: 1, // Weight of the circle
                fillColor: '#f00', // Fill color of the circle
                fillOpacity: 1, // Fill opacity of the circle
                radius: 3 // Radius of the circle
            }
        };

        var ikon = L.Icon.extend({
            options: {
                iconSize: [50, 50]
            }
        });

        var ikonKecil = L.Icon.extend({
            options: {
                iconSize: [24, 24]
            }
        });

        var watertap = new ikon({
                iconUrl: 'images/water-tap.png'
            }),
            recBlue = new ikon({
                iconUrl: 'images/recBlue.png'
            }),
            recGreen = new ikon({
                iconUrl: 'images/recGreen.png'
            }),
            recRed = new ikon({
                iconUrl: 'images/recRed.png'
            }),
            recYellow = new ikon({
                iconUrl: 'images/recYellow.png'
            }),
            waterMeter = new ikon({
                iconUrl: "{{ URL::asset('public/images/waterMeter.png') }}"
            }),
            gateValve = new ikonKecil({
                iconUrl: "{{ URL::asset('public/images/gateValve.png') }}"
            }),
            faucet = new ikon({
                iconUrl: 'images/faucet.png'
            }),
            saveWater = new ikon({
                iconUrl: 'images/save-water.png'
            });

        var baseLayers = [{
            name: 'Google Hybrid',
            layer: baseMap
        },
            {
                name: 'Open Street',
                layer: L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png')
            }
        ];

        var overLayers = [{
            group: 'Situbondo',
            layers: [{
                name: 'Gate Valve',
                layer: new L.GeoJSON.AJAX(["{{ URL::asset('public/maps/gateValve/01/01-gateValve.geojson') }}"], {
                    // style: function (feature) {
                    // 	return {
                    // 		color: 'red'
                    // 	};
                    // },

                    pointToLayer: function (feature, latlng) {
                        return new L.marker(
                            [feature.geometry.coordinates[1], feature.geometry.coordinates[0]], {
                                icon: gateValve
                            }
                        );
                    },
                    onEachFeature: function (feature, layer) {
                        // console.log(Object.entries(feature.properties));
                        layer.bindPopup(popUpGateValve(feature, layer));
                    }
                })
            },
                {
                    name: 'Pipa Pelayanan',
                    layer: new L.GeoJSON.AJAX(["{{ URL::asset('public/maps/pipapelayanan/01/01-pipapelayanan.geojson') }}"], {
                        style: m_style_pipapelayanan,
                        onEachFeature: function (feature, layer) {
                            // console.log(Object.entries(feature.properties));
                            layer.on({
                                // mouseover: highlightFeature,
                                mouseover: (e) => {
                                    if (layer == e.target) {
                                        // console.log('mouse over');
                                        layer.setStyle({
                                            weight: 7,
                                            color: '#0f0',
                                            dashArray: '',
                                            fillOpacity: 0.7
                                        });
                                    } else {
                                        console.log('tidak sama dengan layer');
                                    }
                                },
                                mouseout: (e) => {
                                    // let layerLocal = e.target;
                                    // layer.options.resetStyle(e.target);
                                    if (layer == e.target) {
                                        // console.log('mouse out');
                                        layer.setStyle({
                                            // fillColor: 'white',
                                            fillOpacity: 0.2,
                                            // color: 'green',
                                            // color: '#D97706',
                                            color: '#4caf50',
                                            dashArray: '',
                                            weight: 2,
                                            opacity: 0.7
                                        })
                                    } else {
                                        console.log('tidak sama dengan layer');
                                    }
                                },
                            });
                            layer.bindPopup(popUpPipaPelayanan(feature, layer));
                        }
                    })
                },
                {
                    name: 'Pipa Dist 110mm 4Inch',
                    layer: new L.GeoJSON.AJAX(["{{ URL::asset('public/maps/pipadist/01/01-pipadist-110mm-4i.geojson') }}"], {
                        style: m_style_pipadist_110,
                        onEachFeature: function (feature, layer) {
                            // console.log(Object.entries(feature.properties));
                            layer.on({
                                // mouseover: highlightFeature,
                                mouseover: (e) => {
                                    if (layer == e.target) {
                                        // console.log('mouse over');
                                        layer.setStyle({
                                            weight: 7,
                                            color: '#0f0',
                                            dashArray: '',
                                            fillOpacity: 0.7
                                        });
                                    } else {
                                        console.log('tidak sama dengan layer');
                                    }
                                },
                                mouseout: (e) => {
                                    // let layerLocal = e.target;
                                    // layer.options.resetStyle(e.target);
                                    if (layer == e.target) {
                                        // console.log('mouse out');
                                        layer.setStyle({
                                            fillColor: 'white',
                                            fillOpacity: 0.2,
                                            color: '#DC2626',
                                            dashArray: '',
                                            weight: 3,
                                            opacity: 0.7
                                        })
                                    } else {
                                        console.log('tidak sama dengan layer');
                                    }
                                },
                            });
                            layer.bindPopup(popUpPipaDist(feature, layer));
                        }
                    })
                },
                {
                    name: 'Pipa Dist 160mm 6Inch',
                    layer: new L.GeoJSON.AJAX(["{{ URL::asset('public/maps/pipadist/01/01-pipadist-160mm-6i.geojson') }}"], {
                        style: m_style_pipadist_160,
                        onEachFeature: function (feature, layer) {
                            // console.log(Object.entries(feature.properties));
                            layer.bindPopup(popUpPipaDist(feature, layer));
                            layer.on({
                                // mouseover: highlightFeature,
                                mouseover: (e) => {
                                    if (layer == e.target) {
                                        // console.log('mouse over');
                                        layer.setStyle({
                                            weight: 7,
                                            color: '#0f0',
                                            dashArray: '',
                                            fillOpacity: 0.7
                                        });
                                    } else {
                                        console.log('tidak sama dengan layer');
                                    }
                                },
                                mouseout: (e) => {
                                    // let layerLocal = e.target;
                                    // layer.options.resetStyle(e.target);
                                    if (layer == e.target) {
                                        // console.log('mouse out');
                                        layer.setStyle({
                                            fillColor: 'white',
                                            fillOpacity: 0.2,
                                            color: '#3B82F6',
                                            dashArray: '',
                                            weight: 5,
                                            opacity: 0.7
                                        })
                                    } else {
                                        console.log('tidak sama dengan layer');
                                    }
                                },
                            });
                        }
                    })
                },
                {
                    name: 'Sumur Boor',
                    layer: new L.GeoJSON.AJAX(["{{ URL::asset('public/maps/sumurboor/01/01-sumurboor.geojson') }}"], {
                        style: m_style_sumurboor,
                        onEachFeature: function (feature, layer) {
                            layer.bindPopup(popUpSumurboor(feature, layer));
                        }
                    })
                },
                {
                    name: 'Pelanggan Wil I',
                    layer: new L.GeoJSON.AJAX(["{{ URL::asset('public/maps/pelanggan/01/01-pelanggan-I.geojson') }}"], {
                        pointToLayer: clusterPelanggan,
                        onEachFeature: function (feature, layer) {
                            // layer.bindPopup('Nama Pelanggan : ' + feature.properties.NAMAPELANG);
                            layer.bindPopup(popUpPelanggan(feature, layer));
                        }
                    }).on('data:loaded', function (event) {
                        m.spin(false);
                        console.log('situbondo I : load success');
                    })
                },
                {
                    name: 'Pelanggan Wil II',
                    layer: new L.GeoJSON.AJAX(["{{ URL::asset('public/maps/pelanggan/01/01-pelanggan-II.geojson') }}"], {
                        pointToLayer: clusterPelanggan,
                        onEachFeature: function (feature, layer) {
                            // layer.bindPopup('Nama Pelanggan : ' + feature.properties.NAMAPELANG);
                            layer.bindPopup(popUpPelanggan(feature, layer));
                        }
                    }).on('data:loaded', function (event) {
                        m.spin(false);
                        console.log('situbondo II : load success');
                    })
                },
                {
                    name: 'Pelanggan Wil III',
                    layer: new L.GeoJSON.AJAX(["{{ URL::asset('public/maps/pelanggan/01/01-pelanggan-III.geojson') }}"], {
                        pointToLayer: clusterPelanggan,
                        onEachFeature: function (feature, layer) {
                            // layer.bindPopup('Nama Pelanggan : ' + feature.properties.NAMAPELANG);
                            layer.bindPopup(popUpPelanggan(feature, layer));
                        }
                    }).on('data:loaded', function (event) {
                        m.spin(false);
                        console.log('situbondo III : load success');
                    })
                },
                {
                    name: 'Pelanggan Wil IV',
                    layer: new L.GeoJSON.AJAX(["{{ URL::asset('public/maps/pelanggan/01/01-pelanggan-IV.geojson') }}"], {
                        pointToLayer: clusterPelanggan,
                        onEachFeature: function (feature, layer) {
                            layer.bindPopup(popUpPelanggan(feature, layer));
                        }
                    }).on('data:loaded', function (event) {
                        m.spin(false);
                        console.log('situbondo IV : load success');
                    })
                },
                {
                    name: 'Pelanggan Wil V',
                    layer: new L.GeoJSON.AJAX(["{{ URL::asset('public/maps/pelanggan/01/01-pelanggan-V.geojson') }}"], {
                        pointToLayer: clusterPelanggan,
                        onEachFeature: function (feature, layer) {
                            layer.bindPopup(popUpPelanggan(feature, layer));
                        }
                    }).on('data:loaded', function (event) {
                        m.spin(false);
                        console.log('situbondo V : load success');
                    })
                }
            ]
        },
            {
                group: 'Arjasa',
                layers: [{
                    name: 'Pipa Pelayanan',
                    layer: new L.GeoJSON.AJAX(["{{ URL::asset('public/maps/pipapelayanan/07/07-pipapelayanan.geojson') }}"], {
                        style: m_style_pipapelayanan,
                        onEachFeature: function (feature, layer) {
                            // console.log(Object.entries(feature.properties));
                            layer.on({
                                // mouseover: highlightFeature,
                                mouseover: (e) => {
                                    if (layer == e.target) {
                                        // console.log('mouse over');
                                        layer.setStyle({
                                            weight: 7,
                                            color: '#0f0',
                                            dashArray: '',
                                            fillOpacity: 0.7
                                        });
                                    } else {
                                        console.log('tidak sama dengan layer');
                                    }
                                },
                                mouseout: (e) => {
                                    // let layerLocal = e.target;
                                    // layer.options.resetStyle(e.target);
                                    if (layer == e.target) {
                                        // console.log('mouse out');
                                        layer.setStyle({
                                            // fillColor: 'white',
                                            fillOpacity: 0.2,
                                            // color: 'green',
                                            // color: '#D97706',
                                            color: '#4caf50',
                                            dashArray: '',
                                            weight: 2,
                                            opacity: 0.7
                                        })
                                    } else {
                                        console.log('tidak sama dengan layer');
                                    }
                                },
                            });
                            layer.bindPopup(popUpPipaPelayanan(feature, layer));
                            // drawnItems.addLayer(layer); // buat editing gambar
                        }
                    })
                },
                    {
                        name: 'Pipa Dist 110mm 4Inch',
                        layer: new L.GeoJSON.AJAX(["{{ URL::asset('public/maps/pipadist/07/07-pipadist-110mm-4i.geojson') }}"], {
                            // }).addTo(map)
                            style: m_style_pipadist_110,
                            onEachFeature: function (feature, layer) {
                                // console.log(Object.entries(feature.properties));
                                layer.on({
                                    // mouseover: highlightFeature,
                                    mouseover: (e) => {
                                        if (layer == e.target) {
                                            // console.log('mouse over');
                                            layer.setStyle({
                                                weight: 7,
                                                color: '#0f0',
                                                dashArray: '',
                                                fillOpacity: 0.7
                                            });
                                        } else {
                                            console.log('tidak sama dengan layer');
                                        }
                                    },
                                    mouseout: (e) => {
                                        // let layerLocal = e.target;
                                        // layer.options.resetStyle(e.target);
                                        if (layer == e.target) {
                                            // console.log('mouse out');
                                            layer.setStyle({
                                                fillColor: 'white',
                                                fillOpacity: 0.2,
                                                color: '#DC2626',
                                                dashArray: '',
                                                weight: 3,
                                                opacity: 0.7
                                            })
                                        } else {
                                            console.log('tidak sama dengan layer');
                                        }
                                    },
                                });
                                layer.bindPopup(popUpPipaDist(feature, layer));
                            }
                        })
                    },
                    {
                        name: 'Sumur Boor',
                        layer: new L.GeoJSON.AJAX(["{{ URL::asset('public/maps/sumurboor/07/07-sumurboor.geojson') }}"], {
                            style: m_style_sumurboor,
                            onEachFeature: function (feature, layer) {
                                layer.bindPopup(popUpSumurboor(feature, layer));
                            }
                        })
                    },
                    {
                        name: 'Pelanggan Wil I',
                        layer: new L.GeoJSON.AJAX(["{{ URL::asset('public/maps/pelanggan/07/07-pelanggan.geojson') }}"], {
                            pointToLayer: clusterPelanggan,
                            onEachFeature: function (feature, layer) {
                                // layer.bindPopup('Nama Pelanggan : ' + feature.properties.NAMAPELANG);
                                layer.bindPopup(popUpPelanggan(feature, layer));
                            }
                        }).on('data:loaded', function (event) {
                            m.spin(false);
                            console.log('Arjasa I : load success');
                        })
                    }
                ]
            }
        ];

        function clusterPelanggan(f, l) {
            let tanda = new L.marker([f.geometry.coordinates[1], f.geometry.coordinates[0]], {
                icon: waterMeter
            });
            var titik = L.featureGroup.subGroup(kumpulanMarkers);
            return titik.addLayer(tanda);
        }

        function popUpPelanggan(feature, layer) {
            var popupContent = '';

            var fNama = feature.properties.NAMAPELANG || feature.properties.nama;
            var fNoSambungan = feature.properties.NO_SAMBUNG || feature.properties.nosambunga;
            var fNoLanggan = feature.properties.NO_LANGGAN;
            var popupContent =
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
  <th scope="row">NAMA</th>\
  <td>' +
                fNama +
                '</td>\
  </tr>\
  <tr>\
  <th scope="row">NO SAMBUNGAN</th>\
  <td>' +
                fNoSambungan +
                '</td>\
  </tr>\
  <tr>\
  <th scope="row">NO LANGGANAN</th>\
  <td>' +
                fNoLanggan +
                '</td>\
  </tr>\
  </table>';

            return popupContent;
        }

        function popUpSumurboor(feature, layer) {
            var popupContent = '';

            var fPdam = feature.properties.PDAM;
            var fNamaSumur = feature.properties.NAMA_SUMUR;
            var popupContent =
                '<table>\
  <tr>\
  <th scope="row" style="text-align:center" colspan="2"><div style="Arial; font-size:14px; color: blue"> INFORMASI SUMUR BOOR </th>\
  </tr>\
  <tr>\
  <th scope="row">&nbsp; </th>\
  </tr>\
  <tr>\
  <th scope="row"></th>\
  </tr>\
  <tr>\
  <th scope="row">PDAM</th>\
  <td>' +
                fPdam +
                '</td>\
  </tr>\
  <tr>\
  <th scope="row">NAMA SUMUR</th>\
  <td>' +
                fNamaSumur +
                '</td>\
  </tr>\
  </table>';

            return popupContent;
        }

        function popUpPipaPelayanan(feature, layer) {
            var popupContent = '';

            // console.log(feature.properties);
            var fPdam = feature.properties.PDAM;
            var fUkuranPipa = feature.properties.UKURAN_PIP;
            var fBahanPipa = feature.properties.BAHAN_PIPA;
            var popupContent =
                '<table>\
  <tr>\
  <th scope="row" style="text-align:center" colspan="2"><div style="Arial; font-size:14px; color: blue"> INFORMASI PIPA PELAYANAN </th>\
  </tr>\
  <tr>\
  <th scope="row">&nbsp; </th>\
  </tr>\
  <tr>\
  <th scope="row"></th>\
  </tr>\
  <tr>\
  <th scope="row">PDAM</th>\
  <td>' +
                fPdam +
                '</td>\
  </tr>\
  <tr>\
  <th scope="row">UKURAN PIPA</th>\
  <td>' +
                fUkuranPipa +
                '</td>\
  </tr>\
  <tr>\
  <th scope="row">BAHAN PIPA</th>\
  <td>' +
                fBahanPipa +
                '</td>\
  </tr>\
  </table>';

            return popupContent;
        }

        function popUpPipaDist(feature, layer) {
            var popupContent = '';

            // console.log(feature.properties);
            var fPdam = feature.properties.PDAM;
            var fUkuranPipa = feature.properties.UKURAN_PIP;
            var fPanjangPipa = feature.properties.PANJANG_PIP;
            var fBahanPipa = feature.properties.BAHAN_PIPA;
            var popupContent =
                '<table>\
  <tr>\
  <th scope="row" style="text-align:center" colspan="2"><div style="Arial; font-size:14px; color: blue"> INFORMASI PIPA DISTRIBUSI </th>\
  </tr>\
  <tr>\
  <th scope="row">&nbsp; </th>\
  </tr>\
  <tr>\
  <th scope="row"></th>\
  </tr>\
  <tr>\
  <th scope="row">PDAM</th>\
  <td>' +
                fPdam +
                '</td>\
  </tr>\
  <tr>\
  <th scope="row">UKURAN PIPA</th>\
  <td>' +
                fUkuranPipa +
                '</td>\
  </tr>\
  <tr>\
  <th scope="row">PANJANG PIPA</th>\
  <td>' +
                fPanjangPipa +
                '</td>\
  </tr>\
  <tr>\
  <th scope="row">BAHAN PIPA</th>\
  <td>' +
                fBahanPipa +
                '</td>\
  </tr>\
  </table>';

            return popupContent;
        }

        function popUpGateValve(feature, layer) {
            var popupContent = '';

            // console.log(feature.properties);
            var fPdam = feature.properties.PDAM;
            var fNamaSumur = feature.properties.NAMA_SUMUR;
            var fJalan = feature.properties.JALAN;
            var popupContent =
                '<table>\
  <tr>\
  <th scope="row" style="text-align:center" colspan="2"><div style="Arial; font-size:14px; color: blue"> INFORMASI GATE VALVE </th>\
  </tr>\
  <tr>\
  <th scope="row">&nbsp; </th>\
  </tr>\
  <tr>\
  <th scope="row"></th>\
  </tr>\
  <tr>\
  <th scope="row">PDAM</th>\
  <td>' +
                fPdam +
                '</td>\
  </tr>\
  <tr>\
  <th scope="row">NAMA SUMUR</th>\
  <td>' +
                fNamaSumur +
                '</td>\
  </tr>\
  <tr>\
  <th scope="row">JALAN</th>\
  <td>' +
                fJalan +
                '</td>\
  </tr>\
  </table>';

            return popupContent;
        }

        var panelLayers = new L.Control.PanelLayers(baseLayers, overLayers, {
            // compact:true,
            // collapsed:true,
            collapsibleGroups: true,
            title: 'PDAM MAPS'
            // });
        });

        m.addControl(panelLayers);
        kumpulanMarkers.addTo(m);
        m.spin(true);

        var polylineMeasure = L.control.polylineMeasure(options).addTo(m);

        m.on('polylinemeasure:finish', () => {
            // let isiEnt = Object.entries(polylineMeasure._currentLine);
            let isiVal = Object.values(polylineMeasure._currentLine);
            let hasil = isiVal[5];
            // console.log(hasil);
            alert('jarak dari start - end adalah : ' + Math.round(hasil) + ' meter');
        });

        // drawing
        // -----------
        var drawnItems = new L.FeatureGroup();
        m.addLayer(drawnItems);
        var drawControl = new L.Control.Draw({
            edit: {
                featureGroup: drawnItems,
                poly: {
                    allowIntersection: false
                }
            },
            draw: {
                circle: false,
                circlemarker: false,
                polygon: {
                    allowIntersection: false,
                    showArea: true
                }
            }
        });
        m.addControl(drawControl);

        // Truncate value based on number of decimals
        var _round = function (num, len) {
            return Math.round(num * Math.pow(10, len)) / Math.pow(10, len);
        };
        // Helper method to format LatLng object (x.xxxxxx, y.yyyyyy)
        var strLatLng = function (latlng) {
            return '(' + _round(latlng.lat, 6) + ', ' + _round(latlng.lng, 6) + ')';
        };

        // Generate popup content based on layer type
        // - Returns HTML string, or null if unknown object
        var getPopupContent = function (layer) {
            // Marker - add lat/long
            if (layer instanceof L.Marker || layer instanceof L.CircleMarker) {
                return strLatLng(layer.getLatLng());
                // Circle - lat/long, radius
            } else if (layer instanceof L.Circle) {
                var center = layer.getLatLng(),
                    radius = layer.getRadius();
                return 'Center: ' + strLatLng(center) + '<br />' + 'Radius: ' + _round(radius, 2) + ' m';
                // Rectangle/Polygon - area
            } else if (layer instanceof L.Polygon) {
                var latlngs = layer._defaultShape ? layer._defaultShape() : layer.getLatLngs(),
                    area = L.GeometryUtil.geodesicArea(latlngs);
                return 'Area: ' + L.GeometryUtil.readableArea(area, true);
                // Polyline - distance
            } else if (layer instanceof L.Polyline) {
                var latlngs = layer._defaultShape ? layer._defaultShape() : layer.getLatLngs(),
                    distance = 0;
                if (latlngs.length < 2) {
                    return 'Distance: N/A';
                } else {
                    for (var i = 0; i < latlngs.length - 1; i++) {
                        distance += latlngs[i].distanceTo(latlngs[i + 1]);
                    }
                    if (_round(distance, 2) > 1000) {
                        return 'Distance: ' + _round(distance, 2) / 1000 + ' km'; // kilometers
                    } else {
                        return 'Distance: ' + _round(distance, 2) + ' m'; // meters
                    }
                }
            }
            return null;
        };

        // Object created - bind popup to layer, add to feature group
        m.on(L.Draw.Event.CREATED, function (event) {
            console.log(Object.entries(event));
            var layer = event.layer;
            // var content = getPopupContent(layer);
            // if (content !== null) {
            // 	layer.bindPopup(content);
            // }

            // // Add info to feature properties
            // feature = layer.feature = layer.feature || {};
            // feature.type = feature.type || 'Feature';
            // var props = (feature.properties = feature.properties || {}); // Intialize feature.properties
            // props.info = content;
            drawnItems.addLayer(layer);
            console.log(JSON.stringify(drawnItems.toGeoJSON()));
        });

        // Object(s) edited - update popups
        m.on(L.Draw.Event.EDITED, function (event) {
            var layers = event.layers,
                content = null;
            // layers.eachLayer(function (layer) {
            // 	content = getPopupContent(layer);
            // 	if (content !== null) {
            // 		layer.setPopupContent(content);
            // 	}

            // 	// Update info to feature properties
            // 	var layer = layer;
            // 	feature = layer.feature = layer.feature || {};
            // 	var props = (feature.properties = feature.properties || {});
            // 	props.info = content;
            // });
            console.log(JSON.stringify(drawnItems.toGeoJSON()));
        });

        // Object(s) deleted - update console log
        m.on(L.Draw.Event.DELETED, function (event) {
            console.log(JSON.stringify(drawnItems.toGeoJSON()));
        });

        // -----------
    }
</script>
</body>

</html>
{{--vim:fileencoding=utf-8:ft=php:foldmethod=marker--}}
