<?php
class User_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }

    // Login User (tabel users)
    public function login($username, $password) {
        $this->db->where('username', $username);
        $user = $this->db->get('users')->row();

        if ($user && password_verify($password, $user->password)) {
            return $user;
        }
        return false;
    }

    // Login Admin (tabel admin)
    public function login_admin($username, $password) {
        $this->db->where('username', $username);
        $user = $this->db->get('admin')->row();

        if ($user && password_verify($password, $user->password)) {
            return $user;
        }
        return false;
    }

    // Registrasi User Baru
    public function register($data) {
        $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
        $data['role'] = 'user';
        $data['status'] = 'pending';
        return $this->db->insert('users', $data);
    }

    // Mendapatkan user dengan status 'pending' untuk persetujuan
    public function get_pending_users() {
        $this->db->where('status', 'pending');
        $this->db->where('role', 'user');
        return $this->db->get('users')->result();
    }

    // Mendapatkan semua user (termasuk approved & rejected)
    public function get_all_users() {
        $this->db->where('role', 'user');
        $this->db->order_by('created_at', 'DESC');
        return $this->db->get('users')->result();
    }

    // Memperbarui status user (pending, approved, rejected)
    public function update_user_status($user_id, $status) {
        $this->db->where('id', $user_id);
        $this->db->update('users', ['status' => $status]);
        return $this->db->affected_rows() > 0;
    }

    // Mendapatkan status login terakhir dari tabel login_attempts
    public function get_user_login_status($user_id) {
        $this->db->where('user_id', $user_id);
        $this->db->order_by('created_at', 'DESC');
        $this->db->limit(1);
        return $this->db->get('login_attempts')->row();
    }
}
