<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-03-25 06:04:27 --> Severity: Notice --> Trying to get property 'pasien' of non-object C:\xampp\htdocs\rsam\application\mr_registrasi\controllers\Online.php 118
ERROR - 2022-03-25 06:04:27 --> Severity: Notice --> Trying to get property 'jmldata' of non-object C:\xampp\htdocs\rsam\application\mr_registrasi\controllers\Online.php 119
ERROR - 2022-03-25 06:04:27 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\rsam\application\mr_registrasi\views\registrasi\v_data_pendaftaran_online.php 3
ERROR - 2022-03-25 06:04:27 --> Severity: Notice --> Trying to get property 'jmldata' of non-object C:\xampp\htdocs\rsam\application\mr_registrasi\controllers\Online.php 125
ERROR - 2022-03-25 20:23:12 --> Severity: Error --> Maximum execution time of 30 seconds exceeded C:\xampp\htdocs\rsam\system\libraries\Session\drivers\Session_files_driver.php 180
ERROR - 2022-03-25 20:23:12 --> Severity: Warning --> Unknown: Cannot call session save handler in a recursive manner Unknown 0
ERROR - 2022-03-25 20:23:12 --> Severity: Warning --> Unknown: Failed to write session data using user defined save handler. (session.save_path: C:\xampp\tmp) Unknown 0
ERROR - 2022-03-25 13:35:01 --> Severity: Notice --> Undefined variable: idx C:\xampp\htdocs\rsam\application\mr_registrasi\views\vclaim\detail.php 386
ERROR - 2022-03-25 21:00:49 --> Query error: Table 'db_rsam.tbl07_report_sirs' doesn't exist - Invalid query: SELECT *
FROM `tbl07_report_sirs`
WHERE `reg_unit` = 'RJ-220325-10-0003'
ERROR - 2022-03-25 21:05:16 --> Query error: Table 'db_rsam.tbl07_report_sirs_diagnosa' doesn't exist - Invalid query: INSERT INTO `tbl07_report_sirs_diagnosa` (`icd`, `id_daftar`, `jenis_diagnosa`, `kode_icd`, `reg_unit`) VALUES ('Cholera, unspecified','2022000016','Primer','A00.9','RJ-220325-10-0003'), ('Disseminated herpesviral disease','2022000016','Sekunder','B00.7','RJ-220325-10-0003')
ERROR - 2022-03-25 21:07:57 --> Query error: Table 'db_rsam.view_bedterisi' doesn't exist - Invalid query: SELECT `a`.`id_kamar`, `a`.`nama_kamar`, `a`.`id_ruang`, `a`.`nama_ruang`, `a`.`jml_tt`, IFNULL(b.terisi_lk, 0) AS terisi_lk, IFNULL(b.terisi_pr, 0) AS terisi_pr
FROM `tbl01_kamar` `a`
LEFT JOIN `view_bedterisi` `b` ON a.`id_kamar`=b.`id_kamar`
WHERE `a`.`id_ruang` = '62'
AND `a`.`status_kamar` = 1
AND   (
`a`.`kelas_id` = '3'
OR `a`.`kelas_id` = '0'
 )
ORDER BY `indexs`, `id_kamar`
ERROR - 2022-03-25 21:08:02 --> Query error: Table 'db_rsam.view_bedterisi' doesn't exist - Invalid query: SELECT `a`.`id_kamar`, `a`.`nama_kamar`, `a`.`id_ruang`, `a`.`nama_ruang`, `a`.`jml_tt`, IFNULL(b.terisi_lk, 0) AS terisi_lk, IFNULL(b.terisi_pr, 0) AS terisi_pr
FROM `tbl01_kamar` `a`
LEFT JOIN `view_bedterisi` `b` ON a.`id_kamar`=b.`id_kamar`
WHERE `a`.`id_ruang` = '66'
AND `a`.`status_kamar` = 1
AND   (
`a`.`kelas_id` = '3'
OR `a`.`kelas_id` = '0'
 )
ORDER BY `indexs`, `id_kamar`
ERROR - 2022-03-25 21:08:09 --> Query error: Table 'db_rsam.view_bedterisi' doesn't exist - Invalid query: SELECT `a`.`id_kamar`, `a`.`nama_kamar`, `a`.`id_ruang`, `a`.`nama_ruang`, `a`.`jml_tt`, IFNULL(b.terisi_lk, 0) AS terisi_lk, IFNULL(b.terisi_pr, 0) AS terisi_pr
FROM `tbl01_kamar` `a`
LEFT JOIN `view_bedterisi` `b` ON a.`id_kamar`=b.`id_kamar`
WHERE `a`.`id_ruang` = '61'
AND `a`.`status_kamar` = 1
AND   (
`a`.`kelas_id` = '3'
OR `a`.`kelas_id` = '0'
 )
