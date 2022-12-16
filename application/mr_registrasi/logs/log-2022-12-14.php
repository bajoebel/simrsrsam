<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-12-14 00:56:59 --> Severity: error --> Exception: Too few arguments to function CI_DB_query_builder::join(), 1 passed in C:\laragon\www\simrs_reg_v4\application\mr_registrasi\controllers\Registrasi.php on line 819 and at least 2 expected C:\laragon\www\simrs_reg_v4\system\database\DB_query_builder.php 526
ERROR - 2022-12-14 00:57:08 --> Severity: error --> Exception: Too few arguments to function CI_DB_query_builder::join(), 1 passed in C:\laragon\www\simrs_reg_v4\application\mr_registrasi\controllers\Registrasi.php on line 819 and at least 2 expected C:\laragon\www\simrs_reg_v4\system\database\DB_query_builder.php 526
ERROR - 2022-12-14 00:57:30 --> Severity: error --> Exception: Too few arguments to function CI_DB_query_builder::join(), 1 passed in C:\laragon\www\simrs_reg_v4\application\mr_registrasi\controllers\Registrasi.php on line 819 and at least 2 expected C:\laragon\www\simrs_reg_v4\system\database\DB_query_builder.php 526
ERROR - 2022-12-14 08:19:02 --> Severity: error --> Exception: syntax error, unexpected '}' C:\laragon\www\simrs_reg_v4\application\mr_registrasi\controllers\Registrasi.php 881
ERROR - 2022-12-14 08:19:20 --> Severity: error --> Exception: Call to undefined function alert() C:\laragon\www\simrs_reg_v4\application\mr_registrasi\controllers\Registrasi.php 880
ERROR - 2022-12-14 08:19:23 --> Severity: error --> Exception: Call to undefined function alert() C:\laragon\www\simrs_reg_v4\application\mr_registrasi\controllers\Registrasi.php 880
ERROR - 2022-12-14 08:19:29 --> Severity: error --> Exception: Call to undefined function alert() C:\laragon\www\simrs_reg_v4\application\mr_registrasi\controllers\Registrasi.php 880
ERROR - 2022-12-14 08:35:18 --> Query error: Unknown column 'c.id_pendaftaranonline' in 'on clause' - Invalid query: SELECT `a`.*, `b`.*, `a`.`idx`, `c`.`idx` as `terdaftar`
FROM `tbl02_pendaftaran_atm` `a`
LEFT JOIN `tbl02_antrianv2` `b` ON `a`.`idx`=`b`.`id_pendaftaranonline`
LEFT JOIN `tbl02_pendaftaran` `c` ON `a`.`idx`=`c`.`id_pendaftaranonline`
WHERE DATE_FORMAT(a.tgl_masuk,'%Y-%m-%d') = '2022-12-14'
AND   (
`a`.`nomr` LIKE '%%' ESCAPE '!'
OR  `a`.`no_ktp` LIKE '%%' ESCAPE '!'
OR  `a`.`nama_pasien` LIKE '%%' ESCAPE '!'
OR  `a`.`tempat_lahir` LIKE '%%' ESCAPE '!'
OR  `a`.`tgl_lahir` LIKE '%%' ESCAPE '!'
OR  `a`.`nama_ruang` LIKE '%%' ESCAPE '!'
OR  `a`.`namaDokterJaga` LIKE '%%' ESCAPE '!'
 )
 LIMIT 10
ERROR - 2022-12-14 08:35:43 --> Severity: error --> Exception: Call to undefined method Dpo_model::getDataDpo() C:\laragon\www\simrs_reg_v4\application\mr_registrasi\controllers\Dpo.php 43
ERROR - 2022-12-14 08:41:47 --> Query error: Unknown column 'c.id_pendaftaranonline' in 'on clause' - Invalid query: SELECT `a`.*, `b`.*, `a`.`idx`, `c`.`idx` as `terdaftar`
FROM `tbl02_pendaftaran_atm` `a`
LEFT JOIN `tbl02_antrianv2` `b` ON `a`.`idx`=`b`.`id_pendaftaranonline`
LEFT JOIN `tbl02_pendaftaran` `c` ON `a`.`idx`=`c`.`id_pendaftaranonline`
WHERE DATE_FORMAT(a.tgl_masuk,'%Y-%m-%d') = '2022-12-14'
AND   (
`a`.`nomr` LIKE '%%' ESCAPE '!'
OR  `a`.`no_ktp` LIKE '%%' ESCAPE '!'
OR  `a`.`nama_pasien` LIKE '%%' ESCAPE '!'
OR  `a`.`tempat_lahir` LIKE '%%' ESCAPE '!'
OR  `a`.`tgl_lahir` LIKE '%%' ESCAPE '!'
OR  `a`.`nama_ruang` LIKE '%%' ESCAPE '!'
OR  `a`.`namaDokterJaga` LIKE '%%' ESCAPE '!'
 )
 LIMIT 10
