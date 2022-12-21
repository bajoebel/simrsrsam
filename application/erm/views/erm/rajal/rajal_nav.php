<div class="nav-tabs-custom">
    <ul class="nav nav-pills nav-stacked">
        <li onclick="getRiwayat(1,<?= $detail->idx ?>)"><a href="#tab_1" data-toggle="tab">Surat Masuk Rawat Jalan</a></li>
        <li onclick="getRiwayat(2,<?= $detail->idx ?>)"><a href="#tab_2" data-toggle="tab">Persetujuan Umum</a></li>
        <li onclick="getRiwayat(3,<?= $detail->idx ?>)"><a href="#tab_3" data-toggle="tab">Kajian Awal Keperawatan</a></li>
        <li onclick="getRiwayat(4,<?= $detail->idx ?>)"><a href="#tab_5" data-toggle="tab">Kajian Awal Medis</a></li>
        <li onclick="getRiwayat(5,<?= $detail->idx ?>)"><a href="#tab_5" data-toggle="tab">Perkembangan Pasien Terintegrasi</a></li>
        <li class="active" onclick="getRiwayat(6,<?= $detail->idx ?>)"><a href="#tab_6" data-toggle="tab">Informasi Pasien Dan Keluarga</a></li>
    </ul>
</div>