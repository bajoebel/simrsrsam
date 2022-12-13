<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2020-08-25 03:55:36 --> Query error: Unknown column 'id_tarif' in 'field list' - Invalid query: SELECT id_tarif FROM tbl02_temp_permintaan_tindakan_penunjang WHERE id_daftar='2020105513' AND reg_unit='GD-200825-05-0001'
ERROR - 2020-08-25 03:55:36 --> Query error: Unknown column 'id_tarif' in 'on clause' - Invalid query: SELECT *
FROM `tbl02_temp_permintaan_tindakan_penunjang`
JOIN `tbl01_tarif_layanan` ON `id_tarif`=`idx`
WHERE `id_daftar` = '2020105513'
AND `reg_unit` = 'GD-200825-05-0001'
AND   (
`tbl01_tarif_layanan`.`layanan` LIKE '%%' ESCAPE '!'
 )
ERROR - 2020-08-25 04:18:54 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\nota_tagihan.php 2589
ERROR - 2020-08-25 04:47:55 --> Severity: error --> Exception: syntax error, unexpected end of file D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 279
ERROR - 2020-08-25 05:03:15 --> Query error: Unknown column 'id_tarif' in 'on clause' - Invalid query: SELECT *
FROM `tbl02_temp_permintaan_tindakan_penunjang`
JOIN `tbl01_tarif_layanan` ON `id_tarif`=`idx`
WHERE `id_daftar` = '2020105513'
AND `reg_unit` = 'GD-200825-05-0001'
AND   (
`tbl01_tarif_layanan`.`layanan` LIKE '%%' ESCAPE '!'
 )
ERROR - 2020-08-25 05:03:15 --> Query error: Unknown column 'id_tarif' in 'field list' - Invalid query: SELECT id_tarif FROM tbl02_temp_permintaan_tindakan_penunjang WHERE id_daftar='2020105513' AND reg_unit='GD-200825-05-0001'
ERROR - 2020-08-25 05:34:25 --> Query error: Unknown column 'id_tarif' in 'field list' - Invalid query: SELECT id_tarif FROM tbl02_temp_permintaan_tindakan_penunjang WHERE id_daftar='2020105513' AND reg_unit='GD-200825-05-0001'
ERROR - 2020-08-25 05:34:25 --> Query error: Unknown column 'id_tarif' in 'on clause' - Invalid query: SELECT *
FROM `tbl02_temp_permintaan_tindakan_penunjang`
JOIN `tbl01_tarif_layanan` ON `id_tarif`=`idx`
WHERE `id_daftar` = '2020105513'
AND `reg_unit` = 'GD-200825-05-0001'
AND   (
`tbl01_tarif_layanan`.`layanan` LIKE '%%' ESCAPE '!'
 )
ERROR - 2020-08-25 05:35:13 --> Query error: Unknown column 'id_tarif' in 'field list' - Invalid query: SELECT id_tarif FROM tbl02_temp_permintaan_tindakan_penunjang WHERE id_daftar='2020105513' AND reg_unit='GD-200825-05-0001'
ERROR - 2020-08-25 05:35:13 --> Query error: Unknown column 'id_tarif' in 'on clause' - Invalid query: SELECT *
FROM `tbl02_temp_permintaan_tindakan_penunjang`
JOIN `tbl01_tarif_layanan` ON `id_tarif`=`idx`
WHERE `id_daftar` = '2020105513'
AND `reg_unit` = 'GD-200825-05-0001'
AND   (
`tbl01_tarif_layanan`.`layanan` LIKE '%%' ESCAPE '!'
 )
ERROR - 2020-08-25 05:43:16 --> Query error: Unknown column 'id_tarif' in 'on clause' - Invalid query: SELECT *
FROM `tbl02_temp_permintaan_tindakan_penunjang`
JOIN `tbl01_tarif_layanan` ON `id_tarif`=`idx`
WHERE `id_daftar` = '2020105513'
AND `reg_unit` = 'RI-200825-55-0001'
AND   (
`tbl01_tarif_layanan`.`layanan` LIKE '%%' ESCAPE '!'
 )
