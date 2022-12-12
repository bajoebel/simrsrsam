<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-04-08 02:56:04 --> Query error: Unknown column 'a.cara_keluar' in 'where clause' - Invalid query: SELECT *
FROM `tbl02_pindah_ranap` `a`
WHERE `a`.`ruang_pengirim` = '66'
AND  (`a`.`idx` NOT IN (SELECT c.id_pindah_ranap FROM tbl02_pindah_ranap_batal c))
AND   (
`a`.`nomr` LIKE '%%' ESCAPE '!'
OR  `a`.`id_daftar` LIKE '%%' ESCAPE '!'
OR  `a`.`reg_unit` LIKE '%%' ESCAPE '!'
OR  `a`.`nama_pasien` LIKE '%%' ESCAPE '!'
OR  `a`.`cara_keluar` LIKE '%%' ESCAPE '!'
OR  `a`.`keadaan_keluar` LIKE '%%' ESCAPE '!'
 )
ORDER BY `a`.`tgl_minta` DESC
ERROR - 2021-04-08 03:00:04 --> Query error: Unknown column 'a.cara_keluar' in 'where clause' - Invalid query: SELECT *
FROM `tbl02_pindah_ranap` `a`
WHERE `a`.`ruang_pengirim` = '66'
AND  (`a`.`idx` NOT IN (SELECT c.id_pindah_ranap FROM tbl02_pindah_ranap_batal c))
AND   (
`a`.`nomr` LIKE '%%' ESCAPE '!'
OR  `a`.`id_daftar` LIKE '%%' ESCAPE '!'
OR  `a`.`reg_unit` LIKE '%%' ESCAPE '!'
OR  `a`.`nama_pasien` LIKE '%%' ESCAPE '!'
OR  `a`.`cara_keluar` LIKE '%%' ESCAPE '!'
OR  `a`.`keadaan_keluar` LIKE '%%' ESCAPE '!'
 )
ORDER BY `a`.`tgl_minta` DESC
ERROR - 2021-04-08 03:00:34 --> Query error: Unknown column 'a.cara_keluar' in 'where clause' - Invalid query: SELECT *
FROM `tbl02_pindah_ranap` `a`
WHERE `a`.`ruang_pengirim` = '66'
AND  (`a`.`idx` NOT IN (SELECT c.id_pindah_ranap FROM tbl02_pindah_ranap_batal c))
AND   (
`a`.`nomr` LIKE '%%' ESCAPE '!'
OR  `a`.`id_daftar` LIKE '%%' ESCAPE '!'
OR  `a`.`reg_unit` LIKE '%%' ESCAPE '!'
OR  `a`.`nama_pasien` LIKE '%%' ESCAPE '!'
OR  `a`.`cara_keluar` LIKE '%%' ESCAPE '!'
OR  `a`.`keadaan_keluar` LIKE '%%' ESCAPE '!'
 )
ORDER BY `a`.`tgl_minta` DESC
ERROR - 2021-04-08 03:00:48 --> Query error: Unknown column 'a.cara_keluar' in 'where clause' - Invalid query: SELECT *
FROM `tbl02_pindah_ranap` `a`
WHERE `a`.`ruang_pengirim` = '66'
AND  (`a`.`idx` NOT IN (SELECT c.id_pindah_ranap FROM tbl02_pindah_ranap_batal c))
AND   (
`a`.`nomr` LIKE '%%' ESCAPE '!'
OR  `a`.`id_daftar` LIKE '%%' ESCAPE '!'
OR  `a`.`reg_unit` LIKE '%%' ESCAPE '!'
OR  `a`.`nama_pasien` LIKE '%%' ESCAPE '!'
OR  `a`.`cara_keluar` LIKE '%%' ESCAPE '!'
OR  `a`.`keadaan_keluar` LIKE '%%' ESCAPE '!'
 )
ORDER BY `a`.`tgl_minta` DESC
ERROR - 2021-04-08 03:01:31 --> Query error: Unknown column 'a.ruang_pengirim' in 'where clause' - Invalid query: SELECT *
FROM `tbl02_pasien_pulang` `a`
WHERE `a`.`ruang_pengirim` = '66'
AND  (`a`.`idx` NOT IN (SELECT c.id_pindah_ranap FROM tbl02_pindah_ranap_batal c))
AND   (
`a`.`nomr` LIKE '%%' ESCAPE '!'
OR  `a`.`id_daftar` LIKE '%%' ESCAPE '!'
OR  `a`.`reg_unit` LIKE '%%' ESCAPE '!'
OR  `a`.`nama_pasien` LIKE '%%' ESCAPE '!'
OR  `a`.`cara_keluar` LIKE '%%' ESCAPE '!'
OR  `a`.`keadaan_keluar` LIKE '%%' ESCAPE '!'
 )
