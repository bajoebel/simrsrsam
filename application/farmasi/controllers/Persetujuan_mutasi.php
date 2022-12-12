<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class persetujuan_mutasi extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->perPage = 10;
        $this->offset = 0;
        $this->uri_segment = 3;

        $this->load->library('ajax_page');
        $this->load->model('users_model');
    }
    function index(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            $x['header'] = $this->load->view('template/header','',true);
            $z = setNav("nav_6");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);

            $UID = $this->session->userdata('get_uid');
            $SQL = "SELECT * FROM tbl04_lokasi WHERE KDLOKASI IN(SELECT ruang_akses 
            FROM tbl01_users_farmasi WHERE NRP = '$UID')";

            $y['contentTitle'] = "Transaksi Barang Mutasi";        
            $y['getRuang'] = $this->db->query("$SQL");
            $x['content'] = $this->load->view('persetujuan_mutasi/template_ruang',$y,true);
            $this->load->view('template/theme',$x);
        }else{
            $url_login = base_url().'farmasi.php/login?sid='.$getSessionID();
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login'
            </script>";
        }
    }

    function goForm(){
        $ses_state = $this->users_model->cek_session_id();
        $this->session->unset_userdata('sPage');
        $this->session->unset_userdata('sLike');
        if($ses_state){
            if (isset($_GET['kLok'])) {
                $y['kLok'] = $this->input->get('kLok',true);
                if ($y['kLok']=="") {
                    echo "<script>alert('Ops. Lokasi tidak ditemukan.');history.back();</script>";                        
                }else{
                    $x['header'] = $this->load->view('template/header','',true);
                    $z = setNav("nav_6");
                    $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);

                    $y['contentTitle'] = "Transaksi Pesetujuan Mutasi";
                    $y['contentTitle'] .= "<br/>Tujuan Barang : " . getLokasiById($y['kLok']);        
                    $x['content'] = $this->load->view('persetujuan_mutasi/template_table',$y,true);
                    $this->load->view('template/theme',$x);
                }
            }else{
                echo "<script>alert('Ops. Variable tidak ditemukan.');history.back();</script>";
            }
        }else{
            $url_login = base_url().'farmasi.php/login?sid='.getSessionID();
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login';</script>";
        }            
    }

    function getView(){
        if(isset($_POST['page'])):
            $offset = $this->input->post('page');
            $this->session->set_userdata('sPage',$offset);
        else:
            $offset = ($this->session->userdata('sPage')) ? $this->session->userdata('sPage') : 0;
        endif;

        $KDLOKASI = (isset($_POST['kLok'])) ? $this->input->post('kLok',true) : "";
        $limit = $this->perPage;
        $condition = "WHERE LOKASI_TUJUAN='$KDLOKASI' ";
        if(isset($_POST['sLike'])){
            $offset = 0;
            $sLike = $this->db->escape_str($this->input->post('sLike',true));
            $condition .= "AND (KDMT LIKE '%$sLike%' OR NAMA_LOKASI_ASAL LIKE '%$sLike%')";
            $this->session->set_userdata('sLike',$sLike);
        }else{
            if($this->session->userdata('sLike')){
                $sLike = $this->session->userdata('sLike');
                $condition .= "AND (KDMT LIKE '%$sLike%' OR NAMA_LOKASI_ASAL LIKE '%$sLike%')";
            }
        }

        $SQL = "SELECT *,COUNT(KDBRG) AS JML_ITEM, SUM(JMLRET) AS TOTAL_RET FROM tbl04_mutasi
        JOIN tbl04_mutasi_detail ON tbl04_mutasi.KDMT = tbl04_mutasi_detail.KDMT  $condition GROUP BY tbl04_mutasi.KDMT ORDER BY tbl04_mutasi.KDMT DESC";
        echo $SQL;
        $SQL_Count = $this->db->query("$SQL");
        $totalRec = $SQL_Count->num_rows();
        $config['target']      = 'tbody#getdata';
        $config['uri_segment']  = $this->uri_segment;
        $config['base_url']    = base_url().'farmasi.php/persetujuan_mutasi/getView';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $limit;
        $this->ajax_page->initialize($config);

        $x['offset'] = $offset;
        $x['SQL'] = $this->db->query("$SQL LIMIT $offset,$limit");
        $this->load->view('persetujuan_mutasi/get_data',$x);
    }
    function detail_mutasi($kdmt=""){
        $ses_state = $this->users_model->cek_session_id();
        
        if($ses_state){
            $this->db->where('tbl04_mutasi.KDMT',$kdmt);
            $this->db->join('tbl04_mutasi_detail','tbl04_mutasi.KDMT=tbl04_mutasi_detail.KDMT','LEFT');
            $data=$this->db->get('tbl04_mutasi')->result();
            $list=array(
                'status'    => true,
                'message'   => "OK",
                'data'     => $data
            );
            header('Content-Type: application/json');
            echo json_encode($list);
        }else{
            $data = "<tr><td>Maaf anda tidak punya akses</td></tr>";
            $list=array(
                'status'    => false,
                'message'   => "Maaf anda tidak punya akses",
                'data'     => $data
            );
            header('Content-Type: application/json');
            echo json_encode($list);
        }
    }
    function setujui(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            $idx=$this->input->post('IDX');
            foreach ($idx as $i) {
                $penerimaan=$this->input->post("STATUSPENERIMAAN".$i);
                $this->db->where('KDMT',$this->input->post('KDMT'.$i));
                $this->db->where('KDBRG', $this->input->post('KDBRG'.$i));
                $cek=$this->db->get('tbl04_mutasi_persetujuan')->num_rows();
                if($cek <=0){
                    $persetujuan[]=array(
                        'KDMT'  => $this->input->post('KDMT'.$i),
                        'KDBRG' => $this->input->post('KDBRG'.$i),
                        'NMBRG' => $this->input->post('NMBRG'.$i),
                        'HMODAL'=> $this->input->post('HMODAL'.$i),
                        'TGLBELI'=> $this->input->post('TGLBELI'.$i),
                        'JMLMT' => $this->input->post('JMLMT'.$i),
                        'UEXEC'=> getUserID()
                    );
                }
                if($penerimaan==1){
                    $detail[]=array(
                        'IDX'   => $i,
                        'STATUSPENERIMAAN'=>1
                    );
                }
                
            }
            if(!empty($detail)) $this->db->update_batch('tbl04_mutasi_detail', $detail, 'IDX');
            if(!empty($persetujuan)) {
                $this->db->insert_batch('tbl04_mutasi_persetujuan',$persetujuan);
                $list=array(
                    'status'    => true,
                    'message'   => "Data Mutasi Berhasil diaprove",
                );
            }else{
                $list=array(
                    'status'    => true,
                    'message'   => "Data Sudah diaprove sebelumya",
                );
            }
            
            header('Content-Type: application/json');
            echo json_encode($list);
        }else{
            $list=array(
                'status'    => false,
                'message'   => "Maaf anda tidak punya akses",
            );
            header('Content-Type: application/json');
            echo json_encode($list);
        }
    }

    function return_mutasi(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            $idx=$this->input->post('IDX');
            $return=array(
                'DTMT_RET'  => date('Y-m-d H:i:s'),
                'TGL_RETUR'   => date('Y-m-d'),
                'KDMT'      => $this->input->post('KDMT'),
                'LOKASI_ASAL'=> $this->input->post('LOKASI_ASAL'),
                'NAMA_LOKASI_ASAL'=> $this->input->post('NAMA_LOKASI_ASAL'),
                'LOKASI_TUJUAN'=> $this->input->post('LOKASI_TUJUAN'),
                'NAMA_LOKASI_TUJUAN'=> $this->input->post('NAMA_LOKASI_TUJUAN'),
                'ALASAN_RET'    => $this->input->post('ALASAN_RET'),
                'UEXEC' => getUserID()
            );
            $this->db->insert('tbl04_mutasi_retur',$return);

            //Cek KDMT_RET
            $this->db->where('UEXEC',getUserID());
            $this->db->where('KDMT',$this->input->post('KDMT'));
            $row=$this->db->get('tbl04_mutasi_retur')->row();
            if(!empty($row)) $KDMT_RET = $row->KDMT_RET; else $KDMT_RET="";

            //Simpan Detail Return
            //$error[]="";
            $TOTAL_RET=0;
            foreach ($idx as $i) {
                $JMLRET=$this->input->post("JMLRET".$i);
                $TOTAL_RET+=$JMLRET;
                if(!empty($JMLRET)){
                    $SUDAHRETUR=$this->input->post('SUDAHRETUR'.$i);
                    $JMLMT = $this->input->post('JMLMT'.$i);
                    $SISA = $JMLMT-$SUDAHRETUR;
                    if($SISA<0){
                        $error[]=array(
                            'idx' => $i,
                            'message'=> "Jumlah Retur Melebihi Jumlah Mutasi"
                        );
                    }else{
                        $detail[]=array(
                            'KDMT_RET'  => $KDMT_RET,
                            'KDBRG'     => $this->input->post('KDBRG'.$i),
                            'NMBRG'     => $this->input->post('NMBRG'.$i),
                            'HMODAL'    => $this->input->post('HMODAL'.$i),
                            'TGLBELI'   => $this->input->post('TGLBELI'.$i),
                            'JMLRET'    => $this->input->post('JMLRET'.$i)
                        );

                        $update[]=array(
                            'IDX'=> $i,
                            'JMLRET'=> $this->input->post('JMLRET'.$i),
                            'SISA'  => $SISA
                        );
                    }
                }
            }
            if(!empty($error)){
                $list=array(
                    'status'    => false,
                    'message'   => "Data yang diinput belum valid",
                    'error'     => $error
                );
            }else{
                $error=array();
                if($TOTAL_RET>0){
                    if(!empty($update)) $this->db->update_batch('tbl04_mutasi_detail', $update, 'IDX');
                    if(!empty($detail)) $this->db->insert_batch('tbl04_mutasi_retur_detail', $detail);
                    $list=array(
                        'status'    => true,
                        'message'   => "Transaksi Retur Mutasi berhasil",
                        'error'     => $error
                    );
                }else{
                    $list=array(
                        'status'    => false,
                        'message'   => "Jumlah barang yang akan direturn belum diisi",
                        'error'     => $error
                    );
                }
                    
            }
            header('Content-Type: application/json');
            echo json_encode($list);
        }else{
            $list=array(
                'status'    => false,
                'message'   => "Maaf anda tidak punya akses",
            );
            header('Content-Type: application/json');
            echo json_encode($list);
        }
    }
}
?>