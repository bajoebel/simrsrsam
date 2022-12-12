<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-02-07 12:19:37 --> Query error: Table 'db_simrs_v2.tbl01_pegawai1' doesn't exist - Invalid query: SELECT a.*,b.pgwNama, d.level FROM tbl01_users_mr_registrasi a 
        LEFT JOIN tbl01_pegawai1 b ON a.NRP=b.nrp JOIN tbl01_acc_level d ON a.levelid = d.idx
        WHERE a.NRP = 'nofrinda' OR  pgwNama LIKE '%nofrinda%' ORDER BY a.idx DESC
ERROR - 2022-02-07 12:21:50 --> Query error: Table 'db_simrs_v2.tbl01_pegawai1' doesn't exist - Invalid query: SELECT a.*,b.pgwNama, d.level FROM tbl01_users_mr_registrasi a 
        LEFT JOIN tbl01_pegawai1 b ON a.NRP=b.nrp JOIN tbl01_acc_level d ON a.levelid = d.idx
        WHERE a.NRP = 'nofrinda' OR  pgwNama LIKE '%nofrinda%' ORDER BY a.idx DESC
