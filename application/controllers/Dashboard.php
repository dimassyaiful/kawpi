<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->library('session');

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
		$header['title_halaman'] = 'Dashboard';
		$this->load->view('template/header',$header);
		$this->load->view('dashboard/dashboard_anggota');
		$this->load->view('template/footer');
	}
}
