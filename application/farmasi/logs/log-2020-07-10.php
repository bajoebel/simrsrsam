<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2020-07-10 04:49:33 --> Severity: error --> Exception: Object of class CI_Loader could not be converted to string D:\xampp\htdocs\simrs_open_source\application\farmasi\controllers\laporan_penjualan.php 40
ERROR - 2020-07-10 04:51:46 --> Severity: error --> Exception: Object of class CI_Loader could not be converted to string D:\xampp\htdocs\simrs_open_source\application\farmasi\controllers\laporan_penjualan.php 40
ERROR - 2020-07-10 05:00:52 --> Query error: Table 'db_rs_open_dev.pelayanan' doesn't exist - Invalid query: SELECT a.*,b.NMPELAYANAN,c.NMJPASIEN 
        FROM penjualan a 
        LEFT JOIN pelayanan b ON a.KDPELAYANAN=b.KDPELAYANAN
        LEFT JOIN jenis_pasien c ON a.KDJPASIEN=c.KDJPASIEN
        WHERE NOMR = '000399' AND a.KDJPASIEN = '2' AND a.KDPELAYANAN = 'RJ' 
        AND (DATE_FORMAT(a.TGLRESEP,'%Y-%m-%d') BETWEEN '2020-10-07' AND '2020-10-07') 
        GROUP BY NOMR
ERROR - 2020-07-10 05:03:50 --> Query error: Unknown column 'a.KDJPASIEN' in 'where clause' - Invalid query: SELECT a.*,c.cara_bayar AS NMJPASIEN 
        FROM tbl04_penjualan a 
        LEFT JOIN tbl01_cara_bayar c ON a.id_cara_bayar=c.idx
        WHERE NOMR = '000399' AND a.KDJPASIEN = '2' AND a.KDPELAYANAN = 'RJ' 
        AND (DATE_FORMAT(a.TGLRESEP,'%Y-%m-%d') BETWEEN '2020-10-07' AND '2020-10-07') 
        GROUP BY NOMR
ERROR - 2020-07-10 05:05:09 --> Query error: Unknown column 'a.KDPELAYANAN' in 'where clause' - Invalid query: SELECT a.*,c.cara_bayar AS NMJPASIEN 
        FROM tbl04_penjualan a 
        LEFT JOIN tbl01_cara_bayar c ON a.id_cara_bayar=c.idx
        WHERE NOMR = '000399' AND a.id_cara_bayar = '2' AND a.KDPELAYANAN = 'RJ' 
        AND (DATE_FORMAT(a.TGLRESEP,'%Y-%m-%d') BETWEEN '2020-10-07' AND '2020-10-07') 
        GROUP BY NOMR
ERROR - 2020-07-10 05:08:04 --> Query error: Table 'db_rs_open_dev.barang' doesn't exist - Invalid query: SELECT b.*,a.JMLJUAL,a.HJUAL,a.R,a.SUBTOTAL,c.NMSATUAN,a.SISA,a.JMLRET,d.DTJL,d.KDJL,d.TGLRESEP 
        FROM penjualan_detail a 
        LEFT JOIN barang b ON a.KDBRG=b.KDBRG 
        LEFT JOIN satuan c ON b.KDSATUAN=c.KDSATUAN 
        LEFT JOIN penjualan d ON a.KDJL=d.KDJL
        WHERE NOMR = '000399' AND d.KDJPASIEN = '2' AND d.KDPELAYANAN = 'RJ' 
        AND (DATE_FORMAT(d.TGLRESEP,'%Y-%m-%d') BETWEEN '2020-10-07' AND '2020-10-07') 
        ORDER BY d.TGLRESEP
ERROR - 2020-07-10 05:08:21 --> Query error: Table 'db_rs_open_dev.barang' doesn't exist - Invalid query: SELECT b.*,a.JMLJUAL,a.HJUAL,a.R,a.SUBTOTAL,c.NMSATUAN,a.SISA,a.JMLRET,d.DTJL,d.KDJL,d.TGLRESEP 
        FROM penjualan_detail a 
        LEFT JOIN barang b ON a.KDBRG=b.KDBRG 
        LEFT JOIN satuan c ON b.KDSATUAN=c.KDSATUAN 
        LEFT JOIN penjualan d ON a.KDJL=d.KDJL
        WHERE NOMR = '001299' AND d.KDJPASIEN = '2' AND d.KDPELAYANAN = 'RJ' 
        AND (DATE_FORMAT(d.TGLRESEP,'%Y-%m-%d') BETWEEN '2020-10-07' AND '2020-10-07') 
        ORDER BY d.TGLRESEP
ERROR - 2020-07-10 05:11:48 --> Query error: Table 'db_rs_open_dev.barang' doesn't exist - Invalid query: SELECT b.*,a.JMLJUAL,a.HJUAL,a.R,a.SUBTOTAL,c.NMSATUAN,a.SISA,a.JMLRET,d.DTJL,d.KDJL,d.TGLRESEP 
        FROM penjualan_detail a 
        LEFT JOIN barang b ON a.KDBRG=b.KDBRG 
        LEFT JOIN satuan c ON b.KDSATUAN=c.KDSATUAN 
        LEFT JOIN penjualan d ON a.KDJL=d.KDJL
        WHERE NOMR = '303002' AND d.KDJPASIEN = '2' AND d.KDPELAYANAN = 'RJ' 
        AND (DATE_FORMAT(d.TGLRESEP,'%Y-%m-%d') BETWEEN '2020-23-06' AND '2020-07-10') 
        ORDER BY d.TGLRESEP
ERROR - 2020-07-10 05:12:09 --> Query error: Table 'db_rs_open_dev.barang' doesn't exist - Invalid query: SELECT b.*,a.JMLJUAL,a.HJUAL,a.R,a.SUBTOTAL,c.NMSATUAN,a.SISA,a.JMLRET,d.DTJL,d.KDJL,d.TGLRESEP 
        FROM penjualan_detail a 
        LEFT JOIN barang b ON a.KDBRG=b.KDBRG 
        LEFT JOIN satuan c ON b.KDSATUAN=c.KDSATUAN 
        LEFT JOIN penjualan d ON a.KDJL=d.KDJL
        WHERE NOMR = '303002' AND d.KDJPASIEN = '2' AND d.KDPELAYANAN = 'RJ' 
        AND (DATE_FORMAT(d.TGLRESEP,'%Y-%m-%d') BETWEEN '2020-23-06' AND '2020-10-07') 
        ORDER BY d.TGLRESEP
ERROR - 2020-07-10 05:40:22 --> Severity: error --> Exception: Too few arguments to function search::waktu_pakai(), 0 passed in D:\xampp\htdocs\simrs_open_source\system\core\CodeIgniter.php on line 532 and exactly 1 expected D:\xampp\htdocs\simrs_open_source\application\farmasi\controllers\search.php 144
ERROR - 2020-07-10 05:40:23 --> Severity: error --> Exception: Too few arguments to function search::waktu_pakai(), 0 passed in D:\xampp\htdocs\simrs_open_source\system\core\CodeIgniter.php on line 532 and exactly 1 expected D:\xampp\htdocs\simrs_open_source\application\farmasi\controllers\search.php 144
ERROR - 2020-07-10 05:40:37 --> Severity: error --> Exception: Too few arguments to function search::waktu_pakai(), 0 passed in D:\xampp\htdocs\simrs_open_source\system\core\CodeIgniter.php on line 532 and exactly 1 expected D:\xampp\htdocs\simrs_open_source\application\farmasi\controllers\search.php 144
ERROR - 2020-07-10 05:40:37 --> Severity: error --> Exception: Too few arguments to function search::waktu_pakai(), 0 passed in D:\xampp\htdocs\simrs_open_source\system\core\CodeIgniter.php on line 532 and exactly 1 expected D:\xampp\htdocs\simrs_open_source\application\farmasi\controllers\search.php 144
ERROR - 2020-07-10 05:40:37 --> Severity: error --> Exception: Too few arguments to function search::waktu_pakai(), 0 passed in D:\xampp\htdocs\simrs_open_source\system\core\CodeIgniter.php on line 532 and exactly 1 expected D:\xampp\htdocs\simrs_open_source\application\farmasi\controllers\search.php 144
ERROR - 2020-07-10 05:40:37 --> Severity: error --> Exception: Too few arguments to function search::waktu_pakai(), 0 passed in D:\xampp\htdocs\simrs_open_source\system\core\CodeIgniter.php on line 532 and exactly 1 expected D:\xampp\htdocs\simrs_open_source\application\farmasi\controllers\search.php 144
ERROR - 2020-07-10 05:46:50 --> Query error: Table 'db_rs_open_dev.barang' doesn't exist - Invalid query: SELECT b.*,a.JMLJUAL,a.HJUAL,a.R,a.SUBTOTAL,c.NMSATUAN,a.SISA,a.JMLRET,d.DTJL,d.KDJL,d.TGLRESEP 
        FROM penjualan_detail a 
        LEFT JOIN barang b ON a.KDBRG=b.KDBRG 
        LEFT JOIN satuan c ON b.KDSATUAN=c.KDSATUAN 
        LEFT JOIN penjualan d ON a.KDJL=d.KDJL
        WHERE NOMR = '732917' AND d.KDJPASIEN = '1' AND d.KDPELAYANAN = 'GD' 
        AND (DATE_FORMAT(d.TGLRESEP,'%Y-%m-%d') BETWEEN '2020-10-07' AND '2020-10-07') 
        ORDER BY d.TGLRESEP
