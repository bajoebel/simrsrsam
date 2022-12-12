<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2020-06-02 05:20:49 --> Severity: error --> Exception: Too few arguments to function nota_tagihan::getTarif(), 0 passed in D:\xampp\htdocs\simrs_open_source\system\core\CodeIgniter.php on line 532 and exactly 1 expected D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\nota_tagihan.php 1492
ERROR - 2020-06-02 05:21:58 --> Severity: error --> Exception: Too few arguments to function nota_tagihan::getTarif(), 0 passed in D:\xampp\htdocs\simrs_open_source\system\core\CodeIgniter.php on line 532 and exactly 1 expected D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\nota_tagihan.php 1492
ERROR - 2020-06-02 05:24:38 --> Severity: error --> Exception: Too few arguments to function nota_tagihan::getTarif(), 0 passed in D:\xampp\htdocs\simrs_open_source\system\core\CodeIgniter.php on line 532 and exactly 1 expected D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\nota_tagihan.php 1492
ERROR - 2020-06-02 05:25:04 --> Severity: error --> Exception: Too few arguments to function nota_tagihan::datatarif(), 0 passed in D:\xampp\htdocs\simrs_open_source\system\core\CodeIgniter.php on line 532 and exactly 1 expected D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\nota_tagihan.php 1492
ERROR - 2020-06-02 05:25:10 --> Severity: Notice --> Undefined property: nota_tagihan::$limit D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\nota_tagihan.php 1501
ERROR - 2020-06-02 05:25:10 --> Severity: Notice --> Undefined property: nota_tagihan::$limit D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\nota_tagihan.php 1503
ERROR - 2020-06-02 05:25:18 --> Severity: error --> Exception: Too few arguments to function nota_tagihan::datatarif(), 0 passed in D:\xampp\htdocs\simrs_open_source\system\core\CodeIgniter.php on line 532 and exactly 1 expected D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\nota_tagihan.php 1492
ERROR - 2020-06-02 05:25:29 --> Severity: Notice --> Undefined property: nota_tagihan::$limit D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\nota_tagihan.php 1501
ERROR - 2020-06-02 05:25:29 --> Severity: Notice --> Undefined property: nota_tagihan::$limit D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\nota_tagihan.php 1503
ERROR - 2020-06-02 05:25:57 --> Severity: Notice --> Undefined property: nota_tagihan::$limit D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\nota_tagihan.php 1501
ERROR - 2020-06-02 05:25:57 --> Severity: Notice --> Undefined property: nota_tagihan::$limit D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\nota_tagihan.php 1503
ERROR - 2020-06-02 06:18:17 --> Query error: Table 'db_rs_open_dev.tbl01_tarif_ruang1' doesn't exist - Invalid query: SELECT *
FROM `tbl01_tarif_ruang1`
JOIN `tbl01_tarif_layanan` ON `tbl01_tarif_layanan`.`idx`=`tbl01_tarif_ruang`.`idtarif`
WHERE `idruang` = '10'
AND `kelas_id` = '0'
AND   (
`layanan` LIKE '%cir%' ESCAPE '!'
AND  `kategori_tarif` LIKE '%cir%' ESCAPE '!'
 )
ERROR - 2020-06-02 06:19:55 --> Query error: Table 'db_rs_open_dev.tbl01_tarif_ruang1' doesn't exist - Invalid query: SELECT *
FROM `tbl01_tarif_ruang1`
JOIN `tbl01_tarif_layanan` ON `tbl01_tarif_layanan`.`idx`=`tbl01_tarif_ruang`.`idtarif`
WHERE `idruang` = '10'
AND `kelas_id` = '0'
AND   (
`layanan` LIKE '%%' ESCAPE '!'
AND  `kategori_tarif` LIKE '%%' ESCAPE '!'
 )
ERROR - 2020-06-02 06:20:45 --> Query error: Table 'db_rs_open_dev.tbl01_tarif_ruang1' doesn't exist - Invalid query: SELECT *
FROM `tbl01_tarif_ruang1`
JOIN `tbl01_tarif_layanan` ON `tbl01_tarif_layanan`.`idx`=`tbl01_tarif_ruang`.`idtarif`
WHERE `idruang` = '10'
AND `kelas_id` = '0'
AND   (
`layanan` LIKE '%%' ESCAPE '!'
OR  `kategori_tarif` LIKE '%%' ESCAPE '!'
 )
ERROR - 2020-06-02 06:52:12 --> Query error: Unknown column 'id_tarif' in 'on clause' - Invalid query: SELECT *
FROM `tbl02_temp_permintaan_tindakan_penunjang`
JOIN `tbl01_tarif_layanan` ON `id_tarif`=`idx`
WHERE `id_daftar` = '2019091672'
AND `reg_unit` = 'RI-200602-57-0001'
AND   (
`tbl01_tarif_layanan`.`layanan` LIKE '%%' ESCAPE '!'
 )
