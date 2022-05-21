<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Car_model extends CI_Model
{

    
    public function findAllCarDetails(){
        $query = $this->db->get('car_details');

         if($query->num_rows() > 0){
             return $query->result();
         }else{
             return false;
         }
     }

    public function findAllDueState(){
        $query = $this->db->get('due_state');

         if($query->num_rows() > 0){
             return $query->result();
         }else{
             return false;
         }
     }

    public function find($id) {
        $query = $this->db->query('SELECT * FROM car WHERE car_id = '.$id);
        if($query->num_rows() == 1) {
            $result = $query->result();
            return $result[0];
        } else {
            return false;
        };
    }
    public function showAll(){
        $query = $this->db->get('car_details');
         if($query->num_rows() > 0){
             return $query->result();
         }else{
             return false;
         }
     }

     
     public function findDriverAvailableCars() {
        
        # Seul les voitures disponible sont peuvent être utilisé, une voiture est disponible si: 
        # - ses échéances(assurance, visite technique) sont valide
        # - ses éléments de maintenances(vidange, pneu) peuvent être encore utilisés
        # - le destination de son dernier voyage est le garage
        $query = $this->db->query(
            "
            SELECT * FROM car_details
            WHERE
                insurance IS NOT NULL
                AND technical_visit IS NOT NULL
                AND ( to_days(technical_visit) - to_days(curdate()) ) > 1
                AND ( to_days(insurance) - to_days(curdate()) ) > 1 
            "
        );
        $cars = $query->result();
        $availableCars = array();
        
        foreach($cars as $car) {
            $query = $this->db->query("
                SELECT 
                    car.numero, car_brand.name, car.car_model, travel.start_place, travel.start_time,  travel.end_place, travel.end_time, travel.reason, travel.start_km, travel.end_km, travel.driver_id
                FROM
                    car JOIN travel ON car.numero = travel.car_id
                    JOIN car_brand ON car.car_brand_id = car_brand.id
                WHERE
                    car.numero = '" . $car->numero ."'
                ORDER BY
                    travel.end_time DESC
                LIMIT
                    1"
            );
            $lastCarTravel = $query->result();
            if( empty($lastCarTravel) || (strtoupper($lastCarTravel[0]->end_place) == 'GARAGE') || $lastCarTravel[0]->driver_id == $this->session->userdata('driver_id') )
                    array_push($availableCars, $car);
        }
        return $availableCars;
    }

     public function findAllAvailableCars() {
        
        # Seul les voitures disponible sont peuvent être utilisé, une voiture est disponible si: 
        # - ses échéances(assurance, visite technique) sont valide
        # - ses éléments de maintenances(vidange, pneu) peuvent être encore utilisés
        # - le destination de son dernier voyage est le garage
        $query = $this->db->query(
            "
            SELECT * FROM car_details
            WHERE
                insurance IS NOT NULL
                AND technical_visit IS NOT NULL
                AND ( to_days(technical_visit) - to_days(curdate()) ) > 1
                AND ( to_days(insurance) - to_days(curdate()) ) > 1 
            "
        );
        $cars = $query->result();
        $availableCars = array();
        
        foreach($cars as $car) {
            $query = $this->db->query("
                SELECT 
                    car.numero, car_brand.name, car.car_model, travel.start_place, travel.start_time,  travel.end_place, travel.end_time, travel.reason, travel.start_km, travel.end_km
                FROM
                    car JOIN travel ON car.numero = travel.car_id
                    JOIN car_brand ON car.car_brand_id = car_brand.id
                WHERE
                    car.numero = '" . $car->numero ."'
                ORDER BY
                    travel.end_time DESC
                LIMIT
                    1"
            );
            $lastCarTravel = $query->result();
            if( empty($lastCarTravel) || strtoupper($lastCarTravel[0]->end_place) == 'GARAGE')
                array_push($availableCars, $car);
        }
        return $availableCars;
   }
}