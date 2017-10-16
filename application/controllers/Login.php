<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('UserAccount');
    }


    public function index()
    {
        $this->load->view('login_view');
    }

    public function process()
    {
        $this->checkMaintenance();
        if (!$this->verifyRecaptcha()) {
            $this->setMessage('Warning!', 'Invalid reCAPTCHA. Please try again.', 'danger');
        } else {
            $redir = $this->input->get_post('redir');

            $userdata = '';
            if ($this->UserAccount->verifyPassword($this->input->post('password'), $this->input->post('username'))) {
                $userdata = $this->UserAccount->getUserInfo($this->input->post('username'));
            }

            if ($userdata) {
                $this->setMessage('Verified', 'Welcome back!', 'info');
                $this->session->set_userdata('user', $userdata);

            } else {
                $this->setMessage('Warning!', 'Wrong credentials.', 'warning');
                $redir = 'login';
            }
        }
        if (empty($redir)) {
            $redir = '/';
        }

        redirect($redir);
    }

    protected function verifyRecaptcha()
    {
        $this->checkMaintenance();
        if (ENVIRONMENT === 'development') {
            return true;
        }
        if ($this->input->post('g-recaptcha-response')) {
            $secret = '6LfO6CgUAAAAAJPTZ0Ch5zErPChV6P8jrD3q3D-6';
            $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $this->input->post('g-recaptcha-response'));
            $responseData = json_decode($verifyResponse);
            if ($responseData->success) {
                return true;
            }
        }
        return false;
    }

    protected function setMessage($title, $text, $type)
    {
        $this->session->set_flashdata('msg', array('title' => $title, 'text' => $text, 'type' => $type));
    }

    protected function isSessionActive()
    {
        return $this->session->user;
    }

    protected function isMaintenance()
    {
        if (is_cli()) {
            echo "CLI access disabled for this control.";
            exit;
        }
        if ($this->isSessionActive()) {
            return false;
        }

        if (ENVIRONMENT === 'development') {
            return false;
        }

        return false;
    }

    protected function checkMaintenance()
    {
        if ($this->isMaintenance()) {
            redirect(base_url());
            exit;
        }
    }
}
