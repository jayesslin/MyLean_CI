<?php
/**
 * Created by PhpStorm.
 * User: 49396
 * Date: 2019/2/8
 * Time: 17:33
 */

class user
{
    public $user_email;
    private $password;
    public $last_name;
    public $first_name;
    public $user_address;
    public $user_state;
    public $user_county;
    public $user_zipcode;
    public $user_type;

    //construct
    function __construct($user_email,$password,$last_name,$first_name,$user_address,$user_state,$user_county,$user_zipcode,$user_type){
        $this->user_email = $user_email;
        $this->password= $password;
        $this->last_name=$last_name;
        $this->first_name=$first_name;
        $this ->user_address=$user_address;
        $this->user_state=$user_state;
        $this->user_county=$user_county;
        $this->user_zipcode=$user_zipcode;
        $this->user_type=$user_type;
    }
}
