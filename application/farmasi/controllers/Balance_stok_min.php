<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Balance_stok_min extends CI_Controller{
        function __construct(){
            parent::__construct();
            ini_set('max_execution_time', 86400);
        }
        function index(){
            $x['contentTitle'] = "Balance Stok Min";        
            $x['breadcrumbTitle'] = "Balance Stok Min";   
            $x['header'] = $this->load->view('template/header','',true);
            $z = setNav("nav_2");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);
            $this->load->view('balance_stok_min/template_form',$x);
        }
        function submit_balance(){
            $sqlMinData = "SELECT * FROM stok_barang_fifo WHERE JSTOK < 0";
            $queMinData = $this->db->query("$sqlMinData");
            foreach ($queMinData->result_array() as $x) {
                $NOBUKTI = str_pad(date('d'), 3,0,STR_PAD_LEFT).'/FARMASI-RSAM/SO/'.date('m').'/'.date('Y');
                $ALASAN = "Hasil Stok Opname 01 Januari 2019 - 04 Januari 2019";
                $JMLKOREKSI = $x['JSTOK'] * -1;
                $params = array(
                    'KDLOKASI' => $x['KDLOKASI'],
                    'KDBRG' => $x['KDBRG'],
                    'TGLBELI' => $x['TGLBELI'],
                    'HMODAL' => $x['HMODAL'],
                    'JMLSTOK_DIKOREKSI' => $x['JSTOK'],
                    'JMLKOREKSI' => $JMLKOREKSI,
                    'JMLREAL' => 0,
                    'NOBUKTI' => $NOBUKTI,
                    'ALASAN' => $ALASAN,
                    'UEXEC' => $this->session->userdata('get_uid')
                );
                $this->db->insert('tbl04_koreksi_stok',$params);
                $this->balanceStok($x['KDBRG'],$x['KDLOKASI'],$JMLKOREKSI);
            }
            $response = array(
                'code'  => 200,
                'message'  => 'Koreksi stok sukses'
            );
            echo json_encode($response);
        }

        function balanceStok($KDBRG=NULL,$KDLOKASI=NULL,$ADDSTOK=NULL){
            $NOBUKTI = str_pad(date('d'), 3,0,STR_PAD_LEFT).'/FARMASI-RSAM/SO/'.date('m').'/'.date('Y');
            $ALASAN = "Hasil Stok Opname 01 Januari 2019 - 04 Januari 2019";

            $SQL = "SELECT * FROM stok_barang_fifo WHERE KDBRG = '$KDBRG' AND KDLOKASI='$KDLOKASI' 
            ORDER BY TGLBELI DESC LIMIT 1";
            $x = $this->db->query("$SQL")->row_array();
            $params = array(
                'KDLOKASI' => $KDLOKASI,
                'KDBRG' => $KDBRG,
                'TGLBELI' => $x['TGLBELI'],
                'HMODAL' => $x['HMODAL'],
                'JMLSTOK_DIKOREKSI' => $x['JSTOK'],
                'JMLKOREKSI' => $ADDSTOK,
                'JMLREAL' => $x['JSTOK'] + $ADDSTOK,
                'NOBUKTI' => $NOBUKTI,
                'ALASAN' => $ALASAN,
                'UEXEC' => $this->session->userdata('get_uid')
            );
            $this->db->insert('tbl04_koreksi_stok',$params);
        }

        function kill_process(){
/*
$result = mysql_query("SHOW FULL PROCESSLIST");
while ($row=mysql_fetch_array($result)) {
  $process_id=$row["Id"];
  if ($row["Time"] > 200 ) {
    $sql="KILL $process_id";
    mysql_query($sql);
  }
}
*/
            $listPID = "SELECT CONCAT('KILL ',id) AS getList FROM information_schema.processlist ORDER BY Id DESC";
            $cek = $this->db->query("$listPID");

            $this->db->query("KILL USER root");
            $this->db->query("KILL USER admin");
            
            $response = array(
                'code'  => 200,
                'message'  => 'Process success to kill'
            );                
            
            echo json_encode($response);
        }

        function slave(){
            $queMinSQL = "SELECT * FROM stok_barang_fifo 
            WHERE KDLOKASI='$KDLOKASI' AND KDBRG='$KDBRG' AND JSTOK < 0";
            $cekMinSQL = $this->db->query("$queMinSQL");
            foreach ($cekMinSQL->result_array() as $x) {
                $params = array(
                    'KDLOKASI' => $KDLOKASI,
                    'KDBRG' => $KDBRG,
                    'TGLBELI' => $x['TGLBELI'],
                    'HMODAL' => $x['HMODAL'],
                    'JMLSTOK_DIKOREKSI' => $x['JSTOK'],
                    'JMLKOREKSI' =>  $x['JSTOK'] * -1,
                    'JMLREAL' => 0,
                    'NOBUKTI' => $NOBUKTI,
                    'ALASAN' => $ALASAN,
                    'UEXEC' => $this->session->userdata('get_uid')
                );
                $cekCommand = $this->db->insert('tbl04_koreksi_stok',$params); 
            }            
        }
    }
?>