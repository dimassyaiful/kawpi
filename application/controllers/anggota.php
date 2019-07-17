<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class anggota extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->model('m_anggota');	
        $this->load->model('m_anggota');
	}
	
	public function index()
	{
		//title judul web
		$header['title_halaman'] = 'anggota';

		//get notif dari fungsi flash session
		$data['notif'] = $this->session->get_notif();

		//get data pengguna
		$data['data_pengguna'] = $this->m_anggota->get_data_pengguna();

		$this->load->view('template/header',$header);
		$this->load->view('anggota',$data);
		$this->load->view('template/footer');
	}
	
    function edit($nik)
    {	
		$id = $this->uri->segment('3');
	       
		$data['data_edit'] =$this->m_anggota->edit($nik);
	
     //title judul web
		$header['title_halaman'] = 'Edit data Anggota';
		$this->load->view('template/header',$header);
		   $this->load->view('edit_anggota', $data);
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
	$this->m_anggota->save($nik,$data);}


}