<?php
class m_pendaftar extends CI_Model{

    function cek_portofolio($nik){
        $this->db->select('*');
        $this->db->from('portopolio');
        $this->db->where('nik',$nik);

        $query=$this->db->get();
        $num=$query->num_rows();
        return $num;
    }

    function cek_status($nik){
        $sql ="SELECT keterangan,status from verifikasi where nik = '".$nik."'";
        $query = $this->db->query($sql);

        $num=$query->num_rows();
        $result = $query->result_array();

        if($num == 0){
            return 'waiting';
        }

        if(isset($result[0]['status'])){
          return $result[0]['keterangan'];
        }
    }

  function get_data_pengguna(){
        
          $this->db->select('*');
          $this->db->from('pengguna');
        
          $query = $this->db->query("SELECT* FROM pengguna p,mapping_pengguna m where p.nik=m.nik and m.id_posisi='5'");
          $result = $query->result(); 
          return $result; 
  }

  function get_portofolio($nik){
            $sql ="SELECT * from portopolio where nik = '".$nik."'";
            $query = $this->db->query($sql);
            $result = $query->row(); 
            return $result; 
  }

  function edit($nik)
    {
      $this->db->select('*');
      $this->db->from('pengguna');
      $query = $this->db->query("SELECT* FROM pengguna p,mapping_pengguna m where p.nik=m.nik and m.id_posisi='5' and p.nik='".$nik."'");
      $result = $query->row(); 
      return $result; 
    }
    
    function save($nik, $data_edit)
    {
        $this->db->where('nik', $nik);
        $berhasil = $this->db->update('pengguna', $data_edit);
        if($berhasil)
        {
            redirect('pendaftar');
        }
        else
        {
            redirect('pendaftar');
        }
    }
  
    function reset($nik){
        $this->db->where('nik', $nik);
        if($this->db->delete('verifikasi')){
            return 1;
        }else{
            return 0;
        }
    }

  function delete($nik)
    {
        $query=$this->db->query("DELETE FROM pengguna WHERE nik='$nik'");
     
    }

  function verifikasi($data){
        if($this->db->insert('verifikasi',$data)){
            return 1;
        }else{
            return 0;
        }
    }
  
}



?>