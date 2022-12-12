<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2020-11-18 15:19:25 --> Query error: Unknown column 'TGLEXP' in 'where clause' - Invalid query: SELECT a.*,b.NMBRG 
                                                FROM stok_barang_fifo a
                                                LEFT JOIN tbl04_barang b ON a.KDBRG=b.KDBRG
                                                WHERE a.KDLOKASI='1' AND a.KDBRG='000251'
                                                AND HMODAL = 5517.7393 AND TGLBELI = '2020-10-01' 
                                                AND TGLEXP='2022-12-31'
ERROR - 2020-11-18 15:19:29 --> Query error: Unknown column 'TGLEXP' in 'where clause' - Invalid query: SELECT a.*,b.NMBRG 
                                                FROM stok_barang_fifo a
                                                LEFT JOIN tbl04_barang b ON a.KDBRG=b.KDBRG
                                                WHERE a.KDLOKASI='1' AND a.KDBRG='000251'
                                                AND HMODAL = 5517.7393 AND TGLBELI = '2020-10-01' 
                                                AND TGLEXP='2022-12-31'
