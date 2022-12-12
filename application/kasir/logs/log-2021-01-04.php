<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-01-04 14:48:29 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'ASC' at line 4 - Invalid query: SELECT a.*,IFNULL(SUM(b.sub_total_item),0) AS sub_total 
                        FROM tbl01_kategori_tarif a LEFT JOIN 
                        (SELECT * FROM tbl05_kwitansi_detail_item WHERE no_kwitansi='AD2101040001') b 
                        ON a.idx=b.kategori_id GROUP BY a.idx ASC
ERROR - 2021-01-04 15:14:42 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'ASC' at line 4 - Invalid query: SELECT a.*,IFNULL(SUM(b.sub_total_item),0) AS sub_total 
                        FROM tbl01_kategori_tarif a LEFT JOIN 
                        (SELECT * FROM tbl05_kwitansi_detail_item WHERE no_kwitansi='AD2101040001') b 
                        ON a.idx=b.kategori_id GROUP BY a.idx ASC
ERROR - 2021-01-04 15:24:05 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'ASC' at line 4 - Invalid query: SELECT a.*,IFNULL(SUM(b.sub_total_item),0) AS sub_total 
                        FROM tbl01_kategori_tarif a LEFT JOIN 
                        (SELECT * FROM tbl05_kwitansi_detail_item WHERE no_kwitansi='AD2101040001') b 
                        ON a.idx=b.kategori_id GROUP BY a.idx ASC
