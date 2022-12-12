<style>
    .form-control[readonly] {
        cursor: not-allowed;
    }
</style>
<section class="content-header">
    <h1><?php echo $contentTitle ?></h1>
</section>

<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header with-border"></div>
                <div class="box-body">
                    <form id="form1" class="form-horizontal" method="POST" action="#" onsubmit="return false">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Password Lama</label>
                            <div class="col-sm-3">
                                <input type="password" class="form-control" name="oldPass" id="oldPass">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Password Baru</label>
                            <div class="col-sm-3">
                                <input type="password" class="form-control" name="newPass" id="newPass">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Ulangi Password</label>
                            <div class="col-sm-3">
                                <input type="password" class="form-control" name="replayPass" id="replayPass">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button id="btnSimpan" type="button" class="btn btn-danger">Ubah Password</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#btnSimpan').click(function() {
            var a = $('#oldPass').val();
            var b = $('#newPass').val();
            var c = $('#replayPass').val();
            if (a == "") {
                alert('Password harus di isi.');
                $('#oldPass').focus();
            } else if (b == "") {
                alert('Password baru harus di isi.');
                $('#newPass').focus();
            } else if (b !== c) {
                alert('Ulangi password harus sama dengan password baru.');
                $('#replayPass').focus();
            } else {
                $.ajax({
                    url: "<?php echo base_url() . 'users/update_pass' ?>",
                    type: "POST",
                    data: $('#form1').serialize(),
                    dataType: "JSON",
                    success: function(data) {
                        if (data.code == 200) {
                            var url = '<?php echo base_url() . 'login' ?>';
                            window.location.href = url;
                        } else {
                            alert(data.message);
                        }
                    },
                    error: function(jqXHR, ajaxOption, errorThrown) {
                        console.log(jqXHR.responseText);
                    }
                });
            }
        });
    });
</script>