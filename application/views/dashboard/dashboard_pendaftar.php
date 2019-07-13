<h1> Welcome <?= $this->session->userdata('hak_akses'); ?></h1>

<?php  
    //munculkan notifikasi     
    if(!empty($notif)){ echo $notif; } 
?>


<center>
<h3> Silahkan Isi Form Portofolio </h3>
    <a href="<?= base_url(); ?>portofolio/isi_portofolio"  class="btn btn-primary">Klik Disini</a>
</center>

