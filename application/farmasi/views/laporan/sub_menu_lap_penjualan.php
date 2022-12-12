<div class="col-md-3">
    <div class="box box-widget widget-user-2">
        <div class="widget-user-header bg-aqua-active">
            <h3>Laporan Penjualan</h3>
        </div>
        <div class="box-body">
            <ul class="nav nav-stacked">
                <?php
                $uri = $this->uri->segment(2);
                
                ?>
                <li class="<?php if ($uri == '' || $uri == "index") echo "active" ?>"><a href="<?php echo base_url() . 'farmasi.php/laporan_penjualan' ?>">Laporan Penjualan Per pasien </a></li>
                <li class="<?php if ($uri == "laporan_penjualan_per_periode") echo "active" ?>"><a href="<?php echo base_url() . 'farmasi.php/laporan_penjualan/laporan_penjualan_per_periode' ?>">Laporan Penjualan Per Periode </a></li>
                <li class="<?php if ($uri == "laporan_harian_detail_penjualan") echo "active" ?>"><a href="<?php echo base_url() . 'farmasi.php/laporan_penjualan/laporan_harian_detail_penjualan' ?>">Laporan Harian Detail Penjualan </a></li>
                <li class="<?php if ($uri == "laporan_periode_penjualan") echo "active" ?>"><a href="<?php echo base_url() . 'farmasi.php/laporan_penjualan/laporan_periode_penjualan' ?>">Laporan Periode Penjualan </a></li>
                <li class="<?php if ($uri == "laporan_periode_detail_penjualan") echo "active" ?>"><a href="<?php echo base_url() . 'farmasi.php/laporan_penjualan/laporan_periode_detail_penjualan' ?>">Laporan Periode Detail Penjualan </a></li>
                <li class="<?php if ($uri == "laporan_resep_dokter") echo "active" ?>"><a href="<?php echo base_url() . 'farmasi.php/laporan_penjualan/laporan_resep_dokter' ?>">Laporan resep Dokter</a></li>

            </ul>
        </div>
    </div>
</div>