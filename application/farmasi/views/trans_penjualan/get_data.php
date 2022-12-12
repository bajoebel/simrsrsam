<?php 
    if($SQL->num_rows() > 0):
        $i = 1 + $offset;
        foreach($SQL->result_array() as $x): 
?>
<tr data-id="<?php echo $x['KDJL']; ?>" class="resultDat">
    <td><?php echo $i++; ?></td>
    <td><?php echo $x['KDJL']; ?></td>
    <td><?php echo date('d-m-Y H:i',strtotime($x['DTJL'])); ?></td>
    <td><?php echo date('d-m-Y',strtotime($x['TGLJUAL'])); ?></td>
    <td><?php echo $x['NOMR']; ?></td>
    <td><?php echo $x['ID_DAFTAR']; ?></td>
    <td><?php echo $x['REG_UNIT']; ?></td>
    <td><?php echo $x['NMPASIEN']; ?></td>
    <td><?php echo number_format(getTotTrans($x['KDJL']),0,',','.'); ?></td>
    <td>
        <div class="btnAksi">
            <button class="btn btn-danger" onclick="cetak('<?php echo $x['KDJL'] ?>')" type="button" title="Print Data">
                <i class="fa fa-print"></i> Cetak</button>
            <div style="padding: 1px"></div>
            <button class="btn btn-danger" onclick="cetakTicket('<?php echo $x['KDJL'] ?>')" type="button" title="E-Ticket">
                <i class="fa fa-print"></i> E Ticket</button>
        </div>
    </td>
</tr>
<?php endforeach;?>
<tr>
    <td colspan="10" style="text-align: right"><?php echo $this->ajax_page->create_links(); ?></td>
</tr>
<?php else: ?>
<tr>
    <td colspan="10">Data tidak ditemukan</td>
</tr>
<?php endif; ?>