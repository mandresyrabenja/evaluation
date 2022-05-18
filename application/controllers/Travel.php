<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Travel extends CI_Controller
{

    function __construct() {
        parent::__construct();
        $this->load->model('travel_model', 'travel');
        $this->load->model('car_model', 'car');
    }
    
    function add() {
        $data['cars'] = $this->car->showAll();
        $data['page'] = $this->load->view('travel/add', $data, true);
        $this->load->view('template', $data );
    }

    function list(){
        $data['travels'] =  $this->travel->showAll();
        
        $data['page'] = $this->load->view('travel/list', $data, true);
        $this->load->view('template', $data );
    }

    function insert() {
        $car_id = $this->input->post('car_id');
        $start_time = $this->input->post('start_time');
        $start_place = $this->input->post('start_place');
        $start_km = $this->input->post('start_km');
        $end_time = $this->input->post('end_time');
        $end_km = $this->input->post('end_km');
        $end_place = $this->input->post('end_place');
        $fuel_quantity = $this->input->post('fuel_quantity');
        $fuel_price = $this->input->post('fuel_price');
        $reason = $this->input->post('reason');

        $data = array(
            'car_id' => $car_id,
            'start_time' => $start_time,
            'start_place' => $start_place,
            'start_km' => $start_km,
            'end_time' => $end_time,
            'end_km' => $end_km,
            'end_place' => $end_place,
            'fuel_quantity' => $fuel_quantity,
            'fuel_price' => $fuel_price,
            'reason' => $reason,
            'driver_id' => $this->session->userdata('driver_id')
        );
        $this->db->insert('travel', $data);
        redirect('travel/list');
    }

    function showAll(){
        $query=  $this->exp_category->showAll();
        if($query){
            $result['categories']  = $this->exp_category->showAll();
        }
        echo json_encode($result);
    }
}