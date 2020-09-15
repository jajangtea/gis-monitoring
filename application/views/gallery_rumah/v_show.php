<div class="col-sm-6">
    <div class="panel panel-primary">
        <div class="panel-heading">Lokasi Rumah</div>
        <div class="panel-body">

            <div id="map" style="height: 340px;"></div>

        </div>
    </div>
</div>
<div class="col-sm-6">
    <div class="panel panel-primary">
        <div class="panel-heading">Data Pelanggan</div>
        <div class="panel-body">

            <table class="table table-bordered">
                <tr>
                    <th width="150px">Nama Pelanggan</th>
                    <td width="20px">:</td>
                    <td><?=$gallery->first_name?></td>
                </tr>
                <tr>
                    <th>Pekerjaan</th>
                    <td width="20px">:</td>
                    <td><?=$gallery->pekerjaan?></td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td width="20px">:</td>
                    <td><?=$gallery->alamat_lengkap?></td>
                </tr>
                <tr>
                    <th>Nomor Registrasi</th>
                    <td width="20px">:</td>
                    <td><?=$gallery->no_registrasi?></td>
                </tr>
                <tr>
                    <th>Nomor Meter</th>
                    <td width="20px">:</td>
                    <td><?=$gallery->no_meter?></td>
                </tr>
                <tr>
                    <th>Latitude</th>
                    <td width="20px">:</td>
                    <td><?=$gallery->lat?></td>
                </tr>
                <tr>
                    <th>Longitude</th>
                    <td width="20px">:</td>
                    <td><?=$gallery->lng?></td>
                </tr>

                <tr>
                    <th>Tgl Daftar</th>
                    <td width="20px">:</td>
                    <td><?=date('Y-m-d', $gallery->tgl_daftar)?></td>
                </tr>
            </table>

        </div>
    </div>
</div>

<div class="col-sm-12">
    <div class="panel panel-primary">
        <div class="panel-heading">Gallery Rumah</div>
        <div class="panel-body">


            <div class="col-xs-4 col-sm-4 pricing-box">
                <div class="widget-box widget-color-blue">
                    <div class="widget-header">
                        <h6 class="widget-title bigger lighter">Foto Sampul</h6>
                    </div>

                    <div class="widget-body">
                        <div class="widget-main text-center">
                            <img src="<?=base_url('sampul/' . $gallery->sampul_rumah)?>" width="280px" height="180px">
                        </div>
                        <div>
                            <button class="btn btn-info btn-minier" data-toggle="modal"
                                data-target="#sampul<?=$gallery->id_profile_pelanggan?>">
                                <i class="ace-icon fa fa-eye"></i> View
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <?php foreach ($gallery_rumah as $key => $value) {?>

            <div class="col-xs-4 col-sm-4 pricing-box">
                <div class="widget-box widget-color-blue">
                    <div class="widget-header">
                        <h6 class="widget-title bigger lighter"><?=$value->ket_rumah?></h6>
                    </div>

                    <div class="widget-body">
                        <div class="widget-main text-center">
                            <img src="<?=base_url('foto_rumah/' . $value->foto_rumah)?>" width="280px" height="180px">
                        </div>
                        <div>
                            <button class="btn btn-info btn-minier" data-toggle="modal"
                                data-target="#<?=$value->id_gallery_rumah?>">
                                <i class="ace-icon fa fa-eye"></i> View
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <?php }?>
        </div>
    </div>
</div>


<?php foreach ($gallery_rumah as $key => $value) {?>
<div class="modal fade" id="<?=$value->id_gallery_rumah?>">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><?=$value->ket_rumah?></h4>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <img src="<?=base_url('foto_rumah/' . $value->foto_rumah)?>" width="800px" height="500px">
                </div>
            </div>
        </div>
    </div>
</div>
<?php }?>

<div class="modal fade" id="sampul<?=$gallery->id_profile_pelanggan?>">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Foto Sampul</h4>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <img src="<?=base_url('sampul/' . $gallery->sampul_rumah)?>" width="800px" height="500px">
                </div>
            </div>
        </div>
    </div>
</div>


<script>
var map = L.map('map').setView(["<?=$gallery->lat?>", "<?=$gallery->lng?>"], 18);
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

var logo = L.icon({
    iconUrl: "<?=base_url('icon/gedung.png')?>",
    iconSize: [28, 45],
    //iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
    popupAnchor: [-1, 1] // point from which the popup should open relative to the iconAnchor
});

var info_tempat = "<div class='media text-center'>";
info_tempat += "<div class='media-center'>";
info_tempat +=
    "<img class='media-object' src='<?=base_url('sampul/' . $gallery->sampul_rumah)?>' width='200px' height='100px'>";
info_tempat += "</div>";
info_tempat += "<div class='media-body'>";
info_tempat += "<p><b><?=$gallery->first_name . ' ' . $gallery->last_name?></b></p>";
info_tempat += "</div>";
info_tempat += "</div>";

L.marker(["<?=$gallery->lat?>", "<?=$gallery->lng?>"], {
        icon: logo
    }).addTo(map)
    .bindPopup(info_tempat).openPopup();
</script>
