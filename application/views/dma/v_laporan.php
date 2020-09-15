						<div class="row">
							<div class="col-xs-12">



								<div class="row">
									<div class="col-sm-12">
										<div class="widget-box transparent">
											<div class="widget-header widget-header-large">
												<div class="col-sm-12">
													<table>
														<tr>
															<td>
																<i class="ace-icon fa fa-file green"></i>
																Laporan Kegiatan Tahun :
															</td>
															<td>
																<?php echo form_open('kegiatan/laporan'); ?>
																<select name="tahun">
																	<option value="All">All</option>
																	<?php
																	$thn_skr = date('Y');
																	for ($x = $thn_skr; $x >= 2014; $x--) {
																	?>
																		<option value="<?php echo $x ?>" <?php if ($this->session->flashdata('tahun') == $x) {
																												echo 'selected';
																											} ?>><?php echo $x ?></option>
																	<?php
																	}
																	?>
																</select>
																<button class="btn btn-sm btn-success"><i class="fa fa-print"></i> Print</button>
																<?php echo form_close(); ?>
															</td>
															<td>

															</td>
														</tr>
													</table>


												</div>






											</div>

											<div class="widget-body">
												<div class="widget-main padding-24">
													<div class="row">
														<table class="table table-striped table-bordered table-hover table-responsive">
															<thead>
																<tr>
																	<th width="30px" class="text-center">No</th>
																	<th class="text-center">Nama Kegiatan</th>
																	<th class="text-center">Jenis Kegiatan</th>
																	<th class="text-center">Sumber Dana</th>
																	<th class="text-center">Anggaran</th>
																	<th class="text-center">Volume</th>
																	<th class="text-center">Pelaksana</th>
																	<th class="text-center">Tahun</th>

																</tr>
															</thead>
															<tbody>
																<?php $no = 1;
																foreach ($kegiatan as $key => $value) { ?>
																	<tr>
																		<td><?= $no++ ?></td>
																		<td><?= $value->nama_dma ?></td>
																		<td><?= $value->jenis_kegiatan ?></td>
																		<td><?= $value->sumber_dana ?></td>
																		<td>Rp. <?= number_format($value->anggaran, 0) ?></td>
																		<td><?= $value->volume ?></td>
																		<td><?= $value->pelaksana ?></td>
																		<td class="text-center"><?= $value->tahun ?></td>

																	</tr>
																<?php } ?>
															</tbody>

														</table>
													</div><!-- /.row -->


													<script>
														window.print();
													</script>