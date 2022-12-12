<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2020-10-01 10:48:38 --> 404 Page Not Found: /index
ERROR - 2020-10-01 10:49:28 --> 404 Page Not Found: Home/index
ERROR - 2020-10-01 10:49:34 --> 404 Page Not Found: /index
ERROR - 2020-10-01 10:53:18 --> 404 Page Not Found: /index
ERROR - 2020-10-01 10:55:49 --> 404 Page Not Found: /index
ERROR - 2020-10-01 10:56:28 --> 404 Page Not Found: Login/index
ERROR - 2020-10-01 11:16:43 --> 404 Page Not Found: /index
ERROR - 2020-10-01 11:17:52 --> 404 Page Not Found: /index
ERROR - 2020-10-01 11:18:00 --> 404 Page Not Found: Trans_penjualan/index
ERROR - 2020-10-01 11:58:15 --> 404 Page Not Found: /index
ERROR - 2020-10-01 12:01:07 --> 404 Page Not Found: Login/index
ERROR - 2020-10-01 12:12:47 --> 404 Page Not Found: Login/index
ERROR - 2020-10-01 12:12:50 --> 404 Page Not Found: /index
ERROR - 2020-10-01 13:38:30 --> 404 Page Not Found: /index
ERROR - 2020-10-01 13:38:59 --> 404 Page Not Found: Login/index
ERROR - 2020-10-01 13:44:45 --> 404 Page Not Found: /index
ERROR - 2020-10-01 13:44:49 --> 404 Page Not Found: /index
ERROR - 2020-10-01 16:16:26 --> Unable to load the requested class: Ajax_page
ERROR - 2020-10-01 16:32:55 --> Query error: Table 'db_simrs_new.tbl01_pegawai' doesn't exist - Invalid query: SELECT *
FROM `tbl01_pegawai`
WHERE `session_id` = 'dnul8usp7n1qj2bvov1gap74ngf35ine'
ERROR - 2020-10-01 16:37:17 --> Severity: Error --> Allowed memory size of 134217728 bytes exhausted (tried to allocate 124918528 bytes) /var/www/html/simrs_open_source/system/database/drivers/mysqli/mysqli_driver.php 307
ERROR - 2020-10-01 16:40:30 --> Severity: Error --> Allowed memory size of 134217728 bytes exhausted (tried to allocate 124918528 bytes) /var/www/html/simrs_open_source/system/database/drivers/mysqli/mysqli_driver.php 307
ERROR - 2020-10-01 16:43:46 --> Severity: Error --> Allowed memory size of 134217728 bytes exhausted (tried to allocate 124918528 bytes) /var/www/html/simrs_open_source/system/database/drivers/mysqli/mysqli_driver.php 307
ERROR - 2020-10-01 16:47:04 --> Severity: Error --> Allowed memory size of 134217728 bytes exhausted (tried to allocate 124918528 bytes) /var/www/html/simrs_open_source/system/database/drivers/mysqli/mysqli_driver.php 307
ERROR - 2020-10-01 17:34:58 --> Severity: Warning --> mysqli::real_connect(): (HY000/2002): Connection timed out /var/www/html/simrs_open_source/system/database/drivers/mysqli/mysqli_driver.php 203
ERROR - 2020-10-01 17:34:58 --> Unable to connect to the database
ERROR - 2020-10-01 18:21:54 --> Severity: Warning --> mysqli::real_connect(): (HY000/2002): Connection timed out /var/www/html/simrs_open_source/system/database/drivers/mysqli/mysqli_driver.php 203
ERROR - 2020-10-01 18:21:54 --> Unable to connect to the database
ERROR - 2020-10-01 18:22:24 --> Query error: Table 'db_simrs_new.tbl01_pegawai' doesn't exist - Invalid query: SELECT *
FROM `tbl01_pegawai`
WHERE `session_id` = 'atpg8komqlj5jebh1fnseqnp4aks24vl'
ERROR - 2020-10-01 18:23:08 --> Query error: Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'db_simrs_v2.tbl04_temp_penjualan.IDX' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT *,SUM(JMLJUAL) AS JMLJUAL, SUM(SUBTOTAL) AS SUBTOTAL, SUM(DISKON) AS DISKON FROM tbl04_temp_penjualan WHERE UEXEC = 'NRP1910460' GROUP BY KDBRG 
ERROR - 2020-10-01 18:23:08 --> Query error: Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'db_simrs_v2.tbl04_temp_penjualan.IDX' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT *,SUM(JMLJUAL) AS JMLJUAL, SUM(SUBTOTAL) AS SUBTOTAL, SUM(DISKON) AS DISKON FROM tbl04_temp_penjualan WHERE UEXEC = 'NRP1910460' GROUP BY KDBRG 
ERROR - 2020-10-01 18:23:16 --> Query error: View 'db_simrs_v2.stok_barang_fifo' references invalid table(s) or column(s) or function(s) or definer/invoker of view lack rights to use them - Invalid query: SELECT `tbl04_barang`.`KDBRG`, `NMBRG`, `KDSATUAN`, `NMSATUAN`, `KDKTBRG`, `NMKTBRG`, SUM(JSTOK) as JSTOK, `KDLOKASI`, (MAX(HMODAL)*1.2) AS HJUAL, `HMODAL`
FROM `stok_barang_fifo`
JOIN `tbl04_barang` ON `tbl04_barang`.`KDBRG`=`stok_barang_fifo`.`KDBRG`
WHERE `KDLOKASI` = '1'
AND   (
`tbl04_barang`.`KDBRG` LIKE '%0000%' ESCAPE '!'
OR  `NMBRG` LIKE '%0000%' ESCAPE '!'
OR  `NMSATUAN` LIKE '%0000%' ESCAPE '!'
OR  `JSTOK` LIKE '%0000%' ESCAPE '!'
 )
