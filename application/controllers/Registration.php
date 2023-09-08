<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Registration extends CI_Controller
{
	public function __construct() 
	{
		parent::__construct();
        session_start();
        $this->load->model('user_model');
        $this->load->helper(array('form', 'url'));
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
            echo  json_encode(array('msg'=>$error,'success'=>false));
            return;
        }

        $result = $this->user_model->save_user($data);
        if($result){
            $res = array(
                'status' => 'success',
                'message' => 'User registered successfully',
                'redirect_url' => base_url()
            );
            $res =  redirect(site_url(), "refresh");
        }else {
            $res = array(
                'status' => 'error',
                'message' => 'User registration failed'
            );
        }
         echo json_encode($res);
    }
    public function edit_profile(){
        $loggedInUserId = $_SESSION['id'];
        $data = $this->user_model->check_user($loggedInUserId);
        $this->load->view('edit_pro',$data);
    }
    public function edit() 
    { 
        $result = array('success' => false, 'messages' => array());
        $data = array(
            'id' => $this->input->post('id'),
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
            echo  json_encode(array('msg'=>$error,'success'=>false));
            return;
        }

        $result = $this->user_model->update_user($data);
        if($result){
            $res = array(
                'status' => 'success',
                'message' => 'User registered successfully',
                'redirect_url' => base_url()
            );
            $res =  redirect(site_url(), "refresh");
        }else {
            $res = array(
                'status' => 'error',
                'message' => 'User registration failed'
            );
        }
         echo json_encode($res);
    }
}
