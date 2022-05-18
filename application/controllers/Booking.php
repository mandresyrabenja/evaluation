<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Booking<br>
 * Controller du table Booking
 */
class Booking extends CI_Controller
{

    function __construct() {
        parent::__construct();
        $this->load->model('booking_model', 'booking');
    }

}
