<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2020-07-11 02:33:52 --> Query error: Table 'db_rs_open_dev.dokter' doesn't exist - Invalid query: SELECT *
FROM `dokter`
ERROR - 2020-07-11 02:34:30 --> Query error: Table 'db_rs_open_dev.dokter' doesn't exist - Invalid query: SELECT *
FROM `dokter`
ERROR - 2020-07-11 02:34:39 --> Query error: Table 'db_rs_open_dev.dokter' doesn't exist - Invalid query: SELECT *
FROM `dokter`
ERROR - 2020-07-11 02:34:44 --> Query error: Table 'db_rs_open_dev.dokter' doesn't exist - Invalid query: SELECT *
FROM `dokter`
ERROR - 2020-07-11 02:34:50 --> Query error: Table 'db_rs_open_dev.dokter' doesn't exist - Invalid query: SELECT *
FROM `dokter`
ERROR - 2020-07-11 02:35:06 --> Query error: Table 'db_rs_open_dev.group_barang' doesn't exist - Invalid query: SELECT *
FROM `group_barang`
ERROR - 2020-07-11 02:37:01 --> Query error: Table 'db_rs_open_dev.dokter' doesn't exist - Invalid query: SELECT *
FROM `dokter`
ERROR - 2020-07-11 02:38:25 --> Query error: Table 'db_rs_open_dev.dokter' doesn't exist - Invalid query: SELECT *
FROM `dokter`
ERROR - 2020-07-11 02:38:32 --> Query error: Table 'db_rs_open_dev.dokter' doesn't exist - Invalid query: SELECT *
FROM `dokter`
ERROR - 2020-07-11 02:46:40 --> Query error: Table 'db_rs_open_dev.group_barang' doesn't exist - Invalid query: SELECT *
FROM `group_barang`
ERROR - 2020-07-11 02:58:24 --> Query error: Table 'db_rs_open_dev.lokasi' doesn't exist - Invalid query: SELECT a.KDLOKASI,b.NMLOKASI,c.NMPELAYANAN FROM penjualan a 
        LEFT JOIN lokasi b ON a.KDLOKASI=b.KDLOKASI
        LEFT JOIN pelayanan c ON a.KDPELAYANAN=c.KDPELAYANAN
        WHERE a.KDLOKASI = '1' AND a.KDPELAYANAN = 'GD'
        AND (DATE_FORMAT(a.TGLRESEP,'%Y-%m-%d') BETWEEN '2020-07-01' AND '2020-07-11') 
        GROUP BY a.KDLOKASI
ERROR - 2020-07-11 03:00:34 --> Severity: Notice --> Undefined index: NMPELAYANAN D:\xampp\htdocs\simrs_open_source\application\farmasi\controllers\laporan_penjualan.php 634
ERROR - 2020-07-11 03:00:34 --> Severity: error --> Exception: Call to undefined function getCompanyOK() D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\print_preview_8.php 63
ERROR - 2020-07-11 03:02:54 --> Severity: error --> Exception: Call to undefined function getCompanyOK() D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\print_preview_8.php 63
ERROR - 2020-07-11 03:04:10 --> Query error: Table 'db_rs_open_dev.jenis_pasien' doesn't exist - Invalid query: SELECT b.KDJL,b.DTJL,b.TGLRESEP,b.NOMR,b.NMPASIEN,b.NILAI_R,c.NMJPASIEN,d.nama_dokter AS NMDOKTER,e.NMRUANGAN,
        SUM((a.HJUAL * a.SISA) + a.R) AS SubTotal,
        SUM(a.DISKON) AS DISKON,
        SUM((a.HJUAL * a.SISA) - (a.DISKON)) AS Total FROM penjualan_detail a 
        LEFT JOIN penjualan b ON a.KDJL=b.KDJL 
        LEFT JOIN jenis_pasien c ON b.KDJPASIEN=c.KDJPASIEN 
        LEFT JOIN dokter d ON b.KDDOKTER=d.id_dokter 
        LEFT JOIN ruangan e ON b.KDRUANGAN=e.KDRUANGAN 
        WHERE b.KDLOKASI = '1' AND b.KDPELAYANAN = 'GD'
        AND (DATE_FORMAT(b.TGLRESEP,'%Y-%m-%d') BETWEEN '2020-07-01' AND '2020-07-11') 
        GROUP BY b.KDJL ORDER BY b.TGLRESEP
ERROR - 2020-07-11 03:06:46 --> Query error: Unknown column 'b.NILAI_R' in 'field list' - Invalid query: SELECT b.KDJL,b.DTJL,b.TGLRESEP,b.NOMR,b.NMPASIEN,b.NILAI_R,a.CARA_BAYAR AS NMJPASIEN,
        b.NMDOKTER,b.NMRUANGAN,
        SUM((a.HJUAL * a.SISA) + a.R) AS SubTotal,
        SUM(a.DISKON) AS DISKON,
        SUM((a.HJUAL * a.SISA) - (a.DISKON)) AS Total FROM tbl04_penjualan_detail a 
        LEFT JOIN tbl04_penjualan b ON a.KDJL=b.KDJL 
        WHERE b.KDLOKASI = '1' AND b.KDPELAYANAN = 'GD'
        AND (DATE_FORMAT(b.TGLRESEP,'%Y-%m-%d') BETWEEN '2020-07-01' AND '2020-07-11') 
        GROUP BY b.KDJL ORDER BY b.TGLRESEP
ERROR - 2020-07-11 03:08:23 --> Query error: Unknown column 'a.CARA_BAYAR' in 'field list' - Invalid query: SELECT b.KDJL,b.DTJL,b.TGLRESEP,b.NOMR,b.NMPASIEN,a.R AS NILAI_R,a.CARA_BAYAR AS NMJPASIEN,
        b.NMDOKTER,b.NMRUANGAN,
        SUM((a.HJUAL * a.SISA) + a.R) AS SubTotal,
        SUM(a.DISKON) AS DISKON,
        SUM((a.HJUAL * a.SISA) - (a.DISKON)) AS Total FROM tbl04_penjualan_detail a 
        LEFT JOIN tbl04_penjualan b ON a.KDJL=b.KDJL 
        WHERE b.KDLOKASI = '1' AND b.KDPELAYANAN = 'GD'
        AND (DATE_FORMAT(b.TGLRESEP,'%Y-%m-%d') BETWEEN '2020-07-01' AND '2020-07-11') 
        GROUP BY b.KDJL ORDER BY b.TGLRESEP
ERROR - 2020-07-11 03:09:11 --> Query error: Unknown column 'b.KDPELAYANAN' in 'where clause' - Invalid query: SELECT b.KDJL,b.DTJL,b.TGLRESEP,b.NOMR,b.NMPASIEN,a.R AS NILAI_R,b.CARA_BAYAR AS NMJPASIEN,
        b.NMDOKTER,b.NMRUANGAN,
        SUM((a.HJUAL * a.SISA) + a.R) AS SubTotal,
        SUM(a.DISKON) AS DISKON,
        SUM((a.HJUAL * a.SISA) - (a.DISKON)) AS Total FROM tbl04_penjualan_detail a 
        LEFT JOIN tbl04_penjualan b ON a.KDJL=b.KDJL 
        WHERE b.KDLOKASI = '1' AND b.KDPELAYANAN = 'GD'
        AND (DATE_FORMAT(b.TGLRESEP,'%Y-%m-%d') BETWEEN '2020-07-01' AND '2020-07-11') 
        GROUP BY b.KDJL ORDER BY b.TGLRESEP
ERROR - 2020-07-11 03:09:46 --> Severity: Notice --> Undefined variable: rTotal D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\get_preview_8.php 19
ERROR - 2020-07-11 03:10:32 --> Severity: Notice --> Undefined variable: rTotal D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\get_preview_8.php 19
ERROR - 2020-07-11 03:12:00 --> Query error: Table 'db_rs_open_dev.lokasi' doesn't exist - Invalid query: SELECT a.KDLOKASI,b.NMLOKASI,c.NMPELAYANAN FROM penjualan a 
        LEFT JOIN lokasi b ON a.KDLOKASI=b.KDLOKASI
        LEFT JOIN pelayanan c ON a.KDPELAYANAN=c.KDPELAYANAN
        WHERE a.KDLOKASI = '1' AND a.KDPELAYANAN = 'GD'
        AND (DATE_FORMAT(a.TGLRESEP,'%Y-%m-%d') BETWEEN '2020-07-01' AND '2020-07-11') 
        GROUP BY a.KDLOKASI
ERROR - 2020-07-11 03:13:54 --> Query error: Unknown column 'a.KDPELAYANAN' in 'where clause' - Invalid query: SELECT* FROM tbl04_penjualan a 
        WHERE a.KDLOKASI = '1' AND a.KDPELAYANAN = 'GD'
        AND (DATE_FORMAT(a.TGLRESEP,'%Y-%m-%d') BETWEEN '2020-07-01' AND '2020-07-11') 
        GROUP BY a.KDLOKASI
ERROR - 2020-07-11 03:14:15 --> Severity: error --> Exception: Call to undefined function getCompanyOK() D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\print_preview_6.php 63
ERROR - 2020-07-11 03:15:35 --> Query error: Table 'db_rs_open_dev.jenis_pasien' doesn't exist - Invalid query: SELECT b.KDJL,b.DTJL,b.TGLRESEP,b.NOMR,b.NMPASIEN,c.NMJPASIEN,d.nama_dokter AS NMDOKTER,e.grNama AS NMRUANGAN,
        SUM((a.HJUAL * a.SISA) + a.R) AS SubTotal,
        SUM(a.DISKON) AS DISKON,
        SUM((a.HJUAL * a.SISA) - (a.DISKON) + a.R) AS Total FROM penjualan_detail a 
        LEFT JOIN penjualan b ON a.KDJL=b.KDJL 
        LEFT JOIN jenis_pasien c ON b.KDJPASIEN=c.KDJPASIEN 
        LEFT JOIN dokter d ON b.KDDOKTER=d.id_dokter 
        LEFT JOIN group_ruang e ON b.KDRUANGAN=e.grId 
        WHERE KDLOKASI = '1' AND b.KDPELAYANAN = 'GD'
        AND (DATE_FORMAT(b.TGLRESEP,'%Y-%m-%d') BETWEEN '2020-07-01' AND '2020-07-11') 
        GROUP BY b.KDJL ORDER BY b.TGLRESEP
ERROR - 2020-07-11 03:18:55 --> Query error: Unknown column 'b.NMJPASIEN' in 'field list' - Invalid query: SELECT b.KDJL,b.DTJL,b.TGLRESEP,b.NOMR,b.NMPASIEN,b.NMJPASIEN,b.NMDOKTER,b.NMRUANGAN,
        SUM((a.HJUAL * a.SISA) + a.R) AS SubTotal,
        SUM(a.DISKON) AS DISKON,
        SUM((a.HJUAL * a.SISA) - (a.DISKON) + a.R) AS Total FROM tbl04_penjualan_detail a 
        LEFT JOIN tbl04_penjualan b ON a.KDJL=b.KDJL 
        WHERE KDLOKASI = '1' AND b.JNSLAYANAN = 'GD'
        AND (DATE_FORMAT(b.TGLRESEP,'%Y-%m-%d') BETWEEN '2020-07-01' AND '2020-07-11') 
        GROUP BY b.KDJL ORDER BY b.TGLRESEP
