<?php
/**
 * Created by PhpStorm.
 * User: 49396
 * Date: 2019/4/23
 * Time: 13:05
 */

class User extends CI_Controller {
    public function __construct() {
        parent::__construct ();
    }
    public function login(){
        $this->load->library('session');
        $email = $this->input->post ( 'email' );
        $password = $this->input->post ( 'password' );
        $this->load->model ( 'UserModel' );
        $result1 = $this->UserModel->getUser($email);
        if($result1){
            //用户名密码正确
            if($password==$result1['password']){
                $this->session->set_userdata('user_id', $result1['user_id']);
                $this->session->set_userdata('user_type', $result1['user_type']);
                $this->session->set_userdata('name', $result1['user_email']);
               if($result1['user_type']==1||$result1['user_type']==2){
                   echo 1;
               }else{
                   //管理者页面
                   echo 777;
               }
                return;
            }else{
                //密码错误；
                echo 2;
                return;
            }
        }
        else{
            echo -1;
            //用户不存在
            return;
        }
    }



    public function testlogin(){
        $email = $this->input->post ( 'user_email' );
        $password = $this->input->post ( 'password' );
        echo 1;
    }

}