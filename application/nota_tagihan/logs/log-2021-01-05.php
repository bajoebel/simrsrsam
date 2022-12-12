<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-01-05 03:50:44 --> Query error: Unknown column 'id_tarif' in 'field list' - Invalid query: SELECT id_tarif FROM tbl02_temp_permintaan_tindakan_penunjang WHERE id_daftar='2021000003' AND reg_unit='GD-210105-05-0001'
ERROR - 2021-01-05 03:50:44 --> Query error: Unknown column 'id_tarif' in 'on clause' - Invalid query: SELECT *
FROM `tbl02_temp_permintaan_tindakan_penunjang`
JOIN `tbl01_tarif_layanan` ON `id_tarif`=`idx`
WHERE `id_daftar` = '2021000003'
AND `reg_unit` = 'GD-210105-05-0001'
AND   (
`tbl01_tarif_layanan`.`layanan` LIKE '%%' ESCAPE '!'
 )
ERROR - 2021-01-05 03:51:02 --> Query error: Unknown column 'id_tarif' in 'on clause' - Invalid query: SELECT *
FROM `tbl02_temp_permintaan_tindakan_penunjang`
JOIN `tbl01_tarif_layanan` ON `id_tarif`=`idx`
WHERE `id_daftar` = '2021000003'
AND `reg_unit` = 'GD-210105-05-0001'
AND   (
`tbl01_tarif_layanan`.`layanan` LIKE '%%' ESCAPE '!'
 )
ERROR - 2021-01-05 03:51:02 --> Query error: Unknown column 'id_tarif' in 'field list' - Invalid query: SELECT id_tarif FROM tbl02_temp_permintaan_tindakan_penunjang WHERE id_daftar='2021000003' AND reg_unit='GD-210105-05-0001'
ERROR - 2021-01-05 03:51:21 --> Query error: Unknown column 'id_tarif' in 'on clause' - Invalid query: SELECT *
FROM `tbl02_temp_permintaan_tindakan_penunjang`
JOIN `tbl01_tarif_layanan` ON `id_tarif`=`idx`
WHERE `id_daftar` = '2021000003'
AND `reg_unit` = 'GD-210105-05-0001'
AND   (
`tbl01_tarif_layanan`.`layanan` LIKE '%%' ESCAPE '!'
 )
ERROR - 2021-01-05 03:51:21 --> Query error: Unknown column 'id_tarif' in 'field list' - Invalid query: SELECT id_tarif FROM tbl02_temp_permintaan_tindakan_penunjang WHERE id_daftar='2021000003' AND reg_unit='GD-210105-05-0001'
ERROR - 2021-01-05 03:55:53 --> Query error: Table 'db_simrs_v2.tbl02_permintaan_penunjang1' doesn't exist - Invalid query: SELECT * FROM tbl02_permintaan_penunjang1 WHERE id_penunjang='49' AND idx NOT IN (SELECT id_permintaan_penunjang FROM tbl02_permintaan_penunjang_response)
ERROR - 2021-01-05 03:59:57 --> Query error: Table 'db_simrs_v2.tbl02_permintaan_penunjang1' doesn't exist - Invalid query: SELECT * FROM tbl02_permintaan_penunjang1 WHERE id_penunjang='50' AND idx NOT IN (SELECT id_permintaan_penunjang FROM tbl02_permintaan_penunjang_response)
ERROR - 2021-01-05 04:03:33 --> Query error: Unknown column 'dokterVerifikasi' in 'where clause' - Invalid query: SELECT *
FROM `tbl03_hasil_pemeriksaan_penunjang`
WHERE `nomr` = '039318'
AND `idjenispemeriksaan` = '12'
AND `dokterVerifikasi` <> ''
ORDER BY `reg_unit` DESC, `idjenispemeriksaan`
ERROR - 2021-01-05 04:03:35 --> Query error: Unknown column 'dokterVerifikasi' in 'where clause' - Invalid query: SELECT *
FROM `tbl03_hasil_pemeriksaan_penunjang`
WHERE `nomr` = '039318'
AND `idjenispemeriksaan` = '1'
AND `dokterVerifikasi` <> ''
ORDER BY `reg_unit` DESC, `idjenispemeriksaan`
ERROR - 2021-01-05 04:03:36 --> Query error: Unknown column 'dokterVerifikasi' in 'where clause' - Invalid query: SELECT *
FROM `tbl03_hasil_pemeriksaan_penunjang`
WHERE `nomr` = '039318'
AND `idjenispemeriksaan` = '9'
AND `dokterVerifikasi` <> ''
ORDER BY `reg_unit` DESC, `idjenispemeriksaan`
ERROR - 2021-01-05 04:03:37 --> Query error: Unknown column 'dokterVerifikasi' in 'where clause' - Invalid query: SELECT *
FROM `tbl03_hasil_pemeriksaan_penunjang`
WHERE `nomr` = '039318'
AND `idjenispemeriksaan` = '15'
AND `dokterVerifikasi` <> ''
ORDER BY `reg_unit` DESC, `idjenispemeriksaan`
ERROR - 2021-01-05 04:03:38 --> Query error: Unknown column 'dokterVerifikasi' in 'where clause' - Invalid query: SELECT *
FROM `tbl03_hasil_pemeriksaan_penunjang`
WHERE `nomr` = '039318'
AND `idjenispemeriksaan` = '12'
AND `dokterVerifikasi` <> ''
ORDER BY `reg_unit` DESC, `idjenispemeriksaan`
