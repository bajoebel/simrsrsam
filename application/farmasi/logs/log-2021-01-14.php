<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-01-14 04:05:57 --> Severity: Error --> Call to undefined method Laporan_model::countDataReturPembelian() C:\xampp32\htdocs\simrs\application\farmasi\controllers\Laporan.php 392
ERROR - 2021-01-14 04:06:03 --> Severity: Error --> Call to undefined method Laporan_model::countDataReturPembelian() C:\xampp32\htdocs\simrs\application\farmasi\controllers\Laporan.php 392
ERROR - 2021-01-14 04:06:05 --> Severity: Error --> Call to undefined method Laporan_model::countDataReturPembelian() C:\xampp32\htdocs\simrs\application\farmasi\controllers\Laporan.php 392
ERROR - 2021-01-14 04:06:06 --> Severity: Error --> Call to undefined method Laporan_model::countDataReturPembelian() C:\xampp32\htdocs\simrs\application\farmasi\controllers\Laporan.php 392
ERROR - 2021-01-14 04:06:08 --> Severity: Error --> Call to undefined method Laporan_model::countDataReturPembelian() C:\xampp32\htdocs\simrs\application\farmasi\controllers\Laporan.php 392
ERROR - 2021-01-14 04:06:09 --> Severity: Error --> Call to undefined method Laporan_model::countDataReturPembelian() C:\xampp32\htdocs\simrs\application\farmasi\controllers\Laporan.php 392
ERROR - 2021-01-14 04:06:12 --> Severity: Error --> Call to undefined method Laporan_model::countDataReturPembelian() C:\xampp32\htdocs\simrs\application\farmasi\controllers\Laporan.php 392
ERROR - 2021-01-14 04:06:15 --> Severity: Error --> Call to undefined method Laporan_model::countDataReturPembelian() C:\xampp32\htdocs\simrs\application\farmasi\controllers\Laporan.php 392
ERROR - 2021-01-14 04:06:17 --> Severity: Error --> Call to undefined method Laporan_model::countDataReturPembelian() C:\xampp32\htdocs\simrs\application\farmasi\controllers\Laporan.php 392
ERROR - 2021-01-14 04:07:23 --> Severity: Error --> Call to undefined method Laporan_model::countDataReturPembelian() C:\xampp32\htdocs\simrs\application\farmasi\controllers\Laporan.php 392
ERROR - 2021-01-14 04:07:43 --> Severity: Error --> Call to undefined method Laporan_model::countDataReturPembelian() C:\xampp32\htdocs\simrs\application\farmasi\controllers\Laporan.php 392
ERROR - 2021-01-14 04:07:45 --> Severity: Error --> Call to undefined method Laporan_model::countDataReturPembelian() C:\xampp32\htdocs\simrs\application\farmasi\controllers\Laporan.php 392
ERROR - 2021-01-14 04:17:11 --> Severity: Error --> Call to undefined method Laporan_model::countDataReturPembelian() C:\xampp32\htdocs\simrs\application\farmasi\controllers\Laporan.php 392
ERROR - 2021-01-14 04:17:13 --> Severity: Error --> Call to undefined method Laporan_model::countDataReturPembelian() C:\xampp32\htdocs\simrs\application\farmasi\controllers\Laporan.php 392
ERROR - 2021-01-14 04:17:13 --> Severity: Error --> Call to undefined method Laporan_model::countDataReturPembelian() C:\xampp32\htdocs\simrs\application\farmasi\controllers\Laporan.php 392
ERROR - 2021-01-14 04:17:13 --> Severity: Error --> Call to undefined method Laporan_model::countDataReturPembelian() C:\xampp32\htdocs\simrs\application\farmasi\controllers\Laporan.php 392
ERROR - 2021-01-14 04:20:38 --> Query error: Table 'db_simrs_v2.tbl04_pembelian1' doesn't exist - Invalid query: SELECT *
FROM `tbl04_pembelian1` `a`
JOIN `tbl04_pembelian_detail` `b` ON `a`.`KDBL`=`b`.`KDBL`
JOIN `tbl04_barang` `c` ON `b`.`KDBRG` = `c`.`KDBRG`
WHERE `a`.`KDLOKASI` = 1
AND `a`.`KDSUPPLIER` = 7
AND `a`.`TGLTERIMA` >= '2020-12-01'
AND `a`.`TGLTERIMA` <= '2021-01-14'
GROUP BY `a`.`KDBL`, `b`.`KDBRG`
ERROR - 2021-01-14 04:35:22 --> Query error: Unknown column 'b.KDBL' in 'on clause' - Invalid query: SELECT *
FROM `tbl04_pembelian_batal` `d`
JOIN `tbl04_pembelian` `a` ON `a`.`KDBL`=`b`.`KDBL`
JOIN `tbl04_pembelian_batal_detail` `b` ON `d`.`KDBL_RET`=`b`.`KDBL_RET`
JOIN `tbl04_barang` `c` ON `b`.`KDBRG` = `c`.`KDBRG`
WHERE `a`.`KDLOKASI` = 1
AND `a`.`KDSUPPLIER` = 7
AND `a`.`TGLTERIMA` >= '2020-12-01'
AND `a`.`TGLTERIMA` <= '2021-01-14'
GROUP BY `a`.`KDBL`, `b`.`KDBRG`
ERROR - 2021-01-14 04:36:25 --> Query error: Unknown column 'JMLBELI' in 'field list' - Invalid query: SELECT *, SUM(JMLBELI) AS JSTOK
FROM `tbl04_pembelian_batal` `d`
JOIN `tbl04_pembelian` `a` ON `a`.`KDBL`=`d`.`KDBL`
JOIN `tbl04_pembelian_batal_detail` `b` ON `d`.`KDBL_RET`=`b`.`KDBL_RET`
JOIN `tbl04_barang` `c` ON `b`.`KDBRG` = `c`.`KDBRG`
WHERE `a`.`KDLOKASI` = 1
AND `a`.`KDSUPPLIER` = 7
AND `a`.`TGLTERIMA` >= '2020-12-01'
AND `a`.`TGLTERIMA` <= '2021-01-14'
AND   (
`b`.`KDBRG` LIKE '%%' ESCAPE '!'
OR  `b`.`NMBRG` LIKE '%%' ESCAPE '!'
OR  `NMGENERIK` LIKE '%%' ESCAPE '!'
OR  `NMSATUAN` LIKE '%%' ESCAPE '!'
OR  `NMKTBRG` LIKE '%%' ESCAPE '!'
OR  `JENISBRG` LIKE '%%' ESCAPE '!'
 )
