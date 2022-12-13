<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-04-07 05:08:53 --> Query error: Unknown column 'a.idx' in 'IN/ALL/ANY subquery' - Invalid query: SELECT *
FROM `tbl02_pindah_ranap`
LEFT JOIN `tbl02_pindah_ranap_response` `b` ON `a`.`idx`=`b`.`id_pindah_ranap`
WHERE `ruang_pengirim` = '66'
AND  (`a`.`idx` NOT IN (SELECT c.id_pindah_ranap FROM tbl02_pindah_ranap_batal c))
AND   (
`nomr` LIKE '%%' ESCAPE '!'
OR  `id_daftar` LIKE '%%' ESCAPE '!'
OR  `reg_unit` LIKE '%%' ESCAPE '!'
OR  `nama_pasien` LIKE '%%' ESCAPE '!'
OR  `nama_ruang_pengirim` LIKE '%%' ESCAPE '!'
 )
ORDER BY `tgl_minta` DESC
ERROR - 2021-04-07 05:08:55 --> Query error: Unknown column 'a.idx' in 'IN/ALL/ANY subquery' - Invalid query: SELECT *
FROM `tbl02_pindah_ranap`
LEFT JOIN `tbl02_pindah_ranap_response` `b` ON `a`.`idx`=`b`.`id_pindah_ranap`
WHERE `ruang_pengirim` = '66'
AND  (`a`.`idx` NOT IN (SELECT c.id_pindah_ranap FROM tbl02_pindah_ranap_batal c))
AND   (
`nomr` LIKE '%%' ESCAPE '!'
OR  `id_daftar` LIKE '%%' ESCAPE '!'
OR  `reg_unit` LIKE '%%' ESCAPE '!'
OR  `nama_pasien` LIKE '%%' ESCAPE '!'
OR  `nama_ruang_pengirim` LIKE '%%' ESCAPE '!'
 )
ORDER BY `tgl_minta` DESC
ERROR - 2021-04-07 05:21:16 --> Query error: Unknown column 'a.idx' in 'IN/ALL/ANY subquery' - Invalid query: SELECT *
FROM `tbl02_pindah_ranap`
LEFT JOIN `tbl02_pindah_ranap_response` `b` ON `a`.`idx`=`b`.`id_pindah_ranap`
WHERE `ruang_pengirim` = '66'
AND  (`a`.`idx` NOT IN (SELECT c.id_pindah_ranap FROM tbl02_pindah_ranap_batal c))
AND   (
`nomr` LIKE '%%' ESCAPE '!'
OR  `id_daftar` LIKE '%%' ESCAPE '!'
OR  `reg_unit` LIKE '%%' ESCAPE '!'
OR  `nama_pasien` LIKE '%%' ESCAPE '!'
OR  `nama_ruang_pengirim` LIKE '%%' ESCAPE '!'
 )
ORDER BY `tgl_minta` DESC
ERROR - 2021-04-07 05:21:20 --> Query error: Unknown column 'a.idx' in 'IN/ALL/ANY subquery' - Invalid query: SELECT *
FROM `tbl02_pindah_ranap`
LEFT JOIN `tbl02_pindah_ranap_response` `b` ON `a`.`idx`=`b`.`id_pindah_ranap`
WHERE `ruang_pengirim` = '66'
AND  (`a`.`idx` NOT IN (SELECT c.id_pindah_ranap FROM tbl02_pindah_ranap_batal c))
AND   (
`nomr` LIKE '%%' ESCAPE '!'
OR  `id_daftar` LIKE '%%' ESCAPE '!'
OR  `reg_unit` LIKE '%%' ESCAPE '!'
OR  `nama_pasien` LIKE '%%' ESCAPE '!'
OR  `nama_ruang_pengirim` LIKE '%%' ESCAPE '!'
 )
ORDER BY `tgl_minta` DESC
ERROR - 2021-04-07 05:31:41 --> Query error: Unknown column 'a.idx' in 'IN/ALL/ANY subquery' - Invalid query: SELECT *
FROM `tbl02_pindah_ranap`
LEFT JOIN `tbl02_pindah_ranap_response` `b` ON `a`.`idx`=`b`.`id_pindah_ranap`
WHERE `ruang_pengirim` = '55'
AND  (`a`.`idx` NOT IN (SELECT c.id_pindah_ranap FROM tbl02_pindah_ranap_batal c))
AND   (
`nomr` LIKE '%%' ESCAPE '!'
OR  `id_daftar` LIKE '%%' ESCAPE '!'
OR  `reg_unit` LIKE '%%' ESCAPE '!'
OR  `nama_pasien` LIKE '%%' ESCAPE '!'
OR  `nama_ruang_pengirim` LIKE '%%' ESCAPE '!'
 )
