<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-06-25 03:31:15 --> Severity: Notice --> Trying to get property 'pasien' of non-object C:\xampp\htdocs\simrs\application\mr_registrasi\controllers\Online.php 113
ERROR - 2021-06-25 03:31:15 --> Severity: Notice --> Trying to get property 'jmldata' of non-object C:\xampp\htdocs\simrs\application\mr_registrasi\controllers\Online.php 114
ERROR - 2021-06-25 03:31:15 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\simrs\application\mr_registrasi\views\registrasi\v_data_pendaftaran_online.php 3
ERROR - 2021-06-25 03:31:15 --> Severity: Notice --> Trying to get property 'jmldata' of non-object C:\xampp\htdocs\simrs\application\mr_registrasi\controllers\Online.php 120
ERROR - 2021-06-25 03:48:55 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'SELECT1 * FROM (SELECT `label`,`name`,`jam`,`tersedia` FROM `tb02_config_batch` ' at line 1 - Invalid query: SELECT1 * FROM (SELECT `label`,`name`,`jam`,`tersedia` FROM `tb02_config_batch` WHERE `groupid`=1) AS batch
        LEFT JOIN (SELECT `label_antrian`, `ruangid`,`ruang`, `nrpdokter`,pgwNama AS namaDokter,`nomor_antrian`,COUNT(nomor_antrian) AS jml_terisi,MAX(nomor_antrian) AS antrian_tertinggi 
        FROM `tbl02_antrianv2` a JOIN `tbl01_ruang` b ON a.`ruangid`=b.`idx` JOIN `tbl01_pegawai` c ON a.`nrpdokter`=c.NRP WHERE ruangid=9 AND nrpdokter='NRP1910041' AND tgl_kunjungan='2021-06-25'
        GROUP BY label_antrian) AS antrian ON batch.label=antrian.label_antrian WHERE jml_terisi < tersedia OR jml_terisi IS NULL ORDER BY label LIMIT 1
ERROR - 2021-06-25 03:49:17 --> Severity: Notice --> Undefined variable: resArr C:\xampp\htdocs\simrs\application\mr_registrasi\controllers\Registrasi.php 208
ERROR - 2021-06-25 03:49:17 --> Severity: Notice --> Undefined variable: resArr C:\xampp\htdocs\simrs\application\mr_registrasi\controllers\Registrasi.php 212
ERROR - 2021-06-25 03:49:38 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'SELECT1 * FROM (SELECT `label`,`name`,`jam`,`tersedia` FROM `tb02_config_batch` ' at line 1 - Invalid query: SELECT1 * FROM (SELECT `label`,`name`,`jam`,`tersedia` FROM `tb02_config_batch` WHERE `groupid`=1) AS batch
        LEFT JOIN (SELECT `label_antrian`, `ruangid`,`ruang`, `nrpdokter`,pgwNama AS namaDokter,`nomor_antrian`,COUNT(nomor_antrian) AS jml_terisi,MAX(nomor_antrian) AS antrian_tertinggi 
        FROM `tbl02_antrianv2` a JOIN `tbl01_ruang` b ON a.`ruangid`=b.`idx` JOIN `tbl01_pegawai` c ON a.`nrpdokter`=c.NRP WHERE ruangid=10 AND nrpdokter='NRP1910059' AND tgl_kunjungan='2021-06-25'
        GROUP BY label_antrian) AS antrian ON batch.label=antrian.label_antrian WHERE jml_terisi < tersedia OR jml_terisi IS NULL ORDER BY label LIMIT 1
