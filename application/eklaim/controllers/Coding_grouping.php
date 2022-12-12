<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class coding_grouping extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->perPage = 10;
        $this->offset = 0;
        $this->uri_segment = 3;

        $this->load->library('ajax_page');
        $this->load->model('users_model');
    }
    function index(){
        $ses_state = $this->session->userdata('isLogin');
        $this->session->unset_userdata('sPage');
        $this->session->unset_userdata('sLike');
        
        if($ses_state){
            $y['contentTitle'] = "SIMRS - KLAIM";        
            $y['breadcrumbTitle'] = "SIMRS - KLAIM";   
            
            $z = setNav("nav_3");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);

            $this->load->view('template/template_header',$x);
            $this->load->view('coding_grouping/main',$y);
            $this->load->view('template/template_footer');
        }else{
            $url_login = base_url().'index.php/login?sid='.session_id();
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login'
            </script>";
        }
    }

    function get_aplication_json(){
        $json = file_get_contents('php://input');
        $obj = json_decode($json,true);
        if (
            isset($obj['metadata']['method']) && 
            isset($obj['data']['nomor_kartu']) && 
            isset($obj['data']['nomor_sep']) && 
            isset($obj['data']['nomor_rm']) && 
            isset($obj['data']['nama_pasien']) && 
            isset($obj['data']['tgl_lahir']) && 
            isset($obj['data']['gender'])
        ) {
            $allHeaders = getallheaders();
            $contentType = $allHeaders['Content-Type'];
            echo $contentType;
        }else{
            echo "Var not found";
        }
        echo json_encode($obj['data']);
    }

    function new_claim(){
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $json = file_get_contents('php://input');
            $obj = json_decode($json,true);

            $response = initCURL($obj);
            $first  = strpos($response, "\n")+1;
            $last   = strrpos($response, "\n")-1;
            $response  = substr($response, $first, strlen($response) - $first - $last);
            $response = inacbg_decrypt($response,keyValue());
            $response = json_decode($response,true);
        }else{
            $response = array(
                'metadata' => array(
                    'code' => 500,
                    'message' => '',
                    'error_no' => 'SE0002'
                )
            );
        }
        echo json_encode($response);
    }

    function update_patient(){
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $json = file_get_contents('php://input');
            $obj = json_decode($json,true);
            
            $response = initCURL($obj);
            $first  = strpos($response, "\n")+1;
            $last   = strrpos($response, "\n")-1;
            $response  = substr($response, $first, strlen($response) - $first - $last);
            $response = inacbg_decrypt($response,keyValue());
            $response = json_decode($response,true);
        }else{
            $response = array(
                'metadata' => array(
                    'code' => 500,
                    'message' => '',
                    'error_no' => 'SE0002'
                )
            );
        }
        echo json_encode($response);
    }
    function delete_patient(){
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $json = file_get_contents('php://input');
            $obj = json_decode($json,true);
            
            $response = initCURL($obj);
            $first  = strpos($response, "\n")+1;
            $last   = strrpos($response, "\n")-1;
            $response  = substr($response, $first, strlen($response) - $first - $last);
            $response = inacbg_decrypt($response,keyValue());
            $response = json_decode($response,true);            
        }else{
            $response = array(
                'metadata' => array(
                    'code' => 500,
                    'message' => '',
                    'error_no' => 'SE0002'
                )
            );
        }
        echo json_encode($response);
    }
    function set_claim_data(){
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $json = file_get_contents('php://input');
            $obj = json_decode($json,true);
            
            $response = initCURL($obj);
            $first  = strpos($response, "\n")+1;
            $last   = strrpos($response, "\n")-1;
            $response  = substr($response, $first, strlen($response) - $first - $last);
            $response = inacbg_decrypt($response,keyValue());
            $response = json_decode($response,true);
        }else{
            $response = array(
                'metadata' => array(
                    'code' => 500,
                    'message' => '',
                    'error_no' => 'SE0002'
                )
            );
        }
        echo json_encode($response);
    }
    function grouper(){
        // For Grouper 1 dan 2
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $json = file_get_contents('php://input');
            $obj = json_decode($json,true);

            $response = initCURL($obj);
            $first  = strpos($response, "\n")+1;
            $last   = strrpos($response, "\n")-1;
            $response  = substr($response, $first, strlen($response) - $first - $last);
            $response = inacbg_decrypt($response,keyValue());
        }else{
            $response = array(
                'metadata' => array(
                    'code' => 500,
                    'message' => '',
                    'error_no' => 'SE0002'
                )
            );
        }
        echo json_encode($response);       
    }

    function reedit_claim(){
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $json = file_get_contents('php://input');
            $obj = json_decode($json,true);

            $response = initCURL($obj);
            $first  = strpos($response, "\n")+1;
            $last   = strrpos($response, "\n")-1;
            $response  = substr($response, $first, strlen($response) - $first - $last);
            $response = inacbg_decrypt($response,keyValue());
        }else{
            $response = array(
                'metadata' => array(
                    'code' => 500,
                    'message' => '',
                    'error_no' => 'SE0002'
                )
            );
        }
        echo json_encode($response);       
    }

    function pull_claim(){
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $json = file_get_contents('php://input');
            $obj = json_decode($json,true);

            $response = initCURL($obj);
            $first  = strpos($response, "\n")+1;
            $last   = strrpos($response, "\n")-1;
            $response  = substr($response, $first, strlen($response) - $first - $last);
            $response = inacbg_decrypt($response,keyValue());
        }else{
            $response = array(
                'metadata' => array(
                    'code' => 500,
                    'message' => '',
                    'error_no' => 'SE0002'
                )
            );
        }
        echo json_encode($response);       
    }

    function get_claim_data(){
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $json = file_get_contents('php://input');
            $obj = json_decode($json,true);

            $response = initCURL($obj);
            $first  = strpos($response, "\n")+1;
            $last   = strrpos($response, "\n")-1;
            $response  = substr($response, $first, strlen($response) - $first - $last);
            $response = inacbg_decrypt($response,keyValue());
        }else{
            $response = array(
                'metadata' => array(
                    'code' => 500,
                    'message' => '',
                    'error_no' => 'SE0002'
                )
            );
        }
        echo json_encode($response);       
    }

    function delete_claim(){
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $json = file_get_contents('php://input');
            $obj = json_decode($json,true);

            $response = initCURL($obj);
            $first  = strpos($response, "\n")+1;
            $last   = strrpos($response, "\n")-1;
            $response  = substr($response, $first, strlen($response) - $first - $last);
            $response = inacbg_decrypt($response,keyValue());
        }else{
            $response = array(
                'metadata' => array(
                    'code' => 500,
                    'message' => '',
                    'error_no' => 'SE0002'
                )
            );
        }
        echo json_encode($response);       
    }
    
    function get_claim_status(){
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $json = file_get_contents('php://input');
            $obj = json_decode($json,true);

            $response = initCURL($obj);
            $first  = strpos($response, "\n")+1;
            $last   = strrpos($response, "\n")-1;
            $response  = substr($response, $first, strlen($response) - $first - $last);
            $response = inacbg_decrypt($response,keyValue());
        }else{
            $response = array(
                'metadata' => array(
                    'code' => 500,
                    'message' => '',
                    'error_no' => 'SE0002'
                )
            );
        }
        echo json_encode($response);       
    }

    function claim_print(){
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $json = file_get_contents('php://input');
            $obj = json_decode($json,true);

            $response = initCURL($obj);
            $first  = strpos($response, "\n")+1;
            $last   = strrpos($response, "\n")-1;
            $response  = substr($response, $first, strlen($response) - $first - $last);
            $response = inacbg_decrypt($response,keyValue());
            $msg = json_decode($response,true);
            $pdf = base64_decode($msg["data"]);
            file_put_contents("klaim_".$obj["data"]["nomor_sep"].".pdf",$pdf);
            header("Content-type:application/pdf");
            header("Content-Disposition:attachment;filename=klaim_".$obj["data"]["nomor_sep"].".pdf");
            echo $pdf; 
        }else{
            $response = array(
                'metadata' => array(
                    'code' => 500,
                    'message' => '',
                    'error_no' => 'SE0002'
                )
            );
            echo json_encode($response);       
        }
    }


    function tambah(){
        $ses_state = $this->session->userdata('isLogin');
        if($ses_state){
            $z = setNav("nav_3");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);
            $this->load->view('template/template_header',$x);

            $koderuang = $this->uri->segment(3);
            $kodekelas = $this->uri->segment(4);
            if ($koderuang == "" || $kodekelas == "") {
                $y['contentTitle'] = "Entry SIMRS - KLAIM";        
                $y['breadcrumbTitle'] = "Entry SIMRS - KLAIM";   
            }else{
                $y['contentTitle'] = "Update SIMRS - KLAIM";        
                $y['breadcrumbTitle'] = "Update SIMRS - KLAIM";                       
            }
            $SQL = "SELECT * FROM tbl_ketersedian_kamar WHERE koderuang='$koderuang' AND kodekelas='$kodekelas'";
            $cek = $this->db->query("$SQL");
            if ($cek->num_rows() > 0) {
                $res = $cek->row_array();
                $y['koderuang'] = $res['koderuang'];
                $y['namaruang'] = $res['namaruang'];
                $y['kodekelas'] = $res['kodekelas'];
                $y['namakelas'] = $res['namakelas'];
                $y['kapasitas'] = $res['kapasitas'];
                $y['tersedia'] = $res['tersedia'];
                $y['tersediapria'] = $res['tersediapria'];
                $y['tersediawanita'] = $res['tersediawanita'];
                $y['tersediapriawanita'] = $res['tersediapriawanita'];
            }else{
                $y['koderuang'] = "";
                $y['namaruang'] = "";
                $y['kodekelas'] = "";
                $y['namakelas'] = "";
                $y['kapasitas'] = "0";
                $y['tersedia'] = "0";
                $y['tersediapria'] = "0";
                $y['tersediawanita'] = "0";
                $y['tersediapriawanita'] = "0";
            }

            $this->db->order_by('grNama','ASC');
            $y['dataruang'] = $this->db->get('tbl_ruang');
            $this->load->view('coding_grouping/entry',$y);
            $this->load->view('template/template_footer');
        }else{
            $url_login = base_url().'index.php/login?sid='.session_id();
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login'
            </script>";
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

        $condition = "";
        if(isset($_POST['sLike'])){
            $offset = 0;
            $sLike = $this->db->escape_str($this->input->post('sLike',true));
            $condition .= "WHERE namaruang LIKE '%$sLike%'";
            $this->session->set_userdata('sLike',$sLike);

        }else{
            if($this->session->userdata('sLike')){
                $sLike = $this->session->userdata('sLike');
                $condition .= "WHERE namaruang LIKE '%$sLike%'";
            }
        }

        $SQL = "SELECT * FROM tbl_ketersedian_kamar $condition ORDER BY namaruang";
        $SQL_Count = $this->db->query("$SQL");
        $totalRec = $SQL_Count->num_rows();
        $config['target']      = 'tbody#getdata';
        $config['uri_segment']  = $this->uri_segment;
        $config['base_url']    = base_url().'index.php/coding_grouping/getView';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $limit;
        $this->ajax_page->initialize($config);

        $x['result'] = $SQL_Count->result_array();
        $x['offset'] = $offset;
        $x['SQL'] = $this->db->query("$SQL LIMIT $offset,$limit");
        $this->load->view('coding_grouping/getdata',$x);
    }       

    function simpan(){
        $ses_state = $this->session->userdata('isLogin');
        if($ses_state){
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                if(
                    isset($_POST['koderuang']) && 
                    isset($_POST['namaruang']) && 
                    isset($_POST['kodekelas']) && 
                    isset($_POST['namakelas']) && 
                    isset($_POST['kapasitas']) && 
                    isset($_POST['tersedia']) && 
                    isset($_POST['tersediapria']) && 
                    isset($_POST['tersediawanita']) && 
                    isset($_POST['tersediapriawanita']) 
                ){
                    $koderuang = trim($this->input->post('koderuang',true));
                    $namaruang = trim($this->input->post('namaruang',true));
                    $kodekelas = trim($this->input->post('kodekelas',true));
                    $namakelas = trim($this->input->post('namakelas',true));
                    $kapasitas = trim($this->input->post('kapasitas',true));
                    $tersedia = trim($this->input->post('tersedia',true));
                    $tersediapria = trim($this->input->post('tersediapria',true));
                    $tersediawanita = trim($this->input->post('tersediawanita',true));
                    $tersediapriawanita = trim($this->input->post('tersediapriawanita',true));

                    $SQL = "SELECT * FROM tbl_ketersedian_kamar WHERE koderuang='$koderuang' AND kodekelas='$kodekelas'";
                    $cek = $this->db->query("$SQL");
                    if ($cek->num_rows() > 0) {
                        $params = array(
                            'kapasitas' => $kapasitas,
                            'tersedia' => $tersedia,
                            'tersediapria' => $tersediapria,
                            'tersediawanita' => $tersediawanita,
                            'tersediapriawanita' => $tersediapriawanita
                        );
                        $this->db->where('koderuang',  $koderuang);
                        $this->db->where('kodekelas',  $kodekelas);
                        $cekCommand = $this->db->update('tbl_ketersedian_kamar',$params); 
                        if($cekCommand){
                            $qParams = array(
                                'kodekelas' => $kodekelas,
                                'koderuang' => $koderuang,
                                'namaruang' => $namaruang,
                                'kapasitas' => $kapasitas,
                                'tersedia' => $tersedia,
                                'tersediapria' => $tersediapria,
                                'tersediawanita' => $tersediawanita,
                                'tersediapriawanita' => $tersediapriawanita
                            );
                            $qUpdate = $this->updateBed(json_encode($qParams));   
                            if ($qUpdate['code'] == 1) {
                                $response['code'] = 201;
                                $response['message'] = "WsLokal:Update data sukses.\nWsKemenkes:".$qUpdate['message'];
                            }else{
                                $response['code'] = 201;
                                $response['message'] = "WsLokal:Update data sukses.\nWsKemenkes:".$qUpdate['message'];
                            }
                        }else{
                            $response['code'] = 401;
                            $response['message'] = "Ops. Query error! Silahkan hubungi administrator.";
                        }                            
                    }else{
                        $params = array(
                            'koderuang' => $koderuang,
                            'namaruang' => $namaruang,
                            'kodekelas' => $kodekelas,
                            'namakelas' => $namakelas,
                            'kapasitas' => $kapasitas,
                            'tersedia' => $tersedia,
                            'tersediapria' => $tersediapria,
                            'tersediawanita' => $tersediawanita,
                            'tersediapriawanita' => $tersediapriawanita
                        );
                        $cekCommand = $this->db->insert('tbl_ketersedian_kamar',$params); 
                        if($cekCommand){
                            $qParams = array(
                                'kodekelas' => $kodekelas,
                                'koderuang' => $koderuang,
                                'namaruang' => $namaruang,
                                'kapasitas' => $kapasitas,
                                'tersedia' => $tersedia,
                                'tersediapria' => $tersediapria,
                                'tersediawanita' => $tersediawanita,
                                'tersediapriawanita' => $tersediapriawanita
                            );
                            $qInsert = $this->createBed(json_encode($qParams));
                            if ($qInsert['code'] == 1) {
                                $response['code'] = 200;
                                $response['message'] = "WsLokal:Simpan data sukses.\nWsKemenkes:".$qInsert['message'];
                            }else{
                                $response['code'] = 200;
                                $response['message'] = "WsLokal:Simpan data sukses.\nWsKemenkes:".$qInsert['message'];
                            }
                        }else{
                            $response['code'] = 402;
                            $response['message'] = "Ops. Query error! Silahkan hubungi administrator.";
                        }
                    }
                }else{
                    $response['code'] = 403;
                    $response['message'] = "Ops. Variable tidak ditemukan. Coba ulangi kembali.";
                }
            }else{
                $response['code'] = 404;
                $response['message'] = "Ops. Method tidak diizinkan. Coba ulangi kembali.";
            }
        }else{
            $response['code'] = 405;
            $response['message'] = "Ops. Sesi anda telah berubah! Silahkan login kembali";
        }
        echo json_encode($response);
    }

    function hapus(){
        $ses_state = $this->session->userdata('isLogin');
        if($ses_state){
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                if(
                    isset($_POST['kodekelas']) &&
                    isset($_POST['koderuang'])
                ){
                    $kodekelas = $this->input->post('kodekelas',true);
                    $koderuang = $this->input->post('koderuang',true);

                    if($kodekelas == "" || $koderuang == ""){
                        $response['code'] = 401;
                        $response['message'] = "Ops. Query empty! Coba ulangi kembali.";
                    }else{
                        $SQL = "DELETE FROM tbl_ketersedian_kamar 
                        WHERE kodekelas = '$kodekelas' AND koderuang='$koderuang'";
                        $cekCommand = $this->db->query("$SQL"); 
                        if($cekCommand){
                            $x['kodekelas'] = $kodekelas;
                            $x['koderuang'] = $koderuang;
                            $qDelete = $this->deleteBed(json_encode($x));
                            if ($qDelete['code'] == 1) {
                                $response['code'] = 200;
                                $response['message'] = "WsLokal:Hapus data sukses.\nWsKemenkes:".$qDelete['message'];
                            }else{
                                $response['code'] = $qDelete['code'];
                                $response['message'] = "WsLokal:Hapus data sukses.\nWsKemenkes:".$qDelete['message'];
                            }
                        }else{
                            $response['code'] = 402;
                            $response['message'] = "Ops. Query error! Silahkan hubungi administrator.";
                        }
                    }
                }else{
                    $response['code'] = 403;
                    $response['message'] = "Ops. Variable tidak ditemukan. Coba ulangi kembali.";
                }
            }else{
                $response['code'] = 404;
                $response['message'] = "Ops. Method tidak diizinkan. Coba ulangi kembali.";
            }
        }else{
            $response['code'] = 405;
            $response['message'] = "Ops. Sesi anda telah berubah! Silahkan login kembali";
        }
        echo json_encode($response);
    }   
          
    function getRefKelas(){
        $url = $this->webServiceURL()."aplicaresws/rest/ref/kelas";
        $x = $this->getCURL($url);
        echo $x;            
    }

    function kirim_ketersedian_kamar(){
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            if(
                isset($_POST['kodekelas']) && 
                isset($_POST['koderuang']) && 
                isset($_POST['namaruang']) && 
                isset($_POST['kapasitas']) && 
                isset($_POST['tersedia']) && 
                isset($_POST['tersediapria']) && 
                isset($_POST['tersediawanita']) && 
                isset($_POST['tersediapriawanita']) 
            ){
                $kodekelas = trim($this->input->post('kodekelas',true));
                $koderuang = trim($this->input->post('koderuang',true));
                $namaruang = trim($this->input->post('namaruang',true));
                $kapasitas = trim($this->input->post('kapasitas',true));
                $tersedia = trim($this->input->post('tersedia',true));
                $tersediapria = trim($this->input->post('tersediapria',true));
                $tersediawanita = trim($this->input->post('tersediawanita',true));
                $tersediapriawanita = trim($this->input->post('tersediapriawanita',true));

                $params = array(
                    'kodekelas' => $kodekelas,
                    'koderuang' => $koderuang,
                    'namaruang' => $namaruang,
                    'kapasitas' => $kapasitas,
                    'tersedia' => $tersedia,
                    'tersediapria' => $tersediapria,
                    'tersediawanita' => $tersediawanita,
                    'tersediapriawanita' => $tersediapriawanita
                );
                $qUpdate = $this->updateBed(json_encode($params));   
                if ($qUpdate['code'] == 1){
                    $response['code'] = 201;
                    $response['message'] = array($qUpdate['code'],$qUpdate['message']);                                
                }else{
                    $qInsert = $this->createBed(json_encode($params));  
                    if ($qInsert['code'] == 1) {
                        $response['code'] = 200;
                        $response['message'] = array($qInsert['code'],$qInsert['message']);
                    }else{
                        $response['code'] = 401;
                        $response['message'] = array($qInsert['code'],$qInsert['message']);
                    }
                }
            }else{
                $response['code'] = 402;
                $response['message'] = "Ops. Data tidak ditemukan. Periksa data anda";
            }
        }else{
            $response['code'] = 403;
            $response['message'] = "Ops. Data tidak ditemukan. Periksa data anda";
        }
        echo json_encode($response);
    }

    function createBed($postJSON=NULL){
        $url = $this->webServiceURL()."aplicaresws/rest/bed/create/".$this->getKodeRS();
        $x = $this->postCURL($url,$postJSON);
        $arr =  json_decode($x,true);
        return $arr['metadata'];
    }
    function updateBed($postJSON=NULL){
        $url = $this->webServiceURL()."aplicaresws/rest/bed/update/".$this->getKodeRS();
        $x = $this->postCURL($url,$postJSON);
        $arr =  json_decode($x,true);
        return $arr['metadata'];
    }
    function deleteBed($postJSON=NULL){
        $url = $this->webServiceURL()."aplicaresws/rest/bed/delete/".$this->getKodeRS();
        $x = $this->postCURL($url,$postJSON);
        $arr =  json_decode($x,true);
        return $arr['metadata'];
    }

    function webServiceURL(){
        $cek = $this->db->get('tbl_config');
        if ($cek->num_rows() > 0) {
            $res = $cek->row_array();
            $host = $res['host_dest'];
        }else{
            $host = "https://dvlp.bpjs-kesehatan.go.id:8888/";;
        }
        return $host;
    }
    function getKodeRS(){
        $cek = $this->db->get('tbl_config');
        if ($cek->num_rows() > 0) {
            $res = $cek->row_array();
            $kodeRS = $res['kode_rs'];
        }else{
            $kodeRS = "0304R001";;
        }
        return $kodeRS;
    }
    function getConsID(){
        $cek = $this->db->get('tbl_config');
        if ($cek->num_rows() > 0) {
            $res = $cek->row_array();
            $consID = $res['consID'];
        }else{
            $consID = "20419";;
        }
        return $consID;
    }
    function getScretID(){
        $cek = $this->db->get('tbl_config');
        if ($cek->num_rows() > 0) {
            $res = $cek->row_array();
            $screetID = $res['screetID'];
        }else{
            $screetID = "9wXA881141";;
        }
        return $screetID;
    }

    function getSignature(){
        $scretId = $this->getConsID();
        $scretKey = $this->getScretID();
        date_default_timezone_set('UTC');
        $tStamp = strval(time()-strtotime('1970-01-01 00:00:00'));
        $signature = hash_hmac('sha256', $scretId."&".$tStamp, $scretKey, true);
        $encodedSignature = base64_encode($signature);
        return $encodedSignature;
    }
    function getTimestamp(){
        $scretId = $this->getConsID();
        $scretKey = $this->getScretID();
        date_default_timezone_set('UTC');
        $tStamp = strval(time()-strtotime('1970-01-01 00:00:00'));
        return $tStamp;
    }
    function getResult(){
        $data = $this->getConsID();
        $tStamp = $this->getTimestamp();
        $encodedSignature = $this->getSignature();
        $result = "";
        $result .= "X-cons-id: " . $data . "\r\n";
        $result .= "X-timestamp: " . $tStamp . "\r\n";
        $result .= "X-signature: " . $encodedSignature;
        return $result;
    }
    function getCURL($url=null){
        if ($url == null) {
            $url = $this->webServiceURL()."aplicaresws/rest/ref/kelas";
        }

        $result = $this->getResult();
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER,array($result));
        $json_response = curl_exec($curl);        
        curl_close($curl);
        return $json_response;        
    }

    function postCURL($url,$jsonData){
        $contentType = "application/json";
        $consID = $this->getConsID();
        $tStamp = $this->getTimestamp();
        $encodedSignature = $this->getSignature();

        $result = "";
        $result .= "Content-Type: " . $contentType . "\r\n";
        $result .= "X-cons-id: " . $consID . "\r\n";
        $result .= "X-timestamp: " . $tStamp . "\r\n";
        $result .= "X-signature: " . $encodedSignature;

        $curl = curl_init($url); 
        curl_setopt($curl, CURLOPT_HEADER, false); 
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE); 
        curl_setopt($curl, CURLOPT_HTTPHEADER,array($result));
        curl_setopt($curl, CURLOPT_POST, false); 
        curl_setopt($curl, CURLOPT_TIMEOUT, 30); 
        curl_setopt($curl, CURLOPT_POSTFIELDS, $jsonData); 
        $return = curl_exec($curl); 
        curl_close($curl);
        return $return;
    }

    function putCURL($url,$jsonData){
        $contentType = "application/json";
        $consID = getConsID();
        $tStamp = getTimestamp();
        $encodedSignature = getSignature();

        $result = "";
        $result .= "Content-Type: " . $contentType . "\r\n";
        $result .= "X-cons-id: " . $consID . "\r\n";
        $result .= "X-timestamp: " . $tStamp . "\r\n";
        $result .= "X-signature: " . $encodedSignature;

        $curl = curl_init($url); 

        curl_setopt($curl, CURLOPT_HEADER, false); 
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE); 
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($curl, CURLOPT_HTTPHEADER,array($result));
        curl_setopt($curl, CURLOPT_POST, false); 
        curl_setopt($curl, CURLOPT_TIMEOUT, 30); 
        curl_setopt($curl, CURLOPT_POSTFIELDS, $jsonData); 
        $return = curl_exec($curl); 
        curl_close($curl);
        return $return;
    }
    function deleteCURL($url,$jsonData){
        $contentType = "application/json";
        $consID = getConsID();
        $tStamp = getTimestamp();
        $encodedSignature = getSignature();

        $result = "";
        $result .= "Content-Type: " . $contentType . "\r\n";
        $result .= "X-cons-id: " . $consID . "\r\n";
        $result .= "X-timestamp: " . $tStamp . "\r\n";
        $result .= "X-signature: " . $encodedSignature;

        $curl = curl_init($url); 
        curl_setopt($curl, CURLOPT_HEADER, false); 
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE); 
        curl_setopt($curl, CURLOPT_HTTPHEADER,array($result));
        curl_setopt($curl, CURLOPT_POST, false); 
        curl_setopt($curl, CURLOPT_TIMEOUT, 30); 
        curl_setopt($curl, CURLOPT_POSTFIELDS, $jsonData); 
        $return = curl_exec($curl); 
        curl_close($curl);
        return $return;
    }
}
