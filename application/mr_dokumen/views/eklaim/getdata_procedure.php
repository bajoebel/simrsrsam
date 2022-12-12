<?php 
    foreach($SQL->result_array() as $x): 
?>
<div class="divRowItems" id="<?php echo $x['no_sep'].'^'.$x['proc_cd'] ?>">
    <div style="display: inline-table;"><?php echo $x['proc_desc'] ?></div>
    <div style="display: inline-table;border:1px solid #c1c1c1;padding: 5px;margin: 5px"><?php echo $x['proc_cd'] ?></div>
    <div style="display: inline-table;margin-left:10px">
        <button onclick="procedureDelete('<?php echo $x['no_sep'].'^'.$x['proc_cd'] ?>',this)" class="btn btn-sm btn-danger">Hapus</button>
    </div>
</div>
<?php endforeach;?>
