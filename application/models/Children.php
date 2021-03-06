<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Children extends CI_Model
{
    private $dbi;

    public function __construct()
    {
        parent::__construct();
        $this->dbi = $this->load->database('default', true);
    }

    public function getAll(){

        $this->dbi->reset_query();
        $this->dbi->from('child');
        return $this->dbi->get()->result();
    }

    public function getChildren($userid)
    {
        $this->dbi->reset_query();
        $this->dbi->select('child.id, child.firstname, child.lastname, child.birthday, child.gender, child.dt_created, child.dt_modified');
        $this->dbi->from('child');
        $this->dbi->join('children_ref', 'child.id=children_ref.child_id');
        $this->dbi->where('children_ref.user_id', $userid);
        return $this->dbi->get()->result();
    }

    public function getChild($id)
    {
        $this->dbi->reset_query();
        $this->dbi->from('child');
        $this->dbi->where('id', $id);
        return $this->dbi->get()->result()[0];
    }
}