ERROR - 2020-06-02 06:52:12 --> Query error: Unknown column 'id_tarif' in 'field list' - Invalid query: SELECT id_tarif FROM tbl02_temp_permintaan_tindakan_penunjang WHERE id_daftar='2019091672' AND reg_unit='RI-200602-57-0001'
ERROR - 2020-06-02 06:53:34 --> Query error: Table 'db_rs_open_dev.tbl01_tarif_ruang1' doesn't exist - Invalid query: SELECT *
FROM `tbl01_tarif_ruang1`
JOIN `tbl01_tarif_layanan` ON `tbl01_tarif_layanan`.`idx`=`tbl01_tarif_ruang`.`idtarif`
WHERE `idruang` = '57'
AND `kelas_id` = '0'
AND `kelas_id` = '5'
AND   (
`layanan` LIKE '%%' ESCAPE '!'
OR  `kategori_tarif` LIKE '%%' ESCAPE '!'
 )
ERROR - 2020-06-02 09:21:31 --> Query error: Table 'db_rs_open_dev.tbl01_tarif_ruang1' doesn't exist - Invalid query: SELECT *
FROM `tbl01_tarif_ruang1`
JOIN `tbl01_tarif_layanan` ON `tbl01_tarif_layanan`.`idx`=`tbl01_tarif_ruang`.`idtarif`
WHERE `idruang` = '57'
AND   (
`kelas_id` = '0'
OR `kelas_id` = '5'
 )
AND   (
`layanan` LIKE '%%' ESCAPE '!'
OR  `kategori_tarif` LIKE '%%' ESCAPE '!'
 )
ERROR - 2020-06-02 09:22:46 --> Query error: Table 'db_rs_open_dev.tbl01_tarif_ruang1' doesn't exist - Invalid query: SELECT *
FROM `tbl01_tarif_ruang1`
JOIN `tbl01_tarif_layanan` ON `tbl01_tarif_layanan`.`idx`=`tbl01_tarif_ruang`.`idtarif`
WHERE   (
`idruang` = '0'
AND `idruang` = '57'
 )
AND   (
`kelas_id` = '0'
OR `kelas_id` = '5'
 )
AND   (
`layanan` LIKE '%%' ESCAPE '!'
OR  `kategori_tarif` LIKE '%%' ESCAPE '!'
 )
ERROR - 2020-06-02 09:49:45 --> Severity: Notice --> Undefined variable: thia D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\models\nota_model.php 72
ERROR - 2020-06-02 09:49:45 --> Severity: Notice --> Trying to get property 'db' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\models\nota_model.php 72
ERROR - 2020-06-02 09:49:45 --> Severity: error --> Exception: Call to a member function order_by() on null D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\models\nota_model.php 72
ERROR - 2020-06-02 09:49:47 --> Severity: Notice --> Undefined variable: thia D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\models\nota_model.php 72
ERROR - 2020-06-02 09:49:47 --> Severity: Notice --> Trying to get property 'db' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\models\nota_model.php 72
ERROR - 2020-06-02 09:49:47 --> Severity: error --> Exception: Call to a member function order_by() on null D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\models\nota_model.php 72
ERROR - 2020-06-02 09:49:52 --> Severity: Notice --> Undefined variable: thia D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\models\nota_model.php 72
ERROR - 2020-06-02 09:49:52 --> Severity: Notice --> Trying to get property 'db' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\models\nota_model.php 72
ERROR - 2020-06-02 09:49:52 --> Severity: error --> Exception: Call to a member function order_by() on null D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\models\nota_model.php 72
ERROR - 2020-06-02 09:50:49 --> Query error: Table 'db_rs_open_dev.tbl01_tarif_ruang1' doesn't exist - Invalid query: SELECT *
FROM `tbl01_tarif_ruang1`
JOIN `tbl01_tarif_layanan` ON `tbl01_tarif_layanan`.`idx`=`tbl01_tarif_ruang`.`idtarif`
WHERE   (
`idruang` = '0'
OR `idruang` = '57'
 )
AND   (
`kelas_id` = '0'
OR `kelas_id` = '5'
 )
AND   (
`layanan` LIKE '%%' ESCAPE '!'
OR  `kategori_tarif` LIKE '%%' ESCAPE '!'
 )
ORDER BY FIELD(kelas_id, '1', '2', '3', '4', '5')
ERROR - 2020-06-02 09:53:23 --> Query error: Table 'db_rs_open_dev.tbl01_tarif_ruang1' doesn't exist - Invalid query: SELECT *
FROM `tbl01_tarif_ruang1`
JOIN `tbl01_tarif_layanan` ON `tbl01_tarif_layanan`.`idx`=`tbl01_tarif_ruang`.`idtarif`
WHERE   (
`idruang` = '0'
OR `idruang` = '57'
 )
AND   (
`kelas_id` = '0'
OR `kelas_id` = '5'
 )
AND   (
`layanan` LIKE '%%' ESCAPE '!'
OR  `kategori_tarif` LIKE '%%' ESCAPE '!'
 )
