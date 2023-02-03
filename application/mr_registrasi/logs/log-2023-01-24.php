<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2023-01-24 01:44:39 --> Severity: Notice --> Trying to get property 'pasien' of non-object C:\laragon\www\simrs_vclaim\application\mr_registrasi\controllers\Online.php 118
ERROR - 2023-01-24 01:44:39 --> Severity: Notice --> Trying to get property 'jmldata' of non-object C:\laragon\www\simrs_vclaim\application\mr_registrasi\controllers\Online.php 119
ERROR - 2023-01-24 01:44:39 --> Severity: Warning --> Invalid argument supplied for foreach() C:\laragon\www\simrs_vclaim\application\mr_registrasi\views\registrasi\v_data_pendaftaran_online.php 3
ERROR - 2023-01-24 01:44:39 --> Severity: Notice --> Trying to get property 'jmldata' of non-object C:\laragon\www\simrs_vclaim\application\mr_registrasi\controllers\Online.php 125
ERROR - 2023-01-24 08:37:53 --> Severity: error --> Exception: Call to undefined method Pendaftaran_model::countPasienAnjungan() C:\laragon\www\simrs_vclaim\application\mr_registrasi\controllers\Anjungan.php 94
ERROR - 2023-01-24 08:39:02 --> Severity: error --> Exception: Call to undefined method Pendaftaran_model::countPasienAnjungan() C:\laragon\www\simrs_vclaim\application\mr_registrasi\controllers\Anjungan.php 91
ERROR - 2023-01-24 08:39:12 --> Severity: error --> Exception: Call to undefined method Pendaftaran_model::countPasienAnjungan() C:\laragon\www\simrs_vclaim\application\mr_registrasi\controllers\Anjungan.php 91
ERROR - 2023-01-24 08:39:13 --> Severity: error --> Exception: Call to undefined method Pendaftaran_model::countPasienAnjungan() C:\laragon\www\simrs_vclaim\application\mr_registrasi\controllers\Anjungan.php 91
ERROR - 2023-01-24 08:39:18 --> Severity: error --> Exception: Call to undefined method Pendaftaran_model::countPasienAnjungan() C:\laragon\www\simrs_vclaim\application\mr_registrasi\controllers\Anjungan.php 91
ERROR - 2023-01-24 08:58:43 --> Severity: Notice --> Undefined variable: data C:\laragon\www\simrs_vclaim\application\mr_registrasi\views\registrasi\v_data_pendaftaran_online.php 3
ERROR - 2023-01-24 08:58:43 --> Severity: Warning --> Invalid argument supplied for foreach() C:\laragon\www\simrs_vclaim\application\mr_registrasi\views\registrasi\v_data_pendaftaran_online.php 3
ERROR - 2023-01-24 08:58:58 --> Severity: Notice --> Undefined variable: data C:\laragon\www\simrs_vclaim\application\mr_registrasi\views\registrasi\v_data_pendaftaran_online.php 3
ERROR - 2023-01-24 08:58:58 --> Severity: Warning --> Invalid argument supplied for foreach() C:\laragon\www\simrs_vclaim\application\mr_registrasi\views\registrasi\v_data_pendaftaran_online.php 3
ERROR - 2023-01-24 09:04:48 --> Query error: Table 'rsam_dev.tbl02_pendaftaran1' doesn't exist - Invalid query: SELECT *
FROM `tbl02_pendaftaran1`
WHERE `id_ruang` = ''
AND DATE_FORMAT(tgl_masuk,'%Y-%m-%d') != `tgl_daftar`
AND DATE_FORMAT(tgl_masuk,'%Y-%m-%d') = '2023-01-24'
AND   (
`nomr` LIKE '%%' ESCAPE '!'
OR  `no_ktp` LIKE '%%' ESCAPE '!'
OR  `no_bpjs` LIKE '%%' ESCAPE '!'
OR  `nama_pasien` LIKE '%%' ESCAPE '!'
OR  `tempat_lahir` LIKE '%%' ESCAPE '!'
OR  `namaDokterJaga` LIKE '%%' ESCAPE '!'
 )
 LIMIT 50
ERROR - 2023-01-24 09:06:01 --> Query error: Table 'rsam_dev.tbl02_pendaftaran1' doesn't exist - Invalid query: SELECT *
FROM `tbl02_pendaftaran1`
WHERE DATE_FORMAT(tgl_masuk,'%Y-%m-%d') != `tgl_daftar`
AND DATE_FORMAT(tgl_masuk,'%Y-%m-%d') = '2023-01-24'
AND   (
`nomr` LIKE '%%' ESCAPE '!'
OR  `no_ktp` LIKE '%%' ESCAPE '!'
OR  `no_bpjs` LIKE '%%' ESCAPE '!'
OR  `nama_pasien` LIKE '%%' ESCAPE '!'
OR  `tempat_lahir` LIKE '%%' ESCAPE '!'
OR  `namaDokterJaga` LIKE '%%' ESCAPE '!'
 )
 LIMIT 50