ERROR - 2020-07-11 03:20:02 --> Query error: Unknown column 'b.KDPELAYANAN' in 'where clause' - Invalid query: SELECT a.KDJL,a.KDBRG,a.NMBRG,a.SISA,a.HJUAL, a.DISKON AS DISKON,a.R,
        (a.HJUAL * a.SISA) - (a.DISKON) + a.R AS Total FROM tbl04_penjualan_detail a 
        LEFT JOIN tbl04_penjualan b ON a.KDJL=b.KDJL 
        WHERE KDLOKASI = '1' AND b.KDPELAYANAN = 'GD' 
        AND (DATE_FORMAT(b.TGLRESEP,'%Y-%m-%d') BETWEEN '2020-07-01' AND '2020-07-11') 
        GROUP BY a.KDJL,a.KDBRG ORDER BY b.TGLRESEP
ERROR - 2020-07-11 03:21:23 --> Severity: Notice --> Undefined variable: rTotal D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\get_preview_8.php 19
ERROR - 2020-07-11 03:30:45 --> Severity: Notice --> Undefined variable: rTotal D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\get_preview_8.php 19
ERROR - 2020-07-11 03:32:52 --> Severity: error --> Exception: Call to undefined function getCompanyOK() D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan\print_preview_4.php 63
ERROR - 2020-07-11 05:13:41 --> Query error: Unknown column 'a.KDLOKASI' in 'where clause' - Invalid query: SELECT a.*,b.NMBRG,c.NMLOKASI,d.NMSATUAN,b.`JENISBRG`, f.DTMT,f.KDMT,a.JMLRET,f.LOKASI_TUJUAN
            FROM tbl04_mutasi_detail a
            JOIN tbl04_mutasi g ON a.KDMT = g.KDMT
            LEFT JOIN tbl04_barang b ON a.KDBRG=b.KDBRG
            LEFT JOIN tbl04_mutasi f ON a.KDMT=f.KDMT
            LEFT JOIN tbl04_lokasi c ON f.LOKASI_ASAL=c.KDLOKASI
            LEFT JOIN tbl04_satuan d ON b.KDSATUAN=d.KDSATUAN
            WHERE a.KDLOKASI = '' 
            ORDER BY NMBRG
ERROR - 2020-07-11 05:13:49 --> Query error: Unknown column 'a.KDLOKASI' in 'where clause' - Invalid query: SELECT a.*,b.NMBRG,c.NMLOKASI,d.NMSATUAN,b.`JENISBRG`, f.DTMT,f.KDMT,a.JMLRET,f.LOKASI_TUJUAN
            FROM tbl04_mutasi_detail a
            JOIN tbl04_mutasi g ON a.KDMT = g.KDMT
            LEFT JOIN tbl04_barang b ON a.KDBRG=b.KDBRG
            LEFT JOIN tbl04_mutasi f ON a.KDMT=f.KDMT
            LEFT JOIN tbl04_lokasi c ON f.LOKASI_ASAL=c.KDLOKASI
            LEFT JOIN tbl04_satuan d ON b.KDSATUAN=d.KDSATUAN
            WHERE a.KDLOKASI = '' 
            ORDER BY NMBRG
ERROR - 2020-07-11 05:14:41 --> Query error: Unknown column 'a.KDLOKASI' in 'where clause' - Invalid query: SELECT a.*,b.NMBRG,c.NMLOKASI,d.NMSATUAN,b.`JENISBRG`, f.DTMT,f.KDMT,a.JMLRET,f.LOKASI_TUJUAN
            FROM tbl04_mutasi_detail a
            JOIN tbl04_mutasi g ON a.KDMT = g.KDMT
            LEFT JOIN tbl04_barang b ON a.KDBRG=b.KDBRG
            LEFT JOIN tbl04_mutasi f ON a.KDMT=f.KDMT
            LEFT JOIN tbl04_lokasi c ON f.LOKASI_ASAL=c.KDLOKASI
            LEFT JOIN tbl04_satuan d ON b.KDSATUAN=d.KDSATUAN
            WHERE a.KDLOKASI = '' 
            ORDER BY NMBRG
ERROR - 2020-07-11 05:17:57 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ''11/07/2020' at line 1 - Invalid query: SELECT * FROM tbl04_barang_keluar_khusus WHERE TGLTRANSAKSI BETWEEN '01/06/2020' AND '11/07/2020
ERROR - 2020-07-11 05:22:20 --> Query error: Table 'db_rs_open_dev.tbl04_barang_keluar_khusus1' doesn't exist - Invalid query: SELECT * FROM tbl04_barang_keluar_khusus1 WHERE DATE_FORMAT(TGLTRANSAKSI,'%d-%m-%Y') BETWEEN '2020-06-01' AND '2020-07-11'
ERROR - 2020-07-11 05:23:18 --> Query error: Table 'db_rs_open_dev.tbl04_barang_keluar_khusus1' doesn't exist - Invalid query: SELECT * FROM tbl04_barang_keluar_khusus1 WHERE DATE_FORMAT(TGLTRANSAKSI,'%Y-%m-%d') BETWEEN '2020-06-01' AND '2020-07-11'
ERROR - 2020-07-11 05:23:27 --> Query error: Unknown column 'a.KDLOKASI' in 'where clause' - Invalid query: SELECT a.*,b.NMBRG,c.NMLOKASI,d.NMSATUAN,b.`JENISBRG`, f.DTMT,f.KDMT,a.JMLRET,f.LOKASI_TUJUAN
            FROM tbl04_mutasi_detail a
            JOIN tbl04_mutasi g ON a.KDMT = g.KDMT
            LEFT JOIN tbl04_barang b ON a.KDBRG=b.KDBRG
            LEFT JOIN tbl04_mutasi f ON a.KDMT=f.KDMT
            LEFT JOIN tbl04_lokasi c ON f.LOKASI_ASAL=c.KDLOKASI
            LEFT JOIN tbl04_satuan d ON b.KDSATUAN=d.KDSATUAN
            WHERE a.KDLOKASI = '' 
            ORDER BY NMBRG
ERROR - 2020-07-11 05:23:36 --> Query error: Unknown column 'a.KDLOKASI' in 'where clause' - Invalid query: SELECT a.*,b.NMBRG,c.NMLOKASI,d.NMSATUAN,b.`JENISBRG`, f.DTMT,f.KDMT,a.JMLRET,f.LOKASI_TUJUAN
            FROM tbl04_mutasi_detail a
            JOIN tbl04_mutasi g ON a.KDMT = g.KDMT
            LEFT JOIN tbl04_barang b ON a.KDBRG=b.KDBRG
            LEFT JOIN tbl04_mutasi f ON a.KDMT=f.KDMT
            LEFT JOIN tbl04_lokasi c ON f.LOKASI_ASAL=c.KDLOKASI
            LEFT JOIN tbl04_satuan d ON b.KDSATUAN=d.KDSATUAN
            WHERE a.KDLOKASI = '' 
            ORDER BY NMBRG
