<div class="gc" id="buatgeneralconcent">
                                    <div class="col-md-12">
                                        <form class="form-horizontal" id="generalconcent" style="font-size:12px">
                                            <fieldset>
                                                <legend>Profile Pasien</legend>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-3" for="email">Nomr:</label>
                                                    <div class="col-sm-9">
                                                        <input type="hidden" name="reload" id="reload" value="0">
                                                        <input type="hidden" name="gc_idx" id="gc_idx" value="<?= $idx ?>">
                                                        <input type="hidden" name="gc_id" id="gc_id" value="">
                                                        <input type="text" name="gc_nomr" id="gc_nomr" class="form-control" value="<?= $nomr ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-3" for="email">Nama Lengkap:</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="gc_nama_lengkap" id="gc_nama_lengkap" class="form-control" value="<?= $nama_pasien ?>" readonly>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label class="control-label col-sm-3" for="email">Tempat/Tanggal Lahir:</label>
                                                    <div class="col-sm-5">
                                                        <input type="text" name="gc_tempat_lahir" id="gc_tempat_lahir" class="form-control" value="<?= $tempat_lahir ?>" readonly>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <input type="hidden" name="gc_tgl_lahir" id="gc_tgl_lahir" value="<?= $tgl_lahir ?>" >
                                                        <input type="text" name="gc_priview_tgl_lahir" id="gc_priview_tgl_lahir" class="form-control datepicker" value="<?= longDate($tgl_lahir) ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-3" for="email">Jenis Kelamin:</label>
                                                    <div class="col-sm-9">
                                                    <input type="hidden" name="gc_jns_kelamin" id="gc_jns_kelamin" value="<?= $jns_kelamin ?>" >
                                                        <input type="text" name="gc_priview_jns_kelamin" id="gc_priview_jns_kelamin" class="form-control" value="<?= $jns_kelamin==1 ? "Laki-Laki" : ($jns_kelamin==2 ? "Perempuan" : ($jns_kelamin==3 ? "Tidak Datap Ditentukan" : "Tidak Mengisi")) ?>"  readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-3" for="email">ALamat:</label>
                                                    <div class="col-sm-9">
                                                        <textarea name="gc_alamatpasien" id="gc_alamatpasien" cols="5" rows="2" class="form-control" readonly><?= $alamat ." RT. " .$rt ." RW. ".$rw ." Kel. " .$nama_kelurahan ." Kec. " .$nama_kecamatan ." Kab / Kota ".$nama_kab_kota ." Prov " .$nama_provinsi ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-3" for="email">No Telp / HP:</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="gc_no_telpon" id="gc_no_telpon" class="form-control" value="<?= getField('no_telpon',array('nomr'=>$nomr),'tbl01_pasien') ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-3" for="email">&nbsp;</label>
                                                    <div class="col-sm-9">
                                                        <input type="checkbox" name="customttd" id="customttd" value="1" onclick="setTTD()"> General Consent Ditandatangani Keluarga / Orang Tua/ Wali /Lainnya
                                                    </div>
                                                </div>
                                                <div class="customttd" style="display:none;">
                                                    <legend>Profile Penanda Tangan General Consent</legend>
                                                    <div class="form-group">
                                                        <label class="control-label col-sm-3" for="email">Nama:</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="gc_namattd" id="gc_namattd" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-sm-3" for="email">Tempat / Tanggal Lahir:</label>
                                                        <div class="col-sm-5">
                                                            <input type="text" name="gc_tempat_lahirttd" id="gc_tempat_lahirttd" class="form-control" value="">
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <input type="text" name="gc_tgl_lahirttd" id="gc_tgl_lahirttd" class="form-control datepicker">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-sm-3" for="email">Jenis Kelamin:</label>
                                                        <div class="col-sm-9">
                                                            <select name="gc_jnskelaminttd" id="gc_jnskelaminttd" class="form-control">
                                                                <option value="1">Laki-Laki</option>
                                                                <option value="2">Perempuan</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-sm-3" for="email">Alamat:</label>
                                                        <div class="col-sm-9">
                                                            <textarea name="gc_alamatttd" id="gc_alamatttd" cols="30" rows="2" class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-sm-3" for="email">Hubungan Keluarga:</label>
                                                        <div class="col-sm-4">
                                                            <select name="sebagai" id="sebagai" class="form-control" style="width:100%;" onchange="cekHubungan()">
                                                                <option value="wali">Wali</option>
                                                                <option value="orang tua">Orang Tua</option>
                                                                <option value="keluarga">Keluarga</option>
                                                                <option value="lainnya">Lainnya</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-5 lain" style="display:none;">
                                                            <input type="text" name="selakulainnya" id="selakulainnya" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <legend>Keinginan Privasi</legend>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-3" for="email">&nbsp;</label>
                                                    <div class="col-sm-9">
                                                        <input type="checkbox" name="gc_izinaksesbesuk" id="gc_izinaksesbesuk" value="1" checked> Pasien Mengizinkan Rumah Sakit Memberi Akses bagi : keluarga serta orang yang  akan menengok / menemuinya
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-3" for="email">Privasi Khusus</label>
                                                    <div class="col-sm-9 fieldAdd">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" name="privasi[]" id="privasi" placeholder="Masukkan Privasi Yang Diinginkan">
                                                            <span class="input-group-btn">
                                                                <button class="btn btn-success" type="button" onclick="addmore(1)"><i class="fa fa-plus"></i></button>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <legend>Persetujuan Pelepasan Informasi</legend>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-3" for="email">&nbsp;</label>
                                                    <div class="col-sm-9">
                                                        <input type="checkbox" name="gc_izinpemberianinformasidiagnosis" id="gc_izinpemberianinformasidiagnosis" value="1" checked> Pasien Memberi wewenang kepada RSUD dr. Achmad Mochtar untuk memberikan informasi tentang diagnosis, hasil pelayanan dab pengobatan saya kepada
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-3" for="email">Informasi Terbatas Pada</label>
                                                    <div class="col-sm-9 fieldAdd2">
                                                        <div class="input-group">
                                                            <span class="input-group-addon"> <input type="checkbox" aria-label="Checkbox for following text input" value="1" name="terbatas" > </span>
                                                            <input type="text" class="form-control" id="terbatas_list" name="terbatas_list[]" placeholder="Masukkan Nama">
                                                            <span class="input-group-btn">
                                                                <button class="btn btn-success" type="button" onclick="addmore(2)"><i class="fa fa-plus"></i></button>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-3" for="email">&nbsp;</label>
                                                    <div class="col-sm-5">
                                                        <button class="btn btn-primary btn-sm" type="button" id="btnSimpanGC" onclick="confirmasiPenyipananGC()"><span class="fa fa-save" id="iconSimpanGC"></span> Simpan Data General Concent</button>
                                                    </div>
                                                    <div class="col-sm-4 text-right" id="cetakgc" style="display:none;">
                                                        <a href="<?= base_url() ."mr_registrasi.php/registrasi/persetujuan_umum/".$idx?>" class="btn btn-warning btn-sm" target="_blank"><span class="fa fa-print"></span> Cetak Persetujuan Umum</a>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            
                                        </form>
                                    </div>
                                </div>