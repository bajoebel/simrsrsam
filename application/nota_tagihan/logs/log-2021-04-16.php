<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-04-16 03:31:38 --> Query error: Table 'db_simrs_v2.tbl02_rujuk_internal1' doesn't exist - Invalid query: SELECT *, `id_poli` as `id_ruang`, `nama_poli` as `nama_ruang`
FROM `tbl02_rujuk_internal1`
WHERE `id_poli` = '8'
AND  (`idx` NOT IN (SELECT a.id_pindah_ranap FROM tbl02_pindah_ranap_batal a)
            AND `idx` NOT IN (SELECT b.id_pindah_ranap FROM tbl02_pindah_ranap_response b))
AND   (
`nomr` LIKE '%%' ESCAPE '!'
OR  `id_daftar` LIKE '%%' ESCAPE '!'
OR  `reg_unit` LIKE '%%' ESCAPE '!'
OR  `nama_pasien` LIKE '%%' ESCAPE '!'
OR  `nama_ruang_pengirim` LIKE '%%' ESCAPE '!'
 )
ORDER BY `tgl_minta` DESC
 LIMIT 20
ERROR - 2021-04-16 03:33:30 --> Query error: Table 'db_simrs_v2.tbl02_rujuk_internal1' doesn't exist - Invalid query: SELECT *, `id_poli` as `id_ruang`, `nama_poli` as `nama_ruang`
FROM `tbl02_rujuk_internal1`
WHERE `id_poli` = '8'
AND  (`idx` NOT IN (SELECT a.id_rujuk_internal FROM tbl02_rujuk_internal_batal a)
            AND `idx` NOT IN (SELECT b.id_rujuk_internal FROM tbl02_rujuk_internal_response b))
AND   (
`nomr` LIKE '%%' ESCAPE '!'
OR  `id_daftar` LIKE '%%' ESCAPE '!'
OR  `reg_unit` LIKE '%%' ESCAPE '!'
OR  `nama_pasien` LIKE '%%' ESCAPE '!'
OR  `nama_ruang_pengirim` LIKE '%%' ESCAPE '!'
 )
ORDER BY `tgl_minta` DESC
 LIMIT 20
ERROR - 2021-04-16 04:03:40 --> Query error: Unknown column 'id_tarif' in 'field list' - Invalid query: SELECT id_tarif FROM tbl02_temp_permintaan_tindakan_penunjang WHERE id_daftar='2021021524' AND reg_unit='RJ-210416-10-0002'
ERROR - 2021-04-16 04:03:40 --> Query error: Unknown column 'id_tarif' in 'on clause' - Invalid query: SELECT *
FROM `tbl02_temp_permintaan_tindakan_penunjang`
JOIN `tbl01_tarif_layanan` ON `id_tarif`=`idx`
WHERE `id_daftar` = '2021021524'
AND `reg_unit` = 'RJ-210416-10-0002'
AND   (
`tbl01_tarif_layanan`.`layanan` LIKE '%%' ESCAPE '!'
 )
ERROR - 2021-04-16 04:11:59 --> Severity: Notice --> Undefined variable: getDokter C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\layanan_index.php 478
ERROR - 2021-04-16 04:11:59 --> Severity: Error --> Call to a member function result() on null C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\layanan_index.php 478
ERROR - 2021-04-16 04:15:18 --> Severity: Error --> Call to a member function result() on array C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\layanan_index.php 479
ERROR - 2021-04-16 04:20:41 --> Severity: Notice --> Undefined property: Layanan::$layanan_model C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Layanan.php 38
ERROR - 2021-04-16 04:20:41 --> Severity: Error --> Call to a member function getDokter() on null C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Layanan.php 38
ERROR - 2021-04-16 04:22:27 --> Query error: Table 'db_simrs_v2.tbl01_pegawai1' doesn't exist - Invalid query: SELECT *
FROM `tbl01_dokter`
JOIN `tbl01_pegawai1` ON `tbl01_pegawai`.`NRP`=`tbl01_dokter`.`NRP`
WHERE 0 = 'idruang'
AND 1 = '8'
AND `dokter` = 1
ERROR - 2021-04-16 04:23:34 --> Query error: Table 'db_simrs_v2.tbl01_pegawai1' doesn't exist - Invalid query: SELECT *
FROM `tbl01_dokter`
JOIN `tbl01_pegawai1` ON `tbl01_pegawai`.`NRP`=`tbl01_dokter`.`NRP`
WHERE `idruang` = '8'
AND `dokter` = 1
ERROR - 2021-04-16 04:23:56 --> Query error: Table 'db_simrs_v2.tbl01_pegawai1' doesn't exist - Invalid query: SELECT *
FROM `tbl01_dokter`
JOIN `tbl01_pegawai1` ON `tbl01_pegawai`.`NRP`=`tbl01_dokter`.`NRP`
WHERE `idruang` = '8'
AND `dokter` = 1
ERROR - 2021-04-16 05:12:11 --> Query error: Unknown column 'id_tarif' in 'field list' - Invalid query: SELECT id_tarif FROM tbl02_temp_permintaan_tindakan_penunjang WHERE id_daftar='2021021524' AND reg_unit='RJ-210416-08-0011'
ERROR - 2021-04-16 05:12:11 --> Query error: Unknown column 'id_tarif' in 'on clause' - Invalid query: SELECT *
FROM `tbl02_temp_permintaan_tindakan_penunjang`
JOIN `tbl01_tarif_layanan` ON `id_tarif`=`idx`
WHERE `id_daftar` = '2021021524'
AND `reg_unit` = 'RJ-210416-08-0011'
AND   (
`tbl01_tarif_layanan`.`layanan` LIKE '%%' ESCAPE '!'
 )
