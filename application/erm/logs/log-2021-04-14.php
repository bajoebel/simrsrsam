<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-04-14 03:23:53 --> Query error: Unknown column 'status_pasien1' in 'where clause' - Invalid query: SELECT *
FROM `tbl02_pendaftaran`
WHERE (status_pasien1 = 1 OR `status_pasien` = 3)
AND `id_ruang` = '66'
AND `jns_layanan` = 'RI'
AND   (
`nomr` LIKE '%%' ESCAPE '!'
OR  `id_daftar` LIKE '%%' ESCAPE '!'
OR  `reg_unit` LIKE '%%' ESCAPE '!'
OR  `nama_pasien` LIKE '%%' ESCAPE '!'
OR  `nama_kamar` LIKE '%%' ESCAPE '!'
 )