ORDER BY `a`.`tgl_keluar` DESC
ERROR - 2021-04-08 03:06:25 --> Query error: Unknown column 'a.ruang_pengirim' in 'where clause' - Invalid query: SELECT *
FROM `tbl02_pasien_pulang` `a`
WHERE `a`.`ruang_pengirim` = '66'
AND  (`a`.`idx` NOT IN (SELECT c.id_pindah_ranap FROM tbl02_pindah_ranap_batal c))
AND   (
`a`.`nomr` LIKE '%%' ESCAPE '!'
OR  `a`.`id_daftar` LIKE '%%' ESCAPE '!'
OR  `a`.`reg_unit` LIKE '%%' ESCAPE '!'
OR  `a`.`nama_pasien` LIKE '%%' ESCAPE '!'
OR  `a`.`cara_keluar` LIKE '%%' ESCAPE '!'
OR  `a`.`keadaan_keluar` LIKE '%%' ESCAPE '!'
 )
ORDER BY `a`.`tgl_keluar` DESC
ERROR - 2021-04-08 03:06:49 --> Query error: Unknown column 'a.ruang_pengirim' in 'where clause' - Invalid query: SELECT *
FROM `tbl02_pasien_pulang` `a`
WHERE `a`.`ruang_pengirim` = '66'
AND  (`a`.`idx` NOT IN (SELECT c.id_pindah_ranap FROM tbl02_pindah_ranap_batal c))
AND   (
`a`.`nomr` LIKE '%%' ESCAPE '!'
OR  `a`.`id_daftar` LIKE '%%' ESCAPE '!'
OR  `a`.`reg_unit` LIKE '%%' ESCAPE '!'
OR  `a`.`nama_pasien` LIKE '%%' ESCAPE '!'
OR  `a`.`cara_keluar` LIKE '%%' ESCAPE '!'
OR  `a`.`keadaan_keluar` LIKE '%%' ESCAPE '!'
 )
ORDER BY `a`.`tgl_keluar` DESC
ERROR - 2021-04-08 03:07:07 --> Query error: Unknown column 'a.ruang_pengirim' in 'where clause' - Invalid query: SELECT *
FROM `tbl02_pasien_pulang` `a`
WHERE `a`.`ruang_pengirim` = '66'
AND  (`a`.`idx` NOT IN (SELECT c.id_pindah_ranap FROM tbl02_pindah_ranap_batal c))
AND   (
`a`.`nomr` LIKE '%%' ESCAPE '!'
OR  `a`.`id_daftar` LIKE '%%' ESCAPE '!'
OR  `a`.`reg_unit` LIKE '%%' ESCAPE '!'
OR  `a`.`nama_pasien` LIKE '%%' ESCAPE '!'
OR  `a`.`cara_keluar` LIKE '%%' ESCAPE '!'
OR  `a`.`keadaan_keluar` LIKE '%%' ESCAPE '!'
 )
ORDER BY `a`.`tgl_keluar` DESC
ERROR - 2021-04-08 03:07:55 --> Query error: Unknown column 'a.ruang_pengirim' in 'where clause' - Invalid query: SELECT *
FROM `tbl02_pasien_pulang` `a`
WHERE `a`.`ruang_pengirim` = '66'
AND  (`a`.`idx` NOT IN (SELECT c.id_pindah_ranap FROM tbl02_pindah_ranap_batal c))
AND   (
`a`.`nomr` LIKE '%%' ESCAPE '!'
OR  `a`.`id_daftar` LIKE '%%' ESCAPE '!'
OR  `a`.`reg_unit` LIKE '%%' ESCAPE '!'
OR  `a`.`nama_pasien` LIKE '%%' ESCAPE '!'
OR  `a`.`cara_keluar` LIKE '%%' ESCAPE '!'
OR  `a`.`keadaan_keluar` LIKE '%%' ESCAPE '!'
 )
