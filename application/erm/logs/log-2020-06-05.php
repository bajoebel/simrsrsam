<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2020-06-05 03:15:31 --> Query error: Unknown column 'id_tarif' in 'field list' - Invalid query: SELECT id_tarif FROM tbl02_temp_permintaan_tindakan_penunjang WHERE id_daftar='2020091675' AND reg_unit='RJ-200605-08-0001'
ERROR - 2020-06-05 03:15:31 --> Query error: Unknown column 'id_tarif' in 'on clause' - Invalid query: SELECT *
FROM `tbl02_temp_permintaan_tindakan_penunjang`
JOIN `tbl01_tarif_layanan` ON `id_tarif`=`idx`
WHERE `id_daftar` = '2020091675'
AND `reg_unit` = 'RJ-200605-08-0001'
AND   (
`tbl01_tarif_layanan`.`layanan` LIKE '%%' ESCAPE '!'
 )
ERROR - 2020-06-05 03:26:54 --> Severity: error --> Exception: Too few arguments to function nota_tagihan::getlayananoperasi(), 0 passed in D:\xampp\htdocs\simrs_open_source\system\core\CodeIgniter.php on line 532 and at least 1 expected D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\nota_tagihan.php 2400
ERROR - 2020-06-05 03:27:48 --> Query error: Table 'db_rs_open_dev.tbl01_tarif_operasi1' doesn't exist - Invalid query: SELECT *
FROM `tbl01_tarif_operasi1`
JOIN `tbl01_tarif_layanan` ON `idtarif`=`idx`
WHERE `kelas_id` = '1'
AND `anestesi` = 0
AND `cito` = 0
ERROR - 2020-06-05 03:50:12 --> Query error: Table 'db_rs_open_dev.tbl01_tarif_operasi1' doesn't exist - Invalid query: SELECT *
FROM `tbl01_tarif_operasi1`
JOIN `tbl01_tarif_layanan` ON `idtarif`=`idx`
WHERE `kelas_id` = '3'
AND `anestesi` = '0'
AND `cito` = '0'
ERROR - 2020-06-05 03:50:29 --> Query error: Table 'db_rs_open_dev.tbl01_tarif_operasi1' doesn't exist - Invalid query: SELECT *
FROM `tbl01_tarif_operasi1`
JOIN `tbl01_tarif_layanan` ON `idtarif`=`idx`
WHERE `kelas_id` = '3'
AND `anestesi` = '0'
AND `cito` = '1'
ERROR - 2020-06-05 03:50:37 --> Query error: Table 'db_rs_open_dev.tbl01_tarif_operasi1' doesn't exist - Invalid query: SELECT *
FROM `tbl01_tarif_operasi1`
JOIN `tbl01_tarif_layanan` ON `idtarif`=`idx`
WHERE `kelas_id` = '2'
AND `anestesi` = '0'
AND `cito` = '1'
ERROR - 2020-06-05 03:50:40 --> Query error: Table 'db_rs_open_dev.tbl01_tarif_operasi1' doesn't exist - Invalid query: SELECT *
FROM `tbl01_tarif_operasi1`
JOIN `tbl01_tarif_layanan` ON `idtarif`=`idx`
WHERE `kelas_id` = '2'
AND `anestesi` = '1'
AND `cito` = '1'
ERROR - 2020-06-05 03:50:41 --> Query error: Table 'db_rs_open_dev.tbl01_tarif_operasi1' doesn't exist - Invalid query: SELECT *
FROM `tbl01_tarif_operasi1`
JOIN `tbl01_tarif_layanan` ON `idtarif`=`idx`
WHERE `kelas_id` = '2'
AND `anestesi` = '1'
AND `cito` = '0'
ERROR - 2020-06-05 03:50:43 --> Query error: Table 'db_rs_open_dev.tbl01_tarif_operasi1' doesn't exist - Invalid query: SELECT *
FROM `tbl01_tarif_operasi1`
JOIN `tbl01_tarif_layanan` ON `idtarif`=`idx`
WHERE `kelas_id` = '2'
AND `anestesi` = '1'
AND `cito` = '1'
ERROR - 2020-06-05 03:55:42 --> Query error: Table 'db_rs_open_dev.tbl01_tarif_operasi1' doesn't exist - Invalid query: SELECT *
FROM `tbl01_tarif_operasi1`
JOIN `tbl01_tarif_layanan` ON `idtarif`=`idx`
WHERE `kelas_id` = '1'
AND `anestesi` = 0
AND `cito` = 0
ERROR - 2020-06-05 05:14:28 --> Query error: Unknown column 'undefined' in 'where clause' - Invalid query: SELECT *
FROM `tbl02_jadwaloperasi`
WHERE `undefined` = 'undefined'
ERROR - 2020-06-05 06:01:09 --> Severity: error --> Exception: Call to undefined method CI_DB_mysqli_result::num_row() D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\nota_tagihan.php 3034
ERROR - 2020-06-05 06:08:09 --> Severity: error --> Exception: Too few arguments to function nota_tagihan::getlayananoperasi(), 0 passed in D:\xampp\htdocs\simrs_open_source\system\core\CodeIgniter.php on line 532 and at least 1 expected D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\nota_tagihan.php 2400
ERROR - 2020-06-05 06:09:22 --> Severity: error --> Exception: Too few arguments to function nota_tagihan::getlayananoperasi(), 0 passed in D:\xampp\htdocs\simrs_open_source\system\core\CodeIgniter.php on line 532 and at least 1 expected D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\nota_tagihan.php 2401
ERROR - 2020-06-05 06:10:03 --> Severity: error --> Exception: Call to undefined method CI_DB_mysqli_result::num_row() D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\nota_tagihan.php 3035
ERROR - 2020-06-05 06:10:55 --> Severity: error --> Exception: Call to undefined method CI_DB_mysqli_result::num_row() D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\nota_tagihan.php 3035
ERROR - 2020-06-05 06:11:01 --> Severity: error --> Exception: Call to undefined method CI_DB_mysqli_result::num_row() D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\nota_tagihan.php 3035
ERROR - 2020-06-05 06:41:12 --> Query error: Unknown column 'id_tarif' in 'on clause' - Invalid query: SELECT *
FROM `tbl02_temp_permintaan_tindakan_penunjang`
JOIN `tbl01_tarif_layanan` ON `id_tarif`=`idx`
WHERE `id_daftar` = '2020091675'
AND `reg_unit` = 'RI-200605-57-0001'
AND   (
`tbl01_tarif_layanan`.`layanan` LIKE '%%' ESCAPE '!'
 )
