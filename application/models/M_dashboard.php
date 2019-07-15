<?php
class m_dashboard extends CI_Model{
    

  	function count_anggota(){
            $sql ="SELECT count(*) jumlah FROM mapping_pengguna WHERE id_posisi = '4'";
            $query = $this->db->query($sql);
            $data = $query->result_array();
            return $data[0]['jumlah']; 
	}

  	function count_pendaftar(){
            $sql ="SELECT count(*) jumlah FROM mapping_pengguna WHERE id_posisi = '5'";
            $query = $this->db->query($sql);
            $data = $query->result_array();
            return $data[0]['jumlah']; 
	}

	function get_statistik_anggota(){
        
          $sql ="SELECT count(nik) jumlah, month(tanggal_diterima) bulan , year(tanggal_diterima) tahun FROM mapping_pengguna where id_posisi = '4' group by bulan,tahun limit 10";
          $query = $this->db->query($sql);
          $result = $query->result(); 
          return $result; 
   }

	function get_statistik_provinsi(){
        
          $sql ="SELECT p.provinsi, count(p.nik) jumlah FROM mapping_pengguna m, pengguna p WHERE p.nik = m.nik and m.id_posisi ='4' group by p.provinsi";
          $query = $this->db->query($sql);
          $result = $query->result(); 
          return $result; 
   }

}

?>