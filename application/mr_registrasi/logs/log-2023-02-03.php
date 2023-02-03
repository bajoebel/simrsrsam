<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2023-02-03 00:39:38 --> Severity: Notice --> Undefined index: tglAwal C:\laragon\www\simrs_vclaim\application\mr_registrasi\controllers\Riwayat.php 50
ERROR - 2023-02-03 00:39:38 --> Severity: Notice --> Undefined index: tglAkhir C:\laragon\www\simrs_vclaim\application\mr_registrasi\controllers\Riwayat.php 51
ERROR - 2023-02-03 00:39:38 --> Severity: Notice --> Undefined index: jns_layanan C:\laragon\www\simrs_vclaim\application\mr_registrasi\controllers\Riwayat.php 52
ERROR - 2023-02-03 00:39:38 --> Severity: Notice --> Undefined index: q C:\laragon\www\simrs_vclaim\application\mr_registrasi\controllers\Riwayat.php 53
ERROR - 2023-02-03 00:39:40 --> Severity: Error --> Allowed memory size of 536870912 bytes exhausted (tried to allocate 20480 bytes) C:\laragon\www\simrs_vclaim\system\database\drivers\mysqli\mysqli_result.php 214
ERROR - 2023-02-03 00:39:46 --> Severity: Notice --> Undefined index: tglAwal C:\laragon\www\simrs_vclaim\application\mr_registrasi\controllers\Riwayat.php 50
ERROR - 2023-02-03 00:39:46 --> Severity: Notice --> Undefined index: tglAkhir C:\laragon\www\simrs_vclaim\application\mr_registrasi\controllers\Riwayat.php 51
ERROR - 2023-02-03 00:39:46 --> Severity: Notice --> Undefined index: jns_layanan C:\laragon\www\simrs_vclaim\application\mr_registrasi\controllers\Riwayat.php 52
ERROR - 2023-02-03 00:39:46 --> Severity: Notice --> Undefined index: q C:\laragon\www\simrs_vclaim\application\mr_registrasi\controllers\Riwayat.php 53
ERROR - 2023-02-03 00:39:48 --> Severity: Error --> Allowed memory size of 536870912 bytes exhausted (tried to allocate 20480 bytes) C:\laragon\www\simrs_vclaim\system\database\drivers\mysqli\mysqli_result.php 214
ERROR - 2023-02-03 01:18:59 --> Severity: Notice --> Undefined variable: jns_layanan C:\laragon\www\simrs_vclaim\application\mr_registrasi\models\Riwayat_model.php 11
ERROR - 2023-02-03 01:18:59 --> Severity: Notice --> Undefined variable: limit C:\laragon\www\simrs_vclaim\application\mr_registrasi\models\Riwayat_model.php 29
ERROR - 2023-02-03 01:18:59 --> Query error: Unknown column 'a.nomr' in 'field list' - Invalid query: SELECT `a`.`nomr`, `a`.`nama_pasien`, `a`.`id_daftar`, `a`.`reg_unit`, `a`.`tgl_masuk`, `a`.`nama_ruang`, `a`.`namaDokterJaga`, `a`.`cara_bayar`, `a`.`no_bpjs`, `a`.`jns_layanan`, `a`.`status_pasien`, (CASE WHEN a.status_pasien = 6 THEN CONCAT('batal<br>', (SELECT tgl_created FROM `tbl02_pendaftaran_batal` b WHERE b.`reg_unit`=a.`reg_unit`)) ELSE 'Active' END) AS status_daftar, (CASE WHEN(DATE_FORMAT(tgl_masuk, '%Y-%m-%d')=a.`tgl_daftar`) THEN 'Pasien Baru' ELSE 'Pasien Lama' END) AS jns_pasien, `user_daftar`, (CASE WHEN SUBSTR(user_daftar, 1, 3)='NRP' THEN (SELECT pgwNama FROM tbl01_pegawai WHERE NRP=a.`user_daftar`) ELSE user_daftar END)  AS pgwNama
FROM `tbl02_pendaftaran`
WHERE `jns_layanan` IS NULL
AND DATE_FORMAT(tgl_masuk,'%Y-%m-%d') >= '2023-02-03'
AND DATE_FORMAT(tgl_masuk,'%Y-%m-%d') <= '2023-02-03'
AND   (
`nomr` LIKE '%%' ESCAPE '!'
OR  `nama_pasien` LIKE '%%' ESCAPE '!'
OR  `id_daftar` LIKE '%%' ESCAPE '!'
OR  `reg_unit` LIKE '%%' ESCAPE '!'
OR  `nama_ruang` LIKE '%%' ESCAPE '!'
OR  `namaDokterJaga` LIKE '%%' ESCAPE '!'
OR  `cara_bayar` LIKE '%%' ESCAPE '!'
OR  `no_bpjs` LIKE '%%' ESCAPE '!'
 )
 LIMIT 0
