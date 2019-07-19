<div class="row">
	<div class="col-md-6 col-xs-12" > 
		<h3 style="text-align: center; margin-bottom: 20px;"> Data Pendaftar </h3>
		<table class="table table-sm 	table-hover">
			<tr> 
				<th style="font-weight: bold; width: 120px; background-color: #ccdfff;"> NIK </th>
				<td> <?= $data_pengguna->nik; ?> </td>
			</tr>
			<tr> 
				<th style="font-weight: bold; width: 120px; background-color: #94d8ff;"> Nama </th>
				<td> <?= $data_pengguna->nama; ?> </td>
			</tr>
			<tr> 
				<th style="font-weight: bold; width: 120px; background-color: #ccdfff;"> Tanggal Lahir </th>
				<td> <?= $data_pengguna->ttl; ?> </td>
			</tr>
			<tr> 
				<th style="font-weight: bold; width: 120px; background-color: #94d8ff;"> Alamat </th>
				<td> <?= $data_pengguna->alamat; ?> </td>
			</tr>
			<tr> 
				<th style="font-weight: bold; width: 120px; background-color: #ccdfff	;"> Provinsi </th>
				<td> <?= $data_pengguna->provinsi; ?> </td>
			</tr>
			<tr> 
				<th style="font-weight: bold; width: 120px; background-color: #94d8ff;"> Email </th>
				<td> <?= $data_pengguna->email; ?> </td>
			</tr>
		</table>
	</div>

	<div class="col-md-6 col-xs-12"> 
		<h3 style="text-align: center; margin-bottom: 20px;"> Portofolio </h3>

		<?php if($cek_portofolio == 1){ ?>
			<table class="table table-sm table-hover table-border">
			
			<tr> 
				<th style="font-weight: bold; width: 120px; background-color: #94d8ff;"> Bidang Keahlian </th>
				<td> &nbsp <?= $data_portofolio->bidang_keahlian; ?> </td>
			</tr>
			<tr> 
				<th style="font-weight: bold; width: 120px; background-color: #ccdfff;"> Riwayat Pelatihan</th>
				<td> &nbsp <?= $data_portofolio->riwayat_pelatihan; ?> </td>
			</tr>
			<tr> 
				<th style="font-weight: bold; width: 120px; background-color: #94d8ff;">  Sertifikat  </th>
				<td> <a target="_blank" href="<?= base_url().'src/file_sertifikat/'.$data_portofolio->sertifikat_dimiliki; ?>"> <i class="fa fa-file"></i> Lihat Sertifikat</a>  </td>
			</tr>
			<tr> 
				<th style="font-weight: bold; width: 120px; background-color: #ccdfff;"> Riwayat Project </th>
				<td> <a target="_blank" href="<?= base_url().'src/file_project/'.$data_portofolio->riwayat_project; ?>"> <i class="fa fa-file"></i> Lihat Project</a> </td>
			</tr>
		
		</table>
		<br>
		<center>
			<?php
				$hash_nik = $this->password->encrypt($data_pengguna->nik);
				$tolak = $this->password->encrypt('tolak');
				$terima = $this->password->encrypt('terima');
				$url_terima = base_url().'pendaftar/verifikasi/'.$hash_nik.'/'.$terima;
				$url_tolak = base_url().'pendaftar/verifikasi/'.$hash_nik.'/'.$tolak;
				$url_reset = base_url().'pendaftar/reset/'.$hash_nik;
			?>

			<?php 
				$status = $this->m_pendaftar->cek_status($data_pengguna->nik); 
				if($status == 'waiting'){?>
					<button class="btn btn-danger" id="btn_tolak"> <i class="fa fa-close"></i> Tolak Anggota </button>
					<a class="btn btn-success" href="<?= $url_terima; ?>"> <i class="fa fa-check"></i> Terima Anggota </a>
			<?php }else{ ?>
					<div class="alert alert-danger"> <i class="fa fa-warning"></i> Pendaftar ini telah ditolak sebagai Anggota</div>
					<table class="table table-sm table-hover table-border">
						<tr> 
							<th style="font-weight: bold; width: 120px; background-color: #ff9c9c;"> Keterangan </th>
							<td> &nbsp <?= $status; ?> </td>
						</tr>
					</table>
					<br>
					<a class="btn btn-info" href="<?= $url_reset; ?>"> <i class="fa fa-refresh fa-spin"></i> Reset </a>
			<?php } ?>
			
		</center>
		
		<script type="text/javascript">
			$('#btn_tolak').click(function() {
			    $('#exampleModal').modal('hide');
			    tolak('<?= $data_pengguna->nik; ?>','<?= $url_tolak; ?>');
			});
		</script>
		<?php }else{ ?>
			<div class="alert alert-warning">
				<i class="fa fa-warning fa-fw"></i> Belum mengisi Portofolio
			</div>
		<?php } ?>
		

		

	</div>


</div>