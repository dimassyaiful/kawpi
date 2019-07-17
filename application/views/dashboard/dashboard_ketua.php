
<?php
  if(!empty($notif)){
      echo $notif;
  }

  ?>
<div class="row" style="padding-left: 10px; padding-right: 10px;" >
  <div class="col-md-3 col-xs-12"  style="margin: 5px 5px 5px 5px;">
    <div class="row" style="border-radius: 10px; background-color: #009c10; padding: 10px; color: white;" >
      <div class="col-md-4 col-xs-4 text-center" style="padding-top: 10px;"> <i class="fa fa-group fa-3x"></i></div>
      <div class="col-md-8 col-xs-8 text-center">
        Jumlah Anggota
        <h2><?= $jumlah_anggota; ?> </h2>
      </div>
    </div>
  </div>

  <div class="col-md-3 col-xs-12" style="margin: 5px 5px 5px 5px;">
    <div class="row" style="border-radius: 10px; background-color: #00567a; padding: 10px; color: white;" >
      <div class="col-md-4 col-xs-4 text-center" style="padding-top: 10px;"> <i class="fa fa-vcard-o fa-3x"></i></div>
      <div class="col-md-8 col-xs-8 text-center">
        Jumlah Pendaftar
        <h2><?= $jumlah_pendaftar; ?> </h2>
      </div>
    </div>
  </div>
   

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