<?php defined('BASEPATH') OR exit('No direct script access allowed');

class City_model extends CI_Model
{
    private $_table = "cities";

    public $id;
    public $name;

    public function getAll()
    {
      return $this->db->get($this->_table)->result();
    }
}
