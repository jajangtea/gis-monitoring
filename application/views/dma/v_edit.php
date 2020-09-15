<div class="row">
    <div class="col-md-7">
        <div class="widget-box widget-color-blue2">
            <div class="widget-header">
                <h4 class="widget-title lighter smaller">Lokasi</h4>
                <div class="widget-toolbar no-border">
                    <div class="inline dropdown-hover">
                    </div>
                </div>
            </div>
            <div class="widget-body">
                <div class="widget-main padding-8">
                    <div id="map" style="height: 800px;"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-5">
        <div class="widget-box widget-color-blue2">
            <div class="widget-header">
                <h4 class="widget-title lighter smaller"><?=$title?></h4>
                <div class="widget-toolbar no-border">
                    <div class="inline dropdown-hover">
                    </div>
                </div>
            </div>
            <div class="widget-body">
                <div class="widget-main padding-8">
                    <?php
echo validation_errors('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>', '</div>');
echo form_open('dma/edit/' . $dma->id_dma);
?>
 <?php echo form_hidden('id', $dma->id_hotspot); ?>
                    <div class="form-group">
                        <label>Nama DMA</label>
                        <input name="nama_dma" value="<?=$dma->nama_dma?>" type="text" class="form-control"
                            placeholder="Nama DMA" required>
                    </div>
                    <div class="form-group">
                        <label>Lokasi (Drag And Drop Marker Untuk Mengambil Coordinat)</label>
                        <div class="col-md-6">
                            <input name="latitude" value="<?=$hotspot->lat?>" id="Latitude" type="text"
                                class="form-control" placeholder="Latitude" required>
                        </div>
                        <div class="col-md-6">
                            <input name="longitude" value="<?=$hotspot->lng?>" id="Longitude" type="text"
                                class="form-control" placeholder="Longitude" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                        <label>Marker</label>
                            <select class="form-control" name="marker" id="marker" required>
                            <option value="">--Pilihan--</option>
                            <?php foreach ($marker as $key => $value) {?>

                            <option value="<?=$value->icon?>"
                                <?php if ($dma->icon == $value->icon) {echo 'selected';}?>>
                                <?=$value->icon?></option>

                            <?php }?>
                                <!-- <option value="<?php //$dma->icon?>">No Selected</option>
                                <?php //foreach ($marker as $row): ?>
                                <option value="<?php // $row->id; ?>"><?php // $row->icon; ?></option>
                                <?php //endforeach;?> -->
                            </select>
                        </div>

                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                        <label>Marker</label>
<br>
                            <img id="gbr" width="35px" height="35px" src="<?=base_url('icon/') . $dma->icon?>" class="img-thumbnail" name="icon"/>
                        </div>

                    </div>

                    <div class="form-group">
                        <label>Lokasi</label>
                        <input name="lokasi" value="<?=$dma->lokasi?>" type="text" class="form-control"
                            placeholder="lokasi" required>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi" type="text" class="form-control"
                            placeholder="Deskripsi"><?=$dma->deskripsi?></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-sm btn-flat btn-primary">Simpan</button>
                        <button type="reset" class="btn btn-sm btn-flat btn-warning">Reset</button>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>







<!-- MAP LEAFLET SCRIPTS -->
<script src="<?php echo base_url() ?>leaflet/leaflet.js"></script>
<script>
//=====MAP=======
var curLocation = [0, 0];
if (curLocation[0] == 0 && curLocation[1] == 0) {
    curLocation = [<?=$hotspot->lat?> , <?=$hotspot->lng?> ];
}

var map = L.map('map').setView([<?=$hotspot->lat?> , <?=$hotspot->lng?>], 14);
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);


var logo = L.icon({
		iconUrl: '<?=base_url('icon/' . $dma->icon)?>',
        iconSize: [28, 45],
		//iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
		popupAnchor: [-1, 1] // point from which the popup should open relative to the iconAnchor
	});

	var info_tempat = "<div class='media text-center'>";
	info_tempat += "<div class='media-center'>";
	info_tempat += "<img class='media-object' src='<?=base_url('sampul/' . $dma->sampul)?>' width='200px' height='100px'>";
	info_tempat += "</div>";
	info_tempat += "<div class='media-body '>";
	info_tempat += "<p><b><?=$dma->nama_dma?></b></p>";
	info_tempat += "</div>";
	info_tempat += "</div>";

	L.marker([<?=$hotspot->lat?>, <?=$hotspot->lng?>], {
			icon: logo
		}).addTo(map)
        .bindPopup(info_tempat).openPopup();



map.attributionControl.setPrefix(false);

var marker = new L.marker(curLocation, {
    draggable: 'true'
});

marker.on('dragend', function(event) {
    var position = marker.getLatLng();
    marker.setLatLng(position, {
        draggable: 'true'
    }).bindPopup(position).update();
    $("#Latitude").val(position.lat);
    $("#Longitude").val(position.lng).keyup();
});

$("#Latitude, #Longitude").change(function() {
    var position = [parseInt($("#Latitude").val()), parseInt($("#Longitude").val())];
    marker.setLatLng(position, {
        draggable: 'true'
    }).bindPopup(position).update();
    map.panTo(position);
});

map.addLayer(marker);
</script>

<script type="text/javascript">
		$(document).ready(function(){

			$('#marker').change(function(){
                var id=$(this).val();
                $.ajax({
                    url : "<?php echo site_url('dma/get_icon'); ?>",
                    method : "POST",
                    data : {id: id},
                    async : true,
                    dataType : 'json',
                    success: function(data){
                        var i;
                        for(i=0; i<data.length; i++){
                            $("#gbr").attr("src",'../../icon/'+data[i].icon);
                        }
                    }
                });
                return false;
            });

		});
	</script>
