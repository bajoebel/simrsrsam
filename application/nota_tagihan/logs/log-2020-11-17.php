<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2020-11-17 08:09:07 --> Query error: Unknown column 'id_tarif' in 'field list' - Invalid query: SELECT id_tarif FROM tbl02_temp_permintaan_tindakan_penunjang WHERE id_daftar='2020063871' AND reg_unit='RJ-201109-08-0030'
ERROR - 2020-11-17 08:09:07 --> Query error: Unknown column 'id_tarif' in 'on clause' - Invalid query: SELECT *
FROM `tbl02_temp_permintaan_tindakan_penunjang`
JOIN `tbl01_tarif_layanan` ON `id_tarif`=`idx`
WHERE `id_daftar` = '2020063871'
AND `reg_unit` = 'RJ-201109-08-0030'
AND   (
`tbl01_tarif_layanan`.`layanan` LIKE '%%' ESCAPE '!'
 )
