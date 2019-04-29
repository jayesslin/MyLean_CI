<?php
/**
 * Created by PhpStorm.
 * User: 49396
 * Date: 2019/4/24
 * Time: 16:51
 */

class Eventcontroller extends CI_Controller {
    public function __construct() {
        parent::__construct ();
    }
    public function index(){

        $this->load->view('login_home');
        $this->load->view('foot');
    }
    public function agent(){
        $this->load->view('eventpage/Agent_home');
        $this->load->view('foot');
    }
    public function indi_list(){
        $this->load->view('eventpage/Agent_Individual_list');
        $this->load->view('foot');
    }
    public function busi_list(){
        $this->load->view('eventpage/Agent_business_list');
        $this->load->view('foot');
    }
    public function event_list(){
        $this->load->view('eventpage/Agent_event_list');
        $this->load->view('foot');
    }
    public function add_e(){
        $this->load->view('eventpage/Agent_event_edit');
        $this->load->view('foot');
    }
    public function edit_e(){
        $this->load->view('eventpage/Agent_event_append');
        $this->load->view('foot');
    }
    public function profile(){
        $this->load->view('eventpage/Profilepage');
        $this->load->view('foot');
    }
    public function profileController(){

    }
}