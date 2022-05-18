<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Experience_model<br>
 * Model du table Experience
 */
class Experience_model extends CI_Model
{
    /**
     * @return array resultats 4 Experiences random
     */
    public function getExperienceRandom() : array{
        $query = $this->db->query('SELECT * FROM experience ORDER BY RAND() LIMIT 4');
        return $query->result_array();
        
    }

    /**
     * @return array resultats 4 Experiences les plus populaires selon les reservations effectuées
     */
    public function getPopularExperiences() : array{
        $query = $this->db->query('SELECT * FROM experience AS exp JOIN experience_reservation AS exp_r ON exp.experience_id=exp_r.experience_id
            GROUP BY experience_reservation_id ORDER BY exp_r.experience_id DESC LIMIT 4');
        return $query->result_array();
    }
    public function lastRowId() {
        $row = $this->db->select('*')->limit(1)->order_by('experience_id', 'DESC')->get('experience')->row();
        return $row->experience_id;
    }
    public function showAll(){
        $query = $this->db->get('experience');
         if($query->num_rows() > 0){
             return $query->result();
         }else{
             return false;
         }
     }
     public function addProduct($data){
         return $this->db->insert('experience', $data);
     }
     public function updateProduct($id,$field){
         $this->db->where('experience_id', $id);
         $this->db->update('experience', $field);
         if($this->db->affected_rows() >0){
             return true;
         }else{
             return false;
         }
 
     }
     public function deleteProduct($id){
        $this->db->where('experience_id', $id);
        $this->db->delete('experience');
        if($this->db->affected_rows() >0){
             return true;
         }else{
             return false;
         }
         
     }
     public function searchProduct($match) {
         $field = array('name');
         $this->db->like('lower(concat('.implode(',',$field).'))', strtolower($match));
         $query = $this->db->get('experience');
          if($query->num_rows() > 0){
             return $query->result();
         }else{
             return false;
         }
     }
}