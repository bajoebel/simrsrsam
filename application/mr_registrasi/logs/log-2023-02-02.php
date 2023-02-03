<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2023-02-02 07:46:18 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '==tgl_daftar) THEN 'Pasien Baru' ELSE 'Pasien Lama') AS jns_pasien
        FROM' at line 3 - Invalid query: SELECT a.idx,a.id_daftar,a.reg_unit,a.tgl_masuk,a.nomr,a.nama_pasien,a.nama_ruang,a.cara_bayar,a.no_bpjs,a.jns_layanan,IF(IFNULL(b.user_id,TRUE),'Active',CONCAT('Batal
',b.tgl_created)) AS State,
        b.user_id AS userBatal,a.user_daftar,a.namaDokterJaga,(CASE WHEN (DATE_FORMAT(tgl_masuk,'%Y-%m-%d')==tgl_daftar) THEN 'Pasien Baru' ELSE 'Pasien Lama') AS jns_pasien
        FROM tbl02_pendaftaran a LEFT JOIN tbl02_pendaftaran_batal b ON a.reg_unit=b.reg_unit
        WHERE  DATE_FORMAT(tgl_masuk,'%Y-%m-%d') BETWEEN '2023-02-02' AND '2023-02-02' AND    jns_layanan = 'RJ' AND   (nomr LIKE '%%' OR nama_pasien LIKE '%%' OR a.id_daftar LIKE '%%' OR nama_ruang LIKE '%%' OR cara_bayar LIKE '%%' OR jns_layanan LIKE '%%' )
        ORDER BY idx DESC
ERROR - 2023-02-02 07:46:21 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '==tgl_daftar) THEN 'Pasien Baru' ELSE 'Pasien Lama') AS jns_pasien
        FROM' at line 3 - Invalid query: SELECT a.idx,a.id_daftar,a.reg_unit,a.tgl_masuk,a.nomr,a.nama_pasien,a.nama_ruang,a.cara_bayar,a.no_bpjs,a.jns_layanan,IF(IFNULL(b.user_id,TRUE),'Active',CONCAT('Batal
',b.tgl_created)) AS State,
        b.user_id AS userBatal,a.user_daftar,a.namaDokterJaga,(CASE WHEN (DATE_FORMAT(tgl_masuk,'%Y-%m-%d')==tgl_daftar) THEN 'Pasien Baru' ELSE 'Pasien Lama') AS jns_pasien
        FROM tbl02_pendaftaran a LEFT JOIN tbl02_pendaftaran_batal b ON a.reg_unit=b.reg_unit
        WHERE  DATE_FORMAT(tgl_masuk,'%Y-%m-%d') BETWEEN '2023-02-02' AND '2023-02-02' AND    jns_layanan = 'RJ' AND   (nomr LIKE '%%' OR nama_pasien LIKE '%%' OR a.id_daftar LIKE '%%' OR nama_ruang LIKE '%%' OR cara_bayar LIKE '%%' OR jns_layanan LIKE '%%' )
        ORDER BY idx DESC
ERROR - 2023-02-02 07:46:42 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '==tgl_daftar) THEN 'Pasien Baru' ELSE 'Pasien Lama') AS jns_pasien
        FROM' at line 3 - Invalid query: SELECT a.idx,a.id_daftar,a.reg_unit,a.tgl_masuk,a.nomr,a.nama_pasien,a.nama_ruang,a.cara_bayar,a.no_bpjs,a.jns_layanan,IF(IFNULL(b.user_id,TRUE),'Active',CONCAT('Batal
',b.tgl_created)) AS State,
        b.user_id AS userBatal,a.user_daftar,a.namaDokterJaga,(CASE WHEN (DATE_FORMAT(tgl_masuk,'%Y-%m-%d')==tgl_daftar) THEN 'Pasien Baru' ELSE 'Pasien Lama') AS jns_pasien
        FROM tbl02_pendaftaran a LEFT JOIN tbl02_pendaftaran_batal b ON a.reg_unit=b.reg_unit
        WHERE  DATE_FORMAT(tgl_masuk,'%Y-%m-%d') BETWEEN '2023-02-02' AND '2023-02-02' AND    jns_layanan = 'RJ' AND   (nomr LIKE '%%' OR nama_pasien LIKE '%%' OR a.id_daftar LIKE '%%' OR nama_ruang LIKE '%%' OR cara_bayar LIKE '%%' OR jns_layanan LIKE '%%' )
        ORDER BY idx DESC
ERROR - 2023-02-02 07:47:13 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') AS jns_pasien
        FROM tbl02_pendaftaran a LEFT JOIN tbl02_pendaftaran_ba' at line 3 - Invalid query: SELECT a.idx,a.id_daftar,a.reg_unit,a.tgl_masuk,a.nomr,a.nama_pasien,a.nama_ruang,a.cara_bayar,a.no_bpjs,a.jns_layanan,IF(IFNULL(b.user_id,TRUE),'Active',CONCAT('Batal
