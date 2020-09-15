<div class="col-md-2"></div>
<div class="col-md-8">
    <div class="widget-box widget-color-blue2">
        <div class="widget-header">
            <h4 class="widget-title lighter smaller"><?=$title?></h4>
            <div class="widget-toolbar no-border">
                <div class="inline dropdown-hover">
                </div>
            </div>
        </div>
        <div class="widget-body">
            <div class="widget-main padding-12">
                <p><?php echo lang('create_user_subheading'); ?></p>

                <?php
if ($this->session->flashdata('message_registration')) {
    echo '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
    echo $this->session->flashdata('message_registration');
    echo '</div>';
}
///  echo validation_errors('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>', '</div>');
?>
                <?php echo form_open("auth/create_registration"); ?>
                <div class="col-md-6">
                    <div class="form-group">
                        <?php echo lang('create_user_nik_label', 'nik'); ?> <br />
                        <?php echo form_input($nik); ?>
                    </div>
                    <div class="form-group">
                        <?php echo lang('create_user_fname_label', 'first_name'); ?> <br />
                        <?php echo form_input($first_name); ?>
                    </div>

                    <div class="form-group">
                        <?php echo lang('create_user_lname_label', 'last_name'); ?> <br />
                        <?php echo form_input($last_name); ?>
                    </div>

                    <div class="form-group">
                        <?php echo lang('create_user_phone_label', 'phone'); ?> <br />
                        <?php echo form_input($phone); ?>
                    </div>

                </div>
                <div class="col-md-6">
                    <?php
if ($identity_column !== 'email') {
    echo '<p>';
    echo lang('create_user_identity_label', 'identity');
    echo '<br />';
    echo form_error('identity');
    echo form_input($identity);
    echo '</p>';
}
?>
                    <div class="form-group">
                        <?php echo lang('create_user_email_label', 'email'); ?> <br />
                        <?php echo form_input($email); ?>
                    </div>
                    <div class="form-group">
                        <?php echo lang('create_user_password_label', 'password'); ?> <br />
                        <?php echo form_input($password); ?>
                    </div>

                    <div class="form-group">
                        <?php echo lang('create_user_password_confirm_label', 'password_confirm'); ?> <br />
                        <?php echo form_input($password_confirm); ?>
                    </div>


                    <div class="form-group">
                        <?php echo lang('create_user_pekerjaan_label', 'pekerjaan'); ?> <br />
                        <?php echo form_input($pekerjaan); ?>
                    </div>


                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <?php echo lang('create_user_alamat_lengkap_label', 'alamat_lengkap'); ?> <br />
                        <?php echo form_textarea($alamat_lengkap); ?>
                    </div>
                </div>

                <p><?php echo form_submit('submit', lang('create_user_submit_btn'), array('class' => 'btn btn-sm btn-flat btn-primary btn-block')); ?></p>




            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>