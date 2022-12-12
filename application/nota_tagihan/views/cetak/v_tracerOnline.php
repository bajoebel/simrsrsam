<div id="print_tracer_ah">
<?php  
error_reporting(0);                     
?>	
        <table width='396px'>
			<tr><th colspan=2 style='border-bottom:dashed thin #000;font-weight:bold' > KARTU BOOKING ONLINE </th></tr>
			<tr><td style='font-weight:bold;font-size:23px;' width='153px'>KD BOOKING</td><td style='font-weight:bold;font-size:23px;'>: <?php echo $data['kode_booking'] ?></td></tr>
			<tr><td style='font-weight:bold;font-size:23px;'>Tgl Booking<br></td><td style='font-weight:bold;font-size:23px;'>: <?php echo date('d-m-Y H:i:s',strtotime($data['tgl_booking'])) ?></td>
			<tr><td style='font-weight:bold;font-size:26px;'>No MR</td><td style='font-weight:bold;font-size:26px;'>: <?php echo $data['nomr'] ?></td></tr>
			<tr><td style='font-weight:bold;font-size:23px;'>Nama</td><td style='font-weight:bold;font-size:23px;'>: <?php echo $data['nama'] ?></td></tr>
			<tr><td style='font-weight:bold;font-size:23px;'>Tujuan</td><td style='font-weight:bold;font-size:23px;'>: <?php echo $data['grNama'] ?></td></tr>
			<tr><td style='font-weight:bold;font-size:23px;'>Dokter</td><td style='font-weight:bold;font-size:23px;'>: <?php echo $data['nama_dokter'] ?></td></tr>
			<tr><td style='font-weight:bold;font-size:23px;'>Tgl Daftar<br></td><td style='font-weight:bold;font-size:23px;'>: <?php echo date('d-m-Y H:i:s',strtotime($data['tgl_daftar'])) ?></td>
			
			
			</tr>
			 <!--<b>Kartu ini dibawa dan ditunjukan
			 kepada petugas sampai kasir</b>-->
		 
        </table>
</div>
<script>
    window.print();
    //window.close();
</script>