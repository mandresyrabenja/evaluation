<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Travel extends CI_Controller
{

    function __construct() {
        parent::__construct();
        $this->load->model('travel_model', 'travel');
        $this->load->model('car_model', 'car');
    }

    function graph() {
        if( null !== $this->input->get('car_id') ) {
            $data['car_id'] = $this->input->get('car_id');
            
            $this->load->view('travel/graph', $data);
        }
    }

    function carDailyTravel() {
        if( null !== $this->input->get('car_id') ) {
            $car_id = $this->input->get('car_id');
            $this->db->where('car_id', $car_id);
            $carDailyTravels = $this->db->get('car_daily_travel')->result();
            echo json_encode($carDailyTravels);
        }
    }

    function carTravels() {
        if(null !== $this->input->get('car_id')) {
            $carId = $this->input->get('car_id');
            $data['travels'] =  $this->travel->findCarTravels($carId);
            
            $data['page'] = $this->load->view('travel/topdf', $data);
        }
    }

    function add() {
        $data['cars'] = $this->car->findDriverAvailableCars();
        
        # Si il y a une erreur de saisie de formulaire
        if( null !== $this->input->get('error') ) {
            $error = $this->input->get('error');
            if($error == 'km') {
                $start_km = $this->input->get('start_km');
                $end_km = $this->input->get('end_km');
                $data['errorMsg'] = 'Le kilometrage d\'arrivé('. $end_km .'km) devait être supérieur au kilometrage de départ('. $start_km .'km)';
            }
            if($error == 'speed') {
                $data['errorMsg'] = 'La vitesse moyenne doit être inférieur ou égale à 72km/h. Votre vitesse est ' . $this->input->get('speed') . 'km/h';
            }
            if($error == 'time') {
                $data['errorMsg'] = "L'heure de départ doît être avant l'heure d'arrivé";
            }
        }

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

        # Le kilometrage de départ doit être inférieur au kilometrage d'arrivé
        if($start_km > $end_km)
            redirect('travel/add?error=km&start_km='.$start_km.'&end_km='.$end_km);
        
        # L'heure de départ doît être avant l'heure d'arrivé
        $start_dateTime = new DateTime($start_time);
        $end_dateTime = new DateTime($end_time);
        if($start_dateTime >= $end_dateTime)
            redirect('travel/add?error=time');

        # Calcul du vitesse moyenne du trajet
        $travel_km = $end_km - $start_km;
        $interval = $start_dateTime->diff($end_dateTime);
        $speed = $travel_km/$interval->h;
        
        # La vitesse moyenne doit être inférieur ou égale à 72km/h
        if($speed > 72)
            redirect('travel/add?error=speed&speed='.$speed);
        
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
        
        # Kilometrage restant du vidange et pneu du voiture
        $this->db->set('oil_change', 'oil_change-'.$travel_km, FALSE);
        $this->db->set('tire', 'tire-'.$travel_km, FALSE);
        $this->db->where('numero', $car_id);
        $this->db->update('car');

        redirect('travel/list');
    }
}