ERROR - 2020-07-10 05:50:16 --> Query error: Table 'db_rs_open_dev.barang' doesn't exist - Invalid query: SELECT b.*,a.JMLJUAL,a.HJUAL,a.R,a.SUBTOTAL,c.NMSATUAN,a.SISA,a.JMLRET,d.DTJL,d.KDJL,d.TGLRESEP 
        FROM penjualan_detail a 
        LEFT JOIN barang b ON a.KDBRG=b.KDBRG 
        LEFT JOIN satuan c ON b.KDSATUAN=c.KDSATUAN 
        LEFT JOIN penjualan d ON a.KDJL=d.KDJL
        WHERE NOMR = '' AND d.KDJPASIEN = '1' AND d.KDPELAYANAN = 'GD' 
        AND (DATE_FORMAT(d.TGLRESEP,'%Y-%m-%d') BETWEEN '2020-07-10' AND '2020-07-10') 
        ORDER BY d.TGLRESEP
ERROR - 2020-07-10 05:51:08 --> Severity: Notice --> Undefined index: ALMTPASIEN D:\xampp\htdocs\simrs_open_source\application\farmasi\controllers\laporan_penjualan.php 60
ERROR - 2020-07-10 05:51:08 --> Severity: Notice --> Undefined index: KDPELAYANAN D:\xampp\htdocs\simrs_open_source\application\farmasi\controllers\laporan_penjualan.php 61
ERROR - 2020-07-10 05:51:08 --> Severity: Notice --> Undefined index: NMPELAYANAN D:\xampp\htdocs\simrs_open_source\application\farmasi\controllers\laporan_penjualan.php 62
ERROR - 2020-07-10 05:51:08 --> Severity: Notice --> Undefined index: KDJPASIEN D:\xampp\htdocs\simrs_open_source\application\farmasi\controllers\laporan_penjualan.php 63
ERROR - 2020-07-10 05:51:08 --> Query error: Table 'db_rs_open_dev.barang' doesn't exist - Invalid query: SELECT b.*,a.JMLJUAL,a.HJUAL,a.R,a.SUBTOTAL,c.NMSATUAN,a.SISA,a.JMLRET,d.DTJL,d.KDJL,d.TGLRESEP 
        FROM penjualan_detail a 
        LEFT JOIN barang b ON a.KDBRG=b.KDBRG 
        LEFT JOIN satuan c ON b.KDSATUAN=c.KDSATUAN 
        LEFT JOIN penjualan d ON a.KDJL=d.KDJL
        WHERE NOMR = '732917' AND d.KDJPASIEN = '1' AND d.KDPELAYANAN = 'GD' 
        AND (DATE_FORMAT(d.TGLRESEP,'%Y-%m-%d') BETWEEN '2020-07-10' AND '2020-07-10') 
        ORDER BY d.TGLRESEP
ERROR - 2020-07-10 05:52:12 --> Severity: Notice --> Undefined index: ALMTPASIEN D:\xampp\htdocs\simrs_open_source\application\farmasi\controllers\laporan_penjualan.php 60
ERROR - 2020-07-10 05:52:12 --> Severity: Notice --> Undefined index: KDPELAYANAN D:\xampp\htdocs\simrs_open_source\application\farmasi\controllers\laporan_penjualan.php 61
ERROR - 2020-07-10 05:52:12 --> Severity: Notice --> Undefined index: JNSPELAYANAN D:\xampp\htdocs\simrs_open_source\application\farmasi\controllers\laporan_penjualan.php 62
ERROR - 2020-07-10 05:52:12 --> Severity: Notice --> Undefined index: KDJPASIEN D:\xampp\htdocs\simrs_open_source\application\farmasi\controllers\laporan_penjualan.php 63
ERROR - 2020-07-10 05:52:12 --> Query error: Table 'db_rs_open_dev.barang' doesn't exist - Invalid query: SELECT b.*,a.JMLJUAL,a.HJUAL,a.R,a.SUBTOTAL,c.NMSATUAN,a.SISA,a.JMLRET,d.DTJL,d.KDJL,d.TGLRESEP 
        FROM penjualan_detail a 
        LEFT JOIN barang b ON a.KDBRG=b.KDBRG 
        LEFT JOIN satuan c ON b.KDSATUAN=c.KDSATUAN 
        LEFT JOIN penjualan d ON a.KDJL=d.KDJL
        WHERE NOMR = '732917' AND d.KDJPASIEN = '1' AND d.KDPELAYANAN = 'GD' 
        AND (DATE_FORMAT(d.TGLRESEP,'%Y-%m-%d') BETWEEN '2020-07-10' AND '2020-07-10') 
        ORDER BY d.TGLRESEP
ERROR - 2020-07-10 05:52:37 --> Severity: Notice --> Undefined index: ALMTPASIEN D:\xampp\htdocs\simrs_open_source\application\farmasi\controllers\laporan_penjualan.php 61
ERROR - 2020-07-10 05:52:37 --> Severity: Notice --> Undefined index: KDPELAYANAN D:\xampp\htdocs\simrs_open_source\application\farmasi\controllers\laporan_penjualan.php 62
ERROR - 2020-07-10 05:52:37 --> Severity: Notice --> Undefined index: JNSPELAYANAN D:\xampp\htdocs\simrs_open_source\application\farmasi\controllers\laporan_penjualan.php 63
ERROR - 2020-07-10 05:52:37 --> Severity: Notice --> Undefined index: KDJPASIEN D:\xampp\htdocs\simrs_open_source\application\farmasi\controllers\laporan_penjualan.php 64
ERROR - 2020-07-10 05:52:37 --> Query error: Table 'db_rs_open_dev.barang' doesn't exist - Invalid query: SELECT b.*,a.JMLJUAL,a.HJUAL,a.R,a.SUBTOTAL,c.NMSATUAN,a.SISA,a.JMLRET,d.DTJL,d.KDJL,d.TGLRESEP 
        FROM penjualan_detail a 
        LEFT JOIN barang b ON a.KDBRG=b.KDBRG 
        LEFT JOIN satuan c ON b.KDSATUAN=c.KDSATUAN 
        LEFT JOIN penjualan d ON a.KDJL=d.KDJL
        WHERE NOMR = '732917' AND d.KDJPASIEN = '1' AND d.KDPELAYANAN = 'GD' 
        AND (DATE_FORMAT(d.TGLRESEP,'%Y-%m-%d') BETWEEN '2020-07-10' AND '2020-07-10') 
        ORDER BY d.TGLRESEP
ERROR - 2020-07-10 05:53:36 --> Query error: Column 'NOMR' in where clause is ambiguous - Invalid query: SELECT a.*,c.cara_bayar AS NMJPASIEN 
        FROM tbl04_penjualan a 
        JOIN tbl01_pasien b ON a.NOMR=b.nomr
        LEFT JOIN tbl01_cara_bayar c ON a.id_cara_bayar=c.idx
        WHERE NOMR = '732917' AND a.id_cara_bayar = '1' AND a.JNSLAYANAN = 'GD' 
        AND (DATE_FORMAT(a.TGLRESEP,'%Y-%m-%d') BETWEEN '2020-07-10' AND '2020-07-10') 
        GROUP BY NOMR
ERROR - 2020-07-10 05:54:09 --> Severity: Notice --> Undefined index: ALMTPASIEN D:\xampp\htdocs\simrs_open_source\application\farmasi\controllers\laporan_penjualan.php 62
ERROR - 2020-07-10 05:54:10 --> Severity: Notice --> Undefined index: KDPELAYANAN D:\xampp\htdocs\simrs_open_source\application\farmasi\controllers\laporan_penjualan.php 63
ERROR - 2020-07-10 05:54:10 --> Severity: Notice --> Undefined index: JNSPELAYANAN D:\xampp\htdocs\simrs_open_source\application\farmasi\controllers\laporan_penjualan.php 64
ERROR - 2020-07-10 05:54:10 --> Severity: Notice --> Undefined index: KDJPASIEN D:\xampp\htdocs\simrs_open_source\application\farmasi\controllers\laporan_penjualan.php 65
ERROR - 2020-07-10 05:54:10 --> Query error: Table 'db_rs_open_dev.barang' doesn't exist - Invalid query: SELECT b.*,a.JMLJUAL,a.HJUAL,a.R,a.SUBTOTAL,c.NMSATUAN,a.SISA,a.JMLRET,d.DTJL,d.KDJL,d.TGLRESEP 
        FROM penjualan_detail a 
        LEFT JOIN barang b ON a.KDBRG=b.KDBRG 
        LEFT JOIN satuan c ON b.KDSATUAN=c.KDSATUAN 
        LEFT JOIN penjualan d ON a.KDJL=d.KDJL
        WHERE NOMR = '732917' AND d.KDJPASIEN = '1' AND d.KDPELAYANAN = 'GD' 
        AND (DATE_FORMAT(d.TGLRESEP,'%Y-%m-%d') BETWEEN '2020-07-10' AND '2020-07-10') 
        ORDER BY d.TGLRESEP
ERROR - 2020-07-10 05:54:35 --> Query error: Column 'NOMR' in group statement is ambiguous - Invalid query: SELECT a.*,b.*,c.cara_bayar AS NMJPASIEN 
        FROM tbl04_penjualan a 
        JOIN tbl01_pasien b ON a.NOMR=b.nomr
        LEFT JOIN tbl01_cara_bayar c ON a.id_cara_bayar=c.idx
        WHERE a.NOMR = '732917' AND a.id_cara_bayar = '1' AND a.JNSLAYANAN = 'GD' 
        AND (DATE_FORMAT(a.TGLRESEP,'%Y-%m-%d') BETWEEN '2020-07-10' AND '2020-07-10') 
        GROUP BY NOMR