ORDER BY `a`.`tgl_keluar` DESC
ERROR - 2021-04-08 03:07:59 --> Query error: Unknown column 'a.ruang_pengirim' in 'where clause' - Invalid query: SELECT *
FROM `tbl02_pasien_pulang` `a`
WHERE `a`.`ruang_pengirim` = '66'
AND  (`a`.`idx` NOT IN (SELECT c.id_pindah_ranap FROM tbl02_pindah_ranap_batal c))
AND   (
`a`.`nomr` LIKE '%%' ESCAPE '!'
OR  `a`.`id_daftar` LIKE '%%' ESCAPE '!'
OR  `a`.`reg_unit` LIKE '%%' ESCAPE '!'
OR  `a`.`nama_pasien` LIKE '%%' ESCAPE '!'
OR  `a`.`cara_keluar` LIKE '%%' ESCAPE '!'
OR  `a`.`keadaan_keluar` LIKE '%%' ESCAPE '!'
 )
ORDER BY `a`.`tgl_keluar` DESC
ERROR - 2021-04-08 03:08:04 --> Query error: Unknown column 'a.ruang_pengirim' in 'where clause' - Invalid query: SELECT *
FROM `tbl02_pasien_pulang` `a`
WHERE `a`.`ruang_pengirim` = '66'
AND  (`a`.`idx` NOT IN (SELECT c.id_pindah_ranap FROM tbl02_pindah_ranap_batal c))
AND   (
`a`.`nomr` LIKE '%%' ESCAPE '!'
OR  `a`.`id_daftar` LIKE '%%' ESCAPE '!'
OR  `a`.`reg_unit` LIKE '%%' ESCAPE '!'
OR  `a`.`nama_pasien` LIKE '%%' ESCAPE '!'
OR  `a`.`cara_keluar` LIKE '%%' ESCAPE '!'
OR  `a`.`keadaan_keluar` LIKE '%%' ESCAPE '!'
 )
ORDER BY `a`.`tgl_keluar` DESC
ERROR - 2021-04-08 03:08:13 --> Query error: Unknown column 'a.ruang_pengirim' in 'where clause' - Invalid query: SELECT *
FROM `tbl02_pasien_pulang` `a`
WHERE `a`.`ruang_pengirim` = '66'
AND  (`a`.`idx` NOT IN (SELECT c.id_pindah_ranap FROM tbl02_pindah_ranap_batal c))
AND   (
`a`.`nomr` LIKE '%%' ESCAPE '!'
OR  `a`.`id_daftar` LIKE '%%' ESCAPE '!'
OR  `a`.`reg_unit` LIKE '%%' ESCAPE '!'
OR  `a`.`nama_pasien` LIKE '%%' ESCAPE '!'
OR  `a`.`cara_keluar` LIKE '%%' ESCAPE '!'
OR  `a`.`keadaan_keluar` LIKE '%%' ESCAPE '!'
 )
ORDER BY `a`.`tgl_keluar` DESC
ERROR - 2021-04-08 03:08:23 --> Query error: Unknown column 'a.ruang_pengirim' in 'where clause' - Invalid query: SELECT *
FROM `tbl02_pasien_pulang` `a`
WHERE `a`.`ruang_pengirim` = '66'
AND  (`a`.`idx` NOT IN (SELECT c.id_pindah_ranap FROM tbl02_pindah_ranap_batal c))
AND   (
`a`.`nomr` LIKE '%%' ESCAPE '!'
OR  `a`.`id_daftar` LIKE '%%' ESCAPE '!'
OR  `a`.`reg_unit` LIKE '%%' ESCAPE '!'
OR  `a`.`nama_pasien` LIKE '%%' ESCAPE '!'
OR  `a`.`cara_keluar` LIKE '%%' ESCAPE '!'
OR  `a`.`keadaan_keluar` LIKE '%%' ESCAPE '!'
 )
