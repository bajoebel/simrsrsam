<style type="text/css">
  .text-center{
    text-align: center;
  }
</style>
<div class="center">
<div class="col-md-6">
      <div class="panel panel-success">
          <div class="panel-heading text-center">NOMOR ANTREAN</div>
          <div class="panel-body">
              <div class="row">
                  <div class="col-md-12">
                      <div class="kotak font60 text-center" id="v-nomorAntri">
                      <?php 
                        if(!empty($lastantrean)) {
                          if(empty($lastantrean->labelantrean)) echo $lastantrean->no_antrian_poly;
                          else echo $lastantrean->labelantrean.".".$lastantrean->no_antrian_poly; 
                        }else {
                          echo "-"; 
                        }    
                      ?>
                      </div>
                  </div>
                  
              </div>
              <div class="kotak top20">
                <div class="row">
                    <div class="col-md-6">
                        <div class="font20"><?= getPoliByID($ruangID) ?></div>
                        <div class="font10" id="v-dokterjuga"><?php if(!empty($lastantrean)) echo $lastantrean->namaDokterJaga ?></div>
                    </div>
                    <div class="col-md-6">
                      <div class="font20" id="jamlayanan"><?= $jadwal->jadwal_jam_mulai ." - ". $jadwal->jadwal_jam_selesai ?></div>
                    </div>
                    <div class="col-md-4"></div>
                </div>
              </div>
              <div class="kotak top20">
                <div class="row">
                  <div class="col-md-12" id="statuspasien">
                    <?php 
                    // print_r($lastantrean);
                    if(empty($lastantrean)){
                      ?>
                      <button class="btn btn-warning btn-lg btn-block">Bersiap...</button>
                      <?php
                    }else{
                      if($lastantrean->aktiftaskid<=3){
                        ?>
                        <button class="btn btn-success btn-lg btn-block">Pasien Sudah Dipanggil...</button>
                        <?php
                      }else if($lastantrean->aktiftaskid==4){
                        ?>
                        <button class="btn btn-danger btn-lg btn-block">Pasien Sedang Dilayani...</button>
                        <?php
                      }
                    }
                    ?>
                    
                  </div>
                </div>
              </div>
          </div>
      </div>
  </div>
  <div class="col-md-6 table-responsive">
      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-success">
            <div class="panel-heading text-center">PROFILE PASIEN</div>
            <div class="panel-body">
                  <div class="col-md-12 top10">
                    <div class="jekel text-center">
                      <img src="<?= base_url() ."assets/images/female.png"; ?>" alt="">
                    </div>
                  </div>
                  <div class="col-md-12 top10">
                      <div class="kotak text-center">
                          <div class="font10"><b>Nama</b></div>
                          <div class="font14" id="v-nama"><?php if(!empty($lastantrean)) echo strtoupper($lastantrean->nama_pasien); else echo "-"; ?></div>
                      </div>
                  </div>
                  <div class="col-md-12 top10">
                      <div class="kotak text-center">
                          <div class="font10"><b>Dokter</b></div>
                          <div class="font14" id="v-namadokter"><?php if(!empty($lastantrean)) echo strtoupper($lastantrean->namaDokterJaga) ?></div>
                      </div>
                  </div>
                  <div class="col-md-12 top10">
                      <div class="kotak text-center">
                          <div class="font10"><b>Poli Tujuan</b></div>
                          <div class="font14"><?= getPoliByID($ruangID) ?></div>
                      </div>
                  </div>
                  <div class="col-md-12 top10">
                      <div class="kotak text-center">
                          <div class="font10"><b>Waktu Daftar</b></div>
                          <div class="font14" id="v-waktudaftar"><?php if(!empty($lastantrean)) echo $lastantrean->tgl_masuk; else echo "-"; ?></div>
                      </div>
                  </div>
                  <div class="col-md-12 top10">
                      <div class="kotak text-center">
                          <div class="font10"><b>Waktu Panggil</b></div>
                          <div class="font14" id="v-waktupanggil"><?= date('Y-m-d H:i:s') ?></div>
                      </div>
                  </div>
            </div>
          </div>
        </div>
                  
      </div>
  </div>
</div>

<!-- jQuery 3 -->
<script src="<?php echo base_url() . "assets/" ?>bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript">
  var elem = document.getElementById("body-content");
  var c = 0;
  var t;
  var hitung = 0;
  var timer_is_on = 0;
  var base_url = "<?php echo base_url() . "nota_tagihan.php/" ?>";
  var interval = 1000;
  timedCount();
  
  function timedCount() {
    t = setTimeout(timedCount, interval);
    getantrean();
  }
  function getantrean() {
    //alert("test");
    var url = base_url + "display/getantrean";
    //console.log(url);
    $.ajax({
      url: url,
      type: "GET",
      dataType: "json",
      data: {
        get_param: 'value'
      },
      success: function(data) {
        if(data.lastantrean.labelantrean=='') $('#v-nomorAntri').html(data.lastantrean.no_antrian_poly);
        else $('#v-nomorAntri').html(data.lastantrean.labelantrean+'.'+data.lastantrean.no_antrian_poly);
        $('#v-dokterjuga').html(data.lastantrean.namaDokterJaga)
        $('#jamlayanan').html(data.jadwal.jadwal_jam_mulai +"-"+data.jadwal.jadwal_jam_selesai)
        $('#v-nama').html(data.lastantrean.nama_pasien);
        $('#v-namadokter').html(data.lastantrean.namaDokterJaga);
        $('#v-waktudaftar').html(data.lastantrean.tgl_mulai);
        $('#v-waktupanggil').html(data.waktupanggil);
        if(data.lastantrean.aktiftaskid<3) $('#statuspasien').html('<button class="btn btn-success btn-lg btn-block">Pasien Sudah Dipanggil...</button>')
        else $('#statuspasien').html('<button class="btn btn-danger btn-lg btn-block">Pasien Sedang Dilayani...</button>')
        console.log(data)
      }
    });
  }
  function show_full() {
    req = elem.requestFullScreen || elem.webkitRequestFullScreen || elem.mozRequestFullScreen;
    //req.call(elem);
    return req;
    //alert("SHOW FULL SCREEN");
  }
</script>