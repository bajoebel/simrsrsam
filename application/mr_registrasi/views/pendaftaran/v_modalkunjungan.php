<?php
    if($detail['jns_kelamin'] == 'L'){
        $jk = "LAKI-LAKI";
    }else{
        $jk = "PEREMPUAN";
    }
    
?>
<form method="post">
<table class="table table-striped table-hover" width="100%">
        <tr>
                <td>No Registrasi</td>
                <td>:</td>
                <td><?php echo $detail['id_daftar']; ?></td>
        </tr>
         <tr>
                <td>Tgl Registrasi</td>
                <td>:</td>
                <td><?php echo $detail['tgl_reg']; ?></td>
        </tr>
        <tr>
                <td width="30%">No MR</td>
                <td>:</td>
                <td><?php echo $detail['nomr']; ?></td>
        </tr>
        <tr>
                <td>Nama</td>
                <td>:</td>
                <td><?php echo $detail['nama']; ?></td>
        </tr>
        <tr>
                <td>Gender</td>
                <td>:</td>
                <td><?php echo $jk; ?></td>
        </tr>
        <tr>
                <td>Tempat/Tgl Lahir</td>
                <td>:</td>
                <td><?php echo $detail['tempat_lahir'].", ".$detail['tgl_lahir']; ?></td>
        </tr>
        <tr>
                <td>Tujuan</td>
                <td>:</td>
                <td><?php echo $detail['grNama']; ?></td>
        </tr>
        <tr>
                <td>Cara Bayar</td>
                <td>:</td>
                <td><?php echo $detail['cara_bayar']; ?></td>
        </tr>
        <tr>
                <td>User (<?php echo $detail['id_user']; ?>)</td>
                <td></td>
                <td></td>
        </tr>
</table>
</form>