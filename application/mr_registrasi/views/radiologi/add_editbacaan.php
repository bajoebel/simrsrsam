<script src="<?php echo base_url() ?>assets/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
    tinymce.init({selector:'textarea'});
</script>
<div class="form-group">
    <label class="control-label col-xs-12 col-sm-2 no-padding-right">Bacaan:</label>

    <div class="col-xs-12 col-sm-10">
        <textarea name="bacaan"><?php echo $edit['bacaan_diagnosa_klinis']; ?></textarea>
    </div>
</div>
<div class="form-group">
    <label class="control-label col-xs-12 col-sm-2 no-padding-right">Kesan:</label>

    <div class="col-xs-12 col-sm-10">
		<textarea name="kesan"><?php echo $edit['bacaan_kesan']; ?></textarea>
    </div>
</div>
<div class="form-group">
    <label class="control-label col-xs-12 col-sm-2 no-padding-right">Saran:</label>

    <div class="col-xs-12 col-sm-10">
        <textarea name="saran"><?php echo $edit['bacaan_saran']; ?></textarea>
    </div>
</div>


