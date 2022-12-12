<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2020-05-13 07:17:23 --> Severity: Notice --> Undefined variable: ruangID D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\list_nota_tagihan\template_igd.php 30
ERROR - 2020-05-13 07:17:24 --> Severity: Notice --> Undefined variable: ruangID D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\list_nota_tagihan\template_igd.php 42
ERROR - 2020-05-13 07:22:22 --> Severity: error --> Exception: syntax error, unexpected 'WHERE' (T_STRING) D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\list_nota_tagihan.php 175
ERROR - 2020-05-13 07:22:46 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'b.jns_layanan='GD'GROUP BY a.reg_unit LIMIT 20' at line 2 - Invalid query: SELECT a.*,b.nama_pasien,b.nama_ruang,SUM(sub_total_tarif) AS subTotal 
        FROM tbl03_nota_detail a LEFT JOIN tbl02_pendaftaran b ON a.reg_unit=b.reg_unitWHERE b.jns_layanan='GD'GROUP BY a.reg_unit LIMIT 20
ERROR - 2020-05-13 07:22:48 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'b.jns_layanan='GD'GROUP BY a.reg_unit LIMIT 20' at line 2 - Invalid query: SELECT a.*,b.nama_pasien,b.nama_ruang,SUM(sub_total_tarif) AS subTotal 
        FROM tbl03_nota_detail a LEFT JOIN tbl02_pendaftaran b ON a.reg_unit=b.reg_unitWHERE b.jns_layanan='GD'GROUP BY a.reg_unit LIMIT 20
ERROR - 2020-05-13 07:23:16 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'b.jns_layanan='GD'GROUP BY a.reg_unit LIMIT 20' at line 2 - Invalid query: SELECT a.*,b.nama_pasien,b.nama_ruang,SUM(sub_total_tarif) AS subTotal 
        FROM tbl03_nota_detail a LEFT JOIN tbl02_pendaftaran b ON a.reg_unit=b.reg_unitWHERE b.jns_layanan='GD'GROUP BY a.reg_unit LIMIT 20
ERROR - 2020-05-13 07:23:17 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'b.jns_layanan='GD'GROUP BY a.reg_unit LIMIT 20' at line 2 - Invalid query: SELECT a.*,b.nama_pasien,b.nama_ruang,SUM(sub_total_tarif) AS subTotal 
        FROM tbl03_nota_detail a LEFT JOIN tbl02_pendaftaran b ON a.reg_unit=b.reg_unitWHERE b.jns_layanan='GD'GROUP BY a.reg_unit LIMIT 20
ERROR - 2020-05-13 07:23:19 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'b.jns_layanan='GD'GROUP BY a.reg_unit LIMIT 20' at line 2 - Invalid query: SELECT a.*,b.nama_pasien,b.nama_ruang,SUM(sub_total_tarif) AS subTotal 
        FROM tbl03_nota_detail a LEFT JOIN tbl02_pendaftaran b ON a.reg_unit=b.reg_unitWHERE b.jns_layanan='GD'GROUP BY a.reg_unit LIMIT 20
ERROR - 2020-05-13 09:04:27 --> Severity: Notice --> Undefined property: stdClass::$status_transksi D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\template_pulang.php 171
ERROR - 2020-05-13 09:06:47 --> Query error: Unknown column 'id_tarif' in 'field list' - Invalid query: SELECT id_tarif FROM tbl02_temp_permintaan_tindakan_penunjang WHERE id_daftar='2020000013' AND reg_unit='RI-200513-57-0001'
ERROR - 2020-05-13 09:06:47 --> Query error: Unknown column 'id_tarif' in 'on clause' - Invalid query: SELECT *
FROM `tbl02_temp_permintaan_tindakan_penunjang`
JOIN `tbl01_tarif_layanan` ON `id_tarif`=`idx`
WHERE `id_daftar` = '2020000013'
AND `reg_unit` = 'RI-200513-57-0001'
AND   (
`tbl01_tarif_layanan`.`layanan` LIKE '%%' ESCAPE '!'
 )
