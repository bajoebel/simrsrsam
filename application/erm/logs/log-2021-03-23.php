<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-03-23 10:19:17 --> Query error: Unknown column 'id_tarif' in 'field list' - Invalid query: SELECT id_tarif FROM tbl02_temp_permintaan_tindakan_penunjang WHERE id_daftar='2021016418' AND reg_unit='RI-210323-59-0001'
ERROR - 2021-03-23 10:19:17 --> Query error: Unknown column 'id_tarif' in 'on clause' - Invalid query: SELECT *
FROM `tbl02_temp_permintaan_tindakan_penunjang`
JOIN `tbl01_tarif_layanan` ON `id_tarif`=`idx`
WHERE `id_daftar` = '2021016418'
AND `reg_unit` = 'RI-210323-59-0001'
AND   (
`tbl01_tarif_layanan`.`layanan` LIKE '%%' ESCAPE '!'
 )
