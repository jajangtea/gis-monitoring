<div class="row">
<div class="col-md-2"></div>
	<div class="col-md-8">
		<div class="widget-box widget-color-blue2">
			<div class="widget-header">
				<h4 class="widget-title lighter smaller"><?= $title ?></h4>
				<div class="widget-toolbar no-border">
				<div class="inline dropdown-hover">
				<button type="button" class="btn btn-flat btn-sm btn-primary" data-toggle="modal" data-target="#modal-default"><i class="fa fa-plus"></i> Add</button>
				</div>
			</div>
			</div>
			

			<div class="widget-body">
				<div class="widget-main padding-8">
					
				<?php 
              // notifikasi
              if ($this->session->flashdata('sukses')) {
              echo '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="icon fa fa-check"></i>';
              echo $this->session->flashdata('sukses');
              echo '</div>';
			  }
			  
			   // notifikasi
			   if ($this->session->flashdata('error')) {
				echo '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="icon fa fa-times"></i>';
				echo $this->session->flashdata('error');
				echo '</div>';
				}
              ?>
			<table id="dataTables-example" class="table table-striped table-bordered table-hover table-responsive">
				<thead>
					<tr>
						<th class="text-center" width="50px">No</th>
						<th class="text-center"  >Jenis Kegiatan</th>
						
						<th class="text-center" width="70px">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $no=1; foreach ($jenis as $key => $value) { ?>
					<tr>
						<td class="text-center"><?= $no++ ?></td>
						<td class="text-center"><?= $value->jenis_kegiatan ?></td>
						
						<td class="text-center">
							<button class="btn btn-flat btn-xs btn-warning" data-toggle="modal" data-target="#<?= $value->id_jenis ?>"><i class="fa fa-pencil"></i></button>
							<a href="<?= base_url('jenis/delete/'.$value->id_jenis) ?>" class="btn btn-flat btn-xs btn-danger" onclick="return confirm('Yakin Ingin Menghapus Data ini.?')"><i class="fa fa-trash"></i></a>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			
			</table>
					
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-2"></div>	
</div>

								
		
	
				




   <!-- add -->
<div class="modal fade" id="modal-default">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Jenis Kegiatan</h4>
              </div>
              <div class="modal-body">
			<?php 
			echo form_open_multipart('jenis/add');
				?>

				<div class="form-group">
					<label class="control-label">Jenis Kegiatan</label>
					<input name="jenis_kegiatan" type="text" class="form-control" placeholder="Jenis Kegiatan" required>
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


   <!-- edit -->
 <?php foreach ($jenis as $key => $value) {?>
   <div class="modal fade" id="<?= $value->id_jenis ?>">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Jenis Kegiatan</h4>
              </div>
              <div class="modal-body">
			<?php 
			echo form_open_multipart('jenis/edit/'.$value->id_jenis);
				?>

				<div class="form-group">
					<label class="control-label">Jenis Kegiatan</label>
					<input name="jenis_kegiatan" value="<?= $value->jenis_kegiatan ?>" type="text" class="form-control" placeholder="Jenis Kegiatan" required>
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
