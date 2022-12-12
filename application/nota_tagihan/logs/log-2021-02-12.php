<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-02-12 18:25:00 --> Severity: Notice --> Undefined property: Login::$bdb C:\xampp32\htdocs\simrs\system\core\Model.php 73
ERROR - 2021-02-12 18:25:00 --> Severity: Error --> Call to a member function select() on null C:\xampp32\htdocs\simrs\application\nota_tagihan\models\Users_model.php 12
ERROR - 2021-02-12 18:25:02 --> Severity: Notice --> Undefined property: Login::$bdb C:\xampp32\htdocs\simrs\system\core\Model.php 73
ERROR - 2021-02-12 18:25:02 --> Severity: Error --> Call to a member function select() on null C:\xampp32\htdocs\simrs\application\nota_tagihan\models\Users_model.php 12
ERROR - 2021-02-12 18:25:12 --> Severity: Notice --> Undefined property: Login::$bdb C:\xampp32\htdocs\simrs\system\core\Model.php 73
ERROR - 2021-02-12 18:25:12 --> Severity: Error --> Call to a member function select() on null C:\xampp32\htdocs\simrs\application\nota_tagihan\models\Users_model.php 12
ERROR - 2021-02-12 18:25:38 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'b ON a.`NRP`=b.`NRP`
WHERE `NRP` = 'NRP1910118'
AND `userPasw` = '827ccb0eea8a70' at line 3 - Invalid query: SELECT *, GROUP_CONCAT(ruang_akses) AS ruang_akses
FROM `tbl01_users_nota_tagihan` `a`
JOIN `tbl01_pegaawai` ON `tbl01_pegawai` b ON a.`NRP`=b.`NRP`
WHERE `NRP` = 'NRP1910118'
AND `userPasw` = '827ccb0eea8a706c4c34a16891f84e7b'
ERROR - 2021-02-12 18:26:21 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'b ON a.`NRP`=b.`NRP`
WHERE `NRP` = 'NRP1910118'
AND `userPasw` = '827ccb0eea8a70' at line 3 - Invalid query: SELECT *, GROUP_CONCAT(ruang_akses) AS ruang_akses
FROM `tbl01_users_nota_tagihan` `a`
JOIN `tbl01_pegawai` `b` ON `tbl01_pegawai` b ON a.`NRP`=b.`NRP`
WHERE `NRP` = 'NRP1910118'
AND `userPasw` = '827ccb0eea8a706c4c34a16891f84e7b'
ERROR - 2021-02-12 18:27:09 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'ON a.`NRP`=b.`NRP`
WHERE `NRP` = 'NRP1910118'
AND `userPasw` = '827ccb0eea8a706c' at line 3 - Invalid query: SELECT *, GROUP_CONCAT(ruang_akses) AS ruang_akses
FROM `tbl01_users_nota_tagihan` `a`
JOIN `tbl01_pegawai` `b` ON `tbl01_pegawai` ON a.`NRP`=b.`NRP`
WHERE `NRP` = 'NRP1910118'
AND `userPasw` = '827ccb0eea8a706c4c34a16891f84e7b'
ERROR - 2021-02-12 18:29:07 --> Query error: Column 'NRP' in where clause is ambiguous - Invalid query: SELECT *, GROUP_CONCAT(ruang_akses) AS ruang_akses
FROM `tbl01_users_nota_tagihan` `a`
JOIN `tbl01_pegawai` `b` ON a.`NRP`=b.`NRP`
WHERE `NRP` = 'NRP1910118'
AND `userPasw` = '827ccb0eea8a706c4c34a16891f84e7b'
ERROR - 2021-02-12 18:37:05 --> Query error: Table 'db_simrs_v2.tbl01_users_nota_tagihan1' doesn't exist - Invalid query: SELECT *, GROUP_CONCAT(ruang_akses) AS ruang_akses
FROM `tbl01_users_nota_tagihan1` `a`
JOIN `tbl01_pegawai` `b` ON a.`NRP`=b.`NRP`
WHERE `a`.`NRP` = 'NRP2101021'
AND `userPasw` = '827ccb0eea8a706c4c34a16891f84e7b'
ERROR - 2021-02-12 18:47:59 --> Query error: Table 'db_simrs_v2.tbl01_users_nota_tagihan1' doesn't exist - Invalid query: SELECT *, GROUP_CONCAT(ruang_akses) AS ruang_akses
FROM `tbl01_users_nota_tagihan1` `a`
JOIN `tbl01_pegawai` `b` ON a.`NRP`=b.`NRP`
WHERE `a`.`NRP` = 'NRP2101021'
AND `userPasw` = '827ccb0eea8a706c4c34a16891f84e7b'
