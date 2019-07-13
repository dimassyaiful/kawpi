<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//load controller notifikasi


class edit_portofolio extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->library('password');
		$this->load->model('m_portofolio');	
	}
	
	public function index()
	{	
		$this->edit_portofolio_page();
	}

	public function edit_portofolio_page()
	{	
		//get notif dari fungsi flash session
		$data['notif'] = $this->session->get_notif();

		$this->load->view('template/header_luar');
		$this->load->view('portofolio/edit_portofolio',$data);
		$this->load->view('template/footer');
	}

    public function edit_profil_config()
    {
		  $nik = $this->input->post("nik");
		  $bidang_keahlian = $this->input->post("bidang_keahlian");
		  $riwayat_pelatihan = $this->input->post("riwayat_pelatihan");
		  $sertifikat_dimiliki = $this->input->post("sertifikat_dimiliki");
		  $riwayat_project = $this->input->post("riwayat_project");
		} 

		    $edit_data_portofolio = $this->m_portofolio->edit_portofolio($data_portofolio);
			if($edit_data_portofolio){
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
				}
			
			redirect('portofolio/');
			exit();

		  

	}
}


