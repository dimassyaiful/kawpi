
<h1 style="text-align: center;"> Data Pengguna	</h1>
<br>
<?php if(isset($notif)){echo $notif;} ?>
<h6>
<i class="fa fa-info-circle" style="color: blue;"></i>  <i> Data pengguna selain Anggota dan Pendaftar</i>
</h6>

<br>
<?php 
function posisi($id_posisi){
	if($id_posisi=='1'){
		echo '<span class="badge badge-success">Admin</span>';
	}elseif($id_posisi=='2'){
		echo '<span class="badge badge-info">Ketua</span>';
	}elseif($id_posisi=='3'){
		echo '<span class="badge badge-primary">Sekretaris</span>';
	}else{
		echo "?".$id_posisi;
	}
}


?>
<div class="table-responsive">
<table class="table table-hover table-striped table-bordered">
	<tr>
		<th>NIK </th>
		<th>Nama </th>
		<th>Tanggal Lahir </th>
		<th>Alamat </th>
		<th>Provinsi </th>
		<th>Email </th>
		<th>Posisi </th>
		<th> Aksi </th>
	</tr>
	<?php foreach ($data_pengguna as $row) { ?>
	   		<tr>
	   			<td> <?= $row->nik; ?></td>
	   			<td> <?= $row->nama; ?></td>
	   			<td> <?= $row->ttl; ?></td>
	   			<td> <?= $row->alamat; ?></td>
	   			<td> <?= $row->provinsi; ?></td>
	   			<td> <?= $row->email; ?></td>
	   			<td> <?php 
	   				$posisi =  $row->id_posisi; 
	   				posisi($posisi);
	   				?>
	   			
	   			</td>
	   			<td> 
	   				<a href="<?= base_url().'pengguna/edit/'.$row->nik; ?>"  class="btn btn-info btn-sm" id="btn_update" id="btn_update"> <i class="fa fa-pencil"></i> Update</a>

	   				<?php 
	   					if ($posisi !== '1') { ?>
	   						<a onclick="return confirm('Anda yakin ingin menghapus ?')" href="<?= base_url().'pengguna/hapus/'.$this->password->encrypt($row->nik); ?>" class="btn btn-danger btn-sm"> <i class="fa fa-close"></i> Hapus</a>
	   				<?php } ?>
	   				
	   			</td>
			</tr>
	<?php } ?>
</table>
</div>

<br><br>

<center> <a href="<?= base_url().'pengguna/tambah';?>" class="btn btn-success"> <i class="fa fa-plus"></i> Tambah Pengguna </a> </center>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ubah Data Pengguna</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="modal_body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


<!-- <button class="btn btn-info btn-sm" id="btn_update" id="btn_update" onclick="open_modal('99')"> <i class="fa fa-pencil"></i> Update</button> -->

<script type="text/javascript">

	function open_modal(id){
		values = id;
		console.log(values);

		$.ajax({ 
            type      : 'POST', 
            url       : '<?= base_url(); ?>pengguna/get_data_x', 
            data      : 'nik='+values, 
            cache     : false,
            success   : function(data) {
            	$("#modal_body").empty();
                $("#modal_body").append(data);
            },
             error: function(XMLHttpRequest, textStatus, errorThrown) { 
                console.log("Status: " + textStatus); 
                $("#modal_body").empty();
                $("#modal_body").append("Error: " + errorThrown); 
            }     
        });
		$("#exampleModal").modal();
	}

	
</script>