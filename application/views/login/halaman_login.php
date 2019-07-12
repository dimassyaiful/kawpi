<div class="container">

  

<div  class="row">
  <div class="col-md-4">
    <img src="<?= base_url(); ?>src/images/conn.png" class="img-fluid">
  </div>
  <div class="col-md-8">
    <h1 align="center">Login</h1>
    <h5 style="font-style: italic; text-align: center;"> "Bergabung dan buat koneksi"</h5>
    <?php  
      //munculkan notifikasi
      if($notif){ echo $notif; } 
    ?>

    <form action="<?= base_url(); ?>login/login_conf" method="post">
    <div class="form-group">
      <label for="nik"><h3>NIK:</h3></label>
      <input type="number" class="form-control" id="nik" placeholder="Masukkan Nik Anda" name="nik">
    </div>
    <div class="form-group">
      <label for="pwd"><h3>Password:</h3></label>
      <input type="password" class="form-control" id="pwd" placeholder="Masukkan Password Anda" name="password">
    </div>
    <br>
    <center>
    <button type="submit" class="btn btn-success">Login</button>
  <a href="<?= base_url(); ?>register"  class="btn btn-primary">Register</a>
    </center>

  </form>
  </div>
</div>
  
  
</div>

<br><br><br><br><br><br><br>