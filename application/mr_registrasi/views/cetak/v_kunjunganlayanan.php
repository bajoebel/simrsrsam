<?php
    /*function DateToIndo($date) { // fungsi atau method untuk mengubah tanggal ke format indonesia
		$BulanIndo = array("Januari", "Februari", "Maret","April", "Mei", "Juni","Juli", "Agustus", "September","Oktober", "November", "Desember");
		$tahun = substr($date, 0, 4); // memisahkan format tahun menggunakan substring
		$bulan = substr($date, 5, 2); // memisahkan format bulan menggunakan substring
		$tgl   = substr($date, 8, 2); // memisahkan format tanggal menggunakan substring
		
		$result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;
		return($result);
    }
*/
    function DateFormatIndo($date) { // fungsi atau method untuk mengubah tanggal ke format indonesia
		$tahun = substr($date, 0, 4); // memisahkan format tahun menggunakan substring
		$bulan = substr($date, 5, 2); // memisahkan format bulan menggunakan substring
		$tgl   = substr($date, 8, 2); // memisahkan format tanggal menggunakan substring	
		$result = $tgl . "-" . $bulan . "-". $tahun;
		return($result);
    }
?>
<script>
    window.print();
</script>
<style>
@page{
    margin-left: 2mm;
    margin-top: 0mm;
    margin-right: 0mm;
    margin-bottom: 0mm;
    font-family: Cambria,Georgia,serif;
}
h1,h2,h3,h4,h5,h6{
    font-family: Cambria,Georgia,serif;
    text-align: center;
    width: 180mm;
}
.wrap{
    font-family: Cambria,Georgia,serif;
    width: 310mm;
    height: 120px;
}
.header{
    border-bottom: 0px solid #000; 
    height: 10px;
    float: left;
    font-weight: bold;
}
.kode{
    margin-top: 10px;
    margin-right: 350px;
    padding: 5px;
    float: right;
    font-size: 15px;
    font-weight: bold;
	text-align: center;
}
.logo{
    float: left;
    margin-right: 10px;
}
.logo img{
    height: 90px;
}
.info{
    float: left;
    padding-top: 20px;
    font-size: 13px;
}
#info{
    width: 230px;
}
#spasi{
    width: 5px;
}
table{
    font-family: Cambria,Georgia,serif;
    font-size: 14px;
    margin-top: 10px;
}
table tr td{
    font-family: Cambria,Georgia,serif;
    font-size: 14px;
}
.content{
    width: 310mm;
}
.sign_in{
    margin-left: 250mm;
}
.sign_in table{
    text-align: center;
    margin-top: 50px; 
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
</style>
<table width="310mm" border="0">
    <tr>
        <td>
            <div class="wrap">
                <div class="header">
                    <div class="logo">
                        <img src="<?php echo base_url() ?>assets/images/rsam/logo_RSAM.JPG"/>
                    </div>
                    <div class="info">
                        RSUD Dr. Achmad Mochtar Bukittinggi
                        <br />
                        Jl. Dr. A. Rivai Bukittinggi - 26114
                        <br />
                        Telp. (0752) 21720-21492-21831-21322
                        <br />
                        Fax. (0752) 21321
                    </div>
                </div>
                <div class="kode">
                    LAPORAN JUMLAH KUNJUNGAN PASIEN PERLAYANAN <br />
					Periode : <?php echo $TGLAWAL ?> s/d <?php echo $TGLAKHIR ?>
                </div>
            </div>
            <div class="content">
				<table class="bordered">
						<tr>
							<th rowspan="2" class="center">NO</th>
							<th rowspan="2" class="center">POLIKLINIK</th>
							<th colspan="2" class="center">PASIEN BARU</th>
							<th colspan="2" class="center">PASIEN LAMA</th>
							<th rowspan="2" class="center">TOTAL<br />PERPOLIKLINIK</th>
						</tr>
						<tr>
							<th class="center">BPJS</th>
							<th class="center">UMUM</th>
							<th class="center">BPJS</th>
							<th class="center">UMUM</th>
						</tr>
					<?php 
						if($dataPreview->num_rows() > 0):
						$i=1;
						foreach($dataPreview->result_array() as $x):
						
						$totBARUBPJS = $x['totBARUBPJS'];
						$totBARUUMUM = $x['totBARUUMUM'];
						$totLAMABPJS = $x['totLAMABPJS'];
						$totLAMAUMUM = $x['totLAMAUMUM'];
						
						$totPOLI = $totBARUBPJS + $totBARUUMUM + $totLAMABPJS + $totLAMAUMUM;
						
						$jumBARUBPJS = $jumBARUBPJS + $totBARUBPJS;
						$jumBARUUMUM = $jumBARUUMUM + $totBARUUMUM;
						$jumLAMABPJS = $jumLAMABPJS + $totLAMABPJS;
						$jumLAMAUMUM = $jumLAMAUMUM + $totLAMAUMUM;
						$totSELURUH = $totSELURUH + $totPOLI;
						 
					?>
						<tr>
							<td align="center"><?php echo $i++; ?></td>
							<td><?php echo $x['grNama']; ?></td>
							<td align="right"><?php echo $totBARUBPJS ?></td>
							<td align="right"><?php echo $totBARUUMUM ?></td>
							<td align="right"><?php echo $totLAMABPJS ?></td>
							<td align="right"><?php echo $totLAMAUMUM ?></td>
							<td align="right"><?php echo $totPOLI ?></td>
						</tr>
					<?php endforeach; ?>
						<tr style='font-weight:bold' bgcolor="#CCCCCC">
							<td align="center" colspan="2">JUMLAH</td>
							<td align="right"><?php echo $jumBARUBPJS ?></td>
							<td align="right"><?php echo $jumBARUUMUM ?></td>
							<td align="right"><?php echo $jumLAMABPJS ?></td>
							<td align="right"><?php echo $jumLAMAUMUM ?></td>
							<td align="right"><?php echo $totSELURUH ?></td>
						</tr>
					
					<?php else: ?>
					<tr>
						<td colspan="7" align="left">Data tidak ditemukan</td>
					</tr>
					<?php endif; ?>
			  </table>
            </div>
            <div class="sign_in">
                <table>
                    <tr>
                        <td>Bukittinggi, <?php echo DateToIndo(date('Y-m-d')) ?></td>
                    </tr>
                    <tr>
                        <td>Kepala Instalasi</td>
                    </tr>
                    <tr>
                        <td height="50px">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>( ............................... )</td>
                    </tr>
                </table>
            </div>      
        </td>
    </tr>
</table>

<script>
</script>