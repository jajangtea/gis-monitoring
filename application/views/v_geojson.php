<div id="map" style="height: 800px;" class="news"></div>
<script src="<?= base_url()?>leaflet-search-master/src/leaflet-search.js"></script>
<script>

	var map = new L.Map('map', {zoom: 15, center: new L.latLng(-7.575778, 112.351495) });	//set center from first location
	map.addLayer(new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png'));	//base layer

//---------polygone-------------	
$.getJSON("<?= base_url('/mojotrisno-geojson.geojson') ?>", function(data){
		geoLayer =L.geoJson(data,{
			style: function(feature){
				return{
					fillopacity: 1,
					fillcolor: "#c81912",
					weight:1,
					opacity: 1,
					color: "#c81912"
				};
				
			},
			onEachFeature:function(feature, layer) {
				
			}
		}).addTo(map).bindPopup("<b>Hello world!</b><br>I am a popup.").Popup();
 	});

	 
//---------end polygone-------------



</script>

