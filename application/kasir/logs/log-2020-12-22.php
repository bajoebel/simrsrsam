<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2020-12-22 10:38:25 --> Query error: Table 'db_simrs_v2.tbl02_pendaftaran1' doesn't exist - Invalid query: SELECT *
FROM `tbl02_pendaftaran1`
WHERE `jns_layanan` = 'RJ'
AND `status_transaksi` = 1
AND   (
`no_bpjs` LIKE '%%' ESCAPE '!'
OR  `id_daftar` LIKE '%%' ESCAPE '!'
OR  `no_ktp` LIKE '%%' ESCAPE '!'
OR  `nama_pasien` LIKE '%%' ESCAPE '!'
OR  `tempat_lahir` LIKE '%%' ESCAPE '!'
OR  `tgl_lahir` LIKE '%%' ESCAPE '!'
OR  `jns_kelamin` LIKE '%%' ESCAPE '!'
 )
AND `id_daftar` NOT IN (SELECT id_daftar FROM tbl02_pendaftaran WHERE jns_layanan='RI')
ORDER BY `idx` DESC
 LIMIT 10
ERROR - 2020-12-22 10:38:48 --> Query error: Table 'db_simrs_v2.tbl02_pendaftaran1' doesn't exist - Invalid query: SELECT *
FROM `tbl02_pendaftaran1`
WHERE `jns_layanan` = 'RI'
AND `status_transaksi` = 1
AND   (
`no_bpjs` LIKE '%%' ESCAPE '!'
OR  `id_daftar` LIKE '%%' ESCAPE '!'
OR  `no_ktp` LIKE '%%' ESCAPE '!'
OR  `nama_pasien` LIKE '%%' ESCAPE '!'
OR  `tempat_lahir` LIKE '%%' ESCAPE '!'
OR  `tgl_lahir` LIKE '%%' ESCAPE '!'
OR  `jns_kelamin` LIKE '%%' ESCAPE '!'
 )
ORDER BY `idx` DESC
 LIMIT 10
ERROR - 2020-12-22 10:39:42 --> Query error: Table 'db_simrs_v2.tbl02_pendaftaran1' doesn't exist - Invalid query: SELECT *
FROM `tbl02_pendaftaran1`
WHERE `jns_layanan` = 'RJ'
AND `status_transaksi` = 1
AND   (
`no_bpjs` LIKE '%%' ESCAPE '!'
OR  `id_daftar` LIKE '%%' ESCAPE '!'
OR  `no_ktp` LIKE '%%' ESCAPE '!'
OR  `nama_pasien` LIKE '%%' ESCAPE '!'
OR  `tempat_lahir` LIKE '%%' ESCAPE '!'
OR  `tgl_lahir` LIKE '%%' ESCAPE '!'
OR  `jns_kelamin` LIKE '%%' ESCAPE '!'
 )
AND `id_daftar` NOT IN (SELECT id_daftar FROM tbl02_pendaftaran WHERE jns_layanan='RI')
ORDER BY `idx` DESC
 LIMIT 10
