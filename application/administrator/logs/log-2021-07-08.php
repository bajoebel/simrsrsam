<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-07-08 00:48:22 --> Severity: Notice --> Undefined variable: jsonData C:\xampp\htdocs\simrs\application\administrator\models\Aplicares_model.php 72
ERROR - 2021-07-08 00:49:05 --> Severity: Notice --> Undefined variable: jsonData C:\xampp\htdocs\simrs\application\administrator\models\Aplicares_model.php 72
ERROR - 2021-07-08 00:49:07 --> Severity: Notice --> Undefined variable: jsonData C:\xampp\htdocs\simrs\application\administrator\models\Aplicares_model.php 72
ERROR - 2021-07-08 00:49:10 --> Severity: Notice --> Undefined variable: jsonData C:\xampp\htdocs\simrs\application\administrator\models\Aplicares_model.php 72
ERROR - 2021-07-08 03:18:50 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '-380 , 20' at line 25 - Invalid query: SELECT tabel1.*,IFNULL(tabel2.jml_terisi,0) AS jml_terisi,IFNULL(tabel2.terisi_perempuan,0) AS terisi_perempuan,IFNULL(tabel2.terisi_lakilaki,0) AS terisi_lakilaki,
        (CASE WHEN (jekel=1 AND jml_terisi IS NOT NULL) THEN kapasitas - jml_terisi WHEN(jekel=1 AND jml_terisi IS NULL) THEN kapasitas ELSE 0 END) AS tersediapria,
        (CASE WHEN (jekel=0 AND jml_terisi IS NOT NULL) THEN kapasitas - jml_terisi WHEN (jekel=0 AND jml_terisi IS NULL) THEN kapasitas ELSE 0 END) AS tersediawanita,
        (CASE WHEN (jekel=2 AND jml_terisi IS NOT NULL) THEN kapasitas - jml_terisi WHEN(jekel=2 AND jml_terisi IS NULL) THEN kapasitas ELSE 0 END) AS tersediapriawanita
        FROM
        (SELECT `idkelas_jkn` AS kodekelas,`kelas_jkn`,`id_ruang` AS koderuang,`nama_ruang` AS namaruang,SUM(`jml_tt`) AS kapasitas,`jekel` FROM tbl01_kamar WHERE status_kamar=1 GROUP BY id_ruang,idkelas_jkn) AS tabel1
        LEFT JOIN 
        (SELECT
          a.id_ruang,e.`idkelas_jkn` AS kodekelas,e.`kelas_jkn`,
          COUNT(`a`.`id_daftar`) AS `jml_terisi`,
          SUM((CASE WHEN ((`a`.`rawatgabung` = 0) AND ((`a`.`jns_kelamin` = '0') OR (`a`.`jns_kelamin` = 'P'))) THEN 1 ELSE 0 END)) AS `terisi_perempuan`,
          SUM((CASE WHEN ((`a`.`rawatgabung` = 0) AND ((`a`.`jns_kelamin` = '1') OR (`a`.`jns_kelamin` = 'L'))) THEN 1 ELSE 0 END)) AS `terisi_lakilaki`
        FROM (`tbl02_pendaftaran` `a`
           JOIN `tbl01_kamar` `e`
             ON ((`a`.`id_kamar` = `e`.`id_kamar`)))
        WHERE ((`a`.`jns_layanan` = 'RI')
               AND (`a`.`id_kamar` <> '0')
               AND (a.rawatgabung = 0)
               AND (NOT(`a`.`reg_unit` IN(SELECT `f`.`reg_unit` FROM `tbl02_pendaftaran_batal` `f`)))
               AND (NOT(`a`.`reg_unit` IN(SELECT `c`.`reg_unit` FROM `tbl02_pasien_pulang` `c`)))
               AND (NOT(`a`.`reg_unit` IN(SELECT `d`.`reg_unit` FROM `tbl02_pindah_ranap` `d` WHERE (`d`.`idx` IN(SELECT `e`.`id_pindah_ranap` FROM `tbl02_pindah_ranap_response` `e`) AND (`d`.`ruang_pengirim` <> `d`.`id_ruang`))))))
        GROUP BY `a`.`id_ruang`,`e`.`idkelas_jkn`) AS tabel2 ON tabel1.koderuang = tabel2.id_ruang AND tabel1.kodekelas=tabel2.kodekelas 
        WHERE tabel1.kelas_jkn LIKE '%%' OR namaruang LIKE '%%'
        GROUP BY `tabel1`.`koderuang`, tabel1.`kodekelas`
        ORDER BY `tabel1`.`koderuang`, tabel1.`kodekelas` LIMIT -380 , 20
