<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2023-02-14 01:26:18 --> Severity: Notice --> Undefined property: stdClass::$dokterJaga C:\laragon\www\simrs_vclaim\application\erm\views\antrian\antrian_index.php 389
ERROR - 2023-02-14 01:26:18 --> Severity: Notice --> Undefined property: stdClass::$namaDokterJaga C:\laragon\www\simrs_vclaim\application\erm\views\antrian\antrian_index.php 390
ERROR - 2023-02-14 01:29:02 --> Severity: Notice --> Undefined property: stdClass::$dokterJaga C:\laragon\www\simrs_vclaim\application\erm\views\antrian\antrian_index.php 389
ERROR - 2023-02-14 01:29:02 --> Severity: Notice --> Undefined property: stdClass::$namaDokterJaga C:\laragon\www\simrs_vclaim\application\erm\views\antrian\antrian_index.php 390
ERROR - 2023-02-14 01:32:20 --> Severity: Notice --> Undefined property: stdClass::$namaDokterJaga C:\laragon\www\simrs_vclaim\application\erm\views\antrian\antrian_index.php 390
ERROR - 2023-02-14 01:35:53 --> 404 Page Not Found: Display/index
ERROR - 2023-02-14 01:38:39 --> 404 Page Not Found: Nota_tagihan/panggilantrean
ERROR - 2023-02-14 01:38:51 --> 404 Page Not Found: Nota_tagihan/panggilantrean
ERROR - 2023-02-14 01:38:54 --> 404 Page Not Found: Nota_tagihan/panggilantrean
ERROR - 2023-02-14 01:40:02 --> 404 Page Not Found: Antrian/panggilantrean
ERROR - 2023-02-14 01:40:06 --> 404 Page Not Found: Antrian/panggilantrean
ERROR - 2023-02-14 01:48:17 --> Query error: Unknown column 'b.dokterjkn' in 'field list' - Invalid query: SELECT `a`.*, `b`.`dokterjkn`, `c`.`kodejkn`
FROM `tbl02_antrian` `a`
JOIN `tbl01_pegawai` `b` ON `a`.`antriandokter` = `b`.`NRP`
JOIN `tbl01_ruang` `c` ON `a`.`antrianruang`=`c`.`idx`
WHERE `aktiftaskid` <= 4
AND `tanggal` = '2023-02-14'
AND `antriandokter` = 'NRP1707005'
AND `jnsantrean` = '1'
AND `no_antrian_poly` = '1'
AND `antrianruang` = '10'
ORDER BY `no_antrian_poly`
ERROR - 2023-02-14 02:18:26 --> Severity: Notice --> Undefined property: stdClass::$kodejkn C:\laragon\www\simrs_vclaim\application\erm\controllers\Antrian.php 114
ERROR - 2023-02-14 02:18:26 --> Severity: Notice --> Undefined property: stdClass::$dokterjkn C:\laragon\www\simrs_vclaim\application\erm\controllers\Antrian.php 115
ERROR - 2023-02-14 02:18:48 --> Severity: Notice --> Undefined property: stdClass::$kodejkn C:\laragon\www\simrs_vclaim\application\erm\controllers\Antrian.php 114
ERROR - 2023-02-14 02:18:48 --> Severity: Notice --> Undefined property: stdClass::$dokterjkn C:\laragon\www\simrs_vclaim\application\erm\controllers\Antrian.php 115
ERROR - 2023-02-14 03:44:04 --> 404 Page Not Found: Antrian/entry_nota
ERROR - 2023-02-14 03:54:32 --> Severity: Notice --> Undefined property: stdClass::$taskid C:\laragon\www\simrs_vclaim\application\erm\views\antrian\antrian_index.php 424
ERROR - 2023-02-14 03:54:32 --> Severity: Notice --> Undefined property: stdClass::$taskid C:\laragon\www\simrs_vclaim\application\erm\views\antrian\antrian_index.php 440
ERROR - 2023-02-14 03:55:38 --> Severity: Notice --> Undefined property: stdClass::$taskid C:\laragon\www\simrs_vclaim\application\erm\views\antrian\antrian_index.php 440
ERROR - 2023-02-14 04:41:34 --> 404 Page Not Found: Display/index
ERROR - 2023-02-14 04:55:05 --> Severity: error --> Exception: Too few arguments to function Antrian_model::getJadwal(), 2 passed in C:\laragon\www\simrs_vclaim\application\erm\controllers\Display.php on line 16 and exactly 3 expected C:\laragon\www\simrs_vclaim\application\erm\models\Antrian_model.php 22
ERROR - 2023-02-14 04:58:00 --> Query error: Table 'rsam_mr_registrasi_v3.tbl02_jadwal_dokter1' doesn't exist - Invalid query: SELECT `a`.`jadwal_id`, `jadwal_dokter_id`, `jadwal_poly_id`, `jadwal_hari`, `jadwal_jam_mulai`, `jadwal_jam_selesai`, `jadwal_checkin`, `jadwal_pekan`, `group`, `kuotajkn`, `kuotanonjkn`, `jadwal_status`, `NRP`, `NIP`, `pgwNama`, `iddokter`, `dokterjkn`, `spm`
FROM `tbl02_jadwal_dokter1` `a`
JOIN `tbl01_pegawai` `b` ON `jadwal_dokter_id`=`NRP`
JOIN `tbl01_ruang` `c` ON `jadwal_poly_id`=`c`.`idx`
WHERE `jadwal_poly_id` = '10'
AND   (
`jadwal_dokter_id` = 0
OR `jadwal_dokter_id1` = 0
 )
AND `jadwal_hari` = 'Selasa'
ERROR - 2023-02-14 05:00:10 --> Query error: Table 'rsam_mr_registrasi_v3.tbl02_antrian1' doesn't exist - Invalid query: SELECT `a`.*, `b`.`idx` AS `idx_daftar`, `b`.`reg_unit`, `b`.`tgl_masuk`, `b`.`nomr`, `b`.`no_ktp`, `b`.`nama_pasien`, `b`.`jns_kelamin`, `aktiftaskid` AS `taskid`, `jnsantrean`, `labelantrean`, `dokterJaga`, `namaDokterJaga`
FROM `tbl02_antrian1` `a`
JOIN `tbl02_pendaftaran` `b` ON `a`.`id_daftar`=`b`.`id_daftar`
WHERE `tanggal` = '2023-02-14'
AND `antrianruang` = '10'
AND `status_panggil` = 1
AND `aktiftaskid` <= 4
AND `jnsantrean` = 1
ORDER BY `no_antrian_poly`
 LIMIT 1
ERROR - 2023-02-14 05:03:30 --> Severity: error --> Exception: Too few arguments to function Antrian_model::getJadwal(), 2 passed in C:\laragon\www\simrs_vclaim\application\erm\controllers\Display.php on line 31 and exactly 3 expected C:\laragon\www\simrs_vclaim\application\erm\models\Antrian_model.php 22
ERROR - 2023-02-14 05:07:15 --> Severity: Notice --> Trying to get property 'jadwal_jam_mulai' of non-object C:\laragon\www\simrs_vclaim\application\erm\views\display_antrean.php 33
ERROR - 2023-02-14 05:07:15 --> Severity: Notice --> Trying to get property 'jadwal_jam_selesai' of non-object C:\laragon\www\simrs_vclaim\application\erm\views\display_antrean.php 33
ERROR - 2023-02-14 08:03:03 --> 404 Page Not Found: Antrian/entry_nota
ERROR - 2023-02-14 08:03:10 --> 404 Page Not Found: Antrian/entry_nota
