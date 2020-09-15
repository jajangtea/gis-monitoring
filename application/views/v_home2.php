<div id="map" style="height: 600px;" class="news"></div>

<script src="<?=base_url()?>leaflet/leaflet-search.js"></script>
<script>
	//=====MAP=======


	var map = L.map('map').setView([-7.575778, 112.351495], 15);
	L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
		attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
	}).addTo(map);

	$.getJSON("<?=base_url('leaflet/mojotrisno.geojson')?>", function(data) {
		geoLayer = L.geoJson(data, {
			style: function(feature) {

				var id = feature.properties.id;
				if (id == 1) {
					return {
						opacity: 0.5,
						color: 'rgba(35,35,35,1.0)',
						dashArray: '',
						lineCap: 'butt',
						lineJoin: 'miter',
						weight: 1.0,
						fill: true,
						fillOpacity: 0.5,
						fillColor: 'rgba(62,40,231,1.0)',
						interactive: true,
					};
				} else if (id == 2) {
					return {
						opacity: 0.5,
						color: 'rgba(35,35,35,1.0)',
						dashArray: '',
						lineCap: 'butt',
						lineJoin: 'miter',
						weight: 1.0,
						fill: true,
						fillOpacity: 0.5,
						fillColor: 'rgba(189,207,52,1.0)',
						interactive: true,
					};
				} else if (id == 3) {
					return {
						opacity: 0.5,
						color: 'rgba(35,35,35,1.0)',
						dashArray: '',
						lineCap: 'butt',
						lineJoin: 'miter',
						weight: 1.0,
						fill: true,
						fillOpacity: 0.5,
						fillColor: 'rgba(231,132,25,1.0)',
						interactive: true,
					};
				} else if (id == 4) {
					return {
						opacity: 0.5,
						color: 'rgba(35,35,35,1.0)',
						dashArray: '',
						lineCap: 'butt',
						lineJoin: 'miter',
						weight: 1.0,
						fill: true,
						fillOpacity: 0.5,
						fillColor: 'rgba(161,40,212,1.0)',
						interactive: true,
					};
				} else if (id == 5) {
					return {
						opacity: 0.5,
						color: 'rgba(35,35,35,1.0)',
						dashArray: '',
						lineCap: 'butt',
						lineJoin: 'miter',
						weight: 1.0,
						fill: true,
						fillOpacity: 0.5,
						fillColor: 'rgba(238,22,40,1.0)',
						interactive: true,
					};
				} else if (id == 6) {
					return {
						opacity: 0.5,
						color: 'rgba(35,35,35,1.0)',
						dashArray: '',
						lineCap: 'butt',
						lineJoin: 'miter',
						weight: 1.0,
						fill: true,
						fillOpacity: 0.5,
						fillColor: 'rgba(124,226,84,1.0)',
						interactive: true,
					};
				}

			},
			onEachFeature: function(feature, layer) {

			}
		}).addTo(map);
	});

	//==========pemetaan==================================
	<?php foreach ($kegiatan as $key => $value) {?>
		var info_tempat = "<div class='media text-center'>";
		info_tempat += "<div class='media-center'>";
		info_tempat += "<img class='media-object' src='<?=base_url('sampul/' . $value->sampul)?>' width='250px' height='150px'>";
		info_tempat += "</div>";
		info_tempat += "<div class='media-body '>";
		info_tempat += "<p><b><?=$value->nama_dma?></b></p>";
		info_tempat += "<div class='text-center'><a href='<?=base_url('kegiatan/detail/' . $value->id_dma)?>' class='btn btn-success btn-minier text-center'><i class='fa fa-eye'></i> Detail</a></div>";
		info_tempat += "</div>";
		info_tempat += "</div>";

		var ikon = L.icon({
			iconUrl: "<?=base_url('icon/' . $value->icon)?>",
			iconSize: [28, 45]
		});
		var marker = L.marker([<?=$value->latitude?>, <?=$value->longitude?>], {
			icon: ikon
		}).addTo(map).bindPopup(info_tempat);
	<?php }?>
</script>