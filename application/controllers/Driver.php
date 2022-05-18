<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Client<br>
 * Controller du table client
 */
class Driver extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->model('driver_model', 'driver');
    }
    
    public function login()
	{	
		if($this->driver->isValidLogin($this->input->post('username'), $this->input->post('password'))) {
            $driverId = $this->driver->findByLogin($this->input->post('username'));
            $this->session->set_userdata('driver_id', $driverId['id']);
            redirect('travel/add');
        } else {
            $data['error'] = true;
            $this->load->view('login', $data);
        }
	}
}
?>