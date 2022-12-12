<style>
    .modal-content {max-height: 600px;}
    .rataTengah{text-align: center;}
    .rataKanan{text-align: right;}
    .f15{font-size: 15px;}
    .f20{font-size: 20px;}
    .f20{font-size: 20px;}
    .w10{width: 10px;}
    .w50{width: 50px;}
    .w60{width: 60px;}
    .w70{width: 70px;}
    .w80{width: 80px;}
    .w90{width: 90px;}
    .w100{width: 100px;}
    .w110{width: 110px;}
    .w120{width: 120px;}
    .w130{width: 130px;}
    .w140{width: 140px;}
    .w150{width: 150px;}
    .w160{width: 160px;}
    .w170{width: 170px;}
    .w180{width: 180px;}
    .w190{width: 190px;}
    .w200{width: 200px;}
    .w210{width: 210px;}
    .w220{width: 220px;}
    .w230{width: 230px;}
    .w240{width: 240px;}
    .w250{width: 250px;}
    .w300{width: 300px;}
    .w350{width: 350px;}
    .w400{width: 400px;}
    .w450{width: 450px;}
    input{border: none;}
    #convNilai{font-size: 20px}
    table#titleRekap tr td{padding: 2px}
    .vTop{vertical-align: top;}
    .vMid{vertical-align: middle;}
    div.topTitle{
        padding-left:0.2em;
        margin-top:0.2em;
        color:#777;
        font-style:italic;
        font-size:0.8em;
    }
    div.dvlabel{
        padding-left:0.2em;margin-top:0.2em;color:#777;font-style:italic;font-size:0.8em;line-height:20px;
    }
    table tr td{padding: 5px}
    table{
        border-collapse: collapse;
        width: 100%;
    }
    td.labelItem{
        width: 120px;
        text-align: right;
        padding: 10px 5px;
        border: 1px solid #c1c1c1;
    }
    tr.rowItem{
        padding: 10px 5px;
        border: 1px solid #c1c1c1;
    }
    div.divOptRajal{
        display: inline-table;
    }
    div.divOptRanap{
        display: none;
    }
    td.inputItem{
        width: 330px;
    }
    .xlnk{cursor: pointer;}
    label.xlnk{margin-right: 5px}

    tr.tarifLayanan td input{
        width: 150px;
    }
    tr.tarifLayanan{
        border-top:1px solid #c9c9c9;
        border-bottom:1px solid #c9c9c9;
    }
    tr.tarifLayanan td.lbltarif{
        text-align: right;
    }
    tr.tarifLayanan td.input{
        border-right: 1px solid #c9c9c9;
    }
    div.loading{
        display: none;
        margin: 0 15px;
        padding: 5px 15px;
        width: 100% - 30px;
        text-align: center;
        border:1px solid #e1e1e1;
    }
    .ui-autocomplete-loading {
        background: white url("<?php echo base_url() ?>ui-anim_basic_16x16.gif") right center no-repeat;
    }
    .ui-autocomplete {
        position: absolute;
        z-index: 1000;
        cursor: default;
        padding: 0;
        margin-top: 2px;
        list-style: none;
        background-color: #ffffff;
        border: 1px solid #ccc;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
        -webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
        -moz-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
    }
    .ui-autocomplete > li {
        padding: 3px 10px;
    }
    .ui-autocomplete > li.ui-state-focus {
        background-color: #3399FF;
        color:#ffffff;
    }
    .ui-helper-hidden-accessible {
        display: none;
    }
    tr.autocomplete td{border: 1px solid #f1f1f1;padding: 3px}
</style>

<section class="content-header">
    <h1><?php echo $contentTitle ?> </h1>    
</section>

<section class="content container-fluid">

    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        <a href="#" id="btnKembali" class="btn btn-danger">
                            <i class="glyphicon glyphicon-new-window"></i> Kembali</a>
                        <a href="#" id="btnRefresh" class="btn btn-success">
                            <i class="glyphicon glyphicon-refresh"></i> Refresh</a>
                    </h3>
                </div>

                <div class="loading">
                    <i class="fa fa-spin fa-refresh"></i> Silahkan tunggu... Permintaan sedang diproses!  
                </div>

                <div class="box-body table-responsive">
                
                    <div style="margin-top:0px;padding-top:0.5em;padding-bottom:0.5em;border-top:0px;box-shadow:0px 2px 3px rgba(0,0,0,0.1);">                
                        <table style="width: 100%">
                            <tr>
                                <td style="cursor:default;vertical-align:middle;">
                                    <span style="color:#555;padding:0.3em;background-color:#eee;box-shadow:0 0 0.1em rgba(0,0,0,0.1) inset;border:1px solid #ccc;border-radius:0.3em;">&nbsp;&nbsp;
                                        <span style="font-weight:bold;" id="pasien_nmr"><?php echo $data['noMr'] ?></span>&nbsp;
                                        <span style="color:#55aaee;">••</span> 
                                        <span style="font-weight:bold;" id="pasien_nama"><?php echo $data['nama_pasien'] ?></span>&nbsp;
                                        <span style="color:#55aaee;">••</span> 
                                        <span style="font-weight:normal;" id="pasien_gender"><?php echo ($data['jns_kelamin']=="1") ? "Laki-Laki" : "Perempuan" ?></span>&nbsp;
                                        <span style="color:#55aaee;">••</span> 
                                        <span style="font-weight:normal;" id="pasien_dob"><?php echo date('d-M-Y',strtotime($data['tgl_lahir'])) ?></span>&nbsp;&nbsp;&nbsp;
                                    </span>
                                </td>
                            </tr>
                        </table>
                    </div>
                    
                </div>

                <div class="box-body table-responsive">
                    <div id="divCariPasien" style="padding: 10px;border: 1px solid #c1c1c1">
                        <table>
                            <tr>
                                <td colspan="4">
<table style="margin: 0 auto">
    <tr>
        <td>
            <div class="topTitle">
                Jaminan / Cara Bayar
            </div>
            <div style="margin-top:0.3em;">
                <input type="hidden" id="payor_id" value="3">
                <input type="text" class="form-control" style="width:250px;" id="payor_cd" value="JKN">
            </div>
        </td>
        <td>
            <table>
                <tr>
                    <td style="vertical-align:top;">
                        <div id="dvlabelnopeserta" class="dvlabel">No. Peserta</div>
                        <input readonly type="text" class="form-control" style="width:150px;" id="nomor_kartu" value="<?php echo $data['no_bpjs'] ?>">
                    </td>
                    <td style="vertical-align:top;padding-left:0.5em;">
                        <div class="dvlabel">Nomor Surat Eligibilitas Peserta (SEP)</div>
                        <input readonly type="text" class="form-control" style="width:200px;" id="nomor_sep" value="<?php echo $data['no_sep'] ?>">
                    </td>
                    <td style="vertical-align:top;padding-left:0.5em;">
                        <div class="dvlabel">COB</div>
                        <select name="cob_cd" id="cob_cd" class="form-control" style="width: 320px;">
                            <option value="-" selected="selected">-</option>
                            <?php foreach ($datCOB->result_array() as $x): ?>
                            <option value="<?php echo $x['cob_cd']; ?>"><?php echo $x['cob_name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>

                                </td>
                            </tr>
                            <tr class="rowItem">
                                <td class="labelItem">Jenis Rawat</td>
                                <td class="inputItem">
                                    <label class="xlnk">
                                        <input onchange="opt_admisi_tipe(this)" type="radio" id="adm_rajal" name="admisi_tipe" value="2" checked="1">Jalan
                                    </label>

                                    <label class="xlnk">
                                        <input onchange="opt_admisi_tipe(this)" type="radio" id="adm_ranap" name="admisi_tipe" value="1">Inap
                                    </label>

                                    <div class="divOptRajal">
                                        <label class="xlnk">
                                            <input onchange="chk_class_eks(this)" type="checkbox" id="kelasEks" name="kelasEks" value="1">
                                            Kelas Eksekutif
                                        </label>
                                    </div>

                                    <div class="divOptRanap">
                                        <label class="xlnk">
                                            <input onchange="chk_nt_class(this)" type="checkbox" id="ntKelas" name="ntKelas" value="1">
                                            Naik/Turun Kelas
                                        </label>

                                        <label class="xlnk">
                                            <input onchange="chk_rawat_intensif(this)" type="checkbox" id="rawatIntensif" name="rawatIntensif" value="1">
                                            Ada Rawat Intensif
                                        </label>                                        
                                    </div>
                                </td>
                                <td class="labelItem">Kelas Hak</td>
                                <td class="inputItem">
                                    <span class="divOptRajal" id="spkelasrajal">-</span>
                                    <div class="divOptRanap">
                                        <label class="xlnk">
                                            <input type="radio" onchange="opt_class_p(this)" checked="1" id="tariff_class_3" name="tariff_class" value="3">
                                            Kelas 3
                                        </label>

                                        <label class="xlnk">
                                            <input type="radio" onchange="opt_class_p(this)" id="tariff_class_2" name="tariff_class" value="2">
                                            Kelas 2
                                        </label>

                                        <label class="xlnk">
                                            <input type="radio" onchange="opt_class_p(this)" id="tariff_class_1" name="tariff_class" value="1">
                                            Kelas 1
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="rowItem">
                                <td class="labelItem">Tanggal Rawat</td>
                                <td class="inputItem">
                                    <label class="xlnk">
                                        Masuk :
                                        <input readonly class="form-control" type="text" id="tgl_masuk" value="<?php echo $datKwitansi['tgl_masuk'] ?>" style="width: 105px;display: inline-block;" />
                                    </label>
                                    <label class="xlnk">
                                        Pulang :
                                        <input class="form-control tanggal" type="text" id="tgl_pulang" value="<?php echo $datKwitansi['tgl_keluar'] ?>" placeholder="yyyy-mm-dd" style="width: 110px;display: inline-block;" />
                                    </label>
                                </td>
                                <td class="labelItem">Umur</td>
                                <td class="inputItem">
                                    <span id="umur"><?php echo getUmurEklaim($datKwitansi['tgl_lahir'],$datKwitansi['tgl_masuk']) ?></span>
                                </td>
                            </tr>
                            <tr class="rowItem divKelasLayanan">
                                <td class="labelItem">Kelas Pelayanan</td>
                                <td class="inputItem">
                                    <label class="xlnk">
                                        <input type="radio" id="tariff_class_p_3" name="kelas_pelayanan" value="kelas_3" checked="1">
                                        Kelas 3
                                    </label>

                                    <label class="xlnk">
                                        <input type="radio" id="tariff_class_p_2" name="kelas_pelayanan" value="kelas_2">
                                        Kelas 2
                                    </label>

                                    <label class="xlnk">
                                        <input type="radio" id="tariff_class_p_1" name="kelas_pelayanan" value="kelas_1">
                                        Kelas 1
                                    </label>

                                    <label class="xlnk">
                                        <input type="radio" id="tariff_class_p_vip" name="kelas_pelayanan" value="vip">
                                        Kelas VIP
                                    </label>

                                    <label class="xlnk">
                                        <input type="radio" id="tariff_class_p_vvip" name="kelas_pelayanan" value="vvip">
                                        Kelas VVIP
                                    </label>
                                </td>
                                <td class="labelItem">Lama (hari)</td>
                                <td class="inputItem">
                                    <input type="text" name="upgrade_class_los" id="upgrade_class_los" class="form-control inputmask rataKanan" style="width: 100px" data-inputmask="'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'placeholder': '0'"/>
                                </td>
                            </tr>
                            <tr class="rowItem divRawatIntensif">
                                <td class="labelItem">Rawat Intensif (hari)</td>
                                <td class="inputItem">
                                    <input type="text" name="icu_los" id="icu_los" class="form-control inputmask rataKanan" style="width: 100px" data-inputmask="'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'placeholder': '0'"/>
                                </td>
                                <td class="labelItem">Ventilator (jam)</td>
                                <td class="inputItem">
                                    <input type="text" name="ventilator_hour" id="ventilator_hour" class="form-control inputmask rataKanan" style="width: 100px" data-inputmask="'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'placeholder': '0'"/>
                                </td>
                            </tr>
                            <tr class="rowItem">
                                <td class="labelItem">LOS (hari)</td>
                                <td class="inputItem">
                                    <input readonly type="text" name="los" id="los" value="<?php echo $datKwitansi['LOS'] ?>" class="form-control inputmask rataKanan" style="width: 100px" data-inputmask="'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'placeholder': '0'"/>
                                </td>
                                <td class="labelItem">Berat Lahir (gram)</td>
                                <td class="inputItem">
                                    <input type="text" name="birth_weight" id="birth_weight" class="form-control inputmask rataKanan" style="width: 100px" data-inputmask="'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'placeholder': '0'"/>
                                </td>
                            </tr>
                            <tr class="rowItem">
                                <td class="labelItem">ADL Score</td>
                                <td class="inputItem">
                                    <div style="width: 45%;display: inline-table;">
                                        Sub Acute :
                                        <input type="text" id="adl_sub_acute" value="-" style="display: inline-table;"/>
                                    </div>
                                    <div style="width: 45%;display: inline-table;">
                                        Chronic :
                                        <input type="text" id="adl_chronic" value="-" style="display: inline-table;"/>
                                    </div>
                                </td>
                                <td class="labelItem">Cara Pulang</td>
                                <td class="inputItem">
                                    <select name="discharge_status" id="discharge_status" style="width: 250px">
                                        <option value="1">Atas Persetujuan dokter</option>
                                        <option value="2">Dirujuk</option>
                                        <option value="3">Atas permintaan sendiri</option>
                                        <option value="4">Meninggal</option>
                                        <option value="5">Lain-lain</option>
                                    </select>
                                </td>
                            </tr>
                            <tr class="rowItem">
                                <td class="labelItem">DPJP</td>
                                <td class="inputItem">
                                    <select name="nama_dokter" id="nama_dokter" style="width: 300px">
                                        <?php foreach($datDokter->result_array() as $x): ?>
                                        <option value="<?php echo $x['NRP'] ?>"><?php echo $x['pgwNama'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>
                                <td class="labelItem">Jenis Tarif</td>
                                <td class="inputItem">
                                    <input type="hidden" id="kode_tarif" class="form-control" value="BP" />
                                    <span>TARIF RS KELAS B PEMERINTAH</span>
                                </td>
                            </tr>
                            <tr class="rowItem divTarifPoliEks">
                                <td colspan="2"></td>
                                <td class="labelItem">Tarif Poli Eks</td>
                                <td class="inputItem">
                                    <input type="text" name="tarif_poli_eks" id="tarif_poli_eks" class="form-control inputmask rataKanan" style="width: 100px" data-inputmask="'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'placeholder': '0'"/>
                                </td>
                            </tr>
                            <tr class="rowItem">
                                <td colspan="4">
                                    <table style="width: 100%">
                                        <tr>
                                            <td colspan="6" style="text-align: center">
                                                Tarif Rumah Sakit : 
                                                <?php
                                                    $dDk = $datDetailKwitansi; 
                                                    $tKw = $dDk['KT01']+$dDk['KT02']+$dDk['KT03']+$dDk['KT04']+$dDk['KT05']+$dDk['KT06']+$dDk['KT07']+$dDk['KT08']+$dDk['KT09']+$dDk['KT10']+$dDk['KT11']+$dDk['KT12']+$dDk['KT13']+$dDk['KT14']+$dDk['KT15']+$dDk['KT16']+$dDk['KT17']+$dDk['KT18']; 
                                                ?>
                                                <span class="inputmask" data-inputmask="'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'placeholder': '0'">
                                                    <?php echo $tKw; ?>
                                                </span>
                                            </td>
                                        </tr>
                                        <tr class="tarifLayanan">
                                            <td class="lbltarif">Prosedur Non Bedah</td>
                                            <td class="input">
                                                <input type="text" name="prosedur_non_bedah" id="prosedur_non_bedah" class="form-control inputmask rataKanan iTarif" data-inputmask="'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'placeholder': '0'" value="<?php echo $datDetailKwitansi['KT01']; ?>"/>
                                            </td>
                                            <td class="lbltarif">Prosedur Bedah</td>
                                            <td class="input">
                                                <input type="text" name="prosedur_bedah" id="prosedur_bedah" class="form-control inputmask rataKanan iTarif" data-inputmask="'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'placeholder': '0'" value="<?php echo $datDetailKwitansi['KT02']; ?>"/>
                                            </td>
                                            <td class="lbltarif">Konsultasi</td>
                                            <td class="input" style="border-right: 0">
                                                <input type="text" name="konsultasi" id="konsultasi" class="form-control inputmask rataKanan iTarif" data-inputmask="'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'placeholder': '0'" value="<?php echo $datDetailKwitansi['KT03']; ?>"/>
                                            </td>
                                        </tr>
                                        <tr class="tarifLayanan">
                                            <td class="lbltarif">Tenaga Ahli</td>
                                            <td class="input">
                                                <input type="text" name="tenaga_ahli" id="tenaga_ahli" class="form-control inputmask rataKanan iTarif" data-inputmask="'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'placeholder': '0'" value="<?php echo $datDetailKwitansi['KT04']; ?>"/>
                                            </td>
                                            <td class="lbltarif">Keperawatan</td>
                                            <td class="input">
                                                <input type="text" name="keperawatan" id="keperawatan" class="form-control inputmask rataKanan iTarif" data-inputmask="'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'placeholder': '0'" value="<?php echo $datDetailKwitansi['KT05']; ?>"/>
                                            </td>
                                            <td class="lbltarif">Penunjang</td>
                                            <td class="input" style="border-right: 0">
                                                <input type="text" name="penunjang" id="penunjang" class="form-control inputmask rataKanan iTarif" data-inputmask="'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'placeholder': '0'" value="<?php echo $datDetailKwitansi['KT06']; ?>"/>
                                            </td>
                                        </tr>
                                        <tr class="tarifLayanan">
                                            <td class="lbltarif">Radiologi</td>
                                            <td class="input">
                                                <input type="text" name="radiologi" id="radiologi" class="form-control inputmask rataKanan iTarif" data-inputmask="'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'placeholder': '0'" value="<?php echo $datDetailKwitansi['KT07']; ?>"/>
                                            </td>
                                            <td class="lbltarif">Laboratorium</td>
                                            <td class="input">
                                                <input type="text" name="laboratorium" id="laboratorium" class="form-control inputmask rataKanan iTarif" data-inputmask="'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'placeholder': '0'" value="<?php echo $datDetailKwitansi['KT08']; ?>"/>
                                            </td>
                                            <td class="lbltarif">Pelayanan Darah</td>
                                            <td class="input" style="border-right: 0">
                                                <input type="text" name="pelayanan_darah" id="pelayanan_darah" class="form-control inputmask rataKanan iTarif" data-inputmask="'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'placeholder': '0'" value="<?php echo $datDetailKwitansi['KT09']; ?>"/>
                                            </td>
                                        </tr>
                                        <tr class="tarifLayanan">
                                            <td class="lbltarif">Rehabilitasi</td>
                                            <td class="input">
                                                <input type="text" name="rehabilitasi" id="rehabilitasi" class="form-control inputmask rataKanan iTarif" data-inputmask="'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'placeholder': '0'" value="<?php echo $datDetailKwitansi['KT10']; ?>"/>
                                            </td>
                                            <td class="lbltarif">Kamar / Akomodasi</td>
                                            <td class="input">
                                                <input type="text" name="kamar" id="kamar" class="form-control inputmask rataKanan iTarif" data-inputmask="'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'placeholder': '0'" value="<?php echo $datDetailKwitansi['KT11']; ?>"/>
                                            </td>
                                            <td class="lbltarif">Rawat Intensif</td>
                                            <td class="input" style="border-right: 0">
                                                <input type="text" name="rawat_intensif" id="rawat_intensif" class="form-control inputmask rataKanan iTarif" data-inputmask="'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'placeholder': '0'" value="<?php echo $datDetailKwitansi['KT12']; ?>"/>
                                            </td>
                                        </tr>

                                        <tr class="tarifLayanan">
                                            <td class="lbltarif">Obat</td>
                                            <td class="input">
                                                <input type="text" name="obat" id="obat" class="form-control inputmask rataKanan iTarif" data-inputmask="'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'placeholder': '0'" value="<?php echo $datDetailKwitansi['KT13']; ?>"/>
                                            </td>
                                            <td class="lbltarif">Obat Kronis</td>
                                            <td class="input">
                                                <input type="text" name="obat_kronis" id="obat_kronis" class="form-control inputmask rataKanan iTarif" data-inputmask="'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'placeholder': '0'" value="<?php echo $datDetailKwitansi['KT14']; ?>"/>
                                            </td>
                                            <td class="lbltarif">Obat Kemoterapi</td>
                                            <td class="input" style="border-right: 0">
                                                <input type="text" name="obat_kemoterapi" id="obat_kemoterapi" class="form-control inputmask rataKanan iTarif" data-inputmask="'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'placeholder': '0'" value="<?php echo $datDetailKwitansi['KT15']; ?>"/>
                                            </td>
                                        </tr>
                                        <tr class="tarifLayanan">
                                            <td class="lbltarif">Alkes</td>
                                            <td class="input">
                                                <input type="text" name="alkes" id="alkes" class="form-control inputmask rataKanan iTarif" data-inputmask="'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'placeholder': '0'" value="<?php echo $datDetailKwitansi['KT16']; ?>"/>
                                            </td>
                                            <td class="lbltarif">BMHP</td>
                                            <td class="input">
                                                <input type="text" name="bmhp" id="bmhp" class="form-control inputmask rataKanan iTarif" data-inputmask="'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'placeholder': '0'" value="<?php echo $datDetailKwitansi['KT17']; ?>"/>
                                            </td>
                                            <td class="lbltarif">Sewa Alat</td>
                                            <td class="input" style="border-right: 0">
                                                <input type="text" name="sewa_alat" id="sewa_alat" class="form-control inputmask rataKanan iTarif" data-inputmask="'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'placeholder': '0'" value="<?php echo $datDetailKwitansi['KT18']; ?>"/>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr class="rowItem">
                                <td style="width: 50%;" colspan="2">Diagnosa (ICD-10):</td>
                                <td style="width: 50%;text-align: right;" colspan="2">
                                    <input type="text" name="scDiagnosa" id="scDiagnosa" class="form-control"/>
                                </td>
                            </tr>
                            <tr class="rowItem">
                                <td colspan="4" id="rowDiagnosa">
                                </td>
                            </tr>
                            <tr class="rowItem">
                                <td style="width: 50%;" colspan="2">Prosedur (ICD-9-CM):</td>
                                <td style="width: 50%;text-align: right;" colspan="2">
                                    <input type="text" name="scProsedur" id="scProsedur" class="form-control"/>
                                </td>
                            </tr>
                            <tr class="rowItem">
                                <td colspan="4" id="rowProcedure"></td>
                            </tr>
                            <tr class="rowItem">
                                <td style="width: 50%;" colspan="2">
                                    <button onclick="hapusKlaim()" type="button" class="btn btn-danger">Hapus Klaim</button>
                                </td>
                                <td style="width: 50%;text-align: right;" colspan="2">
                                    <button onclick="simpanKlaim()" type="button" class="btn btn-info">Simpan</button>
                                    <button onclick="grouperKlaim()" type="button" class="btn btn-success">Grouper</button>
                                </td>
                            </tr>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>  
</section>
        
<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/input-mask/jquery.inputmask.extensions.js"></script>

<script type="text/javascript">
$(document).ready(function () { 
    setDefaultObj();
    var indexNoSEP = "<?php echo $data['no_sep'] ?>";
    getItemICD(indexNoSEP);
    getItemProcedure(indexNoSEP);
    $('input.iTarif').attr('readonly','readonly');
    $(".inputmask").inputmask();
    $('input').focus(function(){
        return this.select();
    });
    $('.tanggal').inputmask('yyyy-mm-dd', { 'placeholder': 'yyyy-mm-dd' });
    $('.tanggal').datepicker({
        autoclose : true,
        format    : "yyyy-mm-dd"
    });
    $('#tgl_masuk, #tgl_keluar').on('change textInput input', function () {
        if ( ($("#tgl_masuk").val() != "") && ($("#tgl_keluar").val() != "")) {
            var oneDay = 24*60*60*1000; // hours*minutes*seconds*milliseconds
            var firstDate = new Date(dateEng($("#tgl_masuk").val()));
            var secondDate = new Date(dateEng($("#tgl_keluar").val()));
            var diffDays = Math.round(Math.round((secondDate.getTime() - firstDate.getTime()) / (oneDay)));
            if (diffDays < 0) {
                $("#los").val('');
                $("#tgl_keluar").val('');
                alert('Tanggal keluar tidak boleh lebih rendah dari tanggal masuk');
            }else{
                $("#los").html(diffDays+1);
            }
        }
    });
    $('select').select2({placeholder:'Pilih Option'});
    $('#btnKembali').click(function(){
        var url = '<?php echo base_url().'mr_dokumen.php/eklaim' ?>';
        window.location.href = url;    
    });
    $('#btnRefresh').click(function(){
        window.location.reload();    
    });
    $("#scDiagnosa").autocomplete({
        source: function( request, response ) {
            $.ajax( {
                url     : "<?php echo base_url().'api.php/eklaim/main/getICD' ?>",
                dataType: "JSON",
                data    : {term: request.term},
                success : function( data ) {
                    response(data.slice(0, 15));
                },
                error       : function(jqXHR,ajaxOption,errorThrown){
                    console.log(errorThrown);
                }
            });
        },
        minLength: 2,
        focus: function(event,ui) {
            $("#scDiagnosa").removeClass("ui-autocomplete-loading");
            return false;
        },
        select: function(event,ui) {
            var nomor_sep =  $('#nomor_sep').val();
            var icd_cd =  ui.item['label'];
            var icd_desc =  ui.item['value'];
            simpanICD(nomor_sep,icd_cd,icd_desc);
            $("#scDiagnosa").removeClass("ui-autocomplete-loading");
            getItemICD(indexNoSEP);            
            return false;
        }
    })
    .autocomplete("instance")._renderItem = function(table,item) {
      return $("<tr class='autocomplete'>")
        .append("<td style='width:100px'>" + item['label'] + "</td><td style='width:300px'>" + item['value'] + "</td>")
        .appendTo(table);
    };

    $("#scProsedur").autocomplete({
        source: function( request, response ) {
            $.ajax( {
                url     : "<?php echo base_url().'api.php/eklaim/main/getProcedure' ?>",
                dataType: "JSON",
                data    : {term: request.term},
                success : function( data ) {
                    response(data.slice(0, 15));
                },
                error       : function(jqXHR,ajaxOption,errorThrown){
                    console.log(errorThrown);
                }
            });
        },
        minLength: 2,
        focus: function(event,ui) {
            $("#scProsedur").removeClass("ui-autocomplete-loading");
            return false;
        },
        select: function(event,ui) {
            var nomor_sep =  $('#nomor_sep').val();
            var proc_cd =  ui.item['label'];
            var proc_desc =  ui.item['value'];
            simpanProcedure(nomor_sep,proc_cd,proc_desc);
            $("#scProsedur").removeClass("ui-autocomplete-loading");
            getItemProcedure(indexNoSEP);            
            return false;
        }
    })
    .autocomplete("instance")._renderItem = function(table,item) {
      return $("<tr class='autocomplete'>")
        .append("<td style='width:100px'>" + item['label'] + "</td><td style='width:300px'>" + item['value'] + "</td>")
        .appendTo(table);
    };
});

function simpanICD(a,b,c){
    var formdata={}
        formdata['no_sep'] = a;
        formdata['icd_cd'] = b;
        formdata['icd_desc'] = c;
     $.ajax({
        url         : "<?php echo base_url().'mr_dokumen.php/eklaim/simpanICD' ?>",
        type        : "POST",
        data        : formdata,
        dataType    : "JSON",
        beforeSend  : function(){
            $('div.loading').html('<i class="fa fa-spin fa-refresh"></i> Set data ICD ');
            $('div.loading').show('slow');
        },
        success     : function(data){
            $('div.loading').hide('slow');
            if (data.code==200) {
                getItemICD(a);
            }else{                
                alert(data.message);       
            }
        },
        error       : function(jqXHR,ajaxOption,errorThrown){
            $('div.loading').html('<i class="fa fa-spin fa-refresh"></i> Set data ICD gagal');       
            $('div.loading').hide('slow');
            console.log(jqXHR.responseText);    
        }
    });
}
function simpanProcedure(a,b,c){
    var formdata={}
        formdata['no_sep'] = a;
        formdata['proc_cd'] = b;
        formdata['proc_desc'] = c;
     $.ajax({
        url         : "<?php echo base_url().'mr_dokumen.php/eklaim/simpanProcedure' ?>",
        type        : "POST",
        data        : formdata,
        dataType    : "JSON",
        beforeSend  : function(){
            $('div.loading').html('<i class="fa fa-spin fa-refresh"></i> Set data procedure');
            $('div.loading').show('slow');
        },
        success     : function(data){
            $('div.loading').hide('slow');
            if (data.code==200) {
                getItemProcedure(a);
            }else{                
                alert(data.message);       
            }
        },
        error       : function(jqXHR,ajaxOption,errorThrown){
            $('div.loading').html('<i class="fa fa-spin fa-refresh"></i> Set data procedure gagal');       
            $('div.loading').hide('slow');
            console.log(jqXHR.responseText);    
        }
    });
}

function setDefaultObj(){
    $('input#adm_rajal').prop('checked',true);
    $('input#kelasEks').prop('checked',false);
    $('tr.divTarifPoliEks').css('display','none');
    $('tr.divKelasLayanan').css('display','none');
    $('tr.divRawatIntensif').css('display','none');
}
function opt_admisi_tipe(a){
    $('input#kelasEks').prop('checked',false);
    $('input[name=ntKelas]').prop('checked',false);
    $('input[name=rawatIntensif]').prop('checked',false);

    $('tr.divTarifPoliEks').css('display','none');
    $('tr.divKelasLayanan').css('display','none');
    $('tr.divRawatIntensif').css('display','none');
    if(a.value=='2'){
        $('.divOptRajal').css('display','inline-table');
        $('.divOptRanap').css('display','none');
    }else{
        $('.divOptRajal').css('display','none');
        $('.divOptRanap').css('display','inline-table');
    }
}
function opt_class_p(a){
    $('input[name=kelas_pelayanan').attr('disabled','disabled');
    if(a.value=='3'){
        $('input#tariff_class_p_2').removeAttr('disabled');
        $('input#tariff_class_p_2').prop('checked',true);
    }else if(a.value=='2'){
        $('input#tariff_class_p_1').removeAttr('disabled');
        $('input#tariff_class_p_1').prop('checked',true);
    }else if(a.value=='1'){
        $('input#tariff_class_p_vip').removeAttr('disabled');
        $('input#tariff_class_p_vvip').removeAttr('disabled');
        $('input#tariff_class_p_vip').prop('checked',true);
    }
}

function chk_class_eks(a){
    var b = $('input[name=admisi_tipe]');
    if(a.checked && b.val()=='2'){
        $('tr.divTarifPoliEks').css('display','');
    }else{
        $('tr.divTarifPoliEks').css('display','none');
    }
}
function chk_nt_class(a){
    var b = $('input[name=ntKelas]');
    var c = $('input[name=tariff_class]:checked');
    if(a.checked){
        $('input[name=kelas_pelayanan').attr('disabled','disabled');
        if (c.val()==3) {
            $('input#tariff_class_p_2').removeAttr('disabled');
            $('input#tariff_class_p_2').prop('checked',true);
        }else if(c.val()==2){
            $('input#tariff_class_p_1').removeAttr('disabled');
            $('input#tariff_class_p_1').prop('checked',true);
        }else if(c.val()==1){
            $('input#tariff_class_p_vip').removeAttr('disabled');
            $('input#tariff_class_p_vvip').removeAttr('disabled');
            $('input#tariff_class_p_vip').prop('checked',true);
        }
        $('tr.divKelasLayanan').css('display','');
    }else{
        $('tr.divKelasLayanan').css('display','none');
    }
}
function chk_rawat_intensif(a){
    // var b = $('input[name=rawatIntensif]');
    if(a.checked){
        $('tr.divRawatIntensif').css('display','');
    }else{
        $('tr.divRawatIntensif').css('display','none');
    }
}

function simpanKlaim(){
    var formdata = {}
        formdata['nomor_sep'] = $('#nomor_sep').val();
        formdata['nomor_kartu'] = $('#nomor_kartu').val();
        formdata['tgl_masuk'] = $('#tgl_masuk').val();
        formdata['tgl_pulang'] = $('#tgl_pulang').val();
        formdata['jenis_rawat'] = $('input[name=admisi_tipe]:checked').val();
        if ($('input[name=admisi_tipe]:checked').val()=='2') {
            var kelas_rawat = '-';
        }else{
            var kelas_rawat = $('input[name=tariff_class]:checked').val();
        }
        formdata['kelas_rawat'] = kelas_rawat;
        formdata['adl_sub_acute'] = $('#adl_sub_acute').val();
        formdata['adl_chronic'] = $('#adl_chronic').val();
        
        var rawatIntensif = $('input[name=rawatIntensif]:checked');        
        if (rawatIntensif) {
            var icu_indikator = '0';
            var icu_los = '0';
            var ventilator_hour = '0';
        }else{
            var icu_indikator = '1';
            var icu_los = $('#icu_los').val();
            var ventilator_hour = $('#ventilator_hour').val();
        }
        formdata['icu_indikator'] = icu_indikator;
        formdata['icu_los'] = icu_los;
        formdata['ventilator_hour'] = ventilator_hour;

        var ntKelas = $('input[name=ntKelas]:checked');        
        if (ntKelas) {
            var upgrade_class_ind = '0';
            var upgrade_class_class = '-';
            var upgrade_class_los = '0';
            var add_payment_pct = '0';
        }else{
            var upgrade_class_ind = 1;
            var upgrade_class_class = $('input[name=kelas_pelayanan]:checked').val();
            var upgrade_class_los = $('#upgrade_class_los').val();
            if (upgrade_class_class=='vip' || upgrade_class_class=='vvip') {
                var add_payment_pct = '75';
            }else{
                var add_payment_pct = '0';
            }
        }
        formdata['upgrade_class_ind'] = upgrade_class_ind;
        formdata['upgrade_class_class'] = upgrade_class_class;
        formdata['upgrade_class_los'] = upgrade_class_los;
        formdata['add_payment_pct'] = add_payment_pct;

        formdata['birth_weight'] = $('#birth_weight').val();
        formdata['discharge_status'] = $('#discharge_status').val();
        formdata['diagnosa'] = '#';
        formdata['procedure'] = '#';
        formdata['prosedur_non_bedah'] = $('#prosedur_non_bedah').val();
        formdata['prosedur_bedah'] = $('#prosedur_bedah').val();
        formdata['konsultasi'] = $('#konsultasi').val();
        formdata['tenaga_ahli'] = $('#tenaga_ahli').val();
        formdata['keperawatan'] = $('#keperawatan').val();
        formdata['penunjang'] = $('#penunjang').val();
        formdata['radiologi'] = $('#radiologi').val();
        formdata['laboratorium'] = $('#laboratorium').val();
        formdata['pelayanan_darah'] = $('#pelayanan_darah').val();
        formdata['rehabilitasi'] = $('#rehabilitasi').val();
        formdata['kamar'] = $('#kamar').val();
        formdata['rawat_intensif'] = $('#rawat_intensif').val();
        formdata['obat'] = $('#obat').val();
        formdata['obat_kronis'] = $('#obat_kronis').val();
        formdata['obat_kemoterapi'] = $('#obat_kemoterapi').val();
        formdata['alkes'] = $('#alkes').val();
        formdata['bmhp'] = $('#bmhp').val();
        formdata['sewa_alat'] = $('#sewa_alat').val();
        formdata['tarif_poli_eks'] = $('#tarif_poli_eks').val();
        formdata['nama_dokter'] = $('#nama_dokter :selected').html();
        formdata['payor_id'] = $('#payor_id').val();
        formdata['payor_cd'] = $('#payor_cd').val();
        formdata['cob_cd'] = $('#cob_cd').val();
        // alert($.param(formdata));
    $.ajax({
        url         : "<?php echo base_url().'mr_dokumen.php/eklaim/set_claim_data' ?>",
        type        : "POST",
        data        : formdata,
        dataType    : "JSON",
        beforeSend  : function(){
            $('.btn').addClass('disabled');
            $('div.loading').html('<i class="fa fa-spin fa-refresh"></i> Set claim data pada Server E-Klaim ');
            $('div.loading').show('slow');
        },
        success     : function(data){
            alert(data.metadata.message);       
            $('.btn').removeClass('disabled');
            $('div.loading').hide('slow');
        },
        error       : function(jqXHR,ajaxOption,errorThrown){
            $('.btn').removeClass('disabled');
            $('div.loading').html('<i class="fa fa-spin fa-refresh"></i> Set data klaim gagal');       
            $('div.loading').hide('slow');
            console.log(jqXHR.responseText);    
        }
    });
}
function getItemICD(a){
     $.ajax({
        url         : "<?php echo base_url().'mr_dokumen.php/eklaim/getItemICD' ?>",
        type        : "POST",
        data        : {no_sep:a},
        beforeSend  : function(){
            $('#rowDiagnosa').html('<i class="fa fa-spin fa-refresh"></i> Get ICD Item');
        },
        success     : function(data){
            $('#rowDiagnosa').html(data);
        },
        error       : function(jqXHR,ajaxOption,errorThrown){
            $('#rowDiagnosa').html('ICD Item not found');
            console.log(jqXHR.responseText);    
        }
    });
}
function icd10delete(a,b){
     $.ajax({
        url         : "<?php echo base_url().'mr_dokumen.php/eklaim/deleteItemICD' ?>",
        type        : "POST",
        data        : {idx:a},
        beforeSend  : function(){
            $('#rowDiagnosa').html('<i class="fa fa-spin fa-refresh"></i> Delete ICD Item');
        },
        success     : function(data){
            $('#rowDiagnosa').html(data);
        },
        error       : function(jqXHR,ajaxOption,errorThrown){
            $('#rowDiagnosa').html('ICD Item not found');
            console.log(jqXHR.responseText);    
        }
    });
}

function getItemProcedure (a){
     $.ajax({
        url         : "<?php echo base_url().'mr_dokumen.php/eklaim/getItemProcedure' ?>",
        type        : "POST",
        data        : {no_sep:a},
        beforeSend  : function(){
            $('#rowProcedure').html('<i class="fa fa-spin fa-refresh"></i> Get Procedure Item');
        },
        success     : function(data){
            $('#rowProcedure').html(data);
        },
        error       : function(jqXHR,ajaxOption,errorThrown){
            $('#rowProcedure').html('Procedure Item not found');
            console.log(jqXHR.responseText);    
        }
    });
}
function procedureDelete(a,b){
     $.ajax({
        url         : "<?php echo base_url().'mr_dokumen.php/eklaim/deleteItemProcedure' ?>",
        type        : "POST",
        data        : {idx:a},
        beforeSend  : function(){
            $('#rowProcedure').html('<i class="fa fa-spin fa-refresh"></i> Delete Procedure Item');
        },
        success     : function(data){
            $('#rowProcedure').html(data);
        },
        error       : function(jqXHR,ajaxOption,errorThrown){
            $('#rowProcedure').html('Procedure Item not found');
            console.log(jqXHR.responseText);    
        }
    });
}


function hapusKlaim(){
    var formdata = {}
        formdata['noSep'] = "<?php echo $data['no_sep'] ?>";

    $.ajax({
        url         : "<?php echo base_url().'mr_dokumen.php/eklaim/delete_claim' ?>",
        type        : "POST",
        data        : formdata,
        dataType    : "JSON",
        beforeSend  : function(){
            $('.btn').addClass('disabled');
            $('div.loading').html('<i class="fa fa-spin fa-refresh"></i> Hapus data Klaim pada Server E-Klaim ');
            $('div.loading').show('slow');
        },
        success     : function(data){
            if (data.metadata.code==200) {
                clearDiagnosa();
                clearProcedure();
                alert('Data Klaim telah dihapus');       
                var url = '<?php echo base_url().'mr_dokumen.php/eklaim' ?>';
                window.location.href = url;    
            }else{
                alert(data.metadata.message);       
                $('.btn').removeClass('disabled');
                $('div.loading').hide('slow');
            }
        },
        error       : function(jqXHR,ajaxOption,errorThrown){
            $('.btn').removeClass('disabled');
            $('div.loading').html('<i class="fa fa-spin fa-refresh"></i> Hapus data klaim gagal');       
            $('div.loading').hide('slow');
            console.log(jqXHR.responseText);    
        }
    });
}
function grouperKlaim(){
    var formdata = {}
        formdata['noSep'] = "<?php echo $data['no_sep'] ?>";

    $.ajax({
        url         : "<?php echo base_url().'mr_dokumen.php/eklaim/grouper' ?>",
        type        : "POST",
        data        : formdata,
        dataType    : "JSON",
        beforeSend  : function(){
            $('.btn').addClass('disabled');
            $('div.loading').html('<i class="fa fa-spin fa-refresh"></i> Grouper data Klaim pada Server E-Klaim ');
            $('div.loading').show('slow');
        },
        success     : function(data){
            if (data.metadata.code==200) {
                clearDiagnosa();
                clearProcedure();
                alert('Grouper data Klaim sukses');       
                var url = '<?php echo base_url().'mr_dokumen.php/eklaim' ?>';
                window.location.href = url;    
            }else{
                alert(data.metadata.message);       
                $('.btn').removeClass('disabled');
                $('div.loading').hide('slow');
            }
        },
        error       : function(jqXHR,ajaxOption,errorThrown){
            $('.btn').removeClass('disabled');
            $('div.loading').html('<i class="fa fa-spin fa-refresh"></i> Grouper data klaim gagal');       
            $('div.loading').hide('slow');
            console.log(jqXHR.responseText);    
        }
    });
}


function clearDiagnosa(){
    var formdata = {}
        formdata['noSEP'] = "<?php echo $data['no_sep'] ?>";

    $.ajax({
        url         : "<?php echo base_url().'mr_dokumen.php/eklaim/clearDiagnosa' ?>",
        type        : "POST",
        data        : formdata,
        success     : function(data){
            console.log(data);
        },
        error       : function(jqXHR,ajaxOption,errorThrown){
            console.log(jqXHR.responseText);    
        }
    });
}
function clearProcedure(){
    var formdata = {}
        formdata['noSEP'] = "<?php echo $data['no_sep'] ?>";

    $.ajax({
        url         : "<?php echo base_url().'mr_dokumen.php/eklaim/clearProcedure' ?>",
        type        : "POST",
        data        : formdata,
        success     : function(data){
            console.log(data);
        },
        error       : function(jqXHR,ajaxOption,errorThrown){
            console.log(jqXHR.responseText);    
        }
    });
}
</script>
