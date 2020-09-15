<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" />
<link rel="stylesheet" href="<?=base_url()?>leaflet/dist/leaflet-routing-machine.css" />
<link rel="stylesheet" href="<?=base_url()?>leaflet/dist/index.css" />
<script src="<?=site_url('api/dataku/point')?>"></script>
<script>
var lat = "<?=$profile_pelanggan->lat;?>"
var long = "<?=$profile_pelanggan->lng;?>"
</script>
<div class="row">
    <div class="col-md-2">
        <?=input_text('latNow', '')?>
    </div>
    <div class="col-md-2">
        <?=input_text('lngNow', '')?>
    </div>
    <div class="col-md-4">
        <button class="dariSini btn btn-info"><i class="fa fa-map-marker"></i> Mulai dari Posisi Kita</button>
    </div>

    <div class="col-md-12">
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
</div>
<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"></script>
<script src="<?=base_url()?>leaflet/dist/leaflet-routing-machine.js"></script>
<script src="<?=base_url()?>leaflet/dist/Control.Geocoder.js"></script>
<script src="<?=base_url()?>leaflet/dist/config.js"></script>
<script src="<?=base_url()?>leaflet/dist/index.js"></script>
