<html>
<head>
    <title>Nota Tagihan</title>
</head>
<style>
    #A4{
        background-color:#FFFFFF;
        left:5px;
        right:5px;
        height:5.51in ; /*Ukuran Panjang Kertas */
        width: 8.50in; /*Ukuran Lebar Kertas */
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
<body id="A4">
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
                <a href="#" onclick="printDirect()" class="btn">Print INKJET</a>
            </td>
        </tr>
    </table>
    <hr />
    <table width="100%" border="0">
        <tr>
            <td width="70px">No Inv</td>
            <td width="10px" align="center">:</td>
            <td width="300px"><?php echo $KDJL ?></td>
            <td width="120px">No.Reg RS</td>
            <td width="10px" align="center">:</td>
            <td><?php echo $ID_DAFTAR ?></td>
        </tr>
        <tr>
            <td>Tgl Inv</td>
            <td align="center">:</td>
            <td><?php echo date('d-m-Y H:i',strtotime($DTJL)) ?></td>
            <td>No.Reg Unit</td>
            <td align="center">:</td>
            <td><?php echo $REG_UNIT ?></td>
        </tr>
        <tr>
            <td>Apotik</td>
            <td align="center">:</td>
            <td><?php echo $NMLOKASI ?></td>
            <td>No.MR / Pasien</td>
            <td align="center">:</td>
            <td><?php echo $NOMR . " / " . $NMPASIEN ?></td>
        </tr>
    </table>
    
    <table class="bordered">
        <thead>
            <th>No</th>
            <th>Kode</th>
            <th>Nama Obat / Alat Kesehatan</th>
            <th>Satuan</th>
            <th>Harga</th>
            <th>Jml</th>
            <th>Diskon</th>
            <th>Sub Total</th>
        </thead>
        <tbody>
            <?php 
                $i=1;
                $subTotalR = 0;
                $subTotal = 0;
                foreach($dataPreview->result_array() as $x):
                $DISKON = ($x['SISA']=="0") ? "0" : $x['DISKON']; 
                $R = ($x['SISA']=="0") ? "0" : $x['R']; 
                $nTotal = ($x['HJUAL'] * $x['SISA']) - $DISKON;
                $subTotalR = $subTotalR + $R; 
                $subTotal = $subTotal + $nTotal;

            ?>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $x['KDBRG'] ?></td>
                <td><?php echo $x['NMBRG'] ?></td>
                <td><?php echo $x['NMSATUAN'] ?></td>
                <td align="right"><?php echo number_format($x['HJUAL'],0,',','.') ?></td>
                <td align="right"><?php echo number_format($x['SISA'],0,',','.') ?></td>
                <td align="right"><?php echo number_format($DISKON,0,',','.') ?></td>
                <td align="right"><?php echo number_format($nTotal,0,',','.') ?></td>
            </tr>
            <?php 
                endforeach; 
            ?>
            <tr>
                <td colspan="7" align="right">Total</td>
                <td align="right"><?php echo number_format($subTotal,0) ?></td>
            </tr>
            <tr>
                <td colspan="7" align="right">Total R</td>
                <td align="right"><?php echo number_format($subTotalR,0) ?></td>
            </tr>
            <tr>
                <td colspan="7" align="right">Grand Total</td>
                <td align="right"><?php echo number_format($subTotal+$subTotalR,0) ?></td>
            </tr>
            <tr>
                <td colspan="8">Keterangan</td>
            </tr>
            <?php if ($KETJL!==""): ?>
            <tr>
                <td colspan="8"><?php echo $KETJL ?></td>
            </tr>
            <?php else: ?>
            <tr>
                <td colspan="8">-</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <br />
    <br />
    <table width="100%" border="0">
        <tr>
            <td width="60px">&nbsp;</td>
            <td width="460px">Yang menerima</td>
            <td>Yang menyerahkan</td>
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