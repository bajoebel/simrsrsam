<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2020-07-02 10:35:32 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '.id_ruang ,IF(IFNULL(b.user_id,TRUE),'Active',CONCAT('Batal
',b.tgl_created)) AS' at line 2 - Invalid query: SELECT a.id_daftar,a.reg_unit,a.tgl_masuk,a.nomr,a.nama_pasien,
        a.namaDokterJaga,a.nama_ruang,a.tgl_lahir,a.jns_kelamin,a.cara_bayar.a.id_ruang ,IF(IFNULL(b.user_id,TRUE),'Active',CONCAT('Batal
',b.tgl_created)) AS State,
        b.user_id AS userBatal 
        FROM tbl02_pendaftaran a LEFT JOIN tbl02_pendaftaran_batal b ON a.reg_unit=b.reg_unit
        WHERE id_ruang = '60' AND DATE_FORMAT(tgl_masuk,'%Y-%m-%d') = DATE_FORMAT(NOW(),'%Y-%m-%d') ORDER BY tgl_masuk DESC
ERROR - 2020-07-02 10:35:39 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '.id_ruang ,IF(IFNULL(b.user_id,TRUE),'Active',CONCAT('Batal
',b.tgl_created)) AS' at line 2 - Invalid query: SELECT a.id_daftar,a.reg_unit,a.tgl_masuk,a.nomr,a.nama_pasien,
        a.namaDokterJaga,a.nama_ruang,a.tgl_lahir,a.jns_kelamin,a.cara_bayar.a.id_ruang ,IF(IFNULL(b.user_id,TRUE),'Active',CONCAT('Batal
',b.tgl_created)) AS State,
        b.user_id AS userBatal 
        FROM tbl02_pendaftaran a LEFT JOIN tbl02_pendaftaran_batal b ON a.reg_unit=b.reg_unit
        WHERE id_ruang = '60' AND (nomr = '' OR a.id_daftar LIKE '%%' OR a.reg_unit LIKE '%%') ORDER BY tgl_masuk DESC
ERROR - 2020-07-02 10:36:53 --> Severity: Notice --> Undefined index: idx D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\getDataKunjunganUnit.php 20
ERROR - 2020-07-02 10:44:23 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0' at line 3 - Invalid query: SELECT *
FROM `tbl02_notifikasi_transaksi`
WHERE `notif_tujuan` IN()
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0