ORDER BY `tgl_minta` DESC
ERROR - 2021-04-07 05:31:42 --> Query error: Unknown column 'a.idx' in 'IN/ALL/ANY subquery' - Invalid query: SELECT *
FROM `tbl02_pindah_ranap`
LEFT JOIN `tbl02_pindah_ranap_response` `b` ON `a`.`idx`=`b`.`id_pindah_ranap`
WHERE `ruang_pengirim` = '55'
AND  (`a`.`idx` NOT IN (SELECT c.id_pindah_ranap FROM tbl02_pindah_ranap_batal c))
AND   (
`nomr` LIKE '%%' ESCAPE '!'
OR  `id_daftar` LIKE '%%' ESCAPE '!'
OR  `reg_unit` LIKE '%%' ESCAPE '!'
OR  `nama_pasien` LIKE '%%' ESCAPE '!'
OR  `nama_ruang_pengirim` LIKE '%%' ESCAPE '!'
 )
ORDER BY `tgl_minta` DESC
ERROR - 2021-04-07 05:31:44 --> Query error: Unknown column 'a.idx' in 'IN/ALL/ANY subquery' - Invalid query: SELECT *
FROM `tbl02_pindah_ranap`
LEFT JOIN `tbl02_pindah_ranap_response` `b` ON `a`.`idx`=`b`.`id_pindah_ranap`
WHERE `ruang_pengirim` = '55'
AND  (`a`.`idx` NOT IN (SELECT c.id_pindah_ranap FROM tbl02_pindah_ranap_batal c))
AND   (
`nomr` LIKE '%%' ESCAPE '!'
OR  `id_daftar` LIKE '%%' ESCAPE '!'
OR  `reg_unit` LIKE '%%' ESCAPE '!'
OR  `nama_pasien` LIKE '%%' ESCAPE '!'
OR  `nama_ruang_pengirim` LIKE '%%' ESCAPE '!'
 )
ORDER BY `tgl_minta` DESC
ERROR - 2021-04-07 05:37:25 --> Query error: Unknown column 'id_ruang1' in 'where clause' - Invalid query: SELECT *
FROM `tbl02_pendaftaran`
WHERE (status_pasien = 1 OR `status_pasien` = 3)
AND `id_ruang1` = '66'
AND `jns_layanan` = 'RI'
AND   (
`nomr` LIKE '%%' ESCAPE '!'
OR  `id_daftar` LIKE '%%' ESCAPE '!'
OR  `reg_unit` LIKE '%%' ESCAPE '!'
OR  `nama_pasien` LIKE '%%' ESCAPE '!'
OR  `nama_kamar` LIKE '%%' ESCAPE '!'
 )
ORDER BY `tgl_masuk` DESC
 LIMIT 20
ERROR - 2021-04-07 05:58:22 --> Query error: Unknown column 'id_ruang1' in 'where clause' - Invalid query: SELECT *
FROM `tbl02_pendaftaran`
WHERE (status_pasien = 1 OR `status_pasien` = 3)
AND `id_ruang1` = '66'
AND `jns_layanan` = 'RI'
AND   (
`nomr` LIKE '%%' ESCAPE '!'
OR  `id_daftar` LIKE '%%' ESCAPE '!'
OR  `reg_unit` LIKE '%%' ESCAPE '!'
OR  `nama_pasien` LIKE '%%' ESCAPE '!'
OR  `nama_kamar` LIKE '%%' ESCAPE '!'
 )
ORDER BY `tgl_masuk` DESC
 LIMIT 20
ERROR - 2021-04-07 08:53:57 --> Query error: Unknown column 'a.idx' in 'IN/ALL/ANY subquery' - Invalid query: SELECT *
FROM `tbl02_pindah_ranap`
LEFT JOIN `tbl02_pindah_ranap_response` `b` ON `a`.`idx`=`b`.`id_pindah_ranap`
WHERE `ruang_pengirim` = '66'
AND  (`a`.`idx` NOT IN (SELECT c.id_pindah_ranap FROM tbl02_pindah_ranap_batal c))
AND   (
`nomr` LIKE '%%' ESCAPE '!'
OR  `id_daftar` LIKE '%%' ESCAPE '!'
OR  `reg_unit` LIKE '%%' ESCAPE '!'
OR  `nama_pasien` LIKE '%%' ESCAPE '!'
OR  `nama_ruang_pengirim` LIKE '%%' ESCAPE '!'
 )