ERROR - 2020-07-10 05:54:48 --> Severity: Notice --> Undefined index: ALMTPASIEN D:\xampp\htdocs\simrs_open_source\application\farmasi\controllers\laporan_penjualan.php 62
ERROR - 2020-07-10 05:54:48 --> Severity: Notice --> Undefined index: KDPELAYANAN D:\xampp\htdocs\simrs_open_source\application\farmasi\controllers\laporan_penjualan.php 63
ERROR - 2020-07-10 05:54:48 --> Severity: Notice --> Undefined index: JNSPELAYANAN D:\xampp\htdocs\simrs_open_source\application\farmasi\controllers\laporan_penjualan.php 64
ERROR - 2020-07-10 05:54:48 --> Severity: Notice --> Undefined index: KDJPASIEN D:\xampp\htdocs\simrs_open_source\application\farmasi\controllers\laporan_penjualan.php 65
ERROR - 2020-07-10 05:54:48 --> Query error: Table 'db_rs_open_dev.barang' doesn't exist - Invalid query: SELECT b.*,a.JMLJUAL,a.HJUAL,a.R,a.SUBTOTAL,c.NMSATUAN,a.SISA,a.JMLRET,d.DTJL,d.KDJL,d.TGLRESEP 
        FROM penjualan_detail a 
        LEFT JOIN barang b ON a.KDBRG=b.KDBRG 
        LEFT JOIN satuan c ON b.KDSATUAN=c.KDSATUAN 
        LEFT JOIN penjualan d ON a.KDJL=d.KDJL
        WHERE NOMR = '732917' AND d.KDJPASIEN = '1' AND d.KDPELAYANAN = 'GD' 
        AND (DATE_FORMAT(d.TGLRESEP,'%Y-%m-%d') BETWEEN '2020-07-10' AND '2020-07-10') 
        ORDER BY d.TGLRESEP
ERROR - 2020-07-10 05:58:39 --> Severity: Notice --> Undefined index: JNSPELAYANAN D:\xampp\htdocs\simrs_open_source\application\farmasi\controllers\laporan_penjualan.php 65
ERROR - 2020-07-10 05:58:39 --> Severity: Notice --> Undefined index:  D:\xampp\htdocs\simrs_open_source\application\farmasi\controllers\laporan_penjualan.php 65
ERROR - 2020-07-10 05:58:39 --> Severity: Notice --> Undefined index: cara_bayar D:\xampp\htdocs\simrs_open_source\application\farmasi\controllers\laporan_penjualan.php 67
ERROR - 2020-07-10 05:58:39 --> Query error: Table 'db_rs_open_dev.barang' doesn't exist - Invalid query: SELECT b.*,a.JMLJUAL,a.HJUAL,a.R,a.SUBTOTAL,c.NMSATUAN,a.SISA,a.JMLRET,d.DTJL,d.KDJL,d.TGLRESEP 
        FROM penjualan_detail a 
        LEFT JOIN barang b ON a.KDBRG=b.KDBRG 
        LEFT JOIN satuan c ON b.KDSATUAN=c.KDSATUAN 
        LEFT JOIN penjualan d ON a.KDJL=d.KDJL
        WHERE NOMR = '732917' AND d.KDJPASIEN = '1' AND d.KDPELAYANAN = 'GD' 
        AND (DATE_FORMAT(d.TGLRESEP,'%Y-%m-%d') BETWEEN '2020-07-10' AND '2020-07-10') 
        ORDER BY d.TGLRESEP
ERROR - 2020-07-10 05:59:15 --> Severity: Notice --> Undefined index: cara_bayar D:\xampp\htdocs\simrs_open_source\application\farmasi\controllers\laporan_penjualan.php 67
ERROR - 2020-07-10 05:59:15 --> Query error: Table 'db_rs_open_dev.barang' doesn't exist - Invalid query: SELECT b.*,a.JMLJUAL,a.HJUAL,a.R,a.SUBTOTAL,c.NMSATUAN,a.SISA,a.JMLRET,d.DTJL,d.KDJL,d.TGLRESEP 
        FROM penjualan_detail a 
        LEFT JOIN barang b ON a.KDBRG=b.KDBRG 
        LEFT JOIN satuan c ON b.KDSATUAN=c.KDSATUAN 
        LEFT JOIN penjualan d ON a.KDJL=d.KDJL
        WHERE NOMR = '732917' AND d.KDJPASIEN = '1' AND d.KDPELAYANAN = 'GD' 
        AND (DATE_FORMAT(d.TGLRESEP,'%Y-%m-%d') BETWEEN '2020-07-10' AND '2020-07-10') 
        ORDER BY d.TGLRESEP
ERROR - 2020-07-10 06:00:30 --> Query error: Table 'db_rs_open_dev.barang' doesn't exist - Invalid query: SELECT b.*,a.JMLJUAL,a.HJUAL,a.R,a.SUBTOTAL,c.NMSATUAN,a.SISA,a.JMLRET,d.DTJL,d.KDJL,d.TGLRESEP 
        FROM penjualan_detail a 
        LEFT JOIN barang b ON a.KDBRG=b.KDBRG 
        LEFT JOIN satuan c ON b.KDSATUAN=c.KDSATUAN 
        LEFT JOIN penjualan d ON a.KDJL=d.KDJL
        WHERE NOMR = '732917' AND d.KDJPASIEN = '1' AND d.KDPELAYANAN = 'GD' 
        AND (DATE_FORMAT(d.TGLRESEP,'%Y-%m-%d') BETWEEN '2020-07-10' AND '2020-07-10') 
        ORDER BY d.TGLRESEP
ERROR - 2020-07-10 06:01:48 --> Query error: Unknown column 'd.KDJPASIEN' in 'where clause' - Invalid query: SELECT b.*,a.JMLJUAL,a.HJUAL,a.R,a.SUBTOTAL,c.NMSATUAN,a.SISA,a.JMLRET,d.DTJL,d.KDJL,d.TGLRESEP 
        FROM tbl04_penjualan_detail a 
        LEFT JOIN tbl04_barang b ON a.KDBRG=b.KDBRG 
        LEFT JOIN tbl04_satuan c ON b.KDSATUAN=c.KDSATUAN 
        LEFT JOIN tbl04_penjualan d ON a.KDJL=d.KDJL
        WHERE NOMR = '732917' AND d.KDJPASIEN = '1' AND d.KDPELAYANAN = 'GD' 
        AND (DATE_FORMAT(d.TGLRESEP,'%Y-%m-%d') BETWEEN '2020-07-10' AND '2020-07-10') 
        ORDER BY d.TGLRESEP
