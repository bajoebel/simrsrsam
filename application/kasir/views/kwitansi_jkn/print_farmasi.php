<html>
<head>
    <title>Nota Farmasi</title>
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
            <td width="100px">No Inv</td>
            <td width="10px" align="center">:</td>
            <td width="300px"><?php echo $kode_item ?></td>
            <td width="100px">Pasien</td>
            <td width="10px" align="center">:</td>
            <td><?php echo getPenjualanByKode($kode_item)['NOMR'].'-'.getPenjualanByKode($kode_item)['NMPASIEN'] ?></td>
        </tr>
        <tr>
            <td>Tgl Resep</td>
            <td align="center">:</td>
            <td><?php echo date('d-m-Y',strtotime(getPenjualanByKode($kode_item)['TGLRESEP'])) ?></td>
            <td width="100px">Reg.RS/Reg.Unit</td>
            <td width="10px" align="center">:</td>
            <td><?php echo getPenjualanByKode($kode_item)['ID_DAFTAR'].'/'.getPenjualanByKode($kode_item)['REG_UNIT'] ?></td>
        </tr>
        <tr>
            <td>Apotik</td>
            <td align="center">:</td>
            <td><?php echo getPenjualanByKode($kode_item)['NMLOKASI'] ?></td>
            <td>Nama Unit</td>
            <td align="center">:</td>
            <td><?php echo getPenjualanByKode($kode_item)['NMRUANGAN'] ?></td>
        </tr>
    </table>
    
    <table class="bordered">
        <thead>
            <th>No</th>
            <th>Kode</th>
            <th>Nama Obat / Alat Kesehatan</th>
            <th>Harga</th>
            <th>Jml</th>
			<th>Diskon</th>
            <th>Sub Total</th>
        </thead>
        <tbody>
            <?php 
                $i=1;
                $total = 0;
                $nilaiR = 0;
                $subTotal = 0;
                $totalR = 0;
                foreach($datDetail->result_array() as $x): 
                    $nilaiR = ($x['jml_item']==0) ? 0 : 750;
                    $diskon = $x['sub_total_item'] - $nilaiR - ($x['nilai_item'] * $x['jml_item']);
                    $total = $x['sub_total_item'] - $nilaiR;
            ?>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $x['kode_item_detail'] ?></td>
                <td><?php echo $x['deskripsi'] ?></td>
                <td align="right"><?php echo number_format($x['nilai_item'],2,',','.') ?></td>
                <td align="right"><?php echo number_format($x['jml_item'],0,',','.') ?></td>
				<td align="right"><?php echo number_format($diskon,2,',','.') ?></td>
                <td align="right"><?php echo number_format($total,2,',','.') ?></td>
            </tr>
            <?php 
                $totalR = $totalR + $nilaiR;
                $subTotal = $subTotal + $total;
                endforeach; 
            ?>
            <tr>
                <td colspan="6" align="right">Total</td>
                <td align="right"><?php echo number_format($subTotal,2,',','.') ?></td>
            </tr>
            <tr>
                <td colspan="6" align="right">Total R</td>
                <td align="right"><?php echo number_format($totalR,2,',','.') ?></td>
            </tr>
            <tr>
                <td colspan="6" align="right">Grand Total</td>
                <td align="right"><?php echo number_format($subTotal+$totalR,2,',','.') ?></td>
            </tr>
			<tr>
                <td colspan="7">Terbilang : <?php echo Terbilang($subTotal+$totalR) ?></td>
            </tr>
            <tr>
                <td colspan="7">Keterangan</td>
            </tr>
            <?php if (getPenjualanByKode($kode_item)['KETJL'] !== ""): ?>
            <tr>
                <td colspan="7"><?php echo getPenjualanByKode($kode_item)['KETJL'] ?></td>
            </tr>
            <?php else: ?>
            <tr>
                <td colspan="7">-</td>
            </tr>
            <?php endif; ?>
            <tr>
                <td colspan="7">Note &#8667; <em>SSR : Sisa Setelah Retur</em></td>
            </tr>
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
            <td height="40px" colspan="4">&nbsp;</td>
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