ERROR - 2020-08-25 05:43:16 --> Query error: Unknown column 'id_tarif' in 'field list' - Invalid query: SELECT id_tarif FROM tbl02_temp_permintaan_tindakan_penunjang WHERE id_daftar='2020105513' AND reg_unit='RI-200825-55-0001'
ERROR - 2020-08-25 05:59:36 --> Severity: Notice --> Undefined property: stdClass::$nama_pemeriksaan D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 269
ERROR - 2020-08-25 06:11:08 --> Query error: Unknown column 'undefined' in 'where clause' - Invalid query: SELECT *
FROM `tbl02_jadwaloperasi`
WHERE `undefined` = 'undefined'
ERROR - 2020-08-25 06:11:16 --> Query error: Unknown column 'undefined' in 'where clause' - Invalid query: SELECT *
FROM `tbl02_jadwaloperasi`
WHERE `undefined` = 'undefined'
ERROR - 2020-08-25 06:11:36 --> Query error: Unknown column 'id_tarif' in 'on clause' - Invalid query: SELECT *
FROM `tbl02_temp_permintaan_tindakan_penunjang`
JOIN `tbl01_tarif_layanan` ON `id_tarif`=`idx`
WHERE `id_daftar` = '2020105513'
AND `reg_unit` = 'RI-200825-57-0001'
AND   (
`tbl01_tarif_layanan`.`layanan` LIKE '%%' ESCAPE '!'
 )
