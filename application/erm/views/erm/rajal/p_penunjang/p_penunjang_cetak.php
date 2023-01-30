<?php 
    $tanggal = new DateTime($p->tgl_lahir);

    // tanggal hari ini
    $today = new DateTime('today');
    
    // tahun
    $year = $today->diff($tanggal)->y;
    
    // bulan
    $month = $today->diff($tanggal)->m;
    
    // hari
    $day = $today->diff($tanggal)->d;
    $umur =  $year . " tahun " . $month . " bulan " . $day . " hari"; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Permintaan</title>
    <style type="text/css">
        body{
            margin:0;
        }
        .konten{
            width:210mm;
            height:279mm;
            padding-left: 15mm;
            padding-right: 15mm;
            /*border:1px #000 solid;
            border-collapse:collapse;*/
        }
        
        .header{
            border-bottom:2px #000 doble;
            border-collapse:collapse;
            border-bottom-style:double;
            padding:10px;
        }
        .left{
            float:left;
        }
        .right{
            text-align:center;
        }
        .images{
            width:100px;
        }
        .header1{
            font-size:18pt;
            font-weight:bold;
        }
        .header2{
            font-size:22pt;
            font-weight:bold;
        }
        .border{
            width:100%;
            border:1px #000 solid;
            border-collapse:collapse;
        }

        .judul{
            font-size:18pt;
            font-weight:bold;
            text-align:center;
            padding:30px 0px 30px 0px;
        }
        .isi{
            text-align:justify;
        }
        .f12{
            font-size : 12px;
        }
        .table {
            width : 100%;
            border-collapse : collapse;
        }
        .table td,.table th {
            border :1px solid black;
            padding : 5px;
        }
    </style>
</head>
<body>
    <div class="konten">
        <div class="header">
           
            <div class="right">
            <div class='header2'>RSUD. Dr. ACHMAD MOCHTAR BUKITTINGGI</div>
            <div class='header3'>Jl.Dr. A. Rivai Bukittinggi - 26114<br>
                Tlp. (0752) 21720-21492-21831-21322<br>
                Fax. (0752) 21321<br></div>
            </div>
        </div>
        <div class="border"></div>
        <div class="judul"><u>Formulir Pemeriksaan <?= $s->group_name ?></u></div>
        <div class="isi">
            <table style="width:100%">
                <tr>
                    <td>Nama</td>
                    <td style="width:35%">: <?=$p->nama?></td>
                    <td>No Registrasi</td>
                    <td style="width:35%">: <?= $d->reg_unit ?></td>
                </tr>

                <tr>
                    <td>Usia</td>
                    <td>: <?= $umur?></td>
                    <td>Tanggal Registrasi</td>
                    <td>: <?= $d->tgl_masuk ?><td>
                </tr>

                <tr>
                    <td>Jenis Kelamin</td>
                    <td>: <?= jns_kelamin($p->jns_kelamin) ?></td>
                    <td>Dokter Pengirim</td>
                    <td>: <?= $s->dpjp_name ?></td>
                </tr>

                
                <tr>
                    <td>Alamat</td>
                    <td colspan=3>: <?= $p->alamat ?></td>
                </tr>

                <tr>
                    <td colspan="4" style="text-align:center"><h3><b>List Permintaan</b></h3> </td>
                </tr>
            </table>
            <table style="width:100%;" class="table">
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Name</th>
                        <th>Group</th>
                    </tr>
                <?php $nr=1; foreach($sd as $r) {?>
                    <tr>
                        <td><?= $nr++ ?></td>
                        <td><?= $r->tlId ?></td>
                        <td><?= $r->tlTitle ?></td>
                        <td><?= group_lab($r->group) ?></td>
                    </tr>    
                <?php } ?>              
            </table>
            <table style="width:100%">
                <tr>
                    <td width="70%"></td>
                    <td style="text-align:left">
                    <p>Dokter Pengirim, <?= dateToIndo($s->created_at) ?></p>
                    <br><br><br>
                    <p>(<?= $s->dpjp_name ?>)</p>                        </td>
                </tr>
            </table>
        </div>
    </div>
    
</body>
</html>