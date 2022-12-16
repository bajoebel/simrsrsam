<?php
foreach ($val as $value) {
?>
    <option value="<?php echo $value->id_kecamatan ?>" <?php if($value->id_kecamatan == $kec){ echo "selected";} ?>><?php echo $value->nama_kecamatan ?></option>
<?php
}
?>