7// disable right click
document.addEventListener("contextmenu", function (e) {
    // {{{
    e.preventDefault();
}); // }}}

// disable F12
document.onkeydown = function (e) {
    // {{{
    // if (event.keyCode == 123) {
    //     return false;
    // }
    if (e.ctrlKey && e.shiftKey && e.keyCode == "I".charCodeAt(0)) {
        return false;
    }
    if (e.ctrlKey && e.shiftKey && e.keyCode == "C".charCodeAt(0)) {
        return false;
    }
    if (e.ctrlKey && e.shiftKey && e.keyCode == "J".charCodeAt(0)) {
        return false;
    }
    if (e.ctrlKey && e.keyCode == "U".charCodeAt(0)) {
        return false;
    }
    if (e.ctrlKey && e.keyCode == "S".charCodeAt(0)) {
        return false;
    }
}; // }}}

// var map = L.map('map').setView([-7.700935688163334, 114.02025856339858], 11);

function showCoordinates(e) {
    // {{{
    // alert(e.latlng);
    let lat = e.latlng.lat;
    let long = e.latlng.lng;
    // alert('lat: '+lat+', long: '+long)
    // window.open('http://maps.google.com/maps?q=&layer=c&cbll='+lat+','+long+'&cbp=11,0,0,0,0', '_blank');
    window.open(
        "http://maps.google.com/maps?q=&layer=c&cbll=" +
        lat +
        "," +
        long +
        "&cbp=11,0,0,0,0"
    );
    // http://maps.google.com/maps?q=&layer=c&cbll=31.335198,-89.287204&cbp=11,0,0,0,0
} // }}}

function m_style_pipadist_110(f) {
    // {{{
    return {
        fillColor: "white",
        fillOpacity: 0.2,
        color: "#DC2626",
        dashArray: "",
        weight: 3,
        opacity: 0.7,
    };
} // }}}

function m_style_pipadist_160(f) {
    // {{{
    return {
        fillColor: "white",
        fillOpacity: 0.2,
        color: "#3B82F6",
        dashArray: "",
        weight: 5,
        opacity: 0.7,
    };
} // }}}

function m_style_pipapelayanan(f) {
    // {{{
    return {
        // fillColor: 'white',
        fillOpacity: 0.2,
        // color: 'green',
        // color: '#D97706',
        color: "#4caf50",
        dashArray: "",
        weight: 2,
        opacity: 0.7,
    };
} // }}}

function m_style_sumurboor(f) {
    // {{{
    return {
        fillColor: "red",
        fillOpacity: 0.2,
        color: "#F472B6",
        dashArray: "",
        weight: 2,
        opacity: 0.7,
    };
} // }}}

// Export to GeoJSON File
function geojsonExport() {
    // {{{
    let nodata = '{"type":"FeatureCollection","features":[]}';
    let jsonData = JSON.stringify(drawnItems.toGeoJSON());
    let dataUri =
        "data:application/json;charset=utf-8," + encodeURIComponent(jsonData);
    let datenow = new Date();
    let datenowstr = datenow.toLocaleDateString("id-ID");
    let exportFileDefaultName = "export_draw_" + datenowstr + ".geojson";
    let linkElement = document.createElement("a");
    linkElement.setAttribute("href", dataUri);
    linkElement.setAttribute("download", exportFileDefaultName);
    if (jsonData == nodata) {
        alert("No features are drawn");
    } else {
        linkElement.click();
    }
} // }}}

function centerMap(e) {
    // {{{
    m.panTo(e.latlng);
} // }}}

function zoomIn(e) {
    // {{{
    m.zoomIn();
} // }}}

function zoomOut(e) {
    // {{{
    m.zoomOut();
} // }}}

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

var m = L.map("mapid", {
    // {{{
    contextmenu: true,
    contextmenuWidth: 140,
    contextmenuItems: [
        {
            text: "Street View",
            callback: showCoordinates,
        },
        {
            text: "Export",
            callback: geojsonExport,
        },
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
    ],
}).setView([-7.700935688163334, 114.02025856339858], 11); // }}}

