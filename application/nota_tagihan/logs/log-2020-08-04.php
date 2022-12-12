<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2020-08-04 05:01:50 --> Query error: Unknown column 'id_tarif' in 'field list' - Invalid query: SELECT id_tarif FROM tbl02_temp_permintaan_tindakan_penunjang WHERE id_daftar='2020045455' AND reg_unit='RJ-200728-18-0048'
ERROR - 2020-08-04 05:01:50 --> Query error: Unknown column 'id_tarif' in 'on clause' - Invalid query: SELECT *
FROM `tbl02_temp_permintaan_tindakan_penunjang`
JOIN `tbl01_tarif_layanan` ON `id_tarif`=`idx`
WHERE `id_daftar` = '2020045455'
AND `reg_unit` = 'RJ-200728-18-0048'
AND   (
`tbl01_tarif_layanan`.`layanan` LIKE '%%' ESCAPE '!'
 )
