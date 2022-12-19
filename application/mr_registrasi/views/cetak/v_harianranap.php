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
                    DAFTAR HARIAN PASIEN RAWAT INAP <br />
					Periode : <?php echo $TGL ?>
                </div>
            </div>
            <div class="content">
				<table class="bordered">
						<tr>
							<th class="center">NO</th>
							<th class="center">NOMR</th>
							<th class="center">NAMA</th>
							<th class="center">NO HP</th>
							<th class="center">DIAGNOSA</th>
							<th class="center">USIA</th>
							<th class="center">TGL MASUK</th>
							<th class="center">DPJP</th>
							<th class="center">UNIT PELAYANAN</th>
						</tr>
					<?php 
						if($dataPreview->num_rows() > 0):
						$i=1;
						foreach($dataPreview->result_array() as $x):
						
						$lahir=new DateTime($x['tgl_lahir']);
						$today =new DateTime();
						
						$umur=$today->diff($lahir);
						$umurpasien =$umur->y." Th, ".$umur->m." Bln";
						 
					?>
						<tr>
							<td align="center"><?php echo $i++; ?></td>
							<td><?php echo $x['nomr']; ?></td>
							<td><?php echo $x['nama']; ?></td>
							<td><?php echo $x['no_telpon']; ?></td>
							<td><?php echo $x['jenis_penyakit']; ?></td>
							<td><?php echo $umurpasien; ?></td>
							<td><?php echo $x['tgl']; ?></td>
							<td><?php echo $x['nama_dokter']; ?></td>
							<td><?php echo $x['grNama']; ?></td>
						</tr>
					<?php endforeach; ?>
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