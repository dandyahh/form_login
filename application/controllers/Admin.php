<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('session');
        $this->load->helper(['url', 'form']);

        // Cek session kecuali method login & logout
        $current_method = $this->router->fetch_method();
        if (!in_array($current_method, ['login', 'logout'])) {
            if (!$this->session->userdata('logged_in') || $this->session->userdata('role') != 'admin') {
                redirect('admin/login');
            }
        }
    }

    public function login() {
        if ($this->session->userdata('logged_in') && $this->session->userdata('role') == 'admin') {
            redirect('admin/dashboard');
        }

        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/login');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            // LOGIN ADMIN MENGGUNAKAN TABEL admin
            $user = $this->User_model->login_admin($username, $password);

            if ($user) {
                $this->session->set_userdata([
                    'logged_in' => TRUE,
                    'user_id'   => $user->id,
                    'username'  => $user->username,
                    'role'      => 'admin' // role diset langsung
                ]);
                redirect('admin/dashboard');
            } else {
                $this->session->set_flashdata('error', 'Username atau password salah.');
                redirect('admin/login');
            }
        }
    }

    public function dashboard() {
        $data['pending_users'] = $this->User_model->get_pending_users();
        $this->load->view('admin/dashboard', $data);
    }

    public function approve_user($user_id) {
        if ($this->User_model->update_user_status($user_id, 'approved')) {
            $this->session->set_flashdata('success', 'User berhasil disetujui');
        } else {
            $this->session->set_flashdata('error', 'Gagal menyetujui user');
        }
        redirect('admin/dashboard');
    }

    public function reject_user($user_id) {
        if ($this->User_model->update_user_status($user_id, 'rejected')) {
            $this->session->set_flashdata('success', 'User berhasil ditolak');
        } else {
            $this->session->set_flashdata('error', 'Gagal menolak user');
        }
        redirect('admin/dashboard');
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('admin/login');
    }
}
