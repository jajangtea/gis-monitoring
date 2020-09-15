let latLng = [lat, long];
var map = L.map("map").setView(latLng, 15);
var Layer = L.tileLayer("http://{s}.tile.osm.org/{z}/{x}/{y}.png", {
    attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors',
});

map.addLayer(Layer);
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
var geojsonMarkerOptions = {
    radius: 8,
    fillColor: "#ff7800",
    color: "#000",
    weight: 1,
    opacity: 1,
    fillOpacity: 0.8,
};

var layersHotspotPoint = L.geoJSON(hotspotPoint, {
    pointToLayer: function(feature, latlng) {
        // console.log(feature)

        return L.marker(latlng, {
            icon: new L.icon({
                iconUrl: feature.properties.icon,
                iconSize: [25, 45],
            }),
        });
    },
    onEachFeature: function(feature, layer) {
        let coord = feature.geometry.coordinates;
        console.log(coord);
        if (feature.properties && feature.properties.name) {
            layer.bindPopup(
                feature.properties.popUp +
                "<br><button class='btn btn-info keSini' data-lat='" +
                coord[1] +
                "'data-lng='" +
                coord[0] +
                "'>Ke Sini</button><a href='" +
                base_url +
                "rumah/show_sampul/" +
                _iduser +
                "'class='btn btn-success' role='button' aria-pressed='true'>Detail</a>"
            );
        }
    },
}).addTo(map);

var control = L.Routing.control({
    waypoints: [latLng],
    geocoder: L.Control.Geocoder.nominatim(),
    routeWhileDragging: true,
    reverseWaypoints: true,
    showAlternatives: true,
    altLineOptions: {
        styles: [
            { color: "black", opacity: 0.15, weight: 9 },
            { color: "white", opacity: 0.8, weight: 6 },
            { color: "blue", opacity: 0.5, weight: 2 },
        ],
    },
    createMarker: function(i, waypoint, n) {
        let urlIcon;
        console.log(i + ", " + n);
        var pos = i + 1;
        if (pos == 1) {
            urlIcon = base_url + "icon/taman.png";
        } else if (pos == n) {
            urlIcon = base_url + "assets/icons/icon-dest.png";
        } else {
            urlIcon = base_url + "assets/icons/icon-step.png";
        }

        const marker = L.marker(waypoint.latLng, {
            draggable: true,
            bounceOnAdd: false,
            bounceOnAddOptions: {
                duration: 1000,
                height: 800,
                function() {
                    bindPopup(myPopup).openOn(map);
                },
            },
            icon: L.icon({
                iconUrl: urlIcon,
                iconSize: [25, 45],
            }),
        });
        return marker;
    },
});
control.addTo(map);

$(document).on("click", ".keSini", function() {
    let latLng = [$(this).data("lat"), $(this).data("lng")];
    control.spliceWaypoints(control.getWaypoints().length - 1, 1, latLng);
});

$(document).on("click", ".dariSini", function() {
    let latLng = [$("[name=latNow]").val(), $("[name=lngNow]").val()];
    control.spliceWaypoints(0, 1, latLng);
    map.panTo(latLng);
});

var poiLayers = L.layerGroup([layersHotspotPoint]);
L.control
    .search({
        layer: poiLayers,
        initial: false,
        propertyName: "name",
        buildTip: function(text, val) {
            // var jenis = val.layer.feature.properties.jenis;
            // return '<a href="#" class="'+jenis+'">'+text+'<b>'+jenis+'</b></a>';
            return '<a href="#">' + text + "</a>";
        },
        marker: {
            icon: "",
            circle: {
                radius: 20,
                color: "#f32",
                opacity: 1,
                weight: 5,
            },
        },
    })
    .addTo(map);

var control = L.Routing.control(
    L.extend(window.lrmConfig, {
        waypoints: [L.latLng(57.74, 11.94), L.latLng(57.6792, 11.949)],
        geocoder: L.Control.Geocoder.nominatim(),
        routeWhileDragging: true,
        reverseWaypoints: true,
        showAlternatives: true,
        altLineOptions: {
            styles: [
                { color: "black", opacity: 0.15, weight: 9 },
                { color: "white", opacity: 0.8, weight: 6 },
                { color: "blue", opacity: 0.5, weight: 2 },
            ],
        },
    })
).addTo(map);

L.Routing.errorControl(control).addTo(map);