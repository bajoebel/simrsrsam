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

if (!function_exists('agama')) {
    function agama($param)
    {
    }
}
