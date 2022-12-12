<section class="content-header">
    <h1><?php echo $contentTitle ?></h1>
</section>

<section class="content container-fluid">
    <div class="row">
        <div class="col-lg-12 col-xs-6">
            <div class="small-box bg-aqua">
                <div class="inner">
                    <p>&nbsp;</p>
                    <h3>Hi, <?php echo getUserLogin(); ?></h3>
                </div>
                <div class="icon">
                    <i class="ion ion-person"></i>
                </div>
                <a class="small-box-footer"><h4>Selamat datang di Medical Record Registrasi Room</h4></a>
            </div>
        </div>
        
    </div>

    <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $rj; ?></h3>

              <p>Pendaftaran Rawat Jalan</p>
            </div>
            <div class="icon">
              <i class="fa  fa-wheelchair"></i>
            </div>
            <a href="<?php echo base_url() ."mr_registrasi.php/registrasi/rawat_jalan"; ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $gd; ?></h3>

              <p>Pendaftaran Gawat Darurat</p>
            </div>
            <div class="icon">
              <i class="fa  fa-ambulance"></i>
            </div>
            <a href="<?php echo base_url() ."mr_registrasi.php/registrasi/gawat_darurat"; ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $ri; ?></h3>

              <p>Pendaftaran Rawat Inap</p>
            </div>
            <div class="icon">
              <i class="fa fa-bed"></i>
            </div>
            <a href="<?php echo base_url() ."mr_registrasi.php/registrasi/rawat_inap"; ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php //echo $ri; ?>0</h3>

              <p>Pendaftaran Online</p>
            </div>
            <div class="icon">
              <i class="fa fa-globe"></i>
            </div>
            <a href="<?php echo base_url() ."mr_registrasi.php/online"; ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        
    </div>
    
</section>