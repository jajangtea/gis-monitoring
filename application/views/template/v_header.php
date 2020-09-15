<div id="navbar" class="navbar navbar-default    navbar-collapse       h-navbar ace-save-state">
	<div class="navbar-container ace-save-state" id="navbar-container">
		<div class="navbar-header pull-left">
			<a href="<?= base_url() ?>" class="navbar-brand">
				<small>
					<i class="fa fa-globe"></i>
					<?php
					$group = 'admin';
					if (!$this->ion_auth->in_group($group)) { ?>
						GIS PDAM TIRTA KEPRI
					<?php } else { ?>
						Halaman Admin
					<?php } ?>


				</small>
			</a>

			<button class="pull-right navbar-toggle navbar-toggle-img collapsed" type="button" data-toggle="collapse">
				<span class="sr-only">Toggle user menu</span>


			</button>

			<button class="pull-right navbar-toggle  collapsed" type="button" data-toggle="collapse" data-target=".navbar-buttons,.navbar-menu">
				<span class="sr-only">Toggle sidebar</span>

				<span class="icon-bar"></span>

				<span class="icon-bar"></span>

				<span class="icon-bar"></span>
			</button>
		</div>

		<div class="navbar-buttons navbar-header pull-right  collapse navbar-collapse" role="navigation">
			<ul class="nav ace-nav">
				<?php if (!$this->ion_auth->logged_in()) { ?>
					<li class="transparent dropdown-modal">
						<a href="<?= base_url('auth/create_registration'); ?>">

							<i class="ace-icon fa fa-user"></i> Registrasi</a>

						<!-- /.dropdown-menu -->
					</li>

					<li class="transparent dropdown-modal">
						<a href="<?= base_url('auth/login'); ?>">

							<i class="ace-icon fa fa-user"></i> Login</a>

						<!-- /.dropdown-menu -->
					</li>

				<?php } else {  ?>

					<li class="transparent dropdown-modal">
						<a href="<?= base_url('auth/logout') ?>">

							<i class="ace-icon fa fa-sign-out"></i> Logout</a>

					<?php } ?>
			</ul>
			</li>
			</ul>
		</div>