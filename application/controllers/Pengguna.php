<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pengguna extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->library('password');
		$this->load->model('m_pengguna');

		//cek jika mencoba akses halaman ini tanpa login
		if(empty($this->session->userdata('nik'))){
			//notif
			$this->session->set_notif('Akses ditolak! , anda harus login terlebih dahulu','close','danger');
			redirect('login');
			exit;
		}

		
	}

	public function index()
	{	
		//cek hak akses
		$hak_akses = $this->session->userdata('hak_akses');
		if($hak_akses !== '1'){

			//notif
			$this->session->set_notif('Akses ditolak! , anda tidak punya akses untuk halaman ini','close','danger');
			redirect('dashboard');
			exit;
		
		}

		$data['notif'] = $this->session->get_notif();
		$header['title_halaman'] = 'Data Pengguna';
		$this->load->view('template/header',$header);

		$data['data_pengguna'] = $this->m_pengguna->get_data_pengguna();
		$this->load->view('pengguna/pengguna',$data);

		$this->load->view('template/footer');
		
	}

	public function get_data_x()
	{	
		$nik = $this->input->post('nik');
		$data = $this->m_pengguna->get_data_pengguna($nik);

		$data['data_pengguna'] = $this->m_pengguna->get_data_pengguna_1($nik);
		
		$this->load->view('pengguna/edit_x',$data);
		
	}

	public function edit()
	{	
		$nik = $this->uri->segment('3');
		//cek hak akses
		$hak_akses = $this->session->userdata('hak_akses');
		$nik_session = $this->session->userdata('nik');
		$title = "Edit Data Pengguna";
		if($hak_akses !== '1'){
			$title = "Edit Profile";
			if($nik !== $nik_session){
				//notif
			$this->session->set_notif('Akses ditolak! , anda tidak punya akses untuk halaman ini','close','danger');
			redirect('dashboard');
			exit;
			}
		}
		
		$data['notif'] = $this->session->get_notif();
		$header['title_halaman'] = $title;

		
		$data = $this->m_pengguna->get_data_pengguna($nik);

		$data['data_pengguna'] = $this->m_pengguna->get_data_pengguna_1($nik);
		
		$this->load->view('template/header',$header);
		$this->load->view('pengguna/edit',$data);
		$this->load->view('template/footer');
		
	}

	public function edit_conf(){
		  

		  $nik = $this->input->post("nik");
		  $nama = $this->input->post("nama");
		  $ttl = $this->input->post("ttl");
		  $alamat = $this->input->post("alamat");
		  $provinsi = $this->input->post("provinsi");
		  $email = $this->input->post("email");
		  $checkbox_pwd = $this->input->post("chk_pwd");
		  $hak_akses = $this->input->post("hak_akses");

		  $data_pengguna=array(
				
				   "nama" =>$nama,
				   "ttl" =>$ttl,
				   "alamat" =>$alamat,
				   "provinsi" =>$provinsi,
				   "email" =>$email
				  );		  

		  $data_mapping=array(
				   "nik" => $nik,
				   "id_posisi" => $hak_akses, //pendaftar
				   "tanggal_diterima" => null
		  );


		  $cek_nik=$this->m_pengguna->get_nik($nik);
		  if($cek_nik<1){ //data nik telah terdaftar
				$this->session->set_notif('Gagal Registrasi, NIK Tidak ditemukan','close','danger');
				echo "<script> history.back(); </script>";
				exit();
		 }
		
		
		 $cek_email=$this->m_pengguna->get_email_data($email);

		 if($cek_email !== $email){ //email tidak sama
				$cek_email=$this->m_pengguna->get_email($email);
				if($cek_email>0){ //data email telah digunakan
						$this->session->set_notif('Gagal Registrasi, E-mail Duplikat','close','danger');
						echo "<script> history.back(); </script>";
						exit();
		 		} 
		 }  

		 

		 $edit_data_pengguna = $this->m_pengguna->update_pengguna($nik,$data_pengguna);
			if(!$edit_data_pengguna){ //gagal tambah db pengguna
				$this->session->set_notif('Gagal Update','close','danger');
				echo "<script> history.back(); </script>";
				exit();
			}

		//update hak aksesi
if (!empty($hak_akses)){
	$edit_data_mapping = $this->m_pengguna->update_mapping($nik,$data_mapping);
}
		

		//update data db login
		//hash password
		  if($checkbox_pwd){
		  	$password = $this->input->post("password");
		  	$hash = $this->password->hash($password);
			$data_login=array(
			   "password" =>$hash
			  );
			$edit_data_login = $this->m_pengguna->update_login($nik,$data_login);
		  }
		
		$this->session->set_notif('Berhasil Ubah Data','check','success');
		redirect('pengguna');
	}

	public function tambah()
	{	
		$data['notif'] = $this->session->get_notif();
		$data['state'] = 'tambah_pengguna';
		$header['title_halaman'] = 'Tambah Data Pengguna';
		$this->load->view('template/header',$header);
		$this->load->view('register/halaman_daftar',$data);
		$this->load->view('template/footer');
		
	}

	public function hapus()
	{	
		$hash = $this->uri->segment('3');
		$nik = $this->password->decrypt($hash);

		$hapus = $this->m_pengguna->hapus_pengguna($nik);
		if($hapus){ //data nik telah terdaftar
			$this->session->set_notif('Data NIK. "'.$nik.'" Berhasil dihapus!','check','success');
		 } else{
		 	$this->session->set_notif('Data NIK. "'.$nik.'" Gagal dihapus!','close','danger');	
		 }

		redirect('pengguna');
		
	}

	
}