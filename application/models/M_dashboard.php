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
        
          $sql ="SELECT count(v.nik) jumlah, month(v.tgl_verifikasi) bulan , year(v.tgl_verifikasi) tahun FROM verifikasi v, mapping_pengguna m where m.nik = v.nik and m.id_posisi = '4' group by bulan,tahun limit 10";
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

   function get_portofolio($nik){
      $this->db->select('*');
      $this->db->from('portopolio');
      $this->db->where('nik',$nik);

      $query=$this->db->get();
      $num=$query->num_rows();
      return $num;
  }

  
}

?>