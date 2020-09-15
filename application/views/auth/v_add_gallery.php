<div class="col-sm-12">
  <div class="panel panel-primary">
    <div class="panel-heading">Input Data Penginapan</div>
    <div class="panel-body">

<?php

//notifikasi error
echo validation_errors('<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>','</div>');
//error upload
if (isset($error_upload)){
    echo '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert"><i class="fa fa-times"></i>
        </button><i class="fa fa-bullhorn"></i>'.$error_upload.'</div>';
}
 
      // notifikasi
           
			  
$atribut='class="form-horizontal"';
echo form_open_multipart('gallery/add/'.$kegiatan->id_kegiatan,$atribut);
 ?>


    	<div class="form-group">
        <div class="col-sm-6">
            <label class="control-label">Ket Foto</label>
            <input name="ket_foto" type="text" class="form-control" placeholder="Ket Foto" required>
		</div>
		<div class="col-sm-6">
            <label class="control-label">File Foto</label>
            <input name="foto_kegiatan" type="file" class="form-control" placeholder="Nama Penginapan" required>
        </div>
    	</div>

    	  <div class="form-group">
        	<div class="col-sm-6">
        		<button type="submit" class="form-control btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
        	</div>
            <div class="col-sm-6">
            	<a href="" class="form-control btn btn-success"><i class="fa fa-times"></i> Close</a>
            </div>
        </div>


<?php echo form_close(); ?>
<hr>
<?php
   if ($this->session->flashdata('pesan')) {
	echo '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="icon fa fa-check"></i>';
	echo $this->session->flashdata('pesan');
	echo '</div>';
   }
?>

<div class="col-xs-4 col-sm-4 pricing-box">
	<div class="widget-box widget-color-grey">
		<div class="widget-header">
			<h6 class="widget-title bigger lighter">Foto Sampul</h6>
		</div>

		<div class="widget-body">
			<div class="widget-main text-center">
				<img src="<?= base_url('sampul/'.$kegiatan->sampul) ?>" width="280px"  height="180px">
			</div>
			<div>
				<button href="#" class="btn btn-success btn-minier" data-toggle="modal" data-target="#sampul<?= $kegiatan->id_kegiatan ?>">
					<i class="ace-icon fa fa-eye"></i>
				</button>
			</div>
		</div>
	</div>
</div>

<?php  foreach ($gallery as $key => $value) { ?>
	
<div class="col-xs-4 col-sm-4 pricing-box">
	<div class="widget-box widget-color-grey">
		<div class="widget-header">
			<h6 class="widget-title bigger lighter"><?= $value->ket_foto ?></h6>
		</div>

		<div class="widget-body">
			<div class="widget-main text-center">
				<img src="<?= base_url('foto_kegiatan/'.$value->foto_kegiatan) ?>" width="280px"  height="180px">
			</div>
			<div>
				<button href="#" class="btn btn-success btn-minier" data-toggle="modal" data-target="#<?= $value->id_gallery ?>">
					<i class="ace-icon fa fa-eye"></i>
				</button>

				<button href="#" class="btn btn-primary btn-minier" data-toggle="modal" data-target="#edit<?= $value->id_gallery ?>">
					<i class="ace-icon fa fa-pencil"></i>
				</button>
				<a href="<?= base_url('gallery/delete/'.$value->id_kegiatan.'/'.$value->id_gallery) ?>" onclick="return confirm('Yakin Ingin Menghapus Foto ini.?')" class="btn btn-danger btn-minier">
					<i class="ace-icon fa fa-trash"></i>
					
				</a>
			</div>
		</div>
	</div>
</div>
<?php } ?>
									

    </div>
    <div class="panel-footer"></div>
  </div>
</div>



<?php  foreach ($gallery as $key => $value) { ?>
<div class="modal fade" id="<?= $value->id_gallery ?>">
	<div class="modal-dialog modal-lg">
	<div class="modal-content">
		<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title"><?= $value->ket_foto ?></h4>
		</div>
		<div class="modal-body">
		<div class="text-center">
				<img src="<?= base_url('foto_kegiatan/'.$value->foto_kegiatan) ?>" width="800px"  height="500px">
		</div>
		</div>
	</div>
	<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?php } ?>

<?php  foreach ($gallery as $key => $value) { ?>
 <!-- edit -->
   <div class="modal fade" id="edit<?= $value->id_gallery ?>">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Foto</h4>
              </div>
              <div class="modal-body">
			<?php 
			echo form_open_multipart('gallery/edit/'.$value->id_kegiatan.'/'.$value->id_gallery);
				?>

				<div class="form-group">
					<label class="control-label">Ket Foto</label>
					<input name="ket_foto" value="<?= $value->ket_foto ?>" type="text" class="form-control" placeholder="Keterangan Foto" required>
				</div>

				<div class="form-group text-center">
					<img src="<?= base_url('foto_kegiatan/'.$value->foto_kegiatan) ?>" width="270px" height="150px">
				</div>

				<div class="form-group">
					<label class="control-label">Ganti Foto</label>
					<input name="foto_kegiatan" type="file" class="form-control">
					<label class="text-danger">Max Ukuran 2000 kb</label>
				</div>

			
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-default pull-left btn-flat" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-sm btn-primary btn-flat">Save</button>
              </div>
			  <?php echo form_close(); ?>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
 <?php } ?>



<div class="modal fade" id="sampul<?= $kegiatan->id_kegiatan ?>">
	<div class="modal-dialog modal-lg">
	<div class="modal-content">
		<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title">Foto Sampul</h4>
		</div>
		<div class="modal-body">
		<div class="text-center">
				<img src="<?= base_url('sampul/'.$kegiatan->sampul) ?>" width="800px"  height="500px">
		</div>
		</div>
	</div>
	<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
