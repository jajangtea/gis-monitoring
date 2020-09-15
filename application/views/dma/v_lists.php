<div class="row">
    <div class="col-md-12">
        <div class="widget-box widget-color-blue2">
            <div class="widget-header">
                <h4 class="widget-title lighter smaller"><?=$title?></h4>
                <div class="widget-toolbar no-border">
                    <div class="inline dropdown-hover">

                        <?php if ($this->session->userdata('username') != '') {?>
                        <a href="<?=base_url('dma/add1')?>" class="btn btn-flat btn-sm btn-primary"><i
                                class="fa fa-plus"></i> Add</a>
                        <?php }?>
                        <a href="<?=base_url('dma/create_dma')?>" class="btn btn-flat btn-sm btn-primary"><i
                                class="fa fa-plus"></i> Add DMA</a>
                        <a href="<?=base_url('dma/lap')?>" class="btn btn-flat btn-sm btn-primary"><i
                                class="fa fa-print"></i> Print</a>

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
?>

                    <table id="dataTables-example"
                        class="table table-striped table-bordered table-hover table-responsive">
                        <thead>
                            <tr>
                                <th width="30px" class="text-center">No</th>
                                <th class="text-center">Nama DMA</th>
                                <th class="text-center">Lokasi</th>
                                <th class="text-center">Deskripsi DMA</th>
                                <th class="text-center">
                                    <?php if (!$this->ion_auth->in_group('admin')) {?>
                                    Action
                                    <?php } else {?>
                                    Detail
                                    <?php }?>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
foreach ($kegiatan as $key => $value) {?>
                            <tr>
                                <td><?=$no++?></td>
                                <td><?=$value->nama_dma?></td>
                                <td><?=$value->lokasi?></td>
                                <td><?=$value->deskripsi?></td>
                                <td class="text-center">
                                    <a href="<?=base_url('dma/detail/' . $value->id_dma)?>"
                                        class="btn btn-flat btn-mini btn-info"><i class="fa fa-eye"></i></a>
                                    <?php if ($this->ion_auth->in_group('admin')) {?>
                                    <a href="<?=base_url('dma/edit/' . $value->id_dma)?>"
                                        class="btn btn-flat btn-mini btn-warning"><i class="fa fa-pencil"></i></a>
                                    <a href="<?=base_url('dma/delete/' . $value->id_dma)?>"
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
