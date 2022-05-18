<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Room_Category<br>
 * Controller du table Room_Category
 */
class Room_Category extends CI_Controller
{
    
    function __construct() {
        parent::__construct();
        $this->load->model('room_category_model', 'room_cat');
    }
    
}