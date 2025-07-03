<?php
class User extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') != 'user') {
            redirect('auth');
        }
    }

    public function dashboard() {
        $user_id = $this->session->userdata('user_id');
        $data['login_status'] = $this->User_model->get_user_login_status($user_id);
        $this->load->view('user/dashboard', $data);
    }
}