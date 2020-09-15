

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
                <div class="widget-main padding-12">
                    <p><?php echo "Profil Pelanggan PDAM Tirta Kepri"; ?></p>
                    <?php
if ($this->session->flashdata('message')) {
    echo '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
    echo $this->session->flashdata('message');
    echo '</div>';
} else {
    echo validation_errors('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>', '</div>');

}
?>
                    <?php echo form_open(uri_string()); ?>
                    <div class="form-group">
                        <?php echo lang('Nomor Registrasi', 'nik'); ?> <br />
                        <?php echo form_input($no_registrasi); ?>
                    </div>
                    <div class="form-group">
                        <?php echo lang('create_user_nik_label', 'nik'); ?> <br />
                        <?php echo form_input($nik); ?>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <?php echo lang('edit_user_fname_label', 'first_name'); ?> <br />
                            <?php echo form_input($first_name); ?>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <?php echo lang('create_user_lname_label', 'last_name'); ?> <br />
                            <?php echo form_input($last_name); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <?php echo lang('edit_user_phone_label', 'phone'); ?> <br />
                        <?php echo form_input($phone); ?>
                    </div>
                    <div class="form-group">
                        <?php echo lang('create_user_pekerjaan_label', 'pekerjaan'); ?> <br />
                        <?php echo form_input($pekerjaan); ?>
                    </div>
                    <div class="form-group">
                    <label>DMA</label>
                    <?php echo form_input($id_dma); ?>
                    </div>
                    <div class="form-group">
                   <label>Status Pelanggan</label>
                        <?php echo form_input($status_pelanggan); ?>
                    </div>
                    <div class="form-group">
                        <?php echo lang('edit_user_pekerjaan_no_meter', 'no_meter'); ?> <br />
                        <?php echo form_input($no_meter); ?>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <?php echo lang('edit_user_password_label', 'password'); ?> <br />
                            <?php echo form_input($password); ?>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <?php echo lang('edit_user_password_confirm_label', 'password_confirm'); ?><br />
                            <?php echo form_input($password_confirm); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <?php if ($this->ion_auth->is_admin()): ?>
                        <h3><?php echo lang('edit_user_groups_heading'); ?></h3>
                        <div class="form-group">
                            <?php foreach ($groups as $group): ?>

                            <label class="checkbox">
                                <input type="checkbox" name="groups[]" value="<?php echo $group['id']; ?>"
                                    class="form-control"
                                    <?php echo (in_array($group, $currentGroups)) ? 'checked="checked"' : null; ?>>
                                <?php echo htmlspecialchars($group['name'], ENT_QUOTES, 'UTF-8'); ?>
                            </label>
                            <?php endforeach?>
                        </div>
                        <?php endif?>
                    </div>

                    <div class="form-group">
                        <?php echo lang('create_user_alamat_lengkap_label', 'alamat_lengkap'); ?> <br />
                        <?php echo form_textarea($alamat_lengkap); ?>
                    </div>
                    <?php echo form_hidden('id', $user->id); ?>
                    <?php //echo form_hidden($csrf); ?>
                    <div class="form-group">
                        <button type="submit" class="btn btn-sm btn-flat btn-primary">Ubah Data</button>
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
    curLocation = ["<?=(empty($hotspot)) ? "0.9255944" : $hotspot->lat;?>", "<?=(empty($hotspot)) ? "104.4388004" : $hotspot->lng;?>"];
}

var map = L.map('map').setView(["<?=(empty($hotspot)) ? "0.9255944" : $hotspot->lat;?>", "<?=(empty($hotspot)) ? "104.4388004" : $hotspot->lng;?>"], 14);
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

map.attributionControl.setPrefix(false);

var marker = new L.marker(curLocation, {
    draggable: 'true'
});

// marker.on('dragend', function(event) {
//     var position = marker.getLatLng();
//     marker.setLatLng(position, {
//         draggable: 'true'
//     }).bindPopup(position).update();
//     $("#lat").val(position.lat);
//     $("#lng").val(position.lng).keyup();
// });

// $("#lat, #lng").change(function() {
//     var position = [parseInt($("#lat").val()), parseInt($("#lng").val())];
//     marker.setLatLng(position, {
//         draggable: 'true'
//     }).bindPopup(position).update();
//     map.panTo(position);
// });

map.addLayer(marker);
</script>
