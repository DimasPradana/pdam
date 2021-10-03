var drawnItems = new L.FeatureGroup(); // bisa
console.debug("masuk petaTestDB.js");

async function fetchPipaPelayananArjasa() {
    try {
        const response = await fetch('testdb2');
        const featureCollection = await response.json();
        // console.log(featureCollection);
        return featureCollection;
    } catch (err) {
        console.error(err);
    }
}

const hasil = fetchPipaPelayananArjasa()
    .then(hasil => {
        try {
            hasil;
            // console.debug("hasil debug : " + hasil);
        } catch (err) {
            console.error("ada error : " + err)
        }
    });

// overlayMaps
// var pipapelayanan = new L.GeoJSON.AJAX(
//         ["public/maps/pipapelayanan/07/test.geojson"],
//         {
//             // style: m_style_pipapelayanan,
//             onEachFeature: function (feature, layer) {
//                 // console.log(Object.entries(feature.properties));
//                 drawnItems.addLayer(layer); // bisa
//                 layer.on({
//                     click: (e) => {
//                         alert("click dong");
//                     },
//                 });
//                 // layer.bindPopup("popup pipa pelayanan");
//             },
//         }
//     ),
var pipapelayanan = new L.geoJSON(hasil,
    {
        // style: m_style_pipapelayanan,
        onEachFeature: function
            (feature, layer) {
            // console.log(Object.entries(feature.properties));
            drawnItems.addLayer(layer); // bisa
            layer.on({
                click: (e) => {
                    alert("click dong");
                },
            });
            // layer.bindPopup("popup pipa pelayanan");
        }
        ,
    }
)
pelanggan = new L.GeoJSON.AJAX(
    ["public/maps/pelanggan/07/07-pelanggan.geojson"],
    {
        onEachFeature: function (feature, layer) {
            // drawnItems.addLayer(layer); // bisa
            layer.bindPopup("halo pelanggan");
        },
    }
);
// var arjasa = L.layerGroup([pipapelayanan]);

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
    // layers: [streets, arjasa]
    layers: [streets],
});

var baseMaps = {
    "<span class= 'ml-1'>Hybrid</span>": hybrid,
    "<span class= 'ml-1'>Streets</span>": streets,
};

var overlayMaps = {
    "<span class= 'ml-1'>Pipa Pelayanan</span>": pipapelayanan,
    "<span class= 'ml-1'>Pelanggan</span>": pelanggan,
};

var drawControl = new L.Control.Draw({
    edit: {
        featureGroup: drawnItems, // bisa
    },
});
m.addControl(drawControl);

m.on(L.Draw.Event.CREATED, function (event) {
    const layer = event.layer;
    drawnItems.addLayer(layer); // bisa
    drawnItems.toGeoJSON(); // create
});

// m.on(L.Draw.Event.EDITED, function (event) {
//     const layer = event.layer;
//     drawnItems.addLayer(layer);
//     pipapelayanan.removeLayer(layer);
//     drawnItems.toGeoJSON(); // create
// });

var layerAsli = L.control.layers(baseMaps, overlayMaps).addTo(m);
layerAsli.addOverlay(drawnItems, "<span class= 'ml-1'>drawnItems</span>"); // bisa

// console.log(layerAsli.getLayers);

