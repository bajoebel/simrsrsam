<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-04-26 06:46:06 --> Query error: Table 'db_simrs_v2.tbl01_kamar1' doesn't exist - Invalid query: SELECT `a`.`id_kamar`, `a`.`nama_kamar`, `a`.`id_ruang`, `a`.`nama_ruang`, `a`.`jml_tt`, IFNULL(b.terisi_lk, 0) AS terisi_lk, IFNULL(b.terisi_pr, 0) AS terisi_pr
FROM `tbl01_kamar1` `a`
LEFT JOIN `view_bedterisi` `b` ON a.`id_kamar`=b.`id_kamar`
WHERE `a`.`id_ruang` = '55'
AND `a`.`status_kamar` = 1
AND   (
`a`.`kelas_id` = '3'
OR `a`.`kelas_id` = '0'
 )
AND `a`.`id_kamar` NOT IN('4')
ERROR - 2021-04-26 07:05:48 --> Severity: Notice --> Undefined variable: kelas C:\xampp\htdocs\simrs\application\nota_tagihan\views\layanan\layanan_index.php 653
ERROR - 2021-04-26 07:05:48 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\simrs\application\nota_tagihan\views\layanan\layanan_index.php 653
ERROR - 2021-04-26 07:06:03 --> Severity: Notice --> Undefined variable: kelas C:\xampp\htdocs\simrs\application\nota_tagihan\views\layanan\layanan_index.php 653
ERROR - 2021-04-26 07:06:03 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\simrs\application\nota_tagihan\views\layanan\layanan_index.php 653
