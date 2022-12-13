<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-01-04 14:35:53 --> Query error: Unknown column 'id_tarif' in 'field list' - Invalid query: SELECT id_tarif FROM tbl02_temp_permintaan_tindakan_penunjang WHERE id_daftar='2021000002' AND reg_unit='GD-210104-04-0001'
ERROR - 2021-01-04 14:35:53 --> Query error: Unknown column 'id_tarif' in 'on clause' - Invalid query: SELECT *
FROM `tbl02_temp_permintaan_tindakan_penunjang`
JOIN `tbl01_tarif_layanan` ON `id_tarif`=`idx`
WHERE `id_daftar` = '2021000002'
AND `reg_unit` = 'GD-210104-04-0001'
AND   (
`tbl01_tarif_layanan`.`layanan` LIKE '%%' ESCAPE '!'
 )
ERROR - 2021-01-04 14:39:12 --> Severity: Notice --> Undefined variable: def /var/www/html/simrs/application/nota_tagihan/views/nota_tagihan/template_hasil_pemeriksaan.php 160
ERROR - 2021-01-04 14:39:12 --> Severity: Notice --> Undefined variable: def /var/www/html/simrs/application/nota_tagihan/views/nota_tagihan/template_hasil_pemeriksaan.php 161
