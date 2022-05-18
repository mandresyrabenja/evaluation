<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Car<br>
 * Controller du table Car
 */
class Car extends CI_Controller
{

    function __construct() {
        parent::__construct();
        $this->load->model('car_model', 'car');
        $this->load->model('carType_model', 'carType');
        $this->load->model('carBrand_model', 'carBrand');
    }
    
    
    function list(){
        $query=  $this->car->findAllCarDetails();
        if($query){
            $result['cars']  = $query;
        }

        $this->load->view('car/list', $result);
    }

    function listDue() {
        $query=  $this->car->findAllDueState();
        if($query){
            $data['dues']  = $query;
        }

        $data['page'] = $this->load->view('due/list', $data, true);
        
        $this->load->view('template', $data );
    }

    function updateDue() {

        $car_id = $this->input->post('car_id');
        $insurance = $this->input->post('insurance');
        $technical_visit = $this->input->post('technical_visit');

        
        $this->db->set('insurance', $insurance);
        $this->db->set('technical_visit', $technical_visit);
        $this->db->where('numero', $car_id);
        $this->db->update('car');

        redirect('car/listDue');
    }

    function updateDueForm() {
        $data['cars'] = $this->car->showAll();
        $data['page'] = $this->load->view('due/update', $data, true);
        
        $this->load->view('template', $data );
    }

    function insert() {
        $numero = $this->input->post('numero');
        $car_model = $this->input->post('car_model');
        $car_brand = $this->input->post('car_brand');
        $car_type = $this->input->post('car_type');

        $data = array(
            'numero' => $numero,
            'car_model' => $car_model,
            'car_brand_id' => $car_brand,
            'car_type_id' => $car_type
        );
    
        $this->db->insert('car', $data);
        redirect('car/list');
    }

    function index() {
        redirect('car/list');
    }

    function addCar() {
        $data = array();
        
        $carTypes = $this->carType->showAll();
        $carBrands = $this->carBrand->showAll();
        
        $data['carTypes'] = $carTypes;
        $data['carBrands'] = $carBrands;
        $this->load->view('car/add', $data);
    }

    function showAll(){
        $query=  $this->car->showAll();
        if($query){
            $result['cars']  = $this->car->showAll();
        }
        echo json_encode($result);
    }
}