ORDER BY `tgl_minta` DESC
ERROR - 2021-04-07 09:00:24 --> Query error: Table 'db_simrs_v2.tbl02_pindah_ranap1' doesn't exist - Invalid query: SELECT *
FROM `tbl02_pindah_ranap1`
WHERE `id_ruang` = '57'
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
ERROR - 2021-04-07 09:00:30 --> Query error: Table 'db_simrs_v2.tbl02_pindah_ranap1' doesn't exist - Invalid query: SELECT *
FROM `tbl02_pindah_ranap1`
WHERE `id_ruang` = '57'
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
ERROR - 2021-04-07 09:00:32 --> Query error: Table 'db_simrs_v2.tbl02_pindah_ranap1' doesn't exist - Invalid query: SELECT *
FROM `tbl02_pindah_ranap1`
WHERE `id_ruang` = '57'
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
ERROR - 2021-04-07 09:07:54 --> Query error: Table 'db_simrs_v2.tbl02_pindah_ranap1' doesn't exist - Invalid query: SELECT *
FROM `tbl02_pindah_ranap1`
WHERE `id_ruang` = '56'
AND  (`reg_unit` NOT IN (SELECT a.reg_unit FROM tbl02_pindah_ranap_batal a)
            AND `reg_unit` NOT IN (SELECT b.reg_unit FROM tbl02_pindah_ranap_response b))
AND   (
`nomr` LIKE '%%' ESCAPE '!'
OR  `id_daftar` LIKE '%%' ESCAPE '!'
OR  `reg_unit` LIKE '%%' ESCAPE '!'
OR  `nama_pasien` LIKE '%%' ESCAPE '!'
OR  `nama_ruang_pengirim` LIKE '%%' ESCAPE '!'
 )
ERROR - 2021-04-07 09:10:14 --> Query error: Table 'db_simrs_v2.tbl02_pindah_ranap1' doesn't exist - Invalid query: SELECT *
FROM `tbl02_pindah_ranap1`
WHERE `id_ruang` = '56'
AND  (`idx` NOT IN (SELECT a.id_pindah_ranap FROM tbl02_pindah_ranap_batal a)
            AND `idx` NOT IN (SELECT b.id_pindah_ranap FROM tbl02_pindah_ranap_response b))
AND   (
`nomr` LIKE '%%' ESCAPE '!'
OR  `id_daftar` LIKE '%%' ESCAPE '!'
OR  `reg_unit` LIKE '%%' ESCAPE '!'
OR  `nama_pasien` LIKE '%%' ESCAPE '!'
OR  `nama_ruang_pengirim` LIKE '%%' ESCAPE '!'
 )
ERROR - 2021-04-07 09:10:32 --> Query error: Table 'db_simrs_v2.tbl02_pindah_ranap1' doesn't exist - Invalid query: SELECT *
FROM `tbl02_pindah_ranap1`
WHERE `id_ruang` = '56'
AND  (`idx` NOT IN (SELECT a.id_pindah_ranap FROM tbl02_pindah_ranap_batal a)
            AND `idx` NOT IN (SELECT b.id_pindah_ranap FROM tbl02_pindah_ranap_response b))
AND   (
`nomr` LIKE '%%' ESCAPE '!'
OR  `id_daftar` LIKE '%%' ESCAPE '!'
OR  `reg_unit` LIKE '%%' ESCAPE '!'
OR  `nama_pasien` LIKE '%%' ESCAPE '!'
OR  `nama_ruang_pengirim` LIKE '%%' ESCAPE '!'
 )
ERROR - 2021-04-07 09:11:36 --> Query error: Table 'db_simrs_v2.tbl02_pindah_ranap1' doesn't exist - Invalid query: SELECT *
FROM `tbl02_pindah_ranap1`
WHERE `id_ruang` = '56'
AND  (`idx` NOT IN (SELECT a.id_pindah_ranap FROM tbl02_pindah_ranap_batal a)
            AND `idx` NOT IN (SELECT b.id_pindah_ranap FROM tbl02_pindah_ranap_response b))
AND   (
`nomr` LIKE '%%' ESCAPE '!'
OR  `id_daftar` LIKE '%%' ESCAPE '!'
OR  `reg_unit` LIKE '%%' ESCAPE '!'
OR  `nama_pasien` LIKE '%%' ESCAPE '!'
OR  `nama_ruang_pengirim` LIKE '%%' ESCAPE '!'
 )
