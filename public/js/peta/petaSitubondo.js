/**
 TODO  on Tue 09 Nov 2021 19:19:24
  ᚛ sumur boor
  ᚛ fitur search
  ᚛ measure
  ᚛ gate valve
  ᚛ streetview
*/

// {{{ disable right click
document.addEventListener("contextmenu", function (e) {
    e.preventDefault();
}); // }}}

// {{{ disable F12
document.onkeydown = function (e) {
    if (e.keyCode == 123) {
        return false;
    }
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

// {{{ variable
var jsonPipa1 = window.pipa1;
var jsonPipa1Setengah = window.pipa1Setengah;
var jsonPipa2 = window.pipa2;
var jsonPipa3 = window.pipa3;
var jsonPipa4 = window.pipa4;
var jsonPipa6 = window.pipa6;
var jsonPipa8 = window.pipa8;
var jsonPipa12 = window.pipa12;
var jsonPelanggan = window.pelanggan;
/* var kumpulanpelanggan = L.markerClusterGroup(); */
/* console.debug(jsonPelanggan); */
// }}}

// {{{ progres bar di console
let progress;
function updateProgressBar(processed, total, elapsed) {
    if (elapsed > 1000) {
        // if it takes more than a second to load, display the progress bar:
        progress = Math.round((processed / total) * 100) + "%";
        console.debug("me-load data pelanggan: ", progress);
    }

    if (processed === total) {
        // all pelanggan processed - hide the progress bar:
        console.debug("data pelanggan berhasil di load: ", processed);
    }
} // }}}

// {{{ ikon
var ikon = L.Icon.extend({
    options: {
        iconSize: [50, 50],
    },
});

var waterMeter = new ikon({
    iconUrl: "public/images/waterMeter.png",
}); // }}}

// {{{ overlayMaps pipa1
var pipa1 = L.geoJSON(jsonPipa1, {
    style: function (feature) {
        return { color: "#5f92b8" };
        // return layer.feature.properties.color; // contoh
    },
}).bindPopup(function (layer) {
    /* return layer.feature.properties.description; */
    return layer.feature.properties.ukuran_pipa; // ukuran_pipa ini ambil dari kolom database
}); // }}}

// {{{ overlayMaps pipa1Setengah
var pipa1Setengah = L.geoJSON(jsonPipa1Setengah, {
    style: function (feature) {
        return { color: "#00b4b7" };
        // return layer.feature.properties.color; // contoh
    },
}).bindPopup(function (layer) {
    /* return layer.feature.properties.description; */
    return layer.feature.properties.ukuran_pipa; // ukuran_pipa ini ambil dari kolom database
}); // }}}

// {{{ overlayMaps pipa2
var pipa2 = L.geoJSON(jsonPipa2, {
    style: function (feature) {
        return { color: "#ffdd43" };
        // return layer.feature.properties.color // contoh
    },
}).bindPopup(function (layer) {
    /* return layer.feature.properties.description; */
    return layer.feature.properties.ukuran_pipa; // ukuran_pipa ini ambil dari kolom database
}); // }}}

// {{{ overlayMaps pipa3
var pipa3 = L.geoJSON(jsonPipa3, {
    style: function (feature) {
        return { color: "#04ff00" };
        // return layer.feature.properties.color; // contoh
    },
}).bindPopup(function (layer) {
    /* return layer.feature.properties.description; */
    return layer.feature.properties.ukuran_pipa; // ukuran_pipa ini ambil dari kolom database
}); // }}}

// {{{ overlayMaps pipa4
var pipa4 = L.geoJSON(jsonPipa4, {
    style: function (feature) {
        return { color: "#0400f8" };
        // return layer.feature.properties.color; // contoh
    },
}).bindPopup(function (layer) {
    /* return layer.feature.properties.description; */
    return layer.feature.properties.ukuran_pipa; // ukuran_pipa ini ambil dari kolom database
}); // }}}

// {{{ overlayMaps pipa6
var pipa6 = L.geoJSON(jsonPipa6, {
    style: function (feature) {
        return { color: "#e59c00" };
        // return layer.feature.properties.color; // contoh
    },
}).bindPopup(function (layer) {
    /* return layer.feature.properties.description; */
    return layer.feature.properties.ukuran_pipa; // ukuran_pipa ini ambil dari kolom database
}); // }}}

// {{{ overlayMaps pipa8
var pipa8 = L.geoJSON(jsonPipa8, {
    style: function (feature) {
        return { color: "#ff0000" };
        // return layer.feature.properties.color; // contoh
    },
}).bindPopup(function (layer) {
    /* return layer.feature.properties.description; */
    return layer.feature.properties.ukuran_pipa; // ukuran_pipa ini ambil dari kolom database
}); // }}}

// {{{ overlayMaps pipa12
var pipa12 = L.geoJSON(jsonPipa12, {
    style: function (feature) {
        return { color: "#ff7979" };
        // return layer.feature.properties.color; // contoh
    },
}).bindPopup(function (layer) {
    /* return layer.feature.properties.description; */
    return layer.feature.properties.ukuran_pipa; // ukuran_pipa ini ambil dari kolom database
}); // }}}

// {{{ fungsi popUpPelanggan
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
        "</td>\
                  </tr>\
                </table>";

    return popupContent;
} // }}}