ERROR - 2020-07-10 06:03:29 --> Severity: error --> Exception: Call to undefined function getCompanyOK() D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\print_preview_1.php 63
ERROR - 2020-07-10 06:04:44 --> Severity: Notice --> Undefined variable: NMJPASIEN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\print_preview_1.php 105
ERROR - 2020-07-10 06:06:11 --> Severity: Notice --> Undefined variable: NMJPASIEN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\print_preview_1.php 105
ERROR - 2020-07-10 06:09:13 --> Query error: Table 'db_rs_open_dev.dokter' doesn't exist - Invalid query: SELECT *
FROM `dokter`
ERROR - 2020-07-10 06:18:22 --> Query error: Table 'db_rs_open_dev.dokter' doesn't exist - Invalid query: SELECT *
FROM `dokter`
ERROR - 2020-07-10 06:19:35 --> Query error: Table 'db_rs_open_dev.dokter' doesn't exist - Invalid query: SELECT *
FROM `dokter`
ERROR - 2020-07-10 06:21:23 --> Severity: error --> Exception: Call to undefined function get_breadcrumb() D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 70
ERROR - 2020-07-10 06:23:12 --> Severity: error --> Exception: Call to undefined function get_breadcrumb() D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 3
ERROR - 2020-07-10 06:23:31 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:31 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:31 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:31 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:31 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:31 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:31 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:31 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:31 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:31 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:31 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:31 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:32 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:33 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 25
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 51
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 51
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 51
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 51
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 51
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 51
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 51
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 51
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 51
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 51
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 51
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 51
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 51
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 51
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 51
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 51
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 51
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 51
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 51
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 51
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 51
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 51
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 51
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 51
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 51
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 51
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 51
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 51
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 51
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 51
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 51
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 51
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 51
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 51
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 51
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 51
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 51
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 51
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 51
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 51
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 51
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 51
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 51
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 51
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 51
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 51
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 51
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 51
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 51
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: KDJPASIEN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 63
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: NMJPASIEN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 63
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: KDJPASIEN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 63
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: NMJPASIEN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 63
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: KDJPASIEN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 63
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: NMJPASIEN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 63
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: KDJPASIEN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 63
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: NMJPASIEN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 63
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: KDJPASIEN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 63
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: NMJPASIEN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 63
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: KDJPASIEN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 63
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: NMJPASIEN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 63
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: KDJPASIEN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 63
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: NMJPASIEN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 63
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: KDJPASIEN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 63
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined index: NMJPASIEN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 63
ERROR - 2020-07-10 06:23:34 --> Severity: Notice --> Undefined variable: datpelayanan D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 74
ERROR - 2020-07-10 06:23:35 --> Severity: error --> Exception: Call to a member function result_array() on null D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 74
ERROR - 2020-07-10 06:24:04 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:04 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:04 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:04 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:04 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:04 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:04 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:04 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:04 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:04 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:04 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:04 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:04 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:04 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:04 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:04 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:04 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:04 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:04 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:04 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:04 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:04 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:04 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:04 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:04 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:04 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:04 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:04 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:04 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:04 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:04 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:04 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:04 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:04 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:04 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:04 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:04 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:04 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:04 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:04 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:04 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:04 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:04 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:04 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:04 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:04 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:04 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:04 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:04 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:04 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:04 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:04 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:04 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:04 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:04 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:04 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:04 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:04 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:04 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:04 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:04 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:04 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:04 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:04 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:04 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:04 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:04 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:04 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:04 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:04 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:04 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:04 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:04 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:04 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:04 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:04 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:04 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:04 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:04 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:04 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:04 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:04 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:04 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:04 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:04 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:04 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:04 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:05 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:06 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:07 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:07 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:07 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:07 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:07 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:07 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:07 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:07 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:07 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:07 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:07 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:07 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:07 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:07 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:07 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:07 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:07 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:07 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:07 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:07 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:07 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:07 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:07 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:07 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:07 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:07 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:07 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:07 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:07 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:07 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:07 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:07 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:07 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:07 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:07 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:07 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:07 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:07 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:24:07 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:24:07 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:24:07 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:24:07 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:24:08 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:24:08 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:24:08 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:24:08 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:24:08 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:24:08 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:24:08 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:24:08 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:24:08 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:24:08 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:24:08 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:24:08 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:24:08 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:24:08 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:24:08 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:24:08 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:24:08 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:24:08 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:24:08 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:24:08 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:24:08 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:24:08 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:24:08 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:24:08 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:24:08 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:24:08 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:24:08 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:24:08 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:24:08 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:24:08 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:24:08 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:24:08 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:24:08 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:24:08 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:24:08 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:24:08 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:24:08 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:24:08 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:24:08 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:24:08 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:24:08 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:24:08 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:24:08 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:24:08 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:24:08 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:24:08 --> Severity: Notice --> Undefined index: KDJPASIEN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 65
ERROR - 2020-07-10 06:24:08 --> Severity: Notice --> Undefined index: NMJPASIEN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 65
ERROR - 2020-07-10 06:24:08 --> Severity: Notice --> Undefined index: KDJPASIEN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 65
ERROR - 2020-07-10 06:24:08 --> Severity: Notice --> Undefined index: NMJPASIEN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 65
ERROR - 2020-07-10 06:24:08 --> Severity: Notice --> Undefined index: KDJPASIEN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 65
ERROR - 2020-07-10 06:24:08 --> Severity: Notice --> Undefined index: NMJPASIEN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 65
ERROR - 2020-07-10 06:24:08 --> Severity: Notice --> Undefined index: KDJPASIEN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 65
ERROR - 2020-07-10 06:24:08 --> Severity: Notice --> Undefined index: NMJPASIEN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 65
ERROR - 2020-07-10 06:24:08 --> Severity: Notice --> Undefined index: KDJPASIEN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 65
ERROR - 2020-07-10 06:24:08 --> Severity: Notice --> Undefined index: NMJPASIEN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 65
ERROR - 2020-07-10 06:24:08 --> Severity: Notice --> Undefined index: KDJPASIEN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 65
ERROR - 2020-07-10 06:24:08 --> Severity: Notice --> Undefined index: NMJPASIEN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 65
ERROR - 2020-07-10 06:24:08 --> Severity: Notice --> Undefined index: KDJPASIEN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 65
ERROR - 2020-07-10 06:24:08 --> Severity: Notice --> Undefined index: NMJPASIEN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 65
ERROR - 2020-07-10 06:24:08 --> Severity: Notice --> Undefined index: KDJPASIEN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 65
ERROR - 2020-07-10 06:24:08 --> Severity: Notice --> Undefined index: NMJPASIEN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 65
ERROR - 2020-07-10 06:24:08 --> Severity: Notice --> Undefined variable: datpelayanan D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 76
ERROR - 2020-07-10 06:24:08 --> Severity: error --> Exception: Call to a member function result_array() on null D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 76
ERROR - 2020-07-10 06:25:11 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:11 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:11 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:11 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:11 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:11 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:11 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:11 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:11 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:11 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:11 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:11 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:11 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:11 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:11 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:11 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:11 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:11 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:11 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:11 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:11 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:11 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:11 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:11 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:11 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:11 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:11 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:11 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:11 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:11 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:11 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:12 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:13 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:14 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:15 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:15 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:15 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:15 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:15 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:15 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:15 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:15 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:15 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:15 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:15 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:15 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:15 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:15 --> Severity: Notice --> Undefined index: id_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:15 --> Severity: Notice --> Undefined index: nama_dokter D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 27
ERROR - 2020-07-10 06:25:15 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:25:15 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:25:15 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:25:15 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:25:15 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:25:15 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:25:15 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:25:15 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:25:15 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:25:15 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:25:15 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:25:15 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:25:15 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:25:15 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:25:15 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:25:15 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:25:15 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:25:15 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:25:15 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:25:15 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:25:15 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:25:15 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:25:15 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:25:15 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:25:15 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:25:15 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:25:15 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:25:15 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:25:15 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:25:15 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:25:15 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:25:15 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:25:15 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:25:15 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:25:15 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:25:15 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:25:15 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:25:15 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:25:15 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:25:15 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:25:15 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:25:15 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:25:15 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:25:15 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:25:15 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:25:15 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:25:15 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:25:15 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:25:15 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:25:15 --> Severity: Notice --> Undefined index: KDJPASIEN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 65
ERROR - 2020-07-10 06:25:15 --> Severity: Notice --> Undefined index: NMJPASIEN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 65
ERROR - 2020-07-10 06:25:15 --> Severity: Notice --> Undefined index: KDJPASIEN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 65
ERROR - 2020-07-10 06:25:15 --> Severity: Notice --> Undefined index: NMJPASIEN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 65
ERROR - 2020-07-10 06:25:15 --> Severity: Notice --> Undefined index: KDJPASIEN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 65
ERROR - 2020-07-10 06:25:15 --> Severity: Notice --> Undefined index: NMJPASIEN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 65
ERROR - 2020-07-10 06:25:15 --> Severity: Notice --> Undefined index: KDJPASIEN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 65
ERROR - 2020-07-10 06:25:15 --> Severity: Notice --> Undefined index: NMJPASIEN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 65
ERROR - 2020-07-10 06:25:15 --> Severity: Notice --> Undefined index: KDJPASIEN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 65
ERROR - 2020-07-10 06:25:15 --> Severity: Notice --> Undefined index: NMJPASIEN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 65
ERROR - 2020-07-10 06:25:15 --> Severity: Notice --> Undefined index: KDJPASIEN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 65
ERROR - 2020-07-10 06:25:15 --> Severity: Notice --> Undefined index: NMJPASIEN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 65
ERROR - 2020-07-10 06:25:15 --> Severity: Notice --> Undefined index: KDJPASIEN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 65
ERROR - 2020-07-10 06:25:15 --> Severity: Notice --> Undefined index: NMJPASIEN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 65
ERROR - 2020-07-10 06:25:15 --> Severity: Notice --> Undefined index: KDJPASIEN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 65
ERROR - 2020-07-10 06:25:15 --> Severity: Notice --> Undefined index: NMJPASIEN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 65
ERROR - 2020-07-10 06:25:15 --> Severity: Notice --> Undefined variable: datpelayanan D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 76
ERROR - 2020-07-10 06:25:15 --> Severity: error --> Exception: Call to a member function result_array() on null D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 76
ERROR - 2020-07-10 06:26:10 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:26:10 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:26:10 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:26:10 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:26:10 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:26:10 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:26:10 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:26:10 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:26:10 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:26:10 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:26:10 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:26:10 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:26:10 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:26:11 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:26:11 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:26:11 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:26:11 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:26:11 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:26:11 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:26:11 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:26:11 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:26:11 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:26:11 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:26:11 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:26:11 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:26:11 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:26:11 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:26:11 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:26:11 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:26:11 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:26:11 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:26:11 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:26:11 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:26:11 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:26:11 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:26:11 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:26:11 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:26:11 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:26:11 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:26:11 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:26:11 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:26:11 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:26:11 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:26:11 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:26:11 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:26:11 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:26:11 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:26:11 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:26:11 --> Severity: Notice --> Undefined index: grId D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 53
ERROR - 2020-07-10 06:26:11 --> Severity: Notice --> Undefined index: KDJPASIEN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 65
ERROR - 2020-07-10 06:26:11 --> Severity: Notice --> Undefined index: NMJPASIEN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 65
ERROR - 2020-07-10 06:26:11 --> Severity: Notice --> Undefined index: KDJPASIEN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 65
ERROR - 2020-07-10 06:26:11 --> Severity: Notice --> Undefined index: NMJPASIEN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 65
ERROR - 2020-07-10 06:26:11 --> Severity: Notice --> Undefined index: KDJPASIEN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 65
ERROR - 2020-07-10 06:26:11 --> Severity: Notice --> Undefined index: NMJPASIEN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 65
ERROR - 2020-07-10 06:26:11 --> Severity: Notice --> Undefined index: KDJPASIEN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 65
ERROR - 2020-07-10 06:26:11 --> Severity: Notice --> Undefined index: NMJPASIEN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 65
ERROR - 2020-07-10 06:26:11 --> Severity: Notice --> Undefined index: KDJPASIEN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 65
ERROR - 2020-07-10 06:26:11 --> Severity: Notice --> Undefined index: NMJPASIEN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 65
ERROR - 2020-07-10 06:26:11 --> Severity: Notice --> Undefined index: KDJPASIEN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 65
ERROR - 2020-07-10 06:26:11 --> Severity: Notice --> Undefined index: NMJPASIEN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 65
ERROR - 2020-07-10 06:26:11 --> Severity: Notice --> Undefined index: KDJPASIEN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 65
ERROR - 2020-07-10 06:26:11 --> Severity: Notice --> Undefined index: NMJPASIEN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 65
ERROR - 2020-07-10 06:26:11 --> Severity: Notice --> Undefined index: KDJPASIEN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 65
ERROR - 2020-07-10 06:26:11 --> Severity: Notice --> Undefined index: NMJPASIEN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 65
ERROR - 2020-07-10 06:26:11 --> Severity: Notice --> Undefined variable: datpelayanan D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 76
ERROR - 2020-07-10 06:26:11 --> Severity: error --> Exception: Call to a member function result_array() on null D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 76
ERROR - 2020-07-10 06:30:24 --> Severity: Notice --> Undefined variable: datpelayanan D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 77
ERROR - 2020-07-10 06:30:24 --> Severity: error --> Exception: Call to a member function result_array() on null D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan_per_dokter.php 77
ERROR - 2020-07-10 09:05:06 --> Query error: Table 'db_rs_open_dev.dokter' doesn't exist - Invalid query: SELECT `a`.`KDDOKTER`, `b`.`nama_dokter` AS `NMDOKTER`, `a`.`KDLOKASI`, `c`.`NMLOKASI`, `a`.`KDPELAYANAN`, `d`.`NMPELAYANAN`, `a`.`KDJPASIEN`, `e`.`NMJPASIEN`, `a`.`KDRUANGAN`, `f`.`grNama` AS `NMRUANGAN`
FROM `penjualan` `a`
LEFT JOIN `dokter` `b` ON `a`.`KDDOKTER`=`b`.`id_dokter`
LEFT JOIN `lokasi` `c` ON `a`.`KDLOKASI`=`c`.`KDLOKASI`
LEFT JOIN `pelayanan` `d` ON `a`.`KDPELAYANAN`=`d`.`KDPELAYANAN`
LEFT JOIN `jenis_pasien` `e` ON `a`.`KDJPASIEN`=`e`.`KDJPASIEN`
LEFT JOIN `group_ruang` `f` ON `a`.`KDRUANGAN`=`f`.`grId`
WHERE `a`.`KDDOKTER` = 'NRP1910063'
AND `a`.`KDLOKASI` = '1'
AND `a`.`KDRUANGAN` = '5'
AND `a`.`KDJPASIEN` = '1'
AND `a`.`KDPELAYANAN` = 'undefined'
AND DATE_FORMAT(a.TGLRESEP,"%Y-%m-%d") >= '2020-07-10'
AND DATE_FORMAT(a.TGLRESEP,"%Y-%m-%d") <= '2020-07-10'
GROUP BY `a`.`KDDOKTER`, `a`.`KDLOKASI`, `a`.`KDRUANGAN`, `a`.`KDJPASIEN`, `a`.`KDPELAYANAN`
ERROR - 2020-07-10 09:05:49 --> Query error: Table 'db_rs_open_dev.dokter' doesn't exist - Invalid query: SELECT `a`.`KDDOKTER`, `b`.`nama_dokter` AS `NMDOKTER`, `a`.`KDLOKASI`, `c`.`NMLOKASI`, `a`.`KDPELAYANAN`, `d`.`NMPELAYANAN`, `a`.`KDJPASIEN`, `e`.`NMJPASIEN`, `a`.`KDRUANGAN`, `f`.`grNama` AS `NMRUANGAN`
FROM `penjualan` `a`
LEFT JOIN `dokter` `b` ON `a`.`KDDOKTER`=`b`.`id_dokter`
LEFT JOIN `lokasi` `c` ON `a`.`KDLOKASI`=`c`.`KDLOKASI`
LEFT JOIN `pelayanan` `d` ON `a`.`KDPELAYANAN`=`d`.`KDPELAYANAN`
LEFT JOIN `jenis_pasien` `e` ON `a`.`KDJPASIEN`=`e`.`KDJPASIEN`
LEFT JOIN `group_ruang` `f` ON `a`.`KDRUANGAN`=`f`.`grId`
WHERE `a`.`KDDOKTER` = 'NRP1910063'
AND `a`.`KDLOKASI` = '1'
AND `a`.`KDRUANGAN` = '5'
AND `a`.`KDJPASIEN` = '1'
AND `a`.`KDPELAYANAN` = 'undefined'
AND DATE_FORMAT(a.TGLRESEP,"%Y-%m-%d") >= '2020-07-10'
AND DATE_FORMAT(a.TGLRESEP,"%Y-%m-%d") <= '2020-07-10'
GROUP BY `a`.`KDDOKTER`, `a`.`KDLOKASI`, `a`.`KDRUANGAN`, `a`.`KDJPASIEN`, `a`.`KDPELAYANAN`
ERROR - 2020-07-10 09:06:20 --> Query error: Table 'db_rs_open_dev.dokter' doesn't exist - Invalid query: SELECT `a`.`KDDOKTER`, `b`.`nama_dokter` AS `NMDOKTER`, `a`.`KDLOKASI`, `c`.`NMLOKASI`, `a`.`KDPELAYANAN`, `d`.`NMPELAYANAN`, `a`.`KDJPASIEN`, `e`.`NMJPASIEN`, `a`.`KDRUANGAN`, `f`.`grNama` AS `NMRUANGAN`
FROM `penjualan` `a`
LEFT JOIN `dokter` `b` ON `a`.`KDDOKTER`=`b`.`id_dokter`
LEFT JOIN `lokasi` `c` ON `a`.`KDLOKASI`=`c`.`KDLOKASI`
LEFT JOIN `pelayanan` `d` ON `a`.`KDPELAYANAN`=`d`.`KDPELAYANAN`
LEFT JOIN `jenis_pasien` `e` ON `a`.`KDJPASIEN`=`e`.`KDJPASIEN`
LEFT JOIN `group_ruang` `f` ON `a`.`KDRUANGAN`=`f`.`grId`
WHERE `a`.`KDDOKTER` = 'NRP1910066'
AND `a`.`KDLOKASI` = '1'
AND `a`.`KDRUANGAN` = '5'
AND `a`.`KDJPASIEN` = '1'
AND `a`.`KDPELAYANAN` = 'undefined'
AND DATE_FORMAT(a.TGLRESEP,"%Y-%m-%d") >= '2020-07-01'
AND DATE_FORMAT(a.TGLRESEP,"%Y-%m-%d") <= '2020-07-31'
GROUP BY `a`.`KDDOKTER`, `a`.`KDLOKASI`, `a`.`KDRUANGAN`, `a`.`KDJPASIEN`, `a`.`KDPELAYANAN`
ERROR - 2020-07-10 09:14:23 --> Query error: Table 'db_rs_open_dev.tbl04_ruang' doesn't exist - Invalid query: SELECT `a`.`KDDOKTER`, `a`.`NMDOKTER`, `a`.`KDLOKASI`, `a`.`NMLOKASI`, `a`.`JNSLAYANAN`, `a`.`ID_CARA_BAYAR`, `a`.`CARA_BAYAR`, `a`.`KDRUANGAN`, `a`.`NMRUANGAN`
FROM `tbl04_penjualan` `a`
LEFT JOIN `tbl04_jenis_pasien` `e` ON `a`.`KDJPASIEN`=`e`.`KDJPASIEN`
LEFT JOIN `tbl04_ruang` `f` ON `a`.`KDRUANGAN`=`f`.`idx`
WHERE `a`.`KDDOKTER` = 'NRP1910066'
AND `a`.`KDLOKASI` = '1'
AND `a`.`KDRUANGAN` = '5'
AND `a`.`KDJPASIEN` = '1'
AND `a`.`KDPELAYANAN` = 'undefined'
AND DATE_FORMAT(a.TGLRESEP,"%Y-%m-%d") >= '2020-07-01'
AND DATE_FORMAT(a.TGLRESEP,"%Y-%m-%d") <= '2020-07-31'
GROUP BY `a`.`KDDOKTER`, `a`.`KDLOKASI`, `a`.`KDRUANGAN`, `a`.`KDJPASIEN`, `a`.`KDPELAYANAN`
ERROR - 2020-07-10 09:14:51 --> Query error: Unknown column 'a.KDJPASIEN' in 'where clause' - Invalid query: SELECT `a`.`KDDOKTER`, `a`.`NMDOKTER`, `a`.`KDLOKASI`, `a`.`NMLOKASI`, `a`.`JNSLAYANAN`, `a`.`ID_CARA_BAYAR`, `a`.`CARA_BAYAR`, `a`.`KDRUANGAN`, `a`.`NMRUANGAN`
FROM `tbl04_penjualan` `a`
WHERE `a`.`KDDOKTER` = 'NRP1910066'
AND `a`.`KDLOKASI` = '1'
AND `a`.`KDRUANGAN` = '5'
AND `a`.`KDJPASIEN` = '1'
AND `a`.`KDPELAYANAN` = 'undefined'
AND DATE_FORMAT(a.TGLRESEP,"%Y-%m-%d") >= '2020-07-01'
AND DATE_FORMAT(a.TGLRESEP,"%Y-%m-%d") <= '2020-07-31'
GROUP BY `a`.`KDDOKTER`, `a`.`KDLOKASI`, `a`.`KDRUANGAN`, `a`.`KDJPASIEN`, `a`.`KDPELAYANAN`
ERROR - 2020-07-10 09:16:30 --> Query error: Unknown column 'a.KDJPASIEN' in 'where clause' - Invalid query: SELECT `a`.`KDDOKTER`, `a`.`NMDOKTER`, `a`.`KDLOKASI`, `a`.`NMLOKASI`, `a`.`JNSLAYANAN`, `a`.`ID_CARA_BAYAR`, `a`.`CARA_BAYAR`, `a`.`KDRUANGAN`, `a`.`NMRUANGAN`
FROM `tbl04_penjualan` `a`
WHERE `a`.`KDDOKTER` = 'NRP1910066'
AND `a`.`KDLOKASI` = '1'
AND `a`.`KDRUANGAN` = '5'
AND `a`.`KDJPASIEN` = '1'
AND `a`.`JNSLAYANAN` = 'undefined'
AND DATE_FORMAT(a.TGLRESEP,"%Y-%m-%d") >= '2020-07-01'
AND DATE_FORMAT(a.TGLRESEP,"%Y-%m-%d") <= '2020-07-31'
GROUP BY `a`.`KDDOKTER`, `a`.`KDLOKASI`, `a`.`KDRUANGAN`, `a`.`KDJPASIEN`, `a`.`JNSLAYANAN`
ERROR - 2020-07-10 09:17:06 --> Query error: Unknown column 'a.KDJPASIEN' in 'where clause' - Invalid query: SELECT `a`.`KDDOKTER`, `a`.`NMDOKTER`, `a`.`KDLOKASI`, `a`.`NMLOKASI`, `a`.`JNSLAYANAN`, `a`.`ID_CARA_BAYAR`, `a`.`CARA_BAYAR`, `a`.`KDRUANGAN`, `a`.`NMRUANGAN`
FROM `tbl04_penjualan` `a`
WHERE `a`.`KDDOKTER` = 'NRP1910066'
AND `a`.`KDLOKASI` = '1'
AND `a`.`KDRUANGAN` = '5'
AND `a`.`KDJPASIEN` = '1'
AND `a`.`JNSLAYANAN` = 'undefined'
AND DATE_FORMAT(a.TGLRESEP,"%Y-%m-%d") >= '2020-07-01'
AND DATE_FORMAT(a.TGLRESEP,"%Y-%m-%d") <= '2020-07-31'
GROUP BY `a`.`KDDOKTER`, `a`.`KDLOKASI`, `a`.`KDRUANGAN`, `a`.`KDJPASIEN`, `a`.`JNSLAYANAN`
ERROR - 2020-07-10 09:21:50 --> Query error: Unknown column 'a.JNSLAYANAN1' in 'where clause' - Invalid query: SELECT `a`.`KDDOKTER`, `a`.`NMDOKTER`, `a`.`KDLOKASI`, `a`.`NMLOKASI`, `a`.`JNSLAYANAN`, `a`.`ID_CARA_BAYAR`, `a`.`CARA_BAYAR`, `a`.`KDRUANGAN`, `a`.`NMRUANGAN`
FROM `tbl04_penjualan` `a`
WHERE `a`.`KDDOKTER` = 'NRP1910066'
AND `a`.`KDLOKASI` = '1'
AND `a`.`KDRUANGAN` = '1'
AND `a`.`ID_CARA_BAYAR` = '1'
AND `a`.`JNSLAYANAN1` = 'undefined'
AND DATE_FORMAT(a.TGLRESEP,"%Y-%m-%d") >= '2020-07-01'
AND DATE_FORMAT(a.TGLRESEP,"%Y-%m-%d") <= '2020-07-31'
GROUP BY `a`.`KDDOKTER`, `a`.`KDLOKASI`, `a`.`KDRUANGAN`, `a`.`CARA_BAYAR`, `a`.`JNSLAYANAN`
ERROR - 2020-07-10 09:33:04 --> Severity: Notice --> Undefined index: KDJPASIEN D:\xampp\htdocs\simrs_open_source\application\farmasi\controllers\laporan_penjualan.php 221
ERROR - 2020-07-10 09:33:04 --> Severity: Notice --> Undefined index: NMJPASIEN D:\xampp\htdocs\simrs_open_source\application\farmasi\controllers\laporan_penjualan.php 222
ERROR - 2020-07-10 09:33:04 --> Severity: Notice --> Undefined index: KDPELAYANAN D:\xampp\htdocs\simrs_open_source\application\farmasi\controllers\laporan_penjualan.php 229
ERROR - 2020-07-10 09:33:04 --> Severity: Notice --> Undefined index: NMPELAYANAN D:\xampp\htdocs\simrs_open_source\application\farmasi\controllers\laporan_penjualan.php 230
ERROR - 2020-07-10 09:33:04 --> Severity: error --> Exception: Call to undefined function getCompanyOK() D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\print_preview_7.php 63
ERROR - 2020-07-10 09:39:38 --> Severity: Notice --> Undefined index: KDPELAYANAN D:\xampp\htdocs\simrs_open_source\application\farmasi\controllers\laporan_penjualan.php 229
ERROR - 2020-07-10 09:39:38 --> Severity: Notice --> Undefined index: NMPELAYANAN D:\xampp\htdocs\simrs_open_source\application\farmasi\controllers\laporan_penjualan.php 230
ERROR - 2020-07-10 09:39:39 --> Severity: error --> Exception: Call to undefined function getCompanyOK() D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\print_preview_7.php 63
ERROR - 2020-07-10 09:40:58 --> Severity: error --> Exception: Call to undefined function getCompanyOK() D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\print_preview_7.php 63
ERROR - 2020-07-10 09:41:21 --> Severity: Notice --> Undefined variable: NMPELAYANAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\print_preview_7.php 101
ERROR - 2020-07-10 09:41:21 --> Severity: Notice --> Undefined variable: KDPELAYANAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\print_preview_7.php 160
ERROR - 2020-07-10 09:43:27 --> Severity: Notice --> Undefined variable: KDPELAYANAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\print_preview_7.php 160
ERROR - 2020-07-10 09:46:24 --> Severity: Notice --> Undefined variable: KDPELAYANAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\print_preview_7.php 160
ERROR - 2020-07-10 09:46:26 --> Severity: Notice --> Undefined variable: KDPELAYANAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\print_preview_7.php 160
ERROR - 2020-07-10 09:46:27 --> Severity: Notice --> Undefined variable: KDPELAYANAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\print_preview_7.php 160
ERROR - 2020-07-10 09:46:59 --> Severity: Notice --> Undefined variable: KDPELAYANAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\print_preview_7.php 160
ERROR - 2020-07-10 09:47:01 --> Severity: Notice --> Undefined variable: KDPELAYANAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\print_preview_7.php 160
ERROR - 2020-07-10 09:47:16 --> Severity: Notice --> Undefined variable: KDPELAYANAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\print_preview_7.php 160
ERROR - 2020-07-10 09:48:39 --> Severity: Notice --> Undefined variable: KDPELAYANAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\print_preview_7.php 161
ERROR - 2020-07-10 09:55:41 --> Severity: Notice --> Undefined variable: KDPELAYANAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\print_preview_7.php 161
ERROR - 2020-07-10 09:57:08 --> Query error: Table 'db_rs_open_dev.tbl01_ruangan' doesn't exist - Invalid query: SELECT `b`.`KDJL`, `b`.`DTJL`, `b`.`TGLRESEP`, `b`.`ID_DAFTAR`, `b`.`NOMR`, `b`.`NMPASIEN`, `c`.`NMJPASIEN`, `d`.`NMDOKTER`, `e`.`NMRUANGAN`, SUM((a.HJUAL * a.SISA) + a.R) AS SubTotal, SUM(a.HJUAL * a.SISA * a.DISKON / 100) AS DISKON, SUM((a.HJUAL * a.SISA) - (a.HJUAL * a.SISA * a.DISKON / 100) + a.R) AS Total
FROM `tbl04_penjualan_detail` `a`
LEFT JOIN `tbl04_penjualan` `b` ON `a`.`KDJL`=`b`.`KDJL`
LEFT JOIN `tbl01_cara_bayar` `c` ON `b`.`KDJPASIEN`=`c`.`idx`
LEFT JOIN `tbl01_pegawai` `d` ON `b`.`KDDOKTER`=`d`.`NRP`
LEFT JOIN `tbl01_ruangan` `e` ON `b`.`KDRUANGAN`=`e`.`idx`
WHERE DATE_FORMAT(b.TGLRESEP,"%Y-%m-%d") >= '2020-07-01'
AND DATE_FORMAT(b.TGLRESEP,"%Y-%m-%d") <= '2020-07-10'
AND `b`.`KDDOKTER` = 'NRP1910066'
AND `b`.`KDLOKASI` = '1'
AND `b`.`KDRUANGAN` = '1'
AND `b`.`KDJPASIEN` = '1'
AND `b`.`KDPELAYANAN` = 'GD'
GROUP BY `b`.`KDJL`
ORDER BY `b`.`TGLRESEP`, `b`.`KDDOKTER`
ERROR - 2020-07-10 10:01:08 --> Query error: Unknown column 'b.KDJPASIEN' in 'where clause' - Invalid query: SELECT `b`.`KDJL`, `b`.`DTJL`, `b`.`TGLRESEP`, `b`.`ID_DAFTAR`, `b`.`NOMR`, `b`.`NMPASIEN`, `b`.`CARA_BAYAR` AS `NMJPASIEN`, `b`.`NMDOKTER`, `b`.`NMRUANGAN`, SUM((a.HJUAL * a.SISA) + a.R) AS SubTotal, SUM(a.HJUAL * a.SISA * a.DISKON / 100) AS DISKON, SUM((a.HJUAL * a.SISA) - (a.HJUAL * a.SISA * a.DISKON / 100) + a.R) AS Total
FROM `tbl04_penjualan_detail` `a`
LEFT JOIN `tbl04_penjualan` `b` ON `a`.`KDJL`=`b`.`KDJL`
WHERE DATE_FORMAT(b.TGLRESEP,"%Y-%m-%d") >= '2020-07-01'
AND DATE_FORMAT(b.TGLRESEP,"%Y-%m-%d") <= '2020-07-10'
AND `b`.`KDDOKTER` = 'NRP1910066'
AND `b`.`KDLOKASI` = '1'
AND `b`.`KDRUANGAN` = '1'
AND `b`.`KDJPASIEN` = '1'
AND `b`.`KDPELAYANAN` = 'GD'
GROUP BY `b`.`KDJL`
ORDER BY `b`.`TGLRESEP`, `b`.`KDDOKTER`
ERROR - 2020-07-10 10:10:35 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '.`DISKON / 100` AS `DISKON`, `a`.`R`, (a.HJUAL * a.SISA) - (a.HJUAL * a.SISA * a' at line 1 - Invalid query: SELECT `a`.`KDJL`, `b`.`DTJL`, `b`.`TGLRESEP`, `b`.`NOMR`, `b`.`NMPASIEN`, `d`.`NMJPASIEN`, `e`.`nama_dokter` AS `NMDOKTER`, `f`.`grNama` AS `NMRUANGAN`, `a`.`KDBRG`, `c`.`NMBRG`, `a`.`SISA`, `a`.`HJUAL`, `a`.`HJUAL * a`.`SISA * a`.`DISKON / 100` AS `DISKON`, `a`.`R`, (a.HJUAL * a.SISA) - (a.HJUAL * a.SISA * a.DISKON / 100) + a.R AS Total
FROM `tbl04_penjualan_detail` `a`
LEFT JOIN `tbl04_penjualan` `b` ON `a`.`KDJL`=`b`.`KDJL`
WHERE DATE_FORMAT(b.TGLRESEP,"%Y-%m-%d") >= '2020-07-01'
AND DATE_FORMAT(b.TGLRESEP,"%Y-%m-%d") <= '2020-07-10'
AND `b`.`KDDOKTER` = 'NRP1910066'
AND `b`.`KDLOKASI` = '1'
AND `b`.`KDRUANGAN` = '1'
AND `b`.`KDJPASIEN` = '1'
AND `b`.`KDPELAYANAN` = 'GD'
GROUP BY `b`.`KDJL`, `a`.`KDBRG`
ORDER BY `b`.`TGLRESEP`, `b`.`KDDOKTER`
ERROR - 2020-07-10 10:12:13 --> Query error: Table 'db_rs_open_dev.tbl04_penjualan_detail1' doesn't exist - Invalid query: SELECT `b`.`KDJL`, `b`.`DTJL`, `b`.`TGLRESEP`, `b`.`ID_DAFTAR`, `b`.`NOMR`, `b`.`NMPASIEN`, `b`.`CARA_BAYAR` AS `NMJPASIEN`, `b`.`NMDOKTER`, `b`.`NMRUANGAN`, SUM((a.HJUAL * a.SISA) + a.R) AS SubTotal, SUM(a.HJUAL * a.SISA * a.DISKON / 100) AS DISKON, SUM((a.HJUAL * a.SISA) - (a.HJUAL * a.SISA * a.DISKON / 100) + a.R) AS Total
FROM `tbl04_penjualan_detail1` `a`
LEFT JOIN `tbl04_penjualan` `b` ON `a`.`KDJL`=`b`.`KDJL`
WHERE DATE_FORMAT(b.TGLRESEP,"%Y-%m-%d") >= '2020-07-01'
AND DATE_FORMAT(b.TGLRESEP,"%Y-%m-%d") <= '2020-07-10'
AND `b`.`KDDOKTER` = 'NRP1910066'
AND `b`.`KDLOKASI` = '1'
AND `b`.`KDRUANGAN` = '1'
AND `b`.`ID_CARA_BAYAR` = '1'
AND `b`.`JNSLAYANAN` = 'GD'
GROUP BY `b`.`KDJL`
ORDER BY `b`.`TGLRESEP`, `b`.`KDDOKTER`
ERROR - 2020-07-10 10:14:27 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '.`DISKON / 100` AS `DISKON`, `a`.`R`, (a.HJUAL * a.SISA) - (a.HJUAL * a.SISA * a' at line 1 - Invalid query: SELECT `a`.`KDJL`, `b`.`DTJL`, `b`.`TGLRESEP`, `b`.`NOMR`, `b`.`NMPASIEN`, `b`.`CARA_BAYAR` AS `NMJPASIEN`, `b`.`nama_dokter` AS `NMDOKTER`, `b`.`NMRUANGAN`, `a`.`KDBRG`, `c`.`NMBRG`, `a`.`SISA`, `a`.`HJUAL`, `a`.`HJUAL * a`.`SISA * a`.`DISKON / 100` AS `DISKON`, `a`.`R`, (a.HJUAL * a.SISA) - (a.HJUAL * a.SISA * a.DISKON / 100) + a.R AS Total
FROM `tbl04_penjualan_detail` `a`
LEFT JOIN `tbl04_penjualan` `b` ON `a`.`KDJL`=`b`.`KDJL`
WHERE DATE_FORMAT(b.TGLRESEP,"%Y-%m-%d") >= '2020-07-01'
AND DATE_FORMAT(b.TGLRESEP,"%Y-%m-%d") <= '2020-07-10'
AND `b`.`KDDOKTER` = 'NRP1910066'
AND `b`.`KDLOKASI` = '1'
AND `b`.`KDRUANGAN` = '1'
AND `b`.`KDJPASIEN` = '1'
AND `b`.`KDPELAYANAN` = 'GD'
GROUP BY `b`.`KDJL`, `a`.`KDBRG`
ORDER BY `b`.`TGLRESEP`, `b`.`KDDOKTER`
ERROR - 2020-07-10 10:21:14 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '.`DISKON / 100` AS `DISKON`, `a`.`R`, (a.HJUAL * a.SISA) - (a.HJUAL * a.SISA * a' at line 1 - Invalid query: SELECT `a`.`KDJL`, `b`.`DTJL`, `b`.`TGLRESEP`, `b`.`NOMR`, `b`.`NMPASIEN`, `b`.`CARA_BAYAR` AS `NMJPASIEN`, `b`.`nama_dokter` AS `NMDOKTER`, `b`.`NMRUANGAN`, `a`.`KDBRG`, `b`.`NMBRG`, `a`.`SISA`, `a`.`HJUAL`, `a`.`HJUAL * a`.`SISA * a`.`DISKON / 100` AS `DISKON`, `a`.`R`, (a.HJUAL * a.SISA) - (a.HJUAL * a.SISA * a.DISKON / 100) + a.R AS Total
FROM `tbl04_penjualan_detail` `a`
LEFT JOIN `tbl04_penjualan` `b` ON `a`.`KDJL`=`b`.`KDJL`
WHERE DATE_FORMAT(b.TGLRESEP,"%Y-%m-%d") >= '2020-07-01'
AND DATE_FORMAT(b.TGLRESEP,"%Y-%m-%d") <= '2020-07-10'
AND `b`.`KDDOKTER` = 'NRP1910066'
AND `b`.`KDLOKASI` = '1'
AND `b`.`KDRUANGAN` = '1'
AND `b`.`KDJPASIEN` = '1'
AND `b`.`KDPELAYANAN` = 'GD'
GROUP BY `b`.`KDJL`, `a`.`KDBRG`
ORDER BY `b`.`TGLRESEP`, `b`.`KDDOKTER`
ERROR - 2020-07-10 10:23:33 --> Query error: Unknown column 'b.nama_dokter' in 'field list' - Invalid query: SELECT `a`.`KDJL`, `b`.`DTJL`, `b`.`TGLRESEP`, `b`.`NOMR`, `b`.`NMPASIEN`, `b`.`CARA_BAYAR` AS `NMJPASIEN`, `b`.`nama_dokter` AS `NMDOKTER`, `b`.`NMRUANGAN`, `a`.`KDBRG`, `b`.`NMBRG`, `a`.`SISA`, `a`.`HJUAL`, (a.HJUAL * a.SISA * a.DISKON / 100) AS DISKON, `a`.`R`, (a.HJUAL * a.SISA) - (a.HJUAL * a.SISA * a.DISKON / 100) + a.R AS Total
FROM `tbl04_penjualan_detail` `a`
LEFT JOIN `tbl04_penjualan` `b` ON `a`.`KDJL`=`b`.`KDJL`
WHERE DATE_FORMAT(b.TGLRESEP,"%Y-%m-%d") >= '2020-07-01'
AND DATE_FORMAT(b.TGLRESEP,"%Y-%m-%d") <= '2020-07-10'
AND `b`.`KDDOKTER` = 'NRP1910066'
AND `b`.`KDLOKASI` = '1'
AND `b`.`KDRUANGAN` = '1'
AND `b`.`KDJPASIEN` = '1'
AND `b`.`KDPELAYANAN` = 'GD'
GROUP BY `b`.`KDJL`, `a`.`KDBRG`
ORDER BY `b`.`TGLRESEP`, `b`.`KDDOKTER`
ERROR - 2020-07-10 10:25:32 --> Query error: Unknown column 'b.KDJPASIEN' in 'where clause' - Invalid query: SELECT `a`.`KDJL`, `b`.`DTJL`, `b`.`TGLRESEP`, `b`.`NOMR`, `b`.`NMPASIEN`, `b`.`CARA_BAYAR` AS `NMJPASIEN`, `b`.`NMDOKTER`, `b`.`NMRUANGAN`, `a`.`KDBRG`, `a`.`NMBRG`, `a`.`SISA`, `a`.`HJUAL`, (a.HJUAL * a.SISA * a.DISKON / 100) AS DISKON, `a`.`R`, (a.HJUAL * a.SISA) - (a.HJUAL * a.SISA * a.DISKON / 100) + a.R AS Total
FROM `tbl04_penjualan_detail` `a`
LEFT JOIN `tbl04_penjualan` `b` ON `a`.`KDJL`=`b`.`KDJL`
WHERE DATE_FORMAT(b.TGLRESEP,"%Y-%m-%d") >= '2020-07-01'
AND DATE_FORMAT(b.TGLRESEP,"%Y-%m-%d") <= '2020-07-10'
AND `b`.`KDDOKTER` = 'NRP1910066'
AND `b`.`KDLOKASI` = '1'
AND `b`.`KDRUANGAN` = '1'
AND `b`.`KDJPASIEN` = '1'
AND `b`.`KDPELAYANAN` = 'GD'
GROUP BY `b`.`KDJL`, `a`.`KDBRG`
ORDER BY `b`.`TGLRESEP`, `b`.`KDDOKTER`
ERROR - 2020-07-10 10:32:34 --> Query error: Unknown column 'b.KDPELAYANAN' in 'where clause' - Invalid query: SELECT `a`.`KDJL`, `b`.`DTJL`, `b`.`TGLRESEP`, `b`.`NOMR`, `b`.`NMPASIEN`, `b`.`CARA_BAYAR` AS `NMJPASIEN`, `b`.`NMDOKTER`, `b`.`NMRUANGAN`, `a`.`KDBRG`, `a`.`NMBRG`, `a`.`SISA`, `a`.`HJUAL`, (a.HJUAL * a.SISA * a.DISKON / 100) AS DISKON, `a`.`R`, (a.HJUAL * a.SISA) - (a.HJUAL * a.SISA * a.DISKON / 100) + a.R AS Total
FROM `tbl04_penjualan_detail` `a`
LEFT JOIN `tbl04_penjualan` `b` ON `a`.`KDJL`=`b`.`KDJL`
WHERE DATE_FORMAT(b.TGLRESEP,"%Y-%m-%d") >= '2020-07-01'
AND DATE_FORMAT(b.TGLRESEP,"%Y-%m-%d") <= '2020-07-10'
AND `b`.`KDDOKTER` = 'NRP1910066'
AND `b`.`KDLOKASI` = '1'
AND `b`.`KDRUANGAN` = '1'
AND `b`.`ID_CARA_BAYAR` = '1'
AND `b`.`KDPELAYANAN` = 'GD'
GROUP BY `b`.`KDJL`, `a`.`KDBRG`
ORDER BY `b`.`TGLRESEP`, `b`.`KDDOKTER`
ERROR - 2020-07-10 10:36:32 --> Query error: Unknown column 'b.KDDOKTER1' in 'order clause' - Invalid query: SELECT `b`.`KDJL`, `b`.`DTJL`, `b`.`TGLRESEP`, `b`.`ID_DAFTAR`, `b`.`NOMR`, `b`.`NMPASIEN`, `b`.`CARA_BAYAR` AS `NMJPASIEN`, `b`.`NMDOKTER`, `b`.`NMRUANGAN`, SUM((a.HJUAL * a.SISA) + a.R) AS SubTotal, SUM(a.HJUAL * a.SISA * a.DISKON / 100) AS DISKON, SUM((a.HJUAL * a.SISA) - (a.HJUAL * a.SISA * a.DISKON / 100) + a.R) AS Total
FROM `tbl04_penjualan_detail` `a`
LEFT JOIN `tbl04_penjualan` `b` ON `a`.`KDJL`=`b`.`KDJL`
WHERE DATE_FORMAT(b.TGLRESEP,"%Y-%m-%d") >= '2020-07-01'
AND DATE_FORMAT(b.TGLRESEP,"%Y-%m-%d") <= '2020-07-10'
AND `b`.`KDDOKTER` = 'NRP1910066'
AND `b`.`KDLOKASI` = '1'
AND `b`.`KDRUANGAN` = '1'
AND `b`.`ID_CARA_BAYAR` = '1'
AND `b`.`JNSLAYANAN` = 'GD'
GROUP BY `b`.`KDJL`
ORDER BY `b`.`TGLRESEP`, `b`.`KDDOKTER1`
ERROR - 2020-07-10 10:38:59 --> Query error: Table 'db_rs_open_dev.lokasi' doesn't exist - Invalid query: SELECT *
FROM `lokasi`
ERROR - 2020-07-10 10:39:04 --> Query error: Table 'db_rs_open_dev.lokasi' doesn't exist - Invalid query: SELECT *
FROM `lokasi`
ERROR - 2020-07-10 10:40:19 --> Query error: Table 'db_rs_open_dev.lokasi' doesn't exist - Invalid query: SELECT *
FROM `lokasi`
ERROR - 2020-07-10 10:40:40 --> Severity: error --> Exception: Call to undefined function get_breadcrumb() D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_harian_detail_penjualan.php 70
ERROR - 2020-07-10 10:47:52 --> Query error: Table 'db_rs_open_dev.lokasi' doesn't exist - Invalid query: SELECT a.KDLOKASI,b.NMLOKASI FROM penjualan a 
        LEFT JOIN lokasi b ON a.KDLOKASI=b.KDLOKASI
        WHERE a.KDLOKASI = '1'
        AND DATE_FORMAT(a.TGLRESEP,'%Y-%m-%d') = '2020-07-10' GROUP BY a.KDLOKASI
