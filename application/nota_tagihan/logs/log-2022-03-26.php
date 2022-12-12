<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-03-26 20:15:41 --> Severity: Error --> Maximum execution time of 30 seconds exceeded C:\xampp\htdocs\rsam\application\nota_tagihan\models\Smart_model.php 32
ERROR - 2022-03-26 20:15:41 --> Severity: Error --> Maximum execution time of 30 seconds exceeded C:\xampp\htdocs\rsam\system\libraries\Session\drivers\Session_files_driver.php 180
ERROR - 2022-03-26 20:15:41 --> Severity: Warning --> Unknown: Cannot call session save handler in a recursive manner Unknown 0
ERROR - 2022-03-26 20:15:41 --> Severity: Warning --> Unknown: Failed to write session data using user defined save handler. (session.save_path: C:\xampp\tmp) Unknown 0
ERROR - 2022-03-26 20:15:45 --> Severity: Notice --> Trying to get property 'response' of non-object C:\xampp\htdocs\rsam\application\nota_tagihan\controllers\Dashboard.php 24
ERROR - 2022-03-26 20:15:45 --> Severity: Notice --> Trying to get property 'token' of non-object C:\xampp\htdocs\rsam\application\nota_tagihan\controllers\Dashboard.php 24
ERROR - 2022-03-26 20:15:49 --> Severity: Notice --> Trying to get property 'response' of non-object C:\xampp\htdocs\rsam\application\nota_tagihan\controllers\Dashboard.php 24
ERROR - 2022-03-26 20:15:49 --> Severity: Notice --> Trying to get property 'token' of non-object C:\xampp\htdocs\rsam\application\nota_tagihan\controllers\Dashboard.php 24
ERROR - 2022-03-26 20:16:09 --> Query error: Table 'db_rsam.tbl05_kwitansi' doesn't exist - Invalid query: SELECT * FROM tbl05_kwitansi WHERE tbl05_kwitansi.no_kwitansi NOT IN (SELECT no_kwitansi FROM tbl05_kwitansi_retur) AND id_daftar='2022000016'
ERROR - 2022-03-26 20:17:28 --> Query error: Table 'db_rsam.tbl05_kwitansi_retur' doesn't exist - Invalid query: SELECT * FROM tbl05_kwitansi WHERE tbl05_kwitansi.no_kwitansi NOT IN (SELECT no_kwitansi FROM tbl05_kwitansi_retur) AND id_daftar='2022000016'
ERROR - 2022-03-26 20:18:19 --> Query error: Table 'db_rsam.tbl03_diagnosa' doesn't exist - Invalid query: SELECT *
FROM `tbl03_diagnosa`
WHERE `idx_pendaftaran` = '18'
