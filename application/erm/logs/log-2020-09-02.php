<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2020-09-02 10:00:23 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0' at line 3 - Invalid query: SELECT *
FROM `tbl02_notifikasi_transaksi`
WHERE `notif_tujuan` IN()
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0
ERROR - 2020-09-02 10:01:23 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0' at line 3 - Invalid query: SELECT *
FROM `tbl02_notifikasi_transaksi`
WHERE `notif_tujuan` IN()
AND `notif_jenis` = 'RG'
AND `notif_baca` = 0
ERROR - 2020-09-02 10:08:34 --> Query error: Unknown column 'id_tarif' in 'field list' - Invalid query: SELECT id_tarif FROM tbl02_temp_permintaan_tindakan_penunjang WHERE id_daftar='2020047734' AND reg_unit='RI-200902-57-0001'
ERROR - 2020-09-02 10:08:34 --> Query error: Unknown column 'id_tarif' in 'on clause' - Invalid query: SELECT *
FROM `tbl02_temp_permintaan_tindakan_penunjang`
JOIN `tbl01_tarif_layanan` ON `id_tarif`=`idx`
WHERE `id_daftar` = '2020047734'
AND `reg_unit` = 'RI-200902-57-0001'
AND   (
`tbl01_tarif_layanan`.`layanan` LIKE '%%' ESCAPE '!'
 )
