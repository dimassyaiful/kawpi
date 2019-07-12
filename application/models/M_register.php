<?php
class m_register extends CI_Model{
    
    function register_pengguna($data){
        if($this->db->insert('pengguna',$data)){
            return 1;
        }else{
            return 0;
        }
    }

    function register_login($data){
        if($this->db->insert('login',$data)){
            return 1;
        }else{
            return 0;
        }
    }

    function register_mapping($data){
        if($this->db->insert('mapping_pengguna',$data)){
            return 1;
        }else{
            return 0;
        }
    }
    
    function get_nik($nik){
        $this->db->select('*');
        $this->db->from('pengguna');
        $this->db->where('nik',$nik);

        $query=$this->db->get();
        $num=$query->num_rows();
        return $num;
    }
}

?>