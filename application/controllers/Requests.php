<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Requests extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('data');
        $this->load->library('form_validation');
    }

    public function deleteRequest()
    {
        $id = $this->input->get('id');

        $this->data->deleteRequest($id);
    }
    public function approve(){
        $id = $this->input->get('id');

        $this->data->approve($id);
    }
    public function reject(){
        $id = $this->input->get('id');

        $this->data->reject($id);
    }
}
