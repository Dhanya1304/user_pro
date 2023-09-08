<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function check_user($data) {
        $this->db->select('id,name,email,password');
        $this->db->from('users');
        $this->db->where('email',$data['email']);
        $result = $this->db->get();
        return $result->row();
    }
}
?>