ERROR - 2020-07-10 10:50:47 --> Query error: Unknown column 'b.NMBRG' in 'field list' - Invalid query: SELECT a.KDJL,a.KDBRG,b.NMBRG,a.SISA,a.HJUAL,a.HJUAL * a.SISA * a.DISKON / 100 AS DISKON,a.R,
            (a.HJUAL * a.SISA) - (a.HJUAL * a.SISA * a.DISKON / 100) + a.R AS Total FROM tbl04_penjualan_detail a 
            LEFT JOIN tbl04_penjualan b ON a.KDJL=b.KDJL 
            WHERE KDLOKASI = '1'  
            AND DATE_FORMAT(b.TGLRESEP,'%Y-%m-%d') = '2020-07-10'
            GROUP BY a.KDJL,a.KDBRG ORDER BY b.TGLRESEP
ERROR - 2020-07-10 10:51:45 --> Severity: error --> Exception: Call to undefined function getCompanyOK() D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\print_preview_3.php 63
ERROR - 2020-07-10 10:52:25 --> Query error: Table 'db_rs_open_dev.lokasi' doesn't exist - Invalid query: SELECT *
FROM `lokasi`
ERROR - 2020-07-10 10:54:33 --> Query error: Table 'db_rs_open_dev.lokasi' doesn't exist - Invalid query: SELECT *
FROM `lokasi`
ERROR - 2020-07-10 10:54:48 --> Severity: error --> Exception: Call to undefined function get_breadcrumb() D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_periode_penjualan.php 70
ERROR - 2020-07-10 10:55:55 --> Severity: Notice --> Undefined variable: datpelayanan D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_periode_penjualan.php 153
ERROR - 2020-07-10 10:55:55 --> Severity: error --> Exception: Call to a member function result_array() on null D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_periode_penjualan.php 153
ERROR - 2020-07-10 10:56:48 --> Severity: Notice --> Undefined variable: datpelayanan D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_periode_penjualan.php 153
ERROR - 2020-07-10 10:56:48 --> Severity: error --> Exception: Call to a member function result_array() on null D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_periode_penjualan.php 153
ERROR - 2020-07-10 10:56:49 --> Severity: Notice --> Undefined variable: datpelayanan D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_periode_penjualan.php 153
ERROR - 2020-07-10 10:56:49 --> Severity: error --> Exception: Call to a member function result_array() on null D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_periode_penjualan.php 153
ERROR - 2020-07-10 10:59:53 --> Query error: Table 'db_rs_open_dev.id_cara_bayar' doesn't exist - Invalid query: SELECT *
FROM `id_cara_bayar`
ERROR - 2020-07-10 10:59:57 --> Query error: Table 'db_rs_open_dev.lokasi' doesn't exist - Invalid query: SELECT *
FROM `lokasi`
ERROR - 2020-07-10 11:00:02 --> Query error: Table 'db_rs_open_dev.id_cara_bayar' doesn't exist - Invalid query: SELECT *
FROM `id_cara_bayar`
ERROR - 2020-07-10 11:00:25 --> Severity: Notice --> Undefined variable: datpelayanan D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_periode_penjualan.php 153
ERROR - 2020-07-10 11:00:25 --> Severity: error --> Exception: Call to a member function result_array() on null D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_periode_penjualan.php 153
ERROR - 2020-07-10 11:00:45 --> Query error: Table 'db_rs_open_dev.lokasi' doesn't exist - Invalid query: SELECT *
FROM `lokasi`
ERROR - 2020-07-10 11:00:47 --> Severity: Notice --> Undefined variable: datpelayanan D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_periode_penjualan.php 153
ERROR - 2020-07-10 11:00:47 --> Severity: error --> Exception: Call to a member function result_array() on null D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_periode_penjualan.php 153
ERROR - 2020-07-10 11:00:48 --> Severity: Notice --> Undefined variable: datpelayanan D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_periode_penjualan.php 153
ERROR - 2020-07-10 11:00:48 --> Severity: error --> Exception: Call to a member function result_array() on null D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_periode_penjualan.php 153
ERROR - 2020-07-10 11:01:54 --> Severity: Notice --> Undefined variable: datpelayanan D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_periode_penjualan.php 153
ERROR - 2020-07-10 11:01:54 --> Severity: error --> Exception: Call to a member function result_array() on null D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_periode_penjualan.php 153
ERROR - 2020-07-10 11:04:23 --> Severity: Notice --> Undefined variable: datpelayanan D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_periode_penjualan.php 153
ERROR - 2020-07-10 11:04:23 --> Severity: error --> Exception: Call to a member function result_array() on null D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_periode_penjualan.php 153
ERROR - 2020-07-10 11:13:12 --> Query error: Table 'db_rs_open_dev.lokasi' doesn't exist - Invalid query: SELECT *
FROM `lokasi`
ERROR - 2020-07-10 11:13:15 --> Query error: Table 'db_rs_open_dev.dokter' doesn't exist - Invalid query: SELECT *
FROM `dokter`
ERROR - 2020-07-10 11:13:18 --> Query error: Table 'db_rs_open_dev.group_barang' doesn't exist - Invalid query: SELECT *
FROM `group_barang`
ERROR - 2020-07-10 11:20:43 --> Query error: Table 'db_rs_open_dev.lokasi' doesn't exist - Invalid query: SELECT a.KDLOKASI,b.NMLOKASI,c.NMPELAYANAN FROM penjualan a 
        LEFT JOIN lokasi b ON a.KDLOKASI=b.KDLOKASI
        LEFT JOIN pelayanan c ON a.KDPELAYANAN=c.KDPELAYANAN
        WHERE a.KDLOKASI = '1' AND a.KDPELAYANAN = 'GD'
        AND (DATE_FORMAT(a.TGLRESEP,'%Y-%m-%d') BETWEEN '2020-07-10' AND '2020-07-10') 
        GROUP BY a.KDLOKASI
ERROR - 2020-07-10 11:21:08 --> Query error: Table 'db_rs_open_dev.lokasi' doesn't exist - Invalid query: SELECT *
FROM `lokasi`
ERROR - 2020-07-10 11:22:00 --> Query error: Table 'db_rs_open_dev.lokasi' doesn't exist - Invalid query: SELECT *
FROM `lokasi`
ERROR - 2020-07-10 11:22:42 --> Severity: error --> Exception: Call to undefined function get_breadcrumb() D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_periode_detail_penjualan.php 70
ERROR - 2020-07-10 11:24:57 --> Severity: Notice --> Undefined variable: datpelayanan D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_periode_detail_penjualan.php 37
ERROR - 2020-07-10 11:24:57 --> Severity: error --> Exception: Call to a member function result_array() on null D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_periode_detail_penjualan.php 37
