<form id="form1" role="form" class="form-horizontal" onsubmit="return false">
    <div class="row">
        <div class="col-md-12">
            <input type="hidden" class="form-control" name="id_daftar" id="id_daftar" value="<?= $id_daftar ?>">
            <input type="hidden" class="form-control" name="reg_unit" id="reg_unit" value="<?= $reg_unit ?>">
            <input type="hidden" class="form-control" name="nomr" id="nomr" value="<?= $nomr ?>">
            <input type="hidden" class="form-control" name="nama_pasien" id="nama_pasien" value="<?= $nama_pasien ?>">
            <input type="hidden" class="form-control" name="jns_kelamin" id="jns_kelamin" value="<?= $jns_kelamin ?>">
            <input type="hidden" class="form-control" id="v_jns_kelamin" value="<?php if ($jns_kelamin == 1 || $jns_kelamin == "L") echo "Laki-Laki"; ?>">
            <input type="hidden" class="form-control" name="tgl_lahir" id="tgl_lahir" value="<?= setDateEng($tgl_lahir); ?>">
            <input type="hidden" class="form-control" name="umur" id="umur" value="<?= getUmur(setDateEng($tgl_lahir), setDateEng($tgl_masuk)) ?>">
            <input type="hidden" class="form-control" name="id_ruang" id="id_ruang" value="<?= $id_ruang ?>">
            <input type="hidden" class="form-control" name="nama_ruang" id="nama_ruang" value="<?= $nama_asal_ruang ?>">
            <input type="hidden" class="form-control" name="id_kelas" id="id_kelas" value="0">
            <input type="hidden" class="form-control" name="kelas_layanan" id="kelas_layanan" value="">
            <input type="hidden" class="form-control" name="tgl_masuk" id="tgl_masuk" value="<?= setDateEng($tgl_masuk) ?>">
            <input type="hidden" class="form-control" name="tgl_keluar" id="tgl_keluar" value="<?= date('Y-m-d') ?>" placeholder="__-__-____">
            <input type="hidden" class="form-control" name="los" id="los" value="0">
            <input type="hidden" class="form-control" name="jns_layanan" id="jns_layanan" value="<?= $jns_layanan ?>">
            <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                Sebelum pasien didaftarkan ke ruangan rawat inap silahkan Isi informasi data pasien keluar terlebih dahulu
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Cara Keluar <span style="color: red"> * </span></label>
                <div class="col-md-3">
                    <select name="id_cara_keluar" id="id_cara_keluar" class="form-control">
                        <?php foreach ($getCaraKeluar->result_array() as $xCP) : ?>
                            <option value="<?php echo $xCP['idx'] ?>" <?php if ($xCP['idx'] == 6) echo "selected";
                                                                        else echo "disabled"; ?>><?php echo $xCP['cara_keluar'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-2 control-label">Dokter Penanggung Jawab <span style="color: red"> * </span></label>
                <div class="col-md-3">

                    <select name="dpjp" id="dpjp" class="form-control">
                        <option value=""></option>
                        <?php foreach ($getDokter->result_array() as $xD) : ?>
                            <option value="<?php echo $xD['NRP'] ?>" <?php if ($dokterJaga == $xD['NRP']) echo "selected"; ?>><?php echo $xD['pgwNama'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-2 control-label">Keadaan Keluar <span style="color: red"> * </span></label>
                <div class="col-md-3">
                    <select name="id_keadaan_keluar" id="id_keadaan_keluar" class="form-control">
                        <?php foreach ($getKeadaanKeluar->result_array() as $xKK) : ?>
                            <option value="<?php echo $xKK['idx'] ?>" <?php if ($xKK['idx'] == 6) echo "selected";
                                                                        else echo "disabled"; ?>><?php echo $xKK['keadaan_keluar'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-2 control-label">Jenis Kunjungan <span style="color: red"> * </span></label>
                <div class="col-md-3">
                    <?php
                    if ($tgl_masuk == $tgl_daftar) $jns_kunjungan = 0;
                    else $jns_kunjungan = 1;
                    ?>
                    <select name="jns_kunjungan" id="jns_kunjungan" class="form-control">
                        <option value="0" <?php if ($jns_kunjungan == 0) echo "selected" ?>>Pasien Baru</option>
                        <option value="1" <?php if ($jns_kunjungan == 1) echo "selected" ?>>Pasien Lama</option>
                    </select>
                </div>
            </div>




            <div class="form-group">
                <label class="col-md-2 control-label">Cara Bayar <span style="color: red"> * </span></label>
                <div class="col-md-3">
                    <select name="id_cara_bayar" id="id_cara_bayar" class="form-control">
                        <?php foreach ($getCaraBayar->result_array() as $xCB) : ?>
                            <option value="<?php echo $xCB['idx'] ?>" <?php if ($id_cara_bayar == $xCB['idx']) echo "selected"; ?>><?php echo $xCB['cara_bayar'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-2 control-label">No Kartu / No.Jaminan <span style="color: red"> * </span> [<em>Jika Cara Bayar Bukan Umum</em>]</label>
                <div class="col-md-3">
                    <input type="text" class="form-control" name="no_bpjs" id="no_bpjs" value="<?= $no_bpjs ?>">
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control" name="no_jaminan" id="no_jaminan" value="<?= $no_jaminan ?>">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-2 control-label">Tindakan Pelayanan <span style="color: red"> * </span></label>
                <div class="col-md-3">
                    <select name="id_tindakan_pelayanan" id="id_tindakan_pelayanan" class="form-control">
                        <option value=""></option>
                        <?php foreach ($getJenisPelayanan->result_array() as $xJP) : ?>
                            <option value="<?php echo $xJP['idx'] ?>"><?php echo $xJP['jenis_pelayanan'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Kasus Penyakit <span style="color: red"> * </span></label>
                <div class="col-md-3">
                    <select name="kasus_penyakit" id="kasus_penyakit" class="form-control">
                        <option value="0">Kasus Baru</option>
                        <option value="1">Kasus Lama</option>
                    </select>
                </div>
            </div>
            <fieldset>
                <legend>Diagnosa Utama</legend>
                <div class="form-group">
                    <label class="col-md-2 control-label">ICD 10 <span style="color: red"> * </span> [<em>Bridging E-Klaim</em>]</label>
                    <div class="col-md-3">
                        <input type="hidden" name="ada" id="ada" value="0">
                        <input type="text" class="form-control ui-autocomplete-input" name="kode_icd" id="kode_icd" autocomplete="off">
                    </div>
                    <div class="col-md-7">
                        <input type="text" class="form-control ui-autocomplete-input" name="icd" id="icd" autocomplete="off">
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-2 control-label">DTD <span style="color: red"> * </span></label>
                    <div class="col-md-3">
                        <input type="text" class="form-control ui-autocomplete-input" name="dtd" id="dtd" autocomplete="off">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">Group ICD <span style="color: red"> * </span></label>
                    <div class="col-md-8">
                        <input type="text" class="form-control ui-autocomplete-input" name="grup_icd" id="grup_icd" autocomplete="off">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">Morbiditas <span style="color: red"> * </span></label>
                    <div class="col-md-8">
                        <input readonly type="text" class="form-control" name="morbiditas" id="morbiditas">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">Kecelakaan <span style="color: red"> * </span></label>
                    <div class="col-md-6">
                        <input type="hidden" class="form-control" name="kecelakaan" id="kecelakaan" value="">
                        <input readonly type="text" class="form-control" id="viewkecelakaan">
                    </div>
                </div>
            </fieldset>
            <fieldset>
                <legend>Diagnosa Sekunder</legend>
                <div id="diagnosa_sekunder">
                    <div class="form-group">
                        <label class="col-md-2 control-label">ICD 10 <span style="color: red"> * </span> [<em>Diagnosa Sekunder</em>]</label>

                        <div class="col-md-10">
                            <input type="hidden" name="jml" id="jml" value="0">
                            <div class="input-group">
                                <input type="text" class="form-control ui-autocomplete-input kode_icd_sec" name="kode_icd_sec" id="kode_icd_sec" autocomplete="off">
                                <div class="input-group-btn">
                                    <button type="button" id="btn_add_diagnosa" class="btn btn-default" onclick="add_diagnosa('','')">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>


            </fieldset>

            <div class="form-group">
                <label class="col-md-2 ">&nbsp;</label>
                <div class="col-md-10">
                    <div class="input-group" id="btnExec">

                        <button type="button" class="btn btn-danger" id="submit" onclick="simpan()">
                            <i class="glyphicon glyphicon-floppy-disk"></i> Next</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</form>

<script src="<?php echo base_url() ?>assets/jquery/js/jquery-3.3.1.min.js"></script>
<script>
$(document).ready(function(){
    $('select')
    .not('#id_cara_keluar')
    .not('#id_keadaan_keluar')
    .not('#jns_kunjungan')
    .not('#id_cara_bayar')
    .not('#kasus_penyakit')
    .select2({
        'placeholder':'Pilih Opsi'
    });
    
});
</script>