<style type="text/css">
    .popup-pencarian {
        position: relative;
    }

    .content-pencarian {
        display: inherit;
        position: absolute;
        top: 0px;
        left: 0px;
        z-index: 5;
        width: 100%;
        /*min-height: 200px;*/
        /*max-height: 500px;*/
        /*min-width: 800px;*/
        /*padding:15px;*/
        background: #fefefe;
        font-size: .875em;
        border-radius: 5px;
        box-shadow: 0 1px 3px #ccc;
        border: 1px solid #ddd;
        /*overflow:hidden;*/
        /*overflow-y: scroll;*/
        background-color: #fefefe;
    }
</style>
<div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#tab_1" data-toggle="tab">Resep Obat Biasa</a></li>
        <li><a href="#tab_2" data-toggle="tab">Resep Obat Racikan</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="tab_1">
            <div id="pilihlokasi">

                <div class="row">
                    <div class="col-md-3">
                    <fieldset>
                        <legend>Pilih Lokasi Pengambilan Obat</legend>
                        <div class="row">
                            <?php
                            $icon = array('bg-red', 'bg-green', 'bg-yellow', 'bg-blue', 'bg-aqua');
                            $i = 0;
                            foreach ($getLokasi->result() as $r) {
                            ?>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <a href="#" onclick="setLokasi(<?= $r->KDLOKASI ?>,'<?= $r->NMLOKASI; ?>')" style="color: #000;">
                                        <div class="info-box">
                                            <span id='lokasi<?= $r->KDLOKASI; ?>' class="info-box-icon bg-green lokasi"><i class="fa fa-hospital-o"></i></span>

                                            <div class="info-box-content">
                                                <span class="info-box-text"><?= $r->NMLOKASI; ?></span>
                                                <span class="info-box-number">Pilih </span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php
                                $i++;
                            }
                            ?>


                        </div>
                    </fieldset>
                    </div>
                    <div class="col-md-9">
                        <fieldset id="formresep" style="display: none;">
                        <legend>Form Resep </legend>
                        <div class="row">
                            <div>
                                <div class="col-md-12">
                                    <form id="form1" role="form" onsubmit="return false">
                                        <input type="hidden" id="lokasi" name="lokasi">
                                        <input type="hidden" id="dokter" name="dokter" value="<?= $this->session->userdata('get_uid') ?>">
                                        <input type="hidden" id="namadokter" name="namadokter" value="<?= getUserLogin() ?>">
                                        <div id="warning"></div>
                                        
                                        <div id="step1" class="step">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="input-group">
                                                        <div class="input-group-btn" style="width: 50%">
                                                            <div class="input-group input-group ">
                                                                <input type="hidden" name="jmldata" id="jmldata" value="" />

                                                                <input type="text" name="keyword" id="keyword" class="form-control" placeholder="Masukkan Kode Atau Nama Obat"/>
                                                                <div class="input-group-btn">

                                                                    <button class="btn btn-danger" type="button" id="ADDBARANG1" onclick="cariBarangjual(0)">
                                                                        <i class="fa fa-search"></i></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <table class="table table-bordered table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th>Nama Obat </th>
                                                                    <th width="80px">Jumlah</th>
                                                                    <th>Aturan Pakai</th>
                                                                    <th width="120px">#</th>
                                                                </tr>
                                                            </thead>

                                                            <tbody id="getResep"></tbody>

                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="step2" class="step" style="display:none">
                                            <div class="row">
                                                <!-- Form Input Barang -->
                                                <div class="col-md-12">
                                                    <fieldset>
                                                        <legend>Data Obat</legend>
                                                        <div class="form-group">
                                                            <input type="hidden" name="idx_pendaftaran" id="idx_pendaftaran" value="<?= $idx ?>">
                                                            <div class="row">
                                                                <div class="col-xs-3 text-right"><label>Nama Obat </label></div>
                                                                <div class="col-xs-9">

                                                                    <input type="hidden" name="KDBRG" id="KDBRG" value="">
                                                                    <input type="text" readonly name="NMBRG" id="NMBRG" class="form-control" value="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-xs-3 text-right"><label>Stok </label></div>
                                                                <div class="col-xs-9">
                                                                    <div class="input-group-sm">
                                                                        <input readonly type="text" name="JSTOK" id="JSTOK" class="form-control inputmask rightAlign" data-inputmask="'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'placeholder': '0'" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-xs-3 text-right"><label>Jumlah </label></div>
                                                                <div class="col-xs-3">
                                                                    <div class="input-group-sm">
                                                                        <input type="text" name="JMLJUAL" id="JMLJUAL" class="form-control inputmask rightAlign" data-inputmask="'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'placeholder': '0'" style="text-align: right;">
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-xs-3 text-right"><label>&nbsp; </label></div>
                                                                <div class="col-xs-9">
                                                                <button class="btn btn-danger btn-sm" type='button' onclick="Step1()">Cancel</button>
                                                                    <div class="pull-right">
                                                                    <button class="btn btn-primary btn-sm"  type='button' onclick="Step3()">Next</button>
                                                                    </div>
                                                                    
                                                                </div>

                                                            </div>
                                                        </div>

                                                    </fieldset>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div id="step3" class="step" style="display:none">
                                            <div class="row">
                                                <!-- Form Aturan Pakai -->
                                                <div class="col-md-12">
                                                    <fieldset>
                                                        <legend>Aturan Pakai</legend>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-xs-3 text-right"><label>Jenis Obat <span style="color: red"> * </span></label></div>
                                                                <div class="col-xs-9">
                                                                    <select name="jenis_obat" id="jenis_obat" class="form-control" style="width: 100%">
                                                                        <option value="1">Obat Dalam</option>
                                                                        <option value="2">Obat Luar</option>
                                                                        <option value="3">Obat Injeksi</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="group_1">
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-xs-3 text-right">
                                                                        <label>Periode (... X Sehari) <span style="color: red"> * </span></label>
                                                                    </div>
                                                                    <div class="col-xs-2">
                                                                        <input type="text" name="jmlHari" id="jmlHari" class="form-control" />
                                                                    </div>
                                                                    <div class="col-xs-2">
                                                                        <input type="text" name="jmlSatuanAP" id="jmlSatuanAP" class="form-control" />
                                                                    </div>
                                                                    <div class="col-xs-4">
                                                                        <select name="satuanAP" id="satuanAP" class="form-control" style="width: 100%">
                                                                            <option value="1">Tablet</option>
                                                                            <option value="2">Bungkus</option>
                                                                            <option value="3">Sdk Obat</option>
                                                                            <option value="4">Kapsul</option>
                                                                            <option value="5">Unit</option>
                                                                            <option value="6">CC</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-xs-3 text-right">
                                                                        <label>Cara Pakai <span style="color: red"> * </span></label>
                                                                    </div>

                                                                    <div class="col-xs-9">
                                                                        <select name="cara_pakai" id="cara_pakai" class="form-control" style="width: 100%">

                                                                        </select>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-xs-3 text-right">
                                                                        <label>Waktu Pakai <span style="color: red"> * </span></label>
                                                                    </div>
                                                                    <div class="col-xs-3">
                                                                        <input type="text" name="waktu1" id="waktu1" class="form-control" />
                                                                    </div>
                                                                    <div class="col-xs-6">
                                                                        <select name="waktu3" id="waktu2" class="form-control" style="width: 100%">
                                                                            <option value="1">Sebelum Makan</option>
                                                                            <option value="2">Sesudah Makan</option>
                                                                            <option value="3">Sewaktu Makan</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-xs-3 text-right">
                                                                        <label>Keterangan Waktu Pakai <span style="color: red"> * </span></label>
                                                                    </div>
                                                                    <div class="col-xs-9">
                                                                        <select name="waktu3" id="waktu3" class="form-control" style="width: 100%">
                                                                            <option value="1">Pagi</option>
                                                                            <option value="2">Siang</option>
                                                                            <option value="3">Malam</option>
                                                                            <option value="4">Tiap 8 jam</option>
                                                                            <option value="5">Tiap 12 jam</option>
                                                                            <option value="6">Tiap 24 jam</option>
                                                                            <option value="7">Pagi - Malam</option>
                                                                            <option value="8">Pagi - Siang - Malam</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-xs-3 text-right">
                                                                        <label>Keterangan <span style="color: red"> * </span></label>
                                                                    </div>

                                                                    <div class="col-xs-9">
                                                                        <select name="keterangan" id="keterangan" class="form-control"  style="width: 100%">

                                                                        </select>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-xs-3 text-right"><label>&nbsp; </label></div>
                                                                    <div class="col-xs-9">
                                                                    <button class="btn btn-danger btn-sm" type='button' onclick="Step2()">Kembali</button>
                                                                        <div class="pull-right">
                                                                        <button class="btn btn-primary btn-sm"  type='button' onclick="Finish()">Selesai</button>
                                                                        </div>
                                                                        
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>

                                                    </fieldset>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    </div>
                </div>


            </div>

        </div>
        <!-- /.tab-pane -->
        <div class="tab-pane" id="tab_2">
            Form Obat Racikan
        </div>
    </div>
    <!-- /.tab-content -->
</div>

<script type="text/javascript">
    var base_url = "<?= base_url() . "nota_tagihan.php/"; ?>"
</script>