ERROR - 2021-04-16 05:37:32 --> Query error: Unknown column 'id_tarif' in 'field list' - Invalid query: SELECT id_tarif FROM tbl02_temp_permintaan_tindakan_penunjang WHERE id_daftar='2021021524' AND reg_unit='RJ-210416-08-0011'
ERROR - 2021-04-16 05:37:32 --> Query error: Unknown column 'id_tarif' in 'on clause' - Invalid query: SELECT *
FROM `tbl02_temp_permintaan_tindakan_penunjang`
JOIN `tbl01_tarif_layanan` ON `id_tarif`=`idx`
WHERE `id_daftar` = '2021021524'
AND `reg_unit` = 'RJ-210416-08-0011'
AND   (
`tbl01_tarif_layanan`.`layanan` LIKE '%%' ESCAPE '!'
 )
ERROR - 2021-04-16 05:52:57 --> Query error: Unknown column 'id_tarif' in 'field list' - Invalid query: SELECT id_tarif FROM tbl02_temp_permintaan_tindakan_penunjang WHERE id_daftar='2021021524' AND reg_unit='RJ-210416-08-0011'
ERROR - 2021-04-16 05:52:57 --> Query error: Unknown column 'id_tarif' in 'on clause' - Invalid query: SELECT *
FROM `tbl02_temp_permintaan_tindakan_penunjang`
JOIN `tbl01_tarif_layanan` ON `id_tarif`=`idx`
WHERE `id_daftar` = '2021021524'
AND `reg_unit` = 'RJ-210416-08-0011'
AND   (
`tbl01_tarif_layanan`.`layanan` LIKE '%%' ESCAPE '!'
 )
