<form action="<?= base_url(); ?>portofolio/isi_conf" method= "post">
<h1 style="text-align: center;"> Portofolio</h1>
<br>

<table class="table table-striped table-hover">
	<?php 
	foreach($data_portofolio as $row){?>
	<tr>
		<td> NIK </td>
		<td> <?= $row->nik; ?></td>
	</tr><tr>
		<td> Bidang Keahlian </td>
		<td> <?= $row->bidang_keahlian; ?></td>
	</tr><tr>
		<td> Riwayat Pelatihan </td>
		<td> <?= $row->riwayat_pelatihan; ?></td>
	</tr><tr>
		<td> Sertifikat yang Dimiliki </td>
		<td> <?= $row->sertifikat_dimiliki; ?></td>
	</tr><tr>
		<td> Riwayat Proyek </td>
		<td> <?= $row->riwayat_project; ?></td>
	</tr>
	<?php } 
	?>
	<button class="btn btn-info btn-sm"> Ubah </button>
</table>