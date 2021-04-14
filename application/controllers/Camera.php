<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Camera extends CI_Controller {

        public function index(){
            $this->load->helper('url');
            $this->load->view("camera");
        }

        public function saveImage(){
            /*write your own code to save to your database*/        
            $newname = "some_name.png"; 
            file_put_contents( $newname, file_get_contents('php://input') );
        }
    }
?>