
<form action="<?= base_url(); ?>portofolio/isi_conf" method= "post"   enctype="multipart/form-data">
<center> <h1> Form Portofolio</h1></center>
<br>
<?php
if(isset($notif)){
  echo $notif;
}

?>
<br>
<div class="row"> 
<div class="col-md-12" center> 

  <div class="form-group">
    <label><b style="color: red;">*</b>Bidang Keahlian</label><br>
    <input type="text" class="form-control" name="bidang_keahlian" aria-describedby="bidang_keahlian" placeholder="masukkan keahlian anda" required="">
    </div>

<div class="form-group">
    <label><b style="color: red;">*</b>Riwayat Pelatihan</label><br>
   <textarea class="form-control" name="riwayat_pelatihan"></textarea>
  </div>

<div class="form-group">
    <label>Sertifikat yang dimiliki (*Pdf)</label><br>
  <input type="file" name="sertifikat_dimiliki" >
  </div>

<div class="form-group">
    <label>Riwayat Project (*Pdf)</label><br>
  <input type="file"  name="project" >
  </div>

    <div id="notif"></div>

    <center>
       <button type="submit" class="btn btn-success" name="submit" id="btn">
       <i class="fa fa-check"><a href="<?= base_url(); ?>dashboard/dashboard_pendaftar"></a></i>   Simpan
       </button>
    </center>
    </div>
</div>
</form>
