<style>
    .tab-content{
        border:1px solid #ccc;
        border-collapse:collapse;
        padding:10px;
    }
</style>
<ul class="nav nav-tabs">
    <?php 
    if(!empty($jenispemeriksaan)){
        $no=0;
        foreach ($jenispemeriksaan as $p ) {
            if($no==0) $active="active"; else $active="";
            ?>
            <li class="<?= $active ?>"><a data-toggle="tab" href="#pemeriksaan<?= $p->idx ?>"><?= $p->jenis_pemeriksaan ?></a></li>
            <?php
            $no++;
        }
    }
    ?>
</ul>

<div class="tab-content">
    <?php 
    if(!empty($jenispemeriksaan)){
        $no=0;
        foreach ($jenispemeriksaan as $p ) {
            if($no==0) $active="active"; else $active="";
            ?>
            <!-- <div id="pemeriksaan<?= $p->idx ?>" class="tab-pane fade in <?= $active ?>">
                <h3><?= $p->jenis_pemeriksaan ?></h3>
            </div> -->
            <div id="formpemeriksaan">
                            <form id="formItem" class="form-horizontal" action="#" method="post" enctype="multipart/form-data" onsubmit="return false">
                                <input type="hidden" name="idx_hasil" id="idx_hasil" value="" />
                                <input type="hidden" name="id_daftar" id="id_daftar" value="<?php echo $detail->id_daftar ?>" />
                                <input type="hidden" name="idx_pendaftaran" id="idx_pendaftaran" value="<?php echo $detail->idx ?>" />
                                <input type="hidden" name="reg_unit" id="reg_unit" value="<?php echo $detail->reg_unit ?>" />
                                <input type="hidden" name="nomr" id="nomr" value="<?php echo $detail->nomr ?>" />
                                <input type="hidden" name="nama_pasien" id="nama_pasien" value="<?php echo $detail->nama_pasien ?>" />
                                <?php
                                $tgllahir = new DateTime($detail->tgl_lahir);
                                $sekarang = new DateTime('today');
                                $y = $sekarang->diff($tgllahir)->y;
                                $m = $sekarang->diff($tgllahir)->m;
                                $d = $sekarang->diff($tgllahir)->d;
                                ?>
                                <input type="hidden" name="umur" id="umur" value="<?= $y . " Tahun " . $m . " Bulan " . $d . " Hari" ?>" />
                                <input type="hidden" name="idruangpengirim" id="idruangpengirim" value="<?= $detail->asal_ruang ?>">
                                <input type="hidden" name="ruangpengirim" id="ruangpengirim" value="<?= $detail->nama_asal_ruang ?>">
                                <input type="hidden" name="idjenis" id="idjenis" value="<?= $def ?>">
                                <input type="hidden" name="idsubjenis" id="idsubjenis" value="">
                                <input type="hidden" name="subjenis" id="subjenis" value="">
                                <input type="hidden" name="diagnosa" id="diagnosa" value="<?= $diagnosa ?>">
                                <input type="hidden" name="jenispemeriksaan" id="x-jenispemeriksaan" value="<?= $jenis_pemeriksaan ?>">

                                <fieldset>
                                    <legend>Pemeriksaan <b><span id="jenispemeriksaan"></span></b></legend>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label>Tanggal Pemeriksaan </label>
                                            <input type="text" name="tgl_pemeriksaan" class="form-control tanggal" id="tgl_pemeriksaan" value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label>Petugas Pemeriksa</label>
                                            <select id='petugaspemeriksa' name="petugaspemeriksa" class="form-control" style='width:100%'>
                                                <option value="">Pilih Pemeriksaan</option>
                                                <?php
                                                foreach ($getDokter->result() as $petugas) {
                                                ?>
                                                    <option value="<?= $petugas->NRP ?>"><?= $petugas->pgwNama; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label>Pemeriksaan</label>
                                            <select id='id_pemeriksaan' name="id_pemeriksaan" class="form-control" onchange="getSubpemeriksaan()">
                                                <option value="">Pilih Pemeriksaan</option>
                                            </select>
                                            <input type="hidden" name="namapemeriksaan" id="namapemeriksaan" value="">
                                        </div>
                                    </div>
                                    <input type="hidden" id="template" name='template' value="Default">
                                    <div id='khusus'></div>
                                    <div id="sub_pemeriksaan"></div>



                                    <!--div class="form-group">
                                    <div class="col-md-12">
                                        <input type="file" class="form-control" name="userfile">
                                    </div>
                                </div-->
                                </fieldset>


                            </form>
                            <div class="form-group">
                                <button class="btn btn-primary" onclick="simpanHasilPemeriksaan()">Simpan</button>
                            </div>
                        </div>
            <?php
            $no++;
        }
    }
    ?>
    
</div>


<?php
$arr_akses = explode(',', $hakakses);
//print_r($arr_akses);
if (in_array(17, $arr_akses)) {
    $hak_verifikasi = 1;
}else{
    $hak_verifikasi = 0;
}
?>
<script type="text/javascript">
    var base_url = "<?= base_url() . "nota_tagihan.php/" ?>";
    var hak_verifikasi  = "<?= $hak_verifikasi ?>";
</script>
<script src="<?php echo base_url() ?>js/nota_tagihan.js"></script>
<script type="text/javascript">
    //showPemeriksaan("<?= $detail->reg_unit ?>","<?= $def ?>");
    setPemeriksaan("<?= $def ?>");
</script>