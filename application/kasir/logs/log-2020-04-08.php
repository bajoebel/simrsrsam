<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2020-04-08 07:52:57 --> Query error: Unknown column 'id_cara_bayar' in 'where clause' - Invalid query: SELECT *
FROM `tbl01_cara_bayar`
WHERE `id_cara_bayar` = '2'
ERROR - 2020-04-08 10:31:22 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\simrs_open_source\application\kasir\views\kwitansi\template_detail.php 231
ERROR - 2020-04-08 10:31:41 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\simrs_open_source\application\kasir\views\kwitansi\template_detail.php 231
ERROR - 2020-04-08 10:34:31 --> Severity: Warning --> Missing argument 1 for kwitansi::selisih_bayar() C:\xampp\htdocs\simrs_open_source\application\kasir\controllers\kwitansi.php 104
ERROR - 2020-04-08 10:34:31 --> Severity: Notice --> Undefined variable: no_kwitansi C:\xampp\htdocs\simrs_open_source\application\kasir\controllers\kwitansi.php 107
ERROR - 2020-04-08 10:34:31 --> Severity: Notice --> Undefined variable: no_kwitansi C:\xampp\htdocs\simrs_open_source\application\kasir\views\kwitansi\invoice_selisih_bayar.php 102
ERROR - 2020-04-08 10:34:31 --> Severity: Notice --> Undefined variable: id_daftar C:\xampp\htdocs\simrs_open_source\application\kasir\views\kwitansi\invoice_selisih_bayar.php 105
ERROR - 2020-04-08 10:34:31 --> Severity: Notice --> Undefined variable: tgl_kwitansi C:\xampp\htdocs\simrs_open_source\application\kasir\views\kwitansi\invoice_selisih_bayar.php 110
ERROR - 2020-04-08 10:34:31 --> Severity: Notice --> Undefined variable: nomr C:\xampp\htdocs\simrs_open_source\application\kasir\views\kwitansi\invoice_selisih_bayar.php 113
ERROR - 2020-04-08 10:34:31 --> Severity: Notice --> Undefined variable: nama_pasien C:\xampp\htdocs\simrs_open_source\application\kasir\views\kwitansi\invoice_selisih_bayar.php 113
ERROR - 2020-04-08 10:34:31 --> Severity: Notice --> Undefined variable: tgl_masuk C:\xampp\htdocs\simrs_open_source\application\kasir\views\kwitansi\invoice_selisih_bayar.php 118
ERROR - 2020-04-08 10:34:31 --> Severity: Notice --> Undefined variable: tgl_keluar C:\xampp\htdocs\simrs_open_source\application\kasir\views\kwitansi\invoice_selisih_bayar.php 118
ERROR - 2020-04-08 10:34:31 --> Severity: Notice --> Undefined variable: nama_dpjp C:\xampp\htdocs\simrs_open_source\application\kasir\views\kwitansi\invoice_selisih_bayar.php 121
ERROR - 2020-04-08 10:34:31 --> Severity: Notice --> Undefined variable: tgl_masuk C:\xampp\htdocs\simrs_open_source\application\kasir\views\kwitansi\invoice_selisih_bayar.php 126
ERROR - 2020-04-08 10:34:31 --> Severity: Notice --> Undefined variable: tgl_keluar C:\xampp\htdocs\simrs_open_source\application\kasir\views\kwitansi\invoice_selisih_bayar.php 126
ERROR - 2020-04-08 10:34:31 --> Severity: Notice --> Undefined variable: cara_bayar C:\xampp\htdocs\simrs_open_source\application\kasir\views\kwitansi\invoice_selisih_bayar.php 129
ERROR - 2020-04-08 10:34:31 --> Severity: Notice --> Undefined variable: no_bpjs C:\xampp\htdocs\simrs_open_source\application\kasir\views\kwitansi\invoice_selisih_bayar.php 134
ERROR - 2020-04-08 10:34:31 --> Severity: Notice --> Undefined variable: no_sep C:\xampp\htdocs\simrs_open_source\application\kasir\views\kwitansi\invoice_selisih_bayar.php 137
ERROR - 2020-04-08 10:34:31 --> Severity: Notice --> Undefined variable: tarif_selisih_bayar C:\xampp\htdocs\simrs_open_source\application\kasir\views\kwitansi\invoice_selisih_bayar.php 153
ERROR - 2020-04-08 10:34:31 --> Severity: Notice --> Undefined variable: tarif_selisih_bayar C:\xampp\htdocs\simrs_open_source\application\kasir\views\kwitansi\invoice_selisih_bayar.php 160
ERROR - 2020-04-08 10:34:31 --> Severity: Notice --> Undefined variable: tarif_selisih_bayar C:\xampp\htdocs\simrs_open_source\application\kasir\views\kwitansi\invoice_selisih_bayar.php 250
ERROR - 2020-04-08 10:42:09 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\simrs_open_source\application\kasir\views\kwitansi\template_detail.php 233
ERROR - 2020-04-08 10:53:00 --> Query error: Table 'db_rs_open_dev.tbl04_penjualan1' doesn't exist - Invalid query: SELECT `tbl04_penjualan`.`KDJL`, `tbl04_penjualan`.`TGLJUAL`, `KDBRG`, `NMBRG`, `HJUAL`, `JMLJUAL`, `SUBTOTAL`
FROM `tbl04_penjualan1`
JOIN `tbl04_penjualan_detail` ON `tbl04_penjualan`.`KDJL`=`tbl04_penjualan_detail`.`KDJL`
WHERE `id_daftar` = '2020000002'
AND `tbl04_penjualan_detail`.`KDJL` NOT IN (SELECT kode_item FROM tbl05_kwitansi_detail)
ERROR - 2020-04-08 11:30:14 --> Severity: Notice --> Use of undefined constant tbl03_diagnosa - assumed 'tbl03_diagnosa' C:\xampp\htdocs\simrs_open_source\application\kasir\models\kwitansi_model.php 170
ERROR - 2020-04-08 11:30:14 --> Query error: Unknown column 'reg_unit' in 'where clause' - Invalid query: SELECT *
FROM `tbl03_diagnosa`
WHERE `reg_unit` = 'RJ-200408-08-0001'
ERROR - 2020-04-08 11:31:51 --> Query error: Unknown column 'tbl03_diagnisa.reg_unit' in 'on clause' - Invalid query: SELECT *
FROM `tbl03_diagnosa`
JOIN `tbl02_pendaftaran` ON `tbl02_pendaftaran`.`reg_unit`=`tbl03_diagnisa`.`reg_unit`
WHERE `reg_unit` = 'RJ-200408-08-0001'
ERROR - 2020-04-08 11:32:26 --> Query error: Unknown column 'tbl03_diagnisa.idx_pendaftaran' in 'on clause' - Invalid query: SELECT *
FROM `tbl03_diagnosa`
JOIN `tbl02_pendaftaran` ON `tbl02_pendaftaran`.`idx`=`tbl03_diagnisa`.`idx_pendaftaran`
WHERE `reg_unit` = 'RJ-200408-08-0001'
ERROR - 2020-04-08 11:32:58 --> Query error: Unknown column 'tbl03_diagnisa.idx_pendaftaran' in 'on clause' - Invalid query: SELECT *
FROM `tbl03_diagnosa`
JOIN `tbl02_pendaftaran` ON `tbl02_pendaftaran`.`idx`=`tbl03_diagnisa`.`idx_pendaftaran`
WHERE `reg_unit` = 'RJ-200408-08-0001'
ERROR - 2020-04-08 11:42:50 --> Severity: Notice --> Undefined property: stdClass::$jns_transaksi C:\xampp\htdocs\simrs_open_source\application\kasir\views\kwitansi\template_detail.php 244
