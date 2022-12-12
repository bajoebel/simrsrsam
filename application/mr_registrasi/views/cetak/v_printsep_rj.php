<style>
*{
    margin: 0px 0px;
}
#tbl_rs {	
    width:1115px;
    height:250px;        
    font-family:Arial, Helvetica, sans-serif;
    font-size:15px;			
    padding:2px;
}
</style>					
<?php
	//error_reporting(1);
	$sep = $_GET['nosep'];
	$nobpjs = $_GET['idx'];
	
	//$tgl= date("d/m/Y",strtotime($data['tglSep']));
	$tgllhr= date("d/m/Y",strtotime($data['tgl_lahir']));
	if($data['jns_kelamin']=="L"){
		$jk	= "Laki-laki";
	}else if($data['jns_kelamin']=="P"){
		$jk	= "Perempuan";
	}else{
		$jk = "";
	}
	
	$rawat = "Rawat Jalan";
    $tuju   = $data['poly'];
	
	$tgl    = date('Y-m-d',strtotime($data['tgl_reg']));
	$antrian = $this->db->select("*")
					->from('t_pendaftaran')
					->where('DATE(tgl_reg)',$tgl)
					->where('grId',$data['grId'])
					->get()->result();
	$a=0;
	foreach ($antrian as $cek){
	$a++;
	if($cek->id_daftar == $data['id_daftar']){		

          
?>
<table width="100%"  border="0" cellspacing="0" cellpadding="0">
<input type="hidden" name="sep" id="sep" value="<?php echo $sep; ?>"/>
<input type="hidden" name="nobpjs" id="nobpjs" value="<?php echo $nobpjs; ?>"/>
<tr>
<td>
   <table align="left" id='tbl_rs' border=0>
        <tr>
			<th width="326" rowspan="10">
			<table align="left" width='300px' border=0>
				<tr><th colspan='2' style='border-bottom:dashed thin #000;font-weight:bold' > KARTU REGISTRASI </th></tr>
				<tr><td width="99">&nbsp;</td>
				<td width="191" align='right' style='font-size:15px;'>No. <?php echo $a; ?></td>
				</tr>
				<tr><td width="99" style='font-weight:bold;font-size:20px;'>No. MR</td>
				<td width="191" style='font-weight:bold;font-size:20px;'>: <?php echo $data['nomr']; ?></td>
				</tr>
				<tr><td style='font-size:15px;'>NAMA</td><td style='font-size:15px;'>: <?php echo $data['pasien']; ?></td></tr>
				<tr><td style='font-size:15px;'>JNS KELAMIN</td><td style='font-size:15px;'>: <?php echo $jk; ?></td></tr>
				<tr><td style='font-size:15px;'>TUJUAN</td><td style='font-size:15px;'>: <?php echo $tuju; ?></td></tr>
				<tr><td style='font-weight:bold;font-size:20px;'>No.Reg</td><td style='font-weight:bold;font-size:20px;'>: <?php echo $data['id_daftar']; ?></td></tr>
				<tr><td style='font-size:15px;'>Kunjungan<br></td><td align=right style='font-size:15px;'><?php echo $data['tgl_reg']; ?></td></tr>
				<tr><td colspan='2' style='border-bottom:dashed thin #000;font-size:15px;' align='left'>User : (<?php echo $data['user']; ?>) </td></tr>
			</table>
		  </th>
            <th align="left" colspan="2" style="border: 0px solid #000;">
                <img src="<?php echo base_url() ?>assets/images/rsam/bpjs.jpg" width="250" height="45px" border=0>
            </th>
            <th colspan="3" align="center" valign="center">
                <div style="font-size: 15px;border: 0px solid #000;margin-left: -150px;">
                    SURAT ELIGIBILITAS PESERTA<br />RSAM BUKITTINGGI
                </div>
            </th>
			<th width="26" rowspan="12">&nbsp;</th>
        </tr>
        <tr style="font-size: 20px;">
			<td width="122">No. SEP</td>
            <td width="243">: 
          <label id="nosep"> </label></td>
            <td width="65">&nbsp;</td>
            <td width="127">&nbsp;</td>
            <td width="176">&nbsp;</td>
        </tr>
        <tr>
			<td>Tgl. SEP</td>
            <td>: <label id="tglsep"> </label></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
			<td>No.Kartu</td>
            <td>: <label id="nokartu"> </label> - No.MR : <label id="nomr"> </label></td>
            <td>&nbsp;</td>
            <td>Peserta</td>
            <td>: <label id="jnspeserta"> </label></td>
        </tr>
        <tr>
            <td>Nama Peserta</td>
            <td>: <label id="nama"> </label></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
			<td>Tgl.Lahir</td>
            <td>: <label id="tgll"> </label></td>
            <td>&nbsp;</td>
            <td>COB</td>
            <td>: <label id="cob"> </label></td>
        </tr>
        <tr>
			<td>Jns.Kelamin</td>
            <td>: <label id="gender"> </label></td>
            <td>&nbsp;</td>
            <td>Jns Rawat</td>
            <td>: <label id="rawat"> </label></td>
        </tr>
        <tr>
			<td>Poli Tujuan</td>
            <td>: <label id="poli"> </label></td>
            <td>&nbsp;</td>
            <td>Kls Rawat</td>
            <td>: <label id="klsrawat"> </label></td>
        </tr>
        <tr>
			<td>Faskes Perujuk</td>
            <td>: <label id="faskes"> </label></td>
            <td>&nbsp;</td>
            <td>Penjamin</td>
            <td>: <label id="penjamin"> </label></td>
        </tr>
        <tr>
			<td>Diagnosa Awal</td>
            <td>: <label id="diagnosa"> </label> </td>
            <td valign='top'>&nbsp;</td>
            <td valign='top'>&nbsp;</td>
			<td valign='top'>&nbsp;</td>
        </tr>
        <tr>
            <td colspan='3' rowspan="2">Catatan : <label id="ctt"> </label></td>
			<td valign='top'>&nbsp;</td>
			<td valign='top'>Pasien/<br /> Keluarga Pasien</td>
			<td valign='top'>Petugas<br /> BPJS Kesehatan</td>
        </tr>
		<tr>
            <th></th>
            <td valign='top'></td>
            <td valign='top'></td>
        </tr>
        <tr style="height: 50px;">
			<td colspan="4" style="font-style: italic;font-size: 12px;">
                
                    
                        Saya Menyetujui BPJS Kesehatan menggunakan informasi Medis Pasien Jika diperlukan.
                        <br />
                        SEP bukan sebagai bukti penjamin peserta
                    
                
            </td>
            <td valign='bottom'>------------------</td>
            <td valign='bottom'>------------------</td>
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
	window.onload=function(){
			var nosep= '<?php echo $nosep ?>';
			$.ajax({
				type : "POST",
				url  : "<?php echo base_url().'pendaftaran/get_cetaksep'; ?>",
				data : "nosep="+nosep,
				success:function(data){
					var response =  eval("(" + data + ")");
					if(response.metaData.code=='200'){
					
						if(response.response.peserta.kelamin=='L'){
                            $('#gender').html("Laki-laki");
                        }else{
                            $('#gender').html("Perempuan");
                        }
						$('#nosep').html(response.response.noSep);
						$('#tglsep').html(response.response.tglSep);
						$('#rawat').html(response.response.jnsPelayanan);
						$('#nokartu').html(response.response.peserta.noKartu);
						$('#nomr').html(response.response.peserta.noMr);
						$('#nama').html(response.response.peserta.nama);
						$('#tgll').html(response.response.peserta.tglLahir);
						$('#klsrawat').html(response.response.kelasRawat);
						$('#poli').html(response.response.poli);
						$('#faskes').html(response.response.PPKPerujuk);
						$('#diagnosa').html(response.response.diagnosa);
						$('#ctt').html(response.response.catatan);
						$('#cob').html(response.response.peserta.asuransi);
						$('#jnspeserta').html(response.response.peserta.jnsPeserta);
						$('#penjamin').html(response.response.penjamin);
						
						window.print();
					}else{
						alert(response.metaData.message);
					}                  
				},
				error:function(xhr, ajaxOptions, thrownError){
					alert('Error Function : '+thrownError);
				}
			});
			
			
	}
</script>