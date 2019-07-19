<h1> Welcome <?= $this->session->userdata('nama'); ?></h1>

<?php  
    //munculkan notifikasi     
    if(!empty($notif)){ echo $notif; } 
?>

<?php if(!$status){ ?>
<center>
<h3> Silahkan Isi Form Portofolio </h3>
    <a href="<?= base_url(); ?>portofolio/isi_portofolio"  class="btn btn-primary">Klik Disini</a>
</center>
<?php }else{ ?>

	<br>

<?php if(isset($status_aproval)){ ?>
	<center> <a href="<?= base_url(); ?>portofolio/pengajuan_ulang" class="btn btn-primary"> <i class="fa fa-upload fa-fw"></i> Ajukan Ulang</a> </center>
<?php } ?> 
	<br>
	<h3> Data Portofolio </h3>

<div class="row">
	<div class="col-md-2">&nbsp</div>
	<div class="col-md-8">
	<table class="table table-hover table-border">
		<tr>
			<th style="background-color: #0097cf; color: white; width: 100px;">Bidang Keahlian</th>
			<td><?= $data_portofolio->bidang_keahlian; ?></td>
		</tr>
		<tr>
			<th style="background-color: #00668c; color: white; width: 100px;">Riwayat Pelatihan</th>
			<td><?= $data_portofolio->riwayat_pelatihan; ?></td>
		</tr>
		<tr>
			<th style="background-color: #0097cf; color: white; width: 100px;">Sertifikat yang dimiliki</th>
			<td><a target="_blank" href="<?= base_url().'src/file_sertifikat/'.$data_portofolio->sertifikat_dimiliki; ?>"> <i class="fa fa-file"></i> Lihat Sertifikat</a> 
			</td>
		</tr>
		<tr>
			<th style="background-color: #00668c; color: white; width: 100px;">Riwayat Project</th>
			<td><a target="_blank" href="<?= base_url().'src/file_project/'.$data_portofolio->riwayat_project; ?>"> <i class="fa fa-file"></i> Lihat riwayat Project</a> </td>
		</tr>
	</table>
	</div>
	<div class="col-md-2"></div>
</div>
<?php } ?>
