<?php

if ($isi) {

    $this->load->view($isi);
    if (isset($js)) {
        $this->load->view($js);
    }
}
