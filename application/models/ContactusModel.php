<?php
/**
 * Created by PhpStorm.
 * User: 49396
 * Date: 2019/4/22
 * Time: 22:27
 */

class ContactusModel extends CI_Model
{

    public $table_name = 'contactus';
    public function __construct() {
        parent::__construct ();
    }

    public function setTableName($table_name){
        $this->table_name = $table_name;
    }

    public function sendtohost($firstname, $lastname,$subject,$email,$content) {
        if ($this->db->insert ( $this->table_name, array (
            'firstname' => $firstname,
            'lastname' => $lastname,
            'subject'=> $subject,
            'email'=>$email,
            'content'=>$content
        ) )) {

            return $this->db->insert_id();
        } else {
            log_message ( 'error', 'register error-->' . $this->db->last_query () );
            return false;
        }
    }
    public function login($name, $password) {
        $this->db->where ( array (
            '_name' => $name,
            '_password' => $password
        ) );
        $query = $this->db->get ( $this->table_name );
        return $query->row_array ();
    }
}
?>