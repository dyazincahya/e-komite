
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<h4 class="modal-title">Modal title</h4>
						</div>
						<div class="modal-body">
							 Widget settings form goes here
						</div>
						<div class="modal-footer">
							<button type="button" class="btn blue">Save changes</button>
							<button type="button" class="btn default" data-dismiss="modal">Close</button>
						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			<!-- /.modal -->
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- BEGIN PAGE HEADER-->
			<!-- BEGIN PAGE HEAD -->
			<div class="page-head">
				<!-- BEGIN PAGE TITLE -->
				<div class="page-title">
					<h1>Data Sumbangan Rutin SMA Negeri 1 Rambatan</h1>
				</div>
			</div>
			<!-- END PAGE HEAD -->
			<!-- BEGIN PAGE BREADCRUMB -->
			<ul class="page-breadcrumb breadcrumb">
				<li>
					<a href="#">Siswa</a>
					<i class="fa fa-circle"></i>
				</li>
				<li>
					<a href="#">Data</a>
					<i class="fa fa-circle"></i>
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box blue-hoki">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-globe"></i>Data Sumbangan
							</div>
							<div class="tools">
							</div>
                        </div>
                        
						<div class="portlet-body">
                            
							<a href="#" class="btn btn-success btn-sm tambah-sumbangan"><i class="fa fa-plus"></i>Tambah Persiswa</a>
							<a href="#" class="btn btn-success btn-sm tambah-keseluruhan"><i class="fa fa-plus"></i>Tambah Kelesuruhan</a>
							<a href="#" class="btn btn-warning btn-sm cetak-laporan-rutin"  ><i class="fa fa-print"></i> Cetak Laporan</a>
                            <?php if ($this->session->userdata('error')):?>
						<div id="message_error" class="alert alert-danger alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-ban"></i> Maaf !</h4>
							<?php echo $this->session->userdata('error');?>
						</div>
						<?php elseif ($this->session->userdata('success')):?>
						<div id="message_success" class="alert alert-success alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-check"></i> Success !</h4>
							<?php echo $this->session->userdata('success');?>
						</div>
						<?php endif;?>
							<table class="table table-striped table-bordered table-hover" id="sample_1">
							<thead>
							<tr>
								<th style="width: 20px;">
									 No
								</th>
								<th>
									 Nama
								</th>
								<th>
									 NISN
								</th>
								<th style="width: 90px;">
									 Nama Kelas
								</th>
								<th style="width: 120px;">Total Sumbangan</th>
								<th>Bulan</th>
								<th style="width: 190px;">Status </th>
								<th style="width: 220px;">
									 Action
								</th>
							</tr>
							</thead>
							<tbody>
						<?php if ($status_data=='0'):?>
							<tr>
								<td colspan="20">Tidak Ada Data</td>
							</tr>
<?php elseif ($status_data=='1'):?>
	<?php $no=1; foreach ($sumbangan as $value):?>
<tr>
	<td><?=$no++?></td>
	<td><?=$value['nama_siswa']?></td>
	<td><?=$value['nisn']?></td>
	<td><?=$value['nama_kelas']?></td>
	<td>Rp. <?=number_format($value['tarif_komite'])?></td>
	<td><?=$value['waktu']?></td>
	<td>
		<?php  if ($value['status']=='-'):?>
			<a href="#" class="label label-danger"><i class="fa fa-ban"></i>Belum lunas</a>
			<?php elseif ($value['status']=='1'):?>
			<a href="#" class="label label-success"><i class="fa fa-check"></i> lunas</a>
			<?php elseif ($value['status']=='3'):?>
			<a href="#" class="label label-warning"><i class="fa fa-warning"></i> Konfirmasi</a>
			<a href="#" data="<?=$value['id_sumbangan']?>" class="label label-info bukti-bayar"><i class="fa fa-image"></i>Bukti</a>
			<?php elseif ($value['status']=='4'):?>
				<a href="#" data="<?=$value['id_sumbangan']?>" class="label label-danger bukti-tolak"><i class="fa fa-envelope"></i>Di tolak</a>
			<?php endif; ?>
	</td>
	<td>
	<?php  if ($value['status']=='-'):?>
			<a href="#" class="btn btn-success btn-sm konfirmasi-bayar" data="<?=base_url();?>admin/bayar_sumbangan_rutin/<?=$value['id_sumbangan']?>"><i class="fa fa-check"></i>Bayar</a>
			<?php elseif ($value['status']=='3'):?>
				<a href="#" class="btn btn-success btn-sm konfirmasi-tagihan" data="<?=$value['id_sumbangan']?>"><i class="fa fa-check"></i>Konfirmasi</a>
				<a href="#" class="btn btn-danger btn-sm tolak-tagihan" data="<?=$value['id_sumbangan']?>"><i class="fa fa-times"></i>Tolak</a>
			<?php endif; ?>
			<a href="#" class="btn btn-danger btn-sm modal-hapus" data="<?=base_url();?>admin/hapus_sumbangan_k/<?=$value['id_sumbangan']?>" ><i class="fa fa-trash"></i></a>
	</td>
