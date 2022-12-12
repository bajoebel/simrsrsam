<?php 
    if($SQL->num_rows() > 0):
        foreach($SQL->result_array() as $x): 
?>
    <tr data-id="<?php echo $x['KDBMK']; ?>" class="resultDat">
        <td><?php echo $x['DTBMK'] ?></td>
        <td><?php echo $x['NMREKANAN'] ?></td>
        <td><?php echo $x['NOFAKTUR'] ?></td>
        <td><?php echo $x['TGLFAKTUR'] ?></td>
        <td><?php echo $x['TGLTERIMA'] ?></td>
        <td><?php echo $x['NMLOKASI'] ?></td>
        <td>
            <div class="btnAksi">
                <button class="btn btn-danger" onclick="cetak('<?php echo $x['KDBMK'] ?>')" title="Print Data">
                    <i class="fa fa-print"></i></button>
                <button id="<?php echo $x['KDBMK']; ?>" class="btn btn-danger" onclick="batal('<?php echo $x['KDBMK'] ?>')" title="Retur Data">
                    <i class="fa fa-ban"></i></button>
            </div>
        </td>
    </tr>
<?php endforeach;?>
<tr>
    <td colspan="7" class="rightAlign"><?php echo $this->ajax_page->create_links(); ?></td>
</tr>
<?php else: ?>
<tr>
    <td colspan="7">Data tidak ditemukan</td>
</tr>
<?php endif; ?>
