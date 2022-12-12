<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2020-10-21 08:35:57 --> Query error: Column 'levelid' in on clause is ambiguous - Invalid query: SELECT *
FROM `tbl01_users_farmasi`
JOIN `tbl01_acc_level_user` ON `NRP`=`nrp_user`
JOIN `tbl01_acc_level` ON `tbl01_acc_level`.`idx`=`levelid`
WHERE `NRP` = 'NRP1910460'
AND `tbl01_acc_level`.`id_modul` = '4'
