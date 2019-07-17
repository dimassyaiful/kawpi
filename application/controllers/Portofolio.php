<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//load controller notifikasi


class portofolio extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->library('password');
		$this->load->model('M_portofolio');	
	}
	
	public function index()
	{	
		/* $isi_data_portofolio = $this->m_portofolio->isi_portofolio($data_portofolio);
		echo $isi_data_portofolio;
		exit;

		if($isi_data_portofolio){
			//jika tambah data login berhasil, then tambah data pengguna
			$data_portofolio=array(
			   "nik" =>$nik,
			   "bidang_keahlian" =>$bidang_keahlian,
			   "riwayat_pelatihan" =>$riwayat_pelatihan,
			   "sertifikat_dimiliki" =>$sertifikat_dimiliki,
			   "riwayat_project" =>$riwayat_project
			  );
			  
			  
			$this->session->set_notif('Berhasil Ubah','check','success');
			}else{
				//gagal tambah db pengguna
				$this->session->set_notif('Gagal Ubah','close','danger');
			} */
		
	}
	
	public function isi_portofolio()
	{	
		//get notif dari fungsi flash session
		$data['notif'] = $this->session->get_notif();

		$this->load->view('template/header');
		$this->load->view('portofolio/isi_portofolio',$data);
		$this->load->view('template/footer');
	}

	public function isi_conf(){
		  $nik = $this->session->userdata("nik");
		  $bidang_keahlian = $this->input->post("bidang_keahlian");
		  $riwayat_pelatihan = $this->input->post("riwayat_pelatihan");
		  $sertifikat_dimiliki = $this->input->post("sertifikat_dimiliki");
		  $riwayat_project = $this->input->post("riwayat_project");


	}

    public function isi_profil_config()
    {
		  $nik = $this->input->post("nik");
		  $bidang_keahlian = $this->input->post("bidang_keahlian");
		  $riwayat_pelatihan = $this->input->post("riwayat_pelatihan");
		  $sertifikat_dimiliki = $this->input->post("sertifikat_dimiliki");
		  $riwayat_project = $this->input->post("riwayar_project");
	} 

           
			
}


