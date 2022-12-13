<style>
    .tab-content{
        border: 1px solid #ddd;
        border-collapse:collapse;
        padding: 10px;
        background: #fff;
    }
    .error-message{
        color:#dd4b39;
    }
</style>
    <div class="" style="background:#fff">
        <ul class="nav nav-pills">
            <li class="active"><a data-toggle="tab" href="#home">List Permintaan Penunjang</a></li>
            <?php 
            if($getRuang->num_rows() > 0){
                $ruang=$getRuang->result();
                foreach ($ruang as $r) {
                    ?>
                    <li><a data-toggle="tab" href="#menu<?= $r->idx ?>" ><?= ucwords(strtolower($r->ruang))?></a></li>
                    <?php
                }
            }
            ?>
        </ul>
        <div class="tab-content">
            <div id="home" class="tab-pane fade in active">
                    <div class="row">
                        <div class="col-md-12" id='tabel_operasi' >
                            <!-- <button class="btn btn-success btn-sm" onclick="permintaanPenunjang()">Tambah</button> -->
                            <table class="table table-bordered">
                                <thead class='bg-green'>
                                    <tr>
                                        <td>No</td>
                                        <td>Ruang Penunjang</td>
                                        <td>Nama Dokter Pengirim</td>
                                        <td>Diagnosa</td>
                                        <td>Keterangan</td>
                                        <td>#</td>
                                    </tr>
                                </thead>
                                <tbody id="data_permintaan_penunjang">
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
            </div>
            <?php 
            if($getRuang->num_rows() > 0){
                $ruang=$getRuang->result();
                foreach ($ruang as $r) {
                    ?>
                    <div id="menu<?= $r->idx ?>" class="tab-pane fade">
                        <div class="callout callout-warning">Form Permintaan Penunjang <?= ucwords(strtolower($r->ruang))?></div>
                        <div class="row">
                            <div class="col-md-12">
                            <form class="form-horizontal" id="form<?= $r->idx ?>" action="#">
                                <img src="<?= base_url() ."assets/images/ANATOMI.jpg" ?>" id="img" alt="" style="display:none;">
                                <input type="hidden" name="pp_id_daftar<?= $r->idx ?>" id="pp_id_daftar<?= $r->idx ?>" value="<?= $detail->id_daftar ?>">
                                <input type="hidden" name="pp_reg_unit<?= $r->idx ?>" id="pp_reg_unit<?= $r->idx ?>" value="<?= $detail->reg_unit ?>">
                                <input type="hidden" name="pp_nomr<?= $r->idx ?>" id="pp_nomr<?= $r->idx ?>" value="<?= $detail->nomr ?>">
                                <input type="hidden" name="pp_nama<?= $r->idx ?>" id="pp_nama<?= $r->idx ?>" value="<?= $detail->nama_pasien?>">
                                <input type="hidden" name="pp_ruang_pengirim<?= $r->idx ?>" id="pp_ruang_pengirim<?= $r->idx ?>" value="<?= $detail->id_ruang ?>">
                                <input type="hidden" name="pp_nama_ruang_pengirim<?= $r->idx ?>" id="pp_nama_ruang_pengirim<?= $r->idx ?>" value="<?= $detail->nama_ruang?>">
                                <input type="hidden" name="id_penunjang<?= $r->idx ?>" id="id_penunjang<?= $r->idx ?>" value="<?= $r->idx ?>">
                                <input type="hidden" name="nama_penunjang<?= $r->idx ?>" id="nama_penunjang<?= $r->idx ?>" value="<?= $r->ruang ?>">
                                <fieldset>
                                    <legend>Informasi Klinis</legend>
                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="email">Dokter Pengirim:</label>
                                        <div class="col-sm-10">
                                            <select name="dokter_pengirim<?= $r->idx ?>" id="dokter_pengirim<?= $r->idx ?>" class="form-control" style="width: 100%">
                                            <?php foreach ($getDokter->result_array() as $xDR) : ?>
                                                <option value="<?php echo $xDR['NRP']; ?>"><?php echo $xDR['pgwNama']; ?></option>
                                            <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="pwd">Diagnosa Klinik:</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" name="diagnosa<?= $r->idx ?>" id="diagnosa<?= $r->idx ?>" maxlength="255" height='50'></textarea>
                                            <span class="error-message" id="errdiagnosa<?= $r->idx ?>"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="pwd">Keterangan:</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" name="keterangan<?= $r->idx ?>" id="keterangan<?= $r->idx ?>" maxlength="255" height='50'></textarea>
                                            <span class="error-message" id="errketerangan<?= $r->idx ?>"></span>
                                        </div>
                                    </div>
                                    <?php if($r->idx==51) {?>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="pwd">Asal Jaringan:</label>
                                            <div class="col-sm-10">
                                                <input type="text" id='asal_jaringan<?= $r->idx ?>' name='asal_jaringan<?= $r->idx ?>' class='form-control'>    
                                                <span class="error-message" id="errasal_jaringan<?= $r->idx ?>"></span>    
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="pwd">Bahan Fiksasi:</label>
                                            <div class="col-sm-10">
                                                <select class='form-control' name='bahan_fiksasi<?= $r->idx ?>' id='bahan_fiksasi<?= $r->idx ?>' style='width:100%'>
                                                    <option value="Formalin 10%">Formalin 10%</option>
                                                    <option value="Formalin buffer">Formalin Buffer</option>
                                                    <option value="Alkohol 96%">Alkohol 96%</option>
                                                    <option value="Alkohol 50%">Alkohol 50%</option>
                                                    <option value="Lain-Lain">Lain Lain</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="pwd">Lokasi Jaringan:</label>
                                            <div class="col-sm-10">
                                                <div id="signature-pad<?= $r->idx ?>">
                                                    <div style="border:solid 1px teal; width:360px;height:410px;padding:3px;position:relative;">
                                                        <div id="note<?= $r->idx ?>" onmouseover="my_function(<?= $r->idx ?>);"></div>
                                                        <canvas id="anatomi<?= $r->idx ?>" class="anatomi" width="350px" height="400px"></canvas>
                                                        
                                                    </div>
                                                    <div style="padding:5px 0px">
                                                        
                                                        <div class="btn-group">
                                                        <button type="button" id="save_btn" class="btn btn-primary btn-sm" data-action="save-png"><span class="glyphicon glyphicon-ok"></span> Set Lokasi</button>
                                                        <button type="button" id="clear_btn" class="btn btn-danger btn-sm" data-action="clear" onclick="canvas(<?= $r->idx ?>)" style="display:none;"><span class="glyphicon glyphicon-remove"></span> Clear</button>
                                                        <button class="btn btn-default btn-sm" type="button" onclick="canvas(<?= $r->idx ?>)"><span class="glyphicon glyphicon-refresh"></span>Reset</button>
                                                        </div>
                                                    </div>
                                                    <div id="gambaranatomi"></div>
                                                </div>
                                                <input type="hidden" id='lokasi_jaringan<?= $r->idx ?>' name='lokasi_jaringan<?= $r->idx ?>' class='form-control'>
                                                <span class="error-message" id="errlokasi_jaringan<?= $r->idx ?>"></span>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <legend>Jenis Pemeriksaan</legend>
                                    <div class="err_jenispemeriksaan<?= $r->idx ?>"></div>
                                    <ul class="nav nav-pills">
                                    <?php 
                                    $jenis=$this->nota_model->getJenisPemeriksaan($r->idx);
                                    // print_r($jenis);
                                    $no=0;
                                    foreach ($jenis as $j ) {
                                        if($no==0) echo '<li class="active"><a data-toggle="tab" href="#jenis'.$j->idx.'">'.$j->jenis_pemeriksaan.'</a></li>';
                                        else echo '<li class=""><a data-toggle="tab" href="#jenis'.$j->idx.'">'.$j->jenis_pemeriksaan.'</a></li>';
                                        $no++;
                                    }
                                    ?>
                                    </ul> 

                                    <div class="tab-content">
                                        

                                    <?php 
                                    
                                    $no=0;
                                    foreach ($jenis as $j ) {
                                        $variable=$this->nota_model->getListPemeriksaan($j->idx);
                                        $subpemeriksaan=$this->nota_model->getSubPemeriksaan($j->idx);
                                        if($no==0) $active="active"; else $active="";
                                        ?>
                                            <div id="jenis<?= $j->idx ?>" class="tab-pane fade in <?= $active ?>">
                                                <div class="form-group">
                                                    <label class="control-label col-sm-2" for="pwd">&nbsp;</label>
                                                    <div class="col-sm-10">
                                                    <input type="checkbox" name="id_jenis_pemeriksaan<?= $r->idx?>[]" id="id_jenis_pemeriksaan<?= $j->idx ?>" value="<?= $j->idx ?>" onclick="enabledForm(<?= $j->idx ?>)"> Buat Permintaan <?= $j->jenis_pemeriksaan ?>
                                                    <input type="hidden" name="jenis_pemeriksaan<?= $j->idx?>" id="jenis_pemeriksaan<?= $j->idx ?>" value="<?= $j->jenis_pemeriksaan ?>" >
                                                    </div>
                                                </div>
                                                <div id="subjenispemeriksaan<?= $j->idx ?>">
                                                <?php 
                                                if(!empty($subpemeriksaan)){
                                                    ?>
                                                    <div class="form-group">
                                                        <label class="control-label col-sm-2" for="pwd">Sub Jenis Pemeriksaan:</label>
                                                        <div class="col-sm-10">
                                                        <select class="form-control kontrol<?= $j->idx ?>" name="idsubjenispemeriksaan<?= $j->idx?>" id="idsubjenispemeriksaan<?= $j->idx?>" style="width:100%" onchange="subJenisPemeriksaan(<?= $j->idx ?>)" disabled>
                                                            <?php 
                                                            foreach ($subpemeriksaan as $s ) {
                                                                ?>
                                                                <option value="<?= $s->idx ?>"><?= $s->sub_jenispemeriksaan ?></option>
                                                                <?php
                                                            }
                                                            ?>
                                                        </select>
                                                        </div>
                                                    </div>
                                                    <?php
                                                }else{
                                                    ?>
                                                    <input type="hidden" name="idsubjenispemeriksaan<?= $j->idx?>" id="idsubjenispemeriksaan<?= $j->idx?>" value="">
                                                    <?php
                                                }
                                                ?>
                                                </div>
                                                <input type="hidden" id="template<?= $j->idx ?>" name='template<?= $j->idx ?>' value='<?= $j->template ?>'>
                                                <?php if($j->template=="DahakTB"){
                                                    ?>
                                                    <div class="form-group">
                                                        <label class="control-label col-sm-2" for="pwd">Alasan Pemeriksaan:</label>
                                                        <div class="col-sm-10">
                                                            <input type="radio" class="kontrol<?= $j->idx ?>" value='Diagnosa' name='alasanpemeriksaan<?= $j->idx ?>' id='diagnosa<?= $j->idx ?>' disabled> Diagnosa
                                                            <input type="radio" class="kontrol<?= $j->idx ?>" value='Follow Up Pengobatan' name='alasanpemeriksaan<?= $j->idx ?>' id='fup<?= $j->idx ?>' disabled> Follow Up Pengobatan
                                                            <br><span class="error-message" id="err_alasanpemeriksaan<?= $r->idx ?>"></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-sm-2" for="pwd">Bulan Ke:</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" id='bulanke<?= $j->idx ?>' name='bulanke<?= $j->idx ?>' class='form-control kontrol<?= $j->idx ?>' disabled >    
                                                            <span class="error-message" id="err_bulanke<?= $r->idx ?>"></span>    
                                                        </div>
                                                    </div>
                                                    <?php
                                                } 
                                                if($j->template=="Patologi"){
                                                    ?>
                                                    <div class="form-group" id="Kuretasi<?= $j->idx ?>" style="display:none;">
                                                        <label class="control-label col-sm-2" for="pwd">Haid Terakhir:</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" id='haid_terakhir<?= $j->idx ?>' name='haid_terakhir<?= $j->idx ?>' class='form-control kontrol<?= $j->idx ?>' disabled>
                                                            <span class="error-message" id="err_haid_terakhir<?= $r->idx ?>"></span>
                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                                ?>
                                                <input type="hidden" name="semua_variabel<?= $j->idx ?>" id="semua_variabel<?= $j->idx?>" value="<?= $j->semua_variabel ?>">
                                                <?php if($j->semua_variabel==0){ ?>
                                                    <div class="error-message err_variable_pemeriksaan" id="err_variable_pemeriksaan<?= $r->idx ?>"></div>
                                                    <div class="form-group">
                                                        <label class="control-label col-sm-2" for="pwd">Variable Pemeriksaan:</label>
                                                        <div class="col-sm-10">
                                                            <div class='allow-scroll1'>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                    <input type="checkbox" class="kontrol<?= $j->idx ?>" name="cekall<?= $j->idx ?>" id="cekall<?= $j->idx ?>" onclick="centangSemua(<?= $j->idx ?>)" disabled> Pilih Semua
                                                                    </div>
                                                                    <hr>
                                                                <?php 
                                                                $jmldata=count($variable);
                                                                if($jmldata>3) $ukuran='col-md-4'; else $ukuran="col-md-12";
                                                                foreach ($variable as $v ) {
                                                                    ?>
                                                                    <div class="<?= $ukuran ?>">
                                                                        <input type="checkbox" value="<?= $v->id_pemeriksaan?>" class="id_pemeriksaan<?= $j->idx ?> kontrol<?= $j->idx ?>" name="id_pemeriksaan<?= $j->idx ?>[]" id="id_pemeriksaan<?= $v->id_pemeriksaan?>" disabled> <?= $v->nama_pemeriksaan ?>
                                                                        <input type="hidden" name="nama_pemeriksaan<?= $v->id_pemeriksaan?>" id="nama_pemeriksaan<?= $v->id_pemeriksaan?>" value="<?= $v->nama_pemeriksaan?>">        
                                                                    </div>
                                                                    <?php
                                                                }
                                                                ?>
                                                                </div>
                                                            </div>    
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                            <?php
                                        $no++;
                                    }
                                    ?>
                                    </div>
                                    
                                </fieldset>
                                
                                <hr>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                    <button type="button" class="btn btn-primary" id="btn_buatpermintaan" onclick="buatPermintaan(<?= $r->idx ?>)"><span id="icon_buatpermintaan" class="fa fa-save"></span> Submit</button>
                                    </div>
                                </div>
                            </form> 

                            
                            </div>
                            
                        </div>        
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div>

<script type="text/javascript">
    var base_url = "<?= base_url() ."nota_tagihan.php/" ?>";
</script>
<script src="<?php echo base_url() ?>js/nota_tagihan.js"></script>
<script type="text/javascript">
    getPermintaanPenunjang('<?= $detail->reg_unit  ?>');
</script>