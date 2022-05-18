<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Travel_model extends CI_Model
{
  public function showAll(){
      $query = $this->db->get('travel');
       if($query->num_rows() > 0){
           return $query->result();
       }else{
           return false;
       }
   }
}
?>
