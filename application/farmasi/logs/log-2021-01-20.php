<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-01-20 09:58:21 --> Query error: Table 'db_simrs_v2.tbl04_lokasi1' doesn't exist - Invalid query: SELECT a.KDBRG,b.NMBRG,b.KDSATUAN,b.NMSATUAN,a.TGLBELI,a.HMODAL,SUM(a.JSTOK) AS JSTOK,
        a.KDLOKASI,c.NMLOKASI
        FROM stok_barang_fifo a 
        JOIN tbl04_barang b ON a.KDBRG=b.KDBRG
        LEFT JOIN tbl04_lokasi1 c ON a.KDLOKASI=c.KDLOKASI
        WHERE NMBRG LIKE '%%' AND a.KDLOKASI = '1' GROUP BY a.KDBRG,a.KDLOKASI
