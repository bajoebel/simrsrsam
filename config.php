<?php
/*
|--------------------------------------------------------------------------
| Configuration 
|--------------------------------------------------------------------------
| Site URL
|--------------------------------------------------------------------------
*/
$_index = str_replace("/simrs_vclaim/", "", $_SERVER['SCRIPT_NAME']);
if ((((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || $_SERVER['SERVER_PORT'] == 443))) $ssl = "s";
else $ssl = "";
$http = "http" . $ssl . '://';
// $http = "http" . (((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || $_SERVER['SERVER_PORT'] == 443)) . '://';
// echo $http; exit;
$newurl = str_replace($_index, "", $_SERVER['SCRIPT_NAME']);
$site_url	= "$http" . $_SERVER['HTTP_HOST'] . $newurl;
/*
|--------------------------------------------------------------------------
| These Config Company Information
|--------------------------------------------------------------------------
*/

defined('COMPANY_NAME')			or define('COMPANY_NAME', 'RSUD Dr. ACHMAD MOCHTAR');
defined('LOGO')					or define('LOGO', $site_url . '/assets/images/logo.png');
defined('REPORT_ADDRESS_1')     or define('REPORT_ADDRESS_1', 'Jl. Dr. A.Rivai No.1 Bukittinggi');
defined('REPORT_ADDRESS_2')     or define('REPORT_ADDRESS_2', 'Telp : 0752-21720');
defined('FAX')     				or define('FAX', 'Telp : 0752-21321');
defined('FOOTER_APP')     		or define('FOOTER_APP', 'IT Developer &copy;' . date('Y'));
defined('FOOTER_RS')     		or define('FOOTER_RS', 'RSUD Dr. Achmad Mochtar');
defined('VERSION_APP')     		or define('VERSION_APP', 'Version 1.0.1');
defined('ALMT_SURAT')     		or define('ALMT_SURAT', 'Bukittinggi');
defined('EMAIL')     		or define('EMAIL', 'rsudpp@padangpanjang.go.id');
defined('_TGL_LOUNCHING')     		or define('_TGL_LOUNCHING', '2021-02-11');

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
define('ENVIRONMENT', isset($_SERVER['CI_ENV']) ? $_SERVER['CI_ENV'] : 'development');
defined('SELISIH_WAKTU') or define('SELISIH_WAKTU', 0);

switch (ENVIRONMENT) {
	case 'development':

		// API BPJS Vclam 2.0 TESTER
		// defined('HOST_VC')     		or define('HOST_VC', 'https://apijkn-dev.bpjs-kesehatan.go.id/vclaim-rest-dev/');
		// defined('CONS_ID_VC')   	or define('CONS_ID_VC', '16095');
		// defined('SECREET_ID_VC')   	or define('SECREET_ID_VC', '5iO913C770');
		// defined('KEY_VC')   		or define('KEY_VC', '56d8b4f7ac72b41102ac5800d73fe0fd');
		// defined('STATUS_VC')   		or define('STATUS_VC', '1');

		// API BPJS Vclam 2.0 Production
		defined('HOST_VC')     		or define('HOST_VC', 'https://apijkn.bpjs-kesehatan.go.id/vclaim-rest/');
		defined('CONS_ID_VC')   	or define('CONS_ID_VC', '20419');
		defined('SECREET_ID_VC')   	or define('SECREET_ID_VC', '9wXA881141');
		defined('KEY_VC')   		or define('KEY_VC', 'ff9ae516a85700c6931e1a8a7d87bad6');
		defined('KODERS_VC')   		or define('KODERS_VC', '0304R001');
		defined('STATUS_VC')   		or define('STATUS_VC', '1');

		defined('DB_HOST')   		or define('DB_HOST', 'localhost');
		defined('PORT_HOST')   		or define('PORT_HOST', 3306);
		defined('DB_USER')   		or define('DB_USER', 'root');
		defined('DB_PASS')   		or define('DB_PASS', '');
		defined('DB_NAME')   		or define('DB_NAME', 'rsam_dev');
		defined('DB_NAME_DEV')   	or define('DB_NAME_DEV', 'rsam_mr_registrasi_v3');
		break;
	case 'production':
		// API BPJS Vclam 2.0 DEVELOPMENT
		// defined('HOST_VC')     		or define('HOST_VC', 'https://apijkn-dev.bpjs-kesehatan.go.id/vclaim-rest-dev/');
		// API BPJS Vclam 2.0 Production
		defined('HOST_VC')     		or define('HOST_VC', 'https://apijkn.bpjs-kesehatan.go.id/vclaim-rest/');
		defined('CONS_ID_VC')   	or define('CONS_ID_VC', '20419');
		defined('SECREET_ID_VC')   	or define('SECREET_ID_VC', '9wXA881141');
		defined('KEY_VC')   		or define('KEY_VC', 'ff9ae516a85700c6931e1a8a7d87bad6');
		defined('KODERS_VC')   		or define('KODERS_VC', '0304R001');
		defined('STATUS_VC')   		or define('STATUS_VC', '1');

		defined('DB_HOST')   		or define('DB_HOST', 'localhost');
		defined('PORT_HOST')   		or define('PORT_HOST', 3306);
		defined('DB_USER')   		or define('DB_USER', 'root');
		defined('DB_PASS')   		or define('DB_PASS', '');
		defined('DB_NAME')   		or define('DB_NAME', 'rsam_dev');
		break;
	default:
		exit(1); // EXIT_ERROR
}


/*
|--------------------------------------------------------------------------
| EClaim
|--------------------------------------------------------------------------
*/
defined('HOST_EC')     			or define('HOST_EC', 'http://192.168.12.10/E-Klaim/ws.php');
defined('RS_ID_EC')     		or define('RS_ID_EC', '1375014'); //
defined('ENCRYPT_KEY')     		or define('ENCRYPT_KEY', '860f08f3e415ed3ab286063fa6e6497677206e87a1651d7f3386459ee66aeb15');
/*
|--------------------------------------------------------------------------
| APPLICARES
|--------------------------------------------------------------------------
|2022-07-18
*/
defined('HOST_APLICARES')		or define('HOST_APLICARES', 'https://new-api.bpjs-kesehatan.go.id/');
defined('CONS_ID_APLICARES')	or define('CONS_ID_APLICARES', '20419');
defined('SECREET_ID_APLICARES') or define('SECREET_ID_APLICARES', '9wXA881141');
/*
|--------------------------------------------------------------------------
| SIRANAP
|--------------------------------------------------------------------------
*/
defined('HOST_SIRANAP')			or define('HOST_SIRANAP', 'http://sirs.yankes.kemkes.go.id/sirsservice/ranap');
defined('RS_ID_SIRANAP')		or define('RS_ID_SIRANAP', '');
defined('PASW_SIRANAP') 		or define('PASW_SIRANAP', '');
/*
|--------------------------------------------------------------------------
| SISRUTE
|--------------------------------------------------------------------------
| http://api.dvlp.sisrute.kemkes.go.id/apigility/documentation
|--------------------------------------------------------------------------
*/
defined('HOST_SISRUTE')			or define('HOST_SISRUTE', 'http://api.dvlp.sisrute.kemkes.go.id');
defined('RS_ID_SISRUTE')		or define('RS_ID_SISRUTE', '');
defined('PASW_SISRUTE') 		or define('PASW_SISRUTE', '');

/*
Nilai R Farmasi
*/
define('NILAI_R',		'300');
defined('SMART_STATUS')   	or define('SMART_STATUS', '0');
defined('SMART_ID')   		or define('SMART_ID', '00001');
defined('SMART_KEY')   		or define('SMART_KEY', 'RF3XS15QY15TPK91');
defined('SMART_CALL_BACK')  or define('SMART_CALL_BACK', 'http://localhost/webservice/');

defined('ONLINE_ID')   		or define('ONLINE_ID', '00001');
defined('ONLINE_STATUS')   	or define('ONLINE_STATUS', '1');
defined('ONLINE_KEY')   	or define('ONLINE_KEY', 'RF3XS15QY15TPK91');
defined('ONLINE_CALL_BACK') or define('ONLINE_CALL_BACK', 'http://192.168.12.254/');

/**
 * Host Antrean Online
 */
defined('HOST_JKN')     	or define('HOST_JKN', 'https://apijkn-dev.bpjs-kesehatan.go.id/antreanrs_dev/');
defined('CONS_ID_JKN')   	or define('CONS_ID_JKN', '9682');
defined('SECREET_ID_JKN')   or define('SECREET_ID_JKN', '0aNCA78C3A');
defined('KEY_JKN')   		or define('KEY_JKN', '1cd82ae8717ec38184e2d3b56a2021de');
defined('STATUS_JKN')   	or define('STATUS_JKN', '1');

/*
Database Elektronik Rekam Medis
*/
defined('DB_HOST_ERM')   		or define('DB_HOST_ERM', 'localhost');
defined('PORT_HOST_ERM')   		or define('PORT_HOST_ERM', 3306);
defined('DB_USER_ERM')   		or define('DB_USER_ERM', 'root');
defined('DB_PASS_ERM')   		or define('DB_PASS_ERM', '');
defined('DB_NAME_ERM')   		or define('DB_NAME_ERM', 'simrs_erm');