',b.tgl_created)) AS State,
        b.user_id AS userBatal,a.user_daftar,a.namaDokterJaga,(CASE WHEN (DATE_FORMAT(tgl_masuk,'%Y-%m-%d')=tgl_daftar) THEN 'Pasien Baru' ELSE 'Pasien Lama') AS jns_pasien
        FROM tbl02_pendaftaran a LEFT JOIN tbl02_pendaftaran_batal b ON a.reg_unit=b.reg_unit
        WHERE  DATE_FORMAT(tgl_masuk,'%Y-%m-%d') BETWEEN '2023-02-02' AND '2023-02-02' AND    jns_layanan = 'RJ' AND   (nomr LIKE '%%' OR nama_pasien LIKE '%%' OR a.id_daftar LIKE '%%' OR nama_ruang LIKE '%%' OR cara_bayar LIKE '%%' OR jns_layanan LIKE '%%' )
        ORDER BY idx DESC
ERROR - 2023-02-02 07:48:02 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') AS jns_pasien
        FROM tbl02_pendaftaran a LEFT JOIN tbl02_pendaftaran_ba' at line 3 - Invalid query: SELECT a.idx,a.id_daftar,a.reg_unit,a.tgl_masuk,a.nomr,a.nama_pasien,a.nama_ruang,a.cara_bayar,a.no_bpjs,a.jns_layanan,IF(IFNULL(b.user_id,TRUE),'Active',CONCAT('Batal
',b.tgl_created)) AS State,
        b.user_id AS userBatal,a.user_daftar,a.namaDokterJaga,(CASE WHEN (DATE_FORMAT(tgl_masuk,'%Y-%m-%d')=tgl_daftar) THEN 'Pasien Baru' ELSE 'Pasien Lama') AS jns_pasien
        FROM tbl02_pendaftaran a LEFT JOIN tbl02_pendaftaran_batal b ON a.reg_unit=b.reg_unit
        WHERE  DATE_FORMAT(tgl_masuk,'%Y-%m-%d') BETWEEN '2023-02-02' AND '2023-02-02' AND    jns_layanan = 'RJ' AND   (nomr LIKE '%%' OR nama_pasien LIKE '%%' OR a.id_daftar LIKE '%%' OR nama_ruang LIKE '%%' OR cara_bayar LIKE '%%' OR jns_layanan LIKE '%%' )
        ORDER BY idx DESC
ERROR - 2023-02-02 07:48:17 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') AS jns_pasien
        FROM tbl02_pendaftaran a LEFT JOIN tbl02_pendaftaran_ba' at line 3 - Invalid query: SELECT a.idx,a.id_daftar,a.reg_unit,a.tgl_masuk,a.nomr,a.nama_pasien,a.nama_ruang,a.cara_bayar,a.no_bpjs,a.jns_layanan,IF(IFNULL(b.user_id,TRUE),'Active',CONCAT('Batal
',b.tgl_created)) AS State,
        b.user_id AS userBatal,a.user_daftar,a.namaDokterJaga,(CASE WHEN (DATE_FORMAT(tgl_masuk,'%Y-%m-%d')=tgl_daftar) THEN 'Pasien Baru' ELSE 'Pasien Lama') AS jns_pasien
        FROM tbl02_pendaftaran a LEFT JOIN tbl02_pendaftaran_batal b ON a.reg_unit=b.reg_unit
        WHERE  DATE_FORMAT(tgl_masuk,'%Y-%m-%d') BETWEEN '2023-02-02' AND '2023-02-02' AND    jns_layanan = 'RJ' AND   (nomr LIKE '%%' OR nama_pasien LIKE '%%' OR a.id_daftar LIKE '%%' OR nama_ruang LIKE '%%' OR cara_bayar LIKE '%%' OR jns_layanan LIKE '%%' )
        ORDER BY idx DESC
ERROR - 2023-02-02 07:50:38 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'THEN 'Pasien Baru' ELSE 'Pasien Lama' END) AS jns_pasien
        FROM tbl02_pen' at line 3 - Invalid query: SELECT a.idx,a.id_daftar,a.reg_unit,a.tgl_masuk,a.nomr,a.nama_pasien,a.nama_ruang,a.cara_bayar,a.no_bpjs,a.jns_layanan,IF(IFNULL(b.user_id,TRUE),'Active',CONCAT('Batal
',b.tgl_created)) AS State,
        b.user_id AS userBatal,a.user_daftar,a.namaDokterJaga,CASE WHEN (DATE_FORMAT(tgl_masuk,'%Y-%m-%d')=tgl_daftar THEN 'Pasien Baru' ELSE 'Pasien Lama' END) AS jns_pasien
        FROM tbl02_pendaftaran a LEFT JOIN tbl02_pendaftaran_batal b ON a.reg_unit=b.reg_unit
        WHERE  DATE_FORMAT(tgl_masuk,'%Y-%m-%d') BETWEEN '2023-02-02' AND '2023-02-02' AND    jns_layanan = 'RJ' AND   (nomr LIKE '%%' OR nama_pasien LIKE '%%' OR a.id_daftar LIKE '%%' OR nama_ruang LIKE '%%' OR cara_bayar LIKE '%%' OR jns_layanan LIKE '%%' )
        ORDER BY idx DESC
