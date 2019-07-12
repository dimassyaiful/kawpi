<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once SYSDIR . '/libraries/Session/Session.php';
	class CI_Notifikasi extends CI_Session{


		public function get_notif(){
			if(empty($this->session->flashdata('isi_notif'))){
				return 0;
			}

			$isi_notif   = $this->session->flashdata('isi_notif');
			$fa_notif    = $this->session->flashdata('fa_notif');
			$class_notif = $this->session->flashdata('class_notif');

			if($isi_notif == "" || $class_notif ==""){
				return 0;
			}else{
				$notifikasi = '<div class="alert alert-'.$class_notif.'" style="color: white; margin-top:30px; font-weight: bold;">
			   <i class="fa fa-'.$fa_notif.'"> </i> '.$isi_notif.'</div>';
				return $notifikasi;
			}
		}

		public function set_notifikasi($isi,$fa="",$class){
			//$isi = isi dari notifikasi
			//$fa = font awesome
			//$class = danger, success, info, primary

			$this->session->set_flashdata('isi_notif', $isi);
			$this->session->set_flashdata('fa_notif', $fa);
			$this->session->set_flashdata('class_notif', $class);
		}
	}
?>