ERROR - 2022-12-14 08:41:48 --> Query error: Unknown column 'c.id_pendaftaranonline' in 'on clause' - Invalid query: SELECT `a`.*, `b`.*, `a`.`idx`, `c`.`idx` as `terdaftar`
FROM `tbl02_pendaftaran_atm` `a`
LEFT JOIN `tbl02_antrianv2` `b` ON `a`.`idx`=`b`.`id_pendaftaranonline`
LEFT JOIN `tbl02_pendaftaran` `c` ON `a`.`idx`=`c`.`id_pendaftaranonline`
WHERE DATE_FORMAT(a.tgl_masuk,'%Y-%m-%d') = '2022-12-14'
AND   (
`a`.`nomr` LIKE '%%' ESCAPE '!'
OR  `a`.`no_ktp` LIKE '%%' ESCAPE '!'
OR  `a`.`nama_pasien` LIKE '%%' ESCAPE '!'
OR  `a`.`tempat_lahir` LIKE '%%' ESCAPE '!'
OR  `a`.`tgl_lahir` LIKE '%%' ESCAPE '!'
OR  `a`.`nama_ruang` LIKE '%%' ESCAPE '!'
OR  `a`.`namaDokterJaga` LIKE '%%' ESCAPE '!'
 )
 LIMIT 10
ERROR - 2022-12-14 08:42:11 --> Query error: Unknown column 'c.id_pendaftaranonline' in 'on clause' - Invalid query: SELECT `a`.*, `b`.*, `a`.`idx`, `c`.`idx` as `terdaftar`
FROM `tbl02_pendaftaran_atm` `a`
LEFT JOIN `tbl02_antrianv2` `b` ON `a`.`idx`=`b`.`id_pendaftaranonline`
LEFT JOIN `tbl02_pendaftaran` `c` ON `a`.`idx`=`c`.`id_pendaftaranonline`
WHERE DATE_FORMAT(a.tgl_masuk,'%Y-%m-%d') = '2022-12-14'
AND   (
`a`.`nomr` LIKE '%%' ESCAPE '!'
OR  `a`.`no_ktp` LIKE '%%' ESCAPE '!'
OR  `a`.`nama_pasien` LIKE '%%' ESCAPE '!'
OR  `a`.`tempat_lahir` LIKE '%%' ESCAPE '!'
OR  `a`.`tgl_lahir` LIKE '%%' ESCAPE '!'
OR  `a`.`nama_ruang` LIKE '%%' ESCAPE '!'
OR  `a`.`namaDokterJaga` LIKE '%%' ESCAPE '!'
 )
 LIMIT 10
ERROR - 2022-12-14 08:42:23 --> Query error: Unknown column 'c.id_pendaftaranonline' in 'on clause' - Invalid query: SELECT `a`.*, `b`.*, `a`.`idx`, `c`.`idx` as `terdaftar`
FROM `tbl02_pendaftaran_atm` `a`
LEFT JOIN `tbl02_antrianv2` `b` ON `a`.`idx`=`b`.`id_pendaftaranonline`
LEFT JOIN `tbl02_pendaftaran` `c` ON `a`.`idx`=`c`.`id_pendaftaranonline`
WHERE DATE_FORMAT(a.tgl_masuk,'%Y-%m-%d') = '2022-12-14'
AND   (
`a`.`nomr` LIKE '%%' ESCAPE '!'
OR  `a`.`no_ktp` LIKE '%%' ESCAPE '!'
OR  `a`.`nama_pasien` LIKE '%%' ESCAPE '!'
OR  `a`.`tempat_lahir` LIKE '%%' ESCAPE '!'
OR  `a`.`tgl_lahir` LIKE '%%' ESCAPE '!'
OR  `a`.`nama_ruang` LIKE '%%' ESCAPE '!'
OR  `a`.`namaDokterJaga` LIKE '%%' ESCAPE '!'
 )
 LIMIT 10