</tr>
	<?php endforeach; ?>
<?php endif; ?>
                            </tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<!-- END PAGE CONTENT-->
		</div>
	</div>
    <!-- END CONTENT -->
</div>


<!-- Modal -->
<div class="modal fade" id="tambah_keseluruhan" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form action="<?=base_url();?>admin/tambah_sumbangan_k/rutin" method="post">
			<div class="modal-header">
				<h5 class="modal-title">Tambah Sumbangan Rutin</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
				  <label for="">Pilih Bulan</label>
				  <select name="bulan" class="form-control" id="bulan">
					<option value="">Pilih Bulan Tagihan</option>
					<option value="1">Januari</option>
					<option value="2">Februari</option>
					<option value="3">Maret</option>
					<option value="4">April</option>
					<option value="5">Mei</option>
					<option value="6">Juni</option>
					<option value="7">Juli</option>
					<option value="8">Agustus</option>
					<option value="9">September</option>
					<option value="10">Oktober</option>	
					<option value="11">November</option>
					<option value="12">Desember</option>
				</select>
				  <small id="helpId" class="text-muted">Pilih Bulan</small>
				</div>
				<div class="form-group">
				  <label for="">Pilih Tahun</label>
				  <select name="tahun" class="form-control" id="tahun">
					<option value="">Pilih Tahun Tagihan</option>
				<?php for ($i=2018; $i <2050 ; $i++):?>																<option value="<?=$i?>"><?=$i?></option>	
				<?php endfor; ?>
				</select>
				  <small id="helpId" class="text-muted">Pilih Tahun</small>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Simpan</button>
			</div>
			</form>
		</div>
	</div>
</div>


<?php $this->load->view('admin/modal_hapus');
 ?>



<!-- Modal -->
<div class="modal fade" id="cetak_laporan" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form action="<?=base_url();?>admin/cetak_laporan_rutin" target="_blank" method="post">
			<div class="modal-header">
				<h5 class="modal-title">Cetak Laporan</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
				  <label for="">Pilih Tahun Laporan</label>
				  <select name="tahun" class="form-control" id="">
					  <option value="">Pilih Tahun Laporan</option>
					  <?php for ($i=2019; $i <2030 ; $i++):?>
					  <option value="<?=$i?>"><?=$i?></option>
					  <?php endfor; ?>
				  </select>
				  <small id="helpId" class="text-muted">Pilih tahun Laporan</small>
				</div>
				<div class="form-group">
					<label for="">Pilih Kelas</label>
					<select name="kelas" class="form-control" id="">
						<option value="">Pilih Kelas</option>
						<?php foreach ($kelas as $value):?>
						<option value="<?=$value['id_kelas']?>"><?=$value['nama_kelas']?></option>
						<?php endforeach; ?>
					</select>
					<small id="helpId" class="text-muted">Pilih tahun Laporan</small>
				  </div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Cetak</button>
			</div>
		</form>
		</div>
	</div>
</div>


