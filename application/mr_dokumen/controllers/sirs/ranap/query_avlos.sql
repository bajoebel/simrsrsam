SELECT a.*,
SUM(IF(DATE_FORMAT(tgl_keluar,'%m')='01',los-1,0)) AS 'M01',
SUM(IF(DATE_FORMAT(tgl_keluar,'%m')='02',los-1,0)) AS 'M02',
SUM(IF(DATE_FORMAT(tgl_keluar,'%m')='03',los-1,0)) AS 'M03',
SUM(IF(DATE_FORMAT(tgl_keluar,'%m')='04',los-1,0)) AS 'M04',
SUM(IF(DATE_FORMAT(tgl_keluar,'%m')='05',los-1,0)) AS 'M05',
SUM(IF(DATE_FORMAT(tgl_keluar,'%m')='06',los-1,0)) AS 'M06',
SUM(IF(DATE_FORMAT(tgl_keluar,'%m')='07',los-1,0)) AS 'M07',
SUM(IF(DATE_FORMAT(tgl_keluar,'%m')='08',los-1,0)) AS 'M08',
SUM(IF(DATE_FORMAT(tgl_keluar,'%m')='09',los-1,0)) AS 'M09',
SUM(IF(DATE_FORMAT(tgl_keluar,'%m')='10',los-1,0)) AS 'M10',
SUM(IF(DATE_FORMAT(tgl_keluar,'%m')='11',los-1,0)) AS 'M11',
SUM(IF(DATE_FORMAT(tgl_keluar,'%m')='12',los-1,0)) AS 'M12'
FROM tbl01_ruang a LEFT JOIN 
(SELECT * FROM tbl07_report_sirs WHERE DATE_FORMAT(tgl_keluar,'%Y') = '2019'
AND jns_layanan='RI') b ON a.idx = b.id_ruang
WHERE grid = 2
GROUP BY a.idx;

SELECT a.*,
SUM(IF(DATE_FORMAT(tgl_keluar,'%m')='01',1,0)) AS 'K01',
SUM(IF(DATE_FORMAT(tgl_keluar,'%m')='02',1,0)) AS 'K02',
SUM(IF(DATE_FORMAT(tgl_keluar,'%m')='03',1,0)) AS 'K03',
SUM(IF(DATE_FORMAT(tgl_keluar,'%m')='04',1,0)) AS 'K04',
SUM(IF(DATE_FORMAT(tgl_keluar,'%m')='05',1,0)) AS 'K05',
SUM(IF(DATE_FORMAT(tgl_keluar,'%m')='06',1,0)) AS 'K06',
SUM(IF(DATE_FORMAT(tgl_keluar,'%m')='07',1,0)) AS 'K07',
SUM(IF(DATE_FORMAT(tgl_keluar,'%m')='08',1,0)) AS 'K08',
SUM(IF(DATE_FORMAT(tgl_keluar,'%m')='09',1,0)) AS 'K09',
SUM(IF(DATE_FORMAT(tgl_keluar,'%m')='10',1,0)) AS 'K10',
SUM(IF(DATE_FORMAT(tgl_keluar,'%m')='11',1,0)) AS 'K11',
SUM(IF(DATE_FORMAT(tgl_keluar,'%m')='12',1,0)) AS 'K12'
FROM tbl01_ruang a LEFT JOIN 
(SELECT * FROM tbl07_report_sirs WHERE DATE_FORMAT(tgl_keluar,'%Y') = '2019'
AND jns_layanan='RI') b ON a.idx = b.id_ruang
WHERE grid = 2
GROUP BY a.idx;


