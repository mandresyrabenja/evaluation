<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Offer_model extends CI_Model
{
  //Fonction mamerina ny offres rehetra
  public function get_Offers() : array
  {
    $i=0;
    $offer = array();
    $query = $this->db->query('SELECT * FROM offer');
    foreach ($query->result_array() as $value)
    {
      $offer[$i] = $value;
      $i++;
    }
    return $offer;
  }
  //fonction mamerina ny offre correspondant amin'ny ID any
  public function get_Offer_By_Id($offer_id) : array
  {
    $offer = array();
    $query = $this->db->query('SELECT * FROM offer WHERE offer_id='.$offer_id.'');
    foreach ($query-> result_array() as $value)
    {
      $offer = $value;
    }
    return $offer;
  }
  //Fonction mamerina ny offres correspondant amin'ny Motel
  public function get_Offers_By_Motel($motel_id) : array
  {
    $i = 0;
    $offer = array();
    $query = $this->db->query('SELECT * FROM offer WHERE motel_id LIKE '.$motel_id.'');
    foreach ($query->result_array() as $value)
    {
      $offer[$i] = $value;
      $i++;
    }
    return $offer;
  }
  public function get_Offers_By_Args($args = array())
  {
    $i = 0;
    $offer = array();
    $request = "";
    $request = assemble_Strings_As_Request($args, 'offer');
    //echo $request;
    $query = $this->db->query($request);
    foreach ($query-> result_array() as $value)
    {
      $offer[$i] = $value;
      $i++;
    }
    return $offer;
  }

  //Fonction mamerina ny liste anah offre disponible
  public function available_offer_list() : array
  {
    $i = 0;
    $datas = array();
    $query = $this->db->query('SELECT * FROM offer WHERE is_available=1');
    foreach ($query -> result_array() as $value)
    {
      $datas[$i] = $value;
  //    echo $datas[$i]['offer_id'];
      $i++;
    }
    return $datas;
  }
  //Fonction maka ny motel anaty offre anakiray (paramètre ny id anleh offre)
  public function get_offer_s_motel($offer_id)
  {
    $offer = $this->get_Offer_By_Id($offer_id);
    $this->load->model('motel_model');
    $motel = $this->motel_model->get_Motel_By_Id($offer['motel_id']);
    return $motel;
  }

  //Fonction maka ny room_category anaty offre anakiray (paramètre ny id anleh offre)
  public function get_offer_s_room_category($offer_id)
  {
    $offer = $this->get_Offer_By_Id($offer_id);
    $this->load->model('room_category_model');
    $room_category = $this->room_category_model->get_Room_Category_By_Id($offer['room_category_id']);
    return $room_category;
  }
  /**
    *@param array $offers : liste anah offres
    *@param string $place : string anah place
  */
  public function get_offers_by_place($offers, $place)
  {
    $res = array();
    $this->load->model('motel_model');
    for ($i=0; $i < sizeof($offers); $i++)
    {
      $motel = $this->motel_model->get_Motel_By_Id($offers[$i]['motel_id']);
      //echo $motel['motel_id'];
      //echo $offers[$i]['motel_id'];
      if ($motel['location'] === $place) {
        array_push($res, $offers[$i]);
      }
    }
    //echo sizeof($res);
    return $res;
  }


  /**
   * @param mixed $id
   * Fonction mamerina liste offre mi JOIN motel(name, phone, email)
   * @return array
   */
  public function list_targetted_motel($id) : array{
    $result = $this->db->query("SELECT * FROM offer AS o JOIN motel AS m ON o.motel_id=m.motel_id WHERE o.motel_id = '".$id."'");
    return $result -> result_array();
  }
}
?>
