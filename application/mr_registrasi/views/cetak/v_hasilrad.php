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
	
	$lahir = $data['tgl_lahir'];
	$biday = new DateTime($lahir);
	$today = new DateTime();
	
	$diff = $today->diff($biday);
	
?>
<script>
    window.print();
</script>
<style>
.page{
    margin-left: 15mm;
    margin-top: 0mm;
    margin-right: 0mm;
    margin-bottom: 0mm;
    font-family: Arial, Helvetica, sans-serif;
	
}
h1,h2,h3,h4,h5,h6{
    font-family: Arial, Helvetica, sans-serif;
    text-align: center;
    width: 180mm;
}
.wrap{
    font-family: Arial, Helvetica, sans-serif;
    width: 180mm;
    height: 120px;
}
.header{
    border-bottom: 0px solid #000;
    margin-left: 40px;
    height: 10px;
    float: left;
    font-weight: bold;
}
.judul{
    margin-top: 10px;
    margin-right: 50px;
    padding: 5px;
    border-radius: 5px 5px 5px;
    float: right;
    font-size: 18px;
    font-weight: bold;
}
.kode{
    margin-right: 50px;
	padding: 5px;
    border: 1px solid #000;
    border-radius: 3px 3px 3px;
    float: left;
    font-size: 15px;
    font-weight: bold;
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
    font-family: Arial, Helvetica, sans-serif;
    font-size: 14px;
    margin-top: 10px;
}
table tr td{
    font-family: Arial, Helvetica, sans-serif;
    font-size: 14px;
}
.content{
    width: 180mm;
}
.sign_in{
    margin-left: 100mm;
}
.sign_in table{
    text-align: center;
    margin-top: 50px; 
}
</style>
<div class="page">
<table width="210mm" border="0">
    <tr>
        <td>
            <div class="wrap">
                <div class="header" align="center">
                    <div class="logo">
                        <img src="<?php echo base_url() ?>assets/images/rsam/logo_RSAM.JPG"/>
                    </div>
                </div>
                <div class="judul" align="center">
                    RSUD DR. ACHMAD MOCHTAR BUKITTINGGI
					<br />
					INSTALASI RADIOLOGI
                </div>
            </div>
            <div class="content">
				<table width="680">
					<tr>
                        <td colspan="3"><strong>HASIL PEMERIKSAAN</strong></td>
						<td width="18">&nbsp;</td>
						<td colspan="3"><div class="kode">Untuk dilampirkan pada status pasien</div></td>
                    </tr>
					<tr>
                        <td width="90">No Registrasi</td>
                        <td width="15">:</td>
                        <td width="140"><?php echo $data['id_daftar'] ?></td>
						<td width="18">&nbsp;</td>
						<td width="112">Tgl Order</td>
                        <td width="13">:</td>
                        <td width="260"><?php echo $data['tanggal_order'] ?></td>
                    </tr>
					<tr>
                        <td width="90">No MR</td>
                        <td width="15">:</td>
                        <td width="140"><?php echo $data['nomr'] ?></td>
						<td width="18">&nbsp;</td>
						<td width="112">Tgl Periksa</td>
                        <td width="13">:</td>
                        <td width="260"><?php echo $data['tanggal_diagnosa'] ?></td>
                    </tr>
					<tr>
                        <td width="90">Nama</td>
                        <td width="15">:</td>
                        <td width="140"><?php echo $data['nama'] ?></td>
						<td width="18">&nbsp;</td>
						<td width="112">No Foto</td>
                        <td width="13">:</td>
                        <td width="260"><?php echo $data['id_tr_rad'] ?></td>
                    </tr>
					<tr>
                        <td width="90">Umur</td>
                        <td width="15">:</td>
                        <td width="140"><?php echo $diff->y ." Tahun"; ?></td>
						<td width="18">&nbsp;</td>
						<td width="112">Instansi Meminta</td>
                        <td width="13">:</td>
                        <td width="260" rowspan="2"><?php echo $data['nama_instansi'] ?></td>
                    </tr>
					<tr>
                        <td width="90">Jns Kelamin</td>
                        <td width="15">:</td>
                        <td width="140"><?php if($data['jns_kelamin']=="P") echo "PEREMPUAN"; else echo "LAKI-LAKI"; ?></td>
						<td width="18">&nbsp;</td>
						<td width="112">&nbsp;</td>
                        <td width="13">&nbsp;</td>
                    </tr>
					<tr>
                        <td width="90">Cara Bayar</td>
                        <td width="15">:</td>
                        <td width="140"><?php if($data['id_cara_bayar']=="2") echo "JKN"; else echo "UMUM"; ?></td>
						<td width="18">&nbsp;</td>
						<td width="112">Poli / Ruang</td>
                        <td width="13">:</td>
                        <td width="260"><?php echo $data['grNama'] ?></td>
                    </tr>
					<tr>
                        <td width="90">&nbsp;</td>
                        <td width="15">&nbsp;</td>
                        <td width="140">&nbsp;</td>
						<td width="18">&nbsp;</td>
						<td width="112">Dokter Meminta</td>
                        <td width="13">:</td>
                        <td width="260"><?php echo $data['dokter_meminta'] ?></td>
                    </tr>
					<tr>
                        <td width="90">&nbsp;</td>
                        <td width="15">&nbsp;</td>
                        <td width="140">&nbsp;</td>
						<td width="18">&nbsp;</td>
						<td width="112">Diagnosa Klinis</td>
                        <td width="13">:</td>                        
						<td width="260"><?php echo $data['diagnosa_klinis'] ?></td>
                    </tr>
			  </table>
			  <table>
			  	<tr>
					<td>Ts, Yth.</td>
				</tr>
				<tr>
					<td><?php echo $data['bacaan_diagnosa_klinis']; ?></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td> <strong>Kesan :</strong><?php echo $data['bacaan_kesan']; ?></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td> <strong>Saran :</strong><?php echo $data['bacaan_saran']; ?></td>
				</tr>
			  </table>
                
            </div>
			<table>
				<tr>
					<td width="407" rowspan="4"><div class="kode">Saat Kontrol foto lama dilampirkan</div></td>
					<td width="261" align="center">Bukittinggi, <?php echo DateToIndo(date('Y-m-d')) ?></td>
				</tr>
				<tr align="center">
					<td>Dokter Spesialis Radiologi</td>
				</tr>
				<tr align="center">
					<td height="60px">&nbsp;</td>
				</tr>
				<tr align="center">
					<td><?php echo $nama; ?></td>
				</tr>
			</table>   
        </td>
    </tr>
</table>
</div>

<script>
    // window.close();
</script>