ERROR - 2021-04-07 09:13:34 --> Query error: Table 'db_simrs_v2.tbl02_pindah_ranap1' doesn't exist - Invalid query: SELECT *
FROM `tbl02_pindah_ranap1`
WHERE `id_ruang` = '56'
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
ERROR - 2021-04-07 09:14:16 --> Query error: Table 'db_simrs_v2.tbl02_pindah_ranap1' doesn't exist - Invalid query: SELECT *
FROM `tbl02_pindah_ranap1`
WHERE `id_ruang` = '56'
AND  (`idx` NOT IN (SELECT a.id_pindah_ranap FROM tbl02_pindah_ranap_batal a)
            AND `idx` NOT IN (SELECT b.id_pindah_ranap FROM tbl02_pindah_ranap_response b))
AND   (
`nomr` LIKE '%%' ESCAPE '!'
OR  `id_daftar` LIKE '%%' ESCAPE '!'
OR  `reg_unit` LIKE '%%' ESCAPE '!'
OR  `nama_pasien` LIKE '%%' ESCAPE '!'
OR  `nama_ruang_pengirim` LIKE '%%' ESCAPE '!'
 )
ERROR - 2021-04-07 09:18:19 --> Query error: Unknown column 'a.idx' in 'IN/ALL/ANY subquery' - Invalid query: SELECT *
FROM `tbl02_pindah_ranap`
LEFT JOIN `tbl02_pindah_ranap_response` `b` ON `a`.`idx`=`b`.`id_pindah_ranap`
WHERE `ruang_pengirim` = '66'
AND  (`a`.`idx` NOT IN (SELECT c.id_pindah_ranap FROM tbl02_pindah_ranap_batal c))
AND   (
`nomr` LIKE '%%' ESCAPE '!'
OR  `id_daftar` LIKE '%%' ESCAPE '!'
OR  `reg_unit` LIKE '%%' ESCAPE '!'
OR  `nama_pasien` LIKE '%%' ESCAPE '!'
OR  `nama_ruang_pengirim` LIKE '%%' ESCAPE '!'
 )
ORDER BY `tgl_minta` DESC
ERROR - 2021-04-07 09:18:39 --> Query error: Unknown column 'a.idx' in 'IN/ALL/ANY subquery' - Invalid query: SELECT *
FROM `tbl02_pindah_ranap`
LEFT JOIN `tbl02_pindah_ranap_response` `b` ON `a`.`idx`=`b`.`id_pindah_ranap`
WHERE `ruang_pengirim` = '66'
AND  (`a`.`idx` NOT IN (SELECT c.id_pindah_ranap FROM tbl02_pindah_ranap_batal c))
AND   (
`nomr` LIKE '%%' ESCAPE '!'
OR  `id_daftar` LIKE '%%' ESCAPE '!'
OR  `reg_unit` LIKE '%%' ESCAPE '!'
OR  `nama_pasien` LIKE '%%' ESCAPE '!'
OR  `nama_ruang_pengirim` LIKE '%%' ESCAPE '!'
 )
ORDER BY `tgl_minta` DESC
ERROR - 2021-04-07 09:18:46 --> Query error: Unknown column 'a.idx' in 'IN/ALL/ANY subquery' - Invalid query: SELECT *
FROM `tbl02_pindah_ranap`
LEFT JOIN `tbl02_pindah_ranap_response` `b` ON `a`.`idx`=`b`.`id_pindah_ranap`
WHERE `ruang_pengirim` = '66'
AND  (`a`.`idx` NOT IN (SELECT c.id_pindah_ranap FROM tbl02_pindah_ranap_batal c))
AND   (
`nomr` LIKE '%%' ESCAPE '!'
OR  `id_daftar` LIKE '%%' ESCAPE '!'
OR  `reg_unit` LIKE '%%' ESCAPE '!'
OR  `nama_pasien` LIKE '%%' ESCAPE '!'
OR  `nama_ruang_pengirim` LIKE '%%' ESCAPE '!'
 )
ORDER BY `tgl_minta` DESC
ERROR - 2021-04-07 09:20:43 --> Query error: Unknown column 'a.idx' in 'IN/ALL/ANY subquery' - Invalid query: SELECT *
FROM `tbl02_pindah_ranap`
LEFT JOIN `tbl02_pindah_ranap_response` `b` ON `a`.`idx`=`b`.`id_pindah_ranap`
WHERE `ruang_pengirim` = '66'
AND  (`a`.`idx` NOT IN (SELECT c.id_pindah_ranap FROM tbl02_pindah_ranap_batal c))
AND   (
`nomr` LIKE '%%' ESCAPE '!'
OR  `id_daftar` LIKE '%%' ESCAPE '!'
OR  `reg_unit` LIKE '%%' ESCAPE '!'
OR  `nama_pasien` LIKE '%%' ESCAPE '!'
OR  `nama_ruang_pengirim` LIKE '%%' ESCAPE '!'
 )
