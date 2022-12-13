<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-04-21 03:22:14 --> Severity: Notice --> Undefined property: nota_tagihan::$Layanan_model C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Nota_tagihan.php 119
ERROR - 2021-04-21 03:22:14 --> Severity: Error --> Call to a member function getDokter() on null C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Nota_tagihan.php 119
ERROR - 2021-04-21 03:22:38 --> Severity: Notice --> Undefined property: nota_tagihan::$Layanan_model C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Nota_tagihan.php 120
ERROR - 2021-04-21 03:22:38 --> Severity: Error --> Call to a member function getDokter() on null C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Nota_tagihan.php 120
ERROR - 2021-04-21 03:25:12 --> Severity: Warning --> Missing argument 1 for nota_tagihan::showjadwal() C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Nota_tagihan.php 3041
ERROR - 2021-04-21 03:25:12 --> Severity: Notice --> Undefined variable: id_daftar C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Nota_tagihan.php 3046
ERROR - 2021-04-21 03:25:12 --> Query error: Unknown column 'undefined' in 'where clause' - Invalid query: SELECT *
FROM `tbl02_jadwaloperasi`
WHERE `undefined` = 'undefined'
ERROR - 2021-04-21 04:41:00 --> Query error: Unknown column 'id_tarif' in 'field list' - Invalid query: SELECT id_tarif FROM tbl02_temp_permintaan_tindakan_penunjang WHERE id_daftar='2021022539' AND reg_unit='RI-210420-66-0002'
ERROR - 2021-04-21 04:41:00 --> Query error: Unknown column 'id_tarif' in 'on clause' - Invalid query: SELECT *
FROM `tbl02_temp_permintaan_tindakan_penunjang`
JOIN `tbl01_tarif_layanan` ON `id_tarif`=`idx`
WHERE `id_daftar` = '2021022539'
AND `reg_unit` = 'RI-210420-66-0002'
AND   (
`tbl01_tarif_layanan`.`layanan` LIKE '%%' ESCAPE '!'
 )
ERROR - 2021-04-21 09:52:05 --> Severity: Warning --> mysqli::real_connect(): (HY000/2002): No connection could be made because the target machine actively refused it.
 C:\xampp32\htdocs\simrs\system\database\drivers\mysqli\mysqli_driver.php 203
ERROR - 2021-04-21 09:52:06 --> Unable to connect to the database
