<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2020-07-09 05:04:14 --> Query error: Unknown column 'b.NMLOKASI' in 'field list' - Invalid query: SELECT a.LOKASI_ASAL,b.NMLOKASI 
        FROM tbl04_mutasi_bhp a
        GROUP BY a.LOKASI_ASAL
ERROR - 2020-07-09 05:05:52 --> Query error: Column 'KDMTBHP' in order clause is ambiguous - Invalid query: SELECT * FROM `tbl04_mutasi_bhp` a JOIN `tbl04_mutasi_bhp_detail` b ON a.`KDMTBHP` = b.`KDMTBHP`
            WHERE TGL_MUTASI BETWEEN '01/07/2020' AND '09/07/2020'
            ORDER BY KDMTBHP
ERROR - 2020-07-09 05:06:02 --> Query error: Column 'KDMTBHP' in order clause is ambiguous - Invalid query: SELECT * FROM `tbl04_mutasi_bhp` a JOIN `tbl04_mutasi_bhp_detail` b ON a.`KDMTBHP` = b.`KDMTBHP`
            WHERE TGL_MUTASI BETWEEN '01/07/2020' AND '09/07/2020'
            ORDER BY KDMTBHP
ERROR - 2020-07-09 05:06:07 --> Query error: Column 'KDMTBHP' in order clause is ambiguous - Invalid query: SELECT * FROM `tbl04_mutasi_bhp` a JOIN `tbl04_mutasi_bhp_detail` b ON a.`KDMTBHP` = b.`KDMTBHP`
            WHERE TGL_MUTASI BETWEEN '01/07/2020' AND '09/07/2020'
            ORDER BY KDMTBHP
ERROR - 2020-07-09 05:11:22 --> Severity: Notice --> Undefined index: NMSATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 12
ERROR - 2020-07-09 05:11:22 --> Severity: Notice --> Undefined index: NMGRBRG D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 13
ERROR - 2020-07-09 05:11:22 --> Severity: Notice --> Undefined index: NMSATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 12
ERROR - 2020-07-09 05:11:22 --> Severity: Notice --> Undefined index: NMGRBRG D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 13
ERROR - 2020-07-09 05:11:22 --> Severity: Notice --> Undefined index: NMSATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 12
ERROR - 2020-07-09 05:11:22 --> Severity: Notice --> Undefined index: NMGRBRG D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 13
ERROR - 2020-07-09 05:11:22 --> Severity: Notice --> Undefined index: NMSATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 12
ERROR - 2020-07-09 05:11:22 --> Severity: Notice --> Undefined index: NMGRBRG D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 13
ERROR - 2020-07-09 05:12:22 --> Severity: Notice --> Undefined index: NMGRBRG D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 13
ERROR - 2020-07-09 05:12:22 --> Severity: Notice --> Undefined index: NMGRBRG D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 13
ERROR - 2020-07-09 05:12:22 --> Severity: Notice --> Undefined index: NMGRBRG D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 13
ERROR - 2020-07-09 05:12:22 --> Severity: Notice --> Undefined index: NMGRBRG D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 13
ERROR - 2020-07-09 05:35:58 --> Query error: Unknown column 'TGLRETUR' in 'where clause' - Invalid query: SELECT *
            FROM tbl04_mutasi_bhp_retur 
            JOIN tbl04_mutasi_bhp ON tbl04_mutasi_bhp.KDMT=tbl04_mutasi_bhp_retur.KDMT
            JOIN tbl04_mutasi_bhp_retur_detail ON tbl04_mutasi_bhp_retur.KDMT_RET=tbl04_mutasi_bhp_retur_detail.KDMT_RET
            JOIN tbl04_barang ON tbl04_barang.KDBRG=tbl04_mutasi_bhp_retur_detail.KDBRG WHERE DATE_FORMAT(TGLRETUR,'%d-%m-%Y') BETWEEN '01/07/2020' AND '09/07/2020'
ERROR - 2020-07-09 05:36:10 --> Query error: Unknown column 'TGLRETUR' in 'where clause' - Invalid query: SELECT *
            FROM tbl04_mutasi_bhp_retur 
            JOIN tbl04_mutasi_bhp ON tbl04_mutasi_bhp.KDMT=tbl04_mutasi_bhp_retur.KDMT
            JOIN tbl04_mutasi_bhp_retur_detail ON tbl04_mutasi_bhp_retur.KDMT_RET=tbl04_mutasi_bhp_retur_detail.KDMT_RET
            JOIN tbl04_barang ON tbl04_barang.KDBRG=tbl04_mutasi_bhp_retur_detail.KDBRG WHERE DATE_FORMAT(TGLRETUR,'%d-%m-%Y') BETWEEN '01/07/2020' AND '09/07/2020'