GROUP BY `stok_barang_fifo`.`KDBRG`, `stok_barang_fifo`.`KDLOKASI`
ORDER BY `NMBRG`
ERROR - 2020-10-01 18:23:21 --> Query error: View 'db_simrs_v2.stok_barang_fifo' references invalid table(s) or column(s) or function(s) or definer/invoker of view lack rights to use them - Invalid query: SELECT `tbl04_barang`.`KDBRG`, `NMBRG`, `KDSATUAN`, `NMSATUAN`, `KDKTBRG`, `NMKTBRG`, SUM(JSTOK) as JSTOK, `KDLOKASI`, (MAX(HMODAL)*1.2) AS HJUAL, `HMODAL`
FROM `stok_barang_fifo`
JOIN `tbl04_barang` ON `tbl04_barang`.`KDBRG`=`stok_barang_fifo`.`KDBRG`
WHERE `KDLOKASI` = '1'
AND   (
`tbl04_barang`.`KDBRG` LIKE '%0000%' ESCAPE '!'
OR  `NMBRG` LIKE '%0000%' ESCAPE '!'
OR  `NMSATUAN` LIKE '%0000%' ESCAPE '!'
OR  `JSTOK` LIKE '%0000%' ESCAPE '!'
 )
GROUP BY `stok_barang_fifo`.`KDBRG`, `stok_barang_fifo`.`KDLOKASI`
ORDER BY `NMBRG`
 LIMIT 10
ERROR - 2020-10-01 18:23:36 --> Query error: View 'db_simrs_v2.stok_barang_fifo' references invalid table(s) or column(s) or function(s) or definer/invoker of view lack rights to use them - Invalid query: SELECT `tbl04_barang`.`KDBRG`, `NMBRG`, `KDSATUAN`, `NMSATUAN`, `KDKTBRG`, `NMKTBRG`, SUM(JSTOK) as JSTOK, `KDLOKASI`, (MAX(HMODAL)*1.2) AS HJUAL, `HMODAL`
FROM `stok_barang_fifo`
JOIN `tbl04_barang` ON `tbl04_barang`.`KDBRG`=`stok_barang_fifo`.`KDBRG`
WHERE `KDLOKASI` = '1'
AND   (
`tbl04_barang`.`KDBRG` LIKE '%000%' ESCAPE '!'
OR  `NMBRG` LIKE '%000%' ESCAPE '!'
OR  `NMSATUAN` LIKE '%000%' ESCAPE '!'
OR  `JSTOK` LIKE '%000%' ESCAPE '!'
 )
