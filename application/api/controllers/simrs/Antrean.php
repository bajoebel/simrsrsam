<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Antrean extends CI_Controller {
    public function __construct(){
        parent ::__construct();
        $this->load->model('Api_model');
    }
    function pilihandokter($kodejkn){
        $dokter = $this->Api_model->getPilihanDokter($kodejkn);
        // print_r($dokter);exit;
        $read       = json_decode(file_get_contents("php://input"));
        $headers    = getallheaders();
        $username   = $headers["X-Username"];
        $password   = $headers["X-Password"];
        $permition=$this->Api_model->cekPermition($username,$password);
        if($permition){
            $dokter = $this->Api_model->getPilihanDokter($kodejkn);
            if(empty($dokter)){
                $response=array(
                    'metadata'=>array(
                        'code'	=> 201,
                        'message'	=> "Tidak ada dokter yang bertugas hari ini"
                    ),
                );
            }else{
                $response=array(
                    'metadata'=>array(
                        'code'	=> 200,
                        'message'	=> "OK"
                    ),
                    'response'=>$dokter
                );
            }
        }else{
            $response=array(
                'metadata'=>array(
                    'code'	=> 201,
	                'message'	=> "Maaf Username Atau Password Anda Salah"
                )
	        );
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    function ambilantrean(){
        $read       = json_decode(file_get_contents("php://input"));
        $headers    = getallheaders();
        $username   = $headers["X-Username"];
        $password   = $headers["X-Password"];
        $permition=$this->Api_model->cekPermition($username,$password);
        if($permition){
            $jadwalid=$read->jadwalid;
            $jadwal = $this->Api_model->getJadwalById($jadwalid);

            if(empty($jadwal)){
                $response=array(
                    'metadata'=>array(
                        'code'	=> 201,
                        'message'	=> "Tidak ada dokter yang bertugas hari ini"
                    ),
                );
            }else{
                // Insert iantrean Ke database SIMRS
                $cek=$this->Api_model->cekAntrian($read->nokartu,$jadwal->koderuangjkn);
                if(empty($cek)){
                    // Buat Booking Antrean JKN
                    $spm=3;
                    $jammulai=$jadwal->jadwal_jam_mulai;
                    $jamselesai=$jadwal->jadwal_jam_selesai;
                    $jampraktek=$jammulai ."-".$jamselesai;
                    $kuotajkn=intval($jadwal->kuotajkn);
                    $kuotanonjkn=intval($jadwal->kuotanonjkn);
                    $terisijkn=0;
                    $terisinonjkn=0;
                    $terisi=$this->Api_model->AntreanTerisi($jadwal->koderuangjkn);
                    if(empty($terisi)) {
                        $terisijkn=0;
                        $terisinonjkn=0;
                    }else{
                        $terisijkn=intval($terisi->terisijkn);
                        $terisinonjkn=intval($terisi->jmlantrean)-intval($terisi->terisijkn);
                    }
                    if($read->carabayar==2) {
                        $jkn=1;
                        $jenispasien="JKN"; 
                        $sisakuotajkn=$kuotajkn-($terisijkn+1);
                        $sisakuotanonjkn=$kuotanonjkn-$terisinonjkn;
                    }else {
                        $jkn=0;
                        $jenispasien="NON JKN";
                        $sisakuotajkn=$kuotajkn-$terisijkn;
                        $sisakuotanonjkn=$kuotanonjkn-($terisinonjkn+1);
                        
                    }
                    $jeniskunjungan=1;

                    $antri = array(
                        'kodebooking'=>$this->Api_model->getKodeBooking($jadwal->jadwal_poly_id),
                        'no_antrian_admisi' => $this->Api_model->getAntreanAdmisi($jadwal->KodeLoket),
                        'tanggal'=>date('Y-m-d'),
                        'antrianruang'=>$jadwal->jadwal_poly_id,
                        'antriandokter'=>$jadwal->jadwal_dokter_id,
                        'kodepolijkn'=>$jadwal->koderuangjkn,
                        'kodedokterjkn'=>$jadwal->dokterjkn,
                        'nokartu'=>$read->nokartu,
                        'labelantrean'=>$jadwal->KodeLoket,
                        'jkn'=>$jkn,
                        'norujukan'=>$read->norujuk,
                        'faskes'=>$read->faskes
                    );
                    $this->db->insert('tbl02_antrian_admisi',$antri);
                    $id=$this->db->insert_id();
                    // $spm=$this->input->post('spm');
                    $estimasitunggu=$antri['no_antrian_admisi']*$spm;
                    $time = strtotime($jammulai);
                    $estimasilayan = date("H:i", strtotime('+'.$estimasitunggu.' minutes', $time));
                    $estimasilayanms=strtotime($estimasilayan)*1000;
                    $nomr=$read->nomr;
                    $antreanjkn=array(
                        'kodebooking'=>$antri['kodebooking'],
                        'jenispasien'=> $jenispasien,
                        'nomorkartu'=> $read->nokartu,
                        'nik'=> $read->nik,
                        'nohp'=> $read->nohp,
                        'kodepoli'=> $jadwal->koderuangjkn,
                        'namapoli'=> $jadwal->ruang,
                        'pasienbaru'=> 1,
                        'norm'=> $nomr,
                        'tanggalperiksa'=> date('Y-m-d'),
                        'kodedokter'=> $jadwal->dokterjkn,
                        'namadokter'=> $jadwal->namadokter,
                        'jampraktek'=> $jampraktek,
                        'jeniskunjungan'=> $jeniskunjungan, //1 (Rujukan FKTP), 2 (Rujukan Internal), 3 (Kontrol), 4 (Rujukan Antar RS)
                        'nomorreferensi'=> $read->norujuk,
                        'nomorantrean'=> $antri['labelantrean'] .".".$antri['no_antrian_admisi'],
                        'angkaantrean'=> $antri['no_antrian_admisi'],
                        'estimasidilayani'=> $estimasilayanms,
                        'sisakuotajkn'=> $sisakuotajkn,
                        'kuotajkn'=> $kuotajkn,
                        'sisakuotanonjkn'=> $sisakuotanonjkn,
                        'kuotanonjkn'=> $kuotanonjkn,
                        'keterangan'=> 'Peserta harap bersiap menunggu panggilan 30 menit sebelum estimasi layanan.'
                    );

                    date_default_timezone_set('UTC');
                    $tStamp = strval(time()-strtotime('1970-01-01 00:00:00'))-SELISIH_WAKTU;
                    // Create Signature
                    $signature = hash_hmac('sha256', CONS_ID_JKN."&".$tStamp, SECREET_ID_JKN, true);
                    $encodedSignature = base64_encode($signature);
                    if(empty($tgl)) $tgl=date('Y-m-d');
                    $contentType = "application/x-www-form-urlencoded";
                    // Generate Header
                    // $this->load->model('jkn_model');
                    $header = "";
                    $header .= "Content-Type: " . $contentType . "\r\n";
                    $header .= "X-cons-id: " . CONS_ID_JKN . "\r\n";
                    $header .= "X-timestamp: " . $tStamp . "\r\n";
                    $header .= "X-signature: " . $encodedSignature ."\r\n";
                    $header .= "user_key: ".KEY_JKN;
                    $res=$this->Api_model->postData('antrean/add',$header,json_encode($antreanjkn));
                    $sekarang=strtotime(date('Y-m-d'))*1000;
                    $taskid=array(
                        'kodebooking'=>$antri['kodebooking'],
                        'taskid'=>1,
                        'waktu'=>$sekarang
                    );
                    $task=$this->Api_model->postData('antrean/updatewaktu',$header,json_encode($taskid));
                    $response=array(
                        'metadata'=>array(
                            'code'	=> 200,
                            'message'	=> "Antrean Berhasil Diambil"
                        ),
                        'response'=>array(
                            'jadwal'=>$jadwal,
                            'antrean'=>$antri,
                            'antreanjkn'=>$antreanjkn,
                            'responsebooking'=>json_decode($res),
                            'responsetask'=>json_decode($task)
                        )
                    );
                }else{
                    $response=array(
                        'metadata'=>array(
                            'code'	=> 202,
                            'message'	=> "Pasien sudah mengambil No Antrean Sebelumnya yaitu nomor ".$cek->labelantrean .".".$cek->no_antrian_admisi
                        ),
                        'response'=>$cek->labelantrean .".".$cek->no_antrian_admisi
                    );
                }
                
            }
        }else{
            $response=array(
                'metadata'=>array(
                    'code'	=> 201,
	                'message'	=> "Maaf Username Atau Password Anda Salah"
                )
	        );
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    function poliklinik(){
        $read       = json_decode(file_get_contents("php://input"));
        $headers    = getallheaders();
        $username   = $headers["X-Username"];
        $password   = $headers["X-Password"];
        $permition=$this->Api_model->cekPermition($username,$password);
        if($permition){
            $poliklinik = $this->Api_model->getPoliklinik();
            if(empty($poliklinik)){
                $response=array(
                    'metadata'=>array(
                        'code'	=> 201,
                        'message'	=> "Tidak ada dokter yang bertugas hari ini"
                    ),
                );
            }else{
                $response=array(
                    'metadata'=>array(
                        'code'	=> 200,
                        'message'	=> "OK"
                    ),
                    'response'=>$poliklinik
                );
            }
        }else{
            $response=array(
                'metadata'=>array(
                    'code'	=> 201,
	                'message'	=> "Maaf Username Atau Password Anda Salah"
                )
	        );
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }
}