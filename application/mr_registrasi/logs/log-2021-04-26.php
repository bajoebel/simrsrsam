<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-04-26 06:24:25 --> Query error: Table 'db_simrs_v2.tbl01_kamar1' doesn't exist - Invalid query: SELECT `a`.`id_kamar`, `a`.`nama_kamar`, `a`.`id_ruang`, `a`.`nama_ruang`, `a`.`jml_tt`, IFNULL(b.terisi_lk, 0) AS terisi_lk, IFNULL(b.terisi_pr, 0) AS terisi_pr
FROM `tbl01_kamar1` `a`
LEFT JOIN `view_bedterisi` `b` ON a.`id_kamar`=b.`id_kamar`
WHERE `a`.`id_ruang` = '55'
AND `a`.`status_kamar` = 1
AND   (
`a`.`kelas_id` = '3'
OR `a`.`kelas_id` = '0'
 )
ERROR - 2021-04-26 06:25:25 --> Query error: Table 'db_simrs_v2.tbl01_kamar1' doesn't exist - Invalid query: SELECT `a`.`id_kamar`, `a`.`nama_kamar`, `a`.`id_ruang`, `a`.`nama_ruang`, `a`.`jml_tt`, IFNULL(b.terisi_lk, 0) AS terisi_lk, IFNULL(b.terisi_pr, 0) AS terisi_pr
FROM `tbl01_kamar1` `a`
LEFT JOIN `view_bedterisi` `b` ON a.`id_kamar`=b.`id_kamar`
WHERE `a`.`id_ruang` = '59'
AND `a`.`status_kamar` = 1
AND   (
`a`.`kelas_id` = '3'
OR `a`.`kelas_id` = '0'
 )
ERROR - 2021-04-26 06:25:27 --> Query error: Table 'db_simrs_v2.tbl01_kamar1' doesn't exist - Invalid query: SELECT `a`.`id_kamar`, `a`.`nama_kamar`, `a`.`id_ruang`, `a`.`nama_ruang`, `a`.`jml_tt`, IFNULL(b.terisi_lk, 0) AS terisi_lk, IFNULL(b.terisi_pr, 0) AS terisi_pr
FROM `tbl01_kamar1` `a`
LEFT JOIN `view_bedterisi` `b` ON a.`id_kamar`=b.`id_kamar`
WHERE `a`.`id_ruang` = '55'
AND `a`.`status_kamar` = 1
AND   (
`a`.`kelas_id` = '3'
OR `a`.`kelas_id` = '0'
 )
