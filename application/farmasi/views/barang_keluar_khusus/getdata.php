<?php 
    if($SQL->num_rows() > 0):
        $i = 1 + $offset;
    foreach($SQL->result_array() as $x): 
?>
    <tr>
        <td class="centerAlign"><?php echo $i++ ?></td>
        <td class="centerAlign"><?php echo $x['KDBKK'] ?></td>
        <td class="centerAlign"><?php echo date('d-m-Y H:i',strtotime($x['DTBKK'])) ?></td>
        <td class="centerAlign"><?php echo date('d-m-Y',strtotime($x['TGLTRANSAKSI'])) ?></td>
        <td><?php echo $x['NMREKANAN'] ?></td>
        <td class="centerAlign">
            <button class="btn btn-danger" type="button" onclick="cetak('<?php echo $x['KDBKK'] ?>')">
                <i class="fa fa-print"></i></button>
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
