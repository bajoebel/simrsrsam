<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-03-30 03:29:17 --> Query error: Table 'db_simrs_v2.tbl02_pendaftaran1' doesn't exist - Invalid query: SELECT *
FROM `tbl02_pendaftaran1`
WHERE `id_ruang` = '56'
AND `jns_layanan` = 'RI'
AND  (`reg_unit` NOT IN (SELECT a.reg_unit FROM tbl02_pendaftaran_batal a)
            AND reg_unit NOT IN (SELECT b.reg_unit FROM tbl02_pindah_ranap b WHERE b.ruang_pengirim != `b`.`id_ruang` AND `b`.`reg_unit` NOT IN(SELECT reg_unit FROM tbl02_pindah_ranap_response))
            AND `reg_unit` NOT IN (SELECT c.reg_unit FROM tbl02_pasien_pulang c))
AND   (
`nomr` LIKE '%%' ESCAPE '!'
OR  `id_daftar` LIKE '%%' ESCAPE '!'
OR  `reg_unit` LIKE '%%' ESCAPE '!'
OR  `nama_pasien` LIKE '%%' ESCAPE '!'
OR  `nama_kamar` LIKE '%%' ESCAPE '!'
 )
ORDER BY `tgl_masuk` DESC
 LIMIT 20
ERROR - 2021-03-30 03:29:31 --> Query error: Table 'db_simrs_v2.tbl02_pendaftaran1' doesn't exist - Invalid query: SELECT *
FROM `tbl02_pendaftaran1`
WHERE `id_ruang` = '56'
AND `jns_layanan` = 'RI'
AND  (`reg_unit` NOT IN (SELECT a.reg_unit FROM tbl02_pendaftaran_batal a)
            AND reg_unit NOT IN (SELECT b.reg_unit FROM tbl02_pindah_ranap b WHERE b.ruang_pengirim != `b`.`id_ruang` AND `b`.`reg_unit` NOT IN(SELECT reg_unit FROM tbl02_pindah_ranap_response))
            AND `reg_unit` NOT IN (SELECT c.reg_unit FROM tbl02_pasien_pulang c))
AND   (
`nomr` LIKE '%%' ESCAPE '!'
OR  `id_daftar` LIKE '%%' ESCAPE '!'
OR  `reg_unit` LIKE '%%' ESCAPE '!'
OR  `nama_pasien` LIKE '%%' ESCAPE '!'
OR  `nama_kamar` LIKE '%%' ESCAPE '!'
 )
ORDER BY `tgl_masuk` DESC
 LIMIT 20