GROUP BY `stok_barang_fifo`.`KDBRG`, `stok_barang_fifo`.`KDLOKASI`
ORDER BY `NMBRG`
ERROR - 2020-10-01 18:40:56 --> Query error: Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'db_simrs_v2.tbl04_temp_penjualan.IDX' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT *,SUM(JMLJUAL) AS JMLJUAL, SUM(SUBTOTAL) AS SUBTOTAL, SUM(DISKON) AS DISKON FROM tbl04_temp_penjualan WHERE UEXEC = 'NRP1910460' GROUP BY KDBRG 
ERROR - 2020-10-01 18:40:56 --> Query error: Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'db_simrs_v2.tbl04_temp_penjualan.IDX' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT *,SUM(JMLJUAL) AS JMLJUAL, SUM(SUBTOTAL) AS SUBTOTAL, SUM(DISKON) AS DISKON FROM tbl04_temp_penjualan WHERE UEXEC = 'NRP1910460' GROUP BY KDBRG 
ERROR - 2020-10-01 18:41:02 --> Query error: Expression #10 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'stok_barang_fifo.HMODAL' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `tbl04_barang`.`KDBRG`, `NMBRG`, `KDSATUAN`, `NMSATUAN`, `KDKTBRG`, `NMKTBRG`, SUM(JSTOK) as JSTOK, `KDLOKASI`, (MAX(HMODAL)*1.2) AS HJUAL, `HMODAL`
FROM `stok_barang_fifo`
JOIN `tbl04_barang` ON `tbl04_barang`.`KDBRG`=`stok_barang_fifo`.`KDBRG`
WHERE `KDLOKASI` = '1'
AND   (
`tbl04_barang`.`KDBRG` LIKE '%000%' ESCAPE '!'
OR  `NMBRG` LIKE '%000%' ESCAPE '!'
OR  `NMSATUAN` LIKE '%000%' ESCAPE '!'
OR  `JSTOK` LIKE '%000%' ESCAPE '!'
 )
GROUP BY `stok_barang_fifo`.`KDBRG`, `stok_barang_fifo`.`KDLOKASI`
ORDER BY `NMBRG`
ERROR - 2020-10-01 18:41:31 --> Query error: Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'db_simrs_v2.tbl04_temp_penjualan.IDX' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT *,SUM(JMLJUAL) AS JMLJUAL, SUM(SUBTOTAL) AS SUBTOTAL, SUM(DISKON) AS DISKON FROM tbl04_temp_penjualan WHERE UEXEC = 'NRP1910460' GROUP BY KDBRG 
ERROR - 2020-10-01 18:41:31 --> Query error: Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'db_simrs_v2.tbl04_temp_penjualan.IDX' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT *,SUM(JMLJUAL) AS JMLJUAL, SUM(SUBTOTAL) AS SUBTOTAL, SUM(DISKON) AS DISKON FROM tbl04_temp_penjualan WHERE UEXEC = 'NRP1910460' GROUP BY KDBRG 
ERROR - 2020-10-01 18:41:39 --> Query error: Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'db_simrs_v2.tbl04_temp_penjualan.IDX' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT *,SUM(JMLJUAL) AS JMLJUAL, SUM(SUBTOTAL) AS SUBTOTAL, SUM(DISKON) AS DISKON FROM tbl04_temp_penjualan WHERE UEXEC = 'NRP1910460' GROUP BY KDBRG 
ERROR - 2020-10-01 18:41:39 --> Query error: Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'db_simrs_v2.tbl04_temp_penjualan.IDX' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT *,SUM(JMLJUAL) AS JMLJUAL, SUM(SUBTOTAL) AS SUBTOTAL, SUM(DISKON) AS DISKON FROM tbl04_temp_penjualan WHERE UEXEC = 'NRP1910460' GROUP BY KDBRG 
ERROR - 2020-10-01 18:42:05 --> Query error: Expression #10 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'stok_barang_fifo.HMODAL' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `tbl04_barang`.`KDBRG`, `NMBRG`, `KDSATUAN`, `NMSATUAN`, `KDKTBRG`, `NMKTBRG`, SUM(JSTOK) as JSTOK, `KDLOKASI`, (MAX(HMODAL)*1.2) AS HJUAL, `HMODAL`
FROM `stok_barang_fifo`
JOIN `tbl04_barang` ON `tbl04_barang`.`KDBRG`=`stok_barang_fifo`.`KDBRG`
WHERE `KDLOKASI` = '1'
AND   (
`tbl04_barang`.`KDBRG` LIKE '%00%' ESCAPE '!'
OR  `NMBRG` LIKE '%00%' ESCAPE '!'
OR  `NMSATUAN` LIKE '%00%' ESCAPE '!'
OR  `JSTOK` LIKE '%00%' ESCAPE '!'
 )
