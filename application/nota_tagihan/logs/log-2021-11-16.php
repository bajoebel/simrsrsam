<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-11-16 08:24:30 --> Query error: Column 'id_daftar' in where clause is ambiguous - Invalid query: SELECT *
FROM `tbl02_pendaftaran` `a`
JOIN `tbl02_pasien_pulang` `b` ON `a`.`id_daftar`=`b`.`id_daftar` AND `a`.`jns_layanan`=`b`.`jns_layanan`
WHERE `id_daftar` = '2021090492'
AND `a`.`jns_layanan` = 'RI'
