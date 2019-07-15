<?php
class m_portofolio extends CI_Model{
    
  function get_data_portofolio(){
        
          $this->db->select('*');
          $this->db->from('portofolio');

          $query = $this->db->get();
          $result = $query->result(); 
          return $result; 
  }

  function edit_portofolio($data){
    if($this->db->insert('portofolio',$data)){
        return 1;
    }else{
        return 0;
    }
}


function get_nik($nik){
    $this->db->select('*');
    $this->db->from('portofolio');
    $this->db->where('nik',$nik);

    $query=$this->db->get();
    $num=$query->num_rows();
    return $num;
}

}

?>