ERROR - 2021-04-16 05:53:01 --> Severity: Notice --> Undefined property: mysqli::$idx C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 79
ERROR - 2021-04-16 05:53:01 --> Severity: Notice --> Undefined property: mysqli::$ruang C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 79
ERROR - 2021-04-16 05:53:01 --> Severity: Notice --> Undefined property: mysqli_result::$idx C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 79
ERROR - 2021-04-16 05:53:01 --> Severity: Notice --> Undefined property: mysqli_result::$ruang C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 79
ERROR - 2021-04-16 05:53:01 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 79
ERROR - 2021-04-16 05:53:01 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 79
ERROR - 2021-04-16 05:53:01 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 79
ERROR - 2021-04-16 05:53:01 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 79
ERROR - 2021-04-16 05:53:01 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 79
ERROR - 2021-04-16 05:53:01 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 79
ERROR - 2021-04-16 05:53:01 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 79
ERROR - 2021-04-16 05:53:01 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 79
ERROR - 2021-04-16 05:53:01 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 79
ERROR - 2021-04-16 05:53:01 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 79
ERROR - 2021-04-16 05:53:01 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 79
ERROR - 2021-04-16 05:53:01 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 79
ERROR - 2021-04-16 05:53:01 --> Severity: Notice --> Undefined property: mysqli::$NRP C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 87
ERROR - 2021-04-16 05:53:01 --> Severity: Notice --> Undefined property: mysqli::$pgwNama C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 87
ERROR - 2021-04-16 05:53:01 --> Severity: Notice --> Undefined property: mysqli_result::$NRP C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 87
ERROR - 2021-04-16 05:53:01 --> Severity: Notice --> Undefined property: mysqli_result::$pgwNama C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 87
ERROR - 2021-04-16 05:53:01 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 87
ERROR - 2021-04-16 05:53:01 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 87
ERROR - 2021-04-16 05:53:01 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 87
ERROR - 2021-04-16 05:53:01 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 87
ERROR - 2021-04-16 05:53:01 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 87
ERROR - 2021-04-16 05:53:01 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 87
ERROR - 2021-04-16 05:53:01 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 87
ERROR - 2021-04-16 05:53:01 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 87
ERROR - 2021-04-16 05:53:01 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 87
ERROR - 2021-04-16 05:53:01 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 87
ERROR - 2021-04-16 05:53:01 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 87
ERROR - 2021-04-16 05:53:01 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 87
ERROR - 2021-04-16 06:00:00 --> Query error: Unknown column 'id_tarif' in 'field list' - Invalid query: SELECT id_tarif FROM tbl02_temp_permintaan_tindakan_penunjang WHERE id_daftar='2021021524' AND reg_unit='RJ-210416-08-0011'
ERROR - 2021-04-16 06:00:00 --> Query error: Unknown column 'id_tarif' in 'on clause' - Invalid query: SELECT *
FROM `tbl02_temp_permintaan_tindakan_penunjang`
JOIN `tbl01_tarif_layanan` ON `id_tarif`=`idx`
WHERE `id_daftar` = '2021021524'
AND `reg_unit` = 'RJ-210416-08-0011'
AND   (
`tbl01_tarif_layanan`.`layanan` LIKE '%%' ESCAPE '!'
 )
