<style type="text/css">
    div.separator {
        display: inline-block;
        width: 100%;
        margin-bottom: 10px;
    }

    div#upload {
        border: 1px solid #ccc;
        height: 200px;
        padding: 5px;
    }

    #dispWait {
        margin: 5px;
        width: 100%;
        border: 1px solid #e1e1e1;
        text-align: center;
        padding: 10px 5px;
        border-radius: 5px 5px 5px;
        display: none;
    }

    em {
        color: red
    }
</style>
<section class="content-header">
    <h1><?php echo $contentTitle ?></h1>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div id="dispWait">
                <i class="fa fa-spin fa-refresh"></i> Silahkan tunggu... Permintaan sedang diproses.
            </div>

            <div class="col-md-12 col-sm-12">
                <div class="box box-info">
                    <div class="box-body">
                        <div class="form-group">
                            <label class="control-label">Element Penilaian</label>
                            <input type="hidden" id="idx" value="<?php echo $row['idx']; ?>">
                            <input type="text" class="form-control" id="ep_sars" value="<?php echo $row['ep_sars']; ?>">
                        </div>

                        <div class="form-group">
                            <label class="control-label">Standar Akreditasi RS</label>
                            <select id="sars_id" class="form-control">
                                <?php foreach (getSars() as $x) : ?>
                                    <option <?= ($x['idx'] == $x['sars_id']) ? "selected='selected'" : "" ?> value="<?= (int)$x['idx'] ?>"><?= (int)$x['idx'] . ". " . $x['sars'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <div id="dispBtn">
                                <button id="btnKembali" type="button" class="btn btn-primary pull-right ml-1">Kembali</button>
                                <button id="btnSimpan" type="button" class="btn btn-danger pull-right">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>



<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.js"></script>
<script>
    $(document).ready(function() {
        $('#dispWait').hide();
        $('#dispBtn').show();
        $('.tanggal').datepicker({
            autoclose: true,
            format: "yyyy-mm-dd"
        });
        $('input').focus(function() {
            return $(this).select();
        });
        $('#btnKembali').click(function() {
            var url = "<?php echo base_url() . 'element_penilaian' ?>";
            window.location.href = url;
        });

        $('#btnSimpan').click(function() {
            var formdata = {}
            formdata['idx'] = $('#idx').val();
            formdata['ep_sars'] = $('#ep_sars').val();
            formdata['sars_id'] = $('#sars_id').val();

            $.ajax({
                url: "<?php echo base_url() . 'element_penilaian/simpan' ?>",
                type: "POST",
                data: formdata,
                dataType: "JSON",
                beforeSend: function() {
                    $('#dispBtn').hide();
                    $('#dispWait').show();
                },
                success: function(data) {
                    $('#dispWait').hide();
                    $('#dispBtn').show();
                    alert(data.message);
                    if (data.code == 200) {
                        $('input').val('');
                    } else if (data.code == 201) {
                        window.location.href = '<?= base_url('element_penilaian') ?>';
                    }
                },
                error: function(jqXHR, ajaxOption, errorThrown) {
                    $('#dispWait').hide();
                    $('#dispBtn').show();
                    console.log(jqXHR.responseText);
                }
            });
        });

    });
</script>