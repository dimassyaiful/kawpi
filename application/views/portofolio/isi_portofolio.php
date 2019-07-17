
<form action="<?= base_url(); ?>portofolio/isi_conf" method= "post">
<center> <h1> Form Portofolio</h1></center>

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
  <input type="file" name="sertifikat_dimiliki" >
  </div>

<div class="form-group">
    <label><b style="color: red;">*</b>Riwayat Project (*Pdf)</label><br>
  <input type="file"  name="riwayat_project" >
  </div>

    <div id="notif"></div>

    <center>
       <button type="submit" class="btn btn-success" name="submit" id="btn">
       <i class="fa fa-check"><a href="<?= base_url(); ?>dashboard/dashboard_pendafar"></a></i>   Simpan
       </button>
    </center>
    </div>
</div>
</form>
