<?php
class M_laporan extends CI_Model{
    function get_field($field,$tabel,$key_field,$key_value, $db='default'){
        if($db=='default'){
            $this->db->select($field);
            $this->db->where($key_field,$key_value);
            $data= $this->db->get($tabel)->row()->$field;
            return $data;
        }else{
            $this->simrsDB = $this->load->database($db,true);  
            $this->simrsDB->select($field);
            $this->simrsDB->where($key_field,$key_value);
            $data = $this->simrsDB->get($tabel)->row();
            if(!empty($data)) return $data->$field;
            else return "";
        }
        
    }

    function getExp($KDBRG,$KDLOKASI){
        $this->db->where('KDBRG', $KDBRG);
        $this->db->where('KDLOKASI',$KDLOKASI);
        $this->db->where('JSTOK >',0);
        $this->db->order_by('EXPDATE');
        $data=$this->db->get('stok_barang')->row();
        if(!empty($data)) return $data->EXPDATE;
        else return "";
    }
}