ERROR - 2023-02-03 01:19:07 --> Severity: Notice --> Undefined variable: jns_layanan C:\laragon\www\simrs_vclaim\application\mr_registrasi\models\Riwayat_model.php 11
ERROR - 2023-02-03 01:19:07 --> Severity: Notice --> Undefined variable: limit C:\laragon\www\simrs_vclaim\application\mr_registrasi\models\Riwayat_model.php 29
ERROR - 2023-02-03 01:19:07 --> Query error: Unknown column 'a.nomr' in 'field list' - Invalid query: SELECT `a`.`nomr`, `a`.`nama_pasien`, `a`.`id_daftar`, `a`.`reg_unit`, `a`.`tgl_masuk`, `a`.`nama_ruang`, `a`.`namaDokterJaga`, `a`.`cara_bayar`, `a`.`no_bpjs`, `a`.`jns_layanan`, `a`.`status_pasien`, (CASE WHEN a.status_pasien = 6 THEN CONCAT('batal<br>', (SELECT tgl_created FROM `tbl02_pendaftaran_batal` b WHERE b.`reg_unit`=a.`reg_unit`)) ELSE 'Active' END) AS status_daftar, (CASE WHEN(DATE_FORMAT(tgl_masuk, '%Y-%m-%d')=a.`tgl_daftar`) THEN 'Pasien Baru' ELSE 'Pasien Lama' END) AS jns_pasien, `user_daftar`, (CASE WHEN SUBSTR(user_daftar, 1, 3)='NRP' THEN (SELECT pgwNama FROM tbl01_pegawai WHERE NRP=a.`user_daftar`) ELSE user_daftar END)  AS pgwNama
FROM `tbl02_pendaftaran`
WHERE `jns_layanan` IS NULL
AND DATE_FORMAT(tgl_masuk,'%Y-%m-%d') >= '2023-02-03'
AND DATE_FORMAT(tgl_masuk,'%Y-%m-%d') <= '2023-02-03'
AND   (
`nomr` LIKE '%%' ESCAPE '!'
OR  `nama_pasien` LIKE '%%' ESCAPE '!'
OR  `id_daftar` LIKE '%%' ESCAPE '!'
OR  `reg_unit` LIKE '%%' ESCAPE '!'
OR  `nama_ruang` LIKE '%%' ESCAPE '!'
OR  `namaDokterJaga` LIKE '%%' ESCAPE '!'
OR  `cara_bayar` LIKE '%%' ESCAPE '!'
OR  `no_bpjs` LIKE '%%' ESCAPE '!'
 )
 LIMIT 0
ERROR - 2023-02-03 01:19:26 --> Severity: Notice --> Undefined variable: limit C:\laragon\www\simrs_vclaim\application\mr_registrasi\models\Riwayat_model.php 29
ERROR - 2023-02-03 01:19:26 --> Query error: Unknown column 'a.nomr' in 'field list' - Invalid query: SELECT `a`.`nomr`, `a`.`nama_pasien`, `a`.`id_daftar`, `a`.`reg_unit`, `a`.`tgl_masuk`, `a`.`nama_ruang`, `a`.`namaDokterJaga`, `a`.`cara_bayar`, `a`.`no_bpjs`, `a`.`jns_layanan`, `a`.`status_pasien`, (CASE WHEN a.status_pasien = 6 THEN CONCAT('batal<br>', (SELECT tgl_created FROM `tbl02_pendaftaran_batal` b WHERE b.`reg_unit`=a.`reg_unit`)) ELSE 'Active' END) AS status_daftar, (CASE WHEN(DATE_FORMAT(tgl_masuk, '%Y-%m-%d')=a.`tgl_daftar`) THEN 'Pasien Baru' ELSE 'Pasien Lama' END) AS jns_pasien, `user_daftar`, (CASE WHEN SUBSTR(user_daftar, 1, 3)='NRP' THEN (SELECT pgwNama FROM tbl01_pegawai WHERE NRP=a.`user_daftar`) ELSE user_daftar END)  AS pgwNama
FROM `tbl02_pendaftaran`
WHERE `jns_layanan` = 'RJ'
AND DATE_FORMAT(tgl_masuk,'%Y-%m-%d') >= '2023-02-03'
AND DATE_FORMAT(tgl_masuk,'%Y-%m-%d') <= '2023-02-03'
AND   (
`nomr` LIKE '%%' ESCAPE '!'
OR  `nama_pasien` LIKE '%%' ESCAPE '!'
OR  `id_daftar` LIKE '%%' ESCAPE '!'
OR  `reg_unit` LIKE '%%' ESCAPE '!'
OR  `nama_ruang` LIKE '%%' ESCAPE '!'
OR  `namaDokterJaga` LIKE '%%' ESCAPE '!'
OR  `cara_bayar` LIKE '%%' ESCAPE '!'
OR  `no_bpjs` LIKE '%%' ESCAPE '!'
 )
 LIMIT 0
