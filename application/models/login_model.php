<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }

    public function check_user($data) {
        $this->db->select('id,name,email,password');
        $this->db->from('users');
        $this->db->where('email',$data['email']);
        $this->db->where('password',$data['password']);
        $result = $this->db->get();
        return $result->row_array();
    }
}
?>
