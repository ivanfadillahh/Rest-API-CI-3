<?php

defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
use chriskacerguis\RestServer\RestController;

class Management extends RestController {

    function __construct() 
    {
        parent::__construct();
        $this->load->model('M_management');
    }

    // API Login
    public function login_post(){
        $_POST = $this->security->xss_clean($_POST);

        $config = [
            [
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Email is required!'
                ]
            ],
            [
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password is required!'
                ]
            ]
        ];

        $data = $this->input->get();
        $this->form_validation->set_data($data);
        $this->form_validation->set_rules($config);

        if($this->form_validation->run() == false){
            $this->response([
                'status' => false,
                'message' => $this->form_validation->error_array()
            ], 400);
        }
        else{
            $pwd = md5($_POST['password']);
            $eml = $_POST['email'];

            $res = $this->M_management->grab_user($eml,$pwd);
            if($res['code'] == 1){
                $this->response([
                    'code' => 1,
                    'message' => 'Login success',
                    'data' => $res['data']
                ], 200);
            }
            elseif($res['code'] == -1){
                $this->response([
                    'code' => -1,
                    'message' => 'Fail to generate token user'
                ], 400);
            }
            else{
                $this->response([
                    'code' => 0,
                    'message' => 'User not found'
                ], 404);
            }
        }
    }

    // API Logout
    public function logout_post(){
        $token = $this->input->get_request_header('token');
        $_GET = $this->security->xss_clean($_GET);

        if($_GET['id'] == '' || $_GET['id'] == null){
            $this->response([
                'status' => false,
                'message' => 'Param id cannot be empty!'
            ], 400);
        }
        else{
            $res = $this->M_management->check_user_tk($_GET['id'],$token);
            if($res['code'] == 1){
                $this->response([
                    'code' => 1,
                    'message' => $res['msg']
                ], 200);
            }
            elseif($res['code'] == -1){
                $this->response([
                    'code' => -1,
                    'message' => $res['msg']
                ], 400);
            }   
            else{
                $this->response([
                    'code' => 0,
                    'message' => $res['msg']
                ], 404);
            }
        }
    }
}

/* End of file Management.php */

?>