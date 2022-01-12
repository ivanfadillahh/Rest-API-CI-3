<?php

defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");

class Home extends CI_Controller {

    function __construct() 
    {
		parent::__construct();
		$this->load->model('M_management');
        $this->load->model('UserModel');
    }

    public function index()
    {
        $this->load->view('home');
    }

    public function dev(){
        $r_pwd = bin2hex(openssl_random_pseudo_bytes(5));
        $d_pwd = $this->M_management->encrypt_pwd($r_pwd);
        // print_r(json_decode($d_pwd));
        print_r($r_pwd);
    }
}

/* End of file Home.php */

?>