GROUP BY `stok_barang_fifo`.`KDBRG`, `stok_barang_fifo`.`KDLOKASI`
ORDER BY `NMBRG`
ERROR - 2020-10-01 18:42:48 --> Severity: error --> Exception: Too few arguments to function search::waktu_pakai(), 0 passed in /var/www/html/simrs_open_source/system/core/CodeIgniter.php on line 532 and exactly 1 expected /var/www/html/simrs_open_source/application/farmasi/controllers/Search.php 144
ERROR - 2020-10-01 18:44:40 --> Severity: error --> Exception: Too few arguments to function search::waktu_pakai(), 0 passed in /var/www/html/simrs_open_source/system/core/CodeIgniter.php on line 532 and exactly 1 expected /var/www/html/simrs_open_source/application/farmasi/controllers/Search.php 144
ERROR - 2020-10-01 18:44:57 --> Query error: Unknown column 'JNS_RESEP' in 'field list' - Invalid query: INSERT INTO `tbl04_temp_penjualan` (`KDBRG`, `NMBRG`, `JSTOK`, `HJUAL`, `JMLJUAL`, `DISKON`, `R`, `SUBTOTAL`, `JNS_RESEP`, `AP`, `AP_JENISOBAT`, `AP_JMLHARI`, `AP_JMLSATUAN`, `AP_SATUAN`, `AP_CARAPAKAI`, `AP_WAKTUJML`, `AP_WAKTUPAKAI`, `AP_WAKTUKET`, `AP_KET`, `UEXEC`) VALUES ('000004', 'Acarbose 50 mg', '978', '1195', '10', '0', '750', '12700', 'Resep Pulang', '3 x Sehari, 1 Tablet, Dimakan Sebelum Makan, Tiap 8 Jam,', '1#Obat Dalam', '3', '1', '1#Tablet', '1#Dimakan', '0', '1#Sebelum Makan', '18#Tiap 8 Jam', '0#-', 'NRP1910460')
ERROR - 2020-10-01 18:45:03 --> Query error: Unknown column 'JNS_RESEP' in 'field list' - Invalid query: INSERT INTO `tbl04_temp_penjualan` (`KDBRG`, `NMBRG`, `JSTOK`, `HJUAL`, `JMLJUAL`, `DISKON`, `R`, `SUBTOTAL`, `JNS_RESEP`, `AP`, `AP_JENISOBAT`, `AP_JMLHARI`, `AP_JMLSATUAN`, `AP_SATUAN`, `AP_CARAPAKAI`, `AP_WAKTUJML`, `AP_WAKTUPAKAI`, `AP_WAKTUKET`, `AP_KET`, `UEXEC`) VALUES ('000004', 'Acarbose 50 mg', '978', '1195', '10', '0', '750', '12700', 'Resep Pulang', '3 x Sehari, 1 Tablet, Dimakan Sebelum Makan, Tiap 8 Jam,Dihabiskan', '1#Obat Dalam', '3', '1', '1#Tablet', '1#Dimakan', '0', '1#Sebelum Makan', '18#Tiap 8 Jam', '3#Dihabiskan', 'NRP1910460')
ERROR - 2020-10-01 20:49:35 --> Query error: Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'db_simrs_new.tbl04_temp_penjualan.IDX' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT *,SUM(JMLJUAL) AS JMLJUAL, SUM(SUBTOTAL) AS SUBTOTAL, SUM(DISKON) AS DISKON FROM tbl04_temp_penjualan WHERE UEXEC = 'NRP1910460' GROUP BY KDBRG 
ERROR - 2020-10-01 20:49:35 --> Query error: Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'db_simrs_new.tbl04_temp_penjualan.IDX' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT *,SUM(JMLJUAL) AS JMLJUAL, SUM(SUBTOTAL) AS SUBTOTAL, SUM(DISKON) AS DISKON FROM tbl04_temp_penjualan WHERE UEXEC = 'NRP1910460' GROUP BY KDBRG 
ERROR - 2020-10-01 20:50:56 --> Query error: Table 'db_simrs_new.stok_barang_fifo' doesn't exist - Invalid query: SELECT `tbl04_barang`.`KDBRG`, `NMBRG`, `KDSATUAN`, `NMSATUAN`, `KDKTBRG`, `NMKTBRG`, SUM(JSTOK) as JSTOK, `KDLOKASI`, (MAX(HMODAL)*1.2) AS HJUAL, `HMODAL`
FROM `stok_barang_fifo`
JOIN `tbl04_barang` ON `tbl04_barang`.`KDBRG`=`stok_barang_fifo`.`KDBRG`
WHERE `KDLOKASI` = '1'
AND   (
`tbl04_barang`.`KDBRG` LIKE '%00%' ESCAPE '!'
OR  `NMBRG` LIKE '%00%' ESCAPE '!'
OR  `NMSATUAN` LIKE '%00%' ESCAPE '!'
OR  `JSTOK` LIKE '%00%' ESCAPE '!'
 )
