<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2023-02-01 01:29:26 --> Query error: Table 'rsam_v2.t_pendaftaran1' doesn't exist - Invalid query: INSERT INTO `tbl02_pendaftaran_batal` (`id_daftar`, `reg_unit`, `alasan`, `user_id`) VALUES ('2023009339', 'RI-230201-039-0001', 'Batal', 'NRP1912777')
ERROR - 2023-02-01 03:35:32 --> Query error: Column 'grId' in where clause is ambiguous - Invalid query: SELECT *
FROM `t_online` `a`
JOIN `m_pasien` `b` ON a.`nomr` = b.`nomr`
LEFT JOIN `m_poli` `c` ON a.`grId` = c.`grId`
WHERE DATE(a.`tgl_booking`) >= '2023-02-01'
AND DATE(a.`tgl_booking`) <= '2023-02-01'
AND `grId` = 'GR022'
AND   (
`grNama` LIKE '%%' ESCAPE '!'
OR  `a`.`kode_booking` LIKE '%%' ESCAPE '!'
OR  `a`.`nomr` LIKE '%%' ESCAPE '!'
OR  `b`.`nama` LIKE '%%' ESCAPE '!'
 )
ORDER BY `a`.`tgl_daftar`
ERROR - 2023-02-01 03:44:08 --> Query error: Column 'grId' in where clause is ambiguous - Invalid query: SELECT *
FROM `t_online` `a`
JOIN `m_pasien` `b` ON a.`nomr` = b.`nomr`
LEFT JOIN `m_poli` `c` ON a.`grId` = c.`grId`
WHERE DATE(a.`tgl_booking`) >= '2023-01-30'
AND DATE(a.`tgl_booking`) <= '2023-01-30'
AND `grId` = 'GR015'
AND   (
`grNama` LIKE '%%' ESCAPE '!'
OR  `a`.`kode_booking` LIKE '%%' ESCAPE '!'
OR  `a`.`nomr` LIKE '%%' ESCAPE '!'
OR  `b`.`nama` LIKE '%%' ESCAPE '!'
 )
ORDER BY `a`.`tgl_daftar`
ERROR - 2023-02-01 03:44:21 --> Query error: Column 'grId' in where clause is ambiguous - Invalid query: SELECT *
FROM `t_online` `a`
JOIN `m_pasien` `b` ON a.`nomr` = b.`nomr`
LEFT JOIN `m_poli` `c` ON a.`grId` = c.`grId`
WHERE DATE(a.`tgl_booking`) >= '2023-02-01'
AND DATE(a.`tgl_booking`) <= '2023-02-01'
AND `grId` = 'GR015'
AND   (
`grNama` LIKE '%%' ESCAPE '!'
OR  `a`.`kode_booking` LIKE '%%' ESCAPE '!'
OR  `a`.`nomr` LIKE '%%' ESCAPE '!'
OR  `b`.`nama` LIKE '%%' ESCAPE '!'
 )
ORDER BY `a`.`tgl_daftar`
ERROR - 2023-02-01 03:44:41 --> Query error: Column 'grId' in where clause is ambiguous - Invalid query: SELECT *
FROM `t_online` `a`
JOIN `m_pasien` `b` ON a.`nomr` = b.`nomr`
LEFT JOIN `m_poli` `c` ON a.`grId` = c.`grId`
WHERE DATE(a.`tgl_booking`) >= '2023-02-01'
AND DATE(a.`tgl_booking`) <= '2023-02-01'
AND `grId` = 'GR014'
AND   (
`grNama` LIKE '%%' ESCAPE '!'
OR  `a`.`kode_booking` LIKE '%%' ESCAPE '!'
OR  `a`.`nomr` LIKE '%%' ESCAPE '!'
OR  `b`.`nama` LIKE '%%' ESCAPE '!'
 )
ORDER BY `a`.`tgl_daftar`
