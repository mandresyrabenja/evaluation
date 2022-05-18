<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Guide<br>
 * Controller du table Guide
 */
class Guide extends CI_Controller
{
    
    function __construct() {
        parent::__construct();
        $this->load->model('guide_model', 'guide');
    }
    function showAll(){
        $query=  $this->guide->showAll();
        if($query){
            $result['guides']  = $this->guide->showAll();
        }
        echo json_encode($result);
    }
}