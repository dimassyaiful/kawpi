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

		  $cek_nik=$this->m_register->get_nik($nik);
		  if($cek_nik>0){
				$this->session->set_notif('Gagal Registrasi, NIK Duplikat','close','danger');
				redirect('register/');
				exit();
		 } 

		 //hash password
		 $hash = $this->password->hash($password);

		 //tambah data db login
		 $data_login=array(
		   "nik" =>$nik,
		   "password" =>$hash
		  );

		  $tambah_data_login = $this->m_register->register_login($data_login);
			if($tambah_data_login){
				//jika tambah data login berhasil, then tambah data pengguna
				$data_pengguna=array(
				   "nik" =>$nik,
				   "nama" =>$nama,
				   "ttl" =>$ttl,
				   "alamat" =>$alamat,
				   "provinsi" =>$provinsi,
				   "email" =>$email
				  );
				$tambah_data_pengguna = $this->m_register->register_pengguna($data_pengguna);
				if($tambah_data_pengguna){
					//jika berhasil tambah hak akses sebagai pendaftar
					$data_mapping=array(
					   "nik" => $nik,
					   "id_posisi" => 5,
					   "tanggal_diterima" => null
					);
					$tambah_data_mapping = $this->m_register->register_mapping($data_mapping);

					$this->session->set_notif('Berhasil Registrasi','check','success');
				}else{
					//gagal tambah db pengguna
					$this->session->set_notif('Gagal Registrasi','close','danger');
				}
			}else{
				//gagal tambah db login
				$this->session->set_notif('Gagal Registrasi ','close','danger');
			}

			redirect('register/');
			exit();

		  

	}
}


