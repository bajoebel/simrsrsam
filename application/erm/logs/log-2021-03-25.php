<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-03-25 07:55:41 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\models\Nota_model.php 666
ERROR - 2021-03-25 07:55:41 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\models\Nota_model.php 666
ERROR - 2021-03-25 08:17:02 --> Severity: Error --> Call to undefined method Layanan_model::countDataRiwayatPindah() C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Layanan.php 474
ERROR - 2021-03-25 08:17:09 --> Severity: Error --> Call to undefined method Layanan_model::countDataRiwayatPindah() C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Layanan.php 474
ERROR - 2021-03-25 08:31:03 --> Query error: Unknown column 'RI' in 'where clause' - Invalid query: SELECT *
FROM `tbl02_pindah_ranap`
LEFT JOIN `tbl02_pindah_ranap_response` `b` ON `a`.`idx`=`b`.`id_pindah_ranap`
WHERE `RI` IS NULL
AND `ruang_pengirim` = '61'
AND  (`idx` NOT IN (SELECT a.id_pindah_ranap FROM tbl02_pindah_ranap_batal a))
AND   (
`nomr` LIKE '%%' ESCAPE '!'
OR  `id_daftar` LIKE '%%' ESCAPE '!'
OR  `reg_unit` LIKE '%%' ESCAPE '!'
OR  `nama_pasien` LIKE '%%' ESCAPE '!'
OR  `nama_ruang_pengirim` LIKE '%%' ESCAPE '!'
 )
ORDER BY `tgl_minta` DESC
ERROR - 2021-03-25 08:31:55 --> Query error: Column 'idx' in IN/ALL/ANY subquery is ambiguous - Invalid query: SELECT *
FROM `tbl02_pindah_ranap`
LEFT JOIN `tbl02_pindah_ranap_response` `b` ON `a`.`idx`=`b`.`id_pindah_ranap`
WHERE `ruang_pengirim` = '61'
AND  (`idx` NOT IN (SELECT a.id_pindah_ranap FROM tbl02_pindah_ranap_batal a))
AND   (
`nomr` LIKE '%%' ESCAPE '!'
OR  `id_daftar` LIKE '%%' ESCAPE '!'
OR  `reg_unit` LIKE '%%' ESCAPE '!'
OR  `nama_pasien` LIKE '%%' ESCAPE '!'
OR  `nama_ruang_pengirim` LIKE '%%' ESCAPE '!'
 )
ORDER BY `tgl_minta` DESC
ERROR - 2021-03-25 08:32:43 --> Query error: Unknown column 'a.idx' in 'IN/ALL/ANY subquery' - Invalid query: SELECT *
FROM `tbl02_pindah_ranap`
LEFT JOIN `tbl02_pindah_ranap_response` `b` ON `a`.`idx`=`b`.`id_pindah_ranap`
WHERE `ruang_pengirim` = '61'
AND  (`a`.`idx` NOT IN (SELECT c.id_pindah_ranap FROM tbl02_pindah_ranap_batal c))
AND   (
`nomr` LIKE '%%' ESCAPE '!'
OR  `id_daftar` LIKE '%%' ESCAPE '!'
OR  `reg_unit` LIKE '%%' ESCAPE '!'
OR  `nama_pasien` LIKE '%%' ESCAPE '!'
OR  `nama_ruang_pengirim` LIKE '%%' ESCAPE '!'
 )
ORDER BY `tgl_minta` DESC
ERROR - 2021-03-25 10:20:38 --> Query error: Unknown column 'a.idx' in 'IN/ALL/ANY subquery' - Invalid query: SELECT *
FROM `tbl02_pindah_ranap`
LEFT JOIN `tbl02_pindah_ranap_response` `b` ON `a`.`idx`=`b`.`id_pindah_ranap`
WHERE `ruang_pengirim` = '58'
AND  (`a`.`idx` NOT IN (SELECT c.id_pindah_ranap FROM tbl02_pindah_ranap_batal c))
AND   (
`nomr` LIKE '%%' ESCAPE '!'
OR  `id_daftar` LIKE '%%' ESCAPE '!'
OR  `reg_unit` LIKE '%%' ESCAPE '!'
OR  `nama_pasien` LIKE '%%' ESCAPE '!'
OR  `nama_ruang_pengirim` LIKE '%%' ESCAPE '!'
 )
ORDER BY `tgl_minta` DESC
ERROR - 2021-03-25 10:20:40 --> Query error: Unknown column 'a.idx' in 'IN/ALL/ANY subquery' - Invalid query: SELECT *
FROM `tbl02_pindah_ranap`
LEFT JOIN `tbl02_pindah_ranap_response` `b` ON `a`.`idx`=`b`.`id_pindah_ranap`
WHERE `ruang_pengirim` = '58'
AND  (`a`.`idx` NOT IN (SELECT c.id_pindah_ranap FROM tbl02_pindah_ranap_batal c))
AND   (
`nomr` LIKE '%%' ESCAPE '!'
OR  `id_daftar` LIKE '%%' ESCAPE '!'
OR  `reg_unit` LIKE '%%' ESCAPE '!'
OR  `nama_pasien` LIKE '%%' ESCAPE '!'
OR  `nama_ruang_pengirim` LIKE '%%' ESCAPE '!'
 )
ORDER BY `tgl_minta` DESC
ERROR - 2021-03-25 10:21:14 --> Query error: Unknown column 'a.idx' in 'IN/ALL/ANY subquery' - Invalid query: SELECT *
FROM `tbl02_pindah_ranap`
LEFT JOIN `tbl02_pindah_ranap_response` `b` ON `a`.`idx`=`b`.`id_pindah_ranap`
WHERE `ruang_pengirim` = '58'
AND  (`a`.`idx` NOT IN (SELECT c.id_pindah_ranap FROM tbl02_pindah_ranap_batal c))
AND   (
`nomr` LIKE '%%' ESCAPE '!'
OR  `id_daftar` LIKE '%%' ESCAPE '!'
OR  `reg_unit` LIKE '%%' ESCAPE '!'
OR  `nama_pasien` LIKE '%%' ESCAPE '!'
OR  `nama_ruang_pengirim` LIKE '%%' ESCAPE '!'
 )
ORDER BY `tgl_minta` DESC
ERROR - 2021-03-25 10:21:16 --> Query error: Unknown column 'a.idx' in 'IN/ALL/ANY subquery' - Invalid query: SELECT *
FROM `tbl02_pindah_ranap`
LEFT JOIN `tbl02_pindah_ranap_response` `b` ON `a`.`idx`=`b`.`id_pindah_ranap`
WHERE `ruang_pengirim` = '58'
AND  (`a`.`idx` NOT IN (SELECT c.id_pindah_ranap FROM tbl02_pindah_ranap_batal c))
AND   (
`nomr` LIKE '%%' ESCAPE '!'
OR  `id_daftar` LIKE '%%' ESCAPE '!'
OR  `reg_unit` LIKE '%%' ESCAPE '!'
OR  `nama_pasien` LIKE '%%' ESCAPE '!'
OR  `nama_ruang_pengirim` LIKE '%%' ESCAPE '!'
 )
ORDER BY `tgl_minta` DESC
