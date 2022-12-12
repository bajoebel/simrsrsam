<?php
/*
|--------------------------------------------------------------------------
| Configuration 
|--------------------------------------------------------------------------
| Site URL
|--------------------------------------------------------------------------
*/
$_index = str_replace("/simrs_open_source/", "", $_SERVER['SCRIPT_NAME']);
$http = "http" . (((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || $_SERVER['SERVER_PORT'] == 443)) . '://';
$newurl = str_replace($_index,"",$_SERVER['SCRIPT_NAME']); 
$site_url	= "$http" . $_SERVER['HTTP_HOST'] . $newurl;
/*
|--------------------------------------------------------------------------
| These Config Company Information
|--------------------------------------------------------------------------
*/
define('ENVIRONMENT', isset($_SERVER['CI_ENV']) ? $_SERVER['CI_ENV'] : 'development');

defined('COMPANY_NAME')			OR define('COMPANY_NAME', 'RSUD Dr. ACHMAD MOCHTAR'); 
defined('LOGO')					OR define('LOGO', $site_url.'/assets/images/logo.png'); 
defined('REPORT_ADDRESS_1')     OR define('REPORT_ADDRESS_1', 'Jl. Dr. A.Rivai No.1 Bukittinggi'); 
defined('REPORT_ADDRESS_2')     OR define('REPORT_ADDRESS_2', 'Telp : 0752-21720'); 
defined('FAX')     				OR define('FAX', 'Telp : 0752-21321'); 
defined('FOOTER_APP')     		OR define('FOOTER_APP', 'IT Developer &copy; 2018'); 
defined('FOOTER_RS')     		OR define('FOOTER_RS', 'RSUD Dr. Achmad Mochtar'); 
defined('VERSION_APP')     		OR define('VERSION_APP', 'Version 1.0.1');     
defined('ALMT_SURAT')     		OR define('ALMT_SURAT', 'Bukittinggi');     

/*
|--------------------------------------------------------------------------
| These Config Bridging System
|--------------------------------------------------------------------------
| If state is development use HOST Virtual Claim bellow
| defined('HOST_VC')     			OR define('HOST_VC', 'https://new-api.bpjs-kesehatan.go.id:8080/new-vclaim-rest/');    
|
| If state is production use HOST Virtual Claim bellow
| defined('HOST_VC')     			OR define('HOST_VC', 'https://dvlp.bpjs-kesehatan.go.id/VClaim-rest/');    
|--------------------------------------------------------------------------
| VClaim
|--------------------------------------------------------------------------
*/
switch (ENVIRONMENT){
	case 'development':
		defined('HOST_VC')     		OR define('HOST_VC', 'https://dvlp.bpjs-kesehatan.go.id/VClaim-rest/'); 
		defined('CONS_ID_VC')   	OR define('CONS_ID_VC', '9682');     
		defined('SECREET_ID_VC')   	OR define('SECREET_ID_VC', '0aNCA78C3A');     
		defined('KODERS_VC')   		OR define('KODERS_VC', '0304R001'); 

		defined('DB_HOST')   		OR define('DB_HOST', 'localhost');     
		defined('DB_USER')   		OR define('DB_USER', 'root');     
		defined('DB_PASS')   		OR define('DB_PASS', '');     
		defined('DB_NAME')   		OR define('DB_NAME', 'db_rs_open');     
    	break;
	case 'production':
		defined('HOST_VC')     		OR define('HOST_VC', 'https://new-api.bpjs-kesehatan.go.id:8080/new-vclaim-rest/');     
		defined('CONS_ID_VC')   	OR define('CONS_ID_VC', '20419');     
		defined('SECREET_ID_VC')   	OR define('SECREET_ID_VC', '9wXA881141');     
		defined('KODERS_VC')   		OR define('KODERS_VC', '0304R001');

		defined('DB_HOST')   		OR define('DB_HOST', 'localhost');     
		defined('DB_USER')   		OR define('DB_USER', 'root');     
		defined('DB_PASS')   		OR define('DB_PASS', '');     
		defined('DB_NAME')   		OR define('DB_NAME', 'db_rs_open');     
    	break;
	default:
		exit(1); // EXIT_ERROR
}

/*
|--------------------------------------------------------------------------
| EClaim
|--------------------------------------------------------------------------
*/
defined('HOST_EC')     			OR define('HOST_EC', 'http://192.168.5.2/E-Klaim/ws.php');
defined('RS_ID_EC')     		OR define('RS_ID_EC', '1375014');     
defined('ENCRYPT_KEY')     		OR define('ENCRYPT_KEY', '49b596af9865503f148317dd1c37242b3505d47d3605354ce18c319129e130a3');
/*
|--------------------------------------------------------------------------
| APPLICARES
|--------------------------------------------------------------------------
*/
defined('HOST_APLICARES')		OR define('HOST_APLICARES', 'http://api.bpjs-kesehatan.go.id/');
defined('CONS_ID_APLICARES')	OR define('CONS_ID_APLICARES', '21782');     
defined('SECREET_ID_APLICARES') OR define('SECREET_ID_APLICARES', '5jUA34FBC8');     
/*
|--------------------------------------------------------------------------
| SIRANAP
|--------------------------------------------------------------------------
*/
defined('HOST_SIRANAP')			OR define('HOST_SIRANAP', 'http://sirs.yankes.kemkes.go.id/sirsservice/ranap');
defined('RS_ID_SIRANAP')		OR define('RS_ID_SIRANAP', '1375014');     
defined('PASW_SIRANAP') 		OR define('PASW_SIRANAP', MD5('12345'));     
/*
|--------------------------------------------------------------------------
| SISRUTE
|--------------------------------------------------------------------------
| http://api.dvlp.sisrute.kemkes.go.id/apigility/documentation
|--------------------------------------------------------------------------
*/
defined('HOST_SISRUTE')			OR define('HOST_SISRUTE', 'http://api.dvlp.sisrute.kemkes.go.id');
defined('RS_ID_SISRUTE')		OR define('RS_ID_SISRUTE', '');     
defined('PASW_SISRUTE') 		OR define('PASW_SISRUTE', '');   
