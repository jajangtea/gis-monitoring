<div class="row">

<div class="col-md-2"></div>
    <div class="col-md-8">
    <?php
echo validation_errors('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>', '</div>');
echo form_open('keluhan/edit/' . $keluhan->id);
?>
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
                    <div class="form-group">
                        <label>Tanggal Buat:</label>
                        <input name="tanggal" value="<?=$keluhan->tanggal?>" id="tanggal" type="text"  class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label>Nomor Tiket:</label>
                        <input name="nomor_tiket" value="<?=$keluhan->nomor_tiket?>" id="nomor_tiket" type="text"  class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label>Status:</label>
                        <input name="status_keluhan" value="<?=M_Keluhan::status($keluhan->status_keluhan)?>" id="status_keluhan" type="text"  class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label>Sampaikan Keluhan anda :</label>
                        <textarea name="isi_keluhan" id="isi_keluhan" cols="30" rows="10" class="form-control"><?=$keluhan->isi_keluhan?></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-sm btn-flat btn-primary">Simpan</button>
                        <button type="reset" class="btn btn-sm btn-flat btn-warning">Reset</button>
                    </div>
                    <?php echo form_close(); ?>
                    </div>
            </div>
        </div>
 <div class="col-md-2"></div>