ERROR - 2020-08-25 06:11:36 --> Query error: Unknown column 'id_tarif' in 'field list' - Invalid query: SELECT id_tarif FROM tbl02_temp_permintaan_tindakan_penunjang WHERE id_daftar='2020105513' AND reg_unit='RI-200825-57-0001'
ERROR - 2020-08-25 09:17:27 --> Severity: error --> Exception: syntax error, unexpected 'echo' (T_ECHO), expecting ';' or ',' D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\cetak_hasil_pemeriksaan.php 271
ERROR - 2020-08-25 10:27:19 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0' at line 3 - Invalid query: SELECT *
FROM `tbl02_notifikasi_transaksi`
WHERE `notif_tujuan` IN()
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0
ERROR - 2020-08-25 10:28:20 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0' at line 3 - Invalid query: SELECT *
FROM `tbl02_notifikasi_transaksi`
WHERE `notif_tujuan` IN()
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0
ERROR - 2020-08-25 10:29:20 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0' at line 3 - Invalid query: SELECT *
FROM `tbl02_notifikasi_transaksi`
WHERE `notif_tujuan` IN()
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0
ERROR - 2020-08-25 10:30:21 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0' at line 3 - Invalid query: SELECT *
FROM `tbl02_notifikasi_transaksi`
WHERE `notif_tujuan` IN()
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0
ERROR - 2020-08-25 10:31:21 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0' at line 3 - Invalid query: SELECT *
FROM `tbl02_notifikasi_transaksi`
WHERE `notif_tujuan` IN()
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0
ERROR - 2020-08-25 10:32:21 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0' at line 3 - Invalid query: SELECT *
FROM `tbl02_notifikasi_transaksi`
WHERE `notif_tujuan` IN()
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0
ERROR - 2020-08-25 10:33:22 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0' at line 3 - Invalid query: SELECT *
FROM `tbl02_notifikasi_transaksi`
WHERE `notif_tujuan` IN()
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0
ERROR - 2020-08-25 10:34:22 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0' at line 3 - Invalid query: SELECT *
FROM `tbl02_notifikasi_transaksi`
WHERE `notif_tujuan` IN()
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0
ERROR - 2020-08-25 10:35:23 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0' at line 3 - Invalid query: SELECT *
FROM `tbl02_notifikasi_transaksi`
WHERE `notif_tujuan` IN()
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0
ERROR - 2020-08-25 10:36:24 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0' at line 3 - Invalid query: SELECT *
FROM `tbl02_notifikasi_transaksi`
WHERE `notif_tujuan` IN()
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0
ERROR - 2020-08-25 10:37:25 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0' at line 3 - Invalid query: SELECT *
FROM `tbl02_notifikasi_transaksi`
WHERE `notif_tujuan` IN()
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0
ERROR - 2020-08-25 10:38:25 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0' at line 3 - Invalid query: SELECT *
FROM `tbl02_notifikasi_transaksi`
WHERE `notif_tujuan` IN()
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0
ERROR - 2020-08-25 10:39:26 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0' at line 3 - Invalid query: SELECT *
FROM `tbl02_notifikasi_transaksi`
WHERE `notif_tujuan` IN()
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0
ERROR - 2020-08-25 10:40:27 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0' at line 3 - Invalid query: SELECT *
FROM `tbl02_notifikasi_transaksi`
WHERE `notif_tujuan` IN()
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0
ERROR - 2020-08-25 10:41:28 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0' at line 3 - Invalid query: SELECT *
FROM `tbl02_notifikasi_transaksi`
WHERE `notif_tujuan` IN()
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0
ERROR - 2020-08-25 10:42:29 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0' at line 3 - Invalid query: SELECT *
FROM `tbl02_notifikasi_transaksi`
WHERE `notif_tujuan` IN()
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0
ERROR - 2020-08-25 10:43:30 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0' at line 3 - Invalid query: SELECT *
FROM `tbl02_notifikasi_transaksi`
WHERE `notif_tujuan` IN()
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0
ERROR - 2020-08-25 10:44:31 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0' at line 3 - Invalid query: SELECT *
FROM `tbl02_notifikasi_transaksi`
WHERE `notif_tujuan` IN()
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0
ERROR - 2020-08-25 10:45:31 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0' at line 3 - Invalid query: SELECT *
FROM `tbl02_notifikasi_transaksi`
WHERE `notif_tujuan` IN()
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0
ERROR - 2020-08-25 10:46:32 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0' at line 3 - Invalid query: SELECT *
FROM `tbl02_notifikasi_transaksi`
WHERE `notif_tujuan` IN()
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0
ERROR - 2020-08-25 10:47:33 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0' at line 3 - Invalid query: SELECT *
FROM `tbl02_notifikasi_transaksi`
WHERE `notif_tujuan` IN()
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0
ERROR - 2020-08-25 10:48:34 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0' at line 3 - Invalid query: SELECT *
FROM `tbl02_notifikasi_transaksi`
WHERE `notif_tujuan` IN()
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0
ERROR - 2020-08-25 10:49:35 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0' at line 3 - Invalid query: SELECT *
FROM `tbl02_notifikasi_transaksi`
WHERE `notif_tujuan` IN()
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0
ERROR - 2020-08-25 10:50:35 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0' at line 3 - Invalid query: SELECT *
FROM `tbl02_notifikasi_transaksi`
WHERE `notif_tujuan` IN()
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0
ERROR - 2020-08-25 10:51:36 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0' at line 3 - Invalid query: SELECT *
FROM `tbl02_notifikasi_transaksi`
WHERE `notif_tujuan` IN()
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0
ERROR - 2020-08-25 10:52:37 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0' at line 3 - Invalid query: SELECT *
FROM `tbl02_notifikasi_transaksi`
WHERE `notif_tujuan` IN()
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0
ERROR - 2020-08-25 10:53:38 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0' at line 3 - Invalid query: SELECT *
FROM `tbl02_notifikasi_transaksi`
WHERE `notif_tujuan` IN()
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0
ERROR - 2020-08-25 10:54:39 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0' at line 3 - Invalid query: SELECT *
FROM `tbl02_notifikasi_transaksi`
WHERE `notif_tujuan` IN()
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0
ERROR - 2020-08-25 10:55:40 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0' at line 3 - Invalid query: SELECT *
FROM `tbl02_notifikasi_transaksi`
WHERE `notif_tujuan` IN()
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0
ERROR - 2020-08-25 10:56:40 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0' at line 3 - Invalid query: SELECT *
FROM `tbl02_notifikasi_transaksi`
WHERE `notif_tujuan` IN()
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0
ERROR - 2020-08-25 10:57:41 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0' at line 3 - Invalid query: SELECT *
FROM `tbl02_notifikasi_transaksi`
WHERE `notif_tujuan` IN()
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0
ERROR - 2020-08-25 10:58:42 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0' at line 3 - Invalid query: SELECT *
FROM `tbl02_notifikasi_transaksi`
WHERE `notif_tujuan` IN()
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0
ERROR - 2020-08-25 10:59:43 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0' at line 3 - Invalid query: SELECT *
FROM `tbl02_notifikasi_transaksi`
WHERE `notif_tujuan` IN()
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0
ERROR - 2020-08-25 11:00:44 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0' at line 3 - Invalid query: SELECT *
FROM `tbl02_notifikasi_transaksi`
WHERE `notif_tujuan` IN()
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0
ERROR - 2020-08-25 11:01:44 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0' at line 3 - Invalid query: SELECT *
FROM `tbl02_notifikasi_transaksi`
WHERE `notif_tujuan` IN()
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0
ERROR - 2020-08-25 11:02:45 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0' at line 3 - Invalid query: SELECT *
FROM `tbl02_notifikasi_transaksi`
WHERE `notif_tujuan` IN()
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0
ERROR - 2020-08-25 11:03:46 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0' at line 3 - Invalid query: SELECT *
FROM `tbl02_notifikasi_transaksi`
WHERE `notif_tujuan` IN()
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0
ERROR - 2020-08-25 11:04:47 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0' at line 3 - Invalid query: SELECT *
FROM `tbl02_notifikasi_transaksi`
WHERE `notif_tujuan` IN()
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0
ERROR - 2020-08-25 11:05:48 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0' at line 3 - Invalid query: SELECT *
FROM `tbl02_notifikasi_transaksi`
WHERE `notif_tujuan` IN()
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0
ERROR - 2020-08-25 11:06:48 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0' at line 3 - Invalid query: SELECT *
FROM `tbl02_notifikasi_transaksi`
WHERE `notif_tujuan` IN()
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0
ERROR - 2020-08-25 11:07:49 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0' at line 3 - Invalid query: SELECT *
FROM `tbl02_notifikasi_transaksi`
WHERE `notif_tujuan` IN()
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0
ERROR - 2020-08-25 11:08:50 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0' at line 3 - Invalid query: SELECT *
FROM `tbl02_notifikasi_transaksi`
WHERE `notif_tujuan` IN()
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0
ERROR - 2020-08-25 11:09:51 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0' at line 3 - Invalid query: SELECT *
FROM `tbl02_notifikasi_transaksi`
WHERE `notif_tujuan` IN()
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0
ERROR - 2020-08-25 11:10:51 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0' at line 3 - Invalid query: SELECT *
FROM `tbl02_notifikasi_transaksi`
WHERE `notif_tujuan` IN()
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0
ERROR - 2020-08-25 11:11:52 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0' at line 3 - Invalid query: SELECT *
FROM `tbl02_notifikasi_transaksi`
WHERE `notif_tujuan` IN()
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0
ERROR - 2020-08-25 11:12:53 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0' at line 3 - Invalid query: SELECT *
FROM `tbl02_notifikasi_transaksi`
WHERE `notif_tujuan` IN()
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0
ERROR - 2020-08-25 11:13:54 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0' at line 3 - Invalid query: SELECT *
FROM `tbl02_notifikasi_transaksi`
WHERE `notif_tujuan` IN()
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0
ERROR - 2020-08-25 11:14:55 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0' at line 3 - Invalid query: SELECT *
FROM `tbl02_notifikasi_transaksi`
WHERE `notif_tujuan` IN()
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0
ERROR - 2020-08-25 11:15:56 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0' at line 3 - Invalid query: SELECT *
FROM `tbl02_notifikasi_transaksi`
WHERE `notif_tujuan` IN()
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0
ERROR - 2020-08-25 11:16:56 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0' at line 3 - Invalid query: SELECT *
FROM `tbl02_notifikasi_transaksi`
WHERE `notif_tujuan` IN()
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0
ERROR - 2020-08-25 11:17:57 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0' at line 3 - Invalid query: SELECT *
FROM `tbl02_notifikasi_transaksi`
WHERE `notif_tujuan` IN()
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0
ERROR - 2020-08-25 11:18:58 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0' at line 3 - Invalid query: SELECT *
FROM `tbl02_notifikasi_transaksi`
WHERE `notif_tujuan` IN()
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0
ERROR - 2020-08-25 11:19:58 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0' at line 3 - Invalid query: SELECT *
FROM `tbl02_notifikasi_transaksi`
WHERE `notif_tujuan` IN()
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0
ERROR - 2020-08-25 11:20:58 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0' at line 3 - Invalid query: SELECT *
FROM `tbl02_notifikasi_transaksi`
WHERE `notif_tujuan` IN()
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0
ERROR - 2020-08-25 11:21:59 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0' at line 3 - Invalid query: SELECT *
FROM `tbl02_notifikasi_transaksi`
WHERE `notif_tujuan` IN()
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0
ERROR - 2020-08-25 11:22:59 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0' at line 3 - Invalid query: SELECT *
FROM `tbl02_notifikasi_transaksi`
WHERE `notif_tujuan` IN()
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0
ERROR - 2020-08-25 11:24:00 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0' at line 3 - Invalid query: SELECT *
FROM `tbl02_notifikasi_transaksi`
WHERE `notif_tujuan` IN()
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0
ERROR - 2020-08-25 11:25:01 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0' at line 3 - Invalid query: SELECT *
FROM `tbl02_notifikasi_transaksi`
WHERE `notif_tujuan` IN()
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0
ERROR - 2020-08-25 11:26:01 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0' at line 3 - Invalid query: SELECT *
FROM `tbl02_notifikasi_transaksi`
WHERE `notif_tujuan` IN()
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0
ERROR - 2020-08-25 11:27:02 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0' at line 3 - Invalid query: SELECT *
FROM `tbl02_notifikasi_transaksi`
WHERE `notif_tujuan` IN()
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0
ERROR - 2020-08-25 11:28:03 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0' at line 3 - Invalid query: SELECT *
FROM `tbl02_notifikasi_transaksi`
WHERE `notif_tujuan` IN()
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0
ERROR - 2020-08-25 11:29:04 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0' at line 3 - Invalid query: SELECT *
FROM `tbl02_notifikasi_transaksi`
WHERE `notif_tujuan` IN()
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0
ERROR - 2020-08-25 11:30:05 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0' at line 3 - Invalid query: SELECT *
FROM `tbl02_notifikasi_transaksi`
WHERE `notif_tujuan` IN()
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0
ERROR - 2020-08-25 11:31:06 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0' at line 3 - Invalid query: SELECT *
FROM `tbl02_notifikasi_transaksi`
WHERE `notif_tujuan` IN()
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0
ERROR - 2020-08-25 11:32:06 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0' at line 3 - Invalid query: SELECT *
FROM `tbl02_notifikasi_transaksi`
WHERE `notif_tujuan` IN()
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0
ERROR - 2020-08-25 11:33:07 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0' at line 3 - Invalid query: SELECT *
FROM `tbl02_notifikasi_transaksi`
WHERE `notif_tujuan` IN()
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0
ERROR - 2020-08-25 11:34:08 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0' at line 3 - Invalid query: SELECT *
FROM `tbl02_notifikasi_transaksi`
WHERE `notif_tujuan` IN()
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0
ERROR - 2020-08-25 11:35:09 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0' at line 3 - Invalid query: SELECT *
FROM `tbl02_notifikasi_transaksi`
WHERE `notif_tujuan` IN()
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0
ERROR - 2020-08-25 11:36:10 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0' at line 3 - Invalid query: SELECT *
FROM `tbl02_notifikasi_transaksi`
WHERE `notif_tujuan` IN()
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0
ERROR - 2020-08-25 11:37:10 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0' at line 3 - Invalid query: SELECT *
FROM `tbl02_notifikasi_transaksi`
WHERE `notif_tujuan` IN()
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0
ERROR - 2020-08-25 11:38:11 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0' at line 3 - Invalid query: SELECT *
FROM `tbl02_notifikasi_transaksi`
WHERE `notif_tujuan` IN()
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0
ERROR - 2020-08-25 11:39:12 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0' at line 3 - Invalid query: SELECT *
FROM `tbl02_notifikasi_transaksi`
WHERE `notif_tujuan` IN()
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0
ERROR - 2020-08-25 11:40:12 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0' at line 3 - Invalid query: SELECT *
FROM `tbl02_notifikasi_transaksi`
WHERE `notif_tujuan` IN()
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0
