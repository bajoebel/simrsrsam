<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Main extends CI_Controller {
    public function __construct(){
        parent ::__construct();
        $this->load->helper('Vclaim');
    }
    public function index(){      
        echo "Service Actived";       
    }
    function showSignature(){
        echo showSignature(); 
    }
    function getPesertaByKartuNIK(){
        $response = null;
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            if(isset($_POST['nokartu']) && isset($_POST['tglSep'])){
                if($_POST['nokartu'] !== "" || $_POST['tglSep'] !== ""){
                    $param1 = $_POST['nokartu'];
                    $param2 = $_POST['tglSep'];
                    $response = getPesertaByKartuNIK($param1,$param2); 
                }else{
                    $x['metaData']['code'] = 201;
                    $x['metaData']['message'] = "Variable masih ada yang kosong";
                    $x['response'] = null;
                    $response = json_encode($x);
                }
            }else{
                $x['metaData']['code'] = 201;
                $x['metaData']['message'] = "Variable tidak diketahui";
                $x['response'] = null;
                $response = json_encode($x);
            }
        }else{
            $x['metaData']['code'] = 201;
            $x['metaData']['message'] = "Method tidak diketahui";
            $x['response'] = null;
            $response = json_encode($x);
        }
        echo $response;
    }
    function getPesertaByKartuBPJS(){
        $response = null;
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            if(isset($_POST['nokartu']) && isset($_POST['tglSep'])){
                if($_POST['nokartu'] !== "" || $_POST['tglSep'] !== ""){
                    $param1 = $_POST['nokartu'];
                    $param2 = $_POST['tglSep'];
                    $response = getPesertaByKartuBPJS($param1,$param2); 
                }else{
                    $x['metaData']['code'] = 201;
                    $x['metaData']['message'] = "Variable masih ada yang kosong";
                    $x['response'] = null;
                    $response = json_encode($x);
                }
            }else{
                $x['metaData']['code'] = 201;
                $x['metaData']['message'] = "Variable tidak diketahui";
                $x['response'] = null;
                $response = json_encode($x);
            }
        }else{
            $x['metaData']['code'] = 201;
            $x['metaData']['message'] = "Method tidak diketahui";
            $x['response'] = null;
            $response = json_encode($x);
        }
        echo $response;
    }
    
    function cekNIK(){
        $param1 = "1371111301840004";
        $param2 = date("Y-m-d");
        echo getPesertaByKartuNIK($param1,$param2); 
    }
    function getSEP(){
        $param1 = "0304R0010119V004256";
        //$param1 = $_POST['nosep'];
        echo cariSEP($param1); 
    }
    function dataKunjungan(){
        $param1 = $_POST['tglLayanan'];
        $param2 = $_POST['jnsPelayanan'];
        echo dataKunjungan($param1,$param2); 
    }
    function getProvinsi(){echo getProvinsi();}
    function getKelasRawat(){echo getKelasRawat();}
    function getRuangRawat(){echo getRuangRawat();}
    function getCaraKeluar(){echo getCaraKeluar();}

    function insertSEP($params = array()){
        $x['request']['t_sep']['noKartu'] = "0001330719130";
        $x['request']['t_sep']['tglSep'] = "2019-01-21";
        $x['request']['t_sep']['ppkPelayanan'] = "0306R001";
        $x['request']['t_sep']['jnsPelayanan'] = "2"; # 1.RI 2.RJ
        $x['request']['t_sep']['klsRawat'] = "3"; # 1.Kelas 1 2.Kelas 2 3.Kelas 3
        $x['request']['t_sep']['noMR'] = "123456"; 
        $x['request']['t_sep']['rujukan']['asalRujukan'] = "1";
        $x['request']['t_sep']['rujukan']['tglRujukan'] = "2019-01-21";
        $x['request']['t_sep']['rujukan']['noRujukan'] = "1234567";
        $x['request']['t_sep']['rujukan']['ppkRujukan'] = "03071002";
        $x['request']['t_sep']['catatan'] = "test";

        $x['request']['t_sep']['diagAwal'] = "A00.1";
        $x['request']['t_sep']['poli']['tujuan'] = "INT";
        $x['request']['t_sep']['poli']['eksekutif'] = "0";
        $x['request']['t_sep']['cob']['cob'] = "0"; # 0.Tidak 1.Ya
        $x['request']['t_sep']['katarak']['katarak'] = "0"; # 0.Tidak 1.Ya
        $x['request']['t_sep']['jaminan']['lakaLantas'] = "0"; # 0.Tidak 1.Ya
        $x['request']['t_sep']['jaminan']['penjamin']['penjamin'] = "";
        $x['request']['t_sep']['jaminan']['penjamin']['tglKejadian'] = "";
        $x['request']['t_sep']['jaminan']['penjamin']['keterangan'] = "";
        $x['request']['t_sep']['jaminan']['penjamin']['suplesi']['suplesi'] = "0";
        $x['request']['t_sep']['jaminan']['penjamin']['suplesi']['noSepSuplesi'] = "";
        $x['request']['t_sep']['jaminan']['penjamin']['suplesi']['lokasiLaka']['kdPropinsi'] = "";
        $x['request']['t_sep']['jaminan']['penjamin']['suplesi']['lokasiLaka']['kdKabupaten'] = "";
        $x['request']['t_sep']['jaminan']['penjamin']['suplesi']['lokasiLaka']['kdKecamatan'] = "";
        $x['request']['t_sep']['skdp']['noSurat'] = ""; 
        $x['request']['t_sep']['skdp']['kodeDPJP'] = ""; 
        $x['request']['t_sep']['noTelp'] = "123467890"; 
        $x['request']['t_sep']['user'] = "Coba Ws"; 

        echo insertSEP(json_encode($x)); 
    }

    function updateSEP(){
        $x['request']['t_sep']['noSep'] = "0301R0011117V000008";
        $x['request']['t_sep']['klsRawat'] = "2017-10-18";
        $x['request']['t_sep']['noMR'] = "123456";
        $x['request']['t_sep']['rujukan']['asalRujukan'] = "1";
        $x['request']['t_sep']['rujukan']['tglRujukan'] = "2017-10-17";
        $x['request']['t_sep']['rujukan']['noRujukan'] = "1234567";
        $x['request']['t_sep']['rujukan']['ppkRujukan'] = "00010001";
        $x['request']['t_sep']['catatan'] = "test";
        $x['request']['t_sep']['diagAwal'] = "A00.1";
        $x['request']['t_sep']['poli']['eksekutif'] = "0";
        $x['request']['t_sep']['cob']['cob'] = "0"; # 0.Tidak 1.Ya
        $x['request']['t_sep']['katarak']['katarak'] = "1"; # 0.Tidak 1.Ya
        $x['request']['t_sep']['jaminan']['lakaLantas'] = "1"; # 0.Tidak 1.Ya
        $x['request']['t_sep']['jaminan']['penjamin']['penjamin'] = "1"; #1=Jasa raharja PT, 2=BPJS Ketenagakerjaan, 3=TASPEN PT, 4=ASABRI PT} jika lebih dari 1 isi -> 1,2 (pakai delimiter koma)}"
        $x['request']['t_sep']['jaminan']['penjamin']['tglKejadian'] = "2018-08-06";
        $x['request']['t_sep']['jaminan']['penjamin']['keterangan'] = "kll";
        $x['request']['t_sep']['jaminan']['penjamin']['suplesi']['suplesi'] = "0";
        $x['request']['t_sep']['jaminan']['penjamin']['suplesi']['noSepSuplesi'] = "0301R0010718V000001";
        $x['request']['t_sep']['jaminan']['penjamin']['suplesi']['lokasiLaka']['kdPropinsi'] = "03";
        $x['request']['t_sep']['jaminan']['penjamin']['suplesi']['lokasiLaka']['kdKabupaten'] = "0050";
        $x['request']['t_sep']['jaminan']['penjamin']['suplesi']['lokasiLaka']['kdKecamatan'] = "0574";
        $x['request']['t_sep']['noTelp'] = "081919999"; # 0.Tidak 1.Ya
        $x['request']['t_sep']['user'] = "Coba Ws"; # 0.Tidak 1.Ya

        echo updateSEP(json_encode($x)); 
    }
}

