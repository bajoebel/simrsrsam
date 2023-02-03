<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2023-01-25 01:18:29 --> Query error: Table 'rsam_dev.tbl02_pendaftaran' doesn't exist - Invalid query: SELECT `idx`, `nomr`, `id_daftar`, `reg_unit`, `no_ktp`, `nama_pasien`, `nama_ruang`, `tgl_masuk`, `tgl_daftar`, `rujukan`, `namaDokterJaga`, `cara_bayar`, `no_bpjs`
FROM `tbl02_pendaftaran`
WHERE DATE_FORMAT(tgl_masuk,'%Y-%m-%d') = `tgl_daftar`
AND DATE_FORMAT(tgl_masuk,'%Y-%m-%d') = '2023-01-25'
AND `user_daftar` = 'Anjungan Mandiri'
AND   (
`nomr` LIKE '%%' ESCAPE '!'
OR  `no_ktp` LIKE '%%' ESCAPE '!'
OR  `no_bpjs` LIKE '%%' ESCAPE '!'
OR  `nama_pasien` LIKE '%%' ESCAPE '!'
OR  `tempat_lahir` LIKE '%%' ESCAPE '!'
OR  `namaDokterJaga` LIKE '%%' ESCAPE '!'
 )
 LIMIT 50
