<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2020-11-26 14:39:27 --> Query error: Unknown column 'LOCK' in 'field list' - Invalid query: UPDATE `tbl04_penjualan_detail` SET `LOCK` = 1, `LOCK_PIN` = '4a388108a1e3b20e8827223bc334c5cd'
WHERE `KDJL` = 'BL20000967'
ERROR - 2020-11-26 14:39:32 --> Query error: Unknown column 'LOCK' in 'field list' - Invalid query: UPDATE `tbl04_penjualan_detail` SET `LOCK` = 1, `LOCK_PIN` = '6c05966d704594bec579e1551b9bd83e'
WHERE `KDJL` = 'BL20000967'
ERROR - 2020-11-26 14:41:21 --> Query error: Unknown column 'LOCK' in 'field list' - Invalid query: UPDATE `tbl04_penjualan` SET `LOCK` = 1, `LOCK_PIN` = '76dd86d6e809b050cd168daac423561d'
WHERE `KDJL` = 'BL20000967'
ERROR - 2020-11-26 14:44:33 --> Severity: Notice --> Undefined property: stdClass::$KDLOKASI /var/www/html/simrs_open_source/application/farmasi/models/Pembelian_model.php 21
ERROR - 2020-11-26 14:44:33 --> Severity: Notice --> Undefined property: stdClass::$TGLEXP /var/www/html/simrs_open_source/application/farmasi/models/Pembelian_model.php 23
ERROR - 2020-11-26 14:44:33 --> Severity: Notice --> Undefined property: stdClass::$KDLOKASI /var/www/html/simrs_open_source/application/farmasi/models/Pembelian_model.php 21
ERROR - 2020-11-26 14:44:33 --> Severity: Notice --> Undefined property: stdClass::$TGLEXP /var/www/html/simrs_open_source/application/farmasi/models/Pembelian_model.php 23
ERROR - 2020-11-26 15:01:42 --> Severity: Notice --> Undefined property: trans_pembelian::$fb /var/www/html/simrs_open_source/system/core/Model.php 73
ERROR - 2020-11-26 15:01:42 --> Severity: error --> Exception: Call to a member function select() on null /var/www/html/simrs_open_source/application/farmasi/models/Pembelian_model.php 39
ERROR - 2020-11-26 15:02:21 --> Query error: Unknown column 'b.KDBRG' in 'field list' - Invalid query: SELECT `a`.`KDBL`, `b`.`KDBRG`, `a`.`KDLOKASI`, DATE_FORMAT(a.TGLTERIMA, '%Y-%m-%d') as TGLBELI, `b`.`TGLEXP`, `b`.`HMODAL`
FROM `tbl04_pembelian_detail` `a`
JOIN `tbl04_pembelian` `b` ON `a`.`KDBL` = `b`.`KDBL`
WHERE `KDBL` = 'BL20000967'
ERROR - 2020-11-26 15:03:47 --> Query error: Unknown column 'b.TGLEXP' in 'field list' - Invalid query: SELECT `a`.`KDBL`, `b`.`KDBRG`, `a`.`KDLOKASI`, DATE_FORMAT(a.TGLTERIMA, '%Y-%m-%d') as TGLBELI, `b`.`TGLEXP`, `b`.`HMODAL`
FROM `tbl04_pembelian` `a`
JOIN `tbl04_pembelian_detail` `b` ON `a`.`KDBL` = `b`.`KDBL`
WHERE `KDBL` = 'BL20000967'
ERROR - 2020-11-26 15:05:21 --> Severity: Notice --> Undefined property: stdClass::$TGLEXP /var/www/html/simrs_open_source/application/farmasi/models/Pembelian_model.php 48
ERROR - 2020-11-26 15:05:21 --> Severity: Notice --> Undefined property: stdClass::$TGLEXP /var/www/html/simrs_open_source/application/farmasi/models/Pembelian_model.php 48
ERROR - 2020-11-26 15:06:40 --> Query error: Unknown column 'b.TGLEXP' in 'field list' - Invalid query: SELECT `a`.`KDBL`, `b`.`KDBRG`, `a`.`KDLOKASI`, DATE_FORMAT(a.TGLTERIMA, '%Y-%m-%d') as TGLBELI, `b`.`TGLEXP`, `b`.`HMODAL`
FROM `tbl04_pembelian` `a`
JOIN `tbl04_pembelian_detail` `b` ON `a`.`KDBL` = `b`.`KDBL`
WHERE `KDBL` = 'BL20000967'
ERROR - 2020-11-26 15:06:52 --> Query error: Unknown column 'b.TGLEXP' in 'field list' - Invalid query: SELECT `a`.`KDBL`, `b`.`KDBRG`, `a`.`KDLOKASI`, DATE_FORMAT(a.TGLTERIMA, '%Y-%m-%d') as TGLBELI, `b`.`TGLEXP`, `b`.`HMODAL`
FROM `tbl04_pembelian` `a`
JOIN `tbl04_pembelian_detail` `b` ON `a`.`KDBL` = `b`.`KDBL`
WHERE `KDBL` = 'BL20000967'
ERROR - 2020-11-26 15:07:49 --> Query error: Column 'KDBL' in where clause is ambiguous - Invalid query: SELECT `a`.`KDBL`, `b`.`KDBRG`, `a`.`KDLOKASI`, DATE_FORMAT(a.TGLTERIMA, '%Y-%m-%d') as TGLBELI, `b`.`EXPDATE`, `b`.`HMODAL`
FROM `tbl04_pembelian` `a`
JOIN `tbl04_pembelian_detail` `b` ON `a`.`KDBL` = `b`.`KDBL`
WHERE `KDBL` = 'BL20000967'
ERROR - 2020-11-26 15:08:01 --> Query error: Unknown column 'EXPDATE' in 'where clause' - Invalid query: UPDATE `stok_barang_fifo` SET `LOCK` = 1
WHERE `KDBRG` = '000001'
AND `KDLOKASI` = '6'
AND `TGLBELI` = '2020-11-26'
AND `EXPDATE` = '2020-11-26'
AND `HMODAL` = '681743.0400'
ERROR - 2020-11-26 15:14:21 --> Severity: Notice --> Undefined index: LOCK /var/www/html/simrs_open_source/application/farmasi/controllers/Trans_pembelian.php 244
ERROR - 2020-11-26 15:15:33 --> Query error: Unknown column 'LOCK' in 'field list' - Invalid query: UPDATE `stok_barang_fifo` SET `LOCK` = 1
WHERE `KDBRG` = '000001'
AND `KDLOKASI` = '6'
AND `TGLBELI` = '2020-11-26'
AND `TGLEXP` = '2020-11-26'
AND `HMODAL` = '681743.0400'
ERROR - 2020-11-26 15:17:22 --> Query error: Unknown column 'LOCK' in 'field list' - Invalid query: UPDATE `stok_barang_fifo` SET `LOCK` = 1
WHERE `KDBRG` = '000001'
AND `KDLOKASI` = '6'
AND `TGLBELI` = '2020-11-26'
AND `TGLEXP` = '2020-11-26'
AND `HMODAL` = '681743.0400'
ERROR - 2020-11-26 15:17:25 --> Query error: Unknown column 'LOCK' in 'field list' - Invalid query: UPDATE `stok_barang_fifo` SET `LOCK` = 1
WHERE `KDBRG` = '000001'
AND `KDLOKASI` = '6'
AND `TGLBELI` = '2020-11-26'
AND `TGLEXP` = '2020-11-26'
AND `HMODAL` = '681743.0400'
ERROR - 2020-11-26 15:17:32 --> Query error: Unknown column 'LOCK' in 'field list' - Invalid query: UPDATE `stok_barang_fifo` SET `LOCK` = 1
WHERE `KDBRG` = '000001'
AND `KDLOKASI` = '6'
AND `TGLBELI` = '2020-11-26'
AND `TGLEXP` = '2020-11-26'
AND `HMODAL` = '681743.0400'
ERROR - 2020-11-26 15:18:06 --> Query error: Unknown column 'LOCK' in 'field list' - Invalid query: UPDATE `stok_barang_fifo` SET `LOCK` = 1
WHERE `KDBRG` = '000001'
AND `KDLOKASI` = '6'
AND `TGLBELI` = '2020-11-26'
AND `TGLEXP` = '2020-11-26'
AND `HMODAL` = '681743.0400'
ERROR - 2020-11-26 15:37:51 --> Severity: Notice --> Undefined variable: lock /var/www/html/simrs_open_source/application/farmasi/views/trans_pembelian/template_detail.php 235
ERROR - 2020-11-26 15:37:51 --> Severity: Notice --> Undefined variable: lock /var/www/html/simrs_open_source/application/farmasi/views/trans_pembelian/template_detail.php 253
ERROR - 2020-11-26 15:37:51 --> Severity: Notice --> Undefined variable: lock /var/www/html/simrs_open_source/application/farmasi/views/trans_pembelian/template_detail.php 253
ERROR - 2020-11-26 15:41:42 --> Severity: error --> Exception: syntax error, unexpected 'foreach' (T_FOREACH) /var/www/html/simrs_open_source/application/farmasi/views/trans_pembelian/template_detail.php 241
