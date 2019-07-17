<?php
class m_portofolio extends CI_Model{
  
  
  //isi data portofolio
function get_portofolio($data){
    if($this->db->insert('portopolio',$data)){
        return 1;
    }else{
        return 0;
    }
}


// ambil data portofolio
function lihat_portofolio(){
        
    $this->db->select('*');
    $this->db->from('portopolio');

    $query = $this->db->get();
    $result = $query->result(); 
    return $result; 
}


  //edit data portofolio
  function edit_portofolio($data){
    $this->db->select('*');
        $this->db->from('portopolio');
        $this->db->where('nik',$nik);

        $query=$this->db->get();
        $num=$query->num_rows();
        return $num;
}


//ambil nik dari db portopolio
function get_nik($nik){
    $this->db->select('*');
    $this->db->from('portopolio');
    $this->db->where('nik',$nik);

    $query=$this->db->get();
    $num=$query->num_rows();
    return $num;
}

}

?>