ERROR - 2021-04-16 06:05:28 --> Query error: Unknown column 'undefined' in 'where clause' - Invalid query: SELECT *
FROM `tbl02_jadwaloperasi`
WHERE `undefined` = 'undefined'
ERROR - 2021-04-16 06:05:28 --> Severity: Warning --> Missing argument 1 for nota_tagihan::showjadwal() C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Nota_tagihan.php 2892
ERROR - 2021-04-16 06:05:28 --> Severity: Notice --> Undefined variable: id_daftar C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Nota_tagihan.php 2897
ERROR - 2021-04-16 06:06:35 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\models\Nota_model.php 294
ERROR - 2021-04-16 06:06:35 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\models\Nota_model.php 294
ERROR - 2021-04-16 06:06:58 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\models\Nota_model.php 294
ERROR - 2021-04-16 06:06:58 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\models\Nota_model.php 294
ERROR - 2021-04-16 06:07:01 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\models\Nota_model.php 294
ERROR - 2021-04-16 06:07:01 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\models\Nota_model.php 294
ERROR - 2021-04-16 06:07:04 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\models\Nota_model.php 294
ERROR - 2021-04-16 06:07:04 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\models\Nota_model.php 294
ERROR - 2021-04-16 06:10:07 --> Severity: Warning --> Missing argument 1 for nota_tagihan::showjadwal() C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Nota_tagihan.php 2892
ERROR - 2021-04-16 06:10:07 --> Severity: Notice --> Undefined variable: id_daftar C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Nota_tagihan.php 2897
ERROR - 2021-04-16 06:10:22 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\models\Nota_model.php 294
ERROR - 2021-04-16 06:10:22 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\models\Nota_model.php 294
ERROR - 2021-04-16 06:10:22 --> Severity: Notice --> Undefined variable: res C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Nota_tagihan.php 3006
ERROR - 2021-04-16 06:10:30 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\models\Nota_model.php 294
ERROR - 2021-04-16 06:10:30 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\models\Nota_model.php 294
ERROR - 2021-04-16 06:10:30 --> Severity: Notice --> Undefined variable: res C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Nota_tagihan.php 3006
ERROR - 2021-04-16 06:10:32 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\models\Nota_model.php 294
ERROR - 2021-04-16 06:10:32 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\models\Nota_model.php 294
ERROR - 2021-04-16 06:10:32 --> Severity: Notice --> Undefined variable: res C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Nota_tagihan.php 3006
ERROR - 2021-04-16 06:10:39 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\models\Nota_model.php 294
ERROR - 2021-04-16 06:10:39 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\models\Nota_model.php 294
ERROR - 2021-04-16 06:10:39 --> Severity: Notice --> Undefined variable: res C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Nota_tagihan.php 3006
ERROR - 2021-04-16 06:12:44 --> Severity: Notice --> Undefined variable: token C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Nota_tagihan.php 3007
ERROR - 2021-04-16 06:12:44 --> Severity: Notice --> Undefined variable: jkn_antrian C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Nota_tagihan.php 3007
ERROR - 2021-04-16 06:12:44 --> Severity: Notice --> Undefined variable: res C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Nota_tagihan.php 3007
ERROR - 2021-04-16 06:12:49 --> Severity: Notice --> Undefined variable: token C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Nota_tagihan.php 3007
ERROR - 2021-04-16 06:12:49 --> Severity: Notice --> Undefined variable: jkn_antrian C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Nota_tagihan.php 3007
ERROR - 2021-04-16 06:12:49 --> Severity: Notice --> Undefined variable: res C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Nota_tagihan.php 3007
ERROR - 2021-04-16 06:12:51 --> Severity: Notice --> Undefined variable: token C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Nota_tagihan.php 3007
ERROR - 2021-04-16 06:12:51 --> Severity: Notice --> Undefined variable: jkn_antrian C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Nota_tagihan.php 3007
ERROR - 2021-04-16 06:12:51 --> Severity: Notice --> Undefined variable: res C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Nota_tagihan.php 3007
ERROR - 2021-04-16 06:13:38 --> Severity: Notice --> Undefined variable: jkn_antrian C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Nota_tagihan.php 3008
ERROR - 2021-04-16 06:13:38 --> Severity: Notice --> Undefined variable: res C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Nota_tagihan.php 3008
ERROR - 2021-04-16 06:13:41 --> Severity: Notice --> Undefined variable: jkn_antrian C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Nota_tagihan.php 3008
ERROR - 2021-04-16 06:13:41 --> Severity: Notice --> Undefined variable: res C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Nota_tagihan.php 3008
ERROR - 2021-04-16 06:13:43 --> Severity: Notice --> Undefined variable: jkn_antrian C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Nota_tagihan.php 3008
ERROR - 2021-04-16 06:13:43 --> Severity: Notice --> Undefined variable: res C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Nota_tagihan.php 3008
ERROR - 2021-04-16 06:16:13 --> Query error: Unknown column 'undefined' in 'where clause' - Invalid query: SELECT *
FROM `tbl02_jadwaloperasi`
WHERE `undefined` = 'undefined'
ERROR - 2021-04-16 06:16:43 --> Query error: Unknown column 'id_tarif' in 'field list' - Invalid query: SELECT id_tarif FROM tbl02_temp_permintaan_tindakan_penunjang WHERE id_daftar='2021021524' AND reg_unit='RJ-210416-08-0011'
ERROR - 2021-04-16 06:16:43 --> Query error: Unknown column 'id_tarif' in 'on clause' - Invalid query: SELECT *
FROM `tbl02_temp_permintaan_tindakan_penunjang`
JOIN `tbl01_tarif_layanan` ON `id_tarif`=`idx`
WHERE `id_daftar` = '2021021524'
AND `reg_unit` = 'RJ-210416-08-0011'
AND   (
`tbl01_tarif_layanan`.`layanan` LIKE '%%' ESCAPE '!'
 )
