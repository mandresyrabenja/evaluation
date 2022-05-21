<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Car extends CI_Controller
{

    function __construct() {
        parent::__construct();
        $this->load->model('car_model', 'car');
        $this->load->model('carType_model', 'carType');
        $this->load->model('carBrand_model', 'carBrand');
    }

    function updateMaintenance() {
        $car_id = $this->input->post('car_id');
        $maintenance = $this->input->post('maintenance');

        if($maintenance == 'oil_change')
            $this->db->set('oil_change', 5000);
        elseif($maintenance == 'tire')
            $this->db->set('tire', 2000);
        $this->db->where('numero', $car_id);
        $this->db->update('car');

        redirect('car/maintenanceList');
    }

    function maintenanceList() {
        $query=  $this->car->findAllCarDetails();
        if($query){
            $data['cars']  = $query;
        }
        
        $data['page'] = $this->load->view('maintenance/list', $data, true);
        $this->load->view('backoffice/template', $data );
    }

    function updateMaintenanceForm() {
        $data['cars'] = $this->car->showAll();
        $data['page'] = $this->load->view('maintenance/update', $data, true);
        
        $this->load->view('backoffice/template', $data );
    }

    function availableCars() {
        $data['cars'] = $this->car->findAllAvailableCars();

        $data['page'] = $this->load->view('car/availableCars', $data, true);
        $this->load->view('template', $data );
    }

    
    function adminAvailableCars() {
        $data['cars'] = $this->car->findAllAvailableCars();

        $data['page'] = $this->load->view('car/availableCars', $data, true);
        $this->load->view('backoffice/template', $data );
    }
    
    function list(){
        $query=  $this->car->findAllCarDetails();
        if($query){
            $data['cars']  = $query;
        }
        
        $data['page'] = $this->load->view('car/list', $data, true);
        $this->load->view('backoffice/template', $data );
    }

    function listDue() {
        $query=  $this->car->findAllDueState();
        if($query){
            $data['dues']  = $query;
        }

        $data['page'] = $this->load->view('due/list', $data, true);
        
        $this->load->view('template', $data );
    }

    
    function listDueAdmin() {
        $query=  $this->car->findAllDueState();
        if($query){
            $data['dues']  = $query;
        }

        $data['page'] = $this->load->view('due/list', $data, true);
        
        $this->load->view('backoffice/template', $data );
    }

    function updateDue() {

        $car_id = $this->input->post('car_id');
        $insurance = $this->input->post('insurance');
        $technical_visit = $this->input->post('technical_visit');

        if($insurance != '' || $technical_visit != '') {
            if($insurance != '')
                $this->db->set('insurance', $insurance);
            if($technical_visit != '')
                $this->db->set('technical_visit', $technical_visit);
            $this->db->where('numero', $car_id);
            $this->db->update('car');
        }

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
        $carTypes = $this->carType->showAll();
        $carBrands = $this->carBrand->showAll();
        
        $data['carTypes'] = $carTypes;
        $data['carBrands'] = $carBrands;
        
        $data['page'] = $this->load->view('car/add', $data, true);
        $this->load->view('backoffice/template', $data);
    }

    function showAll(){
        $query=  $this->car->showAll();
        if($query){
            $result['cars']  = $this->car->showAll();
        }
        echo json_encode($result);
    }
}