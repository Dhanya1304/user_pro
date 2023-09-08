<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Registration extends CI_Controller
{
	public function __construct() 
	{
		parent::__construct();
        $this->load->model('user_model');
	}
	public function register()
	{
		$this->load->view('register');
	}
    public function save() 
    { 
        $result = array('success' => false, 'messages' => array());
        $data = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'gender' => $this->input->post('gender'),
        );
        $config['upload_path'] = './uploads/'; 
        $config['allowed_types'] = 'gif|jpg|png|jpeg'; 
        $config['max_size'] = 2048;
        $config['file_name'] = 'profile_pic_' . uniqid();
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('profile_pic')) {
            $data['profile_pic'] = $this->upload->data('file_name');
        } else {
            $error = $this->upload->display_errors();
            echo $error;
            return;
        }

        $result = $this->user_model->save_user($data);

        if ($result) {
            $result['success'] = true;
			$result['messages'] = 'Successfully Registered';
        } else {
            $result['success'] = false;
			foreach ($_POST as $key => $value) {
				$result['messages'][$key] = form_error($key);
			}
         }
         echo json_encode($result);
    }
}
