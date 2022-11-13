<?php
defined('BASEPATH') or exit('No direct script access allowed');

class data extends CI_Model
{
    public function getUser()
    {
        $query = $this->db->query("SELECT * from users");
        return $query->result_array();
    }
    public function getUserEdit($id)
    {
        $query = $this->db->query("SELECT * from users where id='$id'");
        return $query->result_array();
    }
    public function getFacility()
    {
        $query = $this->db->query("SELECT * from facilities");
        return $query->result_array();
    }
    public function getFacilityEdit($id)
    {
        $query = $this->db->query("SELECT * from facilities where facility_id='$id'");
        return $query->result_array();
    }
    public function getBooking()
    {
        $query = $this->db->query("SELECT * from booking join facilities on booking.facility_id = facilities.facility_id");
        return $query->result_array();
    }
    public function getBookingUser()
    {
        $requester = $this->session->userdata('nama');
        $query = $this->db->query("SELECT * from booking join facilities on booking.facility_id = facilities.facility_id where requester = '$requester'");
        return $query->result_array();
    }
    public function getBookingManagement()
    {
        $query = $this->db->query("SELECT * from booking join facilities on booking.facility_id = facilities.facility_id where status = 'Waiting for approval'");
        return $query->result_array();
    }
    public function editUser($name, $email, $role, $id)
    {
        $data = array(
            'nama' => $name,
            'email' => $email,
            'role' => $role
        );

        $where = array(
            'id' => $id
        );

        $this->db->where($where);
        $this->db->update('users', $data);

        redirect('Home/userList');
    }
    public function editFacility($name, $desc, $img = array(), $id)
    {

        $imgName =  $img['file_name'];

        $data = array(
            'nama' => $name,
            'deskripsi' => $desc,
            'img' => $imgName
        );

        $where = array(
            'facility_id' => $id
        );

        $this->db->where($where);
        $this->db->update('facilities', $data);

        redirect('Home/facilityList');
    }
    public function addFacility($name, $desc, $img = array())
    {
        $imgName =  $img['file_name'];

        $data = array(
            'nama' => $name,
            'deskripsi' => $desc,
            'img' => $imgName
        );

        $this->db->insert('facilities', $data);

        redirect('Home/facilityList');
    }

    public function deleteFacility($id)
    {
        $this->db->where('facility_id', $id);
        $this->db->delete('facilities');

        redirect('Home/facilityList');
    }

    public function deleteUser($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('users');

        redirect('Home/userList');
    }
    public function checkLogin($email, $password)
    {
        $query = $this->db->query("SELECT * from users where email='$email' and password='$password'");

        foreach ($query->result() as $row) {
            $name =  $row->nama;
            $role = $row->role;
        }

        if ($query->num_rows() == 1) {
            $data = array(
                'nama' => $name,
                'role' => $role,
                'logged_in' => 1
            );
            $this->session->set_userdata($data);
            redirect("Home/afterLogin");
        } else {
            $data = array(
                'logged_in' => -1
            );
            $this->session->set_userdata($data);
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('Home/index');
    }
    public function addUser($email, $nama, $password)
    {
        $data = array(
            'email' => "$email",
            'nama' => "$nama",
            'password' => "$password",
        );

        $this->db->insert('users', $data);

        redirect("Home/login");
    }
    public function deleteRequest($id)
    {
        $this->db->where('book_id', $id);
        $this->db->delete('booking');

        redirect('Home/requestList');
    }

    public function approve($id)
    {
        $data = array(
            'status' => 'Approve'
        );

        $where = array(
            'book_id' => $id
        );

        $this->db->where($where);
        $this->db->update('booking', $data);

        redirect('Home/requestList');
    }
    public function reject($id)
    {
        $data = array(
            'status' => 'Reject'
        );

        $where = array(
            'book_id' => $id
        );

        $this->db->where($where);
        $this->db->update('booking', $data);

        redirect('Home/requestList');
    }
    public function addBooking($id, $reserve, $start, $end)
    {

        $nama = $this->session->userdata('nama');

        $data = array(
            'facility_id' => "$id",
            'requester' => "$nama",
            'date' => "$reserve",
            'start_time' => "$start",
            'end_time' => "$end"
        );

        $this->db->insert('booking', $data);

        redirect("Home/requestList");
    }
}
