<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-03-27 04:54:37 --> Query error: Column 'reg_unit' in IN/ALL/ANY subquery is ambiguous - Invalid query: SELECT `tbl02_pendaftaran`.`nomr`, `tbl02_pendaftaran`.`id_daftar`, COUNT(tbl02_pasien_pulang.idx) AS status_pulang
FROM `tbl02_pendaftaran`
LEFT JOIN `tbl02_pasien_pulang` ON `tbl02_pendaftaran`.`reg_unit`=`tbl02_pasien_pulang`.`reg_unit`
WHERE `tbl02_pendaftaran`.`jns_layanan` = 'RI'
AND `tbl02_pendaftaran`.`nomr` = '303002'
AND `tbl02_pendaftaran`.`tgl_masuk` > '2021-02-11'
AND `reg_unit` NOT IN (SELECT reg_unit FROM tbl02_pendaftaran_batal)
ORDER BY `tbl02_pendaftaran`.`id_daftar` DESC
 LIMIT 1
