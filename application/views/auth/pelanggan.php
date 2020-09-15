<div class="row">
    <div class="col-md-12">
        <div class="widget-box widget-color-blue2">
            <div class="widget-header">
                <h4 class="widget-title lighter smaller"><?=$title?></h4>
                <div class="widget-toolbar no-border">
                    <div class="inline dropdown-hover">

                        <?php if ($this->ion_auth->in_group('admin')) {?>
                        <a href="<?=base_url('auth/create_user')?>" class="btn btn-flat btn-sm btn-primary"><i
                                class="fa fa-plus"></i> Add Member</a>
                        <a href="<?=base_url('auth/create_group')?>" class="btn btn-flat btn-sm btn-primary"><i
                                class="fa fa-plus"></i> Add Group</a>
                        <?php }?>
                        <a href="<?=base_url('kegiatan/lap')?>" class="btn btn-flat btn-sm btn-primary"><i
                                class="fa fa-print"></i> Print</a>

                    </div>
                </div>
            </div>


            <div class="widget-body">
                <div class="widget-main padding-8">
                    <h1><?php echo lang('index_heading'); ?></h1>
                    <p><?php echo lang('index_subheading'); ?></p>

                    <div id="infoMessage"><?php echo $message; ?></div>
                    <table id="dataTables-example"
                        class="table table-striped table-bordered table-hover table-responsive">
                        <tr>
                            <th>No</th>
                            <th><?php echo lang('index_fname_th'); ?></th>
                            <th><?php echo lang('index_lname_th'); ?></th>
                            <th><?php echo lang('index_email_th'); ?></th>
                            <th><?php echo lang('index_groups_th'); ?></th>
                            <th>Latitude</th>
                            <th>Longitude</th>
                            <th><?php echo lang('index_action_th'); ?></th>
                        </tr>
                        <?php $no = 1;foreach ($users as $user): ?>
                        <tr>
                            <td><?=$no++?></td>
                            <td><?php echo htmlspecialchars($user->first_name, ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlspecialchars($user->last_name, ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlspecialchars($user->email, ENT_QUOTES, 'UTF-8'); ?></td>
                            <td>
                                <?php foreach ($user->groups as $group): ?>
                                <?php echo anchor("auth/edit_group/" . $group->id, htmlspecialchars($group->name, ENT_QUOTES, 'UTF-8')); ?><br />
                                <?php endforeach?>
                            </td>
                            <td><?php echo htmlspecialchars($user->lat, ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlspecialchars($user->lng, ENT_QUOTES, 'UTF-8'); ?></td>
                            </td>
                            <td class="text-center">
                                <a href="<?=base_url('profile/detail/' . $user->id)?>"
                                    class="btn btn-flat btn-mini btn-info"><i class="fa fa-eye"></i></a>
                                <?php if ($this->ion_auth->in_group('admin')) {?>
                                <a href="<?=base_url("auth/edit_user_pelanggan/" . $user->id)?>"
                                    class="btn btn-flat btn-mini btn-warning"><i class="fa fa-pencil"></i></a>
                                <a href="<?=base_url("rumah/show/" . $user->id)?>"
                                    class="btn btn-flat btn-mini btn-success"><i class="fa fa-home"></i></a>
                                <a href="<?=base_url('auth/delete/' . $user->id)?>"
                                    class="btn btn-flat btn-mini btn-danger"
                                    onclick="return confirm('Yakin Ingin Menghapus Data ini.?')"><i
                                        class="fa fa-trash"></i></a>
                                <?php }?>
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
