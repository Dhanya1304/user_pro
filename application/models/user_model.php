<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }

    public function save_user($data) {
        return $this->db->insert('users', $data);
    }
    public function get_user($data) {
        $this->db->where('id !=', $data);
        $query = $this->db->get('users');
        return $query->result_array();
    }
    public function check_user($data) {
        $this->db->where('id', $data);
        $query = $this->db->get('users');
        return $query->result_array();
    }
    public function update_user($data) {
        if(!empty($data['id'])){
            $this->db->where("id", $data['id']);
            $this->db->where("email", $data['email']);
            $this->db->update("users", $data);
            return $data['id'];
    }
}
?>
