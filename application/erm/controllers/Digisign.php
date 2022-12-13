<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Digisign extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('digisign_model');
        $this->load->model('users_model');
        $this->load->library('encryption');
        $this->load->helper('lz');
    }
    function index(){
        echo "E-Sign";
    }
    function subpemeriksaan(){
        $res=$this->db->query("SELECT * FROM tbl01_pemeriksaan WHERE id_jenis_pemeriksaan=12 AND id_pemeriksaan NOT IN (SELECT id_pemeriksaan FROM tbl01_pemeriksaan_sub)")->result();
        // print_r($res); exit;
        foreach ($res as $r ) {
            $this->db->query("INSERT INTO `tbl01_pemeriksaan_sub` (`id_pemeriksaan`,`sub_pemeriksaan`,`satuan`,`nilai_rujukan_lk`,`nilai_rujukan_pr`,`kontrol`,`resource`)
            SELECT '".$r->id_pemeriksaan."' AS `id_pemeriksaan`,`sub_pemeriksaan`,`satuan`,`nilai_rujukan_lk`,`nilai_rujukan_pr`,`kontrol`,`resource` FROM `tbl01_pemeriksaan_sub` WHERE id_pemeriksaan=105;");
        }
    }
    function signhasilpenunjang($idjenis,$idhasil,$idxdaftar){
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $uid=$this->session->userdata('get_uid');
            $isexist=$this->digisign_model->is_exist_sign($uid);
            $data=array(
                'kode'=>$uid,
                'idjenis'=>$idjenis,
                'idhasil'=>$idhasil,
                'idxdaftar'=>$idxdaftar
            );
            if(empty($isexist)) $form =$this->load->view('digisign/digisigncreate',$data, true);
            else $form=$this->load->view('digisign/digisignauth',$data, true);
            $response=array(
                'status'=>true,
                'message'=>'OK',
                'form'=>$form
            );
        }else{
            $response=array('status'=>false,'message'=>'Session Expired');
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    function verifikasihasilpemeriksaan(){
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $uid=$this->session->userdata('get_uid');
            $pin=$this->input->post('pin');
            $verify=$this->digisign_model->verifyaccess($uid,$pin);
            if(!empty($verify)){
                // print_r($verify); exit;
                // $profile=Sign::validateSign($verify->token, md5($pin), SIGN_KEY);
                // print_r($profile);exit;

                // Ambil profile pengguna
                $json_profile=$this->encryption->decrypt($verify->token);
                $profile=json_decode($json_profile);
                // print_r($profile->pin); exit;
                $result=$this->digisign_model->getHasilPemeriksaan($this->input->post('idhasil'));
                $judul="Hasil Pemeriksaan ".$result[0]->jenispemeriksaan ." Pasien Atas Nama " .$result[0]->nama_pasien ."(".$result[0]->nomr.")";
                $data=array(
                    'profile'=>$profile,
                    'dokumen'=>array(
                        'judul'=>$judul,
                        'result'=>$result
                    ),
                    'timestamps'=>date('Y-m-d H:i:s'),
                    'token'=>$verify->token
                );
                $hashed_string = Sign::createSign(
                    $data,
                    $profile->pin,
                    SIGN_KEY
                );
                // $compresseddata=comuri($hashed_string);
                //Token tanda tangan yang berisi identitas dokumen
                $datatoken=array(
                    'nik'=>$profile->nik,
                    'nama'=>$profile->nama,
                    'email'=>$profile->email,
                    'nohp'=>$profile->nohp,
                    'judul'=>$judul
                );
                $token=Sign::createSign(
                    $datatoken,
                    $profile->pin,
                    SIGN_KEY
                );
                $update=array(
                    'verifikator'=>$uid,
                    'token'=>$token
                );
                $this->db->where('idx',$this->input->post('idhasil'))->update('tbl03_hasil_pemeriksaan_penunjang',$update);
                
                $signdata=array(
                    'idhasil'=>$this->input->post('idhasil'),
                    'hashsign'=>$hashed_string,
                    'verifikator'=>$uid,
                );
                $this->db->insert('tbl03_hasil_pemeriksaan_signdata',$signdata);
                $response=array('status'=>true,'message'=>'Proses verifikasi hasil pemeriksaan berhasil','sign'=>array('token'=>$token,'verifikator'=>getNamaDokter($uid),'idhasil'=>$this->input->post('idhasil')));
            }else{
                $response=array('status'=>false,'message'=>'Pin yang anda masukkan salah');
            }
        }else{
            $response=array('status'=>false,'message'=>'Session Expired');
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }


    function isvalid($idhasil=0){
        $data=$this->db->where('idhasil',$idhasil)->get('tbl03_hasil_pemeriksaan_signdata')->row();
        if(!empty($data)){
            $hash=$data->hashsign;
            $p =$this->db->select('pin')->where('kode',$data->verifikator)->get('tbl01_esign')->row();
            // print_r($p);
            $data=Sign::validateSign($hash, $p->pin, SIGN_KEY);
            // echo $hash;
            print_r($data);
        }
    }
    function signaccess(){
        $uid=$this->session->userdata('get_uid');
        $publickey="bf049b1460c309236133cfac83dec529"; //Di Konfig Di dalam SIMRS
        $pin=$this->input->post('pin');
        // $pin=134703;
        $verify=$this->digisign_model->verifyaccess($uid,$pin);
        if(!empty($verify)){
            $profile=Sign::validateSign($verify->token, md5($pin), $publickey);
            $data=array(
                'profile'=>$profile,
                'dokumen'=>'Verifikasi Hasil Pemeriksaan Imunologi Pasien An RIZALDI(921112)',
                'timestamps'=>date('Y-m-d H:i:s'),
                'token'=>$verify->token
            );
            $hashed_string = Sign::createSign(
                $data,
                $pin,
                $publickey
            );
            $com=combase64($hashed_string);
        }
    }
    function ttd(){
        $pin='*D3D05E0'; //Berbeda Masing Masing Orang
        $data=array(
            'profile'=>array(
                'nik'=>'1304060908860002',
                'nama'=>'Wanhar Azri S.Kom',
                'email'=>'bajoebel@gmail.com',
                'nohp' =>'0813-1046-0892',
            ),
            'dokumen'=>'Verifikasi Hasil Pemeriksaan Imunologi Pasien An RIZALDI(921112)',
            'timestamps'=>date('Y-m-d H:i:s')
        );
        $hashed_string = Sign::createSign(
			$data,
			$pin,
			SIGN_KEY
		);
        echo $hashed_string;
    }
    function createtoken(){
        $pin=md5($this->input->post('pin')); //Berbeda Masing Masing Orang
        $kode=$this->input->post('kode');
        // $newpin=$this->db->query("SELECT LEFT(PASSWORD('".$pin."'),8) as newpin")->row();
        // $pin=$newpin->newpin;

        //Di Konfig Di dalam SIMRS
        $profile=array(
            'nik'=>$this->input->post('nik'),
            'nama'=>$this->input->post('nama'),
            'email'=>$this->input->post('email'),
            'nohp' =>$this->input->post('nohp'),
            'pin'   => round(1000,10000)
        );
        $token=$this->encryption->encrypt(json_encode($profile));

        // $token = Sign::createSign($this->encryption->encrypt
		// 	$profile,
		// 	$pin,
		// 	SIGN_KEY
		// );
        $this->db->query("INSERT INTO tbl01_esign (kode,pin,token) VALUES ('$kode','$pin','$token')");
        header('Content-Type: application/json');
        echo json_encode(array('status'=>true,'message'=>'Berhasil Membuat Token'));
    }
    function verifyttd($pin,$hashed_string){
        $hashed_string="KXh_GRdVSkkiSxcXCFFjVlJVA08NUkRoCllOaFI4Sh4geHgeFlhISyRQGUwWExMTDlp4V0w6A2hzUVEueQg5LGo2MQg5TWMCWTwVPktOUlBYDlEMTXkzNQFSSDJYfQZMWTB2S1UMOj8OCFgEVgMrCRwkSB0YSXl6Uh0TflFIO2gcZixXURQFeFo8Iz48RmNQUlUCS14BaQ59Y0wyOGZ-WFU2MVNZAHkBDGNWEVRQXVZTVTc6TAsyKwoQJDQ4aGJFMRAMMQ5YSkQdSxtFCA0TW1VZfF1feTY2DxIdaEpGSx0ddAEVFlc4RB1UHFEgFSoJaQ";
        // $pin='bb82f6b8d99318596f785ce980b33d97'; //Berbeda Masing Masing Orang
        $publickey="bf049b1460c309236133cfac83dec529"; //Di Konfig Di dalam SIMRS
        $hasil = Sign::validateSign($hashed_string, $pin, $publickey);
        echo json_encode($hasil);
        // print_r($hasil);
    }
    function qr(){
        $data=$this->input->get('data');
        $this->load->library('qr');
		QRcode::png($data,false,QR_ECLEVEL_H,2,1);
    }
    function encryp($data,$kunci){
        $this->digisign_model->encryption($data,$kunci);
    }
    function lihathasil($idhasil,$idjenis,$idxdaftar,$allvalue=0){
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $hasil=$this->digisign_model->getHasilPemeriksaan($idhasil);
            $jenis=$this->digisign_model->getJenisPemeriksaanById($idjenis);
            $pemeriksaan=$this->digisign_model->permintaanPemeriksaan($idjenis,$idxdaftar,$hasil[0]->reg_unit);
            $idlevel = $this->session->userdata('level');
            // echo $idlevel; exit;
            $detail = $this->digisign_model->getPendaftaran($idxdaftar);
            $idmodul = MODUL_ID;
            if ($detail->jns_layanan == "RJ") $kodemenu = 45;
            elseif ($detail->jns_layanan == "RI") $kodemenu = 46;
            elseif ($detail->jns_layanan == "PJ") $kodemenu = 47;
            elseif ($detail->jns_layanan == "GD") $kodemenu = 48;
            else $kodemenu = "";
            if ($detail->jns_layanan == 'RI') {
                $this->db->where_in('profId', array('1', '2'));
            } else {
                $this->db->where('idruang', $detail->id_ruang);
            }
            $this->db->join('tbl01_pegawai', 'tbl01_pegawai.NRP=tbl01_dokter.NRP');
            $getDokter = $this->db->get('tbl01_dokter');

            $data=array(
                'idxdaftar'=>$idxdaftar,
                'hasil'=>$hasil,
                'jenis'=>$jenis,
                'pemeriksaan'=>$pemeriksaan,
                'p'=>$this->digisign_model->getDetailJenisPemeriksaan($idxdaftar,$idjenis),
                'hakakses'=>$this->digisign_model->getAkses($idlevel, $idmodul, $kodemenu),
                'detail'=>$detail,
                'getDokter'=>$getDokter,
                'checkall'=>$allvalue
            );
            $this->load->view('digisign/lihathasil',$data);
        }
    }
}