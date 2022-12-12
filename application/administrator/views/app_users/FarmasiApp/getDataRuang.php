<?php 
    $i=1; 
    foreach($getRuang->result_array() as $x): 
        $checked = "";
        foreach($getAksesAvailable->result_array() as $y): 
            if($x['KDLOKASI'] == $y['ruang_akses']){
                $checked = "checked='checked'";
                break;
            }
        endforeach;
?>
<tr>
    <td>
        <input type="checkbox" name="chkRuang[]" value="<?php echo $x['KDLOKASI']  ?>" <?php echo $checked ?> />
    </td>
    <td><?php echo $i++ . ' - ' .$x['NMLOKASI']  ?></td>
    <td><?php echo $i++ . ' - ' .$x['GRLOKASI']  ?></td>
</tr>
<?php 
    endforeach; 
?>