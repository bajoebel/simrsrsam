<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
ERROR - 2020-04-02 10:54:12 --> Severity: Notice --> Undefined variable: detail C:\xampp\htdocs\simrs_open_source\application\kasir\controllers\kwitansi.php 195
ERROR - 2020-04-02 10:54:12 --> Severity: Notice --> Undefined variable: detail_item C:\xampp\htdocs\simrs_open_source\application\kasir\controllers\kwitansi.php 195
ERROR - 2020-04-02 11:34:08 --> Query error: Column 'KDJL' in IN/ALL/ANY subquery is ambiguous - Invalid query: SELECT `tbl04_penjualan`.`KDJL`, `tbl04_penjualan`.`TGLJUAL`, `KDBRG`, `NMBRG`, `HJUAL`, `JMLJUAL`, `SUBTOTAL`
FROM `tbl04_penjualan`
JOIN `tbl04_penjualan_detail` ON `tbl04_penjualan`.`KDJL`=`tbl04_penjualan_detail`.`KDJL`
WHERE `id_daftar` = '2020000001'
AND `KDJL` NOT IN (SELECT kode_item FROM tbl05_kwitansi_detail)
ERROR - 2020-04-02 11:34:11 --> Query error: Column 'KDJL' in IN/ALL/ANY subquery is ambiguous - Invalid query: SELECT `tbl04_penjualan`.`KDJL`, `tbl04_penjualan`.`TGLJUAL`, `KDBRG`, `NMBRG`, `HJUAL`, `JMLJUAL`, `SUBTOTAL`
FROM `tbl04_penjualan`
JOIN `tbl04_penjualan_detail` ON `tbl04_penjualan`.`KDJL`=`tbl04_penjualan_detail`.`KDJL`
WHERE `id_daftar` = '2020000001'
AND `KDJL` NOT IN (SELECT kode_item FROM tbl05_kwitansi_detail)
ERROR - 2020-04-02 11:35:08 --> Query error: Column 'KDJL' in IN/ALL/ANY subquery is ambiguous - Invalid query: SELECT `tbl04_penjualan`.`KDJL`, `tbl04_penjualan`.`TGLJUAL`, `KDBRG`, `NMBRG`, `HJUAL`, `JMLJUAL`, `SUBTOTAL`
FROM `tbl04_penjualan`
JOIN `tbl04_penjualan_detail` ON `tbl04_penjualan`.`KDJL`=`tbl04_penjualan_detail`.`KDJL`
WHERE `id_daftar` = '2020000001'
AND `KDJL` NOT IN (SELECT kode_item FROM tbl05_kwitansi_detail)
ERROR - 2020-04-02 11:35:11 --> Query error: Column 'KDJL' in IN/ALL/ANY subquery is ambiguous - Invalid query: SELECT `tbl04_penjualan`.`KDJL`, `tbl04_penjualan`.`TGLJUAL`, `KDBRG`, `NMBRG`, `HJUAL`, `JMLJUAL`, `SUBTOTAL`
FROM `tbl04_penjualan`
JOIN `tbl04_penjualan_detail` ON `tbl04_penjualan`.`KDJL`=`tbl04_penjualan_detail`.`KDJL`
WHERE `id_daftar` = '2020000001'
AND `KDJL` NOT IN (SELECT kode_item FROM tbl05_kwitansi_detail)
ERROR - 2020-04-02 11:35:36 --> Query error: Column 'KDJL' in IN/ALL/ANY subquery is ambiguous - Invalid query: SELECT `tbl04_penjualan`.`KDJL`, `tbl04_penjualan`.`TGLJUAL`, `KDBRG`, `NMBRG`, `HJUAL`, `JMLJUAL`, `SUBTOTAL`
FROM `tbl04_penjualan`
JOIN `tbl04_penjualan_detail` ON `tbl04_penjualan`.`KDJL`=`tbl04_penjualan_detail`.`KDJL`
WHERE `id_daftar` = '2020000001'
AND `KDJL` NOT IN (SELECT kode_item FROM tbl05_kwitansi_detail)
ERROR - 2020-04-02 15:20:38 --> Severity: Notice --> Undefined property: CI_DB_mysqli_result::$unfinish_transaksi C:\xampp\htdocs\simrs_open_source\application\kasir\models\kwitansi_model.php 114
ERROR - 2020-04-02 15:22:46 --> Query error: Table 'db_rs_open_dev.tbl02_pendaftaran1' doesn't exist - Invalid query: SELECT SUM((CASE WHEN (`status_transaksi` = '0') THEN 1 ELSE 0 END)) AS `unfinish_transaksi`, SUM((CASE WHEN (`status_transaksi` = '1') THEN 1 ELSE 0 END)) AS `finish_transaksi`
FROM `tbl02_pendaftaran1`
WHERE `id_daftar` = '2020000001'
