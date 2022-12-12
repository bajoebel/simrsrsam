<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2020-11-27 08:33:22 --> Query error: Unknown column 'PIN' in 'where clause' - Invalid query: SELECT *
FROM `tbl04_pembelian` `a`
JOIN `tbl04_pembelian_detail` `b` ON `a`.`KDBL` = `b`.`KDBL`
WHERE `PIN` = '7d614f28a3be266466fc3e021ffb7971'
AND `IDX` = '4475'
