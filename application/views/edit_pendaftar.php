<form action="<?= base_url(); ?>pendaftar/save_edit" method= "post">
  <h1><center> EDIT PENDAFTAR </center></h1>
      
     <table> 
     <br>
     <div class="form-group">
    <label> <b style="color: red;">*</b> NIK</label>
    <input type="text" class="form-control" name="nik" value="<?php echo $data_edit->nik; ?>" readonly>
  </div>
  <br>
  <div class="form-group">
 <label> <b style="color: red;">*</b> nama</label>
 <input type="text" class="form-control" name="nama"  value="<?php echo $data_edit->nama;?>">
<div>
<br>
<div class="form-group">

    <label><b style="color: red;">*</b>Tanggal Lahir</label><br>
    <input type="date" class="form-control"name="ttl" value="<?php echo $data_edit->ttl;?>">
</div>
<br>
<div class="form-group">
      <label>Alamat</label>
      <textarea class="form-control" name="alamat" rows="3"><?php echo $data_edit->alamat; ?></textarea>
    <div>
    <br>
<div class="form-group">

        <label><b style="color: red;">*</b>Provinsi </label>
        <select class="form-control" name="provinsi">
          <option value="<?php echo $data_edit->provinsi;?>"><?php echo $data_edit->provinsi;?></option>

         <option value="aceh">Aceh</option>
         <option value="Sumut">Sumatera Utara</option>
         <option value="sumbar">Sumatera Barat</option>
         <option value="Riau">Riau</option>
         <option value="Jambi">Jambi</option>
         <option value="Sumsel">Sumatera Selatan</option>
         <option value="Bengkulu">Bengkulu</option>
         <option value="Lampung">Lampung</option>
         <option value="BaBel">Kep. Bangka Belitung</option>
         <option value="kepRiau">Kepulauan Riau</option>
         <option value="Jakarta">Jakarta</option>
         <option value="Jabar">Jawa Barat</option>
         <option value="Banten">Banten</option>
         <option value="Jateng">Jawa Tengah</option>
         <option value="Yogyakarta">Yogyakarta</option>
         <option value="Jatim">Jawa Timur</option>
         <option value="Kalbar">Kalimantan Barat</option>
         <option value="Kalteng">Kalimantan Tengah</option>
         <option value="Kalsel">Kalimantan Selatan</option>
         <option value="Kaltim">Kalimantan Timur</option>
         <option value="Kaltra">Kalimantan Utara</option>
         <option value="Bali">Bali</option>
         <option value="NTT">Nusa Tenggara Timur</option>
         <option value="NTB">Nusa Tenggara Barat</option>
         <option value="Sulut">Sulawesi Utara</option>
         <option value="Sulteng">Sulawesi Tengah</option>
         <option value="Sulsel">Sulawesi Selatan</option>
         <option value="Sultengg">Sulawesi Tenggara</option>
         <option value="Sulbar">Sulawesi Barat</option>
         <option value="Gorontalo">Gorontalo</option>
         <option value="Maluku">Maluku</option>
         <option value="Maluku Utara">Maluku Utara</option>
         <option value="Papua">Papua</option>
         <option value="Papua Barat">Papua Barat</option>
        </select>
<div>

  

   <br>
    <center>

    <button type="submit" class="btn btn-success" name="edit" value="Update">
       <i class="fa fa-check"></i>   save
       </button>
     <a class="btn btn-danger"  a href="<?php echo base_url()."pendaftar";?>">Back</a>

	
    </center>

<center>
     </table>
 </form>  
 
        <?php
            if($this->input->get('update')==1)
            {
                echo "Data Berhasil diupdate !";
            }
            else if($this->input->get('update')==2)
            {
                echo "Data Gagal diupdate !";
            }
        ?>
        
      