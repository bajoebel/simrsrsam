<div>
    <?php
    error_reporting(0);
    if ($jns_kelamin == '1') {
        $jk = 'LAKI-LAKI';
    } else {
        $jk = 'PEREMPUAN';
    }
    ?>
    <table width='396px'>
        <tr>
            <th colspan=2 style='border-bottom:dashed thin #000;font-weight:bold'> <?php echo getRS() ?> </th>
        </tr>
        <tr>
            <th colspan=2 style='border-bottom:dashed thin #000;font-weight:bold'> KARTU REGISTRASI </th>
        </tr>
        <tr>
            <td colspan="2" align='right' style='font-weight:bold' style='font-size:50px;'>
                No. Registrasi Unit : <span style="font-size: 20px"><?php echo $reg_unit ?></span>
            </td>
        </tr>
        <tr>
            <td style='font-weight:bold;font-size:26px;'>No. MR</td>
            <td style='font-weight:bold;font-size:26px;'>: <?php echo $nomr ?></td>
        </tr>
        <tr>
            <td style='font-weight:bold;font-size:18px;'>NAMA</td>
            <td style='font-weight:bold;font-size:23px;'>: <?php echo $nama_pasien ?></td>
        </tr>
        <tr>
            <td style='font-weight:bold;font-size:18px;'>JENIS KELAMIN</td>
            <td style='font-weight:bold;font-size:23px;'>: <?php echo $jk ?></td>
        </tr>
        <tr>
            <td style='font-weight:bold;font-size:18px;'>TUJUAN</td>
            <td style='font-weight:bold;font-size:18px;'>: <?php echo $nama_ruang ?></td>
        </tr>
        <tr>
            <td style='font-weight:bold;font-size:18px;'>No.Reg RS</td>
            <td style='font-weight:bold;font-size:23px;'>: <?php echo $id_daftar ?></td>
        </tr>
        <tr>
            <td style='font-weight:bold;font-size:18px;'>No Antrian Poly</td>
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
                <b>User : <?php echo $user_daftar ?></b>
            </td>
        </tr>
        <!--<b>Kartu ini dibawa dan ditunjukan
    kepada petugas sampai kasir</b>-->

    </table>
</div>
<script src="<?php echo base_url() ?>assets/jquery/js/jquery-3.3.1.min.js"></script>
<script>
    <?php if (!empty(PRINT_TRACERT)) { ?>

        function cetak() {
            //alert(PoliID);
            var url = "<?= PRINT_TRACERT ?>printer/tracert/<?= $reg_unit ?>";
            console.log(url);
            $.ajaxSetup({
                cache: false
            });
            $.ajax({
                type: "get",
                url: url,
                data: {
                    print: true,
                },
                success: function(response) {
                    alert('Berhasil Cetak Tracert');
                    //window.close();
                },
                error: function() {
                    //window.print();
                    alert('Gagal Cetak Tracert')
                    window.close();
                }
            });
        }
        cetak();
    <?php } else { ?>
        window.print();
        //alert('Gagal Cetak Tracert')
        window.close();
    <?php } ?>
</script>