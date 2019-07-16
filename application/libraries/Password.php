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

		function encrypt($str) {
			$hasil = '';
		    $kunci = '979a218e0632df2935317f98d47956c7';
		    for ($i = 0; $i < strlen($str); $i++) {
		        $karakter = substr($str, $i, 1);
		        $kuncikarakter = substr($kunci, ($i % strlen($kunci))-1, 1);
		        $karakter = chr(ord($karakter)+ord($kuncikarakter));
		        $hasil = $hasil.$karakter;
		    }
		    return urlencode(base64_encode($hasil));
		}
		function decrypt($str) {
			$hasil = '';
		    $str = base64_decode(urldecode($str));
		    $hasil = '';
		    $kunci = '979a218e0632df2935317f98d47956c7';
		    for ($i = 0; $i < strlen($str); $i++) {
		        $karakter = substr($str, $i, 1);
		        $kuncikarakter = substr($kunci, ($i % strlen($kunci))-1, 1);
		        $karakter = chr(ord($karakter)-ord($kuncikarakter));
		        $hasil = $hasil.$karakter;
		    }
		    return $hasil;
		}
	}
?>