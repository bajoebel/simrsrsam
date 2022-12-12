<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-04-06 10:32:10 --> Query error: Unknown column 'a.idx' in 'IN/ALL/ANY subquery' - Invalid query: SELECT *
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