ORDER BY `a`.`tgl_keluar` DESC
ERROR - 2021-04-08 03:08:44 --> Query error: Unknown column 'a.ruang_pengirim' in 'where clause' - Invalid query: SELECT *
FROM `tbl02_pasien_pulang` `a`
WHERE `a`.`ruang_pengirim` = '66'
AND  (`a`.`idx` NOT IN (SELECT c.id_pindah_ranap FROM tbl02_pindah_ranap_batal c))
AND   (
`a`.`nomr` LIKE '%%' ESCAPE '!'
OR  `a`.`id_daftar` LIKE '%%' ESCAPE '!'
OR  `a`.`reg_unit` LIKE '%%' ESCAPE '!'
OR  `a`.`nama_pasien` LIKE '%%' ESCAPE '!'
OR  `a`.`cara_keluar` LIKE '%%' ESCAPE '!'
OR  `a`.`keadaan_keluar` LIKE '%%' ESCAPE '!'
 )
ORDER BY `a`.`tgl_keluar` DESC
ERROR - 2021-04-08 03:12:46 --> Query error: Unknown column 'a.ruang_pengirim' in 'where clause' - Invalid query: SELECT *
FROM `tbl02_pasien_pulang` `a`
WHERE `a`.`ruang_pengirim` = '66'
AND  (`a`.`idx` NOT IN (SELECT c.id_pindah_ranap FROM tbl02_pindah_ranap_batal c))
AND   (
`a`.`nomr` LIKE '%%' ESCAPE '!'
OR  `a`.`id_daftar` LIKE '%%' ESCAPE '!'
OR  `a`.`reg_unit` LIKE '%%' ESCAPE '!'
OR  `a`.`nama_pasien` LIKE '%%' ESCAPE '!'
OR  `a`.`cara_keluar` LIKE '%%' ESCAPE '!'
OR  `a`.`keadaan_keluar` LIKE '%%' ESCAPE '!'
 )
ORDER BY `a`.`tgl_keluar` DESC
ERROR - 2021-04-08 03:12:51 --> Query error: Unknown column 'a.ruang_pengirim' in 'where clause' - Invalid query: SELECT *
FROM `tbl02_pasien_pulang` `a`
WHERE `a`.`ruang_pengirim` = '66'
AND  (`a`.`idx` NOT IN (SELECT c.id_pindah_ranap FROM tbl02_pindah_ranap_batal c))
AND   (
`a`.`nomr` LIKE '%%' ESCAPE '!'
OR  `a`.`id_daftar` LIKE '%%' ESCAPE '!'
OR  `a`.`reg_unit` LIKE '%%' ESCAPE '!'
OR  `a`.`nama_pasien` LIKE '%%' ESCAPE '!'
OR  `a`.`cara_keluar` LIKE '%%' ESCAPE '!'
OR  `a`.`keadaan_keluar` LIKE '%%' ESCAPE '!'
 )
ORDER BY `a`.`tgl_keluar` DESC
ERROR - 2021-04-08 03:37:11 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '-10, 10' at line 14 - Invalid query: SELECT *
FROM `tbl02_pasien_pulang` `a`
WHERE `a`.`id_ruang` = '66'
AND  (`a`.`idx` NOT IN (SELECT c.id_pindah_ranap FROM tbl02_pindah_ranap_batal c))
AND   (
`a`.`nomr` LIKE '%%' ESCAPE '!'
OR  `a`.`id_daftar` LIKE '%%' ESCAPE '!'
OR  `a`.`reg_unit` LIKE '%%' ESCAPE '!'
OR  `a`.`nama_pasien` LIKE '%%' ESCAPE '!'
OR  `a`.`cara_keluar` LIKE '%%' ESCAPE '!'
OR  `a`.`keadaan_keluar` LIKE '%%' ESCAPE '!'
 )
ORDER BY `tgl_keluar` DESC
 LIMIT -10, 10
