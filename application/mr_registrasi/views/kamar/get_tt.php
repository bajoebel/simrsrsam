<?php
if ($SQL->num_rows() > 0) :
    $i = 1;
    foreach ($SQL->result_array() as $x) :
?>
        <tr>
            <td class="text-center"><?= $i++; ?></td>
            <td class="text-center"><?= $x['no_tt']; ?></td>
            <td class="text-center">
                <?php 
                    echo ($x['kondisi']=="1") ? "<b>OK/Ready</b>" : "<b>Rusak</b>"; 
                    echo "<hr style='margin:0'/>"; 
                    echo ($x['status']=="0") ? "Kosong" : "Terpakai"; 
                ?>
            </td>
            <td class="text-center">
                <?php 
                    echo $x['noreg_pengguna']; 
                    echo "<br/>"; 
                    echo $x['nomr_pengguna']; 
                ?>
            </td>
            <td class="text-center">
                <?php 
                    echo $x['nama_pengguna']; 
                    echo "<br/>"; 
                    echo $x['jenkel_pengguna']; 
                ?>
            </td>
            <td class="text-center">
                <a href="Javascript:edit('<?= (int)$x['idx'] ?>','<?= $x['no_tt'] ?>','<?= $x['kondisi'] ?>')" class="btn btn-sm btn-primary mb-1">
                    <i class="fa fa-edit"></i> 
                </a>
                <a href="Javascript:hapus('<?= (int)$x['idx'] ?>')" class="btn btn-sm btn-danger mb-1">
                    <i class="fa fa-remove"></i>
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
    <tr>
        <td colspan="6"  class="text-right"><?= $this->ajax_page->create_links(); ?></td>
    </tr>
<?php else : ?>
    <tr>
        <td colspan="6">Data tidak ditemukan</td>
    </tr>
<?php endif; ?>