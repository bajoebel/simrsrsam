<?php
foreach ($val as $value) {
?>
    <option value="<?php echo $value->id_kelurahan ?>" <?php if($value->id_kelurahan == $kel){ echo "selected";} ?>><?php echo $value->nama_kelurahan ?></option>
<?php
}
?>