ERROR - 2021-04-16 06:24:47 --> Severity: Notice --> Undefined property: mysqli::$idx C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 79
ERROR - 2021-04-16 06:24:47 --> Severity: Notice --> Undefined property: mysqli::$ruang C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 79
ERROR - 2021-04-16 06:24:47 --> Severity: Notice --> Undefined property: mysqli_result::$idx C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 79
ERROR - 2021-04-16 06:24:47 --> Severity: Notice --> Undefined property: mysqli_result::$ruang C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 79
ERROR - 2021-04-16 06:24:47 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 79
ERROR - 2021-04-16 06:24:47 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 79
ERROR - 2021-04-16 06:24:47 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 79
ERROR - 2021-04-16 06:24:47 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 79
ERROR - 2021-04-16 06:24:47 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 79
ERROR - 2021-04-16 06:24:47 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 79
ERROR - 2021-04-16 06:24:47 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 79
ERROR - 2021-04-16 06:24:47 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 79
ERROR - 2021-04-16 06:24:47 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 79
ERROR - 2021-04-16 06:24:47 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 79
ERROR - 2021-04-16 06:24:47 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 79
ERROR - 2021-04-16 06:24:47 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 79
ERROR - 2021-04-16 06:24:47 --> Severity: Notice --> Undefined property: mysqli::$NRP C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 87
ERROR - 2021-04-16 06:24:47 --> Severity: Notice --> Undefined property: mysqli::$pgwNama C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 87
ERROR - 2021-04-16 06:24:47 --> Severity: Notice --> Undefined property: mysqli_result::$NRP C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 87
ERROR - 2021-04-16 06:24:47 --> Severity: Notice --> Undefined property: mysqli_result::$pgwNama C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 87
ERROR - 2021-04-16 06:24:47 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 87
ERROR - 2021-04-16 06:24:47 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 87
ERROR - 2021-04-16 06:24:47 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 87
ERROR - 2021-04-16 06:24:47 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 87
ERROR - 2021-04-16 06:24:47 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 87
ERROR - 2021-04-16 06:24:47 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 87
ERROR - 2021-04-16 06:24:47 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 87
ERROR - 2021-04-16 06:24:47 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 87
ERROR - 2021-04-16 06:24:47 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 87
ERROR - 2021-04-16 06:24:47 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 87
ERROR - 2021-04-16 06:24:47 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 87
ERROR - 2021-04-16 06:24:47 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 87
ERROR - 2021-04-16 06:25:10 --> Query error: Unknown column 'id_tarif' in 'field list' - Invalid query: SELECT id_tarif FROM tbl02_temp_permintaan_tindakan_penunjang WHERE id_daftar='2021021524' AND reg_unit='RJ-210416-08-0011'
ERROR - 2021-04-16 06:25:10 --> Query error: Unknown column 'id_tarif' in 'on clause' - Invalid query: SELECT *
FROM `tbl02_temp_permintaan_tindakan_penunjang`
JOIN `tbl01_tarif_layanan` ON `id_tarif`=`idx`
WHERE `id_daftar` = '2021021524'
AND `reg_unit` = 'RJ-210416-08-0011'
AND   (
`tbl01_tarif_layanan`.`layanan` LIKE '%%' ESCAPE '!'
 )
ERROR - 2021-04-16 06:25:14 --> Severity: Notice --> Undefined property: mysqli::$idx C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 79
ERROR - 2021-04-16 06:25:14 --> Severity: Notice --> Undefined property: mysqli::$ruang C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 79
ERROR - 2021-04-16 06:25:14 --> Severity: Notice --> Undefined property: mysqli_result::$idx C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 79
ERROR - 2021-04-16 06:25:14 --> Severity: Notice --> Undefined property: mysqli_result::$ruang C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 79
ERROR - 2021-04-16 06:25:14 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 79
ERROR - 2021-04-16 06:25:14 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 79
ERROR - 2021-04-16 06:25:14 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 79
ERROR - 2021-04-16 06:25:14 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 79
ERROR - 2021-04-16 06:25:14 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 79
ERROR - 2021-04-16 06:25:14 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 79
ERROR - 2021-04-16 06:25:14 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 79
ERROR - 2021-04-16 06:25:14 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 79
ERROR - 2021-04-16 06:25:14 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 79
ERROR - 2021-04-16 06:25:14 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 79
ERROR - 2021-04-16 06:25:14 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 79
ERROR - 2021-04-16 06:25:14 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 79
ERROR - 2021-04-16 06:25:14 --> Severity: Notice --> Undefined property: mysqli::$NRP C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 87
ERROR - 2021-04-16 06:25:14 --> Severity: Notice --> Undefined property: mysqli::$pgwNama C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 87
ERROR - 2021-04-16 06:25:14 --> Severity: Notice --> Undefined property: mysqli_result::$NRP C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 87
ERROR - 2021-04-16 06:25:14 --> Severity: Notice --> Undefined property: mysqli_result::$pgwNama C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 87
ERROR - 2021-04-16 06:25:14 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 87
ERROR - 2021-04-16 06:25:14 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 87
ERROR - 2021-04-16 06:25:14 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 87
ERROR - 2021-04-16 06:25:14 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 87
ERROR - 2021-04-16 06:25:14 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 87
ERROR - 2021-04-16 06:25:14 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 87
ERROR - 2021-04-16 06:25:14 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 87
ERROR - 2021-04-16 06:25:14 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 87
ERROR - 2021-04-16 06:25:14 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 87
ERROR - 2021-04-16 06:25:14 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 87
ERROR - 2021-04-16 06:25:14 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 87
ERROR - 2021-04-16 06:25:14 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 87
ERROR - 2021-04-16 06:25:52 --> Query error: Unknown column 'id_tarif' in 'on clause' - Invalid query: SELECT *
FROM `tbl02_temp_permintaan_tindakan_penunjang`
JOIN `tbl01_tarif_layanan` ON `id_tarif`=`idx`
WHERE `id_daftar` = '2021021524'
AND `reg_unit` = 'RJ-210416-08-0011'
AND   (
`tbl01_tarif_layanan`.`layanan` LIKE '%%' ESCAPE '!'
 )
