<?php
// namespace src\LZCompressor;
// if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH.'helpers/src/LZCompressor/LZString.php');
require_once(APPPATH.'helpers/src/LZCompressor/LZContext.php');
require_once(APPPATH.'helpers/src/LZCompressor/LZData.php');
require_once(APPPATH.'helpers/src/LZCompressor/LZReverseDictionary.php');
require_once(APPPATH.'helpers/src/LZCompressor/LZUtil.php');
require_once(APPPATH.'helpers/src/LZCompressor/LZUtil16.php');
function decomuri($string){
    $CI =& get_instance();
    // $data = new LZString::decompressFromEncodedURIComponent($string);
    $data=new LZCompressor\LZString();
    return $data::decompressFromEncodedURIComponent($string);
}
function comuri($hash_string){
    $CI =& get_instance();
    // $data = new LZString::decompressFromEncodedURIComponent($string);
    $data=new LZCompressor\LZString();
    return $data::compressToEncodedURIComponent($hash_string);
}

function com($uncompreseddata){
    $CI =& get_instance();
    $data=new LZCompressor\LZString();
    return $data::compress($uncompreseddata);
}
function decom($compresdata){
    $CI =& get_instance();
    $data=new LZCompressor\LZString();
    return $data::decompress($compresdata);
}
function combase64($uncompreseddata){
    $CI =& get_instance();
    $data=new LZCompressor\LZString();
    return $data::compressToBase64($uncompreseddata);
}
function decombase64($compresdata){
    $CI =& get_instance();
    $data=new LZCompressor\LZString();
    return $data::decompressFromBase64($compresdata);
}
function comutf16($uncompreseddata){
    $CI =& get_instance();
    $data=new LZCompressor\LZString();
    return $data::compressToUTF16($uncompreseddata);
}
function decomutf16($compresdata){
    $CI =& get_instance();
    $data=new LZCompressor\LZString();
    return $data::decompressFromUTF16($compresdata);
}