ERROR - 2020-06-05 06:41:12 --> Query error: Unknown column 'id_tarif' in 'field list' - Invalid query: SELECT id_tarif FROM tbl02_temp_permintaan_tindakan_penunjang WHERE id_daftar='2020091675' AND reg_unit='RI-200605-57-0001'
ERROR - 2020-06-05 06:42:21 --> Query error: Unknown column 'id_tarif' in 'field list' - Invalid query: SELECT id_tarif FROM tbl02_temp_permintaan_tindakan_penunjang WHERE id_daftar='2020091675' AND reg_unit='RI-200605-57-0001'
ERROR - 2020-06-05 06:42:21 --> Query error: Unknown column 'id_tarif' in 'on clause' - Invalid query: SELECT *
FROM `tbl02_temp_permintaan_tindakan_penunjang`
JOIN `tbl01_tarif_layanan` ON `id_tarif`=`idx`
WHERE `id_daftar` = '2020091675'
AND `reg_unit` = 'RI-200605-57-0001'
AND   (
`tbl01_tarif_layanan`.`layanan` LIKE '%%' ESCAPE '!'
 )
ERROR - 2020-06-05 06:42:58 --> Query error: Unknown column 'id_tarif' in 'on clause' - Invalid query: SELECT *
FROM `tbl02_temp_permintaan_tindakan_penunjang`
JOIN `tbl01_tarif_layanan` ON `id_tarif`=`idx`
WHERE `id_daftar` = '2020091675'
AND `reg_unit` = 'RI-200605-57-0001'
AND   (
`tbl01_tarif_layanan`.`layanan` LIKE '%%' ESCAPE '!'
 )
ERROR - 2020-06-05 06:42:58 --> Query error: Unknown column 'id_tarif' in 'field list' - Invalid query: SELECT id_tarif FROM tbl02_temp_permintaan_tindakan_penunjang WHERE id_daftar='2020091675' AND reg_unit='RI-200605-57-0001'
ERROR - 2020-06-05 06:45:21 --> Query error: Unknown column 'id_tarif' in 'field list' - Invalid query: SELECT id_tarif FROM tbl02_temp_permintaan_tindakan_penunjang WHERE id_daftar='2020091675' AND reg_unit='RI-200605-57-0001'
ERROR - 2020-06-05 06:45:21 --> Query error: Unknown column 'id_tarif' in 'on clause' - Invalid query: SELECT *
FROM `tbl02_temp_permintaan_tindakan_penunjang`
JOIN `tbl01_tarif_layanan` ON `id_tarif`=`idx`
WHERE `id_daftar` = '2020091675'
AND `reg_unit` = 'RI-200605-57-0001'
AND   (
`tbl01_tarif_layanan`.`layanan` LIKE '%%' ESCAPE '!'
 )
ERROR - 2020-06-05 06:46:13 --> Query error: Unknown column 'id_tarif' in 'field list' - Invalid query: SELECT id_tarif FROM tbl02_temp_permintaan_tindakan_penunjang WHERE id_daftar='2020091675' AND reg_unit='RI-200605-57-0001'
ERROR - 2020-06-05 06:46:13 --> Query error: Unknown column 'id_tarif' in 'on clause' - Invalid query: SELECT *
FROM `tbl02_temp_permintaan_tindakan_penunjang`
JOIN `tbl01_tarif_layanan` ON `id_tarif`=`idx`
WHERE `id_daftar` = '2020091675'
AND `reg_unit` = 'RI-200605-57-0001'
AND   (
`tbl01_tarif_layanan`.`layanan` LIKE '%%' ESCAPE '!'
 )
ERROR - 2020-06-05 08:53:57 --> Query error: Unknown column 'id_tarif' in 'on clause' - Invalid query: SELECT *
FROM `tbl02_temp_permintaan_tindakan_penunjang`
JOIN `tbl01_tarif_layanan` ON `id_tarif`=`idx`
WHERE `id_daftar` = '2020091675'
AND `reg_unit` = 'RI-200605-57-0001'
AND   (
`tbl01_tarif_layanan`.`layanan` LIKE '%%' ESCAPE '!'
 )
ERROR - 2020-06-05 08:53:57 --> Query error: Unknown column 'id_tarif' in 'field list' - Invalid query: SELECT id_tarif FROM tbl02_temp_permintaan_tindakan_penunjang WHERE id_daftar='2020091675' AND reg_unit='RI-200605-57-0001'
ERROR - 2020-06-05 08:54:05 --> Query error: Unknown column 'id_tarif' in 'on clause' - Invalid query: SELECT *
FROM `tbl02_temp_permintaan_tindakan_penunjang`
JOIN `tbl01_tarif_layanan` ON `id_tarif`=`idx`
WHERE `id_daftar` = '2020091675'
AND `reg_unit` = 'RI-200605-57-0001'
AND   (
`tbl01_tarif_layanan`.`layanan` LIKE '%%' ESCAPE '!'
 )
