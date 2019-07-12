<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Password {
		public function hash($password){
			$hasil_enkripsi = password_hash($password, PASSWORD_DEFAULT);
			$text = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890$$$$';
			$random = substr(str_shuffle( $text ),1,3); 
			$random2 = substr(str_shuffle( $text ),1,3); 
			$password = $random.$hasil_enkripsi.$random2;
			return $password;
		}

		public function verify($password, $hash){
			$hash1 = substr($hash,3);
			$hash2 = substr($hash1,0,-3);
			return password_verify($password, $hash2);
		}
	}
?>