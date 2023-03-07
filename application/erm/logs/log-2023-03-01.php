<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2023-03-01 11:15:37 --> Query error: Table 'simrs_erm.rj_konsul_internal' doesn't exist - Invalid query: SELECT `id`, `idx`, `id_daftar`, `reg_unit`, `created_at`, `nomr`, `nama`, `konsul_harap`, `unit_minta`, `dpjp_minta`, `status_form`
FROM `rj_konsul_internal`
WHERE DATE_FORMAT(`created_at`,'%Y-%m-%d') >= '2023-03-01'
AND DATE_FORMAT(`created_at`,'%Y-%m-%d') <= '2023-03-01'
AND `unit_diminta_id` = '3'
ORDER BY `created_at` DESC
 LIMIT 10
