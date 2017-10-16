<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Photos extends CI_Model
{
    private $dbi;

    public function __construct()
    {
        parent::__construct();
        $this->dbi = $this->load->database('default', true);
    }

    public function getAll(){

        $this->dbi->reset_query();
        $this->dbi->from('photos');
        return $this->dbi->get()->result();
    }

    public function getPhotogPhotos($userid)
    {
        $this->dbi->reset_query();
        $this->dbi->select('photos.id, photos.filename, photos.caption, photos.status, photos.dt_created, photos.dt_modified');
        $this->dbi->from('photos');
        $this->dbi->join('album', 'photos.id=album.user_id_source');
        $this->dbi->where('album.user_id_source', $userid);
        return $this->dbi->get()->result();
    }

    public function getCustomerPhotos($userid)
    {
        $this->dbi->reset_query();
        $this->dbi->select('photos.id, photos.filename, photos.caption, photos.status, photos.dt_created, photos.dt_modified');
        $this->dbi->from('photos');
        $this->dbi->join('album', 'photos.id=album.user_id_target');
        $this->dbi->where('album.user_id_target', $userid);
        return $this->dbi->get()->result();
    }

    public function getPhoto($id)
    {
        $this->dbi->reset_query();
        $this->dbi->from('photos');
        $this->dbi->where('id', $id);
        return $this->dbi->get()->result()[0];
    }

}