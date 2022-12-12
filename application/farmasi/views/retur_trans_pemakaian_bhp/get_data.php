<?php 
    if($SQL->num_rows() > 0):
        $i = 1 + $offset;
        foreach($SQL->result_array() as $x): 
?>
<tr data-id="<?php echo $x['KDMTBHP_RET']; ?>" class="resultDat">
    <td><?php echo $i++; ?></td>
    <td><?php echo $x['KDMTBHP_RET']; ?></td>
    <td><?php echo date('d-m-Y H:i',strtotime($x['DTMTBHP_RET'])); ?></td>
    <td><?php echo date('d-m-Y',strtotime($x['TGL_RETUR'])); ?></td>
    <td><?php echo $x['KDMTBHP']; ?></td>
    <td><?php echo $x['NAMA_LOKASI_TUJUAN']; ?></td>
    <td><?php echo $x['ALASAN_RET']; ?></td>
    <td>
        <div class="btnAksi">
            <button class="btn btn-danger" onclick="cetak('<?php echo $x['KDMTBHP_RET'] ?>')" title="Print Data">
                <i class="fa fa-print"></i></button>
        </div>
    </td>
</tr>
<?php endforeach;?>
<tr>
    <td colspan="8" style="text-align: right"><?php echo $this->ajax_page->create_links(); ?></td>
</tr>
<?php else: ?>
<tr>
    <td colspan="8">Data tidak ditemukan</td>
</tr>
<?php endif; ?>