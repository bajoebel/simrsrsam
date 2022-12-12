<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-07-18 09:54:21 --> Query error: Table 'rsam_mr_registrasi_v3.tbl04_lokasi' doesn't exist - Invalid query: SELECT a.*,b.pgwNama,d.level,
        GROUP_CONCAT(DISTINCT c.NMLOKASI ORDER BY c.NMLOKASI DESC SEPARATOR '<br/>') AS ruang 
        FROM tbl01_users_farmasi a 
        LEFT JOIN tbl01_pegawai b ON a.NRP=b.nrp 
        LEFT JOIN tbl04_lokasi c ON a.ruang_akses=c.KDLOKASI 
        LEFT join tbl01_acc_level d ON a.levelid=d.idx 
         GROUP BY NRP ORDER BY a.idx DESC
ERROR - 2022-07-18 09:54:26 --> Query error: Table 'rsam_mr_registrasi_v3.tbl04_lokasi' doesn't exist - Invalid query: SELECT a.*,b.pgwNama,d.level,
        GROUP_CONCAT(DISTINCT c.NMLOKASI ORDER BY c.NMLOKASI DESC SEPARATOR '<br/>') AS ruang 
        FROM tbl01_users_farmasi a 
        LEFT JOIN tbl01_pegawai b ON a.NRP=b.nrp 
        LEFT JOIN tbl04_lokasi c ON a.ruang_akses=c.KDLOKASI 
        LEFT join tbl01_acc_level d ON a.levelid=d.idx 
         GROUP BY NRP ORDER BY a.idx DESC
