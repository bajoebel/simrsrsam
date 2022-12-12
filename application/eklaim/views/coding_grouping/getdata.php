
<?php 
    if($SQL->num_rows() > 0):
        $i = 1;
    foreach($SQL->result_array() as $x): 
?>

<tr>
    <td><?php echo $i++; ?></td>
    <td><?php echo $x['kodekelas']; ?></td>
    <td><?php echo $x['namakelas']; ?></td>
    <td><?php echo $x['koderuang']; ?></td>
    <td><?php echo $x['namaruang']; ?></td>
    <td><?php echo $x['kapasitas']; ?></td>
    <td><?php echo $x['tersedia']; ?></td>
    <td><?php echo $x['tersediapria']; ?></td>
    <td><?php echo $x['tersediawanita']; ?></td>
    <td><?php echo $x['tersediapriawanita']; ?></td>
    <td>
    	<button type="button" onclick="edit('<?php echo $x['koderuang']; ?>','<?php echo $x['kodekelas']; ?>')" class="btn btn-primary">
    		<i class="fa fa-edit"></i>
    	</button>
    	<button type="button" onclick="hapus('<?php echo $x['koderuang']; ?>','<?php echo $x['kodekelas']; ?>')" class="btn btn-danger">
    		<i class="fa fa-remove"></i>
    	</button>
    </td>
</tr>

<?php endforeach;?>

<tr>
    <td colspan="11" style="text-align: right"><?php echo $this->ajax_page->create_links(); ?></td>
</tr>

<tr>
    <td colspan="11">
        <table class="table" id="result" style="display: none">
            <?php foreach ($result as $x): ?>
            <tr>
                <td><?php echo $x['kodekelas'] ?></td>
                <td><?php echo $x['koderuang'] ?></td>
                <td><?php echo $x['namaruang'] ?></td>
                <td><?php echo $x['kapasitas'] ?></td>
                <td><?php echo $x['tersedia'] ?></td>
                <td><?php echo $x['tersediapria'] ?></td>
                <td><?php echo $x['tersediawanita'] ?></td>
                <td><?php echo $x['tersediapriawanita'] ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </td>
</tr>
<?php else: ?>
<tr>
    <td colspan="11">Data tidak ditemukan</td>
</tr>
<?php endif; ?>