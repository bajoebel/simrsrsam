Yth. Bapak & Ibu IT RS se Kantor Cabang Bukittinggi
semoga bapak dan ibu semua dalam keadaan sehat wal'afiat dan selalu dalam lidungan--Nya.. Aamiin..
izin pemberitahuan awal sebelum ada surat resmi / sosialisasi dari bpjs kesehatan terkait briging vclaim dan bridging antrean versi 2.0
berikut beberapa point yg perlu diketahui  :
Bridging vclaim versi 2.0
1. bagi rumah sakit yang ingin mengakses catalog baik vclaim/antrean versi 2.0 dapat melakukan registrasi 
   melalui aplikasi via internet public : https://dvlp.bpjs-kesehatan.go.id:8888/trust-mark/
   proses approve trust mark oleh kantor pusat 

2. untuk pengajuan pengembangan vclaim versi 2.0, rs mengajukan surat permintaan pengembangan bridging vclaim ke kantor cabang untuk mendapatkan cons id , secret key serta user key tester ( masa berlaku selama 3 bulan semenjak cons id diberikan )

3.  Base URL pada web service bridging VClaim versi 2.0 sebagai berikut: 
•  Development: https://apijkn-dev.bpjs-kesehatan.go.id/vclaim-rest-dev/ 
•  Production: https://apijkn.bpjs-kesehatan.go.id/vclaim-rest/ 

4. Untuk FKRTL yang saat ini sudah menjalankan web service bridging Versi 1.1 atau sebelumnya diharapkan proses pengembangan web service bridging Versi 2.0 dapat diselesaikan hingga tanggal 31 Desember 2021, maka per tanggal 01 Januari 2022 FKRTL tersebut sudah menjalankan Bridging System yang baru.  

5. Apabila FKRTL dalam tenggang waktu pada point 4 belum melakukan penyesuaian Bridging Vclaim Versi 2.0, maka FKRTL harus menggunakan aplikasi VClaim eksisting untuk pembuatan SEP. 

Antrean online versi 2.0
1. untuk pengajuan pengembangan antrean versi 2.0, rs mengajukan surat permintaan pengembangan bridging antrean ke kantor cabang untuk mendapatkan cons id , secret key serta user key tester ( masa berlaku selama 3 bulan semenjak cons id diberikan )

2.  Bagi  FKRTL  yang  melakukan  pengembangan  bridging  Antrean  Online  disyaratkan untuk menyediakan service   SSL https mulai dari area development sampai dengan  area production.

3.  Port URL yang diajukan oleh FKRTL mengacu ke daftar Port yang diijinkan oleh BPJS  Kesehatan sebagai berikut:
     1111    8011     888     1380     8080     8880     28444     8081     443 
     8888    40         8082    8889    5000     8083     9007        7777   
     8084    9081     7778   8085     9089    8000      8338       9990 


4.  Base URL pada web service bridging Antrean Online versi 2.0 sebagai berikut: 
    •  Development: https://apijkn-dev.bpjs-kesehatan.go.id/antreanrs_dev/ 
    •  Production: https://apijkn.bpjs-kesehatan.go.id/antreanrs/ 


Matriks nya jika sudah update vclaim 2.0 -> bisa mengajukan bridging antrean 2.0
jika belum update/tidak bridging vclaim   -> menggunakan antrean non bridging yang disediakan oleh bpjs kesehatan 

Demikian info awal terkait bridging, nnti bisa sharing diskusi  di grup ini. 
Terima kasih .