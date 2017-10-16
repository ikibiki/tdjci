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
        $this->dbi->from('pet');
        return $this->dbi->get()->result();
    }

    public function getPets($userid)
    {
        $this->dbi->reset_query();
        $this->dbi->select('pet.id, pet.name, pet.birthday, pet.dt_created, pet.dt_modified');
        $this->dbi->from('pet');
        $this->dbi->join('pet_ref', 'pet.id=pet_ref.user_id');
        $this->dbi->where('pet_ref.user_id', $userid);
        return $this->dbi->get()->result();
    }

    public function getPet($id)
    {
        $this->dbi->reset_query();
        $this->dbi->from('pet');
        $this->dbi->where('id', $id);
        return $this->dbi->get()->result()[0];
    }
}