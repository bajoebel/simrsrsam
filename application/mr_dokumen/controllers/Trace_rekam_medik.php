<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class trace_rekam_medik extends CI_Controller{
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
        $this->session->unset_userdata('sPage');
        $this->session->unset_userdata('sLike');
        $this->session->unset_userdata('sIdRuang');
        $this->session->unset_userdata('sTglLayanan');
        $this->session->unset_userdata('sTrace');
        
        if($ses_state){
            $x['header'] = $this->load->view('template/header','',true);
            $z = setNav("nav_4"); 
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);
            $y['index_menu'] = 4;

            $params = array('20','23','28','33','34','35','36','37','38','40','41');
            $this->db->where_in('grid',array('1','3'));
            $this->db->where_not_in('idx',$params);
            $y['datRuang'] = $this->db->get('tbl01_ruang');

            $y['contentTitle'] = "Tracer Rekam Medik";        
            $x['content'] = $this->load->view('trace_rekam_medik/template_table',$y,true);
            $this->load->view('template/theme',$x);
        }else{
            $url_login = base_url().'mr_dokumen.php/login?sid='.getSessionID();
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

        $limit = $this->perPage;
        
        $condition = " WHERE a.id_ruang IN(SELECT idx FROM tbl01_ruang WHERE grid IN (1,3)) 
        AND a.nomr NOT IN(SELECT nomr FROM tbl01_pasien 
        WHERE DATE_FORMAT(tgl_daftar,'%Y-%m-%d') = DATE_FORMAT(NOW(),'%Y-%m-%d')) AND `id_pendaftaranonline` IS NULL ";

        if(isset($_POST['state_trace'])){
            $sTrace = $this->input->post('state_trace',true);
            if ($sTrace=="0") {
                $condition .= " AND b.idx IS NULL ";
            }elseif($sTrace=="1"){
                $condition .= " AND b.idx IS NOT NULL";
            }else{
                $condition .= " ";
            }
            $this->session->set_userdata('sTrace',$sTrace);
        }else{
            if($this->session->userdata('sTrace')){
                $sTrace = $this->session->userdata('sTrace');
                if ($sTrace=="0") {
                    $condition .= " AND b.idx IS NULL ";
                }elseif($sTrace=="1"){
                    $condition .= " AND b.idx IS NOT NULL";
                }else{
                    $condition .= " ";
                }
            }
        }

        if(isset($_POST['sLike'])){
            $offset = 0;
            $sLike = $this->db->escape_str($this->input->post('sLike',true));
            $condition .= " AND (a.nomr LIKE '%$sLike%' OR a.id_daftar LIKE '%$sLike%' OR a.reg_unit LIKE '%$sLike%')";
            $this->session->set_userdata('sLike',$sLike);
        }else{
            if($this->session->userdata('sLike')){
                $sLike = $this->session->userdata('sLike');
                $condition .= " AND (a.nomr LIKE '%$sLike%' OR a.id_daftar LIKE '%$sLike%' OR a.reg_unit LIKE '%$sLike%')";
            }
        }

        if(isset($_POST['id_ruang'])):
            $id_ruang = $this->input->post('id_ruang');
            if ($id_ruang == "ALL") {
                $condition .= " ";
            }else{
                $condition .= " AND a.id_ruang = '$id_ruang' ";
            }
            $this->session->set_userdata('sIdRuang',$id_ruang);
        else:
            if($this->session->userdata('sIdRuang')){
                $id_ruang = $this->session->userdata('sIdRuang');
                if ($id_ruang == "ALL") {
                    $condition .= " ";
                }else{
                    $condition .= " AND a.id_ruang = '$id_ruang' ";
                }
            }
        endif;        

        if(isset($_POST['tglLayanan'])):
            $tglLayanan = setDateEng($this->input->post('tglLayanan'));
            $condition .= " AND DATE_FORMAT(a.tgl_masuk,'%Y-%m-%d') = '$tglLayanan' ";
            $this->session->set_userdata('sTglLayanan',$tglLayanan);
        else:
            if($this->session->userdata('sTglLayanan')){
                $tglLayanan = $this->session->userdata('sTglLayanan');
                $condition .= " AND DATE_FORMAT(a.tgl_masuk,'%Y-%m-%d') = '$tglLayanan' ";
            }else{
                $condition .= " AND DATE_FORMAT(a.tgl_masuk,'%Y-%m-%d') = DATE_FORMAT(NOW(),'%Y-%m-%d') ";
            }
        endif;

        $SQL = "SELECT a.*,IFNULL(b.idx,0) AS state_trace 
        FROM tbl02_pendaftaran a 
        LEFT JOIN tbl02_tracer_mr b ON a.reg_unit=b.reg_unit
        $condition";
        $SQL_Count = $this->db->query("$SQL");
        $totalRec = $SQL_Count->num_rows();
        $config['loading']      = '<tr><td colspan=9>Silahkan tunggu... Aplikasi sedang mengambil data.</td></tr>';
        $config['target']      = 'tbody#getdata';
        $config['uri_segment']  = $this->uri_segment;
        $config['base_url']    = base_url().'mr_dokumen.php/trace_rekam_medik/getView';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $limit;
        $this->ajax_page->initialize($config);

        $x['offset'] = $offset;
        
        $x['SQL'] = $this->db->query("$SQL LIMIT $offset,$limit");
        //echo "$SQL LIMIT $offset,$limit";
        //exit;
        $this->load->view('trace_rekam_medik/getdata',$x);
    }

    function setPrint(){
        $kode = $_GET['kode'];
        $this->db->where('reg_unit',$kode);
        $cekQuery = $this->db->get('tbl02_tracer_mr');
        if($cekQuery->num_rows() > 0){
            $x = $cekQuery->row_array();
            $this->load->view('trace_rekam_medik/v_registrasi',$x);   
        }else{
            echo "<script>alert('Ops. Data pendaftaran pasien tidak ditemukan. Silahkan coba kembali.');
            window.close();</script>";                
        }            
    }
    
    function updateState(){
        $idx = $this->input->post('idx',true);
        $userExec = getUserID();
        $sid = getSessionID();
        $CEKSQL= "SELECT * FROM tbl02_tracer_mr WHERE reg_unit='$idx'";
        $cek= $this->db->query("$CEKSQL")->num_rows();
        if(!$cek){
            $SQL = "INSERT INTO tbl02_tracer_mr
            (SELECT NULL,id_daftar,reg_unit,nomr,nama_pasien,tempat_lahir,tgl_lahir,jns_kelamin,jns_layanan,tgl_masuk,
            id_ruang,nama_ruang,no_urut_unit,id_rujuk,rujukan,no_rujuk,asal_ruang,nama_asal_ruang,
            dokter_pengirim,nama_dokter_pengirim,id_cara_bayar,cara_bayar,no_bpjs,no_jaminan,tgl_jaminan,'$userExec','$sid' 
            FROM tbl02_pendaftaran WHERE reg_unit = '$idx')";

            $cek = $this->db->query("$SQL");
            if ($cek) {
                $response['code'] = 200;
                $response['message'] = null;
            } else {
                $response['code'] = 401;
                $response['message'] = 'Ops. ada kesalahan query. Silahkan hubungi administrator.';
            }
            echo json_encode($response);
        }else{
            $response['code'] = 200;
            $response['message'] = 'OK';
        }
        
    }
    function updateState2(){
        $idx = $this->input->post('idx',true);
        $SQL = "DELETE FROM tbl02_tracer_mr WHERE reg_unit = '$idx'";
        $cek = $this->db->query("$SQL");
        if($cek){
            $response['code'] = 200;
            $response['message'] = null;
        }else{
            $response['code'] = 401;
            $response['message'] = 'Ops. ada kesalahan query. Silahkan hubungi administrator.';
        }
        echo json_encode($response);
    } 
    function updateState3(){
        $reg_unit = $this->input->post('reg_unit',true);
        $userExec = getUserID();
        $sid = getSessionID();

        $SQL = "INSERT INTO tbl02_tracer_mr
        (SELECT NULL,tbl02_pendaftaran.id_daftar,reg_unit,nomr,nama_pasien,tempat_lahir,tgl_lahir,jns_kelamin,jns_layanan,tgl_masuk,
        id_ruang,nama_ruang,no_urut_unit,id_rujuk,rujukan,no_rujuk,asal_ruang,nama_asal_ruang,
        dokter_pengirim,nama_dokter_pengirim,id_cara_bayar,cara_bayar,no_bpjs,no_jaminan,tgl_jaminan,'$userExec','$sid',no_antrian_poly 
        FROM tbl02_pendaftaran LEFT JOIN tbl02_antrian ON tbl02_antrian.id_daftar=tbl02_pendaftaran.id_daftar WHERE reg_unit = '$reg_unit')";
        $cek = $this->db->query("$SQL");
        if($cek){
            $response['code'] = 200;
            $response['message'] = null;
        }else{
            $response['code'] = 401;
            $response['message'] = 'Ops. ada kesalahan query. Silahkan hubungi administrator.';
        }
        echo json_encode($response);
    } 
}
?>