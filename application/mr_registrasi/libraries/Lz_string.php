<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH.'libraries/src/LZCompressor/LZString.php');

class Lz_string {

   public function __construct()
    {
        $CI =& get_instance();

        // instantiate the class2 and make it available for all of class1 methods
        $string="";
        // $this->Lz_string = new LZString::decompressFromEncodedURIComponent($string);
    }

}