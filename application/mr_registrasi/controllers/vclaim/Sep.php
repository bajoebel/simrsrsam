<?php 
class Sep extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('vclaim_model');
        $this->load->model('users_model');
        $this->load->helper('lz');
        $ses_state = $this->users_model->cek_session_id();
        if(!$ses_state){  
            $response=array('metaData'=>array('code'=>201,'message'=>'Anda Belum Login Atau Session Expired'));
            header('Content-Type: application/json');
            echo json_encode($response);
            exit;
        }
    }
    function index(){
        $data=array(
            'contentTitle'=>'Riwayat SEP'
        );
        $z = setNav("nav_6");
        // $y['index_menu'] = 7;
        $view=array(
            'header'=>$this->load->view('template/header', '', true),
            'nav_sidebar'=>$this->load->view('template/nav_sidebar', $z, true),
            'content'=>$this->load->view('vclaim/index', $data, true),
            'index_menu'=>6,
            'libjs'=>array(
                'js/sep.js'
            )
        );
        $this->load->view('template/theme', $view);
    }
    function insert(){
        $cob=$this->input->post('cob');
        if(!$cob) $cob=0;
        $tujuan=$this->input->post('tujuan');
        if($tujuan=='MAT') {
            $katarak=$this->input->post('katarak');
            if(!$katarak) $katarak=0;
        }else $katarak=0;
        $eksekutif=$this->input->post('eksekutif');
        if(!$eksekutif) $eksekutif=0;

        $laklantas=$this->input->post('lakaLantas');
        if($laklantas>0){
            $tglKejadian=$this->input->post('tglKejadian');
            $keterangan=$this->input->post('keterangan');
            $suplesi=$this->input->post('suplesi');
            if(!$suplesi) $suplesi=0;
            $noSepSuplesi=$this->input->post('noSepSuplesi');
            $kdPropinsi=$this->input->post('kdPropinsi');
            $kdKabupaten=$this->input->post('kdKabupaten');
            $kdKecamatan=$this->input->post('kdKecamatan');
            // Validasi data Lakalantas
            $tglk=strtotime($tglKejadian);
            $tglsep=strtotime($this->input->post('tglSep'));
            if($tglk>$tglsep){
                $response=array(
                    'metaData'=>array(
                        'code'=>201,
                        'message'=>"Tanggal Kejadian Tidak boleh lebih kecil dari Tanggal sekarang"
                    )
                );
                header('Content-Type: application/json');
                echo json_encode($response);
                exit;
            }

            // $penjamin=$this->input->post('penjamin');
            // if($penjamin<1 || $penjamin>4){
            //     $response=array(
            //         'metaData'=>array(
            //             'code'=>201,
            //             'message'=>"Data Penjamin Tidak Valid"
            //         )
            //     );
            //     header('Content-Type: application/json');
            //     echo json_encode($response);
            //     exit;
            // }

            if(empty($kdPropinsi)||$kdPropinsi=='-'){
                $response=array(
                    'metaData'=>array(
                        'code'=>201,
                        'message'=>"Data Provinsi tidak boleh kosong"
                    )
                );
                header('Content-Type: application/json');
                echo json_encode($response);
                exit;
            }

            if(empty($kdKabupaten)){
                $response=array(
                    'metaData'=>array(
                        'code'=>201,
                        'message'=>"Data Kabupaten tidak boleh kosong " .$kdPropinsi
                    )
                );
                header('Content-Type: application/json');
                echo json_encode($response);
                exit;
            }
            if(empty($kdKecamatan)){
                $response=array(
                    'metaData'=>array(
                        'code'=>201,
                        'message'=>"Data Kecamatan tidak boleh kosong"
                    )
                );
                header('Content-Type: application/json');
                echo json_encode($response);
                exit;
            }
            // print_r($penjamin) ; exit;

        }else{
            $tglKejadian='';
            $keterangan='';
            $suplesi=0;
            $noSepSuplesi='';
            $kdPropinsi='';
            $kdKabupaten='';
            $kdKecamatan='';
        }
        $jnsPelayanan =$this->input->post('jnsPelayanan');
        if($jnsPelayanan==1)$dpjpLayan=""; 
        else $dpjpLayan=$this->input->post('dpjpLayan');
        $req=array(
            'request'=>array(
                't_sep'=>array(
                    'noKartu'=>$this->input->post('noKartu'),
                    'tglSep'=>$this->input->post('tglSep'),
                    'ppkPelayanan'=>$this->input->post('ppkPelayanan'),
                    'jnsPelayanan'=>$this->input->post('jnsPelayanan'),
                    'klsRawat'=>array(
                        'klsRawatHak'=>$this->input->post('klsRawatHak'),
                        'klsRawatNaik'=>$this->input->post('klsRawatNaik'),
                        'pembiayaan'=>$this->input->post('pembiayaan'),
                        'penanggungJawab'=>$this->input->post('penanggungJawab')
                    ),
                    'noMR'=>$this->input->post('noMR'),
                    'rujukan'=>array(
                        'asalRujukan'=>$this->input->post('asalRujukan'),
                        'tglRujukan'=>$this->input->post('tglRujukan'),
                        'noRujukan'=>$this->input->post('noRujukan'),
                        'ppkRujukan'=>$this->input->post('ppkRujukan')
                    ),
                    'catatan'=>$this->input->post('catatan'),
                    'diagAwal'=>$this->input->post('diagAwal'),
                    'poli'=>array(
                        'tujuan'=>$this->input->post('tujuan'),
                        'eksekutif'=>$eksekutif,
                    ),
                    'cob'=>array(
                        'cob'=>$cob
                    ),
                    'katarak'=>array(
                        'katarak'=>$katarak
                    ),
                    'jaminan'=>array(
                        'lakaLantas'=>$laklantas,
                        'penjamin'=>array(
                            'tglKejadian'=>$tglKejadian,
                            'keterangan'=>$keterangan,
                            'suplesi'=>array(
                                'suplesi'=>$suplesi,
                                'noSepSuplesi'=>$noSepSuplesi,
                                'lokasiLaka'=>array(
                                    'kdPropinsi'=>$kdPropinsi,
                                    'kdKabupaten'=>$kdKabupaten,
                                    'kdKecamatan'=>$kdKecamatan
                                )
                            )
                        )
                    ),
                    'tujuanKunj'=>$this->input->post('tujuanKunj'),
                    'flagProcedure'=>$this->input->post('flagProcedure'),
                    'kdPenunjang'=>$this->input->post('kdPenunjang'),
                    'assesmentPel'=>$this->input->post('assesmentPel'),
                    'skdp'=>array(
                        'noSurat'=>$this->input->post('noSurat'),
                        'kodeDPJP'=>$this->input->post('kodeDPJP')
                    ),
                    'dpjpLayan'=>$dpjpLayan,
                    'noTelp'=>$this->input->post('noTelp'),
                    'user'=>$this->session->userdata('get_uid')
                )
            )
        );
        if($jnsPelayanan==2) $ceksepterbit=$this->vclaim_model->cekSepTerbit($this->input->post('noKartu'));
        else $ceksepterbit=array();
        if(empty($ceksepterbit)){
            date_default_timezone_set('UTC');
            $tStamp = strval(time()-strtotime('1970-01-01 00:00:00'))-SELISIH_WAKTU;
            // Create Signature
            $signature = hash_hmac('sha256', CONS_ID_VC."&".$tStamp, SECREET_ID_VC, true);
            $encodedSignature = base64_encode($signature);
            if(empty($tgl)) $tgl=date('Y-m-d');
            $contentType = "application/x-www-form-urlencoded";
            // Generate Header
            $header = "";
            $header .= "Content-Type: " . $contentType . "\r\n";
            $header .= "X-cons-id: " . CONS_ID_VC . "\r\n";
            $header .= "X-timestamp: " . $tStamp . "\r\n";
            $header .= "X-signature: " . $encodedSignature ."\r\n";
            $header .= "user_key: ".KEY_VC;
            $res=$this->vclaim_model->postData('SEP/2.0/insert',$header,json_encode($req));
            // echo $res; exit;
            $arr=json_decode($res);
            if($arr->metaData->code==200){
                $lz=$this->vclaim_model->stringDecrypt(CONS_ID_VC.SECREET_ID_VC.$tStamp,$arr->response);
                $data=json_decode(hasil($lz));
                $localsep=array(
                    'catatan'=>$data->sep->catatan,
                    'diagnosa'=>$data->sep->diagnosa,
                    'jnsPelayanan'=>$data->sep->jnsPelayanan,
                    'kelasRawat'=>$data->sep->kelasRawat,
                    'noSep'=>$data->sep->noSep,
                    'penjamin'=>$data->sep->penjamin,
                    'asuransi'=>$data->sep->peserta->asuransi,
                    'hakKelas'=>$data->sep->peserta->hakKelas,
                    'jnsPeserta'=>$data->sep->peserta->jnsPeserta,
                    'kelamin'=>$data->sep->peserta->kelamin,
                    'nama'=>$data->sep->peserta->nama,
                    'noKartu'=>$data->sep->peserta->noKartu,
                    'noMr'=>$data->sep->peserta->noMr,
                    'tglLahir'=>$data->sep->peserta->tglLahir,
                    'Dinsos'=>$data->sep->informasi->dinsos,
                    'prolanisPRB'=>$data->sep->informasi->prolanisPRB,
                    'noSKTM'=>$data->sep->informasi->noSKTM,
                    'poli'=>$data->sep->poli,
                    'poliEksekutif'=>$data->sep->poliEksekutif,
                    'tglSep'=>$data->sep->tglSep,
                    'ppkPelayanan'=>$this->input->post('ppkPelayanan'),
                    'klsRawatHak'=>$this->input->post('klsRawatHak'),
                    'klsRawatNaik'=>$this->input->post('klsRawatNaik'),
                    'pembiayaan'=>$this->input->post('pembiayaan'),
                    'penanggungJawab'=>$this->input->post('penanggungjawab'),
                    'asalRujukan'=>$this->input->post('asalRujukan'),
                    'tglRujukan'=>$this->input->post('tglRujukan'),
                    'noRujukan'=>$this->input->post('noRujukan'),
                    'ppkRujukan'=>$this->input->post('ppkRujukan'),
                    'namaPpkRujukan'=>$this->input->post('namaPpkRujukan'),
                    'tujuan'=>$this->input->post('tujuan'),
                    'namaTujuan'=>$this->input->post('namaTujuan'),
                    'eksekutif'=>$eksekutif,
                    'cob'=>$cob,
                    'katarak'=>$katarak,
                    'lakaLantas'=>$laklantas,
                    'tglKejadian'=>$tglKejadian,
                    'keterangan'=>$keterangan,
                    'suplesi'=>$suplesi,
                    'noSepSuplesi'=>$noSepSuplesi,
                    'kdPropinsi'=>$kdPropinsi,
                    'kdKabupaten'=>$kdKabupaten,
                    'kdKecamatan'=>$kdKecamatan,
                    'tujuanKunj'=>$this->input->post('tujuanKunj'),
                    'flagProcedure'=>$this->input->post('flagProcedure'),
                    'kdPenunjang'=>$this->input->post('kdPenunjang'),
                    'assesmentPel'=>$this->input->post('assesmentPel'),
                    'noSurat'=>$this->input->post('noSurat'),
                    'kodeDPJP'=>$this->input->post('kodeDPJP'),
                    'namaDPJP'=>$this->input->post('namaDPJP'),
                    'dpjpLayan'=>$this->input->post('dpjpLayan'),
                    'namaDpjpLayan'=>$this->input->post('namaDpjpLayan'),
                    'noTelp'=>$this->input->post('noTelp'),
                    'user'=>$this->session->userdata('get_uid')
                );
                $this->db->insert('tbl02_sep_response',$localsep);
                // Jika SEP DIbuat Setelah Pendaftaranmaka update no_jaminan pad tblpendaftaran
                $idx=$this->input->post('idx');
                if(!empty($idx)){
                    $update = array(
                        'id_cara_bayar' => 2,
                        'no_jaminan' => $data->sep->noSep,
                        'no_rujuk'  => $this->input->post('noRujukan'),
                    );
                    $this->db->where('idx', $idx);
                    $this->db->update('tbl02_pendaftaran', $update);
                }
                
                $res=json_encode(array('metaData'=>$arr->metaData,'response'=>$data));
            }else{
                $response=array(
                    'metaData'=>array(
                        'code'=>$arr->metaData->code,
                        'message'=>$arr->metaData->message
                    ),
                    'request'=>$req,
                );
                $res=json_encode($response);
            }
        }else{
            $res=json_encode(
                array(
                    'metaData'=>array(
                        'code'=>201,
                        'message'=>"Sudah ada Sep Yang Terbit Hari ini" 
                    )
                )
            );
        }
        
        header('Content-Type: application/json');
        echo $res;
        // header('Content-Type: application/json');
        // echo json_encode($req);
    }
    function update(){
        $cob=$this->input->post('cob');
        if(!$cob) $cob=0;
        $tujuan=$this->input->post('tujuan');
        if($tujuan=='MAT') {
            $katarak=$this->input->post('katarak');
            if(!$katarak) $katarak=0;
        }else $katarak=0;
        $eksekutif=$this->input->post('eksekutif');
        if(!$eksekutif) $eksekutif=0;

        $laklantas=$this->input->post('lakaLantas');
        if($laklantas>0){
            $tglKejadian=$this->input->post('tglKejadian');
            $keterangan=$this->input->post('keterangan');
            $suplesi=$this->input->post('suplesi');
            if(!$suplesi) $suplesi=0;
            $noSepSuplesi=$this->input->post('noSepSuplesi');
            $kdPropinsi=$this->input->post('kdPropinsi');
            $kdKabupaten=$this->input->post('kdKabupaten');
            $kdKecamatan=$this->input->post('kdKecamatan');
        }else{
            $tglKejadian='';
            $keterangan='';
            $suplesi=0;
            $noSepSuplesi='';
            $kdPropinsi='';
            $kdKabupaten='';
            $kdKecamatan='';
        }

        $req=array(
            'request'=>array(
                't_sep'=>array(
                    'noSep'=>$this->input->post('noSep'),
                    'klsRawat'=>array(
                        'klsRawatHak'=>$this->input->post('klsRawatHak'),
                        'klsRawatNaik'=>$this->input->post('klsRawatNaik'),
                        'pembiayaan'=>$this->input->post('pembiayaan'),
                        'penanggungJawab'=>$this->input->post('penanggungJawab')
                    ),
                    'noMR'=>$this->input->post('noMR'),
                    'catatan'=>$this->input->post('catatan'),
                    'diagAwal'=>$this->input->post('diagAwal'),
                    'poli'=>array(
                        'tujuan'=>$this->input->post('tujuan'),
                        'eksekutif'=>$eksekutif,
                    ),
                    'cob'=>array(
                        'cob'=>$cob
                    ),
                    'katarak'=>array(
                        'katarak'=>$katarak
                    ),
                    'jaminan'=>array(
                        'lakaLantas'=>$laklantas,
                        'penjamin'=>array(
                            'tglKejadian'=>$tglKejadian,
                            'keterangan'=>$keterangan,
                            'suplesi'=>array(
                                'suplesi'=>$suplesi,
                                'noSepSuplesi'=>$noSepSuplesi,
                                'lokasiLaka'=>array(
                                    'kdPropinsi'=>$kdPropinsi,
                                    'kdKabupaten'=>$kdKabupaten,
                                    'kdKecamatan'=>$kdKecamatan
                                )
                            )
                        )
                    ),
                    'dpjpLayan'=>$this->input->post('dpjpLayan'),
                    'noTelp'=>$this->input->post('noTelp'),
                    'user'=>$this->session->userdata('get_uid')
                )
            )
        );
        // header('Content-Type: application/json');
        // echo json_encode($req);
        // exit;
        date_default_timezone_set('UTC');
        $tStamp = strval(time()-strtotime('1970-01-01 00:00:00'))-SELISIH_WAKTU;
        // Create Signature
        $signature = hash_hmac('sha256', CONS_ID_VC."&".$tStamp, SECREET_ID_VC, true);
        $encodedSignature = base64_encode($signature);
        if(empty($tgl)) $tgl=date('Y-m-d');
        $contentType = "application/x-www-form-urlencoded";
        // Generate Header
        $header = "";
        $header .= "Content-Type: " . $contentType . "\r\n";
        $header .= "X-cons-id: " . CONS_ID_VC . "\r\n";
        $header .= "X-timestamp: " . $tStamp . "\r\n";
        $header .= "X-signature: " . $encodedSignature ."\r\n";
        $header .= "user_key: ".KEY_VC;
        $res=$this->vclaim_model->putData('SEP/2.0/update',$header,json_encode($req));
        
        $arr=json_decode($res);
        // print_r($arr); exit;
        if(is_array($arr)){
            if($arr->metaData->code==200){
                $lz=$this->vclaim_model->stringDecrypt(CONS_ID_VC.SECREET_ID_VC.$tStamp,$arr->response);
                $data=json_decode(hasil($lz));
                $localsep=array(
                    'catatan'=>$this->input->post('catatan'),
                    'diagnosa'=>$this->input->post('diagnosa'),
                    'kelasRawat'=>$this->input->post('kelasRawatHak'),
                    'penjamin'=>$this->input->post('penjamin'),
                    'noMr'=>$this->input->post('noMr'),
                    'poli'=>$this->input->post('poli'),
                    'poliEksekutif'=>$$this->input->post('eksekutif'),
                    'klsRawatHak'=>$this->input->post('klsRawatHak'),
                    'klsRawatNaik'=>$this->input->post('klsRawatNaik'),
                    'pembiayaan'=>$this->input->post('pembiayaan'),
                    'penanggungJawab'=>$this->input->post('penanggungjawab'),
                    'tujuan'=>$this->input->post('tujuan'),
                    'namaTujuan'=>$this->input->post('poli'),
                    'eksekutif'=>$eksekutif,
                    'cob'=>$cob,
                    'katarak'=>$katarak,
                    'lakaLantas'=>$laklantas,
                    'tglKejadian'=>$tglKejadian,
                    'keterangan'=>$keterangan,
                    'suplesi'=>$suplesi,
                    'noSepSuplesi'=>$noSepSuplesi,
                    'kdPropinsi'=>$kdPropinsi,
                    'kdKabupaten'=>$kdKabupaten,
                    'kdKecamatan'=>$kdKecamatan,
                    'dpjpLayan'=>$this->input->post('dpjpLayan'),
                    'namaDpjpLayan'=>$this->input->post('namaDpjpLayan'),
                    'noTelp'=>$this->input->post('noTelp'),
                    'user'=>$this->session->userdata('get_uid')
                );
                $this->db->where('noSep',$this->iput->post('noSep'));
                $this->db->update('tbl02_sep_response',$localsep);

                $res=json_encode(array('metaData'=>$arr->metaData,'response'=>$data));
            }
        }else{
            header('Content-Type: application/json');
            echo $res;
        }
    }
    function updatepulang(){
        
        $req=array(
            'request'=>array(
                't_sep'=>array(
                    'noSep'=>$this->input->post('noSep'),
                    'statusPulang'=>$this->input->post('statusPulang'),
                    'noSuratMeninggal'=>$this->input->post('noSuratMeninggal'),
                    'tglMeninggal'=>$this->input->post('tglMeninggal'),
                    'tglPulang'=>$this->input->post('tglPulang'),
                    'noLPManual'=>$this->input->post('noLPManual'),
                    'user'=>$this->session->userdata('get_uid')
                )
            )
        );
        // header('Content-Type: application/json');
        // echo json_encode($req);
        // exit;
        date_default_timezone_set('UTC');
        $tStamp = strval(time()-strtotime('1970-01-01 00:00:00'))-SELISIH_WAKTU;
        // Create Signature
        $signature = hash_hmac('sha256', CONS_ID_VC."&".$tStamp, SECREET_ID_VC, true);
        $encodedSignature = base64_encode($signature);
        if(empty($tgl)) $tgl=date('Y-m-d');
        $contentType = "application/x-www-form-urlencoded";
        // Generate Header
        $header = "";
        $header .= "Content-Type: " . $contentType . "\r\n";
        $header .= "X-cons-id: " . CONS_ID_VC . "\r\n";
        $header .= "X-timestamp: " . $tStamp . "\r\n";
        $header .= "X-signature: " . $encodedSignature ."\r\n";
        $header .= "user_key: ".KEY_VC;
        $res=$this->vclaim_model->putData('SEP/2.0/updtglplg',$header,json_encode($req));
        header('Content-Type: application/json');
        echo $res;
    }
    function pulang(){
        $data=array(
            'contentTitle'=>'Pemulangan Pasien'
        );
        $z = setNav("nav_6");
        // $y['index_menu'] = 7;
        $view=array(
            'header'=>$this->load->view('template/header', '', true),
            'nav_sidebar'=>$this->load->view('template/nav_sidebar', $z, true),
            'content'=>$this->load->view('vclaim/updatepulang', $data, true),
            'index_menu'=>6,
            'libjs'=>array(
                'js/sep.js'
            )
        );
        $this->load->view('template/theme', $view);
    }

    function pulang1(){
        $data=array(
            'contentTitle'=>'Pemulangan Pasien'
        );
        $z = setNav("nav_6");
        // $y['index_menu'] = 7;
        $view=array(
            'header'=>$this->load->view('template/header', '', true),
            'nav_sidebar'=>$this->load->view('template/nav_sidebar', $z, true),
            'content'=>$this->load->view('vclaim/pulang', $data, true),
            'index_menu'=>6,
            'libjs'=>array(
                'js/seppulang.js'
            )
        );
        $this->load->view('template/theme', $view);
    }
    function listpulang($bulan="",$tahun=""){
        date_default_timezone_set('UTC');
        $tStamp = strval(time()-strtotime('1970-01-01 00:00:00'))-SELISIH_WAKTU;
        // Create Signature
        $signature = hash_hmac('sha256', CONS_ID_VC."&".$tStamp, SECREET_ID_VC, true);
        $encodedSignature = base64_encode($signature);
        if(empty($bulan)) $bulan=date('m');
        if(empty($tahun)) $tahun=date('Y');
        $filter=urlencode($this->input->get('filter'));
        // Generate Header
        $header = "";
        $header .= "X-cons-id: " . CONS_ID_VC . "\r\n";
        $header .= "X-timestamp: " . $tStamp . "\r\n";
        $header .= "X-signature: " . $encodedSignature ."\r\n";
        $header .= "user_key: ".KEY_VC;

        $res = $this->vclaim_model->getData("SEP/updtglplg/list/bulan/$bulan/tahun/$tahun/$filter",$header);
        $arr=json_decode($res);
        if($arr->metaData->code==200){
            $data=$this->vclaim_model->stringDecrypt(CONS_ID_VC.SECREET_ID_VC.$tStamp,$arr->response);
            $res=json_encode(array('metaData'=>$arr->metaData,'response'=>json_decode(hasil($data))));
        }
        header('Content-Type: application/json');
        echo $res;
    }
    function updatepulanglokal(){
        $data=array(
            'noSep'=>$this->input->post('noSep'),
            'statusPulang'=>$this->input->post('statusPulang'),
            'namaStatusPulang'=>$this->input->post('namaStatusPulang'),
            'noSuratMeninggal'=>$this->input->post('noSuratMeninggal'),
            'tglMeninggal'=>$this->input->post('tglMeninggal'),
            'tglPulang'=>$this->input->post('tglPulang'),
            'noLPManual'=>$this->input->post('noLPManual'),
        );
        $this->db->where('noSep',$this->input->post('noSep'));
        $this->db->update('tbl02_sep_response',$data);

    }
    function hapus($nosep){
        $req=array(
            'request'=>array(
                't_sep'=>array(
                    'noSep'=>$nosep,
                    'user'=>$this->session->userdata('get_uid')
                )
            )
        );
        date_default_timezone_set('UTC');
        $tStamp = strval(time()-strtotime('1970-01-01 00:00:00'))-SELISIH_WAKTU;
        // Create Signature
        $signature = hash_hmac('sha256', CONS_ID_VC."&".$tStamp, SECREET_ID_VC, true);
        $encodedSignature = base64_encode($signature);
        if(empty($tgl)) $tgl=date('Y-m-d');
        $contentType = "application/x-www-form-urlencoded";
        // Generate Header
        $header = "";
        $header .= "Content-Type: " . $contentType . "\r\n";
        $header .= "X-cons-id: " . CONS_ID_VC . "\r\n";
        $header .= "X-timestamp: " . $tStamp . "\r\n";
        $header .= "X-signature: " . $encodedSignature ."\r\n";
        $header .= "user_key: ".KEY_VC;
        $res=$this->vclaim_model->deleteData('SEP/2.0/delete',$header,json_encode($req));
        
        // $arr=json_decode($res);
        // $data = str_replace('null','""',$res);
        // echo "test<br>";
        // echo $data;
        // exit;
        // echo "<br>";
        
        $arr = json_decode(trim($res), TRUE);
        if(is_array($arr)){
            if($arr->metaData->code==200){
                $batal=array(
                    'batal'=>1,
                    'userbatal'=>$this->session->userdata('get_uid')
                );
                $this->db->where('noSep',$nosep);
                $this->db->update('tbl02_sep_response',$batal);
    
                $lz=$this->vclaim_model->stringDecrypt(CONS_ID_VC.SECREET_ID_VC.$tStamp,$arr->response);
                $data=json_decode(hasil($lz));
    
                $res=json_encode(array('metaData'=>$arr->metaData,'response'=>$data));
            }
        }
        
        header('Content-Type: application/json');
        echo $res;
    }
    function edit($nosep){
        $this->db->where('noSep',$nosep);
        $this->db->where('batal',0);
        $data = $this->db->get('tbl02_sep_response')->row();
        header('Content-Type: application/json');
        echo json_encode($data);
    }
    function cari($sep=""){
        // Create TimeStamps
        // $param=urlencode($this->input->get('param'));
        date_default_timezone_set('UTC');
        $tStamp = strval(time()-strtotime('1970-01-01 00:00:00'))-SELISIH_WAKTU;
        // Create Signature
        $signature = hash_hmac('sha256', CONS_ID_VC."&".$tStamp, SECREET_ID_VC, true);
        $encodedSignature = base64_encode($signature);
        if(empty($mulai)) $mulai=date('Y-m-d');
        if(empty($selesai)) $selesai=date('Y-m-d');
        // Generate Header
        $header = "";
        $header .= "X-cons-id: " . CONS_ID_VC . "\r\n";
        $header .= "X-timestamp: " . $tStamp . "\r\n";
        $header .= "X-signature: " . $encodedSignature ."\r\n";
        $header .= "user_key: ".KEY_VC;

        $res = $this->vclaim_model->getData("SEP/$sep",$header);
        $arr=json_decode($res);
        if($arr->metaData->code==200){
            $data=$this->vclaim_model->stringDecrypt(CONS_ID_VC.SECREET_ID_VC.$tStamp,$arr->response);
            $res=json_encode(array('metaData'=>$arr->metaData,'response'=>json_decode(hasil($data))));
        }
        header('Content-Type: application/json');
        echo $res;
    }
    function detail($noSep){
        // Create TimeStamps
        // $param=urlencode($this->input->get('param'));
        date_default_timezone_set('UTC');
        $tStamp = strval(time()-strtotime('1970-01-01 00:00:00'))-SELISIH_WAKTU;
        // Create Signature
        $signature = hash_hmac('sha256', CONS_ID_VC."&".$tStamp, SECREET_ID_VC, true);
        $encodedSignature = base64_encode($signature);
        if(empty($mulai)) $mulai=date('Y-m-d');
        if(empty($selesai)) $selesai=date('Y-m-d');
        // Generate Header
        $header = "";
        $header .= "X-cons-id: " . CONS_ID_VC . "\r\n";
        $header .= "X-timestamp: " . $tStamp . "\r\n";
        $header .= "X-signature: " . $encodedSignature ."\r\n";
        $header .= "user_key: ".KEY_VC;

        $res = $this->vclaim_model->getData("SEP/$noSep",$header);
        $arr=json_decode($res);
        if($arr->metaData->code==200){
            $data=$this->vclaim_model->stringDecrypt(CONS_ID_VC.SECREET_ID_VC.$tStamp,$arr->response);
            // $res=json_encode(array('metaData'=>$arr->metaData,'response'=>json_decode(hasil($data))));

            $data=array(
                'contentTitle'=>'Detail SEP',
                'data'=>json_decode(hasil($data)),
                'rujukanonline'=>$this->vclaim_model->getRujukanOnline($noSep)
            );
            $z = setNav("nav_7");
            $y['index_menu'] = 7;
            $view=array(
                'header'=>$this->load->view('template/header', '', true),
                'nav_sidebar'=>$this->load->view('template/nav_sidebar', $z, true),
                'content'=>$this->load->view('vclaim/detail', $data, true),
                'index_menu'=>6,
                'libjs'=>array(
                    'js/sep.js'
                )
            );
            $this->load->view('template/theme', $view);

        }
        // header('Content-Type: application/json');
        // echo $res;
    }
    function internal($sep=""){
        date_default_timezone_set('UTC');
        $tStamp = strval(time()-strtotime('1970-01-01 00:00:00'))-SELISIH_WAKTU;
        // Create Signature
        $signature = hash_hmac('sha256', CONS_ID_VC."&".$tStamp, SECREET_ID_VC, true);
        $encodedSignature = base64_encode($signature);
        if(empty($mulai)) $mulai=date('Y-m-d');
        if(empty($selesai)) $selesai=date('Y-m-d');
        // Generate Header
        $header = "";
        $header .= "X-cons-id: " . CONS_ID_VC . "\r\n";
        $header .= "X-timestamp: " . $tStamp . "\r\n";
        $header .= "X-signature: " . $encodedSignature ."\r\n";
        $header .= "user_key: ".KEY_VC;

        $res = $this->vclaim_model->getData("SEP/Internal/$sep",$header);
        $arr=json_decode($res);
        if($arr->metaData->code==200){
            $data=$this->vclaim_model->stringDecrypt(CONS_ID_VC.SECREET_ID_VC.$tStamp,$arr->response);
            $res=json_encode(array('metaData'=>$arr->metaData,'response'=>json_decode(hasil($data))));
        }
        header('Content-Type: application/json');
        echo $res;
    }
    function hapusinternal($nosep,$nosurat,$tglRujuk,$tujuan){
        $req=array(
            'request'=>array(
                't_sep'=>array(
                    'noSep'=>$nosep,
                    'noSurat'=>$nosurat,
                    'tglRujukanInternal'=>$tglRujuk,
                    'kdPoliTuj'=>$tujuan,
                    'user'=>$this->session->userdata('get_uid')
                )
            )
        );
        date_default_timezone_set('UTC');
        $tStamp = strval(time()-strtotime('1970-01-01 00:00:00'))-SELISIH_WAKTU;
        // Create Signature
        $signature = hash_hmac('sha256', CONS_ID_VC."&".$tStamp, SECREET_ID_VC, true);
        $encodedSignature = base64_encode($signature);
        if(empty($tgl)) $tgl=date('Y-m-d');
        $contentType = "application/x-www-form-urlencoded";
        // Generate Header
        $header = "";
        $header .= "Content-Type: " . $contentType . "\r\n";
        $header .= "X-cons-id: " . CONS_ID_VC . "\r\n";
        $header .= "X-timestamp: " . $tStamp . "\r\n";
        $header .= "X-signature: " . $encodedSignature ."\r\n";
        $header .= "user_key: ".KEY_VC;
        $res=$this->vclaim_model->deleteData('SEP/Internal/delete',$header,json_encode($req));
        header('Content-Type: application/json');
        echo $res;
    }

    function pengajuan(){
        $data=array(
            'contentTitle'=>'Pengajuan SEP',
        );
        $z = setNav("nav_7");
        $y['index_menu'] = 7;
        $view=array(
            'header'=>$this->load->view('template/header', '', true),
            'nav_sidebar'=>$this->load->view('template/nav_sidebar', $z, true),
            'content'=>$this->load->view('vclaim/pengajuan', $data, true),
            'index_menu'=>6,
            'libjs'=>array(
                'js/pengajuan.js'
            )
        );
        $this->load->view('template/theme', $view);
    }
    function updateseppendaftaran(){
        $data['no_jaminan']=$this->input->post('no_jaminan');
        if(!empty($data['no_jaminan'])) {
            $data['id_cara_bayar']=2;
            $data['cara_bayar']='JKN';
        }
        $this->db->where('idx',$this->input->post('idx'));
        $this->db->update('tbl02_pendaftaran',$data);
        echo json_encode(array('status'=>true));
    }
    function riwayatpengajuan(){
        $start=intval($this->input->get('start'));
        $limit=10;
        $list=array(
            'status'    => true,
            'message'   => "OK", 
            'start'     => $start,
            'row_count' => $this->vclaim_model->countRiwayatPengajuan(),
            'limit'     => $limit,
            'data'     => $this->vclaim_model->jmlRiwayatPengajuan($start,$limit),
        );
        header('Content-Type: application/json');
        echo json_encode($list);
    }
    function kirimpengajuan(){
        $req=array(
            'request'=>array(
                't_sep'=>array(
                    'noKartu'=>$this->input->post('noKartu'),
                    'tglSep'=>$this->input->post('tglSep'),
                    'jnsPelayanan'=>$this->input->post('jnsPelayanan'),
                    'jnsPengajuan'=>$this->input->post('jnsPengajuan'),
                    'keterangan'=>$this->input->post('keterangan'),
                    'user'=>$this->session->userdata('get_uid')
                )
            )
        );
        // header('Content-Type: application/json');
        // echo json_encode($req);
        // exit;
        date_default_timezone_set('UTC');
        $tStamp = strval(time()-strtotime('1970-01-01 00:00:00'))-SELISIH_WAKTU;
        // Create Signature
        $signature = hash_hmac('sha256', CONS_ID_VC."&".$tStamp, SECREET_ID_VC, true);
        $encodedSignature = base64_encode($signature);
        if(empty($tgl)) $tgl=date('Y-m-d');
        $contentType = "application/x-www-form-urlencoded";
        // Generate Header
        $header = "";
        $header .= "Content-Type: " . $contentType . "\r\n";
        $header .= "X-cons-id: " . CONS_ID_VC . "\r\n";
        $header .= "X-timestamp: " . $tStamp . "\r\n";
        $header .= "X-signature: " . $encodedSignature ."\r\n";
        $header .= "user_key: ".KEY_VC;
        $res=$this->vclaim_model->postData('Sep/pengajuanSEP',$header,json_encode($req));
        // echo $res; exit;
        
        
        $arr=json_decode($res);
        if(is_array($arr)){
            if($arr->metaData->code==200){
                $pengajuan = array(
                    'noKartu'=>$this->input->post('noKartu'),
                    'tglSep'=>$this->input->post('tglSep'),
                    'jnsPelayanan'=>$this->input->post('jnsPelayanan'),
                    'jnsPengajuan'=>$this->input->post('jnsPengajuan'),
                    'keterangan'=>$this->input->post('keterangan'),
                    'user'=>$this->session->userdata('get_uid')
                );
                $this->db->insert('tbl02_pengajuansep',$pengajuan);
            }
        }else{
            $pengajuan = array(
                'noKartu'=>$this->input->post('noKartu'),
                'tglSep'=>$this->input->post('tglSep'),
                'jnsPelayanan'=>$this->input->post('jnsPelayanan'),
                'jnsPengajuan'=>$this->input->post('jnsPengajuan'),
                'keterangan'=>$this->input->post('keterangan'),
                'statuspengajuan'=>'Pending',
                'user'=>$this->session->userdata('get_uid')
            );
            $this->db->insert('tbl02_pengajuansep',$pengajuan);
        }
        header('Content-Type: application/json');
        echo $res;
    }

    function aprovepengajuan(){
        $idx=intval($this->input->get('idx'));
        $this->db->where('idx',$idx);
        $row=$this->db->get('tbl02_pengajuansep')->row();
        
        if($row){
            $req=array(
                'request'=>array(
                    't_sep'=>array(
                        'noKartu'=>$row->noKartu,
                        'tglSep'=>$row->tglSep,
                        'jnsPelayanan'=>$row->jnsPelayanan,
                        'jnsPengajuan'=>$row->jnsPengajuan,
                        'keterangan'=>$row->keterangan,
                        'user'=>$this->session->userdata('get_uid')
                    )
                )
            );
            // header('Content-Type: application/json');
            // echo json_encode($req); exit;
            // print_r($req); exit;
            date_default_timezone_set('UTC');
            $tStamp = strval(time()-strtotime('1970-01-01 00:00:00'))-SELISIH_WAKTU;
            // Create Signature
            $signature = hash_hmac('sha256', CONS_ID_VC."&".$tStamp, SECREET_ID_VC, true);
            $encodedSignature = base64_encode($signature);
            if(empty($tgl)) $tgl=date('Y-m-d');
            $contentType = "application/x-www-form-urlencoded";
            // Generate Header
            $header = "";
            $header .= "Content-Type: " . $contentType . "\r\n";
            $header .= "X-cons-id: " . CONS_ID_VC . "\r\n";
            $header .= "X-timestamp: " . $tStamp . "\r\n";
            $header .= "X-signature: " . $encodedSignature ."\r\n";
            $header .= "user_key: ".KEY_VC;
            $res=$this->vclaim_model->postData('Sep/aprovalSEP',$header,json_encode($req));
            // echo $res; exit;
            $arr=json_decode($res);
            if(is_array($arr)){
                $status=array(
                    'statuspengajuan'=>'Aproved'
                );
                $this->db->where('idx',$idx);
                $this->db->update('tbl02_pengajuansep',$status);
            }
            
        }else{
            $response=array(
                'metaData'=>array(
                    'code'=>201,
                    'message'=>'Data Tidak Ditemukan Di Database Lokal'
                )
            );
            $res=json_encode($response);
        }
        header('Content-Type: application/json');
        echo $res;
    }

    function finger(){
        $data=array(
            'contentTitle'=>'Finger Print',
        );
        $z = setNav("nav_7");
        $y['index_menu'] = 7;
        $view=array(
            'header'=>$this->load->view('template/header', '', true),
            'nav_sidebar'=>$this->load->view('template/nav_sidebar', $z, true),
            'content'=>$this->load->view('vclaim/finger', $data, true),
            'index_menu'=>6,
            'libjs'=>array(
                'js/finger.js'
            )
        );
        $this->load->view('template/theme', $view);
    }
    
    function cekfinger(){
        date_default_timezone_set('UTC');
        $tStamp = strval(time()-strtotime('1970-01-01 00:00:00'))-SELISIH_WAKTU;
        // Create Signature
        $signature = hash_hmac('sha256', CONS_ID_VC."&".$tStamp, SECREET_ID_VC, true);
        $encodedSignature = base64_encode($signature);
        // if(empty($mulai)) $mulai=date('Y-m-d');
        // if(empty($selesai)) $selesai=date('Y-m-d');
        $noKartu = $this->input->get('noKartu');
        $tglPelayanan=$this->input->get('tglPelayanan');
        // Generate Header
        $header = "";
        $header .= "X-cons-id: " . CONS_ID_VC . "\r\n";
        $header .= "X-timestamp: " . $tStamp . "\r\n";
        $header .= "X-signature: " . $encodedSignature ."\r\n";
        $header .= "user_key: ".KEY_VC;

        $res = $this->vclaim_model->getData("SEP/FingerPrint/Peserta/$noKartu/TglPelayanan/$tglPelayanan",$header);
        if(isJSON($res)){
            $arr=json_decode($res);
            if($arr->metaData->code==200){
                $data=$this->vclaim_model->stringDecrypt(CONS_ID_VC.SECREET_ID_VC.$tStamp,$arr->response);
                $res=json_encode(array('metaData'=>$arr->metaData,'response'=>json_decode(hasil($data))));
            }
            header('Content-Type: application/json');
            echo $res;
        }else {
            echo $res;
        }
        
    }

    function listfinger(){
        date_default_timezone_set('UTC');
        $tStamp = strval(time()-strtotime('1970-01-01 00:00:00'))-SELISIH_WAKTU;
        // Create Signature
        $signature = hash_hmac('sha256', CONS_ID_VC."&".$tStamp, SECREET_ID_VC, true);
        $encodedSignature = base64_encode($signature);
        // if(empty($mulai)) $mulai=date('Y-m-d');
        // if(empty($selesai)) $selesai=date('Y-m-d');
        $tglPelayanan=$this->input->get('tglPelayanan');
        // Generate Header
        $header = "";
        $header .= "X-cons-id: " . CONS_ID_VC . "\r\n";
        $header .= "X-timestamp: " . $tStamp . "\r\n";
        $header .= "X-signature: " . $encodedSignature ."\r\n";
        $header .= "user_key: ".KEY_VC;

        $res = $this->vclaim_model->getData("SEP/FingerPrint/List/Peserta/TglPelayanan/$tglPelayanan",$header);
        if(isJSON($res)){
            $arr=json_decode($res);
            if($arr->metaData->code==200){
                $data=$this->vclaim_model->stringDecrypt(CONS_ID_VC.SECREET_ID_VC.$tStamp,$arr->response);
                $res=json_encode(array('metaData'=>$arr->metaData,'response'=>json_decode(hasil($data))));
            }
            header('Content-Type: application/json');
            echo $res;
        }else {
            echo $res;
        }
        
    }

    function jasaraharja(){
        $data=array(
            'contentTitle'=>'Suplesi Jasaraharja',
        );
        $z = setNav("nav_7");
        $y['index_menu'] = 7;
        $view=array(
            'header'=>$this->load->view('template/header', '', true),
            'nav_sidebar'=>$this->load->view('template/nav_sidebar', $z, true),
            'content'=>$this->load->view('vclaim/jasaraharja', $data, true),
            'index_menu'=>6,
            'libjs'=>array(
                'js/jasaraharja.js'
            )
        );
        $this->load->view('template/theme', $view);
    }
    function suplesi(){
        date_default_timezone_set('UTC');
        $tStamp = strval(time()-strtotime('1970-01-01 00:00:00'))-SELISIH_WAKTU;
        // Create Signature
        $signature = hash_hmac('sha256', CONS_ID_VC."&".$tStamp, SECREET_ID_VC, true);
        $encodedSignature = base64_encode($signature);
        // if(empty($mulai)) $mulai=date('Y-m-d');
        // if(empty($selesai)) $selesai=date('Y-m-d');
        $noKartu = $this->input->get('noKartu');
        $tglPelayanan=$this->input->get('tglPelayanan');
        // Generate Header
        $header = "";
        $header .= "X-cons-id: " . CONS_ID_VC . "\r\n";
        $header .= "X-timestamp: " . $tStamp . "\r\n";
        $header .= "X-signature: " . $encodedSignature ."\r\n";
        $header .= "user_key: ".KEY_VC;

        $res = $this->vclaim_model->getData("sep/JasaRaharja/Suplesi/$noKartu/TglPelayanan/$tglPelayanan",$header);
        if(isJSON($res)){
            $arr=json_decode($res);
            if($arr->metaData->code==200){
                $data=$this->vclaim_model->stringDecrypt(CONS_ID_VC.SECREET_ID_VC.$tStamp,$arr->response);
                $res=json_encode(array('metaData'=>$arr->metaData,'response'=>json_decode(hasil($data))));
            }
            header('Content-Type: application/json');
            echo $res;
        }else {
            echo $res;
        }
        
    }
    function kecelakaan(){
        date_default_timezone_set('UTC');
        $tStamp = strval(time()-strtotime('1970-01-01 00:00:00'))-SELISIH_WAKTU;
        // Create Signature
        $signature = hash_hmac('sha256', CONS_ID_VC."&".$tStamp, SECREET_ID_VC, true);
        $encodedSignature = base64_encode($signature);
        // if(empty($mulai)) $mulai=date('Y-m-d');
        // if(empty($selesai)) $selesai=date('Y-m-d');
        $noKartu = $this->input->get('noKartu');
        // Generate Header
        $header = "";
        $header .= "X-cons-id: " . CONS_ID_VC . "\r\n";
        $header .= "X-timestamp: " . $tStamp . "\r\n";
        $header .= "X-signature: " . $encodedSignature ."\r\n";
        $header .= "user_key: ".KEY_VC;

        $res = $this->vclaim_model->getData("sep/KllInduk/List/$noKartu",$header);
        if(isJSON($res)){
            $arr=json_decode($res);
            if($arr->metaData->code==200){
                $data=$this->vclaim_model->stringDecrypt(CONS_ID_VC.SECREET_ID_VC.$tStamp,$arr->response);
                $res=json_encode(array('metaData'=>$arr->metaData,'response'=>json_decode(hasil($data))));
            }
            header('Content-Type: application/json');
            echo $res;
        }else {
            echo $res;
        }
        
    }

    // function isJSON($string){
    //     return is_string($string) && is_array(json_decode($string, true)) ? true : false;
    //  }
}