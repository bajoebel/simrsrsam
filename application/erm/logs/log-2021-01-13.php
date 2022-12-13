<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-01-13 03:30:22 --> Query error: Table 'db_simrs_v2.tbl02_pindah_ranap1' doesn't exist - Invalid query: SELECT `a`.*, `b`.`idx` as `idx_batal`
FROM `tbl02_pindah_ranap1` `a`
LEFT JOIN `tbl02_pindah_ranap_batal` `b` ON `a`.`idx` = `b`.`id_pindah_ranap`
WHERE `a`.`reg_unit` = 'RI-210112-66-0001'
AND `a`.`ruang_pengirim` = '66'
ORDER BY `idx` DESC
 LIMIT 1
ERROR - 2021-01-13 05:10:35 --> Query error: Table 'db_simrs_v2.tbl02_pindah_ranap1' doesn't exist - Invalid query: SELECT * FROM tbl02_pindah_ranap1 WHERE id_ruang = '58' AND DATE_FORMAT(tgl_minta,'%Y-%m-%d') = DATE_FORMAT(NOW(),'%Y-%m-%d') ORDER BY idx DESC
ERROR - 2021-01-13 05:14:17 --> Query error: Column 'idx' in order clause is ambiguous - Invalid query: SELECT * FROM tbl02_pindah_ranap a LEFT JOIN tbl02_pindah_ranap_batal b ON a.idx=b.id_pindah_ranap  WHERE id_ruang = '58' AND DATE_FORMAT(tgl_minta,'%Y-%m-%d') = DATE_FORMAT(NOW(),'%Y-%m-%d') ORDER BY idx DESC
ERROR - 2021-01-13 05:18:50 --> Query error: Column 'id_daftar' in where clause is ambiguous - Invalid query: SELECT a.*,b.idx as idx_batal FROM tbl02_pindah_ranap a LEFT JOIN tbl02_pindah_ranap_batal b ON a.idx=b.id_pindah_ranap  WHERE id_ruang = '58' AND (nomr = '' OR id_daftar LIKE '%%' OR reg_unit LIKE '%%') ORDER BY idx DESC
ERROR - 2021-01-13 05:29:04 --> Query error: Unknown column 'idx1' in 'order clause' - Invalid query: SELECT `a`.*, `b`.`idx` as `idx_batal`
FROM `tbl02_pindah_ranap` `a`
LEFT JOIN `tbl02_pindah_ranap_batal` `b` ON `a`.`idx` = `b`.`id_pindah_ranap`
WHERE `a`.`reg_unit` = 'RI-210112-66-0001'
AND `a`.`ruang_pengirim` = '66'
ORDER BY `idx1` DESC
 LIMIT 1
