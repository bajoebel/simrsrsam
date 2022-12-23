<form role="form" id='form-data-persetujuan' method="post">
    <div class="box-body">
        <input type="hidden" name="idx" value="<?= $detail->idx ?>">
        <input type="hidden" name="nomr" value="<?= $detail->nomr ?>">
        <div class="form-group">
            <label for="nama_ttd">Nama <i class="ion ion-clipboard" data-toggle="tooltip" data-placement="right" title="Yang bertanda tangan (pasien/wali)"></i></label>
            <input type="text" class="form-control" name="nama_ttd" id="nama_ttd" placeholder="Enter Text....">
        </div>
        <div class="form-group">
            <label for="ttl">Tempat Tanggal Lahir</label>
            <div class="row">
                <div class="col-md-4">
                    <input type="text" class="form-control" name="tempat_lahir_ttd" id="tempat_lahir_ttd" placeholder="Enter Tempat Lahir..">
                </div>
                <div class="col-md-4">
                    <input type="date" class="form-control" name="tgl_lahir_ttd" id="tgl_lahir_ttd" placeholder="Enter Tanggal lahir">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="jk">Jenis Kelamin</label>
            <div>
                <input type="radio" name='jk_ttd' value="1" checked> Laki-laki
                <input type="radio" name='jk_ttd' value="2"> Perempuan
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" id="" name='alamat_ttd' class="form-control"></textarea>
                </div>
                <div class="col-md-4">
                    <label for="alamat">Selaku</label>
                    <select name="selaku" id="" class="form-control" required="required">
                        <option value="pasien">Pasien</option>
                        <option value="wali">Wali</option>
                        <option value="orang tua">Orang Tua</option>
                        <option value="keluarga">Keluarga</option>
                        <option value="lainnya">Lainnya</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="">Lainnya....</label>
                    <input type="text" name="lainnya" class="form-control" readonly>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="">No Telp/HP</label>
                    <input type="text" class="form-control" name="phone_ttd" id="phone_ttd" placeholder="Enter phone/telp">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="privasi">Keinginan Privasi <i class="ion ion-clipboard" data-toggle="tooltip" data-placement="right" title="Saya (mengizinkan/ tidak mengizinkan)* Rumah Sakit Memberi akses bagi : Keluarga serta orang yang akan menengok /menemui saya.
                             menginginkan privasi khusus berupa:"></i></label>
            <div class="row">
                <div class="col-md-6 fieldAdd">
                    <div class="input-group">
                        <input type="text" class="form-control" name="privasi[]" placeholder="Enter text.....">
                        <span class="input-group-btn">
                            <button class="btn btn-success" type="button" onclick="addmore(1)"><i class="fa fa-plus"></i></button>
                        </span>
                    </div>

                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="privasi">Terbatas Pada <i class="ion ion-clipboard" title="• Saya memahami informasi yang ada di dalam diri saya termasuk diagnosis, hasil laboratorium dan hasil tes diagnosis yang akan digunakan untuk perawatan medis, RSUD Dr Achmad Mochtar Bukittinggi akan menjamin kerahasiannya.
                            • Saya memberi wewenang kepada RSUD Dr Achmad Mochtar Bukittinggi untuk memberikan informasi tentang rahasia kedokteran saya bila diperlukan untuk memproses klaim asuransi dan atau lembaga pemerintah lainya.
                            • Saya memberi wewenang kepada RSUD Dr Achmad Mochtar Bukittinggi untuk memberikan (informasi / tidak)* tentang diagnosis, hasil pelayanan dan pengobatan saya kepada"></i></label>
            <div class="row">
                <div class="col-md-6 fieldAdd2">
                    <div class="input-group">
                        <span class="input-group-addon"> <input type="checkbox" aria-label="Checkbox for following text input" value="1" name="terbatas"> </span>
                        <input type="text" class="form-control" name='terbatas_list[]' placeholder="Enter text.....">
                        <span class="input-group-btn">
                            <button class="btn btn-success" type="button" onclick="addmore(2)"><i class="fa fa-plus"></i></button>
                        </span>
                    </div><!-- /input-group -->
                </div>
            </div>
        </div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
        <button type="form" class="btn btn-primary">Simpan</button>
    </div>
</form>
<script>
    $(document).ready(function() {
        $("[name='terbatas']").change(function() {
            if ($(this).is(":checked")) {
                $("#terbatas_list").removeAttr("readonly")
            } else {
                $("#terbatas_list").attr('readonly', true);
            }
        });
        $(".fieldAdd").on('click', '.removeMore', function(e) {
            $(this).parent().parent('div').remove();
        })
        $(".fieldAdd2").on('click', '.removeMore2', function(e) {
            $(this).parent().parent('div').remove();
        })
        // select option lainnya
        $("[name='selaku']").on("change", function() {
            let p = $(this).val();
            if (p == 'lainnya') {
                $("[name='lainnya']").prop("readonly", false).focus();

            } else {
                $("[name='lainnya']").prop("readonly", true)
            }
        })
    });

    function addmore(pil) {
        var maxField = 10;

        if (pil == 1) {
            var x = 1;
            var fieldHtml = `<div class="input-group" style="margin-top:2px">
                            <input type="text" class="form-control" name="privasi[]" placeholder="Enter text.....">
                            <span class="input-group-btn">
                                <button class="btn btn-danger removeMore" type="button"><i class="fa fa-trash"></i></button>
                            </span>
                        </div>`;
            if (x < maxField) {
                x++;
                $(".fieldAdd").append(fieldHtml);
            }
        }

        if (pil == 2) {
            var y = 1;
            var fieldHtml2 = `<div class="input-group" style="margin-top:2px">
            <input type="text" class="form-control" name="privasi[]" placeholder="Enter text.....">
            <span class="input-group-btn">
            <button class="btn btn-danger removeMore2" type="button"><i class="fa fa-trash"></i></button>
            </span>
            </div>`;
            if (y < maxField) {
                $(".fieldAdd2").append(fieldHtml2);
                y++;
            }
        }
    }
</script>