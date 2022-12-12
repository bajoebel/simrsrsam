<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2020-12-04 10:07:17 --> Query error: Unknown column 'b.KDJENISBRG' in 'where clause' - Invalid query: SELECT *
FROM `tbl04_pembelian` `a`
JOIN `tbl04_pembelian_detail` `b` ON `a`.`KDBL`=`b`.`KDBL`
JOIN `tbl04_barang` `c` ON `b`.`KDBRG` = `c`.`KDBRG`
WHERE `b`.`KDJENISBRG` = 1
AND   (
`b`.`KDBRG` LIKE '%%' ESCAPE '!'
OR  `b`.`NMBRG` LIKE '%%' ESCAPE '!'
OR  `NMGENERIK` LIKE '%%' ESCAPE '!'
OR  `NMSATUAN` LIKE '%%' ESCAPE '!'
OR  `NMKTBRG` LIKE '%%' ESCAPE '!'
OR  `JENISBRG` LIKE '%%' ESCAPE '!'
 )
GROUP BY `a`.`KDBL`, `b`.`KDBRG`
ERROR - 2020-12-04 10:08:38 --> Query error: Unknown column 'b.KDJENISBRG' in 'where clause' - Invalid query: SELECT *
FROM `tbl04_pembelian` `a`
JOIN `tbl04_pembelian_detail` `b` ON `a`.`KDBL`=`b`.`KDBL`
JOIN `tbl04_barang` `c` ON `b`.`KDBRG` = `c`.`KDBRG`
WHERE `b`.`KDJENISBRG` = 1
AND   (
`b`.`KDBRG` LIKE '%%' ESCAPE '!'
OR  `b`.`NMBRG` LIKE '%%' ESCAPE '!'
OR  `NMGENERIK` LIKE '%%' ESCAPE '!'
OR  `NMSATUAN` LIKE '%%' ESCAPE '!'
OR  `NMKTBRG` LIKE '%%' ESCAPE '!'
OR  `JENISBRG` LIKE '%%' ESCAPE '!'
 )
GROUP BY `a`.`KDBL`, `b`.`KDBRG`
ERROR - 2020-12-04 10:08:47 --> Query error: Unknown column 'b.KDJENISBRG' in 'where clause' - Invalid query: SELECT *
FROM `tbl04_pembelian` `a`
JOIN `tbl04_pembelian_detail` `b` ON `a`.`KDBL`=`b`.`KDBL`
JOIN `tbl04_barang` `c` ON `b`.`KDBRG` = `c`.`KDBRG`
WHERE `b`.`KDJENISBRG` = 1
AND   (
`b`.`KDBRG` LIKE '%%' ESCAPE '!'
OR  `b`.`NMBRG` LIKE '%%' ESCAPE '!'
OR  `NMGENERIK` LIKE '%%' ESCAPE '!'
OR  `NMSATUAN` LIKE '%%' ESCAPE '!'
OR  `NMKTBRG` LIKE '%%' ESCAPE '!'
OR  `JENISBRG` LIKE '%%' ESCAPE '!'
 )
GROUP BY `a`.`KDBL`, `b`.`KDBRG`
