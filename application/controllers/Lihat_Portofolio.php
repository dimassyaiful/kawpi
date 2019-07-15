<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class profile extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->model('m_profile');	
	}
	
	public function index()
	{
		//title judul web
		$header['title_halaman'] = 'Test Show Data';

		//get notif dari fungsi flash session
		$data['notif'] = $this->session->get_notif();

		//get data pengguna
		$data['data_portofolio'] = $this->m_profile->get_data_portofolio();

		$this->load->view('template/header',$header);
		$this->load->view('portofolio/lihat_portofolio',$data);
		$this->load->view('template/footer');
	}
}
