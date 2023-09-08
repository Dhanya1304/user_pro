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
        $userId = $this->input->post('userId'); 
        
        $response = array('success' => true);
        echo json_encode($response);
    }

    public function listFriends() {

    }
}
?>
