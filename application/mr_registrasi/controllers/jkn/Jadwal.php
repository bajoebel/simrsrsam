<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Jadwal extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('jkn_model');
        $this->load->model('users_model');
        $this->load->helper('lz');
        $ses_state = $this->users_model->cek_session_id();
        if(!$ses_state){  
            $metadata=array(
                'code'=>201,
                'message'=>'Anda Belum Login Atau Session Expired'
            );
            $response=array(
                'metadata'=>$metadata
            );
            header('Content-Type: application/json');
            echo json_encode($response);
            exit;
        }
    }
    function index(){
        $data=array(
            'contentTitle'=>'List Jadwal',
            'ruang'=>$this->jkn_model->getPoly(),
            'dokter'=>$this->jkn_model->getDokter(array(1,2))
        );
        $z = setNav("nav_6");

        $view=array(
            'header'=>$this->load->view('template/header', '', true),
            'nav_sidebar'=>$this->load->view('template/nav_sidebar', $z, true),
            'content'=>$this->load->view('jkn/jadwal', $data, true),
            'index_menu'=>5,
            'libjs'=>array(
                'js/jadwal.js'
            )
        );
        $this->load->view('template/theme', $view);
    }
    
    function getdata()
    {
        $q = urldecode($this->input->get('keyword', TRUE));
            $start = intval($this->input->get('start'));
            $limit = intval($this->input->get('limit'));
            $mulai = ($start * $limit) - $limit;
            $response = array(
                'status'    => true,
                'message'   => "OK",
                'start'     => $mulai,
                'row_count' => $this->jkn_model->countDataJadwal($q),
                'limit'     => $limit,
                'data'      => $this->jkn_model->getDataJadwal($limit, $mulai, $q),
            );
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    function datadokter(){
        $poli=$this->input->get('poli');
        $dokter=array();

        $ruang=$this->db->where('idx',$poli)->get('tbl01_ruang')->row();
        header('Content-Type: application/json');
        echo json_encode(array('dokter'=>$dokter,'ruang'=>$ruang));
    }
    function datajadwaldokter(){
        $poli=$this->input->get('poli');
        $dokter=$this->input->get('dokter');
        $jadwal=$this->jkn_model->getJadwalDokter($poli,$dokter);
        header('Content-Type: application/json');
        echo json_encode(array('jadwal'=>$jadwal,'dokter'=>$this->jkn_model->getDokterByNrp($dokter)));
    }
    function simpanjadwal(){
        // Update Jadwal jkn Mobile
        $kodepoli=$this->input->post('kodepolijkn');
        $kodesubspesialis=$this->input->post('subspesialis');
        $kodedokter=$this->input->post('kodedokterjkn');

        $seninaktif=$this->input->post('seninaktif');
        $selasaaktif=$this->input->post('selasaaktif');
        $rabuaktif=$this->input->post('rabuaktif');
        $kamisaktif=$this->input->post('kamisaktif');
        $jumataktif=$this->input->post('jumataktif');
        $sabtuaktif=$this->input->post('sabtuaktif');
        $mingguaktif=$this->input->post('mingguaktif');
        if(!empty($seninaktif)){
            $jadwal[]=array(
                'hari'=>$seninaktif,
                'buka'=>substr($this->input->post('seninbuka'),0,5),
                'tutup'=>substr($this->input->post('senintutup'),0,5),
            );
        }
        if(!empty($selasaaktif)){
            // echo $selasaaktif; exit;
            $jadwal[]=array(
                'hari'=>$selasaaktif,
                'buka'=>substr($this->input->post('selasabuka'),0,5),
                'tutup'=>substr($this->input->post('selasatutup'),0,5),
            );
        }
        if(!empty($rabuaktif)){
            $jadwal[]=array(
                'hari'=>$rabuaktif,
                'buka'=>substr($this->input->post('rabubuka'),0,5),
                'tutup'=>substr($this->input->post('rabututup'),0,5),
            );
        }
        if(!empty($kamisaktif)){
            $jadwal[]=array(
                'hari'=>$kamisaktif,
                'buka'=>substr($this->input->post('kamisbuka'),0,5),
                'tutup'=>substr($this->input->post('kamistutup'),0,5),
            );
        }
        if(!empty($jumataktif)){
            $jadwal[]=array(
                'hari'=>$jumataktif,
                'buka'=>substr($this->input->post('jumatbuka'),0,5),
                'tutup'=>substr($this->input->post('jumattutup'),0,5),
            );
        }
        if(!empty($sabtuaktif)){
            $jadwal[]=array(
                'hari'=>$sabtuaktif,
                'buka'=>substr($this->input->post('sabtubuka'),0,5),
                'tutup'=>substr($this->input->post('sabtututup'),0,5),
            );
        }
        if(!empty($mingguaktif)){
            $jadwal[]=array(
                'hari'=>$mingguaktif,
                'buka'=>substr($this->input->post('minggubuka'),0,5),
                'tutup'=>substr($this->input->post('minggututup'),0,5),
            );
        }
        if(!empty($jadwal)){
            // Update Jadwal senin
            $sen=$this->jkn_model->cekjadwalpoli($this->input->post('kodedokterrs'),$this->input->post('kodepolirs'),'Senin');
            $waktu_awal =strtotime($this->input->post('seninbuka'));
            $waktu_akhir=strtotime($this->input->post('senintutup'));
            $selisih=$waktu_akhir-$waktu_awal;
            $selisihmenit=$selisih/60;
            $quota=$selisihmenit/6;
            $kuotajkn=(80*$quota)/100;
            $kuotanonjkn=(20*$quota)/100;
            $nama_dokter=getField('pgwNama',array('NRP'=>$this->input->post('kodedokterrs')),'tbl01_pegawai');
            $polynama=getField('ruang',array('idx'=>$this->input->post('kodepolirs')),'tbl01_ruang');
            if(empty($sen)){
                // Jika Belum Ada Jadwal Senin
                if($seninaktif==1){
                    // Insert Jadwal Simrs
                    $jadwalsim=array(
                        'jadwal_dokter_id'=>$this->input->post('kodedokterrs'),
                        'jadwal_dokter_id1'=>getField('iddokter',array('NRP'=>$this->input->post('kodedokterrs')),'tbl01_pegawai'), //Dokter id Simrslama
                        'dokterjkn'=>getField('iddokterjkn',array('NRP'=>$this->input->post('kodedokterrs')),'tbl01_pegawai'), //kode dokter bpjs
                        'jadwal_poly_id'=>$this->input->post('kodepolirs'),
                        'jadwal_poly_id1'=>getField('koderuanglama',array('idx'=>$this->input->post('kodepolirs')),'tbl01_ruang'),//Kode poli SIMRS,
                        'jadwal_kodepolijkn'=>getField('kodepolijkn',array('idx'=>$this->input->post('kodepolirs')),'tbl01_ruang'),
                        'jadwal_subspesialis_jkn'=>getField('kodejkn',array('idx'=>$this->input->post('kodepolirs')),'tbl01_ruang'),
                        'jadwal_poly_nama'=>$polynama,
                        'jadwal_hari'=>'Senin',
                        'jadwal_jam_mulai'=>$this->input->post('seninbuka'),
                        'jadwal_jam_selesai'=>$this->input->post('senintutup'),
                        'jadwal_checkin'=>'07:30',
                        'jadwal_pekan'=>0,
                        'group'=>1,
                        'kuotajkn'=>$kuotajkn,
                        'kuotanonjkn'=>$kuotanonjkn,
                        'jadwal_status'=>'Aktif',
                        'updated_at'=>date('Y-m-d H:i:s'),
                        'updated_at'=>date('Y-m-d H:i:s')
                    );
                    $this->db->insert('tbl02_jadwal_dokter',$jadwalsim);
                }
                
            }else{
                // Jika Sudah ada jadwal Senin
                if($seninaktif==1){
                    // Update Jadwal Simrs
                    $jadwalsim=array(
                        'jadwal_jam_mulai'=>$this->input->post('seninbuka'),
                        'jadwal_jam_selesai'=>$this->input->post('senintutup'),
                        'jadwal_status'=>'Aktif',
                        'group'=>1,
                        'kuotajkn'=>$kuotajkn,
                        'kuotanonjkn'=>$kuotanonjkn,
                        'updated_at'=>date('Y-m-d H:i:s')
                    );
                    $this->db->where('jadwal_dokter_id',$this->input->post('kodedokterrs'))
                    ->where('jadwal_poly_id',$this->input->post('kodepolirs'))
                    ->where('jadwal_hari','Senin')
                    ->update('tbl02_jadwal_dokter',$jadwalsim);
                }else{
                    // Hapus Jadwal Lokal Simrs
                    $jadwalstatus=array('jadwal_status'=>'Non Aktif');
                    $this->db->where('jadwal_dokter_id',$this->input->post('kodedokterrs'))
                    ->where('jadwal_poly_id',$this->input->post('kodepolirs'))
                    ->where('jadwal_hari','Senin')
                    ->update('tbl02_jadwal_dokter',$jadwalstatus);
                }
            }
            // Update Jadwal Selasa
            $sel=$this->jkn_model->cekjadwalpoli($this->input->post('kodedokterrs'),$this->input->post('kodepolirs'),'Selasa');
            $waktu_awal =strtotime($this->input->post('selasabuka'));
            $waktu_akhir=strtotime($this->input->post('selasatutup'));
            $selisih=$waktu_akhir-$waktu_awal;
            $selisihmenit=$selisih/60;
            $quota=$selisihmenit/6;
            $kuotajkn=(80*$quota)/100;
            $kuotanonjkn=(20*$quota)/100;
            if(empty($sel)){
                // Jika Belum Ada Jadwal Senin
                if($selasaaktif==2){
                    // Insert Jadwal Simrs
                    $jadwalsim=array(
                        'jadwal_dokter_id'=>$this->input->post('kodedokterrs'),
                        'jadwal_dokter_id1'=>getField('iddokter',array('NRP'=>$this->input->post('kodedokterrs')),'tbl01_pegawai'), //Dokter id Simrslama
                        'dokterjkn'=>getField('iddokterjkn',array('NRP'=>$this->input->post('kodedokterrs')),'tbl01_pegawai'), //kode dokter bpjs
                        'jadwal_poly_id'=>$this->input->post('kodepolirs'),
                        'jadwal_poly_id1'=>getField('koderuanglama',array('idx'=>$this->input->post('kodepolirs')),'tbl01_ruang'),//Kode poli SIMRS,
                        'jadwal_kodepolijkn'=>getField('kodepolijkn',array('idx'=>$this->input->post('kodepolirs')),'tbl01_ruang'),
                        'jadwal_subspesialis_jkn'=>getField('kodejkn',array('idx'=>$this->input->post('kodepolirs')),'tbl01_ruang'),
                        'jadwal_dokter_nama'=>$nama_dokter,
                        'jadwal_poly_nama'=>$polynama,
                        'jadwal_hari'=>'Selasa',
                        'jadwal_jam_mulai'=>$this->input->post('selasabuka'),
                        'jadwal_jam_selesai'=>$this->input->post('selasatutup'),
                        'jadwal_checkin'=>'07:30',
                        'jadwal_pekan'=>0,
                        'group'=>1,
                        'kuotajkn'=>$kuotajkn,
                        'kuotanonjkn'=>$kuotanonjkn,
                        'jadwal_status'=>'Aktif',
                        'updated_at'=>date('Y-m-d H:i:s'),
                        'updated_at'=>date('Y-m-d H:i:s')
                    );
                    $this->db->insert('tbl02_jadwal_dokter',$jadwalsim);
                }
                
            }else{
                // Jika Sudah ada jadwal Senin
                if($selasaaktif==2){
                    // Update Jadwal Simrs
                    $jadwalsim=array(
                        'jadwal_jam_mulai'=>$this->input->post('selasabuka'),
                        'jadwal_jam_selesai'=>$this->input->post('selasatutup'),
                        'group'=>1,
                        'kuotajkn'=>$kuotajkn,
                        'kuotanonjkn'=>$kuotanonjkn,
                        'jadwal_status'=>'Aktif',
                        'updated_at'=>date('Y-m-d H:i:s')
                    );
                    $this->db->where('jadwal_dokter_id',$this->input->post('kodedokterrs'))
                    ->where('jadwal_poly_id',$this->input->post('kodepolirs'))
                    ->where('jadwal_hari','Selasa')
                    ->update('tbl02_jadwal_dokter',$jadwalsim);
                }else{
                    // Hapus Jadwal Lokal Simrs
                    $jadwalstatus=array('jadwal_status'=>'Non Aktif');
                    $this->db->where('jadwal_dokter_id',$this->input->post('kodedokterrs'))
                    ->where('jadwal_poly_id',$this->input->post('kodepolirs'))
                    ->where('jadwal_hari','Selasa')
                    ->update('tbl02_jadwal_dokter',$jadwalstatus);
                }
            }
            // Update Jadwal Rabu
            $rab=$this->jkn_model->cekjadwalpoli($this->input->post('kodedokterrs'),$this->input->post('kodepolirs'),'Rabu');
            $waktu_awal =strtotime($this->input->post('rabubuka'));
            $waktu_akhir=strtotime($this->input->post('rabututup'));
            $selisih=$waktu_akhir-$waktu_awal;
            $selisihmenit=$selisih/60;
            $quota=$selisihmenit/6;
            $kuotajkn=(80*$quota)/100;
            $kuotanonjkn=(20*$quota)/100;
            if(empty($rab)){
                // Jika Belum Ada Jadwal Senin
                if($rabuaktif==3){
                    // Insert Jadwal Simrs
                    $jadwalsim=array(
                        'jadwal_dokter_id'=>$this->input->post('kodedokterrs'),
                        'jadwal_dokter_id1'=>getField('iddokter',array('NRP'=>$this->input->post('kodedokterrs')),'tbl01_pegawai'), //Dokter id Simrslama
                        'dokterjkn'=>getField('iddokterjkn',array('NRP'=>$this->input->post('kodedokterrs')),'tbl01_pegawai'), //kode dokter bpjs
                        'jadwal_poly_id'=>$this->input->post('kodepolirs'),
                        'jadwal_poly_id1'=>getField('koderuanglama',array('idx'=>$this->input->post('kodepolirs')),'tbl01_ruang'),//Kode poli SIMRS,
                        'jadwal_kodepolijkn'=>getField('kodepolijkn',array('idx'=>$this->input->post('kodepolirs')),'tbl01_ruang'),
                        'jadwal_subspesialis_jkn'=>getField('kodejkn',array('idx'=>$this->input->post('kodepolirs')),'tbl01_ruang'),
                        'jadwal_hari'=>'Rabu',
                        'jadwal_dokter_nama'=>$nama_dokter,
                        'jadwal_poly_nama'=>$polynama,
                        'jadwal_jam_mulai'=>$this->input->post('rabubuka'),
                        'jadwal_jam_selesai'=>$this->input->post('rabututup'),
                        'jadwal_checkin'=>'07:30',
                        'jadwal_pekan'=>0,
                        'group'=>1,
                        'kuotajkn'=>$kuotajkn,
                        'kuotanonjkn'=>$kuotanonjkn,
                        'jadwal_status'=>'Aktif',
                        'updated_at'=>date('Y-m-d H:i:s'),
                        'updated_at'=>date('Y-m-d H:i:s')
                    );
                    $this->db->insert('tbl02_jadwal_dokter',$jadwalsim);
                }
                
            }else{
                // Jika Sudah ada jadwal Senin
                if($rabuaktif==3){
                    // Update Jadwal Simrs
                    $jadwalsim=array(
                        'jadwal_jam_mulai'=>$this->input->post('rabubuka'),
                        'jadwal_jam_selesai'=>$this->input->post('rabututup'),
                        'jadwal_status'=>'Aktif',
                        'group'=>1,
                        'kuotajkn'=>$kuotajkn,
                        'kuotanonjkn'=>$kuotanonjkn,
                        'updated_at'=>date('Y-m-d H:i:s')
                    );
                    $this->db->where('jadwal_dokter_id',$this->input->post('kodedokterrs'))
                    ->where('jadwal_poly_id',$this->input->post('kodepolirs'))
                    ->where('jadwal_hari','Rabu')
                    ->update('tbl02_jadwal_dokter',$jadwalsim);
                }else{
                    // Hapus Jadwal Lokal Simrs
                    
                    $jadwalstatus=array('jadwal_status'=>'Non Aktif');
                    $this->db->where('jadwal_dokter_id',$this->input->post('kodedokterrs'))
                    ->where('jadwal_poly_id',$this->input->post('kodepolirs'))
                    ->where('jadwal_hari','Rabu')
                    ->update('tbl02_jadwal_dokter',$jadwalstatus);
                }
            }
            // Update Jadwal Kamis
            $kam=$this->jkn_model->cekjadwalpoli($this->input->post('kodedokterrs'),$this->input->post('kodepolirs'),'Kamis');
            $waktu_awal =strtotime($this->input->post('kamisbuka'));
            $waktu_akhir=strtotime($this->input->post('kamistutup'));
            $selisih=$waktu_akhir-$waktu_awal;
            $selisihmenit=$selisih/60;
            $quota=$selisihmenit/6;
            $kuotajkn=(80*$quota)/100;
            $kuotanonjkn=(20*$quota)/100;
            if(empty($kam)){
                // Jika Belum Ada Jadwal Senin
                if($kamisaktif==4){
                    // Insert Jadwal Simrs
                    $jadwalsim=array(
                        'jadwal_dokter_id'=>$this->input->post('kodedokterrs'),
                        'jadwal_dokter_id1'=>getField('iddokter',array('NRP'=>$this->input->post('kodedokterrs')),'tbl01_pegawai'), //Dokter id Simrslama
                        'dokterjkn'=>getField('iddokterjkn',array('NRP'=>$this->input->post('kodedokterrs')),'tbl01_pegawai'), //kode dokter bpjs
                        'jadwal_poly_id'=>$this->input->post('kodepolirs'),
                        'jadwal_poly_id1'=>getField('koderuanglama',array('idx'=>$this->input->post('kodepolirs')),'tbl01_ruang'),//Kode poli SIMRS,
                        'jadwal_kodepolijkn'=>getField('kodepolijkn',array('idx'=>$this->input->post('kodepolirs')),'tbl01_ruang'),
                        'jadwal_subspesialis_jkn'=>getField('kodejkn',array('idx'=>$this->input->post('kodepolirs')),'tbl01_ruang'),
                        'jadwal_dokter_nama'=>$nama_dokter,
                        'jadwal_poly_nama'=>$polynama,
                        'jadwal_hari'=>'Kamis',
                        'jadwal_jam_mulai'=>$this->input->post('kamisbuka'),
                        'jadwal_jam_selesai'=>$this->input->post('kamistutup'),
                        'jadwal_checkin'=>'07:30',
                        'jadwal_pekan'=>0,
                        'group'=>1,
                        'kuotajkn'=>$kuotajkn,
                        'kuotanonjkn'=>$kuotanonjkn,
                        'jadwal_status'=>'Aktif',
                        'updated_at'=>date('Y-m-d H:i:s'),
                        'updated_at'=>date('Y-m-d H:i:s')
                    );
                    $this->db->insert('tbl02_jadwal_dokter',$jadwalsim);
                }
                
            }else{
                // Jika Sudah ada jadwal Senin
                if($kamisaktif==4){
                    // Update Jadwal Simrs
                    $jadwalsim=array(
                        'jadwal_jam_mulai'=>$this->input->post('kamisbuka'),
                        'jadwal_jam_selesai'=>$this->input->post('kamistutup'),
                        'jadwal_status'=>'Aktif',
                        'group'=>1,
                        'kuotajkn'=>$kuotajkn,
                        'kuotanonjkn'=>$kuotanonjkn,
                        'updated_at'=>date('Y-m-d H:i:s')
                    );
                    $this->db->where('jadwal_dokter_id',$this->input->post('kodedokterrs'))
                    ->where('jadwal_poly_id',$this->input->post('kodepolirs'))
                    ->where('jadwal_hari','Kamis')
                    ->update('tbl02_jadwal_dokter',$jadwalsim);
                }else{
                    // Hapus Jadwal Lokal Simrs
                    $jadwalstatus=array('jadwal_status'=>'Non Aktif');
                    $this->db->where('jadwal_dokter_id',$this->input->post('kodedokterrs'))
                    ->where('jadwal_poly_id',$this->input->post('kodepolirs'))
                    ->where('jadwal_hari','Kamis')
                    ->update('tbl02_jadwal_dokter',$jadwalstatus);
                }
            }
            // Update Jadwal Jumat
            $jum=$this->jkn_model->cekjadwalpoli($this->input->post('kodedokterrs'),$this->input->post('kodepolirs'),'Jumat');
            $waktu_awal =strtotime($this->input->post('jumatbuka'));
            $waktu_akhir=strtotime($this->input->post('jumattutup'));
            $selisih=$waktu_akhir-$waktu_awal;
            $selisihmenit=$selisih/60;
            $quota=$selisihmenit/6;
            $kuotajkn=(80*$quota)/100;
            $kuotanonjkn=(20*$quota)/100;
            if(empty($jum)){
                // Jika Belum Ada Jadwal Senin
                if($jumataktif==5){
                    // Insert Jadwal Simrs
                    $jadwalsim=array(
                        'jadwal_dokter_id'=>$this->input->post('kodedokterrs'),
                        'jadwal_dokter_id1'=>getField('iddokter',array('NRP'=>$this->input->post('kodedokterrs')),'tbl01_pegawai'), //Dokter id Simrslama
                        'dokterjkn'=>getField('iddokterjkn',array('NRP'=>$this->input->post('kodedokterrs')),'tbl01_pegawai'), //kode dokter bpjs
                        'jadwal_poly_id'=>$this->input->post('kodepolirs'),
                        'jadwal_poly_id1'=>getField('koderuanglama',array('idx'=>$this->input->post('kodepolirs')),'tbl01_ruang'),//Kode poli SIMRS,
                        'jadwal_kodepolijkn'=>getField('kodepolijkn',array('idx'=>$this->input->post('kodepolirs')),'tbl01_ruang'),
                        'jadwal_subspesialis_jkn'=>getField('kodejkn',array('idx'=>$this->input->post('kodepolirs')),'tbl01_ruang'),
                        'jadwal_dokter_nama'=>$nama_dokter,
                        'jadwal_poly_nama'=>$polynama,
                        'jadwal_hari'=>'Jumat',
                        'jadwal_jam_mulai'=>$this->input->post('jumatbuka'),
                        'jadwal_jam_selesai'=>$this->input->post('jumattutup'),
                        'jadwal_checkin'=>'07:30',
                        'jadwal_pekan'=>0,
                        'group'=>1,
                        'kuotajkn'=>$kuotajkn,
                        'kuotanonjkn'=>$kuotanonjkn,
                        'jadwal_status'=>'Aktif',
                        'create_at'=>date('Y-m-d H:i:s'),
                        'updated_at'=>date('Y-m-d H:i:s')
                    );
                    $this->db->insert('tbl02_jadwal_dokter',$jadwalsim);
                }
                
            }else{
                // Jika Sudah ada jadwal Senin
                if($jumataktif==5){
                    // Update Jadwal Simrs
                    $jadwalsim=array(
                        'jadwal_jam_mulai'=>$this->input->post('jumatbuka'),
                        'jadwal_jam_selesai'=>$this->input->post('jumattutup'),
                        'jadwal_status'=>'Aktif',
                        'group'=>1,
                        'kuotajkn'=>$kuotajkn,
                        'kuotanonjkn'=>$kuotanonjkn,
                        'updated_at'=>date('Y-m-d H:i:s')
                    );
                    $this->db->where('jadwal_dokter_id',$this->input->post('kodedokterrs'))
                    ->where('jadwal_poly_id',$this->input->post('kodepolirs'))
                    ->where('jadwal_hari','Jumat')
                    ->update('tbl02_jadwal_dokter',$jadwalsim);
                }else{
                    // Hapus Jadwal Lokal Simrs
                    $jadwalstatus=array('jadwal_status'=>'Non Aktif');
                    $this->db->where('jadwal_dokter_id',$this->input->post('kodedokterrs'))
                    ->where('jadwal_poly_id',$this->input->post('kodepolirs'))
                    ->where('jadwal_hari','Jumat')
                    ->update('tbl02_jadwal_dokter',$jadwalstatus);
                }
            }
            // Update Jadwal Sabtu
            $sab=$this->jkn_model->cekjadwalpoli($this->input->post('kodedokterrs'),$this->input->post('kodepolirs'),'Sabtu');
            $waktu_awal =strtotime($this->input->post('sabtubuka'));
            $waktu_akhir=strtotime($this->input->post('sabtututup'));
            $selisih=$waktu_akhir-$waktu_awal;
            $selisihmenit=$selisih/60;
            $quota=$selisihmenit/6;
            $kuotajkn=(80*$quota)/100;
            $kuotanonjkn=(20*$quota)/100;
            if(empty($sab)){
                // Jika Belum Ada Jadwal Senin
                if($sabtuaktif==6){
                    // Insert Jadwal Simrs
                    $jadwalsim=array(
                        'jadwal_dokter_id'=>$this->input->post('kodedokterrs'),
                        'jadwal_dokter_id1'=>getField('iddokter',array('NRP'=>$this->input->post('kodedokterrs')),'tbl01_pegawai'), //Dokter id Simrslama
                        'dokterjkn'=>getField('iddokterjkn',array('NRP'=>$this->input->post('kodedokterrs')),'tbl01_pegawai'), //kode dokter bpjs
                        'jadwal_poly_id'=>$this->input->post('kodepolirs'),
                        'jadwal_poly_id1'=>getField('koderuanglama',array('idx'=>$this->input->post('kodepolirs')),'tbl01_ruang'),//Kode poli SIMRS,
                        'jadwal_kodepolijkn'=>getField('kodepolijkn',array('idx'=>$this->input->post('kodepolirs')),'tbl01_ruang'),
                        'jadwal_subspesialis_jkn'=>getField('kodejkn',array('idx'=>$this->input->post('kodepolirs')),'tbl01_ruang'),
                        'jadwal_dokter_nama'=>$nama_dokter,
                        'jadwal_poly_nama'=>$polynama,
                        'jadwal_hari'=>'Sabtu',
                        'jadwal_jam_mulai'=>$this->input->post('sabtubuka'),
                        'jadwal_jam_selesai'=>$this->input->post('sabtututup'),
                        'jadwal_checkin'=>'07:30',
                        'jadwal_pekan'=>0,
                        'group'=>1,
                        'kuotajkn'=>$kuotajkn,
                        'kuotanonjkn'=>$kuotanonjkn,
                        'jadwal_status'=>'Aktif',
                        'updated_at'=>date('Y-m-d H:i:s'),
                        'updated_at'=>date('Y-m-d H:i:s')
                    );
                    $this->db->insert('tbl02_jadwal_dokter',$jadwalsim);
                }
                
            }else{
                // Jika Sudah ada jadwal Senin
                if($sabtuaktif==6){
                    // Update Jadwal Simrs
                    $jadwalsim=array(
                        'jadwal_jam_mulai'=>$this->input->post('sabtubuka'),
                        'jadwal_jam_selesai'=>$this->input->post('sabtututup'),
                        'jadwal_status'=>'Aktif',
                        'group'=>1,
                        'kuotajkn'=>$kuotajkn,
                        'kuotanonjkn'=>$kuotanonjkn,
                        'updated_at'=>date('Y-m-d H:i:s')
                    );
                    $this->db->where('jadwal_dokter_id',$this->input->post('kodedokterrs'))
                    ->where('jadwal_poly_id',$this->input->post('kodepolirs'))
                    ->where('jadwal_hari','Sabtu')
                    ->update('tbl02_jadwal_dokter',$jadwalsim);
                }else{
                    // Hapus Jadwal Lokal Simrs
                    $jadwalstatus=array('jadwal_status'=>'Non Aktif');
                    $this->db->where('jadwal_dokter_id',$this->input->post('kodedokterrs'))
                    ->where('jadwal_poly_id',$this->input->post('kodepolirs'))
                    ->where('jadwal_hari','Sabtu')
                    ->update('tbl02_jadwal_dokter',$jadwalstatus);
                }
            }
            // Update Jadwal Minggu
            $minggu=$this->jkn_model->cekjadwalpoli($this->input->post('kodedokterrs'),$this->input->post('kodepolirs'),'Minggu');
            $waktu_awal =strtotime($this->input->post('minggubuka'));
            $waktu_akhir=strtotime($this->input->post('minggututup'));
            $selisih=$waktu_akhir-$waktu_awal;
            $selisihmenit=$selisih/60;
            $quota=$selisihmenit/6;
            $kuotajkn=(80*$quota)/100;
            $kuotanonjkn=(20*$quota)/100;
            if(empty($minggu)){
                // Jika Belum Ada Jadwal Senin
                if($mingguaktif==7){
                    // Insert Jadwal Simrs
                    $jadwalsim=array(
                        'jadwal_dokter_id'=>$this->input->post('kodedokterrs'),
                        'jadwal_dokter_id1'=>getField('iddokter',array('NRP'=>$this->input->post('kodedokterrs')),'tbl01_pegawai'), //Dokter id Simrslama
                        'dokterjkn'=>getField('iddokterjkn',array('NRP'=>$this->input->post('kodedokterrs')),'tbl01_pegawai'), //kode dokter bpjs
                        'jadwal_poly_id'=>$this->input->post('kodepolirs'),
                        'jadwal_poly_id1'=>getField('koderuanglama',array('idx'=>$this->input->post('kodepolirs')),'tbl01_ruang'),//Kode poli SIMRS,
                        'jadwal_kodepolijkn'=>getField('kodepolijkn',array('idx'=>$this->input->post('kodepolirs')),'tbl01_ruang'),
                        'jadwal_subspesialis_jkn'=>getField('kodejkn',array('idx'=>$this->input->post('kodepolirs')),'tbl01_ruang'),
                        'jadwal_dokter_nama'=>$nama_dokter,
                        'jadwal_poly_nama'=>$polynama,
                        'jadwal_hari'=>'Minggu',
                        'jadwal_jam_mulai'=>$this->input->post('minggubuka'),
                        'jadwal_jam_selesai'=>$this->input->post('minggututup'),
                        'jadwal_checkin'=>'07:30',
                        'jadwal_pekan'=>0,
                        'group'=>1,
                        'kuotajkn'=>$kuotajkn,
                        'kuotanonjkn'=>$kuotanonjkn,
                        'jadwal_status'=>'Aktif',
                        'updated_at'=>date('Y-m-d H:i:s'),
                        'updated_at'=>date('Y-m-d H:i:s')
                    );
                    $this->db->insert('tbl02_jadwal_dokter',$jadwalsim);
                }
                
            }else{
                // Jika Sudah ada jadwal Senin
                if($mingguaktif==7){
                    // Update Jadwal Simrs
                    $jadwalsim=array(
                        'jadwal_jam_mulai'=>$this->input->post('minggubuka'),
                        'jadwal_jam_selesai'=>$this->input->post('minggututup'),
                        'jadwal_status'=>'Aktif',
                        'group'=>1,
                        'kuotajkn'=>$kuotajkn,
                        'kuotanonjkn'=>$kuotanonjkn,
                        'updated_at'=>date('Y-m-d H:i:s')
                    );
                    $this->db->where('jadwal_dokter_id',$this->input->post('kodedokterrs'))
                    ->where('jadwal_poly_id',$this->input->post('kodepolirs'))
                    ->where('jadwal_hari','Minggu')
                    ->update('tbl02_jadwal_dokter',$jadwalsim);
                }else{
                    // Hapus Jadwal Lokal Simrs
                    $jadwalstatus=array('jadwal_status'=>'Non Aktif');
                    $this->db->where('jadwal_dokter_id',$this->input->post('kodedokterrs'))
                    ->where('jadwal_poly_id',$this->input->post('kodepolirs'))
                    ->where('jadwal_hari','Minggu')
                    ->update('tbl02_jadwal_dokter',$jadwalstatus);
                }
            }
            $response=array(
                'metadata'=>array('code'=>200,'message'=>'Simpan Jadwal Berhasil')
            );
            /*if(empty($kodepoli) || $kodepoli=="-" || empty($kodesubspesialis)||$kodesubspesialis=="-"||empty($kodedokter)||$kodedokter=="-"){
                // Update Jadwal senin
                $sen=$this->jkn_model->cekjadwalpoli($this->input->post('kodedokterrs'),$this->input->post('kodepolirs'),'Senin');
                $waktu_awal =strtotime($this->input->post('seninbuka'));
                $waktu_akhir=strtotime($this->input->post('senintutup'));
                $selisih=$waktu_akhir-$waktu_awal;
                $selisihmenit=$selisih/60;
                $quota=$selisihmenit/6;
                $kuotajkn=(80*$quota)/100;
                $kuotanonjkn=(20*$quota)/100;
                if(empty($sen)){
                    // Jika Belum Ada Jadwal Senin
                    if($seninaktif==1){
                        // Insert Jadwal Simrs
                        $jadwalsim=array(
                            'jadwal_dokter_id'=>$this->input->post('kodedokterrs'),
                            'jadwal_poly_id'=>$this->input->post('kodepolirs'),
                            'jadwal_hari'=>'Senin',
                            'jadwal_jam_mulai'=>$this->input->post('seninbuka'),
                            'jadwal_jam_selesai'=>$this->input->post('senintutup'),
                            'jadwal_checkin'=>'07:30',
                            'jadwal_pekan'=>0,
                            'group'=>1,
                            'kuotajkn'=>$kuotajkn,
                            'kuotanonjkn'=>$kuotanonjkn,
                            'jadwal_status'=>'Aktif',
                            'updated_at'=>date('Y-m-d H:i:s'),
                            'updated_at'=>date('Y-m-d H:i:s')
                        );
                        $this->db->insert('tbl02_jadwal_dokter',$jadwalsim);
                    }
                    
                }else{
                    // Jika Sudah ada jadwal Senin
                    if($seninaktif==1){
                        // Update Jadwal Simrs
                        $jadwalsim=array(
                            'jadwal_jam_mulai'=>$this->input->post('seninbuka'),
                            'jadwal_jam_selesai'=>$this->input->post('senintutup'),
                            'group'=>1,
                            'kuotajkn'=>$kuotajkn,
                            'kuotanonjkn'=>$kuotanonjkn,
                            'updated_at'=>date('Y-m-d H:i:s')
                        );
                        $this->db->where('jadwal_dokter_id',$this->input->post('kodedokterrs'))
                        ->where('jadwal_poly_id',$this->input->post('kodepolirs'))
                        ->where('jadwal_hari','Senin')
                        ->update('tbl02_jadwal_dokter',$jadwalsim);
                    }else{
                        // Hapus Jadwal Lokal Simrs
                        $jadwalstatus=array('jadwal_status'=>'Non Aktif');
                        $this->db->where('jadwal_dokter_id',$this->input->post('kodedokterrs'))
                        ->where('jadwal_poly_id',$this->input->post('kodepolirs'))
                        ->where('jadwal_hari','Senin')
                        ->update('tbl02_jadwal_dokter',$jadwalstatus);
                    }
                }
                // Update Jadwal Selasa
                $sel=$this->jkn_model->cekjadwalpoli($this->input->post('kodedokterrs'),$this->input->post('kodepolirs'),'Selasa');
                $waktu_awal =strtotime($this->input->post('selasabuka'));
                $waktu_akhir=strtotime($this->input->post('selasatutup'));
                $selisih=$waktu_akhir-$waktu_awal;
                $selisihmenit=$selisih/60;
                $quota=$selisihmenit/6;
                $kuotajkn=(80*$quota)/100;
                $kuotanonjkn=(20*$quota)/100;
                if(empty($sel)){
                    // Jika Belum Ada Jadwal Senin
                    if($selasaaktif==2){
                        // Insert Jadwal Simrs
                        
                        $jadwalsim=array(
                            'jadwal_dokter_id'=>$this->input->post('kodedokterrs'),
                            'jadwal_poly_id'=>$this->input->post('kodepolirs'),
                            'jadwal_hari'=>'Selasa',
                            'jadwal_jam_mulai'=>$this->input->post('selasabuka'),
                            'jadwal_jam_selesai'=>$this->input->post('selasatutup'),
                            'jadwal_checkin'=>'07:30',
                            'jadwal_pekan'=>0,
                            'group'=>1,
                            'kuotajkn'=>$kuotajkn,
                            'kuotanonjkn'=>$kuotanonjkn,
                            'jadwal_status'=>'Aktif',
                            'updated_at'=>date('Y-m-d H:i:s'),
                            'updated_at'=>date('Y-m-d H:i:s')
                        );
                        $this->db->insert('tbl02_jadwal_dokter',$jadwalsim);
                    }
                    
                }else{
                    // Jika Sudah ada jadwal Senin
                    if($selasaaktif==2){
                        // Update Jadwal Simrs
                        $jadwalsim=array(
                            'jadwal_jam_mulai'=>$this->input->post('selasabuka'),
                            'jadwal_jam_selesai'=>$this->input->post('selasatutup'),
                            'group'=>1,
                            'kuotajkn'=>$kuotajkn,
                            'kuotanonjkn'=>$kuotanonjkn,
                            'updated_at'=>date('Y-m-d H:i:s')
                        );
                        $this->db->where('jadwal_dokter_id',$this->input->post('kodedokterrs'))
                        ->where('jadwal_poly_id',$this->input->post('kodepolirs'))
                        ->where('jadwal_hari','Selasa')
                        ->update('tbl02_jadwal_dokter',$jadwalsim);
                    }else{
                        // Hapus Jadwal Lokal Simrs
                        $jadwalstatus=array('jadwal_status'=>'Non Aktif');
                        $this->db->where('jadwal_dokter_id',$this->input->post('kodedokterrs'))
                        ->where('jadwal_poly_id',$this->input->post('kodepolirs'))
                        ->where('jadwal_hari','Selasa')
                        ->update('tbl02_jadwal_dokter',$jadwalstatus);
                    }
                }
                // Update Jadwal Rabu
                $rab=$this->jkn_model->cekjadwalpoli($this->input->post('kodedokterrs'),$this->input->post('kodepolirs'),'Rabu');
                $waktu_awal =strtotime($this->input->post('rabubuka'));
                $waktu_akhir=strtotime($this->input->post('rabututup'));
                $selisih=$waktu_akhir-$waktu_awal;
                $selisihmenit=$selisih/60;
                $quota=$selisihmenit/6;
                $kuotajkn=(80*$quota)/100;
                $kuotanonjkn=(20*$quota)/100;
                if(empty($rab)){
                    // Jika Belum Ada Jadwal Senin
                    if($rabuaktif==3){
                        // Insert Jadwal Simrs
                        $jadwalsim=array(
                            'jadwal_dokter_id'=>$this->input->post('kodedokterrs'),
                            'jadwal_poly_id'=>$this->input->post('kodepolirs'),
                            'jadwal_hari'=>'Rabu',
                            'jadwal_jam_mulai'=>$this->input->post('rabubuka'),
                            'jadwal_jam_selesai'=>$this->input->post('rabututup'),
                            'jadwal_checkin'=>'07:30',
                            'jadwal_pekan'=>0,
                            'group'=>1,
                            'kuotajkn'=>$kuotajkn,
                            'kuotanonjkn'=>$kuotanonjkn,
                            'jadwal_status'=>'Aktif',
                            'updated_at'=>date('Y-m-d H:i:s'),
                            'updated_at'=>date('Y-m-d H:i:s')
                        );
                        $this->db->insert('tbl02_jadwal_dokter',$jadwalsim);
                    }
                    
                }else{
                    // Jika Sudah ada jadwal Senin
                    if($rabuaktif==3){
                        // Update Jadwal Simrs
                        $jadwalsim=array(
                            'jadwal_jam_mulai'=>$this->input->post('rabubuka'),
                            'jadwal_jam_selesai'=>$this->input->post('rabututup'),
                            'group'=>1,
                            'kuotajkn'=>$kuotajkn,
                            'kuotanonjkn'=>$kuotanonjkn,
                            'updated_at'=>date('Y-m-d H:i:s')
                        );
                        $this->db->where('jadwal_dokter_id',$this->input->post('kodedokterrs'))
                        ->where('jadwal_poly_id',$this->input->post('kodepolirs'))
                        ->where('jadwal_hari','Rabu')
                        ->update('tbl02_jadwal_dokter',$jadwalsim);
                    }else{
                        // Hapus Jadwal Lokal Simrs
                        
                        $jadwalstatus=array('jadwal_status'=>'Non Aktif');
                        $this->db->where('jadwal_dokter_id',$this->input->post('kodedokterrs'))
                        ->where('jadwal_poly_id',$this->input->post('kodepolirs'))
                        ->where('jadwal_hari','Rabu')
                        ->update('tbl02_jadwal_dokter',$jadwalstatus);
                    }
                }
                // Update Jadwal Kamis
                $kam=$this->jkn_model->cekjadwalpoli($this->input->post('kodedokterrs'),$this->input->post('kodepolirs'),'Kamis');
                $waktu_awal =strtotime($this->input->post('kamisbuka'));
                $waktu_akhir=strtotime($this->input->post('kamistutup'));
                $selisih=$waktu_akhir-$waktu_awal;
                $selisihmenit=$selisih/60;
                $quota=$selisihmenit/6;
                $kuotajkn=(80*$quota)/100;
                $kuotanonjkn=(20*$quota)/100;
                if(empty($kam)){
                    // Jika Belum Ada Jadwal Senin
                    if($kamisaktif==4){
                        // Insert Jadwal Simrs
                        $jadwalsim=array(
                            'jadwal_dokter_id'=>$this->input->post('kodedokterrs'),
                            'jadwal_poly_id'=>$this->input->post('kodepolirs'),
                            'jadwal_hari'=>'Kamis',
                            'jadwal_jam_mulai'=>$this->input->post('kamisbuka'),
                            'jadwal_jam_selesai'=>$this->input->post('kamistutup'),
                            'jadwal_checkin'=>'07:30',
                            'jadwal_pekan'=>0,
                            'group'=>1,
                            'kuotajkn'=>$kuotajkn,
                            'kuotanonjkn'=>$kuotanonjkn,
                            'jadwal_status'=>'Aktif',
                            'updated_at'=>date('Y-m-d H:i:s'),
                            'updated_at'=>date('Y-m-d H:i:s')
                        );
                        $this->db->insert('tbl02_jadwal_dokter',$jadwalsim);
                    }
                    
                }else{
                    // Jika Sudah ada jadwal Senin
                    if($kamisaktif==4){
                        // Update Jadwal Simrs
                        $jadwalsim=array(
                            'jadwal_jam_mulai'=>$this->input->post('kamisbuka'),
                            'jadwal_jam_selesai'=>$this->input->post('kamistutup'),
                            'group'=>1,
                            'kuotajkn'=>$kuotajkn,
                            'kuotanonjkn'=>$kuotanonjkn,
                            'updated_at'=>date('Y-m-d H:i:s')
                        );
                        $this->db->where('jadwal_dokter_id',$this->input->post('kodedokterrs'))
                        ->where('jadwal_poly_id',$this->input->post('kodepolirs'))
                        ->where('jadwal_hari','Kamis')
                        ->update('tbl02_jadwal_dokter',$jadwalsim);
                    }else{
                        // Hapus Jadwal Lokal Simrs
                        $jadwalstatus=array('jadwal_status'=>'Non Aktif');
                        $this->db->where('jadwal_dokter_id',$this->input->post('kodedokterrs'))
                        ->where('jadwal_poly_id',$this->input->post('kodepolirs'))
                        ->where('jadwal_hari','Kamis')
                        ->update('tbl02_jadwal_dokter',$jadwalstatus);
                    }
                }
                // Update Jadwal Jumat
                $jum=$this->jkn_model->cekjadwalpoli($this->input->post('kodedokterrs'),$this->input->post('kodepolirs'),'Jumat');
                $waktu_awal =strtotime($this->input->post('jumatbuka'));
                $waktu_akhir=strtotime($this->input->post('jumattutup'));
                $selisih=$waktu_akhir-$waktu_awal;
                $selisihmenit=$selisih/60;
                $quota=$selisihmenit/6;
                $kuotajkn=(80*$quota)/100;
                $kuotanonjkn=(20*$quota)/100;
                if(empty($jum)){
                    // Jika Belum Ada Jadwal Senin
                    if($jumataktif==5){
                        // Insert Jadwal Simrs
                        $jadwalsim=array(
                            'jadwal_dokter_id'=>$this->input->post('kodedokterrs'),
                            'jadwal_poly_id'=>$this->input->post('kodepolirs'),
                            'jadwal_hari'=>'Jumat',
                            'jadwal_jam_mulai'=>$this->input->post('jumatbuka'),
                            'jadwal_jam_selesai'=>$this->input->post('jumattutup'),
                            'jadwal_checkin'=>'07:30',
                            'jadwal_pekan'=>0,
                            'group'=>1,
                            'kuotajkn'=>$kuotajkn,
                            'kuotanonjkn'=>$kuotanonjkn,
                            'jadwal_status'=>'Aktif',
                            'updated_at'=>date('Y-m-d H:i:s'),
                            'updated_at'=>date('Y-m-d H:i:s')
                        );
                        $this->db->insert('tbl02_jadwal_dokter',$jadwalsim);
                    }
                    
                }else{
                    // Jika Sudah ada jadwal Senin
                    if($jumataktif==5){
                        // Update Jadwal Simrs
                        $jadwalsim=array(
                            'jadwal_jam_mulai'=>$this->input->post('jumatbuka'),
                            'jadwal_jam_selesai'=>$this->input->post('jumattutup'),
                            'group'=>1,
                            'kuotajkn'=>$kuotajkn,
                            'kuotanonjkn'=>$kuotanonjkn,
                            'updated_at'=>date('Y-m-d H:i:s')
                        );
                        $this->db->where('jadwal_dokter_id',$this->input->post('kodedokterrs'))
                        ->where('jadwal_poly_id',$this->input->post('kodepolirs'))
                        ->where('jadwal_hari','Jumat')
                        ->update('tbl02_jadwal_dokter',$jadwalsim);
                    }else{
                        // Hapus Jadwal Lokal Simrs
                        $jadwalstatus=array('jadwal_status'=>'Non Aktif');
                        $this->db->where('jadwal_dokter_id',$this->input->post('kodedokterrs'))
                        ->where('jadwal_poly_id',$this->input->post('kodepolirs'))
                        ->where('jadwal_hari','Jumat')
                        ->update('tbl02_jadwal_dokter',$jadwalstatus);
                    }
                }
                // Update Jadwal Sabtu
                $sab=$this->jkn_model->cekjadwalpoli($this->input->post('kodedokterrs'),$this->input->post('kodepolirs'),'Sabtu');
                $waktu_awal =strtotime($this->input->post('sabtubuka'));
                $waktu_akhir=strtotime($this->input->post('sabtututup'));
                $selisih=$waktu_akhir-$waktu_awal;
                $selisihmenit=$selisih/60;
                $quota=$selisihmenit/6;
                $kuotajkn=(80*$quota)/100;
                $kuotanonjkn=(20*$quota)/100;
                if(empty($sab)){
                    // Jika Belum Ada Jadwal Senin
                    if($sabtuaktif==6){
                        // Insert Jadwal Simrs
                        $jadwalsim=array(
                            'jadwal_dokter_id'=>$this->input->post('kodedokterrs'),
                            'jadwal_poly_id'=>$this->input->post('kodepolirs'),
                            'jadwal_hari'=>'Sabtu',
                            'jadwal_jam_mulai'=>$this->input->post('sabtubuka'),
                            'jadwal_jam_selesai'=>$this->input->post('sabtututup'),
                            'jadwal_checkin'=>'07:30',
                            'jadwal_pekan'=>0,
                            'group'=>1,
                            'kuotajkn'=>$kuotajkn,
                            'kuotanonjkn'=>$kuotanonjkn,
                            'jadwal_status'=>'Aktif',
                            'updated_at'=>date('Y-m-d H:i:s'),
                            'updated_at'=>date('Y-m-d H:i:s')
                        );
                        $this->db->insert('tbl02_jadwal_dokter',$jadwalsim);
                    }
                    
                }else{
                    // Jika Sudah ada jadwal Senin
                    if($sabtuaktif==6){
                        // Update Jadwal Simrs
                        $jadwalsim=array(
                            'jadwal_jam_mulai'=>$this->input->post('sabtubuka'),
                            'jadwal_jam_selesai'=>$this->input->post('sabtututup'),
                            'group'=>1,
                            'kuotajkn'=>$kuotajkn,
                            'kuotanonjkn'=>$kuotanonjkn,
                            'updated_at'=>date('Y-m-d H:i:s')
                        );
                        $this->db->where('jadwal_dokter_id',$this->input->post('kodedokterrs'))
                        ->where('jadwal_poly_id',$this->input->post('kodepolirs'))
                        ->where('jadwal_hari','Sabtu')
                        ->update('tbl02_jadwal_dokter',$jadwalsim);
                    }else{
                        // Hapus Jadwal Lokal Simrs
                        $jadwalstatus=array('jadwal_status'=>'Non Aktif');
                        $this->db->where('jadwal_dokter_id',$this->input->post('kodedokterrs'))
                        ->where('jadwal_poly_id',$this->input->post('kodepolirs'))
                        ->where('jadwal_hari','Sabtu')
                        ->update('tbl02_jadwal_dokter',$jadwalstatus);
                    }
                }
                // Update Jadwal Minggu
                $minggu=$this->jkn_model->cekjadwalpoli($this->input->post('kodedokterrs'),$this->input->post('kodepolirs'),'Minggu');
                $waktu_awal =strtotime($this->input->post('minggubuka'));
                $waktu_akhir=strtotime($this->input->post('minggututup'));
                $selisih=$waktu_akhir-$waktu_awal;
                $selisihmenit=$selisih/60;
                $quota=$selisihmenit/6;
                $kuotajkn=(80*$quota)/100;
                $kuotanonjkn=(20*$quota)/100;
                if(empty($minggu)){
                    // Jika Belum Ada Jadwal Senin
                    if($mingguaktif==7){
                        // Insert Jadwal Simrs
                        $jadwalsim=array(
                            'jadwal_dokter_id'=>$this->input->post('kodedokterrs'),
                            'jadwal_poly_id'=>$this->input->post('kodepolirs'),
                            'jadwal_hari'=>'Minggu',
                            'jadwal_jam_mulai'=>$this->input->post('minggubuka'),
                            'jadwal_jam_selesai'=>$this->input->post('minggututup'),
                            'jadwal_checkin'=>'07:30',
                            'jadwal_pekan'=>0,
                            'group'=>1,
                            'kuotajkn'=>$kuotajkn,
                            'kuotanonjkn'=>$kuotanonjkn,
                            'jadwal_status'=>'Aktif',
                            'updated_at'=>date('Y-m-d H:i:s'),
                            'updated_at'=>date('Y-m-d H:i:s')
                        );
                        $this->db->insert('tbl02_jadwal_dokter',$jadwalsim);
                    }
                    
                }else{
                    // Jika Sudah ada jadwal Senin
                    if($mingguaktif==7){
                        // Update Jadwal Simrs
                        $jadwalsim=array(
                            'jadwal_jam_mulai'=>$this->input->post('minggubuka'),
                            'jadwal_jam_selesai'=>$this->input->post('minggututup'),
                            'group'=>1,
                            'kuotajkn'=>$kuotajkn,
                            'kuotanonjkn'=>$kuotanonjkn,
                            'updated_at'=>date('Y-m-d H:i:s')
                        );
                        $this->db->where('jadwal_dokter_id',$this->input->post('kodedokterrs'))
                        ->where('jadwal_poly_id',$this->input->post('kodepolirs'))
                        ->where('jadwal_hari','Minggu')
                        ->update('tbl02_jadwal_dokter',$jadwalsim);
                    }else{
                        // Hapus Jadwal Lokal Simrs
                        $jadwalstatus=array('jadwal_status'=>'Non Aktif');
                        $this->db->where('jadwal_dokter_id',$this->input->post('kodedokterrs'))
                        ->where('jadwal_poly_id',$this->input->post('kodepolirs'))
                        ->where('jadwal_hari','Minggu')
                        ->update('tbl02_jadwal_dokter',$jadwalstatus);
                    }
                }
                $response=array(
                    'metadata'=>array('code'=>200,'message'=>'Simpan Jadwal Berhasil')
                );
            }
            else{
                // Update Jadwal Jkn
                $req=array(
                    'kodepoli'=>$kodepoli,
                    'kodesubspesialis'=>$kodesubspesialis,
                    'kodedokter'=>$kodedokter,
                    'jadwal'=>$jadwal
                );
                // $response=$request;
                // echo json_encode($req); exit;
                date_default_timezone_set('UTC');
                $tStamp = strval(time()-strtotime('1970-01-01 00:00:00'))-SELISIH_WAKTU;
                // Create Signature
                $signature = hash_hmac('sha256', CONS_ID_JKN."&".$tStamp, SECREET_ID_JKN, true);
                $encodedSignature = base64_encode($signature);
                // Generate Header
                $header = "";
                $header .= "X-cons-id: " . CONS_ID_JKN . "\r\n";
                $header .= "X-timestamp: " . $tStamp . "\r\n";
                $header .= "X-signature: " . $encodedSignature ."\r\n";
                $header .= "user_key: ".KEY_JKN;
                $res = $this->jkn_model->postData("jadwaldokter/updatejadwaldokter",$header,json_encode($req));
                
                $response=json_decode($res);
                
                if($response->metadata->code==200){
                    $sen=$this->jkn_model->cekjadwalpoli($this->input->post('kodedokterrs'),$this->input->post('kodepolirs'),'Senin');
                    $waktu_awal =strtotime($this->input->post('seninbuka'));
                    $waktu_akhir=strtotime($this->input->post('senintutup'));
                    $selisih=$waktu_akhir-$waktu_awal;
                    $selisihmenit=$selisih/60;
                    $quota=$selisihmenit/6;
                    $kuotajkn=(80*$quota)/100;
                    $kuotanonjkn=(20*$quota)/100;
                    if(empty($sen)){
                        // Jika Belum Ada Jadwal Senin
                        if($seninaktif==1){
                            // Insert Jadwal Simrs
                            $jadwalsim=array(
                                'jadwal_dokter_id'=>$this->input->post('kodedokterrs'),
                                'jadwal_poly_id'=>$this->input->post('kodepolirs'),
                                'jadwal_hari'=>'Senin',
                                'jadwal_jam_mulai'=>$this->input->post('seninbuka'),
                                'jadwal_jam_selesai'=>$this->input->post('senintutup'),
                                'jadwal_checkin'=>'07:30',
                                'jadwal_pekan'=>0,
                                'group'=>1,
                                'kuotajkn'=>$kuotajkn,
                                'kuotanonjkn'=>$kuotanonjkn,
                                'jadwal_status'=>'Aktif',
                                'updated_at'=>date('Y-m-d H:i:s'),
                                'updated_at'=>date('Y-m-d H:i:s')
                            );
                            $this->db->insert('tbl02_jadwal_dokter',$jadwalsim);
                        }
                        
                    }else{
                        // Jika Sudah ada jadwal Senin
                        if($seninaktif==1){
                            // Update Jadwal Simrs
                            $jadwalsim=array(
                                'jadwal_jam_mulai'=>$this->input->post('seninbuka'),
                                'jadwal_jam_selesai'=>$this->input->post('senintutup'),
                                'group'=>1,
                                'kuotajkn'=>$kuotajkn,
                                'kuotanonjkn'=>$kuotanonjkn,
                                'updated_at'=>date('Y-m-d H:i:s')
                            );
                            $this->db->where('jadwal_dokter_id',$this->input->post('kodedokterrs'))
                                ->where('jadwal_poly_id',$this->input->post('kodepolirs'))
                                ->where('jadwal_hari','Senin')
                                ->update('tbl02_jadwal_dokter',$jadwalsim);
                        }else{
                            // Hapus Jadwal Lokal Simrs
                            $jadwalstatus=array('jadwal_status'=>'Non Aktif');
                            $this->db->where('jadwal_dokter_id',$this->input->post('kodedokterrs'))
                                ->where('jadwal_poly_id',$this->input->post('kodepolirs'))
                                ->where('jadwal_hari','Senin')
                                ->update('tbl02_jadwal_dokter',$jadwalstatus);
                        }
                    }
                    // Update Jadwal Selasa
                    $sen=$this->jkn_model->cekjadwalpoli($this->input->post('kodedokterrs'),$this->input->post('kodepolirs'),'Selasa');
                    $waktu_awal =strtotime($this->input->post('selasabuka'));
                    $waktu_akhir=strtotime($this->input->post('selasatutup'));
                    $selisih=$waktu_akhir-$waktu_awal;
                    $selisihmenit=$selisih/60;
                    $quota=$selisihmenit/6;
                    $kuotajkn=(80*$quota)/100;
                    $kuotanonjkn=(20*$quota)/100;
                    // print_r($sel);exit;
                    if(empty($sen)){
                        // Jika Belum Ada Jadwal Senin
                        if($selasaaktif==2){
                            // Insert Jadwal Simrs
                            // echo "Insert Jadwal Selasa"; exit;
                            $jadwalsim=array(
                                'jadwal_dokter_id'=>$this->input->post('kodedokterrs'),
                                'jadwal_poly_id'=>$this->input->post('kodepolirs'),
                                'jadwal_hari'=>'Selasa',
                                'jadwal_jam_mulai'=>$this->input->post('selasabuka'),
                                'jadwal_jam_selesai'=>$this->input->post('selasatutup'),
                                'jadwal_checkin'=>'07:30',
                                'jadwal_pekan'=>0,
                                'group'=>1,
                                'kuotajkn'=>$kuotajkn,
                                'kuotanonjkn'=>$kuotanonjkn,
                                'jadwal_status'=>'Aktif',
                                'updated_at'=>date('Y-m-d H:i:s'),
                                'updated_at'=>date('Y-m-d H:i:s')
                            );
                            $this->db->insert('tbl02_jadwal_dokter',$jadwalsim);
                        }
                        
                    }else{
                        // Jika Sudah ada jadwal Senin
                        
                        if($selasaaktif==2){
                            // Update Jadwal Simrs
                            // echo "Update Jadwal Selasa"; exit;
                            $jadwalsim=array(
                                'jadwal_jam_mulai'=>$this->input->post('selasabuka'),
                                'jadwal_jam_selesai'=>$this->input->post('selasatutup'),
                                'group'=>1,
                                'kuotajkn'=>$kuotajkn,
                                'kuotanonjkn'=>$kuotanonjkn,
                                'updated_at'=>date('Y-m-d H:i:s')
                            );
                            $this->db->where('jadwal_dokter_id',$this->input->post('kodedokterrs'))
                            ->where('jadwal_poly_id',$this->input->post('kodepolirs'))
                            ->where('jadwal_hari','Selasa')
                            ->update('tbl02_jadwal_dokter',$jadwalsim);
                        }else{
                            // Hapus Jadwal Lokal Simrs
                            // echo "Hapus Jadwal Selasa"; exit;
                            $jadwalstatus=array('jadwal_status'=>'Non Aktif');
                            $this->db->where('jadwal_dokter_id',$this->input->post('kodedokterrs'))
                            ->where('jadwal_poly_id',$this->input->post('kodepolirs'))
                            ->where('jadwal_hari','Selasa')
                            ->update('tbl02_jadwal_dokter',$jadwalstatus);
                        }
                    }
                    // Update Jadwal Rabu
                    $sen=$this->jkn_model->cekjadwalpoli($this->input->post('kodedokterrs'),$this->input->post('kodepolirs'),'Rabu');
                    $waktu_awal =strtotime($this->input->post('rabubuka'));
                    $waktu_akhir=strtotime($this->input->post('rabututup'));
                    $selisih=$waktu_akhir-$waktu_awal;
                    $selisihmenit=$selisih/60;
                    $quota=$selisihmenit/6;
                    $kuotajkn=(80*$quota)/100;
                    $kuotanonjkn=(20*$quota)/100;
                    if(empty($sen)){
                        // Jika Belum Ada Jadwal Senin
                        if($rabuaktif==3){
                            // Insert Jadwal Simrs
                            $jadwalsim=array(
                                'jadwal_dokter_id'=>$this->input->post('kodedokterrs'),
                                'jadwal_poly_id'=>$this->input->post('kodepolirs'),
                                'jadwal_hari'=>'Rabu',
                                'jadwal_jam_mulai'=>$this->input->post('rabubuka'),
                                'jadwal_jam_selesai'=>$this->input->post('rabututup'),
                                'jadwal_checkin'=>'07:30',
                                'jadwal_pekan'=>0,
                                'group'=>1,
                                'kuotajkn'=>$kuotajkn,
                                'kuotanonjkn'=>$kuotanonjkn,
                                'jadwal_status'=>'Aktif',
                                'updated_at'=>date('Y-m-d H:i:s'),
                                'updated_at'=>date('Y-m-d H:i:s')
                            );
                            $this->db->insert('tbl02_jadwal_dokter',$jadwalsim);
                        }
                        
                    }else{
                        // Jika Sudah ada jadwal Senin
                        if($rabuaktif==3){
                            // Update Jadwal Simrs
                            $jadwalsim=array(
                                'jadwal_jam_mulai'=>$this->input->post('rabubuka'),
                                'jadwal_jam_selesai'=>$this->input->post('rabututup'),
                                'group'=>1,
                                'kuotajkn'=>$kuotajkn,
                                'kuotanonjkn'=>$kuotanonjkn,
                                'updated_at'=>date('Y-m-d H:i:s')
                            );
                            $this->db->where('jadwal_dokter_id',$this->input->post('kodedokterrs'))
                            ->where('jadwal_poly_id',$this->input->post('kodepolirs'))
                            ->where('jadwal_hari','Rabu')
                            ->update('tbl02_jadwal_dokter',$jadwalsim);
                        }else{
                            // Hapus Jadwal Lokal Simrs
                            $jadwalstatus=array('jadwal_status'=>'Non Aktif');
                            $this->db->where('jadwal_dokter_id',$this->input->post('kodedokterrs'))
                            ->where('jadwal_poly_id',$this->input->post('kodepolirs'))
                            ->where('jadwal_hari','Rabu')
                            ->update('tbl02_jadwal_dokter',$jadwalstatus);
                        }
                    }
                    // Update Jadwal Kamis
                    $sen=$this->jkn_model->cekjadwalpoli($this->input->post('kodedokterrs'),$this->input->post('kodepolirs'),'Kamis');
                    $waktu_awal =strtotime($this->input->post('kamisbuka'));
                    $waktu_akhir=strtotime($this->input->post('kamistutup'));
                    $selisih=$waktu_akhir-$waktu_awal;
                    $selisihmenit=$selisih/60;
                    $quota=$selisihmenit/6;
                    $kuotajkn=(80*$quota)/100;
                    $kuotanonjkn=(20*$quota)/100;
                    if(empty($sen)){
                        // Jika Belum Ada Jadwal Senin
                        if($kamisaktif==4){
                            // Insert Jadwal Simrs
                            $jadwalsim=array(
                                'jadwal_dokter_id'=>$this->input->post('kodedokterrs'),
                                'jadwal_poly_id'=>$this->input->post('kodepolirs'),
                                'jadwal_hari'=>'Kamis',
                                'jadwal_jam_mulai'=>$this->input->post('kamisbuka'),
                                'jadwal_jam_selesai'=>$this->input->post('kamistutup'),
                                'jadwal_checkin'=>'07:30',
                                'jadwal_pekan'=>0,
                                'group'=>1,
                                'kuotajkn'=>$kuotajkn,
                                'kuotanonjkn'=>$kuotanonjkn,
                                'jadwal_status'=>'Aktif',
                                'updated_at'=>date('Y-m-d H:i:s'),
                                'updated_at'=>date('Y-m-d H:i:s')
                            );
                            $this->db->insert('tbl02_jadwal_dokter',$jadwalsim);
                        }
                        
                    }else{
                        // Jika Sudah ada jadwal Senin
                        if($kamisaktif==4){
                            // Update Jadwal Simrs
                            $jadwalsim=array(
                                'jadwal_jam_mulai'=>$this->input->post('kamisbuka'),
                                'jadwal_jam_selesai'=>$this->input->post('kamistutup'),
                                'group'=>1,
                                'kuotajkn'=>$kuotajkn,
                                'kuotanonjkn'=>$kuotanonjkn,
                                'updated_at'=>date('Y-m-d H:i:s')
                            );
                            $this->db->where('jadwal_dokter_id',$this->input->post('kodedokterrs'))
                            ->where('jadwal_poly_id',$this->input->post('kodepolirs'))
                            ->where('jadwal_hari','Kamis')
                            ->update('tbl02_jadwal_dokter',$jadwalsim);
                        }else{
                            // Hapus Jadwal Lokal Simrs
                            $jadwalstatus=array('jadwal_status'=>'Non Aktif');
                            $this->db->where('jadwal_dokter_id',$this->input->post('kodedokterrs'))
                            ->where('jadwal_poly_id',$this->input->post('kodepolirs'))
                            ->where('jadwal_hari','Kamis')
                            ->update('tbl02_jadwal_dokter',$jadwalstatus);
                        }
                    }
                    // Update Jadwal Jumat
                    $sen=$this->jkn_model->cekjadwalpoli($this->input->post('kodedokterrs'),$this->input->post('kodepolirs'),'Jumat');
                    $waktu_awal =strtotime($this->input->post('jumatbuka'));
                    $waktu_akhir=strtotime($this->input->post('jumattutup'));
                    $selisih=$waktu_akhir-$waktu_awal;
                    $selisihmenit=$selisih/60;
                    $quota=$selisihmenit/6;
                    $kuotajkn=(80*$quota)/100;
                    $kuotanonjkn=(20*$quota)/100;
                    if(empty($sen)){
                        // Jika Belum Ada Jadwal Senin
                        if($jumataktif==5){
                            // Insert Jadwal Simrs
                            $jadwalsim=array(
                                'jadwal_dokter_id'=>$this->input->post('kodedokterrs'),
                                'jadwal_poly_id'=>$this->input->post('kodepolirs'),
                                'jadwal_hari'=>'Jumat',
                                'jadwal_jam_mulai'=>$this->input->post('jumatbuka'),
                                'jadwal_jam_selesai'=>$this->input->post('jumattutup'),
                                'jadwal_checkin'=>'07:30',
                                'jadwal_pekan'=>0,
                                'group'=>1,
                                'kuotajkn'=>$kuotajkn,
                                'kuotanonjkn'=>$kuotanonjkn,
                                'jadwal_status'=>'Aktif',
                                'updated_at'=>date('Y-m-d H:i:s'),
                                'updated_at'=>date('Y-m-d H:i:s')
                            );
                            $this->db->insert('tbl02_jadwal_dokter',$jadwalsim);
                        }
                        
                    }else{
                        // Jika Sudah ada jadwal Senin
                        if($jumataktif==5){
                            // Update Jadwal Simrs
                            $jadwalsim=array(
                                'jadwal_jam_mulai'=>$this->input->post('jumatbuka'),
                                'jadwal_jam_selesai'=>$this->input->post('jumattutup'),
                                'group'=>1,
                                'kuotajkn'=>$kuotajkn,
                                'kuotanonjkn'=>$kuotanonjkn,
                                'updated_at'=>date('Y-m-d H:i:s')
                            );
                            $this->db->where('jadwal_dokter_id',$this->input->post('kodedokterrs'))
                            ->where('jadwal_poly_id',$this->input->post('kodepolirs'))
                            ->where('jadwal_hari','Jumat')
                            ->update('tbl02_jadwal_dokter',$jadwalsim);
                        }else{
                            // Hapus Jadwal Lokal Simrs
                            $jadwalstatus=array('jadwal_status'=>'Non Aktif');
                            $this->db->where('jadwal_dokter_id',$this->input->post('kodedokterrs'))
                            ->where('jadwal_poly_id',$this->input->post('kodepolirs'))
                            ->where('jadwal_hari','Jumat')
                            ->update('tbl02_jadwal_dokter',$jadwalstatus);
                        }
                    }
                    // Update Jadwal Sabtu
                    $sen=$this->jkn_model->cekjadwalpoli($this->input->post('kodedokterrs'),$this->input->post('kodepolirs'),'Sabtu');
                    $waktu_awal =strtotime($this->input->post('sabtubuka'));
                    $waktu_akhir=strtotime($this->input->post('sabtututup'));
                    $selisih=$waktu_akhir-$waktu_awal;
                    $selisihmenit=$selisih/60;
                    $quota=$selisihmenit/6;
                    $kuotajkn=(80*$quota)/100;
                    $kuotanonjkn=(20*$quota)/100;
                    if(empty($sen)){
                        // Jika Belum Ada Jadwal Senin
                        if($sabtuaktif==6){
                            // Insert Jadwal Simrs
                            $jadwalsim=array(
                                'jadwal_dokter_id'=>$this->input->post('kodedokterrs'),
                                'jadwal_poly_id'=>$this->input->post('kodepolirs'),
                                'jadwal_hari'=>'Sabtu',
                                'jadwal_jam_mulai'=>$this->input->post('sabtubuka'),
                                'jadwal_jam_selesai'=>$this->input->post('sabtututup'),
                                'jadwal_checkin'=>'07:30',
                                'jadwal_pekan'=>0,
                                'group'=>1,
                                'kuotajkn'=>$kuotajkn,
                                'kuotanonjkn'=>$kuotanonjkn,
                                'jadwal_status'=>'Aktif',
                                'updated_at'=>date('Y-m-d H:i:s'),
                                'updated_at'=>date('Y-m-d H:i:s')
                            );
                            $this->db->insert('tbl02_jadwal_dokter',$jadwalsim);
                        }
                        
                    }else{
                        // Jika Sudah ada jadwal Senin
                        if($sabtuaktif==6){
                            // Update Jadwal Simrs
                            $jadwalsim=array(
                                'jadwal_jam_mulai'=>$this->input->post('sabtubuka'),
                                'jadwal_jam_selesai'=>$this->input->post('sabtututup'),
                                'group'=>1,
                                'kuotajkn'=>$kuotajkn,
                                'kuotanonjkn'=>$kuotanonjkn,
                                'updated_at'=>date('Y-m-d H:i:s')
                            );
                            $this->db->where('jadwal_dokter_id',$this->input->post('kodedokterrs'))
                            ->where('jadwal_poly_id',$this->input->post('kodepolirs'))
                            ->where('jadwal_hari','Sabtu')
                            ->update('tbl02_jadwal_dokter',$jadwalsim);
                        }else{
                            // Hapus Jadwal Lokal Simrs
                            $jadwalstatus=array('jadwal_status'=>'Non Aktif');
                            $this->db->where('jadwal_dokter_id',$this->input->post('kodedokterrs'))
                            ->where('jadwal_poly_id',$this->input->post('kodepolirs'))
                            ->where('jadwal_hari','Sabtu')
                            ->update('tbl02_jadwal_dokter',$jadwalstatus);
                        }
                    }
                    // Update Jadwal Minggu
                    $sen=$this->jkn_model->cekjadwalpoli($this->input->post('kodedokterrs'),$this->input->post('kodepolirs'),'Senin');
                    $waktu_awal =strtotime($this->input->post('minggubuka'));
                    $waktu_akhir=strtotime($this->input->post('minggututup'));
                    $selisih=$waktu_akhir-$waktu_awal;
                    $selisihmenit=$selisih/60;
                    $quota=$selisihmenit/6;
                    $kuotajkn=(80*$quota)/100;
                    $kuotanonjkn=(20*$quota)/100;
                    if(empty($sen)){
                        // Jika Belum Ada Jadwal Senin
                        if($mingguaktif==7){
                            // Insert Jadwal Simrs
                            $jadwalsim=array(
                                'jadwal_dokter_id'=>$this->input->post('kodedokterrs'),
                                'jadwal_poly_id'=>$this->input->post('kodepolirs'),
                                'jadwal_hari'=>'Minggu',
                                'jadwal_jam_mulai'=>$this->input->post('minggubuka'),
                                'jadwal_jam_selesai'=>$this->input->post('minggututup'),
                                'jadwal_checkin'=>'07:30',
                                'jadwal_pekan'=>0,
                                'group'=>1,
                                'kuotajkn'=>$kuotajkn,
                                'kuotanonjkn'=>$kuotanonjkn,
                                'jadwal_status'=>'Aktif',
                                'updated_at'=>date('Y-m-d H:i:s'),
                                'updated_at'=>date('Y-m-d H:i:s')
                            );
                            $this->db->insert('tbl02_jadwal_dokter',$jadwalsim);
                        }
                        
                    }else{
                        // Jika Sudah ada jadwal Senin
                        if($mingguaktif==7){
                            // Update Jadwal Simrs
                            $jadwalsim=array(
                                'jadwal_jam_mulai'=>$this->input->post('minggubuka'),
                                'jadwal_jam_selesai'=>$this->input->post('minggututup'),
                                'group'=>1,
                                'kuotajkn'=>$kuotajkn,
                                'kuotanonjkn'=>$kuotanonjkn,
                                'updated_at'=>date('Y-m-d H:i:s')
                            );
                            $this->db->where('jadwal_dokter_id',$this->input->post('kodedokterrs'))
                            ->where('jadwal_poly_id',$this->input->post('kodepolirs'))
                            ->where('jadwal_hari','Minggu')
                            ->update('tbl02_jadwal_dokter',$jadwalsim);
                        }else{
                            // Hapus Jadwal Lokal Simrs
                            $jadwalstatus=array('jadwal_status'=>'Non Aktif');
                            $this->db->where('jadwal_dokter_id',$this->input->post('kodedokterrs'))
                            ->where('jadwal_poly_id',$this->input->post('kodepolirs'))
                            ->where('jadwal_hari','Minggu')
                            ->update('tbl02_jadwal_dokter',$jadwalstatus);
                        }
                    }
                }

                
            }*/
            
        }else{
            $response=array(
                'metadata'=>array('code'=>201,'message'=>'Data Jadwal Tidak ada')
            );
        }
        
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    function hapusjadwal(){
        $poli=$this->input->get('poli');
            $dokter=$this->input->get('dokter');
            $this->db->where('jadwal_dokter_id',$dokter)
            ->where('jadwal_poly_id',$poli)
            ->delete('tbl02_jadwal_dokter');
            header('Content-Type: application/json');
            echo json_encode(array('status'=>true,'message'=>'Data berhasil dihapus'));
    }
    function selisih(){
        $awal='08:00:00';
        $akhir='14:00:00';
        $waktu_awal =strtotime($awal);
        $waktu_akhir=strtotime($akhir);
        $selisih=$waktu_akhir-$waktu_awal;
        $selisihmenit=$selisih/60;
        $quota=$selisihmenit/6;
        $kuotajkn=(80*$quota)/100;
        $kuotanonjkn=(20*$quota)/100;
        echo "<br>Selisih (detik) : ".$selisih;
        echo "<br>Selisih (Menit) : ".$selisihmenit;
        echo "<br>Quota SPM(6 Menit) : ".$quota;
        echo "<br>Quota JKN(80%) : ".$kuotajkn;
        echo "<br>Quota NON JKN(20%) : ".$kuotanonjkn;

        echo "<br>".substr('08:00:00',0,5);
    }
}