<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-05-07 04:44:31 --> Query error: Table 'db_simrs_v2.tbl02_pindah_ranap_batal2' doesn't exist - Invalid query: SELECT `a`.*, `b`.`idx` as `idx_batal`
FROM `tbl02_pindah_ranap` `a`
LEFT JOIN `tbl02_pindah_ranap_batal2` `b` ON `a`.`idx` = `b`.`id_pindah_ranap`
WHERE `a`.`reg_unit` = 'RI-210506-56-0002'
AND `a`.`ruang_pengirim` = '56'
ORDER BY `idx` DESC
 LIMIT 1
ERROR - 2021-05-07 04:47:58 --> Severity: error --> Exception: syntax error, unexpected '$this' (T_VARIABLE) C:\xampp\htdocs\simrs\application\nota_tagihan\models\Nota_model.php 196
ERROR - 2021-05-07 04:48:11 --> Query error: Column 'reg_unit' in IN/ALL/ANY subquery is ambiguous - Invalid query: SELECT `a`.*, `b`.`idx` as `idx_batal`
FROM `tbl02_pindah_ranap` `a`
LEFT JOIN `tbl02_pindah_ranap_response` `b` ON `a`.`idx` = `b`.`id_pindah_ranap`
WHERE `a`.`reg_unit` = 'RI-210506-56-0002'
AND `a`.`ruang_pengirim` = '56'
AND `reg_unit` NOT IN (SELECT reg_unit FROM tbl02_pindah_ranap_batal)
ORDER BY `idx` DESC
 LIMIT 1
ERROR - 2021-05-07 04:49:27 --> Query error: Unknown column 'idx1' in 'order clause' - Invalid query: SELECT `a`.*, `b`.`idx` as `idx_batal`
FROM `tbl02_pindah_ranap` `a`
LEFT JOIN `tbl02_pindah_ranap_response` `b` ON `a`.`idx` = `b`.`id_pindah_ranap`
WHERE `a`.`reg_unit` = 'RI-210506-56-0002'
AND `a`.`ruang_pengirim` = '56'
AND `a`.`reg_unit` NOT IN (SELECT c.reg_unit FROM tbl02_pindah_ranap_batal c)
ORDER BY `idx1` DESC
 LIMIT 1
ERROR - 2021-05-07 04:54:19 --> Query error: Unknown column 'idx1' in 'order clause' - Invalid query: SELECT `a`.*, `b`.`idx` as `idx_batal`
FROM `tbl02_pindah_ranap` `a`
LEFT JOIN `tbl02_pindah_ranap_response` `b` ON `a`.`idx` = `b`.`id_pindah_ranap`
WHERE `a`.`reg_unit` = 'RI-210506-56-0002'
AND `a`.`ruang_pengirim` = '56'
AND `a`.`reg_unit` NOT IN (SELECT c.reg_unit FROM tbl02_pindah_ranap_batal c)
ORDER BY `idx1` DESC
 LIMIT 1