var baseMap = L.tileLayer("http://{s}.google.com/vt/lyrs=y&x={x}&y={y}&z={z}", {
    // {{{
    maxZoom: 35,
    subdomains: ["mt0", "mt1", "mt2", "mt3"],
    attribution: "Google Hybrid",
}); // }}}
m.addLayer(baseMap);

var kumpulanMarkers = L.markerClusterGroup();

var options = {
    // {{{
    position: "topleft", // Position to show the control. Values: 'topright', 'topleft', 'bottomright', 'bottomleft'
    unit: "metres", // Show imperial or metric distances. Values: 'metres', 'landmiles', 'nauticalmiles'
    clearMeasurementsOnStop: true, // Clear all the measurements when the control is unselected
    showBearings: true, // Whether bearings are displayed within the tooltips
    bearingTextIn: "In", // language dependend label for inbound bearings
    bearingTextOut: "Out", // language dependend label for outbound bearings
    tooltipTextFinish: "Click to <b>finish line</b><br>",
    tooltipTextDelete: "Press SHIFT-key and click to <b>delete point</b>",
    tooltipTextMove: "Click and drag to <b>move point</b><br>",
    tooltipTextResume: "<br>Press CTRL-key and click to <b>resume line</b>",
    tooltipTextAdd: "Press CTRL-key and click to <b>add point</b>",
    // language dependend labels for point's tooltips
    measureControlTitleOn: "Turn on PolylineMeasure", // Title for the control going to be switched on
    measureControlTitleOff: "Turn off PolylineMeasure", // Title for the control going to be switched off
    measureControlLabel: "&#8614;", // Label of the Measure control (maybe a unicode symbol)
    measureControlClasses: [], // Classes to apply to the Measure control
    showClearControl: true, // Show a control to clear all the measurements
    clearControlTitle: "Clear Measurements", // Title text to show on the clear measurements control button
    clearControlLabel: "&times", // Label of the Clear control (maybe a unicode symbol)
    clearControlClasses: [], // Classes to apply to clear control button
    showUnitControl: false, // Show a control to change the units of measurements
    distanceShowSameUnit: false, // Keep same unit in tooltips in case of distance less then 1 km/mi/nm
    unitControlTitle: {
        // Title texts to show on the Unit Control button
        text: "Change Units",
        metres: "metres",
        landmiles: "land miles",
        nauticalmiles: "nautical miles",
    },
    unitControlLabel: {
        // Unit symbols to show in the Unit Control button and measurement labels
        metres: "m",
        kilometres: "km",
        feet: "ft",
        landmiles: "mi",
        nauticalmiles: "nm",
    },
    tempLine: {
        // Styling settings for the temporary dashed line
        color: "#00f", // Dashed line color
        weight: 2, // Dashed line weight
    },
    fixedLine: {
        // Styling for the solid line
        color: "#006", // Solid line color
        weight: 2, // Solid line weight
    },
    startCircle: {
        // Style settings for circle marker indicating the starting point of the polyline
        color: "#000", // Color of the border of the circle
        weight: 1, // Weight of the circle
        fillColor: "#0f0", // Fill color of the circle
        fillOpacity: 1, // Fill opacity of the circle
        radius: 3, // Radius of the circle
    },
    intermedCircle: {
        // Style settings for all circle markers between startCircle and endCircle
        color: "#000", // Color of the border of the circle
        weight: 1, // Weight of the circle
        fillColor: "#ff0", // Fill color of the circle
        fillOpacity: 1, // Fill opacity of the circle
        radius: 3, // Radius of the circle
    },
    currentCircle: {
        // Style settings for circle marker indicating the latest point of the polyline during drawing a line
        color: "#000", // Color of the border of the circle
        weight: 1, // Weight of the circle
        fillColor: "#f0f", // Fill color of the circle
        fillOpacity: 1, // Fill opacity of the circle
        radius: 3, // Radius of the circle
    },
    endCircle: {
        // Style settings for circle marker indicating the last point of the polyline
        color: "#000", // Color of the border of the circle
        weight: 1, // Weight of the circle
        fillColor: "#f00", // Fill color of the circle
        fillOpacity: 1, // Fill opacity of the circle
        radius: 3, // Radius of the circle
    },
}; // }}}

