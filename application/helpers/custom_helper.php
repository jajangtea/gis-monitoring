<?php
function templates($a = '', $b = "")
{
    if ($b == 'website') {
        return base_url('assets/templates/safario/' . $a);
    } else {
        return base_url('assets/templates/gentelella/' . $a);
    }
}
function content_open($title = '')
{
    return '<div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>' . $title . '</h3>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12  ">
        <div class="x_panel">
          <div class="x_title">
            <h2>' . $title . '</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">';
}
function content_close()
{
    return ' </div>
        </div>
      </div>
    </div>
  </div>';
}
function assets($file = '')
{
    return base_url('assets/' . $file);
}

function assets_sampul($file = '')
{
    return base_url('sampul/' . $file);
}

function assets_marker($file = '')
{
    return base_url('icon/' . $file);
}
function upload($name = 'file', $folder = 'geojson', $types = "image")
{
    if ($types == 'image') {
        $allowed_types = 'gif|jpg|png';
        // $config['max_width']    = 1024;
        // $config['max_height']   = 768;
    } elseif ($types == 'geojson') {
        $allowed_types = 'geojson';
    } elseif ($types == 'csv') {
        $allowed_types = 'csv';
    }
    $CI                      = &get_instance();
    $config['upload_path']   = './assets/unggah/' . $folder . '/';
    $config['allowed_types'] = $allowed_types;
    $config['max_size']      = 1000;
    $CI->load->library('upload', $config);
    if (!$CI->upload->do_upload($name)) {
        $response['info']    = false;
        $response['message'] = $CI->upload->display_errors();
    } else {
        $response['info']        = true;
        $response['message']     = "Sukses di unggah";
        $response['upload_data'] = $CI->upload->data();
    }
    return $response;
}
