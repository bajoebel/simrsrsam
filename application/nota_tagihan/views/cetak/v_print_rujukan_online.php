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
            font-size: 12pt;
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
            font-size: 14pt;
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
            padding-bottom:8px;
        }

        .col2 {
            width: 20%;
            float: left;
            padding-bottom:8px;
        }

        .col3 {
            width: 30%;
            float: left;
            padding-bottom:8px;
        }

        .col4 {
            width: 40%;
            float: left;
            padding-bottom:8px;
        }

        .col5 {
            width: 50%;
            float: left;
            padding-bottom:8px;
        }

        .col6 {
            width: 60%;
            float: left;
            padding-bottom:8px;
        }

        .col55 {
            width: 60%;
            float: left;
            padding-bottom:8px;
        }

        .col45 {
            width: 40%;
            float: left;
            padding-bottom:8px;
        }

        .col7 {
            width: 70%;
            float: left;
            padding-bottom:8px;
        }

        .col8 {
            width: 80%;
            float: left;
            padding-bottom:8px;
        }

        .col9 {
            width: 90%;
            float: left;
            padding-bottom:8px;
        }

        .col10 {
            width: 100%;
            float: left;
            padding-bottom:8px;
        }

        .nb {
            font-size: 9pt;
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
    error_reporting(1); 
    // print_r($sep); exit;
    ?>
    <div class="block-sep">
        <div class="row">
            <div class="col55">
                <div class="images">
                    <img src="<?php echo base_url() ?>assets/images/bpjs.jpg" height="60px" border=0>
                </div>
                <div class="title">
                    SURAT RUJUKAN<br>
                    RSUD DR ACHMAD MOCHTAR BUKITTINGGI
                </div>
            </div>
            <div class="col45">
                <div style="font-size:14pt;font-weight:bold">No. <?= $rujukan->noRujukan?></div> 
                <div style="font-size:12pt;padding-top:5px;font-weight:bold">Tgl. <?= longDate($rujukan->tglRujukan) ?></div>
            </div>


        </div>
        <div class="row" style="height:10px">&nbsp;</div>
        <div class="row">
            <?php if(!empty($rujukan)) { ?>
                <div class="col55">
                    <div class="row">
                        <div class="col3">Kepada Yth :</div>
                        <div class="col7">: <?= $rujukan->namapoliTujuan ."<br>&nbsp;&nbsp;" .$rujukan->namatujuanRujukan ?></div>
                    </div>
                    <div class="row">
                    <div class="col10"><p>Mohon Pemeriksaan Dan Penanganan Lebih Lanjut<br></p></div>
                    </div>
                    
                    <div class="row">
                        <div class="col3">No. Kartu</div>
                        <div class="col7">: <?= $rujukan->noKartu ?></div>
                    </div>

                    <div class="row">
                        <div class="col3">Nama Peserta</div>
                        <div class="col7">: <?= $rujukan->nama ?></div>
                    </div>
                    <div class="row">
                        <div class="col3">Tgl. Lahir</div>
                        <div class="col7">: <?= $rujukan->tglLahir ?></div>
                    </div>
                    <div class="row">
                        <div class="col3">Diagnosa </div>
                        <div class="col7">: <?= $rujukan->diagnosanama
                                            ?></div>
                    </div>
                    <div class="row">
                        <div class="col3">Keterangan</div>
                        <div class="col7">: <?= $rujukan->catatan ?> </div>
                    </div>

                </div>
                <div class="col45">
                    <div class="row">
                        <div class="col10"> 
                        <?php 
                            $tipe=array('Penuh','Partial','Rujuk Balik (PRB)');
                            echo "== ".$tipe[$rujukan->tipeRujukan]." =="
                        ?> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col10">
                        <?php 
                            $lay=array('','Rawat Inap','Rawat Jalan');
                            echo $lay[$rujukan->jnsPelayanan]
                        ?>    
                        </div>
                    </div>
                </div>
            <?php } ?>
            </div>
            <div class="row">
                <div class="col6">
                    <div class="nb">
                        * Rujukan Berlaku Sampai Dengan <?= longDate($rujukan->tglBerlakuKunjungan) ?> <br>
                        * Tgl.Rencana Berkunjung <?= longDate($rujukan->tglRencanaKunjungan) ?>
                    </div>
                </div>
                <div class="col4 text-center">
                    Mengetahui<br><br><br>
                    ____________________________
                </div>
            </div>

    </div>

    <script src="<?php echo base_url() ?>assets/js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript">

    </script>
</tbody>

</html>