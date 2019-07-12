<?php
class m_login extends CI_Model{
	function login_conf ($nik, $password){
		$this->db->from('login');
		$this->db->where('nik',$nik);
		$this->db->where('password',$password);
		$query = $this->db->get();
		$num = $query->num_rows();
		$result = $query->row();
		return $result;
	}

	function get_nama ($nik){
		$this->db->from('pengguna');
		$this->db->where('nik',$nik);
		$query = $this->db->get();
		$result = $query->row_array();
		return $result['nama'];
	}

	function get_db_password($nik){
        $this->db->select('password');
        $this->db->from('login');
        $this->db->where('nik',$nik);

        $query=$this->db->get();
		$result = $query->row_array();
		return $result['password'];
    }

    function get_hak_akses($nik){
        $this->db->select('id_posisi');
        $this->db->from('mapping_pengguna');
        $this->db->where('nik',$nik);

        $query=$this->db->get();
		$result = $query->row_array();
		return $result['id_posisi'];
    }
}
?>
