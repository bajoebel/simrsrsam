<?php 
    if($SQL->num_rows() > 0):
        $i = 1 + $offset;
        foreach($SQL->result_array() as $x): 
?>
<tr data-id="<?php echo $x['KDMT']; ?>" class="resultDat">
    <td><?php echo $i++; ?></td>
    <td><?php echo $x['KDMT']; ?></td>
    <td><?php echo date('d-m-Y H:i',strtotime($x['DTMT'])); ?></td>
    <td><?php echo date('d-m-Y',strtotime($x['TGL_MUTASI'])); ?></td>
    <td><?php echo $x['NAMA_LOKASI_ASAL']; ?></td>
    <td><?php echo $x['JML_ITEM'] ." Item Barang" ; ?></td>
    <td><?php echo $x['KETMT']; ?></td
    <td><?php echo $x['TOTAL_RET']; ?></td>
    <td>
        <?php 
        if($x['STATUSPENERIMAAN']==1) echo "<span class='btn btn-success btn-xs'>Sudah Disetujui</span>"; 
        else echo "<span class='btn btn-danger btn-xs'>Belum Disetujui</span>";
        ?>
        
    </td>
    <td>
        <div class="btnAksi">

            <button class="btn btn-success btn-sm" onclick="lihatDetailmutasi('<?php echo $x['KDMT'] ?>')" title="Detail Mutasi">
                <i class="fa fa-search"></i></button>
            <?php 
            if($x['STATUSPENERIMAAN']=='0'){
                ?>
                <button class="btn btn-danger btn-sm" onclick="returMutasi('<?php echo $x['KDMT'] ?>')" title="Data Mutasi Belum disetujui" disabled>
                <i class="fa fa-ban"></i></button>
                <?php
            }else{
                ?>
                <button class="btn btn-danger btn-sm" onclick="returMutasi('<?php echo $x['KDMT'] ?>')" title="<?php if($x['TOTAL_RET']>0) echo "Data Sudah Diretur"; else echo "Retrun Mutasi"; ?> " <?php if($x['TOTAL_RET']>0) echo "disabled"; ?> >
                <i class="fa fa-ban"></i></button>
                <?php
            }
            ?>
            <!--button class="btn btn-danger" onclick="cetak('<?php //echo $x['KDMT'] ?>')" title="Print Data">
                <i class="fa fa-print"></i></button-->
        </div>
    </td>
</tr>
<?php endforeach;?>
<tr>
    <td colspan="9" style="text-align: right"><?php echo $this->ajax_page->create_links(); ?></td>
</tr>
<?php else: ?>
<tr>
    <td colspan="7">Data tidak ditemukan</td>
</tr>
<?php endif; ?>