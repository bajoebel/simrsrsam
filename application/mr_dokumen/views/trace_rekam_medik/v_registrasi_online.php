<div id="print_tracer_ah">
    <?php
    error_reporting(0);
    if ($jns_kelamin == '1' || $jns_kelamin == "L") {
        $jk = 'LAKI-LAKI';
    } else {
        $jk = 'PEREMPUAN';
    }
    ?>
    <table width='396px'>
        <tr>
            <th colspan=2 style='border-bottom:dashed thin #000;font-weight:bold'> KARTU REGISTRASI </th>
        </tr>
        <tr>
            <td colspan="2" style='font-weight:bold'>
                No. Registrasi Unit : <span style="font-size: 20px"><?php echo $reg_unit 
                                                                        ?></span>
            </td>
        </tr>
        <tr>
            <th colspan=2 style='border-bottom:dashed thin #000;font-weight:bold'></th>
        </tr>
        <tr>
            <td style='font-weight:bold;font-size:18px;'>No. MR</td>
            <td style='font-weight:bold;font-size:26px;'>: <?php echo $nomr ?></td>
        </tr>
        <tr>
            <td style='font-weight:bold;font-size:18px;'>NAMA</td>
            <td style='font-weight:bold;font-size:20px;'>: <?php echo $nama_pasien ?></td>
        </tr>
        <tr>
            <td style='font-weight:bold;font-size:18px;'>JENIS KELAMIN</td>
            <td style='font-weight:bold;font-size:20px;'>: <?php echo $jk ?></td>
        </tr>
        <tr>
            <td style='font-weight:bold;font-size:18px;'>TUJUAN</td>
            <td style='font-weight:bold;font-size:20px;'>: <?php echo $nama_ruang ?></td>
        </tr>
        <tr>
            <td style='font-weight:bold;font-size:18px;'>No.Reg RS</td>
            <td style='font-weight:bold;font-size:23px;'>: <?php echo $id_daftar ?></td>
        </tr>
        <tr>
            <td style='font-weight:bold;font-size:18px;'>No.Antrian Poly</td>
            <td style='font-weight:bold;font-size:23px;'>: <?php echo $no_antrian_poly ?></td>
        </tr>
        <tr>
            <td style='font-weight:bold;font-size:18px;'>Kunjungan<br></td>
            <td align='right' style='font-weight:bold;font-size:23px;'>
                <?php echo date('d-m-Y', strtotime($tgl_masuk)) . "<br>" . date('H:i:s', strtotime($tgl_masuk)) ?>
            </td>
        </tr>
        <tr>
            <td colspan='2' align='left'>
                <b>User : <?php echo getNamaUserByID($user_daftar) ?></b>
            </td>
        </tr>
        <!--<b>Kartu ini dibawa dan ditunjukan
    kepada petugas sampai kasir</b>-->
    </table>

</div>
<script>
    window.print();
    window.close();
</script>