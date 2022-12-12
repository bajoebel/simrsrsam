<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-03-18 05:06:38 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'AND `ruang_pengirim` != `id_ruang` AND `reg_unit` NOT IN (SELECT reg_unit FROM t' at line 4 - Invalid query: SELECT *
FROM `tbl02_pendaftaran`
WHERE `reg_unitibu` = 'RI-210317-59-0003'
AND reg_unit NOT IN (SELECT reg_unit FROM tbl02_pindah_ranap WHERE AND `ruang_pengirim` != `id_ruang` AND `reg_unit` NOT IN (SELECT reg_unit FROM tbl02_pindah_ranap_batal))
ERROR - 2021-03-18 05:41:05 --> Query error: Table 'db_simrs_v2.tbl02_pindah_ranap1' doesn't exist - Invalid query: SELECT `idx`
FROM `tbl02_pindah_ranap1`
WHERE `reg_unit` = 'RI-210317-59-0003'
ERROR - 2021-03-18 05:44:34 --> Severity: Notice --> Undefined property: stdClass::$max(idx) as idx C:\xampp32\htdocs\simrs\application\nota_tagihan\helpers\global_helper.php 303
ERROR - 2021-03-18 08:31:35 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '`reg_unit` NOT IN (SELECT reg_unit FROM tbl02_pindah_ranap_batal WHERE reg_unit ' at line 5 - Invalid query: SELECT *
FROM `tbl02_pindah_ranap`
WHERE `rawatgabung` = 1
AND `reg_unitibu` = 'RI-210318-57-0001'
AND `reg_unit NOT IN` `reg_unit` NOT IN (SELECT reg_unit FROM tbl02_pindah_ranap_batal WHERE reg_unit NOT IN (SELECT reg_unit FROM tbl02_pindah_ranap_response))
ERROR - 2021-03-18 08:41:24 --> Severity: Notice --> Undefined index: reg_unit C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 229
ERROR - 2021-03-18 08:41:24 --> Query error: Unknown column 'reg_unitibu1' in 'where clause' - Invalid query: SELECT *
FROM `tbl02_pindah_ranap`
WHERE `rawatgabung` = 1
AND `reg_unitibu1` IS NULL
AND `reg_unit` NOT IN (SELECT reg_unit FROM tbl02_pindah_ranap_batal WHERE reg_unit NOT IN (SELECT reg_unit FROM tbl02_pindah_ranap_response))
ERROR - 2021-03-18 08:46:03 --> Severity: Notice --> Undefined property: stdClass::$no_ktp C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 236
ERROR - 2021-03-18 08:46:03 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 238
ERROR - 2021-03-18 08:46:03 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 239
ERROR - 2021-03-18 08:46:03 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 240
ERROR - 2021-03-18 08:46:03 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 241
ERROR - 2021-03-18 08:46:03 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 242
ERROR - 2021-03-18 08:46:03 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 243
ERROR - 2021-03-18 08:46:03 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 244
ERROR - 2021-03-18 08:46:03 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 246
ERROR - 2021-03-18 08:46:03 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 253
ERROR - 2021-03-18 08:46:03 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 260
ERROR - 2021-03-18 08:46:03 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 261
ERROR - 2021-03-18 08:46:03 --> Severity: Notice --> Undefined property: stdClass::$id_jenis_peserta C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 262
ERROR - 2021-03-18 08:46:03 --> Severity: Notice --> Undefined property: stdClass::$jenis_peserta C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 263
ERROR - 2021-03-18 08:46:03 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 264
ERROR - 2021-03-18 08:46:03 --> Severity: Notice --> Undefined property: stdClass::$tgl_jaminan C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 264
ERROR - 2021-03-18 08:46:03 --> Severity: Notice --> Undefined property: stdClass::$hakKelasid C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 267
ERROR - 2021-03-18 08:46:03 --> Severity: Notice --> Undefined property: stdClass::$hakKelas C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 268
ERROR - 2021-03-18 08:46:03 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 269
ERROR - 2021-03-18 08:46:03 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 270
ERROR - 2021-03-18 08:46:03 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 271
ERROR - 2021-03-18 08:46:03 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 272
ERROR - 2021-03-18 08:46:03 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 273
ERROR - 2021-03-18 08:46:03 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 274
ERROR - 2021-03-18 08:46:03 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 275
ERROR - 2021-03-18 08:46:03 --> Severity: Notice --> Undefined property: stdClass::$dokterJaga C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 276
ERROR - 2021-03-18 08:46:03 --> Severity: Notice --> Undefined property: stdClass::$namaDokterJaga C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 277
ERROR - 2021-03-18 08:46:03 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '0, `id_kelas`, `kelas_layanan`, `hakKelasId`, `hakKelas`, `pjPasienNama`, `pjPas' at line 1 - Invalid query: INSERT INTO `tbl02_pendaftaran` (`id_daftar`, `nomr`, `no_ktp`, `nama_pasien`, `tempat_lahir`, `tgl_lahir`, `jns_kelamin`, `nama_provinsi`, `nama_kab_kota`, `nama_kecamatan`, `nama_kelurahan`, `jns_layanan`, `tgl_daftar`, `id_ruang`, `nama_ruang`, `id_kamar`, `nama_kamar`, `id_rujuk`, `rujukan`, `no_rujuk`, `asal_ruang`, `nama_asal_ruang`, `asal_kamar`, `nama_asal_kamar`, `dokter_pengirim`, `nama_dokter_pengirim`, `id_cara_bayar`, `cara_bayar`, `id_jenis_peserta`, `jenis_peserta`, `no_bpjs`, 0, `id_kelas`, `kelas_layanan`, `hakKelasId`, `hakKelas`, `pjPasienNama`, `pjPasienPekerjaan`, `pjPasienAlamat`, `pjPasienTelp`, `pjPasienHubKel`, `pjPasienDikirimOleh`, `pjPasienAlmtPengirim`, `dokterJaga`, `namaDokterJaga`, `kode_permintaan`, `rawatgabung`, `reg_unitibu`, `user_daftar`, `session_id`) VALUES ('2021015185', '730619', NULL, 'BY NY MUSTIKA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'RI', NULL, '57', 'RUANGAN INTERNE PRIA', '11', 'ANISA IV', '9', 'PINDAH RUANG RAWAT', NULL, '59', 'RUANGAN KEBIDANAN', '30', 'SITI MARYAM', 'NRP1910049', 'dr. ADRISWAN, Sp.OG', NULL, NULL, NULL, NULL, NULL, NULL, '2', 'II', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '76', 1, 'RI-210318-57-0003', 'NRP1910460', '9rrnup4uj1k7lgffbh4tqsovmi1c0hpv')
ERROR - 2021-03-18 08:46:03 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at C:\xampp32\htdocs\simrs\system\core\Exceptions.php:271) C:\xampp32\htdocs\simrs\system\core\Common.php 570
ERROR - 2021-03-18 08:47:17 --> Query error: Unknown column 'reg_unitibu1' in 'where clause' - Invalid query: SELECT *
FROM `tbl02_pindah_ranap`
WHERE `rawatgabung` = 1
AND `reg_unitibu1` = 'RI-210317-59-0003'
AND `reg_unit` NOT IN (SELECT reg_unit FROM tbl02_pindah_ranap_batal WHERE reg_unit NOT IN (SELECT reg_unit FROM tbl02_pindah_ranap_response))
ERROR - 2021-03-18 08:48:12 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 236
ERROR - 2021-03-18 08:48:12 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 238
ERROR - 2021-03-18 08:48:12 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 239
ERROR - 2021-03-18 08:48:12 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 240
ERROR - 2021-03-18 08:48:12 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 241
ERROR - 2021-03-18 08:48:12 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 242
ERROR - 2021-03-18 08:48:12 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 243
ERROR - 2021-03-18 08:48:12 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 244
ERROR - 2021-03-18 08:48:12 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 246
ERROR - 2021-03-18 08:48:12 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 253
ERROR - 2021-03-18 08:48:12 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 260
ERROR - 2021-03-18 08:48:12 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 261
ERROR - 2021-03-18 08:48:12 --> Severity: Notice --> Undefined property: stdClass::$id_jenis_peserta C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 262
ERROR - 2021-03-18 08:48:12 --> Severity: Notice --> Undefined property: stdClass::$jenis_peserta C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 263
ERROR - 2021-03-18 08:48:12 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 264
ERROR - 2021-03-18 08:48:12 --> Severity: Notice --> Undefined property: stdClass::$tgl_jaminan C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 264
ERROR - 2021-03-18 08:48:12 --> Severity: Notice --> Undefined property: stdClass::$hakKelasid C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 267
ERROR - 2021-03-18 08:48:12 --> Severity: Notice --> Undefined property: stdClass::$hakKelas C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 268
ERROR - 2021-03-18 08:48:12 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 269
ERROR - 2021-03-18 08:48:12 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 270
ERROR - 2021-03-18 08:48:12 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 271
ERROR - 2021-03-18 08:48:12 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 272
ERROR - 2021-03-18 08:48:12 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 273
ERROR - 2021-03-18 08:48:12 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 274
ERROR - 2021-03-18 08:48:12 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 275
ERROR - 2021-03-18 08:48:12 --> Severity: Notice --> Undefined property: stdClass::$dokterJaga C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 276
ERROR - 2021-03-18 08:48:12 --> Severity: Notice --> Undefined property: stdClass::$namaDokterJaga C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 277
ERROR - 2021-03-18 08:48:12 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 289
ERROR - 2021-03-18 08:48:12 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 290
ERROR - 2021-03-18 08:48:12 --> Query error: Column 'id_daftar' cannot be null - Invalid query: INSERT INTO `tbl02_pindah_ranap_response` (`id_pindah_ranap`, `id_daftar`, `reg_unit`, `user_id`) VALUES ('75', NULL, NULL, 'NRP1910460')
ERROR - 2021-03-18 08:48:12 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at C:\xampp32\htdocs\simrs\system\core\Exceptions.php:271) C:\xampp32\htdocs\simrs\system\core\Common.php 570
ERROR - 2021-03-18 08:49:41 --> Query error: Table 'db_simrs_v2.tbl02_pendaftaran1' doesn't exist - Invalid query: SELECT *
FROM `tbl02_pendaftaran1`
WHERE `reg_unit` = 'RI-210317-59-0003'
ERROR - 2021-03-18 08:52:43 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 237
ERROR - 2021-03-18 08:52:43 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 239
ERROR - 2021-03-18 08:52:43 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 240
ERROR - 2021-03-18 08:52:43 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 241
ERROR - 2021-03-18 08:52:43 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 242
ERROR - 2021-03-18 08:52:43 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 243
ERROR - 2021-03-18 08:52:43 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 244
ERROR - 2021-03-18 08:52:43 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 245
ERROR - 2021-03-18 08:52:43 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 247
ERROR - 2021-03-18 08:52:43 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 254
ERROR - 2021-03-18 08:52:43 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 261
ERROR - 2021-03-18 08:52:43 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 262
ERROR - 2021-03-18 08:52:43 --> Severity: Notice --> Undefined property: stdClass::$id_jenis_peserta C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 263
ERROR - 2021-03-18 08:52:43 --> Severity: Notice --> Undefined property: stdClass::$jenis_peserta C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 264
ERROR - 2021-03-18 08:52:43 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 265
ERROR - 2021-03-18 08:52:43 --> Severity: Notice --> Undefined property: stdClass::$tgl_jaminan C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 265
ERROR - 2021-03-18 08:52:43 --> Severity: Notice --> Undefined property: stdClass::$hakKelasid C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 268
ERROR - 2021-03-18 08:52:43 --> Severity: Notice --> Undefined property: stdClass::$hakKelas C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 269
ERROR - 2021-03-18 08:52:43 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 270
ERROR - 2021-03-18 08:52:43 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 271
ERROR - 2021-03-18 08:52:43 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 272
ERROR - 2021-03-18 08:52:43 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 273
ERROR - 2021-03-18 08:52:43 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 274
ERROR - 2021-03-18 08:52:43 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 275
ERROR - 2021-03-18 08:52:43 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 276
ERROR - 2021-03-18 08:52:43 --> Severity: Notice --> Undefined property: stdClass::$dokterJaga C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 277
ERROR - 2021-03-18 08:52:43 --> Severity: Notice --> Undefined property: stdClass::$namaDokterJaga C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 278
ERROR - 2021-03-18 08:52:43 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 290
ERROR - 2021-03-18 08:52:43 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 291
ERROR - 2021-03-18 08:52:43 --> Query error: Column 'id_daftar' cannot be null - Invalid query: INSERT INTO `tbl02_pindah_ranap_response` (`id_pindah_ranap`, `id_daftar`, `reg_unit`, `user_id`) VALUES ('75', NULL, NULL, 'NRP1910460')
ERROR - 2021-03-18 08:52:43 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at C:\xampp32\htdocs\simrs\system\core\Exceptions.php:271) C:\xampp32\htdocs\simrs\system\core\Common.php 570
ERROR - 2021-03-18 08:56:24 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 261
ERROR - 2021-03-18 08:56:24 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 262
ERROR - 2021-03-18 08:56:24 --> Severity: Notice --> Undefined property: stdClass::$id_jenis_peserta C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 263
ERROR - 2021-03-18 08:56:24 --> Severity: Notice --> Undefined property: stdClass::$jenis_peserta C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 264
ERROR - 2021-03-18 08:56:24 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 265
ERROR - 2021-03-18 08:56:24 --> Severity: Notice --> Undefined property: stdClass::$tgl_jaminan C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 265
ERROR - 2021-03-18 08:56:24 --> Severity: Notice --> Undefined property: stdClass::$hakKelasid C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 268
ERROR - 2021-03-18 08:56:24 --> Severity: Notice --> Undefined property: stdClass::$hakKelas C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 269
ERROR - 2021-03-18 08:56:24 --> Severity: Notice --> Undefined property: stdClass::$dokterJaga C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 277
ERROR - 2021-03-18 08:56:24 --> Severity: Notice --> Undefined property: stdClass::$namaDokterJaga C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 278
ERROR - 2021-03-18 08:56:24 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 290
ERROR - 2021-03-18 08:56:24 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 291
ERROR - 2021-03-18 08:56:24 --> Query error: Column 'id_daftar' cannot be null - Invalid query: INSERT INTO `tbl02_pindah_ranap_response` (`id_pindah_ranap`, `id_daftar`, `reg_unit`, `user_id`) VALUES ('75', NULL, NULL, 'NRP1910460')
ERROR - 2021-03-18 08:56:24 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at C:\xampp32\htdocs\simrs\system\core\Exceptions.php:271) C:\xampp32\htdocs\simrs\system\core\Common.php 570
ERROR - 2021-03-18 08:57:27 --> Severity: Notice --> Undefined property: stdClass::$id_jenis_peserta C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 263
ERROR - 2021-03-18 08:57:27 --> Severity: Notice --> Undefined property: stdClass::$jenis_peserta C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 264
ERROR - 2021-03-18 08:57:27 --> Severity: Notice --> Undefined property: stdClass::$hakKelasid C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 268
ERROR - 2021-03-18 08:57:27 --> Severity: Notice --> Undefined property: stdClass::$hakKelas C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 269
ERROR - 2021-03-18 08:57:27 --> Severity: Notice --> Undefined property: stdClass::$dokterJaga C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 277
ERROR - 2021-03-18 08:57:27 --> Severity: Notice --> Undefined property: stdClass::$namaDokterJaga C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 278
ERROR - 2021-03-18 08:57:27 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 290
ERROR - 2021-03-18 08:57:27 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 291
ERROR - 2021-03-18 08:57:27 --> Query error: Column 'id_daftar' cannot be null - Invalid query: INSERT INTO `tbl02_pindah_ranap_response` (`id_pindah_ranap`, `id_daftar`, `reg_unit`, `user_id`) VALUES ('75', NULL, NULL, 'NRP1910460')
ERROR - 2021-03-18 08:57:28 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at C:\xampp32\htdocs\simrs\system\core\Exceptions.php:271) C:\xampp32\htdocs\simrs\system\core\Common.php 570
ERROR - 2021-03-18 09:17:30 --> Severity: Notice --> Undefined property: stdClass::$hakKelasid C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 268
ERROR - 2021-03-18 09:17:30 --> Severity: Notice --> Undefined property: stdClass::$hakKelas C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 269
ERROR - 2021-03-18 09:17:30 --> Severity: Notice --> Undefined property: stdClass::$dokterJaga C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 277
ERROR - 2021-03-18 09:17:30 --> Severity: Notice --> Undefined property: stdClass::$namaDokterJaga C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 278
ERROR - 2021-03-18 09:17:30 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 290
ERROR - 2021-03-18 09:17:30 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 291
ERROR - 2021-03-18 09:17:30 --> Query error: Column 'id_daftar' cannot be null - Invalid query: INSERT INTO `tbl02_pindah_ranap_response` (`id_pindah_ranap`, `id_daftar`, `reg_unit`, `user_id`) VALUES ('75', NULL, NULL, 'NRP1910460')
ERROR - 2021-03-18 09:18:21 --> Severity: Notice --> Undefined property: stdClass::$dokterJaga C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 277
ERROR - 2021-03-18 09:18:21 --> Severity: Notice --> Undefined property: stdClass::$namaDokterJaga C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 278
ERROR - 2021-03-18 09:18:21 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 290
ERROR - 2021-03-18 09:18:21 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 291
ERROR - 2021-03-18 09:18:21 --> Query error: Column 'id_daftar' cannot be null - Invalid query: INSERT INTO `tbl02_pindah_ranap_response` (`id_pindah_ranap`, `id_daftar`, `reg_unit`, `user_id`) VALUES ('75', NULL, NULL, 'NRP1910460')
ERROR - 2021-03-18 09:19:32 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 290
ERROR - 2021-03-18 09:19:32 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 291
ERROR - 2021-03-18 09:19:32 --> Query error: Column 'id_daftar' cannot be null - Invalid query: INSERT INTO `tbl02_pindah_ranap_response` (`id_pindah_ranap`, `id_daftar`, `reg_unit`, `user_id`) VALUES ('75', NULL, NULL, 'NRP1910460')
ERROR - 2021-03-18 09:21:13 --> Severity: Notice --> Trying to get property of non-object C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Pindah_kamar.php 291
ERROR - 2021-03-18 09:21:13 --> Query error: Column 'reg_unit' cannot be null - Invalid query: INSERT INTO `tbl02_pindah_ranap_response` (`id_pindah_ranap`, `id_daftar`, `reg_unit`, `user_id`) VALUES ('75', '2021015185', NULL, 'NRP1910460')
