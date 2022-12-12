<style type="text/css">
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

    .form-control[readonly] {
        cursor: not-allowed;
    }

    em {
        color: red
    }
</style>
<section class="content-header">
    <h1><?php echo $contentTitle ?></h1>
</section>
<?php
$datUser = getUserById(getUID());
?>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-body pad">
                    <form id="form1" role="form" method="POST" onsubmit="return false">
                        <div id="dispWait">
                            <i class="fa fa-spin fa-refresh"></i> Silahkan tunggu... Permintaan sedang diproses.
                        </div>

                        <div class="form-group">
                            <label class="control-label">Standar Akreditasi RS</label>
                            <input type="hidden" name="idx" id="idx" value="<?= $idx ?>" />
                            <input type="hidden" name="sars_id" id="sars_id" value="<?= $sars_id ?>" />
                            <input readonly type="text" class="form-control" value="<?= getSarsById($sars_id)['sars'] ?>" />
                        </div>

                        <div class="form-group">
                            <label class="control-label">Element Penilaian</label>
                            <input type="hidden" name="ep_sars_id" id="ep_sars_id" value="<?= $ep_sars_id ?>" />
                            <input readonly type="text" class="form-control" value="<?= getEpSarsById($ep_sars_id)['ep_sars'] ?>" />
                        </div>

                        <div class="form-group">
                            <label class="control-label">Point Element Penilaian</label>
                            <input type="text" name="ep_sars_item" id="ep_sars_item" class="form-control" value="<?php echo $ep_sars_item ?>" />
                        </div>

                        <div class="form-group">
                            <div id="dispBtn">
                                <button id="btnSimpan" type="button" class="btn btn-danger pull-right ml-1">Simpan</button>
                                <button id="btnKembali" type="button" class="btn btn-primary pull-right">Kembali</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<script>
    $(function() {
        $('#dispWait').hide();

        $('#dispBtn').show();

        $(".inputmask").inputmask();

        $('.tanggal').datepicker({
            autoclose: true,
            format: "dd/mm/yyyy"
        });

        $('input').focus(function() {
            return $(this).select();
        });

        $('#btnKembali').click(function() {
            var url = "<?php echo base_url() . 'doc_element_penilaian' ?>";
            window.location.href = url;
        });

        $('#btnSimpan').click(function() {
            var formdata = {};
            formdata['idx'] = $('#idx').val();
            formdata['ep_sars_item'] = $('#ep_sars_item').val();
            formdata['sars_id'] = $('#sars_id').val();
            formdata['ep_sars_id'] = $('#ep_sars_id').val();

            $.ajax({
                url: "<?php echo base_url() . 'doc_element_penilaian/simpan' ?>",
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
                        $('#idx').val('');
                        $('#ep_sars_item').val('');
                    } else if (data.code == 201) {
                        var url = "<?php echo base_url() . 'doc_element_penilaian' ?>";
                        window.location.href = url;
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