<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->library('password');	
		$this->load->model('m_login');	
	}

	public function index()
	{	
		//get notif dari fungsi flash session
		$data['notif'] = $this->session->get_notif();

		$this->load->view('template/header_luar');
		$this->load->view('login/halaman_login',$data);
		$this->load->view('template/footer');
	}

	public function login_conf()
	{	
		$nik = $this->input->post('nik');	
		$pass = $this->input->post('password');

		//verify NIK dan ambil data password
		$db_password=$this->m_login->get_db_password($nik);

		  if(empty($db_password)){
				$this->session->set_notif('Gagal Login, NIK tidak ditemukan','close','danger');
				redirect('login/');
				exit();
		 } 

		 //verify data password
		 $verify = $this->password->verify($pass,$db_password);

			if($verify){
				$nama 	   = $this->m_login->get_nama($nik);
				$hak_akses = $this->m_login->get_hak_akses($nik);

				$userdata= array(
					'nik'=> $nik, 
					'nama'=> $nama,
					'hak_akses' => $hak_akses
				);

				$this->load->library('session');
				$this->session->set_userdata($userdata);
				redirect('dashboard');
				//redirect('login/');
				exit();
			}else{
				$this->session->set_notif('Gagal Login, Password salah!','close','danger');
				redirect('login/');
				exit();
			}

	}

	public function out(){
		$this->session->sess_destroy();
		redirect('login');
	}
}
