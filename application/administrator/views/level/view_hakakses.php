<div style="border-style: double;height: 500px;padding: 2px;overflow: scroll;">
    <div class="row">
        <div class="col-md-12"><label for="">Hak Akses <?php if(!empty($row_level)) echo $row_level->level ?></label></div>
    </div>
    <form action="return false" method="POST" action="#" id="formakses">
    <input type="hidden" name="idmodul" id="idmodul" value="<?= $modul ?>">
    <input type="hidden" name="idlevel" id="idlevel" value="<?= $level ?>">
    <?php 
    foreach ($list_menu as $m) {
        $hak_akses = $this->level_model->getHakAkses($level,$m->id_modul,$m->idx);
        if(!empty($hak_akses)){
            $hak_aksi = $hak_akses->hak_aksi;
            $array_aksi = explode(',',$hak_aksi);
        }
        ?>
        <div class="row">
            <div class="col-md-12">
                <input type="hidden" name="id_menu[]" id="id_menu<?= $m->idx ?>" value="<?= $m->idx ?>" >
                <input type="hidden" name="aksi<?= $m->idx ?>" id="aksi<?= $m->idx ?>" value="<?= $m->aksi ?>" >
                <div <?php if($m->sub_index_menu > 0) echo "style='padding-left:30px;'" ?> >
                    <input
                    type="checkbox"
                    class='submenu<?= $m->index_menu ?>'
                    name="menu<?= $m->idx ?>"
                    id="menu<?= $m->idx ?>"
                    value="<?= $m->idx ?>" <?php if(!empty($hak_akses)) echo "checked"; ?>
                    onclick="cekAllaksi('<?= $m->idx; ?>','<?= $m->index_menu ?>','<?= $m->sub_index_menu ?>')"><?= $m->judul_menu ?><br>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row" style="padding-left:80px;">
                <?php 
                    if(!empty($m->aksi)){
                        
                        //print_r($aksi);
                        //echo $aksi["1"];
                        //break;
                        $arr_aksi=explode(',',$m->aksi);
                    
                        foreach ($arr_aksi as $a ) {
                            $aksi = $this->level_model->getAksi($a);
                            ?>
                            <input
                            type="checkbox"
                            class='submenu<?= $m->index_menu ?> aksi<?= $m->idx ?> '
                            name="aksi_<?= $m->idx ."_" .$a ?>"
                            id="aksi<?= $a ?>" <?php  if(in_array($a,$array_aksi)) echo "checked"; ?>
                            value="<?= $a ?>"><?= $aksi['nama_aksi']; ?>
                            <br>
                            <?php
                            
                        }
                    }
                ?>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
    </form>
</div>