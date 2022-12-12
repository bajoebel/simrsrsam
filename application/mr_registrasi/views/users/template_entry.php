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
                    <form id="form1" class="form-horizontal" method="POST" onsubmit="return false">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Username</label>
                            <div class="col-sm-10">
                                <input type="hidden" name="idx" id="idx" value="<?php echo $idx; ?>">
                                <input type="text" <?php echo ($idx == "") ? "" : "readonly='readonly'" ?> class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Nama Lengkap</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nm_lengkap" id="nm_lengkap" placeholder="Nama Lengkap" value="<?php echo $nm_lengkap; ?>">
                            </div>
                        </div>

                        <?php if ($idx == "") :  ?>
                            <div class="form-group">
                                <label for="userpass" class="col-sm-2 control-label">Password</label>
                                <div class="col-sm-10">
                                    <label class="control-label"><span class="text-red">Password Default : 12345</span></label>
                                </div>
                            </div>
                        <?php endif;  ?>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button id="btnKembali" type="button" class="btn btn-primary">Kembali</button>
                                <button id="btnSimpan" type="button" class="btn btn-danger">Simpan</button>
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
        $('#btnKembali').click(function() {
            var url = "<?php echo base_url() . 'users' ?>";
            window.location.href = url;
        });

        $('#btnSimpan').click(function() {
            var formdata = {};
            formdata['idx'] = $('#idx').val();
            formdata['username'] = $('#username').val();
            formdata['nm_lengkap'] = $('#nm_lengkap').val();

            if (formdata['username'] == "") {
                alert('Username harus di isi.');
                $('#username').focus();
            } else if (formdata['nm_lengkap'] == "") {
                alert('Nama lengkap harus di isi.');
                $('#nm_lengkap').focus();
            } else {
                $.ajax({
                    url: "<?php echo base_url() . 'users/simpan' ?>",
                    type: "POST",
                    data: formdata,
                    dataType: "JSON",
                    success: function(data) {
                        alert(data.message);
                        if (data.code == 200) {
                            $('#form1').find('input').val('');
                        } else if (data.code == 201) {
                            $('#form1').find('input').val('');
                            $('#btnKembali').click();
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