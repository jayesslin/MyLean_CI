<?php
/*
 ╭━━━━┳━━━┳━━━┳━━━╮
╰╯┃┃╰┫╰━╯┃┃╱┃┃╰━╯┃
╱╱┃┃╱┃╭╮╭┫╰━╯┃╭━━╯
╱╱┃┃╱┃┃┃╰┫╭━╮┃┃
╱╱╰╯╱╰╯╰━┻╯╱╰┻╯
╭━━┳━━━╮
╰┫┣┫╭━╮┃
╱┃┃┃╰━━╮
╱┃┃╰━━╮┃
╭┫┣┫╰━╯┃
╰━━┻━━━╯
╭━━━━┳╮╱╭┳━━━╮
┃╭╮╭╮┃┃╱┃┃╭━━╯
╰╯┃┃╰┫╰━╯┃╰━━╮
╱╱┃┃╱┃╭━╮┃╭━━╯
╱╱┃┃╱┃┃╱┃┃╰━━╮
╱╱╰╯╱╰╯╱╰┻━━━╯
╭━━╮╭━━━┳━━━┳━━━━┳╮
┃╭╮┃┃╭━━┫╭━╮┃╭╮╭╮┃┃
┃╰╯╰┫╰━━┫╰━━╋╯┃┃╰┫┃
┃╭━╮┃╭━━┻━━╮┃╱┃┃╱╰╯
┃╰━╯┃╰━━┫╰━╯┃╱┃┃╱╭╮
╰━━━┻━━━┻━━━╯╱╰╯╱╰╯
*/
class UserController extends CI_Controller {
    public function __construct() {
        parent::__construct ();
    }
    public function index() {
        //$this->load->view ( "register" );\
        $this->load->view('head');
        $this->load->view('Home');
        $this->load->view('foot');
    }
    public function aboutus(){
        $this->load->view('head');
        $this->load->view('AboutusPage');
        $this->load->view('foot');
    }


    public function register() {
        echo "aaaaa!!";
        $name = $this->input->post ( 'name' );
        $password = $this->input->post ( 'password' );
        $this->load->model ( 'UserModel' );
        $result = $this->UserModel->register ( $name, $password );
        if (gettype ( $result ) == "boolean" && ! $result) {
            $this->load->view ( 'errors/cli/error_404.php' );
        } else {
            $this->load->view ( 'login',$result );
        }
    }
    public function showLogin() {
        $this->load->view ( "login_test.php" );
    }
    public function form(){
        $this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');
//(^[\\w.\\-]+@(?:[a-z0-9]+(?:-[a-z0-9]+)*\\.)+[a-z]{2,3}$)

        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[16]');
        $this->form_validation->set_rules('phone', 'phone', 'required|regex_match[/^\(?(?:\d{3})\)?[.-]?\d{3}[.-]?(?:\d{4})$/]');
        $this->form_validation->set_rules('email', 'Email', 'required|regex_match[/(^[\\w.\\-]+@(?:[a-z0-9]+(?:-[a-z0-9]+)*\\.)+[a-z]{2,3}$)/]');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('myform');
        }
        else
        {
            $this->load->view('myform_s');
        }
    }
    public function checkForm(){

    }
    public function login() {
        $name = $this->input->post ( 'name' );
        $password = $this->input->post ( 'password' );
        $this->load->model ( 'UserModel' );

        $result = $this->UserModel->login ( $name, $password );

        if (! $result) {
           echo 1;
            // $this->load->view ( 'fail' );
        } else {
            echo 2;
            /*$this->load->view ( 'welcome',$result );*/
        }
    }
    /*
     * LEAN web site  Entry!
     * */


    public function Lean_Home(){
        $this->load->view('head');
        $this->load->view('public/Home');
    }
    public function test_para(){
        $this->load->view('test_para');
        // $this->load->view('js/jquery-3.3.1.min.js');
    }
    public function test_para1(){
        $shuai = $this->input->post ( 'shuai' );
        $cool = $this->input->post ( 'cool' );
        $data['shuai']= $shuai;
        $data['cool']= $cool;
        $this->load->view('test_para1',$data);
    }
    public function test_ajax(){

        $c1 = $this->input->post ( 'cool1' );
        $c2 = $this->input->post ( 'cool2' );
        if($c1==$c2){
            echo 1;
        }
        else{
            echo 2;
        }


  /*      $output = "ddd";
        $this->output->append_output($output);*/
    }
}