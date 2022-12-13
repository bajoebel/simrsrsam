<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-04-13 05:44:34 --> Severity: Notice --> Undefined variable: field C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Layanan.php 55
ERROR - 2021-04-13 05:45:51 --> Severity: Notice --> Undefined variable: field C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Layanan.php 55
ERROR - 2021-04-13 06:04:13 --> Severity: Notice --> Undefined variable: field C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Layanan.php 55
ERROR - 2021-04-13 06:07:44 --> Query error: Unknown column 'status_pasien1' in 'where clause' - Invalid query: SELECT *
FROM `tbl02_pendaftaran`
WHERE `status_pasien1` != 6
AND DATE_FORMAT(`tgl_masuk`,'%Y-%m-%d') >= '2021-02-01'
AND DATE_FORMAT(`tgl_masuk`,'%Y-%m-%d') <= '2021-04-13'
AND `id_ruang` = '1'
AND `jns_layanan` = 1
AND   (
`nomr` LIKE '%%' ESCAPE '!'
OR  `id_daftar` LIKE '%%' ESCAPE '!'
OR  `reg_unit` LIKE '%%' ESCAPE '!'
OR  `nama_pasien` LIKE '%%' ESCAPE '!'
OR  `nama_kamar` LIKE '%%' ESCAPE '!'
 )
ERROR - 2021-04-13 06:11:01 --> Query error: Unknown column 'status_pasien1' in 'where clause' - Invalid query: SELECT *
FROM `tbl02_pendaftaran`
WHERE `status_pasien1` != 6
AND DATE_FORMAT(`tgl_masuk`,'%Y-%m-%d') >= '2021-01-01'
AND DATE_FORMAT(`tgl_masuk`,'%Y-%m-%d') <= '2021-04-13'
AND `jns_layanan` = 1
AND   (
`nomr` LIKE '%%' ESCAPE '!'
OR  `id_daftar` LIKE '%%' ESCAPE '!'
OR  `reg_unit` LIKE '%%' ESCAPE '!'
OR  `nama_pasien` LIKE '%%' ESCAPE '!'
OR  `nama_kamar` LIKE '%%' ESCAPE '!'
 )
ERROR - 2021-04-13 06:13:50 --> Query error: Unknown column 'jns_layanan1' in 'where clause' - Invalid query: SELECT *
FROM `tbl02_pendaftaran`
WHERE `status_pasien` != 6
AND DATE_FORMAT(`tgl_masuk`,'%Y-%m-%d') >= '2021-01-01'
AND DATE_FORMAT(`tgl_masuk`,'%Y-%m-%d') <= '2021-04-13'
AND `jns_layanan1` = 1
AND   (
`nomr` LIKE '%%' ESCAPE '!'
OR  `id_daftar` LIKE '%%' ESCAPE '!'
OR  `reg_unit` LIKE '%%' ESCAPE '!'
OR  `nama_pasien` LIKE '%%' ESCAPE '!'
OR  `nama_kamar` LIKE '%%' ESCAPE '!'
 )
ORDER BY `tgl_masuk` DESC
 LIMIT 10
ERROR - 2021-04-13 08:26:10 --> Severity: Notice --> Undefined variable: nota C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Layanan.php 763
ERROR - 2021-04-13 08:26:37 --> Query error: Table 'db_simrs_v2.tbl03_nota' doesn't exist - Invalid query: SELECT a.*,SUM(b.sub_total_tarif) AS sub_total
        FROM tbl03_nota a 
        LEFT JOIN tbl03_nota_detail b ON a.id_nota=b.id_nota
        WHERE a.reg_unit = ''
        GROUP BY a.id_nota ORDER BY a.idx DESC
ERROR - 2021-04-13 08:35:59 --> Query error: Table 'db_simrs_v2.tbl03_nota' doesn't exist - Invalid query: SELECT a.*,SUM(b.sub_total_tarif) AS sub_total
            FROM tbl03_nota a 
            LEFT JOIN tbl03_nota_detail b ON a.id_nota=b.id_nota
            WHERE a.reg_unit = 'RJ-210413-08-0010'
            GROUP BY a.id_nota ORDER BY a.idx DESC
ERROR - 2021-04-13 08:36:10 --> Query error: Table 'db_simrs_v2.tbl03_nota' doesn't exist - Invalid query: SELECT a.*,SUM(b.sub_total_tarif) AS sub_total
            FROM tbl03_nota a 
            LEFT JOIN tbl03_nota_detail b ON a.id_nota=b.id_nota
            WHERE a.reg_unit = 'RJ-210413-08-0010'
            GROUP BY a.id_nota ORDER BY a.idx DESC
ERROR - 2021-04-13 08:56:38 --> Severity: Warning --> Missing argument 1 for Layanan::hapusnota() C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Layanan.php 814
ERROR - 2021-04-13 08:56:38 --> Severity: Notice --> Undefined variable: idx C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Layanan.php 817
ERROR - 2021-04-13 08:56:45 --> Severity: Warning --> Missing argument 1 for Layanan::hapusnota() C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Layanan.php 814
ERROR - 2021-04-13 08:56:45 --> Severity: Notice --> Undefined variable: idx C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Layanan.php 817
ERROR - 2021-04-13 08:56:50 --> Severity: Warning --> Missing argument 1 for Layanan::hapusnota() C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Layanan.php 814
ERROR - 2021-04-13 08:56:50 --> Severity: Notice --> Undefined variable: idx C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Layanan.php 817
