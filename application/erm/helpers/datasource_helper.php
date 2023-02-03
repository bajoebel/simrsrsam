<?php
if (!function_exists('jns_kelamin')) {
    function jns_kelamin($param)
    {
        switch ($param) {
            case '0':
                return "tidak diketahui";
                break;
            case '1':
                return "laki-laki";
                break;
            case '2':
                return "perempuan";
                break;
            case '3':
                return "tidak dapat ditentukan";
                break;
            case '4':
                return "tidak mengisi";
                break;
            default:
                return "-";
                break;
        }
    }
}

if (!function_exists('agama')) {
    function agama($param)
    {
        switch ($param) {
            case '1':
                return "Islam";
                break;
            case '2':
                return "kristen";
                break;
            case '3':
                return "katholik";
                break;
            case '4':
                return "hindu";
                break;
            case '5':
                return "budha";
                break;
            case '6':
                return "konghocu";
                break;
            case '7':
                return "penghayat";
                break;
            case '8':
                return "Lain-lain";
                break;
            default:
                return "-";
                break;
        }
    }
}

if (!function_exists('edukasi')) {
    function edukasi($param)
    {
        function agama($param)
        {
            switch ($param) {
                case '1':
                    return "Asuhan Medis";
                    break;
                case '2':
                    return "Asuhan Keperawatan";
                    break;
                case '3':
                    return "Pengobatan";
                    break;
                case '4':
                    return "Asuhan Gizi";
                    break;
                case '5':
                    return "Manajemen Nyeri";
                    break;
                case '6':
                    return "Rehabilitasi";
                    break;
                case '7':
                    return "Penggunaan Alat Medis";
                    break;
                case '8':
                    return "Hand Hygiene";
                    break;
                case '9':
                    return "Rohani";
                    break;
                case '10':
                    return "Pendaftaran dan Admisi";
                    break;
                case '11':
                    return "Prosedur dan Perawatan";
                    break;
                case '12':
                    return "Lainnya...";
                    break;
                default:
                    return "-";
                    break;
            }
        }
    }
}

if (!function_exists('status_erm')) {
    function status_erm($param)
    {
        $result = "";
        if ($param == 0) {
            $result = "<span class='badge bg-yellow'>Proses</span>";
        } else if ($param == 1) {
            $result = "<span class='badge bg-green'>Final</span>";
        }
        return $result;
    }
}


if (!function_exists('jenis_tenaga_medis')) {
    function jenis_tenaga_medis($param)
    {
        switch ($param) {
            case '1':
                return "Dokter";
                break;
            case '2':
                return "Anastesi";
                break;
            case '3':
                return "Paramedis";
                break;
            case '4':
                return "Apoteker";
                break;
            case '5':
                return "Bidan";
                break;
            case '6':
                return "Analis";
                break;
            case '7':
                return "Penata Anastesi";
                break;
            case '8':
                return "Nutrisionist";
                break;
            default:
                return "undefined";
                break;
        }
    }
}

if (!function_exists('pendidikan')) {
    function pendidikan($param)
    {
        switch ($param) {
            case '0':
                return "Tidak Sekolah";
                break;
            case '1':
                return "SD";
                break;
            case '2':
                return "SLTP sederajat";
                break;
            case '3':
                return "SLTA sederajat";
                break;
            case '4':
                return "D1-D3 sederajat";
                break;
            case '5':
                return "D4";
                break;
            case '6':
                return "S1";
                break;
            case '7':
                return "S2";
                break;
            case '8':
                return "S3";
                break;
            default:
                return "undefined";
                break;
        }
    }
}

if (!function_exists('terbatas_fisik')) {
    function terbatas_fisik($param)
    {
        switch ($param) {
            case '1':
                return "Tidak Sekolah";
                break;
            case '2':
                return "Penglihatan Terganggu";
                break;
            case '3':
                return "Pendengaran terganggu";
                break;
            case '4':
                return "Gangguan bicara";
                break;
            case '5':
                return "Fisik Lemah";
                break;
            case '6':
                return "Kognitif terbatas";
                break;
            case '7':
                return "lain-lain";
                break;
            default:
                return "undefined";
                break;
        }
    }
}

if (!function_exists('hambatan')) {
    function hambatan($param)
    {
        switch ($param) {
            case '1':
                return "Tidak ada";
                break;
            case '2':
                return "Penglihatan Terganggu";
                break;
            case '3':
                return "Emosional Terganggu";
                break;
            case '4':
                return "Lain-lain";
                break;
            default:
                return "undefined";
                break;
        }
    }
}

if (!function_exists('kebutuhan_edukasi')) {
    function kebutuhan_edukasi($param)
    {
        switch ($param) {
            case '1':
                return "Asuhan Medis";
                break;
            case '2':
                return "Asuhan Keperawatan";
                break;
            case '3':
                return "Pengobatan";
                break;
            case '4':
                return "Asuhan Gizi";
                break;
            case '5':
                return "Manahemen Nyeri";
                break;
            case '6':
                return "Rehabilitasi";
                break;
            case '7s':
                return "Penggunaan alat-alat medis";
                break;
            case '8':
                return "Hand Hygiene";
                break;
            case '9':
                return "Rohani";
                break;
            case '10':
                return "Pendaftaran admisi";
                break;
            case '11':
                return "Prosedur dan Perawatan";
                break;
            case '12':
                return "Lain-lain";
                break;
            default:
                return "undefined";
                break;
        }
    }
}

function status_permintaan_penunjang($status) {
    switch ($status) {
        case '1':
            return "<span class='badge bg-default'>Diajukan</span>";
            break;
        case '2':
            return "<span class='badge bg-yellow'>Diproses</badge>";
            break;
        case '3':
            return "<span class='badge bg-green'>Selesai<badge>";
            break;
        default:
           return "-";
            break;
    }
}

function status_permintaan_resep($status) {
    switch ($status) {
        case '1':
            return "<span class='badge bg-default'>Diajukan</span>";
            break;
        case '2':
            return "<span class='badge bg-yellow'>Diproses</badge>";
            break;
        case '3':
            return "<span class='badge bg-green'>Selesai<badge>";
            break;
        default:
           return "-";
            break;
    }
}