GROUP BY `a`.`KDBL`, `b`.`KDBRG`
ORDER BY `a`.`KDBL`, `b`.`KDBRG`
 LIMIT 20
ERROR - 2021-01-14 04:44:29 --> Query error: Unknown column 'a.KDBL_RET' in 'group statement' - Invalid query: SELECT *, SUM(JMLRET) AS JSTOK
FROM `tbl04_pembelian_batal` `d`
JOIN `tbl04_pembelian` `a` ON `a`.`KDBL`=`d`.`KDBL`
JOIN `tbl04_pembelian_batal_detail` `b` ON `d`.`KDBL_RET`=`b`.`KDBL_RET`
JOIN `tbl04_barang` `c` ON `b`.`KDBRG` = `c`.`KDBRG`
WHERE   (
`b`.`KDBRG` LIKE '%%' ESCAPE '!'
OR  `b`.`NMBRG` LIKE '%%' ESCAPE '!'
OR  `NMGENERIK` LIKE '%%' ESCAPE '!'
OR  `NMSATUAN` LIKE '%%' ESCAPE '!'
OR  `NMKTBRG` LIKE '%%' ESCAPE '!'
OR  `JENISBRG` LIKE '%%' ESCAPE '!'
 )
GROUP BY `a`.`KDBL_RET`, `b`.`KDBRG`
ORDER BY `a`.`KDBL`, `b`.`KDBRG`
 LIMIT 20
ERROR - 2021-01-14 04:44:35 --> Query error: Unknown column 'a.KDBL_RET' in 'group statement' - Invalid query: SELECT *, SUM(JMLRET) AS JSTOK
FROM `tbl04_pembelian_batal` `d`
JOIN `tbl04_pembelian` `a` ON `a`.`KDBL`=`d`.`KDBL`
JOIN `tbl04_pembelian_batal_detail` `b` ON `d`.`KDBL_RET`=`b`.`KDBL_RET`
JOIN `tbl04_barang` `c` ON `b`.`KDBRG` = `c`.`KDBRG`
WHERE   (
`b`.`KDBRG` LIKE '%%' ESCAPE '!'
OR  `b`.`NMBRG` LIKE '%%' ESCAPE '!'
OR  `NMGENERIK` LIKE '%%' ESCAPE '!'
OR  `NMSATUAN` LIKE '%%' ESCAPE '!'
OR  `NMKTBRG` LIKE '%%' ESCAPE '!'
OR  `JENISBRG` LIKE '%%' ESCAPE '!'
 )
GROUP BY `a`.`KDBL_RET`, `b`.`KDBRG`
ORDER BY `a`.`KDBL`, `b`.`KDBRG`
 LIMIT 20
ERROR - 2021-01-14 04:50:33 --> Query error: Table 'db_simrs_v2.tbl04_pembelian_batal1' doesn't exist - Invalid query: SELECT *
FROM `tbl04_pembelian_batal1` `d`
JOIN `tbl04_pembelian` `a` ON `a`.`KDBL`=`d`.`KDBL`
JOIN `tbl04_pembelian_batal_detail` `b` ON `d`.`KDBL_RET`=`b`.`KDBL_RET`
JOIN `tbl04_barang` `c` ON `b`.`KDBRG` = `c`.`KDBRG`
GROUP BY `d`.`KDBL_RET`, `b`.`KDBRG`
ERROR - 2021-01-14 05:00:00 --> Query error: Table 'db_simrs_v2.tbl04_pembelian_batal1' doesn't exist - Invalid query: SELECT *
FROM `tbl04_pembelian_batal1` `d`
JOIN `tbl04_pembelian` `a` ON `a`.`KDBL`=`d`.`KDBL`
JOIN `tbl04_pembelian_batal_detail` `b` ON `d`.`KDBL_RET`=`b`.`KDBL_RET`
JOIN `tbl04_barang` `c` ON `b`.`KDBRG` = `c`.`KDBRG`
GROUP BY `d`.`KDBL_RET`, `b`.`KDBRG`
ERROR - 2021-01-14 05:02:45 --> Severity: Notice --> Undefined index: LOCK_STATUS C:\xampp32\htdocs\simrs\application\farmasi\controllers\Trans_pembelian.php 246
ERROR - 2021-01-14 05:02:55 --> Severity: Notice --> Undefined index: LOCK_STATUS C:\xampp32\htdocs\simrs\application\farmasi\controllers\Trans_pembelian.php 246
