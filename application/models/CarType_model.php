<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Experience_Category_model<br>
 * Model du table Experience_Category
 */
class CarType_model extends CI_Model
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
        $query = $this->db->get('car_type');
         if($query->num_rows() > 0){
             return $query->result();
         }else{
             return false;
         }
     }
}