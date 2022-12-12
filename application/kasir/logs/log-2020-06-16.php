<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2020-06-16 11:14:47 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'WHERE ID_DAFTAR='2020091680' AND KDJL NOT IN (SELECT kode_item FROM tbl05_kwitan' at line 6 - Invalid query: INSERT INTO tbl05_kwitansi_detail (no_kwitansi,kode_item,kode_unit,nama_unit,total_item,jenis_item)
            SELECT 'AD2006160001' AS no_kwitansi, tbl04_penjualan.KDJL AS kode_item, 
            '0' AS kode_unit,'Pemakaian Obat' AS nama_unit, SUM(SUBTOTAL) AS total_item, 
            '2' AS jenis_item FROM tbl04_penjualan 
            JOIN tbl04_penjualan_detail ON tbl04_penjualan.KDJL=tbl04_penjualan_detail.KDJL GROUP BY tbl04_penjualan_detail.KDJL 
            WHERE ID_DAFTAR='2020091680' AND KDJL NOT IN (SELECT kode_item FROM tbl05_kwitansi_detail)
ERROR - 2020-06-16 11:18:03 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'WHERE ID_DAFTAR='2020091680' AND KDJL NOT IN (SELECT kode_item FROM tbl05_kwitan' at line 6 - Invalid query: INSERT INTO tbl05_kwitansi_detail (no_kwitansi,kode_item,kode_unit,nama_unit,total_item,jenis_item)
            (SELECT 'AD2006160001' AS no_kwitansi, tbl04_penjualan.KDJL AS kode_item, 
            '0' AS kode_unit,'Pemakaian Obat' AS nama_unit, SUM(SUBTOTAL) AS total_item, 
            '2' AS jenis_item FROM tbl04_penjualan 
            JOIN tbl04_penjualan_detail ON tbl04_penjualan.KDJL=tbl04_penjualan_detail.KDJL GROUP BY tbl04_penjualan_detail.KDJL 
            WHERE ID_DAFTAR='2020091680' AND KDJL NOT IN (SELECT kode_item FROM tbl05_kwitansi_detail))
ERROR - 2020-06-16 11:19:32 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'WHERE ID_DAFTAR='2020091680' AND KDJL NOT IN (SELECT kode_item FROM tbl05_kwitan' at line 6 - Invalid query: INSERT INTO tbl05_kwitansi_detail1 (no_kwitansi,kode_item,kode_unit,nama_unit,total_item,jenis_item)
            (SELECT 'AD2006160002' AS no_kwitansi, tbl04_penjualan.KDJL AS kode_item, 
            '0' AS kode_unit,'Pemakaian Obat' AS nama_unit, SUM(SUBTOTAL) AS total_item, 
            '2' AS jenis_item FROM tbl04_penjualan 
            JOIN tbl04_penjualan_detail ON tbl04_penjualan.KDJL=tbl04_penjualan_detail.KDJL GROUP BY tbl04_penjualan_detail.KDJL 
            WHERE ID_DAFTAR='2020091680' AND KDJL NOT IN (SELECT kode_item FROM tbl05_kwitansi_detail))
ERROR - 2020-06-16 11:24:15 --> Query error: Table 'db_rs_open_dev.tbl05_kwitansi_detail1' doesn't exist - Invalid query: INSERT INTO tbl05_kwitansi_detail1 (no_kwitansi,kode_item,kode_unit,nama_unit,total_item,jenis_item)
            (SELECT 'AD2006160003' AS no_kwitansi, tbl04_penjualan.KDJL AS kode_item, 
            '0' AS kode_unit,'Pemakaian Obat' AS nama_unit, SUM(SUBTOTAL) AS total_item, 
            '2' AS jenis_item FROM tbl04_penjualan 
            JOIN tbl04_penjualan_detail ON tbl04_penjualan.KDJL=tbl04_penjualan_detail.KDJL  
            WHERE ID_DAFTAR='2020091680' AND tbl04_penjualan_detail.KDJL NOT IN (SELECT kode_item FROM tbl05_kwitansi_detail) 
            GROUP BY tbl04_penjualan_detail.KDJL)
ERROR - 2020-06-16 11:25:19 --> Query error: Table 'db_rs_open_dev.tbl05_kwitansi_detail1' doesn't exist - Invalid query: INSERT INTO tbl05_kwitansi_detail1 (no_kwitansi,kode_item,kode_unit,nama_unit,total_item,jenis_item)
            SELECT 'AD2006160004' AS no_kwitansi, tbl04_penjualan.KDJL AS kode_item, 
            '0' AS kode_unit,'Pemakaian Obat' AS nama_unit, SUM(SUBTOTAL) AS total_item, 
            '2' AS jenis_item FROM tbl04_penjualan 
            JOIN tbl04_penjualan_detail ON tbl04_penjualan.KDJL=tbl04_penjualan_detail.KDJL  
            WHERE ID_DAFTAR='2020091680' AND tbl04_penjualan_detail.KDJL NOT IN (SELECT kode_item FROM tbl05_kwitansi_detail) 
            GROUP BY tbl04_penjualan_detail.KDJL
