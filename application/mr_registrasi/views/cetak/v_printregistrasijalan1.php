<?php
	error_reporting(0);
	$idx = $this->uri->segment(3);
	
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
    if($data['jk'] == 'L'){
        $jk = 'LAKI-LAKI';
	}else{
			$jk = 'PEREMPUAN';
	}
	$a=0;
	
	foreach ($cek as $daf){
        $a++;

        if($daf->id_daftar == $idx){
		
		$daAsal = $this->db->select('a.grId,b.grNama')
					 ->from('t_pendaftaran a')
					 ->join('group_ruang b','a.grId=b.grId','left')
					 ->where('a.id_daftar',$data['noRujuk'])
					 ->get()->row_array();
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
                    SURAT REGISTRASI RAWAT JALAN<br />RSAM BUKITTINGGI<br /><br />
                </div>
            </th>
        </tr>
        <tr>
			<td width="122" style='border-bottom:dashed thin #000;'>KODE INDUK REGISTRASI</td>
            <td width="243" style='border-bottom:dashed thin #000;'>: <label style="font-size: 25px;"><?php echo $data['kir'] ?></label></td>
            <td width="65">&nbsp;</td>
            <td width="127">Diagnosa</td>
            <td width="176" style='border-bottom:dashed thin #000;'>:</td>
        </tr>
        <tr>
			<td>&nbsp;</td>
            <td style='font-weight:bold;font-size:13px' align="right">No. Urut : <?php echo $a ?></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td style='border-bottom:dashed thin #000;'></td>
        </tr>
		<tr>
			<td style='font-weight:bold;font-size:18px'>No Registrasi</td>
            <td style='font-weight:bold;font-size:25px'>: <?php echo $idx ?></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td style='border-bottom:dashed thin #000;'></td>
        </tr>
        <tr>
			<td>NoMR</td>
            <td valign="top">: <label style="font-size: 25px;"><?php echo $data['nomr'] ?></label></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
			<td style='border-bottom:dashed thin #000;'></td>
            
        </tr>
		<tr>
			<td>Nama</td>
            <td valign="top">: <?php echo $data['pasien'] ?></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
			<td style='border-bottom:dashed thin #000;'></td>
            
        </tr>
		<tr>
			<td>Tgl Lahir</td>
            <td>: <?php echo $data['tgl_lahir']; ?></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
			<td>Jns Kelamin</td>
            <td>: <?php echo $jk; ?></td>
            <td>&nbsp;</td>
            <td>Tindakan</td>
            <td style='border-bottom:dashed thin #000;'>:</td>
        </tr>
        <tr>
			<td>Poli Asal</td>
            <td>: <?php echo $daAsal['grNama']; ?></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td style='border-bottom:dashed thin #000;'></td>
        </tr>
		<tr>
			<td>Tujuan</td>
            <td>: <?php echo $data['poly']; ?></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td style='border-bottom:dashed thin #000;'></td>
        </tr>
        <tr>
			<td valign="top">Kunjungan</td>
            <td valign="top">: <?php echo date('d-m-Y',strtotime($data['tgl_reg']))." / Jam :".date('H:i:s',strtotime($data['tgl_reg'])) ?> </td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td style='border-bottom:dashed thin #000;'></td>
        </tr>
		<tr>
			<td valign="top">Cara Bayar</td>
            <td valign="top">: <?php echo $data['carabayar']; ?> </td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td style='border-bottom:dashed thin #000;'></td>
        </tr>
		<tr>
			<td valign="top" >User (<?php echo $data['user'] ?>)</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td style='border-bottom:dashed thin #000;'></td>
        </tr>
    </table>
</td>
</tr>
  
</table>

<?php		
            }
	}
?>
<script src="<?php echo base_url() ?>assets/js/jquery-2.1.4.min.js"></script>
<script type="text/javascript">
	
</script>