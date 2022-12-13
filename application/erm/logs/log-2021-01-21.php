<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-01-21 05:38:12 --> Severity: Error --> Maximum execution time of 30 seconds exceeded C:\xampp32\htdocs\simrs\system\database\drivers\mysqli\mysqli_driver.php 307
ERROR - 2021-01-21 05:38:45 --> Severity: Error --> Maximum execution time of 30 seconds exceeded C:\xampp32\htdocs\simrs\system\database\drivers\mysqli\mysqli_driver.php 307
ERROR - 2021-01-21 05:38:45 --> Severity: Error --> Maximum execution time of 30 seconds exceeded C:\xampp32\htdocs\simrs\system\libraries\Session\drivers\Session_files_driver.php 180
ERROR - 2021-01-21 05:38:45 --> Severity: Error --> Maximum execution time of 30 seconds exceeded C:\xampp32\htdocs\simrs\system\libraries\Session\drivers\Session_files_driver.php 180
ERROR - 2021-01-21 05:39:16 --> Severity: Error --> Maximum execution time of 30 seconds exceeded C:\xampp32\htdocs\simrs\system\database\drivers\mysqli\mysqli_driver.php 307
ERROR - 2021-01-21 05:39:16 --> Severity: Error --> Maximum execution time of 30 seconds exceeded C:\xampp32\htdocs\simrs\system\libraries\Session\drivers\Session_files_driver.php 180
ERROR - 2021-01-21 05:39:16 --> Severity: Error --> Maximum execution time of 30 seconds exceeded C:\xampp32\htdocs\simrs\system\libraries\Session\drivers\Session_files_driver.php 180
ERROR - 2021-01-21 05:39:16 --> Severity: Error --> Maximum execution time of 30 seconds exceeded C:\xampp32\htdocs\simrs\system\libraries\Session\drivers\Session_files_driver.php 180
ERROR - 2021-01-21 05:44:32 --> Severity: Error --> Maximum execution time of 30 seconds exceeded C:\xampp32\htdocs\simrs\system\database\drivers\mysqli\mysqli_driver.php 307
ERROR - 2021-01-21 05:47:20 --> Severity: Error --> Maximum execution time of 30 seconds exceeded C:\xampp32\htdocs\simrs\system\database\drivers\mysqli\mysqli_driver.php 307
ERROR - 2021-01-21 05:56:18 --> Query error: Unknown column 'b.user_id' in 'field list' - Invalid query: SELECT a.idx,a.id_daftar,a.reg_unit,a.tgl_masuk,a.nomr,a.nama_pasien,
        a.namaDokterJaga,a.nama_ruang,a.tgl_lahir,a.jns_kelamin,a.cara_bayar,a.id_ruang ,IF(IFNULL(b.user_id,TRUE),'Active',CONCAT('Batal
',b.tgl_created)) AS State,
        b.user_id AS userBatal 
        FROM tbl02_pendaftaran a /*LEFT JOIN tbl02_pendaftaran_batal b ON a.reg_unit=b.reg_unit*/
        WHERE id_ruang = '9' AND DATE_FORMAT(tgl_masuk,'%Y-%m-%d') = DATE_FORMAT(NOW(),'%Y-%m-%d') ORDER BY tgl_masuk DESC
ERROR - 2021-01-21 05:56:20 --> Query error: Unknown column 'b.user_id' in 'field list' - Invalid query: SELECT a.idx,a.id_daftar,a.reg_unit,a.tgl_masuk,a.nomr,a.nama_pasien,
        a.namaDokterJaga,a.nama_ruang,a.tgl_lahir,a.jns_kelamin,a.cara_bayar,a.id_ruang ,IF(IFNULL(b.user_id,TRUE),'Active',CONCAT('Batal
',b.tgl_created)) AS State,
        b.user_id AS userBatal 
        FROM tbl02_pendaftaran a /*LEFT JOIN tbl02_pendaftaran_batal b ON a.reg_unit=b.reg_unit*/
        WHERE id_ruang = '9' AND (nomr = '' OR a.id_daftar LIKE '%%' OR a.reg_unit LIKE '%%') ORDER BY tgl_masuk DESC
ERROR - 2021-01-21 05:56:41 --> Query error: Unknown column 'b.user_id' in 'field list' - Invalid query: SELECT a.idx,a.id_daftar,a.reg_unit,a.tgl_masuk,a.nomr,a.nama_pasien,
        a.namaDokterJaga,a.nama_ruang,a.tgl_lahir,a.jns_kelamin,a.cara_bayar,a.id_ruang ,IF(IFNULL(b.user_id,TRUE),'Active',CONCAT('Batal
',b.tgl_created)) AS State,
        b.user_id AS userBatal 
        FROM tbl02_pendaftaran a 
        WHERE id_ruang = '9' AND DATE_FORMAT(tgl_masuk,'%Y-%m-%d') = DATE_FORMAT(NOW(),'%Y-%m-%d') ORDER BY tgl_masuk DESC
ERROR - 2021-01-21 05:57:51 --> Query error: Unknown column 'b.user_id' in 'field list' - Invalid query: SELECT a.idx,a.id_daftar,a.reg_unit,a.tgl_masuk,a.nomr,a.nama_pasien,
        a.namaDokterJaga,a.nama_ruang,a.tgl_lahir,a.jns_kelamin,a.cara_bayar,a.id_ruang ,'' AS State,
        b.user_id AS userBatal 
        FROM tbl02_pendaftaran a 
        WHERE id_ruang = '9' AND DATE_FORMAT(tgl_masuk,'%Y-%m-%d') = DATE_FORMAT(NOW(),'%Y-%m-%d') ORDER BY tgl_masuk DESC
ERROR - 2021-01-21 05:58:19 --> Query error: Unknown column 'a.user_id' in 'field list' - Invalid query: SELECT a.idx,a.id_daftar,a.reg_unit,a.tgl_masuk,a.nomr,a.nama_pasien,
        a.namaDokterJaga,a.nama_ruang,a.tgl_lahir,a.jns_kelamin,a.cara_bayar,a.id_ruang ,'' AS State,
        a.user_id AS userBatal 
        FROM tbl02_pendaftaran a 
        WHERE id_ruang = '9' AND DATE_FORMAT(tgl_masuk,'%Y-%m-%d') = DATE_FORMAT(NOW(),'%Y-%m-%d') ORDER BY tgl_masuk DESC
ERROR - 2021-01-21 06:05:50 --> Query error: Unknown column 'a.idx' in 'field list' - Invalid query: SELECT a.idx,a.id_daftar,a.reg_unit,a.tgl_masuk,a.nomr,a.nama_pasien,
        a.namaDokterJaga,a.nama_ruang,a.tgl_lahir,a.jns_kelamin,a.cara_bayar,a.id_ruang ,'' AS State,
        '' AS userBatal 
        FROM tbl02_pendaftaran
        WHERE id_ruang = '9' AND (nomr = '' OR a.id_daftar LIKE '%%' OR a.reg_unit LIKE '%%') ORDER BY tgl_masuk DESC
ERROR - 2021-01-21 06:05:52 --> Query error: Unknown column 'a.idx' in 'field list' - Invalid query: SELECT a.idx,a.id_daftar,a.reg_unit,a.tgl_masuk,a.nomr,a.nama_pasien,
        a.namaDokterJaga,a.nama_ruang,a.tgl_lahir,a.jns_kelamin,a.cara_bayar,a.id_ruang ,'' AS State,
        '' AS userBatal 
        FROM tbl02_pendaftaran
        WHERE id_ruang = '9' AND (nomr = '' OR a.id_daftar LIKE '%%' OR a.reg_unit LIKE '%%') ORDER BY tgl_masuk DESC
ERROR - 2021-01-21 06:06:14 --> Query error: Unknown column 'a.idx' in 'field list' - Invalid query: SELECT a.idx,a.id_daftar,a.reg_unit,a.tgl_masuk,a.nomr,a.nama_pasien,
        a.namaDokterJaga,a.nama_ruang,a.tgl_lahir,a.jns_kelamin,a.cara_bayar,a.id_ruang ,'' AS State,
        '' AS userBatal 
        FROM tbl02_pendaftaran
        WHERE id_ruang = '9' AND (nomr = '' OR a.id_daftar LIKE '%%' OR a.reg_unit LIKE '%%') ORDER BY tgl_masuk DESC
ERROR - 2021-01-21 08:19:06 --> Severity: Error --> Maximum execution time of 30 seconds exceeded C:\xampp32\htdocs\simrs\system\database\drivers\mysqli\mysqli_driver.php 307
