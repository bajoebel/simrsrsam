<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-10-22 11:00:29 --> Severity: error --> Exception: Too few arguments to function search::waktu_pakai(), 0 passed in C:\xampp\htdocs\simrs\system\core\CodeIgniter.php on line 532 and exactly 1 expected C:\xampp\htdocs\simrs\application\farmasi\controllers\Search.php 144
ERROR - 2021-10-22 11:07:23 --> Severity: Notice --> Undefined variable: Data C:\xampp\htdocs\simrs\application\farmasi\views\trans_mutasi\print_preview.php 177
ERROR - 2021-10-22 11:11:18 --> Severity: Notice --> Undefined index: LOCK_STATUS C:\xampp\htdocs\simrs\application\farmasi\controllers\Trans_pembelian.php 246
ERROR - 2021-10-22 11:17:51 --> Severity: error --> Exception: Too few arguments to function search::waktu_pakai(), 0 passed in C:\xampp\htdocs\simrs\system\core\CodeIgniter.php on line 532 and exactly 1 expected C:\xampp\htdocs\simrs\application\farmasi\controllers\Search.php 144
ERROR - 2021-10-22 11:18:02 --> Severity: error --> Exception: Too few arguments to function search::waktu_pakai(), 0 passed in C:\xampp\htdocs\simrs\system\core\CodeIgniter.php on line 532 and exactly 1 expected C:\xampp\htdocs\simrs\application\farmasi\controllers\Search.php 144
ERROR - 2021-10-22 11:18:58 --> Severity: error --> Exception: Too few arguments to function search::waktu_pakai(), 0 passed in C:\xampp\htdocs\simrs\system\core\CodeIgniter.php on line 532 and exactly 1 expected C:\xampp\htdocs\simrs\application\farmasi\controllers\Search.php 144
ERROR - 2021-10-22 11:20:52 --> Query error: Table 'db_simrs_v2.stok_barang_fifo1' doesn't exist - Invalid query: SELECT `tbl04_barang`.`KDBRG`, `NMBRG`, `KDSATUAN`, `NMSATUAN`, `KDKTBRG`, `NMKTBRG`, SUM(JSTOK) as JSTOK, `KDLOKASI`, (MAX(HMODAL)*1.2) AS HJUAL, `HMODAL`
FROM `stok_barang_fifo1`
JOIN `tbl04_barang` ON `tbl04_barang`.`KDBRG`=`stok_barang_fifo`.`KDBRG`
WHERE `KDLOKASI` = '1'
AND   (
`tbl04_barang`.`KDBRG` LIKE '%paracetamol%' ESCAPE '!'
OR  `NMBRG` LIKE '%paracetamol%' ESCAPE '!'
OR  `NMSATUAN` LIKE '%paracetamol%' ESCAPE '!'
OR  `JSTOK` LIKE '%paracetamol%' ESCAPE '!'
 )
GROUP BY `stok_barang_fifo`.`KDBRG`, `stok_barang_fifo`.`KDLOKASI`
ORDER BY `NMBRG`
ERROR - 2021-10-22 11:28:39 --> Severity: Notice --> Undefined index: LOCK_STATUS C:\xampp\htdocs\simrs\application\farmasi\controllers\Trans_pembelian.php 246
ERROR - 2021-10-22 12:53:55 --> Severity: error --> Exception: Too few arguments to function search::waktu_pakai(), 0 passed in C:\xampp\htdocs\simrs\system\core\CodeIgniter.php on line 532 and exactly 1 expected C:\xampp\htdocs\simrs\application\farmasi\controllers\Search.php 144
