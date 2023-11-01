<?php
class Login extends CI_Controller {
    public function index() {
        // Validasi form
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == TRUE) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            // Selanjutnya, lakukan pengolahan login seperti yang Anda butuhkan
            $login_result = $this->user_login->login($username, $password);

            if ($login_result) {
                // Jika login berhasil, lakukan redirect atau tindakan lain yang sesuai
                redirect('dashboard'); // Ganti 'dashboard' dengan halaman tujuan setelah login
            } else {
                // Jika login gagal, atur pesan kesalahan atau tindakan lain yang sesuai
                $this->session->set_flashdata('pesan', 'Username atau password salah.');
            }
        }

        $data = array('title' => 'Login');
        $this->load->view('v_login', $data, FALSE);
    }

    public function logout() {
        $this->user_login->logout();
        redirect('login'); // Ganti 'login' dengan halaman login atau halaman lain yang sesuai
    }
}