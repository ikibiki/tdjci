<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Comment extends CI_Model
{
    private $dbi;

    public function __construct()
    {
        parent::__construct();
        $this->dbi = $this->load->database('default', true);
    }

    public function getAll()
    {

        $this->dbi->reset_query();
        $this->dbi->from('comment');
        return $this->dbi->get()->result();
    }

    public function getComments($userid)
    {
        $this->dbi->reset_query();
        $this->dbi->select('comment.id, comment.message, comment.dt_created, comment.dt_modified');
        $this->dbi->from('comment');
        $this->dbi->join('comment_ref', 'comment.id=comment_ref.user_id');
        $this->dbi->where('comment_ref.user_id', $userid);
        $this->dbi->order_by('comment.dt_modified', 'asc');
        return $this->dbi->get()->result();
    }

    public function getComment($id)
    {
        $this->dbi->reset_query();
        $this->dbi->from('comment');
        $this->dbi->where('id', $id);
        return $this->dbi->get()->result()[0];
    }

}