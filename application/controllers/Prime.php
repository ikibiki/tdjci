<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prime extends CI_Controller
{

    function __construct()
    {

        parent::__construct();
    }

    public function index()
    {
        $this->load->view('welcome_message');
    }


    public function login()
    {

        $this->load->view('login_view');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }


    protected function verifyRecaptcha()
    {
        $this->checkMaintenance();
        if (ENVIRONMENT === 'development') {
            return true;
        }
        if ($this->input->post('g-recaptcha-response')) {
            $secret = 'test';
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
            if (!$this->UserAccess->isAllow($this->session->userdata('user')->ID, array('DEV'))) {
                return false;
            }
        }

        if (ENVIRONMENT === 'development') {
            return false;
        }

        if ($this->AppConfig->isMaintenance()) {
            return true;
        }
        return false;
    }

    protected function checkMaintenance()
    {
        if ($this->isMaintenance()) {
            redirect('/');
            exit;
        }
    }
}
