<div id="print_tracer_ah">
<?php  
error_reporting(0);      
$idx       = $this->uri->segment(3); 
if($data['jk'] == 'L'){
        $jk = 'LAKI-LAKI';
}else{
        $jk = 'PEREMPUAN';
}
$a=0;
	
        foreach ($cek as $daf){
        $a++;

        if($daf->id_daftar == $idx){
                    
?>	
        <table width='396px'>
        <tr><th colspan=2 style='border-bottom:dashed thin #000;font-weight:bold' > KARTU REGISTRASI </th></tr>
	<tr><td></td><td align='right' style='font-weight:bold' style='font-size:50px;'>No. Urut : <?php echo $a ?></td></tr>
        <tr><td style='font-weight:bold;font-size:26px;'>No. MR</td><td style='font-weight:bold;font-size:26px;'>: <?php echo $data['nomr'] ?></td></tr>
        <tr><td style='font-weight:bold;font-size:23px;'>NAMA</td><td style='font-weight:bold;font-size:23px;'>: <?php echo $data['pasien'] ?></td></tr>
	<tr><td style='font-weight:bold;font-size:23px;'>JENIS KELAMIN</td><td style='font-weight:bold;font-size:23px;'>: <?php echo $jk ?></td></tr>
        <tr><td style='font-weight:bold;font-size:23px;'>TUJUAN</td><td style='font-weight:bold;font-size:23px;'>: <?php echo $data['poly'] ?></td></tr>
        <tr><td style='font-weight:bold;font-size:23px;'>No.Reg</td><td style='font-weight:bold;font-size:23px;'>: <?php echo $idx ?></td></tr>
	<tr><td style='font-weight:bold;font-size:23px;'>Kunjungan<br></td><td align='right' style='font-weight:bold;font-size:23px;'> <?php echo date('d-m-Y',strtotime($data['tgl_reg']))."<br>".date('H:i:s',strtotime($data['tgl_reg'])) ?></td>
		
	</tr>
        <tr><td colspan='2' align='left'><b>User : <?php echo $data['user'] ?><br>
		 <br>
		 <!--<b>Kartu ini dibawa dan ditunjukan
		 kepada petugas sampai kasir</b>-->
		 
         </table>
<?php		
            }
	}
?>
</div>
<script>
    window.print();
    //window.close();
</script>