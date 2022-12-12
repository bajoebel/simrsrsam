<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2020-11-25 13:57:05 --> Query error: Column 'KDBRG' in where clause is ambiguous - Invalid query: SELECT *
FROM `stok_barang_fifo` `a`
JOIN `tbl04_barang` `b` ON `a`.`KDBRG` = `b`.`KDBRG`
WHERE `KDBRG` = '000001'
AND `JSTOK` > 0
ORDER BY `HMODAL` DESC
ERROR - 2020-11-25 13:57:05 --> Severity: Core Warning --> PHP Startup: Unable to load dynamic library 'intl' (tried: /usr/lib/php/20190902/intl (/usr/lib/php/20190902/intl: cannot open shared object file: No such file or directory), /usr/lib/php/20190902/intl.so (/usr/lib/php/20190902/intl.so: cannot open shared object file: No such file or directory)) Unknown 0
ERROR - 2020-11-25 13:57:20 --> Severity: Notice --> Undefined variable: res /var/www/html/simrs_open_source/application/farmasi/controllers/Trans_pembelian.php 861
ERROR - 2020-11-25 13:57:20 --> Severity: Core Warning --> PHP Startup: Unable to load dynamic library 'intl' (tried: /usr/lib/php/20190902/intl (/usr/lib/php/20190902/intl: cannot open shared object file: No such file or directory), /usr/lib/php/20190902/intl.so (/usr/lib/php/20190902/intl.so: cannot open shared object file: No such file or directory)) Unknown 0
ERROR - 2020-11-25 14:15:25 --> Severity: Notice --> Undefined variable: res /var/www/html/simrs_open_source/application/farmasi/controllers/Trans_pembelian.php 861
ERROR - 2020-11-25 14:15:25 --> Severity: Core Warning --> PHP Startup: Unable to load dynamic library 'intl' (tried: /usr/lib/php/20190902/intl (/usr/lib/php/20190902/intl: cannot open shared object file: No such file or directory), /usr/lib/php/20190902/intl.so (/usr/lib/php/20190902/intl.so: cannot open shared object file: No such file or directory)) Unknown 0
ERROR - 2020-11-25 14:16:05 --> Severity: Core Warning --> PHP Startup: Unable to load dynamic library 'intl' (tried: /usr/lib/php/20190902/intl (/usr/lib/php/20190902/intl: cannot open shared object file: No such file or directory), /usr/lib/php/20190902/intl.so (/usr/lib/php/20190902/intl.so: cannot open shared object file: No such file or directory)) Unknown 0
ERROR - 2020-11-25 14:18:39 --> Severity: Core Warning --> Module 'intl' already loaded Unknown 0
ERROR - 2020-11-25 14:19:23 --> Severity: Core Warning --> Module 'intl' already loaded Unknown 0
ERROR - 2020-11-25 14:29:17 --> Query error: Table 'db_simrs_v2.stok_barang_fifo1' doesn't exist - Invalid query: SELECT *
FROM `stok_barang_fifo1` `a`
JOIN `tbl04_barang` `b` ON `a`.`KDBRG` = `b`.`KDBRG`
WHERE `a`.`KDBRG` = '000001'
AND `JSTOK` > 0
ORDER BY `HMODAL` DESC
ERROR - 2020-11-25 14:29:50 --> Query error: Table 'db_simrs_v2.stok_barang_fifo1' doesn't exist - Invalid query: SELECT *
FROM `stok_barang_fifo1` `a`
JOIN `tbl04_barang` `b` ON `a`.`KDBRG` = `b`.`KDBRG`
WHERE `a`.`KDBRG` = '000001'
AND `JSTOK` > 0
ORDER BY `HMODAL` DESC
ERROR - 2020-11-25 14:34:22 --> Query error: Table 'db_simrs_v2.stok_barang_fifo1' doesn't exist - Invalid query: SELECT *
FROM `stok_barang_fifo1` `a`
JOIN `tbl04_barang` `b` ON `a`.`KDBRG` = `b`.`KDBRG`
WHERE `a`.`KDBRG` = '000001'
AND `JSTOK` > 0
ORDER BY `HMODAL` DESC
ERROR - 2020-11-25 14:57:45 --> Severity: error --> Exception: Too few arguments to function search::waktu_pakai(), 0 passed in /var/www/html/simrs_open_source/system/core/CodeIgniter.php on line 532 and exactly 1 expected /var/www/html/simrs_open_source/application/farmasi/controllers/Search.php 144
ERROR - 2020-11-25 14:59:12 --> Severity: error --> Exception: Too few arguments to function search::waktu_pakai(), 0 passed in /var/www/html/simrs_open_source/system/core/CodeIgniter.php on line 532 and exactly 1 expected /var/www/html/simrs_open_source/application/farmasi/controllers/Search.php 144
ERROR - 2020-11-25 15:39:05 --> Query error: Duplicate entry '' for key 'tbl04_pembelian.PRIMARY' - Invalid query: INSERT INTO `tbl04_pembelian` (`KDBL`, `PEMBAYARAN`, `KDSUPPLIER`, `NMSUPPLIER`, `NOFAKTUR`, `TGLFAKTUR`, `TGLTERIMA`, `JTEMPO`, `KDLOKASI`, `NMLOKASI`, `JENIS_TRANS`, `TOTFAKTUR`, `TOTDISKON_ITEM`, `DISKON_GLOBAL`, `TOTPPN`, `ONGKIR`, `GRANDTOT`, `KETBL`, `UEXEC`) VALUES ('', 'CASH', '30', 'ANTAR MITRA SUMBADA', '0012', '2020-11-25', '2020-11-25', '2020-11-25', '6', 'GUDANG OBAT', '1', '6432030.0000', '0', '0', '0', '0.0000', '6432030.0000', '', 'NRP1910460')
