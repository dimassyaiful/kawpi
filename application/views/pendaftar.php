<h1 style="text-align: center;"> Data Pendaftar</h1>
<br>

<div class="table-responsive">
<?php if(isset($notif)){echo $notif;} ?>
<table class="table table-striped table-hover">
	<tr>
		<th> NIK </th>
		<th> Nama </th>
		<th> TTL </th>
		<th> Alamat </th>
		<th> Provinsi </th>
		<th> Status </th>
	    <th> Action </th>
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
			<td> <?= $controller->cek_status($row->nik); ?></td>
	<td> <a class="btn  btn-success  btn-sm"a href="<?php echo base_url().'pendaftar/edit/'.$row->nik;?>"> 
	<i class="fa fa-edit"></i> edit</a>
    <a class="btn btn-danger  btn-sm"a href="<?php echo base_url().'pendaftar/delete/'.$row->nik;?>">
	<i class="fa fa-trash-o"></i> delete</a>
	
	 <button class="btn btn-primary  btn-sm" id="btn_portofolio" id="btn_update" onclick="open_modal('<?= $row->nik; ?>')"> <i class="fa fa-address-card-o fa-fw"></i> Verifikasi </button>
		</tr>

	<?php } ?>

</table>
<br><br>
<?php if($this->session->userdata('hak_akses')=='1'){ ?>
<center>
<a class="btn btn-info" href="<?php echo base_url().'register'; ?>"> <i class="fa fa-plus"> </i> Tambah Pendaftar </a>
</center>
<?php } ?>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Verifikasi Data Pendaftar & Portofolio</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="modal_body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Keterangan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="modal_body">
      	<form id="frmz" method="POST">
        <input class="form-control" type="text" name="nik" id="nik" style="display: none;">
         <div class="form-group">
		    <label><b style="color: red;">*</b>Masukkan keterangan tolak Anggota</label><br>
		    <textarea type="text" class="form-control" name="keterangan" required=""></textarea>
		 </div>
		 <center> 
		 	<button class="btn btn-danger"> <i class="fa fa-close"></i> Tolak Anggota </button>
		 </center>
		 </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">

	function open_modal(id){
		values = id;
		console.log(values);

		$.ajax({ 
            type      : 'POST', 
            url       : '<?= base_url(); ?>pendaftar/get_portofolio', 
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

	function tolak(id,action){
		values = id;
		console.log('tolak : '+values);

		$("#nik").val(values);
		$('#frmz').attr('action', action);
		$("#modal2").modal();
	}
	
</script>