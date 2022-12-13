<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2020-09-08 04:38:26 --> Severity: Notice --> Undefined variable: hak_akses D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\template_entry.php 196
ERROR - 2020-09-08 05:10:14 --> Severity: Notice --> Undefined variable: detail D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\nota_tagihan.php 3027
ERROR - 2020-09-08 05:10:14 --> Severity: Notice --> Trying to access array offset on value of type null D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\nota_tagihan.php 3027
ERROR - 2020-09-08 05:10:14 --> Severity: Notice --> Trying to get property 'jns_layanan' of non-object D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\nota_tagihan.php 3027
ERROR - 2020-09-08 05:10:14 --> Query error: Unknown column 'grid' in 'where clause' - Invalid query: SELECT `hak_aksi`
FROM `tbl01_acc_hakakses`
WHERE `grid` = '1'
AND `idlevel` = '4'
AND `idmodul` = '3'
AND `idmenu` = ''
ERROR - 2020-09-08 05:10:29 --> Query error: Unknown column 'grid' in 'where clause' - Invalid query: SELECT `hak_aksi`
FROM `tbl01_acc_hakakses`
WHERE `grid` = '1'
AND `idlevel` = '4'
AND `idmodul` = '3'
AND `idmenu` = 45
ERROR - 2020-09-08 05:35:04 --> Query error: Unknown column 'id_tarif' in 'on clause' - Invalid query: SELECT *
FROM `tbl02_temp_permintaan_tindakan_penunjang`
JOIN `tbl01_tarif_layanan` ON `id_tarif`=`idx`
WHERE `id_daftar` = '2020047734'
AND `reg_unit` = 'RI-200908-57-0001'
AND   (
`tbl01_tarif_layanan`.`layanan` LIKE '%%' ESCAPE '!'
 )
ERROR - 2020-09-08 05:35:04 --> Query error: Unknown column 'id_tarif' in 'field list' - Invalid query: SELECT id_tarif FROM tbl02_temp_permintaan_tindakan_penunjang WHERE id_daftar='2020047734' AND reg_unit='RI-200908-57-0001'
ERROR - 2020-09-08 05:35:23 --> Query error: Unknown column 'id_tarif' in 'field list' - Invalid query: SELECT id_tarif FROM tbl02_temp_permintaan_tindakan_penunjang WHERE id_daftar='2020047734' AND reg_unit='RI-200908-57-0001'
ERROR - 2020-09-08 05:35:23 --> Query error: Unknown column 'id_tarif' in 'on clause' - Invalid query: SELECT *
FROM `tbl02_temp_permintaan_tindakan_penunjang`
JOIN `tbl01_tarif_layanan` ON `id_tarif`=`idx`
WHERE `id_daftar` = '2020047734'
AND `reg_unit` = 'RI-200908-57-0001'
AND   (
`tbl01_tarif_layanan`.`layanan` LIKE '%%' ESCAPE '!'
 )
ERROR - 2020-09-08 05:38:05 --> Query error: Unknown column 'id_tarif' in 'on clause' - Invalid query: SELECT *
FROM `tbl02_temp_permintaan_tindakan_penunjang`
JOIN `tbl01_tarif_layanan` ON `id_tarif`=`idx`
WHERE `id_daftar` = '2020047734'
AND `reg_unit` = 'RI-200908-57-0001'
AND   (
`tbl01_tarif_layanan`.`layanan` LIKE '%%' ESCAPE '!'
 )
