
<?php
  if(!empty($notif)){
      echo $notif;
  }

  ?>
<div class="row">
    <div class="col-md-3 col-xs-12">
      <div class="card" style="border-radius: 10px; background-color: #009c10;">
        <div class="card-body">
          <div class="d-flex flex-md-column flex-xl-row flex-wrap  align-items-center justify-content-between">
            <div class="icon-rounded-inverse-success icon-rounded-lg">
              <i class="fa fa-group"></i>
            </div>
            <div class="text-white">
              <p class="font-weight-medium text-md-center text-xl-left">Jumlah Anggota</p>
              <h1><?= $jumlah_anggota; ?> </h1>
          </div>
        </div>
      </div>
    </div>
  </div>

    <div class="col-md-3">
      <div class="card" style="border-radius: 10px; background-color: #007a9c;">
        <div class="card-body">
          <div class="d-flex flex-md-column flex-xl-row flex-wrap  align-items-center justify-content-between">
            <div class="icon-rounded-inverse-info icon-rounded-lg">
              <i class="fa fa-vcard-o"></i>
            </div>
            <div class="text-white">
              <p class="font-weight-medium text-md-center text-xl-left">Jumlah Pendaftar</p>
              <h1><?= $jumlah_pendaftar; ?> </h1>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php if($hak_akses == 1){ ?>
    <div class="col-md-3">
      <div class="card" style="border-radius: 10px; background-color: #ffa200;">
        <div class="card-body">
          <div class="d-flex flex-md-column flex-xl-row flex-wrap  align-items-center justify-content-between">
            <div class="icon-rounded-inverse-info icon-rounded-lg">
              <i class="fa fa-vcard-o"></i>
            </div>
            <div class="text-white">
              <p class="font-weight-medium text-md-center text-xl-left">Jumlah Pengguna</p>
              <h1><?= $jumlah_pengguna; ?> </h1>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php } ?>

</div>

  <br>
  <div class="row">
  	<div class="col-md-1"></div>
    <div class="col-lg-10 col grid-margin stretch-card">
      <div class="card">
        <div class="card-body" style="text-align: center;">
          <h3 class="card-title">Statistik Anggota perbulan</h3>
          <canvas id="c_anggota"></canvas>
        </div>
      </div>
    </div>
    <div class="col-md-1"></div>
  </div>

  <div class="row">
    <div class="col-md-1"></div>
    <div class="col-lg-10 grid-margin stretch-card">
      <div class="card">
        <div class="card-body" style="text-align: center;">
          <h3 class="card-title">Statistik Anggota per Provinsi</h3>
          <canvas id="c_provinsi"></canvas>
        </div>
      </div>
    </div>
    <div class="col-md-1"></div>
</div>

<script type="text/javascript">
	function dynamicColors() {
	    var r = Math.floor(Math.random() * 255);
	    var g = Math.floor(Math.random() * 255);
	    var b = Math.floor(Math.random() * 255);
	    return "rgba(" + r + "," + g + "," + b + ", 0.5)";
	}

	function poolColors(a) {
	    var pool = [];
	    for(i = 0; i < a; i++) {
	        pool.push(dynamicColors());
	    }
	    return pool;
	}

	var ctx = document.getElementById("c_anggota");
	var datax = JSON.parse('<?php echo json_encode($statistik_anggota_values); ?>');
	var labelx = JSON.parse('<?php echo json_encode($statistik_anggota_label); ?>');
	console.log(datax);
	var myChart = new Chart(ctx, {
	    type: 'bar',
	    data: {
	        labels: labelx,
	        datasets: [{
	            label: 'Jumlah Anggota',
	            data: datax,
	            backgroundColor: '#0048bd',
	            borderWidth: 2
	        }]
	    }
	});

	var ctx = document.getElementById("c_provinsi");
	var datay = JSON.parse('<?php echo json_encode($statistik_provinsi_values); ?>');
	var labely = JSON.parse('<?php echo json_encode($statistik_provinsi_label); ?>');
	var myChart = new Chart(ctx, {
	    type: 'pie',
	    data: {
	        labels: labely,
	        datasets: [{
	            label: 'Jumlah Anggota',
	            data: datay,
	            backgroundColor: poolColors(datay.length),
	            borderWidth: 2
	        }]
	    }
	});
</script>