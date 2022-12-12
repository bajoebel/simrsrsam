<?php 
    $i=1; 
    $ruang = $getAksesAvailable->row();
    $levelid = $ruang->levelid;
    echo "<input type='hidden' name='levelid' id='levelid' value='$levelid'/>";
    $arr_ruang = explode(',',$ruang->ruang);
    //echo "RUANG AKSES : ".$ruang->ruang;
    foreach($getRuang->result_array() as $x): 
        $checked = "";
        if(in_array($x['idx'],$arr_ruang)) $checked='checked';
        
?>
<tr>
    <td>
        <input type="checkbox" name="chkRuang[]" value="<?php echo $x['idx']  ?>" <?php echo $checked ?> />
    </td>
    <td><?php echo $i++ . ' - ' .$x['ruang']  ?></td>
    <td><?php echo $x['grNama']  ?></td>
</tr>
<?php 
    endforeach; 
?>