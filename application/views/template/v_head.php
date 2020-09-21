<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>GIS - PDAM Tirta Kepri</title>

    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="<?=base_url()?>template/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?=base_url()?>template/menu.css" />
    <link rel="stylesheet" href="<?=base_url()?>template/assets/font-awesome/4.5.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/0.4.2/leaflet.draw.css"/>

    <!-- page specific plugin styles -->

    <!-- text fonts -->
    <link rel="stylesheet" href="<?=base_url()?>template/assets/css/fonts.googleapis.com.css" />

    <!-- ace styles -->
    <link rel="stylesheet" href="<?=base_url()?>template/assets/css/ace.min.css" class="ace-main-stylesheet"
        id="main-ace-style" />

    <!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
    <link rel="stylesheet" href="<?=base_url()?>template/assets/css/ace-skins.min.css" />
    <link rel="stylesheet" href="<?=base_url()?>template/assets/css/ace-rtl.min.css" />

    <!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

    <!-- inline styles related to this page -->

    <!-- ace settings handler -->
    <script src="<?=base_url()?>template/assets/js/ace-extra.min.js"></script>

    <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

    <!--[if lte IE 8]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
    <!--[if !IE]> -->
    <!-- <script src="<?php //base_url()?>template/assets/js/jquery-2.1.4.min.js"></script> -->
    <script src="<?=base_url()?>assets/jquery/dist/jquery.min.js"></script>

    <!-- <![endif]-->

    <!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
    <script type="text/javascript">
    if ('ontouchstart' in document.documentElement) document.write(
        "<script src='<?=base_url()?>template/assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
    </script>
    <script src="<?=base_url()?>template/assets/js/bootstrap.min.js"></script>

    <!-- page specific plugin scripts -->

    <!-- ace scripts -->
    <script src="<?=base_url()?>template/assets/js/ace-elements.min.js"></script>
    <script src="<?=base_url()?>template/assets/js/ace.min.js"></script>

    <!-- DataTables CSS -->
    <link href="<?php echo base_url(); ?>template/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="<?php echo base_url(); ?>template/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
    <!-- DataTables JavaScript -->
    <script src="<?php echo base_url(); ?>template/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>template/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>template/datatables-responsive/dataTables.responsive.js"></script>


    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/js/leaflet-search/dist/leaflet-search.min.css')?>">
    <link rel="stylesheet" href="<?=base_url('assets/js/leaflet-routing-machine/dist/leaflet-routing-machine.css')?>" />

    <style type="text/css">
    .search-tip b {
        display: inline-block;
        clear: left;
        float: right;
        padding: 0 4px;
        margin-left: 4px;
    }

    .Banjir.search-tip b,
    .Banjir.leaflet-marker-icon {
        background: #f66
    }

    </style>

    <link rel="stylesheet" href="<?=base_url()?>leaflet/leaflet.css" />
    <script src="<?=base_url()?>leaflet/leaflet.js"></script>
    <link rel="stylesheet" href="<?=base_url()?>leaflet/css/qgis2web.css">
    <!-- <link rel="stylesheet" href="<?=base_url()?>leaflet/css/leaflet-control-geocoder.Geocoder.css"> -->

    <link rel="stylesheet" href="<?=base_url()?>leaflet-search-master/src/leaflet-search.css" />
    <style>
    #findbox {
        background: #eee;
        border-radius: .125em;
        border: 2px solid #1978cf;
        box-shadow: 0 0 8px #999;
        margin-bottom: 10px;
        padding: 2px 0;
        width: 600px;
        height: 26px;
    }

    .search-tooltip {
        width: 200px;
    }

    .leaflet-control-search .search-cancel {
        position: static;
        float: left;
        margin-left: -22px;
    }

    </style>


    <script>
    var base_url = '<?=base_url()?>' // Buat variabel base_url agar bisa di akses di semua file js
    var _iduser ='<?=$this->session->userdata('last_idnya')?>';
    </script>

</head>

<body class="no-skin">
