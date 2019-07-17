
<form action="<?= base_url(); ?>portofolio/edit_conf" method= "post">
<center> <h1> Ubah Portofolio</h1></center>

<?php  
//munculkan notifikasi
if($notif){ echo $notif; } 

  /* if($this->input->get('update')==1)
  {
    echo "Data Berhasil diupdate !";
  }
    else if($this->input->get('update')==2)
    {
      echo "Data Gagal diupdate !";
    } */
?>

<br>
<div class="row"> 
<div class="col-md-12" center> 
<div class="form-group">
    <label><b style="color: red;">*</b>NIK</label><br>
    <input type="text" class="form-control" name="nik" aria-describedby="nik" placeholder="" required="" readonly>
    </div>

  <div class="form-group">
    <label><b style="color: red;">*</b>Bidang Keahlian</label><br>
    <input type="text" class="form-control" name="bidang_keahlian" aria-describedby="bidang_keahlian" placeholder="masukkan keahlian anda" required="">
    </div>

<div class="form-group">
    <label><b style="color: red;">*</b>Riwayat Pelatihan</label><br>
  <input type="text" class="form-control" name="riwayat_pelatihan" aria-describedby="riwayat_pelatihan" placeholder="masukkan riwayat pelatihan anda" required="">
  </div>

<div class="form-group">
    <label><b style="color: red;">*</b>Sertifikat yang dimiliki</label><br>
  <input type="file"  name="sertifikat_dimiliki" aria-describedby="sertifikat_dimiliki" placeholder="masukkan sertifikat anda" required="">
  </div>

<div class="form-group">
    <label><b style="color: red;">*</b>Riwayat Project</label><br>
  <input type="file"  name="riwayat_project" aria-describedby="riwayat_project" placeholder="masukkan project anda" required="">
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


