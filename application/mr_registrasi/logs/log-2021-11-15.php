<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-11-15 06:51:38 --> Severity: Notice --> Undefined property: stdClass::$rawatgabung_lk C:\xampp\htdocs\simrs\application\mr_registrasi\models\Pendaftaran_model.php 235
ERROR - 2021-11-15 06:51:38 --> Severity: Notice --> Undefined property: stdClass::$rawatgabung_pr C:\xampp\htdocs\simrs\application\mr_registrasi\models\Pendaftaran_model.php 236
ERROR - 2021-11-15 06:52:16 --> Severity: Notice --> Undefined property: stdClass::$rawatgabung_lk C:\xampp\htdocs\simrs\application\mr_registrasi\models\Pendaftaran_model.php 235
ERROR - 2021-11-15 06:52:16 --> Severity: Notice --> Undefined property: stdClass::$rawatgabung_pr C:\xampp\htdocs\simrs\application\mr_registrasi\models\Pendaftaran_model.php 236
ERROR - 2021-11-15 06:53:59 --> Severity: Notice --> Undefined property: stdClass::$rawatgabung_lk C:\xampp\htdocs\simrs\application\mr_registrasi\models\Pendaftaran_model.php 235
ERROR - 2021-11-15 06:53:59 --> Severity: Notice --> Undefined property: stdClass::$rawatgabung_pr C:\xampp\htdocs\simrs\application\mr_registrasi\models\Pendaftaran_model.php 236
ERROR - 2021-11-15 06:54:23 --> Severity: Notice --> Undefined property: stdClass::$rawatgabung_lk C:\xampp\htdocs\simrs\application\mr_registrasi\models\Pendaftaran_model.php 235
ERROR - 2021-11-15 06:54:23 --> Severity: Notice --> Undefined property: stdClass::$rawatgabung_pr C:\xampp\htdocs\simrs\application\mr_registrasi\models\Pendaftaran_model.php 236
ERROR - 2021-11-15 07:13:34 --> Severity: error --> Exception: Too few arguments to function registrasi::carabayar(), 0 passed in C:\xampp\htdocs\simrs\system\core\CodeIgniter.php on line 532 and exactly 1 expected C:\xampp\htdocs\simrs\application\mr_registrasi\controllers\Registrasi.php 2664
ERROR - 2021-11-15 07:15:24 --> Severity: error --> Exception: Too few arguments to function registrasi::carabayar(), 0 passed in C:\xampp\htdocs\simrs\system\core\CodeIgniter.php on line 532 and exactly 1 expected C:\xampp\htdocs\simrs\application\mr_registrasi\controllers\Registrasi.php 2664
ERROR - 2021-11-15 07:15:26 --> Severity: error --> Exception: Too few arguments to function registrasi::carabayar(), 0 passed in C:\xampp\htdocs\simrs\system\core\CodeIgniter.php on line 532 and exactly 1 expected C:\xampp\htdocs\simrs\application\mr_registrasi\controllers\Registrasi.php 2664
ERROR - 2021-11-15 07:18:34 --> Severity: error --> Exception: Too few arguments to function registrasi::carabayar(), 0 passed in C:\xampp\htdocs\simrs\system\core\CodeIgniter.php on line 532 and exactly 1 expected C:\xampp\htdocs\simrs\application\mr_registrasi\controllers\Registrasi.php 2664
ERROR - 2021-11-15 07:21:03 --> Query error: Table 'db_simrs_v2.tbl02_pendaftaran1' doesn't exist - Invalid query: SELECT `tbl02_pendaftaran`.`nomr`, `tbl02_pendaftaran`.`id_daftar`, COUNT(tbl02_pasien_pulang.idx) AS status_pulang
FROM `tbl02_pendaftaran1`
LEFT JOIN `tbl02_pasien_pulang` ON `tbl02_pendaftaran`.`reg_unit`=`tbl02_pasien_pulang`.`reg_unit`
WHERE `tbl02_pendaftaran`.`jns_layanan` = 'RI'
AND `tbl02_pendaftaran`.`nomr` = '411905'
AND `tbl02_pendaftaran`.`tgl_masuk` > '2021-02-11'
AND `tbl02_pendaftaran`.`reg_unit` NOT IN (SELECT tbl02_pendaftaran_batal.reg_unit FROM tbl02_pendaftaran_batal)
ORDER BY `tbl02_pendaftaran`.`id_daftar` DESC
 LIMIT 1
