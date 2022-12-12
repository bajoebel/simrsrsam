<?php 
    if($SQL->num_rows() > 0):
    foreach($SQL->result_array() as $x): 
?>
<tr>
    <td><?php echo $x['id_daftar']; ?></td>
    <td><?php echo $x['reg_unit']; ?></td>
    <td><?php echo date('d-m-Y H:i',strtotime($x['tgl_masuk'])); ?></td>
    <td><?php echo $x['nomr']; ?></td>
    <td><?php echo $x['nama_pasien']; ?></td>
    <td><?php echo $x['nama_ruang']; ?></td>
    <td><?php echo ($x['state_trace']=="0") ? "Status Belum Di Proses" : "Status Telah Di Proses" ?></td>
    <td>
        <?php if($x['state_trace']=="0"): ?>
        <button class="btn btn-danger" type="button" onclick="check('<?php echo $x['reg_unit'] ?>')">
            <i class="fa fa-check"></i>
        </button>
        <?php else: ?>
        <button class="btn btn-danger" type="button" onclick="uncheck('<?php echo $x['reg_unit'] ?>')">
            <i class="fa fa-minus"></i>
        </button>
        <?php endif; ?>
        <button class="btn btn-danger" type="button" onclick="print('<?php echo $x['reg_unit'] ?>')">
            <i class="fa fa-print"></i>
        </button>
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