<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Travel_model extends CI_Model
{

    public function showAll(){
      $query = $this->db->get('travel_details');
       if($query->num_rows() > 0){
           return $query->result();
       }else{
           return false;
       }
   }

   
   public function findCarTravels($carId){
    $this->db->where('car_id', $carId);
    $query = $this->db->get('travel_details');
    if($query->num_rows() > 0){
        return $query->result();
    }else{
        return false;
    }
 }
}
?>
