<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('data');
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data['css'] = $this->load->view('include/style.php', NULL, TRUE);
        $data['js'] = $this->load->view('include/script.php', NULL, TRUE);

        $this->load->view('index.php', $data);
    }

    public function login()
    {
        $data['css'] = $this->load->view('include/style.php', NULL, TRUE);
        $data['js'] = $this->load->view('include/script.php', NULL, TRUE);

        if ($this->input->method() == 'post') {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $hashPass = hash("md5", $password);

            $this->data->checkLogin($email, $hashPass);
        }

        $this->load->view('page/login.php', $data);
    }

    public function logout()
    {
        $this->data->logout();
    }

    public function editUser()
    {
        $data['css'] = $this->load->view('include/style.php', NULL, TRUE);
        $data['js'] = $this->load->view('include/script.php', NULL, TRUE);
        $data['navbar'] = $this->load->view('template/navbar.php', NULL, TRUE);

        $id = $this->input->get('id');

        $data['table'] = $this->data->getUserEdit($id);

        if ($this->input->method() == 'post') {

            $id = $this->input->post('id');
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $role = $this->input->post('role');

            $this->data->editUser($name, $email, $role, $id);
        } else {
            $this->load->view('forms/users/edit.php', $data);
        }
    }

    public function register()
    {
        $data['css'] = $this->load->view('include/style.php', NULL, TRUE);
        $data['js'] = $this->load->view('include/script.php', NULL, TRUE);
        // $data['captchaError'] = '';

        if ($this->input->method() == 'post') {
            $this->form_validation->set_rules(
                'name',
                'name',
                'required',
                array(
                    'required'      => 'You must provide a string !',
                )
            );
            $this->form_validation->set_rules(
                'email',
                'email',
                'required',
                array(
                    'required'      => 'You must provide a string !',
                )
            );
            $this->form_validation->set_rules(
                'password',
                'password',
                'required',
                array(
                    'required'      => 'You must provide a string !',
                )
            );
            $this->form_validation->set_rules(
                'repassword',
                'repassword',
                'required|matches[password]',
                array(
                    'required'      => 'You must provide a string !',
                )
            );

            // if (isset($_POST['g-recaptcha-response'])) $captcha = $_POST['g-recaptcha-response'];

            // $str = "https://www.google.com/recaptcha/api/siteverify?secret=6LeS7ngdAAAAABYlUugLiManN60ccEyS1ilgEnwy" . "&response=" . $captcha . "&remoteip=" . $_SERVER['REMOTE_ADDR'];

            // $response = file_get_contents($str);
            // $response_arr = (array) json_decode($response);

            $nama = $this->input->post('name');
            $email = $this->input->post('email');
            $pass = $this->input->post('password');
            $hashPass = hash("md5", $pass);

            if ($this->form_validation->run() == false) {
                $this->load->view('page/register.php', $data);
            } else
                $this->data->addUser($email, $nama, $hashPass);
        } else {
            $this->load->view('page/register.php', $data);
        }
    }

    public function deleteUser()
    {
        $id = $this->input->get('id');

        $this->data->deleteUser($id);
    }

    public function afterLogin()
    {
        $data['css'] = $this->load->view('include/style.php', NULL, TRUE);
        $data['js'] = $this->load->view('include/script.php', NULL, TRUE);
        $data['navbar'] = $this->load->view('template/navbar.php', NULL, TRUE);

        $this->load->view('page/afterLogin.php', $data);
    }

    public function userList()
    {
        $data['css'] = $this->load->view('include/style.php', NULL, TRUE);
        $data['js'] = $this->load->view('include/script.php', NULL, TRUE);
        $data['navbar'] = $this->load->view('template/navbar.php', NULL, TRUE);
        $data['table'] = $this->data->getUser();

        $this->load->view('table/usersList.php', $data);
    }

    public function facilityList()
    {
        $data['css'] = $this->load->view('include/style.php', NULL, TRUE);
        $data['js'] = $this->load->view('include/script.php', NULL, TRUE);
        $data['navbar'] = $this->load->view('template/navbar.php', NULL, TRUE);
        $data['table'] = $this->data->getFacility();

        $this->load->view('table/facilitiesList.php', $data);
    }

    public function requestList()
    {
        $data['css'] = $this->load->view('include/style.php', NULL, TRUE);
        $data['js'] = $this->load->view('include/script.php', NULL, TRUE);
        $data['navbar'] = $this->load->view('template/navbar.php', NULL, TRUE);

        if ($this->session->userdata('role') == 'User')
            $data['table'] = $this->data->getBookingUser();
        else if ($this->session->userdata('role') == 'Management')
            $data['table'] = $this->data->getBookingManagement();
        else
            $data['table'] = $this->data->getBooking();

        $this->load->view('table/requestsList.php', $data);
    }

    public function facilityListUser()
    {
        $data['css'] = $this->load->view('include/style.php', NULL, TRUE);
        $data['js'] = $this->load->view('include/script.php', NULL, TRUE);
        $data['navbar'] = $this->load->view('template/navbar.php', NULL, TRUE);
        $data['table'] = $this->data->getFacility();

        $this->load->view('table/facilitiesList.php', $data);
    }

    public function error()
    {
        $data['css'] = $this->load->view('include/style.php', NULL, TRUE);
        $data['js'] = $this->load->view('include/script.php', NULL, TRUE);
        $data['navbar'] = $this->load->view('template/navbar.php', NULL, TRUE);

        $this->load->view('errors/error.php', $data);
    }
}
