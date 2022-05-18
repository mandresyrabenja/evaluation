<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CarBrand_model extends CI_Model
{

  public function find($id) {
    $query = $this->db->query('SELECT * FROM experience_category WHERE category_id = '.$id);
    if($query->num_rows() == 1) {
        $result = $query->result();
        return $result[0];
    } else {
        return false;
    };
}
public function showAll(){
    $query = $this->db->get('car_brand');
     if($query->num_rows() > 0){
         return $query->result();
     }else{
         return false;
     }
 }

  public function get_bookings() : array
  {
    $res = array();
    $this->db->query('SELECT * from booking');
    foreach ($variable->result_array() as $value) {
      array_push($res, $value);
    }
    return $res;
  }
}
