<h1 style="text-align: center;"> Data Anggota</h1>
<br>

<table class="table table-striped table-hover">
	<tr>
		<th> NIK </th>
		<th> Nama </th>
		<th> TTL </th>
		<th> Alamat </th>
		<th> Provinsi </th>
		<th  >Action </th>
	</tr>
	<?php 
	foreach($data_pengguna as 
	$row){?>
		<tr>
			<td> <?= $row->nik; ?></td>
			<td> <?= $row->nama; ?></td>
			<td> <?= $row->ttl; ?></td>
			<td> <?= $row->alamat; ?></td>
			<td> <?= $row->provinsi; ?></td>
	<td> <a class="btn  btn-success  "a href="<?php echo base_url().'anggota/edit/'.$row->nik;?>"> 
	<i class="fa fa-edit"></i> edit</a>
    <a class="btn btn-danger"a href="<?php echo base_url().'anggota/delete/'.$row->nik;?>">
	<i class="fa fa-trash-o"></i> delete</a>
	
			 
		</tr>

	<?php } ?>

</table>