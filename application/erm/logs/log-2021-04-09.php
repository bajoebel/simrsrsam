<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-04-09 05:13:51 --> Query error: Unknown column 'status_pasien1' in 'where clause' - Invalid query: SELECT *
FROM `tbl02_pendaftaran`
WHERE `status_pasien1` != 6
AND `tgl_masuk` >= '2021-04-09'
AND `tgl_masuk` <= '2021-04-09'
AND `id_ruang` = '8'
AND `jns_layanan` = 'RJ'
AND   (
`nomr` LIKE '%%' ESCAPE '!'
OR  `id_daftar` LIKE '%%' ESCAPE '!'
OR  `reg_unit` LIKE '%%' ESCAPE '!'
OR  `nama_pasien` LIKE '%%' ESCAPE '!'
OR  `nama_kamar` LIKE '%%' ESCAPE '!'
 )
