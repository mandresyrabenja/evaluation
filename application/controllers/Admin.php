<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model', 'admin');
        $this->load->model('carType_model', 'carType');
    }
    /**
     * @return void
     */
    public function index()
    {
        $this->load->view('backoffice/login');
    }
    
    public function login()
	{
		
		if($this->admin->isValidLogin($this->input->post('username'), $this->input->post('password'))) {
            $this->session->set_userdata('admin', $this->input->post('login'));
            redirect('car/addCar');
        } else {
            $data['error'] = true;
            $this->load->view('backoffice/login', $data);
        }
	}
}