ERROR - 2020-07-09 05:36:41 --> Query error: Unknown column 'tbl04_mutasi_bhp.KDMT' in 'on clause' - Invalid query: SELECT *
            FROM tbl04_mutasi_bhp_retur 
            JOIN tbl04_mutasi_bhp ON tbl04_mutasi_bhp.KDMT=tbl04_mutasi_bhp_retur.KDMT
            JOIN tbl04_mutasi_bhp_retur_detail ON tbl04_mutasi_bhp_retur.KDMT_RET=tbl04_mutasi_bhp_retur_detail.KDMT_RET
            JOIN tbl04_barang ON tbl04_barang.KDBRG=tbl04_mutasi_bhp_retur_detail.KDBRG WHERE DATE_FORMAT(TGL_RETUR,'%d-%m-%Y') BETWEEN '01/07/2020' AND '09/07/2020'
ERROR - 2020-07-09 05:39:19 --> Severity: Notice --> Undefined index: DTMT_RET D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_retur_bhp.php 8
ERROR - 2020-07-09 05:39:19 --> Severity: Notice --> Undefined index: KDMT_RET D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_retur_bhp.php 9
ERROR - 2020-07-09 05:39:19 --> Severity: Notice --> Undefined index: DTMT_RET D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_retur_bhp.php 8
ERROR - 2020-07-09 05:39:19 --> Severity: Notice --> Undefined index: KDMT_RET D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_retur_bhp.php 9
ERROR - 2020-07-09 05:40:11 --> Severity: Notice --> Undefined index: DTMT_RET D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_retur_bhp.php 8
ERROR - 2020-07-09 05:40:11 --> Severity: Notice --> Undefined index: KDMT_RET D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_retur_bhp.php 9
ERROR - 2020-07-09 05:40:11 --> Severity: Notice --> Undefined index: DTMT_RET D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_retur_bhp.php 8
ERROR - 2020-07-09 05:40:11 --> Severity: Notice --> Undefined index: KDMT_RET D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_retur_bhp.php 9
ERROR - 2020-07-09 05:41:32 --> Severity: error --> Exception: Call to undefined function isLogin() D:\xampp\htdocs\simrs_open_source\application\farmasi\controllers\laporan_penjualan.php 15
ERROR - 2020-07-09 05:59:13 --> Severity: error --> Exception: Call to undefined function isLogin() D:\xampp\htdocs\simrs_open_source\application\farmasi\controllers\laporan_penjualan.php 15
ERROR - 2020-07-09 06:05:21 --> Query error: Table 'db_rs_open_dev.pelayanan' doesn't exist - Invalid query: SELECT *
FROM `pelayanan`
ERROR - 2020-07-09 06:05:46 --> Query error: Table 'db_rs_open_dev.tbl04_pelayanan' doesn't exist - Invalid query: SELECT *
FROM `tbl04_pelayanan`
ERROR - 2020-07-09 06:05:48 --> Query error: Table 'db_rs_open_dev.tbl04_pelayanan' doesn't exist - Invalid query: SELECT *
FROM `tbl04_pelayanan`
ERROR - 2020-07-09 11:14:09 --> Query error: Table 'db_rs_open_dev.tbl04_pelayanan' doesn't exist - Invalid query: SELECT *
FROM `tbl04_pelayanan`
ERROR - 2020-07-09 11:14:24 --> Severity: Notice --> Undefined variable: datpelayanan D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan.php 126
ERROR - 2020-07-09 11:14:25 --> Severity: error --> Exception: Call to a member function result_array() on null D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan.php 126
ERROR - 2020-07-09 11:15:28 --> Severity: Notice --> Undefined index: id_cara_bayar D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan.php 127
ERROR - 2020-07-09 11:15:28 --> Severity: Notice --> Undefined index: id_cara_bayar D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan.php 127
ERROR - 2020-07-09 11:15:28 --> Severity: Notice --> Undefined index: id_cara_bayar D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan.php 127
ERROR - 2020-07-09 11:15:28 --> Severity: Notice --> Undefined index: id_cara_bayar D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan.php 127
ERROR - 2020-07-09 11:15:28 --> Severity: Notice --> Undefined index: id_cara_bayar D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan.php 127
ERROR - 2020-07-09 11:15:28 --> Severity: Notice --> Undefined index: id_cara_bayar D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan.php 127
ERROR - 2020-07-09 11:15:28 --> Severity: Notice --> Undefined index: id_cara_bayar D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan.php 127
ERROR - 2020-07-09 11:15:28 --> Severity: Notice --> Undefined index: id_cara_bayar D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan.php 127
ERROR - 2020-07-09 11:17:24 --> Severity: Notice --> Undefined variable: datjenis_pasien D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan.php 166
ERROR - 2020-07-09 11:17:24 --> Severity: error --> Exception: Call to a member function result_array() on null D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan.php 166
ERROR - 2020-07-09 11:17:57 --> Severity: Notice --> Undefined index: KDJPASIEN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan.php 167
ERROR - 2020-07-09 11:17:57 --> Severity: Notice --> Undefined index: NMJPASIEN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan.php 167
ERROR - 2020-07-09 11:17:57 --> Severity: Notice --> Undefined index: KDJPASIEN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan.php 167
ERROR - 2020-07-09 11:17:57 --> Severity: Notice --> Undefined index: NMJPASIEN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan.php 167
ERROR - 2020-07-09 11:17:57 --> Severity: Notice --> Undefined index: KDJPASIEN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan.php 167
ERROR - 2020-07-09 11:17:57 --> Severity: Notice --> Undefined index: NMJPASIEN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan.php 167
ERROR - 2020-07-09 11:17:57 --> Severity: Notice --> Undefined index: KDJPASIEN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan.php 167
ERROR - 2020-07-09 11:17:57 --> Severity: Notice --> Undefined index: NMJPASIEN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan.php 167
ERROR - 2020-07-09 11:17:57 --> Severity: Notice --> Undefined index: KDJPASIEN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan.php 167
ERROR - 2020-07-09 11:17:58 --> Severity: Notice --> Undefined index: NMJPASIEN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan.php 167
ERROR - 2020-07-09 11:17:58 --> Severity: Notice --> Undefined index: KDJPASIEN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan.php 167
ERROR - 2020-07-09 11:17:58 --> Severity: Notice --> Undefined index: NMJPASIEN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan.php 167
ERROR - 2020-07-09 11:17:58 --> Severity: Notice --> Undefined index: KDJPASIEN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan.php 167
ERROR - 2020-07-09 11:17:58 --> Severity: Notice --> Undefined index: NMJPASIEN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan.php 167
ERROR - 2020-07-09 11:17:58 --> Severity: Notice --> Undefined index: KDJPASIEN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan.php 167
ERROR - 2020-07-09 11:17:58 --> Severity: Notice --> Undefined index: NMJPASIEN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan.php 167
ERROR - 2020-07-09 11:18:25 --> Severity: Notice --> Undefined index: id_cara_bayar D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan.php 167
ERROR - 2020-07-09 11:18:25 --> Severity: Notice --> Undefined index: id_cara_bayar D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan.php 167
ERROR - 2020-07-09 11:18:25 --> Severity: Notice --> Undefined index: id_cara_bayar D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan.php 167
ERROR - 2020-07-09 11:18:25 --> Severity: Notice --> Undefined index: id_cara_bayar D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan.php 167
ERROR - 2020-07-09 11:18:25 --> Severity: Notice --> Undefined index: id_cara_bayar D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan.php 167
ERROR - 2020-07-09 11:18:25 --> Severity: Notice --> Undefined index: id_cara_bayar D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan.php 167
ERROR - 2020-07-09 11:18:25 --> Severity: Notice --> Undefined index: id_cara_bayar D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan.php 167
ERROR - 2020-07-09 11:18:25 --> Severity: Notice --> Undefined index: id_cara_bayar D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan.php 167
ERROR - 2020-07-09 11:18:25 --> Severity: Notice --> Undefined index: id_cara_bayar D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan.php 167
ERROR - 2020-07-09 11:18:25 --> Severity: Notice --> Undefined index: id_cara_bayar D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan.php 167
ERROR - 2020-07-09 11:18:25 --> Severity: Notice --> Undefined index: id_cara_bayar D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan.php 167
ERROR - 2020-07-09 11:18:26 --> Severity: Notice --> Undefined index: id_cara_bayar D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan.php 167
ERROR - 2020-07-09 11:18:26 --> Severity: Notice --> Undefined index: id_cara_bayar D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan.php 167
ERROR - 2020-07-09 11:18:26 --> Severity: Notice --> Undefined index: id_cara_bayar D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan.php 167
ERROR - 2020-07-09 11:18:26 --> Severity: Notice --> Undefined index: id_cara_bayar D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan.php 167
ERROR - 2020-07-09 11:18:26 --> Severity: Notice --> Undefined index: id_cara_bayar D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan.php 167
ERROR - 2020-07-09 11:18:53 --> Severity: Notice --> Undefined index: id_cara_bayar D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan.php 167
ERROR - 2020-07-09 11:18:53 --> Severity: Notice --> Undefined index: id_cara_bayar D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan.php 167
ERROR - 2020-07-09 11:18:53 --> Severity: Notice --> Undefined index: id_cara_bayar D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan.php 167
ERROR - 2020-07-09 11:18:53 --> Severity: Notice --> Undefined index: id_cara_bayar D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan.php 167
ERROR - 2020-07-09 11:18:53 --> Severity: Notice --> Undefined index: id_cara_bayar D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan.php 167
ERROR - 2020-07-09 11:18:53 --> Severity: Notice --> Undefined index: id_cara_bayar D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan.php 167
ERROR - 2020-07-09 11:18:53 --> Severity: Notice --> Undefined index: id_cara_bayar D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan.php 167
ERROR - 2020-07-09 11:18:53 --> Severity: Notice --> Undefined index: id_cara_bayar D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\laporan_penjualan.php 167
