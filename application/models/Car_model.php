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
        $query = $this->db->get('car');
         if($query->num_rows() > 0){
             return $query->result();
         }else{
             return false;
         }
     }
}