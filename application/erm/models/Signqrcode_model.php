<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Signqrcode_model extends CI_Model
{
    function updateSignKonsulInternal($id,$kode,$kode_detail) {
        $db2 = $this->load->database('dberm', TRUE);
        $db2->trans_begin();
        $insert = $db2->insert("log_assign",[
            "kode" => $kode,
            "kode_detail" => $kode_detail,
            "created_at" => date("Y-m-d"),
            "updated_at" => date("Y-m-d"),

        ]);
        $insert_id = $db2->insert_id();
        $insert_id = base64_encode(str_pad($insert_id,10,"0",STR_PAD_LEFT));
        $update = $db2->where("id",$id)->update("rj_konsul_internal",[
            "dpjpMintaSign" => $insert_id,
            "status_form" => 1
        ]);
        if ($db2->trans_status() === FALSE)
        {
                $db2->trans_rollback();
                return false;
        }
        else
        {
                $db2->trans_commit();
                return true;
        }
    }

    function updateSignKonsulInternalJawab($id,$kode,$kode_detail) {
        $db2 = $this->load->database('dberm', TRUE);
        $db2->trans_begin();
        $insert = $db2->insert("log_assign",[
            "kode" => $kode,
            "kode_detail" => $kode_detail,
            "created_at" => date("Y-m-d"),
            "updated_at" => date("Y-m-d"),

        ]);
        $insert_id = $db2->insert_id();
        $insert_id = base64_encode(str_pad($insert_id,10,"0",STR_PAD_LEFT));
        $update = $db2->where("id",$id)->update("rj_konsul_internal",[
            "dpjpDimintaSign" => $insert_id,
            "status_form" => 3
        ]);
        if ($db2->trans_status() === FALSE)
        {
                $db2->trans_rollback();
                return false;
        }
        else
        {
                $db2->trans_commit();
                return true;
        }
    }
}