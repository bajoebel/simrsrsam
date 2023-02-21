<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2023-02-21 08:01:04 --> Query error: Table 'simrs_erm.tbl02_pendaftaran' doesn't exist - Invalid query: SELECT `idx`, `id_daftar`, `reg_unit`, `tgl_masuk`, `nomr`, `nama_pasien`, `tgl_lahir`, `jns_kelamin`, `namaDokterJaga`, `nama_ruang`, `cara_bayar`, `status_pasien`, `status_erm`, `id_ruang`
FROM `tbl02_pendaftaran`
WHERE DATE_FORMAT(`tgl_masuk`,'%Y-%m-%d') >= '2023-02-21'
AND DATE_FORMAT(`tgl_masuk`,'%Y-%m-%d') <= '2023-02-21'
AND `id_ruang` = '10'
ORDER BY `created_at` DESC
 LIMIT 10
ERROR - 2023-02-21 08:01:42 --> Query error: Unknown column 'created_at' in 'order clause' - Invalid query: SELECT `idx`, `id_daftar`, `reg_unit`, `tgl_masuk`, `nomr`, `nama_pasien`, `tgl_lahir`, `jns_kelamin`, `namaDokterJaga`, `nama_ruang`, `cara_bayar`, `status_pasien`, `status_erm`, `id_ruang`
FROM `tbl02_pendaftaran`
WHERE DATE_FORMAT(`tgl_masuk`,'%Y-%m-%d') >= '2023-02-21'
AND DATE_FORMAT(`tgl_masuk`,'%Y-%m-%d') <= '2023-02-21'
AND `id_ruang` = '10'
ORDER BY `created_at` DESC
 LIMIT 10
ERROR - 2023-02-21 08:03:24 --> 404 Page Not Found: Erm/get_kunjungan_jso
ERROR - 2023-02-21 08:03:40 --> Query error: Unknown column 'created_at' in 'order clause' - Invalid query: SELECT `idx`, `id_daftar`, `reg_unit`, `tgl_masuk`, `nomr`, `nama_pasien`, `tgl_lahir`, `jns_kelamin`, `namaDokterJaga`, `nama_ruang`, `cara_bayar`, `status_pasien`, `status_erm`, `id_ruang`
FROM `tbl02_pendaftaran`
WHERE DATE_FORMAT(`tgl_masuk`,'%Y-%m-%d') >= '2023-02-21'
AND DATE_FORMAT(`tgl_masuk`,'%Y-%m-%d') <= '2023-02-21'
AND `id_ruang` = '10'
ORDER BY `created_at` DESC
 LIMIT 10
ERROR - 2023-02-21 08:04:33 --> Query error: Unknown column 'created_at' in 'order clause' - Invalid query: SELECT `idx`, `id_daftar`, `reg_unit`, `tgl_masuk`, `nomr`, `nama_pasien`, `tgl_lahir`, `jns_kelamin`, `namaDokterJaga`, `nama_ruang`, `cara_bayar`, `status_pasien`, `status_erm`, `id_ruang`
FROM `tbl02_pendaftaran`
WHERE DATE_FORMAT(`tgl_masuk`,'%Y-%m-%d') >= '2023-02-21'
AND DATE_FORMAT(`tgl_masuk`,'%Y-%m-%d') <= '2023-02-21'
AND `id_ruang` = '10'
ORDER BY `created_at` DESC
 LIMIT 10
ERROR - 2023-02-21 08:06:24 --> Severity: error --> Exception: Call to undefined method Datatables::order_by() C:\laragon\www\simrs_vclaim\application\erm\models\Erm_model.php 97
ERROR - 2023-02-21 08:10:10 --> Query error: Unknown column 'created_at' in 'order clause' - Invalid query: SELECT `idx`, `id_daftar`, `reg_unit`, `tgl_masuk`, `nomr`, `nama_pasien`, `tgl_lahir`, `jns_kelamin`, `namaDokterJaga`, `nama_ruang`, `cara_bayar`, `status_pasien`, `status_erm`, `id_ruang`
FROM `tbl02_pendaftaran`
WHERE DATE_FORMAT(`tgl_masuk`,'%Y-%m-%d') >= '2023-02-21'
AND DATE_FORMAT(`tgl_masuk`,'%Y-%m-%d') <= '2023-02-21'
AND `id_ruang` = '10'
ORDER BY `created_at` DESC
 LIMIT 10
ERROR - 2023-02-21 08:31:24 --> Severity: Notice --> Array to string conversion C:\laragon\www\simrs_vclaim\application\erm\views\erm\rajal\kaji_awal_medis\kaji_awal_medis_form.php 113
ERROR - 2023-02-21 08:37:20 --> Severity: error --> Exception: Too few arguments to function Datatables::edit_column(), 2 passed in C:\laragon\www\simrs_vclaim\application\erm\models\Erm_model.php on line 98 and exactly 3 expected C:\laragon\www\simrs_vclaim\application\erm\libraries\Datatables.php 242
ERROR - 2023-02-21 08:37:23 --> Severity: error --> Exception: Too few arguments to function Datatables::edit_column(), 2 passed in C:\laragon\www\simrs_vclaim\application\erm\models\Erm_model.php on line 98 and exactly 3 expected C:\laragon\www\simrs_vclaim\application\erm\libraries\Datatables.php 242
ERROR - 2023-02-21 08:52:19 --> Severity: error --> Exception: Call to undefined method Datatables::jns_kelamin() C:\laragon\www\simrs_vclaim\application\erm\models\Erm_model.php 98
ERROR - 2023-02-21 08:52:44 --> Severity: error --> Exception: Call to undefined method Datatables::jns_kelamin() C:\laragon\www\simrs_vclaim\application\erm\models\Erm_model.php 98
ERROR - 2023-02-21 08:53:03 --> Severity: error --> Exception: Call to undefined method Datatables::jns_kelamin() C:\laragon\www\simrs_vclaim\application\erm\models\Erm_model.php 98
