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
echo form_open('dma/create_dma');
?>

                    <div class="form-group">
                        <label>Nama DMA</label>
                        <input name="nama_dma" type="text" class="form-control" placeholder="Nama DMA" required>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label>Lokasi (Drag And Drop Marker Untuk Mengambil Coordinat)</label>
                        </div>
                        <div class="col-md-6">
                            <input name="latitude" id="Latitude" type="text" class="form-control" placeholder="Latitude"
                                required>
                        </div>
                        <div class="col-md-6">
                            <input name="longitude" id="Longitude" type="text" class="form-control"
                                placeholder="Longitude" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                        <label>Marker</label>
                            <select class="form-control" name="marker" id="marker" required>
                            <option value="">--Pilihan--</option>
                            <?php foreach ($marker as $key => $value) {?>

                            <option value="<?=$value->icon?>"
                                <?php echo 'selected' ?>>
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
                            <img id="gbr" width="35px" height="35px" src="<?=base_url('icon/noimg.png')?>" class="img-thumbnail" name="icon"/>
                        </div>

                    </div>

                    <div class="form-group">
                        <label>Lokasi</label>
                        <input name="lokasi" type="text" class="form-control" placeholder="Lokasi" required>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi" type="text" class="form-control" placeholder="Deskripsi"></textarea>
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
    curLocation = [0.917061, 104.466398];
}
var map = L.map('map').setView([0.917061, 104.466398], 14);
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

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
                            $("#gbr").attr("src",'../icon/'+data[i].icon);
                        }
                    }
                });
                return false;
            });

		});
	</script>
