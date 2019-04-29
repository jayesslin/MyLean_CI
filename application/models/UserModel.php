<?php
class UserModel extends CI_Model
{
    public $table_name = 'user';

    public function __construct()
    {
        parent::__construct();
    }

    public function setTableName($table_name)
    {
        $this->table_name = $table_name;
    }

    public function register($email, $password, $firstname, $lastname, $address, $country, $county, $zipcode, $type)
    {
        $this->db->where(array(
            'user_email' => $email,
        ));
        //查询有没有这个
        $query = $this->db->get($this->table_name);
        if (!$query->row_array()) {
            //如果查不到这个用户名，说明可以注册
            $this->db->insert($this->table_name, array(
                'user_email' => $email,
                'password' => $password,
                'first_name' => $firstname,
                'last_name' => $lastname,
                'user_address' => $address,
                'user_state' => $country,
                'user_county' => $county,
                'user_code' => $zipcode,
                'user_type' => $type
            ));

            // return $this->db->insert_id();
            //注册成功返回1
            return 1;

        } else {
            //查到有人注册， 返回-1
            return -1;
        }
    }

    public function login($name, $password)
    {
        $this->db->where(array(
            'user_email' => $name,
            'password' => $password
        ));
        $query = $this->db->get($this->table_name);
        return $query->row_array();
    }
    /*验证邮箱是否存在*/
    public function getUser($email)
    {

        $query = $this->db->query("select * from user where user_email = '$email'");
        $row = $query->row_array();
        return $row;

    }
}
?>