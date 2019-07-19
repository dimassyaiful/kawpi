<form action="<?= base_url(); ?>pengguna/edit_conf" method= "post">
<center> <h1> Edit Data Pengguna</h1></center>

<?php  
//munculkan notifikasi
if(isset($notif)){ echo $notif; } 
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


<br>
<div class="row"> 
<div class="col-md-6"> 
<div class="form-group" >
    <label> <b style="color: red;">*</b> NIK</label>
    <input type="text" class="form-control" name="nik" aria-describedby="nik" placeholder="masukkan nik" required="" readonly="" value="<?= $data_pengguna->nik; ?>">
  
  </div>
  <div class="form-group">
    <label><b style="color: red;">*</b> Nama</label>
    <input type="text" class="form-control" name="nama" aria-describedby="nama" placeholder="masukkan nama" value="<?= $data_pengguna->nama; ?>" required="">
  
  </div>
  <div class="form-group">
    <label><b style="color: red;">*</b>Tanggal Lahir</label><br>
    <input type="date" class="form-control" placeholder="Ttl" name="ttl" required="" value="<?= $data_pengguna->ttl; ?>"><br>

    <div class="form-group">
        <label><b style="color: red;">*</b>Provinsi </label>
        <select class="form-control" name="provinsi" required="">
          <option value="<?= $data_pengguna->provinsi; ?>"><?= $data_pengguna->provinsi; ?></option>
         <option value="aceh">Aceh</option>
         <option value="Sumut">Sumatera Utara</option>
         <option value="sumbar">Sumatera Barat</option>
         <option value="Riau">Riau</option>
         <option value="Jambi">Jambi</option>
         <option value="Sumsel">Sumatera Selatan</option>
         <option value="Bengkulu">Bengkulu</option>
         <option value="Lampung">Lampung</option>
         <option value="BaBel">Kep. Bangka Belitung</option>
         <option value="kepRiau">Kepulauan Riau</option>
         <option value="Jakarta">Jakarta</option>
         <option value="Jabar">Jawa Barat</option>
         <option value="Banten">Banten</option>
         <option value="Jateng">Jawa Tengah</option>
         <option value="Yogyakarta">Yogyakarta</option>
         <option value="Jatim">Jawa Timur</option>
         <option value="Kalbar">Kalimantan Barat</option>
         <option value="Kalteng">Kalimantan Tengah</option>
         <option value="Kalsel">Kalimantan Selatan</option>
         <option value="Kaltim">Kalimantan Timur</option>
         <option value="Kaltra">Kalimantan Utara</option>
         <option value="Bali">Bali</option>
         <option value="NTT">Nusa Tenggara Timur</option>
         <option value="NTB">Nusa Tenggara Barat</option>
         <option value="Sulut">Sulawesi Utara</option>
         <option value="Sulteng">Sulawesi Tengah</option>
         <option value="Sulsel">Sulawesi Selatan</option>
         <option value="Sultengg">Sulawesi Tenggara</option>
         <option value="Sulbar">Sulawesi Barat</option>
         <option value="Gorontalo">Gorontalo</option>
         <option value="Maluku">Maluku</option>
         <option value="Maluku Utara">Maluku Utara</option>
         <option value="Papua">Papua</option>
         <option value="Papua Barat">Papua Barat</option>
        </select>
    </div>

  </div>
  <div class="form-group">
      <label>Alamat</label>
      <textarea class="form-control" name="alamat" rows="3"><?= $data_pengguna->alamat; ?></textarea>
    </div>
</div>
<div class="col-md-5">
  
  <div class="form-group">
   <label><b style="color: red;">*</b>Email</label>
   <input type="email" class="form-control" name="email" aria-describedby="email" placeholder="Masukkan email" required="" value="<?= $data_pengguna->email; ?>">
 </div>
  
<?php 
$nik= $this->session->userdata('nik');

if($nik !== $data_pengguna->nik){ ?>
<div class="form-group">  
  
  <label><b style="color: red;">*</b>Hak Akses </label>
  <select class="form-control" name="hak_akses" required="">
    <option value="<?= $data_pengguna->id_posisi; ?>"><?= posisi($data_pengguna->id_posisi); ?></option>
   <option value="2">Ketua</option>
   <option value="3">Sekretaris</option>
  </select>
  
</div>
<?php } ?>
    

    <div class="form-group">
	     <input type="checkbox" id="chk_pwd" onchange="chg_pwdx()" name="chk_pwd"> <label>Ubah Password</label>
	</div>

    <div id="pwdx" style="display: none;">
	  <div class="form-group" id="pwd_chg">
	    <label><b style="color: red;">*</b>Password</label>
	    <input type="password" id="pwd1" class="form-control" name="password" placeholder="Password" onchange="cek_pwd();">
	  </div>

	    <div class="form-group">
	    <label><b style="color: red;">*</b>Retype Password</label>
	    <input type="password" id="pwd2" class="form-control" name="password2" placeholder="Retype Password"  onchange="cek_pwd();">
	    </div>

	    <div id="notif"></div>
	 </div>

    

    <center>
      <button type="button" class="btn btn-warning" onclick="history.back();">
       <i class="fa fa-arrow-left"></i> Kembali
       </button>

       <button type="submit" class="btn btn-success" name="submit" id="btn">
       <i class="fa fa-pencil"></i>   Update Data
       </button>
    </center>

    <script type="text/javascript">
      //jika pwd n re type tidak sama 
      function chg_pwdx(){
        var checkbox = $('#chk_pwd').is(':checked');
        if(!checkbox){
          $("#pwdx").css("display", "none");
        }else{
          $("#pwdx").css("display", "block");
        }
      }

      function cek_pwd(){
        var checkbox = $('#chk_pwd').is(':checked');
        if(!checkbox){
          console.log('not change pwd');
          return 0;
        }else{
          console.log('change pwd');
        }
        $("#notif").empty();
        var pwd1 = $("#pwd1").val();
        var pwd2 = $("#pwd2").val();

        if(pwd1 !== pwd2 && checkbox){
          var notif = '<div class="alert alert-danger"> <i class="fa fa-close"> </i> Password tidak sama </i>';
          $("#notif").append(notif);
          $("#btn").prop("disabled", true);
        }else{
          $("#notif").empty();
          $("#btn").prop("disabled", false);
        }     
  }
    </script> 
  </div>
</div>
</form>


