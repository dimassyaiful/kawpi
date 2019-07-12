<form action="<?= base_url(); ?>register/register_config" method= "post">
<center> <h1> Daftar Anggota</h1></center>


<?php  
//munculkan notifikasi
if($notif){ echo $notif; } 
?>


<br>
<div class="row"> 
<div class="col-md-6"> 
<div class="form-group">
    <label> <b style="color: red;">*</b> NIK</label>
    <input type="text" class="form-control" name="nik" aria-describedby="nik" placeholder="masukkan nik" required="">
  
  </div>
  <div class="form-group">
    <label><b style="color: red;">*</b> Nama</label>
    <input type="text" class="form-control" name="nama" aria-describedby="nama" placeholder="masukkan nama" required="">
  
  </div>
  <div class="form-group">
    <label><b style="color: red;">*</b>Tanggal Lahir</label><br>
    <input type="date" class="form-control" placeholder="Ttl" name="ttl" required=""><br>

    <div class="form-group">
        <label><b style="color: red;">*</b>Provinsi </label>
        <select class="form-control" name="provinsi" required="">
          <option value="">-- Pilih Provinsi --</option>
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
      <textarea class="form-control" name="alamat" rows="3"></textarea>
    </div>
</div>
<div class="col-md-5">
  
  <div class="form-group">
   <label><b style="color: red;">*</b>Email</label>
   <input type="email" class="form-control" name="email" aria-describedby="email" placeholder="Masukkan email" required="">
 </div>
      
  <div class="form-group">
    <label><b style="color: red;">*</b>Password</label>
    <input type="password" id="pwd1" class="form-control" name="password" placeholder="Password" required="" onchange="cek_pwd();">
  </div>

    <div class="form-group">
    <label><b style="color: red;">*</b>Retype Password</label>
    <input type="password" id="pwd2" class="form-control" name="password2" placeholder="Retype Password" required="" onchange="cek_pwd();">
    </div>

    <div id="notif"></div>

    <center>

       <button type="submit" class="btn btn-success" name="submit" id="btn">
       <i class="fa fa-check"></i>   Register
       </button>
    </center>

    <script type="text/javascript">
      //jika pwd n re type tidak sama 
      function cek_pwd(){
        $("#notif").empty();
        var pwd1 = $("#pwd1").val();
        var pwd2 = $("#pwd2").val();

        if(pwd1 !== pwd2){
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

</div></div>


