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
    if($data['nama_negara']==""){
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
                        <img src="<?php echo LOGO ?>"/>
                    </div>
                    <div class="info">
                        <?php echo COMPANY_NAME ?>
                        <br />
                        <?php echo REPORT_ADDRESS_1 ?>
                        <br />
                        <?php echo REPORT_ADDRESS_2 ?>
                        <br />
                        <?php echo FAX ?>
                    </div>
                </div>
                <div class="kode">
                    FORM RM 02.00 Rev. 01
                </div>
            </div>
            <div class="content">
                <h3 style="font-family: Cambria,Georgia,serif;">SURAT MASUK RAWAT JALAN</h3>
                <table>
                    <tr>
                        <td id="info">Nomor Rekam Medis</td>
                        <td id="spasi">:</td>
                        <td>
                        <?php echo $data['nomr'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td id="info">No. KTP</td>
                        <td id="spasi">:</td>
                        <td>
                        <?php echo $data['no_ktp'] ?>
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
                        <?php if($data['jns_kelamin']=="1") echo "Laki-Laki"; else if($data['jns_kelamin']=="2") echo "Perempuan";else if($data['jns_kelamin']=="3") echo "Tidak dapat ditentukan"; else "Tidak Mengisi" ?>
                        </td>
                    </tr>
                    
                    <tr>
                        <td>Kewarganegaraan</td>
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
                        <td>Etnis</td>
                        <td>:</td>
                        <td>
                        <?php echo $data['suku'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Bahasa</td>
                        <td>:</td>
                        <td>
                        <?php echo $data['bahasa'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Keterbatasan Bahasa</td>
                        <td>:</td>
                        <td>
                        <?php echo $data['hambatan_bahasa'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Pendidikan</td>
                        <td>:</td>
                        <td>
                        <?php echo $data['pendidikan'] ?>
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
                        <td>No. Telp / HP</td>
                        <td>:</td>
                        <td>
                        <?php echo $data['no_telpon'] ." / " .$data['no_hp'] ?>
                        </td>
                    </tr>
                    
                    <tr>
                        <td valign="top">Alamat</td>
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
                        <td>No. BPJS</td>
                        <td>:</td>
                        <td>
                        <?php echo $data['no_bpjs'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4" height="50px" valign="bottom"><strong>Penanggung Jawab Pasien</strong></td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td>
                        <?php echo $data['pjPasienNama'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Umur</td>
                        <td>:</td>
                        <td>
                        <?php echo $data['pjPasienUmur'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Pekerjaan</td>
                        <td>:</td>
                        <td>
                        <?php echo $data['pjPasienPekerjaan'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td>
                        <?php echo $data['pjPasienAlamat'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td>No.Telp/HP</td>
                        <td>:</td>
                        <td>
                        <?php echo $data['pjPasienTelp'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Hub Keluarga</td>
                        <td>:</td>
                        <td>
                        <?php echo $data['pjPasienHubKel'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Dikirim Oleh</td>
                        <td>:</td>
                        <td>
                        <?php echo $data['rujukan'] ?>
                        </td>
                    </tr>
                    <!-- <tr>
                        <td>Alamat Pengirim</td>
                        <td>:</td>
                        <td>
                        <?php echo $data['pjPasienAlmtPengirim'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Dokter Jaga</td>
                        <td>:</td>
                        <td>
                        <?php echo $data['namaDokterJaga'] ?>
                        </td>
                    </tr> -->
            
                </table>
            </div>
            <div class="sign_in">
                <table>
                    <tr>
                        <td><?php echo ALMT_SURAT; ?>, <?php echo DateToIndo($data['tgl_reg']) ?></td>
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
    // window.close();
</script>