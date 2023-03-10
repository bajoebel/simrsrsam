<?php
    /*function DateToIndo($date) { // fungsi atau method untuk mengubah tanggal ke format indonesia
		$BulanIndo = array("Januari", "Februari", "Maret","April", "Mei", "Juni","Juli", "Agustus", "September","Oktober", "November", "Desember");
		$tahun = substr($date, 0, 4); // memisahkan format tahun menggunakan substring
		$bulan = substr($date, 5, 2); // memisahkan format bulan menggunakan substring
		$tgl   = substr($date, 8, 2); // memisahkan format tanggal menggunakan substring
		
		$result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;
		return($result);
    }*/

    function DateFormatIndo($date) { // fungsi atau method untuk mengubah tanggal ke format indonesia
		$tahun = substr($date, 0, 4); // memisahkan format tahun menggunakan substring
		$bulan = substr($date, 5, 2); // memisahkan format bulan menggunakan substring
		$tgl   = substr($date, 8, 2); // memisahkan format tanggal menggunakan substring	
		$result = $tgl . "-" . $bulan . "-". $tahun;
		return($result);
    }
    if($data['id_negara']==0){
        $neg = "INDONESIA";
    }else{
        $neg = $data['nama_negara'];
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
    width: 180mm;
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
    margin-right: 50px;
    padding: 5px;
    border: 1px solid #000;
    border-radius: 5px 5px 5px;
    float: right;
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
    font-family: Cambria,Georgia,serif;
    font-size: 14px;
    margin-top: 10px;
}
table tr td{
    font-family: Cambria,Georgia,serif;
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
<table width="210mm" border="0">
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
                    FORM RM 1.11.00 Rev. 00
                </div>
            </div>
            <div class="content">
                <h3 style="font-family: Cambria,Georgia,serif;">SURAT MASUK RAWAT INAP</h3>
				<table width="680">
					<tr>
                        <td width="70">RUANGAN</td>
                        <td width="12">:</td>
                        <td width="203"><?php echo $data['grNama'] ?></td>
						<td width="35">SMF</td>
                        <td width="10">:</td>
                        <td width="125"></td>
						<td width="50">KELAS</td>
                        <td width="10">:</td>
                        <td width="125">VIP/UTAMA/I/II/III</td>
                    </tr>
			  </table>
				
                <table>
                    <tr>
                        <td id="info">Nomor Rekam Medis</td>
                        <td id="spasi">:</td>
                        <td>
                        <?php echo $data['nomr'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Nama Pasien </strong></td>
                        <td>:</td>
                        <td>
                        <strong><?php echo $data['nama'] ?></strong>
                        </td>
                    </tr>
                    <tr>
                        <td>Tempat/Tanggal Lahir </td>
                        <td>:</td>
                        <td>
                        <?php echo $data['tempat_lahir']."/".DateFormatIndo($data['tgl_lahir']) ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>:</td>
                        <td>
                        <?php if($data['jns_kelamin']=="P") echo "Perempuan"; else echo "Laki-Laki"; ?>
                        </td>
                    </tr>
                    
                    <tr>
                        <td>Kebangsaan</td>
                        <td>:</td>
                        <td>
                        <?php echo ucwords(strtoupper($neg)); ?>            
                        </td>
                    </tr>
                    <tr>
                        <td>Agama</td>
                        <td>:</td>
                        <td>
                            <?php echo $data['agama']; ?>            
                        </td>
                    </tr>
                    <tr>
                        <td>Pekerjaan</td>
                        <td>:</td>
                        <td>
                        <?php echo $data['pekerjaan'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Alamat Kantor</td>
                        <td>:</td>
                        <td> - </td>
                    </tr>
                    <tr>
                        <td>No. KTP</td>
                        <td>:</td>
                        <td>
                        <?php echo $data['no_ktp'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td>No. Telp/HP</td>
                        <td>:</td>
                        <td>
                        <?php echo $data['no_telpon'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td valign="top">Alamat Rumah</td>
                        <td valign="top">:</td>
                        <td>
                        <?php echo ucwords(strtoupper($data['alamat'])) ?>, 
                        <?php echo $data['nama_kelurahan'] ?>, 
                        <?php echo $data['nama_kecamatan'] ?>, 
                        <?php echo $data['nama_kab_kota'] ?>, 
                        <?php echo $data['nama_provinsi'] ?> 
                        </td>
                    </tr>
                    <tr>
                        <td>Tanggal Masuk</td>
                        <td>:</td>
                        <td>
                        <?php echo DateFormatIndo($data['MASUK']); ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Jam</td>
                        <td>:</td>
                        <td>
                        <?php echo $data['JAM']; ?>
                        </td>
                    </tr>
					<tr>
                        <td>Jenis Pelayanan</td>
                        <td>:</td>
                        <td></td>
                    </tr>
					<tr>
                        <td>No Kartu Jaminan Kesehatan</td>
                        <td>:</td>
                        <td>
                        <?php echo $data['no_bpjs']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4" height="50px" valign="bottom"><strong>Penanggung Jawab Pasien</strong></td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td>
                        <?php echo $data['penanggung_jawab'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Umur</td>
                        <td>:</td>
                        <td>
                        <?php ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Pekerjaan</td>
                        <td>:</td>
                        <td>
                        <?php ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td>
                        <?php ?>
                        </td>
                    </tr>
                    <tr>
                        <td>No.Telp/HP</td>
                        <td>:</td>
                        <td>
                        <?php echo $data['no_penanggung_jawab'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Hub Keluarga</td>
                        <td>:</td>
                        <td>
                        <?php  ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Dikirim Oleh</td>
                        <td>:</td>
                        <td>
                        <?php ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Alamat Pengirim</td>
                        <td>:</td>
                        <td>
                        <?php ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Dokter Jaga</td>
                        <td>:</td>
                        <td>
                        
                        </td>
                    </tr>
            
                </table>
            </div>
            <div class="sign_in">
                <table>
                    <tr>
                        <td>Bukittinggi, <?php echo DateToIndo(date('Y-m-d')) ?></td>
                    </tr>
                    <tr>
                        <td>Petugas Rekam Medis</td>
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