ERROR - 2023-01-24 09:06:22 --> Severity: Notice --> Undefined property: stdClass::$nama C:\laragon\www\simrs_vclaim\application\mr_registrasi\views\registrasi\v_data_pendaftaran_mandiri.php 10
ERROR - 2023-01-24 09:06:22 --> Severity: Notice --> Undefined property: stdClass::$poly_nama C:\laragon\www\simrs_vclaim\application\mr_registrasi\views\registrasi\v_data_pendaftaran_mandiri.php 12
ERROR - 2023-01-24 09:06:22 --> Severity: Notice --> Undefined property: stdClass::$daftar_tglkunjungan C:\laragon\www\simrs_vclaim\application\mr_registrasi\views\registrasi\v_data_pendaftaran_mandiri.php 13
ERROR - 2023-01-24 09:06:22 --> Severity: Notice --> Undefined property: stdClass::$daftar_antrian_poly C:\laragon\www\simrs_vclaim\application\mr_registrasi\views\registrasi\v_data_pendaftaran_mandiri.php 17
ERROR - 2023-01-24 09:06:22 --> Severity: Notice --> Undefined property: stdClass::$dokter_nama C:\laragon\www\simrs_vclaim\application\mr_registrasi\views\registrasi\v_data_pendaftaran_mandiri.php 18
ERROR - 2023-01-24 09:06:22 --> Severity: Notice --> Undefined property: stdClass::$daftar_tgl C:\laragon\www\simrs_vclaim\application\mr_registrasi\views\registrasi\v_data_pendaftaran_mandiri.php 21
ERROR - 2023-01-24 09:06:22 --> Severity: Notice --> Undefined property: stdClass::$daftar_aprove C:\laragon\www\simrs_vclaim\application\mr_registrasi\views\registrasi\v_data_pendaftaran_mandiri.php 23
ERROR - 2023-01-24 09:06:22 --> Severity: Notice --> Undefined property: stdClass::$daftar_id C:\laragon\www\simrs_vclaim\application\mr_registrasi\views\registrasi\v_data_pendaftaran_mandiri.php 23
ERROR - 2023-01-24 09:06:22 --> Severity: Notice --> Undefined property: stdClass::$nama C:\laragon\www\simrs_vclaim\application\mr_registrasi\views\registrasi\v_data_pendaftaran_mandiri.php 10
ERROR - 2023-01-24 09:06:22 --> Severity: Notice --> Undefined property: stdClass::$poly_nama C:\laragon\www\simrs_vclaim\application\mr_registrasi\views\registrasi\v_data_pendaftaran_mandiri.php 12
ERROR - 2023-01-24 09:06:22 --> Severity: Notice --> Undefined property: stdClass::$daftar_tglkunjungan C:\laragon\www\simrs_vclaim\application\mr_registrasi\views\registrasi\v_data_pendaftaran_mandiri.php 13
ERROR - 2023-01-24 09:06:22 --> Severity: Notice --> Undefined property: stdClass::$daftar_antrian_poly C:\laragon\www\simrs_vclaim\application\mr_registrasi\views\registrasi\v_data_pendaftaran_mandiri.php 17
ERROR - 2023-01-24 09:06:22 --> Severity: Notice --> Undefined property: stdClass::$dokter_nama C:\laragon\www\simrs_vclaim\application\mr_registrasi\views\registrasi\v_data_pendaftaran_mandiri.php 18
ERROR - 2023-01-24 09:06:22 --> Severity: Notice --> Undefined property: stdClass::$daftar_tgl C:\laragon\www\simrs_vclaim\application\mr_registrasi\views\registrasi\v_data_pendaftaran_mandiri.php 21
ERROR - 2023-01-24 09:06:22 --> Severity: Notice --> Undefined property: stdClass::$daftar_aprove C:\laragon\www\simrs_vclaim\application\mr_registrasi\views\registrasi\v_data_pendaftaran_mandiri.php 23
ERROR - 2023-01-24 09:06:22 --> Severity: Notice --> Undefined property: stdClass::$daftar_id C:\laragon\www\simrs_vclaim\application\mr_registrasi\views\registrasi\v_data_pendaftaran_mandiri.php 23
ERROR - 2023-01-24 09:06:46 --> Severity: Notice --> Undefined property: stdClass::$nama C:\laragon\www\simrs_vclaim\application\mr_registrasi\views\registrasi\v_data_pendaftaran_mandiri.php 10
ERROR - 2023-01-24 09:06:46 --> Severity: Notice --> Undefined property: stdClass::$poly_nama C:\laragon\www\simrs_vclaim\application\mr_registrasi\views\registrasi\v_data_pendaftaran_mandiri.php 12
ERROR - 2023-01-24 09:06:46 --> Severity: Notice --> Undefined property: stdClass::$daftar_tglkunjungan C:\laragon\www\simrs_vclaim\application\mr_registrasi\views\registrasi\v_data_pendaftaran_mandiri.php 13
ERROR - 2023-01-24 09:06:46 --> Severity: Notice --> Undefined property: stdClass::$daftar_antrian_poly C:\laragon\www\simrs_vclaim\application\mr_registrasi\views\registrasi\v_data_pendaftaran_mandiri.php 17
ERROR - 2023-01-24 09:06:46 --> Severity: Notice --> Undefined property: stdClass::$dokter_nama C:\laragon\www\simrs_vclaim\application\mr_registrasi\views\registrasi\v_data_pendaftaran_mandiri.php 18
ERROR - 2023-01-24 09:06:46 --> Severity: Notice --> Undefined property: stdClass::$daftar_tgl C:\laragon\www\simrs_vclaim\application\mr_registrasi\views\registrasi\v_data_pendaftaran_mandiri.php 21
ERROR - 2023-01-24 09:06:46 --> Severity: Notice --> Undefined property: stdClass::$daftar_aprove C:\laragon\www\simrs_vclaim\application\mr_registrasi\views\registrasi\v_data_pendaftaran_mandiri.php 23
ERROR - 2023-01-24 09:06:46 --> Severity: Notice --> Undefined property: stdClass::$daftar_id C:\laragon\www\simrs_vclaim\application\mr_registrasi\views\registrasi\v_data_pendaftaran_mandiri.php 23
ERROR - 2023-01-24 09:06:46 --> Severity: Notice --> Undefined property: stdClass::$nama C:\laragon\www\simrs_vclaim\application\mr_registrasi\views\registrasi\v_data_pendaftaran_mandiri.php 10
ERROR - 2023-01-24 09:06:46 --> Severity: Notice --> Undefined property: stdClass::$poly_nama C:\laragon\www\simrs_vclaim\application\mr_registrasi\views\registrasi\v_data_pendaftaran_mandiri.php 12
ERROR - 2023-01-24 09:06:46 --> Severity: Notice --> Undefined property: stdClass::$daftar_tglkunjungan C:\laragon\www\simrs_vclaim\application\mr_registrasi\views\registrasi\v_data_pendaftaran_mandiri.php 13
ERROR - 2023-01-24 09:06:46 --> Severity: Notice --> Undefined property: stdClass::$daftar_antrian_poly C:\laragon\www\simrs_vclaim\application\mr_registrasi\views\registrasi\v_data_pendaftaran_mandiri.php 17
ERROR - 2023-01-24 09:06:46 --> Severity: Notice --> Undefined property: stdClass::$dokter_nama C:\laragon\www\simrs_vclaim\application\mr_registrasi\views\registrasi\v_data_pendaftaran_mandiri.php 18
ERROR - 2023-01-24 09:06:46 --> Severity: Notice --> Undefined property: stdClass::$daftar_tgl C:\laragon\www\simrs_vclaim\application\mr_registrasi\views\registrasi\v_data_pendaftaran_mandiri.php 21
ERROR - 2023-01-24 09:06:46 --> Severity: Notice --> Undefined property: stdClass::$daftar_aprove C:\laragon\www\simrs_vclaim\application\mr_registrasi\views\registrasi\v_data_pendaftaran_mandiri.php 23
ERROR - 2023-01-24 09:06:46 --> Severity: Notice --> Undefined property: stdClass::$daftar_id C:\laragon\www\simrs_vclaim\application\mr_registrasi\views\registrasi\v_data_pendaftaran_mandiri.php 23
ERROR - 2023-01-24 09:07:34 --> Severity: Notice --> Undefined property: stdClass::$daftar_antrian_poly C:\laragon\www\simrs_vclaim\application\mr_registrasi\views\registrasi\v_data_pendaftaran_mandiri.php 17
ERROR - 2023-01-24 09:07:34 --> Severity: Notice --> Undefined property: stdClass::$dokter_nama C:\laragon\www\simrs_vclaim\application\mr_registrasi\views\registrasi\v_data_pendaftaran_mandiri.php 18
ERROR - 2023-01-24 09:07:34 --> Severity: Notice --> Undefined property: stdClass::$daftar_tgl C:\laragon\www\simrs_vclaim\application\mr_registrasi\views\registrasi\v_data_pendaftaran_mandiri.php 21
ERROR - 2023-01-24 09:07:34 --> Severity: Notice --> Undefined property: stdClass::$daftar_aprove C:\laragon\www\simrs_vclaim\application\mr_registrasi\views\registrasi\v_data_pendaftaran_mandiri.php 23
ERROR - 2023-01-24 09:07:34 --> Severity: Notice --> Undefined property: stdClass::$daftar_id C:\laragon\www\simrs_vclaim\application\mr_registrasi\views\registrasi\v_data_pendaftaran_mandiri.php 23
ERROR - 2023-01-24 09:07:34 --> Severity: Notice --> Undefined property: stdClass::$daftar_antrian_poly C:\laragon\www\simrs_vclaim\application\mr_registrasi\views\registrasi\v_data_pendaftaran_mandiri.php 17
ERROR - 2023-01-24 09:07:34 --> Severity: Notice --> Undefined property: stdClass::$dokter_nama C:\laragon\www\simrs_vclaim\application\mr_registrasi\views\registrasi\v_data_pendaftaran_mandiri.php 18
ERROR - 2023-01-24 09:07:34 --> Severity: Notice --> Undefined property: stdClass::$daftar_tgl C:\laragon\www\simrs_vclaim\application\mr_registrasi\views\registrasi\v_data_pendaftaran_mandiri.php 21
ERROR - 2023-01-24 09:07:34 --> Severity: Notice --> Undefined property: stdClass::$daftar_aprove C:\laragon\www\simrs_vclaim\application\mr_registrasi\views\registrasi\v_data_pendaftaran_mandiri.php 23
ERROR - 2023-01-24 09:07:34 --> Severity: Notice --> Undefined property: stdClass::$daftar_id C:\laragon\www\simrs_vclaim\application\mr_registrasi\views\registrasi\v_data_pendaftaran_mandiri.php 23
ERROR - 2023-01-24 09:09:35 --> Severity: Notice --> Undefined property: stdClass::$daftar_tgl C:\laragon\www\simrs_vclaim\application\mr_registrasi\views\registrasi\v_data_pendaftaran_mandiri.php 18
ERROR - 2023-01-24 09:09:35 --> Severity: Notice --> Undefined property: stdClass::$daftar_aprove C:\laragon\www\simrs_vclaim\application\mr_registrasi\views\registrasi\v_data_pendaftaran_mandiri.php 20
ERROR - 2023-01-24 09:09:35 --> Severity: Notice --> Undefined property: stdClass::$daftar_id C:\laragon\www\simrs_vclaim\application\mr_registrasi\views\registrasi\v_data_pendaftaran_mandiri.php 20
ERROR - 2023-01-24 09:09:35 --> Severity: Notice --> Undefined property: stdClass::$daftar_tgl C:\laragon\www\simrs_vclaim\application\mr_registrasi\views\registrasi\v_data_pendaftaran_mandiri.php 18
ERROR - 2023-01-24 09:09:35 --> Severity: Notice --> Undefined property: stdClass::$daftar_aprove C:\laragon\www\simrs_vclaim\application\mr_registrasi\views\registrasi\v_data_pendaftaran_mandiri.php 20
ERROR - 2023-01-24 09:09:35 --> Severity: Notice --> Undefined property: stdClass::$daftar_id C:\laragon\www\simrs_vclaim\application\mr_registrasi\views\registrasi\v_data_pendaftaran_mandiri.php 20
ERROR - 2023-01-24 09:11:23 --> Severity: Notice --> Undefined property: stdClass::$daftar_aprove C:\laragon\www\simrs_vclaim\application\mr_registrasi\views\registrasi\v_data_pendaftaran_mandiri.php 19
ERROR - 2023-01-24 09:11:23 --> Severity: Notice --> Undefined property: stdClass::$daftar_id C:\laragon\www\simrs_vclaim\application\mr_registrasi\views\registrasi\v_data_pendaftaran_mandiri.php 19
ERROR - 2023-01-24 09:11:23 --> Severity: Notice --> Undefined property: stdClass::$daftar_aprove C:\laragon\www\simrs_vclaim\application\mr_registrasi\views\registrasi\v_data_pendaftaran_mandiri.php 19
ERROR - 2023-01-24 09:11:23 --> Severity: Notice --> Undefined property: stdClass::$daftar_id C:\laragon\www\simrs_vclaim\application\mr_registrasi\views\registrasi\v_data_pendaftaran_mandiri.php 19
ERROR - 2023-01-24 09:11:48 --> Severity: Notice --> Undefined property: stdClass::$daftar_aprove C:\laragon\www\simrs_vclaim\application\mr_registrasi\views\registrasi\v_data_pendaftaran_mandiri.php 19
ERROR - 2023-01-24 09:11:48 --> Severity: Notice --> Undefined property: stdClass::$daftar_id C:\laragon\www\simrs_vclaim\application\mr_registrasi\views\registrasi\v_data_pendaftaran_mandiri.php 19
ERROR - 2023-01-24 09:11:48 --> Severity: Notice --> Undefined property: stdClass::$daftar_aprove C:\laragon\www\simrs_vclaim\application\mr_registrasi\views\registrasi\v_data_pendaftaran_mandiri.php 19
ERROR - 2023-01-24 09:11:48 --> Severity: Notice --> Undefined property: stdClass::$daftar_id C:\laragon\www\simrs_vclaim\application\mr_registrasi\views\registrasi\v_data_pendaftaran_mandiri.php 19
ERROR - 2023-01-24 09:26:05 --> Query error: Unknown column 'nno_ktp' in 'field list' - Invalid query: SELECT `idx`, `nomr`, `id_daftar`, `reg_unit`, `nno_ktp`, `nama_pasien`, `nama_ruang`, `tgl_masuk`, `tgl_daftar`, `rujukan`, `namaDokterJaga`, `cara_bayar`, `no_bpjs`
FROM `tbl02_pendaftaran`
WHERE DATE_FORMAT(tgl_masuk,'%Y-%m-%d') != `tgl_daftar`
AND DATE_FORMAT(tgl_masuk,'%Y-%m-%d') = '2023-01-24'
AND   (
`nomr` LIKE '%%' ESCAPE '!'
OR  `no_ktp` LIKE '%%' ESCAPE '!'
OR  `no_bpjs` LIKE '%%' ESCAPE '!'
OR  `nama_pasien` LIKE '%%' ESCAPE '!'
OR  `tempat_lahir` LIKE '%%' ESCAPE '!'
OR  `namaDokterJaga` LIKE '%%' ESCAPE '!'
 )
 LIMIT 50
