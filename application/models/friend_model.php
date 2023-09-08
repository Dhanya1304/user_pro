<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }

public function check_friend($userId, $friendId) {
    $this->db->where('user_id', $userId);
    $this->db->where('friend_id', $friendId);
    $query = $this->db->get('friends');

    return ($query->num_rows() > 0);
}

public function add_friend($data) {
    $this->db->insert('friends', $data);
}
?>