ORDER BY FIELD(kelas_id, '1', '2', '3', '4', '5')
ERROR - 2020-06-02 09:55:54 --> Query error: Table 'db_rs_open_dev.tbl01_tarif_ruang1' doesn't exist - Invalid query: SELECT *
FROM `tbl01_tarif_ruang1`
JOIN `tbl01_tarif_layanan` ON `tbl01_tarif_layanan`.`idx`=`tbl01_tarif_ruang`.`idtarif`
WHERE   (
`idruang` = '0'
OR `idruang` = '57'
 )
AND   (
`kelas_id` = '0'
OR `kelas_id` = '5'
 )
AND   (
`layanan` LIKE '%%' ESCAPE '!'
OR  `kategori_tarif` LIKE '%%' ESCAPE '!'
 )
ORDER BY FIELD(kelas_id, '1', '2', '3', '4', '5')
ERROR - 2020-06-02 10:19:45 --> Query error: Table 'db_rs_open_dev.tbl01_tarif_ruang1' doesn't exist - Invalid query: SELECT *
FROM `tbl01_tarif_ruang1`
JOIN `tbl01_tarif_layanan` ON `tbl01_tarif_layanan`.`idx`=`tbl01_tarif_ruang`.`idtarif`
WHERE `jns_layanan` = 'RI'
AND   (
`idruang` = '0'
OR `idruang` = '53'
 )
AND   (
`kelas_id` = '0'
OR `kelas_id` = '3'
 )
AND   (
`layanan` LIKE '%%' ESCAPE '!'
OR  `kategori_tarif` LIKE '%%' ESCAPE '!'
 )
ORDER BY FIELD(kelas_id, '1', '2', '3', '4', '5')
ERROR - 2020-06-02 10:20:53 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'DESC, '1' DESC, '2' DESC, '3' DESC, '4' DESC, '5') DESC' at line 17 - Invalid query: SELECT *
FROM `tbl01_tarif_ruang`
JOIN `tbl01_tarif_layanan` ON `tbl01_tarif_layanan`.`idx`=`tbl01_tarif_ruang`.`idtarif`
WHERE `jns_layanan` = 'RI'
AND   (
`idruang` = '0'
OR `idruang` = '53'
 )
AND   (
`kelas_id` = '0'
OR `kelas_id` = '3'
 )
AND   (
`layanan` LIKE '%%' ESCAPE '!'
OR  `kategori_tarif` LIKE '%%' ESCAPE '!'
 )
ORDER BY FIELD(kelas_id DESC, '1' DESC, '2' DESC, '3' DESC, '4' DESC, '5') DESC
ERROR - 2020-06-02 10:20:55 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'DESC, '1' DESC, '2' DESC, '3' DESC, '4' DESC, '5') DESC' at line 17 - Invalid query: SELECT *
FROM `tbl01_tarif_ruang`
JOIN `tbl01_tarif_layanan` ON `tbl01_tarif_layanan`.`idx`=`tbl01_tarif_ruang`.`idtarif`
WHERE `jns_layanan` = 'RI'
AND   (
`idruang` = '0'
OR `idruang` = '53'
 )
AND   (
`kelas_id` = '0'
OR `kelas_id` = '3'
 )
AND   (
`layanan` LIKE '%%' ESCAPE '!'
OR  `kategori_tarif` LIKE '%%' ESCAPE '!'
 )
ORDER BY FIELD(kelas_id DESC, '1' DESC, '2' DESC, '3' DESC, '4' DESC, '5') DESC
ERROR - 2020-06-02 10:20:56 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'DESC, '1' DESC, '2' DESC, '3' DESC, '4' DESC, '5') DESC' at line 17 - Invalid query: SELECT *
FROM `tbl01_tarif_ruang`
JOIN `tbl01_tarif_layanan` ON `tbl01_tarif_layanan`.`idx`=`tbl01_tarif_ruang`.`idtarif`
WHERE `jns_layanan` = 'RI'
AND   (
`idruang` = '0'
OR `idruang` = '53'
 )
AND   (
`kelas_id` = '0'
OR `kelas_id` = '3'
 )
AND   (
`layanan` LIKE '%%' ESCAPE '!'
OR  `kategori_tarif` LIKE '%%' ESCAPE '!'
 )
ORDER BY FIELD(kelas_id DESC, '1' DESC, '2' DESC, '3' DESC, '4' DESC, '5') DESC
ERROR - 2020-06-02 10:21:00 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'DESC, '1' DESC, '2' DESC, '3' DESC, '4' DESC, '5') DESC' at line 17 - Invalid query: SELECT *
FROM `tbl01_tarif_ruang`
JOIN `tbl01_tarif_layanan` ON `tbl01_tarif_layanan`.`idx`=`tbl01_tarif_ruang`.`idtarif`
WHERE `jns_layanan` = 'RI'
AND   (
`idruang` = '0'
OR `idruang` = '53'
 )
AND   (
`kelas_id` = '0'
OR `kelas_id` = '3'
 )
AND   (
`layanan` LIKE '%%' ESCAPE '!'
OR  `kategori_tarif` LIKE '%%' ESCAPE '!'
 )
ORDER BY FIELD(kelas_id DESC, '1' DESC, '2' DESC, '3' DESC, '4' DESC, '5') DESC
