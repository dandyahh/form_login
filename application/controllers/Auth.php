<?php
class Auth extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('form_validation');
    }

    public function index() {
        if ($this->session->userdata('logged_in')) {
            redirect($this->session->userdata('role') == 'admin' ? 'admin/dashboard' : 'user/dashboard');
        }
        $this->load->view('auth/login');
    }

    public function login() {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/login');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $user = $this->User_model->login($username, $password);

            if ($user) {
                if ($user->role == 'admin') {
                    $this->session->set_userdata([
                        'logged_in' => TRUE,
                        'user_id' => $user->id,
                        'username' => $user->username,
                        'role' => $user->role
                    ]);
                    redirect('admin/dashboard');
                } else {
                    switch ($user->status) {
                        case 'approved':
                            $this->session->set_userdata([
                                'logged_in' => TRUE,
                                'user_id' => $user->id,
                                'username' => $user->username,
                                'role' => $user->role
                            ]);
                            redirect('user/dashboard');
                            break;
                        case 'pending':
                        $this->session->set_flashdata('error', 'Menunggu persetujuan admin');
                        redirect('auth');
                        break;

                                            case 'rejected':
                        $this->session->set_flashdata('error', 'Login Anda ditolak oleh admin');
                        redirect('auth/login');
                        break;

                    }
                }
            } else {
                $this->session->set_flashdata('error', 'Username atau password salah');
                redirect('auth');
            }
        }
    }

    public function register() {
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('password_confirmation', 'Password Confirmation', 'required|matches[password]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/register');
        } else {
            $data = [
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password')
            ];

            if ($this->User_model->register($data)) {
                $this->session->set_flashdata('success', 'Registrasi berhasil. Tunggu persetujuan admin.');
                redirect('auth/login');
            } else {
                $this->session->set_flashdata('error', 'Registrasi gagal');
                redirect('auth/register');
            }
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('auth');
    }
}