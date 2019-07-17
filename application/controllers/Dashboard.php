<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->model('m_dashboard');

		//cek jika mencoba akses halaman ini tanpa login
		if(empty($this->session->userdata('nik'))){
			//notif
			$this->session->set_notif('Akses ditolak! , anda harus login terlebih dahulu','close','danger');
			redirect('login');
			exit;
		}

		//cek aproval keanggotaan
		if(empty($this->session->userdata('hak_akses'))){
			//notif
			$this->session->set_notif('Akses ditolak! , anda belum portofolio untuk megakses halaman ini','close','danger');
			redirect('dashboard');
			exit;
		
		}
	}

	public function cek_portofolio($nik)
	{
		$cek_port=$this->m_dashboard->get_portofolio($nik);
		  if($cek_port){ //data nik telah terdaftar
			$this->session->set_notif('Terimakasih, Anda Telah mengisi Portofolio. Data anda sedang diproses ','check','success');
		}else{
			$this->session->set_notif('Anda belum mengisi Portofolio. ','spinner fa-spin','warning');
		
		}
	}

	public function index()
	{	
		
		//$this->session->set_userdata($userdata);
		//redirect('dashboard/');
		$data['notif'] = $this->session->get_notif();
		$header['title_halaman'] = 'dashboard';
		$this->load->view('template/header',$header);

		$hak_akses = $this->session->userdata('hak_akses');
		$nik = $this->session->userdata('nik');

		if($hak_akses==5) {
			$this->cek_portofolio($nik);
			//notif
			$data['notif'] = $this->session->get_notif();
			$this->load->view('dashboard/dashboard_pendaftar',$data);
			$this->load->view('template/footer');
			
		}elseif($hak_akses==4){
			$this->load->view('dashboard/dashboard_anggota');
			$this->load->view('template/footer');
		}elseif($hak_akses==2){
			$data['jumlah_anggota'] = $this->m_dashboard->count_anggota();
			$data['jumlah_pendaftar'] = $this->m_dashboard->count_pendaftar();

			//statistik anggota
			$get_data = $this->m_dashboard->get_statistik_anggota();	
			$statistik_anggota_values = [];
			$statistik_anggota_label = [];
			foreach ($get_data as $row) {
				array_push($statistik_anggota_values, $row->jumlah);
				array_push($statistik_anggota_label, $row->bulan."/".$row->tahun);
			}
			$data['statistik_anggota_values'] = $statistik_anggota_values;
			$data['statistik_anggota_label'] = $statistik_anggota_label;

			//statistik Provinsi
			$get_data = $this->m_dashboard->get_statistik_provinsi();	
			$statistik_provinsi_values = [];
			$statistik_provinsi_label = [];
			foreach ($get_data as $row) {
				array_push($statistik_provinsi_values, $row->jumlah);
				array_push($statistik_provinsi_label, $row->provinsi);
			}
			$data['statistik_provinsi_values'] = $statistik_provinsi_values;
			$data['statistik_provinsi_label'] = $statistik_provinsi_label;

			$this->load->view('dashboard/dashboard_ketua',$data);
			$this->load->view('template/footer');
		}else{
			$this->session->set_notif('Akses ditolak! , anda harus login terlebih dahulu','close','danger');
			redirect('login');
			exit;
		}
		
	}
}