<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Biodata extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("biodata_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["biodata"] = $this->biodata_model->getAll();
        $this->load->view("biodata/list", $data);
    }

    public function add()
    {
        $biodata = $this->biodata_model;
        $validation = $this->form_validation;
        $validation->set_rules($biodata->rules());
        $data['cities'] = $this->db->select('*')->from('cities')->get()->result();
        if ($validation->run()) {
            $biodata->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("biodata/new_form", $data);
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('biodata');

        $biodata = $this->biodata_model;
        $validation = $this->form_validation;
        $validation->set_rules($biodata->rules());

        if ($validation->run()) {
            $biodata->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["biodata"] = $biodata->getById($id);
        $data['cities'] = $this->db->select('*')->from('cities')->get()->result();
        if (!$data["biodata"]) show_404();

        $this->load->view("biodata/edit_form", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();

        if ($this->biodata_model->delete($id)) {
            redirect(site_url('biodata'));
        }
    }
}
