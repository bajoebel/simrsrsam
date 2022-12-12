<?php 
    foreach($SQL->result_array() as $x): 
?>
<div class="divRowItems" id="<?php echo $x['no_sep'].'^'.$x['icd_cd'] ?>">
    <div style="display: inline-table;"><?php echo $x['icd_desc'] ?></div>
    <div style="display: inline-table;border:1px solid #c1c1c1;padding: 5px;margin: 5px"><?php echo $x['icd_cd'] ?></div>
    <div style="display: inline-table;"><?php echo ($x['icd_index']=='1') ? 'Primer' : 'Sekunder' ?></div>
    <div style="display: inline-table;margin-left:10px">
        <?php if($x['icd_index']=='1'): ?>
            <button onclick="icd10delete('<?php echo $x['no_sep'].'^'.$x['icd_cd'].'^'.$x['icd_index'] ?>',this)" class="btn btn-sm btn-danger">Hapus</button>
        <?php else: ?>
            <button onclick="icd10primary('<?php echo $x['no_sep'].'^'.$x['icd_cd'] ?>',this)" class="btn btn-sm btn-danger">Set Primer</button>
            <button onclick="icd10delete('<?php echo $x['no_sep'].'^'.$x['icd_cd'].'^'.$x['icd_index'] ?>',this)" class="btn btn-sm btn-danger">Hapus</button>
        <?php endif; ?>
    </div>
</div>
<?php endforeach;?>