var ikon = L.Icon.extend({
    options: {
        iconSize: [50, 50],
    },
});

var ikonKecil = L.Icon.extend({
    options: {
        iconSize: [24, 24],
    },
});

var watertap = new ikon({
        // {{{
        iconUrl: "images/water-tap.png",
    }),
    recBlue = new ikon({
        iconUrl: "images/recBlue.png",
    }),
    recGreen = new ikon({
        iconUrl: "images/recGreen.png",
    }),
    recRed = new ikon({
        iconUrl: "images/recRed.png",
    }),
    recYellow = new ikon({
        iconUrl: "images/recYellow.png",
    }),
    waterMeter = new ikon({
        iconUrl: "public/images/waterMeter.png",
    }),
    gateValve = new ikonKecil({
        iconUrl: "public/images/gateValve.png",
    }),
    faucet = new ikon({
        iconUrl: "images/faucet.png",
    }),
    saveWater = new ikon({
        iconUrl: "images/save-water.png",
    }); // }}}

var baseLayers = [
    //{{{
    {
        name: "Google Hybrid",
        layer: baseMap,
    },
    {
        name: "Open Street",
        layer: L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png"),
    },
    {
        name: "Google Altered",
        layer: L.tileLayer("http://mt0.google.com/vt/lyrs=r&hl=en&x={x}&y={y}&z={z}"),
    },
]; // }}}

