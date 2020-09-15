<h1><?php echo lang('forgot_password_heading'); ?></h1>
<p><?php echo sprintf(lang('forgot_password_subheading'), $identity_label); ?></p>

<div id="infoMessage"><?php echo $message; ?></div>

<?php echo form_open("auth/forgot_password"); ?>
<div class="col-xs-4">
      <div class="form-group">
            <label for="identity"><?php echo (($type == 'email') ? sprintf(lang('forgot_password_email_label'), $identity_label) : sprintf(lang('forgot_password_identity_label'), $identity_label)); ?></label> <br />
            <?php echo form_input($identity); ?>
      </div>
      <div class="form-group">

            <?php echo form_submit('submit', lang('forgot_password_submit_btn'), array('class' => 'btn btn-sm btn-flat btn-primary btn-block')); ?>

      </div>
</div>
<?php echo form_close(); ?>