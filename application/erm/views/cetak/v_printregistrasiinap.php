<?php
	error_reporting(0);
	
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
    if($kewarganegaraan=='WNI'){
        $neg = "INDONESIA";
    }else{
        $neg = getNegaraByID($id_negara);
    }
?>
<script>
    window.print();
</script>
<style type="text/css" >
    *{
        margin: 0px 0px;
    }
    #tbl_rs {	
        width:1115px;
        height:250px;        
        font-family:Arial, Helvetica, sans-serif;
        font-size:16px;			
        padding:2px;
    }
</style>
<table width="100%"  border="0" cellspacing="0" cellpadding="0">
<tr>
<td>
   <table align="left" id='tbl_rs' border=0>
        <tr>
            <th colspan="5" align="left">
                <div style="font-size: 18px;border: 0px solid #000;">
                    SURAT REGISTRASI PASIEN RAWAT INAP<br />RSAM BUKITTINGGI<br /><br />
                </div>
            </th>
        </tr>
        <tr>
			<td width="122" style='border-bottom:dashed thin #000;'>ID ADMISI</td>
            <td width="243" style='border-bottom:dashed thin #000;'>: <?php echo $reg_unit ?></td>
            <td width="65">&nbsp;</td>
            <td width="127">Kelas</td>
            <td width="176">: VIP / UTAMA / I / II / III</td>
        </tr>
        <tr>
			<td style='font-weight:bold;font-size:18px'>No Registrasi</td>
            <td style='font-weight:bold;font-size:18px'>: <?php echo $id_daftar ?></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
			<td valign="top">Nama</td>
            <td valign="top">: <?php echo $nama ?> - No.MR : <?php echo $nomr ?></td>
            <td>&nbsp;</td>
            <td valign="top">Ruangan</td>
            <td valign="top">: <?php echo $ruang ?></td>
        </tr>
        <tr>
			<td>Tempat/Tgl.Lahir</td>
            <td>: <?php echo $tempat_lahir."/".DateFormatIndo($tgl_lahir) ?></td>
            <td>&nbsp;</td>
            <td>Tgl Masuk</td>
            <td>: <?php echo date('d-m-Y',strtotime($tgl_masuk)); ?></td>
        </tr>
        <tr>
			<td>Jns.Kelamin</td>
            <td>: <?php if($data['jns_kelamin']=="P") echo "Perempuan"; else echo "Laki-Laki"; ?></td>
            <td>&nbsp;</td>
            <td>Jam</td>
            <td>: <?php echo date('H:i:s',strtotime($tgl_masuk)); ?></td>
        </tr>
        <tr>
			<td valign="top" rowspan="3">Alamat</td>
            <td valign="top" rowspan="3">: <?php echo ucwords(strtoupper($alamat)) ?>, 
                        <?php echo getKelurahanByID($id_kelurahan) ?>, 
                        <?php echo getKecamatanByID($id_kecamatan) ?>, 
                        <?php echo getKabKotaByID($id_kab_kota) ?>, 
                        <?php echo getProvinsiByID($id_provinsi) ?> </td>
            <td>&nbsp;</td>
            <td valign="top">Penanggung Jawab</td>
            <td valign="top">: <?php echo $penanggung_jawab ?></td>
        </tr>
		<tr>
            <td>&nbsp;</td>
            <td valign="top">No HP</td>
            <td valign="top">: <?php echo $no_penanggung_jawab ?></td>
        </tr>
		<tr>
            <td colspan="3"><br /></td>
        </tr>
        <tr>
			<td align='center' colspan="2">&nbsp;</td>
			<td>&nbsp;</td>
			<td align='center' colspan="2">Pasien/<br /> Keluarga Pasien</td>
        </tr>
        <tr style="height: 100px;">
            <td align='center' colspan="2">&nbsp;</td>
			<td>&nbsp;</td>
            <td align='center' colspan="2">------------------</td>
        </tr>
    </table>
</td>
</tr>
  
</table>
<script src="<?php echo base_url() ?>assets/js/jquery-2.1.4.min.js"></script>
<script type="text/javascript">
	
</script>