// {{{ pelanggan
const pelanggan = L.markerClusterGroup({
        chunkedLoading: true,
        chunkProgress: updateProgressBar,
    }),
    groupPelanggan = L.featureGroup.subGroup(pelanggan);
for (let i = 0; i < jsonPelanggan.features.length; i++) {
    const atribut = jsonPelanggan.features[i].properties;
    const geom = jsonPelanggan.features[i].geometry.coordinates;
    const nama = atribut.namapelang,
        sambungan = atribut.no_sambung,
        langgan = atribut.no_langgan,
        alamat = atribut.alamat,
        unit = atribut.unit;
    /* const marker = L.marker(new L.LatLng(geom[1], geom[0]), {textNama : nama, icon: waterMeter }); */
    const marker = L.marker(new L.LatLng(geom[1], geom[0]), {
        icon: waterMeter,
    });
    /* marker.bindPopup(nama); */
    marker.bindPopup(popUpPelanggan(nama, sambungan, langgan, alamat, unit));
    marker.addTo(groupPelanggan);
} // }}}

// {{{ basemap
var googleHybrid = L.tileLayer(
    "http://{s}.google.com/vt/lyrs=y&x={x}&y={y}&z={z}",
    {
        maxZoom: 35,
        subdomains: ["mt0", "mt1", "mt2", "mt3"],
        attribution: "Google Hybrid",
    }
);

var osm = L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
    maxZoom: 35,
    subdomains: ["mt0", "mt1", "mt2", "mt3"],
    attribution: "Open Street Map",
});

var googleAltered = L.tileLayer(
    "http://mt0.google.com/vt/lyrs=r&hl=en&x={x}&y={y}&z={z}",
    {
        maxZoom: 35,
        subdomains: ["mt0", "mt1", "mt2", "mt3"],
        attribution: "Google Altered",
    }
);

var googleMaps = L.tileLayer(
    "https://mt1.google.com/vt/lyrs=m&x={x}&y={y}&z={z}",
    {
        maxZoom: 35,
        subdomains: ["mt0", "mt1", "mt2", "mt3"],
        attribution: "Google Maps",
    }
);
// }}}

// {{{ initialize map to m variable
var m = L.map("mapid", {
    center: [-7.700935688163334, 114.02025856339858],
    zoom: 11,
    layers: [googleMaps],
    contextmenu: true,
    contextmenuWidth: 140,
    contextmenuItems: [
        {
            text: "Street View",
            callback: showCoordinates,
        },
    ],
}); // }}}

// {{{ panel layer baseMaps
var baseMaps = {
    "<span class= 'ml-2 mr-3'>Google Hybrid</span>": googleHybrid,
    "<span class= 'ml-2 mr-3'>Google Streets</span>": googleAltered,
    "<span class= 'ml-2 mr-3'>Google Maps</span>": googleMaps,
    "<span class= 'ml-2 mr-3'>Open Street Map</span>": osm,
}; // }}}

// {{{ panel layer overlayMaps
var overlayMaps = {
    "<span class= 'ml-2 mr-3'>Pipa 1</span>": pipa1,
    "<span class= 'ml-2 mr-3'>Pipa 1.5</span>": pipa1Setengah,
    "<span class= 'ml-2 mr-3'>Pipa 2</span>": pipa2,
    "<span class= 'ml-2 mr-3'>Pipa 3</span>": pipa3,
    "<span class= 'ml-2 mr-3'>Pipa 4</span>": pipa4,
    "<span class= 'ml-2 mr-3'>Pipa 6</span>": pipa6,
    "<span class= 'ml-2 mr-3'>Pipa 8</span>": pipa8,
    "<span class= 'ml-2 mr-3'>Pipa 12</span>": pipa12,
}; // }}}

// {{{ polylineMeasure
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

var polylineMeasure = L.control.polylineMeasure(options).addTo(m);

m.on("polylinemeasure:finish", () => {
    // let isiEnt = Object.entries(polylineMeasure._currentLine);
    let isiVal = Object.values(polylineMeasure._currentLine);
    let hasil = isiVal[5];
    // console.log(hasil);
    alert("jarak dari start - end adalah : " + Math.round(hasil) + " meter");
}); // }}}

// {{{ fungsi showCoordinates
function showCoordinates(e) {
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

// {{{ enable disable layer
pelanggan.addTo(m);
/* m.addLayer(pelanggan); // snub */
var layerAsli = L.control.layers(baseMaps, overlayMaps).addTo(m);
// layerAsli.addOverlay(drawnItems, "<span class= 'ml-1'>drawnItems</span>"); // bisa
layerAsli.addOverlay(
    groupPelanggan,
    "<span class= 'ml-2 mr-3'>Pelanggan</span>"
);
/* groupPelanggan.addTo(m); // untuk control di layer nya aktif atau tidak */
// }}}

// vim:fileencoding=utf-8:ft=javascript:foldmethod=marker
