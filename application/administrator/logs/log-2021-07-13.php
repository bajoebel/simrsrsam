<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-07-13 06:37:20 --> Query error: Unknown column 'id_tt_kemkes' in 'field list' - Invalid query: SELECT id_tt,ruang,jumlah_ruang,jumlah,IFNULL(terpakai,0) AS terpakai,0 AS antrian, 0 AS prepare, 0 AS prepare_plan,0 AS covid FROM
        (SELECT id_tt_kemkes AS id_tt,kelas_jkn,kelas_layanan,ruang_kemkes AS ruang,COUNT(id_ruang) AS jumlah_ruang,SUM(jml_tt) AS jumlah FROM `tbl01_kamar` 
        WHERE id_tt_kemkes IS NOT NULL AND status_publish=1 GROUP BY id_tt_kemkes) AS tabel1
        LEFT JOIN
        (SELECT b.id_tt_kemkes, COUNT(idx) AS terpakai FROM `tbl02_pendaftaran` a JOIN tbl01_kamar b ON a.id_kamar=b.id_kamar 
        WHERE id_tt_kemkes IS NOT NULL AND status_publish=1 AND a.reg_unit NOT IN (SELECT c.reg_unit FROM `tbl02_pendaftaran_batal` c)
        AND a.reg_unit NOT IN (SELECT d.reg_unit FROM `tbl02_pasien_pulang` d)
        AND a.reg_unit NOT IN (SELECT e.reg_unit FROM `tbl02_pindah_ranap`e WHERE e.`ruang_pengirim` <> e.`id_ruang` AND e.idx IN (SELECT f.`id_pindah_ranap` FROM `tbl02_pindah_ranap_response` f))
        GROUP BY id_tt_kemkes) AS tabel2 
        ON tabel1.id_tt=tabel2.id_tt_kemkes
ERROR - 2021-07-13 06:39:25 --> Severity: Notice --> Undefined variable: res C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 242
ERROR - 2021-07-13 06:39:25 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 242
ERROR - 2021-07-13 06:40:01 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 242
ERROR - 2021-07-13 06:44:52 --> Severity: Notice --> Trying to get property 'message' of non-object C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 246
ERROR - 2021-07-13 06:44:53 --> Severity: Notice --> Trying to get property 'message' of non-object C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 246
ERROR - 2021-07-13 06:44:54 --> Severity: Notice --> Trying to get property 'message' of non-object C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 246
ERROR - 2021-07-13 06:44:54 --> Severity: Notice --> Trying to get property 'message' of non-object C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 246
ERROR - 2021-07-13 06:44:57 --> Severity: Notice --> Trying to get property 'message' of non-object C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 246
ERROR - 2021-07-13 06:45:00 --> Severity: Notice --> Trying to get property 'message' of non-object C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 246
ERROR - 2021-07-13 06:45:08 --> Severity: Notice --> Trying to get property 'message' of non-object C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 246
ERROR - 2021-07-13 06:45:09 --> Severity: Notice --> Trying to get property 'message' of non-object C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 246
ERROR - 2021-07-13 06:45:51 --> Severity: Notice --> Trying to get property 'message' of non-object C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 247
ERROR - 2021-07-13 06:45:58 --> Severity: Notice --> Trying to get property 'message' of non-object C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 247
ERROR - 2021-07-13 06:46:09 --> Severity: Error --> Maximum execution time of 30 seconds exceeded C:\xampp\htdocs\simrs\application\administrator\models\Aplicares_model.php 227
ERROR - 2021-07-13 06:47:42 --> Severity: Notice --> Trying to get property 'message' of non-object C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 247
ERROR - 2021-07-13 06:49:33 --> Severity: error --> Exception: Cannot use object of type stdClass as array C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 247
ERROR - 2021-07-13 06:50:56 --> Severity: Notice --> Trying to get property 'status' of non-object C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 247
