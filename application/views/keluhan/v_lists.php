<div class="row">
    <div class="col-md-12">
        <div class="widget-box widget-color-blue2">
            <div class="widget-header">
                <h4 class="widget-title lighter smaller"><?=$title?></h4>
                <div class="widget-toolbar no-border">
                    <div class="inline dropdown-hover">

                        <?php if ($this->session->userdata('username') != '') {?>
                        <a href="<?=base_url('keluhan/add1')?>" class="btn btn-flat btn-sm btn-primary"><i
                                class="fa fa-plus"></i> Add</a>
                        <?php }?>
                        <a href="<?=base_url('keluhan/create_keluhan')?>" class="btn btn-flat btn-sm btn-primary"><i
                                class="fa fa-plus"></i> Add keluhan</a>
                        <a href="<?=base_url('keluhan/lap')?>" class="btn btn-flat btn-sm btn-primary"><i
                                class="fa fa-print"></i> Print</a>

                    </div>
                </div>
            </div>


            <div class="widget-body">
                <div class="widget-main padding-8">

                    <?php
if ($this->session->flashdata('pesan')) {
    echo '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="icon fa fa-check"></i>';
    echo $this->session->flashdata('pesan');
    echo '</div>';
}
?>

                    <table id="dataTables-example"
                        class="table table-striped table-bordered table-hover table-responsive">
                        <thead>
                            <tr>
                                <th width="30px" class="text-center">No</th>
                                <th class="text-center">Nomor Tiket</th>
                                <th class="text-center">Tanggal</th>
                                <th class="text-center">Keluhan</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
foreach ($keluhan as $key => $value) {?>
                            <tr>
                                <td><?=$no++?></td>
                                <td><?=$value->nomor_tiket?></td>
                                <td><?=$value->tanggal?></td>
                                <td><?=$value->isi_keluhan?></td>
                                <td><?=M_Keluhan::status($value->status_keluhan)?></td>
                                <td class="text-center">
                                    <a href="<?=base_url('keluhan/detail/' . $value->id_keluhan)?>"
                                        class="btn btn-flat btn-mini btn-info"><i class="fa fa-eye"></i></a>
                                    <?php if ($this->ion_auth->in_group('pelanggan')) {?>
                                    <a href="<?=base_url('keluhan/edit/' . $value->id_keluhan)?>"
                                        class="btn btn-flat btn-mini btn-warning"><i class="fa fa-pencil"></i></a>
                                    <a href="<?=base_url('keluhan/delete/' . $value->id_keluhan)?>"
                                        class="btn btn-flat btn-mini btn-danger"
                                        onclick="return confirm('Yakin Ingin Menghapus Data ini.?')"><i
                                            class="fa fa-trash"></i></a>
                                    <?php }?>
                                </td>
                            </tr>
                            <?php }?>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
