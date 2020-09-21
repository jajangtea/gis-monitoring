<div id="map" style="height: 800px;" class="news"></div>
<script src="<?=base_url()?>leaflet-search-master/src/leaflet-search.js"></script>
<script>
//sample data values for populate map
var data = [
		<?php foreach ($kegiatan as $key => $value) {?>
		{
			"loc":[<?=$value->lat?>, <?=$value->lng?>],
			"title":"<?=$value->nama_dma?>",
			"id":"<?=base_url('dma/detail/' . $value->id_dma)?>",
			"nama_dma":"<?=$value->nama_dma?>",
			"sampul":"<?=base_url('sampul/' . $value->sampul)?>",
			"icon":"<?=base_url('icon/' . $value->icon)?>"
		},
        <?php }?>

    ];

    var data_profile = [

        <?php foreach ($profile as $key => $profile_value) {?>
		{
            "loc":[<?=$profile_value->lat?>, <?=$profile_value->lng?>],
			"title":"<?=$profile_value->first_name . ' ' . $profile_value->last_name?>",
			"id":"<?=base_url('rumah/show_sampul/' . $profile_value->id_user)?>",
			"sampul":"<?=base_url('sampul/' . $profile_value->sampul_rumah)?>",
			"icon":"<?=base_url('icon/' . $profile_value->icon)?>"
		},
		<?php }?>
	];


var map = new L.Map('map', {
    zoom: 15,
    center: new L.latLng(0.917061, 104.466398)
}); //set center from first location
map.addLayer(new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png')); //base layer

var markersLayer = new L.LayerGroup(); //layer contain searched elements
map.addLayer(markersLayer);
var controlSearch = new L.Control.Search({
    position: 'topleft',
    layer: markersLayer,
    initial: false,
    zoom: 18,
    marker: false
});
map.addControl(new L.Control.Search({
    layer: markersLayer,
    initial: false,
    collapsed: true,
    zoom: 18,
}));
////////////populate map with markers from sample data
for (i in data) {
    var title = data[i].title; //value searched
    var loc = data[i].loc;
    var id = data[i].id;
    var sampul = data[i].sampul;
    var nama_dma = data[i].nama_dma;
    var icon = data[i].icon;
    var ikon = L.icon({
        iconUrl: icon,
        iconSize: [28, 45]
    });
    var info_tempat = "<div class='media text-center'>";
    info_tempat += "<div class='media-center'>";
    info_tempat += "<img class='media-object' src='" + sampul + "' width='200px' height='100px'>";
    info_tempat += "</div>";
    info_tempat += "<div class='media-body '>";
    info_tempat += "<p><b>" + nama_dma + "</b></p>";
    info_tempat += "<div class='text-center'><a href='" + id +
        "' class='btn btn-success btn-minier text-center'><i class='fa fa-eye'></i> Detail</a></div>";
    info_tempat += "</div>";
    info_tempat += "</div>";

    var marker = new L.Marker(new L.latLng(loc), {
        title: title,
        icon: ikon
    }); //se property searched
    marker.bindPopup(info_tempat);
    markersLayer.addLayer(marker);
}
for (i in data_profile) {
    var title = data_profile[i].title; //value searched
    var loc = data_profile[i].loc;
    var id = data_profile[i].id;
    var sampul = data_profile[i].sampul;
    // var nama_dma = data[i].nama_dma;
    var icon = data_profile[i].icon;
    var ikon = L.icon({
        iconUrl: icon,
        iconSize: [28, 45]
    });
    var info_tempat = "<div class='media text-center'>";
    info_tempat += "<div class='media-center'>";
    info_tempat += "<img class='media-object' src='" + sampul + "' width='200px' height='100px'>";
    info_tempat += "</div>";
    info_tempat += "<div class='media-body '>";
    info_tempat += "<p><b>" + title + "</b></p>";
    info_tempat += "<div class='text-center'><a href='" + id +
        "' class='btn btn-success btn-minier text-center'><i class='fa fa-eye'></i> Detail</a></div>";
    info_tempat += "</div>";
    info_tempat += "</div>";

    var marker = new L.Marker(new L.latLng(loc), {
        title: title,
       icon: ikon
    });
    marker.bindPopup(info_tempat);
    markersLayer.addLayer(marker);
}


var polyline = L.polyline(locals, {color: 'blue'}).addTo(map);
</script>
