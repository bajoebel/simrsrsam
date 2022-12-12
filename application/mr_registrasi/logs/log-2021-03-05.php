<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-03-05 04:00:51 --> Query error: Table 'db_simrs_v2.tbl02_pendaftaran1' doesn't exist - Invalid query: SELECT *
FROM `tbl02_pendaftaran1`
WHERE `jns_layanan` = 'RI'
AND  `nomr` LIKE '%%' ESCAPE '!'
OR  `reg_unit` LIKE '%%' ESCAPE '!'
OR  `id_daftar` LIKE '%%' ESCAPE '!'
OR  `nama_pasien` LIKE '%%' ESCAPE '!'
 LIMIT 15
ERROR - 2021-03-05 10:50:15 --> Severity: Warning --> Missing argument 1 for registrasi::carabayar() C:\xampp32\htdocs\simrs\application\mr_registrasi\controllers\Registrasi.php 2403
ERROR - 2021-03-05 10:50:15 --> Severity: Notice --> Undefined variable: id C:\xampp32\htdocs\simrs\application\mr_registrasi\controllers\Registrasi.php 2407
