<?php
class m_test extends CI_Model{
    
  function get_data_pengguna(){
        
          $this->db->select('*');
          $this->db->from('pengguna');

          $query = $this->db->get();
          $result = $query->result(); 
          return $result; 
  }

}

?>