ERROR - 2021-01-13 08:04:32 --> Query error: Unknown column 's.jns_kelamin' in 'field list' - Invalid query: SELECT `b`.*, `a`.`nomr`, `a`.`no_ktp`, `a`.`no_bpjs`, `a`.`tempat_lahir`, `a`.`tgl_lahir`, `s`.`jns_kelamin`
FROM `tbl02_pendaftaran` `a`
JOIN `tbl02_pindah_ranap` `b` ON `a`.`reg_unit`=`b`.`reg_unit`
WHERE `idx` = '17'
ERROR - 2021-01-13 08:04:48 --> Query error: Column 'idx' in where clause is ambiguous - Invalid query: SELECT `b`.*, `a`.`nomr`, `a`.`no_ktp`, `a`.`no_bpjs`, `a`.`tempat_lahir`, `a`.`tgl_lahir`, `a`.`jns_kelamin`
FROM `tbl02_pendaftaran` `a`
JOIN `tbl02_pindah_ranap` `b` ON `a`.`reg_unit`=`b`.`reg_unit`
WHERE `idx` = '17'
ERROR - 2021-01-13 08:10:06 --> Severity: Notice --> Undefined property: stdClass::$tgl_buat C:\xampp32\htdocs\simrs\application\nota_tagihan\views\nota_tagihan\template_suratpindah.php 79
ERROR - 2021-01-13 08:10:06 --> Severity: Notice --> Undefined property: stdClass::$nomor_surat_kontrol C:\xampp32\htdocs\simrs\application\nota_tagihan\views\nota_tagihan\template_suratpindah.php 83
ERROR - 2021-01-13 08:10:06 --> Severity: Notice --> Undefined offset: 1 C:\xampp32\htdocs\simrs\application\nota_tagihan\views\nota_tagihan\template_suratpindah.php 83
ERROR - 2021-01-13 08:10:06 --> Severity: Notice --> Undefined property: stdClass::$nomor_surat_kontrol C:\xampp32\htdocs\simrs\application\nota_tagihan\views\nota_tagihan\template_suratpindah.php 88
ERROR - 2021-01-13 08:10:06 --> Severity: Notice --> Undefined property: stdClass::$diagnosa C:\xampp32\htdocs\simrs\application\nota_tagihan\views\nota_tagihan\template_suratpindah.php 94
ERROR - 2021-01-13 08:10:06 --> Severity: Notice --> Undefined property: stdClass::$terapi C:\xampp32\htdocs\simrs\application\nota_tagihan\views\nota_tagihan\template_suratpindah.php 97
ERROR - 2021-01-13 08:10:06 --> Severity: Notice --> Undefined property: stdClass::$tgl_rujukan C:\xampp32\htdocs\simrs\application\nota_tagihan\views\nota_tagihan\template_suratpindah.php 100
ERROR - 2021-01-13 08:10:06 --> Severity: Notice --> Undefined property: stdClass::$alasan_kontrol C:\xampp32\htdocs\simrs\application\nota_tagihan\views\nota_tagihan\template_suratpindah.php 106
ERROR - 2021-01-13 08:10:06 --> Severity: Notice --> Undefined property: stdClass::$rencana_tindaklanjut C:\xampp32\htdocs\simrs\application\nota_tagihan\views\nota_tagihan\template_suratpindah.php 118
ERROR - 2021-01-13 08:10:06 --> Severity: Notice --> Undefined property: stdClass::$tgl_kontrol C:\xampp32\htdocs\simrs\application\nota_tagihan\views\nota_tagihan\template_suratpindah.php 122
ERROR - 2021-01-13 08:10:06 --> Severity: Notice --> Undefined property: stdClass::$tgl_kontrol C:\xampp32\htdocs\simrs\application\nota_tagihan\views\nota_tagihan\template_suratpindah.php 123
ERROR - 2021-01-13 08:10:06 --> Severity: Notice --> Undefined offset: 2 C:\xampp32\htdocs\simrs\application\nota_tagihan\views\nota_tagihan\template_suratpindah.php 140
ERROR - 2021-01-13 08:10:06 --> Severity: Notice --> Undefined offset: 1 C:\xampp32\htdocs\simrs\application\nota_tagihan\views\nota_tagihan\template_suratpindah.php 140
ERROR - 2021-01-13 08:10:06 --> Severity: Notice --> Undefined offset: 2 C:\xampp32\htdocs\simrs\application\nota_tagihan\views\nota_tagihan\template_suratpindah.php 144
ERROR - 2021-01-13 08:10:06 --> Severity: Notice --> Undefined offset: 1 C:\xampp32\htdocs\simrs\application\nota_tagihan\views\nota_tagihan\template_suratpindah.php 144
ERROR - 2021-01-13 08:10:06 --> Severity: Notice --> Undefined property: stdClass::$nama_dokter C:\xampp32\htdocs\simrs\application\nota_tagihan\views\nota_tagihan\template_suratpindah.php 150
ERROR - 2021-01-13 08:12:55 --> Severity: Notice --> Undefined property: stdClass::$nomor_surat_kontrol C:\xampp32\htdocs\simrs\application\nota_tagihan\views\nota_tagihan\template_suratpindah.php 88
ERROR - 2021-01-13 08:12:55 --> Severity: Notice --> Undefined property: stdClass::$diagnosa C:\xampp32\htdocs\simrs\application\nota_tagihan\views\nota_tagihan\template_suratpindah.php 94
ERROR - 2021-01-13 08:12:55 --> Severity: Notice --> Undefined property: stdClass::$terapi C:\xampp32\htdocs\simrs\application\nota_tagihan\views\nota_tagihan\template_suratpindah.php 97
ERROR - 2021-01-13 08:12:55 --> Severity: Notice --> Undefined property: stdClass::$tgl_rujukan C:\xampp32\htdocs\simrs\application\nota_tagihan\views\nota_tagihan\template_suratpindah.php 100
ERROR - 2021-01-13 08:12:55 --> Severity: Notice --> Undefined property: stdClass::$alasan_kontrol C:\xampp32\htdocs\simrs\application\nota_tagihan\views\nota_tagihan\template_suratpindah.php 106
ERROR - 2021-01-13 08:12:55 --> Severity: Notice --> Undefined property: stdClass::$rencana_tindaklanjut C:\xampp32\htdocs\simrs\application\nota_tagihan\views\nota_tagihan\template_suratpindah.php 118
ERROR - 2021-01-13 08:12:55 --> Severity: Notice --> Undefined property: stdClass::$tgl_kontrol C:\xampp32\htdocs\simrs\application\nota_tagihan\views\nota_tagihan\template_suratpindah.php 122
ERROR - 2021-01-13 08:12:55 --> Severity: Notice --> Undefined property: stdClass::$tgl_kontrol C:\xampp32\htdocs\simrs\application\nota_tagihan\views\nota_tagihan\template_suratpindah.php 123
ERROR - 2021-01-13 08:12:55 --> Severity: Notice --> Undefined offset: 2 C:\xampp32\htdocs\simrs\application\nota_tagihan\views\nota_tagihan\template_suratpindah.php 140
ERROR - 2021-01-13 08:12:55 --> Severity: Notice --> Undefined offset: 1 C:\xampp32\htdocs\simrs\application\nota_tagihan\views\nota_tagihan\template_suratpindah.php 140
ERROR - 2021-01-13 08:12:55 --> Severity: Notice --> Undefined offset: 2 C:\xampp32\htdocs\simrs\application\nota_tagihan\views\nota_tagihan\template_suratpindah.php 144
ERROR - 2021-01-13 08:12:55 --> Severity: Notice --> Undefined offset: 1 C:\xampp32\htdocs\simrs\application\nota_tagihan\views\nota_tagihan\template_suratpindah.php 144
ERROR - 2021-01-13 08:12:55 --> Severity: Notice --> Undefined property: stdClass::$nama_dokter C:\xampp32\htdocs\simrs\application\nota_tagihan\views\nota_tagihan\template_suratpindah.php 150
ERROR - 2021-01-13 08:13:37 --> Severity: Notice --> Undefined property: stdClass::$diagnosa C:\xampp32\htdocs\simrs\application\nota_tagihan\views\nota_tagihan\template_suratpindah.php 94
ERROR - 2021-01-13 08:13:37 --> Severity: Notice --> Undefined property: stdClass::$terapi C:\xampp32\htdocs\simrs\application\nota_tagihan\views\nota_tagihan\template_suratpindah.php 97
ERROR - 2021-01-13 08:13:37 --> Severity: Notice --> Undefined property: stdClass::$tgl_rujukan C:\xampp32\htdocs\simrs\application\nota_tagihan\views\nota_tagihan\template_suratpindah.php 100
ERROR - 2021-01-13 08:13:37 --> Severity: Notice --> Undefined property: stdClass::$alasan_kontrol C:\xampp32\htdocs\simrs\application\nota_tagihan\views\nota_tagihan\template_suratpindah.php 106
ERROR - 2021-01-13 08:13:38 --> Severity: Notice --> Undefined property: stdClass::$rencana_tindaklanjut C:\xampp32\htdocs\simrs\application\nota_tagihan\views\nota_tagihan\template_suratpindah.php 118
ERROR - 2021-01-13 08:13:38 --> Severity: Notice --> Undefined property: stdClass::$tgl_kontrol C:\xampp32\htdocs\simrs\application\nota_tagihan\views\nota_tagihan\template_suratpindah.php 122
ERROR - 2021-01-13 08:13:38 --> Severity: Notice --> Undefined property: stdClass::$tgl_kontrol C:\xampp32\htdocs\simrs\application\nota_tagihan\views\nota_tagihan\template_suratpindah.php 123
ERROR - 2021-01-13 08:13:38 --> Severity: Notice --> Undefined offset: 2 C:\xampp32\htdocs\simrs\application\nota_tagihan\views\nota_tagihan\template_suratpindah.php 140
ERROR - 2021-01-13 08:13:38 --> Severity: Notice --> Undefined offset: 1 C:\xampp32\htdocs\simrs\application\nota_tagihan\views\nota_tagihan\template_suratpindah.php 140
ERROR - 2021-01-13 08:13:38 --> Severity: Notice --> Undefined offset: 2 C:\xampp32\htdocs\simrs\application\nota_tagihan\views\nota_tagihan\template_suratpindah.php 144
ERROR - 2021-01-13 08:13:38 --> Severity: Notice --> Undefined offset: 1 C:\xampp32\htdocs\simrs\application\nota_tagihan\views\nota_tagihan\template_suratpindah.php 144
ERROR - 2021-01-13 08:13:38 --> Severity: Notice --> Undefined property: stdClass::$nama_dokter C:\xampp32\htdocs\simrs\application\nota_tagihan\views\nota_tagihan\template_suratpindah.php 150
ERROR - 2021-01-13 08:24:42 --> Severity: Notice --> Undefined variable: bulan C:\xampp32\htdocs\simrs\application\nota_tagihan\views\nota_tagihan\template_suratpindah.php 121
ERROR - 2021-01-13 08:26:17 --> Severity: Notice --> Undefined variable: bulan C:\xampp32\htdocs\simrs\application\nota_tagihan\views\nota_tagihan\template_suratpindah.php 122
ERROR - 2021-01-13 10:07:06 --> Severity: Warning --> Missing argument 2 for Nota_model::getPindah(), called in C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Nota_tagihan.php on line 3325 and defined C:\xampp32\htdocs\simrs\application\nota_tagihan\models\Nota_model.php 142
ERROR - 2021-01-13 10:07:06 --> Severity: Notice --> Undefined variable: pengirim C:\xampp32\htdocs\simrs\application\nota_tagihan\models\Nota_model.php 146
ERROR - 2021-01-13 10:07:26 --> Severity: Warning --> Missing argument 2 for Nota_model::getPindah(), called in C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Nota_tagihan.php on line 3325 and defined C:\xampp32\htdocs\simrs\application\nota_tagihan\models\Nota_model.php 142
ERROR - 2021-01-13 10:07:26 --> Severity: Notice --> Undefined variable: pengirim C:\xampp32\htdocs\simrs\application\nota_tagihan\models\Nota_model.php 146
ERROR - 2021-01-13 10:07:35 --> Severity: Warning --> Missing argument 2 for Nota_model::getPindah(), called in C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Nota_tagihan.php on line 3436 and defined C:\xampp32\htdocs\simrs\application\nota_tagihan\models\Nota_model.php 142
ERROR - 2021-01-13 10:07:35 --> Severity: Notice --> Undefined variable: pengirim C:\xampp32\htdocs\simrs\application\nota_tagihan\models\Nota_model.php 146
ERROR - 2021-01-13 10:07:40 --> Severity: Warning --> Missing argument 2 for Nota_model::getPindah(), called in C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Nota_tagihan.php on line 1628 and defined C:\xampp32\htdocs\simrs\application\nota_tagihan\models\Nota_model.php 142
ERROR - 2021-01-13 10:07:40 --> Severity: Notice --> Undefined variable: pengirim C:\xampp32\htdocs\simrs\application\nota_tagihan\models\Nota_model.php 146
ERROR - 2021-01-13 10:07:55 --> Severity: Warning --> Missing argument 2 for Nota_model::getPindah(), called in C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Nota_tagihan.php on line 3325 and defined C:\xampp32\htdocs\simrs\application\nota_tagihan\models\Nota_model.php 142
ERROR - 2021-01-13 10:07:55 --> Severity: Notice --> Undefined variable: pengirim C:\xampp32\htdocs\simrs\application\nota_tagihan\models\Nota_model.php 146
ERROR - 2021-01-13 10:09:35 --> Severity: Warning --> Missing argument 2 for Nota_model::getPindah(), called in C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Nota_tagihan.php on line 3325 and defined C:\xampp32\htdocs\simrs\application\nota_tagihan\models\Nota_model.php 142
ERROR - 2021-01-13 10:09:35 --> Severity: Notice --> Undefined variable: pengirim C:\xampp32\htdocs\simrs\application\nota_tagihan\models\Nota_model.php 146
ERROR - 2021-01-13 10:10:36 --> Query error: Unknown column 'id_tarif' in 'field list' - Invalid query: SELECT id_tarif FROM tbl02_temp_permintaan_tindakan_penunjang WHERE id_daftar='2021073077' AND reg_unit='RI-210113-56-0001'
ERROR - 2021-01-13 10:10:36 --> Query error: Unknown column 'id_tarif' in 'on clause' - Invalid query: SELECT *
FROM `tbl02_temp_permintaan_tindakan_penunjang`
JOIN `tbl01_tarif_layanan` ON `id_tarif`=`idx`
WHERE `id_daftar` = '2021073077'
AND `reg_unit` = 'RI-210113-56-0001'
AND   (
`tbl01_tarif_layanan`.`layanan` LIKE '%%' ESCAPE '!'
 )
