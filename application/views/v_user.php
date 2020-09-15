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
              if ($this->session->flashdata('pesan')) {
              echo '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="icon fa fa-check"></i>';
              echo $this->session->flashdata('pesan');
              echo '</div>';
			  }
			  
			  //notifikasi error
				echo validation_errors('<div class="alert alert-warning alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<i class="icon fa fa-warning"></i>','</div>');
              ?>
			<table id="dataTables-example" class="table table-striped table-bordered table-hover table-responsive">
				<thead>
					<tr>
						<th class="text-center">No</th>
						<th class="text-center">Nama User</th>
						<th class="text-center">Username</th>
						<th class="text-center">Password</th>
						<th class="text-center">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $no=1; foreach ($user as $key => $value) { ?>
					<tr>
						<td class="text-center"><?= $no++ ?></td>
						<td class="text-center"><?= $value->nama_user ?></td>
						<td class="text-center"><?= $value->username ?></td>
						<td class="text-center"><?= $value->password ?></td>
						<td class="text-center">
							<button class="btn btn-flat btn-xs btn-warning" data-toggle="modal" data-target="#<?= $value->id_user ?>"><i class="fa fa-pencil"></i></button>
							<a href="<?= base_url('user/delete/'.$value->id_user) ?>" class="btn btn-flat btn-xs btn-danger" onclick="return confirm('Yakin Ingin Menghapus Data ini.?')"><i class="fa fa-trash"></i></a>
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
                <h4 class="modal-title">Add User</h4>
              </div>
              <div class="modal-body">
			<?php 
			echo form_open_multipart('user/add');
				?>

				<div class="form-group">
					<label class="control-label">Nama User</label>
					<input name="nama_user" type="text" class="form-control" placeholder="Nama User" required>
				</div>
				<div class="form-group">
					<label class="control-label">Username</label>
					<input name="username" type="text" class="form-control" placeholder="Username" required>
				</div>
				<div class="form-group">
					<label class="control-label">Password</label>
					<input name="password" type="text" class="form-control" placeholder="Password" required>
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
 <?php foreach ($user as $key => $value) {?>
	<div class="modal fade" id="<?= $value->id_user ?>">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit User</h4>
              </div>
              <div class="modal-body">
			<?php 
			echo form_open_multipart('user/edit/'.$value->id_user);
				?>

				<div class="form-group">
					<label class="control-label">Nama User</label>
					<input name="nama_user" value="<?= $value->nama_user; ?>" type="text" class="form-control" placeholder="Nama User" required>
				</div>
				<div class="form-group">
					<label class="control-label">Username</label>
					<input name="username" value="<?= $value->username; ?>" type="text" class="form-control" placeholder="Username" required>
				</div>
				<div class="form-group">
					<label class="control-label">Password</label>
					<input name="password" value="<?= $value->password; ?>" type="text" class="form-control" placeholder="Password" required>
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