ERROR - 2020-09-08 05:38:05 --> Query error: Unknown column 'id_tarif' in 'field list' - Invalid query: SELECT id_tarif FROM tbl02_temp_permintaan_tindakan_penunjang WHERE id_daftar='2020047734' AND reg_unit='RI-200908-57-0001'
ERROR - 2020-09-08 05:46:51 --> Query error: Table 'db_simrs_v2.tbl02_permintaan_penunjang1' doesn't exist - Invalid query: SELECT * FROM tbl02_permintaan_penunjang1 WHERE id_penunjang='50' AND idx NOT IN (SELECT id_permintaan_penunjang FROM tbl02_permintaan_penunjang_response)
ERROR - 2020-09-08 05:49:55 --> Query error: Table 'db_simrs_v2.tbl02_permintaan_penunjang1' doesn't exist - Invalid query: SELECT * FROM tbl02_permintaan_penunjang1 WHERE id_penunjang = '50' AND DATE_FORMAT(tgl_minta,'%Y-%m-%d') = DATE_FORMAT(NOW(),'%Y-%m-%d') ORDER BY idx DESC
ERROR - 2020-09-08 05:50:14 --> Query error: Table 'db_simrs_v2.tbl02_permintaan_penunjang1' doesn't exist - Invalid query: SELECT * FROM tbl02_permintaan_penunjang1 WHERE id_penunjang = '50' AND DATE_FORMAT(tgl_minta,'%Y-%m-%d') = DATE_FORMAT(NOW(),'%Y-%m-%d') ORDER BY idx DESC
ERROR - 2020-09-08 05:50:17 --> Query error: Table 'db_simrs_v2.tbl02_permintaan_penunjang1' doesn't exist - Invalid query: SELECT * FROM tbl02_permintaan_penunjang1 WHERE id_penunjang = '50' AND DATE_FORMAT(tgl_minta,'%Y-%m-%d') = DATE_FORMAT(NOW(),'%Y-%m-%d') ORDER BY idx DESC
ERROR - 2020-09-08 05:52:07 --> Query error: Table 'db_simrs_v2.tbl02_permintaan_penunjang1' doesn't exist - Invalid query: SELECT * FROM tbl02_permintaan_penunjang1 WHERE id_penunjang = '50' AND (nomr = '' OR id_daftar LIKE '%%' OR reg_unit LIKE '%%') ORDER BY idx DESC
ERROR - 2020-09-08 05:53:06 --> Query error: Table 'db_simrs_v2.tbl02_permintaan_penunjang1' doesn't exist - Invalid query: SELECT * FROM tbl02_permintaan_penunjang1 WHERE id_penunjang = '50' AND (nomr = '303002' OR id_daftar LIKE '%303002%' OR reg_unit LIKE '%303002%') ORDER BY idx DESC
ERROR - 2020-09-08 05:54:02 --> Severity: Warning --> Illegal string offset 'no_ktp' D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 150
ERROR - 2020-09-08 05:54:02 --> Severity: Notice --> Uninitialized string offset: 0 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 150
ERROR - 2020-09-08 05:54:02 --> Severity: Warning --> Illegal string offset 'tempat_lahir' D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 152
ERROR - 2020-09-08 05:54:02 --> Severity: Notice --> Uninitialized string offset: 0 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 152
ERROR - 2020-09-08 05:54:02 --> Severity: Warning --> Illegal string offset 'tgl_lahir' D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 153
ERROR - 2020-09-08 05:54:02 --> Severity: Notice --> Uninitialized string offset: 0 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 153
ERROR - 2020-09-08 05:54:02 --> Severity: Warning --> Illegal string offset 'jns_kelamin' D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 154
ERROR - 2020-09-08 05:54:02 --> Severity: Notice --> Uninitialized string offset: 0 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 154
ERROR - 2020-09-08 05:54:02 --> Severity: Warning --> Illegal string offset 'id_cara_bayar' D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 165
ERROR - 2020-09-08 05:54:02 --> Severity: Notice --> Uninitialized string offset: 0 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 165
ERROR - 2020-09-08 05:54:02 --> Severity: Warning --> Illegal string offset 'cara_bayar' D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 166
ERROR - 2020-09-08 05:54:02 --> Severity: Notice --> Uninitialized string offset: 0 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 166
ERROR - 2020-09-08 05:54:02 --> Severity: Warning --> Illegal string offset 'no_bpjs' D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 167
ERROR - 2020-09-08 05:54:02 --> Severity: Notice --> Uninitialized string offset: 0 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 167
ERROR - 2020-09-08 05:54:02 --> Severity: Warning --> Illegal string offset 'no_jaminan' D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 168
ERROR - 2020-09-08 05:54:02 --> Severity: Notice --> Uninitialized string offset: 0 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 168
ERROR - 2020-09-08 05:54:02 --> Severity: Warning --> Illegal string offset 'tgl_jaminan' D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 169
ERROR - 2020-09-08 05:54:02 --> Severity: Notice --> Uninitialized string offset: 0 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 169
ERROR - 2020-09-08 05:54:02 --> Severity: Warning --> Illegal string offset 'id_kelas' D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 170
ERROR - 2020-09-08 05:54:02 --> Severity: Notice --> Uninitialized string offset: 0 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 170
ERROR - 2020-09-08 05:54:02 --> Severity: Warning --> Illegal string offset 'kelas_layanan' D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 171
ERROR - 2020-09-08 05:54:02 --> Severity: Notice --> Uninitialized string offset: 0 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 171
ERROR - 2020-09-08 05:54:02 --> Severity: Warning --> Illegal string offset 'pjPasienNama' D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 172
ERROR - 2020-09-08 05:54:02 --> Severity: Notice --> Uninitialized string offset: 0 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 172
ERROR - 2020-09-08 05:54:02 --> Severity: Warning --> Illegal string offset 'pjPasienUmur' D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 173
ERROR - 2020-09-08 05:54:02 --> Severity: Notice --> Uninitialized string offset: 0 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 173
ERROR - 2020-09-08 05:54:02 --> Severity: Warning --> Illegal string offset 'pjPasienPekerjaan' D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 174
ERROR - 2020-09-08 05:54:02 --> Severity: Notice --> Uninitialized string offset: 0 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 174
ERROR - 2020-09-08 05:54:02 --> Severity: Warning --> Illegal string offset 'pjPasienAlamat' D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 175
ERROR - 2020-09-08 05:54:02 --> Severity: Notice --> Uninitialized string offset: 0 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 175
ERROR - 2020-09-08 05:54:02 --> Severity: Warning --> Illegal string offset 'pjPasienTelp' D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 176
ERROR - 2020-09-08 05:54:02 --> Severity: Notice --> Uninitialized string offset: 0 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 176
ERROR - 2020-09-08 05:54:02 --> Severity: Warning --> Illegal string offset 'pjPasienHubKel' D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 177
ERROR - 2020-09-08 05:54:02 --> Severity: Notice --> Uninitialized string offset: 0 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 177
ERROR - 2020-09-08 05:54:02 --> Severity: Warning --> Illegal string offset 'pjPasienDikirimOleh' D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 178
ERROR - 2020-09-08 05:54:02 --> Severity: Notice --> Uninitialized string offset: 0 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 178
ERROR - 2020-09-08 05:54:02 --> Severity: Warning --> Illegal string offset 'pjPasienAlmtPengirim' D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 179
ERROR - 2020-09-08 05:54:02 --> Severity: Notice --> Uninitialized string offset: 0 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 179
ERROR - 2020-09-08 10:45:28 --> Severity: Warning --> in_array() expects parameter 2 to be array, string given D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\template_hasil_pemeriksaan.php 35
ERROR - 2020-09-08 10:45:59 --> Severity: Warning --> in_array() expects parameter 2 to be array, string given D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\template_hasil_pemeriksaan.php 36
ERROR - 2020-09-08 10:47:10 --> Severity: Warning --> in_array() expects parameter 2 to be array, string given D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\template_hasil_pemeriksaan.php 36
ERROR - 2020-09-08 10:47:26 --> Severity: Warning --> in_array() expects parameter 2 to be array, string given D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\template_hasil_pemeriksaan.php 36
ERROR - 2020-09-08 10:57:35 --> Severity: Warning --> in_array() expects parameter 2 to be array, string given D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\template_hasil_pemeriksaan.php 36
ERROR - 2020-09-08 10:58:21 --> Severity: Warning --> in_array() expects parameter 2 to be array, string given D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\template_hasil_pemeriksaan.php 36
ERROR - 2020-09-08 10:58:22 --> Severity: Warning --> in_array() expects parameter 2 to be array, string given D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\template_hasil_pemeriksaan.php 36
ERROR - 2020-09-08 10:58:40 --> Severity: Warning --> in_array() expects parameter 2 to be array, string given D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\template_hasil_pemeriksaan.php 37
ERROR - 2020-09-08 10:59:00 --> Severity: Warning --> in_array() expects parameter 2 to be array, string given D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\views\nota_tagihan\template_hasil_pemeriksaan.php 37
