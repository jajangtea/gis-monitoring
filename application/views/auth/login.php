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
        if ($this->session->flashdata('message')) {
          echo '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
          echo $this->session->flashdata('message');
          echo '</div>';
        }
        ?>
        <p><?php echo lang('login_subheading'); ?></p>



        <?php echo form_open("auth/login"); ?>

        <div class="form-group">
          <label><?php echo lang('login_identity_label', 'identity'); ?></label>
          <?php echo form_input($identity); ?>
        </div>

        <div class="form-group">
          <?php echo lang('login_password_label', 'password'); ?>
          <?php echo form_input($password); ?>
        </div>

        <p>
          <?php echo lang('login_remember_label', 'remember'); ?>
          <?php echo form_checkbox('remember', '1', false, 'id="remember"', array('class' => 'form-control')); ?>
        </p>


        <p><?php echo form_submit('submit', lang('login_submit_btn'), array('class' => 'btn btn-sm btn-flat btn-primary btn-block')); ?></p>

        <?php echo form_close(); ?>

        <p><a href="forgot_password"><?php echo lang('login_forgot_password'); ?></a></p>
      </div>
    </div>
  </div>
</div>