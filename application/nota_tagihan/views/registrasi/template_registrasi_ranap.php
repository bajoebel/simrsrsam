<div class="row">
    <div class="col-md-6">
        <input type="hidden" name="provinsi" id="provinsi" value="<?= $nama_provinsi ?>">
        <input type="hidden" name="kabupaten" id="kabupaten" value="<?= $nama_kab_kota ?>">
        <input type="hidden" name="kecamatan" id="kecamatan" value="<?= $nama_kecamatan ?>">
        <input type="hidden" name="kelurahan" id="kelurahan" value="<?= $nama_kelurahan ?>">
        <input type="hidden" name="id_provinsi" id="id_provinsi" value="<?= $provinsi_id ?>">
                                <input type="hidden" name="id_kab_kota" id="id_kab_kota" value="<?= $kabkota_id ?>">
                                <input type="hidden" name="sdmrs" id="sdmrs" value="<?= $sdmrs ?>">
                                <input type="hidden" name="id_kecamatan" id="id_kecamatan" value="<?= $kecamatan_id ?>">
                                <input type="hidden" name="id_kelurahan" id="id_kelurahan" value="<?= $kelurahan_id ?>">
                                <input type="hidden" name="alamatktp" id="alamatktp" value="<?= $alamat ?>">
                                <input type="hidden" name="rt" id="rt" value="<?= $rt ?>">
                                <input type="hidden" name="rw" id="rw" value="<?= $rw ?>">
                                <input type="hidden" name="kodepos" id="kodepos" value="<?= $kodepos ?>">

                                <input type="hidden" name="provinsi_domisili" id="provinsi_domisili" value="<?= $nama_provinsi_domisili ?>">
                                <input type="hidden" name="kabupaten_domisili" id="kabupaten_domisili" value="<?= $nama_kab_kota_domisili ?>">
                                <input type="hidden" name="kecamatan_domisili" id="kecamatan_domisili" value="<?= $nama_kecamatan_domisili ?>">
                                <input type="hidden" name="kelurahan_domisili" id="kelurahan_domisili" value="<?= $nama_kelurahan_domisili ?>">

                                <input type="hidden" name="id_provinsi_domisili" id="id_provinsi_domisili" value="<?= $provinsi_id_domisili ?>">
                                <input type="hidden" name="id_kab_kota_domisili" id="id_kab_kota_domisili" value="<?= $kabkota_id_domisili ?>">
                                <input type="hidden" name="id_kecamatan_domisili" id="id_kecamatan_domisili" value="<?= $kecamatan_id_domisili ?>">
                                <input type="hidden" name="id_kelurahan_domisili" id="id_kelurahan_domisili" value="<?= $kelurahan_id_domisili ?>">
                                <input type="hidden" name="alamat_domisili" id="alamat_domisili" value="<?= $alamat_domisili ?>">
                                <input type="hidden" name="rt_domisili" id="rt_domisili" value="<?= $rt_domisili ?>">
                                <input type="hidden" name="rw_domisili" id="rw_domisili" value="<?= $rw_domisili ?>">
                                <input type="hidden" name="kodepos_domisili" id="kodepos_domisili" value="<?= $kodepos_domisili ?>">

        <input type="hidden" name="encryptdata" id='encryptdata' value=''>
        <input type="hidden" name="txtTanggal" id="txtTanggal" value="<?= date('Y-m-d') ?>">
        <input type="hidden" class="form-control" name="id_daftar" id="id_daftar" value="<?php echo $id_daftar; ?>">
        <input type="hidden" class="form-control" name="reg_unit" id="reg_unit" value="<?php echo $reg_unit; ?>">
        <input type="hidden" name="no_ktp" id="no_ktp" class="form-control" value="<?php echo $no_ktp; ?>">
        <input name="nomr" id="nomr" type="hidden" class="form-control" value="<?php echo $nomr; ?>">
        <input type="hidden" name="nama_pasien" id="nama_pasien" value="<?php echo $nama_pasien; ?>">
        <input type="hidden" name="tgl_daftar" id="tgl_daftar" value="<?= $tgl_daftar ?>">
        <input type="hidden" name="tempat_lahir" id="tempat_lahir" class="form-control" value="<?php echo $tempat_lahir; ?>">
        <input type="hidden" name="tgl_lahir" id="tgl_lahir" value="<?php echo $tgl_lahir; ?>">
        <input type="hidden" class="form-control" value="<?php echo ($jns_kelamin == '1' || $jns_kelamin == "L") ? 'Laki-Laki' : 'Perempuan'; ?>">
        <input type="hidden" name="jns_kelamin" id="jns_kelamin" value="<?php echo $jns_kelamin; ?>">
        <input type="hidden" name="asal_ruang" id="asal_ruang" value="<?php echo $id_ruang; ?>">
        <input type="hidden" name="nama_asal_ruang" id="nama_asal_ruang" class="form-control" value="<?php echo $nama_ruang; ?>">
        <input type="hidden" class="form-control" name="tgl_layanan" id="tgl_layanan" value="<?= date("Y-m-d") ?>">
        <input type="hidden" name="sekarang" id="sekarang" value="<?= date("Y-m-d") ?>">
        <input name="jns_layanan" id="jns_layanan" type="hidden" class="form-control" value="RI">
        <input type="hidden" name="bulan" id="bulan" value="<?= date('m') ?>">
        <input type="hidden" name="tahun" id="tahun" value="<?= date('Y') ?>">
        <fieldset>
            <legend>Penanggung Jawab Pasien</legend>
            <div class="form-group">
                <label class="col-md-4 col-sm-4 col-xs-12 control-label">Nama</label>
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <input name="pjPasienNama" id="pjPasienNama" type="text" class="form-control" value="<?php echo $pjPasienNama; ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 col-sm-4 col-xs-12 control-label">Umur</label>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <input name="pjPasienUmur" id="pjPasienUmur" type="text" class="form-control" value="<?php echo $pjPasienUmur; ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 col-sm-4 col-xs-12 control-label">Pekerjaan</label>
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <input name="pjPasienPekerjaan" id="pjPasienPekerjaan" type="text" class="form-control" value="<?php echo $pjPasienPekerjaan; ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 col-sm-4 col-xs-12 control-label">Alamat</label>
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <textarea name="pjPasienAlamat" id="pjPasienAlamat" class="form-control" rows="2" maxlength="255"><?php echo $pjPasienAlamat; ?></textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 col-sm-4 col-xs-12 control-label">Telp/HP</label>
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <input name="pjPasienTelp" id="pjPasienTelp" type="text" class="form-control" value="<?php echo $pjPasienTelp; ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 col-sm-4 col-xs-12 control-label">Hubungan Keluarga</label>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <input name="pjPasienHubKel" id="pjPasienHubKel" type="text" class="form-control" value="<?php echo $pjPasienHubKel; ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 col-sm-4 col-xs-12 control-label">Dikirim Oleh<br><em>Jika pasien rujukan</em></label>
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <input name="pjPasienDikirimOleh" id="pjPasienDikirimOleh" type="text" class="form-control" value="<?php echo $pjPasienDikirimOleh; ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 col-sm-4 col-xs-12 control-label">Alamat Pengirim<br><em>Jika pasien rujukan</em></label>
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <textarea name="pjPasienAlmtPengirim" id="pjPasienAlmtPengirim" class="form-control" rows="2" maxlength="255"><?php echo $pjPasienAlmtPengirim; ?></textarea>
                </div>
            </div>  
        </fieldset>
    </div>

    <div class="col-md-6">


        <fieldset>
            <legend>Informasi Pelayanan</legend>

            <div class="form-group">
                <label class="col-md-4 col-sm-4 col-xs-12 control-label">Cara Bayar</label>
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <div class="input-group">
                        <select class="form-control" name="id_cara_bayar" id="id_cara_bayar" onkeydown="enter_carabayar(event)">
                            <?php foreach ($getCaraBayar->result_array() as $x) : ?>
                                <option value="<?php echo $x['idx'] ?>" <?php if ($id_cara_bayar == $x['idx']) echo "selected"; ?>><?php echo $x['cara_bayar'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <input type="hidden" name="jkn" id='jkn' value='0'>
                        <input type="hidden" name="id_jenis_peserta" id='id_jenis_peserta' value=''>
                        <input type="hidden" name="jenis_peserta" id='jenis_peserta' value=''>
                    </div>
                </div>
            </div>

            <div class="form-group divRegCredit">
                <label class="col-md-4 col-sm-4 col-xs-12 control-label">No Peserta (<em>No BPJS</em>)</label>
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <div class="input-group">
                        <input type="hidden" name="status_peserta" id="status_peserta" value="">
                        <input name="no_bpjs" id="no_bpjs" type="text" class="form-control" value="<?php echo $no_bpjs; ?>" onkeydown="enter_nobpjs(event)">
                        <span class="input-group-addon">
                            <a id="btnUpdateNoBPJS" href="Javascript:updateNoBPJS()"><i class="fa fa-save"></i> Update</a>
                        </span>
                        <span class="input-group-addon" id="status">
                            <a id="cekStatus" href="Javascript:cekPeserta()"><i class="fa fa-search" id="iconCekStatus"></i> Cek</a>
                        </span>
                    </div>
                </div>
            </div>
            <div class="form-group divRegCredit">
                <label class="col-md-4 col-sm-4 col-xs-12 control-label">No SPRI</label>
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <div class="input-group ">
                        <input type="text" id="no_suratkontrol" name="no_suratkontrol" class="form-control" placeholder="Enter Nomor Surat Kontrol" onkeyup="enter_nokontrol(event)">
                        <input type="hidden" name="kd" id="kd">
                        <input type="hidden" name="nd" id="nd">
                        <div class="input-group-btn" id="btnKontrol">
                            <button type="button" id="cariKontrol" class="btn btn-default" <?php if (STATUS_VC == "0") echo "disabled"; else echo 'onclick="getListKontrol()"' ?>>
                            <i class="fa fa-search" id="iconCariKontrol"></i> Create SPRI</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 col-sm-4 col-xs-12 control-label">Dokter Pengirim</label>
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <div class="input-group">
                        <select class="form-control" name="dokter_pengirim" id="dokter_pengirim" onkeydown="enter_dokterpengirim(event)">
                            <option value="">-- Pilih --</option>
                            <?php foreach ($getDokter->result_array() as $xR) : ?>
                                <option value="<?php echo $xR['NRP'] ?>" <?php if ($dokterJaga == $xR['NRP']) echo "selected" ?>><?php echo $xR['pgwNama'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 col-sm-4 col-xs-12 control-label">Kelas Pelayanan</label>
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <div class="input-group">
                        <input type="hidden" id="hakKelasid" name="hakKelasid" value="">
                        <input type="hidden" id="hakKelas" name="hakKelas" value="">
                        <select class="form-control" name="id_kelas" id="id_kelas" onchange="getKamar()" onkeydown="enter_kelas(event)">
                            <option value="">-- Pilih --</option>
                            <?php foreach ($getKelas->result_array() as $xKl) : ?>
                                <option value="<?php echo $xKl['idx'] ?>"><?php echo $xKl['kelas_layanan'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 col-sm-4 col-xs-12 control-label">Ruang Perawatan</label>
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <div class="input-group">
                        <select class="form-control" name="id_ruang" id="id_ruang" onchange="getKamar()" onkeydown="enter_ruangan(event)">
                            <option value="">-- Pilih --</option>
                            <?php foreach ($getRuang->result_array() as $xP) : ?>
                                <option value="<?php echo $xP['idx'] ?>"><?php echo $xP['ruang'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 col-sm-4 col-xs-12 control-label">Kamar Rawatan</label>
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <div class="input-group">
                        <select class="form-control" name="id_kamar" id="id_kamar" onkeydown="enter_kamar(event)">
                            <option value="">-- Pilih --</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 col-sm-4 col-xs-12 control-label">Dokter DPJP</label>
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <div class="input-group">
                        <select class="form-control" name="dokterJaga" id="dokterJaga" onkeydown="enter_dokter(event)">
                            <option value="">-- Pilih --</option>
                            <?php foreach ($getDokterjaga->result_array() as $xR) : ?>
                                <option value="<?php echo $xR['NRP'] ?>" <?php if ($dokterJaga == $xR['NRP']) echo "selected" ?>><?php echo $xR['pgwNama'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>

            <?php
            if (STATUS_VC == "0") {
            ?>
                <div class="form-group divRegCredit">
                    <label class="col-md-4 col-sm-4 col-xs-12 control-label">No Jaminan (<em>SEP</em>)</label>
                    <div class="col-md-8 col-sm-8 col-xs-12">
                        <div class="input-group">
                            <input name="no_jaminan" id="no_jaminan" type="text" class="form-control">
                            <input name="tgl_jaminan" id="tgl_jaminan" type="hidden" class="form-control" value='<?= date('Y-m-d')?>'>
                            <span class="input-group-addon">
                                <input type="checkbox" id="chkIsJaminan" value='1' checked /> Format SEP
                            </span>
                        </div>
                    </div>
                </div>
            <?php
            } else {
            ?>
                <div class="form-group divRegCredit">
                    <label class="col-md-4 col-sm-4 col-xs-12 control-label">No Jaminan (<em>SEP</em>)</label>
                    <div class="col-md-8 col-sm-8 col-xs-12">
                        <div class="input-group ">
                            <input name="no_jaminan" id="no_jaminan" type="text" class="form-control" onkeydown="controlSEP(event)">
                            <div class="input-group-btn" id='prosessep'>
                                <a href="Javascript:formSEP()" id="btnCreateSep" class="btn btn-danger"><span class="fa fa-plus" id="iconbtnCreateSep"></span> Create SEP (<em>Bridging</em>)</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
            <div class="form-group">
                                    <label class="col-md-4 col-sm-4 col-xs-12 control-label">ICD</label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <div class="input-group">
                                            <input type="hidden" name="kodeicd" id='kodeicd' class="form-control" value='<?= $icdkode ?>'>
                                            <input type="text" name="nama_icd" id='nama_icd' class='form-control' value='<?= $icd ?>'>
                                            <span class="input-group-addon">
                                                <input type="checkbox" name="c19" id="c19" value="1"> Covid 19
                                            </span>
                                        </div>
                                    </div>
                                </div>
            <div class="form-group">
                <div class="col-sm-offset-4 col-sm-12">
                    <div class="input-group">
                        <button type="button" id="batal" class="btn btn-danger">
                            <i class="fa fa-rotate-left"></i> Batal</button>
                        <button type="button" id="daftar" class="btn btn-primary" <?php if ($ranap == 1 ||$reservasi>0) echo "disabled"; ?>>
                            Daftar <i class="fa fa-arrow-right"></i></button>
                    </div>
                </div>
            </div>
        </fieldset>
    </div>
</div>

<script src="<?php echo base_url() ?>assets/jquery/js/jquery-3.3.1.min.js"></script>
<script>
$(document).ready(function(){
    $('#dokterJaga').select2();
    $.widget("custom.caridiagnosa", $.ui.autocomplete, {
            _create: function() {
                this._super();
                this.widget().menu("option", "items", "> li:not(.ui-autocomplete-header)");
            },
            _renderMenu(ul, items) {
                var self = this;
                ul.addClass("container");

                let header = {
                    kode: "Kode ICD",
                    nama: "Diagnosa",
                    isheader: true
                };
                self._renderItemData(ul, header);
                $.each(items, function(index, item) {
                    self._renderItemData(ul, item);
                });

            },
            _renderItemData(ul, item) {
                return this._renderItem(ul, item).data("ui-autocomplete-item", item);
            },
            _renderItem(ul, item) {
                var $li = $("<li class='ui-menu-item' role='presentation'></li>");
                if (item.isheader)
                    $li = $("<li class='ui-autocomplete-header' role='presentation'  style='font-weight:bold !important; width:100%'></li>");
                var $content = "<div class='col-md-12 ui-menu-item-wrapper'>" +
                    "<div class='col-md-2'>" + item.kode + "</div>" +
                    "<div class='col-md-10'>" + item.nama + "</div>" +
                    "</div>";
                $li.html($content);


                return $li.appendTo(ul);
            }

        });
        
        $("#nama_icd").caridiagnosa({
            source: function(request, response) {

                $.ajax({
                    url: "<?= base_url() ."mr_registrasi.php/"?>"+'vclaim/referensi/diagnosa',
                    dataType: "JSON",
                    method: "GET",
                    data: {
                        param: request.term
                    },
                    success: function(data) {
                        console.clear();
                        console.log(data);
                        var diagnosa = data.response.diagnosa;
                        console.log(diagnosa);
                        response(diagnosa.slice(0, 15));
                    },
                    error: function(jqXHR, ajaxOption, errorThrown) {
                        console.log(errorThrown);
                    }
                });
            },
            minLength: 2,
            focus: function(event, ui) {
                $("#kodeicd").val(ui.item['kode']);
                $("#nama_icd").val(ui.item['nama']);
                $("#nama_icd").removeClass("ui-autocomplete-loading");
                return false;
            },
            select: function(event, ui) {
                if(ui.item['kode']=="U07.1" || ui.item['kode']=="U07.2") $('#c19').prop("checked",true);
                else $('#c19').prop('checked',false);
                $("#kodeicd").val(ui.item['kode']);
                $("#nama_icd").val(ui.item['nama']);
                $("#nama_icd").removeClass("ui-autocomplete-loading");
                return false;
            }
        });
});
</script>