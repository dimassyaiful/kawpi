<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//load controller notifikasi


class register extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->library('password');
		$this->load->model('m_register');	
	}
	
	public function index()
	{	
		$this->register_page();
	}

	public function register_page()
	{	
		//get notif dari fungsi flash session
		$data['notif'] = $this->session->get_notif();

		$this->load->view('template/header_luar');
		$this->load->view('register/halaman_daftar',$data);
		$this->load->view('template/footer');
	}

	public function register_config(){
		  

		  $nik = $this->input->post("nik");
		  $nama = $this->input->post("nama");
		  $ttl = $this->input->post("ttl");
		  $alamat = $this->input->post("alamat");
		  $provinsi = $this->input->post("provinsi");
		  $email = $this->input->post("email");
		  $password = $this->input->post("password");
		  $hak_akses = $this->input->post('hak_akses');

		  $data_pengguna=array(
				   "nik" =>$nik,
				   "nama" =>$nama,
				   "ttl" =>$ttl,
				   "alamat" =>$alamat,
				   "provinsi" =>$provinsi,
				   "email" =>$email
				  );
		 
		 //hash password
		 $hash = $this->password->hash($password);
		  $data_login=array(
		   "nik" =>$nik,
		   "password" =>$hash
		  );

		  if(isset($hak_akses)){
		  	$hak_akses = $this->input->post('hak_akses');
		  	$tgl = date("Y/m/d");
		  	$redirect = 'pengguna';
		  }else{
		  	$hak_akses = 5;
		  	$tgl = null;
		  	$redirect = 'login';
		  }

		  $data_mapping=array(
				   "nik" => $nik,
				   "id_posisi" => $hak_akses, //pendaftar
				   "tanggal_diterima" => $tgl
		  );

		  $cek_nik=$this->m_register->get_nik($nik);
		  if($cek_nik>0){ //data nik telah terdaftar
				$this->session->set_notif('Gagal Registrasi, NIK Duplikat','close','danger');
				echo "<script> history.back(); </script>";
				exit();
		 } 

		 $cek_email=$this->m_register->get_email($email);
		  if($cek_email>0){ //data email telah digunakan
				$this->session->set_notif('Gagal Registrasi, E-mail Duplikat','close','danger');
				echo "<script> history.back(); </script>";
				exit();
		 } 

		 $tambah_data_pengguna = $this->m_register->register_pengguna($data_pengguna);
			if(!$tambah_data_pengguna){ //gagal tambah db pengguna
				$this->session->set_notif('Gagal Registrasi','close','danger');
				echo "<script> history.back(); </script>";
				exit();
			}

		//tambah hak akses
		$tambah_data_mapping = $this->m_register->register_mapping($data_mapping);

		//tambah data db login
		$tambah_data_login = $this->m_register->register_login($data_login);

		$this->session->set_notif('Berhasil Registrasi','check','success');
		redirect($redirect);

	}
}


