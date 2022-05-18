<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Guide_model<br>
 * Model du table Guide
 */
class Guide_model extends CI_Model
{

    public function find($id) {
        $query = $this->db->query('SELECT * FROM guide WHERE guide_id = '.$id);
        if($query->num_rows() == 1) {
            $result = $query->result();
            return $result[0];
        } else {
            return false;
        }
    }
    public function showAll(){
        $query = $this->db->get('guide');
         if($query->num_rows() > 0){
             return $query->result();
         }else{
             return false;
         }
     }
}