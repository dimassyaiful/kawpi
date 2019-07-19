<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//load controller notifikasi


class portofolio extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->library('password');
		$this->load->model('m_portofolio');	
	}

	public function pengajuan_ulang()
	{	
		$this->session->set_notif('Anda telah mengajukan ulang Keanggotaan','spinner fa-spin','warning');

		$hapus_old = $this->m_portofolio->hapus_portofolio($this->session->userdata('nik'));
		$hapus_verifikasi = $this->m_portofolio->hapus_verifikasi($this->session->userdata('nik'));
		if($hapus_old){
			$hapus_verifikasi = $this->m_portofolio->hapus_verifikasi($this->session->userdata('nik'));
			$this->isi_portofolio();
		}else{
			$this->session->set_notif('Pengajuan Ulang gagal','close','danger');
		    echo "<script> history.back(); </script>";
		    exit();
		}
		
	}
		
	public function isi_portofolio()
	{	
		//get notif dari fungsi flash session
		$data['notif'] = $this->session->get_notif();
		$header['title_halaman'] = 'Isi Portofolio';
		$this->load->view('template/header',$header);
		$this->load->view('portofolio/isi_portofolio',$data);
		$this->load->view('template/footer');
	}

	public function upload($path_folder, $nama_file, $postname){
			$config = array();
		   //upload file sertifikat
		  	$config['upload_path']          = $_SERVER['DOCUMENT_ROOT'].'/kawpi/src/'.$path_folder.'/';
			$config['allowed_types']        = 'pdf';
			$config['max_size']             = 1024;

			$config['file_name'] = $nama_file;

			$this->load->library('upload', $config, $postname);
			$this->catalogupload->initialize($config);
			if ( ! $this->upload->do_upload($postname)){
				$this->session->set_notif('Unggah file '.$nama_file.' Gagal','close','danger');
			    echo "<script> history.back(); </script>";
			    exit();
			}
	}

	public function isi_conf(){
		  $nik = $this->session->userdata("nik");
		  $bidang_keahlian = $this->input->post("bidang_keahlian");
		  $riwayat_pelatihan = $this->input->post("riwayat_pelatihan");


		  $name_file_sertifikat = 'sertifikat_'.time()."_".$nik = $this->session->userdata("nik").'.pdf';
		  $name_file_project = 'project_'.time()."_".$nik = $this->session->userdata("nik").'.pdf';


		    // sertifikat upload
		    $config = array();
		    $config['upload_path'] = $_SERVER['DOCUMENT_ROOT'].'/kawpi/src/file_sertifikat/';;
		    $config['allowed_types'] = 'pdf';
		    $config['max_size'] = '2048';
		    $config['file_name'] = $name_file_sertifikat;
		    $this->load->library('upload', $config, 'sertifikatx'); // Create custom object for cover upload
		    $this->sertifikatx->initialize($config);
		    $upload_sertifikat = $this->sertifikatx->do_upload('sertifikat_dimiliki');
		  
		    if (!$upload_sertifikat){
				$this->session->set_notif('Unggah file sertifikat Gagal','close','danger');
			    echo "<script> history.back(); </script>";
			    exit();
			}

			// Project upload
		    $config = array();
		    $config['upload_path'] = $_SERVER['DOCUMENT_ROOT'].'/kawpi/src/file_project/';;
		    $config['allowed_types'] = 'pdf';
		    $config['max_size'] = '2048';
		    $config['file_name'] = $name_file_project;
		    $this->load->library('upload', $config, 'projectx'); // Create custom object for cover upload
		    $this->projectx->initialize($config);
		    $upload_project = $this->projectx->do_upload('project');

		    if ( !$upload_project){
				$this->session->set_notif('Unggah file Project Gagal','close','danger');
			    echo "<script> history.back(); </script>";
			    exit();
			}

		  $data_portofolio=array(
			"nik" =>$this->session->userdata('nik'),
			"bidang_keahlian" =>$bidang_keahlian,
			"riwayat_pelatihan" =>$riwayat_pelatihan,
			"sertifikat_dimiliki" =>$name_file_sertifikat,
			"riwayat_project" =>$name_file_project
		   );

		   $tambah_portofolio = $this->m_portofolio->tambah_portofolio($data_portofolio);
		   if(!$tambah_portofolio){ //gagal tambah db pengguna
			   $this->session->set_notif('Gagal Menambah Portofolio','close','danger');
			   echo "<script> history.back(); </script>";
			   exit();
		   }
		   $this->session->set_notif('Berhasil Mengisi','check','success');
		   redirect('dashboard');

	}


	public function lihat_portofolio()
	{
		//title judul web
		$header['title_halaman'] = 'Test Show Data';

		//get notif dari fungsi flash session
		$data['notif'] = $this->session->get_notif();

		//get data portofolio
		$data['portopolio'] = $this->m_profile->lihat_portofolio();
		$this->load->view('template/header',$header);
		$this->load->view('portofolio/lihat_portofolio',$data);
		$this->load->view('template/footer');
	}



    public function edit_portofolio()
	{	
		//get notif dari fungsi flash session
		$data['notif'] = $this->session->get_notif();

		$this->load->view('template/header_luar');
		$this->load->view('portofolio/edit_portofolio',$data);
		$this->load->view('template/footer');
	}

    public function edit_conf()
    {
		  $nik = $this->session->userdata("nik");
		  $bidang_keahlian = $this->input->post("bidang_keahlian");
		  $riwayat_pelatihan = $this->input->post("riwayat_pelatihan");
		  $sertifikat_dimiliki = $this->input->post("sertifikat_dimiliki");
		  $riwayat_project = $this->input->post("riwayat_project");
		} 

		    /* $edit_data_portofolio = $this->m_portofolio->edit_portofolio($data_portofolio);
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
			exit();*/
	
}