ERROR - 2022-07-18 10:18:48 --> Query error: Duplicate entry 'NRP2207001' for key 'PRIMARY' - Invalid query: INSERT INTO `tbl01_pegawai` (`NIP`, `pgwNama`, `pgwJenkel`, `pgwTmpLahir`, `pgwTglLahir`, `pgwAgama`, `pgwAlmt`, `pgwTelp`, `profId`, `userStatus`, `userPasw`) VALUES ('198906042015022002', 'VENY ANGGRIANI, S.KOM', '0', 'PADANG', '1989-06-04', 'ISLAM', 'AIA PACAH PADANG', '0', '8', '1', '827ccb0eea8a706c4c34a16891f84e7b')
ERROR - 2022-07-18 10:19:10 --> Query error: Duplicate entry 'NRP2207001' for key 'PRIMARY' - Invalid query: INSERT INTO `tbl01_pegawai` (`NIP`, `pgwNama`, `pgwJenkel`, `pgwTmpLahir`, `pgwTglLahir`, `pgwAgama`, `pgwAlmt`, `pgwTelp`, `profId`, `userStatus`, `userPasw`) VALUES ('198906042015022002', 'VENY ANGGRIANI, S.KOM', '0', 'PADANG', '1989-06-04', 'ISLAM', 'AIA PACAH PADANG', '0', '8', '1', '827ccb0eea8a706c4c34a16891f84e7b')
ERROR - 2022-07-18 10:19:24 --> Query error: Duplicate entry 'NRP2207001' for key 'PRIMARY' - Invalid query: INSERT INTO `tbl01_pegawai` (`NIP`, `pgwNama`, `pgwJenkel`, `pgwTmpLahir`, `pgwTglLahir`, `pgwAgama`, `pgwAlmt`, `pgwTelp`, `profId`, `userStatus`, `userPasw`) VALUES ('198906042015022002', 'VENY ANGGRIANI, S.KOM', '0', 'PADANG', '1989-06-04', 'ISLAM', 'AIA PACAH PADANG', '0', '8', '1', '827ccb0eea8a706c4c34a16891f84e7b')
ERROR - 2022-07-18 10:20:43 --> Query error: Duplicate entry 'NRP2207001' for key 'PRIMARY' - Invalid query: INSERT INTO `tbl01_pegawai` (`NIP`, `pgwNama`, `pgwJenkel`, `pgwTmpLahir`, `pgwTglLahir`, `pgwAgama`, `pgwAlmt`, `pgwTelp`, `profId`, `userStatus`, `userPasw`) VALUES ('198906042015022002', 'VENY ANGGRIANI, S.KOM', '0', 'PADANG', '1989-06-04', 'ISLAM', 'AIA PACAH PADANG', '0', '8', '1', '827ccb0eea8a706c4c34a16891f84e7b')
ERROR - 2022-07-18 10:21:12 --> Query error: Duplicate entry 'NRP2207001' for key 'PRIMARY' - Invalid query: INSERT INTO `tbl01_pegawai` (`NIP`, `pgwNama`, `pgwJenkel`, `pgwTmpLahir`, `pgwTglLahir`, `pgwAgama`, `pgwAlmt`, `pgwTelp`, `profId`, `userStatus`, `userPasw`) VALUES ('198906042015022002', 'VENY ANGGRIANI, S.KOM', '0', 'PADANG', '1989-06-04', 'ISLAM', 'AIA PACAH PADANG', '0', '8', '1', '827ccb0eea8a706c4c34a16891f84e7b')
ERROR - 2022-07-18 11:40:34 --> Query error: Duplicate entry 'NRP2207001' for key 'PRIMARY' - Invalid query: INSERT INTO `tbl01_pegawai` (`NIP`, `pgwNama`, `pgwJenkel`, `pgwTmpLahir`, `pgwTglLahir`, `pgwAgama`, `pgwAlmt`, `pgwTelp`, `profId`, `userStatus`, `userPasw`) VALUES ('', 'VENY ANGGRIANI,S.KOM', '1', 'PADANG', '1989-06-04', 'ISLAM', 'AIA PACAH PADANG', '0258844', '8', '1', '827ccb0eea8a706c4c34a16891f84e7b')
ERROR - 2022-07-18 11:41:07 --> Query error: Duplicate entry 'NRP2207001' for key 'PRIMARY' - Invalid query: INSERT INTO `tbl01_pegawai` (`NIP`, `pgwNama`, `pgwJenkel`, `pgwTmpLahir`, `pgwTglLahir`, `pgwAgama`, `pgwAlmt`, `pgwTelp`, `profId`, `userStatus`, `userPasw`) VALUES ('', 'VENY ANGGRIANI,S.KOM', '1', 'PADANG', '1989-06-04', 'ISLAM', 'AIA PACAH PADANG', '0258844', '8', '1', '827ccb0eea8a706c4c34a16891f84e7b')
ERROR - 2022-07-18 11:42:17 --> Query error: Duplicate entry 'NRP2207001' for key 'PRIMARY' - Invalid query: INSERT INTO `tbl01_pegawai` (`NIP`, `pgwNama`, `pgwJenkel`, `pgwTmpLahir`, `pgwTglLahir`, `pgwAgama`, `pgwAlmt`, `pgwTelp`, `profId`, `userStatus`, `userPasw`) VALUES ('', 'Meri', '0', '', '2022-07-01', 'ISLAM', '', '0', '9', '1', '827ccb0eea8a706c4c34a16891f84e7b')
ERROR - 2022-07-18 11:44:48 --> Query error: Duplicate entry 'NRP2207001' for key 'PRIMARY' - Invalid query: INSERT INTO `tbl01_pegawai` (`NIP`, `pgwNama`, `pgwJenkel`, `pgwTmpLahir`, `pgwTglLahir`, `pgwAgama`, `pgwAlmt`, `pgwTelp`, `profId`, `userStatus`, `userPasw`) VALUES ('', 'Meri', '0', '', '2022-07-01', 'ISLAM', '', '0', '9', '1', '827ccb0eea8a706c4c34a16891f84e7b')
ERROR - 2022-07-18 11:48:59 --> Query error: Duplicate entry 'NRP2207001' for key 'PRIMARY' - Invalid query: INSERT INTO `tbl01_pegawai` (`NIP`, `pgwNama`, `pgwJenkel`, `pgwTmpLahir`, `pgwTglLahir`, `pgwAgama`, `pgwAlmt`, `pgwTelp`, `profId`, `userStatus`, `userPasw`) VALUES ('', 'Meri', '0', '', '2022-07-01', 'ISLAM', '', '0', '9', '1', '827ccb0eea8a706c4c34a16891f84e7b')
