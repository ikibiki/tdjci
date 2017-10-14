<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PhotoPack extends CI_Model
{
    private $dbi;

    public function __construct()
    {
        parent::__construct();
        $this->dbi = $this->load->database('default', true);
    }

    public function getAll(){

        $this->dbi->reset_query();
        $this->dbi->from('package');
        return $this->dbi->get()->result();
    }

    public function getPhotoPacks($userid)
    {
        $this->dbi->reset_query();
        $this->dbi->select('package.id, package.imagefilename, package.caption, package.cost, package.currency, package.dt_created, package.dt_modified');
        $this->dbi->from('package');
        $this->dbi->join('package_ref', 'package.id=package_ref.user_id');
        $this->dbi->where('package_ref.user_id', $userid);
        return $this->dbi->get()->result();
    }

    public function getPhotoPack($id)
    {
        $this->dbi->reset_query();
        $this->dbi->from('package');
        $this->dbi->where('id', $id);
        return $this->dbi->get()->result()[0];
    }

}