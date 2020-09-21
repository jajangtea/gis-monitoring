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
                    <div class="inline dropdown-hover">

                        <?php if ($this->session->userdata('username') != '') {?>
                        <a href="<?=base_url('dma/add1')?>" class="btn btn-flat btn-sm btn-primary"><i
                                class="fa fa-plus"></i> Add</a>
                        <?php }?>
                        <a href="<?=base_url('jaringan/addview')?>" class="btn btn-flat btn-sm btn-primary"><i
                                class="fa fa-plus"></i> Add Jaringan</a>
                        <a href="<?=base_url('dma/lap')?>" class="btn btn-flat btn-sm btn-primary"><i
                                class="fa fa-print"></i> Print</a>

                    </div>
                </div>
            </div>


            <div class="widget-body">
                <div class="widget-main padding-8">
<div id="map"></div>
</div>
</div>
</div>
</div>
</div>




<script>
var map = L.map('map').setView([0.918263, 104.464512], 14);
     L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
         attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
     }).addTo(map);


<?php foreach ($jaringan as $key) {?>
  var drawnItems = L.geoJson(<?php echo $key->GeoJson; ?>).addTo(map);
<?php }?>
</script>