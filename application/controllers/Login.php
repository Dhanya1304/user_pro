<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller
{
	public function __construct() 
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('Login_Model');
	}
	public function index()
	{
		$this->load->view('login');
	}
	public function loginuser()
	{ 
			$email = $this->input->post('email');
			$password = $this->input->post('password');
		$user = $this->Login_Model->check_user($email);
		if ($user) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_email'] = $user['email'];
			redirect(site_url('Dashboard/index'));
	}
	else{
		redirect(site_url('Login/index'));
		}
		
		
	}
	public function logout() {
        $this->session->sess_destroy();
        redirect(site_url('web/index'));
    }

}
?>