<!-- Modal -->
<div class="modal fade" id="tambah_persiswa" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form action="<?=base_url();?>admin/sumbangan_persiswa_rutin" method="post">
			<div class="modal-header">
				<h5 class="modal-title">Tambah Persiswa</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
				  <label for="">NISN</label>
				  <input type="text" name="nisn" id="nisn" class="form-control" placeholder="" aria-describedby="helpId">
				  
				</div>
				<div class="form-group">
				  <label for="">Nama</label>
				  <input type="text" name="nama" id="nama" readonly class="form-control" placeholder="" aria-describedby="helpId">
				  
				</div>
				<div class="form-group">
					<label for="">Golongan</label>
					<input type="text" name="golongan" id="golongan" readonly class="form-control" placeholder="" aria-describedby="helpId">
					
				  </div>
				<div class="form-group">
				  <label for="">Jumlah</label>
				  <input type="text" name="jumlah" id="jumlah" readonly class="form-control" placeholder="" aria-describedby="helpId">
				  
				</div>
				<div class="form-group">
					<label for="">Pilih Bulan</label>
					<select name="bulan" class="form-control" id="bulan">
					  <option value="">Pilih Bulan Tagihan</option>
					  <option value="1">Januari</option>
					  <option value="2">Februari</option>
					  <option value="3">Maret</option>
					  <option value="4">April</option>
					  <option value="5">Mei</option>
					  <option value="6">Juni</option>
					  <option value="7">Juli</option>
					  <option value="8">Agustus</option>
					  <option value="9">September</option>
					  <option value="10">Oktober</option>	
					  <option value="11">November</option>
					  <option value="12">Desember</option>
				  </select>
					<small id="helpId" class="text-muted">Pilih Bulan</small>
				  </div>
				  <div class="form-group">
					<label for="">Pilih Tahun</label>
					<select name="tahun" class="form-control" id="tahun">
					  <option value="">Pilih Tahun Tagihan</option>
				  <?php for ($i=2018; $i <2050 ; $i++):?>																<option value="<?=$i?>"><?=$i?></option>	
				  <?php endfor; ?>
				  </select>
					<small id="helpId" class="text-muted">Pilih Tahun</small>
				  </div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save</button>
			</div>
		</form>
		</div>
	</div>
</div>


<!-- Modal -->
<div class="modal fade" id="bayar_konfirmasi" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form action="" id="form_konfirmasi_bayar" method="post">
			<div class="modal-header">
				<h5 class="modal-title">Konfirmasi Bayar</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
			</div>
			<div class="modal-body">
				Yakin Konfirmasi Bayar Untuk Tagihan ini ?
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
				<button type="submit" class="btn btn-primary">Ya</button>
			</div>
		</form>
		</div>
	</div>
</div>


<!-- Modal -->
<div class="modal fade" id="modal_bukti_bayar" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Bukti Bayar</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
			</div>
			<div class="modal-body">
				<div class="text-center" id="bukti_bayar_image">
					
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>



<!-- Modal -->
<div class="modal fade" id="tolak_tagihan" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form action="<?=base_url();?>admin/tolak_tagihan" method="post">
			<div class="modal-header">
				<h5 class="modal-title">Alasan Penolakan</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
			</div>
			<div class="modal-body">
				<input type="hidden" id="id_sumbangan" name="id_sumbangan">
				<div class="form-group">
				  <label for="">Alasan Penolakan</label>
				  <textarea name="keterangan" required class="form-control" id="" cols="30" rows="3"></textarea>
				  <small id="helpId" class="text-muted">Alasa Penolakan</small>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
				<button type="submit" class="btn btn-primary">Simpan</button>
			</div>
		</form>
		</div>
	</div>
</div>


<!-- Modal -->
<div class="modal fade" id="alasan_penolakan" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Alasan Penolakan</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
			</div>
			<div class="modal-body">
				<div id="alasan"></div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal_konfirmasi_tagihan" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
		<form action="<?=base_url();?>admin/konfirmasi_tagihan" method="post">
			<div class="modal-header">
				<h5 class="modal-title">Konfirmasi Tagihan</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
			</div>
			<div class="modal-body">
			<input type="hidden" name="id_sumbangan" id="id_sumbangan_konfirmasi">
				Yakin konfirmasi tagihan ?
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
				<button type="submit" class="btn btn-primary">Ya</button>
			</div>
			</from>
		</div>
	</div>
</div>