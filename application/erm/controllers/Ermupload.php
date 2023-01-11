<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Ermupload extends CI_Controller
{
    public function upload() {
        if(isset($_FILES['upload']['name'])) {
            $file = $_FILES['upload']['tmp_name'];
            $file_name = $_FILES['upload']['name'];
            $file_name_array = explode(".", $file_name);
            $extension = end($file_name_array);
            $new_image_name = rand() . '.' . $extension;
            $allowed_extension = array("jpg", "jpeg", "png","PNG","JPEG","JPG");
            if(in_array($extension, $allowed_extension)) {
                move_uploaded_file($file, './assets/images/erm_uploads/' . $new_image_name);
                $function_number = $_GET['CKEditorFuncNum'];
                $url = base_url().'./assets/images/erm_uploads/' . $new_image_name;
                $message = '';
                echo"";
            }
        }
    }

    public function browse() {
        
    }
}