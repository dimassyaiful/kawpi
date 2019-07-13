<h1 style="text-align: center;"> Data Pengguna</h1>
<br>

<table class="table table-striped table-hover">
	<tr>
		<th> NIK </th>
		<th> Nama </th>
		<th> TTL </th>
		<th> Alamat </th>
		<th> Provinsi </th>
		<th> Action </th>
	</tr>
	<?php 
	foreach($data_pengguna as $row){?>
		<tr>
			<td> <?= $row->nik; ?></td>
			<td> <?= $row->nama; ?></td>
			<td> <?= $row->ttl; ?></td>
			<td> <?= $row->alamat; ?></td>
			<td> <?= $row->provinsi; ?></td>
			<td> <button class="btn btn-info btn-sm"> Edit </button></td>
		</tr>
	<?php } ?>
</table>