ERROR - 2023-01-24 09:26:17 --> Query error: Unknown column 'nno_ktp' in 'field list' - Invalid query: SELECT `idx`, `nomr`, `id_daftar`, `reg_unit`, `nno_ktp`, `nama_pasien`, `nama_ruang`, `tgl_masuk`, `tgl_daftar`, `rujukan`, `namaDokterJaga`, `cara_bayar`, `no_bpjs`
FROM `tbl02_pendaftaran`
WHERE DATE_FORMAT(tgl_masuk,'%Y-%m-%d') = `tgl_daftar`
AND DATE_FORMAT(tgl_masuk,'%Y-%m-%d') = '2023-01-24'
AND   (
`nomr` LIKE '%%' ESCAPE '!'
OR  `no_ktp` LIKE '%%' ESCAPE '!'
OR  `no_bpjs` LIKE '%%' ESCAPE '!'
OR  `nama_pasien` LIKE '%%' ESCAPE '!'
OR  `tempat_lahir` LIKE '%%' ESCAPE '!'
OR  `namaDokterJaga` LIKE '%%' ESCAPE '!'
 )
 LIMIT 50
ERROR - 2023-01-24 09:26:19 --> Query error: Unknown column 'nno_ktp' in 'field list' - Invalid query: SELECT `idx`, `nomr`, `id_daftar`, `reg_unit`, `nno_ktp`, `nama_pasien`, `nama_ruang`, `tgl_masuk`, `tgl_daftar`, `rujukan`, `namaDokterJaga`, `cara_bayar`, `no_bpjs`
FROM `tbl02_pendaftaran`
WHERE DATE_FORMAT(tgl_masuk,'%Y-%m-%d') = `tgl_daftar`
AND DATE_FORMAT(tgl_masuk,'%Y-%m-%d') = '2023-01-24'
AND   (
`nomr` LIKE '%%' ESCAPE '!'
OR  `no_ktp` LIKE '%%' ESCAPE '!'
OR  `no_bpjs` LIKE '%%' ESCAPE '!'
OR  `nama_pasien` LIKE '%%' ESCAPE '!'
OR  `tempat_lahir` LIKE '%%' ESCAPE '!'
OR  `namaDokterJaga` LIKE '%%' ESCAPE '!'
 )
 LIMIT 50
