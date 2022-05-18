<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Experience_Reservation<br>
 * Controller du table Experience_Reservation
 */
class Experience_Reservation extends CI_Controller
{
    
    function __construct() {
        parent::__construct();
        $this->load->model('experience_reservation_model', 'exp_reservation');
    }

}