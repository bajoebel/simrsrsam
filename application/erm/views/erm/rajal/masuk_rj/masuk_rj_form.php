<?php
    if($p->nama_negara==""){
        $neg = "INDONESIA";
    }else{
        $neg = $p->nama_negara;
    }
?>
<table class="table">
    <tr>
        <td id="info">Nomor Rekam Medis</td>
        <td id="spasi">:</td>
        <td>
        <?php echo $d->nomr ?>
        </td>
    </tr>
    <tr>
        <td id="info">No. KTP</td>
        <td id="spasi">:</td>
        <td>
        <?php echo $d->no_ktp ?>
        </td>
    </tr>
    <tr>
        <td><strong>Nama Pasien </strong></td>
        <td>:</td>
        <td>
        <strong><?php echo $d->nama_pasien ?></strong>
        </td>
    </tr>
    <tr>
        <td>Tempat/Tanggal Lahir </td>
        <td>:</td>
        <td>
        <?php echo $d->tempat_lahir."/".DateFormatIndo($d->tgl_lahir) ?>
        </td>
    </tr>
    <tr>
        <td>Jenis Kelamin</td>
        <td>:</td>
        <td>
        <?php if($d->jns_kelamin=="1") echo "Laki-Laki"; else if($d->jns_kelamin=="2") echo "Perempuan";else if($d->jns_kelamin=="3") echo "Tidak dapat ditentukan"; else "Tidak Mengisi" ?>
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
            <?php echo $p->agama; ?>            
        </td>
    </tr>
    <tr>
        <td>Etnis</td>
        <td>:</td>
        <td>
        <?php echo $p->suku ?>
        </td>
    </tr>
    <tr>
        <td>Bahasa</td>
        <td>:</td>
        <td>
        <?php echo $p->bahasa ?>
        </td>
    </tr>
    <tr>
        <td>Keterbatasan Bahasa</td>
        <td>:</td>
        <td>
        <?php echo $p->hambatan_bahasa ?>
        </td>
    </tr>
    <tr>
        <td>Pendidikan</td>
        <td>:</td>
        <td>
        <?php echo $p->pendidikan ?>
        </td>
    </tr>
    <tr>
        <td>Pekerjaan</td>
        <td>:</td>
        <td>
        <?php echo $p->pekerjaan ?>
        </td>
    </tr>
    
    
    <tr>
        <td>No. Telp / HP</td>
        <td>:</td>
        <td>
        <?php echo $p->no_telpon ." / " .$p->no_hp ?>
        </td>
    </tr>
    
    <tr>
        <td valign="top">Alamat</td>
        <td valign="top">:</td>
        <td>
        <?php echo ucwords(strtoupper($d->alamat)) ?>, 
        <?php echo $d->nama_kelurahan ?>, 
        <?php echo $d->nama_kecamatan ?>, 
        <?php echo $d->nama_kab_kota ?>, 
        <?php echo $d->nama_provinsi ?> 
        </td>
    </tr>
    <tr>
        <td>No. BPJS</td>
        <td>:</td>
        <td>
        <?php echo $d->no_bpjs ?>
        </td>
    </tr>
    <tr>
        <td colspan="4" height="50px" valign="bottom"><strong>Penanggung Jawab Pasien</strong></td>
    </tr>
    <tr>
        <td>Nama</td>
        <td>:</td>
        <td>
        <?php echo $d->pjPasienNama ?>
        </td>
    </tr>
    <tr>
        <td>Umur</td>
        <td>:</td>
        <td>
        <?php echo $d->pjPasienUmur ?>
        </td>
    </tr>
    <tr>
        <td>Pekerjaan</td>
        <td>:</td>
        <td>
        <?php echo $d->pjPasienPekerjaan ?>
        </td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td>:</td>
        <td>
        <?php echo $d->pjPasienAlamat ?>
        </td>
    </tr>
    <tr>
        <td>No.Telp/HP</td>
        <td>:</td>
        <td>
        <?php echo $d->pjPasienTelp ?>
        </td>
    </tr>
    <tr>
        <td>Hub Keluarga</td>
        <td>:</td>
        <td>
        <?php echo $d->pjPasienHubKel ?>
        </td>
    </tr>
    <tr>
        <td>Dikirim Oleh</td>
        <td>:</td>
        <td>
        <?php echo $d->rujukan ?>
        </td>
    </tr>
    <!-- <tr>
        <td>Alamat Pengirim</td>
        <td>:</td>
        <td>
        <?php echo $d->pjPasienAlmtPengirim ?>
        </td>
    </tr>
    <tr>
        <td>Dokter Jaga</td>
        <td>:</td>
        <td>
        <?php echo $d->namaDokterJaga ?>
        </td>
    </tr> -->
</table>