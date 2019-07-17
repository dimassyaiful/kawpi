<form action="<?= base_url(); ?>portofolio/isi_conf" method= "post">
<center> <h1> Form Portofolio</h1></center>

<?php  
//munculkan notifikasi
if($notif){ echo $notif; } 
?>

<br>
<div class="row"> 
<div class="col-md-12" center> 
<div class="form-group">
    <label><b style="color: red;">*</b>NIK</label><br>
    <input type="text" class="form-control" name="nik" aria-describedby="nik" placeholder="masukkan nik" required="">
    </div>

  <div class="form-group">
    <label><b style="color: red;">*</b>Bidang Keahlian</label><br>
    <input type="text" class="form-control" name="bidang_keahlian" aria-describedby="bidang_keahlian" placeholder="masukkan keahlian anda" required="">
    </div>

<div class="form-group">
    <label><b style="color: red;">*</b>Riwayat Pelatihan</label><br>
   <textarea class="form-control" name="riwayat_pelatihan"></textarea>
  </div>

<div class="form-group">
    <label><b style="color: red;">*</b>Sertifikat yang dimiliki (*Pdf)</label><br>
  <input type="file" class="form-control" name="sertifikat_dimiliki" aria-describedby="sertifikat_dimiliki" placeholder="masukkan sertifikat anda" required="">
  </div>

<div class="form-group">
    <label><b style="color: red;">*</b>Riwayat Project (*Pdf)</label><br>
  <input type="file" class="form-control" name="riwayat_project" aria-describedby="riwayat_project" placeholder="masukkan project anda" required="">
  </div>

    <div id="notif"></div>

    <center>
       <button type="submit" class="btn btn-success" name="submit" id="btn">
       <i class="fa fa-check"></i>   Simpan
       </button>
    </center>

    </div>
</div>
</form>