ERROR - 2020-07-11 05:25:17 --> Query error: Column 'KDBKK' in order clause is ambiguous - Invalid query: SELECT * FROM `tbl04_barang_keluar_khusus` a JOIN `tbl04_barang_keluar_khusus_detail` b ON a.`KDBKK`=b.`KDBKK` ORDER BY KDBKK, NMBRG;
ERROR - 2020-07-11 05:25:46 --> Severity: Notice --> Undefined index: TGL_MUTASI D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 8
ERROR - 2020-07-11 05:25:46 --> Severity: Notice --> Undefined index: KDMTBHP D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 9
ERROR - 2020-07-11 05:25:46 --> Severity: Notice --> Undefined index: NMSATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 12
ERROR - 2020-07-11 05:25:46 --> Severity: Notice --> Undefined index: NAMA_LOKASI_ASAL D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 13
ERROR - 2020-07-11 05:25:46 --> Severity: Notice --> Undefined index: NAMA_LOKASI_TUJUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 14
ERROR - 2020-07-11 05:25:46 --> Severity: Notice --> Undefined index: JMLMTBHP D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 15
ERROR - 2020-07-11 05:25:46 --> Severity: Notice --> Undefined index: TGL_MUTASI D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 8
ERROR - 2020-07-11 05:25:46 --> Severity: Notice --> Undefined index: KDMTBHP D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 9
ERROR - 2020-07-11 05:25:46 --> Severity: Notice --> Undefined index: NMSATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 12
ERROR - 2020-07-11 05:25:46 --> Severity: Notice --> Undefined index: NAMA_LOKASI_ASAL D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 13
ERROR - 2020-07-11 05:25:46 --> Severity: Notice --> Undefined index: NAMA_LOKASI_TUJUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 14
ERROR - 2020-07-11 05:25:47 --> Severity: Notice --> Undefined index: JMLMTBHP D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 15
ERROR - 2020-07-11 05:25:47 --> Severity: Notice --> Undefined index: TGL_MUTASI D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 8
ERROR - 2020-07-11 05:25:47 --> Severity: Notice --> Undefined index: KDMTBHP D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 9
ERROR - 2020-07-11 05:25:47 --> Severity: Notice --> Undefined index: NMSATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 12
ERROR - 2020-07-11 05:25:47 --> Severity: Notice --> Undefined index: NAMA_LOKASI_ASAL D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 13
ERROR - 2020-07-11 05:25:47 --> Severity: Notice --> Undefined index: NAMA_LOKASI_TUJUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 14
ERROR - 2020-07-11 05:25:47 --> Severity: Notice --> Undefined index: JMLMTBHP D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 15
ERROR - 2020-07-11 05:25:47 --> Severity: Notice --> Undefined index: TGL_MUTASI D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 8
ERROR - 2020-07-11 05:25:47 --> Severity: Notice --> Undefined index: KDMTBHP D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 9
ERROR - 2020-07-11 05:25:47 --> Severity: Notice --> Undefined index: NMSATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 12
ERROR - 2020-07-11 05:25:47 --> Severity: Notice --> Undefined index: NAMA_LOKASI_ASAL D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 13
ERROR - 2020-07-11 05:25:47 --> Severity: Notice --> Undefined index: NAMA_LOKASI_TUJUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 14
ERROR - 2020-07-11 05:25:47 --> Severity: Notice --> Undefined index: JMLMTBHP D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 15
ERROR - 2020-07-11 05:27:07 --> Severity: Notice --> Undefined index: TGL_MUTASI D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 8
ERROR - 2020-07-11 05:27:07 --> Severity: Notice --> Undefined index: KDMTBHP D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 9
ERROR - 2020-07-11 05:27:07 --> Severity: Notice --> Undefined index: NMSATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 12
ERROR - 2020-07-11 05:27:07 --> Severity: Notice --> Undefined index: NAMA_LOKASI_ASAL D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 13
ERROR - 2020-07-11 05:27:07 --> Severity: Notice --> Undefined index: NAMA_LOKASI_TUJUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 14
ERROR - 2020-07-11 05:27:07 --> Severity: Notice --> Undefined index: JMLMTBHP D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 15
ERROR - 2020-07-11 05:27:07 --> Severity: Notice --> Undefined index: TGL_MUTASI D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 8
ERROR - 2020-07-11 05:27:07 --> Severity: Notice --> Undefined index: KDMTBHP D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 9
ERROR - 2020-07-11 05:27:07 --> Severity: Notice --> Undefined index: NMSATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 12
ERROR - 2020-07-11 05:27:07 --> Severity: Notice --> Undefined index: NAMA_LOKASI_ASAL D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 13
ERROR - 2020-07-11 05:27:07 --> Severity: Notice --> Undefined index: NAMA_LOKASI_TUJUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 14
ERROR - 2020-07-11 05:27:07 --> Severity: Notice --> Undefined index: JMLMTBHP D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 15
ERROR - 2020-07-11 05:27:07 --> Severity: Notice --> Undefined index: TGL_MUTASI D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 8
ERROR - 2020-07-11 05:27:07 --> Severity: Notice --> Undefined index: KDMTBHP D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 9
ERROR - 2020-07-11 05:27:07 --> Severity: Notice --> Undefined index: NMSATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 12
ERROR - 2020-07-11 05:27:07 --> Severity: Notice --> Undefined index: NAMA_LOKASI_ASAL D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 13
ERROR - 2020-07-11 05:27:07 --> Severity: Notice --> Undefined index: NAMA_LOKASI_TUJUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 14
ERROR - 2020-07-11 05:27:07 --> Severity: Notice --> Undefined index: JMLMTBHP D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 15
ERROR - 2020-07-11 05:27:07 --> Severity: Notice --> Undefined index: TGL_MUTASI D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 8
ERROR - 2020-07-11 05:27:07 --> Severity: Notice --> Undefined index: KDMTBHP D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 9
ERROR - 2020-07-11 05:27:07 --> Severity: Notice --> Undefined index: NMSATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 12
ERROR - 2020-07-11 05:27:07 --> Severity: Notice --> Undefined index: NAMA_LOKASI_ASAL D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 13
ERROR - 2020-07-11 05:27:07 --> Severity: Notice --> Undefined index: NAMA_LOKASI_TUJUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 14
ERROR - 2020-07-11 05:27:07 --> Severity: Notice --> Undefined index: JMLMTBHP D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 15
ERROR - 2020-07-11 05:27:41 --> Severity: Notice --> Undefined index: TGL_MUTASI D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 8
ERROR - 2020-07-11 05:27:41 --> Severity: Notice --> Undefined index: KDMTBHP D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 9
ERROR - 2020-07-11 05:27:41 --> Severity: Notice --> Undefined index: NMSATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 12
ERROR - 2020-07-11 05:27:41 --> Severity: Notice --> Undefined index: NAMA_LOKASI_ASAL D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 13
ERROR - 2020-07-11 05:27:41 --> Severity: Notice --> Undefined index: NAMA_LOKASI_TUJUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 14
ERROR - 2020-07-11 05:27:41 --> Severity: Notice --> Undefined index: JMLMTBHP D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 15
ERROR - 2020-07-11 05:27:41 --> Severity: Notice --> Undefined index: TGL_MUTASI D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 8
ERROR - 2020-07-11 05:27:41 --> Severity: Notice --> Undefined index: KDMTBHP D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 9
ERROR - 2020-07-11 05:27:41 --> Severity: Notice --> Undefined index: NMSATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 12
ERROR - 2020-07-11 05:27:41 --> Severity: Notice --> Undefined index: NAMA_LOKASI_ASAL D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 13
ERROR - 2020-07-11 05:27:41 --> Severity: Notice --> Undefined index: NAMA_LOKASI_TUJUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 14
ERROR - 2020-07-11 05:27:41 --> Severity: Notice --> Undefined index: JMLMTBHP D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 15
ERROR - 2020-07-11 05:27:41 --> Severity: Notice --> Undefined index: TGL_MUTASI D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 8
ERROR - 2020-07-11 05:27:41 --> Severity: Notice --> Undefined index: KDMTBHP D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 9
ERROR - 2020-07-11 05:27:41 --> Severity: Notice --> Undefined index: NMSATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 12
ERROR - 2020-07-11 05:27:41 --> Severity: Notice --> Undefined index: NAMA_LOKASI_ASAL D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 13
ERROR - 2020-07-11 05:27:41 --> Severity: Notice --> Undefined index: NAMA_LOKASI_TUJUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 14
ERROR - 2020-07-11 05:27:41 --> Severity: Notice --> Undefined index: JMLMTBHP D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 15
ERROR - 2020-07-11 05:27:41 --> Severity: Notice --> Undefined index: TGL_MUTASI D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 8
ERROR - 2020-07-11 05:27:41 --> Severity: Notice --> Undefined index: KDMTBHP D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 9
ERROR - 2020-07-11 05:27:41 --> Severity: Notice --> Undefined index: NMSATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 12
ERROR - 2020-07-11 05:27:41 --> Severity: Notice --> Undefined index: NAMA_LOKASI_ASAL D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 13
ERROR - 2020-07-11 05:27:41 --> Severity: Notice --> Undefined index: NAMA_LOKASI_TUJUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 14
ERROR - 2020-07-11 05:27:41 --> Severity: Notice --> Undefined index: JMLMTBHP D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 15
ERROR - 2020-07-11 05:27:43 --> Severity: Notice --> Undefined index: TGL_MUTASI D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 8
ERROR - 2020-07-11 05:27:43 --> Severity: Notice --> Undefined index: KDMTBHP D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 9
ERROR - 2020-07-11 05:27:43 --> Severity: Notice --> Undefined index: NMSATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 12
ERROR - 2020-07-11 05:27:43 --> Severity: Notice --> Undefined index: NAMA_LOKASI_ASAL D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 13
ERROR - 2020-07-11 05:27:43 --> Severity: Notice --> Undefined index: NAMA_LOKASI_TUJUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 14
ERROR - 2020-07-11 05:27:43 --> Severity: Notice --> Undefined index: JMLMTBHP D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 15
ERROR - 2020-07-11 05:27:43 --> Severity: Notice --> Undefined index: TGL_MUTASI D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 8
ERROR - 2020-07-11 05:27:43 --> Severity: Notice --> Undefined index: KDMTBHP D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 9
ERROR - 2020-07-11 05:27:43 --> Severity: Notice --> Undefined index: NMSATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 12
ERROR - 2020-07-11 05:27:43 --> Severity: Notice --> Undefined index: NAMA_LOKASI_ASAL D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 13
ERROR - 2020-07-11 05:27:43 --> Severity: Notice --> Undefined index: NAMA_LOKASI_TUJUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 14
ERROR - 2020-07-11 05:27:43 --> Severity: Notice --> Undefined index: JMLMTBHP D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 15
ERROR - 2020-07-11 05:27:43 --> Severity: Notice --> Undefined index: TGL_MUTASI D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 8
ERROR - 2020-07-11 05:27:43 --> Severity: Notice --> Undefined index: KDMTBHP D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 9
ERROR - 2020-07-11 05:27:43 --> Severity: Notice --> Undefined index: NMSATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 12
ERROR - 2020-07-11 05:27:43 --> Severity: Notice --> Undefined index: NAMA_LOKASI_ASAL D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 13
ERROR - 2020-07-11 05:27:43 --> Severity: Notice --> Undefined index: NAMA_LOKASI_TUJUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 14
ERROR - 2020-07-11 05:27:43 --> Severity: Notice --> Undefined index: JMLMTBHP D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 15
ERROR - 2020-07-11 05:27:43 --> Severity: Notice --> Undefined index: TGL_MUTASI D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 8
ERROR - 2020-07-11 05:27:43 --> Severity: Notice --> Undefined index: KDMTBHP D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 9
ERROR - 2020-07-11 05:27:43 --> Severity: Notice --> Undefined index: NMSATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 12
ERROR - 2020-07-11 05:27:43 --> Severity: Notice --> Undefined index: NAMA_LOKASI_ASAL D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 13
ERROR - 2020-07-11 05:27:43 --> Severity: Notice --> Undefined index: NAMA_LOKASI_TUJUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 14
ERROR - 2020-07-11 05:27:43 --> Severity: Notice --> Undefined index: JMLMTBHP D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 15
ERROR - 2020-07-11 05:28:21 --> Severity: Notice --> Undefined index: TGL_MUTASI D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 8
ERROR - 2020-07-11 05:28:21 --> Severity: Notice --> Undefined index: KDMTBHP D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 9
ERROR - 2020-07-11 05:28:21 --> Severity: Notice --> Undefined index: NMSATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 12
ERROR - 2020-07-11 05:28:21 --> Severity: Notice --> Undefined index: NAMA_LOKASI_ASAL D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 13
ERROR - 2020-07-11 05:28:21 --> Severity: Notice --> Undefined index: NAMA_LOKASI_TUJUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 14
ERROR - 2020-07-11 05:28:21 --> Severity: Notice --> Undefined index: JMLMTBHP D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 15
ERROR - 2020-07-11 05:28:21 --> Severity: Notice --> Undefined index: TGL_MUTASI D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 8
ERROR - 2020-07-11 05:28:21 --> Severity: Notice --> Undefined index: KDMTBHP D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 9
ERROR - 2020-07-11 05:28:21 --> Severity: Notice --> Undefined index: NMSATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 12
ERROR - 2020-07-11 05:28:21 --> Severity: Notice --> Undefined index: NAMA_LOKASI_ASAL D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 13
ERROR - 2020-07-11 05:28:21 --> Severity: Notice --> Undefined index: NAMA_LOKASI_TUJUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 14
ERROR - 2020-07-11 05:28:21 --> Severity: Notice --> Undefined index: JMLMTBHP D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 15
ERROR - 2020-07-11 05:28:21 --> Severity: Notice --> Undefined index: TGL_MUTASI D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 8
ERROR - 2020-07-11 05:28:21 --> Severity: Notice --> Undefined index: KDMTBHP D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 9
ERROR - 2020-07-11 05:28:21 --> Severity: Notice --> Undefined index: NMSATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 12
ERROR - 2020-07-11 05:28:21 --> Severity: Notice --> Undefined index: NAMA_LOKASI_ASAL D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 13
ERROR - 2020-07-11 05:28:21 --> Severity: Notice --> Undefined index: NAMA_LOKASI_TUJUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 14
ERROR - 2020-07-11 05:28:21 --> Severity: Notice --> Undefined index: JMLMTBHP D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 15
ERROR - 2020-07-11 05:28:21 --> Severity: Notice --> Undefined index: TGL_MUTASI D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 8
ERROR - 2020-07-11 05:28:21 --> Severity: Notice --> Undefined index: KDMTBHP D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 9
ERROR - 2020-07-11 05:28:21 --> Severity: Notice --> Undefined index: NMSATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 12
ERROR - 2020-07-11 05:28:21 --> Severity: Notice --> Undefined index: NAMA_LOKASI_ASAL D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 13
ERROR - 2020-07-11 05:28:21 --> Severity: Notice --> Undefined index: NAMA_LOKASI_TUJUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 14
ERROR - 2020-07-11 05:28:21 --> Severity: Notice --> Undefined index: JMLMTBHP D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 15
ERROR - 2020-07-11 05:30:44 --> Severity: Notice --> Undefined index: TGL_MUTASI D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 8
ERROR - 2020-07-11 05:30:44 --> Severity: Notice --> Undefined index: KDMTBHP D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 9
ERROR - 2020-07-11 05:30:44 --> Severity: Notice --> Undefined index: NMSATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 12
ERROR - 2020-07-11 05:30:44 --> Severity: Notice --> Undefined index: NAMA_LOKASI_ASAL D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 13
ERROR - 2020-07-11 05:30:44 --> Severity: Notice --> Undefined index: NAMA_LOKASI_TUJUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 14
ERROR - 2020-07-11 05:30:44 --> Severity: Notice --> Undefined index: JMLMTBHP D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 15
ERROR - 2020-07-11 05:30:45 --> Severity: Notice --> Undefined index: TGL_MUTASI D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 8
ERROR - 2020-07-11 05:30:45 --> Severity: Notice --> Undefined index: KDMTBHP D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 9
ERROR - 2020-07-11 05:30:45 --> Severity: Notice --> Undefined index: NMSATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 12
ERROR - 2020-07-11 05:30:45 --> Severity: Notice --> Undefined index: NAMA_LOKASI_ASAL D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 13
ERROR - 2020-07-11 05:30:45 --> Severity: Notice --> Undefined index: NAMA_LOKASI_TUJUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 14
ERROR - 2020-07-11 05:30:45 --> Severity: Notice --> Undefined index: JMLMTBHP D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 15
ERROR - 2020-07-11 05:30:45 --> Severity: Notice --> Undefined index: TGL_MUTASI D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 8
ERROR - 2020-07-11 05:30:45 --> Severity: Notice --> Undefined index: KDMTBHP D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 9
ERROR - 2020-07-11 05:30:45 --> Severity: Notice --> Undefined index: NMSATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 12
ERROR - 2020-07-11 05:30:45 --> Severity: Notice --> Undefined index: NAMA_LOKASI_ASAL D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 13
ERROR - 2020-07-11 05:30:45 --> Severity: Notice --> Undefined index: NAMA_LOKASI_TUJUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 14
ERROR - 2020-07-11 05:30:45 --> Severity: Notice --> Undefined index: JMLMTBHP D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 15
ERROR - 2020-07-11 05:30:45 --> Severity: Notice --> Undefined index: TGL_MUTASI D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 8
ERROR - 2020-07-11 05:30:45 --> Severity: Notice --> Undefined index: KDMTBHP D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 9
ERROR - 2020-07-11 05:30:45 --> Severity: Notice --> Undefined index: NMSATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 12
ERROR - 2020-07-11 05:30:45 --> Severity: Notice --> Undefined index: NAMA_LOKASI_ASAL D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 13
ERROR - 2020-07-11 05:30:45 --> Severity: Notice --> Undefined index: NAMA_LOKASI_TUJUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 14
ERROR - 2020-07-11 05:30:45 --> Severity: Notice --> Undefined index: JMLMTBHP D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_mutasi\get_preview_1b.php 15
ERROR - 2020-07-11 05:32:20 --> Severity: Notice --> Undefined index: TGL_MUTASI D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 8
ERROR - 2020-07-11 05:32:20 --> Severity: Notice --> Undefined index: KDMTBHP D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 9
ERROR - 2020-07-11 05:32:20 --> Severity: Notice --> Undefined index: NMSATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 12
ERROR - 2020-07-11 05:32:20 --> Severity: Notice --> Undefined index: NAMA_LOKASI_ASAL D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 13
ERROR - 2020-07-11 05:32:20 --> Severity: Notice --> Undefined index: NAMA_LOKASI_TUJUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 14
ERROR - 2020-07-11 05:32:20 --> Severity: Notice --> Undefined index: JMLMTBHP D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 15
ERROR - 2020-07-11 05:32:20 --> Severity: Notice --> Undefined index: TGL_MUTASI D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 8
ERROR - 2020-07-11 05:32:20 --> Severity: Notice --> Undefined index: KDMTBHP D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 9
ERROR - 2020-07-11 05:32:20 --> Severity: Notice --> Undefined index: NMSATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 12
ERROR - 2020-07-11 05:32:20 --> Severity: Notice --> Undefined index: NAMA_LOKASI_ASAL D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 13
ERROR - 2020-07-11 05:32:20 --> Severity: Notice --> Undefined index: NAMA_LOKASI_TUJUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 14
ERROR - 2020-07-11 05:32:20 --> Severity: Notice --> Undefined index: JMLMTBHP D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 15
ERROR - 2020-07-11 05:32:20 --> Severity: Notice --> Undefined index: TGL_MUTASI D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 8
ERROR - 2020-07-11 05:32:20 --> Severity: Notice --> Undefined index: KDMTBHP D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 9
ERROR - 2020-07-11 05:32:20 --> Severity: Notice --> Undefined index: NMSATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 12
ERROR - 2020-07-11 05:32:20 --> Severity: Notice --> Undefined index: NAMA_LOKASI_ASAL D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 13
ERROR - 2020-07-11 05:32:20 --> Severity: Notice --> Undefined index: NAMA_LOKASI_TUJUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 14
ERROR - 2020-07-11 05:32:20 --> Severity: Notice --> Undefined index: JMLMTBHP D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 15
ERROR - 2020-07-11 05:32:20 --> Severity: Notice --> Undefined index: TGL_MUTASI D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 8
ERROR - 2020-07-11 05:32:21 --> Severity: Notice --> Undefined index: KDMTBHP D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 9
ERROR - 2020-07-11 05:32:21 --> Severity: Notice --> Undefined index: NMSATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 12
ERROR - 2020-07-11 05:32:21 --> Severity: Notice --> Undefined index: NAMA_LOKASI_ASAL D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 13
ERROR - 2020-07-11 05:32:21 --> Severity: Notice --> Undefined index: NAMA_LOKASI_TUJUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 14
ERROR - 2020-07-11 05:32:21 --> Severity: Notice --> Undefined index: JMLMTBHP D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 15
ERROR - 2020-07-11 05:37:19 --> Severity: Notice --> Undefined index: QTY D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 21
ERROR - 2020-07-11 05:37:19 --> Severity: Notice --> Undefined index: SATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 22
ERROR - 2020-07-11 05:37:19 --> Severity: Notice --> Undefined index: TGL_MUTASI D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 29
ERROR - 2020-07-11 05:37:19 --> Severity: Notice --> Undefined index: KDMTBHP D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 30
ERROR - 2020-07-11 05:37:19 --> Severity: Notice --> Undefined index: NMSATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 33
ERROR - 2020-07-11 05:37:19 --> Severity: Notice --> Undefined index: NAMA_LOKASI_ASAL D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 34
ERROR - 2020-07-11 05:37:19 --> Severity: Notice --> Undefined index: NAMA_LOKASI_TUJUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 35
ERROR - 2020-07-11 05:37:19 --> Severity: Notice --> Undefined index: JMLMTBHP D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 36
ERROR - 2020-07-11 05:37:19 --> Severity: Notice --> Undefined index: QTY D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 21
ERROR - 2020-07-11 05:37:20 --> Severity: Notice --> Undefined index: SATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 22
ERROR - 2020-07-11 05:37:20 --> Severity: Notice --> Undefined index: TGL_MUTASI D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 29
ERROR - 2020-07-11 05:37:20 --> Severity: Notice --> Undefined index: KDMTBHP D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 30
ERROR - 2020-07-11 05:37:20 --> Severity: Notice --> Undefined index: NMSATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 33
ERROR - 2020-07-11 05:37:20 --> Severity: Notice --> Undefined index: NAMA_LOKASI_ASAL D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 34
ERROR - 2020-07-11 05:37:20 --> Severity: Notice --> Undefined index: NAMA_LOKASI_TUJUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 35
ERROR - 2020-07-11 05:37:20 --> Severity: Notice --> Undefined index: JMLMTBHP D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 36
ERROR - 2020-07-11 05:37:20 --> Severity: Notice --> Undefined index: QTY D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 21
ERROR - 2020-07-11 05:37:20 --> Severity: Notice --> Undefined index: SATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 22
ERROR - 2020-07-11 05:37:20 --> Severity: Notice --> Undefined index: TGL_MUTASI D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 29
ERROR - 2020-07-11 05:37:20 --> Severity: Notice --> Undefined index: KDMTBHP D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 30
ERROR - 2020-07-11 05:37:20 --> Severity: Notice --> Undefined index: NMSATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 33
ERROR - 2020-07-11 05:37:20 --> Severity: Notice --> Undefined index: NAMA_LOKASI_ASAL D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 34
ERROR - 2020-07-11 05:37:20 --> Severity: Notice --> Undefined index: NAMA_LOKASI_TUJUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 35
ERROR - 2020-07-11 05:37:20 --> Severity: Notice --> Undefined index: JMLMTBHP D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 36
ERROR - 2020-07-11 05:37:20 --> Severity: Notice --> Undefined index: QTY D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 21
ERROR - 2020-07-11 05:37:20 --> Severity: Notice --> Undefined index: SATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 22
ERROR - 2020-07-11 05:37:20 --> Severity: Notice --> Undefined index: TGL_MUTASI D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 29
ERROR - 2020-07-11 05:37:20 --> Severity: Notice --> Undefined index: KDMTBHP D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 30
ERROR - 2020-07-11 05:37:20 --> Severity: Notice --> Undefined index: NMSATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 33
ERROR - 2020-07-11 05:37:20 --> Severity: Notice --> Undefined index: NAMA_LOKASI_ASAL D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 34
ERROR - 2020-07-11 05:37:20 --> Severity: Notice --> Undefined index: NAMA_LOKASI_TUJUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 35
ERROR - 2020-07-11 05:37:20 --> Severity: Notice --> Undefined index: JMLMTBHP D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 36
ERROR - 2020-07-11 05:38:05 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'JOIN tbl04_barang c ON b.KDBRG=c.KDBRG' at line 3 - Invalid query: SELECT * FROM `tbl04_barang_keluar_khusus` a 
        JOIN `tbl04_barang_keluar_khusus_detail` b ON a.`KDBKK`=b.`KDBKK` ORDER BY a.KDBKK, b.NMBRG
        JOIN tbl04_barang c ON b.KDBRG=c.KDBRG;
