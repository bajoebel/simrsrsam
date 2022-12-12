<html>
<thead>
    <title>SEP</title>
    <style>
        @page {
            width: 240mm;
            height: 120mm;
            /*border: solid 1px #000;*/
            margin: 0;
        }

        * {
            margin: 0px 0px;
            font-family: sans-serif, monospace, serif;
            font-size: 11pt;
        }

        #tbl_rs {
            width: 1115px;
            height: 250px;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 15px;
            padding: 2px;
        }

        .row {
            margin-left: 0px;
            margin-right: 0px;
            display: table;
            width: 100%;
            padding-bottom: 5px;
        }

        .block-sep {
            width: 240mm;
            height: 120mm;
            /*border: solid 1px #000;*/
            padding: 15px 30px;

        }

        .images {
            height: 60px;
            width: 245px;
            float: left;
        }

        .title {
            padding: 12px;
            font-size: 11pt;
            float: left;
            width: 250px;
        }

        @media print {

            html,
            body {
                width: 240mm;
                height: 120mm;
            }

            .page {
                margin: 0;
                border: initial;
                border-radius: initial;
                width: initial;
                min-height: initial;
                box-shadow: initial;
                background: initial;
                page-break-after: always;
            }
        }

        .prb {
            float: left;
            width: 360px;
            padding: 10px;
        }

        .col1 {
            width: 10%;
            float: left;

        }

        .col2 {
            width: 20%;
            float: left;

        }

        .col3 {
            width: 30%;
            float: left;

        }

        .col4 {
            width: 40%;
            float: left;

        }

        .col5 {
            width: 50%;
            float: left;

        }

        .col6 {
            width: 60%;
            float: left;

        }

        .col55 {
            width: 55%;
            float: left;

        }

        .col45 {
            width: 45%;
            float: left;

        }

        .col7 {
            width: 70%;
            float: left;

        }

        .col8 {
            width: 80%;
            float: left;

        }

        .col9 {
            width: 90%;
            float: left;

        }

        .col10 {
            width: 100%;
            float: left;
        }

        .nb {
            font-size: 7pt;
        }

        .text-center {
            text-align: center;
        }
        .prb{
            font-size: 18pt;
            text-align: right;
        }
    </style>
