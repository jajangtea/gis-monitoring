<div id="map" style="height: 600px;" class="news"></div>



<!-- MAP LEAFLET SCRIPTS -->
<script src="<?php echo base_url() ?>leaflet/leaflet.js"></script>
<script src="<?php echo base_url() ?>leaflet/js/qgis2web_expressions.js"></script>
<script src="<?php echo base_url() ?>leaflet/js/leaflet.js"></script>
<script src="<?php echo base_url() ?>leaflet/js/L.Control.Locate.min.js"></script>
<script src="<?php echo base_url() ?>leaflet/js/leaflet.rotatedMarker.js"></script>
<script src="<?php echo base_url() ?>leaflet/js/leaflet.pattern.js"></script>
<script src="<?php echo base_url() ?>leaflet/js/leaflet-hash.js"></script>
<script src="<?php echo base_url() ?>leaflet/js/Autolinker.min.js"></script>
<script src="<?php echo base_url() ?>leaflet/js/rbush.min.js"></script>
<script src="<?php echo base_url() ?>leaflet/js/labelgun.min.js"></script>
<script src="<?php echo base_url() ?>leaflet/js/labels.js"></script>
<script src="<?php echo base_url() ?>leaflet/data/mojotrisno_1.js"></script>
<script src="<?php echo base_url() ?>leaflet/data/Dusun_2.js"></script>
<script src="<?php echo base_url() ?>leaflet/data/RW_3.js"></script>
<script src="<?php echo base_url() ?>leaflet/data/jalan_4.js"></script>
<script>
    var highlightLayer;

    function highlightFeature(e) {
        highlightLayer = e.target;

        if (e.target.feature.geometry.type === 'LineString') {
            highlightLayer.setStyle({
                color: '#ffff00',
            });
        } else {
            highlightLayer.setStyle({
                fillColor: '#ffff00',
                fillOpacity: 1
            });
        }
        highlightLayer.openPopup();
    }
    var map = L.map('map', {
        zoomControl: true,
        maxZoom: 28,
        minZoom: 1
    })
    var hash = new L.Hash(map);
    map.attributionControl.setPrefix('<a href="https://github.com/tomchadwin/qgis2web" target="_blank">qgis2web</a> &middot; <a href="https://leafletjs.com" title="A JS library for interactive maps">Leaflet</a> &middot; <a href="https://qgis.org">QGIS</a>');
    L.control.locate({
        locateOptions: {
            maxZoom: 19
        }
    }).addTo(map);
    var bounds_group = new L.featureGroup([]);

    function setBounds() {
        if (bounds_group.getLayers().length) {
            map.fitBounds(bounds_group.getBounds());
        }
    }
    var layer_OpenStreetMap_0 = L.tileLayer('http://a.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        opacity: 1.0,
        attribution: '',
        minZoom: 1,
        maxZoom: 28,
        minNativeZoom: 0,
        maxNativeZoom: 19
    });
    layer_OpenStreetMap_0;
    map.addLayer(layer_OpenStreetMap_0);

    function pop_mojotrisno_1(feature, layer) {
        layer.on({
            mouseout: function(e) {
                for (i in e.target._eventParents) {
                    e.target._eventParents[i].resetStyle(e.target);
                }
                if (typeof layer.closePopup == 'function') {
                    layer.closePopup();
                } else {
                    layer.eachLayer(function(feature) {
                        feature.closePopup()
                    });
                }
            },
            mouseover: highlightFeature,
        });
        var popupContent = '<table>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['id'] !== null ? Autolinker.link(feature.properties['id'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['Desa'] !== null ? Autolinker.link(feature.properties['Desa'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['Dusun'] !== null ? Autolinker.link(feature.properties['Dusun'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['RW'] !== null ? Autolinker.link(feature.properties['RW'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['RT'] !== null ? Autolinker.link(feature.properties['RT'].toLocaleString()) : '') + '</td>\
                    </tr>\
                </table>';
        layer.bindPopup(popupContent, {
            maxHeight: 400
        });
    }

    function style_mojotrisno_1_0() {
        return {
            pane: 'pane_mojotrisno_1',
            opacity: 0.5,
            color: 'rgba(35,35,35,1.0)',
            dashArray: '',
            lineCap: 'butt',
            lineJoin: 'miter',
            weight: 1.0,
            fill: true,
            fillOpacity: 0.5,
            fillColor: 'rgba(190,207,80,1.0)',
            interactive: true,
        }
    }
    map.createPane('pane_mojotrisno_1');
    map.getPane('pane_mojotrisno_1').style.zIndex = 401;
    map.getPane('pane_mojotrisno_1').style['mix-blend-mode'] = 'normal';
    var layer_mojotrisno_1 = new L.geoJson(json_mojotrisno_1, {
        attribution: '',
        interactive: true,
        dataVar: 'json_mojotrisno_1',
        layerName: 'layer_mojotrisno_1',
        pane: 'pane_mojotrisno_1',
        onEachFeature: pop_mojotrisno_1,
        style: style_mojotrisno_1_0,
    });
    bounds_group.addLayer(layer_mojotrisno_1);
    map.addLayer(layer_mojotrisno_1);

    function pop_Dusun_2(feature, layer) {
        layer.on({
            mouseout: function(e) {
                for (i in e.target._eventParents) {
                    e.target._eventParents[i].resetStyle(e.target);
                }
                if (typeof layer.closePopup == 'function') {
                    layer.closePopup();
                } else {
                    layer.eachLayer(function(feature) {
                        feature.closePopup()
                    });
                }
            },
            mouseover: highlightFeature,
        });
        var popupContent = '<table>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['id'] !== null ? Autolinker.link(feature.properties['id'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['Desa'] !== null ? Autolinker.link(feature.properties['Desa'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['Dusun'] !== null ? Autolinker.link(feature.properties['Dusun'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['RW'] !== null ? Autolinker.link(feature.properties['RW'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['RT'] !== null ? Autolinker.link(feature.properties['RT'].toLocaleString()) : '') + '</td>\
                    </tr>\
                </table>';
        layer.bindPopup(popupContent, {
            maxHeight: 400
        });
    }

    function style_Dusun_2_0(feature) {
        switch (String(feature.properties['Dusun'])) {
            case 'Ngemplak':
                return {
                    pane: 'pane_Dusun_2',
                        opacity: 0.5,
                        color: 'rgba(35,35,35,1.0)',
                        dashArray: '10,5',
                        lineCap: 'butt',
                        lineJoin: 'miter',
                        weight: 1.0,
                        fill: true,
                        fillOpacity: 0.5,
                        fillColor: 'rgba(226,152,66,1.0)',
                        interactive: true,
                }
                break;
            case 'Sanan':
                return {
                    pane: 'pane_Dusun_2',
                        opacity: 0.5,
                        color: 'rgba(35,35,35,1.0)',
                        dashArray: '10,5',
                        lineCap: 'butt',
                        lineJoin: 'miter',
                        weight: 1.0,
                        fill: true,
                        fillOpacity: 0.5,
                        fillColor: 'rgba(41,12,205,1.0)',
                        interactive: true,
                }
                break;
            case 'Sawah':
                return {
                    pane: 'pane_Dusun_2',
                        opacity: 0.5,
                        color: 'rgba(35,35,35,1.0)',
                        dashArray: '10,5',
                        lineCap: 'butt',
                        lineJoin: 'miter',
                        weight: 1.0,
                        fill: true,
                        fillOpacity: 0.5,
                        fillColor: 'rgba(161,230,135,1.0)',
                        interactive: true,
                }
                break;
            case 'Subontoro':
                return {
                    pane: 'pane_Dusun_2',
                        opacity: 0.5,
                        color: 'rgba(35,35,35,1.0)',
                        dashArray: '10,5',
                        lineCap: 'butt',
                        lineJoin: 'miter',
                        weight: 1.0,
                        fill: true,
                        fillOpacity: 0.5,
                        fillColor: 'rgba(23,217,204,1.0)',
                        interactive: true,
                }
                break;
        }
    }
    map.createPane('pane_Dusun_2');
    map.getPane('pane_Dusun_2').style.zIndex = 402;
    map.getPane('pane_Dusun_2').style['mix-blend-mode'] = 'normal';
    var layer_Dusun_2 = new L.geoJson(json_Dusun_2, {
        attribution: '',
        interactive: true,
        dataVar: 'json_Dusun_2',
        layerName: 'layer_Dusun_2',
        pane: 'pane_Dusun_2',
        onEachFeature: pop_Dusun_2,
        style: style_Dusun_2_0,
    });
    bounds_group.addLayer(layer_Dusun_2);
    map.addLayer(layer_Dusun_2);

    function pop_RW_3(feature, layer) {
        layer.on({
            mouseout: function(e) {
                for (i in e.target._eventParents) {
                    e.target._eventParents[i].resetStyle(e.target);
                }
                if (typeof layer.closePopup == 'function') {
                    layer.closePopup();
                } else {
                    layer.eachLayer(function(feature) {
                        feature.closePopup()
                    });
                }
            },
            mouseover: highlightFeature,
        });
        var popupContent = '<table>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['id'] !== null ? Autolinker.link(feature.properties['id'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['Desa'] !== null ? Autolinker.link(feature.properties['Desa'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['Dusun'] !== null ? Autolinker.link(feature.properties['Dusun'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['RW'] !== null ? Autolinker.link(feature.properties['RW'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['RT'] !== null ? Autolinker.link(feature.properties['RT'].toLocaleString()) : '') + '</td>\
                    </tr>\
                </table>';
        layer.bindPopup(popupContent, {
            maxHeight: 400
        });
    }

    function style_RW_3_0(feature) {
        switch (String(feature.properties['RW'])) {
            case '001':
                return {
                    pane: 'pane_RW_3',
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
                }
                break;
            case '002':
                return {
                    pane: 'pane_RW_3',
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
                }
                break;
            case '003':
                return {
                    pane: 'pane_RW_3',
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
                }
                break;
            case '004':
                return {
                    pane: 'pane_RW_3',
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
                }
                break;
            case '005':
                return {
                    pane: 'pane_RW_3',
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
                }
                break;
            case '006':
                return {
                    pane: 'pane_RW_3',
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
                }
                break;
            case '007':
                return {
                    pane: 'pane_RW_3',
                        opacity: 0.5,
                        color: 'rgba(35,35,35,1.0)',
                        dashArray: '',
                        lineCap: 'butt',
                        lineJoin: 'miter',
                        weight: 1.0,
                        fill: true,
                        fillOpacity: 0.5,
                        fillColor: 'rgba(77,151,230,1.0)',
                        interactive: true,
                }
                break;
            case '008':
                return {
                    pane: 'pane_RW_3',
                        opacity: 0.5,
                        color: 'rgba(35,35,35,1.0)',
                        dashArray: '',
                        lineCap: 'butt',
                        lineJoin: 'miter',
                        weight: 1.0,
                        fill: true,
                        fillOpacity: 0.5,
                        fillColor: 'rgba(94,223,213,1.0)',
                        interactive: true,
                }
                break;
            case 'Sawah':
                return {
                    pane: 'pane_RW_3',
                        opacity: 0.5,
                        color: 'rgba(35,35,35,1.0)',
                        dashArray: '',
                        lineCap: 'butt',
                        lineJoin: 'miter',
                        weight: 1.0,
                        fill: true,
                        fillOpacity: 0.5,
                        fillColor: 'rgba(211,74,168,1.0)',
                        interactive: true,
                }
                break;
        }
    }
    map.createPane('pane_RW_3');
    map.getPane('pane_RW_3').style.zIndex = 403;
    map.getPane('pane_RW_3').style['mix-blend-mode'] = 'normal';
    var layer_RW_3 = new L.geoJson(json_RW_3, {
        attribution: '',
        interactive: true,
        dataVar: 'json_RW_3',
        layerName: 'layer_RW_3',
        pane: 'pane_RW_3',
        onEachFeature: pop_RW_3,
        style: style_RW_3_0,
    });
    bounds_group.addLayer(layer_RW_3);
    map.addLayer(layer_RW_3);

    function pop_jalan_4(feature, layer) {
        layer.on({
            mouseout: function(e) {
                for (i in e.target._eventParents) {
                    e.target._eventParents[i].resetStyle(e.target);
                }
                if (typeof layer.closePopup == 'function') {
                    layer.closePopup();
                } else {
                    layer.eachLayer(function(feature) {
                        feature.closePopup()
                    });
                }
            },
            mouseover: highlightFeature,
        });
        var popupContent = '<table>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['osm_id'] !== null ? Autolinker.link(feature.properties['osm_id'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['name'] !== null ? Autolinker.link(feature.properties['name'].toLocaleString()) : '') + '</td>\
                    </tr>\
                </table>';
        layer.bindPopup(popupContent, {
            maxHeight: 400
        });
    }

    function style_jalan_4_0() {
        return {
            pane: 'pane_jalan_4',
            opacity: 0.5,
            color: 'rgba(255,255,255,1.0)',
            dashArray: '',
            lineCap: 'square',
            lineJoin: 'bevel',
            weight: 1.0,
            fillOpacity: 0,
            interactive: true,
        }
    }
    map.createPane('pane_jalan_4');
    map.getPane('pane_jalan_4').style.zIndex = 404;
    map.getPane('pane_jalan_4').style['mix-blend-mode'] = 'normal';
    var layer_jalan_4 = new L.geoJson(json_jalan_4, {
        attribution: '',
        interactive: true,
        dataVar: 'json_jalan_4',
        layerName: 'layer_jalan_4',
        pane: 'pane_jalan_4',
        onEachFeature: pop_jalan_4,
        style: style_jalan_4_0,
    });
    bounds_group.addLayer(layer_jalan_4);
    map.addLayer(layer_jalan_4);
    var baseMaps = {};
    L.control.layers(baseMaps, {
        '<img src="<?php echo base_url() ?>leaflet/legend/jalan_4.png" /> jalan': layer_jalan_4,
        'RW<br /><table><tr><td style="text-align: center;"><img src="<?php echo base_url() ?>leaflet/legend/RW_3_0010.png" /></td><td>001</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url() ?>leaflet/legend/RW_3_0021.png" /></td><td>002</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url() ?>leaflet/legend/RW_3_0032.png" /></td><td>003</td></tr><tr><td style="text-align: center;"><img <?php echo base_url() ?>leaflet/legend/RW_3_0043.png" /></td><td>004</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url() ?>leaflet/legend/RW_3_0054.png" /></td><td>005</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url() ?>leaflet/legend/RW_3_0065.png" /></td><td>006</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url() ?>leaflet/legend/RW_3_0076.png" /></td><td>007</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url() ?>leaflet/legend/RW_3_0087.png" /></td><td>008</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url() ?>leaflet/legend/RW_3_Sawah8.png" /></td><td>Sawah</td></tr></table>': layer_RW_3,
        'Dusun<br /><table><tr><td style="text-align: center;"><img src="<?php echo base_url() ?>leaflet/legend/Dusun_2_Ngemplak0.png" /></td><td>Ngemplak</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url() ?>leaflet/legend/Dusun_2_Sanan1.png" /></td><td>Sanan</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url() ?>leaflet/legend/Dusun_2_Sawah2.png" /></td><td>Sawah</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url() ?>leaflet/legend/Dusun_2_Subontoro3.png" /></td><td>Subontoro</td></tr></table>': layer_Dusun_2,
        '<img src="<?php echo base_url() ?>leaflet/legend/mojotrisno_1.png" /> mojotrisno': layer_mojotrisno_1,
        "OpenStreetMap": layer_OpenStreetMap_0,
    }).addTo(map);
    setBounds();
    resetLabels([layer_Dusun_2]);
    map.on("zoomend", function() {
        resetLabels([layer_Dusun_2]);
    });
    map.on("layeradd", function() {
        resetLabels([layer_Dusun_2]);
    });
    map.on("layerremove", function() {
        resetLabels([layer_Dusun_2]);
    });

    //==========pemetaan==================================

    $.getJSON("<?=base_url('home/pemetaan_json')?>", function(data) {
        $.each(data, function(i, field) {

            var icon_lokasi = L.icon({
                iconUrl: "<?=base_url('icon/')?>" + data[i].icon + "",
                iconSize: [28, 45]
            });
            var v_lat = parseFloat(data[i].latitude);
            var v_long = parseFloat(data[i].longitude);
            var v_nama_dma = data[i].nama_dma;
            var v_sampul = data[i].sampul;
            var info_tempat = "<div class='media text-center'>";
            info_tempat += "<div class='media-center'>";
            info_tempat += "<img class='media-object' src='<?=base_url('sampul/')?>" + v_sampul + "' width='250px' height='150px'>";
            info_tempat += "</div>";
            info_tempat += "<div class='media-body '>";
            info_tempat += "<p><b>" + v_nama_dma + "</b></p>";
            info_tempat += "<div class='text-center'><a href='<?=base_url('kegiatan/detail/')?>" + data[i].id_dma + "' class='btn btn-success btn-minier text-center'><i class='fa fa-eye'></i> Detail</a></div>";
            info_tempat += "</div>";
            info_tempat += "</div>";

            L.marker([v_lat, v_long], {
                icon: icon_lokasi
            }).addTo(map).bindPopup(info_tempat)
        });
    });
</script>