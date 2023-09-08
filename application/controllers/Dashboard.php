<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
    }

    public function index() {
        $data['user'] = $this->user_model->get_user($_SESSION['id']);
        $this->load->view('dashboard',$data);
    }

    public function add_friend() {
        $loggedInUserId = $_SESSION['id'];
        $friendId = $this->input->post('userId');
        $friendExists = $this->friend_model->check_friend($loggedInUserId, $friendId);

    if (!$friendExists) {
        $data = array(
            'user_id' => $loggedInUserId,
            'friend_id' => $friendId
        );

        $this->friend_model->add_friend($data);
        $response = array('success' => true);
    } else {
        $response = array('success' => false, 'message' => 'Friendship already exists.');
    }
    echo json_encode($response);
}

    public function listFriends() {

    }
}
?>
