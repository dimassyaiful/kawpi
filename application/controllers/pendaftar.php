<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftar extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->library('password');
		$this->load->model('m_pendaftar');	
		$this->load->model('m_pengguna');	
	}
	
	public function index()
	{
		//title judul web
		$header['title_halaman'] = 'Pendaftar';
		$data['controller']=$this; 

		//get notif dari fungsi flash session
		$data['notif'] = $this->session->get_notif();

		//get data pengguna
		$data['data_pengguna'] = $this->m_pendaftar->get_data_pengguna();

		$this->load->view('template/header',$header);
		$this->load->view('pendaftar',$data);
		$this->load->view('template/footer');
	}

	public function cek_status($nik){
		$status = $this->m_pendaftar->cek_status($nik);
		if($status == 'waiting'){
			echo '<span class="badge badge-info"> <i class="fa fa-spinner fa-spin"> </i> Menunggu Approval</span>';
		}else{
			echo '<span class="badge badge-danger"> <i class="fa fa-close"> </i> Ditolak </span>';
		}
	}
	
    function edit($nik)
    {	
		$id = $this->uri->segment('3');
	       
		$data['data_edit'] =$this->m_pendaftar->edit($nik);

		//title judul web
		$header['title_halaman'] = 'Edit data Pendaftar';
		$this->load->view('template/header',$header);
        $this->load->view('edit_pendaftar', $data);
		$this->load->view('template/footer');

	
	}

	function save_edit($nik)
	{ $nik = $this->input->post('nik');
	  $nama = $this->input->post('nama');
	  $ttl = $this->input->post('ttl');
	  $alamat = $this->input->post('alamat');
	  $provinsi = $this->input->post('provinsi');
	
	
	  $data=array(
     	'nik'=>$nik,
		'nama'=>$nama,
		'ttl'=>$ttl,
		'alamat'=>$alamat,
		'provinsi'=>$provinsi,
		  );
	 $this->m_pendaftar->save($nik,$data);
	}

	function get_portofolio()
	{ 
	  $nik = $this->input->post('nik');
	  $cek_portofolio = $this->m_pendaftar->cek_portofolio($nik);
	  if($cek_portofolio < 1){
	  	$data['cek_portofolio'] = 0;
	  }else{
	  	$data['cek_portofolio'] = 1;
	  }

	  
	  $data['data_portofolio'] = $this->m_pendaftar->get_portofolio($nik);
	  $data['data_pengguna'] = $this->m_pengguna->get_data_pengguna_1($nik);
	  $this->load->view('portofolio/modal_portofolio',$data);
	 
	}

	function reset()
	{ 
	   
	  $nik = $this->password->decrypt($this->uri->segment('3'));
	  $reset = $this->m_pendaftar->reset($nik);
	  if($reset){
	  	$this->session->set_notif('Berhasil Reset, Status Pendaftar NIK."'.$nik.'" Berhasil di Reset','check','info');
	  	redirect('pendaftar');
	  }else{
	  	$this->session->set_notif('Gagal Reset, Status Pendaftar NIK."'.$nik.'" gagal di reset','close','danger');
	  	redirect('pendaftar');
	  }
	}

	function verifikasi()
	{ 
	   
	  $nik = $this->password->decrypt($this->uri->segment('3'));
	  $status = $this->password->decrypt($this->uri->segment('4'));

	  if($status == 'tolak'){
	  		$status_ = 0;
	  		$keterangan = $this->input->post('keterangan');
	  		$notif_berhasil = 'Verifikasi Berhasil, NIK."'.$nik.'" telah ditolak sebagai Anggota';
	  		$notif_class = 'info';
	  }elseif($status == 'terima'){	
	  		$status_ = 1;
	  		$keterangan = '';
	  		$notif_berhasil = 'Verifikasi Berhasil, NIK."'.$nik.'" telah diterima sebagai Anggota';
	  		$notif_class = 'success';

		  	$data_mapping = array(
			  	'nik' => $nik,
			  	'id_posisi' => 4
			);

			$mapping = $this->m_pengguna->update_mapping($data_mapping);
			if(!$mapping){
			  	$this->session->set_notif('Verifikasi Gagal, gagal update mapping','close','danger');
			  	redirect('pendaftar');
			}
	  }else{
	  	redirect('login');
	  	$this->session->set_notif('Anda tidak memiliki akses!','close','danger');
	  	exit;
	  }

	  	$data_verifikasi = array(
		  	'nik' => $nik,
		  	'status' => $status_,
		  	'tgl_verifikasi' => date('Y-m-d'),
		  	'keterangan' => $keterangan
		);

	  $verifikasi = $this->m_pendaftar->verifikasi($data_verifikasi);
	  if($verifikasi){
	  	$this->session->set_notif($notif_berhasil,'check',$notif_class);
	  	redirect('pendaftar');
	  }else{
	  	$this->session->set_notif('Verifikasi NIK."'.$nik.'" Gagal','close','danger');
	  	redirect('pendaftar');
	  }
	}


}