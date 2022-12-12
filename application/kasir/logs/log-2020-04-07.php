<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2020-04-07 08:00:38 --> Query error: Unknown column 'tbl04_penjualan' in 'from clause' - Invalid query: SELECT *
FROM `tbl02_pendaftaran`
JOIN `tbl04_penjualan` USING (`tbl04_penjualan`)
WHERE `id_daftar` = '2020000001'
ERROR - 2020-04-07 08:55:37 --> Query error: Unknown column 'tbl04_penjualan' in 'from clause' - Invalid query: SELECT *
FROM `tbl02_pendaftaran`
JOIN `tbl04_penjualan` USING (`tbl04_penjualan`)
WHERE `id_daftar` = '2020000001'
ERROR - 2020-04-07 08:56:19 --> Query error: Unknown column 'tbl04_penjualan' in 'from clause' - Invalid query: SELECT *
FROM `tbl02_pendaftaran`
JOIN `tbl04_penjualan` USING (`tbl04_penjualan`)
WHERE `id_daftar` = '2020000001'
ERROR - 2020-04-07 08:56:24 --> Query error: Unknown column 'tbl04_penjualan' in 'from clause' - Invalid query: SELECT *
FROM `tbl02_pendaftaran`
JOIN `tbl04_penjualan` USING (`tbl04_penjualan`)
WHERE `id_daftar` = '2020000001'
ERROR - 2020-04-07 08:58:20 --> Query error: Column 'id_daftar' in where clause is ambiguous - Invalid query: SELECT *
FROM `tbl02_pendaftaran`
JOIN `tbl04_penjualan` ON `tbl04_penjualan`.`reg_unit`=`tbl02_pendaftaran`.`reg_unit`
WHERE `id_daftar` = '2020000001'
ERROR - 2020-04-07 09:12:32 --> Query error: Table 'db_rs_open_dev.tbl02_penjualan' doesn't exist - Invalid query: SELECT *
FROM `tbl02_penjualan`
WHERE `tbl02_penjualan`.`reg_unit` = 'RJ-200305-08-0001'
ERROR - 2020-04-07 09:12:32 --> Query error: Table 'db_rs_open_dev.tbl02_penjualan' doesn't exist - Invalid query: SELECT *
FROM `tbl02_penjualan`
WHERE `tbl02_penjualan`.`reg_unit` = 'PJ-200305-49-0001'
ERROR - 2020-04-07 09:12:32 --> Query error: Table 'db_rs_open_dev.tbl02_penjualan' doesn't exist - Invalid query: SELECT *
FROM `tbl02_penjualan`
WHERE `tbl02_penjualan`.`reg_unit` = 'PJ-200305-49-0002'
ERROR - 2020-04-07 09:12:32 --> Query error: Table 'db_rs_open_dev.tbl02_penjualan' doesn't exist - Invalid query: SELECT *
FROM `tbl02_penjualan`
WHERE `tbl02_penjualan`.`reg_unit` = 'RJ-200305-10-0001'
ERROR - 2020-04-07 09:12:32 --> Query error: Table 'db_rs_open_dev.tbl02_penjualan' doesn't exist - Invalid query: SELECT *
FROM `tbl02_penjualan`
WHERE `tbl02_penjualan`.`reg_unit` = 'RI-200306-57-0001'
ERROR - 2020-04-07 09:12:32 --> Query error: Table 'db_rs_open_dev.tbl02_penjualan' doesn't exist - Invalid query: SELECT *
FROM `tbl02_penjualan`
WHERE `tbl02_penjualan`.`reg_unit` = 'RI-200306-58-0001'
ERROR - 2020-04-07 09:12:32 --> Query error: Table 'db_rs_open_dev.tbl02_penjualan' doesn't exist - Invalid query: SELECT *
FROM `tbl02_penjualan`
WHERE `tbl02_penjualan`.`reg_unit` = 'PJ-200317-50-0001'
ERROR - 2020-04-07 09:12:32 --> Query error: Table 'db_rs_open_dev.tbl02_penjualan' doesn't exist - Invalid query: SELECT *
FROM `tbl02_penjualan`
WHERE `tbl02_penjualan`.`reg_unit` = 'PJ-200317-49-0001'
ERROR - 2020-04-07 09:13:35 --> Query error: Table 'db_rs_open_dev.tbl02_penjualan' doesn't exist - Invalid query: SELECT *
FROM `tbl02_penjualan`
WHERE `tbl02_penjualan`.`reg_unit` = 'PJ-200305-49-0001'
ERROR - 2020-04-07 09:54:48 --> Severity: Parsing Error --> syntax error, unexpected '$unfinish' (T_VARIABLE) C:\xampp\htdocs\simrs_open_source\application\kasir\controllers\kwitansi.php 200
ERROR - 2020-04-07 10:19:44 --> Severity: Warning --> Missing argument 1 for kwitansi::carabayar() C:\xampp\htdocs\simrs_open_source\application\kasir\controllers\kwitansi.php 252
ERROR - 2020-04-07 10:19:44 --> Severity: Notice --> Undefined variable: id C:\xampp\htdocs\simrs_open_source\application\kasir\controllers\kwitansi.php 253
ERROR - 2020-04-07 10:26:33 --> Query error: Unknown column 'status_bayar' in 'field list' - Invalid query: INSERT INTO `tbl05_kwitansi` (`id_daftar`, `nomr`, `nama_pasien`, `jns_kelamin`, `tgl_lahir`, `umur`, `id_cara_bayar`, `cara_bayar`, `no_bpjs`, `no_sep`, `tgl_masuk`, `tgl_keluar`, `dpjp`, `nama_dpjp`, `total_tagihan`, `biaya_lainnya`, `grand_total`, `tarif_bpjs`, `tarif_selisih_bayar`, `status_bayar`, `userExec`, `session_id`) VALUES ('2020000001', '732917', 'WANHAR AZRI', '1', '1986-08-09', '33 Tahun 7 Bulan 29 Hari', '2', 'PBI APBD', '0002888900853', '0306R0010101V100010', '2020-03-06 08:52:51', '2020-04-07', 'NRP1910278', 'dr. NORA FITRI ', '3862210', 0, '3862210', '3000000', '100000', 0, 'NRP1910460', '35i5trtogvjjiv8c7usla7hvvbjfoocr')
ERROR - 2020-04-07 10:28:00 --> Severity: Notice --> Undefined variable: no_kwitansi C:\xampp\htdocs\simrs_open_source\application\kasir\views\kwitansi\invoice_v2.php 102
ERROR - 2020-04-07 10:28:00 --> Severity: Notice --> Undefined variable: id_daftar C:\xampp\htdocs\simrs_open_source\application\kasir\views\kwitansi\invoice_v2.php 105
ERROR - 2020-04-07 10:28:00 --> Severity: Notice --> Undefined variable: tgl_kwitansi C:\xampp\htdocs\simrs_open_source\application\kasir\views\kwitansi\invoice_v2.php 110
ERROR - 2020-04-07 10:28:00 --> Severity: Notice --> Undefined variable: nomr C:\xampp\htdocs\simrs_open_source\application\kasir\views\kwitansi\invoice_v2.php 113
ERROR - 2020-04-07 10:28:00 --> Severity: Notice --> Undefined variable: nama_pasien C:\xampp\htdocs\simrs_open_source\application\kasir\views\kwitansi\invoice_v2.php 113
ERROR - 2020-04-07 10:28:00 --> Severity: Notice --> Undefined variable: tgl_masuk C:\xampp\htdocs\simrs_open_source\application\kasir\views\kwitansi\invoice_v2.php 118
ERROR - 2020-04-07 10:28:00 --> Severity: Notice --> Undefined variable: tgl_keluar C:\xampp\htdocs\simrs_open_source\application\kasir\views\kwitansi\invoice_v2.php 118
ERROR - 2020-04-07 10:28:00 --> Severity: Notice --> Undefined variable: nama_dpjp C:\xampp\htdocs\simrs_open_source\application\kasir\views\kwitansi\invoice_v2.php 121
ERROR - 2020-04-07 10:28:00 --> Severity: Notice --> Undefined variable: tgl_masuk C:\xampp\htdocs\simrs_open_source\application\kasir\views\kwitansi\invoice_v2.php 126
ERROR - 2020-04-07 10:28:00 --> Severity: Notice --> Undefined variable: tgl_keluar C:\xampp\htdocs\simrs_open_source\application\kasir\views\kwitansi\invoice_v2.php 126
ERROR - 2020-04-07 10:28:00 --> Severity: Notice --> Undefined variable: cara_bayar C:\xampp\htdocs\simrs_open_source\application\kasir\views\kwitansi\invoice_v2.php 129
ERROR - 2020-04-07 10:28:00 --> Severity: Notice --> Undefined variable: no_bpjs C:\xampp\htdocs\simrs_open_source\application\kasir\views\kwitansi\invoice_v2.php 134
ERROR - 2020-04-07 10:28:00 --> Severity: Notice --> Undefined variable: no_sep C:\xampp\htdocs\simrs_open_source\application\kasir\views\kwitansi\invoice_v2.php 137
ERROR - 2020-04-07 10:28:00 --> Severity: Error --> Call to undefined method stdClass::result_array() C:\xampp\htdocs\simrs_open_source\application\kasir\views\kwitansi\invoice_v2.php 155
ERROR - 2020-04-07 10:34:19 --> Severity: Notice --> Undefined variable: no_kwitansi C:\xampp\htdocs\simrs_open_source\application\kasir\views\kwitansi\invoice_selisih_bayar.php 102
ERROR - 2020-04-07 10:34:19 --> Severity: Notice --> Undefined variable: id_daftar C:\xampp\htdocs\simrs_open_source\application\kasir\views\kwitansi\invoice_selisih_bayar.php 105
ERROR - 2020-04-07 10:34:19 --> Severity: Notice --> Undefined variable: tgl_kwitansi C:\xampp\htdocs\simrs_open_source\application\kasir\views\kwitansi\invoice_selisih_bayar.php 110
ERROR - 2020-04-07 10:34:19 --> Severity: Notice --> Undefined variable: nomr C:\xampp\htdocs\simrs_open_source\application\kasir\views\kwitansi\invoice_selisih_bayar.php 113
ERROR - 2020-04-07 10:34:19 --> Severity: Notice --> Undefined variable: nama_pasien C:\xampp\htdocs\simrs_open_source\application\kasir\views\kwitansi\invoice_selisih_bayar.php 113
ERROR - 2020-04-07 10:34:19 --> Severity: Notice --> Undefined variable: tgl_masuk C:\xampp\htdocs\simrs_open_source\application\kasir\views\kwitansi\invoice_selisih_bayar.php 118
ERROR - 2020-04-07 10:34:19 --> Severity: Notice --> Undefined variable: tgl_keluar C:\xampp\htdocs\simrs_open_source\application\kasir\views\kwitansi\invoice_selisih_bayar.php 118
ERROR - 2020-04-07 10:34:19 --> Severity: Notice --> Undefined variable: nama_dpjp C:\xampp\htdocs\simrs_open_source\application\kasir\views\kwitansi\invoice_selisih_bayar.php 121
ERROR - 2020-04-07 10:34:19 --> Severity: Notice --> Undefined variable: tgl_masuk C:\xampp\htdocs\simrs_open_source\application\kasir\views\kwitansi\invoice_selisih_bayar.php 126
ERROR - 2020-04-07 10:34:19 --> Severity: Notice --> Undefined variable: tgl_keluar C:\xampp\htdocs\simrs_open_source\application\kasir\views\kwitansi\invoice_selisih_bayar.php 126
ERROR - 2020-04-07 10:34:19 --> Severity: Notice --> Undefined variable: cara_bayar C:\xampp\htdocs\simrs_open_source\application\kasir\views\kwitansi\invoice_selisih_bayar.php 129
ERROR - 2020-04-07 10:34:19 --> Severity: Notice --> Undefined variable: no_bpjs C:\xampp\htdocs\simrs_open_source\application\kasir\views\kwitansi\invoice_selisih_bayar.php 134
ERROR - 2020-04-07 10:34:19 --> Severity: Notice --> Undefined variable: no_sep C:\xampp\htdocs\simrs_open_source\application\kasir\views\kwitansi\invoice_selisih_bayar.php 137
