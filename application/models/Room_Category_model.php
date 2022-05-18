<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Room_Category_model extends CI_Model
{
  //Fonction mamerina ny room_category rehetra
    public function get_Room_Categories() : array
    {
      $i = 0;
      $datas = array();
      $query = $this->db->query('SELECT * FROM room_category');
      foreach ($query-> result_array() as $value)
      {
        $datas[$i] = $value;
        $i++;
      }
      return $datas;
    }
  //Fonction mamerina ny room_category arakarakin'ny room_category_id
    public function get_Room_Category_By_Id($id) : array
    {
      $datas = array();
      $query = $this->db->query('SELECT * FROM room_category WHERE room_category_id = '.$id.'');
      foreach ($query-> result_array() as $value)
      {
        $datas = $value;
      }
      return $datas;
    }
}