var overLayers = [
    // {{{
    {
        group: 'Arjasa',
        layers: [{
            name: 'Pipa Pelayanan',
            layer: new L.GeoJSON.AJAX(["public/maps/pipapelayanan/07/07-pipapelayanan.geojson"], {
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
                layer: new L.GeoJSON.AJAX(["public/maps/pipadist/07/07-pipadist-110mm-4i.geojson"], {
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
                layer: new L.GeoJSON.AJAX(["public/maps/sumurboor/07/07-sumurboor.geojson"], {
                    style: m_style_sumurboor,
                    onEachFeature: function (feature, layer) {
                        layer.bindPopup(popUpSumurboor(feature, layer));
                    }
                })
            },
            {
                name: 'Pelanggan Wil I',
                layer: new L.GeoJSON.AJAX(["public/maps/pelanggan/07/07-pelanggan.geojson"], {
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
    },
]; // }}}

function clusterPelanggan(f, l) {
    // {{{
    let tanda = new L.marker(
        [f.geometry.coordinates[1], f.geometry.coordinates[0]],
        {
            icon: waterMeter,
        }
    );
    var titik = L.featureGroup.subGroup(kumpulanMarkers);
    return titik.addLayer(tanda);
} // }}}

function popUpPelanggan(feature, layer) {
    // {{{
    var popupContent = "";

    var fNama = feature.properties.NAMAPELANG || feature.properties.nama;
    var fNoSambungan =
        feature.properties.NO_SAMBUNG || feature.properties.nosambunga;
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
        "</td>\
</tr>\
</table>";

    return popupContent;
} // }}}

function popUpSumurboor(feature, layer) {
    // {{{
    var popupContent = "";

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
        "</td>\
</tr>\
</table>";

    return popupContent;
} // }}}

function popUpPipaPelayanan(feature, layer) {
    // {{{
    var popupContent = "";

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
        "</td>\
</tr>\
</table>";

    return popupContent;
} // }}}

function popUpPipaDist(feature, layer) {
    // {{{
    var popupContent = "";

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
        "</td>\
</tr>\
</table>";

    return popupContent;
} // }}}

function popUpGateValve(feature, layer) {
    // {{{
    var popupContent = "";

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
        "</td>\
</tr>\
</table>";

    return popupContent;
} // }}}

var panelLayers = new L.Control.PanelLayers(baseLayers, overLayers, {
    // {{{
    // compact:true,
    // collapsed:true,
    collapsibleGroups: true,
    title: "PDAM MAPS",
    // });
}); // }}}

m.addControl(panelLayers);
kumpulanMarkers.addTo(m);
m.spin(true);

var polylineMeasure = L.control.polylineMeasure(options).addTo(m);

m.on("polylinemeasure:finish", () => {
    // {{{
    // let isiEnt = Object.entries(polylineMeasure._currentLine);
    let isiVal = Object.values(polylineMeasure._currentLine);
    let hasil = isiVal[5];
    // console.log(hasil);
    alert("jarak dari start - end adalah : " + Math.round(hasil) + " meter");
}); // }}}

// drawing
// -----------
var drawnItems = new L.FeatureGroup();
m.addLayer(drawnItems);
var drawControl = new L.Control.Draw({
    // {{{
    edit: {
        featureGroup: drawnItems,
        poly: {
            allowIntersection: false,
        },
    },
    draw: {
        circle: false,
        circlemarker: false,
        polygon: {
            allowIntersection: false,
            showArea: true,
        },
    },
}); // }}}
m.addControl(drawControl);

// Truncate value based on number of decimals
var _round = function (num, len) {
    return Math.round(num * Math.pow(10, len)) / Math.pow(10, len);
};
// Helper method to format LatLng object (x.xxxxxx, y.yyyyyy)
var strLatLng = function (latlng) {
    return "(" + _round(latlng.lat, 6) + ", " + _round(latlng.lng, 6) + ")";
};

// Generate popup content based on layer type
// - Returns HTML string, or null if unknown object
var getPopupContent = function (layer) {
    // {{{
    // Marker - add lat/long
    if (layer instanceof L.Marker || layer instanceof L.CircleMarker) {
        return strLatLng(layer.getLatLng());
        // Circle - lat/long, radius
    } else if (layer instanceof L.Circle) {
        var center = layer.getLatLng(),
            radius = layer.getRadius();
        return (
            "Center: " +
            strLatLng(center) +
            "<br />" +
            "Radius: " +
            _round(radius, 2) +
            " m"
        );
        // Rectangle/Polygon - area
    } else if (layer instanceof L.Polygon) {
        var latlngs = layer._defaultShape
            ? layer._defaultShape()
            : layer.getLatLngs(),
            area = L.GeometryUtil.geodesicArea(latlngs);
        return "Area: " + L.GeometryUtil.readableArea(area, true);
        // Polyline - distance
    } else if (layer instanceof L.Polyline) {
        var latlngs = layer._defaultShape
            ? layer._defaultShape()
            : layer.getLatLngs(),
            distance = 0;
        if (latlngs.length < 2) {
            return "Distance: N/A";
        } else {
            for (var i = 0; i < latlngs.length - 1; i++) {
                distance += latlngs[i].distanceTo(latlngs[i + 1]);
            }
            if (_round(distance, 2) > 1000) {
                return "Distance: " + _round(distance, 2) / 1000 + " km"; // kilometers
            } else {
                return "Distance: " + _round(distance, 2) + " m"; // meters
            }
        }
    }
    return null;
}; // }}}

// Object created - bind popup to layer, add to feature group
m.on(L.Draw.Event.CREATED, function (event) {
    // {{{
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
}); // }}}

// Object(s) edited - update popups
m.on(L.Draw.Event.EDITED, function (event) {
    // {{{
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
}); // }}}

// Object(s) deleted - update console log
m.on(L.Draw.Event.DELETED, function (event) {
    console.log(JSON.stringify(drawnItems.toGeoJSON()));
});

// new L.control.search({
//     layer: overLayers,
//     initial: false,
//     propertyName: "",
// }).addTo(m);

// vim:fileencoding=utf-8:ft=javascript:foldmethod=marker
