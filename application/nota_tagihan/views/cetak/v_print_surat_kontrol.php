<html>
<thead>
    <title>Surat Kontrol</title>
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
            padding-bottom: 10px;
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

        

        .col55 {
            width: 55%;
            float: left;

        }

        .col35 {
            width: 35%;
            float: left;

        }

        .col6 {
            width: 60%;
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
    error_reporting(1); 
    // print_r($sep); exit;
    if(empty($sep->noSep)){
        $row=$this->vclaim_model->getSuratKontrol($noSuratKontrol);

        $noKartu=$row->noKartu;
        $nama=$row->nama;
        $tglLahir=$row->tglLahir;
        $diagnosa="-";

    }else{
        $noKartu=$sep->peserta->noKartu;
        $nama=$sep->peserta->nama;
        $tglLahir=$sep->peserta->tglLahir;
        $diagnosa=$sep->diagnosa;
    }
    ?>
    <div class="block-sep">
        <div class="row">
            <div class="images">
                <img src="<?php echo base_url() ?>assets/images/bpjs.jpg" height="60px" border=0>
            </div>
            <div class="title">
                <?php if($namaJnsKontrol=="Kontrol") echo "SURAT RENCANA KONTROL"; else echo "SURAT PERINTAH RAWAT INAP" ?><br>
                RSUD DR ACHMAD MOCHTAR BUKITTINGGI
            </div>
            
            <div class="prb">No. <?= $noSuratKontrol ?></div>
        </div>
        <div class="row" style="height:10px">&nbsp;</div>
        <div class="row">
                <div class="col10">
                    <div class="row">
                        <div class="col2">Kepada Yth</div>
                        <div class="col5">: <?= $namaDokter ."<br>&nbsp;&nbsp;" .$namaPoliTujuan ?></div>
                    </div>
                    <div class="row">
                        <div class="col10">Mohon Pemeriksaan dan Penanganan lebih lanjut</div>
                    </div>

                    <div class="row">
                        <div class="col2">No. Kartu</div>
                        <div class="col5">: <?= $noKartu ?></div>
                    </div>

                    <div class="row">
                        <div class="col2">Nama Peserta</div>
                        <div class="col5">: <?= $nama ?> </div>
                    </div>
                    <div class="row">
                        <div class="col2">Tgl. Lahir</div>
                        <div class="col5">: <?= longDate($tglLahir) ?></div>
                    </div>
                    <div class="row">
                        <div class="col2">Diagnosa </div>
                        <div class="col5">: <?= $diagnosa ?></div>
                    </div>
                    <div class="row">
                        <div class="col2">Rencana Kontrol</div>
                        <div class="col5">: <?= longDate($tglRencanaKontrol) ?></div>
                    </div>
                    <div class="row">
                        <div class="col10">Demikian atasa bantuannya, diucapkan terima kasih</div>
                    </div>
                    
                </div>
                
            </div>
            <div class="row">
                <div class="col7">
                    <div class="nb">
                        Tgl Entri <?= $tglTerbit ?> | Tgl Cetak <?= date('Y-m-d H:i:s') ?>
                    </div>
                </div>
                <div class="col3 text-center">
                    Mengetahui DPJP<br><br><br><br>
                    <?= $namaDokter ?>
                </div>
            </div>

    </div>

    <script src="<?php echo base_url() ?>assets/js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript">

    </script>
</tbody>

</html>