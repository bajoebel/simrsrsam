<?php
if ($SQL->num_rows() > 0) :
    $i = 1;
    foreach ($SQL->result_array() as $x) :
?>
        <tr>
            <td><?php echo $i++; ?></td>
            <td><?php echo date('d-m-Y H:i', strtotime($x['tgl_minta'])); ?></td>
            <td><?php echo $x['id_daftar']; ?></td>
            <td><?php echo $x['nama_ruang_pengirim']; ?></td>
            <td><?php echo $x['nama_dokter_pengirim']; ?></td>
            <td><?php echo $x['nomr']; ?></td>
            <td><?php 
            if($x['rawatgabung']==1) echo $x['nama_pasien'] . '<span class="pull-right badge bg-yellow">Rawat Gabung</span>';
            else echo $x['nama_pasien']; 
            ?></td>
            <td><?php echo $x['keterangan']; ?></td>
            <td>
                <?php
                $response = cekPindahKamar($x['idx']);
                if ($response['ok']) :
                    echo "Permintaan telah direspon dengan Registrasi Unit : " . $response['message'];
                else :
                    if (!empty($x['reg_unitibu'])) :
                        $idx = fieldData('idx', array('reg_unit'=> $x['reg_unitibu'],'id_kamar'=>$x['id_kamar']), 'tbl02_pindah_ranap');
                ?>
                        <a href="#" class="btn btn-warning" onclick="registrasiPasien('<?php echo $idx ?>')">
                            <i class="fa fa-plus-square"></i> Registrasi Pasien
                        </a>
                    <?php
                    else :
                    ?>
                        <button class="btn btn-danger" id="btnReg<?php echo $x['idx'] ?>" onclick="registrasiPasien('<?php echo $x['idx'] ?>')">
                            <i class="fa fa-plus-square"></i> Registrasi Pasien
                        </button>
                <?php
                    endif;
                endif; ?>
            </td>
        </tr>
    <?php endforeach; ?>
    <tr>
        <td colspan="9" style="text-align: right"><?php echo $this->ajax_page->create_links(); ?></td>
    </tr>
<?php else : ?>
    <tr>
        <td colspan="9">Data tidak ditemukan</td>
    </tr>
<?php endif; ?>