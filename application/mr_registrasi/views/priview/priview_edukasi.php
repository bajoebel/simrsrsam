<?php 
if(empty($iepdetail)){
    ?>
     <form class="form-horizontal" method="POST" id="edukasi" action="#">
        <div class="form-group">
            <label class="control-label col-sm-3" for="email">Bahasa:</label>
            <div class="col-sm-9">
                <div class="row">
                    <div class="col-md-6">
                    <input type="checkbox" id="indonesia" name="bahasa[]" value="Indonesia"> Indonesia &nbsp;
                    </div>
                    <div class="col-md-6">
                    <input type="checkbox" id="indonesia" name="peterjemah" value="1"> Kebutuhan Peterjemah
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                    <input type="checkbox" id="daerah" name="bahasa[]" value="Daerah"> Daerah &nbsp;
                    </div>
                    <div class="col-md-6 daerahlain" style="display:none;">
                        <input type="text" name="daerahlain" id="daerahlain" class="form-control input-sm">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                    <input type="checkbox" id="isyarat" name="bahasa[]" value="Isyarat"> Isyarat &nbsp;
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-md-3">
                    <input type="checkbox" id="lain" name="bahasa[]" value="Lain-Lain"> Lain Lain &nbsp;
                    </div>
                    <div class="col-md-6 daerahlain" style="display:none;">
                        <input type="text" name="bahasalain" id="bahasalain" class="form-control input-sm">
                    </div>
                </div>
            
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-3" for="pwd">Agama Pasien:</label>
            <div class="col-sm-9">
            <select name="agama" id="agama" class="form-control">
                <option value="">Pilih Agama</option>
            </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-3" for="pwd">Pendidikan Pasien:</label>
            <div class="col-sm-9">
            <select name="pendidikan" id="pendidikan" class="form-control">
                <option value="">Pilih Pendidikan</option>
            </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-3" for="pwd">Kesediaan Menerima Informasi:</label>
            <div class="col-sm-9">
            
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
            <div class="checkbox">
                <label><input type="checkbox"> Remember me</label>
            </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Submit</button>
            </div>
        </div>
        </form> 
    <?php
}
?>