<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-01-14 09:28:09 --> Severity: Error --> Maximum execution time of 30 seconds exceeded C:\xampp\htdocs\simrs\application\mr_registrasi\models\Pendaftaran_model.php 226
ERROR - 2022-01-14 02:29:51 --> Severity: Error --> Maximum execution time of 30 seconds exceeded C:\xampp\htdocs\simrs\application\mr_registrasi\models\Vclaim_model.php 10
ERROR - 2022-01-14 10:52:11 --> Query error: Table 'db_simrs_v2.tbl02_pendaftaran1' doesn't exist - Invalid query: SELECT *
FROM `tbl02_pendaftaran1`
WHERE `jns_layanan` = 'RI'
AND `tgl_masuk` > '2021-02-11'
AND `reg_unit` NOT IN (SELECT reg_unit FROM tbl02_pindah_ranap WHERE ruang_pengirim != id_ruang)
AND `reg_unit` NOT IN (SELECT reg_unit FROM tbl02_pendaftaran_batal)
AND `reg_unit` NOT IN (SELECT reg_unit FROM tbl02_pasien_pulang)
AND   (
`nomr` LIKE '%083%' ESCAPE '!'
OR  `reg_unit` LIKE '%083%' ESCAPE '!'
OR  `id_daftar` LIKE '%083%' ESCAPE '!'
OR  `nama_pasien` LIKE '%083%' ESCAPE '!'
OR  `nama_ruang` LIKE '%083%' ESCAPE '!'
OR  `nama_kamar` LIKE '%083%' ESCAPE '!'
 )
ERROR - 2022-01-14 04:24:41 --> Severity: Notice --> Undefined variable: idx C:\xampp\htdocs\simrs\application\mr_registrasi\views\vclaim\detail.php 365
ERROR - 2022-01-14 07:29:59 --> Severity: Notice --> Undefined variable: idx C:\xampp\htdocs\simrs\application\mr_registrasi\views\vclaim\detail.php 365
ERROR - 2022-01-14 07:31:03 --> Severity: Notice --> Undefined variable: idx C:\xampp\htdocs\simrs\application\mr_registrasi\views\vclaim\detail.php 365
ERROR - 2022-01-14 09:32:37 --> Severity: Error --> Maximum execution time of 30 seconds exceeded C:\xampp\htdocs\simrs\application\mr_registrasi\models\Vclaim_model.php 10