ORDER BY `tgl_minta` DESC
ERROR - 2021-04-07 09:20:53 --> Query error: Unknown column 'a.idx' in 'IN/ALL/ANY subquery' - Invalid query: SELECT *
FROM `tbl02_pindah_ranap`
LEFT JOIN `tbl02_pindah_ranap_response` `b` ON `a`.`idx`=`b`.`id_pindah_ranap`
WHERE `ruang_pengirim` = '66'
AND  (`a`.`idx` NOT IN (SELECT c.id_pindah_ranap FROM tbl02_pindah_ranap_batal c))
AND   (
`nomr` LIKE '%%' ESCAPE '!'
OR  `id_daftar` LIKE '%%' ESCAPE '!'
OR  `reg_unit` LIKE '%%' ESCAPE '!'
OR  `nama_pasien` LIKE '%%' ESCAPE '!'
OR  `nama_ruang_pengirim` LIKE '%%' ESCAPE '!'
 )
ORDER BY `tgl_minta` DESC
ERROR - 2021-04-07 09:21:55 --> Query error: Unknown column 'a.idx' in 'IN/ALL/ANY subquery' - Invalid query: SELECT *
FROM `tbl02_pindah_ranap`
LEFT JOIN `tbl02_pindah_ranap_response` `b` ON `a`.`idx`=`b`.`id_pindah_ranap`
WHERE `ruang_pengirim` = '66'
AND  (`a`.`idx` NOT IN (SELECT c.id_pindah_ranap FROM tbl02_pindah_ranap_batal c))
AND   (
`nomr` LIKE '%%' ESCAPE '!'
OR  `id_daftar` LIKE '%%' ESCAPE '!'
OR  `reg_unit` LIKE '%%' ESCAPE '!'
OR  `nama_pasien` LIKE '%%' ESCAPE '!'
OR  `nama_ruang_pengirim` LIKE '%%' ESCAPE '!'
 )
ORDER BY `tgl_minta` DESC
ERROR - 2021-04-07 09:22:19 --> Query error: Unknown column 'a.idx' in 'IN/ALL/ANY subquery' - Invalid query: SELECT *
FROM `tbl02_pindah_ranap`
LEFT JOIN `tbl02_pindah_ranap_response` `b` ON `a`.`idx`=`b`.`id_pindah_ranap`
WHERE `ruang_pengirim` = '66'
AND  (`a`.`idx` NOT IN (SELECT c.id_pindah_ranap FROM tbl02_pindah_ranap_batal c))
AND   (
`nomr` LIKE '%%' ESCAPE '!'
OR  `id_daftar` LIKE '%%' ESCAPE '!'
OR  `reg_unit` LIKE '%%' ESCAPE '!'
OR  `nama_pasien` LIKE '%%' ESCAPE '!'
OR  `nama_ruang_pengirim` LIKE '%%' ESCAPE '!'
 )
ORDER BY `tgl_minta` DESC
ERROR - 2021-04-07 09:22:23 --> Query error: Unknown column 'a.idx' in 'IN/ALL/ANY subquery' - Invalid query: SELECT *
FROM `tbl02_pindah_ranap`
LEFT JOIN `tbl02_pindah_ranap_response` `b` ON `a`.`idx`=`b`.`id_pindah_ranap`
WHERE `ruang_pengirim` = '66'
AND  (`a`.`idx` NOT IN (SELECT c.id_pindah_ranap FROM tbl02_pindah_ranap_batal c))
AND   (
`nomr` LIKE '%%' ESCAPE '!'
OR  `id_daftar` LIKE '%%' ESCAPE '!'
OR  `reg_unit` LIKE '%%' ESCAPE '!'
OR  `nama_pasien` LIKE '%%' ESCAPE '!'
OR  `nama_ruang_pengirim` LIKE '%%' ESCAPE '!'
 )
ORDER BY `tgl_minta` DESC
ERROR - 2021-04-07 09:51:30 --> Severity: Parsing Error --> syntax error, unexpected '$btnbatal' (T_VARIABLE) C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Layanan.php 107