ERROR - 2021-07-08 03:25:44 --> Severity: Notice --> Undefined property: Aplicares::$aplicares_model C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 70
ERROR - 2021-07-08 03:25:44 --> Severity: error --> Exception: Call to a member function getdatabed() on null C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 70
ERROR - 2021-07-08 03:26:12 --> Severity: Notice --> Undefined variable: keyword C:\xampp\htdocs\simrs\application\administrator\models\Aplicares_model.php 197
ERROR - 2021-07-08 03:26:12 --> Severity: Notice --> Undefined variable: keyword C:\xampp\htdocs\simrs\application\administrator\models\Aplicares_model.php 197
ERROR - 2021-07-08 03:26:12 --> Severity: Notice --> Undefined property: stdClass::$tersedia C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 77
ERROR - 2021-07-08 03:26:12 --> Severity: Notice --> Undefined property: stdClass::$tersedia C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 77
ERROR - 2021-07-08 03:26:12 --> Severity: Notice --> Undefined property: stdClass::$tersedia C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 77
ERROR - 2021-07-08 03:26:12 --> Severity: Notice --> Undefined property: stdClass::$tersedia C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 77
ERROR - 2021-07-08 03:26:12 --> Severity: Notice --> Undefined property: stdClass::$tersedia C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 77
ERROR - 2021-07-08 03:26:12 --> Severity: Notice --> Undefined property: stdClass::$tersedia C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 77
ERROR - 2021-07-08 03:26:12 --> Severity: Notice --> Undefined property: stdClass::$tersedia C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 77
ERROR - 2021-07-08 03:26:12 --> Severity: Notice --> Undefined property: stdClass::$tersedia C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 77
ERROR - 2021-07-08 03:26:12 --> Severity: Notice --> Undefined property: stdClass::$tersedia C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 77
ERROR - 2021-07-08 03:26:12 --> Severity: Notice --> Undefined property: stdClass::$tersedia C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 77
ERROR - 2021-07-08 03:26:12 --> Severity: Notice --> Undefined property: stdClass::$tersedia C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 77
ERROR - 2021-07-08 03:26:12 --> Severity: Notice --> Undefined property: stdClass::$tersedia C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 77
ERROR - 2021-07-08 03:26:12 --> Severity: Notice --> Undefined property: stdClass::$tersedia C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 77
ERROR - 2021-07-08 03:26:12 --> Severity: Notice --> Undefined property: stdClass::$tersedia C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 77
ERROR - 2021-07-08 03:26:12 --> Severity: Notice --> Undefined property: stdClass::$tersedia C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 77
ERROR - 2021-07-08 03:26:12 --> Severity: Notice --> Undefined property: stdClass::$tersedia C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 77
ERROR - 2021-07-08 03:26:12 --> Severity: Notice --> Undefined property: stdClass::$tersedia C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 77
ERROR - 2021-07-08 03:26:12 --> Severity: Notice --> Undefined property: stdClass::$tersedia C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 77
ERROR - 2021-07-08 03:26:12 --> Severity: Notice --> Undefined property: stdClass::$tersedia C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 77
ERROR - 2021-07-08 03:26:12 --> Severity: Notice --> Undefined property: stdClass::$tersedia C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 77
ERROR - 2021-07-08 03:26:12 --> Severity: Notice --> Undefined property: stdClass::$tersedia C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 77
ERROR - 2021-07-08 03:26:12 --> Severity: Notice --> Undefined property: stdClass::$tersedia C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 77
ERROR - 2021-07-08 03:26:12 --> Severity: Notice --> Undefined property: stdClass::$tersedia C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 77
ERROR - 2021-07-08 03:26:12 --> Severity: Notice --> Undefined property: stdClass::$tersedia C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 77
ERROR - 2021-07-08 03:26:12 --> Severity: Notice --> Undefined property: stdClass::$tersedia C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 77
ERROR - 2021-07-08 03:26:12 --> Severity: Notice --> Undefined property: stdClass::$tersedia C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 77
ERROR - 2021-07-08 03:26:12 --> Severity: Notice --> Undefined property: stdClass::$tersedia C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 77
ERROR - 2021-07-08 03:26:12 --> Severity: Notice --> Undefined property: stdClass::$tersedia C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 77
ERROR - 2021-07-08 03:26:12 --> Severity: Notice --> Undefined property: stdClass::$tersedia C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 77
ERROR - 2021-07-08 03:26:12 --> Severity: Notice --> Undefined property: stdClass::$tersedia C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 77
ERROR - 2021-07-08 03:26:38 --> Severity: Notice --> Undefined property: stdClass::$tersedia C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 77
ERROR - 2021-07-08 03:26:38 --> Severity: Notice --> Undefined property: stdClass::$tersedia C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 77
ERROR - 2021-07-08 03:26:38 --> Severity: Notice --> Undefined property: stdClass::$tersedia C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 77
ERROR - 2021-07-08 03:26:38 --> Severity: Notice --> Undefined property: stdClass::$tersedia C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 77
ERROR - 2021-07-08 03:26:38 --> Severity: Notice --> Undefined property: stdClass::$tersedia C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 77
ERROR - 2021-07-08 03:26:38 --> Severity: Notice --> Undefined property: stdClass::$tersedia C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 77
ERROR - 2021-07-08 03:26:38 --> Severity: Notice --> Undefined property: stdClass::$tersedia C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 77
ERROR - 2021-07-08 03:26:38 --> Severity: Notice --> Undefined property: stdClass::$tersedia C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 77
ERROR - 2021-07-08 03:26:38 --> Severity: Notice --> Undefined property: stdClass::$tersedia C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 77
ERROR - 2021-07-08 03:26:38 --> Severity: Notice --> Undefined property: stdClass::$tersedia C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 77
ERROR - 2021-07-08 03:26:38 --> Severity: Notice --> Undefined property: stdClass::$tersedia C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 77
ERROR - 2021-07-08 03:26:38 --> Severity: Notice --> Undefined property: stdClass::$tersedia C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 77
ERROR - 2021-07-08 03:26:38 --> Severity: Notice --> Undefined property: stdClass::$tersedia C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 77
ERROR - 2021-07-08 03:26:38 --> Severity: Notice --> Undefined property: stdClass::$tersedia C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 77
ERROR - 2021-07-08 03:26:38 --> Severity: Notice --> Undefined property: stdClass::$tersedia C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 77
ERROR - 2021-07-08 03:26:38 --> Severity: Notice --> Undefined property: stdClass::$tersedia C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 77
ERROR - 2021-07-08 03:26:38 --> Severity: Notice --> Undefined property: stdClass::$tersedia C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 77
ERROR - 2021-07-08 03:26:38 --> Severity: Notice --> Undefined property: stdClass::$tersedia C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 77
ERROR - 2021-07-08 03:26:38 --> Severity: Notice --> Undefined property: stdClass::$tersedia C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 77
ERROR - 2021-07-08 03:26:38 --> Severity: Notice --> Undefined property: stdClass::$tersedia C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 77
ERROR - 2021-07-08 03:26:38 --> Severity: Notice --> Undefined property: stdClass::$tersedia C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 77
ERROR - 2021-07-08 03:26:38 --> Severity: Notice --> Undefined property: stdClass::$tersedia C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 77
ERROR - 2021-07-08 03:26:38 --> Severity: Notice --> Undefined property: stdClass::$tersedia C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 77
ERROR - 2021-07-08 03:26:38 --> Severity: Notice --> Undefined property: stdClass::$tersedia C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 77
ERROR - 2021-07-08 03:26:38 --> Severity: Notice --> Undefined property: stdClass::$tersedia C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 77
ERROR - 2021-07-08 03:26:38 --> Severity: Notice --> Undefined property: stdClass::$tersedia C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 77
ERROR - 2021-07-08 03:26:38 --> Severity: Notice --> Undefined property: stdClass::$tersedia C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 77
ERROR - 2021-07-08 03:26:38 --> Severity: Notice --> Undefined property: stdClass::$tersedia C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 77
ERROR - 2021-07-08 03:26:38 --> Severity: Notice --> Undefined property: stdClass::$tersedia C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 77
ERROR - 2021-07-08 03:26:38 --> Severity: Notice --> Undefined property: stdClass::$tersedia C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 77
ERROR - 2021-07-08 03:37:54 --> Severity: Notice --> Undefined property: stdClass::$tersedia C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 79
ERROR - 2021-07-08 03:37:54 --> Severity: Notice --> Undefined property: stdClass::$tersedia C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 79
ERROR - 2021-07-08 03:37:54 --> Severity: Notice --> Undefined property: stdClass::$tersedia C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 79
ERROR - 2021-07-08 03:37:54 --> Severity: Notice --> Undefined property: stdClass::$tersedia C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 79
ERROR - 2021-07-08 03:37:54 --> Severity: Notice --> Undefined property: stdClass::$tersedia C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 79
ERROR - 2021-07-08 03:37:54 --> Severity: Notice --> Undefined property: stdClass::$tersedia C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 79
ERROR - 2021-07-08 03:37:54 --> Severity: Notice --> Undefined property: stdClass::$tersedia C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 79
ERROR - 2021-07-08 03:37:54 --> Severity: Notice --> Undefined property: stdClass::$tersedia C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 79
ERROR - 2021-07-08 03:37:54 --> Severity: Notice --> Undefined property: stdClass::$tersedia C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 79
ERROR - 2021-07-08 03:37:54 --> Severity: Notice --> Undefined property: stdClass::$tersedia C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 79
ERROR - 2021-07-08 03:37:54 --> Severity: Notice --> Undefined property: stdClass::$tersedia C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 79
ERROR - 2021-07-08 03:37:54 --> Severity: Notice --> Undefined property: stdClass::$tersedia C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 79
ERROR - 2021-07-08 03:37:54 --> Severity: Notice --> Undefined property: stdClass::$tersedia C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 79
ERROR - 2021-07-08 03:37:54 --> Severity: Notice --> Undefined property: stdClass::$tersedia C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 79
ERROR - 2021-07-08 03:37:54 --> Severity: Notice --> Undefined property: stdClass::$tersedia C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 79
ERROR - 2021-07-08 03:37:54 --> Severity: Notice --> Undefined property: stdClass::$tersedia C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 79
ERROR - 2021-07-08 03:37:54 --> Severity: Notice --> Undefined property: stdClass::$tersedia C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 79
ERROR - 2021-07-08 03:37:54 --> Severity: Notice --> Undefined property: stdClass::$tersedia C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 79
ERROR - 2021-07-08 03:37:54 --> Severity: Notice --> Undefined property: stdClass::$tersedia C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 79
ERROR - 2021-07-08 03:37:54 --> Severity: Notice --> Undefined property: stdClass::$tersedia C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 79
ERROR - 2021-07-08 03:37:54 --> Severity: Notice --> Undefined property: stdClass::$tersedia C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 79
ERROR - 2021-07-08 03:37:54 --> Severity: Notice --> Undefined property: stdClass::$tersedia C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 79
ERROR - 2021-07-08 03:37:54 --> Severity: Notice --> Undefined property: stdClass::$tersedia C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 79
ERROR - 2021-07-08 03:37:54 --> Severity: Notice --> Undefined property: stdClass::$tersedia C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 79
ERROR - 2021-07-08 03:37:54 --> Severity: Notice --> Undefined property: stdClass::$tersedia C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 79
ERROR - 2021-07-08 03:37:54 --> Severity: Notice --> Undefined property: stdClass::$tersedia C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 79
ERROR - 2021-07-08 03:37:54 --> Severity: Notice --> Undefined property: stdClass::$tersedia C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 79
ERROR - 2021-07-08 03:37:54 --> Severity: Notice --> Undefined property: stdClass::$tersedia C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 79
ERROR - 2021-07-08 03:37:54 --> Severity: Notice --> Undefined property: stdClass::$tersedia C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 79
ERROR - 2021-07-08 03:37:54 --> Severity: Notice --> Undefined property: stdClass::$tersedia C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 79
ERROR - 2021-07-08 01:43:59 --> Severity: Error --> Maximum execution time of 30 seconds exceeded C:\xampp\htdocs\simrs\application\administrator\models\Aplicares_model.php 43
