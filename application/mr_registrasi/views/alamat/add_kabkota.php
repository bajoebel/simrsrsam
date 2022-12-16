<?php
foreach ($val as $value) {
?>
    <option value="<?php echo $value->id_kab_kota ?>" <?php if($value->id_kab_kota == $kota){ echo "selected";} ?>><?php echo $value->nama_kab_kota ?></option>
<?php
}
?>
