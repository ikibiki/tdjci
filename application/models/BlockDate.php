<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class BlockDate extends CI_Model
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
        $this->dbi->from('blockdate');
        return $this->dbi->get()->result();
    }

    public function getBlocks($userid)
    {
        $this->dbi->reset_query();
        $this->dbi->from('blockdate');
        $this->dbi->where('user_id', $userid);
        return $this->dbi->get()->result();
    }

    public function getBlockAvailability($date, $time, $userid)
    {
        $this->dbi->reset_query();
        $this->dbi->select('blockdate.id, blockdate.basedate, blockdate.timestart, blockdate.timeend, blockdate.dt_created, blockdate.dt_modified');
        $this->dbi->from('blockdate');
        $this->dbi->join('blockdate_ref', 'blockdate.id=blockdate_ref.user_id');
        $this->dbi->where('blockdate_ref.user_id', $userid);
        $block = $this->dbi->get()->result();
    }

    public function getBlock($id)
    {
        $this->dbi->reset_query();
        $this->dbi->from('blockdate');
        $this->dbi->where('id', $id);
        return $this->dbi->get()->result()[0];
    }

}