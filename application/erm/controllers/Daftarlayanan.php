<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Daftarlayanan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('users_model');
        $this->load->model('daftarlayanan_model');
    }
    function caripasien(){
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $nomor=$this->input->post('cari');
            $panjang=strlen($nomor);
            if($panjang != 6 && $panjang!=13 && $panjang!=16){
                $response=array(
                    'status'=>false,
                    'message'=> 'Nomr / No Kartu / NIK yang dimasukkan tidak valid',
                    'panjang'=>$panjang
                );
            }else{
                $pasien=$this->daftarlayanan_model->getPasien($nomor);
                if(empty($pasien)){
                    $response=array(
                        'status'=>false,
                        'message'=>'Pasien Tidak Ditemukan',
                        'pasien'=>$pasien
                    );
                }else{
                    $response=array(
                        'status'=>true,
                        'message'=>'Ok',
                        'pasien'=>$pasien
                    );
                }
                
            }
            
        }else{
            $response=array(
                'status'=>true,
                'message'=>'Session Expired'
            );
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    function cariwilayah(){
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $param=$this->input->get('param');
            $data=$this->db->select("wilayah_id,desa,kecamatan,CONCAT(kabkota,' ', nama_kabkota) as nama_kabkota,provinsi")
                ->like('desa',$param)
                ->like('kecamatan',$param)
                ->or_like('kabkota',$param)
                ->or_like('nama_kabkota',$param)
                ->or_like('provinsi',$param)
                ->get('tbl01_wilayah')->result();
            header('Content-Type: application/json');
            echo json_encode($data);
        }
    }

    function carabayar(){
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $id=$this->input->get('id');
            $response=array(
                'status'=>true,
                'message'=>'OK',
                'data'=>$this->db->where('idx',$id)->get('tbl01_cara_bayar')->row()
            );
            
        }else{
            $response=array(
                'status'=>false,
                'message'=>'Session Expired'
            );
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    function rujukan(){
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $id=$this->input->get('id');
            $response=array(
                'status'=>true,
                'message'=>'OK',
                'data'=>$this->db->where('idx',$id)
                    ->get('tbl01_rujukan')
                    ->row()
            );
            
        }else{
            $response=array(
                'status'=>false,
                'message'=>'Session Expired'
            );
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    function simpanpendaftaran(){
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $adaerror=false;

            $pendaftaran=array(
                'nomr'=> $this->input->post('nomr'),
                'no_ktp'=> $this->input->post('no_ktp'),
                'nama_pasien'=> $this->input->post('nama_pasien'),
                'tempat_lahir'=> $this->input->post('tempat_lahir'),
                'tgl_lahir'=> $this->input->post('tgl_lahir'),
                'jns_kelamin'=> $this->input->post('jns_kelamin'),
                'nama_provinsi'=> $this->input->post('nama_provinsi'),
                'nama_kab_kota'=> $this->input->post('nama_kab_kota'),
                'nama_kecamatan'=> $this->input->post('nama_kecamatan'),
                'nama_kelurahan'=> $this->input->post('nama_kelurahan'),
                'jns_layanan'=> $this->input->post('jns_layanan'),
                'tgl_masuk'=> date('Y-m-d H:i:s'),
                'tgl_daftar'=> $this->input->post('tgl_daftar'),
                'id_ruang'=> $this->input->post('id_ruang'),
                'nama_ruang'=> $this->input->post('nama_ruang'),
                'id_rujuk'=> $this->input->post('id_rujuk'),
                'rujukan'=> getRujukan($this->input->post('id_rujuk')),
                'no_rujuk'=> $this->input->post('no_rujuk'),
                'asal_ruang'=> $this->input->post('id_ruang'),
                'nama_asal_ruang'=> $this->input->post('nama_ruang'),
                'dokter_pengirim'=> $this->input->post('dokter_pengirim'),
                'nama_dokter_pengirim'=> $this->input->post('nama_dokter_pengirim'),
                'id_cara_bayar'=> $this->input->post('id_cara_bayar'),
                'cara_bayar'=> getCaraBayar($this->input->post('id_cara_bayar')),
                'id_jenis_peserta'=> $this->input->post('id_jenis_peserta'),
                'jenis_peserta'=> $this->input->post('jenis_peserta'),
                'no_bpjs'=> $this->input->post('no_bpjs'),
                'no_jaminan'=> $this->input->post('no_jaminan'),
                'tgl_jaminan'=> date('Y-m-d'),
                'pjPasienNama'=> $this->input->post('pjPasienNama'),
                'pjPasienPekerjaan'=> $this->input->post('pjPasienPekerjaan'),
                'pjPasienAlamat'=> $this->input->post('pjPasienAlamat'),
                'dokterJaga'=> $this->input->post('dokterJaga'),
                'namaDokterJaga'=> getNamaDokter($this->input->post('dokterJaga')),
                'user_daftar'=> $this->session->userdata('get_uid'),
                'session_id'=> session_id()
            );

            
            $isvalid=requiredfield($pendaftaran,array('nomr','dokter_pengirim','no_bpjs','no_rujuk','no_jaminan'));
            $verifydata=array(
                'diagnosa'=>$this->input->post('diagnosa'),
                'keterangan'=>$this->input->post('keterangan'),
                'id_jenis_pemeriksaan'=>$this->input->post('id_jenis_pemeriksaan')
            );
            // $response['id_jenis_pemeriksaan']=$this->input->post('id_jenis_pemeriksaan');
            $valid=$isvalid['status'];
            $error=$isvalid["err"];
            $pesan=$isvalid["message"];
            $isvalid2=requiredfield($verifydata);
            if($isvalid2['status']==false){
                $valid=$isvalid2['status'];
                $pesan=$isvalid2["message"];
                // print_r($isvalid['err']);exit;
                foreach ($isvalid2['err'] as $key => $value) {
                    $error[$key]=$value;    
                }
            }
            if($valid==true){
                // Jika Data Pendaftaran Sudah Lengkap
                if($this->session->userdata('kdlokasi')==51){
                    $asal_jaringan     = $this->input->post('asal_jaringan', TRUE);
                    $bahan_fiksasi     = $this->input->post('bahan_fiksasi', TRUE);
                    $haid_terakhir     = $this->input->post('haid_terakhir', TRUE);
                    $lokasi_jaringan   = $this->input->post('lokasi_jaringan', TRUE);
                    
                    if($asal_jaringan=="") {
                        $adaerror=true;
                        $err['asal_jaringan']="Asal jaringan tidak boleh kosong";
                    }
                    if($bahan_fiksasi=="") {
                        $adaerror=true;
                        $err["bahan_fiksasi"]="Bahan Fiksasi tidak boleh kosong";
                    }
                    if($lokasi_jaringan=="") {
                        $adaerror=true;
                        $err["lokasi_jaringan"]="Lokasi jaringan tidak boleh kosong";
                    }
                }else{
                    $asal_jaringan     = '';
                    $bahan_fiksasi     = '';
                    $haid_terakhir     = '';
                    $lokasi_jaringan   = '';
                }
                
                // validasi jenis pemeriksaan
                $id_jenis_pemeriksaan=$this->input->post('id_jenis_pemeriksaan');
                if(!empty($id_jenis_pemeriksaan)){
                    foreach ($id_jenis_pemeriksaan as $i ) {
                        $template=$this->input->post('template'.$i);
                        $alasanpemeriksaan="";
                        $bulanke="";
                        $idsubjenispemeriksaan=$this->input->post('idsubjenispemeriksaan'.$i);
                        $haid_terakhir="";
                        $semuavariable=$this->input->post('semua_variabel'.$i);
                        if($template=="DahakTB"){
                            $alasanpemeriksaan=$this->input->post('alasanpemeriksaan'.$i);
                            $bulanke=$this->input->post('bulanke'.$i);
                            if($alasanpemeriksaan=="") {
                                $adaerror=true;
                                $err["alasanpemeriksaan"]="Alasan pemeriksaan tidak boleh kosong";
                            }
                            if($bulanke=="") {
                                $adaerror=true;
                                $err["bulanke"]="Periode Bulan Pemeriksaan tidak boleh kosong";
                            }
                        }elseif ($template=="Patologi") {
                            if($idsubjenispemeriksaan==5){
                                $haid_terakhir=$this->input->post('haid_terakhir'.$i);
                                if($haid_terakhir=="") {
                                    $adaerror=true;
                                    $err["haid_terakhir"]="Haid Terakhir tidak boleh kosong";
                                }
                            }
                        }
                        $id_pemeriksaan=array();
                        if($semuavariable==0){
                            $id_pemeriksaan=$this->input->post('id_pemeriksaan'.$i);
                            if(empty($id_pemeriksaan)) {
                                $adaerror=true;
                                $err["id_pemeriksaan"]="Variabel pemeriksaan Tidak Boleh Kosong";
                            }
                        }
                    }
                }else{
                    $adaerror=true;
                    $err["id_pemeriksaan"]="Pemeriksaan Belum Dipilih";
                }

                if($adaerror){
                    $response['code'] = 201;
                    $response['message'] = "Data isian belum lengkap";
                    $response['error']=$err;
                    $response['request']=$verifydata;
                }else{
                    $idpengirim=$this->input->post('id_pengirim');
                    // $namapengirim=$this->input->post('pjPasienDikirimOleh');
                    /** Insert Data Pendaftaran */
                    $id=$this->daftarlayanan_model->insertPendaftaran($pendaftaran);
                    $datapendaftaran=$this->daftarlayanan_model->getPendaftaranById($id);

                    $permintaan=array(
                        'tgl_minta'             => date('Y-m-d H:i:s'),
                        'id_daftar'             => $datapendaftaran['id_daftar'], 
                        'reg_unit'              => $datapendaftaran['reg_unit'],
                        'nomr'                  => $this->input->post('nomr'),
                        'nama_pasien'           => $this->input->post('nama_pasien'),  
                        'ruang_pengirim'        => '-',
                        'nama_ruang_pengirim'   => '-',
                        'id_penunjang'          => $this->input->post('id_ruang'),
                        'nama_penunjang'        => $this->input->post('nama_ruang'),
                        'dokter_pengirim'       => $this->input->post('dokter_pengirim'),
                        'nama_dokter_pengirim'  => $this->input->post('nama_dokter_pengirim'),
                        'keterangan'            => $this->input->post('keterangan'),
                        'alasanpemeriksaan'     => $this->input->post('alasanpemeriksaan'),
                        'diagnosa'              => $this->input->post('diagnosa'),
                        'bulanke'               => $this->input->post('bulanke'),
                        'kodefaskespengirim'    => $idpengirim,
                        'namafaskespengirim'    => $this->input->post('pjPasienDikirimOleh'), 
                        'asal_jaringan'         => $asal_jaringan,
                        'bahan_fiksasi'         => $bahan_fiksasi,
                        'haid_terakhir'         => $haid_terakhir,
                        'lokasi_jaringan'       => $lokasi_jaringan,
                        'keterangan_lokasi'     => '',
                        'user_exec'             => $this->session->userdata('get_uid')
                    );
                    $permintaanid=$this->daftarlayanan_model->insertPermintaan($permintaan);
                    // Insert Pendaftaran
                    

                    if($permintaanid){
                        // Insert detail permintaan
                        foreach ($id_jenis_pemeriksaan as $i ) {
                            $template=$this->input->post('template'.$i);
                            $alasanpemeriksaan="";
                            $bulanke="";
                            $idsubjenispemeriksaan=$this->input->post('idsubjenispemeriksaan'.$i);
                            $haid_terakhir="";
                            $semuavariable=$this->input->post('semua_variabel'.$i);
                            if($template=="DahakTB"){
                                $alasanpemeriksaan=$this->input->post('alasanpemeriksaan'.$i);
                                $bulanke=$this->input->post('bulanke'.$i);
                            }elseif ($template=="Patologi") {
                                if($idsubjenispemeriksaan==5){
                                    $haid_terakhir=$this->input->post('haid_terakhir'.$i);
                                }
                            }
                            $id_pemeriksaan=array();
                            if($semuavariable==0){
                                $id_pemeriksaan=$this->input->post('id_pemeriksaan'.$i);
                                foreach ($id_pemeriksaan as $idp ) {
                                    $variabel=$this->daftarlayanan_model->getVariabel($idp);
                                    // echo json_encode($variabel); exit;
                                    foreach ($variabel as $v ) {
                                        $detail[]=array(
                                            'id_permintaan'     => $permintaanid,
                                            'idjenispemeriksaan' => $i,
                                            'jenispemeriksaan'  => $this->input->post('jenis_pemeriksaan'.$i),
                                            'idsubjenispemeriksaan' => $v->variabelid,
                                            'subjenispemeriksaan'  => $v->variabel_pemeriksaan,
                                            'id_pemeriksaan'    => $idp,
                                            'nama_pemeriksaan'  => $this->input->post('nama_pemeriksaan'.$idp),
                                            'alasan_pemeriksaan'=> $alasanpemeriksaan,
                                            'bulan_ke'=>$bulanke,
                                            'haid_terakhir'=>$haid_terakhir,
                                            'status_dilayani'   => 0,
                                            'user_exec'         => $this->session->userdata('get_uid')
                                        );
                                        $pemeriksaan[]=array(
                                            'idx_pendaftaran'=>$datapendaftaran["idx"],
                                            'id_jenis_pemeriksaan'=>$i,
                                            'jenis_pemeriksaan'=>$this->input->post('jenis_pemeriksaan'.$i),
                                            'id_pemeriksaan'=>$idp,
                                            'nama_pemeriksaan'=>$this->input->post('nama_pemeriksaan'.$idp),
                                            'id_subjenispemeriksaan'=>$v->variabelid,
                                            'subjenispemeriksaan'=>$v->variabel_pemeriksaan,
                                            'id_dokter'=>$datapendaftaran['dokterJaga'],
                                            'status_dilayani'   => 0,
                                            'user_exec'=>$this->session->userdata('get_uid')
                                        );
                                    }
                                    
                                }
                            }else{
                                $listpemeriksaan=$this->daftarlayanan_model->getListPemeriksaan($i);
                                foreach ($listpemeriksaan as $l ) {
                                    $variabel=$this->daftarlayanan_model->getVariabel($l->id_pemeriksaan);
                                    // echo json_encode($variabel); exit;
                                    foreach ($variabel as $v ) {
                                        $detail[]=array(
                                            'id_permintaan'         => $permintaanid,
                                            'idjenispemeriksaan'    => $i,
                                            'jenispemeriksaan'      => $this->input->post('jenis_pemeriksaan'.$i),
                                            'idsubjenispemeriksaan' => $idsubjenispemeriksaan,
                                            'subjenispemeriksaan'   => '',
                                            'id_pemeriksaan'        => $l->id_pemeriksaan,
                                            'nama_pemeriksaan'      => $l->nama_pemeriksaan,
                                            'alasan_pemeriksaan'    => $alasanpemeriksaan,
                                            'bulan_ke'              => $bulanke,
                                            'haid_terakhir'         => $haid_terakhir,
                                            'status_dilayani'       => 0,
                                            'user_exec'             => $this->session->userdata('get_uid')
                                        );

                                        $pemeriksaan[]=array(
                                            'idx_pendaftaran'=>$datapendaftaran["idx"],
                                            'id_jenis_pemeriksaan'=>$i,
                                            'jenis_pemeriksaan'=>$this->input->post('jenis_pemeriksaan'.$i),
                                            'id_pemeriksaan'=>$l->id_pemeriksaan,
                                            'nama_pemeriksaan'=>$l->nama_pemeriksaan,
                                            'id_subjenispemeriksaan'=>$v->variabelid,
                                            'subjenispemeriksaan'=>$v->variabel_pemeriksaan,
                                            'id_dokter'=>$datapendaftaran['dokterJaga'],
                                            'status_dilayani'   => 0,
                                            'user_exec'=>$this->session->userdata('get_uid')
                                        );
                                    }
                                    
                                }
                                $response['pemeriksaan']=$listpemeriksaan;
                            }
                        }
                        // echo json_encode($detail); exit;
                        if(!empty($detail)){
                            $this->daftarlayanan_model->insertDetailPermintaanPenunjang($detail);
                            $this->db->insert_batch('tbl02_pemeriksaan_penunjang',$pemeriksaan);
                        }
                        // $pendaftaran['kode_permintaan']=$permintaanid;
                        // Update Pendaftaran
                        $daf=array(
                            'kode_permintaan'=>$permintaanid
                        );
                        $this->db->where('idx',$datapendaftaran["idx"]);
                        $this->db->update('tbl02_pendaftaran',$daf);
                        
                        // Insert Data pendaftaran
                        if($id){
                            $reg=$this->db->where('idx',$id)->get('tbl02_pendaftaran')->row();
                            $res=array(
                                'id_permintaan_penunjang'=>$permintaanid,
                                'id_daftar'=>$reg->id_daftar,
                                'reg_unit'=>$reg->reg_unit,
                                'user_id'=>$this->session->userdata('get_uid')
                            );
                            $this->db->insert('tbl02_permintaan_penunjang_response',$res);
                            $response['code'] = 200;
                            $response['message'] = "Permintaan pemeriksaan labor berhasil dibuat";
                            $response['idx']=$id;
                        }else{
                            $response['code'] = 201;
                            $response['message'] = "Gagal Saat proses pendaftaran";
                        }
                        $permintaan["detail"]=$detail;
                        $response["permintaan"]=$permintaan;
                        $response["pendaftaran"]=$pendaftaran;
                            
                    }else{
                        $response['code'] = 201;
                        $response['message'] = "Permintaan pemeriksaan labor gagal dibuat";
                    }
                }
            }else{
                $response['code'] = 201;
                $response['message'] = $pesan;
                $response['error']=$error;
                $response['test']=$isvalid["err"];
            }
        }else{
            $response=array(
                'status'=>false,
                'message'=>'Session Expired'
            );
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    function arraypush(){
        $data=array(
            'nama'=>'udin',
            'umur'=>'37 Tahun'
        );
        print_r($data);
        echo "<br>Data Array Ditambahkan<br>";
        $data["jekel"]="laki-Laki";
        // array_push($data,$jekel);
        print_r($data);

    }
}