GROUP BY `stok_barang_fifo`.`KDBRG`, `stok_barang_fifo`.`KDLOKASI`
ORDER BY `NMBRG`
ERROR - 2020-10-01 20:50:57 --> Query error: Table 'db_simrs_new.stok_barang_fifo' doesn't exist - Invalid query: SELECT `tbl04_barang`.`KDBRG`, `NMBRG`, `KDSATUAN`, `NMSATUAN`, `KDKTBRG`, `NMKTBRG`, SUM(JSTOK) as JSTOK, `KDLOKASI`, (MAX(HMODAL)*1.2) AS HJUAL, `HMODAL`
FROM `stok_barang_fifo`
JOIN `tbl04_barang` ON `tbl04_barang`.`KDBRG`=`stok_barang_fifo`.`KDBRG`
WHERE `KDLOKASI` = '1'
AND   (
`tbl04_barang`.`KDBRG` LIKE '%000%' ESCAPE '!'
OR  `NMBRG` LIKE '%000%' ESCAPE '!'
OR  `NMSATUAN` LIKE '%000%' ESCAPE '!'
OR  `JSTOK` LIKE '%000%' ESCAPE '!'
 )
GROUP BY `stok_barang_fifo`.`KDBRG`, `stok_barang_fifo`.`KDLOKASI`
ORDER BY `NMBRG`
ERROR - 2020-10-01 23:22:13 --> Severity: error --> Exception: Too few arguments to function search::waktu_pakai(), 0 passed in /var/www/html/simrs_open_source/system/core/CodeIgniter.php on line 532 and exactly 1 expected /var/www/html/simrs_open_source/application/farmasi/controllers/Search.php 144
ERROR - 2020-10-01 23:22:30 --> Severity: error --> Exception: Too few arguments to function search::waktu_pakai(), 0 passed in /var/www/html/simrs_open_source/system/core/CodeIgniter.php on line 532 and exactly 1 expected /var/www/html/simrs_open_source/application/farmasi/controllers/Search.php 144
ERROR - 2020-10-01 23:22:36 --> Severity: error --> Exception: Too few arguments to function search::waktu_pakai(), 0 passed in /var/www/html/simrs_open_source/system/core/CodeIgniter.php on line 532 and exactly 1 expected /var/www/html/simrs_open_source/application/farmasi/controllers/Search.php 144
ERROR - 2020-10-01 23:22:50 --> Query error: Unknown column 'JNS_RESEP' in 'field list' - Invalid query: INSERT INTO `tbl04_temp_penjualan` (`KDBRG`, `NMBRG`, `JSTOK`, `HJUAL`, `JMLJUAL`, `DISKON`, `R`, `SUBTOTAL`, `JNS_RESEP`, `AP`, `AP_JENISOBAT`, `AP_JMLHARI`, `AP_JMLSATUAN`, `AP_SATUAN`, `AP_CARAPAKAI`, `AP_WAKTUJML`, `AP_WAKTUPAKAI`, `AP_WAKTUKET`, `AP_KET`, `UEXEC`) VALUES ('000004', 'Acarbose 50 mg', '640', '1195', '10', '0', '750', '12700', 'Resep Pulang', '3 x Sehari, 1 Tablet, Dimakan Sebelum Makan, Tiap 8 Jam,Dihabiskan', '1#Obat Dalam', '3', '1', '1#Tablet', '1#Dimakan', '0', '1#Sebelum Makan', '18#Tiap 8 Jam', '1#Dihabiskan', 'NRP1910460')
ERROR - 2020-10-01 23:23:10 --> Query error: Unknown column 'JNS_RESEP' in 'field list' - Invalid query: INSERT INTO `tbl04_temp_penjualan` (`KDBRG`, `NMBRG`, `JSTOK`, `HJUAL`, `JMLJUAL`, `DISKON`, `R`, `SUBTOTAL`, `JNS_RESEP`, `AP`, `AP_JENISOBAT`, `AP_JMLHARI`, `AP_JMLSATUAN`, `AP_SATUAN`, `AP_CARAPAKAI`, `AP_WAKTUJML`, `AP_WAKTUPAKAI`, `AP_WAKTUKET`, `AP_KET`, `UEXEC`) VALUES ('000004', 'Acarbose 50 mg', '640', '1195', '10', '0', '750', '12700', 'Resep Pulang', '3 x Sehari, 1 Tablet, Dimakan Sebelum Makan, Tiap 8 Jam,Dihabiskan', '1#Obat Dalam', '3', '1', '1#Tablet', '1#Dimakan', '0', '1#Sebelum Makan', '18#Tiap 8 Jam', '1#Dihabiskan', 'NRP1910460')
ERROR - 2020-10-01 23:25:13 --> Query error: Unknown column 'JNSRESEP' in 'field list' - Invalid query: INSERT INTO `tbl04_penjualan` (`KDJL`, `DTJL`, `REG_UNIT`, `ID_DAFTAR`, `NOMR`, `NMPASIEN`, `KDRUANGAN`, `NMRUANGAN`, `JNSLAYANAN`, `ID_CARA_BAYAR`, `CARA_BAYAR`, `KDLOKASI`, `NMLOKASI`, `KDDOKTER`, `NMDOKTER`, `NORESEP`, `TGLRESEP`, `TGLJUAL`, `KETJL`, `JNSRESEP`, `UEXEC`) VALUES ('', '2020-10-01 23:25:11', 'RI-201001-38-0003', '2020057315', '527918', 'UCI RAHMADONA', '38', 'SITI HAJJAR', 'RI', '6', 'Mandiri', '1', 'DEPO UTAMA', '23', '23', '0012', '2020-10-01', '2020-10-01', '', 'Resep Pulang', 'NRP1910460')
ERROR - 2020-10-01 23:26:09 --> Query error: TRIGGER command denied to user 'admin'@'%' for table 'tbl04_penjualan' - Invalid query: INSERT INTO `tbl04_penjualan` (`KDJL`, `DTJL`, `REG_UNIT`, `ID_DAFTAR`, `NOMR`, `NMPASIEN`, `KDRUANGAN`, `NMRUANGAN`, `JNSLAYANAN`, `ID_CARA_BAYAR`, `CARA_BAYAR`, `KDLOKASI`, `NMLOKASI`, `KDDOKTER`, `NMDOKTER`, `NORESEP`, `TGLRESEP`, `TGLJUAL`, `KETJL`, `JNSRESEP`, `UEXEC`) VALUES ('', '2020-10-01 23:26:06', 'RI-201001-38-0003', '2020057315', '527918', 'UCI RAHMADONA', '38', 'SITI HAJJAR', 'RI', '6', 'Mandiri', '1', 'DEPO UTAMA', '23', '23', '0012', '2020-10-01', '2020-10-01', '', 'Resep Pulang', 'NRP1910460')
ERROR - 2020-10-01 23:37:43 --> Severity: error --> Exception: Too few arguments to function search::waktu_pakai(), 0 passed in /var/www/html/simrs_open_source/system/core/CodeIgniter.php on line 532 and exactly 1 expected /var/www/html/simrs_open_source/application/farmasi/controllers/Search.php 144
ERROR - 2020-10-01 23:37:48 --> Severity: error --> Exception: Too few arguments to function search::waktu_pakai(), 0 passed in /var/www/html/simrs_open_source/system/core/CodeIgniter.php on line 532 and exactly 1 expected /var/www/html/simrs_open_source/application/farmasi/controllers/Search.php 144
ERROR - 2020-10-01 23:38:03 --> Query error: Duplicate entry '' for key 'tbl04_penjualan.PRIMARY' - Invalid query: INSERT INTO `tbl04_penjualan` (`KDJL`, `DTJL`, `REG_UNIT`, `ID_DAFTAR`, `NOMR`, `NMPASIEN`, `KDRUANGAN`, `NMRUANGAN`, `JNSLAYANAN`, `ID_CARA_BAYAR`, `CARA_BAYAR`, `KDLOKASI`, `NMLOKASI`, `KDDOKTER`, `NMDOKTER`, `NORESEP`, `TGLRESEP`, `TGLJUAL`, `KETJL`, `JNSRESEP`, `UEXEC`) VALUES ('', '2020-10-01 23:38:01', 'RI-201001-38-0003', '2020057315', '527918', 'UCI RAHMADONA', '38', 'SITI HAJJAR', 'RI', '6', 'Mandiri', '1', 'DEPO UTAMA', '23', '23', '0012', '2020-10-01', '2020-10-01', '', 'Resep Pulang', 'NRP1910460')
