<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class UserAccount extends CI_Model {

    private $dbi;

    public function __construct() {
        parent::__construct();
        $this->dbi = $this->load->database('default', true);
    }

    public function verifyPassword($combination, $username) {
        $this->dbi->reset_query();
        $this->dbi->from('user');
        $this->dbi->where('username', $username);
        $res = $this->dbi->get()->result();

        return empty($res)?false: password_verify($combination, $res[0]->password);
    }

    public function getUsers() {
            $this->dbi->reset_query();
            $this->dbi->from('user');
            $this->dbi->where('status', 1);
            return $this->dbi->get()->result();
    }


    public function getUserAccount($id) {
        $this->dbi->reset_query();
        $this->dbi->from('user');
        $this->dbi->where('id', $id);
        $this->dbi->where('status', 1);
        return $this->dbi->get()->result()[0];
    }

    public function getUserInfo($username) {
        $this->dbi->reset_query();
        $this->dbi->from('user');
        $this->dbi->where('username', $username);
        $this->dbi->where('status', 1);
        return $this->dbi->get()->result()[0];
    }

    public function updateUserInfo($id, $data) {
        $this->dbi->reset_query();
        $this->dbi->where('id', $id);
        $exist = $this->dbi->get("user")->result();

        if ($exist) {
            $this->dbi->where('id', $id);
            $this->dbi->update('user', $data);
            return $this->id;
        } else {
            $this->dbi->reset_query();
            $this->dbi->insert('user', $data);
            return $this->dbi->insert_id();
        }
    }

    public function changePassword($id, $pwd) {
        $this->dbi->reset_query();
        $this->dbi->where('id', $id);
        $exist = $this->dbi->get("user")->result();

        if ($exist) {
            $this->dbi->where('id', $id);
            $this->dbi->update('user', array(
                'Content' => password_hash($pwd, PASSWORD_BCRYPT)
            ));
            return $this->id;
        } else {
            $this->dbi->reset_query();
            $this->dbi->insert('user', array(
                'id' => $id,
                'password' => password_hash($pwd, PASSWORD_BCRYPT),
            ));
            return $this->dbi->insert_id();
        }
    }

}
