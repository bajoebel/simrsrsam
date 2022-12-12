<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-12-12 16:05:10 --> Query error: Expression #2 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'rsam_dev.tbl02_jadwal_dokter.jadwal_dokter_nama' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `jadwal_dokter_id` as `NRP`, `jadwal_dokter_nama` as `pgwNama`
FROM `tbl02_jadwal_dokter`
WHERE `jadwal_poly_id` = '1'
GROUP BY `jadwal_dokter_id`
