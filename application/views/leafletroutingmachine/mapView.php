<link rel="stylesheet" type="text/css" href="<?=base_url('assets/js/leaflet-search/dist/leaflet-search.min.css')?>">
<link rel="stylesheet" href="<?=base_url('assets/js/leaflet-routing-machine/dist/leaflet-routing-machine.css')?>" />

<style type="text/css">
.search-tip b {
    display: inline-block;
    clear: left;
    float: right;
    padding: 0 4px;
    margin-left: 4px;
}

.Banjir.search-tip b,
.Banjir.leaflet-marker-icon {
    background: #f66
}

</style>
<!-- Make sure you put this AFTER Leaflet's CSS -->
<script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js"
    integrity="sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA=="
    crossorigin=""></script>
<script src="<?=base_url('assets/js/leaflet-routing-machine/dist/leaflet-routing-machine.js')?>"></script>
<script src="<?=base_url('assets/js/leaflet-routing-machine/examples/Control.Geocoder.js')?>"></script>
<script src="<?=base_url('assets/js/leaflet-search/dist/leaflet-search.src.js')?>"></script>
<script src="<?=site_url('admin/api/dataku/point')?>"></script>

<script type="text/javascript">
let latLng = [-3.824181, 114.8191513];
var map = L.map('map').setView(latLng, 15);
var Layer = L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors',
});

map.addLayer(Layer);

// ambil titik
getLocation();

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}

function showPosition(position) {
    $("[name=latNow]").val(position.coords.latitude);
    $("[name=lngNow]").val(position.coords.longitude);
}
// hostpot
var layersHotspotPoint = L.geoJSON(hotspotPoint, {
    pointToLayer: function(feature, latlng) {
        // console.log(feature)
        return L.marker(latlng, {
            icon: new L.icon({
                iconUrl: feature.properties.icon,
                iconSize: [28, 45]
            })
        });
    },
    onEachFeature: function(feature, layer) {
        let coord = feature.geometry.coordinates;
        console.log(coord);
        if (feature.properties && feature.properties.name) {
            layer.bindPopup(feature.properties.popUp +
                "<br><button class='btn btn-info keSini' data-lat='" + coord[1] + "' data-lng='" +
                coord[0] + "'>Ke Sini</button>"
            );
        }
    }
}).addTo(map);
// akhir dari hotspot
// pencarian
var poiLayers = L.layerGroup([
    layersHotspotPoint
]);
L.control.search({
    layer: poiLayers,
    initial: false,
    propertyName: 'name',
    buildTip: function(text, val) {
        // var jenis = val.layer.feature.properties.jenis;
        // return '<a href="#" class="'+jenis+'">'+text+'<b>'+jenis+'</b></a>';
        return '<a href="#" >' + text + '</a>';
    },
    marker: {
        icon: "",
        circle: {
            radius: 20,
            color: '#f32',
            opacity: 1,
            weight: 5
        }
    }
}).addTo(map);
// end pencarian
// rute

var control = L.Routing.control({
    waypoints: [
        latLng
    ],
    geocoder: L.Control.Geocoder.nominatim(),
    routeWhileDragging: true,
    reverseWaypoints: true,
    showAlternatives: true,
    altLineOptions: {
        styles: [{
                color: 'black',
                opacity: 0.15,
                weight: 9
            },
            {
                color: 'white',
                opacity: 0.8,
                weight: 6
            },
            {
                color: 'blue',
                opacity: 0.5,
                weight: 2
            }
        ]
    },
    createMarker: function(i, waypoint, n) {
        let urlIcon;
        console.log(i + ", " + n);
        var pos = i + 1;
        if (pos == 1) {
            urlIcon = '<?=assets('
            icons / icon - user.png ')?>';
        } else if (pos == n) {
            urlIcon = '<?=assets('
            icons / icon - dest.png ')?>';
        } else {
            urlIcon = '<?=assets('
            icons / icon - step.png ')?>';
        }

        const marker = L.marker(waypoint.latLng, {
            draggable: true,
            bounceOnAdd: false,
            bounceOnAddOptions: {
                duration: 1000,
                height: 800,
                function() {
                    (bindPopup(myPopup).openOn(map))
                }
            },
            icon: L.icon({
                iconUrl: urlIcon,
                iconSize: [28, 45]
            })
        });
        return marker;
    }
})
control.addTo(map);


$(document).on("click", ".keSini", function() {
    let latLng = [$(this).data('lat'), $(this).data('lng')];
    control.spliceWaypoints(control.getWaypoints().length - 1, 1, latLng);
})

$(document).on("click", ".dariSini", function() {
    let latLng = [$("[name=latNow]").val(), $("[name=lngNow]").val()];
    control.spliceWaypoints(0, 1, latLng);
    map.panTo(latLng);
})
</script>
<div class="row">
    <div class="col-md-4">
        <?=input_text('latNow', '')?>
    </div>
    <div class="col-md-4">
        <?=input_text('lngNow', '')?>
    </div>
    <div class="col-md-4">
        <button class="dariSini btn btn-info"><i class="fa fa-map-marker"></i> Mulai dari Posisi Kita</button>
    </div>
</div>
<div id="map"></div>
