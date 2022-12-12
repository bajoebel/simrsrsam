<html>
<head>
    <title>Laporan Penjualan Obat Per Dokter</title>
</head>
<style>
    #A4{
        background-color:#FFFFFF;
        left:5px;
        right:5px;
        width: 297mm; 
        height: 209mm
        margin:1px solid #FFFFFF;
    }    
    table.bordered{
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
    }
    table.bordered th{
        border: 1px solid #ccc;
        padding: 5px;
        font-size: 0.9em;
    }
    table.bordered td{
        border: 1px solid #ccc;
        padding: 5px;
        font-size: 0.8em;
    }
    .btn{
        font-family:Georgia, "Times New Roman", Times, serif;
        -moz-border-bottom-colors: none;
        -moz-border-left-colors: none;
        -moz-border-right-colors: none;
        -moz-border-top-colors: none;
        background-color: #f5f5f5;
        background-image: linear-gradient(to bottom, #ffffff, #e6e6e6);
        background-repeat: repeat-x;
        border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) #b3b3b3;
        border-image: none;
        border-radius: 4px;
        border-style: solid;
        border-width: 1px;
        box-shadow: 0 1px 0 rgba(255, 255, 255, 0.2) inset, 0 1px 2px rgba(0, 0, 0, 0.05);
        color: #333333;
        cursor: pointer;
        display: inline-block;
        font-size: 14px;
        line-height: 20px;
        margin-bottom: 0;
        padding: 4px 12px;
        text-align: center;
        text-shadow: 0 1px 1px rgba(255, 255, 255, 0.75);
        vertical-align: middle;
    }
    a{
        text-decoration: none;
    }
</style>
<body class="A4">
    <table width="100%" border="0">
        <tr>
            <td align="center">
                <?php echo getCompany(); ?>
                <br />
                <?php echo getAddress1(); ?>
                <br />
                <?php echo getAddress2(); ?>
            </td>
        </tr>
    </table>
    <table width="100%" border="0" id="directPrint1">
        <tr>
            <td align="center">
                <a href="#" onclick="window.close()" class="btn">Tutup</a>
                <a href="#" onclick="printDirect()" class="btn">Print</a>
            </td>
        </tr>
    </table>
    <hr />
    <table width="100%" border="0">
        <tr>
            <td align="center"><h2>Laporan Harian Detail Penjualan<br />Tanggal : <?php echo $TGL_AWAL ?></h2></td>
        </tr>
        
    </table>
    <table width="100%" border="0">
        <tr>
            <td width="100px">Lokasi</td>
            <td width="10px" align="center">:</td>
            <td><?php echo $NMLOKASI ?></td>
        </tr>
        
        
    </table>
    
    <table class="bordered">
        <thead>
            <th width="25px">No</th>
            <th width="70px">Tgl Resep</th>
            <th width="80px">No MR</th>
            <th>Nama Pasien</th>
            <th width="50px">Jenis<br/>Pasien</th>
            <th>Dokter</th>
            <th>SMF</th>
            <th>Nama Obat</th>
            <th>Qty</th>
            <th>Harga</th>
            <th>Diskon</th>
            <th>R</th>
            <th>Sub Total</th>
            <th width="80px">Total (Rp)</th>
        </thead>
        <tbody>
            <?php 
                $i=1;
                $subTotal = 0;
                foreach($dataPreview->result_array() as $x): 
            ?>
            <tr>
                <td align="center"><?php echo $i++; ?></td>
                <td align="center"><?php echo date('d-m-Y',strtotime($x['TGLRESEP'])) ?></td>
                <td><?php echo $x['NOMR'] ?></td>
                <td><?php echo $x['NMPASIEN'] ?></td>
                <td align="center"><?php echo $x['NMJPASIEN'] ?></td>
                <td><?php echo $x['NMDOKTER'] ?></td>
                <td><?php echo $x['NMRUANGAN'] ?></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td align="right" style="font-weight: bolder;"><?php echo number_format($x['Total'],2,',','.') ?></td>
            </tr>
            <?php 
                $subTotal = $subTotal + ($x['Total']);
                    foreach($dataDetailPreview->result_array() as $y): 
                    if($x['KDJL']==$y['KDJL']):
            ?>      
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><?php echo $y['NMBRG'] ?></td>
                <td align="right"><?php echo number_format($y['SISA'],0,',','.') ?></td>
                <td align="right"><?php echo number_format($y['HJUAL'],2,',','.') ?></td>
                <td align="right"><?php echo number_format($y['DISKON'],2,',','.') ?></td>
                <td align="right"><?php echo number_format($y['R'],0,',','.') ?></td>
                <td align="right"><?php echo number_format($y['Total'],2,',','.') ?></td>
                <td>&nbsp;</td>
            </tr>
            <?php                    
                    endif;
                    endforeach;
                endforeach; 
            ?>
            <tr>
                <td colspan="13" align="right">Total</td>
                <td align="right" style="font-weight: bolder;"><?php echo number_format($subTotal,2,',','.') ?></td>
            </tr>
        </tbody>
    </table>
    <br />
    <br />
    <table width="100%" border="0">
        <tr>
            <td width="60px">&nbsp;</td>
            <td width="460px">Diketahui Oleh,</td>
            <td>Dicetak Oleh,</td>
        </tr>
        <tr>
            <td height="40px" colspan="3">&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>...........................</td>
            <td><?php echo getNmLengkap() ?></td>
        </tr>
    </table>
    
</body>
</html>
<script>
    function printDirect(){
        if (typeof(window.print) != 'undefined') {
            document.getElementById("directPrint1").style.display = 'none';
            window.print();
            document.getElementById("directPrint1").style.display = 'inline-table';
        }
    }
</script>