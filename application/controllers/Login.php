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
		if (isset($_POST['email']) && isset($_POST['password'])) {
			$data['email']    = $_POST['email'];
			$data['password'] = $_POST['password'];
		}
		$user = $this->Login_Model->check_user($data);
		if($user){
			$_SESSION['id']     = $user['id'];
			$_SESSION['data']   = $user; 
			$this->session->set_flashdata('response',"Loggedin Successfully");
			redirect(site_url('Dashboard/index'));
		}
	else{

		$this->session->set_flashdata('response',"User doesn't exists");
		redirect(site_url('Login/index'));
		}
		
		
}

}
?>
