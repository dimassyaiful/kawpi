<nav class="navbar navbar-expand-md navbar-dark" style="background-color: #00450f;">
    <a href="<?= base_url().'dashboard'; ?>" class="navbar-brand">
        <h3> KAWPI</h3>
    </a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav">
            <a href="<?= base_url().'dashboard'; ?>" class="nav-item nav-link"><i class="fa fa-home"></i> Dashboard</a>
            <?php 
               $hak_akses = $this->session->userdata('hak_akses');
               if($hak_akses == '1'){  //menu admin ?>
                    <a href="<?= base_url().'pengguna'; ?>" class="nav-item nav-link"> <i class="fa fa-database"></i> Pengguna</a>
                    <a href="<?= base_url().'anggota'; ?>" class="nav-item nav-link"> <i class="fa fa-database"></i> Anggota</a>
                    <a href="<?= base_url().'pendaftar'; ?>" class="nav-item nav-link"> <i class="fa fa-database"></i> Pendaftar</a>
               <?php }else if($hak_akses == '2'){ //menu ketua ?>

               <?php }elseif($hak_akses == '3'){ //menu sekretaris ?>

               <?php }elseif($hak_akses == '4'){ //menu anggota ?>

               <?php }elseif($hak_akses == '5'){ //menu pendaftar ?>

               <?php }else{
                    $this->session->set_notif('Error, Hak akses tidak ditemukan','close','danger');
                    redirect('login');
                    exit;
               }  ?>
           
        </div>
        <div class="navbar-nav ml-auto nav-item dropdown" style="margin-right: 20px;">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-user fa-fw"></i> <?= $this->session->userdata('nama'); ?></a>
                <div class="dropdown-menu">
                    <a href="#" class="dropdown-item">Profile</a>
                    <a class="dropdown-item" href="<?= base_url(); ?>login/out">Logout</a>
                </div>
            </div>
    </div>
  </nav>