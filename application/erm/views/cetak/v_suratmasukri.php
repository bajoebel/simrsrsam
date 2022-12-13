<style type="text/css">
body{
text-transform:uppercase;
}
</style>
<div id="print_tracer_ah">
<br>
<br>

<?php

$tgl = date('Y-m-d', strtotime($data['tgl_lahir']));
$umur = floor(time() - strtotime($tgl))/(60*60*24*365);
$umurbulat=floor($umur);
    if($data['jns_kelamin']=='L'){
    $data['jns_kelamin']='Laki-laki';
    }
    else{
    $data['jns_kelamin']='Perempuan';
    }

?>

<div style="position:absolute;top:70;left:750;width:200px;" ><h4 style="font-size:11px; "><?php 

echo "&nbsp;".$data['nomr']; ?></h6></div>
<input type="hidden" name="reg" id="reg" value="<?php echo $data['id_daftar']; ?>">
<div style="position:absolute;top:88;left:750;width:200px;" ><h4 style="font-size:11px; "><?php 

echo "&nbsp;".strtoupper($data['nama']); ?></h6></div>
<div style="position:absolute;top:107;left:750;width:200px;" ><h4 style="font-size:11px; "><?php 

echo "&nbsp;".date("d-m-Y",strtotime($data['tgl_lahir']))."/&nbsp;".$umurbulat." TAHUN" ; ?></h6></div>
<div style="position:absolute;top:125;left:750;width:200px;" ><h4 style="font-size:11px; "><?php 

echo "&nbsp;".strtoupper($data['jns_kelamin']); ?></h6></div>




<div style="position:absolute;top:250;left:290;width:500px;" ><h4 style="font-size:16px; "><?php 

echo "&nbsp;".$data['nomr']; ?></h6></div>
<div style="position:absolute;top:276;left:290;width:500px;" ><h4 style="font-size:16px; "><?php 

echo "&nbsp;".$data['nama']; ?></h6></div>
<div style="position:absolute;top:300;left:290;width:500px;" ><h4 style="font-size:16px; "><?php 

echo "&nbsp;".$data['tempat_lahir']."/&nbsp; ".date("d-m-Y",strtotime($data['tgl_lahir'])); ?></h6></div>
<div style="position:absolute;top:320;left:400;width:500px;" ><h4 style="font-size:16px; "><?php 

echo "&nbsp;".$data['jns_kelamin']; ?></h6></div>
<div style="position:absolute;top:375;left:290;width:500px;" ><h4 style="font-size:16px; "><?php 

echo "&nbsp;".$data['agama']; ?></h6></div>
<div style="position:absolute;top:400;left:290;width:500px;" ><h4 style="font-size:16px; "><?php 

echo "&nbsp;".$data['pekerjaan']; ?></h6></div>
<div style="position:absolute;top:445;left:290;width:500px;" ><h4 style="font-size:16px; "><?php 

echo "&nbsp;".$data['no_ktp']; ?></h6></div>
<div style="position:absolute;top:470;left:290;width:700px;" ><h4 style="font-size:16px; "><?php 

echo "&nbsp;".$data['alamat']; ?></h6></div>
<div style="position:absolute;top:525;left:290;width:700px;" ><h4 style="font-size:16px; "><?php 

echo "&nbsp;".$data['MASUK']; ?></h6></div>
<div style="position:absolute;top:545;left:290;width:700px;" ><h4 style="font-size:16px; "><?php 

echo "&nbsp;".$data['JAM']; ?></h6></div>
<div style="position:absolute;top:620;left:400;width:500px;" ><h4 style="font-size:16px; "><?php 

echo "&nbsp;".$data['no_bpjs']; ?></h6></div>
<div style="position:absolute;top:670;left:260;width:500px;" ><h4 style="font-size:16px; "><?php 

echo "&nbsp;".$data['penanggung_jawab']; ?></h6></div>
<div style="position:absolute;top:740;left:290;width:1000px;" ><h4 style="font-size:16px; "><?php 

echo "&nbsp;"; ?></h6></div>
<div style="position:absolute;top:765;left:295;width:500px;" ><h4 style="font-size:16px; "><?php 

echo "&nbsp;".$data['no_penanggung_jawab']; ?></h6></div>
<div style="position:absolute;top:785;left:290;width:500px;" ><h4 style="font-size:16px; "><?php 

echo "&nbsp;"; ?></h6></div>













		
		
        
        
        <!--
        <tr><td colspan="2">----------------------------------------</td><td></td></tr>
        <tr><td>NOMOR RM</td><td><?php echo $data['NOMR'];?></td></tr>
        <tr><td>TUJUAN</td><td><?php echo $data['poly']; ?></td></tr>
        <tr><td>CARA BAYAR</td><td><?php echo $data['carabayar']; ?></td></tr>
        <tr><td colspan="2">----------------------------------------</td><td></td></tr>
        <tr><td>NOMOR RM</td><td><?php echo $data['NOMR'];?></td></tr>
        <tr><td>TUJUAN</td><td><?php echo $data['poly']; ?></td></tr>
        <tr><td>CARA BAYAR</td><td><?php echo $data['carabayar']; ?></td></tr>
        -->
        </table>
        <?php
	echo '</div>';
	?>
<script src="<?php echo base_url() ?>assets/js/jquery-2.1.4.min.js"></script>
<script>
    window.print();
</script>