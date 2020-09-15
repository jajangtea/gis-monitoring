<div class="row">
	<div class="col-md-12">
		<div class="widget-box widget-color-blue2">
			<div class="widget-header">
				<h4 class="widget-title lighter smaller"><?=$title?></h4>
				<div class="widget-toolbar no-border">
					<div class="inline dropdown-hover">
						<?php if ($this->ion_auth->in_group('admin')) {?>
							<a href="<?=base_url('auth/create_user')?>" class="btn btn-flat btn-sm btn-primary"><i class="fa fa-plus"></i> Add Member</a>
							<a href="<?=base_url('auth/create_group')?>" class="btn btn-flat btn-sm btn-primary"><i class="fa fa-plus"></i> Add Group</a>
						<?php }?>
						<a href="<?=base_url('kegiatan/lap')?>" class="btn btn-flat btn-sm btn-primary"><i class="fa fa-print"></i> Print</a>
					</div>
				</div>
			</div>
			<div class="widget-body">
				<div class="widget-main padding-8">
					<h3><span>DATA STAFF PDAM TIRTA KEPRI</span></h3>
					<p><span>Di bawah ini list dari para staff.</span></p>
					<div id="infoMessage"><?php echo $message; ?></div>
					<table id="dataTables-example" class="table table-striped table-bordered table-hover table-responsive">
					<thead>
						<tr>
							<th><?php echo lang('index_fname_th'); ?></th>
							<th><?php echo lang('index_lname_th'); ?></th>
							<th><?php echo lang('index_email_th'); ?></th>
							<th><?php echo lang('index_action_th'); ?></th>
						</tr>
						</thead>
						<tbody>
						<?php foreach ($users as $user): ?>
							<tr>
								<td><?php echo htmlspecialchars($user->first_name, ENT_QUOTES, 'UTF-8'); ?></td>
								<td><?php echo htmlspecialchars($user->last_name, ENT_QUOTES, 'UTF-8'); ?></td>
								<td><?php echo htmlspecialchars($user->email, ENT_QUOTES, 'UTF-8'); ?></td>
								<td>
								<?php echo anchor("auth/edit_user/" . $user->id, 'Edit'); ?>
								<?php echo anchor("auth/delete_user/" . $user->id, 'Delete'); ?>
								</td>

								
							</tr>
						<?php endforeach;?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>