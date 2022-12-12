<div class="box box-success">
    <div class="box-header with-border">
        <h3 class="box-title">Form Input Hasil Pemeriksaan</h3>
    </div>
    <div class="box-body">
        <div class="">
            <div class="row">

                <?php if (!empty($jenispemeriksaan)) { ?>
                    <div class="col-xs-3">
                        <ul class="nav nav-stacked">
                            <?php
                            $i = 0;
                            $def = "";
                            $jenis_pemeriksaan = "";
                            foreach ($jenispemeriksaan as $t) {
                                if ($i == 0) {
                                    $def = $t->id_jenis_pemeriksaan;
                                    $jenis_pemeriksaan = $t->jenis_pemeriksaan;
                                }
                            ?>
                                <li class="jenispemeriksaan <?php if ($def == $t->id_jenis_pemeriksaan) echo "active" ?>" id='jenispemeriksaan<?= $t->id_jenis_pemeriksaan ?>'><a href="#" id="x-jenispemeriksaan<?= $t->id_jenis_pemeriksaan ?>" onclick="setPemeriksaan('<?= $t->id_jenis_pemeriksaan ?>')"><?= $t->jenis_pemeriksaan ?> </a></li>
                            <?php
                                $i++;
                            }
                            ?>
                        </ul>
                    </div>

                    <div class="col-xs-9">
                        <div id="datapemeriksaan" style="display: none;">
                            <button class="btn btn-success " onclick="tambahPemeriksaan()"><span class='fa fa-plus'></span> Tambah</button>
                            <button class="btn btn-default " onclick="CetakHasilPemeriksaan()"><span class='fa fa-print'></span> Cetak</button>
                            
                            <div id='list_data_pemeriksaan'></div>
                            <!--table class="table table-bordered">
                            
                            <thead class="bg-green">
                                <tr>
                                    <td rowspan="2" valign="center">NO</td>
                                    <td rowspan="2" valign="center">Pemeriksaan</td>
                                    <td rowspan="2">Hasil</td>
                                    <td rowspan="2" valign="center">Satuan</td>
                                    <td colspan="2" align="center">Nilai Rujukan</td>
                                    <td rowspan="2" valign="center" style="width: 10px;">#</td>
                                </tr>
                                <tr>
                                    <td>Pria</td>
                                    <td>Wanita</td>
                                </tr>
                            </thead>
                            <tbody id=""></tbody>
                        </table-->
                        </div>
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
                    </div>
                <?php } else { ?>
                    <div class="col-md-12">
                        <div class="alert alert-warning alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h4><i class="icon fa fa-ban"></i> Peringatan</h4>
                            Belum Ada Data jenis pemeriksaan
                        </div>
                    </div>
                <?php } ?>
            </div>

        </div>
    </div>
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