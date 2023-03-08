<?php 
function tampilRawatByIdx($d) {
    $html ="<b>S :</b>";
    $html.="<b>Keluhan Utama</b> : ".$d->keluhan;
    $html.=", <b>Riwayat Kesehatan</b> : pernah dirawat - ".trueOrFalse($d->dirawat)." $d->kapan_dirawat $d->dimana_dirawat , Diagnosis : $d->diagnosis , Implant : ".trueOrFalse($d->implant)." $d->implant_detail";
    $html.=", <b>Riwayat Penyakit Dahulu</b> : ".arr_to_list($d->riwayat_sakit," "," ").",Riwayat operasi : ".trueOrFalse($d->riwayat_operasi_cek)." $d->riwayat_operasi $d->riwayat_operasi_tahun";
    $html.=", <b>Riwayat Penyakit Keluarga</b> : ".arr_to_list($d->riwayat_sakit_keluarga," "," ");
    $html.=", <b>Riwayat Alergi</b> : Obat :".trueOrFalse($d->obat)." $d->obat_detail Makanan : ".trueOrFalse($d->makanan)." $d->makanan_detail Lain-lain: ".$d->riwayat_lain;
    $html.="<br/><b>O :</b>";
    $html.="<b>status psikologis</b> : ".arr_to_list($d->riwayat_psikologis," "," ");
    $html.=", <b>status mental</b> : sadar dan orientasi baik :".trueOrFalse($d->status_mental_sadar).", ada masalah prilaku : ".trueOrFalse($d->status_mental_prilaku).", $d->status_mental_prilaku_detail".", Perilaku kekerasan yang dialami sebelumnya : ".trueOrFalse($d->status_mental_keras).", $d->status_mental_keras_detail";
    $html.=", <b>Skrining Nyeri</b> : ".$d->nyeri;
    if ($d->nyeri=="nyeri akut" || $d->nyeri=="nyeri kronis") {
        $html.="P: $d->profokatif Q: $d->quality R: $d->region S: $d->skala T: $d->timing";
        switch ($d->metode) {
            case '1':
                $html.=", Metode : Visual Analog Scale dengan Skala : $d->skala_vas";
                break;
            case '2':
                $html.=", Metode : Wong Barker Face Scale dengan Skala : $d->skala_wbfs";
                break;
            case '3':
                $html.=", Metode : FLACC dengan Skor: $d->flacc_skor";
                break;
            default:
                # code...
                break;
        }
    }
    $html.=", <b>Risiko Cidera / Jatuh</b> : ".trueOrFalse($d->jatuh)." - ".$d->jatuh_detail;
    $html.=", Gelang risiko kuning : ".trueOrFalse($d->gelang_risiko);
    $html.=", Gelang risiko kuning : ".trueOrFalse($d->gelang_risiko);
    $html.=", Diberitahukan ke dokter : ".trueOrFalse($d->risiko_info)." - ".$d->risiko_info_detail;
    $html.=", <b>Pemeriksaan Fisik</b> : ";
    $html.=", Keadaan Umum : ".$d->keadaan_umum;
    $html.=", Kesadaran : ".$d->kesadaran_umum;
    $html.=", GCS : E: $d->gcs_e M: $d->gcs_m V: $d->gcs_v";
    $html.=", TTV : Sh: $d->ttv_sh ,Nd: $d->ttv_nd ,Rr: $d->ttv_rr ,SpO2: $d->ttv_spo2 ,TD: $d->ttv_td ,Down Score: $d->ttv_ds";
    $html.=", Pemeriksaan : ".$d->status_generalis;
    $html.=", Penunjang : Radiologi : $d->penunjang_rad_detail Labor : $d->penunjang_lab_detail Lain-lain : $d->penunjang_lain_detail"."<br/>";
    $html.="<b>A :</b>";
    $html.="".arr_to_list($d->diagnosa_keperawatan,"","; ");
    $html.="<br/><b>P :</b>";
    $html.="".arr_to_list($d->tindakan_keperawatan,"","; ");
    return $html;
}

function tampilMedisByIdx($tipe,$d) {
    $html ="";
    switch ($tipe) {
        case 's':
            if ($d['auto']) {
                $html.= "<b>Auto :</b> ".$d['auto_detail']." ";
            }
            if ($d['allo']) {
                $html.= "<b>Allo : </b>".$d['allo_detail']." ";
            }
            break;
        case 'o':
            $html .=arr_to_list($d['fisik_detail'],"<span>"," </span>");
            break;
        case 'a':
            $html .="<b>Diagnosis kerja : </b>".$d['diagnosis_kerja']." "."<b>Diagnosis banding : </b>".$d['diagnosis_banding']." ";
            break;
        case 'p':
            $tindakan = getPermintaanTindakan($d['idx']);
            $resep = getPermintaanResep($d['idx']);
            $penunjang = getPermintaanPenunjang($d['idx']);
            if ($tindakan) {
                $thtml = "Tindakan : ";
                $tindakan_detail =  getPermintaanTindakanDetailById($tindakan->id); 
                foreach($tindakan_detail as $td) {
                    $thtml.= $td->tlTitle.",";
                }
                $html.= rtrim($thtml,",");
            }
            if ($resep) {
                $html.= "<br/>";
                $rhtml = "Therapi : ";
                $resep_detail =  getPermintaanResepDetailById($resep->id); 
                foreach($resep_detail as $rd) {
                    $rhtml.= $rd->nama_obat.",";
                }
                $html.= rtrim($rhtml,",");
            } 
            if ($penunjang) {
                $html.= "<br/>";
                $phtml = "Penunjang : ";
                foreach($penunjang as $pd) {
                    $phtml.= $pd->group_name." : ".$pd->ringkasan_tindakan.",";
                }
                $html.= rtrim($phtml,",");
            }            
            break;
        default:
            # code...
            break;
    }
    return $html ;
}