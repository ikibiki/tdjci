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

        if ($this->checkMaintenance()) {
            echo "Maintenance mode";
        } else {
            if ($this->isSessionActive()) {
                var_dump($this->session);
                $this->load->view('welcome_message');
            }
            else{
                $this->setMessage('Warning!', 'Login to continue', 'warning');
                redirect('login');
            }
        }
    }

    public function test(){
        var_dump(password_hash("@dm1N", PASSWORD_BCRYPT));
    }


    public function login()
    {
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url());
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