ERROR - 2020-09-02 10:09:01 --> Severity: Warning --> Illegal string offset 'no_ktp' D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 150
ERROR - 2020-09-02 10:09:01 --> Severity: Notice --> Uninitialized string offset: 0 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 150
ERROR - 2020-09-02 10:09:01 --> Severity: Warning --> Illegal string offset 'tempat_lahir' D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 152
ERROR - 2020-09-02 10:09:01 --> Severity: Notice --> Uninitialized string offset: 0 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 152
ERROR - 2020-09-02 10:09:01 --> Severity: Warning --> Illegal string offset 'tgl_lahir' D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 153
ERROR - 2020-09-02 10:09:01 --> Severity: Notice --> Uninitialized string offset: 0 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 153
ERROR - 2020-09-02 10:09:01 --> Severity: Warning --> Illegal string offset 'jns_kelamin' D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 154
ERROR - 2020-09-02 10:09:01 --> Severity: Notice --> Uninitialized string offset: 0 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 154
ERROR - 2020-09-02 10:09:01 --> Severity: Warning --> Illegal string offset 'id_cara_bayar' D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 165
ERROR - 2020-09-02 10:09:01 --> Severity: Notice --> Uninitialized string offset: 0 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 165
ERROR - 2020-09-02 10:09:01 --> Severity: Warning --> Illegal string offset 'cara_bayar' D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 166
ERROR - 2020-09-02 10:09:01 --> Severity: Notice --> Uninitialized string offset: 0 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 166
ERROR - 2020-09-02 10:09:01 --> Severity: Warning --> Illegal string offset 'no_bpjs' D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 167
ERROR - 2020-09-02 10:09:01 --> Severity: Notice --> Uninitialized string offset: 0 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 167
ERROR - 2020-09-02 10:09:01 --> Severity: Warning --> Illegal string offset 'no_jaminan' D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 168
ERROR - 2020-09-02 10:09:01 --> Severity: Notice --> Uninitialized string offset: 0 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 168
ERROR - 2020-09-02 10:09:01 --> Severity: Warning --> Illegal string offset 'tgl_jaminan' D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 169
ERROR - 2020-09-02 10:09:01 --> Severity: Notice --> Uninitialized string offset: 0 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 169
ERROR - 2020-09-02 10:09:01 --> Severity: Warning --> Illegal string offset 'id_kelas' D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 170
ERROR - 2020-09-02 10:09:01 --> Severity: Notice --> Uninitialized string offset: 0 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 170
ERROR - 2020-09-02 10:09:01 --> Severity: Warning --> Illegal string offset 'kelas_layanan' D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 171
ERROR - 2020-09-02 10:09:01 --> Severity: Notice --> Uninitialized string offset: 0 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 171
ERROR - 2020-09-02 10:09:01 --> Severity: Warning --> Illegal string offset 'pjPasienNama' D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 172
ERROR - 2020-09-02 10:09:01 --> Severity: Notice --> Uninitialized string offset: 0 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 172
ERROR - 2020-09-02 10:09:01 --> Severity: Warning --> Illegal string offset 'pjPasienUmur' D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 173
ERROR - 2020-09-02 10:09:01 --> Severity: Notice --> Uninitialized string offset: 0 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 173
ERROR - 2020-09-02 10:09:01 --> Severity: Warning --> Illegal string offset 'pjPasienPekerjaan' D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 174
ERROR - 2020-09-02 10:09:01 --> Severity: Notice --> Uninitialized string offset: 0 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 174
ERROR - 2020-09-02 10:09:01 --> Severity: Warning --> Illegal string offset 'pjPasienAlamat' D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 175
ERROR - 2020-09-02 10:09:01 --> Severity: Notice --> Uninitialized string offset: 0 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 175
ERROR - 2020-09-02 10:09:01 --> Severity: Warning --> Illegal string offset 'pjPasienTelp' D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 176
ERROR - 2020-09-02 10:09:01 --> Severity: Notice --> Uninitialized string offset: 0 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 176
ERROR - 2020-09-02 10:09:01 --> Severity: Warning --> Illegal string offset 'pjPasienHubKel' D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 177
ERROR - 2020-09-02 10:09:01 --> Severity: Notice --> Uninitialized string offset: 0 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 177
ERROR - 2020-09-02 10:09:01 --> Severity: Warning --> Illegal string offset 'pjPasienDikirimOleh' D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 178
ERROR - 2020-09-02 10:09:01 --> Severity: Notice --> Uninitialized string offset: 0 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 178
ERROR - 2020-09-02 10:09:01 --> Severity: Warning --> Illegal string offset 'pjPasienAlmtPengirim' D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 179
ERROR - 2020-09-02 10:09:01 --> Severity: Notice --> Uninitialized string offset: 0 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 179
ERROR - 2020-09-02 10:09:06 --> Severity: Warning --> Illegal string offset 'no_ktp' D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 150
ERROR - 2020-09-02 10:09:06 --> Severity: Notice --> Uninitialized string offset: 0 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 150
ERROR - 2020-09-02 10:09:06 --> Severity: Warning --> Illegal string offset 'tempat_lahir' D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 152
ERROR - 2020-09-02 10:09:06 --> Severity: Notice --> Uninitialized string offset: 0 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 152
ERROR - 2020-09-02 10:09:06 --> Severity: Warning --> Illegal string offset 'tgl_lahir' D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 153
ERROR - 2020-09-02 10:09:06 --> Severity: Notice --> Uninitialized string offset: 0 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 153
ERROR - 2020-09-02 10:09:06 --> Severity: Warning --> Illegal string offset 'jns_kelamin' D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 154
ERROR - 2020-09-02 10:09:06 --> Severity: Notice --> Uninitialized string offset: 0 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 154
ERROR - 2020-09-02 10:09:06 --> Severity: Warning --> Illegal string offset 'id_cara_bayar' D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 165
ERROR - 2020-09-02 10:09:06 --> Severity: Notice --> Uninitialized string offset: 0 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 165
ERROR - 2020-09-02 10:09:06 --> Severity: Warning --> Illegal string offset 'cara_bayar' D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 166
ERROR - 2020-09-02 10:09:06 --> Severity: Notice --> Uninitialized string offset: 0 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 166
ERROR - 2020-09-02 10:09:06 --> Severity: Warning --> Illegal string offset 'no_bpjs' D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 167
ERROR - 2020-09-02 10:09:06 --> Severity: Notice --> Uninitialized string offset: 0 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 167
ERROR - 2020-09-02 10:09:06 --> Severity: Warning --> Illegal string offset 'no_jaminan' D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 168
ERROR - 2020-09-02 10:09:06 --> Severity: Notice --> Uninitialized string offset: 0 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 168
ERROR - 2020-09-02 10:09:06 --> Severity: Warning --> Illegal string offset 'tgl_jaminan' D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 169
ERROR - 2020-09-02 10:09:06 --> Severity: Notice --> Uninitialized string offset: 0 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 169
ERROR - 2020-09-02 10:09:06 --> Severity: Warning --> Illegal string offset 'id_kelas' D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 170
ERROR - 2020-09-02 10:09:06 --> Severity: Notice --> Uninitialized string offset: 0 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 170
ERROR - 2020-09-02 10:09:06 --> Severity: Warning --> Illegal string offset 'kelas_layanan' D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 171
ERROR - 2020-09-02 10:09:06 --> Severity: Notice --> Uninitialized string offset: 0 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 171
ERROR - 2020-09-02 10:09:06 --> Severity: Warning --> Illegal string offset 'pjPasienNama' D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 172
ERROR - 2020-09-02 10:09:06 --> Severity: Notice --> Uninitialized string offset: 0 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 172
ERROR - 2020-09-02 10:09:06 --> Severity: Warning --> Illegal string offset 'pjPasienUmur' D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 173
ERROR - 2020-09-02 10:09:06 --> Severity: Notice --> Uninitialized string offset: 0 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 173
ERROR - 2020-09-02 10:09:06 --> Severity: Warning --> Illegal string offset 'pjPasienPekerjaan' D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 174
ERROR - 2020-09-02 10:09:06 --> Severity: Notice --> Uninitialized string offset: 0 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 174
ERROR - 2020-09-02 10:09:06 --> Severity: Warning --> Illegal string offset 'pjPasienAlamat' D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 175
ERROR - 2020-09-02 10:09:06 --> Severity: Notice --> Uninitialized string offset: 0 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 175
ERROR - 2020-09-02 10:09:06 --> Severity: Warning --> Illegal string offset 'pjPasienTelp' D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 176
ERROR - 2020-09-02 10:09:06 --> Severity: Notice --> Uninitialized string offset: 0 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 176
ERROR - 2020-09-02 10:09:06 --> Severity: Warning --> Illegal string offset 'pjPasienHubKel' D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 177
ERROR - 2020-09-02 10:09:06 --> Severity: Notice --> Uninitialized string offset: 0 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 177
ERROR - 2020-09-02 10:09:06 --> Severity: Warning --> Illegal string offset 'pjPasienDikirimOleh' D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 178
ERROR - 2020-09-02 10:09:06 --> Severity: Notice --> Uninitialized string offset: 0 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 178
ERROR - 2020-09-02 10:09:06 --> Severity: Warning --> Illegal string offset 'pjPasienAlmtPengirim' D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 179
ERROR - 2020-09-02 10:09:06 --> Severity: Notice --> Uninitialized string offset: 0 D:\xampp\htdocs\simrs_open_source\application\nota_tagihan\controllers\permintaan_penunjang.php 179
