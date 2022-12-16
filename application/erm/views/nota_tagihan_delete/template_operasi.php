<div class="box box-success">
    <div class="box-header">
        Jadwal operasi
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-md-12" id='tabel_operasi' >
                <button class="btn btn-success btn-sm" onclick="addOperasi()">Tambah</button>
                <table class="table table-bordered">
                    <thead class='bg-green'>
                        <tr>
                            <td>No</td>
                            <td>Kode Boking</td>
                            <td>Jadwal Operasi</td>
                            <td>Jenis Tindakan</td>
                            <td>Kelas Layanan</td>
                            <td>Anestisi</td>
                            <td>Layanan</td>
                            <td>Diagnosa</td>
                            <td>Cito</td>
                            <td>Terlaksana</td>
                            <td>#</td>
                        </tr>
                    </thead>
                    <tbody id="data_jadwaloperasi">
                        <!--tr><td>1</td><td>OP-202003-0001</td><td>2020-03-14 19:00:00</td><td>Penyakit Dalam</td><td>II</td><td>Anestesi Umum / Regional</td><td>KECIL (Kasus Cito) Anestesi Umum  / Regional</td><td>TEST</td><td>Kasus Cito</td><td><button class='btn btn-danger btn-xs'>Belum Terlaksana</button></td></tr></table><tr><td>2</td><td>OP-202003-0002</td><td>2020-03-14 09:00:00</td><td>Penyakit Dalam</td><td>II</td><td>Anestesi Umum / Regional</td><td>KECIL (Kasus Cito) Anestesi Umum  / Regional</td><td>Test Juga</td><td>Kasus Cito</td><td><button class='btn btn-danger btn-xs'>Belum Terlaksana</button></td></-->
                    </tbody>
                </table>
            </div>
            <div id="form_operasi" style="display: none;">
                <div class="col-xs-4">
                    <form id="formJadwalOperasi" role="form" onsubmit="return false">
                        <div class="box-body">
                            <div class="col-md-12">
                                <fieldset>
                                    <legend>Input Jadwal Operasi</legend>
                                    <input type="hidden" name="op_idx" id="op_idx" value="">
                                    <input type="hidden" name="op_kodebooking" id="op_kodebooking" value="">
                                    <input type="hidden" name="op_id_daftar" id="op_id_daftar" value="<?= $detail->id_daftar ?>">
                                    <input type="hidden" name="op_reg_unit" id="op_reg_unit" value="<?= $detail->reg_unit; ?>">
                                    <input type="hidden" name="op_nomr" id="op_nomr" value="<?= $detail->nomr; ?>">
                                    <input type="hidden" name="op_nama_pasien" id="op_nama_pasien" value="<?= $detail->nama_pasien; ?>">
                                    <input type="hidden" name="op_tempat_lahir" id="op_tempat_lahir" value="<?= $detail->tempat_lahir; ?>">
                                    <input type="hidden" name="op_tgl_lahir" id="op_tgl_lahir" value="<?= $detail->tgl_lahir; ?>">
                                    <input type="hidden" name="op_ruang_pengirim" id="op_ruang_pengirim" value="<?= $detail->id_ruang; ?>">
                                    <input type="hidden" name="op_jns_kelamin" id="op_jns_kelamin" value="<?= $detail->jns_kelamin; ?>">
                                    <input type="hidden" name="op_nopeserta" id="op_nopeserta" value="<?= $detail->no_bpjs; ?>">
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label style="width: 100%">Tanggal</label>
                                                <input type="text" name="tanggaloperasi" id="tanggaloperasi" class="form-control tanggal " onchange="getJadwalOperasi()">
                                            </div> 
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label style="width: 100%">Jam(<i>Jam:Menit</i>)</label>
                                                <input type="text" name="jamoperasi" id="jamoperasi" class="form-control ">
                                            </div> 
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label style="width: 100%">Poliklinik Pengirim</label>
                                        <select name="op_polipengirim" id="op_polipengirim" class="form-control" onchange="getPoli()" style="width: 100%">
                                            
                                            <?php 
                                            foreach ($poliklinik as $p) {
                                                ?>
                                                <option value="<?= $p->id_ruang ?>"><?= $p->nama_ruang; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                        <input type="hidden" name="op_namapolipengirim" id="op_namapolipengirim" value="">
                                        <input type="hidden" name="op_kodepoli" id="op_kodepoli" value="">
                                        <input type="hidden" name="op_namapoli" id="op_namapoli" value="">
                                    </div> 
                                    <div class="form-group">
                                        <label style="width: 100%">Dokter</label>
                                        <select name="op_dokterid" id="op_dokterid" class="form-control" style="width: 100%">
                                            <?php 
                                            foreach ($getDokter->result() as $k) {
                                                ?>
                                                <option value="<?= $k->NRP ?>" ><?= $k->pgwNama; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                        <input type="hidden" name="op_kelaslayanan" id="op_kelaslayanan" value="">
                                    </div>
                                    <div class="form-group">
                                        <label style="width: 100%">Kelas Layanan</label>
                                        <select name="op_kelasid" id="op_kelasid" class="form-control" onchange="getLayananOperasi(); getKelas()" style="width: 100%">
                                            
                                            <?php 
                                            foreach ($getKelas->result() as $k) {
                                                ?>
                                                <option value="<?= $k->idx ?>" <?php if($detail->id_kelas==$k->idx) echo "selected" ?>><?= $k->kelas_layanan; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                        <input type="hidden" name="op_kelaslayanan" id="op_kelaslayanan" value="">
                                    </div> 
                                    <div class="form-group">
                                        <label style="width: 100%">Diagnosa</label>
                                        <textarea class="form-control" name="op_diagnosa" id="op_diagnosa" maxlength="255"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label style="width: 100%">Jenis Tindakan </label>
                                        <select name="op_idjenistindakan" id="op_idjenistindakan" class="form-control" style="width: 100%" >
                                           <option value="">Pilih jenis tindakan</option>
                                           <?php 
                                           foreach ($getJenisPelayanan->result() as $j) {
                                               ?>
                                               <option value="<?= $j->idx ?>"><?= $j->jenis_pelayanan ?></option>
                                               <?php
                                           }
                                           ?>
                                        </select>
                                        <input type="hidden" name="op_jenistindakan" id="op_jenistindakan" value="">
                                    </div>
                                    <div class="form-group">
                                        <input type="checkbox" name="cito" id="cito" value="1" onclick="getLayananOperasi()"> <b>Cito</b>
                                        <input type="checkbox" name="anestesi" id="anestesi" value="1" onclick="getLayananOperasi()"> <b>Anestesi Umum / Regional</b>
                                    </div>
                                    <div class="form-group">
                                        <label style="width: 100%">Layanan</label>
                                        <select name="op_layanan" id="op_layanan" class="form-control" style="width: 100%" >
                                           <option value="">Pilih Layanan</option>
                                           
                                        </select>
                                    </div>
                                    
                                </fieldset>                    
                            </div>                           
                        </div>
                    </form> 
                    <div class="box-footer text-right">
                        
                        <button class="btn btn-danger" onclick="tutupFormOperasi()">Batal</button>
                        <button class="btn btn-success" onclick="simpanJadwalOperasi()" >Simpan</button>
                    </div>
                </div>
                <div class="col-xs-8">
                    <div class="box-body">
                        <div class="col-md-12">
                            <fieldset>
                                <legend>List Jadwal Operasi Per tanggal</legend>
                                <table class="table table-bordered">
                                    <thead class="bg-green">
                                        <tr>
                                            <td>No</td>
                                            <td>Kode Boking</td>
                                            <td>Nomr</td>
                                            <td>Nama Pasien</td>
                                            <td>Jenis Tindakan</td>
                                            <td>Jam</td>
                                            <td>Terlaksana</td>

                                        </tr>
                                    </thead>
                                    <tbody id="list-jadwal"></tbody>
                                </table>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var base_url = "<?= base_url() ."nota_tagihan.php/" ?>";
</script> 
<script src="<?php echo base_url() ?>js/nota_tagihan.js"></script>
<script type="text/javascript">
    showJadwal("<?= $detail->id_daftar ?>",'id_daftar');
    getLayananOperasi();
    getPoli();
</script>

