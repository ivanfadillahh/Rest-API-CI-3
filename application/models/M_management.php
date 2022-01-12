<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_management extends CI_Model {

    public function grab_user($eml,$pwd){
        $this->db->select('*');
        $this->db->where('email',$eml);
        $this->db->where('password',$pwd);
        $res = $this->db->get('users',1);
        if($res->num_rows() == 1){
            $guser = $res->row_array();
            $tc = hash('sha256',date('His').$guser['email'].date('Y'));
            $token = array(
                'token' => $tc
            );
            $this->db->where('email',$eml);
            $gt = $this->db->update('users', $token);
            if($gt){
                return $c = array(
                    'code' => 1,
                    'data' => $guser
                );    
            }
            else{
                return $c = array(
                    'code' => -1,
                    'msg' => 'Fail to generate token user'
                );
            }
        }
        else{
            return $c = array(
                'code' => 0,
                'data' => ''
            );
        }
    }

    public function check_user_tk($id,$tc){
        $this->db->select('id');
        $this->db->where('id',$id);
        $this->db->where('token',$tc);
        $res = $this->db->get('users',1);
        if($res->num_rows() == 1){
            $guser = $res->row_array();
            $token = array(
                'token' => null
            );

            $this->db->where('id',$id);
            $this->db->where('token',$tc);
            $gt = $this->db->update('users',$token);
            if($gt){
                return $c = array(
                    'code' => 1,
                    'msg' => 'Success logout'
                );
            }
            else{
                return $c = array(
                    'code' => -1,
                    'msg' => 'Error logout'
                );
            }
        }
        else{
            return $c = array(
                'code' => 0,
                'msg' => 'User not found!'
            );
        }
    }
}

/* End of file M_management.php */

?>
