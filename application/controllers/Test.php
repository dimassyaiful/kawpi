<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class test extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->model('m_test');	
	}
	
	public function index()
	{
		//title judul web
		$header['title_halaman'] = 'Test Show Data';

		//get notif dari fungsi flash session
		$data['notif'] = $this->session->get_notif();

		//get data pengguna
		$data['data_pengguna'] = $this->m_test->get_data_pengguna();

		$this->load->view('template/header',$header);
		$this->load->view('test',$data);
		$this->load->view('template/footer');
	}
}