</thead>
<tbody>
    <?php 
    
    // ini_set('display_errors', 0);
    // error_reporting(0); 
    // print_r($sep); exit;
    ?>
    <div class="block-sep">
        <div class="row">
            <div class="images">
                <img src="<?php echo base_url() ?>assets/images/bpjs.jpg" height="60px" border=0>
            </div>
            <div class="title">
                SURAT ELEGIBILITAS PESERTA<br>
                RSU PADANG PANJANG
            </div>
            <?php 
            if(empty($local)){
                if(!empty($response->sep->informasi->prolanisPRB)) $prb="PASIEN ".$response->sep->informasi->prolanisPRB;
                else $prb="";
            }else{
                if(!empty($response->prolanisPRB))$prb="PASIEN ".$response->prolanisPRB;
                else $prb="";
            }
            ?>
            <div class="prb"><?= $prb ?></div>
        </div>
        <div class="row" style="height:10px">&nbsp;</div>
        <?php
        // print_r($local);
        if (empty($local)) {
            //print_r($response);
            $sep = $noSep;
            $nobpjs = $peserta->noKartu;

            //$tgl= date("d/m/Y",strtotime($data['tglSep']));
            $tgllhr = date("d/m/Y", strtotime($peserta->tglLahir));
            if ($peserta->kelamin == "L") {
                $jk    = "Laki-laki";
            } else if ($peserta->kelamin == "P") {
                $jk    = "Perempuan";
            } else {
                $jk = "";
            }

            $rawat = "Rawat Jalan";
            $tuju   = $poli;
        ?>
            <div class="row">
                <div class="col55">
                    <div class="row">
                        <div class="col3">No. Sep</div>
                        <div class="col7">: <?= $response->noSep ?></div>
                    </div>
                    <div class="row">
                        <div class="col3">Tgl. Sep</div>
                        <div class="col7">: <?= $response->tglSep ?></div>
                    </div>

                    <div class="row">
                        <div class="col3">No. Kartu</div>
                        <div class="col7">: <?= $response->peserta->noKartu ?></div>
                    </div>

                    <div class="row">
                        <div class="col3">Nama Peserta</div>
                        <div class="col7">: <?= $response->peserta->nama ?></div>
                    </div>
                    <div class="row">
                        <div class="col3">Tgl. Lahir</div>
                        <div class="col7">: <?= $response->peserta->tglLahir ?></div>
                    </div>
                    <div class="row">
                        <div class="col3">No. Telpon </div>
                        <div class="col7">: <?= $rujukan->rujukan->peserta->mr->noTelepon; ?></div>
                    </div>
                    <div class="row">
                        <div class="col3">Sub/Spesialis</div>
                        <div class="col7">: <?= $response->poli ?></div>
                    </div>
                    <div class="row">
                        <div class="col3">DPJP Yang Melayani</div>
                        <div class="col7">: </div>
                    </div>
                    <div class="row">
                        <div class="col3">Faskes Perujuk</div>
                        <div class="col7">: <?= $rujukan->rujukan->provPerujuk->nama; ?></div>
                    </div>
                    <div class="row">
                        <div class="col3">Diagnosa Awal</div>
                        <div class="col7">: <?= $response->diagnosa ?></div>
                    </div>
                    <div class="row">
                        <div class="col3">Catatan</div>
                        <div class="col7">: <?= $response->catatan ?></div>
                    </div>

                </div>
                <div class="col45">
                    <div class="row">
                        <div class="col4">Peserta</div>
                        <div class="col6">: <?= $rujukan->rujukan->peserta->jenisPeserta->keterangan; ?></div>
                    </div>
                    <div class="row">
                        <div class="col4">COB</div>
                        <div class="col6">: </div>
                    </div>

                    <div class="row">
                        <div class="col4">Jns. Rawat</div>
                        <div class="col6">: <?= $response->jnsPelayanan ?></div>
                    </div>


                    <div class="row">
                        <div class="col4">Kls. Rawat</div>
                        <div class="col6">: <?= $response->kelasRawat ?> </div>
                    </div>
                    <div class="row">
                        <div class="col4">Penjamin</div>
                        <div class="col6">: <?= $sep->penjamin ?></div>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col6">
                    <div class="nb">
                        * Saya Menyetujui BPJS Kesehatan menggunakan informasi medis pasien jika diperlukan <br>
                        * SEP Bukan sebagai bukti penjaminan peserta
                    </div>
                </div>
                <div class="col4 text-center">
                    Pasien / Keluarga Pasien<br><br><br>
                    ____________________________
                </div>
            </div>
        <?php
        } else {
            // echo $response->namaDpjpLayan; exit;
            // print_r($response); exit;
        ?>
            <div class="row">
                <div class="col55">
                    <div class="row">
                        <div class="col3">No. Sep</div>
                        <div class="col7">: <?= $response->noSep ?></div>
                    </div>
                    <div class="row">
                        <div class="col3">Tgl. Sep</div>
                        <div class="col7">: <?= $response->tglSep ?></div>
                    </div>

                    <div class="row">
                        <div class="col3">No. Kartu</div>
                        <div class="col7">: <?= $response->noKartu ?></div>
                    </div>

                    <div class="row">
                        <div class="col3">Nama Peserta</div>
                        <div class="col7">: <?= $response->nama ?></div>
                    </div>
                    <div class="row">
                        <div class="col3">Tgl. Lahir</div>
                        <div class="col7">: <?= $response->tglLahir ?></div>
                    </div>
                    <div class="row">
                        <div class="col3">No. Telpon </div>
                        <div class="col7">: <?= $response->noTelp
                                            ?></div>
                    </div>
                    <div class="row">
                        <div class="col3">Sub/Spesialis</div>
                        <div class="col7">: <?= $response->poli ?></div>
                    </div>
                    <div class="row">
                        <div class="col3">DPJP Yang Melayani</div>
                        <div class="col7">: <?= $response->namaDpjpLayan ?> </div>
                    </div>
                    <div class="row">
                        <div class="col3">Faskes Perujuk</div>
                        <div class="col7">: <?= $response->namaPpkRujukan ?></div>
                    </div>
                    <div class="row">
                        <div class="col3">Diagnosa Awal</div>
                        <div class="col7">: <?= $response->diagnosa ?></div>
                    </div>
                    <div class="row">
                        <div class="col3">Catatan</div>
                        <div class="col7">: <?= $sep->catatan ?> </div>
                    </div>

                </div>
                <div class="col45">
                    <div class="row">
                        <div class="col4">Peserta</div>
                        <div class="col6">: <?= $sep->peserta->jnsPeserta ?> </div>
                    </div>
                    <div class="row">
                        <div class="col4">COB</div>
                        <div class="col6">: <?= $sep->cob ?> </div>
                    </div>

                    <div class="row">
                        <div class="col4">Jns. Rawat</div>
                        <div class="col6">: <?= $sep->jnsPelayanan ?></div>
                    </div>
                    <div class="row">
                        <div class="col4">Jns. Kunjungan</div>
                        <div class="col6">: 
                            <?php 
                            $response->jnsPelayanan 
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col4">Kls. Hak</div>
                        <div class="col6">: <?= $sep->peserta->hakKelas ?></div>
                    </div>
                    <div class="row">
                        <div class="col4">Kls. Rawat</div>
                        <div class="col6">: <?= $response->kelasRawat; ?></div>
                    </div>
                    <div class="row">
                        <div class="col4">Penjamin</div>
                        <div class="col6">: <?= $sep->penjamin; ?> </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col6">
                    <div class="nb">
                        
                        * Saya Menyetujui BPJS Kesehatan menggunakan informasi medis pasien jika diperlukan <br>
                        * SEP Bukan sebagai bukti penjaminan peserta<br><br>
                        <?php 
                        // echo $sep->kdStatusKecelakaan;
                        if($sep->kdStatusKecelakaan==1){
                            echo "* Peserta Mengalami ".$sep->nmstatusKecelakaan ." Penjaminan akan dikoordinasikan RS Dengan " .$response->penjamin ." Terlebih dahulu";
                        }
                        ?>
                    </div>
                </div>
                <div class="col4 text-center">
                    Pasien / Keluarga Pasien<br><br><br>
                    ____________________________
                </div>
            </div>
        <?php
        }
        ?>

    </div>

    <script src="<?php echo base_url() ?>assets/js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript">

    </script>
</tbody>

</html>