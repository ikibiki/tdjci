<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class BlockDate extends CI_Model {

    private $dbi;

    public function __construct() {
        parent::__construct();
        $this->dbi = $this->load->database('default', true);
    }
}