ERROR - 2021-11-15 07:55:44 --> Query error: Table 'db_simrs_v2.tbl02_pendaftaran1' doesn't exist - Invalid query: SELECT `a`.`nomr`, `a`.`id_daftar`, `a`.`reg_unit`, `b`.`idx`, `b`.`jns_layanan`
FROM `tbl02_pendaftaran1` `a`
LEFT JOIN `tbl02_pasien_pulang` `b` ON `a`.`id_daftar` = `b`.`id_daftar` AND `a`.`jns_layanan`=`b`.`jns_layanan`
WHERE `a`.`jns_layanan` = 'RI'
AND `a`.`nomr` = '411905'
AND `a`.`tgl_masuk` > '2021-02-11'
AND `a`.`reg_unit` NOT IN (SELECT c.reg_unit FROM tbl02_pendaftaran_batal c)
ERROR - 2021-11-15 07:57:47 --> Query error: Unknown column 'a.id_daftar1' in 'order clause' - Invalid query: SELECT `a`.`nomr`, `a`.`id_daftar`, `a`.`reg_unit`, `b`.`idx`, `b`.`jns_layanan`
FROM `tbl02_pendaftaran` `a`
LEFT JOIN `tbl02_pasien_pulang` `b` ON `a`.`id_daftar` = `b`.`id_daftar` AND `a`.`jns_layanan`=`b`.`jns_layanan`
WHERE `a`.`jns_layanan` = 'RI'
AND `a`.`nomr` = '411905'
AND `a`.`tgl_masuk` > '2021-02-11'
AND `a`.`reg_unit` NOT IN (SELECT c.reg_unit FROM tbl02_pendaftaran_batal c)
ORDER BY `a`.`id_daftar1` DESC
 LIMIT 1
ERROR - 2021-11-15 08:05:22 --> Query error: Column 'nama_ruang' in field list is ambiguous - Invalid query: SELECT `a`.`nomr`, `a`.`id_daftar`, `a`.`reg_unit`, `b`.`idx`, `b`.`jns_layanan`, `nama_ruang`
FROM `tbl02_pendaftaran` `a`
LEFT JOIN `tbl02_pasien_pulang` `b` ON `a`.`id_daftar` = `b`.`id_daftar` AND `a`.`jns_layanan`=`b`.`jns_layanan`
WHERE `a`.`jns_layanan` = 'RI'
AND `a`.`nomr` = '411905'
AND `a`.`tgl_masuk` > '2021-02-11'
AND `a`.`reg_unit` NOT IN (SELECT c.reg_unit FROM tbl02_pendaftaran_batal c)
ORDER BY `a`.`id_daftar` DESC
 LIMIT 1
ERROR - 2021-11-15 08:06:41 --> Severity: error --> Exception: Too few arguments to function registrasi::carabayar(), 0 passed in C:\xampp\htdocs\simrs\system\core\CodeIgniter.php on line 532 and exactly 1 expected C:\xampp\htdocs\simrs\application\mr_registrasi\controllers\Registrasi.php 2678
ERROR - 2021-11-15 08:08:17 --> Severity: error --> Exception: Too few arguments to function registrasi::carabayar(), 0 passed in C:\xampp\htdocs\simrs\system\core\CodeIgniter.php on line 532 and exactly 1 expected C:\xampp\htdocs\simrs\application\mr_registrasi\controllers\Registrasi.php 2687
ERROR - 2021-11-15 08:15:11 --> Severity: Notice --> Trying to get property 'nama_ruang' of non-object C:\xampp\htdocs\simrs\application\mr_registrasi\controllers\Registrasi.php 239
ERROR - 2021-11-15 08:15:55 --> Query error: Table 'db_simrs_v2.tbl02_pendaftaran1' doesn't exist - Invalid query: SELECT `a`.`nomr`, `a`.`id_daftar`, `a`.`reg_unit`, `b`.`idx`, `b`.`jns_layanan`, `a`.`nama_ruang`
FROM `tbl02_pendaftaran1` `a`
LEFT JOIN `tbl02_pasien_pulang` `b` ON `a`.`id_daftar` = `b`.`id_daftar` AND `a`.`jns_layanan`=`b`.`jns_layanan`
WHERE `a`.`jns_layanan` = 'RI'
AND `a`.`nomr` = '303002'
AND `a`.`tgl_masuk` > '2021-02-11'
AND `a`.`reg_unit` NOT IN (SELECT c.reg_unit FROM tbl02_pendaftaran_batal c)
ORDER BY `a`.`id_daftar` DESC
 LIMIT 1
ERROR - 2021-11-15 08:19:13 --> Severity: Notice --> Trying to get property 'nama_ruang' of non-object C:\xampp\htdocs\simrs\application\mr_registrasi\controllers\Registrasi.php 2267
ERROR - 2021-11-15 08:19:13 --> Severity: error --> Exception: Too few arguments to function registrasi::carabayar(), 0 passed in C:\xampp\htdocs\simrs\system\core\CodeIgniter.php on line 532 and exactly 1 expected C:\xampp\htdocs\simrs\application\mr_registrasi\controllers\Registrasi.php 2680
ERROR - 2021-11-15 08:19:41 --> Severity: error --> Exception: Too few arguments to function registrasi::carabayar(), 0 passed in C:\xampp\htdocs\simrs\system\core\CodeIgniter.php on line 532 and exactly 1 expected C:\xampp\htdocs\simrs\application\mr_registrasi\controllers\Registrasi.php 2684