ERROR - 2023-02-03 01:19:35 --> Severity: Notice --> Undefined variable: limit C:\laragon\www\simrs_vclaim\application\mr_registrasi\models\Riwayat_model.php 29
ERROR - 2023-02-03 01:19:35 --> Query error: Unknown column 'a.nomr' in 'field list' - Invalid query: SELECT `a`.`nomr`, `a`.`nama_pasien`, `a`.`id_daftar`, `a`.`reg_unit`, `a`.`tgl_masuk`, `a`.`nama_ruang`, `a`.`namaDokterJaga`, `a`.`cara_bayar`, `a`.`no_bpjs`, `a`.`jns_layanan`, `a`.`status_pasien`, (CASE WHEN a.status_pasien = 6 THEN CONCAT('batal<br>', (SELECT tgl_created FROM `tbl02_pendaftaran_batal` b WHERE b.`reg_unit`=a.`reg_unit`)) ELSE 'Active' END) AS status_daftar, (CASE WHEN(DATE_FORMAT(tgl_masuk, '%Y-%m-%d')=a.`tgl_daftar`) THEN 'Pasien Baru' ELSE 'Pasien Lama' END) AS jns_pasien, `user_daftar`, (CASE WHEN SUBSTR(user_daftar, 1, 3)='NRP' THEN (SELECT pgwNama FROM tbl01_pegawai WHERE NRP=a.`user_daftar`) ELSE user_daftar END)  AS pgwNama
FROM `tbl02_pendaftaran`
WHERE `jns_layanan` = 'RJ'
AND DATE_FORMAT(tgl_masuk,'%Y-%m-%d') >= '2023-02-03'
AND DATE_FORMAT(tgl_masuk,'%Y-%m-%d') <= '2023-02-03'
AND   (
`nomr` LIKE '%%' ESCAPE '!'
OR  `nama_pasien` LIKE '%%' ESCAPE '!'
OR  `id_daftar` LIKE '%%' ESCAPE '!'
OR  `reg_unit` LIKE '%%' ESCAPE '!'
OR  `nama_ruang` LIKE '%%' ESCAPE '!'
OR  `namaDokterJaga` LIKE '%%' ESCAPE '!'
OR  `cara_bayar` LIKE '%%' ESCAPE '!'
OR  `no_bpjs` LIKE '%%' ESCAPE '!'
 )
 LIMIT 0
ERROR - 2023-02-03 01:19:44 --> Severity: Notice --> Undefined variable: limit C:\laragon\www\simrs_vclaim\application\mr_registrasi\models\Riwayat_model.php 29
ERROR - 2023-02-03 01:21:51 --> Severity: Notice --> Undefined variable: response C:\laragon\www\simrs_vclaim\application\mr_registrasi\controllers\Riwayat.php 66
ERROR - 2023-02-03 01:23:13 --> Query error: Table 'rsam_dev.tbl02_pendaftaran1' doesn't exist - Invalid query: SELECT `a`.`nomr`, `a`.`nama_pasien`, `a`.`id_daftar`, `a`.`reg_unit`, `a`.`tgl_masuk`, `a`.`nama_ruang`, `a`.`namaDokterJaga`, `a`.`cara_bayar`, `a`.`no_bpjs`, `a`.`jns_layanan`, `a`.`status_pasien`, (CASE WHEN a.status_pasien = 6 THEN CONCAT('batal<br>', (SELECT tgl_created FROM `tbl02_pendaftaran_batal` b WHERE b.`reg_unit`=a.`reg_unit`)) ELSE 'Active' END) AS status_daftar, (CASE WHEN(DATE_FORMAT(tgl_masuk, '%Y-%m-%d')=a.`tgl_daftar`) THEN 'Pasien Baru' ELSE 'Pasien Lama' END) AS jns_pasien, `user_daftar`, (CASE WHEN SUBSTR(user_daftar, 1, 3)='NRP' THEN (SELECT pgwNama FROM tbl01_pegawai WHERE NRP=a.`user_daftar`) ELSE user_daftar END)  AS pgwNama
FROM `tbl02_pendaftaran1` `a`
WHERE `jns_layanan` = 'RJ'
AND DATE_FORMAT(tgl_masuk,'%Y-%m-%d') >= '2023-02-03'
AND DATE_FORMAT(tgl_masuk,'%Y-%m-%d') <= '2023-02-03'
AND   (
`nomr` LIKE '%%' ESCAPE '!'
OR  `nama_pasien` LIKE '%%' ESCAPE '!'
OR  `id_daftar` LIKE '%%' ESCAPE '!'
OR  `reg_unit` LIKE '%%' ESCAPE '!'
OR  `nama_ruang` LIKE '%%' ESCAPE '!'
OR  `namaDokterJaga` LIKE '%%' ESCAPE '!'
OR  `cara_bayar` LIKE '%%' ESCAPE '!'
OR  `no_bpjs` LIKE '%%' ESCAPE '!'
 )
 LIMIT 10, 0
