<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-07-03 13:28:14 --> Severity: Notice --> Undefined variable: mulai C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 80
ERROR - 2021-07-03 13:28:14 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 25 - Invalid query: SELECT tabel1.*,IFNULL(tabel2.jml_terisi,0) AS jml_terisi,IFNULL(tabel2.terisi_perempuan,0) AS terisi_perempuan,IFNULL(tabel2.terisi_lakilaki,0) AS terisi_lakilaki,
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
        ORDER BY `tabel1`.`koderuang`, tabel1.`kodekelas` LIMIT 10 , 
ERROR - 2021-07-03 13:29:21 --> Severity: Notice --> Undefined variable: mulai C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 80
ERROR - 2021-07-03 13:29:21 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 25 - Invalid query: SELECT tabel1.*,IFNULL(tabel2.jml_terisi,0) AS jml_terisi,IFNULL(tabel2.terisi_perempuan,0) AS terisi_perempuan,IFNULL(tabel2.terisi_lakilaki,0) AS terisi_lakilaki,
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
        ORDER BY `tabel1`.`koderuang`, tabel1.`kodekelas` LIMIT 10 , 
ERROR - 2021-07-03 13:31:46 --> Severity: Notice --> Undefined variable: mulai C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 80
ERROR - 2021-07-03 13:31:46 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 25 - Invalid query: SELECT tabel1.*,IFNULL(tabel2.jml_terisi,0) AS jml_terisi,IFNULL(tabel2.terisi_perempuan,0) AS terisi_perempuan,IFNULL(tabel2.terisi_lakilaki,0) AS terisi_lakilaki,
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
        ORDER BY `tabel1`.`koderuang`, tabel1.`kodekelas` LIMIT 10 , 
ERROR - 2021-07-03 13:32:43 --> Severity: Notice --> Undefined variable: mulai C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 80
ERROR - 2021-07-03 13:32:43 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 25 - Invalid query: SELECT tabel1.*,IFNULL(tabel2.jml_terisi,0) AS jml_terisi,IFNULL(tabel2.terisi_perempuan,0) AS terisi_perempuan,IFNULL(tabel2.terisi_lakilaki,0) AS terisi_lakilaki,
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
        ORDER BY `tabel1`.`koderuang`, tabel1.`kodekelas` LIMIT 10 , 
ERROR - 2021-07-03 13:32:45 --> Severity: Notice --> Undefined variable: mulai C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 80
ERROR - 2021-07-03 13:32:45 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 25 - Invalid query: SELECT tabel1.*,IFNULL(tabel2.jml_terisi,0) AS jml_terisi,IFNULL(tabel2.terisi_perempuan,0) AS terisi_perempuan,IFNULL(tabel2.terisi_lakilaki,0) AS terisi_lakilaki,
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
        ORDER BY `tabel1`.`koderuang`, tabel1.`kodekelas` LIMIT 10 , 
ERROR - 2021-07-03 13:33:18 --> Severity: Notice --> Undefined variable: mulai C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 80
ERROR - 2021-07-03 13:33:18 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ' 10' at line 25 - Invalid query: SELECT tabel1.*,IFNULL(tabel2.jml_terisi,0) AS jml_terisi,IFNULL(tabel2.terisi_perempuan,0) AS terisi_perempuan,IFNULL(tabel2.terisi_lakilaki,0) AS terisi_lakilaki,
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
        ORDER BY `tabel1`.`koderuang`, tabel1.`kodekelas` LIMIT  , 10
ERROR - 2021-07-03 16:21:25 --> Severity: Compile Error --> Cannot redeclare Aplicares_model::getKelas() C:\xampp\htdocs\simrs\application\administrator\models\Aplicares_model.php 124
ERROR - 2021-07-03 14:21:49 --> Severity: error --> Exception: Cannot use object of type stdClass as array C:\xampp\htdocs\simrs\application\administrator\models\Aplicares_model.php 64
ERROR - 2021-07-03 14:23:01 --> Severity: error --> Exception: Cannot use object of type stdClass as array C:\xampp\htdocs\simrs\application\administrator\models\Aplicares_model.php 66
ERROR - 2021-07-03 14:23:13 --> Severity: error --> Exception: Cannot use object of type stdClass as array C:\xampp\htdocs\simrs\application\administrator\models\Aplicares_model.php 65
ERROR - 2021-07-03 14:23:16 --> Severity: error --> Exception: Cannot use object of type stdClass as array C:\xampp\htdocs\simrs\application\administrator\models\Aplicares_model.php 65
ERROR - 2021-07-03 16:46:51 --> Severity: error --> Exception: Call to undefined method Aplicares::webServiceURL() C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 56
ERROR - 2021-07-03 16:48:00 --> Severity: Notice --> Undefined variable: start C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 56
ERROR - 2021-07-03 16:48:00 --> Severity: Notice --> Undefined variable: limit C:\xampp\htdocs\simrs\application\administrator\controllers\Aplicares.php 56
ERROR - 2021-07-03 16:48:00 --> Severity: error --> Exception: Call to undefined function getConsID() C:\xampp\htdocs\simrs\application\administrator\models\Aplicares_model.php 25
ERROR - 2021-07-03 16:48:50 --> Severity: error --> Exception: Call to undefined function getConsID() C:\xampp\htdocs\simrs\application\administrator\models\Aplicares_model.php 25
ERROR - 2021-07-03 14:50:32 --> Severity: Notice --> Undefined variable: jsonData C:\xampp\htdocs\simrs\application\administrator\models\Aplicares_model.php 41
