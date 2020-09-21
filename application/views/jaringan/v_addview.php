<style>
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
}

li {
  float: left;
}

li a {
  display: block;
  padding: 8px;
  background-color: #dddddd;
}
#map {
    height: 400px;
}
</style>

<div class="row">
    <div class="col-md-12">
        <div class="widget-box widget-color-blue2">
            <div class="widget-header">
                <h4 class="widget-title lighter smaller"><?=$title?></h4>
                <div class="widget-toolbar no-border">

                </div>
            </div>


            <div class="widget-body">
                <div class="widget-main padding-8">
<div id="map"></div>
<div id='result' value=''></div>
<br>
<div class="form-group">
    <button id="convert" class="btn btn-sm btn-flat btn-info"> Simpan GeoJson </button>
</div>
</div>
</div>
</div>
</div>
</div>


<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/0.4.2/leaflet.draw.css"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/0.4.2/leaflet.draw.js"></script>

<script>

var map = L.map('map').setView([0.918263, 104.464512], 14);
     L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
         attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
     }).addTo(map);
     // FeatureGroup is to store editable layers
     var drawnItems = new L.FeatureGroup();
     map.addLayer(drawnItems);
     var drawControl = new L.Control.Draw({
        draw: {
             circle: false,
             marker: false,
             rectangle:false
         },
         edit: {
             featureGroup: drawnItems
         }
     });
     map.addControl(drawControl);


map.on('draw:created', function (event) {
    var layer = event.layer,
        feature = layer.feature = layer.feature || {};

    feature.type = feature.type || "Feature";
    var props = feature.properties = feature.properties || {};
    drawnItems.addLayer(layer);

});


document.getElementById("convert").addEventListener("click", function () {
    var hasil = $('#result').html(JSON.stringify(drawnItems.toGeoJSON()));
    var cookieValue = document.getElementById('result').innerHTML;
    if (cookieValue === '{"type":"FeatureCollection","features":[]}') {
      alert("Empty...!");
    } else {
    	ajax_simpan();
    }
});
function ajax_simpan(){
	var	url = "<?php echo site_url('jaringan/add'); ?>";
	var hasil = (JSON.stringify(drawnItems.toGeoJSON(), null, null));
	$.ajax({
		url : url,
		type: "POST",
		data: {result:hasil},
		beforeSend: function(s){

			$('#result').html('tunggu');
		},
		success: function(data)
		{
			$('#result').html('berhasil');
		}
	});
}
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>