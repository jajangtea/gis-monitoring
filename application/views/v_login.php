<div class="col-md-4"></div>
<div class="col-md-4">
	<div class="widget-box widget-color-blue2">
		<div class="widget-header">
			<h4 class="widget-title lighter smaller"><?= $title ?></h4>
			<div class="widget-toolbar no-border">
				<div class="inline dropdown-hover">
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
				echo validation_errors('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>', '</div>');

				echo form_open('login');

				?>


				<div class="form-group">
					<label>Username</label>
					<input name="username" type="text" class="form-control" placeholder="Username" required>
				</div>

				<div class="form-group">
					<label>Password</label>
					<input name="password" type="password" class="form-control" placeholder="Password" required>
				</div>


				<div class="form-group">
					<button type="submit" class="btn btn-sm btn-flat btn-primary btn-block">Login</button>
				</div>

				<?php echo form_close(); ?>


			</div>
		</div>
	</div>



</div>
<div class="col-md-4"></div>