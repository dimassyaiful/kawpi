<?php
class m_anggota extends CI_Model{
    
  function get_data_pengguna(){
        
          $this->db->select('*');
          $this->db->from('pengguna');
        
          $query = $this->db->query("SELECT* FROM pengguna p,mapping_pengguna m where p.nik=m.nik and m.id_posisi='4'");
          $result = $query->result(); 
          return $result; 
  }

  function edit($nik)
    {
      $this->db->select('*');
      $this->db->from('pengguna');
      $query = $this->db->query("SELECT* FROM pengguna p,mapping_pengguna m where p.nik=m.nik and m.id_posisi='4' and p.nik='".$nik."'");
      $result = $query->row(); 
      return $result; 
    }
    function save($nik, $data_edit)
    {
        $this->db->where('nik', $nik);
        $berhasil = $this->db->update('pengguna', $data_edit);
        if($berhasil)
        {
            redirect('anggota');
        }
        else
        {
            redirect('anggota');
        }}
   
  

  function delete($nik)
    {
        $query=$this->db->query("DELETE FROM pengguna WHERE nik='$nik'");
     
    }
  
  
}



?>