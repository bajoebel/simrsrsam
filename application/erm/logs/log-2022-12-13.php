<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-12-13 06:18:37 --> Query error: Unknown column 'spm' in 'field list' - Invalid query: SELECT `a`.`jadwal_id`, `jadwal_dokter_id`, `jadwal_poly_id`, `jadwal_hari`, `jadwal_jam_mulai`, `jadwal_jam_selesai`, `jadwal_checkin`, `jadwal_pekan`, `group`, `kuotajkn`, `kuotanonjkn`, `jadwal_status`, `NRP`, `NIP`, `pgwNama`, `iddokter`, `dokterjkn`, `spm`
FROM `tbl02_jadwal_dokter` `a`
JOIN `tbl01_pegawai` `b` ON `jadwal_dokter_id`=`NRP`
JOIN `tbl01_ruang` `c` ON `jadwal_poly_id`=`c`.`idx`
WHERE `jadwal_poly_id` = '4'
AND   (
`jadwal_dokter_id` = 0
OR `jadwal_dokter_id1` = 0
 )
AND `jadwal_hari` = 'Selasa'
ERROR - 2022-12-13 06:18:48 --> Query error: Unknown column 'spm' in 'field list' - Invalid query: SELECT `a`.`jadwal_id`, `jadwal_dokter_id`, `jadwal_poly_id`, `jadwal_hari`, `jadwal_jam_mulai`, `jadwal_jam_selesai`, `jadwal_checkin`, `jadwal_pekan`, `group`, `kuotajkn`, `kuotanonjkn`, `jadwal_status`, `NRP`, `NIP`, `pgwNama`, `iddokter`, `dokterjkn`, `spm`
FROM `tbl02_jadwal_dokter` `a`
JOIN `tbl01_pegawai` `b` ON `jadwal_dokter_id`=`NRP`
JOIN `tbl01_ruang` `c` ON `jadwal_poly_id`=`c`.`idx`
WHERE `jadwal_poly_id` = '4'
AND   (
`jadwal_dokter_id` = 0
OR `jadwal_dokter_id1` = 0
 )
AND `jadwal_hari` = 'Selasa'
ERROR - 2022-12-13 06:57:40 --> Severity: Warning --> Use of undefined constant SMART_STATUS - assumed 'SMART_STATUS' (this will throw an Error in a future version of PHP) C:\laragon\www\simrs_reg_v4\application\erm\controllers\Dashboard.php 16
ERROR - 2022-12-13 06:58:20 --> Severity: Notice --> Trying to get property 'id_ruang' of non-object C:\laragon\www\simrs_reg_v4\application\erm\views\erm\rajal\ermindex.php 101
ERROR - 2022-12-13 06:58:44 --> Severity: Notice --> Trying to get property 'id_ruang' of non-object C:\laragon\www\simrs_reg_v4\application\erm\views\erm\rajal\ermindex.php 101
ERROR - 2022-12-13 06:58:50 --> Severity: Notice --> Trying to get property 'id_ruang' of non-object C:\laragon\www\simrs_reg_v4\application\erm\views\erm\rajal\ermindex.php 101
ERROR - 2022-12-13 07:01:30 --> Severity: Notice --> Undefined property: Erm::$Layanan_model C:\laragon\www\simrs_reg_v4\application\erm\controllers\Erm.php 32
ERROR - 2022-12-13 07:01:30 --> Severity: error --> Exception: Call to a member function getDokterAktif() on null C:\laragon\www\simrs_reg_v4\application\erm\controllers\Erm.php 32
ERROR - 2022-12-13 07:18:21 --> Severity: Notice --> Undefined property: Erm::$Layanan_model C:\laragon\www\simrs_reg_v4\application\erm\controllers\Erm.php 32
ERROR - 2022-12-13 07:18:21 --> Severity: error --> Exception: Call to a member function getDokterAktif() on null C:\laragon\www\simrs_reg_v4\application\erm\controllers\Erm.php 32
ERROR - 2022-12-13 07:19:08 --> Query error: Unknown column 'spm' in 'field list' - Invalid query: SELECT `a`.`jadwal_id`, `jadwal_dokter_id`, `jadwal_poly_id`, `jadwal_hari`, `jadwal_jam_mulai`, `jadwal_jam_selesai`, `jadwal_checkin`, `jadwal_pekan`, `group`, `kuotajkn`, `kuotanonjkn`, `jadwal_status`, `NRP`, `NIP`, `pgwNama`, `iddokter`, `dokterjkn`, `spm`
FROM `tbl02_jadwal_dokter` `a`
JOIN `tbl01_pegawai` `b` ON `jadwal_dokter_id`=`NRP`
JOIN `tbl01_ruang` `c` ON `jadwal_poly_id`=`c`.`idx`
WHERE `jadwal_poly_id` = '12'
AND   (
`jadwal_dokter_id` = 0
OR `jadwal_dokter_id1` = 0
 )
AND `jadwal_hari` = 'Selasa'