ERROR - 2021-04-08 06:10:27 --> Severity: Notice --> Undefined property: mysqli::$idx C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_penunjang.php 82
ERROR - 2021-04-08 06:10:27 --> Severity: Notice --> Undefined property: mysqli::$ruang C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_penunjang.php 82
ERROR - 2021-04-08 06:10:27 --> Severity: Notice --> Undefined property: mysqli_result::$idx C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_penunjang.php 82
ERROR - 2021-04-08 06:10:27 --> Severity: Notice --> Undefined property: mysqli_result::$ruang C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_penunjang.php 82
ERROR - 2021-04-08 06:10:27 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_penunjang.php 82
ERROR - 2021-04-08 06:10:27 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_penunjang.php 82
ERROR - 2021-04-08 06:10:27 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_penunjang.php 82
ERROR - 2021-04-08 06:10:27 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_penunjang.php 82
ERROR - 2021-04-08 06:10:27 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_penunjang.php 82
ERROR - 2021-04-08 06:10:27 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_penunjang.php 82
ERROR - 2021-04-08 06:10:27 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_penunjang.php 82
ERROR - 2021-04-08 06:10:27 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_penunjang.php 82
ERROR - 2021-04-08 06:10:27 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_penunjang.php 82
ERROR - 2021-04-08 06:10:27 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_penunjang.php 82
ERROR - 2021-04-08 06:10:27 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_penunjang.php 82
ERROR - 2021-04-08 06:10:27 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_penunjang.php 82
ERROR - 2021-04-08 06:10:27 --> Severity: Notice --> Undefined property: mysqli::$NRP C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_penunjang.php 90
ERROR - 2021-04-08 06:10:27 --> Severity: Notice --> Undefined property: mysqli::$pgwNama C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_penunjang.php 90
ERROR - 2021-04-08 06:10:27 --> Severity: Notice --> Undefined property: mysqli_result::$NRP C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_penunjang.php 90
ERROR - 2021-04-08 06:10:27 --> Severity: Notice --> Undefined property: mysqli_result::$pgwNama C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_penunjang.php 90
ERROR - 2021-04-08 06:10:27 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_penunjang.php 90
ERROR - 2021-04-08 06:10:27 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_penunjang.php 90
ERROR - 2021-04-08 06:10:27 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_penunjang.php 90
ERROR - 2021-04-08 06:10:27 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_penunjang.php 90
ERROR - 2021-04-08 06:10:27 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_penunjang.php 90
ERROR - 2021-04-08 06:10:27 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_penunjang.php 90
ERROR - 2021-04-08 06:10:27 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_penunjang.php 90
ERROR - 2021-04-08 06:10:27 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_penunjang.php 90
ERROR - 2021-04-08 06:10:27 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_penunjang.php 90
ERROR - 2021-04-08 06:10:27 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_penunjang.php 90
ERROR - 2021-04-08 06:10:27 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_penunjang.php 90
ERROR - 2021-04-08 06:10:27 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_penunjang.php 90
ERROR - 2021-04-08 06:10:33 --> Severity: Notice --> Undefined property: mysqli::$idx C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_penunjang.php 82
ERROR - 2021-04-08 06:10:33 --> Severity: Notice --> Undefined property: mysqli::$ruang C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_penunjang.php 82
ERROR - 2021-04-08 06:10:33 --> Severity: Notice --> Undefined property: mysqli_result::$idx C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_penunjang.php 82
ERROR - 2021-04-08 06:10:33 --> Severity: Notice --> Undefined property: mysqli_result::$ruang C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_penunjang.php 82
ERROR - 2021-04-08 06:10:33 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_penunjang.php 82
ERROR - 2021-04-08 06:10:33 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_penunjang.php 82
ERROR - 2021-04-08 06:10:33 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_penunjang.php 82
ERROR - 2021-04-08 06:10:33 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_penunjang.php 82
ERROR - 2021-04-08 06:10:33 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_penunjang.php 82
ERROR - 2021-04-08 06:10:33 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_penunjang.php 82
ERROR - 2021-04-08 06:10:33 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_penunjang.php 82
ERROR - 2021-04-08 06:10:33 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_penunjang.php 82
ERROR - 2021-04-08 06:10:33 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_penunjang.php 82
ERROR - 2021-04-08 06:10:33 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_penunjang.php 82
ERROR - 2021-04-08 06:10:33 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_penunjang.php 82
ERROR - 2021-04-08 06:10:33 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_penunjang.php 82
ERROR - 2021-04-08 06:10:33 --> Severity: Notice --> Undefined property: mysqli::$NRP C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_penunjang.php 90
ERROR - 2021-04-08 06:10:33 --> Severity: Notice --> Undefined property: mysqli::$pgwNama C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_penunjang.php 90
ERROR - 2021-04-08 06:10:33 --> Severity: Notice --> Undefined property: mysqli_result::$NRP C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_penunjang.php 90
ERROR - 2021-04-08 06:10:33 --> Severity: Notice --> Undefined property: mysqli_result::$pgwNama C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_penunjang.php 90
ERROR - 2021-04-08 06:10:33 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_penunjang.php 90
ERROR - 2021-04-08 06:10:33 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_penunjang.php 90
ERROR - 2021-04-08 06:10:33 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_penunjang.php 90
ERROR - 2021-04-08 06:10:33 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_penunjang.php 90
ERROR - 2021-04-08 06:10:33 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_penunjang.php 90
ERROR - 2021-04-08 06:10:33 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_penunjang.php 90
ERROR - 2021-04-08 06:10:33 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_penunjang.php 90
ERROR - 2021-04-08 06:10:33 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_penunjang.php 90
ERROR - 2021-04-08 06:10:33 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_penunjang.php 90
ERROR - 2021-04-08 06:10:33 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_penunjang.php 90
ERROR - 2021-04-08 06:10:33 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_penunjang.php 90
ERROR - 2021-04-08 06:10:33 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_penunjang.php 90
ERROR - 2021-04-08 06:10:35 --> Severity: Notice --> Undefined property: mysqli::$idx C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 79
ERROR - 2021-04-08 06:10:35 --> Severity: Notice --> Undefined property: mysqli::$ruang C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 79
ERROR - 2021-04-08 06:10:35 --> Severity: Notice --> Undefined property: mysqli_result::$idx C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 79
ERROR - 2021-04-08 06:10:35 --> Severity: Notice --> Undefined property: mysqli_result::$ruang C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 79
ERROR - 2021-04-08 06:10:35 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 79
ERROR - 2021-04-08 06:10:35 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 79
ERROR - 2021-04-08 06:10:35 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 79
ERROR - 2021-04-08 06:10:35 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 79
ERROR - 2021-04-08 06:10:35 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 79
ERROR - 2021-04-08 06:10:35 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 79
ERROR - 2021-04-08 06:10:35 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 79
ERROR - 2021-04-08 06:10:35 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 79
ERROR - 2021-04-08 06:10:35 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 79
ERROR - 2021-04-08 06:10:35 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 79
ERROR - 2021-04-08 06:10:35 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 79
ERROR - 2021-04-08 06:10:35 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 79
ERROR - 2021-04-08 06:10:35 --> Severity: Notice --> Undefined property: mysqli::$NRP C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 87
ERROR - 2021-04-08 06:10:35 --> Severity: Notice --> Undefined property: mysqli::$pgwNama C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 87
ERROR - 2021-04-08 06:10:35 --> Severity: Notice --> Undefined property: mysqli_result::$NRP C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 87
ERROR - 2021-04-08 06:10:35 --> Severity: Notice --> Undefined property: mysqli_result::$pgwNama C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 87
ERROR - 2021-04-08 06:10:35 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 87
ERROR - 2021-04-08 06:10:35 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 87
ERROR - 2021-04-08 06:10:35 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 87
ERROR - 2021-04-08 06:10:35 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 87
ERROR - 2021-04-08 06:10:35 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 87
ERROR - 2021-04-08 06:10:35 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 87
ERROR - 2021-04-08 06:10:35 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 87
ERROR - 2021-04-08 06:10:35 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 87
ERROR - 2021-04-08 06:10:35 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 87
ERROR - 2021-04-08 06:10:35 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 87
ERROR - 2021-04-08 06:10:35 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 87
ERROR - 2021-04-08 06:10:35 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 87
ERROR - 2021-04-08 07:31:33 --> Severity: Notice --> Undefined property: mysqli::$idx C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_penunjang.php 82
ERROR - 2021-04-08 07:31:33 --> Severity: Notice --> Undefined property: mysqli::$ruang C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_penunjang.php 82
ERROR - 2021-04-08 07:31:33 --> Severity: Notice --> Undefined property: mysqli_result::$idx C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_penunjang.php 82
ERROR - 2021-04-08 07:31:33 --> Severity: Notice --> Undefined property: mysqli_result::$ruang C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_penunjang.php 82
ERROR - 2021-04-08 07:31:33 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_penunjang.php 82
ERROR - 2021-04-08 07:31:33 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_penunjang.php 82
ERROR - 2021-04-08 07:31:33 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_penunjang.php 82
ERROR - 2021-04-08 07:31:33 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_penunjang.php 82
ERROR - 2021-04-08 07:31:33 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_penunjang.php 82
ERROR - 2021-04-08 07:31:33 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_penunjang.php 82
ERROR - 2021-04-08 07:31:33 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_penunjang.php 82
ERROR - 2021-04-08 07:31:33 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_penunjang.php 82
ERROR - 2021-04-08 07:31:33 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_penunjang.php 82
ERROR - 2021-04-08 07:31:33 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_penunjang.php 82
ERROR - 2021-04-08 07:31:33 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_penunjang.php 82
ERROR - 2021-04-08 07:31:33 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_penunjang.php 82
ERROR - 2021-04-08 07:31:33 --> Severity: Notice --> Undefined property: mysqli::$NRP C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_penunjang.php 90
ERROR - 2021-04-08 07:31:33 --> Severity: Notice --> Undefined property: mysqli::$pgwNama C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_penunjang.php 90
ERROR - 2021-04-08 07:31:33 --> Severity: Notice --> Undefined property: mysqli_result::$NRP C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_penunjang.php 90
ERROR - 2021-04-08 07:31:33 --> Severity: Notice --> Undefined property: mysqli_result::$pgwNama C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_penunjang.php 90
ERROR - 2021-04-08 07:31:33 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_penunjang.php 90
ERROR - 2021-04-08 07:31:33 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_penunjang.php 90
ERROR - 2021-04-08 07:31:33 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_penunjang.php 90
ERROR - 2021-04-08 07:31:33 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_penunjang.php 90
ERROR - 2021-04-08 07:31:33 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_penunjang.php 90
ERROR - 2021-04-08 07:31:33 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_penunjang.php 90
ERROR - 2021-04-08 07:31:33 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_penunjang.php 90
ERROR - 2021-04-08 07:31:33 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_penunjang.php 90
ERROR - 2021-04-08 07:31:33 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_penunjang.php 90
ERROR - 2021-04-08 07:31:33 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_penunjang.php 90
ERROR - 2021-04-08 07:31:33 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_penunjang.php 90
ERROR - 2021-04-08 07:31:33 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_penunjang.php 90
ERROR - 2021-04-08 07:31:37 --> Severity: Notice --> Undefined property: mysqli::$idx C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 79
ERROR - 2021-04-08 07:31:37 --> Severity: Notice --> Undefined property: mysqli::$ruang C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 79
ERROR - 2021-04-08 07:31:37 --> Severity: Notice --> Undefined property: mysqli_result::$idx C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 79
ERROR - 2021-04-08 07:31:37 --> Severity: Notice --> Undefined property: mysqli_result::$ruang C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 79
ERROR - 2021-04-08 07:31:37 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 79
ERROR - 2021-04-08 07:31:37 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 79
ERROR - 2021-04-08 07:31:37 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 79
ERROR - 2021-04-08 07:31:37 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 79
ERROR - 2021-04-08 07:31:37 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 79
ERROR - 2021-04-08 07:31:37 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 79
ERROR - 2021-04-08 07:31:37 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 79
ERROR - 2021-04-08 07:31:37 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 79
ERROR - 2021-04-08 07:31:37 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 79
ERROR - 2021-04-08 07:31:37 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 79
ERROR - 2021-04-08 07:31:37 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 79
ERROR - 2021-04-08 07:31:37 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 79
ERROR - 2021-04-08 07:31:37 --> Severity: Notice --> Undefined property: mysqli::$NRP C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 87
ERROR - 2021-04-08 07:31:37 --> Severity: Notice --> Undefined property: mysqli::$pgwNama C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 87
ERROR - 2021-04-08 07:31:37 --> Severity: Notice --> Undefined property: mysqli_result::$NRP C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 87
ERROR - 2021-04-08 07:31:37 --> Severity: Notice --> Undefined property: mysqli_result::$pgwNama C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 87
ERROR - 2021-04-08 07:31:38 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 87
ERROR - 2021-04-08 07:31:38 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 87
ERROR - 2021-04-08 07:31:38 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 87
ERROR - 2021-04-08 07:31:38 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 87
ERROR - 2021-04-08 07:31:38 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 87
ERROR - 2021-04-08 07:31:38 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 87
ERROR - 2021-04-08 07:31:38 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 87
ERROR - 2021-04-08 07:31:38 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 87
ERROR - 2021-04-08 07:31:38 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 87
ERROR - 2021-04-08 07:31:38 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 87
ERROR - 2021-04-08 07:31:38 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 87
ERROR - 2021-04-08 07:31:38 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 87