ERROR - 2020-06-05 08:54:05 --> Query error: Unknown column 'id_tarif' in 'field list' - Invalid query: SELECT id_tarif FROM tbl02_temp_permintaan_tindakan_penunjang WHERE id_daftar='2020091675' AND reg_unit='RI-200605-57-0001'
ERROR - 2020-06-05 08:54:14 --> Query error: Unknown column 'id_tarif' in 'field list' - Invalid query: SELECT id_tarif FROM tbl02_temp_permintaan_tindakan_penunjang WHERE id_daftar='2020091675' AND reg_unit='RI-200605-57-0001'
ERROR - 2020-06-05 08:54:14 --> Query error: Unknown column 'id_tarif' in 'on clause' - Invalid query: SELECT *
FROM `tbl02_temp_permintaan_tindakan_penunjang`
JOIN `tbl01_tarif_layanan` ON `id_tarif`=`idx`
WHERE `id_daftar` = '2020091675'
AND `reg_unit` = 'RI-200605-57-0001'
AND   (
`tbl01_tarif_layanan`.`layanan` LIKE '%%' ESCAPE '!'
 )
ERROR - 2020-06-05 08:54:24 --> Query error: Unknown column 'id_tarif' in 'field list' - Invalid query: SELECT id_tarif FROM tbl02_temp_permintaan_tindakan_penunjang WHERE id_daftar='2020091675' AND reg_unit='RI-200605-57-0001'
ERROR - 2020-06-05 08:54:24 --> Query error: Unknown column 'id_tarif' in 'on clause' - Invalid query: SELECT *
FROM `tbl02_temp_permintaan_tindakan_penunjang`
JOIN `tbl01_tarif_layanan` ON `id_tarif`=`idx`
WHERE `id_daftar` = '2020091675'
AND `reg_unit` = 'RI-200605-57-0001'
AND   (
`tbl01_tarif_layanan`.`layanan` LIKE '%%' ESCAPE '!'
 )
ERROR - 2020-06-05 08:54:47 --> Query error: Unknown column 'id_tarif' in 'on clause' - Invalid query: SELECT *
FROM `tbl02_temp_permintaan_tindakan_penunjang`
JOIN `tbl01_tarif_layanan` ON `id_tarif`=`idx`
WHERE `id_daftar` = '2020091675'
AND `reg_unit` = 'RI-200605-57-0001'
AND   (
`tbl01_tarif_layanan`.`layanan` LIKE '%%' ESCAPE '!'
 )
ERROR - 2020-06-05 08:54:47 --> Query error: Unknown column 'id_tarif' in 'field list' - Invalid query: SELECT id_tarif FROM tbl02_temp_permintaan_tindakan_penunjang WHERE id_daftar='2020091675' AND reg_unit='RI-200605-57-0001'
ERROR - 2020-06-05 08:54:50 --> Query error: Unknown column 'id_tarif' in 'field list' - Invalid query: SELECT id_tarif FROM tbl02_temp_permintaan_tindakan_penunjang WHERE id_daftar='2020091675' AND reg_unit='RI-200605-57-0001'
ERROR - 2020-06-05 08:54:50 --> Query error: Unknown column 'id_tarif' in 'on clause' - Invalid query: SELECT *
FROM `tbl02_temp_permintaan_tindakan_penunjang`
JOIN `tbl01_tarif_layanan` ON `id_tarif`=`idx`
WHERE `id_daftar` = '2020091675'
AND `reg_unit` = 'RI-200605-57-0001'
AND   (
`tbl01_tarif_layanan`.`layanan` LIKE '%%' ESCAPE '!'
 )
ERROR - 2020-06-05 08:54:56 --> Query error: Unknown column 'id_tarif' in 'on clause' - Invalid query: SELECT *
FROM `tbl02_temp_permintaan_tindakan_penunjang`
JOIN `tbl01_tarif_layanan` ON `id_tarif`=`idx`
WHERE `id_daftar` = '2020091675'
AND `reg_unit` = 'RI-200605-57-0001'
AND   (
`tbl01_tarif_layanan`.`layanan` LIKE '%%' ESCAPE '!'
 )
ERROR - 2020-06-05 08:54:56 --> Query error: Unknown column 'id_tarif' in 'field list' - Invalid query: SELECT id_tarif FROM tbl02_temp_permintaan_tindakan_penunjang WHERE id_daftar='2020091675' AND reg_unit='RI-200605-57-0001'
ERROR - 2020-06-05 08:55:05 --> Query error: Unknown column 'id_tarif' in 'field list' - Invalid query: SELECT id_tarif FROM tbl02_temp_permintaan_tindakan_penunjang WHERE id_daftar='2020091675' AND reg_unit='RI-200605-57-0001'
ERROR - 2020-06-05 08:55:05 --> Query error: Unknown column 'id_tarif' in 'on clause' - Invalid query: SELECT *
FROM `tbl02_temp_permintaan_tindakan_penunjang`
JOIN `tbl01_tarif_layanan` ON `id_tarif`=`idx`
WHERE `id_daftar` = '2020091675'
AND `reg_unit` = 'RI-200605-57-0001'
AND   (
`tbl01_tarif_layanan`.`layanan` LIKE '%%' ESCAPE '!'
 )
