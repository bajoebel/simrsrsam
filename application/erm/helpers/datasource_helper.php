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
            $result = "<span class='badge bg-green'>Proses</span>";
        } else if ($param == 1) {
            $result = "<span class='badge bg-red'>Final</span>";
        }
        return $result;
    }
}
