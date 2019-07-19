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
function lihat_portofolio($nik){
        
    $this->db->select('*');
    $this->db->from('portopolio');
    $this->db->where('nik',$nik);

    $query = $this->db->get();
    $result = $query->row(); 
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

    function tambah_portofolio($data){
        if($this->db->insert('portopolio',$data)){
            return 1;
        }else{
            return 0;
        }
    }

    function hapus_portofolio($nik){
        $this->db->where('nik', $nik);
        if($this->db->delete('portopolio')){
            return 1;
        }else{
            return 0;
        }
    }

        function hapus_verifikasi($nik){
        $this->db->where('nik', $nik);
        if($this->db->delete('verifikasi')){
            return 1;
        }else{
            return 0;
        }
    }

}

?>