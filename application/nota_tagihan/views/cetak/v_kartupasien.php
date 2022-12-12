<style type="text/css">
    body{
        text-transform:uppercase;
    }
</style>
<br><br><br><br>
<table border=0 cellpadding=0 cellspacing=0 style='margin-left:25%;font-size:12px;font-weight:bold;font-family:arial;text-transform:uppercase'>
<tr>
<td>No.MR</td><td>:</td><td style='font-size:13px;'>&nbsp; <?php echo $nomr ?></td>
</tr>
<tr>
<td>Nama</td><td>:</td><td>&nbsp; <?php echo $nama ?></td>
</tr>
<tr>
<td style='width:70px;'>TGL. Lahir</td><td>:</td><td>&nbsp; <?php echo date("d-m-Y",strtotime($tgl_lahir)) ?></td>
</tr>
<tr>
<td style='vertical-align:top;'>Alamat</td><td style='vertical-align:top'>:</td><td style='width:170px;vertical-align:top;'> 
&nbsp;
<table border=0 cellpadding=0 cellspacing=0 style='margin-top:-15px;margin-left:5px;'>
<tr>
<td style='vertical-align:top;font-size:12px;font-weight:bold;font-family:arial;'><?php echo $alamat.", ".$nama_kab_kota ?>
</td>
</tr>
</table>

</td>
</tr>
</table>

<script>
    window.print();
    //window.close();
</script>
