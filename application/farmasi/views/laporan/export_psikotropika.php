<?php
// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");
 
// Mendefinisikan nama file ekspor "hasil-export.xls"
$judul = "export_pengeluaran_obat_psikotropika_".date('ymd').".xls";
header("Content-Disposition: attachment; filename=$judul");
/**
*/
?>
<html>
<head>
    <title>Laporan Pengeluaran Narkotika dan Psikotropika</title>
</head>
<style>
    #A4{
        background-color:#FFFFFF;
        left:5px;
        right:5px;
        width: 297mm; 
        height: 209mm;
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
            <td align="center" colspan="4">
                <?php echo getCompanyOK(); ?>
                <br />
                <?php echo getAddressOK_1(); ?>
                <br />
                <?php echo getAddressOK_2(); ?>
            </td>
        </tr>
    </table>
    <table width="100%" border="0">
        <tr>
            <td align="center" colspan="4"><h2>Pengeluaran Narkotika dan Psikotropika</h2></td>
        </tr>
		<tr>
            <td align="center" colspan="4">Periode : <?php echo $TGL_AWAL ?> s/d <?php echo $TGL_AKHIR ?></td>
        </tr>
    </table>
    <table width="100%" border="0">
        <tr>
            <td width="50px">Lokasi</td>
            <td width="10px" align="center">:</td>
            <td width="350px"><?php echo $NMLOKASI ?></td>
        </tr>
    </table>
    
    <table class="bordered">
        <thead>
            <th width="35">No</th>
            <th width="168">Kode</th>
            <th width="772">Nama Obat / Alat Kesehatan</th>
            <th width="256">Keluar</th>
        <tbody>
			<?php 
				$i=1;
				foreach($dataPreview->result_array() as $x): 
			?>
			<tr>
				<td align="center"><?php echo $i++; ?></td>
				<td><?php echo $x['KDBRG'] ?></td>
				<td><?php echo $x['NMBRG'] ?></td>
				<td align="center"><?php echo $x['JUAL'] ?></td>
			</tr>
			<?php endforeach; ?>
		</tbody>
    </table>
    <br />
    <br />
    <table width="100%" border="0">
        <tr>
            <td colspan="2" align="center">Diketahui Oleh,</td>
            <td colspan="2" align="center">Dicetak Oleh,</td>
        </tr>
        <tr>
            <td height="40px" colspan="3">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="2" align="center">...........................</td>
            <td colspan="2" align="center"><?php echo getNmLengkap() ?></td>
        </tr>
    </table>
    
</body>
</html>
<script src="<?php echo get_asset() ?>jquery/jquery.js"></script>