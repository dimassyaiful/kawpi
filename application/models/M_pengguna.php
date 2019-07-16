<?php
class m_pengguna extends CI_Model{
    
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

    function get_email($email){
        $this->db->select('*');
        $this->db->from('pengguna');
        $this->db->where('email',$email);

        $query=$this->db->get();
        $num=$query->num_rows();
        return $num;
    }

    function get_email_data($email){
        $this->db->select('email');
        $this->db->from('pengguna');
        $this->db->where('email',$email);

        $query=$this->db->get();
        $result=$query->row();
        return $result->email;
    }

      function get_data_pengguna(){
        
          $sql ="SELECT * from pengguna p, mapping_pengguna m where m.nik = p.nik and m.id_posisi NOT  in('4','5')";
          $query = $this->db->query($sql);
          $result = $query->result(); 
          return $result; 
     }

     function get_data_pengguna_1($nik){
        
             $sql ="SELECT * from pengguna p, mapping_pengguna m where m.nik = p.nik and p.nik = '".$nik."'";
            $query = $this->db->query($sql);
            $result = $query->row(); 
            return $result; 
     }

     function update_pengguna($data){
        if($this->db->replace('pengguna', $data)){
            return 1;
        }else{
            return 0;
        }
    }

     function update_mapping($data){
        if($this->db->replace('mapping_pengguna', $data)){
            return 1;
        }else{
            return 0;
        }
    }

    function update_login($data){
        if($this->db->replace('login', $data)){
            return 1;
        }else{
            return 0;
        }
    }

    function hapus_pengguna($nik){
        $this->db->where('nik', $nik);
        if($this->db->delete('pengguna')){
            return 1;
        }else{
            return 0;
        }
    }
}   

?>