ERROR - 2023-02-03 01:26:35 --> Severity: error --> Exception: Too few arguments to function Riwayat_model::countRegistrasi(), 4 passed in C:\laragon\www\simrs_vclaim\application\mr_registrasi\controllers\Riwayat.php on line 61 and exactly 6 expected C:\laragon\www\simrs_vclaim\application\mr_registrasi\models\Riwayat_model.php 32
ERROR - 2023-02-03 01:32:12 --> Severity: Notice --> Undefined index: tglAwal C:\laragon\www\simrs_vclaim\application\mr_registrasi\controllers\Riwayat.php 73
ERROR - 2023-02-03 01:32:12 --> Severity: Notice --> Undefined index: tglAkhir C:\laragon\www\simrs_vclaim\application\mr_registrasi\controllers\Riwayat.php 74
ERROR - 2023-02-03 01:32:12 --> Severity: Notice --> Undefined index: jns_layanan C:\laragon\www\simrs_vclaim\application\mr_registrasi\controllers\Riwayat.php 75
ERROR - 2023-02-03 01:32:12 --> Severity: Notice --> Undefined index: q C:\laragon\www\simrs_vclaim\application\mr_registrasi\controllers\Riwayat.php 76
ERROR - 2023-02-03 01:32:14 --> Severity: Error --> Allowed memory size of 536870912 bytes exhausted (tried to allocate 20480 bytes) C:\laragon\www\simrs_vclaim\system\database\drivers\mysqli\mysqli_result.php 214
ERROR - 2023-02-03 02:35:42 --> Severity: Notice --> Undefined variable: reg_unit C:\laragon\www\simrs_vclaim\application\mr_registrasi\controllers\Riwayat.php 119
ERROR - 2023-02-03 02:35:42 --> Severity: Notice --> Undefined variable: reg_unit C:\laragon\www\simrs_vclaim\application\mr_registrasi\controllers\Riwayat.php 120
ERROR - 2023-02-03 03:03:46 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '-10, 10' at line 16 - Invalid query: SELECT `a`.`nomr`, `a`.`nama_pasien`, `a`.`id_daftar`, `a`.`reg_unit`, `a`.`tgl_masuk`, `a`.`nama_ruang`, `a`.`namaDokterJaga`, `a`.`cara_bayar`, `a`.`no_bpjs`, `a`.`jns_layanan`, `a`.`status_pasien`, (CASE WHEN a.status_pasien = 6 THEN CONCAT('batal<br>', (SELECT tgl_created FROM `tbl02_pendaftaran_batal` b WHERE b.`reg_unit`=a.`reg_unit`)) ELSE 'Active' END) AS status_daftar, (CASE WHEN(DATE_FORMAT(tgl_masuk, '%Y-%m-%d')=a.`tgl_daftar`) THEN 'Pasien Baru' ELSE 'Pasien Lama' END) AS jns_pasien, `user_daftar`, (CASE WHEN SUBSTR(user_daftar, 1, 3)='NRP' THEN (SELECT pgwNama FROM tbl01_pegawai WHERE NRP=a.`user_daftar`) ELSE user_daftar END)  AS pgwNama
FROM `tbl02_pendaftaran` `a`
WHERE `jns_layanan` = 'RJ'
AND DATE_FORMAT(tgl_masuk,'%Y-%m-%d') >= '2023-02-03'
AND DATE_FORMAT(tgl_masuk,'%Y-%m-%d') <= '2023-02-03'
AND   (
`nomr` LIKE '%%' ESCAPE '!'
OR  `nama_pasien` LIKE '%%' ESCAPE '!'
OR  `id_daftar` LIKE '%%' ESCAPE '!'
OR  `reg_unit` LIKE '%%' ESCAPE '!'
OR  `nama_ruang` LIKE '%%' ESCAPE '!'
OR  `namaDokterJaga` LIKE '%%' ESCAPE '!'
OR  `cara_bayar` LIKE '%%' ESCAPE '!'
OR  `no_bpjs` LIKE '%%' ESCAPE '!'
 )
 LIMIT -10, 10