ERROR - 2021-01-13 10:12:07 --> Query error: Unknown column 'id_tarif' in 'field list' - Invalid query: SELECT id_tarif FROM tbl02_temp_permintaan_tindakan_penunjang WHERE id_daftar='2021073077' AND reg_unit='RI-210112-66-0001'
ERROR - 2021-01-13 10:12:07 --> Query error: Unknown column 'id_tarif' in 'on clause' - Invalid query: SELECT *
FROM `tbl02_temp_permintaan_tindakan_penunjang`
JOIN `tbl01_tarif_layanan` ON `id_tarif`=`idx`
WHERE `id_daftar` = '2021073077'
AND `reg_unit` = 'RI-210112-66-0001'
AND   (
`tbl01_tarif_layanan`.`layanan` LIKE '%%' ESCAPE '!'
 )
ERROR - 2021-01-13 10:12:26 --> Severity: Warning --> Missing argument 2 for Nota_model::getPindah(), called in C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Nota_tagihan.php on line 3437 and defined C:\xampp32\htdocs\simrs\application\nota_tagihan\models\Nota_model.php 142
ERROR - 2021-01-13 10:12:26 --> Severity: Notice --> Undefined variable: pengirim C:\xampp32\htdocs\simrs\application\nota_tagihan\models\Nota_model.php 146
ERROR - 2021-01-13 10:12:46 --> Severity: Parsing Error --> syntax error, unexpected '$nomr' (T_VARIABLE), expecting identifier (T_STRING) C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Nota_tagihan.php 3331
ERROR - 2021-01-13 10:13:02 --> Severity: Warning --> Missing argument 2 for Nota_model::getPindah(), called in C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Nota_tagihan.php on line 3437 and defined C:\xampp32\htdocs\simrs\application\nota_tagihan\models\Nota_model.php 142
ERROR - 2021-01-13 10:13:02 --> Severity: Notice --> Undefined variable: pengirim C:\xampp32\htdocs\simrs\application\nota_tagihan\models\Nota_model.php 146
ERROR - 2021-01-13 10:13:36 --> Severity: Warning --> Missing argument 2 for Nota_model::getPindah(), called in C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Nota_tagihan.php on line 1628 and defined C:\xampp32\htdocs\simrs\application\nota_tagihan\models\Nota_model.php 142
ERROR - 2021-01-13 10:13:36 --> Severity: Notice --> Undefined variable: pengirim C:\xampp32\htdocs\simrs\application\nota_tagihan\models\Nota_model.php 146
ERROR - 2021-01-13 10:13:57 --> Severity: Notice --> Undefined variable: pindah C:\xampp32\htdocs\simrs\application\nota_tagihan\controllers\Nota_tagihan.php 1650