ERROR - 2021-04-16 06:25:52 --> Query error: Unknown column 'id_tarif' in 'field list' - Invalid query: SELECT id_tarif FROM tbl02_temp_permintaan_tindakan_penunjang WHERE id_daftar='2021021524' AND reg_unit='RJ-210416-08-0011'
ERROR - 2021-04-16 06:28:35 --> Query error: Unknown column 'id_tarif' in 'field list' - Invalid query: SELECT id_tarif FROM tbl02_temp_permintaan_tindakan_penunjang WHERE id_daftar='2021021524' AND reg_unit='RJ-210416-08-0011'
ERROR - 2021-04-16 06:28:35 --> Query error: Unknown column 'id_tarif' in 'on clause' - Invalid query: SELECT *
FROM `tbl02_temp_permintaan_tindakan_penunjang`
JOIN `tbl01_tarif_layanan` ON `id_tarif`=`idx`
WHERE `id_daftar` = '2021021524'
AND `reg_unit` = 'RJ-210416-08-0011'
AND   (
`tbl01_tarif_layanan`.`layanan` LIKE '%%' ESCAPE '!'
 )
ERROR - 2021-04-16 09:00:17 --> Severity: Notice --> Undefined property: mysqli::$idx C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 79
ERROR - 2021-04-16 09:00:17 --> Severity: Notice --> Undefined property: mysqli::$ruang C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 79
ERROR - 2021-04-16 09:00:17 --> Severity: Notice --> Undefined property: mysqli_result::$idx C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 79
ERROR - 2021-04-16 09:00:17 --> Severity: Notice --> Undefined property: mysqli_result::$ruang C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 79
ERROR - 2021-04-16 09:00:17 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 79
ERROR - 2021-04-16 09:00:17 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 79
ERROR - 2021-04-16 09:00:17 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 79
ERROR - 2021-04-16 09:00:17 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 79
ERROR - 2021-04-16 09:00:17 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 79
ERROR - 2021-04-16 09:00:17 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 79
ERROR - 2021-04-16 09:00:17 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 79
ERROR - 2021-04-16 09:00:17 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 79
ERROR - 2021-04-16 09:00:17 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 79
ERROR - 2021-04-16 09:00:17 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 79
ERROR - 2021-04-16 09:00:17 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 79
ERROR - 2021-04-16 09:00:17 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 79
ERROR - 2021-04-16 09:00:17 --> Severity: Notice --> Undefined property: mysqli::$NRP C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 87
ERROR - 2021-04-16 09:00:17 --> Severity: Notice --> Undefined property: mysqli::$pgwNama C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 87
ERROR - 2021-04-16 09:00:17 --> Severity: Notice --> Undefined property: mysqli_result::$NRP C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 87
ERROR - 2021-04-16 09:00:17 --> Severity: Notice --> Undefined property: mysqli_result::$pgwNama C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 87
ERROR - 2021-04-16 09:00:17 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 87
ERROR - 2021-04-16 09:00:17 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 87
ERROR - 2021-04-16 09:00:17 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 87
ERROR - 2021-04-16 09:00:17 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 87
ERROR - 2021-04-16 09:00:17 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 87
ERROR - 2021-04-16 09:00:17 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 87
ERROR - 2021-04-16 09:00:17 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 87
ERROR - 2021-04-16 09:00:17 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 87
ERROR - 2021-04-16 09:00:17 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 87
ERROR - 2021-04-16 09:00:17 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 87
ERROR - 2021-04-16 09:00:17 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 87
ERROR - 2021-04-16 09:00:17 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_rujukan.php 87
ERROR - 2021-04-16 09:14:10 --> Query error: Unknown column 'undefined' in 'where clause' - Invalid query: SELECT *
FROM `tbl02_jadwaloperasi`
WHERE `undefined` = 'undefined'
ERROR - 2021-04-16 09:15:27 --> Query error: Unknown column 'undefined' in 'where clause' - Invalid query: SELECT *
FROM `tbl02_jadwaloperasi`
WHERE `undefined` = 'undefined'
ERROR - 2021-04-16 09:15:49 --> Query error: Unknown column 'undefined' in 'where clause' - Invalid query: SELECT *
FROM `tbl02_jadwaloperasi`
WHERE `undefined` = 'undefined'
ERROR - 2021-04-16 09:18:01 --> Query error: Unknown column 'undefined' in 'where clause' - Invalid query: SELECT *
FROM `tbl02_jadwaloperasi`
WHERE `undefined` = 'undefined'
ERROR - 2021-04-16 09:22:15 --> Query error: Unknown column 'undefined' in 'where clause' - Invalid query: SELECT *
FROM `tbl02_jadwaloperasi`
WHERE `undefined` = 'undefined'
ERROR - 2021-04-16 09:25:18 --> Query error: Unknown column 'dokterVerifikasi' in 'where clause' - Invalid query: SELECT *
FROM `tbl03_hasil_pemeriksaan_penunjang`
WHERE `nomr` = '965909'
AND `idjenispemeriksaan` = '12'
AND `dokterVerifikasi` <> ''
ORDER BY `reg_unit` DESC, `idjenispemeriksaan`
ERROR - 2021-04-16 09:25:19 --> Query error: Unknown column 'dokterVerifikasi' in 'where clause' - Invalid query: SELECT *
FROM `tbl03_hasil_pemeriksaan_penunjang`
WHERE `nomr` = '965909'
AND `idjenispemeriksaan` = '1'
AND `dokterVerifikasi` <> ''
ORDER BY `reg_unit` DESC, `idjenispemeriksaan`
ERROR - 2021-04-16 09:25:21 --> Query error: Unknown column 'dokterVerifikasi' in 'where clause' - Invalid query: SELECT *
FROM `tbl03_hasil_pemeriksaan_penunjang`
WHERE `nomr` = '965909'
AND `idjenispemeriksaan` = '9'
AND `dokterVerifikasi` <> ''
ORDER BY `reg_unit` DESC, `idjenispemeriksaan`
ERROR - 2021-04-16 09:25:33 --> Query error: Unknown column 'dokterVerifikasi' in 'where clause' - Invalid query: SELECT *
FROM `tbl03_hasil_pemeriksaan_penunjang`
WHERE `nomr` = '965909'
AND `idjenispemeriksaan` = '12'
AND `dokterVerifikasi` <> ''
ORDER BY `reg_unit` DESC, `idjenispemeriksaan`
ERROR - 2021-04-16 09:25:42 --> Query error: Unknown column 'dokterVerifikasi' in 'where clause' - Invalid query: SELECT *
FROM `tbl03_hasil_pemeriksaan_penunjang`
WHERE `nomr` = '965909'
AND `idjenispemeriksaan` = '1'
AND `dokterVerifikasi` <> ''
ORDER BY `reg_unit` DESC, `idjenispemeriksaan`
ERROR - 2021-04-16 09:50:19 --> Severity: Notice --> Undefined index: getDokter C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Layanan.php 1147
ERROR - 2021-04-16 09:50:19 --> Severity: Notice --> Undefined index: getRuangRujukan C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Layanan.php 1149
ERROR - 2021-04-16 09:50:19 --> Severity: Notice --> Undefined index: detail C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Layanan.php 1151
ERROR - 2021-04-16 09:50:19 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Layanan.php 1151
ERROR - 2021-04-16 09:50:52 --> Severity: Notice --> Undefined index: getDokter C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Layanan.php 1147
ERROR - 2021-04-16 09:50:52 --> Severity: Notice --> Undefined index: getRuangRujukan C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Layanan.php 1149
ERROR - 2021-04-16 09:50:52 --> Severity: Notice --> Undefined index: detail C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Layanan.php 1151
ERROR - 2021-04-16 09:50:52 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Layanan.php 1151
ERROR - 2021-04-16 09:51:47 --> Severity: Notice --> Undefined index: getDokter C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Layanan.php 1147
ERROR - 2021-04-16 09:51:47 --> Severity: Notice --> Undefined index: getRuangRujukan C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Layanan.php 1149
ERROR - 2021-04-16 09:51:47 --> Severity: Notice --> Undefined index: detail C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Layanan.php 1151
ERROR - 2021-04-16 09:51:47 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Layanan.php 1151
ERROR - 2021-04-16 09:51:47 --> Severity: Error --> Call to a member function result() on null C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_surat_kontrol.php 113
ERROR - 2021-04-16 09:52:55 --> Severity: Notice --> Undefined index: getRuangRujukan C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Layanan.php 1149
ERROR - 2021-04-16 09:52:55 --> Severity: Notice --> Undefined index: detail C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Layanan.php 1151
ERROR - 2021-04-16 09:52:55 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Layanan.php 1151
ERROR - 2021-04-16 09:52:55 --> Severity: Error --> Call to a member function result() on null C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_surat_kontrol.php 135
ERROR - 2021-04-16 09:53:59 --> Severity: Notice --> Undefined index: detail C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Layanan.php 1151
ERROR - 2021-04-16 09:53:59 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Layanan.php 1151
ERROR - 2021-04-16 09:53:59 --> Severity: Error --> Call to a member function result() on array C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_surat_kontrol.php 135
ERROR - 2021-04-16 09:54:25 --> Severity: Error --> Call to a member function result() on array C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_surat_kontrol.php 135
ERROR - 2021-04-16 09:54:41 --> Severity: Error --> Call to a member function result() on array C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_surat_kontrol.php 135
ERROR - 2021-04-16 09:55:55 --> Severity: Notice --> Undefined index: getRuangRujukan C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Layanan.php 1149
ERROR - 2021-04-16 09:55:55 --> Severity: Error --> Call to a member function result() on null C:\xampp32\htdocs\simrs\application\nota_tagihan\views\layanan\template_surat_kontrol.php 135
ERROR - 2021-04-16 09:56:56 --> Severity: Notice --> Undefined index: getRuangRujukan C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Layanan.php 1149
ERROR - 2021-04-16 09:56:56 --> Severity: Notice --> Undefined variable: status_pulang C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Layanan.php 1218
ERROR - 2021-04-16 09:57:44 --> Severity: Notice --> Undefined variable: status_pulang C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Layanan.php 1218
ERROR - 2021-04-16 09:58:08 --> Severity: Notice --> Undefined index: getRuangRujukan C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Layanan.php 1149
ERROR - 2021-04-16 09:58:08 --> Severity: Notice --> Undefined index: detail C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Layanan.php 1151
ERROR - 2021-04-16 09:58:08 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Layanan.php 1151
ERROR - 2021-04-16 09:58:08 --> Severity: Notice --> Undefined variable: status_pulang C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Layanan.php 1218
ERROR - 2021-04-16 09:58:13 --> Severity: Notice --> Undefined index: getRuangRujukan C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Layanan.php 1149
ERROR - 2021-04-16 09:58:13 --> Severity: Notice --> Undefined index: detail C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Layanan.php 1151
ERROR - 2021-04-16 09:58:13 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Layanan.php 1151
ERROR - 2021-04-16 09:58:13 --> Severity: Notice --> Undefined variable: status_pulang C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Layanan.php 1218
ERROR - 2021-04-16 09:58:23 --> Severity: Notice --> Undefined index: getRuangRujukan C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Layanan.php 1149
ERROR - 2021-04-16 09:58:23 --> Severity: Notice --> Undefined index: detail C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Layanan.php 1151
ERROR - 2021-04-16 09:58:23 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Layanan.php 1151
ERROR - 2021-04-16 09:58:23 --> Severity: Notice --> Undefined variable: status_pulang C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Layanan.php 1218
ERROR - 2021-04-16 10:05:08 --> Query error: Unknown column 'id_tarif' in 'on clause' - Invalid query: SELECT *
FROM `tbl02_temp_permintaan_tindakan_penunjang`
JOIN `tbl01_tarif_layanan` ON `id_tarif`=`idx`
WHERE `id_daftar` = '2021021298'
AND `reg_unit` = 'RI-210415-61-0001'
AND   (
`tbl01_tarif_layanan`.`layanan` LIKE '%%' ESCAPE '!'
 )
ERROR - 2021-04-16 10:05:08 --> Query error: Unknown column 'id_tarif' in 'field list' - Invalid query: SELECT id_tarif FROM tbl02_temp_permintaan_tindakan_penunjang WHERE id_daftar='2021021298' AND reg_unit='RI-210415-61-0001'
