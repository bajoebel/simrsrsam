<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2023-01-03 04:17:07 --> Severity: Notice --> Undefined index: tgl_masuk C:\laragon\www\simrs_vclaim\application\mr_registrasi\views\cetak\v_suratmasukigd.php 291
ERROR - 2023-01-03 04:17:07 --> Severity: Notice --> Undefined offset: -1 C:\laragon\www\simrs_vclaim\application\mr_registrasi\views\cetak\v_suratmasukigd.php 8
ERROR - 2023-01-03 04:19:06 --> Severity: Notice --> Undefined index: tgl_masuk C:\laragon\www\simrs_vclaim\application\mr_registrasi\views\cetak\v_suratmasukigd.php 291
ERROR - 2023-01-03 04:19:06 --> Severity: Notice --> Undefined offset: -1 C:\laragon\www\simrs_vclaim\application\mr_registrasi\views\cetak\v_suratmasukigd.php 8
ERROR - 2023-01-03 07:06:28 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ',a.jns_layanan,IF(IFNULL(b.user_id,TRUE),'Active',CONCAT('Batal
',b.tgl_created)' at line 1 - Invalid query: SELECT a.idx,a.id_daftar,a.reg_unit,a.tgl_masuk,a.nomr,a.nama_pasien,a.nama_ruang,a.cara_bayar,a.no_bppjs,,a.jns_layanan,IF(IFNULL(b.user_id,TRUE),'Active',CONCAT('Batal
',b.tgl_created)) AS State,
        b.user_id AS userBatal,a.user_daftar 
        FROM tbl02_pendaftaran a LEFT JOIN tbl02_pendaftaran_batal b ON a.reg_unit=b.reg_unit
        WHERE  DATE_FORMAT(tgl_masuk,'%Y-%m-%d') BETWEEN '2023-01-03' AND '2023-01-03' AND    jns_layanan = 'RJ' AND   (nomr LIKE '%%' OR nama_pasien LIKE '%%' OR a.id_daftar LIKE '%%' OR nama_ruang LIKE '%%' OR cara_bayar LIKE '%%' OR jns_layanan LIKE '%%' )
        ORDER BY idx DESC
ERROR - 2023-01-03 07:06:38 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ',a.jns_layanan,IF(IFNULL(b.user_id,TRUE),'Active',CONCAT('Batal
',b.tgl_created)' at line 1 - Invalid query: SELECT a.idx,a.id_daftar,a.reg_unit,a.tgl_masuk,a.nomr,a.nama_pasien,a.nama_ruang,a.cara_bayar,a.no_bppjs,,a.jns_layanan,IF(IFNULL(b.user_id,TRUE),'Active',CONCAT('Batal
',b.tgl_created)) AS State,
        b.user_id AS userBatal,a.user_daftar 
        FROM tbl02_pendaftaran a LEFT JOIN tbl02_pendaftaran_batal b ON a.reg_unit=b.reg_unit
        WHERE  DATE_FORMAT(tgl_masuk,'%Y-%m-%d') BETWEEN '2023-01-03' AND '2023-01-03' AND    jns_layanan = 'RJ' AND   (nomr LIKE '%%' OR nama_pasien LIKE '%%' OR a.id_daftar LIKE '%%' OR nama_ruang LIKE '%%' OR cara_bayar LIKE '%%' OR jns_layanan LIKE '%%' )
        ORDER BY idx DESC
ERROR - 2023-01-03 07:07:22 --> Query error: Unknown column 'a.no_bppjs' in 'field list' - Invalid query: SELECT a.idx,a.id_daftar,a.reg_unit,a.tgl_masuk,a.nomr,a.nama_pasien,a.nama_ruang,a.cara_bayar,a.no_bppjs,a.jns_layanan,IF(IFNULL(b.user_id,TRUE),'Active',CONCAT('Batal
',b.tgl_created)) AS State,
        b.user_id AS userBatal,a.user_daftar 
        FROM tbl02_pendaftaran a LEFT JOIN tbl02_pendaftaran_batal b ON a.reg_unit=b.reg_unit
        WHERE  DATE_FORMAT(tgl_masuk,'%Y-%m-%d') BETWEEN '2023-01-03' AND '2023-01-03' AND    jns_layanan = 'RJ' AND   (nomr LIKE '%%' OR nama_pasien LIKE '%%' OR a.id_daftar LIKE '%%' OR nama_ruang LIKE '%%' OR cara_bayar LIKE '%%' OR jns_layanan LIKE '%%' )
        ORDER BY idx DESC