ERROR - 2020-07-11 05:38:12 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'JOIN tbl04_barang c ON b.KDBRG=c.KDBRG' at line 3 - Invalid query: SELECT * FROM `tbl04_barang_keluar_khusus` a 
        JOIN `tbl04_barang_keluar_khusus_detail` b ON a.`KDBKK`=b.`KDBKK` ORDER BY a.KDBKK, b.NMBRG
        JOIN tbl04_barang c ON b.KDBRG=c.KDBRG;
ERROR - 2020-07-11 05:39:17 --> Severity: Notice --> Undefined index: QTY D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 21
ERROR - 2020-07-11 05:39:17 --> Severity: Notice --> Undefined index: SATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 22
ERROR - 2020-07-11 05:39:17 --> Severity: Notice --> Undefined index: TGL_MUTASI D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 29
ERROR - 2020-07-11 05:39:17 --> Severity: Notice --> Undefined index: KDMTBHP D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 30
ERROR - 2020-07-11 05:39:17 --> Severity: Notice --> Undefined index: NAMA_LOKASI_ASAL D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 34
ERROR - 2020-07-11 05:39:17 --> Severity: Notice --> Undefined index: NAMA_LOKASI_TUJUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 35
ERROR - 2020-07-11 05:39:17 --> Severity: Notice --> Undefined index: JMLMTBHP D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 36
ERROR - 2020-07-11 05:39:17 --> Severity: Notice --> Undefined index: QTY D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 21
ERROR - 2020-07-11 05:39:18 --> Severity: Notice --> Undefined index: SATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 22
ERROR - 2020-07-11 05:39:18 --> Severity: Notice --> Undefined index: TGL_MUTASI D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 29
ERROR - 2020-07-11 05:39:18 --> Severity: Notice --> Undefined index: KDMTBHP D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 30
ERROR - 2020-07-11 05:39:18 --> Severity: Notice --> Undefined index: NAMA_LOKASI_ASAL D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 34
ERROR - 2020-07-11 05:39:18 --> Severity: Notice --> Undefined index: NAMA_LOKASI_TUJUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 35
ERROR - 2020-07-11 05:39:18 --> Severity: Notice --> Undefined index: JMLMTBHP D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 36
ERROR - 2020-07-11 05:39:18 --> Severity: Notice --> Undefined index: QTY D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 21
ERROR - 2020-07-11 05:39:18 --> Severity: Notice --> Undefined index: SATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 22
ERROR - 2020-07-11 05:39:18 --> Severity: Notice --> Undefined index: TGL_MUTASI D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 29
ERROR - 2020-07-11 05:39:18 --> Severity: Notice --> Undefined index: KDMTBHP D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 30
ERROR - 2020-07-11 05:39:18 --> Severity: Notice --> Undefined index: NAMA_LOKASI_ASAL D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 34
ERROR - 2020-07-11 05:39:18 --> Severity: Notice --> Undefined index: NAMA_LOKASI_TUJUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 35
ERROR - 2020-07-11 05:39:18 --> Severity: Notice --> Undefined index: JMLMTBHP D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 36
ERROR - 2020-07-11 05:39:18 --> Severity: Notice --> Undefined index: QTY D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 21
ERROR - 2020-07-11 05:39:18 --> Severity: Notice --> Undefined index: SATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 22
ERROR - 2020-07-11 05:39:18 --> Severity: Notice --> Undefined index: TGL_MUTASI D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 29
ERROR - 2020-07-11 05:39:18 --> Severity: Notice --> Undefined index: KDMTBHP D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 30
ERROR - 2020-07-11 05:39:18 --> Severity: Notice --> Undefined index: NAMA_LOKASI_ASAL D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 34
ERROR - 2020-07-11 05:39:18 --> Severity: Notice --> Undefined index: NAMA_LOKASI_TUJUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 35
ERROR - 2020-07-11 05:39:18 --> Severity: Notice --> Undefined index: JMLMTBHP D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 36
ERROR - 2020-07-11 05:40:36 --> Severity: Notice --> Undefined index: QTY D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 21
ERROR - 2020-07-11 05:40:36 --> Severity: Notice --> Undefined index: SATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 22
ERROR - 2020-07-11 05:40:36 --> Severity: Notice --> Undefined index: TGL_MUTASI D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 29
ERROR - 2020-07-11 05:40:36 --> Severity: Notice --> Undefined index: KDMTBHP D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 30
ERROR - 2020-07-11 05:40:36 --> Severity: Notice --> Undefined index: NAMA_LOKASI_ASAL D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 34
ERROR - 2020-07-11 05:40:36 --> Severity: Notice --> Undefined index: NAMA_LOKASI_TUJUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 35
ERROR - 2020-07-11 05:40:36 --> Severity: Notice --> Undefined index: JMLMTBHP D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 36
ERROR - 2020-07-11 05:42:14 --> Severity: Notice --> Undefined index: TGL_MUTASI D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 29
ERROR - 2020-07-11 05:42:14 --> Severity: Notice --> Undefined index: KDMTBHP D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 30
ERROR - 2020-07-11 05:42:14 --> Severity: Notice --> Undefined index: NAMA_LOKASI_ASAL D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 34
ERROR - 2020-07-11 05:42:14 --> Severity: Notice --> Undefined index: NAMA_LOKASI_TUJUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 35
ERROR - 2020-07-11 05:42:14 --> Severity: Notice --> Undefined index: JMLMTBHP D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 36
ERROR - 2020-07-11 05:44:18 --> Severity: Notice --> Undefined index: TGL_MUTASI D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 62
ERROR - 2020-07-11 05:44:18 --> Severity: Notice --> Undefined index: KDMTBHP D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 63
ERROR - 2020-07-11 05:44:18 --> Severity: Notice --> Undefined index: NAMA_LOKASI_ASAL D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 67
ERROR - 2020-07-11 05:44:18 --> Severity: Notice --> Undefined index: NAMA_LOKASI_TUJUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 68
ERROR - 2020-07-11 05:44:18 --> Severity: Notice --> Undefined index: JMLMTBHP D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_1b.php 69
ERROR - 2020-07-11 06:11:50 --> Query error: Table 'db_rs_open_dev.tbl04_barang_keluar_khusus_retur1' doesn't exist - Invalid query: SELECT * FROM `tbl04_barang_keluar_khusus_retur1` a 
        JOIN `tbl04_barang_keluar_khusus_retur_detail` b ON a.`KDBKK_RET`=b.`KDBKK_RET`
        WHERE DATE_FORMAT(DTBKK_RET,'%d-%m-%Y') BETWEEN '01/06/2020' AND '11/07/2020'
