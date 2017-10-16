<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prime extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('UserAccount');
        $this->load->model('BlockDate');

        $this->load->library('table');
    }

    public function index()
    {
        if ($this->checkMaintenance()) {
            echo "Maintenance mode";
        } else {
            if ($this->isSessionActive()) {
                $this->load->view('default_app_view');
            } else {
                $this->setMessage('Warning!', 'Login to continue', 'warning');
                redirect('login');
            }
        }
    }

    public function test()
    {
        var_dump(password_hash("@dm1N", PASSWORD_BCRYPT));
    }

    public function users()
    {
        if ($this->checkMaintenance()) {
            echo "Maintenance mode";
        } else {
            if ($this->isSessionActive()) {

                $users = $this->UserAccount->getUsers();

                $template = array(
                    'table_open' => '<table class="table table-hover">',
                );

                $this->table->set_template($template);

                $this->table->set_heading(array(
                    'Options',
                    'ID',
                    'First name',
                    'Last name',
                    'Email',
                    'Mobile phone',
                    'User name',
                    'Role',
                ));

                foreach ($users as &$item) {
                    $this->table->add_row(array(
                        '<a class="btn btn-small btn-warning" href="' . site_url('users') . '?edit=' . $item->id . '"><span class="fa fa-pencil"></span></a>'
                        . form_open('process/deleteuser') .
                        form_hidden(array('redir' => 'users', 'id' => $item->id)) .
                        '<button class="btn btn-small btn-danger" type="submit"><span class="fa fa-trash"></span></button>',
                        $item->id,
                        $item->firstname,
                        $item->lastname,
                        $item->email,
                        $item->mobilephone,
                        $item->username,
                        ROLE[$item->role],
                    ));
                }

                $userstable = $this->table->generate();

                $data['userstable'] = $userstable;

                $editid = $this->input->get('edit');

                if (!empty($editid)) {
                    $edit = $this->UserAccount->getUserAccount($editid);
                    if (!empty($edit)) {
                        $data['edit'] = $edit;
                    }
                }

                $this->load->view('users_app_view', $data);
            } else {
                $this->setMessage('Warning!', 'Login to continue', 'warning');
                redirect('login');
            }
        }
    }

    public function block()
    {
        if ($this->checkMaintenance()) {
            echo "Maintenance mode";
        } else {
            if ($this->isSessionActive()) {
                $user = $this->isSessionActive();
                $blocks = $this->BlockDate->getBlocks($user->id);

                $template = array(
                    'table_open' => '<table class="table table-hover">',
                );

                $this->table->set_template($template);

                $this->table->set_heading(array(
                    'Options',
                    'Block date',
                    'Start time',
                    'End time',
                ));

                foreach ($blocks as &$item) {
                    $this->table->add_row(array(
                        '<a class="btn btn-small btn-warning" href="' . site_url('block') . '?edit=' . $item->id . '"><span class="fa fa-pencil"></span></a>'
                        . form_open('process/deleteblock') .
                        form_hidden(array('redir' => 'block', 'id' => $item->id)) .
                        '<button class="btn btn-small btn-danger" type="submit"><span class="fa fa-trash"></span></button>',
                        $item->basedate,
                        $item->timestart,
                        $item->timeend,
                    ));
                }

                $blockstable = $this->table->generate();

                $data['blockstable'] = $blockstable;

                $editid = $this->input->get('edit');

                if (!empty($editid)) {
                    $edit = $this->BlockDate->getBlock($editid);
                    if (!empty($edit)) {
                        $data['edit'] = $edit;
                    }
                }

                $this->load->view('block_app_view', $data);
            } else {
                $this->setMessage('Warning!', 'Login to continue', 'warning');
                redirect('login');
            }
        }
    }

    public function photopack()
    {
        if ($this->checkMaintenance()) {
            echo "Maintenance mode";
        } else {
            if ($this->isSessionActive()) {
                $user = $this->isSessionActive();
                $blocks = $this->BlockDate->getBlocks($user->id);

                $template = array(
                    'table_open' => '<table class="table table-hover">',
                );

                $this->table->set_template($template);

                $this->table->set_heading(array(
                    'Options',
                    'Block date',
                    'Start time',
                    'End time',
                ));

                foreach ($blocks as &$item) {
                    $this->table->add_row(array(
                        '<a class="btn btn-small btn-warning" href="' . site_url('block') . '?edit=' . $item->id . '"><span class="fa fa-pencil"></span></a>'
                        . form_open('process/deleteblock') .
                        form_hidden(array('redir' => 'block', 'id' => $item->id)) .
                        '<button class="btn btn-small btn-danger" type="submit"><span class="fa fa-trash"></span></button>',
                        $item->basedate,
                        $item->timestart,
                        $item->timeend,
                    ));
                }

                $blockstable = $this->table->generate();

                $data['photopackstable'] = $blockstable;

                $editid = $this->input->get('edit');

                if (!empty($editid)) {
                    $edit = $this->BlockDate->getBlock($editid);
                    if (!empty($edit)) {
                        $data['edit'] = $edit;
                    }
                }

                $this->load->view('block_app_view', $data);
            } else {
                $this->setMessage('Warning!', 'Login to continue', 'warning');
                redirect('login');
            }
        }
    }

    public function process($mode)
    {
        if ($this->isSessionActive()) {
            $redir = $this->input->post('redir');
            switch ($mode) {
                case 'updateuser': {
                    $id = $this->input->post('id');

                    if ($id == null) {
                        $id = -1;
                    }

                    $data = array(
                        'firstname' => $this->input->post('firstname'),
                        'lastname' => $this->input->post('lastname'),
                        'email' => $this->input->post('email'),
                        'mobilephone' => $this->input->post('mobilephone'),
                        'username' => $this->input->post('firstname'),
                        'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                        'status' => 1,
                        'role' => $this->input->post('role'),
                    );
                    $this->UserAccount->updateUserInfo($id, $data);
                    if ($id < 0) {
                        $this->setMessage('Create user', 'User created!', 'info');
                    } else {
                        $this->setMessage('Update user', 'User updated!', 'info');
                    }
                }
                    break;
                case 'deleteuser': {
                    {
                        $id = $this->input->post('id');
                        $data = array(
                            'status' => 0,
                        );
                        $this->UserAccount->updateUserInfo($id, $data);
                        $this->setMessage('Delete user', 'User deleted!', 'info');
                    }
                    break;
                }
                default:
                    break;
            }
        } else {
            $this->setMessage('Warning!', 'Login to continue', 'warning');
            $redir = 'login';
        }
        redirect($redir);
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(site_url('login'));
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
