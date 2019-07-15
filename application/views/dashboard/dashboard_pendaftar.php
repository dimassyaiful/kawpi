<h1> Welcome <?= $this->session->userdata('hak_akses'); ?></h1>

<?php  
      //munculkan notifikasi
      if($notif){ echo $notif; } 
    ?>