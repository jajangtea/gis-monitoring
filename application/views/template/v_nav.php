<nav role="navigation" class="navbar-menu pull-left collapse navbar-collapse">
    <ul class="nav navbar-nav">


        <?php
//    $user_id = $this->ion_auth->user()->row()->id;
//    $user_groups = $this->ion_auth->get_users_groups()->row()->name;
if ($this->ion_auth->in_group('pelanggan')) {?>
        <li><a href="<?=base_url()?>"><i class=""></i> Home</a></li>
        <li><a href="<?=base_url('auth/profile_pelanggan')?>"><i class=""></i> Profil</a></li>
        <li><a href="<?=base_url('keluhan')?>"><i class=""></i> Keluhan</a></li>
        <li>
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Kegiatan Fisik &nbsp;<i
                    class="fa fa-angle-down bigger-110"></i></a>

        </li>
        <li><a href="<?=base_url('kegiatan')?>"><i class=""></i> Data Kegiatan Fisik</a></li>
        <?php }?>

        <?php if ($this->ion_auth->in_group('admin')) {?>
        <li><a href="<?=base_url('dma')?>"><i class=""></i> DMA</a></li>
        <li><a href="<?=base_url('rumah')?>"><i class=""></i> Gallery</a></li>
        <li><a href="<?=base_url('auth')?>"><i class=""></i> Staff</a></li>
        <li><a href="<?=base_url('auth/pelanggan')?>"><i class=""></i> Pelanggan</a></li>
        <?php }?>


    </ul>
</nav>
</div><!-- /.navbar-container -->
</div>
<div class="main-container ace-save-state" id="main-container">

    <div class="main-content">
        <div class="main-content-inner">



            <div class="page-content">

                <?php if ($this->uri->segment(1) != "") {?>
                <div class="page-header">
                    <h1>
                        PDAM Tirta Kepri
                        <small>
                            <i class="ace-icon fa fa-angle-double-right"></i>
                            <?=$title?>
                        </small>
                    </h1>
                </div>
                <?php }?>
