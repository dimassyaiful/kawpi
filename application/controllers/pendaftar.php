<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftar extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->model('m_pendaftar');	
        $this->load->model('m_pendaftar');
	}
	
	public function index()
	{
		//title judul web
		$header['title_halaman'] = 'Pendaftar';

		//get notif dari fungsi flash session
		$data['notif'] = $this->session->get_notif();

		//get data pengguna
		$data['data_pengguna'] = $this->m_pendaftar->get_data_pengguna();

		$this->load->view('template/header',$header);
		$this->load->view('pendaftar',$data);
		$this->load->view('template/footer');
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
	$this->m_pendaftar->save($nik,$data);}


}