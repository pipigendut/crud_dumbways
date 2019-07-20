<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Biodata_model extends CI_Model
{
    private $_table = "biodata";

    public $id;
    public $full_name;
    public $date_of_birth;
    public $place_of_birth_id;
    public $phone_number;
    public $address;
    public $last_education;
    public $religion;
    public $hobby;

    public function rules()
    {
        return [
            ['field' => 'full_name',
            'label' => 'Name',
            'rules' => 'required'],

            ['field' => 'place_of_birth_id',
            'label' => 'CitiesId',
            'rules' => 'required|numeric'],

            ['field' => 'phone_number',
            'label' => 'Phone',
            'rules' => 'numeric']
        ];
    }

    public function getAll()
    {
        $this->db->select('biodata.id as id, full_name, date_of_birth, cities.name as cities_name, phone_number, address, last_education, religion, hobby');
        $this->db->from('biodata');
        $this->db->join('cities', 'biodata.place_of_birth_id = cities.id');
        $query = $this->db->get();
        return $query->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->full_name = $post["full_name"];
        $this->date_of_birth = $post["date_of_birth"];
        $this->place_of_birth_id = $post["place_of_birth_id"];
        $this->phone_number = $post["phone_number"];
        $this->address = $post["address"];
        $this->last_education = $post["last_education"];
        $this->religion = $post["religion"];
        $this->hobby = $post["hobby"][0];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id = $post["id"];
        $this->full_name = $post["full_name"];
        $this->date_of_birth = $post["date_of_birth"];
        $this->place_of_birth_id = $post["place_of_birth_id"];
        $this->phone_number = $post["phone_number"];
        $this->address = $post["address"];
        $this->last_education = $post["last_education"];
        $this->religion = $post["religion"];
        $this->hobby = $post["hobby"][0];
        $this->db->update($this->_table, $this, array('id' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id" => $id));
    }
}
