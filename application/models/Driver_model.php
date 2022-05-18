<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Client_model<br>
 * Model du table client
 */
class Driver_model extends CI_Model
{
    function create($formArray){
        $this->db->insert('client',$formArray);//insert into client (first_name,last_name,birthday,email,password) values(?,?,?,?,?)
    }

    function all(){
        $query = $this->db->get('client');
         if($query->num_rows() > 0){
             return $query->result();
         }else{
             return false;
         }
    }

    
    public function isValidLogin($login, $password) :bool
    {
        $query = $this->db->query("SELECT * FROM driver WHERE login = '$login' AND password = '$password'");
        if($query->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }

    function findByLogin($login){
        $this->db->where('login',$login);
        return $user = $this->db->get('driver')->row_array();//select * from client where client_id=?
    
    }

    function updateClient($clientId,$formArray){
        $this->db->where('client_id',$clientId);
        $this->db->update('client',$formArray);//update client set first_name=? , last_name=?,... where id=?
    }

    function delete($userId){
        $this->db->where('client_id',$userId);
        $this->db->delete('booking');
        
        $this->db->where('client_id',$userId);
        $this->db->delete('experience_reservation');

        $this->db->where('client_id',$userId);
        $this->db->delete('client');
    }
}