ERROR - 2020-06-05 10:42:37 --> Severity: Notice --> Undefined variable: judul D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 77
ERROR - 2020-06-05 10:42:37 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 79
ERROR - 2020-06-05 10:42:37 --> Severity: Notice --> Trying to get property 'tgl_buat' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 79
ERROR - 2020-06-05 10:42:37 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 83
ERROR - 2020-06-05 10:42:37 --> Severity: Notice --> Trying to get property 'nomor_surat_kontrol' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 83
ERROR - 2020-06-05 10:42:37 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 83
ERROR - 2020-06-05 10:42:37 --> Severity: Notice --> Trying to get property 'nama_ruang' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 83
ERROR - 2020-06-05 10:42:37 --> Severity: Notice --> Undefined offset: 1 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 83
ERROR - 2020-06-05 10:42:37 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 88
ERROR - 2020-06-05 10:42:37 --> Severity: Notice --> Trying to get property 'nomor_surat_kontrol' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 88
ERROR - 2020-06-05 10:42:37 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 91
ERROR - 2020-06-05 10:42:37 --> Severity: Notice --> Trying to get property 'nama_pasien' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 91
ERROR - 2020-06-05 10:42:37 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 94
ERROR - 2020-06-05 10:42:37 --> Severity: Notice --> Trying to get property 'diagnosa' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 94
ERROR - 2020-06-05 10:42:37 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 97
ERROR - 2020-06-05 10:42:37 --> Severity: Notice --> Trying to get property 'terapi' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 97
ERROR - 2020-06-05 10:42:37 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 100
ERROR - 2020-06-05 10:42:37 --> Severity: Notice --> Trying to get property 'tgl_rujukan' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 100
ERROR - 2020-06-05 10:42:37 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 106
ERROR - 2020-06-05 10:42:37 --> Severity: Notice --> Trying to get property 'alasan_kontrol' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 106
ERROR - 2020-06-05 10:42:37 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 115
ERROR - 2020-06-05 10:42:37 --> Severity: Notice --> Trying to get property 'nama_ruang' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 115
ERROR - 2020-06-05 10:42:37 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 118
ERROR - 2020-06-05 10:42:37 --> Severity: Notice --> Trying to get property 'rencana_tindaklanjut' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 118
ERROR - 2020-06-05 10:42:37 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 122
ERROR - 2020-06-05 10:42:37 --> Severity: Notice --> Trying to get property 'tgl_kontrol' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 122
ERROR - 2020-06-05 10:42:37 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 123
ERROR - 2020-06-05 10:42:37 --> Severity: Notice --> Trying to get property 'tgl_kontrol' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 123
ERROR - 2020-06-05 10:42:37 --> Severity: Notice --> Undefined offset: 2 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 140
ERROR - 2020-06-05 10:42:37 --> Severity: Notice --> Undefined offset: 1 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 140
ERROR - 2020-06-05 10:42:37 --> Severity: Notice --> Undefined offset: 2 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 144
ERROR - 2020-06-05 10:42:37 --> Severity: Notice --> Undefined offset: 1 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 144
ERROR - 2020-06-05 10:42:37 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 150
ERROR - 2020-06-05 10:42:37 --> Severity: Notice --> Trying to get property 'nama_dokter' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 150
ERROR - 2020-06-05 10:43:00 --> Severity: Notice --> Undefined variable: judul D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 77
ERROR - 2020-06-05 10:43:00 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 79
ERROR - 2020-06-05 10:43:00 --> Severity: Notice --> Trying to get property 'tgl_buat' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 79
ERROR - 2020-06-05 10:43:00 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 83
ERROR - 2020-06-05 10:43:00 --> Severity: Notice --> Trying to get property 'nomor_surat_kontrol' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 83
ERROR - 2020-06-05 10:43:00 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 83
ERROR - 2020-06-05 10:43:00 --> Severity: Notice --> Trying to get property 'nama_ruang' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 83
ERROR - 2020-06-05 10:43:00 --> Severity: Notice --> Undefined offset: 1 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 83
ERROR - 2020-06-05 10:43:00 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 88
ERROR - 2020-06-05 10:43:00 --> Severity: Notice --> Trying to get property 'nomor_surat_kontrol' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 88
ERROR - 2020-06-05 10:43:00 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 91
ERROR - 2020-06-05 10:43:00 --> Severity: Notice --> Trying to get property 'nama_pasien' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 91
ERROR - 2020-06-05 10:43:00 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 94
ERROR - 2020-06-05 10:43:00 --> Severity: Notice --> Trying to get property 'diagnosa' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 94
ERROR - 2020-06-05 10:43:00 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 97
ERROR - 2020-06-05 10:43:00 --> Severity: Notice --> Trying to get property 'terapi' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 97
ERROR - 2020-06-05 10:43:00 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 100
ERROR - 2020-06-05 10:43:00 --> Severity: Notice --> Trying to get property 'tgl_rujukan' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 100
ERROR - 2020-06-05 10:43:00 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 106
ERROR - 2020-06-05 10:43:00 --> Severity: Notice --> Trying to get property 'alasan_kontrol' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 106
ERROR - 2020-06-05 10:43:00 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 115
ERROR - 2020-06-05 10:43:00 --> Severity: Notice --> Trying to get property 'nama_ruang' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 115
ERROR - 2020-06-05 10:43:00 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 118
ERROR - 2020-06-05 10:43:00 --> Severity: Notice --> Trying to get property 'rencana_tindaklanjut' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 118
ERROR - 2020-06-05 10:43:00 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 122
ERROR - 2020-06-05 10:43:00 --> Severity: Notice --> Trying to get property 'tgl_kontrol' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 122
ERROR - 2020-06-05 10:43:00 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 123
ERROR - 2020-06-05 10:43:00 --> Severity: Notice --> Trying to get property 'tgl_kontrol' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 123
ERROR - 2020-06-05 10:43:00 --> Severity: Notice --> Undefined offset: 2 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 140
ERROR - 2020-06-05 10:43:00 --> Severity: Notice --> Undefined offset: 1 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 140
ERROR - 2020-06-05 10:43:00 --> Severity: Notice --> Undefined offset: 2 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 144
ERROR - 2020-06-05 10:43:00 --> Severity: Notice --> Undefined offset: 1 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 144
ERROR - 2020-06-05 10:43:00 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 150
ERROR - 2020-06-05 10:43:00 --> Severity: Notice --> Trying to get property 'nama_dokter' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 150
ERROR - 2020-06-05 10:44:03 --> Severity: Notice --> Undefined property: stdClass::$jenis_pemeriksaan D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 77
ERROR - 2020-06-05 10:44:03 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 79
ERROR - 2020-06-05 10:44:03 --> Severity: Notice --> Trying to get property 'tgl_buat' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 79
ERROR - 2020-06-05 10:44:03 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 83
ERROR - 2020-06-05 10:44:03 --> Severity: Notice --> Trying to get property 'nomor_surat_kontrol' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 83
ERROR - 2020-06-05 10:44:03 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 83
ERROR - 2020-06-05 10:44:03 --> Severity: Notice --> Trying to get property 'nama_ruang' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 83
ERROR - 2020-06-05 10:44:03 --> Severity: Notice --> Undefined offset: 1 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 83
ERROR - 2020-06-05 10:44:03 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 88
ERROR - 2020-06-05 10:44:03 --> Severity: Notice --> Trying to get property 'nomor_surat_kontrol' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 88
ERROR - 2020-06-05 10:44:03 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 91
ERROR - 2020-06-05 10:44:03 --> Severity: Notice --> Trying to get property 'nama_pasien' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 91
ERROR - 2020-06-05 10:44:03 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 94
ERROR - 2020-06-05 10:44:03 --> Severity: Notice --> Trying to get property 'diagnosa' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 94
ERROR - 2020-06-05 10:44:03 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 97
ERROR - 2020-06-05 10:44:03 --> Severity: Notice --> Trying to get property 'terapi' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 97
ERROR - 2020-06-05 10:44:03 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 100
ERROR - 2020-06-05 10:44:03 --> Severity: Notice --> Trying to get property 'tgl_rujukan' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 100
ERROR - 2020-06-05 10:44:03 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 106
ERROR - 2020-06-05 10:44:03 --> Severity: Notice --> Trying to get property 'alasan_kontrol' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 106
ERROR - 2020-06-05 10:44:03 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 115
ERROR - 2020-06-05 10:44:03 --> Severity: Notice --> Trying to get property 'nama_ruang' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 115
ERROR - 2020-06-05 10:44:03 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 118
ERROR - 2020-06-05 10:44:03 --> Severity: Notice --> Trying to get property 'rencana_tindaklanjut' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 118
ERROR - 2020-06-05 10:44:03 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 122
ERROR - 2020-06-05 10:44:03 --> Severity: Notice --> Trying to get property 'tgl_kontrol' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 122
ERROR - 2020-06-05 10:44:03 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 123
ERROR - 2020-06-05 10:44:03 --> Severity: Notice --> Trying to get property 'tgl_kontrol' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 123
ERROR - 2020-06-05 10:44:03 --> Severity: Notice --> Undefined offset: 2 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 140
ERROR - 2020-06-05 10:44:03 --> Severity: Notice --> Undefined offset: 1 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 140
ERROR - 2020-06-05 10:44:03 --> Severity: Notice --> Undefined offset: 2 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 144
ERROR - 2020-06-05 10:44:03 --> Severity: Notice --> Undefined offset: 1 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 144
ERROR - 2020-06-05 10:44:03 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 150
ERROR - 2020-06-05 10:44:03 --> Severity: Notice --> Trying to get property 'nama_dokter' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 150
ERROR - 2020-06-05 10:45:31 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 79
ERROR - 2020-06-05 10:45:31 --> Severity: Notice --> Trying to get property 'tgl_buat' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 79
ERROR - 2020-06-05 10:45:31 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 83
ERROR - 2020-06-05 10:45:31 --> Severity: Notice --> Trying to get property 'nomor_surat_kontrol' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 83
ERROR - 2020-06-05 10:45:31 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 83
ERROR - 2020-06-05 10:45:31 --> Severity: Notice --> Trying to get property 'nama_ruang' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 83
ERROR - 2020-06-05 10:45:31 --> Severity: Notice --> Undefined offset: 1 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 83
ERROR - 2020-06-05 10:45:31 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 88
ERROR - 2020-06-05 10:45:31 --> Severity: Notice --> Trying to get property 'nomor_surat_kontrol' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 88
ERROR - 2020-06-05 10:45:31 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 91
ERROR - 2020-06-05 10:45:31 --> Severity: Notice --> Trying to get property 'nama_pasien' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 91
ERROR - 2020-06-05 10:45:31 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 94
ERROR - 2020-06-05 10:45:31 --> Severity: Notice --> Trying to get property 'diagnosa' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 94
ERROR - 2020-06-05 10:45:31 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 97
ERROR - 2020-06-05 10:45:31 --> Severity: Notice --> Trying to get property 'terapi' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 97
ERROR - 2020-06-05 10:45:31 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 100
ERROR - 2020-06-05 10:45:31 --> Severity: Notice --> Trying to get property 'tgl_rujukan' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 100
ERROR - 2020-06-05 10:45:31 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 106
ERROR - 2020-06-05 10:45:31 --> Severity: Notice --> Trying to get property 'alasan_kontrol' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 106
ERROR - 2020-06-05 10:45:31 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 115
ERROR - 2020-06-05 10:45:31 --> Severity: Notice --> Trying to get property 'nama_ruang' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 115
ERROR - 2020-06-05 10:45:31 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 118
ERROR - 2020-06-05 10:45:31 --> Severity: Notice --> Trying to get property 'rencana_tindaklanjut' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 118
ERROR - 2020-06-05 10:45:31 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 122
ERROR - 2020-06-05 10:45:31 --> Severity: Notice --> Trying to get property 'tgl_kontrol' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 122
ERROR - 2020-06-05 10:45:31 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 123
ERROR - 2020-06-05 10:45:31 --> Severity: Notice --> Trying to get property 'tgl_kontrol' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 123
ERROR - 2020-06-05 10:45:31 --> Severity: Notice --> Undefined offset: 2 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 140
ERROR - 2020-06-05 10:45:31 --> Severity: Notice --> Undefined offset: 1 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 140
ERROR - 2020-06-05 10:45:31 --> Severity: Notice --> Undefined offset: 2 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 144
ERROR - 2020-06-05 10:45:31 --> Severity: Notice --> Undefined offset: 1 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 144
ERROR - 2020-06-05 10:45:31 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 150
ERROR - 2020-06-05 10:45:31 --> Severity: Notice --> Trying to get property 'nama_dokter' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 150
ERROR - 2020-06-05 10:46:00 --> Severity: error --> Exception: Cannot use object of type stdClass as array D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 77
ERROR - 2020-06-05 10:46:13 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 79
ERROR - 2020-06-05 10:46:13 --> Severity: Notice --> Trying to get property 'tgl_buat' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 79
ERROR - 2020-06-05 10:46:14 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 83
ERROR - 2020-06-05 10:46:14 --> Severity: Notice --> Trying to get property 'nomor_surat_kontrol' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 83
ERROR - 2020-06-05 10:46:14 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 83
ERROR - 2020-06-05 10:46:14 --> Severity: Notice --> Trying to get property 'nama_ruang' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 83
ERROR - 2020-06-05 10:46:14 --> Severity: Notice --> Undefined offset: 1 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 83
ERROR - 2020-06-05 10:46:14 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 88
ERROR - 2020-06-05 10:46:14 --> Severity: Notice --> Trying to get property 'nomor_surat_kontrol' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 88
ERROR - 2020-06-05 10:46:14 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 91
ERROR - 2020-06-05 10:46:14 --> Severity: Notice --> Trying to get property 'nama_pasien' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 91
ERROR - 2020-06-05 10:46:14 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 94
ERROR - 2020-06-05 10:46:14 --> Severity: Notice --> Trying to get property 'diagnosa' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 94
ERROR - 2020-06-05 10:46:14 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 97
ERROR - 2020-06-05 10:46:14 --> Severity: Notice --> Trying to get property 'terapi' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 97
ERROR - 2020-06-05 10:46:14 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 100
ERROR - 2020-06-05 10:46:14 --> Severity: Notice --> Trying to get property 'tgl_rujukan' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 100
ERROR - 2020-06-05 10:46:14 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 106
ERROR - 2020-06-05 10:46:14 --> Severity: Notice --> Trying to get property 'alasan_kontrol' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 106
ERROR - 2020-06-05 10:46:14 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 115
ERROR - 2020-06-05 10:46:14 --> Severity: Notice --> Trying to get property 'nama_ruang' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 115
ERROR - 2020-06-05 10:46:14 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 118
ERROR - 2020-06-05 10:46:14 --> Severity: Notice --> Trying to get property 'rencana_tindaklanjut' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 118
ERROR - 2020-06-05 10:46:14 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 122
ERROR - 2020-06-05 10:46:14 --> Severity: Notice --> Trying to get property 'tgl_kontrol' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 122
ERROR - 2020-06-05 10:46:14 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 123
ERROR - 2020-06-05 10:46:14 --> Severity: Notice --> Trying to get property 'tgl_kontrol' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 123
ERROR - 2020-06-05 10:46:14 --> Severity: Notice --> Undefined offset: 2 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 140
ERROR - 2020-06-05 10:46:14 --> Severity: Notice --> Undefined offset: 1 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 140
ERROR - 2020-06-05 10:46:14 --> Severity: Notice --> Undefined offset: 2 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 144
ERROR - 2020-06-05 10:46:14 --> Severity: Notice --> Undefined offset: 1 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 144
ERROR - 2020-06-05 10:46:14 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 150
ERROR - 2020-06-05 10:46:14 --> Severity: Notice --> Trying to get property 'nama_dokter' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 150
ERROR - 2020-06-05 10:46:29 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 79
ERROR - 2020-06-05 10:46:29 --> Severity: Notice --> Trying to get property 'tgl_buat' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 79
ERROR - 2020-06-05 10:46:29 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 83
ERROR - 2020-06-05 10:46:29 --> Severity: Notice --> Trying to get property 'nomor_surat_kontrol' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 83
ERROR - 2020-06-05 10:46:29 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 83
ERROR - 2020-06-05 10:46:29 --> Severity: Notice --> Trying to get property 'nama_ruang' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 83
ERROR - 2020-06-05 10:46:29 --> Severity: Notice --> Undefined offset: 1 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 83
ERROR - 2020-06-05 10:46:29 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 88
ERROR - 2020-06-05 10:46:29 --> Severity: Notice --> Trying to get property 'nomor_surat_kontrol' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 88
ERROR - 2020-06-05 10:46:29 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 91
ERROR - 2020-06-05 10:46:29 --> Severity: Notice --> Trying to get property 'nama_pasien' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 91
ERROR - 2020-06-05 10:46:29 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 94
ERROR - 2020-06-05 10:46:29 --> Severity: Notice --> Trying to get property 'diagnosa' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 94
ERROR - 2020-06-05 10:46:29 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 97
ERROR - 2020-06-05 10:46:29 --> Severity: Notice --> Trying to get property 'terapi' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 97
ERROR - 2020-06-05 10:46:29 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 100
ERROR - 2020-06-05 10:46:29 --> Severity: Notice --> Trying to get property 'tgl_rujukan' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 100
ERROR - 2020-06-05 10:46:29 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 106
ERROR - 2020-06-05 10:46:30 --> Severity: Notice --> Trying to get property 'alasan_kontrol' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 106
ERROR - 2020-06-05 10:46:30 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 115
ERROR - 2020-06-05 10:46:30 --> Severity: Notice --> Trying to get property 'nama_ruang' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 115
ERROR - 2020-06-05 10:46:30 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 118
ERROR - 2020-06-05 10:46:30 --> Severity: Notice --> Trying to get property 'rencana_tindaklanjut' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 118
ERROR - 2020-06-05 10:46:30 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 122
ERROR - 2020-06-05 10:46:30 --> Severity: Notice --> Trying to get property 'tgl_kontrol' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 122
ERROR - 2020-06-05 10:46:30 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 123
ERROR - 2020-06-05 10:46:30 --> Severity: Notice --> Trying to get property 'tgl_kontrol' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 123
ERROR - 2020-06-05 10:46:30 --> Severity: Notice --> Undefined offset: 2 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 140
ERROR - 2020-06-05 10:46:30 --> Severity: Notice --> Undefined offset: 1 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 140
ERROR - 2020-06-05 10:46:30 --> Severity: Notice --> Undefined offset: 2 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 144
ERROR - 2020-06-05 10:46:30 --> Severity: Notice --> Undefined offset: 1 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 144
ERROR - 2020-06-05 10:46:30 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 150
ERROR - 2020-06-05 10:46:30 --> Severity: Notice --> Trying to get property 'nama_dokter' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 150
ERROR - 2020-06-05 10:48:02 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 79
ERROR - 2020-06-05 10:48:02 --> Severity: Notice --> Trying to get property 'tgl_buat' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 79
ERROR - 2020-06-05 10:48:02 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 88
ERROR - 2020-06-05 10:48:02 --> Severity: Notice --> Trying to get property 'nomor_surat_kontrol' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 88
ERROR - 2020-06-05 10:48:02 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 91
ERROR - 2020-06-05 10:48:02 --> Severity: Notice --> Trying to get property 'nama_pasien' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 91
ERROR - 2020-06-05 10:48:02 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 94
ERROR - 2020-06-05 10:48:02 --> Severity: Notice --> Trying to get property 'diagnosa' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 94
ERROR - 2020-06-05 10:48:02 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 97
ERROR - 2020-06-05 10:48:02 --> Severity: Notice --> Trying to get property 'terapi' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 97
ERROR - 2020-06-05 10:48:02 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 100
ERROR - 2020-06-05 10:48:02 --> Severity: Notice --> Trying to get property 'tgl_rujukan' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 100
ERROR - 2020-06-05 10:48:02 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 106
ERROR - 2020-06-05 10:48:02 --> Severity: Notice --> Trying to get property 'alasan_kontrol' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 106
ERROR - 2020-06-05 10:48:02 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 115
ERROR - 2020-06-05 10:48:02 --> Severity: Notice --> Trying to get property 'nama_ruang' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 115
ERROR - 2020-06-05 10:48:02 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 118
ERROR - 2020-06-05 10:48:02 --> Severity: Notice --> Trying to get property 'rencana_tindaklanjut' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 118
ERROR - 2020-06-05 10:48:02 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 122
ERROR - 2020-06-05 10:48:02 --> Severity: Notice --> Trying to get property 'tgl_kontrol' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 122
ERROR - 2020-06-05 10:48:02 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 123
ERROR - 2020-06-05 10:48:02 --> Severity: Notice --> Trying to get property 'tgl_kontrol' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 123
ERROR - 2020-06-05 10:48:02 --> Severity: Notice --> Undefined offset: 2 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 140
ERROR - 2020-06-05 10:48:02 --> Severity: Notice --> Undefined offset: 1 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 140
ERROR - 2020-06-05 10:48:02 --> Severity: Notice --> Undefined offset: 2 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 144
ERROR - 2020-06-05 10:48:02 --> Severity: Notice --> Undefined offset: 1 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 144
ERROR - 2020-06-05 10:48:02 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 150
ERROR - 2020-06-05 10:48:02 --> Severity: Notice --> Trying to get property 'nama_dokter' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 150
ERROR - 2020-06-05 10:50:12 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 79
ERROR - 2020-06-05 10:50:12 --> Severity: Notice --> Trying to get property 'tgl_buat' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 79
ERROR - 2020-06-05 10:50:12 --> Severity: Notice --> Trying to get property 'nama_pasien' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 88
ERROR - 2020-06-05 10:50:12 --> Severity: Notice --> Trying to get property 'alamat' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 91
ERROR - 2020-06-05 10:50:12 --> Severity: Notice --> Trying to get property 'ruang_pengirim' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 94
ERROR - 2020-06-05 10:50:12 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 101
ERROR - 2020-06-05 10:50:12 --> Severity: Notice --> Trying to get property 'alasan_kontrol' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 101
ERROR - 2020-06-05 10:50:12 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 110
ERROR - 2020-06-05 10:50:12 --> Severity: Notice --> Trying to get property 'nama_ruang' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 110
ERROR - 2020-06-05 10:50:12 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 113
ERROR - 2020-06-05 10:50:12 --> Severity: Notice --> Trying to get property 'rencana_tindaklanjut' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 113
ERROR - 2020-06-05 10:50:12 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 117
ERROR - 2020-06-05 10:50:12 --> Severity: Notice --> Trying to get property 'tgl_kontrol' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 117
ERROR - 2020-06-05 10:50:12 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 118
ERROR - 2020-06-05 10:50:12 --> Severity: Notice --> Trying to get property 'tgl_kontrol' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 118
ERROR - 2020-06-05 10:50:12 --> Severity: Notice --> Undefined offset: 2 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 135
ERROR - 2020-06-05 10:50:12 --> Severity: Notice --> Undefined offset: 1 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 135
ERROR - 2020-06-05 10:50:12 --> Severity: Notice --> Undefined offset: 2 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 139
ERROR - 2020-06-05 10:50:12 --> Severity: Notice --> Undefined offset: 1 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 139
ERROR - 2020-06-05 10:50:12 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 145
ERROR - 2020-06-05 10:50:12 --> Severity: Notice --> Trying to get property 'nama_dokter' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 145
ERROR - 2020-06-05 10:50:52 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 79
ERROR - 2020-06-05 10:50:52 --> Severity: Notice --> Trying to get property 'tgl_buat' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 79
ERROR - 2020-06-05 10:50:52 --> Severity: Notice --> Trying to get property 'nama_pasien' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 88
ERROR - 2020-06-05 10:50:52 --> Severity: Notice --> Trying to get property 'alamat' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 91
ERROR - 2020-06-05 10:50:52 --> Severity: Notice --> Trying to get property 'ruang_pengirim' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 94
ERROR - 2020-06-05 10:50:52 --> Severity: Notice --> Undefined offset: 2 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 100
ERROR - 2020-06-05 10:50:52 --> Severity: Notice --> Undefined offset: 1 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 100
ERROR - 2020-06-05 10:50:52 --> Severity: Notice --> Undefined variable: bulan D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 100
ERROR - 2020-06-05 10:50:52 --> Severity: Notice --> Trying to access array offset on value of type null D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 100
ERROR - 2020-06-05 10:50:52 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 106
ERROR - 2020-06-05 10:50:52 --> Severity: Notice --> Trying to get property 'nama_dokter' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 106
ERROR - 2020-06-05 10:51:33 --> Severity: Notice --> Trying to get property 'tgl_periksa' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 79
ERROR - 2020-06-05 10:51:33 --> Severity: Notice --> Trying to get property 'nama_pasien' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 88
ERROR - 2020-06-05 10:51:33 --> Severity: Notice --> Trying to get property 'alamat' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 91
ERROR - 2020-06-05 10:51:33 --> Severity: Notice --> Trying to get property 'ruang_pengirim' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 94
ERROR - 2020-06-05 10:51:33 --> Severity: Notice --> Undefined offset: 2 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 100
ERROR - 2020-06-05 10:51:33 --> Severity: Notice --> Undefined offset: 1 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 100
ERROR - 2020-06-05 10:51:33 --> Severity: Notice --> Undefined variable: bulan D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 100
ERROR - 2020-06-05 10:51:33 --> Severity: Notice --> Trying to access array offset on value of type null D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 100
ERROR - 2020-06-05 10:51:33 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 106
ERROR - 2020-06-05 10:51:33 --> Severity: Notice --> Trying to get property 'nama_dokter' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 106
ERROR - 2020-06-05 10:51:52 --> Severity: Notice --> Undefined property: stdClass::$tgl_periksa D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 79
ERROR - 2020-06-05 10:51:52 --> Severity: Notice --> Trying to get property 'nama_pasien' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 88
ERROR - 2020-06-05 10:51:52 --> Severity: Notice --> Trying to get property 'alamat' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 91
ERROR - 2020-06-05 10:51:52 --> Severity: Notice --> Trying to get property 'ruang_pengirim' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 94
ERROR - 2020-06-05 10:51:52 --> Severity: Notice --> Undefined offset: 2 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 100
ERROR - 2020-06-05 10:51:52 --> Severity: Notice --> Undefined offset: 1 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 100
ERROR - 2020-06-05 10:51:52 --> Severity: Notice --> Undefined variable: bulan D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 100
ERROR - 2020-06-05 10:51:52 --> Severity: Notice --> Trying to access array offset on value of type null D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 100
ERROR - 2020-06-05 10:51:52 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 106
ERROR - 2020-06-05 10:51:53 --> Severity: Notice --> Trying to get property 'nama_dokter' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 106
ERROR - 2020-06-05 10:52:34 --> Severity: Notice --> Trying to get property 'nama_pasien' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 88
ERROR - 2020-06-05 10:52:34 --> Severity: Notice --> Trying to get property 'alamat' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 91
ERROR - 2020-06-05 10:52:34 --> Severity: Notice --> Trying to get property 'ruang_pengirim' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 94
ERROR - 2020-06-05 10:52:34 --> Severity: Notice --> Undefined variable: bulan D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 100
ERROR - 2020-06-05 10:52:34 --> Severity: Notice --> Trying to access array offset on value of type null D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 100
ERROR - 2020-06-05 10:52:34 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 106
ERROR - 2020-06-05 10:52:34 --> Severity: Notice --> Trying to get property 'nama_dokter' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 106
ERROR - 2020-06-05 10:53:02 --> Severity: error --> Exception: syntax error, unexpected '0' (T_LNUMBER), expecting ';' or ',' D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 94
ERROR - 2020-06-05 10:53:15 --> Severity: Notice --> Undefined property: stdClass::$alamat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 91
ERROR - 2020-06-05 10:53:15 --> Severity: Notice --> Undefined property: stdClass::$ruang_pengirim D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 94
ERROR - 2020-06-05 10:53:15 --> Severity: Notice --> Undefined variable: bulan D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 100
ERROR - 2020-06-05 10:53:15 --> Severity: Notice --> Trying to access array offset on value of type null D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 100
ERROR - 2020-06-05 10:53:15 --> Severity: Notice --> Undefined variable: surat D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 106
ERROR - 2020-06-05 10:53:15 --> Severity: Notice --> Trying to get property 'nama_dokter' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 106
