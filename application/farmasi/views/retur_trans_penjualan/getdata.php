<?php 
    if($SQL->num_rows() > 0):
        $i = 1 + $offset;
    foreach($SQL->result_array() as $x): 
?>
    <tr>
        <td class="centerAlign"><?php echo $i++; ?></td>
        <td class="centerAlign"><?php echo $x['KDJL_RET'] ?></td>
        <td class="centerAlign"><?php echo date('d-m-Y H:i',strtotime($x['DTJL_RET'])) ?></td>
        <td class="centerAlign"><?php echo date('d-m-Y',strtotime($x['TGL_RETUR'])) ?></td>
        <td class="centerAlign"><?php echo $x['KDJL'] ?></td>
        <td class="centerAlign"><?php echo $x['NOMR'].'/ '.$x['REG_UNIT'].'/ '.$x['ID_DAFTAR'] ?></td>
        <td class="centerAlign"><?php echo $x['NMPASIEN'] ?></td>
        <td class="centerAlign"><?php echo $x['ALASAN_RET'] ?></td>
        <td class="centerAlign">
            <button class="btn btn-danger" type="button" onclick="cetak('<?php echo $x['KDJL_RET'] ?>')">
                <i class="fa fa-print"></i></button>
        </td>
    </tr>
<?php endforeach;?>
<tr>
    <td colspan="9" class="rightAlign"><?php echo $this->ajax_page->create_links(); ?></td>
</tr>
<?php else: ?>
<tr>
    <td colspan="9">Data tidak ditemukan</td>
</tr>
<?php endif; ?>
