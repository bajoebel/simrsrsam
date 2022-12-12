<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Notify extends CI_Controller {
    public function __construct(){
        parent ::__construct();
    }
    function index(){
        //$igd    = $this->input->get('igd');
        //$ruang  = $this->input->get('ruang');

        //if($igd==0) $this->db->where_in('notif_jenislayanan',array('GD'));
        
        $ruang_akses = $this->ruangakses();
        $this->db->where_in('notif_tujuan', array($this->session->userdata('kdlokasi')));

        $this->db->where('notif_jenis','RG');
        $this->db->where('notif_baca',0);
        //$this->db->where('notif_dering', 0);
        $notif =  $this->db->get('tbl02_notifikasi_transaksi')->result();
        if(!empty($notif)){
            foreach ($notif as $n ) {
                $not[]=array('idx' => $n->idx,'notif_dering'=>1);
            }
            $this->db->update_batch('tbl02_notifikasi_transaksi', $not, 'idx');
            $response = array(
                'status' => true,
                'data' => $notif
            );
        }else{
            $response = array(
                'status' => false,
                'data' => array()
            );
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    function baca($idx){
        $NRP = $this->session->userdata('get_uid');
        $this->db->where('idx', $idx);
        $row=$this->db->get('tbl02_notifikasi_transaksi')->row();
        if(!empty($row)){
            $this->db->where('idx', $idx);
            $this->db->set('notif_baca', 1);
            $this->db->set('notif_userbaca', $NRP);
            $this->db->update('tbl02_notifikasi_transaksi');
            $idx=$this->getIdx($row->notif_regunit);
            $response = array(
                'status' => true,
                'message'=>'OK',
                'data' => $row,
                'idx'   => $idx
            );
        }else{
            $response = array(
                'status' => false,
                'message' => 'Notifkasi Tidak Ditemukan',
                'data' => array()
            );
        }

        header('Content-Type: application/json');
        echo json_encode($response);
    }
    function getIdx($reg_unit){
        $this->db->select('idx');
        $this->db->where('reg_unit', $reg_unit);
        $row=$this->db->get('tbl02_pendaftaran')->row();
        if(!empty($row)){
            return $row->idx;
        }else{
            return 0;
        }
    }
    function ruangakses(){
        $NRP = $this->session->userdata('get_uid');
        $SQL = "SELECT idx FROM tbl01_ruang 
            WHERE idx IN (SELECT ruang_akses FROM tbl01_users_nota_tagihan 
            WHERE NRP = '$NRP') ORDER BY ruang";
        $data =  $this->db->query("$SQL")->result();
        foreach ($data as $d ) {
            $ruang[]=$d->idx;
        }
        if(empty($ruang)) $ruang=array();
        return $ruang;
    }
}