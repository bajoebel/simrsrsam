<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2020-09-11 05:07:46 --> Severity: error --> Exception: Unable to locate the model you have specified: Pemakaian_model D:\xampp\htdocs\simrs_open_source\system\core\Loader.php 348
ERROR - 2020-09-11 06:19:25 --> Severity: Notice --> Undefined variable: pulang D:\xampp\htdocs\simrs_open_source\application\farmasi\views\pemakaian\view_detail_pasien.php 174
ERROR - 2020-09-11 09:09:09 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '\'NRP1910460\')' at line 4 - Invalid query: SELECT *
FROM `tbl01_lokasi`
WHERE KDLOKASI IN (SELECT ruang_akses 
            FROM tbl01_users_farmasi WHERE NRP = \'NRP1910460\')
ERROR - 2020-09-11 09:09:52 --> Query error: Table 'db_simrs_v2.tbl01_lokasi' doesn't exist - Invalid query: SELECT *
FROM `tbl01_lokasi`
WHERE KDLOKASI IN (SELECT ruang_akses 
            FROM tbl01_users_farmasi WHERE NRP = 'NRP1910460')
ERROR - 2020-09-11 09:11:26 --> Severity: error --> Exception: syntax error, unexpected '$this' (T_VARIABLE) D:\xampp\htdocs\simrs_open_source\application\farmasi\models\pemakaian_model.php 49