ORDER BY `indexs`, `id_kamar`
ERROR - 2022-03-25 21:08:12 --> Query error: Table 'db_rsam.view_bedterisi' doesn't exist - Invalid query: SELECT `a`.`id_kamar`, `a`.`nama_kamar`, `a`.`id_ruang`, `a`.`nama_ruang`, `a`.`jml_tt`, IFNULL(b.terisi_lk, 0) AS terisi_lk, IFNULL(b.terisi_pr, 0) AS terisi_pr
FROM `tbl01_kamar` `a`
LEFT JOIN `view_bedterisi` `b` ON a.`id_kamar`=b.`id_kamar`
WHERE `a`.`id_ruang` = '62'
AND `a`.`status_kamar` = 1
AND   (
`a`.`kelas_id` = '3'
OR `a`.`kelas_id` = '0'
 )
ORDER BY `indexs`, `id_kamar`
ERROR - 2022-03-25 21:08:55 --> Query error: Table 'db_rsam.view_bedterisi' doesn't exist - Invalid query: SELECT `a`.`id_kamar`, `a`.`nama_kamar`, `a`.`id_ruang`, `a`.`nama_ruang`, `a`.`jml_tt`, IFNULL(b.terisi_lk, 0) AS terisi_lk, IFNULL(b.terisi_pr, 0) AS terisi_pr
FROM `tbl01_kamar` `a`
LEFT JOIN `view_bedterisi` `b` ON a.`id_kamar`=b.`id_kamar`
WHERE `a`.`id_ruang` = '66'
AND `a`.`status_kamar` = 1
AND   (
`a`.`kelas_id` = '3'
OR `a`.`kelas_id` = '0'
 )
ORDER BY `indexs`, `id_kamar`
ERROR - 2022-03-25 21:09:04 --> Query error: Table 'db_rsam.view_bedterisi' doesn't exist - Invalid query: SELECT `a`.`id_kamar`, `a`.`nama_kamar`, `a`.`id_ruang`, `a`.`nama_ruang`, `a`.`jml_tt`, IFNULL(b.terisi_lk, 0) AS terisi_lk, IFNULL(b.terisi_pr, 0) AS terisi_pr
FROM `tbl01_kamar` `a`
LEFT JOIN `view_bedterisi` `b` ON a.`id_kamar`=b.`id_kamar`
WHERE `a`.`id_ruang` = '62'
AND `a`.`status_kamar` = 1
AND   (
`a`.`kelas_id` = '3'
OR `a`.`kelas_id` = '0'
 )
ORDER BY `indexs`, `id_kamar`
ERROR - 2022-03-25 14:16:57 --> Severity: Notice --> Trying to get property 'metaData' of non-object C:\xampp\htdocs\rsam\application\mr_registrasi\controllers\vclaim\Sep.php 212
ERROR - 2022-03-25 14:16:57 --> Severity: Notice --> Trying to get property 'code' of non-object C:\xampp\htdocs\rsam\application\mr_registrasi\controllers\vclaim\Sep.php 212
ERROR - 2022-03-25 14:50:36 --> Severity: Notice --> Undefined variable: idx C:\xampp\htdocs\rsam\application\mr_registrasi\views\vclaim\detail.php 386
ERROR - 2022-03-25 21:54:51 --> Severity: Notice --> Undefined variable: data C:\xampp\htdocs\rsam\application\mr_registrasi\controllers\vclaim\Rencanakontrol.php 388
ERROR - 2022-03-25 15:02:23 --> Severity: Error --> Maximum execution time of 30 seconds exceeded C:\xampp\htdocs\rsam\application\mr_registrasi\models\Vclaim_model.php 10
ERROR - 2022-03-25 15:02:59 --> Severity: Error --> Maximum execution time of 30 seconds exceeded C:\xampp\htdocs\rsam\application\mr_registrasi\models\Vclaim_model.php 10
ERROR - 2022-03-25 15:19:07 --> Severity: Notice --> Undefined variable: idx C:\xampp\htdocs\rsam\application\mr_registrasi\views\vclaim\detail.php 386
ERROR - 2022-03-25 22:19:48 --> Severity: Notice --> Undefined variable: data C:\xampp\htdocs\rsam\application\mr_registrasi\controllers\vclaim\Rencanakontrol.php 388
ERROR - 2022-03-25 16:31:14 --> Severity: Notice --> Undefined variable: idx C:\xampp\htdocs\rsam\application\mr_registrasi\views\vclaim\detail.php 386
ERROR - 2022-03-25 16:32:39 --> Severity: Notice --> Undefined variable: idx C:\xampp\htdocs\rsam\application\mr_registrasi\views\vclaim\detail.php 386
