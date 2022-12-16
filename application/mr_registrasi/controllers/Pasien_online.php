<?php 
class Pasien_online extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('users_model');
    }
    
    function index(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            $z = setNav("nav_7");
            $y['index_menu'] = 11;
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);
            $y['contentTitle'] = "Pendaftaran Pasien Online Baru";
            $x['header']= $this->load->view('template/header','',true);
            $y['poly']=array();
            $x['content'] = $this->load->view('registrasi/v_pendaftaranonline_baru',$y,true);
            $this->load->view('template/theme',$x);  
        }
        else{
            $sid = getSessionID();
            $url_login = base_url().'mr_registrasi.php/login?sid='.$sid;
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login';</script>";
        }         
    }
    function pasien_baru(){
        $x=array(
            'poly'  => $this->pendaftaran_model->get_poly(),
            'active3'     => "active open",
            'active32'      => 'active',
        );
        $this->template->pendaftaran('pendaftaran/v_pendaftaranonline_lama',$x);
        //print_r($data);
    }
    
    function antrian(){
        $tgl_reg=date('Y-m-d H:i:s');
        $antrian=$this->pendaftaran_model->get_antrian_poly('GR018',$tgl_reg,'26');
        echo $antrian;
    }

    function get_book_antrian(){
        $ws=$this->bridging_model->get_web_service('rsud');
            if(!empty($ws)){
                $api_url    = $ws->url_call_back;
                $client_id  = $ws->client_id;
                $key        = $ws->secret_key;
                $param=array(
                    'client_id'             => $client_id,
                    'client_secret_key'     => $key,
                    'daftar_tglkunjungan'   => date('Y-m-d'),
                    'daftar_poly_id'        => $this->input->get('tujuan'),

                );
                $respone = $this->bridging_model->request_rsud($param,$api_url ."get_antrian");
                //echo $respone;
                //exit;
                $res_array=json_decode($respone);
                $booking_antrian=$res_array->antrian;
            }else{
                $booking_antrian="0";
            }
            $new = $this->pendaftaran_model->get_antrian_poly($this->input->get('tujuan'),date('Y-m-d'),'',$booking_antrian);
            echo $new;
    }
    
    function online_data(){
        $tgl=$this->input->get('tgl');
        if(empty($tgl)) $tgl=date('Y-m-d');
        // $poly=$this->input->get('poly');
        // $start = intval($this->input->get('start'));
        $q=urlencode($this->input->get('q'));
        $filter=urlencode($this->input->get('filter'));
        
        $this->onlineDB = $this->load->database('online', true);
        // $sql_online = "SELECT a.*,b.nama,c.grNama FROM t_online a 
		// 	LEFT JOIN m_pasien b ON a.`nomr` = b.`nomr`
		// 	LEFT JOIN m_poli c on a.`grId` = c.`grId`
		// 	WHERE (DATE(a.`tgl_booking`) = '$tgl')
		// 	ORDER BY a.`tgl_daftar` ASC";
        if($filter=="lama"){
            $data = $this->onlineDB->join('m_pasien b','a.`nomr` = b.`nomr`')
                ->join('m_poli c','a.`grId` = c.`grId`','LEFT')
                ->where("DATE(a.`tgl_booking`)",$tgl)
                ->group_start()
                ->like('grNama',$q)
                ->or_like('a.kode_booking',$q)
                ->or_like('a.nomr',$q)
                ->or_like('b.nama',$q)
                ->group_end()
                ->order_by('a.tgl_daftar')
                ->get("t_online a")->result();
        }else{
            // $sql_online = "SELECT a.*,b.grNama FROM m_pasien_baru a 
			// LEFT JOIN m_poli b ON a.`grId` = b.`grId`
			// WHERE (DATE(a.`tgl_booking`) = '$tgl')
			// ORDER BY a.`tgl_daftar` ASC";

            $data=$this->onlineDB->where("DATE(a.`tgl_booking`)",$tgl)
            ->join('m_poli b','a.`grId` = b.`grId`')
            ->group_start()
                ->like('no_ktp',$q)
                ->or_like('nama',$q)
                ->or_like('tempat_lahir',$q)
                ->or_like('tgl_lahir',$q)
                ->or_like('pekerjaan',$q)
                ->or_like('grNama',$q)
            ->group_end()
            ->order_by('a.tgl_daftar')
            ->get('m_pasien_baru a')->result();
        }
        
        // $list = $this->onlineDB->query("$sql_online")->result_array();
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    function online_datacontoh(){
        $tgl=$this->input->get('tgl');
        if(empty($tgl)) $tgl=date('Y-m-d');
        $q=urlencode($this->input->get('q'));
        $filter=urlencode($this->input->get('filter'));
        $data=$this->users_model->getData($filter,$tgl,$q);
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    function cetakTracerOnline()
    {
        $kode = $this->uri->segment(3);

        $this->onlineDB = $this->load->database('online', true);
        $SQL = "SELECT a.*,b.`nama`,c.`nama_dokter`,d.`grNama` FROM t_online a
        LEFT JOIN m_pasien b ON a.`nomr` = b.`nomr`
        LEFT JOIN m_dokter c ON a.`id_dokter` = c.`id_dokter`
        LEFT JOIN m_poli d ON a.`grId` = d.`grId`
        WHERE a.kode_booking = '$kode'";

        $dataPreview = $this->onlineDB->query("$SQL");
        $dataP['data'] = $dataPreview->row_array();

        $this->load->view('cetak/v_tracerOnline', $dataP);
    }
    
    function cetakTracerOnlineBaru()
    {
        $kode = $this->uri->segment(3);

        $this->onlineDB = $this->load->database('online', true);
        $SQL = "SELECT a.*,b.`nama_dokter`,c.`grNama` FROM m_pasien_baru a
        LEFT JOIN m_dokter b ON a.`id_dokter` = b.`id_dokter`
        LEFT JOIN m_poli c ON a.`grId` = c.`grId`
        WHERE a.kode_booking = '$kode'";

        $dataPreview = $this->onlineDB->query("$SQL");
        $dataP['data'] = $dataPreview->row_array();

        $this->load->view('cetak/v_tracerOnlineBaru', $dataP);
    }

    function data_excel(){
        /*$api_url    = "http://rsud.padangpanjang.go.id/api/";
        $client_id  = "00001";
        $key        = "RF3XS15QY15TPK91";
        */
        $ws=$this->bridging_model->get_web_service('rsud');
        if(!empty($ws)){
            $api_url    = $ws->url_call_back;
            $client_id  = $ws->client_id;
            $key        = $ws->secret_key;
            $daftar_tglkunjungan=$this->input->get('tgl');
            $daftar_poly_id=$this->input->get('poly');
            $start = intval($this->input->get('start'));
            $q=urlencode($this->input->get('q'));
            if(empty($daftar_tglkunjungan)) $daftar_tglkunjungan=date('Y-m-d');
            if(empty($daftar_poly_id)) $daftar_poly_id="";
            if(empty($start)) $start= 0;
            $limit=50;
            $param=array(
                'client_id'             => $client_id,
                'client_secret_key'     => $key,
                'daftar_tglkunjungan'   => $daftar_tglkunjungan,
                'daftar_poly_id'        => $daftar_poly_id,
                'start'                 => $start,
                'limit'                 => $limit,
                'q'                     => $q
            );
            //print_r($param);
            $respone = $this->bridging_model->request_rsud($param,$api_url ."get_reg");
            $respone_array=json_decode($respone);
            //print_r($respone_array->pasien);
            //exit;
            $data=array(
                'data'  => $respone_array->pasien,
                'count' => $respone_array->jmldata
            );
            $this->load->view('pendaftaran/v_data_pendaftaran_online_excel',$data);
        }else{
            $data=array(
                'data'  => array(),
                'count' => 0
            );
            $this->load->view('pendaftaran/v_data_pendaftaran_online_excel',$data);
        }
            
    }

    function contoh(){
        $pasien=array('nama'=>'Wanhar Azri');
        echo $pasien["nama"];
    }
    function cek(){
        $this->pendaftaran_model->cek_koneksi();
    }
}