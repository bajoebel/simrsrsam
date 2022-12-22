<style>
    .custom-input {
        padding: 2px 2px;
        margin: 0 2px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    .custom-input:focus {
        border: 1px solid #555 !important;
    }

    .w-25 {
        width: 25px
    }

    .w-50 {
        width: 50px;
    }

    .w-100 {
        width: 100px;
    }

    .w-200 {
        width: 200px;
    }

    .w-300 {
        width: 300px;
    }

    .mt-1 {
        margin-top: 5px;
    }

    .ml-1 {
        margin-left: 5px;
    }

    .radio,
    .checkbox {
        margin: 5px 0;
    }
</style>
<form role="form" id='form-data-kaji-awal' method="post">
    <div class="box-body">
        <input type="hidden" name="idx" value="<?= $detail->idx ?>">
        <input type="hidden" name="nomr" value="<?= $detail->nomr ?>">
        <div class="form-group row">
            <div class="col-md-2">
                <label for="">Tanggal</label>
                <input type="date" name="" id="" class="form-control">
            </div>
            <div class="col-md-2">
                <label for="">Jam</label>
                <input type="time" name="" id="" class="form-control">
            </div>
            <div class="col-md-3">
                <label for="">Profesional</label>
                <select name="" id="" class="form-control">
                    <option value="">Dokter</option>
                    <option value="">Anastesi</option>
                    <option value="">Paramedis</option>
                    <option value="">Apoteker</option>
                    <option value="">Bidan</option>
                    <option value="">Analis</option>
                    <option value="">Penata Anastesi</option>
                    <option value="">Nutrisionist</option>
                </select>
            </div>
            <div class="col-md-5">
                <label for="">Profesional</label>
                <input type="text" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <b>Subyektif</b>
            <div class="form-group row">
                <div class="col-md-12">
                    <textarea name="" id="" rows="5" class="form-control"></textarea>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <b>Obyektif</b>
            <div class="form-group row">
                <div class="col-md-12">
                    <textarea name="" id="" rows="5" class="form-control"></textarea>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <b>Assessment</b>
            <div class="form-group row">
                <div class="col-md-12">
                    <textarea name="" id="" rows="5" class="form-control"></textarea>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <b>Planning</b>
            <div class="form-group row">
                <div class="col-md-12">
                    <textarea name="" id="" rows="5" class="form-control"></textarea>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <b>Intruksi</b>
            <div class="form-group row">
                <div class="col-md-12">
                    <textarea name="" id="" rows="5" class="form-control"></textarea>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <b>Review</b>
            <div class="form-group row">
                <div class="col-md-12">
                    <textarea name="" id="" rows="5" class="form-control"></textarea>
                </div>
            </div>
        </div>
    </div>
</form>