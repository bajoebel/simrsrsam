<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-07-03 08:01:52 --> Query error: Table 'db_simrs_v2.tbl02_pendaftaran1' doesn't exist - Invalid query: SELECT *
FROM `tbl02_pendaftaran1`
WHERE `jns_layanan` = 'RI'
AND `tgl_masuk` > '2021-02-11'
AND `reg_unit` NOT IN (SELECT reg_unit FROM tbl02_pindah_ranap)
AND `reg_unit` NOT IN (SELECT reg_unit FROM tbl02_pendaftaran_batal)
AND `reg_unit` NOT IN (SELECT reg_unit FROM tbl02_pasien_pulang)
AND   (
`nomr` LIKE '%0818%' ESCAPE '!'
OR  `reg_unit` LIKE '%0818%' ESCAPE '!'
OR  `id_daftar` LIKE '%0818%' ESCAPE '!'
OR  `nama_pasien` LIKE '%0818%' ESCAPE '!'
OR  `nama_ruang` LIKE '%0818%' ESCAPE '!'
OR  `nama_kamar` LIKE '%0818%' ESCAPE '!'
 )
