<?php
/**
 * Created by PhpStorm.
 * User: 49396
 * Date: 2019/4/22
 * Time: 21:44
 */

class Home extends CI_Controller
{
    public function __construct() {
        parent::__construct ();
    }
    public function index() {
        //$this->load->view ( "register" );\
        $this->load->view('head');
        $this->load->view('Home');
        $this->load->view('mailbox');
        $this->load->view('foot');
    }
    public function aboutus(){
        $this->load->view('head');
        $this->load->view('AboutusPage');
        $this->load->view('mailbox');
        $this->load->view('foot');
    }
    public function contactus(){
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
//(^[\\w.\\-]+@(?:[a-z0-9]+(?:-[a-z0-9]+)*\\.)+[a-z]{2,3}$)
        $this->form_validation->set_rules('firstname', 'Password', 'required');
        $this->form_validation->set_rules('lastname', 'phone', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|regex_match[/(^[\\w.\\-]+@(?:[a-z0-9]+(?:-[a-z0-9]+)*\\.)+[a-z]{2,3}$)/]');
        $this->form_validation->set_rules('subject', 'Subject', 'required');
        $this->form_validation->set_rules('content', 'Contect', 'required');
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('head');
            $this->load->view('contactus');
            $this->load->view('foot');
        }
        else
        {
            $firstname = $this->input->post ( 'firstname' );
            $lastname = $this->input->post ( 'lastname' );
            $subject=$this->input->post('subject');
            $email =$this->input->post('email');
            $content=$this->input->post('content');
            $this->load->model ( 'ContactusModel' );
            $result = $this->ContactusModel->sendtohost( $firstname, $lastname,$subject,$email,$content );
            if (gettype ( $result ) == "boolean" && ! $result) {
                $this->load->view ( 'errors/cli/error_404.php' );
            } else {
                $this->load->view('head');
                $this->load->view('ContactusSuccess');
                $this->load->view('foot');
            }

        }
    }
    public function buyfromus(){
        $this->load->view('head');
        $this->load->view('goodspage');
        $this->load->view('foot');
    }
    public function goods(){
        $good_id= $this->input->get('good_id');
        $this->load->view('head');
        $this->load->view('goods_detail',$good_id);
        $this->load->view('foot');
    }
    public function Login(){

        $this->load->view('head');
        $this->load->view('login');
        $this->load->view('foot');
    }
    public function signup(){
        /*$email,$password,$firstname, $lastname, $address,$country,$county,$zipcode,$type*/
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('firstname', 'firstname', 'required');
        $this->form_validation->set_rules('lastname', 'lastname', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|regex_match[/(^[\\w.\\-]+@(?:[a-z0-9]+(?:-[a-z0-9]+)*\\.)+[a-z]{2,3}$)/]');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[16]');
        $this->form_validation->set_rules('country', 'Country', 'required');
        $this->form_validation->set_rules('county', 'County', 'required');
        $this->form_validation->set_rules('zipcode', 'Zipcode', 'required');
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('head');
            $this->load->view('signup');
            $this->load->view('foot');
        }else{
            $firstname = $this->input->post ( 'firstname' );
            $lastname = $this->input->post ( 'lastname' );
            $country=$this->input->post('country');
            $county=$this->input->post('county');
            $address=$this->input->post('address');
            $email =$this->input->post('email');
            $password=$this->input->post('password');
            $zipcode=$this->input->post('zipcode');
            $type= $this->input->post('type');
            $this->load->model ( 'UserModel' );
            $result1 = $this->UserModel->getUser($email);
            if($result1){
              //如果用户存在， 返回错误码-1
                echo -1;
                return;
            }
            else{
                //如果用户不存在 ，开始注册， 成功码1；
                $result = $this->UserModel->register( $email,$password,$firstname, $lastname, $address,$country,$county,$zipcode,$type );
                if ($result==1) {
                    echo 1;
                    return;
                }else {
                    $this->load->view('head');
                    $data['err1'] =$result;
                    $this->load->view('signup',$data);
                    $this->load->view('foot');
                    return;
                    /*else if($result ==-1){
                    $this->load->view('head');
                    $data['err1'] = "Email has exsit!";
                    $this->load->view('signup',$data);
                    $this->load->view('foot');
                    return;
                    //echo "cunzai!";
                }*/
                }

                //用户不存在
                return;
            }


        }
    }
}