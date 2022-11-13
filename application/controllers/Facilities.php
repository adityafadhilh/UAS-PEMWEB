<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Facilities extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('data');
        $this->load->library('form_validation');
    }
    public function editFacility()
    {
        $data['css'] = $this->load->view('include/style.php', NULL, TRUE);
        $data['js'] = $this->load->view('include/script.php', NULL, TRUE);
        $data['navbar'] = $this->load->view('template/navbar.php', NULL, TRUE);

        $id = $this->input->get('id');

        $data['table'] = $this->data->getFacilityEdit($id);

        if ($this->input->method() == 'post') {
            $id = $this->input->post('id');
            $name = $this->input->post('name');
            $desc = htmlspecialchars($this->input->post('description'));

            $config['upload_path'] = 'assets/image/';
            $config['allowed_types'] = 'jpg|png|jfif';
            $config['max_size'] = '1024';
            $this->load->library('upload', $config);

            $file = $this->upload->do_upload('img');

            if (!$file)
                print_r($this->upload->display_errors());
            else
                $imgUpload = $this->upload->data();

            $this->data->editFacility($name, $desc, $imgUpload, $id);
        }

        $this->load->view('forms/facilities/edit.php', $data);
    }
    public function addFacility()
    {
        $data['css'] = $this->load->view('include/style.php', NULL, TRUE);
        $data['js'] = $this->load->view('include/script.php', NULL, TRUE);
        $data['navbar'] = $this->load->view('template/navbar.php', NULL, TRUE);
        $data['error_msg'] = '';

        if ($this->input->method() == 'post') {
            $this->form_validation->set_rules(
                'name',
                'name',
                'required',
                array(
                    'required'      => 'This form must be filled',
                )
            );
            $this->form_validation->set_rules(
                'description',
                'description',
                'required',
                array(
                    'required'      => 'This form must be filled',
                )
            );

            $name = $this->input->post('name');
            $desc = htmlspecialchars($this->input->post('description'));
            $img = $this->input->post('img');

            $config['upload_path'] = 'assets/image/';
            $config['allowed_types'] = 'jpg|png|jfif';
            $config['max_size'] = '1024';
            $this->load->library('upload', $config);

            $file = $this->upload->do_upload('img');

            if ($this->form_validation->run() == false || !$file) {
                $this->load->view('forms/facilities/add.php', $data);
                $data['error_msg'] = $this->upload->display_errors();
            } else {
                if (!$file)
                    $data['error_msg'] = $this->upload->display_errors();
                else
                    $imgUpload = $this->upload->data();

                $this->data->addFacility($name, $desc, $imgUpload);
            }
        } else {

            $this->load->view('forms/facilities/add.php', $data);
        }
    }
    public function deleteFacility()
    {
        $id = $this->input->get('id');

        $this->data->deleteFacility($id);
    }

    public function facilityDetail()
    {
        $data['css'] = $this->load->view('include/style.php', NULL, TRUE);
        $data['js'] = $this->load->view('include/script.php', NULL, TRUE);
        $data['navbar'] = $this->load->view('template/navbar.php', NULL, TRUE);

        $id = $this->input->get('id');

        $data['table'] = $this->data->getFacilityEdit($id);

        $this->load->view('page/facilitiesDetail.php', $data);
    }

    public function book()
    {
        $data['css'] = $this->load->view('include/style.php', NULL, TRUE);
        $data['js'] = $this->load->view('include/script.php', NULL, TRUE);
        $data['navbar'] = $this->load->view('template/navbar.php', NULL, TRUE);

        $id = $this->input->get('id');

        $data['table'] = $this->data->getFacilityEdit($id);

        if ($this->input->method() == 'post') {
            $id = $this->input->post('id');
            $reserve = $this->input->post('reserve');
            $start = $this->input->post('start');
            $end = $this->input->post('end');

            $this->data->addBooking($id, $reserve, $start, $end);
        } else {

            $this->load->view('forms/requests/book.php', $data);
        }
    }
}