ERROR - 2020-07-11 06:12:39 --> Query error: Table 'db_rs_open_dev.tbl04_barang_keluar_khusus_retur1' doesn't exist - Invalid query: SELECT * FROM `tbl04_barang_keluar_khusus_retur1` a 
        JOIN `tbl04_barang_keluar_khusus_retur_detail` b ON a.`KDBKK_RET`=b.`KDBKK_RET`
        WHERE DATE_FORMAT(DTBKK_RET,'%Y-%m-%d') BETWEEN '2020-06-01' AND '2020-07-11'
ERROR - 2020-07-11 06:15:16 --> Severity: Notice --> Undefined index: DTMT_RET D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 8
ERROR - 2020-07-11 06:15:16 --> Severity: Notice --> Undefined index: KDMT_RET D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 9
ERROR - 2020-07-11 06:15:16 --> Severity: Notice --> Undefined index: NMSATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 12
ERROR - 2020-07-11 06:15:16 --> Severity: Notice --> Undefined index: LOKASI_TUJUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 13
ERROR - 2020-07-11 06:15:16 --> Severity: Notice --> Trying to get property 'NMLOKASI' of non-object D:\xampp\htdocs\simrs_open_source\application\farmasi\models\m_laporan.php 7
ERROR - 2020-07-11 06:15:16 --> Severity: Notice --> Undefined index: LOKASI_ASAL D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 14
ERROR - 2020-07-11 06:15:16 --> Severity: Notice --> Trying to get property 'NMLOKASI' of non-object D:\xampp\htdocs\simrs_open_source\application\farmasi\models\m_laporan.php 7
ERROR - 2020-07-11 06:15:16 --> Severity: Notice --> Undefined index: DTMT_RET D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 8
ERROR - 2020-07-11 06:15:16 --> Severity: Notice --> Undefined index: KDMT_RET D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 9
ERROR - 2020-07-11 06:15:16 --> Severity: Notice --> Undefined index: NMSATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 12
ERROR - 2020-07-11 06:15:16 --> Severity: Notice --> Undefined index: LOKASI_TUJUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 13
ERROR - 2020-07-11 06:15:16 --> Severity: Notice --> Trying to get property 'NMLOKASI' of non-object D:\xampp\htdocs\simrs_open_source\application\farmasi\models\m_laporan.php 7
ERROR - 2020-07-11 06:15:16 --> Severity: Notice --> Undefined index: LOKASI_ASAL D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 14
ERROR - 2020-07-11 06:15:16 --> Severity: Notice --> Trying to get property 'NMLOKASI' of non-object D:\xampp\htdocs\simrs_open_source\application\farmasi\models\m_laporan.php 7
ERROR - 2020-07-11 06:15:16 --> Severity: Notice --> Undefined index: DTMT_RET D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 8
ERROR - 2020-07-11 06:15:16 --> Severity: Notice --> Undefined index: KDMT_RET D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 9
ERROR - 2020-07-11 06:15:16 --> Severity: Notice --> Undefined index: NMSATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 12
ERROR - 2020-07-11 06:15:16 --> Severity: Notice --> Undefined index: LOKASI_TUJUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 13
ERROR - 2020-07-11 06:15:16 --> Severity: Notice --> Trying to get property 'NMLOKASI' of non-object D:\xampp\htdocs\simrs_open_source\application\farmasi\models\m_laporan.php 7
ERROR - 2020-07-11 06:15:16 --> Severity: Notice --> Undefined index: LOKASI_ASAL D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 14
ERROR - 2020-07-11 06:15:16 --> Severity: Notice --> Trying to get property 'NMLOKASI' of non-object D:\xampp\htdocs\simrs_open_source\application\farmasi\models\m_laporan.php 7
ERROR - 2020-07-11 06:15:16 --> Severity: Notice --> Undefined index: DTMT_RET D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 8
ERROR - 2020-07-11 06:15:16 --> Severity: Notice --> Undefined index: KDMT_RET D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 9
ERROR - 2020-07-11 06:15:16 --> Severity: Notice --> Undefined index: NMSATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 12
ERROR - 2020-07-11 06:15:16 --> Severity: Notice --> Undefined index: LOKASI_TUJUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 13
ERROR - 2020-07-11 06:15:16 --> Severity: Notice --> Trying to get property 'NMLOKASI' of non-object D:\xampp\htdocs\simrs_open_source\application\farmasi\models\m_laporan.php 7
ERROR - 2020-07-11 06:15:16 --> Severity: Notice --> Undefined index: LOKASI_ASAL D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 14
ERROR - 2020-07-11 06:15:16 --> Severity: Notice --> Trying to get property 'NMLOKASI' of non-object D:\xampp\htdocs\simrs_open_source\application\farmasi\models\m_laporan.php 7
ERROR - 2020-07-11 06:15:16 --> Severity: Notice --> Undefined index: DTMT_RET D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 8
ERROR - 2020-07-11 06:15:16 --> Severity: Notice --> Undefined index: KDMT_RET D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 9
ERROR - 2020-07-11 06:15:16 --> Severity: Notice --> Undefined index: NMSATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 12
ERROR - 2020-07-11 06:15:16 --> Severity: Notice --> Undefined index: LOKASI_TUJUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 13
ERROR - 2020-07-11 06:15:16 --> Severity: Notice --> Trying to get property 'NMLOKASI' of non-object D:\xampp\htdocs\simrs_open_source\application\farmasi\models\m_laporan.php 7
ERROR - 2020-07-11 06:15:16 --> Severity: Notice --> Undefined index: LOKASI_ASAL D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 14
ERROR - 2020-07-11 06:15:16 --> Severity: Notice --> Trying to get property 'NMLOKASI' of non-object D:\xampp\htdocs\simrs_open_source\application\farmasi\models\m_laporan.php 7
ERROR - 2020-07-11 06:16:33 --> Severity: Notice --> Undefined index: DTMT_RET D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 9
ERROR - 2020-07-11 06:16:33 --> Severity: Notice --> Undefined index: KDMT_RET D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 10
ERROR - 2020-07-11 06:16:33 --> Severity: Notice --> Undefined index: NMSATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 13
ERROR - 2020-07-11 06:16:33 --> Severity: Notice --> Undefined index: LOKASI_TUJUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 14
ERROR - 2020-07-11 06:16:33 --> Severity: Notice --> Trying to get property 'NMLOKASI' of non-object D:\xampp\htdocs\simrs_open_source\application\farmasi\models\m_laporan.php 7
ERROR - 2020-07-11 06:16:33 --> Severity: Notice --> Undefined index: LOKASI_ASAL D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 15
ERROR - 2020-07-11 06:16:33 --> Severity: Notice --> Trying to get property 'NMLOKASI' of non-object D:\xampp\htdocs\simrs_open_source\application\farmasi\models\m_laporan.php 7
ERROR - 2020-07-11 06:16:33 --> Severity: Notice --> Undefined index: DTMT_RET D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 9
ERROR - 2020-07-11 06:16:33 --> Severity: Notice --> Undefined index: KDMT_RET D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 10
ERROR - 2020-07-11 06:16:33 --> Severity: Notice --> Undefined index: NMSATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 13
ERROR - 2020-07-11 06:16:33 --> Severity: Notice --> Undefined index: LOKASI_TUJUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 14
ERROR - 2020-07-11 06:16:33 --> Severity: Notice --> Trying to get property 'NMLOKASI' of non-object D:\xampp\htdocs\simrs_open_source\application\farmasi\models\m_laporan.php 7
ERROR - 2020-07-11 06:16:33 --> Severity: Notice --> Undefined index: LOKASI_ASAL D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 15
ERROR - 2020-07-11 06:16:33 --> Severity: Notice --> Trying to get property 'NMLOKASI' of non-object D:\xampp\htdocs\simrs_open_source\application\farmasi\models\m_laporan.php 7
ERROR - 2020-07-11 06:16:33 --> Severity: Notice --> Undefined index: DTMT_RET D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 9
ERROR - 2020-07-11 06:16:33 --> Severity: Notice --> Undefined index: KDMT_RET D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 10
ERROR - 2020-07-11 06:16:33 --> Severity: Notice --> Undefined index: NMSATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 13
ERROR - 2020-07-11 06:16:33 --> Severity: Notice --> Undefined index: LOKASI_TUJUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 14
ERROR - 2020-07-11 06:16:33 --> Severity: Notice --> Trying to get property 'NMLOKASI' of non-object D:\xampp\htdocs\simrs_open_source\application\farmasi\models\m_laporan.php 7
ERROR - 2020-07-11 06:16:33 --> Severity: Notice --> Undefined index: LOKASI_ASAL D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 15
ERROR - 2020-07-11 06:16:33 --> Severity: Notice --> Trying to get property 'NMLOKASI' of non-object D:\xampp\htdocs\simrs_open_source\application\farmasi\models\m_laporan.php 7
ERROR - 2020-07-11 06:16:33 --> Severity: Notice --> Undefined index: DTMT_RET D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 9
ERROR - 2020-07-11 06:16:33 --> Severity: Notice --> Undefined index: KDMT_RET D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 10
ERROR - 2020-07-11 06:16:33 --> Severity: Notice --> Undefined index: NMSATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 13
ERROR - 2020-07-11 06:16:33 --> Severity: Notice --> Undefined index: LOKASI_TUJUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 14
ERROR - 2020-07-11 06:16:33 --> Severity: Notice --> Trying to get property 'NMLOKASI' of non-object D:\xampp\htdocs\simrs_open_source\application\farmasi\models\m_laporan.php 7
ERROR - 2020-07-11 06:16:33 --> Severity: Notice --> Undefined index: LOKASI_ASAL D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 15
ERROR - 2020-07-11 06:16:33 --> Severity: Notice --> Trying to get property 'NMLOKASI' of non-object D:\xampp\htdocs\simrs_open_source\application\farmasi\models\m_laporan.php 7
ERROR - 2020-07-11 06:16:33 --> Severity: Notice --> Undefined index: DTMT_RET D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 9
ERROR - 2020-07-11 06:16:33 --> Severity: Notice --> Undefined index: KDMT_RET D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 10
ERROR - 2020-07-11 06:16:33 --> Severity: Notice --> Undefined index: NMSATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 13
ERROR - 2020-07-11 06:16:33 --> Severity: Notice --> Undefined index: LOKASI_TUJUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 14
ERROR - 2020-07-11 06:16:33 --> Severity: Notice --> Trying to get property 'NMLOKASI' of non-object D:\xampp\htdocs\simrs_open_source\application\farmasi\models\m_laporan.php 7
ERROR - 2020-07-11 06:16:33 --> Severity: Notice --> Undefined index: LOKASI_ASAL D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 15
ERROR - 2020-07-11 06:16:33 --> Severity: Notice --> Trying to get property 'NMLOKASI' of non-object D:\xampp\htdocs\simrs_open_source\application\farmasi\models\m_laporan.php 7
ERROR - 2020-07-11 06:18:07 --> Severity: Notice --> Undefined index: TGLTRANSAKSI D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 10
ERROR - 2020-07-11 06:18:07 --> Severity: Notice --> Undefined index: JMLBKK D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 21
ERROR - 2020-07-11 06:18:07 --> Severity: Notice --> Undefined index: NMSATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 22
ERROR - 2020-07-11 06:18:07 --> Severity: Notice --> Undefined index: DTMT_RET D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 63
ERROR - 2020-07-11 06:18:07 --> Severity: Notice --> Undefined index: KDMT_RET D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 64
ERROR - 2020-07-11 06:18:07 --> Severity: Notice --> Undefined index: NMSATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 67
ERROR - 2020-07-11 06:18:07 --> Severity: Notice --> Undefined index: LOKASI_TUJUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 68
ERROR - 2020-07-11 06:18:07 --> Severity: Notice --> Trying to get property 'NMLOKASI' of non-object D:\xampp\htdocs\simrs_open_source\application\farmasi\models\m_laporan.php 7
ERROR - 2020-07-11 06:18:07 --> Severity: Notice --> Undefined index: LOKASI_ASAL D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 69
ERROR - 2020-07-11 06:18:07 --> Severity: Notice --> Trying to get property 'NMLOKASI' of non-object D:\xampp\htdocs\simrs_open_source\application\farmasi\models\m_laporan.php 7
ERROR - 2020-07-11 06:18:07 --> Severity: Notice --> Undefined index: TGLTRANSAKSI D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 30
ERROR - 2020-07-11 06:18:07 --> Severity: Notice --> Undefined index: JMLBKK D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 41
ERROR - 2020-07-11 06:18:07 --> Severity: Notice --> Undefined index: NMSATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 42
ERROR - 2020-07-11 06:18:07 --> Severity: Notice --> Undefined index: DTMT_RET D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 63
ERROR - 2020-07-11 06:18:07 --> Severity: Notice --> Undefined index: KDMT_RET D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 64
ERROR - 2020-07-11 06:18:07 --> Severity: Notice --> Undefined index: NMSATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 67
ERROR - 2020-07-11 06:18:07 --> Severity: Notice --> Undefined index: LOKASI_TUJUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 68
ERROR - 2020-07-11 06:18:07 --> Severity: Notice --> Trying to get property 'NMLOKASI' of non-object D:\xampp\htdocs\simrs_open_source\application\farmasi\models\m_laporan.php 7
ERROR - 2020-07-11 06:18:07 --> Severity: Notice --> Undefined index: LOKASI_ASAL D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 69
ERROR - 2020-07-11 06:18:07 --> Severity: Notice --> Trying to get property 'NMLOKASI' of non-object D:\xampp\htdocs\simrs_open_source\application\farmasi\models\m_laporan.php 7
ERROR - 2020-07-11 06:18:07 --> Severity: Notice --> Undefined index: TGLTRANSAKSI D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 30
ERROR - 2020-07-11 06:18:07 --> Severity: Notice --> Undefined index: JMLBKK D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 41
ERROR - 2020-07-11 06:18:07 --> Severity: Notice --> Undefined index: NMSATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 42
ERROR - 2020-07-11 06:18:07 --> Severity: Notice --> Undefined index: DTMT_RET D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 63
ERROR - 2020-07-11 06:18:07 --> Severity: Notice --> Undefined index: KDMT_RET D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 64
ERROR - 2020-07-11 06:18:07 --> Severity: Notice --> Undefined index: NMSATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 67
ERROR - 2020-07-11 06:18:07 --> Severity: Notice --> Undefined index: LOKASI_TUJUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 68
ERROR - 2020-07-11 06:18:07 --> Severity: Notice --> Trying to get property 'NMLOKASI' of non-object D:\xampp\htdocs\simrs_open_source\application\farmasi\models\m_laporan.php 7
ERROR - 2020-07-11 06:18:07 --> Severity: Notice --> Undefined index: LOKASI_ASAL D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 69
ERROR - 2020-07-11 06:18:07 --> Severity: Notice --> Trying to get property 'NMLOKASI' of non-object D:\xampp\htdocs\simrs_open_source\application\farmasi\models\m_laporan.php 7
ERROR - 2020-07-11 06:18:07 --> Severity: Notice --> Undefined index: JMLBKK D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 52
ERROR - 2020-07-11 06:18:07 --> Severity: Notice --> Undefined index: NMSATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 53
ERROR - 2020-07-11 06:18:07 --> Severity: Notice --> Undefined index: DTMT_RET D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 63
ERROR - 2020-07-11 06:18:07 --> Severity: Notice --> Undefined index: KDMT_RET D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 64
ERROR - 2020-07-11 06:18:07 --> Severity: Notice --> Undefined index: NMSATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 67
ERROR - 2020-07-11 06:18:07 --> Severity: Notice --> Undefined index: LOKASI_TUJUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 68
ERROR - 2020-07-11 06:18:07 --> Severity: Notice --> Trying to get property 'NMLOKASI' of non-object D:\xampp\htdocs\simrs_open_source\application\farmasi\models\m_laporan.php 7
ERROR - 2020-07-11 06:18:07 --> Severity: Notice --> Undefined index: LOKASI_ASAL D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 69
ERROR - 2020-07-11 06:18:07 --> Severity: Notice --> Trying to get property 'NMLOKASI' of non-object D:\xampp\htdocs\simrs_open_source\application\farmasi\models\m_laporan.php 7
ERROR - 2020-07-11 06:18:07 --> Severity: Notice --> Undefined index: TGLTRANSAKSI D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 30
ERROR - 2020-07-11 06:18:07 --> Severity: Notice --> Undefined index: JMLBKK D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 41
ERROR - 2020-07-11 06:18:07 --> Severity: Notice --> Undefined index: NMSATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 42
ERROR - 2020-07-11 06:18:07 --> Severity: Notice --> Undefined index: DTMT_RET D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 63
ERROR - 2020-07-11 06:18:07 --> Severity: Notice --> Undefined index: KDMT_RET D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 64
ERROR - 2020-07-11 06:18:07 --> Severity: Notice --> Undefined index: NMSATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 67
ERROR - 2020-07-11 06:18:07 --> Severity: Notice --> Undefined index: LOKASI_TUJUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 68
ERROR - 2020-07-11 06:18:07 --> Severity: Notice --> Trying to get property 'NMLOKASI' of non-object D:\xampp\htdocs\simrs_open_source\application\farmasi\models\m_laporan.php 7
ERROR - 2020-07-11 06:18:07 --> Severity: Notice --> Undefined index: LOKASI_ASAL D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 69
ERROR - 2020-07-11 06:18:07 --> Severity: Notice --> Trying to get property 'NMLOKASI' of non-object D:\xampp\htdocs\simrs_open_source\application\farmasi\models\m_laporan.php 7
ERROR - 2020-07-11 06:18:35 --> Severity: Notice --> Undefined index: JMLBKK D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 21
ERROR - 2020-07-11 06:18:35 --> Severity: Notice --> Undefined index: NMSATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 22
ERROR - 2020-07-11 06:18:35 --> Severity: Notice --> Undefined index: DTMT_RET D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 63
ERROR - 2020-07-11 06:18:35 --> Severity: Notice --> Undefined index: KDMT_RET D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 64
ERROR - 2020-07-11 06:18:35 --> Severity: Notice --> Undefined index: NMSATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 67
ERROR - 2020-07-11 06:18:35 --> Severity: Notice --> Undefined index: LOKASI_TUJUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 68
ERROR - 2020-07-11 06:18:35 --> Severity: Notice --> Trying to get property 'NMLOKASI' of non-object D:\xampp\htdocs\simrs_open_source\application\farmasi\models\m_laporan.php 7
ERROR - 2020-07-11 06:18:35 --> Severity: Notice --> Undefined index: LOKASI_ASAL D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 69
ERROR - 2020-07-11 06:18:35 --> Severity: Notice --> Trying to get property 'NMLOKASI' of non-object D:\xampp\htdocs\simrs_open_source\application\farmasi\models\m_laporan.php 7
ERROR - 2020-07-11 06:18:35 --> Severity: Notice --> Undefined index: JMLBKK D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 41
ERROR - 2020-07-11 06:18:35 --> Severity: Notice --> Undefined index: NMSATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 42
ERROR - 2020-07-11 06:18:35 --> Severity: Notice --> Undefined index: DTMT_RET D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 63
ERROR - 2020-07-11 06:18:35 --> Severity: Notice --> Undefined index: KDMT_RET D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 64
ERROR - 2020-07-11 06:18:35 --> Severity: Notice --> Undefined index: NMSATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 67
ERROR - 2020-07-11 06:18:35 --> Severity: Notice --> Undefined index: LOKASI_TUJUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 68
ERROR - 2020-07-11 06:18:35 --> Severity: Notice --> Trying to get property 'NMLOKASI' of non-object D:\xampp\htdocs\simrs_open_source\application\farmasi\models\m_laporan.php 7
ERROR - 2020-07-11 06:18:35 --> Severity: Notice --> Undefined index: LOKASI_ASAL D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 69
ERROR - 2020-07-11 06:18:35 --> Severity: Notice --> Trying to get property 'NMLOKASI' of non-object D:\xampp\htdocs\simrs_open_source\application\farmasi\models\m_laporan.php 7
ERROR - 2020-07-11 06:18:35 --> Severity: Notice --> Undefined index: JMLBKK D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 41
ERROR - 2020-07-11 06:18:35 --> Severity: Notice --> Undefined index: NMSATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 42
ERROR - 2020-07-11 06:18:35 --> Severity: Notice --> Undefined index: DTMT_RET D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 63
ERROR - 2020-07-11 06:18:35 --> Severity: Notice --> Undefined index: KDMT_RET D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 64
ERROR - 2020-07-11 06:18:35 --> Severity: Notice --> Undefined index: NMSATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 67
ERROR - 2020-07-11 06:18:35 --> Severity: Notice --> Undefined index: LOKASI_TUJUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 68
ERROR - 2020-07-11 06:18:35 --> Severity: Notice --> Trying to get property 'NMLOKASI' of non-object D:\xampp\htdocs\simrs_open_source\application\farmasi\models\m_laporan.php 7
ERROR - 2020-07-11 06:18:35 --> Severity: Notice --> Undefined index: LOKASI_ASAL D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 69
ERROR - 2020-07-11 06:18:35 --> Severity: Notice --> Trying to get property 'NMLOKASI' of non-object D:\xampp\htdocs\simrs_open_source\application\farmasi\models\m_laporan.php 7
ERROR - 2020-07-11 06:18:35 --> Severity: Notice --> Undefined index: JMLBKK D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 52
ERROR - 2020-07-11 06:18:35 --> Severity: Notice --> Undefined index: NMSATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 53
ERROR - 2020-07-11 06:18:35 --> Severity: Notice --> Undefined index: DTMT_RET D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 63
ERROR - 2020-07-11 06:18:35 --> Severity: Notice --> Undefined index: KDMT_RET D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 64
ERROR - 2020-07-11 06:18:35 --> Severity: Notice --> Undefined index: NMSATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 67
ERROR - 2020-07-11 06:18:35 --> Severity: Notice --> Undefined index: LOKASI_TUJUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 68
ERROR - 2020-07-11 06:18:35 --> Severity: Notice --> Trying to get property 'NMLOKASI' of non-object D:\xampp\htdocs\simrs_open_source\application\farmasi\models\m_laporan.php 7
ERROR - 2020-07-11 06:18:35 --> Severity: Notice --> Undefined index: LOKASI_ASAL D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 69
ERROR - 2020-07-11 06:18:35 --> Severity: Notice --> Trying to get property 'NMLOKASI' of non-object D:\xampp\htdocs\simrs_open_source\application\farmasi\models\m_laporan.php 7
ERROR - 2020-07-11 06:18:35 --> Severity: Notice --> Undefined index: JMLBKK D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 41
ERROR - 2020-07-11 06:18:35 --> Severity: Notice --> Undefined index: NMSATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 42
ERROR - 2020-07-11 06:18:35 --> Severity: Notice --> Undefined index: DTMT_RET D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 63
ERROR - 2020-07-11 06:18:35 --> Severity: Notice --> Undefined index: KDMT_RET D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 64
ERROR - 2020-07-11 06:18:35 --> Severity: Notice --> Undefined index: NMSATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 67
ERROR - 2020-07-11 06:18:35 --> Severity: Notice --> Undefined index: LOKASI_TUJUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 68
ERROR - 2020-07-11 06:18:35 --> Severity: Notice --> Trying to get property 'NMLOKASI' of non-object D:\xampp\htdocs\simrs_open_source\application\farmasi\models\m_laporan.php 7
ERROR - 2020-07-11 06:18:35 --> Severity: Notice --> Undefined index: LOKASI_ASAL D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 69
ERROR - 2020-07-11 06:18:35 --> Severity: Notice --> Trying to get property 'NMLOKASI' of non-object D:\xampp\htdocs\simrs_open_source\application\farmasi\models\m_laporan.php 7
ERROR - 2020-07-11 06:20:00 --> Severity: Notice --> Undefined index: JMLBKK D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 21
ERROR - 2020-07-11 06:20:00 --> Severity: Notice --> Undefined index: NMSATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 22
ERROR - 2020-07-11 06:20:00 --> Severity: Notice --> Undefined index: DTMT_RET D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 63
ERROR - 2020-07-11 06:20:00 --> Severity: Notice --> Undefined index: KDMT_RET D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 64
ERROR - 2020-07-11 06:20:00 --> Severity: Notice --> Undefined index: NMSATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 67
ERROR - 2020-07-11 06:20:00 --> Severity: Notice --> Undefined index: LOKASI_TUJUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 68
ERROR - 2020-07-11 06:20:00 --> Severity: Notice --> Trying to get property 'NMLOKASI' of non-object D:\xampp\htdocs\simrs_open_source\application\farmasi\models\m_laporan.php 7
ERROR - 2020-07-11 06:20:00 --> Severity: Notice --> Undefined index: LOKASI_ASAL D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 69
ERROR - 2020-07-11 06:20:00 --> Severity: Notice --> Trying to get property 'NMLOKASI' of non-object D:\xampp\htdocs\simrs_open_source\application\farmasi\models\m_laporan.php 7
ERROR - 2020-07-11 06:20:00 --> Severity: Notice --> Undefined index: JMLBKK D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 41
ERROR - 2020-07-11 06:20:00 --> Severity: Notice --> Undefined index: NMSATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 42
ERROR - 2020-07-11 06:20:00 --> Severity: Notice --> Undefined index: DTMT_RET D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 63
ERROR - 2020-07-11 06:20:00 --> Severity: Notice --> Undefined index: KDMT_RET D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 64
ERROR - 2020-07-11 06:20:00 --> Severity: Notice --> Undefined index: NMSATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 67
ERROR - 2020-07-11 06:20:00 --> Severity: Notice --> Undefined index: LOKASI_TUJUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 68
ERROR - 2020-07-11 06:20:00 --> Severity: Notice --> Trying to get property 'NMLOKASI' of non-object D:\xampp\htdocs\simrs_open_source\application\farmasi\models\m_laporan.php 7
ERROR - 2020-07-11 06:20:00 --> Severity: Notice --> Undefined index: LOKASI_ASAL D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 69
ERROR - 2020-07-11 06:20:00 --> Severity: Notice --> Trying to get property 'NMLOKASI' of non-object D:\xampp\htdocs\simrs_open_source\application\farmasi\models\m_laporan.php 7
ERROR - 2020-07-11 06:20:00 --> Severity: Notice --> Undefined index: JMLBKK D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 41
ERROR - 2020-07-11 06:20:00 --> Severity: Notice --> Undefined index: NMSATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 42
ERROR - 2020-07-11 06:20:00 --> Severity: Notice --> Undefined index: DTMT_RET D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 63
ERROR - 2020-07-11 06:20:00 --> Severity: Notice --> Undefined index: KDMT_RET D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 64
ERROR - 2020-07-11 06:20:00 --> Severity: Notice --> Undefined index: NMSATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 67
ERROR - 2020-07-11 06:20:01 --> Severity: Notice --> Undefined index: LOKASI_TUJUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 68
ERROR - 2020-07-11 06:20:01 --> Severity: Notice --> Trying to get property 'NMLOKASI' of non-object D:\xampp\htdocs\simrs_open_source\application\farmasi\models\m_laporan.php 7
ERROR - 2020-07-11 06:20:01 --> Severity: Notice --> Undefined index: LOKASI_ASAL D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 69
ERROR - 2020-07-11 06:20:01 --> Severity: Notice --> Trying to get property 'NMLOKASI' of non-object D:\xampp\htdocs\simrs_open_source\application\farmasi\models\m_laporan.php 7
ERROR - 2020-07-11 06:20:01 --> Severity: Notice --> Undefined index: JMLBKK D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 52
ERROR - 2020-07-11 06:20:01 --> Severity: Notice --> Undefined index: NMSATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 53
ERROR - 2020-07-11 06:20:01 --> Severity: Notice --> Undefined index: DTMT_RET D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 63
ERROR - 2020-07-11 06:20:01 --> Severity: Notice --> Undefined index: KDMT_RET D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 64
ERROR - 2020-07-11 06:20:01 --> Severity: Notice --> Undefined index: NMSATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 67
ERROR - 2020-07-11 06:20:01 --> Severity: Notice --> Undefined index: LOKASI_TUJUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 68
ERROR - 2020-07-11 06:20:01 --> Severity: Notice --> Trying to get property 'NMLOKASI' of non-object D:\xampp\htdocs\simrs_open_source\application\farmasi\models\m_laporan.php 7
ERROR - 2020-07-11 06:20:01 --> Severity: Notice --> Undefined index: LOKASI_ASAL D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 69
ERROR - 2020-07-11 06:20:01 --> Severity: Notice --> Trying to get property 'NMLOKASI' of non-object D:\xampp\htdocs\simrs_open_source\application\farmasi\models\m_laporan.php 7
ERROR - 2020-07-11 06:20:01 --> Severity: Notice --> Undefined index: JMLBKK D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 41
ERROR - 2020-07-11 06:20:01 --> Severity: Notice --> Undefined index: NMSATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 42
ERROR - 2020-07-11 06:20:01 --> Severity: Notice --> Undefined index: DTMT_RET D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 63
ERROR - 2020-07-11 06:20:01 --> Severity: Notice --> Undefined index: KDMT_RET D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 64
ERROR - 2020-07-11 06:20:01 --> Severity: Notice --> Undefined index: NMSATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 67
ERROR - 2020-07-11 06:20:01 --> Severity: Notice --> Undefined index: LOKASI_TUJUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 68
ERROR - 2020-07-11 06:20:01 --> Severity: Notice --> Trying to get property 'NMLOKASI' of non-object D:\xampp\htdocs\simrs_open_source\application\farmasi\models\m_laporan.php 7
ERROR - 2020-07-11 06:20:01 --> Severity: Notice --> Undefined index: LOKASI_ASAL D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 69
ERROR - 2020-07-11 06:20:01 --> Severity: Notice --> Trying to get property 'NMLOKASI' of non-object D:\xampp\htdocs\simrs_open_source\application\farmasi\models\m_laporan.php 7
ERROR - 2020-07-11 06:20:31 --> Severity: Notice --> Undefined index: NMSATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 22
ERROR - 2020-07-11 06:20:31 --> Severity: Notice --> Undefined index: DTMT_RET D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 63
ERROR - 2020-07-11 06:20:31 --> Severity: Notice --> Undefined index: KDMT_RET D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 64
ERROR - 2020-07-11 06:20:31 --> Severity: Notice --> Undefined index: NMSATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 67
ERROR - 2020-07-11 06:20:31 --> Severity: Notice --> Undefined index: LOKASI_TUJUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 68
ERROR - 2020-07-11 06:20:31 --> Severity: Notice --> Trying to get property 'NMLOKASI' of non-object D:\xampp\htdocs\simrs_open_source\application\farmasi\models\m_laporan.php 7
ERROR - 2020-07-11 06:20:31 --> Severity: Notice --> Undefined index: LOKASI_ASAL D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 69
ERROR - 2020-07-11 06:20:31 --> Severity: Notice --> Trying to get property 'NMLOKASI' of non-object D:\xampp\htdocs\simrs_open_source\application\farmasi\models\m_laporan.php 7
ERROR - 2020-07-11 06:20:31 --> Severity: Notice --> Undefined index: JMLBKK D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 41
ERROR - 2020-07-11 06:20:31 --> Severity: Notice --> Undefined index: NMSATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 42
ERROR - 2020-07-11 06:20:31 --> Severity: Notice --> Undefined index: DTMT_RET D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 63
ERROR - 2020-07-11 06:20:31 --> Severity: Notice --> Undefined index: KDMT_RET D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 64
ERROR - 2020-07-11 06:20:31 --> Severity: Notice --> Undefined index: NMSATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 67
ERROR - 2020-07-11 06:20:31 --> Severity: Notice --> Undefined index: LOKASI_TUJUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 68
ERROR - 2020-07-11 06:20:31 --> Severity: Notice --> Trying to get property 'NMLOKASI' of non-object D:\xampp\htdocs\simrs_open_source\application\farmasi\models\m_laporan.php 7
ERROR - 2020-07-11 06:20:31 --> Severity: Notice --> Undefined index: LOKASI_ASAL D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 69
ERROR - 2020-07-11 06:20:31 --> Severity: Notice --> Trying to get property 'NMLOKASI' of non-object D:\xampp\htdocs\simrs_open_source\application\farmasi\models\m_laporan.php 7
ERROR - 2020-07-11 06:20:31 --> Severity: Notice --> Undefined index: JMLBKK D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 41
ERROR - 2020-07-11 06:20:31 --> Severity: Notice --> Undefined index: NMSATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 42
ERROR - 2020-07-11 06:20:31 --> Severity: Notice --> Undefined index: DTMT_RET D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 63
ERROR - 2020-07-11 06:20:31 --> Severity: Notice --> Undefined index: KDMT_RET D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 64
ERROR - 2020-07-11 06:20:31 --> Severity: Notice --> Undefined index: NMSATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 67
ERROR - 2020-07-11 06:20:31 --> Severity: Notice --> Undefined index: LOKASI_TUJUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 68
ERROR - 2020-07-11 06:20:31 --> Severity: Notice --> Trying to get property 'NMLOKASI' of non-object D:\xampp\htdocs\simrs_open_source\application\farmasi\models\m_laporan.php 7
ERROR - 2020-07-11 06:20:31 --> Severity: Notice --> Undefined index: LOKASI_ASAL D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 69
ERROR - 2020-07-11 06:20:31 --> Severity: Notice --> Trying to get property 'NMLOKASI' of non-object D:\xampp\htdocs\simrs_open_source\application\farmasi\models\m_laporan.php 7
ERROR - 2020-07-11 06:20:31 --> Severity: Notice --> Undefined index: JMLBKK D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 52
ERROR - 2020-07-11 06:20:31 --> Severity: Notice --> Undefined index: NMSATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 53
ERROR - 2020-07-11 06:20:31 --> Severity: Notice --> Undefined index: DTMT_RET D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 63
ERROR - 2020-07-11 06:20:31 --> Severity: Notice --> Undefined index: KDMT_RET D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 64
ERROR - 2020-07-11 06:20:31 --> Severity: Notice --> Undefined index: NMSATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 67
ERROR - 2020-07-11 06:20:31 --> Severity: Notice --> Undefined index: LOKASI_TUJUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 68
ERROR - 2020-07-11 06:20:31 --> Severity: Notice --> Trying to get property 'NMLOKASI' of non-object D:\xampp\htdocs\simrs_open_source\application\farmasi\models\m_laporan.php 7
ERROR - 2020-07-11 06:20:31 --> Severity: Notice --> Undefined index: LOKASI_ASAL D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 69
ERROR - 2020-07-11 06:20:31 --> Severity: Notice --> Trying to get property 'NMLOKASI' of non-object D:\xampp\htdocs\simrs_open_source\application\farmasi\models\m_laporan.php 7
ERROR - 2020-07-11 06:20:31 --> Severity: Notice --> Undefined index: JMLBKK D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 41
ERROR - 2020-07-11 06:20:31 --> Severity: Notice --> Undefined index: NMSATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 42
ERROR - 2020-07-11 06:20:31 --> Severity: Notice --> Undefined index: DTMT_RET D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 63
ERROR - 2020-07-11 06:20:31 --> Severity: Notice --> Undefined index: KDMT_RET D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 64
ERROR - 2020-07-11 06:20:31 --> Severity: Notice --> Undefined index: NMSATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 67
ERROR - 2020-07-11 06:20:31 --> Severity: Notice --> Undefined index: LOKASI_TUJUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 68
ERROR - 2020-07-11 06:20:31 --> Severity: Notice --> Trying to get property 'NMLOKASI' of non-object D:\xampp\htdocs\simrs_open_source\application\farmasi\models\m_laporan.php 7
ERROR - 2020-07-11 06:20:31 --> Severity: Notice --> Undefined index: LOKASI_ASAL D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 69
ERROR - 2020-07-11 06:20:31 --> Severity: Notice --> Trying to get property 'NMLOKASI' of non-object D:\xampp\htdocs\simrs_open_source\application\farmasi\models\m_laporan.php 7
ERROR - 2020-07-11 06:21:00 --> Severity: Notice --> Undefined index: NMSATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 22
ERROR - 2020-07-11 06:21:00 --> Severity: Notice --> Undefined index: JMLBKK D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 41
ERROR - 2020-07-11 06:21:00 --> Severity: Notice --> Undefined index: NMSATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 42
ERROR - 2020-07-11 06:21:00 --> Severity: Notice --> Undefined index: JMLBKK D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 41
ERROR - 2020-07-11 06:21:00 --> Severity: Notice --> Undefined index: NMSATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 42
ERROR - 2020-07-11 06:21:00 --> Severity: Notice --> Undefined index: JMLBKK D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 52
ERROR - 2020-07-11 06:21:00 --> Severity: Notice --> Undefined index: NMSATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 53
ERROR - 2020-07-11 06:21:00 --> Severity: Notice --> Undefined index: JMLBKK D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 41
ERROR - 2020-07-11 06:21:00 --> Severity: Notice --> Undefined index: NMSATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 42
ERROR - 2020-07-11 06:21:42 --> Severity: Notice --> Undefined index: NMSATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 22
ERROR - 2020-07-11 06:21:42 --> Severity: Notice --> Undefined index: NMSATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 42
ERROR - 2020-07-11 06:21:42 --> Severity: Notice --> Undefined index: NMSATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 42
ERROR - 2020-07-11 06:21:42 --> Severity: Notice --> Undefined index: NMSATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 53
ERROR - 2020-07-11 06:21:42 --> Severity: Notice --> Undefined index: NMSATUAN D:\xampp\htdocs\simrs_open_source\application\farmasi\views\laporan_pengembalian_barang\get_preview_2.php 42
