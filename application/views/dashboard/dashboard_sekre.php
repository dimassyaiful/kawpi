<h1> Welcome <?= $this->session->userdata('nama'); ?></h1>
<br><br>
<div class="row" style="padding-left: 10px; padding-right: 10px;" >
  <div class="col-md-3 col-xs-12"  style="margin: 5px 5px 5px 5px;">
    <div class="row" style="border-radius: 10px; background-color: #009c10; padding: 10px; color: white;" >
      <div class="col-md-4 col-xs-4 text-center" style="padding-top: 10px;"> <i class="fa fa-group fa-3x"></i></div>
      <div class="col-md-8 col-xs-8 text-center">
        Jumlah Anggota
        <h2><?= $jumlah_anggota; ?> </h2>
      </div>
    </div>
  </div>

  <div class="col-md-3 col-xs-12" style="margin: 5px 5px 5px 5px;">
    <div class="row" style="border-radius: 10px; background-color: #00567a; padding: 10px; color: white;" >
      <div class="col-md-4 col-xs-4 text-center" style="padding-top: 10px;"> <i class="fa fa-vcard-o fa-3x"></i></div>
      <div class="col-md-8 col-xs-8 text-center">
        Jumlah Pendaftar
        <h2><?= $jumlah_pendaftar; ?> </h2>
      </div>
    </div>
  </div>
</div>