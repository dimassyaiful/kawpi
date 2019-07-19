<h1> Welcome <?= $this->session->userdata('nama'); ?></h1>

<?php  
      //munculkan notifikasi
      if(isset($notif)){ echo $notif; } 
    ?>

<center>
<img src="<?php echo base_url(); ?>src/images/community.jpg" width="100%">
</center>