<?php
    if($detail['jns_kelamin'] == 'L'){
        $jk = "LAKI-LAKI";
    }else{
        $jk = "PEREMPUAN";
    }
    
    if($detail['id_negara'] == 0){
        $neg = "INDONESIA";
    }else{
        $neg = $detail['nama_negara'];
    }
?>
<form method="post">
<table class="table table-striped table-hover" width="100%">
        <tr>
                <td>Tgl Daftar</td>
                <td>:</td>
                <td><?php echo $detail['tgl_daftar']; ?></td>
        </tr>
        <tr>
                <td width="30%">No MR</td>
                <td>:</td>
                <td><?php echo $detail['nomr']; ?></td>
        </tr>
        <tr>
                <td width="30%">No KTP</td>
                <td>:</td>
                <td><?php echo $detail['no_ktp']; ?></td>
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
                <td>Pekerjaan</td>
                <td>:</td>
                <td><?php echo $detail['pekerjaan']; ?></td>
        </tr>
        <tr>
                <td>Agama</td>
                <td>:</td>
                <td><?php echo $detail['agama']; ?></td>
        </tr>
        <tr>
                <td>Kebangsaan</td>
                <td>:</td>
                <td><?php echo $neg; ?></td>
        </tr>
        <tr>
                <td>Alamat</td>
                <td>:</td>
                <td><?php echo $detail['alamat'].", ".$detail['nama_kelurahan'].", ".$detail['nama_kecamatan'].", ".$detail['nama_kab_kota'].", ".$detail['nama_provinsi']; ?></td>
        </tr>
        <tr>
                <td>No BPJS</td>
                <td>:</td>
                <td><?php echo $detail['no_bpjs']; ?></td>
        </tr>
        <tr>
                <td>Penanggungjawab</td>
                <td>:</td>
                <td><?php echo $detail['penanggung_jawab']; ?></td>
        </tr>
        <tr>
                <td>No Penanggungjawab</td>
                <td>:</td>
                <td><?php echo $detail['no_penanggung_jawab']; ?></td>
        </tr>
</table>
</form>