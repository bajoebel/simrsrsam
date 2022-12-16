<?php
if ($SQL->num_rows() > 0) :
    $i = 1;
    foreach ($SQL->result_array() as $x) :
?>
        <tr>
            <td><?php echo $i++; ?></td>
            <td><?php echo $x['id_daftar']; ?></td>
            <td><?php echo $x['reg_unit']; ?></td>
            <td><?php echo date('d-m-Y H:i', strtotime($x['tgl_masuk'])); ?></td>
            <td><?php echo $x['nomr']; ?></td>
            <td><?php echo $x['nama_pasien']; ?></td>

            <td><?php echo date('d-m-Y', strtotime($x['tgl_lahir'])); ?></td>
            <td><?php echo ($x['jns_kelamin'] == '1' || $x['jns_kelamin']=='L') ? 'Laki-Laki' : 'Perempuan'; ?></td>
            <td><?php echo $x['namaDokterJaga']; ?></td>
            <?php if ($x["jns_layanan"] == "RI") { 
                
                ?>
            <td><?php echo $x['nama_ruang'] ."(".$x['nama_kamar'].")";  ?></td>
            <td><?php echo $x['kelas_layanan'] ;  ?></td>
            <?php }else{?>
            <td><?php echo $x['nama_ruang']; ?></td>
            <?php } ?>
            <td><?php echo $x['cara_bayar']; ?></td>
            <td>
                <?php
                $cek = $this->nota_model->cekStatusBatal($x['reg_unit']);

                if (empty($cek)) :
                    $pulang = $this->nota_model->cekStatusPulang($x['reg_unit']);
                    if ($pulang) :
                ?>
                        <button class="btn btn-success" disabled>
                            Pasien Sudah dipulangkan
                        </button>
                        <?php
                    else :
                        $pindah = $this->nota_model->cekStatusPindah($x["reg_unit"]);
                        if ($pindah) :
                        ?>
                            <button class="btn btn-warning" onclick="pilihPasien('<?php echo $x['idx'] ?>','<?php echo $x['id_ruang'] ?>')">
                                Pasien sudah dipindahkan
                            </button>
                        <?php
                        else :
                        ?>
                            <button class="btn btn-danger" onclick="pilihPasien('<?php echo $x['idx'] ?>','<?php echo $x['id_ruang'] ?>')">
                                <i class="fa fa-edit"></i> Pilih
                            </button>
                    <?php
                        endif;
                    endif;
                else : ?>
                    <button class="btn btn-danger" disabled>
                        Registrasi dibatalkan
                    </button>
                <?php endif; ?>
            </td>
        </tr>
    <?php endforeach; ?>
    <tr>
        <td colspan="13" style="text-align: right"><?php echo $this->ajax_page->create_links(); ?></td>
    </tr>
<?php else : ?>
    <tr>
        <td colspan="11">Data tidak ditemukan</td>
    </tr>
<?php endif; ?>