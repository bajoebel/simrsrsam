<?php
    function DateToIndo($date) { // fungsi atau method untuk mengubah tanggal ke format indonesia
		$BulanIndo = array("Januari", "Februari", "Maret","April", "Mei", "Juni","Juli", "Agustus", "September","Oktober", "November", "Desember");
		$tahun = substr($date, 0, 4); // memisahkan format tahun menggunakan substring
		$bulan = substr($date, 5, 2); // memisahkan format bulan menggunakan substring
		$tgl   = substr($date, 8, 2); // memisahkan format tanggal menggunakan substring
		
		$result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;
		return($result);
    }

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
                    LAPORAN KUNJUNGAN PASIEN PERUSER <br />
					Periode : <?php echo $TGLAWAL ?> s/d <?php echo $TGLAKHIR ?>
                </div>
            </div>
            <div class="content">
				<table class="bordered">
						<tr>
							<th class="center">NO</th>
							<th class="center">NAMA USER</th>
							<th class="center">RAWAT JALAN</th>
							<th class="center">RAWAT INAP</th>
							<th class="center">JUMLAH</th>
						</tr>
					<?php 
						if($dataPreview->num_rows() > 0):
						$i=1;
						foreach($dataPreview->result_array() as $x):
						
						$SQL1 = "SELECT count(b.`id_user`) as jumRJ FROM t_pendaftaran b 
						WHERE b.`id_user`= '$x[NIP]' and (DATE(b.`tgl_reg`) >= '$TGLAWAL' AND DATE(b.`tgl_reg`) <= '$TGLAKHIR')";
						$data1 = $this->db->query("$SQL1")->row_array();
						
						$SQL2 = "SELECT count(c.`user_admisi`) as jumRI FROM t_admissi_ranap c 
						WHERE c.`user_admisi`= '$x[NIP]' and (DATE(c.`tgl_masuk`) >= '$TGLAWAL' AND DATE(c.`tgl_masuk`) <= '$TGLAKHIR')";
						$data2 = $this->db->query("$SQL2")->row_array();
						
						$jumlah = $data1['jumRJ'] + $data2['jumRI'];
						 
					?>
						<tr>
							<td align="center"><?php echo $i++; ?></td>
							<td><?php echo $x['nama_lengkap']; ?></td>
							<td align="right"><?php echo $data1['jumRJ']; ?></td>
							<td align="right"><?php echo $data2['jumRI']; ?></td>
							<td align="right"><?php echo $jumlah; ?></td>
						</tr>
					<?php endforeach; ?>
					<?php else: ?>
					<tr>
						<td colspan="5" align="left">Data tidak ditemukan</td>
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